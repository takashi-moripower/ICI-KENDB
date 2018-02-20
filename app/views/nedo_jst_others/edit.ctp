<div id="snavi">
    <ul>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('NedoJstOther.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('NedoJstOther.id'))); ?></li>
        <?php endif; ?>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Nedo Jst Others', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="nedoJstOthers form">
<?php if (count($nedoJstOther["NedoJstOtherNode"]) > 0): ?>
<h2><?php __('Related'); ?></h2>
<table class="relatedview">
    <tr>
        <th><?php __('Id'); ?></th>
        <th><?php __('Researcher Name'); ?></th>
        <th><?php __('Remarks'); ?></th>
        <th><?php __('Actions'); ?></th>
    </tr>
<?php foreach($nedoJstOther["NedoJstOtherNode"] as $item): ?>
    <tr>
        <td><?php echo $item["id"]; ?></td>
        <td><?php echo $item["researcher_name"]; ?></td>
        <td><?php echo $item["remarks"]; ?></td>
        <td><a href="<?php echo $html->url("/nedo_jst_others/view_node/" . $item["id"]); ?>"><?php __('View'); ?></a>&nbsp;<a href="<?php echo $html->url("/nedo_jst_others/edit_node/" . $item["id"] . "?rtn=" . $rtn); ?>"><?php __('Edit'); ?></a></td>
    </tr>
<?php endforeach; ?>
</table>
<br clear="all" />
<?php endif; ?>
<?php if($can_add_node): ?>
<p>
<a href="<?php echo $html->url('/nedo_jst_others/add_node/' .$nedoJstOther["NedoJstOther"]["id"]); ?>">明細レコード追加</a>
</p>
<?php endif; ?>
<br clear="all" />    

<h2><?php __('Edit Nedo Jst Other'); ?>&nbsp;&nbsp;ID:&nbsp;<?php echo $this->Form->value('NedoJstOther.id'); ?></h2>
<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('NedoJstOther');?>
<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->element('nedo_jst_others/form'); ?>

<?php echo $this->Form->end(__('Submit', true));?>
</div>

<!-- @TODO element化すること -->
<script type="text/javascript">
    // ページロード時に編集情報を追加
    $(function() {
        jQuery.getJSON("<?php echo $html->url('/edit_statuses/start/NedoJstOther/' . $this->Form->value('NedoJstOther.id')); ?>");
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
            "<?php echo $html->url('/edit_statuses/finish/NedoJstOther/' . $this->Form->value('NedoJstOther.id')); ?>"
        );
        if(execBeforeUnload) {
            return "編集中ですが他のページに移動してよろしいですか？";
        }
    });

</script>


