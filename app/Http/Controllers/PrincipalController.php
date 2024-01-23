<?php

namespace App\Http\Controllers;

use App\Models\Principal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\Facades\DataTables;

class PrincipalController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $principal = Principal::query();

            return DataTables::of($principal)
                ->editColumn('created_at', function ($a) {
                    return Carbon::parse($a->created_at)->format("Y-m-d H:i:s");
                })
                ->editColumn('updated_at', function ($a) {
                    return Carbon::parse($a->updated_at)->format("Y-m-d H:i:s");
                })
                ->addColumn('action', function ($a) {

                    $details = "<a href='/admin/principal/$a->id' class='btn btn-sm btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" ' . route('admin.principal.edit', $a->id) . '" class="btn btn-sm btn-success" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deletePrincipalButton btn btn-sm btn-danger" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';

                })->rawColumns(['action'])->make(true);
        }

        return view('admin.principal.index');
    }

    public function create()
    {
        return view('admin.principal.create');
    }
}
