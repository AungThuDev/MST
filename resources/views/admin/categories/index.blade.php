@extends('layouts.master')
@section('title', 'Admin - Programme Categories')
@section('category', 'nav-link nav-link active')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Programme Categories</h1>
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-success top-right-btn">Add New
                            Category</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="categories" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Created</th>
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
        var categoriesTable = $('#categories').DataTable({
            "order": [[0, 'desc']],
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/categories/',
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
                    'data': 'image'
                },
                {
                    "data": "created_at"
                },
                {
                    "data": "action"
                }
            ]
        });

        $(document).on('click', '.deleteCategoriesButton', function (a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to delete this category?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/categories/' + id,
                        type: 'DELETE',
                        success: function () {
                            categoriesTable.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Category has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
