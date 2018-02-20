<script type="text/javascript">
$(function(){
    $('input[type="submit"]').keypress(function(e){
            return true;
    });

    // 簡易検索
    $('#SummaryKeyword').keypress(function(e){
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
			$("#SummaryForm").submit();
		}
    });
    // 詳細検索
    $('form#SummaryIndexForm input[type="text"]').keypress(function(e){
        if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
			$("#SummaryIndexForm").submit();
		}
    });
});
</script>


<br />
<div align="center">
	<?php echo $this->KendbForm->create('Summary',
                                        array('id' => 'SummaryForm',
                                              'url' => array_merge(array('action' => 'index'),
                                                                   $this->params['pass']))); ?>
	<?php echo $this->Form->input('keyword',
                                  array('label' => false,
                                        'div' => false,
                                        'style' => 'font-size:18px;width:550px;padding:2px')); ?>

    <?php echo $form->submit(__('Search', true),
                             array('div' => false,
                                   'style' => 'font-size:18px;')); ?>&nbsp;

	<a id="show_detail" href="javascript:void(0);">詳細検索</a>
	<script type="text/javascript">
		$(function(){
			$("#detail").css("display", "none");
			$("#show_detail").click(function(){$("#detail").toggle();});
		}
		);
	</script>
    <?php echo $form->end(); ?>
</div>

	<div id="detail" style="border:1px solid #555555;margin:8px 8px 8px 0px;padding:8px;">
    <?php echo $this->KendbForm->create('Summary',
                                        array('url' => array_merge(array('action' => 'index'),
                                                                   $this->params['pass']))); ?>

    <table border="0" cellspacing="4" class="entrust_search_table">
    <tr>
    <td><?php echo $this->KendbForm->nendoPullDown('year_f', array('label' => '年度(From)')); ?></td>
    <td><?php echo $this->KendbForm->nendoPullDown('year_t', array('label' => '年度(To)')); ?></td>
    <td>
      <?php echo $this->Form->input("department",
                                    array('div' => false,
                                          'label' => __('Common Search Department', true))); ?>
    </td>
    <td>
      <?php echo $this->Form->input("major_name",
                                    array('div' => false,
                                          'label' => __('Major Name', true))); ?>     <!-- #270 -->
    </td>
    <td colspan="2">
        <?php echo $this->Form->input("researcher_name",
                                      array('div' => false,
                                            'style' => 'width:200px !important;',
                                            'label' => '氏名(複数キーワードは or で区切ってください)')); ?></td>

    <td><?php echo $this->Form->input("job_title",
                                      array('div' => false,
                                            'label' => __('Common Search Job Title', true))); ?></td>

	<td><?php echo $this->Form->input("amount_f",
                                      array('div' => false,
                                            'label' => __('Common Search Amount', true)."(From)")); ?></td>

	<td><?php echo $this->Form->input("amount_t",
                                      array('div' => false,
                                            'label' => "(To)")); ?></td>

	<td><?php echo $this->Form->input("direct_cost_f",
                                      array('div' => false,
                                            'label' => __('Common Search Direct Cost', true)."(From)")); ?></td>

	<td><?php echo $this->Form->input("direct_cost_t",
                                      array('div' => false,
                                            'label' => "(To)")); ?></td>
	</tr>

	<tr>
	<td><?php echo $this->Form->input("indirect_cost_f",
                                      array('div' => false,
                                            'label' => __('Common Search Indirect Cost', true)."(From)")); ?></td>

	<td><?php echo $this->Form->input("indirect_cost_t",
                                      array('div' => false,
                                            'label' => "(To)")); ?></td>

	<td><?php echo $this->Form->input("start_date_f",
                                      array('class' => 'help',
                                            'div' => false,
                                            'title'=> 'YYYY-MM-DD',
                                            'label' => __('Common Search Start Date', true)."(From)")); ?></td>

	<td><?php echo $this->Form->input("start_date_t",
                                      array('class' => 'help',
                                            'div' => false,
                                            'title'=> 'YYYY-MM-DD',
                                            'label' => "(To)")); ?></td>

	<td><?php echo $this->Form->input("end_date_f",
                                      array('class' => 'help',
                                            'div' => false,
                                            'title'=> 'YYYY-MM-DD',
                                            'label' => __('Common Search End Date', true)."(From)")); ?></td>

	<td><?php echo $this->Form->input("end_date_t",
                                      array('class' => 'help',
                                            'div' => false,
                                            'title'=> 'YYYY-MM-DD',
                                            'label' => "(To)")); ?></td>

    <td><?php echo $this->Form->input("research_type",
                                      array('div' => false,
                                            'label' => __('Common Search Research Type', true))); ?></td>

    <td><?php echo $this->Form->input("subject",
                                      array('type' => 'text',
                                            'div'=>false,
                                            'label' => __('Common Search Subject', true))); ?></td>

    <td><?php echo $this->Form->input("fund_owner",
                                      array('type' => 'text',
                                            'div'=>false,
                                            'label' => __('Common Search Fund Owner', true))); ?></td>

    <td><?php echo $this->Form->input("memo",
                                      array('type' => 'text',
                                            'div'=>false,
                                            'label' => __('Common Search Memo', true))); ?></td>
    </tr>
    </table>

    <?php
		// 特別研究員奨励費は横断検索対象外
		$arr = array("Adoption", "OtherResearchGrant", "MhlwResearchGrant",
        	         "AssessedContribution", "Entrust", "Donation", "NedoJstOther", "Contract", "Grant");
    ?>
    <script type="text/javascript">
        $(function() {
            $('#selectall').click(function(){
                <?php foreach($arr as $item): ?>
                $('#Summary<?php echo $item; ?>').attr("checked", true);
                <?php endforeach; ?>
            });
            $('#deselectall').click(function(){
                <?php foreach($arr as $item): ?>
                $('#Summary<?php echo $item; ?>').attr("checked", false);
                <?php endforeach; ?>
            });
        });
    </script>

    <table border="0" cellspacing="4" class="entrust_search_table">
    <tr>
    <td>
        <input type="button" name="selectall" value="全て選択" id="selectall"
                style="font-size:10px; padding:1px; width:60px !important;" /><br />
        <input type="button" name="deselectall" value="全て解除" id="deselectall"
                style="font-size:10px; padding:1px; width:60px !important;" />
    </td>

    <?php
    foreach($arr as $item):
        $c = false;
        if($this->Form->value($item) == "1") {
            $c = true;
        }
    ?>
    <td valign="top" align="center" style="padding:2px;">
        <?php echo $this->Form->input($item,
                                      array('type' => 'checkbox',
                                            'div' => false, 'value' => 1,
                                            'checked' => $c)); ?><!--<br /><?php __($item); ?>--></td>
    <?php endforeach; ?>
    </tr>

    <tr> <!-- 年齢関係 -->
