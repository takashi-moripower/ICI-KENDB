<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <?php if($rtn): ?>
        <li><?php echo $this->Html->link(__('List Adoptions', true), $rtn); ?> </li>
        <?php else: ?>
        <li><?php echo $this->Html->link(__('List Adoptions', true), array('action' => 'index')); ?> </li>
        <?php endif; ?>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Adoption', true), array('action' => 'edit', $adoption['Adoption']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete Adoption', true), array('action' => 'delete', $adoption['Adoption']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $adoption['Adoption']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Adoption', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Adoption', true), array('action' => 'copy', $adoption['Adoption']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="adoptions view">

<?php if($history_exists): ?>
<?php if($can_history_view): ?>
<h2><?php __('History'); ?></h2>
<p><a href="<?php echo $html->url("/adoptions/history_view/" . $adoption["Adoption"]["id"]); ?>"><?php __('View last saved record'); ?></a></p>
<br clear="all" />
<?php endif; ?>
<?php endif; ?>

<h2><?php  __('Adoption');?></h2>
<?php echo $this->element("adoptions/view"); ?>
</div>



