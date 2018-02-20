# データベースマイグレーション

- 2015春のデータベース更新

## ツール

### フィールドの存在確認

- proc.fieldexist.sql 

### インデックスの存在確認

- proc.indexexist.sql

## Summary テーブル

### personal_no を追加

- add.personal_no.summaries.sql

### プロジェクトコード

- add.project_code.summaries.sql

### sex の追加

- add.sex.summaries.sql

### unaggregate の追加

- add.unaggregate.summaries.sql 
- add.unaggregate.adoptions.sql
- add.unaggregate.assessed_contributions.sql
- add.unaggregate.contracts.sql
- add.unaggregate.donations.sql
- add.unaggregate.entrusts.sql
- add.unaggregate.grants.sql
- add.unaggregate.mhlw_research_grants.sql
- add.unaggregate.nedo_jst_others.sql
- add.unaggregate.other_research_grants.sql
- add.unaggregate.summaries.sql

## researcher_no にインデックスを追加

- add.index.researcher.sql
- add.index.summary.sql

## キャッシュをリフレッシュすること


## 集約関連

- create.table.aggregations.sql
- add.index.aggregations.sql
- view.aggreate.sql

## 不明研究者

- view.missing_researchers.sql

## その他

- モデルとビューを変更しているので、キャッシュを削除すること。

## 実行

~~~
for p in proc.*.sql; do cat $p | DBSHELL ;done
cat add.personal_no.summaries.sql | DBSHELL
cat add.project_code.summaries.sql | DBSHELL
cat add.sex.summaries.sql | DBSHELL
for sql in add.unaggregate.*; do cat $sql | DBSHELL; done
cat add.index.researcher.sql | DBSHELL
cat add.index.summary.sql | DBSHELL
cat create.table.aggregations.sql | DBSHELL
cat add.index.aggregations.sql | DBSHELL
cat view.aggreate.sql | DBSHELL
cat view.missing_researchers.sql | DBSHELL
~~~
