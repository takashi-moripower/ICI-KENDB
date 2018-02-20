<?php
/* 
 * 研究者名が以下ルールに一致するものを、「姓　名」の形に置換する
 * (1)姓と名の間に２つ空白がある
 * (2)姓と名の間に半角空白
 * (3)姓名の右端に空白（１つとは限らない）
 */
class UpdateNameFormatShell extends Shell
{
	//対象テーブル
	private $targetColumnName=array('Adoption'=>'name',
							'AssessedContribution'=>'co_researcher_name',
							'MhlwResearchGrant'=>'name',
							'OtherResearchGrant'=>'name',
							'NedoJstOther'=>'researcher_name',
							'Contract'=>'represent_researcher_name',
							'Grant'=>'represent_researcher_name',
							'Entrust'=>'researcher_name',
							'Donation'=>'researcher_name',
							);

	function  initialize()
	{
		parent::initialize();
	}

	// 対象テーブルを指定し、データを更新する
	function main() {
		ini_set('memory_limit', "2048M");

		foreach($this->targetColumnName as $targetModel=>$targetColumn){
			echo "###テーブル:".$targetModel." カラム:".$targetColumn." の処理開始###\n";
			$ret=$this->changeFormat($targetModel,$targetColumn);
		}
	}
	
	function changeFormat($targetModel,$targetColumn){
		App::import('Model', $targetModel);
		$model = new $targetModel();
		$fields = array('id',$targetColumn);
		$records = $model->find('all', array('fields'=>$fields));

		$i=1;
		foreach($records as $r){
			$originName = $r[$targetModel][$targetColumn];
			$name = $originName;
			
			// 全て半角SPに変換した後、Trimおよび姓名の間のSPを１つに変更
			$name = str_replace( "\xc2\xa0", " ", $name );
			$name = str_replace( "　", " ", $name );
			$name = preg_replace('/[ ]+/', ' ', trim($name));
			$name = str_replace( " ", "　", $name );
			
			if($name !== $originName){
				$id=$r[$targetModel]['id'];
			
				echo "id:".$id." を[".$originName."]→[".$name."]に更新します。\n";
				$rec=$model->read(null,$id);
				$model->id=$id;
				$rec[$targetModel][$targetColumn]=$name;
				
				//updated_byを更新しないため、beforeは対象外とした
				$model->save($rec,array('fieldList'=>array($targetColumn),
										'callbacks'=>'after')
							);
			}
			if($i%1000==0) echo $i."件目処理済\n";
			$i++;
		}
		echo $i."件処理完了\n";
		return true;
	}
}

?>
