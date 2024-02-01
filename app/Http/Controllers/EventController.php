<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\CampusContent;
use App\Models\Event;
use App\Models\Info;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $event_banner = Banner::where('page', 'events')->first();
        $events = Event::latest()->paginate(4);
        $campus1 = CampusContent::with('phones')->where('id', 1)->first();

        $phoneNumber1 = $campus1->phones->pluck('number')->first();
    
        $campus = CampusContent::with('phones')->get();
    
        $email = Info::where('name', 'email')->pluck('link')->first();
        
        $facebook = Info::where('name', 'facebook')->pluck('link')->first();
    
        $youtube = Info::where('name', 'youtube')->pluck('link')->first();
    
        $linkedin = Info::where('name', 'linkedin')->pluck('link')->first();
    
        return view('frontend.events', 
        compact(
            'event_banner', 
            'events',
            'email',
            'facebook',
            'youtube',
            'linkedin',
            'campus',
            'phoneNumber1'
        ));
    }

    public function detail($id)
    {
        $event_banner = Banner::where('page', 'events')->first();
        $event = Event::where('id', $id)->first();
        $events = Event::latest()->paginate(3);
        $campus1 = CampusContent::with('phones')->where('id', 1)->first();

        $phoneNumber1 = $campus1->phones->pluck('number')->first();
    
        $campus = CampusContent::with('phones')->get();
    
        $email = Info::where('name', 'email')->pluck('link')->first();
        
        $facebook = Info::where('name', 'facebook')->pluck('link')->first();
    
        $youtube = Info::where('name', 'youtube')->pluck('link')->first();
    
        $linkedin = Info::where('name', 'linkedin')->pluck('link')->first();


        if(!$event)
        {
            return redirect('/event')->with('error', 'Event not found');
        }
    
        return view('frontend.events-detail', 
        compact(
            'event', 
            'event_banner', 
            'events',
            'email',
            'facebook',
            'youtube',
            'linkedin',
            'campus',
            'phoneNumber1'
        ));
    }
}
