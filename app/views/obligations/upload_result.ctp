<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Obligations', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="obligations form">

    <?php echo $this->element("upload_result"); ?>

</div>

