<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\TankImage;
use App\Models\Gallery;
use App\Models\GalleryImage;
use App\Models\AboutUs;
use App\Models\WebsiteSetting;
use App\Models\PagesBanner;


class IndexController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $brands = Brand::where('status', 'visible')->get();
        $settings = WebsiteSetting::first();
        $tankimages = TankImage::all();

        foreach ($banners as $banner) {
            $filePath = $banner->file_path;
            $fileType = '';

            if ($filePath !== null) {
                $fileType = $this->getFileExtension($filePath);
                $fileUrl = asset($filePath);
                $banner->file = $fileUrl;
            }

            $banner->fileType = $fileType;
        }

        return view('index', compact('banners', 'brands', 'tankimages', 'settings'));
    }

    private function getFileExtension($filePath)
    {
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        if ($extension === 'mp4') {
            return 'video';
        } elseif (in_array($extension, ['jpg', 'jpeg', 'png', 'gif'], true)) {
            return 'image';
        }

        return '';
    }

    public function about()
    {
        $aboutUs = AboutUs::first();
        $settings = WebsiteSetting::first();
        $banner = PagesBanner::first();
        return view('about', compact('aboutUs', 'settings', 'banner'));
    }

    public function all_gallery()
    {
        $gallery_images = GalleryImage::paginate(9);
        $settings = WebsiteSetting::first();
        $banner = PagesBanner::first();
        return view('gallery', compact('gallery_images', 'settings', 'banner'));
    }
}
