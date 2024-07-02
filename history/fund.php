<?php
session_start();
include_once('../sms.php');
if($_SESSION['user']!='admin')
{
echo '<script>window.location ="index.php";</script>';
die('PLEASE WAIT');
}
if($_REQUEST['status']!='')
{

}
elseif($_REQUEST['amt']=='')
{
die('INVALID AMOUNT');
}
$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 ?>
    
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

$id= mysqli_real_escape_string($con, $_REQUEST['id']);

$res=mysqli_query($con, "SELECT * FROM user WHERE id='$id'")  or die("Error: ".mysqli_error($dbc));
$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
$upass=$row['password'];
$ubal=$row['bal'];	
$cduser=$row['username'];	

if($_REQUEST['status']!='' AND $_REQUEST['id']!='')
{
$status=$_REQUEST['status'];
$sql="UPDATE user SET `status`='$status' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
  echo "<div>STATUS UPDATE SUCCESSFUL</div>";
  }
   die();
}



if($_REQUEST['status']!='' AND $_REQUEST['txn']!='')
{
$status=$_REQUEST['status'];
if($status!='CREDIT' AND $status!='DEBIT' AND $status!='REFUND')
{
die('INVALID STATUS');
}
$txn= mysqli_real_escape_string($con, $_REQUEST['txn']);
$res=mysqli_query($con, "SELECT * FROM ohtwallet WHERE id='$txn'")  or die("Error: ".mysqli_error($res));
$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
$amount=$row["amt"];
$user=$row["user"];
$st=$row["type"];

if($st=='')
{
die('INVALID TXN');
}

// change status
$sql="UPDATE ohtwallet SET `type`='$status' WHERE id='$txn'";
    if ($conn->query($sql) === TRUE) {}

// fetch details of user
$res=mysqli_query($con, "SELECT * FROM user WHERE username='$user'")  or die("Error: ".mysqli_error($dbc));
$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
$ubal=$row['bal'];

$newamt='';
if($status=='REFUND' AND $st=='DEBIT')
{
$newamt=$amount+$ubal;
}
if($status=='CREDIT' AND $st=='DEBIT')
{
$newamt=$ubal+$amount;
}
if($status=='DEBIT' AND $st=='CREDIT')
{
$newamt=$ubal-$amount;
}
if($status=='DEBIT' AND $st=='REFUND')
{
$newamt=$ubal-$amount;
}

	if($newamt!='')
	{
		// add balance in user ac
		$sql="UPDATE user SET `bal`='$newamt' WHERE username='$user'";
		if ($conn->query($sql) === TRUE) {}
    }
die('SUCESSFUL CHANGE STATUS');
}


$amt=$_REQUEST['amt'];
if($amt=='0')
{
exit('<div>TESTING SERVICES DISABLED</div>');
}

$nbal=$ubal+$amt;
   $sql="UPDATE user SET `bal`='$nbal' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
    
    
    if($amt>'0')
    {
    $type='CREDIT';
    $tr='TRANSFER FROM ADMIN '.$_REQUEST['comm'];
    $sm='Transfer';
    }
    else
    {
    $type='DEBIT';
    $tr='DEDUCTED BY ADMIN '.$_REQUEST['comm'];
    $sm='Deduct';
    $amt=abs($amt);
    }
    $cudate=date('d/m/Y');
    
    $time_now=mktime(date('h')+5,date('i')+30,date('s'));
    $time=date("H:i:s", $time_now);
    $id=date('ymdHis', $time_now);
    $sql="INSERT INTO `ohtwallet` (`id`, `type`, `amt`, `cbal`, `comment`, `date`, `time`, `user`) VALUES ('$id', '$type', '$amt','$nbal', '$tr', '$cudate','$time', '$cduser');";
    		if ($conn->query($sql) === TRUE) {} else {echo "Error: " . $sql . "<br>" . $conn->error;}
   $s="success";
   $sms='HELLO '.$row['name'].',
Harendra Chauhan '.$sm.' Rs. '.$amt.' To Your OHT WALLET your Updated Balance is Rs. '.$nbal;
   $mo=$row['mo'];
echo   esms($mo,$sms,'');




   $url='';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

if($url!='')
{
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch); 
}

if($s=='success')
{
?>
<div><b><p>TRANSACTION SUCCESS</p></b>
<b><?php echo $amt; ?></b> HAS BEEN SUCCESSFULLY ADDED TO <b><?php echo $row['username']; ?></b>.
<p>CURRENT BALANCE IN USER ACCOUNT IS RS:- <b><?php echo $nbal; ?></b></p></div>
<?php
}
?>
