
<p><?php echo $message; ?></p>

<?php if (count($error_message) > 0 ) { ?>
    <table id="flexme">
    <thead>
    <tr>
        <th width="40">データ行</th>
        <th width="500">エラー内容</th>
    </tr>
    </thead>
    <tbody>
<?php } ?>
<?php foreach ($error_message as $error) {
    $error_str = "";
    foreach($error["error"] as $k => $v) {
        $error_str .= __(Inflector::humanize($k), true) . "：" . $v;
        $error_str .= "<br />";
    }
?>
    <tr>
        <td><?php echo $error["line"]; ?></td>
        <td><?php echo $error_str; ?></td>
    </tr>
<?php } ?>
<?php if (count($error_message) > 0 ) { ?></tbody></table><?php } ?>

<script type="text/javascript">
$('#flexme').flexigrid({height:'auto',striped:true});
$('#flexme').show();
</script>
