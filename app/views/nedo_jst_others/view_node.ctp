<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Nedo Jst Others', true), array('action' => 'index')); ?> </li>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Nedo Jst Other', true), array('action' => 'edit_node', $nedoJstOther['NedoJstOther']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete Nedo Jst Other', true), array('action' => 'delete', $nedoJstOther['NedoJstOther']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $nedoJstOther['NedoJstOther']['id'])); ?> </li>
        <?php endif; ?>
        <?php if($can_add): ?>
        <li><?php echo $this->Html->link(__('New Nedo Jst Other', true), array('action' => 'add')); ?> </li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Nedo Jst Other', true), array('action' => 'copy', $nedoJstOther['NedoJstOther']['id'])); ?> </li>
        <?php endif; ?>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="nedoJstOthers view">

<?php if($history_exists): ?>
<?php if($can_history_view): ?>
<h2><?php __('History'); ?></h2>
<p><a href="<?php echo $html->url("/nedo_jst_others/history_view/" . $nedoJstOther["NedoJstOther"]["id"]); ?>"><?php __('View last saved record'); ?></a></p>
<br clear="all" />
<?php endif; ?>
<?php endif; ?>

<?php if (is_numeric($nedoJstOther["NedoJstOther"]["nedo_jst_other_id"])): ?>
<?php if($can_view): ?>
<h2><?php __('Related'); ?></h2>
<p>
<a href="<?php echo $html->url('/nedo_jst_others/view/' .$nedoJstOther["NedoJstOther"]["nedo_jst_other_id"]); ?>">プロジェクトレコード</a>
</p>
<?php endif; ?>
<?php endif; ?>
<br clear="all" />

<h2><?php  __('Nedo Jst Other');?></h2>

<?php echo $this->element("nedo_jst_others/view"); ?>

</div>

