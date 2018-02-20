<script type="text/javascript">
$(document).ready(function() {
    $('#change_grid').click(function() {
        var current_grid = ($.cookie('grid'));
        var new_grid = "";
        if (current_grid == 'super') {
            new_grid = "flexi";
        } else {
            new_grid = "super";
        }
        $.cookie('grid', new_grid, { expires : 90});
        window.location.reload();
    });
});
</script>

<?php if (@$user_option["grid_type"] == 0) { ?>
<?php echo $this->Html->css('superTables'); ?>
<?php echo $javascript->link('superTables'); ?>
<style type="text/css">
.fakeContainer {
    margin: 0 0 20px;
    width: 98%;
    <?php $h = (($count+3) * 20); if ($h < 300) { $h = 300; } if($h > 1000) { $h = 1000;} ?>
    height: <?php echo $h; ?>px;
    overflow: hidden;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
  $("table#flexme tr").click(function(){
      $(this).toggleClass("hover");
      if($(this).hasClass("hover")) {
          this.style.background = "#ccffcc";
      } else {
          this.style.background = "";
      }
  });
});
</script>
<?php } ?>
