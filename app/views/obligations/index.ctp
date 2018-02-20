<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('New Obligation', true), array('action' => 'add')); ?></li>
        <?php if($can_output_excel): ?>
        <li><a href="<?php echo $html->url('/obligations/output_excel'). "/format:Excel5" ?>">Excel形式ダウンロード(.xls)</a></li>
        <li><a href="<?php echo $html->url('/obligations/output_excel'). "/format:Excel2007" ?>">Excel2007形式ダウンロード(.xlsx)</a></li>
        <?php endif; ?>
        <?php if($can_upload): ?>
        <li><a href="<?php echo $html->url('/obligations/upload'); ?>">一括アップロード</a></li>
        <?php endif; ?>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>

<?php echo $this->element("table_switcher_head", array("count" => count($obligations))); ?>

<div class="obligations index">
	<h2><?php __('Obligations');?></h2>

        <?php echo $this->element("paginate"); ?>

    <div class="fakeContainer">
	<table id="flexme">
        <thead>
	<tr>
            <th width="90" class="actions"><?php __('Actions');?></th>
            <th width="90"><?php echo $this->Paginator->sort('obligation_code');?></th>
            <th width="90"><?php echo $this->Paginator->sort('obligation_name');?></th>
            <th width="90"><?php echo $this->Paginator->sort('ob_represent_name');?></th>
            <th width="50"><?php echo $this->Paginator->sort('ob_job_title');?></th>
            <th width="150"><?php echo $this->Paginator->sort('ob_postal_code_address');?></th>
            <th width="90"><?php echo $this->Paginator->sort('ob_section');?></th>
            <th width="50"><?php echo $this->Paginator->sort('ob_person_in_charge');?></th>
            <th width="90"><?php echo $this->Paginator->sort('obligation_name_short');?></th>
            <th width="50"><?php echo $this->Paginator->sort('ob_postal_code');?></th>
            <th width="120"><?php echo $this->Paginator->sort('ob_address');?></th>
	</tr>
        </thead>
        <tbody>
	<?php
	$i = 0;
	foreach ($obligations as $obligation):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
            <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $obligation['Obligation']['obligation_code'])); ?>
                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $obligation['Obligation']['obligation_code'])); ?>
                    <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $obligation['Obligation']['obligation_code']), null, sprintf(__('Are you sure you want to delete # %s?', true), $obligation['Obligation']['obligation_code'])); ?>
            </td>
            <td><?php echo $obligation['Obligation']['obligation_code']; ?>&nbsp;</td>
            <td><?php echo $obligation['Obligation']['obligation_name']; ?>&nbsp;</td>
            <td><?php echo $obligation['Obligation']['ob_represent_name']; ?>&nbsp;</td>
            <td><?php echo $obligation['Obligation']['ob_job_title']; ?>&nbsp;</td>
            <td><?php echo $obligation['Obligation']['ob_postal_code_address']; ?>&nbsp;</td>
            <td><?php echo $obligation['Obligation']['ob_section']; ?>&nbsp;</td>
            <td><?php echo $obligation['Obligation']['ob_person_in_charge']; ?>&nbsp;</td>
            <td><?php echo $obligation['Obligation']['obligation_name_short']; ?>&nbsp;</td>
            <td><?php echo $obligation['Obligation']['ob_postal_code']; ?>&nbsp;</td>
            <td><?php echo $obligation['Obligation']['ob_address']; ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
        </tbody>
	</table>
    </div>

    <?php echo $this->element("paginate"); ?>

    <?php echo $this->element("table_switcher_foot"); ?>

</div>
