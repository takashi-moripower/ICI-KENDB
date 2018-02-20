<script type="text/javascript">
</script>


<div id="aggregate-form">
<?php echo $this->KendbForm->create(
    'Summary',
    array('url' => array_merge(array('action' => 'aggregate'),
                                     $this->params['pass']))); ?>

<table class="aggregate-condition-table">
    <tr>
      <td><?php echo $this->KendbForm->nendoPullDown(
        'year_from', array('div' => false, 'label' => '対象年度(From)')); ?></td>
      <td><?php echo $this->KendbForm->nendoPullDown(
        'year_to', array('div' => false, 'label' => '対象年度(To)')); ?></td>
    </tr>
    <tr> <!-- 年齢関係 -->
     <td>
        <?php echo $this->Form->input("age",
                                    array('div' => false,
                                          'label' => __('Age', true))); ?>
     </td>
      <td>
        <?php echo $form->input('age_under',
                            array('type' => 'select',
                                  'div' => false,
                                  'label' => '以上/以下',
                                  'options' => array('1' => '以下',
                                                     '2' => '以上'))); ?>
      </td>
	 <td><?php echo $this->Form->input("age_based_at",
                                      array('class' => 'help',
                                            'div' => false,
                                            'default' => date('Y-m-d'),
                                            'title'=> 'YYYY-MM-DD',
                                            'label' => __('Age Based At', true))); ?>
     </td>
     <td>
        <?php echo $form->input('sex',
                            array('type' => 'select',
                                  'div' => false,
                                  'label' => '性別',
                                  'options' => array(
                                    null => '---',
                                    '女' => '女性',
                                    '男' => '男性'))); ?>
     </td>

 </tr>
 <tr><!--- ランキング関係 -->
   <td>
        <?php echo $form->input(
            'aggregate_for',
            array('type' => 'select',
                  'div' => false,
                  'label' => '集計',
                  'options' => array(
                        'amount' => '金額',
                        'count' => '件数',
                  ))); ?>
    </td>
   <td>
        <?php echo $form->input('rank_order',
                            array('type' => 'select',
                                  'div' => false,
                                  'label' => '上位/下位',
                                  'options' => array('desc' => '上位',
                                                     'asc' => '下位'))); ?>
    </td>
	 <td><?php echo $this->Form->input("rank_count",
                                      array('class' => 'help',
                                            'div' => false,
                                            'title'=> '件数',
                                            'default' => 30,
                                            'label' => __('Rank Count', true))); ?>
     </td>
 </tr>
 <tr class="options">
   <td colspan="2"> <?php echo $this->Form->input(
                        'use_unaggregate',
                         array('type' => 'checkbox',
                               'div' => false, 'value' => 1,
                               'label' => '集計対象外を含む',
                               'checked' => $this->Form->value('use_unaggregate'))); ?>
   </td>
   <td colspan="2"> <?php echo $this->Form->input(
                        'include_amount_0',
                         array('type' => 'checkbox',
                               'div' => false, 'value' => 1,
                                'label' => '受け入れ金額0円も件数にカウントする',
                                'checked' => $this->Form->value('include_amount_0'))); ?>
   </td>
 </tr>
</table>
<?php echo $form->submit(
    __('Search', true),
    array('div' => false,
          'style' => 'font-size:18px')); ?>&nbsp;

<?php echo $form->end(); ?>
<a href="<?php echo $this->Html->url(array('controller'=>'summaries','action'=>'aggregate'));?>">
        条件リセット</a>

<?php if(isset($urlparams)): ?>
<a href="<?php echo $this->Html->url(array('controller'=>'summaries','action'=>'aggregate')),$urlparams ;?>">
        ダウンロード</a>
<?php endif ; ?>

</div>
<br clear="all" />
