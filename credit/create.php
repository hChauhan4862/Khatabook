<?php
include_once('../sms.php');
session_start();
$con = mysqli_connect('localhost', 'hcemr8ri9wai','Hps202132@', 'ohtdb') or die("Oops some thing went wrong");

$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$change='';
$req=$_REQUEST['req'];
if($req=='sms')
{
	$sms=$_REQUEST['value'];
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date= date("d/m/Y H:i:sa", $time_now);;
	$sql="UPDATE creadit SET `smsdate`='$date' WHERE id='$did'";
	echo sms($row["mo"],$sms,'');
	$change='SMS SENT TO CUSTOMER
'.$sms;
}
elseif($req=='add')
{
//strlen($khata)

	if($_REQUEST['name']=='' && strlen($_REQUEST['name'])<'3')
	{
	die('<span style="color:red">INVALID NAME<span>');
	}
	elseif($_REQUEST['mo']=='')
	{
	die('<span style="color:red">INVALID MOBILE NO.<span>');
	}
	elseif($_REQUEST['date']=='')
	{
	die('<span style="color:red">INVALID DUE DATE<span>');
	}
	elseif($_REQUEST['amt']=='')
	{
	die('<span style="color:red">INVALID AMOUNT<span>');
	}
	elseif($_REQUEST['comment']=='')
	{
	die('<span style="color:red">INVALID RESION<span>');
	}
	else
	
	$id= file_get_contents("did.txt");
	$n='1';
	$q2=$id+ $n;
	$q3=file_put_contents("did.txt",$q2);
	
	$cdate=date('d/m/Y');
	$name=$_REQUEST['name'];
	$mo=$_REQUEST['mo'];
	$amo=$_REQUEST['amo'];
	$duedate=$_REQUEST['date'];
	$amt=$_REQUEST['amt'];
	$user=$_SESSION['user'];
	$comment=$_REQUEST['comment'];
	//$date= date('d/m/Y', strtotime($ddate));
$sql="INSERT INTO `creadit` (`id`, `cdate`, `name`, `mo`, `amo`, `duedate`, `amt`, `user`, `smsdate`, `comment`,`samt`,`ideantity`) VALUES ('$id', '$cdate', '$name', '$mo', '$amo','$duedate', '$amt', '$user', '', '$comment','$amt','');";
	$sms='Hello '.$name.',
AAPANE OM HARI TELECOM SE '.$cdate.' KO UDHAR LIYA THA.
JISKA AAPAKE VAYADE KE MUTABIK SAMAY HO GAYA HEI. ATAH HAMARI DUKAN PAR AAKAR APANA BAKAYA PAYMENT CHUKADA KAREIN.
THANK&REGARD
OM HARI TELECOM';
	$date= date('Y-m-d', strtotime($duedate));
	$smsdate=$date.' 08:00:00';
	$sm=ssms($mo,$sms,$smsdate);
	if($sm==' Warning:Schedule Time Should be Greater Than Current Date')
	{
	$smsdate=$date.' 20:00:00';
	$sm=ssms($mo,$sms,$smsdate);
			if($sm==' Warning:Schedule Time Should be Greater Than Current Date')
			{
			die('<span style="color:red">INVALID DUE DATE<span>');
			}
	}
	$change='DUE ADD BY '.$_SESSION['user'].' OF AMT RS. '.$amt.' AND SMS SCHEULED TO '.$smsdate;
}
else
{
die('INVALID REQUEST');
}

if($sql!='')
{
	if ($conn->query($sql) === TRUE) {
	//echo $change;
	} 
	else 
	{
	echo "Error: " . $sql . "<br>" . $conn->error;
	die('<span style="color:red">SOMETHING WENT WRONG.<span>');
	}
}



$hid= file_get_contents("hid.txt");
$n='1';
$q2=$hid+ $n;
$q3=file_put_contents("hid.txt",$q2);

$uname= mysqli_real_escape_string($con, $_SESSION['user']);
$date=date("d/m/Y");
$q="INSERT INTO `ohtdb`.`credith` (`dueid`, `id`, `date`, `comment`, `user`) VALUES ('$id', '$hid', '$date', '$change', '$uname');";
    if ($conn->query($q) === TRUE) {
   echo "<span style='color:blue'>".$change."</span>";
} else {
	die('<span style="color:red">SOMETHING WENT WRONG 2.<span>');
    echo "Error: " . $q. "<br>" . $conn->error;
}

?>