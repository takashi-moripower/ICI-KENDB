<script type="text/javascript">
$(document).ready(function() {
    $('#release_lock').click(function() {
	var url = "<?php echo $html->url('/edit_statuses/release'); ?>";
        jQuery.ajaxSetup({async:false});
        jQuery.getJSON(url,
            function(data) {
            }
        );
        window.location.reload();
    });
});
</script>