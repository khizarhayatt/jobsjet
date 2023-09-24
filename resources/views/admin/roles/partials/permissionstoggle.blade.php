 <script>
     $(document).ready(function() {
         $(".toggle-link").click(function(e) {
             e.preventDefault();
             var targetId = $(this).data("toggle-target");
             $("#" + targetId).toggleClass("d-inline d-none");

         });
     });
 </script>
