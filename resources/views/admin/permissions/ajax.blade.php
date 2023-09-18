 <script>
     $(document).ready(function() {
         // Create a new permission
         $("#createPermissionForm").submit(function(e) {
             e.preventDefault();

             // Serialize the form data
             var formData = $(this).serialize();

             $.ajax({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 },
                 type: "POST",
                 url: "{{ route('permissions.store') }}",
                 data: formData, // Send the serialized form data
                 dataType: 'json', // Expect JSON response from the server
                 success: function(data) {
                     // Handle success
                     console.log(data); // Log the response data for debugging
                     $('#createPermissionForm')[0].reset();
                     // Use SweetAlert2 for success notification
                     Swal.fire({
                         icon: 'success',
                         title: 'Permission Created',
                         text: 'Permission created successfully'
                     }).then(function() {
                         $.ajax({
                             type: 'GET',
                             url: "{{ route('permissions.index') }}",
                             dataType: 'json',
                             success: function(data) {
                                 populateTable(data);
                             },
                             error: function(error) {
                                 console.error(error);
                             }
                         });

                     });

                     // You can also update the UI or perform any other actions as needed
                 },
                 error: function(error) {
                     // Handle errors
                     console.error(error); // Log the error for debugging

                     // Use SweetAlert2 for error notification
                     Swal.fire({
                         icon: 'error',
                         title: 'Error',
                         text: 'Error creating permission. Please try again.'
                     });

                     // You can also display more detailed error messages or take other actions
                 },
             });
         });


         // Function to populate the table with data
         function populateTable(data) {
             var tableBody = $('#permissionsTable tbody');
             tableBody.empty(); // Clear existing data

             $.each(data, function(index, permission) {
                 var row = '<tr>' +
                     '<td>' + permission.id + '</td>' +
                     '<td>' + permission.name + '</td>' +
                     '<td>' + permission.date + '</td>' +
                     '<td><div class="badge badge-success">' + permission.status + '</div></td>' +
                     '<td>' +
                     '<div class="buttons">' +
                     '<a href="#" class="btn btn-sm btn-icon btn-primary"><i class="far fa-edit"></i></a>' +
                     '<button class="deletePermission" data-id="' + permission.id + '">Delete</button>' +
                     '</div>' +
                     '</td>' +
                     '</tr>';

                 tableBody.append(row);
             });
         }

         // Make an AJAX request to retrieve data
         $.ajax({
             type: 'GET',
             url: "{{ route('permissions.index') }}",
             dataType: 'json',
             success: function(data) {
                 populateTable(data);
             },
             error: function(error) {
                 console.error(error);
             }
         });
         // Delete a permission when the "Delete" button is clicked
         $(".deletePermission").click(function() {
             var permissionId = $(this).data("id");


         });
     });
 </script>
