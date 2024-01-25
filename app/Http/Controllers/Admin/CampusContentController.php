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
            $campus = CampusContent::with('phones')->get();

            return DataTables::of($campus)

                ->editColumn("phones", function ($e) {
                    $phones_list = '';
                    foreach ($e->phones as $phone) {
                        $phones_list .= '<li class="mt-2">' . $phone->number . '</li>';
                    }
                    return '<ul style="list-style: lower-latin;" class="phones">'  . $phones_list . '</ul>';
                })

                ->addColumn('action', function ($a) {

                    $edit = '<a href=" ' . route('admin.campus.edit', $a->id) . '" class="btn" style="margin-right: 10px;background-color: yellow;">Edit</a>';
                    $delete = '<a href="javascript:void(0)" class="deleteButton btn btn-danger" record="award" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">'  . $edit . $delete . '</div>';
                })->rawColumns(['action','phones'])->make(true);
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
            'phones.0' => 'required|numeric',
        ]);

        $campus = CampusContent::create([
            'name' => $request->name,
            'address' => $request->address
        ]);

        foreach ($request->input('phones') as $phone) {
            if($phone != null)
            {
                Phone::create([
                    'number' => $phone,
                    'campus_id' => $campus->id
                ]);
            }

        }


        return redirect()->route('admin.campus.index')->with('create', 'Campus');
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

        return redirect()->route('admin.campus.index')->with('update', 'Campus');
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
        $campus->phones()->delete();

        return 'success';
    }
}
