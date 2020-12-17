<?php
require('connectdb.php');
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
        <div class="online"><button>立命 太郎</button></div>
        <div class="online"><button>立命 太郎</button></div>
        <div class="offline"><button>立命 太郎</button></div>
    </div>
    
	<div class="box">
		<p>M1</p>
        <div class="online"><button>立命 太郎</button></div>
        <div class="offline"><button>立命 太郎</button></div>
    </div>
    
    <div class="box">
		<p>B4</p>
        <div class="online"><button>立命 太郎</button></div>
        <div class="offline"><button>立命 太郎</button></div>
    </div>
    
    <div class="box">
		<p>B3</p>
        <div class="online"><button>立命 太郎</button></div>
        <div class="offline"><button>立命 太郎</button></div>
    </div>
    
</body>

</html>