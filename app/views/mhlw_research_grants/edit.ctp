<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Mhlw Research Grants', true), array('action' => 'index'));?></li>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MhlwResearchGrant.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MhlwResearchGrant.id'))); ?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="mhlwResearchGrants form">
<h2><?php __('Edit Mhlw Research Grant'); ?>&nbsp;&nbsp;ID:&nbsp;<?php echo $this->Form->value('MhlwResearchGrant.id'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('MhlwResearchGrant');?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->element("mhlw_research_grants/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<script type="text/javascript">
    // ページロード時に編集情報を追加
    $(function() {
        jQuery.getJSON("<?php echo $html->url('/edit_statuses/start/MhlwResearchGrant/' . $this->Form->value('MhlwResearchGrant.id')); ?>");
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
            "<?php echo $html->url('/edit_statuses/finish/MhlwResearchGrant/' . $this->Form->value('MhlwResearchGrant.id')); ?>"
        );
        if(execBeforeUnload) {
            return "編集中ですが他のページに移動してよろしいですか？";
        }
    });

</script>

