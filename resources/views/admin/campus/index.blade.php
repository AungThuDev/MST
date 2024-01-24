@extends('layouts.master')

@section('banner-page', 'nav-link nav-link active')

@section('content')
    <div class="d-flex justify-content-end mb-5">
        <a href="{{ route('admin.campus.create') }}" class="btn btn-primary text-white">Add New Campus</a>
    </div>

    <table class="table table-bordered table-hover" id="campus">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Phones</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
@endsection

@section('script')
    <script>
        let table = $('#campus').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/campus/',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                    "data": "name"
                },
                {
                    "data": "address"
                },
                {
                    "data": "phones"
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
                        url: '/admin/campus/' + id,
                        type: 'DELETE',
                        success: function() {
                            table.ajax.reload()
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Campus has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
