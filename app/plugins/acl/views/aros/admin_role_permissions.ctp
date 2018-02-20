<?php
echo $this->Html->script('/acl/js/jquery');
echo $this->Html->script('/acl/js/acl_plugin');

echo $this->element('design/header');
?>

<?php
echo $this->element('aros/links');
?>

<div class="separator"></div>

<div>
	
	<?php
	echo $html->link($html->image('/acl/img/design/cross.png') . ' ' . __d('acl', 'Clear permissions table', true), '/admin/acl/aros/empty_permissions', array('confirm' => __d('acl', 'Are you sure you want to delete all roles and users permissions ?', true), 'escape' => false));
	?>
	
	
</div>

<div class="separator"></div>

<table cellspacing="0">

<tr>
	<th></th>
	<th><?php echo __d('acl', 'grant access to <em>all actions</em>', true); ?></th>
	<th><?php echo __d('acl', 'deny access to <em>all actions</em>', true); ?></th>
</tr>

<?php
$i = 0;
foreach($roles as $role)
{
    $color = ($i % 2 == 0) ? 'color1' : 'color2';
    echo '<tr class="' . $color . '">';
    echo '  <td>' . $role[$role_model_name][$role_display_field] . '</td>';
    echo '  <td style="text-align:center">' . $html->link($html->image('/acl/img/design/tick.png'), '/admin/acl/aros/grant_all_controllers/' . $role[$role_model_name]['id'], array('escape' => false, 'confirm' => sprintf(__d('acl', "Are you sure you want to grant access to all actions of each controller to the role '%s' ?", true), $role[$role_model_name][$role_display_field]))) . '</td>';
    echo '  <td style="text-align:center">' . $html->link($html->image('/acl/img/design/cross.png'), '/admin/acl/aros/deny_all_controllers/' . $role[$role_model_name]['id'], array('escape' => false, 'confirm' => sprintf(__d('acl', "Are you sure you want to deny access to all actions of each controller to the role '%s' ?", true), $role[$role_model_name][$role_display_field]))) . '</td>';
    echo '<tr>';
    
    $i++;
}
?>
</table>

<div class="separator"></div>

