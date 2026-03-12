<link rel="stylesheet" href="../css/style.css">
 <?php
include("../config/db.php");

if(isset($_POST['add']))
{

$name=$_POST['patient_name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$doctor=$_POST['doctor_id'];

mysqli_query($conn,"INSERT INTO patients(patient_name,gender,age,doctor_id)
VALUES('$name','$gender','$age','$doctor')");
}

if(isset($_GET['delete']))
{
$id=$_GET['delete'];
mysqli_query($conn,"DELETE FROM patients WHERE patient_id=$id");
}

?>

<h2>Patients</h2>

<form method="post">

<input type="text" name="patient_name" placeholder="Patient Name">

<input type="text" name="gender" placeholder="Gender">

<input type="number" name="age" placeholder="Age">

<input type="number" name="doctor_id" placeholder="Doctor ID">

<button name="add">Add Patient</button>

</form>

<hr>

<table border="1">

<tr>
<th>ID</th>
<th>Name</th>
<th>Gender</th>
<th>Age</th>
<th>Doctor ID</th>
<th>Delete</th>
</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM patients");

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['patient_id']."</td>";
echo "<td>".$row['patient_name']."</td>";
echo "<td>".$row['gender']."</td>";
echo "<td>".$row['age']."</td>";
echo "<td>".$row['doctor_id']."</td>";

echo "<td>
<a href='patients.php?delete=".$row['patient_id']."'>Delete</a>
</td>";

echo "</tr>";

}

?>

</table>