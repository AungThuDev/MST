<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class EventController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $events = Event::query();

            return DataTables::of($events)
                ->editColumn("featured_image", function ($e) {
                    $path = "/events/{$e->featured_image}";
                    return '<img style="width: 125px;" src="' . $path . '">';
                })
                ->editColumn('created_at', function ($e) {
                    return Carbon::parse($e->created_at)->format("F j, Y, g:i a");
                })
                ->addColumn('action', function ($a) {

                    $detail = '<a href=" ' . route('admin.event.show', $a->id) . '" class="btn btn-sm btn-primary m-1">Detail</a>';
                    $edit = '<a href=" ' . route('admin.event.edit', $a->id) . '" class="btn btn-sm m-1" style="background-color: yellow;">Edit</a>';
                    $delete = '<a href="javascript:void(0)" class="deleteButton btn btn-sm btn-danger m-1" record="award" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $detail . $edit . $delete . '</div>';
                })->rawColumns(['action', 'featured_image'])->make(true);
        }

        return view("admin.events.index");

    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'featured_image' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $featured_image = $request->file('featured_image');
        $featured_image_name = uniqid() . $featured_image->getClientOriginalName();
        $featured_image->move(public_path('events'), $featured_image_name);

        if ($request->file('content_image1')) {
            $content_image1 = $request->file('content_image1');
            $content_image1_name = uniqid() . $content_image1->getClientOriginalName();
            $content_image1->move(public_path('events'), $content_image1_name);
        } else {
            $content_image1_name = '';
        }

        if ($request->file('content_image2')) {
            $content_image2 = $request->file('content_image2');
            $content_image2_name = uniqid() . $content_image2->getClientOriginalName();
            $content_image2->move(public_path('events'), $content_image2_name);
        } else {
            $content_image2_name = '';
        }

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'featured_image' => $featured_image_name,
            'content_image1' => $content_image1_name,
            'content_image2' => $content_image2_name
        ]);

        return redirect()->route('admin.event.index')->with('create', 'Event');
    }

    public function show(Event $event)
    {
        return view('admin.events.detail', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($request->file('featured_image')) {
            unlink(public_path('/events/' . $event->featured_image));
            $featured_image = $request->file('featured_image');
            $featured_image_name = uniqid() . $featured_image->getClientOriginalName();
            $featured_image->move(public_path('events'), $featured_image_name);
        } else {
            $featured_image_name = $event->featured_image;
        }
        if ($request->file('content_image1')) {
            unlink(public_path('/events/' . $event->content_image1));
            $content_image1 = $request->file('content_image1');
            $content_image1_name = uniqid() . $content_image1->getClientOriginalName();
            $content_image1->move(public_path('events'), $content_image1_name);
        } else {
            $content_image1_name = $event->content_image1;
        }

        if ($request->file('content_image2')) {
            unlink(public_path('/events/' . $event->content_image2));
            $content_image2 = $request->file('content_image2');
            $content_image2_name = uniqid() . $content_image2->getClientOriginalName();
            $content_image2->move(public_path('events'), $content_image2_name);
        } else {
            $content_image2_name = $event->content_image2;
        }

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'featured_image' => $featured_image_name,
            'content_image1' => $content_image1_name,
            'content_image2' => $content_image2_name
        ]);

        return redirect()->route('admin.event.index')->with('update', 'Event');
    }

    public function destroy(Event $event)
    {
        $event->delete();

//        unlink(public_path('/events/' . $event->featured_image));
//        unlink(public_path('/events/' . $event->content_image1));
//        unlink(public_path('/events/' . $event->content_image2));

        return 'success';
    }
}
