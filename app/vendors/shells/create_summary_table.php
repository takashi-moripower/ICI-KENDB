<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class CreateSummaryTableShell extends Shell
{
	function  initialize()
	{
		parent::initialize();
	}

    /**
    *   @param string   $model_name Summaryにデータを投入するモデル名
    *   @param integer  $max        データを投入する件数
    **/
    function create_summary($model_name ,$max)
    {
        echo "creating summary for $model_name\n";

		App::import("Model", "Summary");
        App::import("Model", $model_name );

        $this->{$model_name} = new $model_name();
        $this->{$model_name}->recursive = -1;
        $results = $this->{$model_name}->find('all');

        echo "========" . $model_name . "========\n";
        $count=0;
        foreach ($results as $rec) {
            $this->{$model_name."2"} = new $model_name();
            $this->{$model_name."2"}->data = $rec;
            $this->{$model_name."2"}->id = null;

            $this->{$model_name."2"}->saveToSummary(
                $this->{$model_name."2"}, 
                true, 
                $rec[$model_name]["id"]);
            unset($this->{$model_name."2"});

            $count++;
                if($count % 100 == 0) {
                echo $count . "件処理中...\n";
            }
            if( $count >= $max  ){
                echo "件数が $max を超えたので、打ち切ります。\n";
                break;
            }
        }
    }

    /**
    *   cake create_summary_table {{モデル名}} {{処理件数}}
    *   - 処理件数を省略するとMAX INTEGER(PHP_INT_MAX)が使われます
    **/
    function main()
    {
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

        if( count( $this->args ) < 1 && ! in_array( $this->args[0], $models))
        {
            echo "specify model name from : ".join(',',$models) ,"\n";
            return ;
        }
        $name = $this->args[0];
        $max = ( count( $this->args ) > 1 && preg_match('/^\d+$/', $this->args[1]) ) ? intval( $this->args[1] ) : PHP_INT_MAX; 
        echo PHP_INT_MAX,"processing $max for $name table\n";

		App::import("Model", "Summary");
		$s = new Summary();
        echo "delete from summaries where model_name like '$name'\n";
		$s->query("delete from summaries where model_name like '$name' ");

        $this->create_summary( $name ,$max );

    }
}

?>
