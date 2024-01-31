<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $info = Info::query();

            return DataTables::of($info)

                ->addColumn('action', function ($a) {

                    $edit = '<a href=" ' . route('admin.info.edit', $a->id) . '" class="btn btn-sm" style="margin-right: 10px;background-color: yellow;">Edit</a>';
                    $delete = '<a href="javascript:void(0)" class="deleteButton btn btn-danger btn-sm" record="award" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">'  . $edit . $delete . '</div>';
                })->rawColumns(['action'])->make(true);
        }

        return view("admin.info.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.info.create');
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
            'name' => 'required',
            'link' => 'required'
        ]);

        Info::create([
            'name' => $request->name,
            'link' => $request->link
        ]);

        return redirect()->route('admin.info.index')->with('create', 'Contact Information');
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
    public function edit(Info $info)
    {
        return view('admin.info.edit', compact('info'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Info $info)
    {
        //

        $request->validate([
            'name' => 'required',
            'link' => 'required'
        ]);

        $info->update([
            'name' => $request->name,
            'link' => $request->link
        ]);

        return redirect()->route('admin.info.index')->with('update', 'Contact Information');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        $info->delete();

        return 'success';
    }
}
