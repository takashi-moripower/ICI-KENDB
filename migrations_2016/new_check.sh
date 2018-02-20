#!/bin/sh

# このスクリプトのディレクトリの絶対パスを取得
DIR=$(cd $(dirname $0); pwd)
source $DIR/conf.sh

# CREATE_SQL
SQL_NEW_CHECK=$DIR/new_check.sql

# MySQLをバッチモードで実行するコマンド
CMD_MYSQL="mysql -u $DB_USER --password=$DB_PASSWORD $DB_NAME"
RESULT=`$CMD_MYSQL < $SQL_NEW_CHECK`
echo -e "$RESULT"
