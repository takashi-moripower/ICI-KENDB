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
 * ProjectsController
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
class ProjectsController extends AppController
{

    var $name = 'Projects';
    /**
     * ACLチェック
     */
    var $check_action = array(
        "edit", "output_excel", "add", "delete",
        "view", "index", "upload",
    );

    /**
     * beforeFilter()
     *
     * @return None
     */
    function beforeFilter()
    {
        parent::beforeFilter();
        $this->set("title_for_layout", "プロジェクトデータ");
        $year = $this->Project->getCurrentNendo();
        $this->crumbList = array(
            array(
                'ホーム',
                array('controller' => 'users', 'action' => 'index'),
                array()
            ),
            array(
                '奨学寄附金',
                array('controller' => 'donations', 'action' => 'index', 'year:' . $year),
                array()
            ),
            array(
                'プロジェクトデータ',
                array('controller' => 'projects', 'action' => 'index'),
                array()
            )
        );
    }

    /**
     * 一覧表示
     *
     * @return None
     */
    function index()
    {
        $this->Project->recursive = 0;
        $this->set('projects', $this->paginate());
    }

    /**
     * データの閲覧
     * 
     * @param int $id 
     */
    function view($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid project', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('project', $this->Project->read(null, $id));
    }

    /**
     * 追加
     *
     * @return None
     */
    function add()
    {
        if (!empty($this->data)) {
            $this->Project->create();
            if ($this->Project->save($this->data)) {
                $this->Session->setFlash(__('The project has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
            }
        }
    }

    /**
     * プロジェクトデータの編集
     * 
     * @param int $id
     *
     * @return None
     */
    function edit($id = null)
    {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid project', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Project->save($this->data)) {
                $this->Session->setFlash(__('The project has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The project could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Project->read(null, $id);
        }
    }

    /**
     * プロジェクトデータの削除
     *
     * @param int $id
     *
     * @return None
     */
    function delete($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for project', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Project->delete($id)) {
            $this->Session->setFlash(__('Project deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Project was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * JSON形式で出力する
     *
     * @param string $project_code プロジェクトコード
     *
     * @return None
     */
    function getJsonByProjectCode($project_code = "")
    {
        $this->layout = "ajax";
        if (!$this->RequestHandler->isAjax()) {
            ;
        }
        $rec = $this->Project->findByProjectCode($project_code);
        $this->set('Project', $rec['Project']);
    }

    /**
     * Excelに一括出力する
     *
     * @return None
     */
    function output_excel()
    {
        $this->layout = null;
        $this->Project->recursive = -1;
        $rec = $this->Project->find('all');
        $format = $this->_getExcelFormat();
        $this->_makeExcelObject("Project", $rec, $format);
        return;
    }

    /**
     * アップロード
     *
     * @return None
     */
    function upload()
    {
        $this->_upload("Project", "project_code");
    }

}

?>
