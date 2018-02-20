<?php
class SearchEmptyResearcherIdShell extends Shell
{
	function  initialize()
	{
		parent::initialize();
	}

	// 研究者番号をキーにしてデータを取得する
	function main() {
		ini_set('memory_limit', "2048M");

		$models = array(
			"Adoption"             => array("researcher_no", "personal_no"), 
			"AssessedContribution" => array("personal_no"), 
			"Encourage"            => array("researcher_no", "personal_no"), 
			"MhlwResearchGrant"    => array("researcher_no", "personal_no"),
			"OtherResearchGrant"   => array("researcher_no", "personal_no"), 
			"NedoJstOther"         => array("researcher_no"), 
			"Contract"             => array("researcher_no"), 
			"Grant"                => array("researcher_no"), 
			"Entrust"              => array("researcher_no"), 
			"Donation"             => array("researcher_no", "personal_no"),
		);



		/**
		echo "====東工大連携IDが空で、かつ職員番号も研究者番号も空のデータ====\n";
		foreach ($models as $m => $fields) {
			App::import('Model', $m);
			$obj = new $m();
			$cond = array();
			foreach ($fields as $f ) {
				$cond["AND"][] = "($f is NULL or $f = '')";
			}
			$cond["AND"][] = "(cooperate_no is NULL or cooperate_no = '')";
			$cond["AND"][] = "(year = 2012 or year = 2011)";
			$rec = $obj->find('all', array('conditions' => $cond));
			$s = "";
			foreach ($rec as $r) {
				$s .= $r[$m]["id"]."\n";
			}
			// モデル名・件数・ID
			echo __($m, true) . " " . count($rec) ."\n" .$s ."\n";
		}
		**/

		echo "\n\n\n====東工大連携IDが空で、かつ職員番号または研究者番号にはデータが存在するデータを更新します====\n";
		foreach ($models as $m => $fields) {
			App::import('Model', $m);
			$obj = new $m();
			$cond = array();
			foreach ($fields as $f ) {
				$cond["OR"][] = "($f is not NULL and $f != '')";
			}
			$cond["AND"][] = "(cooperate_no is NULL or cooperate_no = '')";
			$cond["AND"][] = "(year > 2010)"; // 2011年以降はすべて
			$rec = $obj->find('all', array('conditions' => $cond));
			$s = "";
			foreach ($rec as $r) {
				$s .= $r[$m]["id"].",";
				$pno = "";
				$rno = "";
				if(array_key_exists("personal_no", $r[$m])) {
					$pno = $r[$m]["personal_no"];
					$s .= $pno.",";
				}
				if(array_key_exists("researcher_no", $r[$m])) {
					$rno = $r[$m]["researcher_no"];
					$s .= $rno.",";
				}
				$cno = $this->getCooperateNo($pno, $rno);
				$s .= $cno . "\n";

				if($cno != "") {
					App::import('Model', "User");
					$user = new User();
					$displayname = $r[$m]["updated_by"];
					if(!isset($displayname)) {
						$displayname = $r[$m]["created_by"];
					}
					$user_info = $user->findByDisplayname($displayname);
					if($user_info) {
						User::store($user_info);
					} else {
						continue;
					}

					// モデルで更新
					$obj2 = new $m();
					$obj2->id = $r[$m]["id"];
					$tmp_data = $obj2->read();
					$tmp_data[$m]["cooperate_no"] = $cno;
					$obj2->save($tmp_data);
					$obj2->id = null;
					echo __($m, true). " ID: ". $r[$m]["id"] . " 個人番号:" . $pno . " 研究者番号:" . $rno . " 東工大連携ID:" .$cno . "\n";
				}
			}
			//echo __($m, true) . " " . count($rec) ."件\n". $s . "\n";
		}
	}

	function getCooperateNo($personal_no, $researcher_no) {
		App::import('Model', 'Researcher');
		$m = new Researcher();
		$cond = array();
		if(isset($personal_no)) {
			$cond["AND"][] = array("personal_no" => $personal_no);
		}
		if(isset($researcher_no)) {
			$cond["AND"][] = array("researcher_no" => $researcher_no);
		}
		$rec = $m->find('all', array("conditions" => $cond));
		if(count($rec) != 1) {
			return "";
		} else {
			return $rec[0]["Researcher"]["cooperate_no"];
		}
	}
}

?>
