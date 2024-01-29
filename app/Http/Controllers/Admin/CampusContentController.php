<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampusContent;
use App\Models\Phone;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CampusContentController extends Controller
{
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
                    return '<ul style="list-style: lower-roman  ;" class="phones">' . $phones_list . '</ul>';
                })
                ->editColumn("address", function ($e) {
                    return substr($e->address, 0, 40) . '...';
                })
                ->addColumn('action', function ($a) {

                    $details = "<a href='/admin/campus/$a->id' class='btn btn-sm btn-primary mt-1'>Details</a>";
                    $edit = '<a href=" ' . route('admin.campus.edit', $a->id) . '" class="btn btn-sm mt-1" style="background-color: yellow;">Edit</a>';
                    $delete = '<a href="javascript:void(0)" class="deleteButton btn btn-sm btn-danger mt-1" record="award" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';
                })->rawColumns(['action', 'phones'])->make(true);
        }

        return view("admin.campus.index");
    }

    public function create()
    {
        return view('admin.campus.create');
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phones.*' => 'required',
        ]);

        $campus = CampusContent::create([
            'name' => $request->name,
            'address' => $request->address
        ]);

        foreach ($request->input('phones') as $phone) {
            if ($phone != null) {
                Phone::create([
                    'number' => $phone,
                    'campus_id' => $campus->id
                ]);
            }
        }

        return redirect()->route('admin.campus.index')->with('create', 'Campus');
    }

    public function show(CampusContent $campus)
    {
        return view('admin.campus.show', [
            'campus' => $campus
        ]);
    }

    public function edit($id)
    {
        $campus = CampusContent::find($id);

        return view('admin.campus.edit', compact('campus'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phones.*' => 'required',
        ]);

        $campus = CampusContent::where('id', $id)->first();

        if (!$campus) {
            return redirect()->back()->with('error', 'Campus not found');
        }

        $campus->update([
            'name' => $request->name,
            'address' => $request->address
        ]);

        $campus->phones()->delete();

        foreach ($request->input('phones') as $phone) {
            if ($phone != null) {
                Phone::create([
                    'number' => $phone,
                    'campus_id' => $campus->id
                ]);
            }
        }

        return redirect()->route('admin.campus.index')->with('update', 'Campus');
    }

    public function destroy($id)
    {
        $campus = CampusContent::find($id);

        if (!$campus) {
            return redirect()->back()->with('error', 'Campus not found');
        }

        $campus->delete();
        $campus->phones()->delete();

        return 'success';
    }
}
