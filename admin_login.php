<link rel="stylesheet" href="css/style.css">
<?php
include("config/db.php");

if(isset($_POST['login']))
{

$username=$_POST['username'];
$password=$_POST['password'];

$query="SELECT * FROM admin 
WHERE username='$username' AND password='$password'";

$result=mysqli_query($conn,$query);

if(mysqli_num_rows($result)>0)
{
header("Location:admin_dashboard.php");
}
else
{
echo "Invalid Username or Password";
}

}
?>

<form method="post">

<h2>Admin Login</h2>

<input type="text" name="username" placeholder="Username"><br><br>

<input type="password" name="password" placeholder="Password"><br><br>

<button name="login">Login</button>

</form>