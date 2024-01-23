<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.homepage.create');
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
            'vision' => 'required',
            'mission' => 'required',
            'about_title' => 'required',
            'about_text' => 'required',
            'about_image_one' => 'required|mimes:png,jpg,jpeg',
            'about_image_two' => 'required|mimes:png,jpg,jpeg',
            'eval_title' => 'required',
            'eval_image' => 'required|mimes:png,jpg,jpeg',
            'eval_text' => 'required',
            'progress_one' => 'required',
            'progress_one_percent' => 'required|numeric',
            'progress_two' => 'required',
            'progress_two_percent' => 'required|numeric',
            'progress_three' => 'required',
            'progress_three_percent' => 'required|numeric',
            'course_text' => 'required'
        ]);

        $about_image_one = $request->file('about_image_one');
        $about_image_one_name = uniqid() . $about_image_one->getClientOriginalName();
        $about_image_one->move(public_path('images', $about_image_one_name));

        $about_image_two = $request->file('about_image_two');
        $about_image_two_name = uniqid() . $about_image_two->getClientOriginalName();
        $about_image_two->move(public_path('images', $about_image_two_name));

        $eval_image = $request->file('eval_image');
        $eval_image_name = uniqid() . $eval_image->getClientOriginalName();
        $eval_image->move(public_path('images', $eval_image_name));

        HomePage::create([
            'vision' => $request->vision,
            'mission' => $request->mission,
            'about_title' => $request->about_title,
            'about_text' => $request->about_text,
            'about_image_one' => $about_image_one_name,
            'about_image_two' => $about_image_two_name,
            'eval_title' => $request->eval_title,
            'eval_image' => $eval_image_name,
            'eval_text' => $request->eval_text,
            'prograss1' => $request->progress_one,
            'prograss1_percent' => $request->progress_one_percent,
            'prograss2' => $request->progress_two,
            'prograss2_percent' => $request->progress_two_percent,
            'prograss3' => $request->progress_three,
            'prograss3_percent' => $request->progress_three_percent,
            'course_text' => $request->course_text
        ]);

        return redirect()->back()->with('success', 'Home Page created Successfully');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
