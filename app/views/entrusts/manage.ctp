<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Entrusts', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="entrusts index">
	<h2><?php __('Entrusts');?></h2>

        <p>
        <ul>
            <li><a href="<?php echo $html->url('/selectable_items/index/Entrust/area_of_research'); ?>">研究分野</a></li>
            <li><a href="<?php echo $html->url('/selectable_items/index/Entrust/category_of_business'); ?>">業種</a></li>
        </ul>
        </p>
</div>