<div id="snavi">
    <ul>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Assessed Contributions', true), array('action' => 'index', $this->Kendb->nendo())); ?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="entrusts form">
<h2><?php __('Update researcher info'); ?></h2>
<p>現在登録済みの本年度のデータの研究者情報を研究者番号をもとに最新の研究者情報で一括更新します。</p>

<p class="update_count_messagebox">
対象データ件数は <?php echo $target_record_count; ?> 件です。
</p>

<p>
更新にはしばらく時間がかかります。<br />
よろしければ下記のボタンをクリックしてください。
</p>
<?php echo $this->Form->create("AssessedContribution"); ?>
<?php echo $this->Form->hidden('dummy'); ?>
<?php echo $this->Form->end(__('Update All', true)); ?>

</div>
