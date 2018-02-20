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
 * UsersController
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
class UsersController extends AppController
{

    var $name = 'Users';
    var $components = array('Search.Prg');
    var $uses = array('User', 'Role', 'Information', 'Summary',
        'NedoJstOther', 'Entrust', 'Contract', 'Grant', 'Donation', 'Encourage',
        'AssessedContribution', 'Adoption', 'OtherResearchGrant', 'MhlwResearchGrant');

    /**
     * beforeFilter
     *
     * @return None
     */
    function beforeFilter()
    {
        parent::beforeFilter();
        // 認証外で許可するアクション
        $this->Auth->allow("login", "logout");

        if (preg_match("/admin_/", $this->action)) {
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
        } else {
            $this->crumbList = array(
                array(
                    'ホーム',
                    array('controller' => 'users', 'action' => 'index'),
                    array()
                ),
            );
        }
    }

    /**
     * login
     *
     * @return None
     */
    function login()
    {
	$this->dbg('xxxx', $this->Auth->user());
//        if ($this->Auth->user()) {
//            if (!empty($this->data)) {
//                //ログインに成功した時の処理
//                $this->log("ログイン処理-成功", LOG_DEBUG);
//                $this->redirect(array('action' => 'index'));
//            } else {
//                $this->redirect(array('action' => 'index'));
//            }
//        } else {
//            if (!empty($this->data)) {
//                $this->log("ログイン処理-失敗", LOG_DEBUG);
//                $this->Session->setFlash($this->Auth->loginError);
//            }
//        }
    }

    /**
     * logout
     *
     * @return None
     */
    function logout()
    {
        $this->Acl->flushCache();
        $this->Auth->logout();
        $this->Session->setFlash(__('You have finished to logout.', true));
        $this->redirect(array('action' => 'login'));
    }

    /**
     * index
     *
     * @return None
     */
    function index()
    {
        $info = $this->Information->getLatestInformation();
        $this->set('information', $info);
    }

    /**
     * 自分の設定情報を編集
     *
     * @return None
     */
    function edit()
    {
        $id = $this->Auth->User('id');
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $u = $this->User->findById($id);

            if (isset($this->data['User']['new_password']) && trim($this->data['User']['new_password']) != "") {
                $this->data['User']['password']
                    = AuthComponent::password($this->data['User']['new_password']);
            } else {
                $this->data['User']['password'] = $u['User']['password'];
            }

            $this->User->validate['new_password'] = array(
                'passwordRule' => array(
                    'rule' => array('passwordRule'),
                    'allowEmpty' => true,
                ),
                'between' => array(
                    'rule' => array('between', 4, 10),
                ),
            );
            $this->User->set($this->data);

            if ($this->User->validates() && $this->User->save($this->data, true, array('password', 'displayname', 'department', 'grid_type', 'dateformat', 'email', 'tel'))) {
                $this->Session->setFlash(__('The user has been saved', true));
                $user = $this->User->findById($id);
                User::store($user);
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.', true)
                );
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
    }

    /**
     * admin_index
     *
     * @return None
     */
    function admin_index()
    {
        $this->User->recursive = 1;
        $this->set('users', $this->paginate());
    }

    /**
     * admin_view
     * 
     * @param integer $id 閲覧するユーザーのID
     *
     * @return None
     */
    function admin_view($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    /**
     * admin_add
     *
     * @return None
     */
    function admin_add()
    {
        $roles = $this->Role->find('list');
        $this->set(compact('roles'));

        $this->User->validate['new_password'] = array(
            'alphaNumericHyphen' => array(
                'rule' => array('passwordRule'),
                'allowEmpty' => false,
            ),
            'between' => array(
                'rule' => array('between', 4, 10),
            ),
        );

        if (!empty($this->data)) {
            $this->data['User']['password']
                = AuthComponent::password($this->data['User']['new_password']);
            $this->User->create();
            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.', true)
                );
            }
        }
    }

    /**
     * admin_edit
     *
     * @param integer $id 編集するユーザーのID
     *
     * @return None
     */
    function admin_edit($id = null)
    {
        $roles = $this->Role->find('list');
        $this->set(compact('roles'));

        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid user', true));
            $this->redirect(array('action' => 'index'));
        }

        if (!empty($this->data)) {
            $u = $this->User->findById($id);

            if (isset($this->data['User']['new_password']) && trim($this->data['User']['new_password']) != "") {
                $this->data['User']['password']
                    = AuthComponent::password($this->data['User']['new_password']);
            } else {
                $this->data['User']['password'] = $u['User']['password'];
            }

            $this->User->validate['new_password'] = array(
                'passwordRule' => array(
                    'rule' => array('passwordRule'),
                    'allowEmpty' => true,
                ),
                'between' => array(
                    'rule' => array('between', 4, 10),
                ),
            );

            if ($this->User->save($this->data)) {
                $this->Session->setFlash(__('The user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(
                    __('The user could not be saved. Please, try again.', true)
                );
            }
        }
        if (empty($this->data)) {
            $this->data = $this->User->read(null, $id);
        }
    }

    /**
     * admin_delete
     *
     * @param integer $id 削除するユーザーのID
     *
     * @return None
     */
    function admin_delete($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for user', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash(__('User deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * データベースのオンラインバックアップ
     */
    function admin_backup_exec()
    {
        $database_config = 'default';

        Configure::write('debug', 0);
        App::import('Core', 'ConnectionManager');
        $db = & ConnectionManager::getDataSource($database_config);
        $filename = "dump_" . date('Ymdhis') . ".sql";
        $cmd = sprintf("/usr/bin/mysqldump -u %s --password='%s' %s --opt"
                , $db->config['login']
                , $db->config['password']
                , $db->config['database']
        );
        $this->log($cmd, LOG_INFO);
        $output = shell_exec(escapeshellcmd($cmd));
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $filename);
        header("Content-Transfer-Encoding: binary");
        echo $output;
        exit;
    }

    function admin_auto_backup_list()
    {
        $cmd = "ls -l /opt/backup/*";
        $output = array();
        exec($cmd, $output);
        $this->set("lines", $output);
    }

    function admin_update_researchers()
    {
        $cmd = sprintf("%s/cake/console/cake -app %s update_researchers", dirname(dirname(dirname(__FILE__))), dirname(dirname(__FILE__)));
        $this->log($cmd, LOG_DEBUG);
        Configure::write('debug', 0);
        $output = array();
        exec($cmd, $output);
        $this->set("lines", $output);
    }

}
?>
