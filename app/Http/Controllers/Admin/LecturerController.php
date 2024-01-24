<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $lecturer = Lecturer::query();

            return DataTables::of($lecturer)

                ->editColumn("position", function ($e) {
                    if (Str::length($e->position) > 30) {
                        $position = substr($e->position, 0, 20) . "...";
                    } else {
                        $position = $e->position;
                    }
                    return '<p>' . $position . '</p>';
                })

                ->editColumn("image", function ($e) {
                    $path = "/lecturer/{$e->image}";
                    return '<img style="width: 125px;" src="' . $path . '">';
                })

                ->editColumn('created_at', function ($e) {
                    return Carbon::parse($e->created_at)->format("F j, Y, g:i a");
                })

                ->addColumn('action', function ($a) {

                    $edit = '<a href=" ' . route('admin.lecturer.edit', $a->id) . '" class="btn btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="javascript:void(0)" class="deleteButton btn btn-danger" record="lecturer" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $edit . $delete . '</div>';
                })

                ->rawColumns(['action', 'image', 'position'])->make(true);
        }
        return view("backend.lecturer.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.lecturer.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $lecturer = new Lecturer;
        $lecturer->name = $validated['name'];
        $lecturer->position = $validated['position'];

        $image = $request->file('image');
        $image_name = uniqid() . $image->getClientOriginalName();
        $image->move(public_path('lecturer'), $image_name);

        $lecturer->image = $image_name;
        $lecturer->save();
        return redirect()->back()->with('create', "Lecturer");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        return view('backend.lecturer.edit', compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->has('image')) {
            $image_path = "/lecturer/{$lecturer->image}";
            if (File::exists(public_path($image_path))) {
                File::delete(public_path($image_path));
            }
            $image = $request->file("image");
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path("lecturer"), $image_name);
            $validated['image'] = $image_name;
        }
        $lecturer->update($validated);
        return redirect()->back()->with('update', "Lecturer");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        $image_path = "/lecturer/{$lecturer->image}";
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }
        $lecturer->delete();
        return response()->json(['status' => 1]);
    }
}
