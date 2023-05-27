<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSetting;
use App\Models\Outlet;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $settings = WebsiteSetting::first();

        $userCount = User::count();
        $outletCount = Outlet::count();
        $brandCount = Brand::count();

        return view('admin.dashboard', compact('settings', 'userCount', 'outletCount', 'brandCount'));
    }
}