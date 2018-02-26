<?php  
class FileValidationComponent extends Object{  
  
    protected $_controller;
    
    function startup($controller){  
        $this->_controller = $controller;
    }  
    
    public function debug(){
        
        $dump = print_r( $this->_controller ,1 );
        
        $this->_controller->set('DEBUG',1234);
        
        $this->log('test',LOG_INFO);
        return $dump;
    }
}  
?>  
