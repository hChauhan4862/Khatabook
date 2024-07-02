<?php
include_once('../session.php');
$con = mysqli_connect('localhost', 'hcemr8ri9wai','Hps202132@', 'ohtdb') or die("Oops some thing went wrong");

$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if($_REQUEST['id']=='')
{
exit('ID REQUIRED');
}
$did= mysqli_real_escape_string($con, $_REQUEST['id']);
$res=mysqli_query($con, "SELECT * FROM mobill WHERE id='$did'")  or die("Error: ".mysqli_error($dbc));
$b=mysqli_fetch_array($res, MYSQLI_ASSOC);
$tid=$b["id"];

if($tid=='')
{
die('<div>PLEASE SELECT VALID ID FROM LIST</div>');
}
if($b['billid']!='')
{
//die('ERROR BILL ALREADY CREATED');
}

$bid= file_get_contents("bid.txt");
$n=mt_rand(20,40);
$q2=$bid+ $n;
$q3=file_put_contents("bid.txt",$q2);

$bid=date('y').'-'.$tid.'-'.$bid;
$buyer=$_REQUEST['buyer'];
$badd=$_REQUEST['badd'];
$imei1=$_REQUEST['imei1'];
$imei2=$_REQUEST['imei2'];
$charger=$_REQUEST['charger'];
$battery=$_REQUEST['battery'];
$warranty=$_REQUEST['warranty'];
$pprice=$_REQUEST['price'];
$sdate=date('d/m/Y');


require_once('Googl.class.php');
$googl = new Googl('AIzaSyAMCTyiF-XT9gSy-_k8jXI5NxMXQYqSWho');
$url=$googl->shorten('http://omharitelecom.com/billverify.php?id='.$bid);

$sql="UPDATE mobill SET `status`='OOF',`billid`='$bid',`buyer`='$buyer',`buyeradd`='$badd',`imei1`='$imei1',`imei2`='$imei2',`charger`='$charger',`battery`='$battery',`warantty`='$warranty',`sprice`='$pprice',`sdate`='$sdate',`seller`='$username',`url`='$url' WHERE id='$tid'";
if ($conn->query($sql) === TRUE) {
	echo 'THANKS FOR PURCHASE OUR PRODUCT';
	echo "<script>window.open('bill?id=".$bid."');</script>";
	} 
	else 
	{
	echo "Error: " . $sql . "<br>" . $conn->error;
	}