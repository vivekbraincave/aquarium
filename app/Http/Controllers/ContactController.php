<?php

namespace App\Http\Controllers;
use App\Models\ContactForm;
use App\Models\WebsiteSetting;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:contact-list', ['only' => ['index']]);
        $this->middleware('permission:contact-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $contacts = ContactForm::all();
        $settings = WebsiteSetting::first();
        return view('admin.contacts.index', compact('contacts', 'settings'));
    }

    // delete message
    public function destroy($id)
    {
        $contact = ContactForm::findOrFail($id);
        $contact->delete();

        return back()->with('success', 'Contact message deleted successfully.');
    }
}
