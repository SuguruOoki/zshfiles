export EDITOR=vim

# コマンド系
alias sshh='peco-sshconfig-ssh'
alias vcd="peco-vagrant-cd"
alias findcd="peco-find-cd"
alias gd="peco-git-cd"
alias ph="peco-select-history"
alias nkfg="nkf --guess"
alias ali='alias-change'
alias ll="ls -l"
alias la="ls -a"
alias ad='cd $HOME/"$(cat ~/actives.txt | peco)"'
alias sou="source"
alias mvim="_peco_mdfind"
alias ctags="`brew --prefix`/bin/ctags"
alias vgs="vagrant global-status -a"
alias vpu="vagrant ssh -c ./phpunit.sh"
alias pcdd="peco-docker-cd"
alias pcd="peco-docker-compose-cd"
alias dc="docker-compose"
alias -g P='`docker ps | tail -n +2 | peco | cut -d" " -f1`'
alias docker-ssh='docker exec -it P bash'
alias ch-bash='chsh -s /bin/bash'
alias server=' php -S localhost:9000'
alias unittest='docker exec 52143b1a21a2 sh -c "/var/www/html/vendor/phpunit/phpunit/phpunit --configuration /var/www/html/tests/phpunit.xml"'
alias ldup='docker-compose up -d nginx mysql phpmyadmin redis workspace'
alias selenium-stop="ps aux | grep selenium-server-standalone | grep -v grep |awk {'print \$2'} |xargs kill -9"
alias selenium-up='java -jar selenium-server-standalone-3.4.0.jar &'

# PATHの設定
export PATH=$PATH:/usr/local/mysql/bin
export PATH=$HOME/.nodebrew/current/bin:$PATH

if [ -f ~/.env ] ; then
. ~/.env
fi

function daily() {
    local current_directory=`pwd`;
    local year=`date +%Y`;
    local month=`date +%m`;
    local day=`date +%d`;

    cd ~/daily-report;
    git pull origin master;

    if [ ! -e "~/daily-report/${year}" ]; then
	 mkdir $year;
	 cd $year;
    else
	 cd $year;
    fi

    if [ ! -e "~/daily-report/${year}/${month}" ]; then
	 mkdir $month;
	 cd $month;
    else
	 cd $month;
    fi

    vim "${day}.md";
    git add -A;
    git commit -m "日報のアップロード ${year}-${month}-${day}";
    git push origin master;

    cd $current_directory;
}


function sgrep() {
    search_word=$1;
    target_file=$2;
    if [ -n "$search_word" -a -n "$target_file" ]; then
        LANG=ja_JP.sjis grep -n `echo $search_word | nkf -s` $target_file  | nkf -w
    else
        echo '引数が足りません';
    fi
}

function peco-sshconfig-ssh() {
    local host=$(grep 'Host ' ~/.ssh/config | awk '{print $2}' | peco)
    if [ -n "$host" ]; then
        echo "ssh -F ~/.ssh/config $host"
        ssh -F ~/.ssh/config $host
    fi
}

