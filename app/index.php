<?php
try {
    # CONNECT DB
    require('connectdb.php');
    $db = connectdb();

    # GET POST DATA
    $studentid = $_POST["name"];
    if(!empty($studentid)){
        # POST ACTION
        require('updatestatus.php');
        updatestatus($studentid);
    }

    # GET INROOM STATUS
    ## Show M2 Member
    $m2 = $db->query('SELECT inroom, studentid, name FROM user WHERE grade = "M2"');	
    while($row = $m2->fetch()){
        $rows_m2[] = $row;
    }

    ## Show M1 Member
    $m1 = $db->query('SELECT inroom, studentid, name FROM user WHERE grade = "M1"');	
    while($row = $m1->fetch()){
        $rows_m1[] = $row;
    }

    ## Show B4 Member
    $b4 = $db->query('SELECT inroom, studentid, name FROM user WHERE grade = "B4"');	
    while($row = $b4->fetch()){
        $rows_b4[] = $row;
    }

    ## Show B3 Member
    $b3 = $db->query('SELECT inroom, studentid, name FROM user WHERE grade = "B3"');	
    while($row = $b3->fetch()){
        $rows_b3[] = $row;
    }
    
} catch(PDOException $e) {
	echo $e->getMessage();
	die();
}

?>

<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale1">
	<link rel="stylesheet" href="style.css"/>
	<script language="JavaScript" src="script.js" type="text/javascript"></script>
    <title>GinLab Entrance System</title>
</head>



<body>
	<header>
		<div class="siteheader">
				<p class="title">GinLab Entrance System</p>
				<div class="date">
					<p id="day">Now&nbsp;</p>
					<p id="clock">Loading...</p>
				</div>
		</div>
	</header>

	<div class="box">
        <p>M2</p>
        <?php 
        if($rows_m2!=null)foreach($rows_m2 as $row){
        ?> 
            <div class="<?php if($row['inroom']==0){echo 'offline';} else {echo 'online';} ?>"> <button onclick="ChangeStatus(<?php echo htmlspecialchars($row['studentid'],ENT_QUOTES,'UTF-8'); ?>)"><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></button></div>
        <?php 
        } 
        ?>
    </div>
    
	<div class="box">
		<p>M1</p>
        <?php 
        if($rows_m1!=null)foreach($rows_m1 as $row){
        ?> 
            <div class="<?php if($row['inroom']==0){echo 'offline';} else {echo 'online';} ?>"> <button onclick="ChangeStatus(<?php echo htmlspecialchars($row['studentid'],ENT_QUOTES,'UTF-8'); ?>)"><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></button></div>
        <?php 
        } 
        ?>
    </div>
    
    <div class="box">
		<p>B4</p>
        <?php 
        if($rows_b4!=null)foreach($rows_b4 as $row){
        ?> 
            <div class="<?php if($row['inroom']==0){echo 'offline';} else {echo 'online';} ?>"> <button onclick="ChangeStatus(<?php echo htmlspecialchars($row['studentid'],ENT_QUOTES,'UTF-8'); ?>)"><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></button></div>
        <?php 
        } 
        ?>
    </div>
    
    <div class="box">
		<p>B3</p>
        <?php 
        if($rows_b3!=null)foreach($rows_b3 as $row){
        ?> 
            <div class="<?php if($row['inroom']==0){echo 'offline';} else {echo 'online';} ?>"> <button onclick="ChangeStatus(<?php echo htmlspecialchars($row['studentid'],ENT_QUOTES,'UTF-8'); ?>)"><?php echo htmlspecialchars($row['name'],ENT_QUOTES,'UTF-8'); ?></button></div>
        <?php 
        } 
        ?>
    </div>
    
</body>

</html>