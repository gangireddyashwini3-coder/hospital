<?php
include("../config/db.php");
?>

<!DOCTYPE html>
<html>

<head>

<title>Doctor Availability</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<h1>Doctor Availability</h1>

<div class="container">

<?php

$result=mysqli_query($conn,"SELECT * FROM doctors");

while($row=mysqli_fetch_assoc($result))
{

$statusClass = ($row['availability']=="Available") ? "available" : "notavailable";

echo "<div class='card'>";

echo "<h2>".$row['doctor_name']."</h2>";

echo "<p class='info'><b>Specialization:</b> ".$row['specialization']."</p>";

echo "<p class='info'><b>Phone:</b> ".$row['phone']."</p>";

echo "<p class='info'><b>Status:</b> 
<span class='$statusClass'>".$row['availability']."</span></p>";

echo "</div>";

}

?>

</div>

</body>
</html>