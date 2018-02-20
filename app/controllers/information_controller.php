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
 * InformationController
 *
 * お知らせ用コントローラ
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class InformationController extends AppController
{

    var $name = 'Information';
    var $components = array('Session');

    /**
     * beforeFilter
     *
     * @return None
     */
    function beforeFilter()
    {
        parent::beforeFilter();
        $this->set("title_for_layout", "お知らせ");
        $this->crumbList = array(
            array(
                'ホーム',
                array('controller' => 'users', 'action' => 'index'),
                array()
            ),
            array(
                '管理',
                array('controller' => 'admin/users', 'action' => 'index'),
                array()
            ),
            array(
                'お知らせ',
                array('controller' => 'information', 'action' => 'index'),
                array()
            )
        );
    }

    /**
     * 一覧表示する
     *
     * @return None
     */
    function index()
    {
        $this->Information->recursive = 0;
        $this->set('information', $this->paginate());
    }

    /**
     * お知らせを見る
     *
     * @param int $id
     *
     * @return None
     */
    function view($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(sprintf(__('Invalid %s', true), __('Information', true)));
            return $this->redirect(array('action' => 'index'));
        }

        // 表示データ取得
        $rec = $this->Information->read(null, $id);

        if (!$rec) {
            $this->Session->setFlash(sprintf(__('Invalid %s', true), __('Information', true)));
            return $this->redirect(array('action' => 'index'));
        }

        $this->set('information', $rec);
    }

    /**
     * お知らせを追加する
     *
     * @return None
     */
    function add()
    {
        if (!empty($this->data)) {
            $this->Information->create();
            if ($this->Information->save($this->data)) {
                $this->Session->setFlash(sprintf(__('The %s has been saved', true), __('Information', true)));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), __('Information', true)));
            }
        }
    }

    /**
     * お知らせを編集する
     *
     * @param int $id
     *
     * @return None
     */
    function edit($id = null)
    {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(sprintf(__('Invalid %s', true), __('Information', true)));
            return $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Information->save($this->data)) {
                $this->Session->setFlash(sprintf(__('The %s has been saved', true), __('Information', true)));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), __('Information', true)));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Information->read(null, $id);
        }
    }

    /**
     * お知らせを削除する
     *
     * @param int $id
     *
     * @return None
     */
    function delete($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(sprintf(__('Invalid id for %s', true), __('Information', true)));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Information->delete($id);
        $this->Session->setFlash(sprintf(__('%s deleted', true), __('Information', true)));
        $this->redirect(array('action' => 'index'));
    }

}

?>
