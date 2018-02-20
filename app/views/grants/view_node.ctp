<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Grants', true), array('action' => 'index')); ?> </li>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Grant', true), array('action' => 'edit_node', $grant['Grant']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete Grant', true), array('action' => 'delete', $grant['Grant']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $grant['Grant']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Grant', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Grant', true), array('action' => 'copy', $grant['Grant']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="grants view">

<?php if($history_exists): ?>
<?php if($can_history_view): ?>
<h2><?php __('History'); ?></h2>
<p><a href="<?php echo $html->url("/grants/history_view/" . $grant["Grant"]["id"]); ?>"><?php __('View last saved record'); ?></a></p>
<br clear="all" />
<?php endif; ?>
<?php endif; ?>

<?php if (is_numeric($grant["Grant"]["grant_id"])): ?>
<?php if($can_view): ?>
<h2><?php __('Related'); ?></h2>
<p>
<a href="<?php echo $html->url('/grants/view/' .$grant["Grant"]["grant_id"]); ?>">プロジェクトレコード</a>
</p>
<?php endif; ?>
<?php endif; ?>
<br clear="all" />

<h2><?php  __('Grant');?></h2>

<?php echo $this->element("grants/view"); ?>

</div>

