<?php
//session file
if(file_exists("session.php")){include_once('session.php');}else{include_once('../session.php');}
if(file_exists("sms.php")){include_once('sms.php');}else{include_once('../sms.php');}
// session file

if($utype!='ADMIN' && $utype!='SUB~ADMIN')
{
$_SESSION['user']='';
echo '<script>window.location ="index.php";</script>';
die('PLEASE WAIT');
}
?>
<?php
$conn = new mysqli('localhost','hcemr8ri9wai','Hps202132@','ohtdb');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$nday= date('Y-m-d', strtotime($date .' +1 day'));
$sql1="WHERE `amt`!='0' AND `duedate`<'$nday'";
$sql = "SELECT * FROM creadit $sql1";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
$sms='हैलो '.$row['name'].',
आपने दिनांक '.$row["cdate"].' को ओम हरि टेलीकॉम से '.$row["amt"].' रू का उधार लिया था।
आपका वायदा '.$date.'  का था और आज  '.date('d/m/Y').' हो गयी है।
अत: कृपया दुकान पर जाकर अपना बकाया भुगतान जल्द अदा करें।
Thank&Regard
Om Hari Telecom
+919758684152';
$mo=$row['mo'].','.$row['amo'];
$id=$row['id'];
	$did=$row['id'];
	$change='DAILY BULK SMS SEND TO CUSTOMER';
	$hid= file_get_contents("hid.txt");
	$n='1';
	$q2=$hid+ $n;
	$q3=file_put_contents("hid.txt",$q2);

	$uname= mysqli_real_escape_string($con, $_SESSION['user']);
	$date=date("d/m/Y");
	$q="INSERT INTO `ohtdb`.`credith` (`dueid`, `id`, `date`, `comment`, `user`) VALUES ('$did', '$hid', '$date', '$change', '$uname');";
 	if ($conn->query($q) === TRUE) {
 	//echo 's';
	} else 
	{
 	//echo 'f';
	}
	
sms($mo,$sms,'OMHARI');
    }
  $count=$result->num_rows;
  echo '<div><b><p>TOTAL '.$count.' CUSTOMER FIND AND SMS SENT TO ALL</p></b></div>';
} 
else 
{
echo '<div>SORRY '.$_SESSION['user'].' ! <b><p>NO TODAY DUE FIND</p></b></div>';
}

function sq($did,$change)
{

}

$conn->close();
?> 