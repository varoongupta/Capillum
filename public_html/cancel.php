<?php


$dbhost = 'mansci-db.uwaterloo.ca';
$dbuser = 'ryuong';
$dbpassword = 'Spring@*%2019';
$dbname = 'ryuong';
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
$sql = "DELETE FROM Appointments WHERE AID=?";
$stmt = $mysqli->prepare($sql);
$AID = $GET_['aid'];
$stmt->bind_param('i',  $AID);
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

<body>
<center>
<p class="style2">Capillum</p>
<br>
<p class="style2">Your Appointment is Cancelled!</p>

</center>
<p class="style1"></p>
<div style="text-align: center;">
<a href="index.html"><p class="style1"><strong>Please Come Again!</strong></p></a>

</div>