<div id="snavi">
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Donation.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Donation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Donations', true), array('action' => 'index'));?></li>
	</ul>
</div>


<?php echo $this->element("crumbs"); ?>


<div class="donations form">
<h2><?php __('Edit Donation'); ?>&nbsp;&nbsp;ID:&nbsp;<?php echo $this->Form->value('Donation.id'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('Donation');?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->element("donations/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<?php echo $javascript->link('donation'); ?>

<script type="text/javascript">
    // ページロード時に編集情報を追加
    $(function() {
        jQuery.getJSON("<?php echo $html->url('/edit_statuses/start/Donation/' . $this->Form->value('Donation.id')); ?>");
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
            "<?php echo $html->url('/edit_statuses/finish/Donation/' . $this->Form->value('Donation.id')); ?>"
        );
        if(execBeforeUnload) {
            return "編集中ですが他のページに移動してよろしいですか？";
        }
    });

</script>
