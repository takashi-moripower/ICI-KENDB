<?php
/**
 * KenDB
 *
 * PHP versions 5
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   private http://www.titech.ac.jp/
 * @link	  none
 */

/**
 * EntrustNode
 *
 * Long description for class (if any)...
 *
 * @category  None
 * @package   Kendb
 * @author	ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link	  None
 */

class EntrustNode extends Entrust 
{

	var $name = 'Entrust';
	var $useTable = 'entrusts';
	// var $hasMany = null;

	/**
	 * 保存直前にユーザー情報をフィールドにセットする。
	 *
	 * @param array $options 引数配列
	 *
	 * @return boolean 成功・失敗
	 *
	 * @todo あとでapp_modelに移動させるかも
	 *
	 * */
	function beforeSave($options = array())
	{
		AppModel::beforeSave($options);
		return $this->setUserInfo("EntrustNode");
	}


}
?>
