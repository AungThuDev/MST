<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Principal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class PrincipalController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $principal = Principal::query();

            return DataTables::of($principal)
                ->editColumn("home_image", function ($e) {
                    $path = "/principal/{$e->home_image}";
                    return '<img style="max-width: 125px;" src="' . $path . '">';
                })
                ->editColumn('created_at', function ($a) {
                    return \Carbon\Carbon::parse($a->created_at)->format("F j, Y, g:i a");
                })
                ->addColumn('action', function ($a) {

                    $details = "<a href='/admin/principal/$a->id' class='btn btn-sm btn-primary m-1' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" ' . route('admin.principal.edit', $a->id) . '" class="btn btn-sm m-1" style="background-color: yellow">Edit</a>';

                    return '<div class="action">' . $details . $edit . '</div>';

                })->rawColumns(['action', 'home_image'])->make(true);
        }

        return view('admin.principal.index');
    }

    public function create()
    {
        if (Principal::count() > 0) {
            return redirect('/admin/principal');
        }

        return view('admin.principal.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'home_image' => 'required|image',
            'message' => 'required',
            'faculty_image' => 'required|image',
            'faculty_text' => 'required'
        ]);

        $home_image = $request->file('home_image');
        $home_image_name = uniqid() . $home_image->getClientOriginalName();
        $home_image->move(public_path('principal'), $home_image_name);

        $validated['home_image'] = $home_image_name;

        $faculty_image = $request->file('faculty_image');
        $faculty_image_name = uniqid() . $faculty_image->getClientOriginalName();
        $faculty_image->move(public_path('principal'), $faculty_image_name);

        $validated['faculty_image'] = $faculty_image_name;

        Principal::create($validated);

        return redirect('/admin/principal')->with('create', 'Principal');
    }

    public function show(Principal $principal)
    {
        return view('admin.principal.show', [
            'principal' => $principal
        ]);
    }

    public function edit(Principal $principal)
    {
        return view('admin.principal.edit', [
            'principal' => $principal
        ]);
    }

    public function update(Request $request, Principal $principal)
    {
        $validated = $request->validate([
            'name' => 'required',
            'home_image' => 'image',
            'message' => 'required',
            'faculty_image' => 'image',
            'faculty_text' => 'required'
        ]);

        if ($request->file('home_image')) {
            unlink(public_path('/principal/' . $principal->home_image));

            $home_image = $request->file('home_image');
            $home_image_name = uniqid() . $home_image->getClientOriginalName();
            $home_image->move(public_path('principal'), $home_image_name);

            $validated['home_image'] = $home_image_name;
        }

        if ($request->file('faculty_image')) {
            unlink(public_path('/principal/' . $principal->faculty_image));

            $faculty_image = $request->file('faculty_image');
            $faculty_image_name = uniqid() . $faculty_image->getClientOriginalName();
            $faculty_image->move(public_path('principal'), $faculty_image_name);

            $validated['faculty_image'] = $faculty_image_name;
        }

        $principal->update($validated);

        return redirect(route('admin.principal.show', $principal->id))->with('update', 'Principal');
    }


}
