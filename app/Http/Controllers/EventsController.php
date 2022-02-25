<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['index', 'aboutDash', 'contactsDash', 'eventsDash', 'moreInformation', 'registerForEvent', 'showEvents']]);
    }
    public function index(Request $request){
        $events = Events::simplePaginate(3);
        return view('pages.home', compact('events'));
    }
    public function eventsDash(Request $request){
        $events = Events::simplePaginate(6);
        return view('pages.events.events-dashboard', compact('events'));
    }
    public function addEvent(){
        return view('pages.events.add-event');
    }
    public function aboutDash(){
        return view('pages.about.about');
    }
    public function contactsDash(Request $request){
        $events = Events::all();
        return view('pages.contacts.contacts', compact('events'));
    }
    public function showEvents(Request $request){
        $events = Events::all();
        return view('pages.events.show-events', compact('events'));
    }
    public function moreInformation(Events $event){
        return view('pages.events.more-information', compact('event'));
    }
    public function storeEvent(Request $request){

        $validated = $request->validate([
            'title'=> 'required|unique:events|max:255',
            'date'=> 'required',
            'logo' => 'mimes:jpeg,jpg,png,gif'

        ]);
        if(request()->hasFile('logo')) {
            $path = $request->file('logo')->store('public/images');
            $fileName = str_replace('public/', '', $path);
        }
        else $fileName = "";
        Events::create([
            'title' =>request('title'),
            'date' =>request('date'),
            'description' =>request('description'),
            'logo' => $fileName,
            'user_id'=>Auth::id(),
        ]);
        return redirect('/events-dashboard');
    }
    public function registerForEvent(Events $event){
        return view('pages.events.registration', compact('event'));
    }
    public function yourEvents(Request $request){
        $events = Events::all();
        return view('pages.update.your-events', compact('events'));
    }
    public function updateEvent(Events $event){
        if(Gate::denies('update-event', $event) && Auth::user()->name != "admin"){
            return view('_partials.no-permission');
        }
        return view('pages.update.update-event', compact('event'));
    }
    public function storeUpdate(Events $event, Request $request){
        if($event->logo){
            File::delete(storage_path('app/public/'.$event->logo));
        }
        if(request()->hasFile('logo')){
            $path = $request->file('logo')->store('public/images');
            $fileName = str_replace('public/','',$path);
            Events::where('id',$event->id)->update(['logo'=>$fileName]);
        }
        Events::where('id', $event->id)->update($request->only(['title', 'date', 'description']));
        return redirect('/your-events');
    }
    public function deleteEvent(Events $event){
        if(Gate::denies('delete-event', $event) && Auth::user()->name != "admin"){
            return view('_partials.no-permission');
        }
        else {$event->delete();}
        return redirect('/your-events');
    }
}
