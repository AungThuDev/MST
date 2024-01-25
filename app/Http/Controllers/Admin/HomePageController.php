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
        $check_page = HomePage::first();

        $count = HomePage::count();

        if($count == 1)
        {
            return redirect()->route('admin.homepage.edit', $check_page->id);
        }
        else if($count < 1)
        {
            return redirect()->route('admin.homepage.create');
        }
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
            'about_image_one' => 'required|image|mimes:png,jpg,jpeg',
            'about_image_two' => 'required|image|mimes:png,jpg,jpeg',
            'journey_image_one' => 'required|image|mimes:png,jpg,jpeg',
            'journey_image_two' => 'required|image|mimes:png,jpg,jpeg',
            'eval_title' => 'required',
            'eval_image' => 'required|image|mimes:png,jpg,jpeg',
            'eval_text' => 'required',
            'progress_one' => 'required',
            'progress_one_percent' => 'required|numeric|max:100',
            'progress_two' => 'required',
            'progress_two_percent' => 'required|numeric|max:100',
            'progress_three' => 'required',
            'progress_three_percent' => 'required|numeric|max:100',
            'course_text' => 'required'
        ]);

        $about_image_one = $request->file('about_image_one');
        $about_image_one_name = uniqid() . $about_image_one->getClientOriginalName();
        $about_image_one->move(public_path('homepage'), $about_image_one_name);

        $about_image_two = $request->file('about_image_two');
        $about_image_two_name = uniqid() . $about_image_two->getClientOriginalName();
        $about_image_two->move(public_path('homepage'), $about_image_two_name);

        $journey_image_one = $request->file('journey_image_one');
        $journey_image_one_name = uniqid() . $journey_image_one->getClientOriginalName();
        $journey_image_one->move(public_path('homepage'), $journey_image_one_name);

        $journey_image_two = $request->file('journey_image_two');
        $journey_image_two_name = uniqid() . $journey_image_two->getClientOriginalName();
        $journey_image_two->move(public_path('homepage'), $journey_image_two_name);

        $eval_image = $request->file('eval_image');
        $eval_image_name = uniqid() . $eval_image->getClientOriginalName();
        $eval_image->move(public_path('homepage'), $eval_image_name);

        HomePage::create([
            'vision' => $request->vision,
            'mission' => $request->mission,
            'about_title' => $request->about_title,
            'about_text' => $request->about_text,
            'about_image1' => $about_image_one_name,
            'about_image2' => $about_image_two_name,
            'journey_image1' => $journey_image_one_name,
            'journey_image2' => $journey_image_two_name,
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

        return redirect()->back()->with('create', 'Home Page');
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
    public function edit(HomePage $homepage)
    {
        //
        return view('admin.homepage.edit', compact('homepage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomePage $homepage)
    {
        //
        $request->validate([
            'vision' => 'required',
            'mission' => 'required',
            'about_title' => 'required',
            'about_text' => 'required',
            'eval_title' => 'required',
            'eval_text' => 'required',
            'progress_one' => 'required',
            'progress_one_percent' => 'required|numeric',
            'progress_two' => 'required',
            'progress_two_percent' => 'required|numeric',
            'progress_three' => 'required',
            'progress_three_percent' => 'required|numeric',
            'course_text' => 'required'
        ]);

        if($request->file('about_image_one'))
        {
            unlink(public_path('/homepage/' . $homepage->about_image1));
            $about_image_one = $request->file('about_image_one');
            $about_image_one_name = uniqid() . $about_image_one->getClientOriginalName();
            $about_image_one->move(public_path('homepage'), $about_image_one_name);
        }
        else
        {
            $about_image_one_name = $homepage->about_image1;
        }


        if($request->file('about_image_two'))
        {
            unlink(public_path('/homepage/' . $homepage->about_image2));
            $about_image_two = $request->file('about_image_two');
            $about_image_two_name = uniqid() . $about_image_two->getClientOriginalName();
            $about_image_two->move(public_path('homepage'), $about_image_two_name);
        }
        else
        {
            $about_image_two_name = $homepage->about_image2;
        }

        if($request->file('journey_image_one'))
        {
            unlink(public_path('/homepage/' . $homepage->journey_image1));
            $journey_image_one = $request->file('journey_image_one');
            $journey_image_one_name = uniqid() . $journey_image_one->getClientOriginalName();
            $journey_image_one->move(public_path('homepage'), $journey_image_one_name);
        }
        else
        {
            $journey_image_one_name = $homepage->journey_image1;
        }

        if($request->file('journey_image_two'))
        {
            unlink(public_path('/homepage/' . $homepage->journey_image2));
            $journey_image_two = $request->file('journey_image_two');
            $journey_image_two_name = uniqid() . $journey_image_two->getClientOriginalName();
            $journey_image_two->move(public_path('homepage'), $journey_image_two_name);
        }
        else
        {
            $journey_image_two_name = $homepage->journey_image2;
        }

        if($request->file('eval_image'))
        {
            unlink(public_path('/homepage/' . $homepage->eval_image));
            $eval_image = $request->file('eval_image');
            $eval_image_name = uniqid() . $eval_image->getClientOriginalName();
            $eval_image->move(public_path('homepage'), $eval_image_name);
        }
        else
        {
            $eval_image_name = $homepage->eval_image;
        }

        $homepage->update([
            'vision' => $request->vision,
            'mission' => $request->mission,
            'about_title' => $request->about_title,
            'about_text' => $request->about_text,
            'about_image1' => $about_image_one_name,
            'about_image2' => $about_image_two_name,
            'journey_image1' => $journey_image_one_name,
            'journey_image2' => $journey_image_two_name,
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

        return redirect()->back()->with('update', 'Home Page');
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
