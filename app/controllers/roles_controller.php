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
 * Role
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
class RolesController extends AppController {

    var $name = 'Roles';

    /**
     * beforeFilter
     *
     * @return None
     */
    function beforeFilter() {
        parent::beforeFilter();

        $this->crumbList = array(
            array(
                'ホーム',
                array('controller' => 'users', 'action' => 'index'),
                array()
            ),
            array(
                '管理',
                array('controller' => 'users', 'action' => 'admin_index'),
                array()
            )
        );
    }


    /**
     * 管理者用一覧画面
     *
     * @return None
     */
    function admin_index() {
        $this->Role->recursive = 0;
        $this->set('roles', $this->paginate());
    }

    /**
     * 管理者用閲覧画面
     *
     * @param int $id
     *
     * @return None
     */
    function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid role', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('role', $this->Role->read(null, $id));
    }

    /**
     * 管理者用権限追加
     *
     * @return None
     */
    function admin_add() {
        if (!empty($this->data)) {
            $this->Role->create();
            if ($this->Role->save($this->data)) {
                $this->Session->setFlash(__('The role has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The role could not be saved. Please, try again.', true));
            }
        }
    }

    /**
     * 管理者用権限編集
     *
     * @param int $id
     *
     * @return None
     */
    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid role', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Role->save($this->data)) {
                $this->Session->setFlash(__('The role has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The role could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Role->read(null, $id);
        }
    }

    /**
     * 管理者用権限削除
     *
     * @param int $id
     *
     * @return None
     */
    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for role', true));
            return $this->redirect(array('action' => 'index'));
        }
        $rec = $this->Role->read(null, $id);
        if (array_key_exists("User", $rec) && count($rec["User"]) > 0) {
            $this->Session->setFlash(__('Role was not deleted because this role has some users.', true));
            return $this->redirect(array('action' => 'index'));
        }

        if ($this->Role->delete($id)) {
            $this->Session->setFlash(__('Role deleted', true));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Role was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>
