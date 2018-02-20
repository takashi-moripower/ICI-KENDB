<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Organizations', true), array('action' => 'index'));?></li>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>
<?php echo $javascript->link('organization'); ?>

<div class="organizations form">
<h2><?php __('Edit Organization'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('Organization');?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->element("organizations/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<script type="text/javascript">
    // ページロード時に編集情報を追加
    $(function() {
        jQuery.getJSON("<?php echo $html->url('/edit_statuses/start/Organization/' . $this->Form->value('Organization.id')); ?>");
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
            "<?php echo $html->url('/edit_statuses/finish/Organization/' . $this->Form->value('Organization.id')); ?>"
        );
        if(execBeforeUnload) {
            return "編集中ですが他のページに移動してよろしいですか？";
        }
    });

</script>
