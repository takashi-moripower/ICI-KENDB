<?php echo $this->element("crumbs"); ?>

<div class="organizations form">
    <h2>一括アップロード</h2>
    <p>
        組織テーブル情報を一括で更新します。<br />
        なお一括更新機能では、<strong style="color:red;">現在登録済のデータは全てクリア</strong>し、アップロードしたファイルの内容で上書きされます。
    </p>
    <br clear="all" />
<?php echo $form->create('Organization' ,array('type' => 'file'));?>
<fieldset>
    <legend><?php printf(__('Upload %s', true), __('Organizations', true)); ?></legend>
    <?php echo $form->file('upfile', array('size' => 50));?>
</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>