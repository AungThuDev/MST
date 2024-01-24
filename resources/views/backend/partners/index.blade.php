@extends('layouts.master')

@section('content')
    <div class="d-flex justify-content-start">
        <h1 class="p-2">Partners</h1>
    </div>
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-success text-white" href="{{ route('admin.partner.create') }}">Add New Partner</a>
    </div>

    <div class="table-responsive">
        <table id="partner" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        let table = $('#partner').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/partner/',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                    "data": "id"
                },
                {
                    "data": "name"
                },
                {
                    "data": "description"
                },
                {
                    "data": "image"
                },
                {
                    "data": "created_at"
                },
                {
                    "data": "action"
                }
            ]
        });
    </script>
@endsection
