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
 * EditStatusesController
 *
 * 編集状況を管理するコントローラー
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class EditStatusesController extends AppController
{

    var $name = 'EditStatuses';

    /**
     * 編集開始の通知を受けてデータを作成する
     *
     * @param string $modelname 編集するモデル名
     * @param int    $data_id   編集するデータID
     *
     * @return None
     */
    function start($modelname, $data_id)
    {
        $this->layout = "ajax";
        Configure::write("debug", 0);

        $user_id = $this->Auth->user('id');
        $this->EditStatus->deleteStatus($modelname, $data_id, $user_id);

        $this->data["EditStatus"]["model_name"] = $modelname;
        $this->data["EditStatus"]["data_id"] = $data_id;
        $this->data["EditStatus"]["user_id"] = $user_id;
        $this->EditStatus->create();
        if ($this->EditStatus->save($this->data)) {
            $status = true;
        } else {
            $status = false;
        }
        $this->set('status', json_encode($status));
    }

    /**
     * 編集終了の通知を受ける
     *
     * @param string $modelname 編集していたモデル名
     * @param int    $data_id   編集していたデータID
     *
     * @return None
     */
    function finish($modelname, $data_id)
    {
        $this->layout = "ajax";
        Configure::write("debug", 0);

        $user_id = $this->Auth->user('id');
        $this->EditStatus->deleteStatus($modelname, $data_id, $user_id);

        $status = true;
        $this->set('status', json_encode($status));
    }

    /**
     * 自分のロックを全部クリアする
     */
    function release() {
        $this->layout = "ajax";
        Configure::write("debug", 0);

        $user_id = $this->Auth->user('id');
        $rec = $this->EditStatus->findAllByUserId($user_id);
        $this->log($rec, LOG_INFO);
        if($rec && is_array($rec)) {
            foreach ($rec as $item) {
                $id = $item["EditStatus"]["id"];
                $this->EditStatus->delete($id);
            }
        }
        $status = true;
        $this->set('status', json_encode($status));
    }

}

?>
