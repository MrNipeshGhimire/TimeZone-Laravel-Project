 $(document).ready(function() {
            $('#myTable').DataTable({
                "ordering": false,

                "lengthMenu": [
                    [15, 25, 100, -1],
                    [15, 25, 100, 'All'],
                ],

                language:{
                    search:"_INPUT_",
                    searchPlaceholder:"search....",
                    emptyTable:"No records found",
                    info:"Showing _START_ to _END_ of _TOTAL_ records",
                }
            });
  });
