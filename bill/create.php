<?php
include_once('../sms.php');
session_start();
$con = mysqli_connect('localhost', 'hcemr8ri9wai','Hps202132@', 'ohtdb') or die("Oops some thing went wrong");

$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);} 

$change='';
$req=$_REQUEST['req'];
if($req=='add')
{
//strlen($khata)

	if($_REQUEST['com']=='')
	{
	die('<span style="color:red">INVALID COMPANY<span>');
	}
	elseif($_REQUEST['modal']=='')
	{
	die('<span style="color:red">INVALID MODAL.<span>');
	}
	elseif($_REQUEST['bprice']=='')
	{
	die('<span style="color:red">INVALID BOX PRICE<span>');
	}
	elseif($_REQUEST['pprice']=='')
	{
	die('<span style="color:red">INVALID PRICE TO YOU<span>');
	}
	elseif($_REQUEST['fprice']=='')
	{
	die('<span style="color:red">INVALID FIXED PRICE<span>');
	}
	else
	
	$id= file_get_contents("id.txt");
	$n='1';
	$q2=$id+ $n;
	$q3=file_put_contents("id.txt",$q2);
	
	$adate=date('d/m/Y');
	$com=$_REQUEST['com'];
	$modal=$_REQUEST['modal'];
	$bprice=$_REQUEST['bprice'];
	$pprice=$_REQUEST['pprice'];
	$fprice=$_REQUEST['fprice'];
	//$date= date('d/m/Y', strtotime($ddate));
	
$sql="INSERT INTO `ohtdb`.`mobill` (`id`, `com`, `modal`, `bprice`, `pprice`, `fprice`, `status`, `sprice`, `billid`, `adate`, `sdate`, `seller`, `buyer`, `buyeradd`, `imei1`, `imei2`, `charger`, `battery`, `warantty`, `url`) VALUES ('$id', '$com', '$modal', '$bprice', '$pprice', '$fprice', 'AVAILBLE', '', '', '$adate', '', '', '', '', '', '', '', '', '', '');";
	$change='<span style="color:blue">'.$com.' '.$modal.' SUCCESSFULLY ENTERED (id= '.$id.')</span>';
}
else
{
die('INVALID REQUEST');
}

if($sql!='')
{
	if ($conn->query($sql) === TRUE) {
	echo $change;
	} 
	else 
	{
	echo "Error: " . $sql . "<br>" . $conn->error;
	die('<span style="color:red">SOMETHING WENT WRONG.<span>');
	}
}

?>