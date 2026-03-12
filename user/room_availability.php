<?php
include("../config/db.php");
?>

<!DOCTYPE html>
<html>

<head>

<title>Room Availability</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<h1>Available Rooms</h1>

<div class="container">

<table class="room-table">

<tr>
<th>Room Number</th>
<th>Room Type</th>
<th>Status</th>
<th>Cost</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM rooms WHERE status='Available'");

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['room_number']."</td>";

echo "<td>".$row['room_type']."</td>";

echo "<td><span class='available'>".$row['status']."</span></td>";

echo "<td>₹".$row['cost']."</td>";

echo "</tr>";

}

?>

</table>

</div>

</body>
</html>