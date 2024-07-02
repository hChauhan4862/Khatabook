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

$userHandle = $_SESSION['user'];
$key = 'p@c@n155tz'; // check sum should be used as key                    
$tran_id=time();
$data_in= $userHandle.$tran_id.$key;
$checksum = hexdec(hash_adler32_wrapper($data_in));
$parameters="userHandle=".$userHandle."&time=".$tran_id."&checksum=".$checksum."&l=".$_REQUEST['l'];
$url="http://login.omharitelecom.com/gologin";                               
echo $get_url=$url."?".$parameters;
header('Location: '.$get_url);
?>