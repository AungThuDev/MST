<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $homePage = HomePage::first();

        if ($homePage) {
            return redirect(route('admin.homepage.show', $homePage->id));
        } else {
            return redirect('/admin/homepage/create');
        }
    }

    public function show(HomePage $homepage)
    {
        return view('admin.homepage.show', [
            'homepage' => $homepage
        ]);
    }

    public function create()
    {
        return view('admin.homepage.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vision' => 'required|max:300',
            'mission' => 'required|max:300',
            'about_title' => 'required',
            'about_text' => 'required',
            'about_image1' => 'required|image|mimes:png,jpg,jpeg',
            'about_image2' => 'required|image|mimes:png,jpg,jpeg',
            'journey_image1' => 'required|image|mimes:png,jpg,jpeg',
            'journey_image2' => 'required|image|mimes:png,jpg,jpeg',
            'eval_title' => 'required',
            'eval_image' => 'required|image|mimes:png,jpg,jpeg',
            'eval_text' => 'required',
            'progress1' => 'required',
            'progress1_percent' => 'required|numeric|max:100',
            'progress2' => 'required',
            'progress2_percent' => 'required|numeric|max:100',
            'progress3' => 'required',
            'progress3_percent' => 'required|numeric|max:100',
        ]);

        $about_image_one = $request->file('about_image1');
        $about_image_one_name = uniqid() . $about_image_one->getClientOriginalName();
        $about_image_one->move(public_path('homepage'), $about_image_one_name);
        $validated['about_image1'] = $about_image_one_name;

        $about_image_two = $request->file('about_image2');
        $about_image_two_name = uniqid() . $about_image_two->getClientOriginalName();
        $about_image_two->move(public_path('homepage'), $about_image_two_name);
        $validated['about_image2'] = $about_image_two_name;


        $journey_image_one = $request->file('journey_image1');
        $journey_image_one_name = uniqid() . $journey_image_one->getClientOriginalName();
        $journey_image_one->move(public_path('homepage'), $journey_image_one_name);
        $validated['journey_image1'] = $journey_image_one_name;

        $journey_image_two = $request->file('journey_image2');
        $journey_image_two_name = uniqid() . $journey_image_two->getClientOriginalName();
        $journey_image_two->move(public_path('homepage'), $journey_image_two_name);
        $validated['journey_image2'] = $journey_image_two_name;

        $eval_image = $request->file('eval_image');
        $eval_image_name = uniqid() . $eval_image->getClientOriginalName();
        $eval_image->move(public_path('homepage'), $eval_image_name);
        $validated['eval_image'] = $eval_image_name;

        HomePage::create($validated);

        return redirect()->route('admin.homepage.index')->with('create', 'Home page');
    }

    public function edit(HomePage $homepage)
    {
        return view('admin.homepage.edit', compact('homepage'));
    }

    public function update(Request $request, HomePage $homepage)
    {
        $validated = $request->validate([
            'vision' => 'required|max:300',
            'mission' => 'required|max:300',
            'about_title' => 'required',
            'about_text' => 'required',
            'about_image1' => 'image|mimes:png,jpg,jpeg',
            'about_image2' => 'image|mimes:png,jpg,jpeg',
            'journey_image1' => 'image|mimes:png,jpg,jpeg',
            'journey_image2' => 'image|mimes:png,jpg,jpeg',
            'eval_title' => 'required',
            'eval_image' => 'image|mimes:png,jpg,jpeg',
            'eval_text' => 'required',
            'progress1' => 'required',
            'progress1_percent' => 'required|numeric|max:100',
            'progress2' => 'required',
            'progress2_percent' => 'required|numeric|max:100',
            'progress3' => 'required',
            'progress3_percent' => 'required|numeric|max:100',
        ]);

        if ($request->file('about_image1')) {
            unlink(public_path('/homepage/' . $homepage->about_image1));
            $about_image_one = $request->file('about_image1');
            $about_image_one_name = uniqid() . $about_image_one->getClientOriginalName();
            $about_image_one->move(public_path('homepage'), $about_image_one_name);
            $validated['about_image1'] = $about_image_one_name;
        }


        if ($request->file('about_image2')) {
            unlink(public_path('/homepage/' . $homepage->about_image2));
            $about_image_two = $request->file('about_image2');
            $about_image_two_name = uniqid() . $about_image_two->getClientOriginalName();
            $about_image_two->move(public_path('homepage'), $about_image_two_name);
            $validated['about_image2'] = $about_image_two_name;
        }

        if ($request->file('journey_image1')) {
            unlink(public_path('/homepage/' . $homepage->journey_image1));
            $journey_image_one = $request->file('journey_image1');
            $journey_image_one_name = uniqid() . $journey_image_one->getClientOriginalName();
            $journey_image_one->move(public_path('homepage'), $journey_image_one_name);
            $validated['journey_image1'] = $journey_image_one_name;
        }

        if ($request->file('journey_image2')) {
            unlink(public_path('/homepage/' . $homepage->journey_image2));
            $journey_image_two = $request->file('journey_image2');
            $journey_image_two_name = uniqid() . $journey_image_two->getClientOriginalName();
            $journey_image_two->move(public_path('homepage'), $journey_image_two_name);
            $validated['journey_image2'] = $journey_image_two_name;
        }

        if ($request->file('eval_image')) {
            unlink(public_path('/homepage/' . $homepage->eval_image));
            $eval_image = $request->file('eval_image');
            $eval_image_name = uniqid() . $eval_image->getClientOriginalName();
            $eval_image->move(public_path('homepage'), $eval_image_name);
            $validated['eval_image'] = $eval_image_name;
        }

        $homepage->update($validated);

        return redirect()->route('admin.homepage.index')->with('update', 'Home page');
    }

}
