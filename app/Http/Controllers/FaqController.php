<?php

namespace App\Http\Controllers;
use App\Models\FAQ;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\WebsiteSetting;
use DB;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:faq-list', ['only' => ['index']]);
        $this->middleware('permission:faq-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:faq-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:faq-delete', ['only' => ['destroy']]);
        $this->middleware('permission:faq-show', ['only' => ['show']]);
    }

    public function index()
    {
        $faqs = FAQ::all();
        $settings = WebsiteSetting::first();
        return view('admin.faqs.index', compact('faqs', 'settings'));
    }

    public function create()
    {
        $settings = WebsiteSetting::first();
        return view('admin.faqs.create', compact('settings'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'nullable'
        ]);

        $faq = new FAQ();
        $faq->question = $validatedData['question'];
        $faq->answer = $validatedData['answer'];
        $faq->status = $request->has('status') ? 'visible' : 'hidden'; // Set the status based on the checkbox
        $faq->save();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ created successfully');
    }

    public function show($id)
    {
        $faqs = FAQ::findOrFail($id);
        $settings = WebsiteSetting::first();
        return view('admin.faqs.show', compact('faqs', 'settings'));
    }

    // edit the FAQ

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        $settings = WebsiteSetting::first();
        return view('admin.faqs.edit', compact('faq', 'id', 'settings'));
    }

    // update the FAQ after editing

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'nullable'
        ]);

        $faq = FAQ::findOrFail($id);
        $faq->question = $validatedData['question'];
        $faq->answer = $validatedData['answer'];
        $faq->status = $request->has('status') ? 'visible' : 'hidden';
        $faq->save();

        return redirect()->route('admin.faqs.index')->with('success', 'FAQ updated successfully');
    }

    // for deleting the faq

    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();

        // redirect after deleting the FAQ
        
        return redirect()->route('admin.faqs.index')->with('success', 'FAQ deleted successfully');
    }

}
