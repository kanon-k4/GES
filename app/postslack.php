<?php

function postslack($name, $time, $enter){    
    require 'setting.php';
    
    $authdata = "Authorization: Bearer ";
    $authdata .= $slack_token;

    $headers = [
        $authdata,
        'Content-Type: application/json;charset=utf-8'
    ];
    
    $url = "https://slack.com/api/chat.postMessage"; 
    
    $text  = "【研究室入退室連絡】\n";
    $text .= $name;
    $text .= "が";
    $text .= $time;
    if($enter){
        $text .= "に入室しました。";
    }else{
        $text .= "に退室しました。";
    }

    $post_fields = [
        "channel" => $slack_channel,
        "text" => $text,
    ];
    
    $options = [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($post_fields) 
    ];
    
    $ch = curl_init();
    
    curl_setopt_array($ch, $options);
    
    $result = curl_exec($ch); 
    
    curl_close($ch);
}
?> 
