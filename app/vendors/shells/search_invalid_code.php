<?php
class SearchInvalidCodeShell extends Shell
{
	function  initialize()
	{
		parent::initialize();
	}

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

		echo "====職員番号系のデータでおかしなものを探す====\n";
		foreach ($models as $m => $fields) {
			App::import('Model', $m);
			$obj = new $m();
			$cond = array();
			foreach ($fields as $f ) {
				$cond["OR"][] = "(length($f) != 8 and length($f) != 0)";
			}
			$cond["OR"][] = "(length(cooperate_no) != 11 and length(cooperate_no) != 0)";
			//$cond["AND"][] = "(year = 2012 or year = 2011)";
			$rec = $obj->find('all', array('conditions' => $cond));
			$s = "";
			foreach ($rec as $r) {
				$s .= $r[$m]["id"]."\t";
				foreach ($fields as $f ) {
					$s .= $r[$m][$f]."\t";
				}
				$s .= $r[$m]["cooperate_no"]."\t";
				$s .= "\n";
			}
			echo __($m, true) . " " . count($rec) ."\n" .$s ."\n";
		}
	}
}

?>
