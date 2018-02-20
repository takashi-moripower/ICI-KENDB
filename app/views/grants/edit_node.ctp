<div id="snavi">
    <ul>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Grant.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Grant.id'))); ?></li>
        <?php endif; ?>
        <?php if($can_index): ?>
        <li><?php echo $this->Html->link(__('List Grants', true), array('action' => 'index'));?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<?php echo $javascript->link('grant'); ?>

<div class="grants form">
<?php echo $this->KendbForm->create('Grant');?>
<h2><?php __('Edit Grant'); ?>&nbsp;&nbsp;ID:&nbsp;<?php echo $this->Form->value('Grant.id'); ?> (<?php echo sprintf(__('Child Node of %d', true), $this->Form->value("grant_id"));?>)</h2>
<p><em><?php echo __('This data is child node', true); ?></em></p>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->Form->hidden('id'); ?>
<?php echo $this->Form->hidden('grant_id'); ?>
<?php echo $this->element('grants/form'); ?>

<?php echo $this->Form->end(__('Submit', true));?>
</div>

<!-- @TODO element化すること -->
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


