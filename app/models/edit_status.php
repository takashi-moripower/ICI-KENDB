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
 * EditStatus
 *
 * 編集状況を管理するモデル
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class EditStatus extends AppModel
{

    var $name = 'EditStatus';
    var $validate = array(
        'id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'model_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'data_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    var $belongsTo = array(
        'User' => array (
            'className' => 'User',
            'dependent' => false, 
            'foreignKey' => 'user_id',
        ),
    );

    /**
     * 編集情報を削除する
     *
     * @param string $modelname 編集中モデル名
     * @param int    $data_id   編集宙データID
     * @param int    $user_id   編集者ID
     * 
     * @return boolean
     */
    function deleteStatus($modelname, $data_id, $user_id)
    {
        $this->unbindFully();
        $rec = $this->findByModelNameAndDataIdAndUserId($modelname, $data_id, $user_id);
        if ($rec) {
            $this->delete($rec["EditStatus"]["id"]);
        }
        return true;
    }

    /**
     * すべての編集ログを削除する
     *
     * @return None
     */
    function deleteAllStatus()
    {
        $this->unbindFully();
        $conditions = array(
            "id >=" => "0"
        );
        return $this->deleteAll($conditions, false);
    }

    /**
     * 現在編集中のデータIDの一覧を取得する
     *
     * @param string $modelname 対象モデル名
     *
     * @return array 編集中データIDの配列
     */
    function getCurrentEditingIdList($modelname)
    {
        $this->recursive = -1;
        $rec = $this->findAllByModelName($modelname);
        $result = array();
        if (is_array($rec)) {
            foreach ($rec as $item) {
                $result[] = $item["EditStatus"]["data_id"];
            }
        }
        return $result;
    }

    /**
     * そのデータが現在編集中かどうかを確認する
     *
     * @param string $modelname 編集モデル
     * @param int    $dataid    編集モデルのデータID
     *
     * @return boolean
     */
    function isCurrentEditing($modelname, $dataid)
    {
        $rec = $this->findByModelNameAndDataId($modelname, $dataid);
        return $rec ? $rec : false;
    }

}

?>
