<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <?php if($rtn): ?>
        <li><?php echo $this->Html->link(__('List Grants', true), $rtn); ?> </li>
        <?php else: ?>
        <li><?php echo $this->Html->link(__('List Grants', true), array('action' => 'index', $this->Kendb->nendo())); ?> </li>
        <?php endif; ?>
        <?php endif; ?>
        <?php if($can_edit): ?>
        <li><?php echo $this->Html->link(__('Edit Grant', true), array('action' => 'edit', $grant['Grant']['id'])); ?> </li>
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

<?php if (count($grant["GrantNode"]) > 0): ?>
<h2><?php __('Detailed Data'); ?></h2>
<table class="relatedview">
    <tr>
        <th><?php __('Id'); ?></th>
        <th><?php __('Represent Researcher Name'); ?></th>
        <th><?php __('Remarks1'); ?></th>
        <th><?php __('Actions'); ?></th>
    </tr>
<?php foreach($grant["GrantNode"] as $item): ?>
    <tr>
        <td><?php echo $item["id"]; ?></td>
        <td><?php echo $item["represent_researcher_name"]; ?></td>
        <td><?php echo $item["remarks1"]; ?></td>
        <td><a href="<?php echo $html->url("/grants/view_node/" . $item["id"]); ?>"><?php __('View'); ?></a>&nbsp;<?php if($can_edit_node): ?><a href="<?php echo $html->url("/grants/edit_node/" . $item["id"]); ?>"><?php __('Edit'); ?></a><?php endif; ?></td>
    </tr>
<?php endforeach; ?>
</table>
<br clear="all" />
<?php endif; ?>
<?php if($can_add_node): ?>
<p>
<a href="<?php echo $html->url('/grants/add_node/' .$grant["Grant"]["id"]); ?>">明細レコード追加</a>
</p>
<?php endif; ?>
<br clear="all" />


<h2><?php  __('Grant');?></h2>
<?php echo $this->element("grants/view"); ?>

</div>