function peco-find-cd() {
  local FILENAME="$1"
  local MAXDEPTH="${2:-5}"
  local BASE_DIR="${3:-`pwd`}"

  if [ -z "$FILENAME" ] ; then
    echo "Usage: peco-find-cd <FILENAME> [<MAXDEPTH> [<BASE_DIR>]]" >&2
    return 1
  fi

  local DIR=$(find ${BASE_DIR} -maxdepth ${MAXDEPTH} -name ${FILENAME} | peco | head -n 1)

  if [ -n "$DIR" ] ; then
    DIR=${DIR%/*}
    echo "pushd \"$DIR\""
    pushd "$DIR"
  fi
}

function peco-open()
{
    local var
    local file
    local command="open"
    if [ ! -t 0 ]; then
        var=$(cat -)
        file=$(echo -n $var | peco)
    else
        return 1
    fi

    if [ -n "$1" ]; then
        command="$1"
    fi
    if [ -e "$file" ]; then
        eval "$command $file"
    else
        echo "Could not open '$file'." >&2
        return 1
    fi
}

function peco-docker-cd() {
  peco-mdfind-cd "Dockerfile"
}

function peco-docker-compose-cd() {
  peco-mdfind-cd "docker-compose.yml";
 }


function peco-vagrant-cd() {
  peco-mdfind-cd "Vagrantfile"
}

function peco-git-cd() {
  peco-find-cd '.git'
}

function alias-change() {
  vim ~/.zshrc;
  source ~/.zshrc;
}

function peco-select-history() {
    BUFFER=$(\history 50 | \
                    sort -r -k 2 |\
                    uniq -1 | \
                    sort -r | \
                    awk '$1=$1' | \
                    cut -d" " -f 2- | \
                    peco --query "$LBUFFER")
    CURSOR=$BUFFER
}

_peco_mdfind() {
  vim "$(mdfind -onlyin . -name $@ | peco)"
}

# アプリオープン系
#alias ao="atom ./"
alias net='open -n -a "Google Chrome.app" --args --app="http://php.net/manual/ja/funcref.php"'
alias enote='open -n -a "Google Chrome.app" --args --app="https://www.evernote.com/Home.action?message=forgotPasswordAction.sent&login=true#n=900d5ae2-93c9-491c-8575-eaa08db14039&s=s626&ses=4&sh=2&sds=5&"'
alias myer='open -n -a "Google Chrome.app" --args --app="https://dev.mysql.com/doc/refman/5.6/ja/error-messages-server.html"'

# git系
alias nes="ssh nesp03"
alias gcb='git checkout -b'
alias gf='git fetch --all'
alias gc='git checkout $(git branch | sed -e "/*/d" | peco)'
alias gme='git commit --amend --no-edit'
alias gul='git pull origin'
alias gsh='git push origin'
alias gst='git status'
alias gadd='git add .'
alias gf="git fetch --all"
alias glp='git log -p'
alias gp='~/zshfiles/git-padd.sh'
alias gdel='~/zshfiles/git-pchk.sh'
alias gun='git reset HEAD'
alias gaw="git diff -w --no-color | git apply --cached"
alias us="git checkout HEAD"
alias graph='git log --graph'

# vim系
alias cvim='vim ~/.vimrc;source ~/.vimrc'
alias sp='open -a "Sequel Pro.app"'
alias lo="tailmainfunctionsystemlog"
alias veco='~/.vim/ctrlp-veco/bin/veco'

# ここまで個人で作成したコマンド

#
# Executes commands at the start of an interactive session.
#
# Authors:
#   Sorin Ionescu <sorin.ionescu@gmail.com>
#

# Source Prezto.
if [[ -s "${ZDOTDIR:-$HOME}/.zprezto/init.zsh" ]]; then
  source "${ZDOTDIR:-$HOME}/.zprezto/init.zsh"
fi

# Customize to your needs...
alias trans='trans -b en:ja'
alias transj='trans -b ja:en'
fpath=($HOME/.zsh/anyframe(N-/) $fpath)
autoload -Uz anyframe-init
anyframe-init
bindkey '^xb' anyframe-widget-cdr
bindkey '^x^b' anyframe-widget-checkout-git-branch

bindkey '^xr' anyframe-widget-execute-history
bindkey '^x^r' anyframe-widget-execute-history

bindkey '^xp' anyframe-widget-put-history
bindkey '^x^p' anyframe-widget-put-history

bindkey '^xg' anyframe-widget-cd-ghq-repository
bindkey '^x^g' anyframe-widget-cd-ghq-repository

bindkey '^xk' anyframe-widget-kill
bindkey '^x^k' anyframe-widget-kill

bindkey '^xi' anyframe-widget-insert-git-branch
bindkey '^x^i' anyframe-widget-insert-git-branch

bindkey '^xf' anyframe-widget-insert-filename
bindkey '^x^f' anyframe-widget-insert-filename

function peco-history-selection() {
    BUFFER=$(
        history -n 1 |
            awk '{printf ("%d %s\n",NR,$0)}'|
            sort -k1,1 -r -n |
            sed 's/^[^ ]* //' |
            peco )
    CURSOR=${#BUFFER}
    zle reset-prompt
}

if type peco > /dev/null
then
    zle -N peco-history-selection
    bindkey '^R' peco-history-selection
fi

# UTF-8
export LANG=ja_JP.UTF-8

# COREを作らない
ulimit -c 0

# Emacs ライクな操作を有効にする（文字入力中に Ctrl-F,B でカーソル移動など）
bindkey -e

# autoloadされる関数を検索するパス
fpath=(~/.zfunc $fpath)
fpath=(~/.git_completion $fpath)
fpath=(~/.zsh.d/anyframe(N-/) $fpath)

# zsh plugin
autoload -Uz anyframe-init
anyframe-init

# 履歴の保存先と保存数
HISTFILE=$HOME/.zsh_history
HISTSIZE=100000
SAVEHIST=100000

# 色の設定
local DEFAULT=$'%{^[[m%}'$
local RED=$'%{^[[1;31m%}'$
local GREEN=$'%{^[[1;32m%}'$
local YELLOW=$'%{^[[1;33m%}'$
local BLUE=$'%{^[[1;34m%}'$
local PURPLE=$'%{^[[1;35m%}'$
local LIGHT_BLUE=$'%{^[[1;36m%}'$
local WHITE=$'%{^[[1;37m%}'$

export LSCOLORS=exfxcxdxbxegedabagacad
export LS_COLORS='di=34:ln=35:so=32:pi=33:ex=31:bd=46;34:cd=43;34:su=41;30:sg=46;30:tw=42;30:ow=43;30'

# 自動補完を有効にする
# コマンドの引数やパス名を途中まで入力して <Tab> を押すといい感じに補完してくれる
autoload -U compinit; compinit -u

# 入力したコマンド名が間違っている場合には修正
setopt correct
setopt correct_all
# 入力したコマンドが存在せず、かつディレクトリ名と一致するなら、ディレクトリに cd する
setopt auto_cd
# cd した先のディレクトリをディレクトリスタックに追加する
# ディレクトリスタックとは今までに行ったディレクトリの履歴のこと
setopt auto_pushd
# pushd したとき、ディレクトリがすでにスタックに含まれていればスタックに追加しない
setopt pushd_ignore_dups
# 入力したコマンドがすでにコマンド履歴に含まれる場合、履歴から古いほうのコマンドを削除する
# コマンド履歴とは今まで入力したコマンドの一覧のことで、上下キーでたどれる
setopt hist_ignore_all_dups
# コマンドがスペースで始まる場合、コマンド履歴に追加しない
setopt hist_ignore_space
# 補完キー連打で順に補完候補を自動で補完
setopt auto_menu
# 拡張グロブで補完(~とか^とか。例えばless *.txt~memo.txt ならmemo.txt 以外の *.txt にマッチ)
setopt extended_glob
# Beepを鳴らさない
setopt no_beep
setopt no_list_beep
# 補完候補を詰めて表示
setopt list_packed
# このオプションが有効な状態で、ある変数に絶対パスのディレクトリを設定すると、即座にその変数の名前が
# ディレクトリの名前になり、すぐにプロンプトに設定している'%~'やcdコマンドの'~'での補完に反映されるようになる。
setopt auto_name_dirs
# 補完実行時にスラッシュが末尾に付いたとき、必要に応じてスラッシュを除去する
setopt auto_remove_slash
# 行の末尾がバッククォートでも無視する
setopt sun_keyboard_hack
# 補完候補一覧でファイルの種別を識別マーク表示(ls -F の記号)
setopt list_types
# 補完のときプロンプトの位置を変えない
setopt always_last_prompt
# 変数の単語分割を行う
setopt sh_word_split
# 履歴にタイムスタンプを追加する
setopt extended_history
# Ctrl-s, Ctrl-q によるフロー制御を無効にする
setopt no_flow_control
# 履歴を共有する
setopt share_history
# バックグラウンドジョブが終了したら(プロンプトの表示を待たずに)すぐに知らせる
setopt notify

# <Tab> でパス名の補完候補を表示したあと、
# 続けて <Tab> を押すと候補からパス名を選択できるようになる
# 候補を選ぶには <Tab> か Ctrl-N,B,F,P
zstyle ':completion:*:default' menu select=1
# キャッシュを利用する
zstyle ':completion:*' use-cache true
# 補完から除外するファイル
zstyle ':completion:*:*files' ignored-patterns '*?.o' '*?~' '*\#'
# ファイル補完候補に色を付ける
zstyle ':completion:*' list-colors ${(s.:.)LS_COLORS}
# cd は親ディレクトリからカレントディレクトリを選択しないので表示させないようにする
zstyle ':completion:*:cd:*' ignore-parents parent pwd
# 大文字小文字を区別しない
zstyle ':completion:*' matcher-list 'm:{a-z}={A-Z}'

# 履歴表示
#function __history() {
#  history -E 1
#}
#alias his=__history
alias his=anyframe-widget-execute-history

# ディレクトリスタックに直接移動する
#function __dirs() {
#  if [ -z $1 ]; then
#    dirs -v | perl -pe 's/\t/: /g'
#  else
#    dirs -v | perl -pe 's/\t/: /g' | grep $1
#  fi
#  echo -n "select number: "
#  read newdir
#  [ expr $newdir + 0 > /dev/null 2>&1 ]
#  cd +"$newdir"
#}
#alias cdd=__dirs
alias cdd=anyframe-widget-cdr

# select history
function peco-select-history() {
    local tac
    if which tac > /dev/null; then
        tac="tac"
    else
        tac="tail -r"
    fi
    BUFFER=$(\history -n 1 | \
        eval $tac | \
        peco --query "$LBUFFER")
    CURSOR=$#BUFFER
    zle clear-screen
}
zle -N peco-select-history
bindkey '^r' peco-select-history

# cdr
autoload -Uz is-at-least
if is-at-least 4.3.11
then
  autoload -Uz chpwd_recent_dirs cdr add-zsh-hook
  add-zsh-hook chpwd chpwd_recent_dirs
  zstyle ':chpwd:*'      recent-dirs-max 1000
  zstyle ':chpwd:*'      recent-dirs-default yes
  zstyle ':completion:*' recent-dirs-insert both
fi

# ブランチ名を表示する
function __git_branch() {
  git branch --no-color 2> /dev/null | sed -e '/^[^*]/d' -e 's/* \(.*\)/\:\1/'
}
alias gbn=__git_branch

# Emacsはbrew版をターミナルで利用する
# alias emacs='/usr/local/Cellar/emacs/24.5/bin/emacs -nw'
alias gtags='/usr/local/Cellar/global/6.5.1/bin/gtags'
# alias screen='/usr/local/Cellar/screenutf8/4.3.1/bin/screen -U'

# 色の設定
if [ `uname` = "FreeBSD" ]; then
  alias ls='ls -GF'
  alias ll='ls -alGF'
elif [ `uname` = "Darwin" ]; then
  alias ls='ls -GF'
  alias ll='ls -alGF'
else
  alias ls='ls -F --color=auto'
  alias ll='ls -alF --color=auto'
fi

# プロンプト
setopt prompt_subst
if [ `whoami` = "root" ]; then
  PROMPT='[%F{red}%n@%m%F{default}]# '
else
  PROMPT='[%m$(gbn)]# '
fi
RPROMPT='[%F{green}%d%f%F{default}]'

# スクリーン起動
if [ "$WINDOW" = "" ] ; then
  screen
fi

function preexec() {
  if [ $TERM_PROGRAM = 'iTerm.app' ]; then
    mycmd=(${(s: :)${1}})
    echo -ne "\ek$(hostname|awk 'BEGIN{FS="."}{print $1}'):$mycmd[1]\e\\"
  fi
}
function precmd() {
  if [ $TERM_PROGRAM = 'iTerm.app' ]; then
    echo -ne "\ek$(hostname|awk 'BEGIN{FS="."}{print $1}'):idle\e\\"
  fi
}

peco-mdfind-cd() {
  local FILENAME="$1"

  if [ -z "$FILENAME" ] ; then
    echo "Usage: peco-find-cd <FILENAME>" >&2
    return 1
  fi

  local DIR=$(find ~ -maxdepth 5 -name ${FILENAME} | peco | head -n 1)

  if [ -n "$DIR" ] ; then
    DIR=${DIR%/*}
    echo "pushd \"$DIR\""
    pushd "$DIR"
  fi
}

zmodload zsh/terminfo zsh/system
color_stderr() {
  while sysread std_err_color; do
    syswrite -o 2 "${fg_bold[red]}${std_err_color}${terminfo[sgr0]}"
  done
}
exec 2> >(color_stderr)

# ファイルの読み込みを行うためのfunction
function loadlib() {
        lib=${1:?"You have to specify a library file"}
        if [ -f "$lib" ];then #ファイルの存在を確認
                . "$lib"
        fi
}

loadlib ~/zshfiles/.zsh-local
