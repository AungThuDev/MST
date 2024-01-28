@extends('layouts.master')
@section('award', 'nav-link nav-link active')
@section('title', 'Admin - Awards')
@section('content')
    <div class="d-flex justify-content-start">
        <h1 class="p-2">Awards</h1>
    </div>
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-success text-white" href="{{ route('admin.award.create') }}">Add New Award</a>
    </div>
    <div class="">
        <table id="award" class="table table-bordered table-hover">
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
    </div>
@endsection


@section('script')
    <script>
        let table = $('#award').DataTable({
            'serverSide': true,
            'processing': true,
            'order': [
                [0, 'desc']
            ],
            'ajax': {
                url: '/admin/award/',
                error: function (xhr, testStatus, errorThrown) {

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
        $(document).on('click', '.deleteButton', function (a) {
            a.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: 'Do you want to delete this award?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/award/' + id,
                        type: 'DELETE',
                        success: function () {
                            table.ajax.reload()
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Award has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
