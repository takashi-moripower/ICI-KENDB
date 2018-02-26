<div id="snavi">
    <ul>
        <?php if ($can_index): ?>
            <?php
            $label = "List " . ucfirst($this->viewPath);
            ?>
            <li><?php echo $this->Html->link(__($label, true), array('action' => 'index', $this->Kendb->nendo())); ?></li>
        <?php endif; ?>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>

<section style="padding:1rem;">
    <h2>インポート結果報告</h2>
    <?= $this->element('import/report') ?>
    <p>
        以上の原因により、インポート処理を中止しました<br/>
        データベースの更新は行われていません
    </p>
    <p>
        以下の場所にログファイルが生成されました<br/>
        <?= $logFile ?><br/>
    </p>
</section>

<?php if (isset($DEBUG)): ?>
    <pre>
        <?php print_r($DEBUG); ?>
    </pre>
<?php endif; ?>
