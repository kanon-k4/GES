<?php

function sendmailtest(){
    # JP CONFIG
    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    echo "TEST1";

    $to = "is0428ss@ed.ritsumei.ac.jp";
    $subject = "TEST MAIL";
    $message = "Hello!rnThis is TEST MAIL.";
    $headers = "From: test@rcc.ritsumei.ac.jp";
    
    echo "TEST2";

    mb_send_mail($to, $subject, $message, $headers);

    echo "TEST3";
}

?> 
