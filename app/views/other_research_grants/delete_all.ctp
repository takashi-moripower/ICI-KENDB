<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Other Research Grants', true), array('action' => 'index', $this->Kendb->nendo())); ?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="index">
    <h2>一括削除</h2>
<?php echo $this->element("delete_all"); ?>
</div>
