<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Projects', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="projects form">
<?php echo $form->create('Project' ,array('type' => 'file'));?>
        <fieldset>
                <legend><?php printf(__('Upload %s', true), __('Project', true)); ?></legend>
                <?php echo $form->file('upfile', array('size' => 50));?>
        </fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

