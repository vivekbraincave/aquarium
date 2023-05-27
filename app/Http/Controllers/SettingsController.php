<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use App\Models\WebsiteSetting;
use DB;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view-settings', ['only' => ['index']]);
        $this->middleware('permission:update-settings', ['only' => ['update']]);
    }

    public function index()
    {
        $settings = WebsiteSetting::first();
        return view('admin.settings.index', compact('settings'));
    }
    

    public function update(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'small_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'large_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:png,ico|max:2048',
            'website_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number1' => 'required|numeric',
            'contact_number2' => 'required|numeric',
            'contact_number3' => 'required|numeric',
            'contact_number4' => 'required|numeric',
            'email_address1' => 'required|email',
            'email_address2' => 'required|email',
            'facebook_url' => 'nullable|string|max:255',
            'instagram_url' => 'nullable|string|max:255',
        ]);

        // Retrieve the current settings from the database
        $settings = WebsiteSetting::first();

        // If no settings exist, create a new instance
        if (!$settings) {
            $settings = new WebsiteSetting();
        }

        // Update the website name and address
        $settings->website_name = $validatedData['website_name'];
        $settings->address = $validatedData['address'];

        // Update the contact numbers
        $settings->contact_number1 = $validatedData['contact_number1'];
        $settings->contact_number2 = $validatedData['contact_number2'];
        $settings->contact_number3 = $validatedData['contact_number3'];
        $settings->contact_number4 = $validatedData['contact_number4'];

        // Update the email addresses
        $settings->email_address1 = $validatedData['email_address1'];
        $settings->email_address2 = $validatedData['email_address2'];

        // Update the social media URLs
        $settings->facebook_url = $validatedData['facebook_url'];
        $settings->instagram_url = $validatedData['instagram_url'];

        // Handle file uploads for small logo, large logo, and favicon
        if ($request->hasFile('small_logo')) {
            // Delete the old small logo file if it exists
            if ($settings->small_logo && Storage::disk('public')->exists($settings->small_logo)) {
                Storage::disk('public')->delete($settings->small_logo);
            }

            $smallLogoPath = $request->file('small_logo')->store('logos', 'public');
            $settings->small_logo = $smallLogoPath;
        }

        if ($request->hasFile('large_logo')) {
            // Delete the old large logo file if it exists
            if ($settings->large_logo && Storage::disk('public')->exists($settings->large_logo)) {
                Storage::disk('public')->delete($settings->large_logo);
            }

            $largeLogoPath = $request->file('large_logo')->store('logos', 'public');
            $settings->large_logo = $largeLogoPath;
        }

        if ($request->hasFile('favicon')) {
            // Delete the old favicon file if it exists
            if ($settings->favicon && Storage::disk('public')->exists($settings->favicon)) {
                Storage::disk('public')->delete($settings->favicon);
            }

            $faviconPath = $request->file('favicon')->store('favicons', 'public');
            $settings->favicon = $faviconPath;
        }

        // Save the updated settings
        $settings->save();

        return redirect()->back()->with('success', 'Settings Updated successfully.');
    }
}
