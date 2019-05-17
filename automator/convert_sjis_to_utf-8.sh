# SHELL: /bin/bash
# INPUT: stdin
#
# DESCRIPTION
# -----------
#   ファイルの文字エンコードを SJIS から UTF-8 に変換します。Windows で製作された CSV ファイルなどに使えます。

while read
do
	test -f "$REPLY" && iconv -f SJIS -t UTF-8 "$_" > "${_%/*}/utf-8_${_##*/}"
done && afplay "/Applications/iChat.app/Contents/Resources/File Transfer Complete.aiff"
