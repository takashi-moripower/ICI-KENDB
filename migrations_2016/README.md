# データベースマイグレーション

- 2016年3月のデータベース更新

## 新系への移行ツール

### フィールドの存在確認

- proc.fieldexist.sql

### テーブル追加

- create_organizations.sql
- create_responsibles.sql

### カラムの追加(institute_code, school_code, course_code)

- alter_adoptions.sql
- alter_assessed_contributions.sql
- alter_contracts.sql
- alter_donations.sql
- alter_encourages.sql
- alter_entrusts.sql
- alter_grants.sql
- alter_mhlw_research_grants.sql
- alter_nedo_jst_others.sql
- alter_other_research_grants.sql
- alter_summaries.sql

### 対象テーブル
- adoptions
- ssessed_contributions
- contracts
- donations
- encourages
- entrusts
- grants
- mhlw_research_grants
- nedo_jst_others
- other_research_grants
- summaries

### 実行

- to_new.shの7行目にある、mysql 接続用IDとパスワードを書き換えてから実行
- `sh to_new.sh`

### カラム追加確認

- new_check.sql

### 実行

- new_check.shの10行目にある、mysql 接続用IDとパスワードを書き換えてから実行
- `sh new_check.sh`

## 旧系への戻しツール

### フィールドの存在確認

- proc.fieldexist.sql

### テーブル削除

- drop_organizations.sql
- drop_responsibles.sql

### カラム削除

- drop_alter_adoptions.sql
- drop_alter_assessed_contributions.sql
- drop_alter_contracts.sql
- drop_alter_donations.sql
- drop_alter_encourages.sql
- drop_alter_entrusts.sql
- drop_alter_grants.sql
- drop_alter_mhlw_research_grants.sql
- drop_alter_nedo_jst_others.sql
- drop_alter_other_research_grants.sql
- drop_alter_summaries.sql

### 対象テーブル
- adoptions
- ssessed_contributions
- contracts
- donations
- encourages
- entrusts
- grants
- mhlw_research_grants
- nedo_jst_others
- other_research_grants
- summaries


### 実行

- to_old.shの25行目にある、mysql 接続用IDとパスワードを書き換えてから実行
- `sh to_old.sh`

### カラム削除確認

- new_check.sql

### 実行

- new_check.shの10行目にある、mysql 接続用IDとパスワードを書き換えてから実行
- `sh new_check.sh`
