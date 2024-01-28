<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class PartnerController extends Controller
{
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

                    $edit = '<a href=" ' . route('admin.partner.edit', $a->id) . '" class="btn btn-sm mt-1" style="background-color:yellow;">Edit</a>';
                    $delete = '<a href="javascript:void(0)" class="deleteButton btn btn-sm btn-danger m-1" record="partner" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $edit . $delete . '</div>';
                })
                ->rawColumns(['action', 'image', 'description'])->make(true);
        }

        return view('backend.partners.index');
    }

    public function create()
    {
        return view('backend.partners.create');
    }

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
        return redirect()->route('admin.partner.index')->with('create', "Partner");
    }

    public function show(Partner $partner)
    {

    }

    public function edit(Partner $partner)
    {
        return view("backend.partners.edit", compact("partner"));
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        if ($request->has('image')) {
            $image_path = "/partner/{$partner->image}";

            unlink(public_path('/partner/' . $partner->image));

            $image = $request->file("image");
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path("partner"), $image_name);
            $validated['image'] = $image_name;
        }
        $partner->update($validated);
        return redirect()->route('admin.partner.index')->with('update', "Partner");
    }

    public function destroy(Partner $partner)
    {

        unlink(public_path('/partner/' . $partner->image));

        $partner->delete();

        return 'success';
    }
}
