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
 * ObligationsController
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
class ObligationsController extends AppController
{

    var $name = 'Obligations';
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
        $this->set("title_for_layout", "債主データ");
        $year = $this->Obligation->getCurrentNendo();
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
                '債主データ',
                array('controller' => 'obligations', 'action' => 'index'),
                array()
            )
        );
    }

    /**
     * index
     *
     * @return None
     */
    function index()
    {
        $this->Obligation->recursive = 0;
        $this->set('obligations', $this->paginate());
    }

    /**
     * view
     *
     * @param int $id
     */
    function view($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid obligation', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('obligation', $this->Obligation->read(null, $id));
    }

    /**
     * add
     */
    function add()
    {
        if (!empty($this->data)) {
            $this->Obligation->create();
            if ($this->Obligation->save($this->data)) {
                $this->Session->setFlash(__('The obligation has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The obligation could not be saved. Please, try again.', true));
            }
        }
    }

    /**
     * edit
     *
     * @param int $id
     */
    function edit($id = null)
    {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid obligation', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->Obligation->save($this->data)) {
                $this->Session->setFlash(__('The obligation has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The obligation could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->Obligation->read(null, $id);
        }
    }

    /**
     * delete
     *
     * @param int $id
     */
    function delete($id = null)
    {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for obligation', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Obligation->delete($id)) {
            $this->Session->setFlash(__('Obligation deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Obligation was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    /**
     * JSON形式で出力する
     *
     * @param string $obligation_code 債主ID
     *
     * @return None
     */
    function getJsonByObligationCode($obligation_code = "")
    {
        $this->layout = "ajax";
        if (!$this->RequestHandler->isAjax()) {
            ;
        }
        $rec = $this->Obligation->findByObligationCode($obligation_code);
        $this->set('Obligation', $rec['Obligation']);
    }

    /**
     * Excelに一括出力する
     *
     * @return None
     */
    function output_excel()
    {
        $this->layout = null;
        $this->Obligation->recursive = -1;
        $rec = $this->Obligation->find('all');
        $format = $this->_getExcelFormat();
        $this->_makeExcelObject("Obligation", $rec, $format);
        return;
    }

    /**
     * アップロード
     *
     * @return None
     */
    function upload()
    {
        $this->_upload("Obligation", "obligation_code");
    }

}

?>
