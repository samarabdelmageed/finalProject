<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Category;
use App\Models\Car;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Mail\ContactMail;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __invoke(){
        return view('404');
    }

    public function home(){
        $cars = Car::where('active', 1)->latest()->take(6)->get();
        $testimonials = Testimonial::where('published', 1)->latest()->take(3)->get();
        return view('home',compact('cars','testimonials'));
    }

    public function listing(){
        $cars = Car::where('active', 1)->latest()->paginate(6);
        $testimonials = Testimonial::where('published', 1)->latest()->take(3)->get();
        return view('listing',compact('cars','testimonials'));
    }

    public function about(){
        return view('about');
    }

    public function blog(){
        return view('blog');
    }

    public function contact(){
        return view('contact');
    }

    public function testimonials(){
        $testimonials = Testimonial::where('published', 1)->latest()->get();
        return view('testimonials',compact('testimonials'));
    }

    public function dashboardHome (){
        $contacts=Contact::get();
        return view('admin.dashboardHome',compact('contacts'));
      }

    public function sendContact(Request $request)  {
        $messages = $this->errorMessages();
        $data = $request->validate([
            'firstName'=>'required|string|max:50',
            'lastName'=>'required|string|max:50',
            'email'=>'required|email',
            'message'=>'required|string',
            ], $messages);

            Contact::create($data);
            Mail::to( 'samar@example.com')->send( 
                new ContactMail($data)
            );
            Alert::success('Message Sent','Your message was sent successfully!');
            return redirect()->back();
            // return "mail sent!";
    }

    public function errorMessages(){
        return[
                'firstName.required'=>'First Name is required',
                'lastName.required'=>'Last Name is required',
                'email.required'=> 'Email is required',
                'message.required'=> 'Message is required',             
                ];
    }

}