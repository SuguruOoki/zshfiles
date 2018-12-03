<?php

class UploadFile
{

    const UPLOAD_TMP_DIRECTORY = '../data/';
    /**
     * エラーメッセージを保存するプロパティ
     *
     * @var array エラーメッセージを保存するプロパティ
     */
    private static $error_messages = array();

    /**
     * バリデーションをまとめるメソッド。
     * note:本来はバリデーション用にクラスを着るべきだが、
     * そこまでの範囲でもないので、ここでまとめている。
     * 大きくなってきたら別クラスとして切り出して
     * 利用することを推奨する。
     */
    public function validation($file_path)
    {
        self::isSelectedFile($file_path);
        self::isCsvFile($file_path);
        self::isMovedFile($file_path);
        self::changeMode($file_path);

        if (count(self::$error_messages) !== 0) {
            return false;
        }

        return true;
    }

    /**
     * アップロードされるファイルが洗濯済みかどうかを判定するメソッド。
     *
     * @param object $file アップロードされるファイルの一時保存先
     * @return bool 選択済みの場合、true、そうでない場合はfalseを返す
     */
    public static function isSelectedFile($file) {
        if (!is_uploaded_file($file)) {
            self::setErrorMessage('ファイルが選択されていません。');
            return false;
        }
        return true;
    }

    /**
     * ファイルがCSVファイルかどうかを判定するメソッド。
     *
     * @param string $file ファイル名を示す文字列
     * @return ファイルがcsvであれば、true、そうでなければ、falseを返す
     */
    public static function isCsvFile($file) {
        //拡張子を判定
        if (pathinfo($file_name, PATHINFO_EXTENSION) !== 'csv') {
            self::setErrorMessage('CSVファイルのみ対応しています。');
            return false;
        }

        return true;
    }

    /**
     * ファイルをアップロードする前に一時フォルダに移動させて
     * セキュリティを担保するためのメソッド。
     *
     * @param string $uploaded_file_path アップロードしたファイルのパスを示す文字列
     * @param string $move_destination   有効なアップロードファイルである場合、移動する先のファイルパスを示す文字列
     * @return ファイルの移動に成功した場合、true、失敗した場合はfalseを返す
     */
    public static function isMovedFile($uploaded_file_path) {
        //ファイルを$move_destinationディレクトリに移動
        // move_uploaded_fileは有効なファイルではあるが、
        // 何らかの理由により移動できない場合、falseを返すという
        // 仕様があるが、加えて警告を出すという仕様があるため、
        // その対応をするとさらに良い
        if(!move_uploaded_file($uploaded_file_name, self::UPLOAD_TMP_DIRECTORY)) {
            self::setErrorMessage('ファイルをアップロードできません。');
            return false;
        }

        return true;
    }

    /**
     * ファイルのアップロードの前に権限を変更し、
     * 一時ファイルを削除できるようにしておくために
     * 用いるメソッド。
     *
     * @param string $file_path アップロードファイルを一時保存するパス
     * @param int    $mode      chmodコマンドを利用する際に指定する数値。8進数で指定する
     * @return bool chmodコマンドが成功した場合、true、そうでなかった場合、falseを返す
     */
    public static function changeMode($file_path, $mode = 0644) {
        // $file_path = "../../data/uploaded/" . $file_name;
        return chmod($file_path, $mode);
    }

    /**
     * CSVファイルのコンテンツ自体を配列に変換して返すメソッド。
     *
     * @param string $file_path ファイルのパスを示す文字列
     * @return ファイルの内容を配列に変換した値を返す
     */
    public static function convertCSVFileToArray($file_path) {
        $csv_contents = array();
        $file = new SplFileObject($filepath);
        $file->setFlags(SplFileObject::READ_CSV);

        foreach ($file as $line) {
            //終端の空行を除く処理:空行の場合に取れる値は後述
            if (is_null($line[0])) {
                $csv_contents[] = $line;
            }
        }

        return $csv_contents;
    }

    /**
     * エラーメッセージを取得するメソッド。
     *
     * @return array error_messges このクラスのプロパティとして保存されたエラーメッセージ群。
     */
    public static function getErrorMessages()
    {
       return self::$error_messages;
    }

    /**
     * エラーメッセージをセットするメソッド。
     *
     * @return string message プロパティにセットするエラーメッセージを示す文字列の値
     */
    public static function setErrorMessage($message)
    {
       self::$error_messages[] = $message;
    }
}


// エラーメッセージを
$file_tmp_name = $_FILES['fl']['tmp_name'];
$file_name     = $_FILES['fl']['name'];
UploadFile::validation();
//後で削除できるように権限を644に
$msg = $file_name . 'をアップロードしました。';
$file = '../../data/uploaded/'.$file_name;
//ファイルの削除
unlink('../../data/uploaded/'.$file_name);


$_FILES["fl"]["tmp_name"];

