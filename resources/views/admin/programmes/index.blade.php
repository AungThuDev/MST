@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Programmes</h1>
                        <a href="{{ route('admin.programmes.create') }}" class="btn btn-primary top-right-btn">Create
                            Programme</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="programmes" class="table-responsive table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>duration</th>
                                <th>link</th>
                                <th>Created</th>
                                <th>Updated</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <script>
        var programmesTable = $('#programmes').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/programmes/',
                error: function (xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                "data": "id"
            },
                {
                    'data': 'name'
                },
                {
                    'data': 'category_id'
                },
                {
                    'data': 'image'
                },
                {
                    'data': 'duration'
                },
                {
                    'data': 'link'
                },
                {
                    "data": "created_at"
                },
                {
                    'data': 'updated_at'
                },
                {
                    "data": "action"
                }
            ]
        });

        $(document).on('click', '.deleteProgrammesButton', function (a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to delete this programme?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/programmes/' + id,
                        type: 'DELETE',
                        success: function () {
                            programmesTable.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Programme has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
