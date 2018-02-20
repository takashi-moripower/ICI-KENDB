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
 * Obligation
 *
 * 債主マスター
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class Obligation extends AppModel {

    var $name = 'Obligation';
    var $primaryKey = "obligation_code";
    var $validate = array(
        'obligation_code' => array(
            'alphaNumericHyphen' => array(
                'rule' => array('alphaNumericHyphen'),
                'allowEmpty' => false,
            ),
            'notempty' => array(
                'rule' => array('notempty'),
            ),
            'isUnique' => array(
                'rule' => array('isUnique'),
                'on' => 'create',
            ),
        ),
        'ob_postal_code' => array(
            'numericHyphen' => array(
                'rule' => array('numericHyphen'),
                'allowEmpty' => true,
            ),
        ),
    );

    var $file_columns = array(
        'obligation_code',
        'obligation_name',
        'ob_represent_name',
        'ob_job_title',
        'ob_postal_code_address',
        'ob_section',
        'ob_person_in_charge',
        'obligation_name_short',
        'ob_postal_code',
        'ob_address',
    );

    /**
     * プライマリーキーを切り替える
     */
    function switchPrimaryKey() {
        $this->primaryKey = "obligation_code";
    }


}

?>
