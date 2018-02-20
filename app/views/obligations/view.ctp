<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('Edit Obligation', true), array('action' => 'edit', $obligation['Obligation']['obligation_code'])); ?> </li>
        <li><?php echo $this->Html->link(__('Delete Obligation', true), array('action' => 'delete', $obligation['Obligation']['obligation_code']), null, sprintf(__('Are you sure you want to delete # %s?', true), $obligation['Obligation']['obligation_code'])); ?> </li>
        <li><?php echo $this->Html->link(__('List Obligations', true), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Obligation', true), array('action' => 'add')); ?> </li>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>

<div class="obligations view">
<h2><?php  __('Obligation');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Obligation Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obligation['Obligation']['obligation_code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Obligation Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obligation['Obligation']['obligation_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ob Represent Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obligation['Obligation']['ob_represent_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ob Job Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obligation['Obligation']['ob_job_title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ob Postal Code Address'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obligation['Obligation']['ob_postal_code_address']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ob Section'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obligation['Obligation']['ob_section']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ob Person In Charge'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obligation['Obligation']['ob_person_in_charge']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Obligation Name Short'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obligation['Obligation']['obligation_name_short']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ob Postal Code'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obligation['Obligation']['ob_postal_code']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ob Address'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $obligation['Obligation']['ob_address']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

