<?php
$dbhost = 'mansci-db.uwaterloo.ca';
$dbuser = 'ryuong';
$dbpassword = 'Spring@*%2019';
$dbname = 'ryuong';
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
$array = array(array());
$i = 0;

$sql = "SELECT COUNT(Barber.BID), Name FROM Barber LEFT JOIN Schedule ON Barber.BID = Schedule.BID GROUP BY Name HAVING COUNT(Barber.BID) > 8";
$stmt = $mysqli->prepare($sql);

$stmt->execute();
$stmt->bind_result($count, $name); 

while ($stmt->fetch()){

    $array[$i][0] = $name;
    $array[$i][1] = $count;

    $i = $i + 1;

}
$stmt->close();


$mysqli->close(); 
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
<p class="style2">Results </p>
<p>
    
</P>

</center>
<p class="style1"></p>
<div style="text-align: center; margin:auto;">
<?php 
    echo "<h2>Name Activity <h2>";
for($x = 0; $x < sizeof($array) ; $x++) {
    $bname = $array[$x][0];
    $price = $array[$x][1];
    $rating = $array[$x][2];
    $time = $array[$x][3];
    $loc = $array[$x][4];
    $BID = $array[$x][5];
    echo "<p3>". $array[$x][0],"  ", $array[$x][1], " ", $array[$x][2] , " ","<a href='booking.php?bname=$bname&price=$price&rating=$rating&time=$time&loc=$loc&date=$desiredDate&MC=$MenCut&CS=$CutShave&WC=$WomenCut&C=$Colour&CusID=$CustID&BarbID=$BID'>". $array[$x][3] ."</a>" ,"<br>" ."</p3>";
}
?>

</div>
</body>
