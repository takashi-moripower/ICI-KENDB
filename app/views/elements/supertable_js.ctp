<script type="text/javascript">
$(document).ready(function() {
    function supertable_init() {
        new superTable("flexme", {
            cssSkin : "sDefault",
            headerRows : 1,
            fixedCols : <?php echo $fixed_cols; ?>
        });
    }
    supertable_init();
});

</script>
