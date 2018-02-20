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
 * Project
 *
 * プロジェクトマスタ
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class Project extends AppModel {

    var $name = 'Project';
    var $primaryKey = "project_code";
    var $validate = array(
        'project_code' => array(
            'isUnique' => array(
                'rule' => array('isUnique'),
                'on' => 'create',
            ),
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'allowEmpty' => false,
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'cooperate_no' => array(
            'alphaNumericHyphen' => array(
                'rule' => array('alphaNumericHyphen'),
                'allowEmpty' => true,
            ),
        ),
        'researcher_no' => array(
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'allowEmpty' => true,
            ),
        ),
    );

    var $file_columns = array(
        'project_code',
        'long_name',
        'short_name',
        'researcher_name',
        'job_title',
        'department_no',
        'department',
        'goal',
        'cooperate_no',
        'researcher_no',
    );

    /**
     * プライマリーキーを切り替える
     */
    function switchPrimaryKey() {
        $this->primaryKey = "project_code";
    }

}

?>
