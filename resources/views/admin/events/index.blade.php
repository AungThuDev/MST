@extends('layouts.master')

@section('banner-page', 'nav-link nav-link active')

@section('content')

    <div class="d-flex justify-content-end mb-5">
        <a href="{{ route('admin.event.create') }}" class="btn btn-primary text-white">Add New Event</a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="events">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Featured Image</th>
                    <th>Created At</th>
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
        let table = $('#events').DataTable({
            'serverSide': true,
            'processing': true,
            'ajax': {
                url: '/admin/event/',
                error: function(xhr, testStatus, errorThrown) {

                }
            },

            "columns": [{
                    "data": "title"
                },
                {
                    "data": "featured_image"
                },
                {
                    "data": "created_at"
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
                title: 'Do you want to delete this event?',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                confirmButtonColor: '#FF0000',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/event/' + id,
                        type: 'DELETE',
                        success: function() {
                            table.ajax.reload();
                        }
                    });

                    Swal.fire(
                        'Deleted!',
                        'Event has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endsection
