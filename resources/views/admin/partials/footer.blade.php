<footer class="main-footer">
    <div class="footer-left">
        <a href="templateshub.net">Templateshub</a></a>
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
    });
</script>
