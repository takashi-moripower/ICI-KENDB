<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <?php if($rtn): ?>
        <li><?php echo $this->Html->link(__('List Nedo Jst Others', true), $rtn); ?> </li>
        <?php else: ?>
        <li><?php echo $this->Html->link(__('List Nedo Jst Others', true), array('action' => 'index')); ?> </li>
        <?php endif; ?>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Nedo Jst Other', true), array('action' => 'edit', $nedoJstOther['NedoJstOther']['id'])); ?> </li>
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

<?php if (count($nedoJstOther["NedoJstOtherNode"]) > 0): ?>
<h2><?php __('Detailed Data'); ?></h2>
<table class="relatedview">
    <tr>
        <th><?php __('Id'); ?></th>
        <th><?php __('Researcher Name'); ?></th>
        <th><?php __('Remarks'); ?></th>
        <th><?php __('Actions'); ?></th>
    </tr>
<?php foreach($nedoJstOther["NedoJstOtherNode"] as $item): ?>
    <tr>
        <td><?php echo $item["id"]; ?></td>
        <td><?php echo $item["researcher_name"]; ?></td>
        <td><?php echo $item["remarks"]; ?></td>
        <td><a href="<?php echo $html->url("/nedo_jst_others/view_node/" . $item["id"]); ?>"><?php __('View'); ?></a>&nbsp;<?php if($can_edit_node): ?><a href="<?php echo $html->url("/nedo_jst_others/edit_node/" . $item["id"]); ?>"><?php __('Edit'); ?></a><?php endif; ?></td>
    </tr>
<?php endforeach; ?>
</table>
<br clear="all" />
<?php endif; ?>
<?php if($can_add_node): ?>
<p>
<a href="<?php echo $html->url('/nedo_jst_others/add_node/' .$nedoJstOther["NedoJstOther"]["id"]); ?>">明細レコード追加</a>
</p>
<?php endif; ?>
<br clear="all" />

<h2><?php  __('Nedo Jst Other');?></h2>

<?php echo $this->element("nedo_jst_others/view"); ?>

</div>

