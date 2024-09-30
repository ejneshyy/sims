

   <!-- jQuery -->
   <script src="../../asset/jquery/jquery.min.js"></script>
   <script src="../../asset/js/adminlte.js"></script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="../asset/tables/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
 <!-- jQuery and Bootstrap JS -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Ajax Script to fetch seniors based on barangay -->
    <script>
        $(document).ready(function(){
            $('#barangaySelect').on('change', function(){
                var barangayName = $(this).val();
                
                if (barangayName) {
                    $.ajax({
                        url: 'fetch_seniors.php',
                        method: 'POST',
                        data: { barangay_name: barangayName },
                        success: function(response) {
                            $('#seniorsTable tbody').html(response);
                        }
                    });
                } else {
                    $('#seniorsTable tbody').html(''); // Clear table if no barangay selected
                }
            });
        });
    </script>
