<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('New Information', true), array('action' => 'add')); ?></li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<?php echo $this->element("table_switcher_head", array("count" => count($information))); ?>

<div class="information index">
<h2><?php __('Information');?></h2>

<?php echo $this->element("paginate"); ?>

    <div class="fakeContainer">
        <table id="flexme">
            <thead>
                <tr>
                <th class="actions"><?php __('Actions');?></th>
                <th><?php echo $this->Paginator->sort('id');?></th>
                <th><?php echo $this->Paginator->sort('name');?></th>
                <th><?php echo $this->Paginator->sort('description');?></th>
                <th><?php echo $this->Paginator->sort('disabled');?></th>
                <th><?php echo $this->Paginator->sort('startdate');?></th>
                <th><?php echo $this->Paginator->sort('enddate');?></th>
                <th><?php echo $this->Paginator->sort('created');?></th>
                <th><?php echo $this->Paginator->sort('updated');?></th>
        	</tr>
            </thead>
            <tbody>
	<?php
	$i = 0;
	foreach ($information as $information):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
            <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $information['Information']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $information['Information']['id'])); ?>
                    <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $information['Information']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $information['Information']['id'])); ?>
            </td>
            <td><?php echo $information['Information']['id']; ?>&nbsp;</td>
            <td><?php echo $information['Information']['name']; ?>&nbsp;</td>
            <td><?php echo nl2br(h($information['Information']['description'])); ?>&nbsp;</td>
            <td><?php echo $information['Information']['disabled']; ?>&nbsp;</td>
            <td><?php echo $information['Information']['startdate']; ?>&nbsp;</td>
            <td><?php echo $information['Information']['enddate']; ?>&nbsp;</td>
            <td><?php echo $information['Information']['created']; ?>&nbsp;</td>
            <td><?php echo $information['Information']['updated']; ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
        </tbody>
        </table>
        </div>

    <?php echo $this->element("paginate"); ?>

    <?php echo $this->element("form_tips"); ?>

    <?php echo $this->element("table_switcher_foot"); ?>


</div>

