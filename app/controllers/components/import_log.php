<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::import('Utility', 'Set');
App::import('Utility', 'Inflector');

class ImportLog extends Object {

    const dir = '/var/www/html/app/webroot/log/';

    protected $_fileName = null;

    function startup($controller) {
        $this->_controller = $controller;
    }

    function getFilePath() {
        return self::dir;
    }

    function getFileName() {
        if (empty($this->_fileName)) {

            $now = new \DateTime;
            $login_user_id = $this->_controller->Auth->User('id');

            $this->_fileName = $this->getFilePath() . Inflector::underscore($this->_controller->name) . '_' . $now->format('YmdHis') . '_' . sprintf('%06d', $login_user_id) . '.log';
        }
        return $this->_fileName;
    }

    function log($msg) {
        if (preg_match('/\n$/', $msg)) {
            
        } else {
            $msg .= "\n";
        }

        file_put_contents($this->getFileName(), $msg, FILE_APPEND);
    }

    public function __invoke($msg) {
        return $this->log($msg);
    }

}
