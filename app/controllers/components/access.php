<?php  
class AccessComponent extends Object{  
    var $components = array('Acl', 'Auth');  
    var $user;   
  
    function startup(){  
        $this->user = $this->Auth->user();  
    }  

    function check($aco, $action='*'){  
        if(!empty($this->user) && $this->Acl->check($this->user, $aco, $action)){  
            return true;  
        } else {  
            return false;  
        }  
    }  

    function checkHelper($aro, $aco, $action = "*"){  
        App::import('Component', 'Acl');  
        $acl = new AclComponent();  
        return $acl->check($aro, $aco, $action);  
    }   
}  
?>  
