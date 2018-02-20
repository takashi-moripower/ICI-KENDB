<?php 
echo $html->css('/acl/css/acl.css');
?>
<div id="breadcrumbs"><a href="/"><?php echo __('Home', true); ?></a> &raquo; <a href="<?php echo $html->url("/admin/users/index"); ?>"><?php echo __('Manage', true); ?></a> &raquo; <a href="<?php echo $html->url("/admin/acl/aros"); ?>"><?php echo __d('acl', 'ACL plugin', true); ?></a></div>
<div class="acl index" id="plugin_acl">
	
	<?php 
	echo $this->Session->flash('plugin_acl');
	?>
	
	<h2><?php echo __d('acl', 'ACL plugin', true); ?></h2>
	
	<?php

	if(!isset($no_acl_links))
	{
	    $selected = isset($selected) ? $selected : $this->params['controller'];
    
        $links = array();
        $links[] = $html->link(__d('acl', 'Permissions', true), '/admin/acl/aros/index', array('class' => ($selected == 'aros' )? 'selected' : null));
        $links[] = $html->link(__d('acl', 'Actions', true), '/admin/acl/acos/index', array('class' => ($selected == 'acos' )? 'selected' : null));
        
        echo $html->nestedList($links, array('class' => 'acl_links'));
	}
	?>