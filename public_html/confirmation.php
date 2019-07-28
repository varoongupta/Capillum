<?php


$dbhost = 'mansci-db.uwaterloo.ca';
$dbuser = 'ryuong';
$dbpassword = 'Spring@*%2019';
$dbname = 'ryuong';
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
$sql = "INSERT INTO Appointments(CID,BID,TIME,Date,PRICE) VALUES(?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);
$CID=$_GET['C'];
$BID=$_GET['B'];
$Time=$_GET['t'];
$Price=$_GET['p'];
$Date=$_GET['d'];
$stmt->bind_param('iiiii',  $CID, $BID, $Time, $Price, $Date);
$stmt->execute();
$stmt->close();
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style type="text/css">
<!--
.style1 {font-family: Arial, Helvetica, sans-serif}
.style2 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
-->
</style>
</head>

<body style="text-align: center;">
<center>
<p class="style2">Capillum</p>
<br>
<p class="style2">Confirmed!</p>

</center>
<p class="style1"></p>
<div style="text-align: center;">
<a href="index.html"><p class="style1"><strong>See you at your appointment!</strong></p></a>

</div>

<a href='cancel.php?AID=1'>If you would like to cancel your appointment click here!</a>

</body>

</html>
