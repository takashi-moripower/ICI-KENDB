<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <?php if($rtn): ?>
        <li><?php echo $this->Html->link(__('List Contracts', true), $rtn); ?> </li>
        <?php else: ?>
        <li><?php echo $this->Html->link(__('List Contracts', true), array('action' => 'index', $this->Kendb->nendo())); ?> </li>
        <?php endif; ?>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Contract', true), array('action' => 'edit', $contract['Contract']['id'])); ?> </li>
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

<?php if (count($contract["ContractNode"]) > 0): ?>
<h2><?php __('Detailed Data'); ?></h2>
<table class="relatedview">
    <tr>
        <th><?php __('Id'); ?></th>
        <th><?php __('Represent Researcher Name'); ?></th>
        <th><?php __('Remarks1'); ?></th>
        <th><?php __('Actions'); ?></th>
    </tr>
<?php foreach($contract["ContractNode"] as $item): ?>
    <tr>
        <td><?php echo $item["id"]; ?></td>
        <td><?php echo $item["represent_researcher_name"]; ?></td>
        <td><?php echo $item["remarks1"]; ?></td>
        <td><a href="<?php echo $html->url("/contracts/view_node/" . $item["id"]); ?>"><?php __('View'); ?></a>&nbsp;<?php if($can_edit_node): ?><a href="<?php echo $html->url("/contracts/edit_node/" . $item["id"]); ?>"><?php __('Edit'); ?></a><?php endif; ?></td>
    </tr>
<?php endforeach; ?>
</table>
<br clear="all" />
<?php endif; ?>
<?php if($can_add_node): ?>
<p>
<a href="<?php echo $html->url('/contracts/add_node/' .$contract["Contract"]["id"]); ?>">明細レコード追加</a>
</p>
<?php endif; ?>
<br clear="all" />


<h2><?php  __('Contract');?></h2>
<?php echo $this->element("contracts/view"); ?>

</div>

