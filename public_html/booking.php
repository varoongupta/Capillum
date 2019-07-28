<?php
$aname=$_GET['bname'];
$aprice=$_GET['price'];
$atime=$_GET['time'];
$adate=$_GET['date'];
$aCustID=$_GET['CusID'];
$aBID=$_GET['BarbID'];

$dbhost = 'mansci-db.uwaterloo.ca';
$dbuser = 'ryuong';
$dbpassword = 'Spring@*%2019';
$dbname = 'ryuong';
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);


$sql = "SELECT Name FROM Location Where LID = ?";
$stmt = $mysqli->prepare($sql);
$LocID = $_GET['loc']; 
$stmt->bind_param('i', $LocID);
$stmt->execute();
$stmt->bind_result($name); 
$stmt->fetch();
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

<body style="text-align: center;">
<center>
<p class="style2">Capillum</p>
<br>
<p class="style2">Your Booking</p>

</center>
<p class="style1"></p>
<div style="text-align: left; margin-left: 30%;">
<form>
  <p><strong>Barber Name: <?php echo $_GET['bname']; ?></strong></p>

  <p><strong>Date: <?php echo $_GET['date']; ?></strong></p>

  <p><strong>Time: <?php echo $_GET['time'],":00"; if($_GET['time']>8){ echo " AM";} else{ echo " PM";} ?></strong></p>

  <p><strong>Location: <?php echo $name ?> </strong></p>

  <p><strong>Services: </strong></p>
    <?php
    $p1=0;
    $p2=0;
    $p3=0;
    $p4=0;  
    if($_GET['MC']==1){
      $dbhost = 'mansci-db.uwaterloo.ca';
      $dbuser = 'ryuong';
      $dbpassword = 'Spring@*%2019';
      $dbname = 'ryuong';
      $mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
      $sql1 = "SELECT Price FROM Service Where SID = ?";
      $stmt1 = $mysqli->prepare($sql1);
      $SID=1;
      $stmt1->bind_param('i', $SID);
      $stmt1->execute();
      $stmt1->bind_result($price); 
      $stmt1->fetch();
      echo "Mens Cut $";
      echo $price, "<br>";
      $p1=$price;
      $stmt1->close();
    }
    if($_GET['CS']==1){
      $dbhost = 'mansci-db.uwaterloo.ca';
      $dbuser = 'ryuong';
      $dbpassword = 'Spring@*%2019';
      $dbname = 'ryuong';
      $mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
      $sql1 = "SELECT Price FROM Service Where SID = ?";
      $stmt1 = $mysqli->prepare($sql1);
      $SID=2;
      $stmt1->bind_param('i', $SID);
      $stmt1->execute();
      $stmt1->bind_result($price); 
      $stmt1->fetch();
      echo "Cut & Shave $";
      echo $price, "<br>";
      $p2=$price;
      $stmt1->close();
      
      
    }
    if($_GET['WC']==1){
      $dbhost = 'mansci-db.uwaterloo.ca';
      $dbuser = 'ryuong';
      $dbpassword = 'Spring@*%2019';
      $dbname = 'ryuong';
      $mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
      $sql1 = "SELECT Price FROM Service Where SID = ?";
      $stmt1 = $mysqli->prepare($sql1);
      $SID=3;
      $stmt1->bind_param('i', $SID);
      $stmt1->execute();
      $stmt1->bind_result($price); 
      $stmt1->fetch();
      echo "Womens Cut $";
      echo $price, "<br>";
      $stmt1->close();
      $p3=$price;
      
      
    }
    if($_GET['C']==1){
      $dbhost = 'mansci-db.uwaterloo.ca';
      $dbuser = 'ryuong';
      $dbpassword = 'Spring@*%2019';
      $dbname = 'ryuong';
      $mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
      $sql1 = "SELECT Price FROM Service Where SID = ?";
      $stmt1 = $mysqli->prepare($sql1);
      $SID=4;
      $stmt1->bind_param('i', $SID);
      $stmt1->execute();
      $stmt1->bind_result($price); 
      $stmt1->fetch();
      echo "Colour $";
      echo $price, "<br>";
      $stmt1->close();
      $p4=$price;
      
      
    }
      
    ?>
  

  <p><strong>Price: <?php echo "$",$_GET['price']*($p1+$p2+$p3+$p4); ?></strong></p>
</form>
</div>


<?php 
echo "<a href='confirmation.php?
n=$aname
&p=$aprice
&t=$atime
&d=$adate
&C=$aCustID
&B=$aBID'>Confirm</a>";
?>

</body>

