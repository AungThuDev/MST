<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $faq = Faq::query();

            return DataTables::of($faq)
                ->editColumn('created_at', function ($a) {
                    return Carbon::parse($a->created_at)->format("Y-m-d H:i:s");
                })
                ->editColumn('updated_at', function ($a) {
                    return Carbon::parse($a->updated_at)->format("Y-m-d H:i:s");
                })
                ->addColumn('action', function ($a) {

                    $details = "<a href='/admin/faq/$a->id' class='btn btn-sm btn-primary' style='margin-right: 10px'>Details</a>";
                    $edit = '<a href=" ' . route('admin.faq.edit', $a->id) . '" class="btn btn-sm btn-warning" style="margin-right: 10px;">Edit</a>';
                    $delete = '<a href="" class="deleteFaqButton btn btn-sm btn-danger" data-id="' . $a->id . '">Delete</a>';

                    return '<div class="action">' . $details . $edit . $delete . '</div>';

                })->rawColumns(['action'])->make(true);
        }

        return view('admin.faq.index');
    }

    public function show(Faq $faq)
    {
        return view('admin.faq.show', [
            'faq' => $faq
        ]);
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        Faq::create($validated);

        return redirect(route('admin.faq.index'))->with('draft', 'FAQ');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faq.edit', [
            'faq' => $faq
        ]);
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);

        $faq->update($validated);

        return view('admin.faq.index');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return 'success';
    }


}
