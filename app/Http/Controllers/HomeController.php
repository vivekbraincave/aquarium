<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use App\Models\TankImage;
use App\Models\AboutUs;
use App\Models\WebsiteSetting;
use App\Models\PagesBanner;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:manage-banner', ['only' => ['index']]);
        $this->middleware('permission:manage-small-gallery', ['only' => ['small_gallery']]);
        $this->middleware('permission:small-gallery-upload-delete', ['only' => ['uploadImage', 'deleteImage']]);
        $this->middleware('permission:manage-about-us', ['only' => ['manageAbout']]);
        $this->middleware('permission:update-about-us', ['only' => ['update']]);
        $this->middleware('permission:manage-pages-banner', ['only' => ['manageBanner', 'updateBanner']]);
    }

    public function index(Request $request)
    {
        $fileType = $request->input('file_type');
        $file = $request->input('file');

        if ($request->isMethod('post')) {
            if ($request->hasFile('file')) {
                $uploadedFile = $request->file('file');

                // Update the 'file_type' field
                $fileType = $request->input('file_type');

                if ($fileType === 'video') {
                    // Delete old video file if it exists
                    if ($file !== null && Storage::exists($file)) {
                        Storage::delete($file);
                    }

                    $filePath = $uploadedFile->store('public/videos');
                    $file = Storage::url($filePath);
                } elseif ($fileType === 'image') {
                    // Delete old image file if it exists
                    if ($file !== null && Storage::exists($file)) {
                        Storage::delete($file);
                    }

                    $filePath = $uploadedFile->store('public/images');
                    $file = Storage::url($filePath);
                }

                // Store the file path and file type in the database
                $banner = Banner::first();
                if ($banner) {
                    $banner->file_path = $file;
                    $banner->file_type = $fileType; // Update the 'file_type' field
                    $banner->save();
                } else {
                    $banner = new Banner;
                    $banner->file_path = $file;
                    $banner->file_type = $fileType; // Update the 'file_type' field
                    $banner->save();
                }
            }
        }

        // Retrieve the file path and file type from the database
        $banner = Banner::first();
        $file = $banner ? asset($banner->file_path) : null;
        $fileType = $banner ? $banner->file_type : null; // Retrieve the 'file_type' from the database
        $settings = WebsiteSetting::first();

        return view('admin.pages.index', compact('fileType', 'file', 'settings'));
    }

    public function small_gallery()
    {
        $images = TankImage::all();
        $settings = WebsiteSetting::first();
        return view('admin.pages.small-gallery', compact('images', 'settings'));
    }

    // for uploading image 
    public function uploadImage(Request $request)
    {
        // validating image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageCount = TankImage::count();
        $maxImages = 5;

        if ($imageCount >= $maxImages) {
            return redirect()->back()->with('error', 'Maximum number of images reached.');
        }

        $imagePath = $request->file('image')->store('public/tankimages');
        $imagePath = str_replace('public/', 'storage/', $imagePath);

        $image = new TankImage(['image_path' => $imagePath]);
        $image->save();

        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    public function deleteImage($id)
    {
        $image = TankImage::findOrFail($id);

        if (Storage::exists($image->image_path)) {
            Storage::delete($image->image_path);
        }

        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    public function manageAbout()
    {
        $aboutUs = AboutUs::first();
        $settings = WebsiteSetting::first();
        return view('admin.pages.manage-about', compact('aboutUs', 'settings'));
    }

    public function update(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'heading' => 'required',
            'banner_image' => 'image',
            'story_content' => 'required',
        ]);

        // Retrieve the current AboutUs model from the database
        $aboutUs = AboutUs::firstOrNew();

        // Check if the banner_image field is being updated and there is an existing image
        if ($request->hasFile('banner_image') && $aboutUs->banner_image) {
            // Delete the old image
            Storage::delete('public/' . $aboutUs->banner_image);
        }

        // Handle image upload and update the banner_image field
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imagePath = $image->store('about', 'public');
            $validatedData['banner_image'] = str_replace('public/', '', $imagePath);
        }

        // Update the About Us section
        $aboutUs->fill($validatedData);
        $aboutUs->save();

        // Redirect or show a success message
        return redirect()->back()->with('success', 'About Us Page Updated successfully.');
    }

    public function manageBanner()
    {
        $settings = WebsiteSetting::first();
        $banner = PagesBanner::first();

        return view('admin.pages.all-banner', compact('settings', 'banner'));
    }

    public function updateBanner(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $banner = PagesBanner::first();

        if (!$banner) {
            $banner = new PagesBanner();
        } elseif ($banner->image_path) {
            // Delete the previous image
            Storage::delete($banner->image_path);
        }

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('public/banners');
            $banner->image_path = Storage::url($imagePath);
            $banner->save();

            return redirect()->back()->with('success', 'Banner image updated successfully!');
        }

        return redirect()->back()->with('error', 'Failed to update banner image.');
    }

}