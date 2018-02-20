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
<?php echo $this->KendbForm->create('NedoJstOther');?>
<h2><?php __('Edit Nedo Jst Other'); ?>&nbsp;&nbsp;ID:&nbsp;<?php echo $this->Form->value('NedoJstOther.id'); ?> (<?php echo sprintf(__('Child Node of %d', true), $this->Form->value("nedo_jst_other_id"));?>)</h2>
<p><em><?php echo __('This data is child node', true); ?></em></p>
<?php echo $this->element('validate_errors'); ?>

<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->hidden('nedo_jst_other_id'); ?>
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


