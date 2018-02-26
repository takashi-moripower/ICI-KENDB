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

<section class="import-report">
    <h2>インポート結果報告</h2>
    <?= $this->element('import/report') ?>
    <p>
        データのインポートは正常に実行されました
    </p>
    <p>
        以下の場所にログファイルが生成されました<br/>
        <?= $logFile ?>
    </p>
</section>

<?php if (isset($DEBUG)): ?>
    <pre>
        <?php print_r($DEBUG); ?>
    </pre>
<?php endif; ?>

