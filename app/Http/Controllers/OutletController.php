<?php

namespace App\Http\Controllers;
use App\Models\Outlet;
use App\Models\WebsiteSetting;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:outlet-list', ['only' => ['index']]);
        $this->middleware('permission:outlet-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:outlet-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:outlet-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $outlets = Outlet::all();
        $settings = WebsiteSetting::first();
        return view('admin.outlets.index', compact('outlets', 'settings'));
    }

    public function create()
    {
        $settings = WebsiteSetting::first();
        return view('admin.outlets.create', compact('settings'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'outlet_name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|dimensions:width=1280,height=960|max:2048',
            'address' => 'required|string',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'second_address' => 'required|string',
            'telephone' => 'required|numeric',
            'iframe_src' => 'required|string',
            'iframe_width' => 'required|integer',
            'iframe_height' => 'required|integer',
        ], [
            'image.dimensions' => 'The image dimensions must be 1280x960 pixels.',
        ]);

        // If validation fails, redirect back with error messages
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('outlets', 'public');
        }

        // Create and save the outlet
        Outlet::create([
            'outlet_name' => $request->input('outlet_name'),
            'image' => isset($imagePath) ? $imagePath : null,
            'address' => $request->input('address'),
            'opening_time' => $request->input('opening_time'),
            'closing_time' => $request->input('closing_time'),
            'second_address' => $request->input('second_address'),
            'telephone' => $request->input('telephone'),
            'iframe_src' => $request->input('iframe_src'),
            'iframe_width' => $request->input('iframe_width'),
            'iframe_height' => $request->input('iframe_height'),
        ]);

        // Redirect to the desired page or show success message
        return redirect()->route('admin.outlets.index')->with('success', 'Outlet created successfully');
    }

    public function edit(Outlet $outlet)
    {
        $settings = WebsiteSetting::first();
        return view('admin.outlets.edit', compact('outlet', 'settings'));
    }

    public function update(Request $request, Outlet $outlet)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'outlet_name' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|dimensions:width=1280,height=960|max:2048',
            'address' => 'required|string',
            'opening_time' => 'required',
            'closing_time' => 'required',
            'second_address' => 'required|string',
            'telephone' => 'required|numeric',
            'iframe_src' => 'required|string',
            'iframe_width' => 'required|integer',
            'iframe_height' => 'required|integer',
        ], [
            'image.dimensions' => 'The image dimensions must be 1280x960 pixels.',
        ]);

        // If validation fails, redirect back with error messages
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the outlet
        $outlet->update([
            'outlet_name' => $request->input('outlet_name'),
            'address' => $request->input('address'),
            'opening_time' => $request->input('opening_time'),
            'closing_time' => $request->input('closing_time'),
            'second_address' => $request->input('second_address'),
            'telephone' => $request->input('telephone'),
            'iframe_src' => $request->input('iframe_src'),
            'iframe_width' => $request->input('iframe_width'),
            'iframe_height' => $request->input('iframe_height'),
        ]);

        // Handle image update
        if ($request->hasFile('image')) {
            // Delete the old image from storage
            if ($outlet->image) {
                Storage::disk('public')->delete($outlet->image);
            }

            // Upload the new image
            $imagePath = $request->file('image')->store('outlets', 'public');
            $outlet->image = $imagePath;
            $outlet->save();
        }

        // Redirect to the desired page or show success message
        return redirect()->route('admin.outlets.index')->with('success', 'Outlet updated successfully');
    }

    public function destroy(Outlet $outlet)
    {
        // Delete the outlet image from storage
        if ($outlet->image) {
            Storage::disk('public')->delete($outlet->image);
        }

        // Delete the outlet
        $outlet->delete();

        // Redirect to the desired page or show success message
        return redirect()->route('admin.outlets.index')->with('success', 'Outlet deleted successfully');
    }
}