<div>

	<table border="0" cellpadding="5" cellspacing="2">
	<tr>
    	<?php
    	
    	$column_count = 1;
    	
    	$headers = array(__d('acl', 'action', true));
    	
    	foreach($roles as $role)
    	{
    	    $headers[] = $role[$role_model_name][$role_display_field];
    	    $column_count++;
    	}
    	
    	echo $html->tableHeaders($headers);
    	?>
	</tr>
	
	<?php
	$previous_ctrl_name = '';
	$i = 0;
	
	if(isset($actions['app']) && is_array($actions['app']))
	{
		foreach($actions['app'] as $controller_name => $ctrl_infos)
		{
			if($previous_ctrl_name != $controller_name)
			{
				$previous_ctrl_name = $controller_name;
				
				$color = ($i % 2 == 0) ? 'color1' : 'color2';
			}
			
			foreach($ctrl_infos as $ctrl_info)
			{
	    		echo '<tr class="' . $color . '">
	    		';
	    		
	    		echo '<td>' . __($controller_name, true) . '->' . __($ctrl_info['name'], true) . ' (' .$controller_name . "->" .$ctrl_info['name'] . ')</td>';
	    		
		    	foreach($roles as $role)
		    	{
		    	    echo '<td>';
		    	    echo '<span id="right__' . $role[$role_model_name]['id'] . '_' . $controller_name . '_' . $ctrl_info['name'] . '">';
	    		
		    	    if(isset($ctrl_info['permissions'][$role[$role_model_name]['id']]))
		    	    {
    		    		if($ctrl_info['permissions'][$role[$role_model_name]['id']] == 1)
    		    		{
    		    			$js->buffer('register_role_toggle_right(true, "' . $html->url('/') . '", "right__' . $role[$role_model_name]['id'] . '_' . $controller_name . '_' . $ctrl_info['name'] . '", "' . $role[$role_model_name]['id'] . '", "", "' . $controller_name . '", "' . $ctrl_info['name'] . '")');
        		    
    		    			echo $html->image('/acl/img/design/tick.png', array('class' => 'pointer'));
    		    		}
    		    		else
    		    		{
    		    			$js->buffer('register_role_toggle_right(false, "' . $html->url('/') . '", "right__' . $role[$role_model_name]['id'] . '_' . $controller_name . '_' . $ctrl_info['name'] . '", "' . $role[$role_model_name]['id'] . '", "", "' . $controller_name . '", "' . $ctrl_info['name'] . '")');
    		    		    
    		    		    echo $html->image('/acl/img/design/cross.png', array('class' => 'pointer'));
    		    		}
		    	    }
		    	    else
		    	    {
		    	        /*
		    	         * The right of the action for the role is unknown
		    	         */
		    	        echo $html->image('/acl/img/design/important16.png', array('title' => __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.', true)));
		    	    }
		    		
		    		echo '</span>';
	    	
        	    	echo ' ';
        	    	echo $html->image('/acl/img/ajax/waiting12.gif', array('id' => 'right__' . $role[$role_model_name]['id'] . '_' . $controller_name . '_' . $ctrl_info['name'] . '_spinner', 'style' => 'display:none;'));
            		
        	    	echo '</td>';
		    	}
	    		
		    	echo '</tr>
		    	';
			}
	
			$i++;
		}
	}
	?>
	<?php
	if(isset($actions['plugin']) && is_array($actions['plugin']))
	{
	    foreach($actions['plugin'] as $plugin_name => $plugin_ctrler_infos)
    	{
//    	    debug($plugin_name);
//    	    debug($plugin_ctrler_infos);

    	    $color = null;
    	    
    	    echo '<tr class="title"><td colspan="' . $column_count . '">' . __d('acl', 'Plugin', true) . ' ' . $plugin_name . '</td></tr>';
    	    
    	    $i = 0;
    	    foreach($plugin_ctrler_infos as $plugin_ctrler_name => $plugin_methods)
    	    {
    	        //debug($plugin_ctrler_name);
    	        //echo '<tr style="background-color:#888888;color:#ffffff;"><td colspan="' . $column_count . '">' . $plugin_ctrler_name . '</td></tr>';
    	        
        	    if($previous_ctrl_name != $plugin_ctrler_name)
        		{
        			$previous_ctrl_name = $plugin_ctrler_name;
        			
        			$color = ($i % 2 == 0) ? 'color1' : 'color2';
        		}
    		
        		
    	        foreach($plugin_methods as $method)
    	        {
    	            echo '<tr class="' . $color . '">
    	            ';
    	            
    	            echo '<td>' . $plugin_ctrler_name . '->' . $method['name'] . '</td>';
    	            //debug($method['name']);
    	            
        	        foreach($roles as $role)
    		    	{
    		    	    echo '<td>';
    		    	    echo '<span id="right_' . $plugin_name . '_' . $role[$role_model_name]['id'] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '">';
    		    	    
    		    	    if(isset($ctrl_info['permissions'][$role[$role_model_name]['id']]))
    		    	    {
        		    		if($method['permissions'][$role[$role_model_name]['id']] == 1)
        		    		{
        		    			//echo '<td>' . $html->link($html->image('/acl/img/design/tick.png'), '/admin/acl/aros/deny_role_permission/' . $role[$role_model_name]['id'] . '/plugin:' . $plugin_name . '/controller:' . $plugin_ctrler_name . '/action:' . $method['name'], array('escape' => false)) . '</td>';
        		    			
        		    		    $js->buffer('register_role_toggle_right(true, "' . $html->url('/') . '", "right_' . $plugin_name . '_' . $role[$role_model_name]['id'] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '", "' . $role[$role_model_name]['id'] . '", "' . $plugin_name . '", "' . $plugin_ctrler_name . '", "' . $method['name'] . '")');
    		    		    
        		    		    echo $html->image('/acl/img/design/tick.png', array('class' => 'pointer'));
        		    		}
        		    		else
        		    		{
        		    			//echo '<td>' . $html->link($html->image('/acl/img/design/cross.png'), '/admin/acl/aros/grant_role_permission/' . $role[$role_model_name]['id'] . '/plugin:' . $plugin_name .'/controller:' . $plugin_ctrler_name . '/action:' . $method['name'], array('escape' => false)) . '</td>';
        		    			
        		    		    $js->buffer('register_role_toggle_right(false, "' . $html->url('/') . '", "right_' . $plugin_name . '_' . $role[$role_model_name]['id'] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '", "' . $role[$role_model_name]['id'] . '", "' . $plugin_name . '", "' . $plugin_ctrler_name . '", "' . $method['name'] . '")');
    		    			
        		    		    echo $html->image('/acl/img/design/cross.png', array('class' => 'pointer'));
        		    		}
    		    	    }
    		    	    else
    		    	    {
    		    	        /*
    		    	         * The right of the action for the role is unknown
    		    	         */
    		    	        echo $html->image('/acl/img/design/important16.png', array('title' => __d('acl', 'The ACO node is probably missing. Please try to rebuild the ACOs first.', true)));
    		    	    }
    		    		
    		    		echo '</span>';
	    	
            	    	echo ' ';
            	    	echo $html->image('/acl/img/ajax/waiting12.gif', array('id' => 'right_' . $plugin_name . '_' . $role[$role_model_name]['id'] . '_' . $plugin_ctrler_name . '_' . $method['name'] . '_spinner', 'style' => 'display:none;'));
                		
            	    	echo '</td>';
    		    	}
    		    	
    	            echo '</tr>
    	            ';
    	        }
    	        
    	        $i++;
    	    }
    	}
	}
    ?>
	</table>
	<?php
    echo $html->image('/acl/img/design/tick.png') . ' ' . __d('acl', 'authorized', true);
    echo '&nbsp;&nbsp;&nbsp;';
    echo $html->image('/acl/img/design/cross.png') . ' ' . __d('acl', 'blocked', true);
    ?>

</div>


<?php
echo $this->element('design/footer');
?>