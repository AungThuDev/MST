<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\File;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $partner = Partner::query();

            return DataTables::of($partner)

                ->editColumn("description", function ($e) {
                    if (Str::length($e->description) > 20) {
                        $description = substr($e->description, 0, 30) . "...";
                    } else {
                        $description = $e->description;
                    }
                    return '<p>' . $description . '</p>';
                })

                ->editColumn("image", function ($e) {
                    $path = "/partner/{$e->image}";
                    return '<img style="width: 125px;" src="' . $path . '">';
                })

                ->editColumn('created_at', function ($e) {
                    return Carbon::parse($e->created_at)->format("F j, Y, g:i a");
                })

                ->addColumn('action', function ($a) {

                    $edit = '<a href=" ' . route('admin.partner.edit', $a->id) . '" class="btn btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="javascript:void(0)" class="deleteButton btn btn-danger" record="partner" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $edit . $delete . '</div>';
                })

                ->rawColumns(['action', 'image','description'])->make(true);
        }

        return view('backend.partners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.partners.create');
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
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);
        $partner = new Partner;
        $partner->name = $validated['name'];
        $partner->description = $validated['description'];

        $image = $request->file('image');
        $image_name = uniqid() . $image->getClientOriginalName();
        $image->move(public_path('partner'), $image_name);

        $partner->image = $image_name;
        $partner->save();
        return redirect()->back()->with('create', "Partner");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view("backend.partners.edit", compact("partner"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->has('image')) {
            $image_path = "/partner/{$partner->image}";
            if (File::exists(public_path($image_path))) {
                File::delete(public_path($image_path));
            }
            $image = $request->file("image");
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path("partner"), $image_name);
            $validated['image'] = $image_name;
        }
        $partner->update($validated);
        return redirect()->back()->with('update', "Partner");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        $image_path = "/partner/{$partner->image}";
        if (File::exists(public_path($image_path))) {
            File::delete(public_path($image_path));
        }
        $partner->delete();
        return response()->json(['status' => 1]);
    }
}
