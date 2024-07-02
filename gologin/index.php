<?php
session_start();
function hash_adler32_wrapper($data) {
    $digHexStr = hash("adler32", $data);

    // If version is better than 5.2.11 no further action necessary
    if (version_compare(PHP_VERSION, '5.2.11', '>=')) {
        return $digHexStr;
    }

    // Workaround #48284 by swapping byte order
    $boFixed = array();
    $boFixed[0] = $digHexStr[6];
    $boFixed[1] = $digHexStr[7];
    $boFixed[2] = $digHexStr[4];
    $boFixed[3] = $digHexStr[5];
    $boFixed[4] = $digHexStr[2];
    $boFixed[5] = $digHexStr[3];
    $boFixed[6] = $digHexStr[0];
    $boFixed[7] = $digHexStr[1];

    return implode("", $boFixed);
}

$userHandle = $_REQUEST['userHandle'];
$tran_id= $_REQUEST['time'];
$checksum2= $_REQUEST['checksum'];
$key = 'p@c@n155tz'; // check sum should be used as key 
$data_in= $userHandle.$tran_id.$key;
$checksum = hexdec(hash_adler32_wrapper($data_in));

$st=time()-50;
if($st > $tran_id)
{
$_SESSION['user']='';
die(ERROR1);
}

if($_REQUEST['checksum']==$checksum)
{
echo $_SESSION['user']=$userHandle;
$parameters="userHandle=".$userHandle."&time=".$tran_id."&checksum=".$checksum;
$url="http://users.omharitelecom.com/home.php";                               
$get_url=$url."?".$parameters;
header('Location: '.$get_url);
echo 'SUCCESS';
}
else
{
echo 'ERROR2';
}


?>