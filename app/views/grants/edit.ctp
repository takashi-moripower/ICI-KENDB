<div id="snavi">
    <ul>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Grant.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Grant.id'))); ?></li>
        <?php endif; ?>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Grants', true), array('action' => 'index', $this->Kendb->nendo())); ?></li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Grant', true), array('action' => 'copy', $this->Form->value('Grant.id'))); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<?php echo $javascript->link('grant'); ?>

<div class="entrusts form">
<?php if (count($grant["GrantNode"]) > 0): ?>
<h2><?php __('Related'); ?></h2>
<table class="relatedview">
    <tr>
        <th><?php __('Id'); ?></th>
        <th><?php __('Represent Researcher Name'); ?></th>
        <th><?php __('Remarks1'); ?></th>
        <th><?php __('Actions'); ?></th>
    </tr>
<?php foreach($grant["GrantNode"] as $item): ?>
    <tr>
        <td><?php echo $item["id"]; ?></td>
        <td><?php echo $item["represent_researcher_name"]; ?></td>
        <td><?php echo $item["remarks1"]; ?></td>
        <td><a href="<?php echo $html->url("/grants/view_node/" . $item["id"]); ?>"><?php __('View'); ?></a>&nbsp;<?php if($can_edit_node): ?><a href="<?php echo $html->url("/grants/edit_node/" . $item["id"] ."?rtn=" . $rtn); ?>"><?php __('Edit'); ?></a><?php endif; ?></td>
    </tr>
<?php endforeach; ?>
</table>
<br clear="all" />
<?php endif; ?>
<?php if($can_add_node): ?>
<p>
<a href="<?php echo $html->url('/grants/add_node/' .$grant["Grant"]["id"]); ?>">明細レコード追加</a>
</p>
<?php endif; ?>
<br clear="all" />

<h2><?php __('Edit Grant'); ?>&nbsp;&nbsp;ID:&nbsp;<?php echo $this->Form->value('Grant.id'); ?></h2>
<?php echo $this->KendbForm->create('Grant');?>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->Form->input('id'); ?>
<?php echo $this->element("grants/form"); ?>	
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<script type="text/javascript">
    // ページロード時に編集情報を追加
    $(function() {
        jQuery.getJSON("<?php echo $html->url('/edit_statuses/start/Grant/' . $this->Form->value('Grant.id')); ?>");
    });
    
    var execBeforeUnload = true;

    function cancelBeforeUnload() {
        execBeforeUnload = false;
        setTimeout(function() {
            execBeforeUnload = true;
        }, 100);
    }

    $('a').bind('click', function() {
        if(this.href.indexOf('javascript') == 0) {
            cancelBeforeUnload();
        }
    });

    $('form').bind('submit', function() {
        cancelBeforeUnload();
    });

    // 画面離脱時に編集情報を消す
    $(window).bind("beforeunload", function() {
        jQuery.ajaxSetup({async:false});
        jQuery.getJSON(
            "<?php echo $html->url('/edit_statuses/finish/Grant/' . $this->Form->value('Grant.id')); ?>"
        );
        if(execBeforeUnload) {
            return "編集中ですが他のページに移動してよろしいですか？";
        }
    });

</script>
