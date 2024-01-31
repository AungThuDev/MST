<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function index()
    {
        $event_banner = Banner::where('page', 'events')->first();
        $events = Event::latest()->paginate(4);
    
        return view('frontend.events', compact('event_banner', 'events'));
    }

    public function detail($id)
    {
        $event_banner = Banner::where('page', 'events')->first();
        $event = Event::where('id', $id)->first();
        $events = Event::latest()->paginate(3);


        if(!$event)
        {
            return redirect('/event')->with('error', 'Event not found');
        }
    
        return view('frontend.events-detail', compact('event', 'event_banner', 'events'));
    }
}
