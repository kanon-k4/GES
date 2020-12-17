<?php

function updatestatus($studentid){
    # CONNECT DB
    $db = connectdb();

    # GET DATETIME
    date_default_timezone_set('Asia/Tokyo');
    $date = date("Y-m-d H:i:s");

    # GET NOW STATUS
    $user_status = $db->prepare('SELECT * FROM user WHERE studentid = :studentid');
    $user_status->execute(array(':studentid' => $studentid));
    while($row = $user_status->fetch()){
        $rows_user[] = $row;
    }

    # UPDATE STATUS
    if($rows_user[0]['inroom'] == FALSE){
        # 入室処理
        ## USER STATUS UPDATE
        $stmt = $db->prepare('UPDATE user SET inroom = TRUE WHERE studentid = :studentid');
        $stmt->execute(array(':studentid' => $studentid));
        ## ADD LOG
        $stmt = $db->prepare('INSERT INTO enterlog(date,studentid,enter) VALUES (:date,:studentid,:enter);');
        $stmt->execute(array(':date' => $date, ':studentid' => $studentid, ':enter' => '1'));
        ## SEND MAIL
        require('sendmail.php');
        sendmailtest();

    }else{
        # 退室処理
        $stmt = $db->prepare('UPDATE user SET inroom = FALSE WHERE studentid = :studentid');
        $stmt->execute(array(':studentid' => $studentid));
        ## ADD LOG
        $stmt = $db->prepare('INSERT INTO enterlog(date,studentid,enter) VALUES (:date,:studentid,:enter);');
        $stmt->execute(array(':date' => $date, ':studentid' => $studentid, ':enter' => '0'));
    }
}

?>