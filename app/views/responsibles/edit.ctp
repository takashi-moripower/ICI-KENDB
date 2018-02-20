<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('List Responsibles', true), array('action' => 'index'));?></li>
    </ul>
</div>

<?php echo $this->element("crumbs"); ?>
<?php echo $javascript->link('responsible'); ?>

<div class="responsibles form">
<h2><?php __('Edit Responsible'); ?></h2>

<?php echo $this->element('validate_errors'); ?>

<?php echo $this->KendbForm->create('Responsible');?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->element("responsibles/form"); ?>
<?php echo $this->Form->end(__('Submit', true));?>
</div>

<script type="text/javascript">
    // ページロード時に編集情報を追加
    $(function() {
        jQuery.getJSON("<?php echo $html->url('/edit_statuses/start/Responsible/' . $this->Form->value('Responsible.id')); ?>");
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
            "<?php echo $html->url('/edit_statuses/finish/Responsible/' . $this->Form->value('Responsible.id')); ?>"
        );
        if(execBeforeUnload) {
            return "編集中ですが他のページに移動してよろしいですか？";
        }
    });

</script>

