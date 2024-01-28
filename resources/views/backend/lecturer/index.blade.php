@extends('layouts.master')

@section('lecturer', 'nav-link nav-link active')


@section('content')
    <div class="d-flex justify-content-start">
        <h1 class="p-2">Lecturers</h1>
    </div>
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-success text-white" href="{{ route('admin.lecturer.create') }}">Add New Lecturer</a>
    </div>

    <div class="table-responsive">
        <table id="lecturer" class="table table-bordered table-hover ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
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
        let table = $('#lecturer').DataTable({
            'serverSide': true,
            'processing': true,
            'order': [
                [0, 'desc']
            ],
            'ajax': {
                url: '/admin/lecturer/',
                error: function (xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                "data": "id"
            },
                {
                    "data": "name"
                },
                {
                    "data": "position"
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
                title: 'Do you want to delete this lecturer?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/lecturer/' + id,
                        type: 'DELETE',
                        success: function () {
                            table.ajax.reload()
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Lecturer has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
