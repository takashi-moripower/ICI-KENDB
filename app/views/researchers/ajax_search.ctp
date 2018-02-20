<?php if (count($researchers) == 0):?>
<p>
該当するデータがありません。他のキーワードで検索してください。<br />
※複数キーワードによる検索には対応していません。
</p>
<?php endif; ?>
<?php foreach($researchers as $item) { ?>
<a href="javascript:void(0);" onclick="javascript:set_rinfo(<?php echo $item["Researcher"]["id"]; ?>, '<?php echo $prefix; ?>'); return false;">
<?php echo h($item["Researcher"]["researcher_name"]); ?>
(
<?php echo h($item["Researcher"]["institute_code"]); ?>,
<?php echo h($item["Researcher"]["job_title"]); ?>
)
</a>
<br />
<?php } ?>
