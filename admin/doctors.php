 <link rel="stylesheet" href="../css/style.css">
 <?php
include("../config/db.php");

if(isset($_POST['add']))
{
$name=$_POST['doctor_name'];
$spec=$_POST['specialization'];
$phone=$_POST['phone'];
$avail=$_POST['availability'];

mysqli_query($conn,"INSERT INTO doctors(doctor_name,specialization,phone,availability)
VALUES('$name','$spec','$phone','$avail')");
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];
mysqli_query($conn,"DELETE FROM doctors WHERE doctor_id=$id");
}
?>

<h2>Doctors Management</h2>

<form method="post">

<input type="text" name="doctor_name" placeholder="Doctor Name" required>

<input type="text" name="specialization" placeholder="Specialization">

<input type="text" name="phone" placeholder="Phone">

<select name="availability">
<option>Available</option>
<option>Not Available</option>
</select>

<button name="add">Add Doctor</button>

</form>

<hr>

<table border="1">

<tr>
<th>ID</th>
<th>Name</th>
<th>Specialization</th>
<th>Phone</th>
<th>Availability</th>
<th>Delete</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM doctors");

while($row=mysqli_fetch_assoc($result))
{
echo "<tr>";

echo "<td>".$row['doctor_id']."</td>";
echo "<td>".$row['doctor_name']."</td>";
echo "<td>".$row['specialization']."</td>";
echo "<td>".$row['phone']."</td>";
echo "<td>".$row['availability']."</td>";

echo "<td>
<a onclick='return confirmDelete()' 
href='doctors.php?delete=".$row['doctor_id']."'>Delete</a>
</td>";

echo "</tr>";
}

?>

</table>