<?php
/**
 * 
 **/
App::import("Component", "Auth");
App::import("Component", "Acl");

class BulkuserShell extends Shell 
{
    var $uses = array('User');
    var $components = array("Auth", "Acl");

    function initialize() {
        parent::initialize();
        $this->Auth = &new AuthComponent();
        $this->Acl = &new AclComponent();
        $this->User = &new User();
        //$this->User->startup($this->Acl);
        $this->User->Aro = new Aro();
    }
    
    function main() {
        echo "Please input account filename\n";
        fscanf( STDIN, "%s", $filename); 
        var_dump( $filename); 
        if(!file_exists($filename)) {
            echo "File does not exist\n";
            return;
        }

        $this->User->begin();

        $fp = fopen($filename, "r");
        $lineno = 0;
        while ($str = fgets($fp)) {
            $lineno++;
            if($lineno == 1) continue;
            //print_r($data)."\n";
            if($str == "") { continue; }
            list($department, $displayname, $dmy, $email, $tel, $role_id, $username) = explode("\t", $str);
            $department  = $this->item_format($department);
            $displayname = $this->item_format($displayname);
            $email       = $this->item_format($email);
            $tel         = $this->item_format($tel);
            $role_id     = $this->item_format($role_id);
            $username    = $this->item_format($username);
            $password    = $this->makeDummyPassword($username);
            echo $username."\t".$password."\n";

            $data["User"]["username"] = $username;
            $data["User"]["displayname"] = $displayname;
            $data["User"]["email"] = $email;
            $data["User"]["department"] = $department;
            $data["User"]["tel"] = $tel;
            $data["User"]["role_id"] = $role_id;
            $data["User"]["grid_type"] = 0;
            $data["User"]["dateformat"] = 0;
            $data["User"]["disabled"] = 0;
            $data["User"]["password"] = $this->Auth->password($password);

            $this->User->id = NULL;
            $this->User->create($data);
            if(!$this->User->save()) {
                echo "lineno=".$lineno."\n";
                print_r($this->User->validationErrors);
                $this->User->rollback();
                return;
            }
        }
        $this->User->commit();
    }

    private function makeDummyPassword($account) {
        return substr(md5($account),0,8);

    }

    private function item_format($str) {
        $str = trim($str);
        $str = str_replace("\r","", $str);
        $str = str_replace("\n","", $str);
        $str = str_replace("\t","", $str);
        return $str;
    }
}
?>
