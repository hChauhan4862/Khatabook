<?php
include_once('../sms.php');
session_start();
$con = mysqli_connect('localhost', 'hcemr8ri9wai','Hps202132@', 'ohtdb') or die("Oops some thing went wrong");

$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if($_REQUEST['id']=='')
{
exit('DUE ID REQUIRED');
}
$did= mysqli_real_escape_string($con, $_REQUEST['id']);
$res=mysqli_query($con, "SELECT * FROM creadit WHERE id='$did'")  or die("Error: ".mysqli_error($dbc));
$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
$damt=$row["amt"];
$ddate=$row["duedate"];
if($damt=='')
{
die('<div>PLEASE SELECT VALID DUE FROM LIST</div>');
}

$req=$_REQUEST['req'];
if($req=='sms')
{

	if($_REQUEST['vt']=='1')
	{
$eee=mt_rand('500','5000');	
$url="http://ivrapi.indiantts.co.in/tts?type=indiantts&hindionly2=false&numeric=currencyslow&api_key=50a06c80-67c1-11e8-bc8f-f5a07264d523&user_id=40452&audioformat=wav&text=".urlencode($sms);

$url='http://sms.bulksmsserviceproviders.com/api/send_voice_http.php?authkey=789ce0d51d7b4c891d880c54eef3f52f&mobiles='.$row["mo"].'&message=http%3A%2F%2Fusers.omharitelecom.com%2Fsms%2Fv_file.wav&sender=9758684152&route=B&duration=20&response=json&campaign=RECOVERY_'.$eee;
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$curl_scraped_page = curl_exec($ch);
	curl_close($ch);
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date= date("d/m/Y H:i:sa", $time_now);;
	$sql="UPDATE creadit SET `smsdate`='$date' WHERE id='$did'";
	echo $curl_scraped_page;
	$change='VOICE MESSAGE SEND TO CUTOMER
<br><b>Message Responce Text:-</b> '.$curl_scraped_page.'<br><audio controls><source src="http://users.omharitelecom.com/sms/v_file.wav" type="audio/wav"></audio>';
	
	}
	else
	{
	$sms=$_REQUEST["value"];
	$time_now=mktime(date('h')+5,date('i')+30,date('s'));
	$date= date("d/m/Y H:i:sa", $time_now);;
	$sql="UPDATE creadit SET `smsdate`='$date' WHERE id='$did'";
	echo sms($row["mo"],$sms,'');
	$change='SMS SENT TO CUSTOMER
'.$sms;
$change2=$change;
	}
}
elseif($req=='date')
{
	$date=$_REQUEST['value'];
	//$date= date('d/m/Y', strtotime($date));
	$sql="UPDATE creadit SET `duedate`='$date' WHERE id='$did'";
	$change='DUE DATE CHANGE FROM '.$ddate.' TO '.$date;
}
elseif($req=='amt')
{
	$amt=$_REQUEST['value'];
	if($damt=='0')
	{
	die('<div>DUE ALREADY CLOSE</div>');
	}
	elseif($amt>$damt)
	{
	die('<div>INVALID AMOUNT</div>');
	}
	elseif($amt<'0')
	{
	die('<div><P><b>AMOUNT CAN NOT BE SMALL THAN 0</b></P><b>HELP </b>PLEASE USE ADD DUE BUTTON</div>');
	}
	$amt2=$damt-$amt;
	$sql="UPDATE creadit SET `amt`='$amt2' WHERE id='$did'";
	$change='RS. '.$amt.' PAID BY CUSTOMER AND CURRENT CREDIT IS RS '.$amt2;
	if($amt2=='0')
	{
	$change='DUE CLOSE';
	}
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
	}
}



$hid= file_get_contents("hid.txt");
$n='1';
$q2=$hid+ $n;
$q3=file_put_contents("hid.txt",$q2);

$uname= mysqli_real_escape_string($con, $_SESSION['user']);
$date=date("d/m/Y");
$q="INSERT INTO `ohtdb`.`credith` (`dueid`, `id`, `date`, `comment`, `user`) VALUES ('$did', '$hid', '$date', '$change', '$uname');";
    if ($conn->query($q) === TRUE) {
   echo "<div>".$change."</div>";
} else {
    echo "Error: " . $q. "<br>" . $conn->error;
}
?>