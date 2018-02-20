<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Grants', true), array('action' => 'index')); ?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="grant form">
<?php echo $form->create('Grant' ,array('type' => 'file'));?>
        <fieldset>
                <legend><?php printf(__('Upload %s', true), __('Grant', true)); ?></legend>
                <?php echo $form->file('upfile', array('size' => 50));?>
                &nbsp;&nbsp;&nbsp;&nbsp;空きID(先頭): <?php echo $next_id; ?>
        </fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

