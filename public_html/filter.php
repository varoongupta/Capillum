
<?php
$dbhost = 'mansci-db.uwaterloo.ca';
$dbuser = 'ryuong';
$dbpassword = 'Spring@*%2019';
$dbname = 'ryuong';
$mysqli = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);

$sql = "SELECT Name FROM Customers WHERE CID = ?";

$stmt = $mysqli->prepare($sql);

$search = $_GET['user']; 
$stmt->bind_param('i', $search); 
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

<body>
<center>
<p class="style2">Barber Guy Finder xD</p>
<p class="style2">Welcome Back <?php echo $name; ?></p>
<p></p>


<br>
<p class="style2">Filter</p>

</center>
<p class="style1"></p>
<div style="text-align: left; margin-left: 30%;">
<form action="results.php" method="GET">
  <input type="hidden" name="CID" value="<?php echo $search; ?>">
  <p><strong>Time:</strong></p>
    <select name="Time">
      <option value="9">9:00 AM</option>
      <option value="10">10:00 AM</option>
      <option value="11">11:00 AM</option>
      <option value="12">12:00 AM</option>
      <option value="13">1:00 PM</option>
      <option value="14">2:00 PM</option>
      <option value="15">3:00 PM</option>
      <option value="16">4:00 PM</option>
      <option value="17">5:00 PM</option>
    </select>
  <p><strong>Date:</strong></p>
    <select name="Date">
      <option value="26">July 26</option>
      <option value="27">July 27</option>
      <option value="28">July 28</option>
    </select>
  <p><strong>Max Distance:</strong></p>
    <input type="text" name = "maxDistance">
  <p><strong>Max Price:</strong></p>
    <input type="text" name = "maxPrice">
  <p><strong>Mens Cut:</strong></p>
  <select name="MenCut">
    <option value="0">---</option>
    <option value="1">Yes</option>
  </select>
  <p><strong>Cut & Shave:</strong></p>
  <select name="CutShave">
    <option value="0">---</option>
    <option value="1">Yes</option>
  </select>
  <p><strong>Womens Cut:</strong></p>
  <select name="WomenCut">
    <option value="0">---</option>
    <option value="1">Yes</option>
  </select>
  <p><strong>Colour:</strong></p>
  <select name="Colour">
    <option value="0">---</option>
    <option value="1">Yes</option>
  </select>
  <br>
  <br>
  <input type="submit"></input>
</form>
</div>
</body>


