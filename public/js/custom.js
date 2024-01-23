$(document).ready(function () {
    $(document).on('click', '.deleteButton', function () {
        let record = $(this).attr('record');
        let record_id = $(this).attr('data-id');
        let row = $(this).parent().parent().parent()[0];
        Swal.fire({
            title: "Are you sure you want to delete this "+name,
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if(result.isConfirmed) {
                // window.location.href = '/admin/delete-'+record+'/'+recordid;
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/'+ record + "/" + record_id,
                    data: {
                        award: record_id
                    },
                    success : function(resp) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        row.classList.add("d-none");
                        console.log(resp);
                    },
                    error : function(e) {
                        alert(e);
                    }
                })
            }
        })
        return false;
        
    })
})