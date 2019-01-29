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

## 会社外に出さない方が良いファイルやコマンドについて

### 1. コマンド

以下の情報が入っているコマンドについては .zshrc-localにコマンドを作成する方針とする

- ipアドレス
- DBの構成情報
- APIの構成情報
- パスワード

## 2. パスワードなどのユーザ情報

### パスワードはzshfiles配下の.~.txtという形で保存し、読みに行く形とする。

一般的にセキュリティ対策をする箇所のパスワードについてはあらかじめファイルを用意する

- ssh


## .zsh-localについて

その環境でのみ利用したいコマンドがある場合(例えば社外秘にしたいパスやパスワードなどの情報が入ったfunctionなど)は.zsh-localというファイルをzshfiles内に用意する。

# git hooksについて

以下のQiitaの記事を参考に設定すること

gitのhookを全リポジトリで共有する
https://qiita.com/k0kubun/items/5cb8209e3d1854ac2e2e

# 利用ライブラリ

基本: prezto

