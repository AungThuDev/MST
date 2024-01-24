<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampusContent;
use App\Models\Phone;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CampusContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $campus = CampusContent::query();

            return DataTables::of($campus)

                ->addColumn('options', function ($a) {

                    $edit = '<a href=" ' . route('admin.campus.edit', $a->id) . '" class="btn btn-primary" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="javascript:void(0)" class="deleteButton btn btn-danger" record="award" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">'  . $edit . $delete . '</div>';
                })->rawColumns(['options'])->make(true);
        }

        return view("admin.campus.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_one' => 'required|numeric',
        ]);

        $campus = CampusContent::create([
            'name' => $request->name,
            'address' => $request->address
        ]);

        Phone::create([
            'number' => $request->phone_one,
            'campus_id' => $campus->id
        ]);

        if($request->phone_two)
        {
            Phone::create([
                'number' => $request->phone_two,
                'campus_id' => $campus->id
            ]);
        }

        if($request->phone_three)
        {
            Phone::create([
                'number' => $request->phone_three,
                'campus_id' => $campus->id
            ]);
        }



        return redirect()->back()->with('create', 'Campus');
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
        $campus = CampusContent::find($id);

        return view('admin.campus.edit', compact('campus'));
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

        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $campus = CampusContent::where('id', $id)->first();

        if(!$campus)
        {
            return redirect()->back()->with('error', 'Campus not found');
        }

        $campus->update([
            'name' => $request->name,
            'address' => $request->address
        ]);

        return redirect()->back()->with('update', 'Campus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campus = CampusContent::find($id);

        if(!$campus)
        {
            return redirect()->back()->with('error', 'Campus not found');
        }

        $campus->delete();

        return 'success';
    }
}