<?php if(0): //2017.09.25 ?>
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
                                            'title'=> 'YYYY-MM-DD',
                                            'default' => date('Y-m-d'),
                                            'label' => __('Age Based At', true))); ?>
     </td>
<?php endif; ?>
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
      <td>
        <?php echo $this->Form->input("institute_code",
                                      array('div' => false,
                                            'label' => __('Institute Code', true))); ?>
      </td>
      <td>
        <?php echo $this->Form->input("school_code",
                                      array('div' => false,
                                            'label' => __('School Code', true))); ?>
      </td>
      <td>
        <?php echo $this->Form->input("course_code",
                                      array('div' => false,
                                            'label' => __('Course Code', true))); ?>
      </td>
    </tr>
    </table>
    <?php echo $form->input('record_filter',
                            array('type' => 'select',
                                  'div' => false,
                                  'label' => false,
                                  'options' => array(
                                    '1' => '明細レコードのみ表示',
                                    '2' => 'プロジェクトレコードのみ表示'))); ?>

	<?php echo $form->submit(__('Search', true),
                            array('div' => false,
                                  'style' => 'font-size:18px')); ?>&nbsp;

    <?php echo $form->end(); ?>
	</div>

    <br />
	<div align="center">
    <p>※データへのアクセス権限があるデータのみ表示されます。</p>
	</div>
    <br clear="all" />

	<?php echo $this->element("form_tips"); ?>

