<div id="keyword_search" style="float:left; margin-top : 0px;">
<?php echo $this->Form->create($modelname, array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); ?>
<?php echo $this->KendbForm->input("keyword", array('label' => false, 'div' => false)); ?>&nbsp;
<?php echo $this->KendbForm->submit(__('Search', true), array('div' => false)); ?>
<?php echo $this->KendbForm->end();?>
</div>
