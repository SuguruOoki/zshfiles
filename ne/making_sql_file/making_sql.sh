#!/usr/local/bin/zsh
# NEのSQLファイルの雛形を自動作成するファイル

function makeSqlFile() {
  local file_date = `date '+%Y/%m/%d'`;
  local git_branch = `git branch --contains | sed -e 's/.*_//g'`;
  # これでも抜ける
  # git branch --contains | awk '{print substr($0, index($0, "_") + 1)}'))}
  local before = 'before';
  local delete = 'delete';
  local table_name = 'tablename';
  echo "${file_date}_${git_branch}_${before}_${delete}_${table_name}";
}

makeSqlFile()
