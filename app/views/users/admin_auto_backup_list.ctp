<?php echo $this->element("crumbs"); ?>

<div class="users index">
    <h2><?php __('Database Backup List'); ?></h2>
    <blockquote style="border:1px solid; padding : 4px; width:400px;">
    <?php foreach($lines as $line): ?>
    <?php echo $line . "<br />"; ?>
    <?php endforeach; ?>
    </blockquote>
</div>
