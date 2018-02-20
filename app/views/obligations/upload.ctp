<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Obligations', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="obligations form">
<?php echo $form->create('Obligation' ,array('type' => 'file'));?>
        <fieldset>
                <legend><?php printf(__('Upload %s', true), __('Obligation', true)); ?></legend>
                <?php echo $form->file('upfile', array('size' => 50));?>
        </fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

