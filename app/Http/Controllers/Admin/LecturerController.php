<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class LecturerController extends Controller
{
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

                    $edit = '<a href=" ' . route('admin.lecturer.edit', $a->id) . '" class="btn btn-sm m-1" style="background-color: yellow;">Edit</a>';
                    $delete = '<a href="javascript:void(0)" class="deleteButton btn btn-sm btn-danger m-1" record="lecturer" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $edit . $delete . '</div>';
                })
                ->rawColumns(['action', 'image', 'position'])->make(true);
        }
        return view("backend.lecturer.index");
    }

    public function create()
    {
        return view("backend.lecturer.create");
    }

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
        return redirect()->route('admin.lecturer.index')->with('create', "Lecturer");
    }

    public function show(Lecturer $lecturer)
    {

    }

    public function edit(Lecturer $lecturer)
    {
        return view('backend.lecturer.edit', compact('lecturer'));
    }

    public function update(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->has('image')) {

            unlink(public_path('/lecturer/' . $lecturer->image));

            $image = $request->file("image");
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path("lecturer"), $image_name);
            $validated['image'] = $image_name;
        }
        $lecturer->update($validated);
        return redirect()->route('admin.lecturer.index')->with('update', "Lecturer");
    }

    public function destroy(Lecturer $lecturer)
    {
        unlink(public_path('/lecturer/' . $lecturer->image));

        $lecturer->delete();

        return 'success';
    }
}
