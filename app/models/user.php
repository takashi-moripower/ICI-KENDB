<?php

/**
 * KenDB
 *
 * PHP versions 5
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   private http://www.titech.ac.jp/
 * @link      none
 */

/**
 * User
 *
 * Long description for class (if any)...
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class User extends AppModel {

    var $name = 'User';
    var $displayField = 'displayname';
    var $validate = array(
        'id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'username' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
            ),
            'between' => array(
                'rule' => array('between', 4, 20),
            ),
            'userNameRule' => array(
                'rule' => array('userNameRule'),
            ),
        ),
        'displayname' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            ),
        ),
        'tel' => array(
            'numericHyphen' => array(
                'rule' => array('numericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'disabled' => array(
            'boolean' => array(
                'rule' => array('boolean'),
                'allowEmpty' => true,
            ),
        ),
    );

    /**
     * アソシエーション設定
     *
     * @var belongsTo
     */
    var $belongsTo = array(
        'Role' => array(
            'className' => 'Role',
            'foreignKey' => 'role_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * Acl設定
     *
     * @var actAs
     */
    var $actsAs = array('Acl' => array('requester'));


    /*
     * Static methods that can be used to retrieve the logged in user
     * from anywhere
     *
     * Copyright (c) 2008 Matt Curry
     * www.PseudoCoder.com
     * http://github.com/mcurry/cakephp/tree/master/snippets/static_user
     * http://www.pseudocoder.com/archives/2008/10/06/accessing-user-sessions-from-models-or-anywhere-in-cakephp-revealed/
     *
     * @author      Matt Curry <matt@pseudocoder.com>
     * @license     MIT
     *
     */

    /**
     * ユーザーモデルのインスタンスを取得する
     *
     * @param UserModel $user ユーザーモデルのインスタンス
     *
     * @staticvar array $instance
     * 
     * @return UserModel ユーザーモデルのインスタンス
     */
    function &getInstance($user=null) {
        static $instance = array();

        if ($user) {
            $instance[0] = & $user;
        }

        if (!$instance) {
            trigger_error(__("User not set.", true), E_USER_WARNING);
            return false;
        }

        return $instance[0];
    }

    /**
     * ユーザーモデルを保存する
     *
     * @param UserModel $user ユーザーモデル
     *
     * @return None
     */
    function store($user) {
        if (empty($user)) {
            return false;
        }

        User::getInstance($user);
    }

    /**
     * ユーザーモデルの項目を取得する
     *
     * @param string $path 項目名
     *
     * @return string 指定した項目の値
     */
    function get($path) {
        $_user = & User::getInstance();

        $path = str_replace('.', '/', $path);
        if (strpos($path, 'User') !== 0) {
            $path = sprintf('User/%s', $path);
        }

        if (strpos($path, '/') !== 0) {
            $path = sprintf('/%s', $path);
        }

        $value = Set::extract($path, $_user);

        if (!$value) {
            return false;
        }

        return $value[0];
    }

    /**
     * parentNode
     *
     * @return array
     */
    function parentNode() {
        if (!$this->id) {
            return null;
        }
        $data = $this->read();
        if (!$data['User']['role_id']) {
            return null;
        } else {
            return array('model' => 'Role', 'foreign_key' => $data['User']['role_id']);
        }
    }

}

?>
