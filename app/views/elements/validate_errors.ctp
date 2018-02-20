<?php if(isset($validate_errors) && is_array($validate_errors) && count($validate_errors) > 0): ?>
<div id="validate_errors">
<dl>
<?php foreach($validate_errors as $k => $v): ?>
    <dt><?php echo __(Inflector::humanize($k), true) ;?></dt>
    <dd><?php echo $v; ?></dd>
<?php endforeach; ?>
</dl>
</div>
<?php endif; ?>

