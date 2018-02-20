<div id="snavi">
    <ul>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Entrust.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Entrust.id'))); ?></li>
        <?php endif; ?>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Entrusts', true), array('action' => 'index', $this->Kendb->nendo())); ?></li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Entrust', true), array('action' => 'copy', $this->Form->value('Entrust.id'))); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<?php echo $javascript->link('entrust'); ?>

<div class="entrusts form">

<?php if (count($entrust["EntrustNode"]) > 0): ?>
<h2><?php __('Related'); ?></h2>
<table class="relatedview">
    <tr>
        <th><?php __('Id'); ?></th>
        <th><?php __('Researcher Name'); ?></th>
        <th><?php __('Entrust Remarks'); ?></th>
        <th><?php __('Actions'); ?></th>
    </tr>
<?php foreach($entrust["EntrustNode"] as $item): ?>
    <tr>
        <td><?php echo $item["id"]; ?></td>
        <td><?php echo $item["researcher_name"]; ?></td>
        <td><?php echo $item["entrust_remarks"]; ?></td>
        <td><a href="<?php echo $html->url("/entrusts/view_node/" . $item["id"]); ?>"><?php __('View'); ?></a>&nbsp;<?php if($can_edit_node): ?><a href="<?php echo $html->url("/entrusts/edit_node/" . $item["id"]. "?rtn=" . $rtn); ?>"><?php __('Edit'); ?></a><?php endif; ?></td>
    </tr>
<?php endforeach; ?>
</table>
<br clear="all" />
<?php endif; ?>
<?php if($can_add_node): ?>
<p>
<a href="<?php echo $html->url('/entrusts/add_node/' .$entrust["Entrust"]["id"]); ?>">明細レコード追加</a>
</p>
<?php endif; ?>
<br clear="all" />
<h2><?php __('Edit Entrust'); ?>&nbsp;&nbsp;ID:&nbsp;<?php echo $this->Form->value('Entrust.id'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('Entrust');?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->element("entrusts/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<script type="text/javascript">
    // ページロード時に編集情報を追加
    $(function() {
        jQuery.getJSON("<?php echo $html->url('/edit_statuses/start/Entrust/' . $this->Form->value('Entrust.id')); ?>");
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
            "<?php echo $html->url('/edit_statuses/finish/Entrust/' . $this->Form->value('Entrust.id')); ?>"
        );
        if(execBeforeUnload) {
            return "編集中ですが他のページに移動してよろしいですか？";
        }
    });

</script>
