<?php

/**
 * KenDB
 *
 * PHP versions 5
 *
 * @category  None
 * @package   None
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   private http://www.titech.ac.jp/
 * @link      none
 */

/**
 * DeleteStatusShell
 *
 * 編集中記録を削除する
 *
 * @category  None
 * @package   None
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class DeleteStatusShell extends Shell {

    /**
     * 利用するモデル
     *
     * @var array
     */
    var $uses = array('EditStatus');

    /**
     * 起動処理
     *
     * @return None
     */
    function startup() {

    }

    /**
     * メイン処理
     *
     * @return None
     */
    function main() {
        $this->EditStatus->deleteAllStatus();
    }

}

?>
