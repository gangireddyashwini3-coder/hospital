<link rel="stylesheet" href="../css/style.css">
<?php
include("../config/db.php");

$billData = null;

if(isset($_POST['generate']))
{
$patient_id=$_POST['patient_id'];
$consult=$_POST['consultation_fee'];
$medicine=$_POST['medicine_cost'];
$room=$_POST['room_cost'];

$total=$consult+$medicine+$room;

mysqli_query($conn,"INSERT INTO bills(patient_id,consultation_fee,medicine_cost,room_cost,amount,status)
VALUES('$patient_id','$consult','$medicine','$room','$total','Paid')");

$billData = [
"patient"=>$patient_id,
"consult"=>$consult,
"medicine"=>$medicine,
"room"=>$room,
"total"=>$total
];
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Generate Bill</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<h1>Generate Patient Bill</h1>

<form method="post">

<input type="number" name="patient_id" placeholder="Patient ID" required>

<input type="number" name="consultation_fee" placeholder="Consultation Fee" required>

<input type="number" name="medicine_cost" placeholder="Medicine Cost" required>

<input type="number" name="room_cost" placeholder="Room Cost" required>

<button name="generate">Generate Bill</button>

</form>

<?php
if($billData!=null)
{
?>

<div style="width:400px;margin:auto;background:white;padding:20px;margin-top:30px;border-radius:10px;box-shadow:0px 0px 10px gray;">

<h2>Hospital Bill</h2>

<p><b>Patient ID:</b> <?php echo $billData['patient']; ?></p>

<p>Consultation Fee: ₹<?php echo $billData['consult']; ?></p>

<p>Medicine Cost: ₹<?php echo $billData['medicine']; ?></p>

<p>Room Cost: ₹<?php echo $billData['room']; ?></p>

<hr>

<h3>Total Amount: ₹<?php echo $billData['total']; ?></h3>

</div>

<?php
}
?>

</body>
</html>