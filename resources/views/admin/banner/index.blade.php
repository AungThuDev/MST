@extends('layouts.master')

@section('banner-page', 'nav-link nav-link active')

@section('content')
    <div class="card p-2">
        <div>
            <a href="{{ route('admin.banner.create') }}" class="btn btn-success float-right mb-2">Create</a>
        </div>

        <table class="table table-bordered table-hover" id="banner">
            <thead>
                <tr>
                    <th>Page Name</th>
                    <th>Banner Image</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        let table = $('#banner').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/banner/',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                    "data": "page"
                },
                {
                    "data": "image"
                },
                {
                    "data": "options"
                }
            ]
        });
        $(document).on('click', '.deleteButton', function(a) {
            a.preventDefault();
            var id = $(this).data('id');

            Swal.fire({
                title: 'Do you want to delete this campus?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/banner/' + id,
                        type: 'DELETE',
                        success: function() {
                            table.ajax.reload()
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Banner has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
