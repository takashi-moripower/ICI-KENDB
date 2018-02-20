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
 * History
 *
 * manage update history
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class History extends AppModel
{

    var $name = 'History';

    /**
     * save History
     *
     * @param string $model_name ModelName
     * @param int    $model_id   ModelId
     * @param mixed  $data       Data
     *
     * @return boolean
     */
    function saveToHistory($model_name, $model_id, $data)
    {
        $rec = $this->findByModelNameAndModelId($model_name, $model_id);
        if ($rec) {
            $id = $rec["History"]["id"];
            $this->delete($id);
        }
        $serialized_data = serialize($data);
        $save_data["History"]["model_name"] = $model_name;
        $save_data["History"]["model_id"] = $model_id;
        $save_data["History"]["archive_data"] = $serialized_data;
        $this->create($save_data);
        $result = $this->save();
        return $result;
    }

    /**
     * load from History
     *
     * @param string $model_name ModelName
     * @param int    $model_id   ModelId
     *
     * @return mixed
     */
    function loadFromHistory($model_name, $model_id)
    {
        $rec = $this->findByModelNameAndModelId($model_name, $model_id);
        if ($rec && isset($rec["History"]["archive_data"])) {
            return unserialize($rec["History"]["archive_data"]);
        } else {
            return false;
        }
    }

    /**
     * 過去の編集履歴が存在しているかどうかを確認する
     *
     * @param string $model_name モデル名
     * @param int    $model_id   データID
     *
     * @return boolean
     */
    function historyExists($model_name, $model_id)
    {
        $rec = $this->findByModelNameAndModelId($model_name, $model_id);
        return $rec && isset($rec["History"]["archive_data"]);
    }

}

?>
