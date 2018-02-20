<?php
require_once(dirname(__FILE__) . '/../../vendors/xmlrpc.php'); 
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class UpdateResearchersShell extends Shell
{
	var $url = "http://search.star.titech.ac.jp:8086/titech-rp/xmlrpc";
	var $client;

	function  initialize()
	{
		parent::initialize();
		$this->client = new IXR_Client($this->url);
	}

	// 研究者番号をキーにしてデータを取得する
	function main() {
		ini_set('memory_limit', "2048M");
		App::import('Model', 'Researcher');
		$model = new Researcher();
		$condition = array('conditions' => array("disabled" => false, "cooperate_no" => '', "personal_no !=" => ''));
		$records = $model->find('all', $condition);
		echo "補完データ件数は".count($records)."件です\n";
		foreach ($records as $record) {
			echo "==================\n";
			echo $record["Researcher"]["researcher_name"]."\n";
			$personal_no = $record["Researcher"]["personal_no"];
			echo $personal_no . "\n";	
			$ret = $this->get($personal_no);
			$cooperate_no = '';
			if ($ret) {
				echo "取得データ：";
				$cooperate_no = $ret["titechId"];
				echo $cooperate_no . " が取得されました\n";
			} else {
				echo "SSからデータ取得に失敗しました\n";
				continue;
			}
			$sql = "UPDATE researchers set cooperate_no = ? where personal_no = ?";
			if (trim($cooperate_no) != "" && trim($personal_no) != "") {
				$query_status = $model->query($sql, array($cooperate_no, $personal_no));
			}
		}
	}

	function get($personal_no) {
		$this->client->debug = false;
		$cond = array(
			"ITEMS" => array(
				array(
					"PROPERTY" => "userId",
					"WORD" => $personal_no,
					"STRICT" => true,
				)
			)
		);

		if (!$this->client->query("Staff.search", array("dummy"=>1), "Staff", $cond, array('titechId','userId'), array(), 0, 1)) { 
			$this->log('APIの呼び出しで失敗しました - '.$this->client->getErrorCode().' : '.$this->client->getErrorMessage(), LOG_DEBUG); 
			return false;
		} else {
			$con = ($this->client->getResponse()); 
			if (array_key_exists("Result", $con) && !empty($con["Result"]) && array_key_exists("attributes", $con["Result"][0])) {
				return $con["Result"][0]["attributes"];
			} else {
				return false;
			}
		}
	}
}

?>
