<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Mail;

class RegistrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=>['create']]);
    }
    public function create(Request $request, Events $event){

        $validated = $request->validate([
            'fname'=> 'required|max:255',
            'email'=> 'required|min:3|max:255',
            'phone'=> 'required|regex:^\+\d{3,3} *\d{3,3} *\d{5,5}$^|min:6|max:20',

        ]);
        Registration::create([
            'fname' =>request('fname'),
            'email' =>request('email'),
            'phone' =>request('phone'),
            'status'=>false,
            'event_id'=> $event->id,

        ]);
        return back();
    }

    public function confirmRegistration(Request $request){
        $events_id = Events::pluck('id')->toArray();
        $events_title = Events::pluck('title')->toArray();
        $registrations = Registration::all();
        $events = Events::all();
        return view('pages.registration.confirm-registration', compact('registrations', 'events_id', 'events_title', 'events'));
    }
    public function deleteRegistration(Registration $registration){
        $data = array('name'=> $registration->fname);
        Mail::send('pages.email.mail-cancel', $data, function($message) use ($registration) {
            $message->to($registration->email, $registration->fname)->subject
            ('Event registration canceled');
            $message->from(Auth::user()->email, Auth::user()->name);
        });
        $registration->delete();
        return redirect('/confirm-registration');
    }
    public function storeStatus(Registration $registration, Request $request){
        $data = array('name'=> $registration->fname);
        Mail::send('pages.email.mail', $data, function($message) use ($registration) {
            $message->to($registration->email, $registration->fname)->subject
            ('Event registration confirmed');
            $message->from(Auth::user()->email, Auth::user()->name);
        });
        Registration::where('id', $registration->id)->update(['status' => true]);
        return redirect('/confirm-registration');
    }
    public function cancelStatus(Registration $registration, Request $request){
        $data = array('name'=> $registration->fname);
        Mail::send('pages.email.mail-uncheck', $data, function($message) use ($registration) {
            $message->to($registration->email, $registration->fname)->subject
            ('Event registration unconfirmed');
            $message->from(Auth::user()->email, Auth::user()->name);
        });
        Registration::where('id', $registration->id)->update(['status' => false]);
        return redirect('/confirm-registration');
    }
}
