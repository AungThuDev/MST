@extends('layouts.master')

@section('banner-page', 'nav-link nav-link active')

@section('content')
    <div class="d-flex justify-content-end mb-5">
        <a href="{{ route('admin.info.create') }}" class="btn btn-primary text-white">Add New Info</a>
    </div>

    <table class="table table-bordered table-hover" id="info">
        <thead>
            <tr>
                <th>Name</th>
                <th>Link</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection

@section('script')
    <script>
        let table = $('#info').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/info/',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                    "data": "name"
                },
                {
                    "data": "link"
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
                title: 'Do you want to delete this information?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/info/' + id,
                        type: 'DELETE',
                        success: function() {
                            table.ajax.reload()
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Information has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
