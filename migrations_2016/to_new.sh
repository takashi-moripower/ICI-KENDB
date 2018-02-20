#!/bin/sh

# 0.このスクリプト(db_init.sh)のディレクトリの絶対パスを取得
DIR=$(cd $(dirname $0); pwd)
source $DIR/conf.sh

# 1.0 back up the database
# SQL_BACKUP_COMMAND="mysqldump -u root kendb"
SQL_BACKUP_COMMAND="mysqldump -u $DB_USER --password=$DB_PASSWORD $DB_NAME"
SQL_BACKUP_FILE="backup.sql"
$SQL_BACKUP_COMMAND > $SQL_BACKUP_FILE

Ret_Backup=$?
if [ $Ret_Backup -gt 0 ]; then
  echo "on error($Ret_Backup) $SQL_BACKUP_DATA"
  exit 1
fi

# 2.0 CREATE_SQL
SQL_CREATE_RESPONSIBLES=$DIR/create_responsibles.sql
SQL_CREATE_ORGANIZATIONS=$DIR/create_organizations.sql

# 2.1 ALTER_SQL
### create procedure for column exist check. ###
SQL_PROC_FIELDEXIST=$DIR/proc.fieldexist.sql

### alter ###
SQL_ALTER_ADOPTIONS=$DIR/alter_adoptions.sql
SQL_ALTER_ASSESSED_CONTRIBUTIONS=$DIR/alter_assessed_contributions.sql
SQL_ALTER_CONTRACTS=$DIR/alter_contracts.sql
SQL_ALTER_DONATIONS=$DIR/alter_donations.sql
SQL_ALTER_ENCOURAGES=$DIR/alter_encourages.sql
SQL_ALTER_ENTRUSTS=$DIR/alter_entrusts.sql
SQL_ALTER_GRANTS=$DIR/alter_grants.sql
SQL_ALTER_MHLW_RESEARCH_GRANTS=$DIR/alter_mhlw_research_grants.sql
SQL_ALTER_NEDO_JST_OTHERS=$DIR/alter_nedo_jst_others.sql
SQL_ALTER_OTHER_RESEARCH_GRANTS=$DIR/alter_other_research_grants.sql
SQL_ALTER_RESEARCHERS=$DIR/alter_researchers.sql
SQL_ALTER_SUMMARIES=$DIR/alter_summaries.sql


# MySQLをバッチモードで実行するコマンド
# CMD_MYSQL="mysql -uroot kendb"
CMD_MYSQL="mysql -u $DB_USER --password=$DB_PASSWORD $DB_NAME"

# 各種SQL(外部ファイル)を実行
### create procedure
$CMD_MYSQL < $SQL_PROC_FIELDEXIST
Ret_Create_Procedure=$?
if [ $Ret_Create_Procedure -gt 0 ]; then
  echo "on error($Ret_Create_Procedure) $SQL_PROC_FIELDEXIST"
  exit 1
fi

### create table ###
$CMD_MYSQL < $SQL_CREATE_RESPONSIBLES
Ret_Create_Responsibles=$?
if [ $Ret_Create_Responsibles -gt 0 ]; then
  echo "on error($Ret_Create_Responsibles) $SQL_CREATE_RESPONSIBLES"
  exit 1
fi

$CMD_MYSQL < $SQL_CREATE_ORGANIZATIONS
Ret_Create_Organizations=$?
if [ $Ret_Create_Organizations -gt 0 ]; then
  echo "on error($Ret_Create_Organizations) $SQL_CREATE_ORGANIZATIONS"
  exit 1
fi

### alter table ###
$CMD_MYSQL < $SQL_ALTER_ADOPTIONS
Ret_Alter_Adoptions=$?
if [ $Ret_Alter_Adoptions -gt 0 ]; then
  echo "on error($Ret_Alter_Adoptions) $SQL_ALTER_ADOPTIONS"
  exit 1
fi

$CMD_MYSQL < $SQL_ALTER_ASSESSED_CONTRIBUTIONS
Ret_Alter_Assessed_contributions=$?
if [ $Ret_Alter_Assessed_contributions -gt 0 ]; then
  echo "on error($Ret_Alter_Assessed_contributions) $SQL_ALTER_ASSESSED_CONTRIBUTIONS"
  exit 1
fi

$CMD_MYSQL < $SQL_ALTER_CONTRACTS
Ret_Alter_Contracts=$?
if [ $Ret_Alter_Contracts -gt 0 ]; then
  echo "on error($Ret_Alter_Contracts) $SQL_ALTER_CONTRACTS"
  exit 1
fi

$CMD_MYSQL < $SQL_ALTER_DONATIONS
Ret_Alter_Donations=$?
if [ $Ret_Alter_Donations -gt 0 ]; then
  echo "on error($Ret_Alter_Donations) $SQL_ALTER_DONATIONS"
  exit 1
fi

$CMD_MYSQL < $SQL_ALTER_ENCOURAGES
Ret_Alter_Encourages=$?
if [ $Ret_Alter_Encourages -gt 0 ]; then
  echo "on error($Ret_Alter_Encourages) $SQL_ALTER_ENCOURAGES"
  exit 1
fi

$CMD_MYSQL < $SQL_ALTER_ENTRUSTS
Ret_Alter_Entrusts=$?
if [ $Ret_Alter_Entrusts -gt 0 ]; then
  echo "on error($Ret_Alter_Entrusts) $SQL_ALTER_ENTRUSTS"
  exit 1
fi

$CMD_MYSQL < $SQL_ALTER_GRANTS
Ret_Alter_Grants=$?
if [ $Ret_Alter_Grants -gt 0 ]; then
  echo "on error($Ret_Alter_Grants) $SQL_ALTER_GRANTS"
  exit 1
fi

$CMD_MYSQL < $SQL_ALTER_MHLW_RESEARCH_GRANTS
Ret_Alter_Mhlw_research_grants=$?
if [ $Ret_Alter_Mhlw_research_grants -gt 0 ]; then
  echo "on error($Ret_Alter_Mhlw_research_grants) $SQL_ALTER_MHLW_RESEARCH_GRANTS"
  exit 1
fi

$CMD_MYSQL < $SQL_ALTER_NEDO_JST_OTHERS
Ret_Alter_Nedo_jst_others=$?
if [ $Ret_Alter_Nedo_jst_others -gt 0 ]; then
  echo "on error($Ret_Alter_Nedo_jst_others) $SQL_ALTER_NEDO_JST_OTHERS"
  exit 1
fi

$CMD_MYSQL < $SQL_ALTER_OTHER_RESEARCH_GRANTS
Ret_Alter_Other_research_grants=$?
if [ $Ret_Alter_Other_research_grants -gt 0 ]; then
  echo "on error($Ret_Alter_Other_research_grants) $SQL_ALTER_OTHER_RESEARCH_GRANTS"
  exit 1
fi

$CMD_MYSQL < $SQL_ALTER_RESEARCHERS
Ret_Alter_Researchers=$?
if [ $Ret_Alter_Researchers -gt 0 ]; then
  echo "on error($Ret_Alter_Researchers) $SQL_ALTER_RESEARCHERS"
  exit 1
fi

$CMD_MYSQL < $SQL_ALTER_SUMMARIES
Ret_Alter_Summaries=$?
if [ $Ret_Alter_Summaries -gt 0 ]; then
  echo "on error($Ret_Alter_Summaries) $SQL_ALTER_SUMMARIES"
  exit 1
fi


echo 'execute complete'
