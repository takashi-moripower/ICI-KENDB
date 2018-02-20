<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <?php if($rtn): ?>
        <li><?php echo $this->Html->link(__('List Entrusts', true), $rtn); ?> </li>
        <?php else: ?>
        <li><?php echo $this->Html->link(__('List Entrusts', true), array('action' => 'index', $this->Kendb->nendo())); ?> </li>
        <?php endif; ?>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Entrust', true), array('action' => 'edit', $entrust['Entrust']['id'])); ?> </li>
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

<?php if (count($entrust["EntrustNode"]) > 0): ?>
<h2><?php __('Detailed Data'); ?></h2>
<table class="relatedview">
    <tr>
        <th><?php __('Id'); ?></th>
        <th><?php __('Researcher Name'); ?></th>
        <th><?php __('Entrust Remarks'); ?></th>
        <th><?php __('Actions'); ?></th>
    </tr>
<?php foreach($entrust["EntrustNode"] as $item): ?>
    <tr>
        <td><?php echo $item["id"]; ?></td>
        <td><?php echo $item["researcher_name"]; ?></td>
        <td><?php echo $item["entrust_remarks"]; ?></td>
        <td><a href="<?php echo $html->url("/entrusts/view_node/" . $item["id"]); ?>"><?php __('View'); ?></a>&nbsp;<?php if($can_edit_node): ?><a href="<?php echo $html->url("/entrusts/edit_node/" . $item["id"]); ?>"><?php __('Edit'); ?></a><?php endif; ?></td>
    </tr>
<?php endforeach; ?>
</table>
<br clear="all" />
<?php endif; ?>
<?php if($can_add_node): ?>
<p>
<a href="<?php echo $html->url('/entrusts/add_node/' .$entrust["Entrust"]["id"]); ?>">明細レコード追加</a>
</p>
<?php endif; ?>
<br clear="all" />

<h2><?php  __('Entrust');?></h2>

<?php echo $this->element("entrusts/view"); ?>

</div>

