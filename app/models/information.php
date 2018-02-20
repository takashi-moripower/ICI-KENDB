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
 * Information
 *
 * お知らせのモデル
 *
 * @category  None
 * @package   Kendb
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class Information extends AppModel
{

    var $name = 'Information';
    var $displayField = 'name';
    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'description' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'disabled' => array(
            'boolean' => array(
                'rule' => array('boolean'),
                'allowEmpty' => true,
            ),
        ),
        'startdate' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
        'enddate' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            ),
        ),
    );
    var $fields = array(
        'save' => array('name', 'description', 'startdate', 'enddate'),
    );

    /**
     * Get active information
     * 
     * @param $show_anonymous
     * @return unknown_type
     */
    function getLatestInformation()
    {
        $conditions = array(
            'conditions' => array(
                'Information.startdate <=' => date('Y-m-d'),
                'Information.enddate >= ' => date('Y-m-d'),
                'Information.disabled !=' => 1,
            ),
            'order' => 'Information.startdate desc',
        );
        return $this->find('all', $conditions);
    }

}

?>
