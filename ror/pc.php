<?php
session_start();
$mysql_hostname = "localhost";
$mysql_user = "hcemr8ri9wai";
$mysql_password = 'Hps202132@';
$mysql_database = "ohtdb";
$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or die("Oops some thing went wrong");

$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$txn=$_REQUEST['id'];
$sql = "SELECT pc FROM ror WHERE txn= $txn";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $count=$row["pc"];
    }
} 

$ntxn=$count+1;
$name=$_REQUEST['name'];
$ror=$_REQUEST['ror'];

$sql="UPDATE ror SET `pc`='$ntxn', `name`='$name', `rorid`='$ror' WHERE txn='$txn'";
    if ($conn->query($sql) === TRUE) {} else {echo "Error: " . $sql . "<br>" . $conn->error;}






$uname= mysqli_real_escape_string($con, $_SESSION['user']);
	$res=mysqli_query($con, "SELECT * FROM user WHERE username='$uname'")  or die("Error: ".mysqli_error($dbc));
	$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
	$upass=$row['password'];
	$ubal=$row['bal'];	
	$upay=$row['pay'];
	$cduser=$row['username'];


    $ntxn=$ubal-15;
    $npay=$upay+15;
    $type='DEBIT';
    $tr='DEDUCT FOR ROR ID: '.$txn;
    $cudate=date('d/m/Y');
    $time_now=mktime(date('h')+5,date('i')+30,date('s'));
    $time=date("H:i:s", $time_now);
    $id=date('ymdHis', $time_now);
$sql="INSERT INTO `ohtwallet` (`id`, `type`, `amt`,`cbal`, `comment`, `date`, `time`, `user`) VALUES ('$id', '$type', '15', '$ntxn', '$tr', '$cudate','$time', '$cduser');";
    		if ($conn->query($sql) === TRUE) {} else {echo "Error: " . $sql . "<br>" . $conn->error;}
    		
    		
   $sql="UPDATE user SET `bal`='$ntxn',`pay`='$npay' WHERE username='$uname'";
    if ($conn->query($sql) === TRUE) {
   echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>