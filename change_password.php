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
if($_REQUEST['t']=='admin')
{
$uname= mysqli_real_escape_string($con, $_REQUEST['id']);
$uname="`id`='$uname'";
}
else
{
$uname= mysqli_real_escape_string($con, $_SESSION['user']);
$uname="`username`='$uname'";
}
	$res=mysqli_query($con, "SELECT * FROM user WHERE $uname")  or die("Error: ".mysqli_error($dbc));
	$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
	$upass=$row['password'];
	$ubal=$row['bal'];	
	$p=$_REQUEST['cpass'];
	$np=$_REQUEST['newpass'];
		if(md5($p)!=md5($upass))
		{
		die('INVALID OLD PASSWORD');
		}
		if(md5($np)==md5($p))
		{
		die('OLD AND NEW PASSWORD CAN NOT BE SAME');
		}
		
$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="UPDATE user SET `password`='$np' WHERE $uname";
    if ($conn->query($sql) === TRUE) {
   echo "<div>PASSWORD CHANGE SUCCESS FOR USER:- ".$row['username']."</div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>