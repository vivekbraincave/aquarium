<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\WebsiteSetting;
use DB;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:brands-list', ['only' => ['index']]);
        $this->middleware('permission:brands-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:brands-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:brands-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $brands = Brand::all();
        $settings = WebsiteSetting::first();
        return view('admin.brands.index', compact('brands', 'settings'));        
    }

    public function create()
    {
        $settings = WebsiteSetting::first();
        return view('admin.brands.create', compact('settings'));
    }

    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle the brand image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/brands'), $imageName);
            $validatedData['image'] = $imageName;
        }

        // Set the brand status
        $status = $request->has('status') ? 'visible' : 'hidden';

        // Create the brand
        $brand = new Brand;
        $brand->name = $validatedData['name'];
        $brand->image = $validatedData['image'];
        $brand->status = $status;
        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand added successfully');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $settings = WebsiteSetting::first();
        return view('admin.brands.edit', compact('brand', 'settings'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find the brand by ID
        $brand = Brand::findOrFail($id);

        // Update the brand name
        $brand->name = $validatedData['name'];

        // Handle the brand image upload
        if ($request->hasFile('image')) {
            // Delete the old image from the path
            if ($brand->image) {
                $oldImagePath = public_path('images/brands/' . $brand->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/brands'), $imageName);
            $brand->image = $imageName;
        }

        // Set the brand status
        $status = $request->has('status') ? 'visible' : 'hidden';
        $brand->status = $status;

        $brand->save();

        return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully');
    }

    public function destroy($id)
    {
        // Find the brand by ID
        $brand = Brand::findOrFail($id);

        // Delete the brand image from the path
        if ($brand->image) {
            $imagePath = public_path('images/brands/' . $brand->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the brand
        $brand->delete();

        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully');
    }



}
