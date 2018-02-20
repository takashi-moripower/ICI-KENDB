<div id="snavi">
    <ul>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Encourage.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Encourage.id'))); ?></li>
        <?php endif; ?>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Encourages', true), array('action' => 'index', $this->Kendb->nendo())); ?></li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Encourage', true), array('action' => 'copy', $this->Form->value('Encourage.id'))); ?> </li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<?php echo $javascript->link('encourage'); ?>

<div class="encourages form">
<h2><?php __('Edit Encourage'); ?>&nbsp;&nbsp;ID:&nbsp;<?php echo $this->Form->value('Encourage.id'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('Encourage');?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->element("encourages/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<script type="text/javascript">
    // ページロード時に編集情報を追加
    $(function() {
        jQuery.getJSON("<?php echo $html->url('/edit_statuses/start/Encourage/' . $this->Form->value('Encourage.id')); ?>");
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
            "<?php echo $html->url('/edit_statuses/finish/Encourage/' . $this->Form->value('Encourage.id')); ?>"
        );
        if(execBeforeUnload) {
            return "編集中ですが他のページに移動してよろしいですか？";
        }
    });

</script>
