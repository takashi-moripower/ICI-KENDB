#!/bin/sh

BASE=`pwd`

chmod -R 777 $BASE/app/tmp/

PLUGIN=$BASE/app/plugins/acl/tmp

chmod -R 777 $PLUGIN

chmod -R 777 $BASE/app/webroot/help/wiki
chmod -R 777 $BASE/app/webroot/help/diff
chmod -R 777 $BASE/app/webroot/help/backup
chmod -R 777 $BASE/app/webroot/help/cache
chmod -R 777 $BASE/app/webroot/help/attach
chmod -R 777 $BASE/app/webroot/help/counter
chmod -R 777 $BASE/app/webroot/help/trackback

