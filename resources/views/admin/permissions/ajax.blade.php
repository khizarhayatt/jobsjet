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
                     //  console.log(data);
                     // Log the response data for debugging
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
                     '<td>' +
                     '<div class="buttons">' +
                     '<a href="#" class="btn btn-sm btn-icon btn-primary"><i class="far fa-edit"></i></a>' +
                     '<button class="deletePermission btn btn-icon btn-sm btn-danger" data-id="' +
                     permission
                     .id + '"><i class="fas fa-trash"></i></button>' +
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


         // Function to update pagination links
         function updatePaginationLinks(pagination) {
             var paginationLinks = $('#paginationLinks');
             paginationLinks.empty();

             // Create and append the "Previous" link
             if (pagination.prev_page_url) {
                 paginationLinks.append('<li class="page-item"><a class="page-link" href="' + pagination
                     .prev_page_url + '"><i class="fas fa-chevron-left"></i></a></li>');
             } else {
                 paginationLinks.append(
                     '<li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-left"></i></span></li>'
                 );
             }

             // Create and append the numbered pages
             for (var i = 1; i <= pagination.last_page; i++) {
                 if (i === pagination.current_page) {
                     paginationLinks.append('<li class="page-item active"><span class="page-link">' + i +
                         '<span class="sr-only">(current)</span></span></li>');
                 } else {
                     paginationLinks.append('<li class="page-item"><a class="page-link" href="' + pagination
                         .path + '?page=' + i + '">' + i + '</a></li>');
                 }
             }

             // Create and append the "Next" link
             if (pagination.next_page_url) {
                 paginationLinks.append('<li class="page-item"><a class="page-link" href="' + pagination
                     .next_page_url + '"><i class="fas fa-chevron-right"></i></a></li>');
             } else {
                 paginationLinks.append(
                     '<li class="page-item disabled"><span class="page-link"><i class="fas fa-chevron-right"></i></span></li>'
                 );
             }
         }

         // Function to update the content (replace this with your data rendering logic)
         function updateContent(data) {
             // Replace this with your code to update the content
             // Example: $("#yourTable").html(data); // Assuming data is HTML content
         }

         // Initial AJAX request to load the first page
         $.ajax({
             url: "http://jobsjet.local/permissions", // Replace with your actual pagination route
             method: 'GET',
             success: function(data) {
                 // Update the content (replace this with your data rendering logic)
                 updateContent(data);

                 // Update the pagination links
                 updatePaginationLinks(data);
             }
         });

         // Handle clicks on pagination links
         $(document).on('click', '.pagination a', function(e) {
             e.preventDefault();

             var pageUrl = $(this).attr('href');

             // Make an AJAX request to load the clicked page
             $.ajax({
                 url: pageUrl,
                 method: 'GET',
                 success: function(data) {
                     // Update the content (replace this with your data rendering logic)
                     updateContent(data);

                     // Update the pagination links
                     updatePaginationLinks(data);
                 }
             });
         });
     });
 </script>
