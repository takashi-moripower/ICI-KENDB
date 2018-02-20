<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Contracts', true), array('action' => 'index')); ?> </li>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Contract', true), array('action' => 'edit_node', $contract['Contract']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete Contract', true), array('action' => 'delete', $contract['Contract']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contract['Contract']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Contract', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Contract', true), array('action' => 'copy', $contract['Contract']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="contracts view">

<?php if($history_exists): ?>
<?php if($can_history_view): ?>
<h2><?php __('History'); ?></h2>
<p><a href="<?php echo $html->url("/contracts/history_view/" . $contract["Contract"]["id"]); ?>"><?php __('View last saved record'); ?></a></p>
<br clear="all" />
<?php endif; ?>
<?php endif; ?>

<?php if (is_numeric($contract["Contract"]["contract_id"])): ?>
<?php if($can_view): ?>
<h2><?php __('Related'); ?></h2>
<p>
<a href="<?php echo $html->url('/contracts/view/' .$contract["Contract"]["contract_id"]); ?>">プロジェクトレコード</a>
</p>
<?php endif; ?>
<?php endif; ?>
<br clear="all" />

<h2><?php  __('Contract');?></h2>

<?php echo $this->element("contracts/view"); ?>

</div>

