<div id="snavi">
	<ul>
		<li><?php echo $this->Html->link(__('List Donations', true), array('action' => 'index', $this->Kendb->nendo()));?></li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<?php echo $javascript->link('donation'); ?>

<div class="contracts form">
<p>このデータは<?php e(h($editinfo["User"]["displayname"])); ?>さんによって <?php e ($editinfo["EditStatus"]["created"]); ?> から編集中です。</p>

<br />
<input type="button" name="release_lock" id="release_lock" value="ロック解除">
<br />※自分がかけたロックのみ解放できます。
</div>

<?php echo $this->element("release_lock"); ?>
