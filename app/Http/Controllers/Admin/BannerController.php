<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banners = Banner::all();

        return view('admin.banner.index', compact('banners'));
        
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
            'page_type' => 'required',
            'page_banner' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $image = $request->file('page_banner');
        $image_name = uniqid() . $image->getClientOriginalName();
        $image->move(public_path('banners'), $image_name);

        Banner::create([
            'page' => $request->page_type,
            'image' => $image_name
        ]);

        return redirect()->back()->with('success', 'Banner created successfully');
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

        return redirect()->back()->with('success', $request->page_type . 'Banner updated');
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

        return redirect()->back()->with('success', 'Banner deleted');
    }
}
