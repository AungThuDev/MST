<?php

namespace App\Http\Controllers;

use App\Models\Principal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
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
                    return Carbon::parse($a->created_at)->format("Y-m-d H:i:s");
                })
                ->editColumn('updated_at', function ($a) {
                    return Carbon::parse($a->updated_at)->format("Y-m-d H:i:s");
                })
                ->addColumn('action', function ($a) {

                    $details = "<a href='/admin/principal/$a->id' class='btn btn-sm btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" ' . route('admin.principal.edit', $a->id) . '" class="btn btn-sm btn-success" style="margin-right: 10px;">Edit</a>';

                    return '<div class="action">' . $details . $edit  . '</div>';

                })->rawColumns(['action', 'home_image'])->make(true);
        }

        return view('admin.principal.index');
    }

    public function create()
    {
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
        $home_image_name = PrincipalController . phpuniqid() . $home_image->getClientOriginalName();
        $home_image->move(public_path('principal'), $home_image_name);

        $validated['home_image'] = $home_image_name;

        $faculty_image = $request->file('faculty_image');
        $faculty_image_name = PrincipalController . phpuniqid() . $faculty_image->getClientOriginalName();
        $faculty_image->move(public_path('principal'), $faculty_image_name);

        $validated['faculty_image'] = $faculty_image_name;

        Principal::create($validated);

        return redirect('/admin/principal')->with('success', 'Principal created successfully');
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
            $home_image_name = PrincipalController . phpuniqid() . $home_image->getClientOriginalName();
            $home_image->move(public_path('principal'), $home_image_name);

            $validated['home_image'] = $home_image_name;
        }

        if ($request->file('faculty_image')) {
            unlink(public_path('/principal/' . $principal->faculty_image));

            $faculty_image = $request->file('faculty_image');
            $faculty_image_name = PrincipalController . phpuniqid() . $faculty_image->getClientOriginalName();
            $faculty_image->move(public_path('principal'), $faculty_image_name);

            $validated['faculty_image'] = $faculty_image_name;
        }

        $principal->update($validated);

        return redirect(route('admin.principal.show', $principal->id))->with('success', 'Principal updated successfully');
    }


}
