<div id="snavi">
    <ul>
        <li><?php echo $this->Html->link(__('New User', true), array('action' => 'add')); ?></li>
    </ul>
</div>
<?php echo $this->element("crumbs"); ?>

<div class="users index">

    <h2><?php __('Aggregate'); ?></h2>
    <a href="<?php echo $html->url('/summaries/aggregate'); ?>"><?php __('Aggregate'); ?></a>
    <a href="<?php echo $html->url('/summaries/missing_researchers'); ?>">不明な研究者</a>
    <br clear="all" />
    <br clear="all" />
    
    <h2><?php __('Manage ACL'); ?></h2>
    <a href="<?php echo $html->url('/admin/acl/aros'); ?>"><?php __('Manage ACL'); ?></a>
    <br clear="all" />
    <br clear="all" />

    <h2><?php __('Manage Role'); ?></h2>
    <a href="<?php echo $html->url('/admin/roles/index'); ?>"><?php __('Manage Role'); ?></a>
    <br clear="all" />
    <br clear="all" />

    <h2><?php __('Manage Information'); ?></h2>
    <a href="<?php echo $html->url('/information/index'); ?>"><?php __('Manage Information'); ?></a>
    <br clear="all" />
    <br clear="all" />

    <h2><?php __('Backup Database'); ?></h2>
    <a href="<?php echo $html->url('/admin/users/backup_exec'); ?>"><?php __('Backup Database'); ?></a>
    <br clear="all" />
    <a href="<?php echo $html->url('/admin/users/auto_backup_list'); ?>"><?php __('Database Backup List'); ?></a>
    <br clear="all" />
    <br clear="all" />

    <h2>研究者情報更新</h2>
    <a href="<?php echo $html->url('/admin/users/update_researchers'); ?>">研究者情報更新</a>
    <br clear="all" />
    <br clear="all" />

    <h2><?php __('Responsible'); ?></h2>
    <a href="<?php echo $html->url('/responsibles/index'); ?>"><?php __('List Responsibles'); ?></a>
    <br clear="all" />
    <a href="<?php echo $html->url('/responsibles/upload'); ?>"><?php __('Upload Responsibles'); ?></a>
    <br clear="all" />
    <br clear="all" />

    <h2><?php __('Organizations'); ?></h2>
    <a href="<?php echo $html->url('/organizations/index'); ?>"><?php __('List Organizations'); ?></a>
    <br clear="all" />
    <a href="<?php echo $html->url('/organizations/upload'); ?>"><?php __('Upload Organizations'); ?></a>
    <br clear="all" />
    <br clear="all" />

    <h2><?php __('Users'); ?></h2>
    <?php echo $this->element("paginate"); ?>
    <table id="flexme">
        <thead>
            <tr>
                <th width="70" class="actions"><?php __('Actions'); ?></th>
                <th width="20"><?php echo $this->Paginator->sort('id'); ?></th>
                <th width="60"><?php echo $this->Paginator->sort('username'); ?></th>
                <th width="120"><?php echo $this->Paginator->sort('displayname'); ?></th>
                <th width="120"><?php echo $this->Paginator->sort("部署名", 'department'); ?></th>
                <th width="120"><?php echo $this->Paginator->sort('email'); ?></th>
                <th width="120"><?php echo $this->Paginator->sort("連絡先電話番号",'tel'); ?></th>
                <th width="120"><?php echo $this->Paginator->sort('role'); ?></th>
                <th width="40"><?php echo $this->Paginator->sort('grid_type'); ?></th>
                <th width="70"><?php echo $this->Paginator->sort('dateformat'); ?></th>
                <th width="40"><?php echo $this->Paginator->sort('disabled'); ?></th>
                <th width="140"><?php echo $this->Paginator->sort('created'); ?></th>
                <th width="140"><?php echo $this->Paginator->sort('updated'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($users as $user):
            ?>
            <tr>
                <td class="actions">
                <?php echo $this->Html->link(__('View', true), array('action' => 'view', $user['User']['id'])); ?>
                <?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $user['User']['id'])); ?>
                <?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $user['User']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $user['User']['id'])); ?>
                </td>
                <td><?php echo $user['User']['id']; ?>&nbsp;</td>
                <td><?php echo $user['User']['username']; ?>&nbsp;</td>
                <td><?php echo $user['User']['displayname']; ?>&nbsp;</td>
                <td><?php echo $user['User']['department']; ?>&nbsp;</td>
                <td><?php echo $user['User']['email']; ?>&nbsp;</td>
                <td><?php echo $user['User']['tel']; ?>&nbsp;</td>
                <td><?php echo $user['Role']['name']; ?>&nbsp;</td>
                <td><?php echo $user['User']['grid_type']; ?>&nbsp;</td>
                <td><?php echo $user['User']['dateformat']; ?>&nbsp;</td>
                <td><?php echo $user['User']['disabled']; ?>&nbsp;</td>
                <td><?php echo $user['User']['created']; ?>&nbsp;</td>
                <td><?php echo $user['User']['updated']; ?>&nbsp;</td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table>

    <?php echo $this->element("paginate"); ?>

</div>
<script type="text/javascript">
    $('#flexme').flexigrid({height:'auto',striped:true});
    $('#flexme').show();
</script>

