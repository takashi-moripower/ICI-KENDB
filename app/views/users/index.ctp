<div id="snavi">
</div>

<?php echo $this->element("crumbs"); ?>

<div class="information index">
    <h2><?php __('Information');?></h2>
    <table cellpadding="0" cellspacing="0">
    <?php
    $i = 0;
    foreach ($information as $info):
            $class = null;
            if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
            }
    ?>
    <tr<?php echo $class;?>>
        <td style="width:120px;" valign="top"><?php echo date('Y年m月d日', strtotime($info['Information']['startdate'])); ?>&nbsp;</td>
        <td><strong><?php echo h($info['Information']['name']); ?></strong><br />
        <?php echo nl2br(h($info['Information']['description'])); ?>
        </td>
    </tr>
<?php endforeach; ?>

    <?php if (count($information) == 0) { ?>
    <tr><td><?php echo __("There is no information.", true); ?></td></tr>
    <?php } ?>
    </table>

    <h2><?php __('Search'); ?></h2>
    <?php echo $this->element("cross_search"); ?>

</div>

