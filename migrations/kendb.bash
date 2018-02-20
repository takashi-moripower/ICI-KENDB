P=`readlink -f $BASH_SOURCE`;
D=`dirname $P`;
D=`dirname $D`;
alias DBSHELL="$D/app/vendors/shells/cakesh.bash dbshell"
alias CAKESHELL="$D/app/vendors/shells/cakesh.bash"

function KENDB_GET_SUMMARY()
{
    # model_id == $1 のSummary レコードを返す
    echo "select id, model_id, model_name, unaggregate, project_code, memo from summaries where model_id=$1" | DBSHELL
}

function KENDB_CHECK_MIGRATION()
{
    echo "desc summaries" | DBSHELL  > /tmp/summaries.sql
    echo "1. 横断検索フィールド追加(summaries)------"
    for i in sex personal_no project_code unaggregate; do
       grep $i /tmp/summaries.sql 
    done
 

    echo "2. 資金テーブル:対象外(unaggregate)フィールド追加"
    TBL=(   
adoptions               
entrusts              
other_research_grants
assessed_contributions  
grants                
contracts               
mhlw_research_grants
donations               
nedo_jst_others
)

    for i in ${TBL[@]}; do
       echo "$i --";
       echo "desc $i" |  DBSHELL | grep "unaggregate";
    done

    echo "3. 集計一時テーブル(3) ビュー(1)"
    echo "show tables" | DBSHELL | grep aggregate_ 

    echo "4. 不明研究者ビュー"
    echo "show tables" | DBSHELL | grep missing_researchers
}

