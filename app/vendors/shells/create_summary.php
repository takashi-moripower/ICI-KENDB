<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class CreateSummaryShell extends Shell
{
	function  initialize()
	{
		parent::initialize();
	}

	function main() {
		ini_set('memory_limit', "2048M");

		$models = array(
			"AssessedContribution",
			"Adoption",
			"MhlwResearchGrant",
			"OtherResearchGrant",
			"Grant",
			"Contract",
			"Entrust",
			"NedoJstOther",
			"Donation",
		);
		App::import("Model", "Summary");
		$s = new Summary();
		$s->query("TRUNCATE TABLE summaries");

		$count = 0;
		foreach ($models as $m) {
			App::import("Model", $m);
			$this->{$m} = new $m();
			$this->{$m}->recursive = -1;
			$results = $this->{$m}->find('all');
			echo "========" . $m . "========\n";

			foreach ($results as $rec) {
				$this->{$m."2"} = new $m();
				$this->{$m."2"}->data = $rec;
				$this->{$m."2"}->id = null;
				$this->{$m."2"}->saveToSummary($this->{$m."2"}, true, $rec[$m]["id"]);
				unset($this->{$m."2"});
				$count++;
				if($count % 100 == 0) {
					echo $count . "件処理中...\n";
				}
			}
		}
	}
}

?>
