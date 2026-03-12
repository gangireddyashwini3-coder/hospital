<link rel="stylesheet" href="../css/style.css">
<?php
include("../config/db.php");

if(isset($_POST['add']))
{

$room=$_POST['room_number'];
$type=$_POST['room_type'];
$status=$_POST['status'];
$cost=$_POST['cost'];

mysqli_query($conn,"INSERT INTO rooms(room_number,room_type,status,cost)
VALUES('$room','$type','$status','$cost')");

}

?>

<h2>Rooms</h2>

<form method="post">

<input type="number" name="room_number" placeholder="Room Number">

<input type="text" name="room_type" placeholder="Room Type">

<select name="status">

<option>Available</option>
<option>Occupied</option>

</select>

<input type="number" name="cost" placeholder="Cost">

<button name="add">Add Room</button>

</form>