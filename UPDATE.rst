リリースノート
=============

更新手順
-----------

レポジトリ

.. code-block:: bash

    $ cd /usr/local/src/kendb
    $ svn co https://svn.i-c-i.jp/kendb1/branches/Org2016/source Org2016
    $ chmod -R 777 /usr/local/src/kendb/Org2016/app/tmp/
    $ chmod -R 777 /usr/local/src/kendb/Org2016/app/plugins/acl/tmp
    
念のためにDBバックアップ

.. code-block:: bash

    $ cd Org2016/
    $ app/vendors/shells/cakesh.bash db dump_ddl
    $ app/vendors/shells/cakesh.bash db dump_data
    $ ls \*.sql
    data.all.sql  ddl.all.sql

    $ mv \*.sql ~/

データベース修正

.. code-block:: bash

    $ cd migrations_2016/
    $ sh to_new.sh 

    $ sh new_check.sh
    TABLE_NAME      COLUMN_NAME
    adoptions       institute_code
    adoptions       school_code
    adoptions       course_code
    assessed_contributions  institute_code
    assessed_contributions  school_code
    assessed_contributions  course_code
    contracts       institute_code
    contracts       school_code
    contracts       course_code
    donations       institute_code
    donations       school_code
    donations       course_code
    encourages      institute_code
    encourages      school_code
    encourages      course_code
    entrusts        institute_code
    entrusts        school_code
    entrusts        course_code
    grants  institute_code
    grants  school_code
    grants  course_code
    mhlw_research_grants    institute_code
    mhlw_research_grants    school_code
    mhlw_research_grants    course_code
    nedo_jst_others institute_code
    nedo_jst_others school_code
    nedo_jst_others course_code
    other_research_grants   institute_code
    other_research_grants   school_code
    other_research_grants   course_code
    researchers     institute_code
    researchers     school_code
    researchers     course_code
    responsibles    institute_code
    responsibles    school_code
    responsibles    course_code
    summaries       institute_code
    summaries       school_code
    summaries       course_code

リンク修正


.. code-block:: bash

    $ sudo unlink source

    $ sudo ln -s Org2016 source



ヘルプ
==========


- cake ディレクトリごと更新する
- check out したら app/tmp/* に apacheの書き込みアクセス件を与える
- ヘルプをexportする

::

    $ svn export https://svn.i-c-i.jp/kendb1/trunk/help_site/ app/webroot/help
    $ chmod -R o+w app/webroot/help
