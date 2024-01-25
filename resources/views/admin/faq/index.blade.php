@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title">FAQ</h1>
                        <a href="{{ route('admin.faq.create') }}" class="btn btn-success float-right">Create FAQ</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="faq" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Question</th>
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
        var faqTable = $('#faq').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/faq/',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                    "data": "id"
                },
                {
                    'data': 'question'
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

        $(document).on('click', '.deleteFaqButton', function(a) {
            a.preventDefault();
            const id = $(this).data('id');
            Swal.fire({
                title: 'Do you want to delete this FAQ?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/faq/' + id,
                        type: 'DELETE',
                        success: function() {
                            faqTable.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'FAQ has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
