指定した年度のデータを削除します。本機能ではデータを完全に削除しますので十分に注意して利用してください。
<br />
<?php echo $this->KendbForm->create(); ?>
<?php echo $this->KendbForm->input('year', array('type' => 'select', 'options' => $year_array)); ?>
<?php echo $this->KendbForm->submit("削除", array('name'=>'submit', 'onClick'=>"return confirm('指定した年度のデータを完全削除します。よろしいですか？')")); ?>
<?php echo $this->KendbForm->end(); ?>
