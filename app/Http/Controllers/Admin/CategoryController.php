<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::query();

            return DataTables::of($categories)
                ->editColumn("image", function ($e) {
                    $path = "/categories/{$e->image}";
                    return '<img style="max-width: 125px;" src="' . $path . '">';
                })
                ->editColumn('created_at', function ($a) {
                    return Carbon::parse($a->created_at)->format("Y-m-d H:i:s");
                })
                ->editColumn('updated_at', function ($a) {
                    return Carbon::parse($a->updated_at)->format("Y-m-d H:i:s");
                })
                ->addColumn('action', function ($a) {

                    $edit = '<a href=" ' . route('admin.categories.edit', $a->id) . '" class="btn btn-sm btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deleteCategoriesButton btn btn-sm btn-danger" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $edit . $delete . '</div>';

                })->rawColumns(['action', 'image'])->make(true);
        }

        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'required|image'
        ]);

        $image = $request->file('image');
        $image_name =  uniqid() . $image->getClientOriginalName();
        $image->move(public_path('categories'), $image_name);

        $validated['image'] = $image_name;

        Category::create($validated);

        return redirect('/admin/categories')->with('create', 'Programme category');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'image'
        ]);

        if ($request->file('image')) {
            unlink(public_path('/categories/' . $category->image));

            $image = $request->file('image');
            $image_name =  uniqid() . $image->getClientOriginalName();
            $image->move(public_path('categories'), $image_name);

            $validated['image'] = $image_name;
        }

        $category->update($validated);

        return redirect(route('admin.categories.index'))->with('update', 'Category');
    }

    public function destroy(Category $category)
    {
        unlink(public_path('/categories/' . $category->image));

        $category->delete();

        return 'success';
    }
}
