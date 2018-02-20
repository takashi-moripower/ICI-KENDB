#!/bin/bash
BASEDIR=$(readlink -f $0 | xargs dirname | xargs dirname | xargs dirname | xargs dirname)

if [ "$1" == "dbshell" ] ; then
    $BASEDIR/cake/console/cake -app $BASEDIR/app db echo_mysql;
    eval "`$BASEDIR/cake/console/cake -app $BASEDIR/app db echo_mysql` -t";
else
    COMMAND=${1%.*}
    ARGS=${@:2}
    $BASEDIR/cake/console/cake -app $BASEDIR/app $COMMAND $ARGS
fi
