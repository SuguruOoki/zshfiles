function convert_character_code() {
  for i in `ls`
  do
    echo $i | sed 's/\*$//' | xargs nkf --guess
  done
}

