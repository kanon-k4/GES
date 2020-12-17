<?php
# CONNECT

function connectdb(){
    try {

        $pdo = new PDO(
                'mysql:dbname=mysql;host=mysql;charset=utf8mb4', 
                'root', 
                'root', 
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);

    } catch (PDOException $e) {

        // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
        // - もし手抜きしたくない場合は普通にHTMLの表示を継続する
        // - ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        exit($e->getMessage()); 

    }
}

connectdb();
header('Content-Type: text/html; charset=utf-8');

?>