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
 * SelectableItemsController
 *
 * プルダウン用の項目の管理
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class SelectableItemsController extends AppController
{

    /**
     * コントローラー名
     *
     * @var string
     */
    var $name = 'SelectableItems';

    /**
     * 呼び出し可能なモデルと項目を設定する
     *
     * @var array
     */
    var $available_command = array(
        array("modelname" => "Entrust", "listname" => "area_of_research"),
        array("modelname" => "Entrust", "listname" => "category_of_business"),
        array("modelname" => "NedoJstOther", "listname" => "area_of_research"),
        array("modelname" => "NedoJstOther", "listname" => "asset_belongingness"),
        array("modelname" => "NedoJstOther", "listname" => "ordering_organization_type"),
        array("modelname" => "NedoJstOther", "listname" => "functions_manual"),
        array("modelname" => "Donation", "listname" => "foreign_money_type"),
        array("modelname" => "Donation", "listname" => "common_cost_check"),
        array("modelname" => "Donation", "listname" => "section_in_charge"),
    );

    /**
     * リスト項目をJSON出力する
     *
     * @param string $modelname 呼出画面名
     * @param string $listname  抽出項目
     *
     * @return None
     */
    function json($modelname = null, $listname = null)
    {
        $this->layout = "ajax";
        Configure::write("debug", 0);
        if (!$this->_validParams($modelname, $listname)) {
            $rec = array();
        } else {
            $rec = $this->SelectableItem->makeRealValueList($modelname, $listname);
        }
        $data = array();
        foreach ($rec as $key => $val) {
            $data["candidate"][] = $val;
        }
        $this->set('json', json_encode($data));
    }

    /**
     * URL引数が正しいものかどうか検証する
     *
     * @param string $modelname どの画面で使うか
     * @param string $listname  項目の名称
     *
     * @return boolean
     */
    function _validParams($modelname, $listname)
    {
        $valid = false;
        foreach ($this->available_command as $item) {
            if ($item["modelname"] == $modelname && $item["listname"] == $listname) {
                $valid = true;
                break;
            }
        }
        return $valid;
    }

    /**
     * 項目の一覧を表示する
     *
     * @param string $modelname どの画面で使うか
     * @param string $listname  項目の名称
     *
     * @return None
     */
    function index($modelname = null, $listname = null)
    {
        if (!$this->_validParams($modelname, $listname)) {
            $this->cakeError('error404');
            return;
        }

        $this->SelectableItem->recursive = 0;
        $this->paginate["conditions"] = array(
            "SelectableItem.category" => $modelname,
            "SelectableItem.list_name" => $listname,
        );
        $this->paginate["order"] = "SelectableItem.sort_order asc";
        $this->set('selectableItems', $this->paginate());
        $this->set('modelname', $modelname);
        $this->set('listname', $listname);
    }

    /**
     * 項目の追加
     *
     * @param string $modelname どの画面で使うか
     * @param string $listname  項目の名称
     *
     * @return None
     */
    function add($modelname = null, $listname = null)
    {
        if (!empty($this->data)) {
            if ($modelname == null) {
                $modelname = $this->data["SelectableItem"]["category"];
            }
            if ($listname == null) {
                $listname = $this->data["SelectableItem"]["list_name"];
            }
        }

        if (!$this->_validParams($modelname, $listname)) {
            $this->cakeError("error404");
            return;
        }

        if (!empty($this->data)) {
            $this->SelectableItem->create();
            if ($this->SelectableItem->save($this->data)) {
                $this->Session->setFlash(__('The selectable item has been saved', true));
                $this->redirect(array('action' => 'index', $modelname, $listname));
            } else {
                $this->Session->setFlash(__('The selectable item could not be saved. Please, try again.', true));
            }
        }
        $this->set('modelname', $modelname);
        $this->set('listname', $listname);
    }

    /**
     * 項目を編集する
     *
     * @param int $id 編集する項目のID
     *
     * @return None
     */
    function edit($id = null)
    {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid selectable item', true));
            $this->cakeError("error404");
            return;
        }
        if (!empty($this->data)) {
            if ($this->SelectableItem->save($this->data)) {
                $this->Session->setFlash(__('The selectable item has been saved', true));
                $this->redirect(array('action' => 'index', $this->data["SelectableItem"]["category"], $this->data["SelectableItem"]["list_name"]));
            } else {
                $this->Session->setFlash(__('The selectable item could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->SelectableItem->read(null, $id);
        }
    }

    /**
     * 項目を削除する
     *
     * @param int $id 削除対象の項目のID
     *
     * @return None
     */
    function delete($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for selectable item', true));
            $this->cakeError("error404");
            return;
        }
        $rec = $this->SelectableItem->findById($id);
        if (!$rec) {
            $this->cakeError("error404");
            return;
        }

        if ($this->SelectableItem->delete($id)) {
            $this->Session->setFlash(__('Selectable item deleted', true));
            $this->redirect(array('action' => 'index', $rec["SelectableItem"]["category"], $rec["SelectableItem"]["list_name"]));
        }
        $this->Session->setFlash(__('Selectable item was not deleted', true));
        $this->redirect(array('action' => 'index', $rec["SelectableItem"]["category"], $rec["SelectableItem"]["list_name"]));
    }

}

?>
