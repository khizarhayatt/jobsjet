<footer class="main-footer">
    <div class="footer-left">
        <a href="#">
            <h6>&copy; JobsJet</h6>
        </a>
    </div>
    <div class="footer-right">
    </div>
</footer>
<script>
    $(document).ready(function() {
        const $selectAllCheckbox = $('#inlineCheckboxAll');
        const $checkboxes = $('.chkAll');

        $selectAllCheckbox.on('click', function() {
            $checkboxes.prop('checked', $selectAllCheckbox.prop('checked'));
        });

        // Permissions checkboxes and select-all
        const $selectAllCheckboxPermissions = $('#inlineCheckboxAllPermissions');
        const $checkboxesPermissions = $('.chkAllPermissions');

        $selectAllCheckboxPermissions.on('click', function() {
            $checkboxesPermissions.prop('checked', $selectAllCheckboxPermissions.prop('checked'));
        });

        // Roles checkboxes and select-all
        const $selectAllCheckboxRoles = $('#inlineCheckboxAllRoles');
        const $checkboxesRoles = $('.chkAllRoles');

        $selectAllCheckboxRoles.on('click', function() {
            $checkboxesRoles.prop('checked', $selectAllCheckboxRoles.prop('checked'));
        });




        $("#imageInput").change(function() {
            readURL(this);
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $("#selectedImage").attr("src", e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    });
</script>
