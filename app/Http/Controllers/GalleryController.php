<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Models\WebsiteSetting;
use App\Models\Gallery;
use App\Models\GalleryImage;
use DB;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:gallery-list', ['only' => ['index']]);
        $this->middleware('permission:gallery-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:gallery-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:gallery-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $gallery_images = GalleryImage::all();
        $settings = WebsiteSetting::first();
        return view('admin.gallery.index', compact('gallery_images', 'settings'));
    }

    public function create()
    {
        $settings = WebsiteSetting::first();
        return view('admin.gallery.create', compact('settings'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'images.*' => 'required|image|mimes:png,jpg|max:2048|dimensions:width=300,height=300',
            'status' => 'required|in:visible,hidden',
            'img_alt' => 'required|string',
            'img_title' => 'required|string',
        ], [
            'images.*.required' => 'Please select at least one image.',
            'images.*.image' => 'The file must be an image.',
            'images.*.mimes' => 'Only PNG and JPG files are allowed.',
            'images.*.max' => 'The image size must not exceed 2MB.',
            'images.*.dimensions' => 'The image dimensions must be 300x300 pixels.',
            'status.required' => 'Please select the status of the gallery.',
            'status.in' => 'Invalid status selected.',
            'img_alt.required' => 'Please enter the alt text for the image.',
            'img_alt.string' => 'The alt text must be a string.',
            'img_title.required' => 'Please enter the title for the image.',
            'img_title.string' => 'The image title must be a string.',
        ]);

        // Create a new gallery
        $gallery = Gallery::create([
            'status' => $validatedData['status'],
            // Add other fields as needed
        ]);

        // Store the gallery images
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('gallery', 'public');

            $galleryImage = new GalleryImage();
            $galleryImage->gallery_id = $gallery->id;
            $galleryImage->img_alt = $validatedData['img_alt'];
            $galleryImage->img_title = $validatedData['img_title'];
            $galleryImage->image_path = $imagePath;
            $galleryImage->save();
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Your gallery has been updated with new images!');
    }

    public function edit($id)
    {
        $galleryImage = GalleryImage::findOrFail($id);
        $settings = WebsiteSetting::first();
        return view('admin.gallery.edit', compact('galleryImage', 'settings'));
    }


    public function update(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'image' => 'nullable|image|mimes:png,jpg|max:2048|dimensions:width=1080,height=1080',
            'img_alt' => 'required|string',
            'img_title' => 'required|string',
        ], [
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'Only PNG and JPG files are allowed.',
            'image.max' => 'The image size must not exceed 2MB.',
            'image.dimensions' => 'The image dimensions must be 1080x1080 pixels.',
            'img_alt.required' => 'Please enter the alt text for the image.',
            'img_alt.string' => 'The alt text must be a string.',
            'img_title.required' => 'Please enter the title for the image.',
            'img_title.string' => 'The image title must be a string.',
        ]);

        // Find the gallery image
        $galleryImage = GalleryImage::findOrFail($id);

        // Update alt text and title
        $galleryImage->img_alt = $validatedData['img_alt'];
        $galleryImage->img_title = $validatedData['img_title'];

        // Check if a new image was uploaded
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            Storage::disk('public')->delete($galleryImage->image_path);

            // Store the new image
            $imagePath = $request->file('image')->store('gallery', 'public');
            $galleryImage->image_path = $imagePath;
        }

        $galleryImage->save();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image has been updated successfully!');
    }


    // delete image
    public function destroy($id)
    {
        $galleryImage = GalleryImage::findOrFail($id);

        // Delete the image from the storage
        Storage::disk('public')->delete($galleryImage->image_path);

        // Delete the gallery image from the database
        $galleryImage->delete();

        return redirect()->route('admin.gallery.index')->with('success', 'Gallery image has been deleted successfully!');
    }

}
