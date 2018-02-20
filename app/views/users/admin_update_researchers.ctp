<?php echo $this->element("crumbs"); ?>

<div class="users index">
    <h2>研究者情報更新結果</h2>
    <blockquote style="border:1px solid; padding : 4px; width:400px;">
    <?php foreach($lines as $line): ?>
    <?php echo $line . "<br />"; ?>
    <?php endforeach; ?>
    </blockquote>
</div>
