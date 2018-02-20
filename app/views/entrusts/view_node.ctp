<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Entrusts', true), array('action' => 'index')); ?> </li>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Entrust', true), array('action' => 'edit_node', $entrust['Entrust']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete Entrust', true), array('action' => 'delete', $entrust['Entrust']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $entrust['Entrust']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Entrust', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Entrust', true), array('action' => 'copy', $entrust['Entrust']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="entrusts view">

<?php if($history_exists): ?>
<?php if($can_history_view): ?>
<h2><?php __('History'); ?></h2>
<p><a href="<?php echo $html->url("/entrusts/history_view/" . $entrust["Entrust"]["id"]); ?>"><?php __('View last saved record'); ?></a></p>
<br clear="all" />
<?php endif; ?>
<?php endif; ?>

<?php if (is_numeric($entrust["Entrust"]["entrust_id"])): ?>
<?php if($can_view): ?>
<h2><?php __('Related'); ?></h2>
<p>
<a href="<?php echo $html->url('/entrusts/view/' .$entrust["Entrust"]["entrust_id"]); ?>">プロジェクトレコード</a>
</p>
<?php endif; ?>
<?php endif; ?>
<br clear="all" />

<h2><?php  __('Entrust');?></h2>

<?php echo $this->element("entrusts/view"); ?>

</div>

