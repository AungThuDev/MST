<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Principal;
use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class ProgrammeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $programmes = Programme::query();

            return DataTables::of($programmes)
                ->editColumn("image", function ($e) {
                    $path = "/programmes/{$e->image}";
                    return '<img style="max-width: 125px;" src="' . $path . '">';
                })

                ->editColumn('category_id', function ($a) {
                    return Category::find($a->category_id)->name;
                })

                ->editColumn('created_at', function ($a) {
                    return Carbon::parse($a->created_at)->format("Y-m-d H:i:s");
                })
                ->editColumn('updated_at', function ($a) {
                    return Carbon::parse($a->updated_at)->format("Y-m-d H:i:s");
                })
                ->addColumn('action', function ($a) {

                    $details = "<a href='/admin/programmes/$a->id' class='btn btn-sm btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" ' . route('admin.programmes.edit', $a->id) . '" class="btn btn-sm btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deleteProgrammesButton btn btn-sm btn-danger" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';

                })->rawColumns(['action', 'image'])->make(true);
        }

        return view('admin.programmes.index');
    }


    public function create()
    {
        return view('admin.programmes.create', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'duration' => 'required',
            'link' => 'required'
        ]);

        $image = $request->file('image');
        $image_name = uniqid() . $image->getClientOriginalName();
        $image->move(public_path('programmes'), $image_name);

        $validated['image'] = $image_name;

        Programme::create($validated);

        return redirect('/admin/programmes')->with('success', 'Programme created successfully');
    }

    public function show(Programme $programme)
    {
        return view('admin.programmes.show', [
            'programme' => $programme
        ]);
    }

    public function edit(Programme $programme)
    {
        return view('admin.programmes.edit', [
            'programme' => $programme,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Programme $programme)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'image',
            'description' => 'required',
            'duration' => 'required',
            'link' => 'required'
        ]);

        if ($request->file('image')) {
            unlink(public_path('/programmes/' . $programme->image));

            $image = $request->file('image');
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('programmes'), $image_name);

            $validated['image'] = $image_name;
        }

        $programme->update($validated);

        return redirect(route('admin.programmes.show', $programme->id))->with('success', 'Programme updated successfully');
    }

    public function destroy(Programme $programme)
    {
        unlink(public_path('/programmes/' . $programme->image));

        $programme->delete();

        return 'success';
    }
}
