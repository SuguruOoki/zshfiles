cd ~/zshfiles;
ln -s ~/zshfiles/.zshrc ~/.zshrc;
ln -s ~/zshfiles/.tmux.conf ~/.tmux.conf;
touch .zsh-local
ln -s ~/zshfiles/.zsh-local ~/.zsh-local

/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
brew file install Brewfile

# atomを先にinstallしておくと当たり障りない。
rm -rf ~/.atom
ln -nfs ~/zshfiles/.atom ~/.atom

# 権限を与える系

chmod +x ~/zshfiles/code_analysis/cyclic_complexity.sh
