<?php echo $this->element("crumbs"); ?>

<div class="contract form">
<?php echo $form->create('Donation' ,array('type' => 'file'));?>
        <fieldset>
                <legend><?php printf(__('Upload %s', true), __('Donation', true)); ?></legend>
                <?php echo $form->file('upfile', array('size' => 50));?>
                &nbsp;&nbsp;&nbsp;&nbsp;空きID(先頭): <?php echo $next_id; ?>
        </fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

