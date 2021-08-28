<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Requests;
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
            'message' => 'required',
        ]);
        // $this->validate($request, ['name' => 'required', 'email' => 'required|email', 'message' => 'required']);

        // ContactUs::create($request->all());


        Mail::send(
            'emails.email',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ),
            function ($message) {
                $message->from('saquib.gt@gmail.com');
                $message->to('saquib.rizwan@cloudways.com', 'Admin')->subject('Cloudways Feedback');
            }
        );
        return response()->json(['success' => 'Thanks for contacting us!']);
    }
}
