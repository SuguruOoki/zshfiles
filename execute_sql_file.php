<?php


class ExecuteSql
{
    function execSql($dsn, $user, $password, $sql_file) {
        $db = new PDO($dsn, $user, $password);
        $sql = file_get_contents();
        $db = $dbh->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
        $db->execute();
        $result = $sth->fetchAll();
        // これを出力させると良い。
        echo $result;
    }
}

$dsn='mysql:dbname=ne_user1;host=192.168.56.3';
$user='next-engine';
$password='';
$sql_file='~/zshfiles/exec_sql_file.sql';

$exec = new ExecuteSql();
$exec->execSql($dsn, $user, $password, $sql_file);
