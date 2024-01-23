@extends('layouts.master')

@section('content')

    <div class="d-flex justify-content-end mb-5">
        <a class="btn btn-primary text-white" href="{{ route('admin.award.create') }}">Add New Award</a>
    </div>

    <table id="award">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        </tbody>

    </table>
@endsection

@section('script')
    <script>
        let table = $('#award').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/award/',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                    "data": "id"
                },
                {
                    "data": "title"
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
