<?php
// PHPMailer のクラスをグローバル名前空間（global namespace）にインポート
// スクリプトの先頭で宣言する必要があります
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// PHPMailer のソースファイルの読み込み（ファイルの位置によりパスを適宜変更）
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendmail($name, $to_address, $time, $enter){    
    require 'setting.php';
    
    //言語、内部エンコーディングを指定
    mb_language("japanese");
    mb_internal_encoding("UTF-8");
    
    // インスタンスを生成（引数に true を指定して例外 Exception を有効に）
    $mail = new PHPMailer(true);
    
    //日本語用設定
    $mail->CharSet = "iso-2022-jp";
    $mail->Encoding = "7bit";
        
    try {
        // X-Mailerを変更
        $mail->XMailer = $system_name;

        //サーバの設定
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;  // デバグの出力を有効に（テスト環境での検証用）
        $mail->isSMTP();   // SMTP を使用
        $mail->Host       = $smtp_server;  // SMTP サーバーを指定
        $mail->Port       = 25;  // TCP ポートを指定
        
        //受信者設定 
        //※名前などに日本語を使う場合は文字エンコーディングを変換
        //差出人アドレス, 差出人名
        $mail->setFrom($from_address, mb_encode_mimeheader($system_name));  
        //受信者アドレス, 受信者名（受信者名はオプション）
        $mail->addAddress($notice_address); 
        //返信用アドレス（差出人以外に別途指定する場合）
        $mail->addReplyTo($to_address, mb_encode_mimeheader($name)); 
        //Cc 受信者の指定
        $mail->addCC($to_address, mb_encode_mimeheader($name)); 
        
        //コンテンツ設定
        $mail->isHTML(false);   // HTML形式を指定
        //メール表題（文字エンコーディングを変換）
        $mail->Subject = mb_encode_mimeheader('研究室入退室連絡'); 

        //HTML形式の本文（文字エンコーディングを変換）
        $body  = "【研究室入退室連絡】\n";
        $body .= $name;
        $body .= "が";
        $body .= $time;
        if($enter){
            $body .= "に入室しました。";
        }else{
            $body .= "に退室しました。";
        }
        $mail->Body  = mb_convert_encoding($body,"JIS","UTF-8");   
        
        //送信
        $mail->send();  
    } catch (Exception $e) {
        //エラー（例外：Exception）が発生した場合
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?> 
