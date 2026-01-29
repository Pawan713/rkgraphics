<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class WelcomeController extends Controller
{
    
    // index Page 
        public function index()
        {

        }


// About Us Page 
        public function aboutus()
        {
            return view('about_us');
        }


/// contactus
        public function contactus()
        {
            return view('contact_us');
        }

// Contact Us Enquery Details
        public function ContactUsEnquery(Request $request)
        {
             $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'message' => 'required',
        ]);
        // return $request;
            Contact::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);

             return redirect()->route('contact_us')->with('success', 'Enquery Successfully Submited.');
        }


 /// Pricing Of Id Card
        public function pricing()
        {
            return view('pricing');
        }



}
