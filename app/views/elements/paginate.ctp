    <div class="pageNavList">
        <p class="fleft pt10">
        <?php
            echo $this->Paginator->counter(array(
            'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
            ));
        ?>
            &nbsp;
        </p>
        <p class="fleft pt10" style="padding-right:15px;">
            <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
        </p>
        <div class="paging">
            <ul class="pageNav"><?php echo $this->Paginator->numbers(array('tag' => 'li', 'separator' => false));?></ul>
        </div>
        <p class="fleft pt10">
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
        </p>
    </div>
<br clear="all" />
