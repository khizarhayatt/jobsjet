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
