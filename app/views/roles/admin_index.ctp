<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('New Role', true), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>


<div class="roles index">
    <h2><?php __('Roles'); ?></h2>
    <div id="faceContainer">
    <table id="flexme">
        <thead>
            <tr>
                <th width="100" class="actions"><?php __('Actions'); ?></th>
                <th width="30"><?php echo $this->Paginator->sort('id'); ?></th>
                <th width="120"><?php echo $this->Paginator->sort('name'); ?></th>
                <th width="140"><?php echo $this->Paginator->sort('created'); ?></th>
                <th width="140"><?php echo $this->Paginator->sort('updated'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($roles as $role):
                $class = null;
                if ($i++ % 2 == 0) {
                    $class = ' class="altrow"';
                }
            ?>
                <tr<?php echo $class; ?>>
                    <td class="actions">
                    <?php echo $this->Html->link(__('View', true), array('action' => 'view', $role['Role']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $role['Role']['id'])); ?>
                    <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $role['Role']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $role['Role']['id'])); ?>
                </td>
                    <td><?php echo $role['Role']['id']; ?>&nbsp;</td>
                    <td><?php echo $role['Role']['name']; ?>&nbsp;</td>
                    <td><?php echo $role['Role']['created']; ?>&nbsp;</td>
                    <td><?php echo $role['Role']['updated']; ?>&nbsp;</td>
            </tr>
            <?php endforeach; ?>
                </tbody>        
            </table>
    </div>
            <p>
        <?php
                    echo $this->Paginator->counter(array(
                        'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
                    ));
        ?>	</p>

                <div class="paging">
        <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class' => 'disabled')); ?>
            	 | 	<?php echo $this->Paginator->numbers(); ?>
                    |
        <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled')); ?>
    </div>
</div>

<script type="text/javascript">
    $('#flexme').flexigrid({height:'auto',striped:true});
    $('#flexme').show();
</script>



