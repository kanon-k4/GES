<?php
# CONNECT

function connectdb(){
    try {

        $db = new PDO(
                'mysql:dbname=ges;host=mysql;charset=utf8mb4', 
                'gesystem', 
                'gesystem', 
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);

        return $db;

    } catch (PDOException $e) {

        // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
        // - もし手抜きしたくない場合は普通にHTMLの表示を継続する
        // - ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        exit($e->getMessage()); 

    }
}

connectdb($db);
header('Content-Type: text/html; charset=utf-8');

?>