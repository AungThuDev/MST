@extends('layouts.master')

@section('principal', 'nav-link nav-link active')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">Principal</h1>
                        <?php $count = \App\Models\Principal::all()->count(); ?>
                        @if ($count == 0)
                            <a href="{{ route('admin.principal.create') }}" class="btn btn-success top-right-btn">Create
                                Principal</a>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="principal" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
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
        var principalTable = $('#principal').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/principal/',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                    "data": "id"
                },
                {
                    'data': 'name'
                },
                {
                    'data': 'home_image'
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

        $(document).on('click', '.deletePrincipalButton', function(a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to delete this principal?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/principal/' + id,
                        type: 'DELETE',
                        success: function() {
                            principalTable.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Principal has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
