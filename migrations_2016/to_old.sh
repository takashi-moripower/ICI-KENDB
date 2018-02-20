#!/bin/sh

# 0.このスクリプト(db_init.sh)のディレクトリの絶対パスを取得
DIR=$(cd $(dirname $0); pwd)

# 1.0 DROP_SQL定義
SQL_DROP_RESPONSIBLES=$DIR/drop_responsibles.sql
SQL_DROP_ORGANIZATIONS=$DIR/drop_organizations.sql

# drop column sql 定義
SQL_DROP_COLUMN_ADOPTIONS=$DIR/drop_alter_adoptions.sql
SQL_DROP_COLUMN_ASSESSED_CONTRIBUTIONS=$DIR/drop_alter_assessed_contributions.sql
SQL_DROP_COLUMN_CONTRACTS=$DIR/drop_alter_contracts.sql
SQL_DROP_COLUMN_DONATIONS=$DIR/drop_alter_donations.sql
SQL_DROP_COLUMN_ENCOURAGES=$DIR/drop_alter_encourages.sql
SQL_DROP_COLUMN_ENTRUSTS=$DIR/drop_alter_entrusts.sql
SQL_DROP_COLUMN_GRANTS=$DIR/drop_alter_grants.sql
SQL_DROP_COLUMN_MHLW_RESEARCH_GRANTS=$DIR/drop_alter_mhlw_research_grants.sql
SQL_DROP_COLUMN_NEDO_JST_OTHERS=$DIR/drop_alter_nedo_jst_others.sql
SQL_DROP_COLUMN_OTHER_RESEARCH_GRANTS=$DIR/drop_alter_other_research_grants.sql
SQL_DROP_COLUMN_RESEARCHERS=$DIR/drop_alter_researchers.sql
SQL_DROP_COLUMN_SUMMARIES=$DIR/drop_alter_summaries.sql

# MySQLをバッチモードで実行するコマンド
CMD_MYSQL="mysql -uroot kendb"

# drop table SQL(外部ファイル)を実行
$CMD_MYSQL < $SQL_DROP_RESPONSIBLES
Ret_Drop_Responsibles=$?
if [ $Ret_Drop_Responsibles -gt 0 ]; then
  echo "on error($Ret_Drop_Responsibles) $SQL_DROP_RESPONSIBLES"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_ORGANIZATIONS
Ret_Drop_Organizations=$?
if [ $Ret_Drop_Organizations -gt 0 ]; then
  echo "on error($Ret_Drop_Organizations) $SQL_DROP_ORGANIZATIONS"
  exit 1
fi

# drop column
$CMD_MYSQL < $SQL_DROP_COLUMN_ADOPTIONS
Ret_Drop_Column_Adoptions=$?
if [ $Ret_Drop_Column_Adoptions -gt 0 ]; then
  echo "on error($Ret_Drop_Column_Adoptions) $SQL_DROP_COLUMN_ADOPTIONS"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_COLUMN_ASSESSED_CONTRIBUTIONS
Ret_Drop_Column_Assessed_contributions=$?
if [ $Ret_Drop_Column_Assessed_contributions -gt 0 ]; then
  echo "on error($Ret_Drop_Column_Assessed_contributions) $SQL_DROP_COLUMN_ASSESSED_CONTRIBUTIONS"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_COLUMN_CONTRACTS
Ret_Drop_Column_contracts=$?
if [ $Ret_Drop_Column_contracts -gt 0 ]; then
  echo "on error($Ret_Drop_Column_contracts) $SQL_DROP_COLUMN_CONTRACTS"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_COLUMN_DONATIONS
Ret_Drop_Column_Donations=$?
if [ $Ret_Drop_Column_Donations -gt 0 ]; then
  echo "on error($Ret_Drop_Column_Donations) $SQL_DROP_COLUMN_DONATIONS"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_COLUMN_ENCOURAGES
Ret_Drop_Column_Encourages=$?
if [ $Ret_Drop_Column_Encourages -gt 0 ]; then
  echo "on error($Ret_Drop_Column_Encourages) $SQL_DROP_COLUMN_ENCOURAGES"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_COLUMN_ENTRUSTS
Ret_Drop_Column_Entrusts=$?
if [ $Ret_Drop_Column_Entrusts -gt 0 ]; then
  echo "on error($Ret_Drop_Column_Entrusts) $SQL_DROP_COLUMN_ENTRUSTS"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_COLUMN_GRANTS
Ret_Drop_Column_Grants=$?
if [ $Ret_Drop_Column_Grants -gt 0 ]; then
  echo "on error($Ret_Drop_Column_Grants) $SQL_DROP_COLUMN_GRANTS"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_COLUMN_MHLW_RESEARCH_GRANTS
Ret_Drop_Column_Mhlw_research_grants=$?
if [ $Ret_Drop_Column_Mhlw_research_grants -gt 0 ]; then
  echo "on error($Ret_Drop_Column_Mhlw_research_grants) $SQL_DROP_COLUMN_MHLW_RESEARCH_GRANTS"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_COLUMN_NEDO_JST_OTHERS
Ret_Drop_Column_Nedo_jst_others=$?
if [ $Ret_Drop_Column_Nedo_jst_others -gt 0 ]; then
  echo "on error($Ret_Drop_Column_Nedo_jst_others) $SQL_DROP_COLUMN_NEDO_JST_OTHERS"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_COLUMN_OTHER_RESEARCH_GRANTS
Ret_Drop_Column_Other_research_grants=$?
if [ $Ret_Drop_Column_Other_research_grants -gt 0 ]; then
  echo "on error($Ret_Drop_Column_Other_research_grants) $SQL_DROP_COLUMN_OTHER_RESEARCH_GRANTS"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_COLUMN_RESEARCHERS
Ret_Drop_Column_Researchers=$?
if [ $Ret_Drop_Column_Researchers -gt 0 ]; then
  echo "on error($Ret_Drop_Column_Researchers) $SQL_DROP_COLUMN_RESEARCHERS"
  exit 1
fi

$CMD_MYSQL < $SQL_DROP_COLUMN_SUMMARIES
Ret_Drop_Column_Summaries=$?
if [ $Ret_Drop_Column_Summaries -gt 0 ]; then
  echo "on error($Ret_Drop_Column_Summaries) $SQL_DROP_COLUMN_SUMMARIES"
  exit 1
fi

echo 'execute complete'
