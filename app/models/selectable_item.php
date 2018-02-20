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
 * SelectableItem
 *
 * 入力補完用プルダウン関連
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class SelectableItem extends AppModel
{

    var $name = 'SelectableItem';
    var $displayField = 'name';
    var $validate = array(
        'id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'category' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'list_name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
            'isUnique' => array(
                'rule' => array('isUniqueWith', array('category', 'list_name', 'name')),
            )
        ),
        'sort_order' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );

    /**
     * 値用のプルダウンを作成する(optionもvalueも実値)
     *
     * @param string $modelname 呼出画面名(抽出条件)
     * @param string $listname  対象とする項目(抽出条件)
     *
     * @return array
     */
    function makeRealValueList($modelname, $listname)
    {
        $conditions = array(
            "SelectableItem.category" => $modelname,
            "SelectableItem.list_name" => $listname
        );
        $this->conditions = $conditions;
        $this->order = "SelectableItem.sort_order asc";
        $rec = $this->find('all', array('conditions' => $conditions, 'fields' => $this->displayField));
        $result = array();
        $result[''] = '';
        foreach ($rec as $item) {
            $val = $item[$this->name][$this->displayField];
            $result[$val] = $val;
        }
        return $result;
    }

}

?>
