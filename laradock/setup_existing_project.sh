# git cloneで既存のプロジェクトはlaradockのディレクトリと同じ階層に置いていることを前提としている。
# また、cddコマンドでlaradockのフォルダに移動するものとする
# dockerでworkspaceというコンテナを立てていた場合は、失敗する可能性が高い。
cdd
cp .env.example .env
vim .env
docker-compose up -d nginx mysql phpmyadmin workspace
docker-compose exec --user=laradock workspace bash
composer install
php artisan key:generate

