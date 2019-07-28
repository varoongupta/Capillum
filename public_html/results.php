<?php
$dbhost = 'mansci-db.uwaterloo.ca';
$dbuser = 'ryuong';
$dbpassword = 'Spring@*%2019';
$dbname = 'ryuong';
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
$array = array(array());

$i = 0;


$sqlLocation = "SELECT LID FROM Customers WHERE CID= ?";
$stmt1 = $mysqli->prepare($sqlLocation);
$CustID = $_GET['CID'];
$stmt1->bind_param('i', $CustID);
$stmt1->execute();
$stmt1->bind_result($Address); 
$stmt1->fetch();
$stmt1->close();



$sql = "SELECT Name, Price, Rating, Time, LID, Barber.BID FROM Barber, Schedule WHERE Schedule.BID=Barber.BID AND Barber.MenCut >= ? AND Barber.CutShave >= ? AND Barber.WomenCut >= ? AND Barber.Colour >= ? AND Schedule.Time = ? AND Schedule.Date= ? AND NOT EXISTS (SELECT*FROM Appointments WHERE Appointments.BID=Schedule.BID AND Appointments.Time=Schedule.Time AND Appointments.Date=Schedule.Date)";
$stmt = $mysqli->prepare($sql);

$MenCut = $_GET['MenCut']; 
$CutShave = $_GET['CutShave']; 
$WomenCut = $_GET['WomenCut']; 
$Colour = $_GET['Colour']; 
$desiredTime = $_GET['Time'];
$desiredDate =  $_GET['Date'];
$stmt->bind_param('iiiiii', $MenCut, $CutShave, $WomenCut, $Colour, $desiredTime, $desiredDate);
$stmt->execute();
$stmt->bind_result($name, $price, $rating, $time, $loc,$BID); 

while ($stmt->fetch()){

    $array[$i][0] = $name;
    $array[$i][1] = $price;
    $array[$i][2] = $rating;
    $array[$i][3] = $time;
    $array[$i][4] = $loc;
    $array[$i][5] = $BID;

    $i = $i + 1;

}
$stmt->close();

$sqlLocation = "SELECT Coord FROM Location WHERE LID= $Address";
$stmt1 = $mysqli->prepare($sqlLocation);
$stmt1->execute();
$stmt1->bind_result($CusCoord); 
$stmt1->fetch();
$stmt1->close();

$sqlLocation = "SELECT Coord FROM Location WHERE LID= $loc";
$stmt1 = $mysqli->prepare($sqlLocation);
$stmt1->execute();
$stmt1->bind_result($BarbCoord); 
$stmt1->fetch();
$stmt1->close();
$mysqli->close(); 
?>



<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome to Management Science Webspace</title>
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
<p class="style2"> Results </p>
<p>
    
</P>

</center>
<p class="style1"></p>
<div style="text-align: center; margin:auto;">
<?php 
    echo "<h3>Name Price Rating Distance Time<h3>";
    
for($x = 0; $x < sizeof($array) ; $x++) {
    $bname = $array[$x][0];
    $price = $array[$x][1];
    $rating = $array[$x][2];
    $time = $array[$x][3];
    $loc = $array[$x][4];
    $BID = $array[$x][5];
    echo $array[$x][0],"  ", $array[$x][1], " ", $array[$x][2] , " ",abs($CusCoord-$BarbCoord)," "," "," ","<a href='booking.php?bname=$bname&price=$price&rating=$rating&time=$time&loc=$loc&date=$desiredDate&MC=$MenCut&CS=$CutShave&WC=$WomenCut&C=$Colour&CusID=$CustID&BarbID=$BID'>". $array[$x][3] ."</a>" ,"<br>";
}
?>

</div>
</body>
