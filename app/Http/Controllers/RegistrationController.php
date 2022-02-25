<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
    public function deleteRegistration(Registration $registration, Events $event){
        if(Gate::denies('delete-registration', $registration) && Auth::user()->name != "admin"){
            return view('_partials.no-permission');
        }
        else {$registration->delete();}
        return redirect('/confirm-registration');
    }
    public function storeStatus(Registration $registration, Request $request){
        Registration::where('id', $registration->id)->update(['status' => true]);
        return redirect('/confirm-registration');
    }
    public function cancelStatus(Registration $registration, Request $request){
        Registration::where('id', $registration->id)->update(['status' => false]);
        return redirect('/confirm-registration');
    }
}
