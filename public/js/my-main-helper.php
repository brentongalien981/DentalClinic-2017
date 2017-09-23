<script>
    function get_csrf_token() {
        return "<?php echo sessionize_csrf_token(); ?>";
    }
</script>