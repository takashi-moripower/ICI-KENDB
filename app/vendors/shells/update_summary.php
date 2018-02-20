<?php
/* 
 * 逕溷ｹｴ譛域律繧呈峩譁ｰ縺吶ｋ
 */
class UpdateSummaryShell extends Shell
{
	function initialize()
	{
		parent::initialize();
	}

	function main() {
		ini_set('memory_limit', "2048M");

		App::import("Model", "Summary");

		$s = new Summary();
		$all = $s->find('list', array());
		foreach ($all as $id) {
			$s->id = null;
			$rec = $s->read(null, $id);
			$researcher_no = $rec["Summary"]["researcher_no"];

			$birthday_info = $this->getBirthday($researcher_no);

			// 取得できないデータは更新しない
			if(!$birthday_info) {
				echo $id."のデータは取得できないので更新しません\n";
				continue;
			}

            $birthday_info['id'] = $id;
            $birthday_info['researcher_no'] = $researcher_no;
            # echo json_encode($birthday_info, JSON_PRETTY_PRINT); 
            # echo json_encode($birthday_info, 128); 

			$keys = array(
                "birth_year", "birth_month", "birth_day", "birthdayYMD",
                "personal_no", "sex",
            );

			foreach ($keys as $key) {
				$rec["Summary"][$key] = $birthday_info[$key];
			}

			$s->save($rec);
		}
	}

	function getBirthday($researcher_no) {

		App::import("Model", "Researcher");
		$r = new Researcher();
		$rec = $r->findByResearcherNo($researcher_no, array());
		if($rec) {
			if (!checkdate($rec["Researcher"]["birth_month"], $rec["Researcher"]["birth_day"], $rec["Researcher"]["birth_year"])) {
				return false;
			}
			$result = array(
				"personal_no" => $rec["Researcher"]["personal_no"],
				"sex" => $rec["Researcher"]["sex"],
				"birth_year" => $rec["Researcher"]["birth_year"],
				"birth_month" => $rec["Researcher"]["birth_month"],
				"birth_day" => $rec["Researcher"]["birth_day"],
				"birthdayYMD" => sprintf("%04d%02d%02d", 
                                         $rec["Researcher"]["birth_year"], 
                                         $rec["Researcher"]["birth_month"], 
                                         $rec["Researcher"]["birth_day"]),
			);
		} else {
			$result = false;
		}
		return $result;
	}
}

?>
