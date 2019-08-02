#!/bin/sh

mkdir $HOME/.zsh/
cd $HOME/.zsh/
git clone git@github.com:mollifier/anyframe.git

# .zshrcに以下追記
fpath=($HOME/.zsh/anyframe(N-/) $fpath)
autoload -Uz anyframe-init
anyframe-init
