<?php echo $html->css('aggregate', null, array('inline' => false)); ?>
<?php echo $html->script('aggregate', array('inline' => false)); ?>

<div class="aggregate index">
  <h2> 集計 </h2>
  <?php echo $this->element("summaries/aggregate"); ?> 
</div>
