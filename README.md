# 概要
zshfilesの管理リポジトリ。
基本的には.zshrcに関係するファイルと利用するライブラリの管理を行う。

# 使い方

1. ホームディレクトリに本リポジトリをclone
2. このリポジトリのディレクトリに移動してinstall.shを実行
3. 諸々細かいところを調整


基本的には以下のコマンドを順番に撃てば良い

```
cd ~;
git clone git@github.com:SuguruOoki/zshfiles.git;
cd zshfiles;
chmod +x install.sh;
./install.sh;
```

## iterm2のテーマについて

iterm2でatom-onedarkを使用したかったので、gitのsubmoduleに入れてある。
そのため、そこをiterm2の設定 > color においてimportして利用するとそのまま使える。


## .zsh-localについて

その環境でのみ利用したいコマンドがある場合(例えば社外秘にしたいパスやパスワードなどの情報が入ったfunctionなど)は.zsh-localというファイルをzshfiles内に用意する。

# 利用ライブラリ

基本: prezto

