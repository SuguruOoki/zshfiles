# gcloud系のコマンドをまとめる

# aliasとしてまとめる
alias cgp=change-gcloud-execute-project
alias cgs=connect-gcloud-sql


# ここからは作成するコマンド

function change-gcloud-execute-project() {
 gcloud projects list | sed -e '1d' | peco | awk '{print $1}' | xargs gcloud --project
}

function connect-gcloud-sql() {
  # local instance=`gcloud sql instances list | sed -e '1d' | peco | awk '{print $1}'`
  local project_id='techTrain-prd-tokyo'
  local instance_id='techtrain-backend'
  local region='asia-northeast1'
  local port='3306'
  ~/Desktop/cloud_sql_proxy -instances=${project_id}:${region}:${instance_id}=tcp:${port}\
                        -credential_file=/Users/oki.suguru/workspace/techbowl/techtrain-backend/TechTrain-dev-tokyo-2ce716a96f17.json &
}
