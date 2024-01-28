<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProgrammePage;
use Illuminate\Http\Request;

class ProgrammePageController extends Controller
{
    public function index()
    {
        $programmePage = ProgrammePage::first();

        if ($programmePage) {
            return redirect(route('admin.programme_page.show', $programmePage->id));
        } else {
            return redirect('/admin/programme_page/create');
        }
    }

    public function show(ProgrammePage $programmePage)
    {
        return view('admin.programme_page.show', [
            'programmePage' => $programmePage
        ]);
    }

    public function create()
    {
        return view('admin.programme_page.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image',
            'courses' => 'required|numeric',
            'classes' => 'required|numeric',
            'students' => 'required|numeric',
            'diplomas' => 'required|numeric'
        ]);

        $image = $request->file('image');
        $image_name = uniqid() . $image->getClientOriginalName();
        $image->move(public_path('programme_page'), $image_name);

        $validated['image'] = $image_name;

        ProgrammePage::create($validated);

        return redirect('/admin/programme_page')->with('create', 'Programme page content');
    }

    public function edit(ProgrammePage $programmePage)
    {
        return view('admin.programme_page.edit', [
            'programmePage' => $programmePage
        ]);
    }

    public function update(Request $request, ProgrammePage $programmePage)
    {
        $validated = $request->validate([
            'image' => 'image',
            'courses' => 'required|numeric',
            'classes' => 'required|numeric',
            'students' => 'required|numeric',
            'diplomas' => 'required|numeric'
        ]);

        if ($request->file('image')) {
            unlink(public_path('/programme_page/' . $programmePage->image));

            $image = $request->file('image');
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('programme_page'), $image_name);

            $validated['image'] = $image_name;
        }

        $programmePage->update($validated);

        return redirect(route('admin.programme_page.edit', $programmePage->id))->with('update', 'Programme page content');
    }


}
