<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Assessed Contributions', true), array('action' => 'index'));?></li>
        <?php if($can_delete): ?>
        <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('AssessedContribution.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('AssessedContribution.id'))); ?></li>
        <?php endif; ?>
        <?php if($can_copy): ?>
        <li><?php echo $this->Html->link(__('Copy Assessed Contribution', true), array('action' => 'copy', $this->Form->value('AssessedContribution.id'))); ?></li>
        <?php endif; ?>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>
<?php echo $javascript->link('assessed_contribution'); ?>

<div class="assessedContributions form">
<h2><?php __('Edit Assessed Contribution'); ?>&nbsp;&nbsp;ID:&nbsp;<?php echo $this->Form->value('AssessedContribution.id'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('AssessedContribution');?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->element("assessed_contributions/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<script type="text/javascript">
    // ページロード時に編集情報を追加
    $(function() {
        jQuery.getJSON("<?php echo $html->url('/edit_statuses/start/AssessedContribution/' . $this->Form->value('AssessedContribution.id')); ?>");
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
            "<?php echo $html->url('/edit_statuses/finish/AssessedContribution/' . $this->Form->value('AssessedContribution.id')); ?>"
        );
        if(execBeforeUnload) {
            return "編集中ですが他のページに移動してよろしいですか？";
        }
    });

</script>

