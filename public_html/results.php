<?php
$dbhost = 'mansci-db.uwaterloo.ca';
$dbuser = 'ryuong';
$dbpassword = 'Spring@*%2019';
$dbname = 'ryuong';
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
$array = array(array());
$i = 0;


$sqlLocation = "SELECT Address FROM Customers WHERE CID= ?";
$stmt1 = $mysqli->prepare($sqlLocation);
$CustID = $_GET['CID'];
$stmt1->bind_param('i', $CustID);
$stmt1->execute();
$stmt1->bind_result($Address); 
$stmt1->fetch();
$stmt1->close();


$sql = "SELECT Name, Price, Rating FROM Barber, Schedule WHERE Schedule.BID=Barber.BID AND Barber.MenCut >= ? AND Barber.CutShave >= ? AND Barber.WomenCut >= ? AND Barber.Colour >= ? AND Shedule.Time >= ? AND Schedule.Date= ?";
$stmt = $mysqli->prepare($sql);

$MenCut = $_GET['MenCut']; 
$CutShave = $_GET['CutShave']; 
$WomenCut = $_GET['WomenCut']; 
$Colour = $_GET['Colour']; 
$desiredTime = $_GET['Time'];
$desiredDate =  $_GET['Date'];
$stmt->bind_param('iiiiii', $MenCut, $CutShave, $WomenCut, $Colour, $desiredTime, $desiredDate);
$stmt->execute();
$stmt->bind_result($name, $price, $rating); 

while ($stmt->fetch()){

    $array[$i][0] = $name;
    $array[$i][1] = $price;
    $array[$i][2] = $rating;

    $i = $i + 1;

}
$stmt->close();


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
<p class="style2">Barber Guy Finder xD</p>
<br>
<p class="style2">Results </p>
<p>
    
</P>

</center>
<p class="style1"></p>
<div style="text-align: center; margin:auto;">
<?php 
for($x = 0; $x < sizeof($array) ; $x++) {
    echo $array[$x][0],"  ", $array[$x][1], "<h2>  ". $array[$x][2] ."</h2><br>";
}
?>

<p><strong> b_name </strong> $price distance rating/5</p>
<br>
<p><strong> b_name </strong> $price distance rating/5</p>
<br>
<p><strong> b_name </strong> $price distance rating/5</p>
<br>
<p><strong> b_name </strong> $price distance rating/5</p>
<br>
<p><strong> b_name </strong> $price distance rating/5</p>
<br>
</div>
<div style="text-align: center;">
    <a href="booking.html"><p class="style1"><strong>Done!</strong></p></a>
</div>
</body>