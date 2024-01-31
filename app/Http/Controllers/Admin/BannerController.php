<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $banners = Banner::query();

            return DataTables::of($banners)

                ->editColumn("image", function ($e) {
                    $path = "/banners/{$e->image}";
                    return '<img style="width: 125px;" src="' . $path . '">';
                })

                ->addColumn('action', function ($a) {

                    $edit = '<a href=" ' . route('admin.banner.edit', $a->id) . '" class="btn btn-sm mt-4" style="margin-right: 10px;background-color: yellow;">Edit</a>';
                    $delete = '<a href="javascript:void(0)" class="deleteButton btn btn-danger btn-sm mt-4" record="award" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">'  . $edit . $delete . '</div>';
                })->rawColumns(['action', 'image'])->make(true);
        }

        return view("admin.banner.index");
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'page_type' => 'required|unique:banners,page',
            'page_banner' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $image = $request->file('page_banner');
        $image_name = uniqid() . $image->getClientOriginalName();
        $image->move(public_path('banners'), $image_name);

        Banner::create([
            'page' => $request->page_type,
            'image' => $image_name
        ]);

        return redirect()->route('admin.banner.index')->with('create', ucwords($request->page_type) . ' Banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
        $request->validate([
            'page_type' => 'required'
        ]);

        if($request->file('page_banner'))
        {
            unlink(public_path('/banners/' . $banner->image));
            $image = $request->file('page_banner');
            $image_name = uniqid() . $image->getClientOriginalName();
            $image->move(public_path('banners'), $image_name);
        }
        else
        {
            $image_name = $banner->image;
        }

        $banner->update([
            'page' => $request->page_type,
            'image' => $image_name
        ]);

        return redirect()->route('admin.banner.index')->with('update', ucwords($request->page_type) . ' Banner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {

        $banner->delete();
        unlink(public_path('/banners/' . $banner->image));

        return 'success';
    }
}
