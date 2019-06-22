# gcloud系のコマンドをまとめる

# aliasとしてまとめる



# ここからは作成するコマンド

function change-gcloud-execute-project() {
 gcloud projects list | peco | awk '{print $1}' | xargs gcloud --project
}
