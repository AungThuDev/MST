<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;


class AwardController extends Controller
{

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'image' => 'required|image|mimes:png,jpg,jpeg'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $awards = Award::query();

            return DataTables::of($awards)

                ->editColumn("image", function ($e) {
                    $path = "/award/{$e->image}";
                    return '<img style="width: 125px;" src="' . $path . '">';
                })

                ->editColumn('created_at', function ($e) {
                    return Carbon::parse($e->created_at)->format("F j, Y, g:i a");
                })

                ->addColumn('action', function ($a) {

                    $detail = '<a href=" ' . route('admin.award.show', $a->id) . '" class="btn btn-primary" style="margin-right: 10px;">Detail</a>';
                    $edit = '<a href=" ' . route('admin.award.edit', $a->id) . '" class="btn btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="javascript:void(0)" class="deleteButton btn btn-danger" record="award" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $detail . $edit . $delete . '</div>';
                })->rawColumns(['action', 'image'])->make(true);
        }

        return view("backend.award.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.award.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);

        $award = new Award;

        $award->title = $validated['title'];
        $award->description = $validated['description'];

        $image = $request->file('image');
        $image_name = uniqid() . $image->getClientOriginalName();
        $image->move(public_path('award'), $image_name);

        $award->image = $image_name;

        $award->save();

        return view('backend.award.index')->with('success', 'Success: Award added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function show(Award $award)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function edit(Award $award)
    {
        return view("backend.award.edit", compact("award"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Award $award)
    {
        $validated = $request->validate($this->rules);
        // if($request->has('image')) {
        //     if(File::exists(public_path()))
        // } 
        $award->update($validated);
        return view('backend.award.index')->with('success', "Award updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Award  $award
     * @return \Illuminate\Http\Response
     */
    public function destroy(Award $award)
    {
        $image_path = "/award/{$award->image}";
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }
        $award->delete();
        return response()->json(['status' => "no"]);
    }
}
