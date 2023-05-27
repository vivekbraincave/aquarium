<?php

namespace App\Http\Controllers;
use App\Models\ContactForm;
use App\Models\Outlet;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\PagesBanner;


class ContactUsFormController extends Controller
{
    public function contact()
    {
        $outlets = Outlet::all();
        $settings = WebsiteSetting::first();
        $banner = PagesBanner::first();
        return view('contact', compact('outlets', 'settings', 'banner'));
    }

    public function ContactUsForm(Request $request)
    {
        // Validating the form
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'message' => 'required'
        ]);

        // Save form data into the database
        ContactForm::create($validatedData);

        // Send mail to admin
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('mobile_number'),
            'user_query' => $request->input('message'),
        ];

        Mail::send('mail', $data, function ($message) use ($request) {
            $message->from($request->input('email'));
            $message->to('vivekpandey12865@gmail.com')->subject('Contact Form Submission');
        });        

        // Return back with success message
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
