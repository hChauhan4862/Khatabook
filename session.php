<?php
session_start();
$mysql_hostname = "localhost";
$mysql_user = "hcemr8ri9wai";
$mysql_password = 'Hps202132@';
$mysql_database = "ohtdb";

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) 

or die("Oops some thing went wrong");

?>
<?php
$uname= mysqli_real_escape_string($con, $_SESSION['user']);
	$res=mysqli_query($con, "SELECT * FROM user WHERE username='$uname'")  or die("Error: ".mysqli_error($dbc));
	$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
	$upass=$row['password'];
	$ubal=$row['bal'];	
	$uid=$row['id'];
	$name=$row['name'];
	$username=$row['name'];
	$umo=$row['mo'];
	$uemail=$row['email'];
	$upass=$row['password'];
	$utype=$row['type'];
	$upay=$row['pay'];
	if($_REQUEST['req']=='bal')
	{
	echo $ubal;
	}
	if($_REQUEST['req']=='pay')
	{
	echo $upay;
	}

?>