<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Encourages', true), array('action' => 'index', $this->Kendb->nendo()));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="contracts form">

    <?php echo $this->element("upload_result"); ?>

</div>

