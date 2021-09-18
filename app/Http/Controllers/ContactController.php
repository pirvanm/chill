<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests;
use App\Mail\ContactRequest;
use App\Models\Contact;
use App\Models\ContactUs;
use Mail;

class ContactController extends Controller
{
    public function contact()
    {

        dd('more');
        return view('emails.contactUS');
    }
    /** * Show the application dashboard. * * @return \Illuminate\Http\Response */
    public function contactUSPost(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        Mail::to('whisperchill4@gmail.com')->send(new ContactRequest($contact));
        return response()->json(['success' => 'Thanks for contacting us!']);
    }
}
