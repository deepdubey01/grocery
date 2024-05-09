 <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
 <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap4.js"></script>
 <script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
 <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.bootstrap4.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.colVis.min.js"></script>

 <script>
$(document).ready(function() {
    new DataTable('.table', {
        layout: {
            topStart: {
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            }
        }
    });
});
 </script>
 </body>

 </html>