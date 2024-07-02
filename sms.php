<?php
function sms($mo,$sms,$sid)
{
	if($sid=='')
	{
	$sid='OMHARI';
	}
$url="http://login.bulksmsgateway.in/unicodesmsapi.php?username=9758684152&password=Hps202132@&mobilenumber=".urlencode($mo)."&message=".urlencode($sms)."&senderid=".urlencode($sid)."&type=3";

$url="http://sms.bulksmsserviceproviders.com/api/send_http.php?authkey=789ce0d51d7b4c891d880c54eef3f52f&mobiles=".urlencode($mo)."&message=".urlencode($sms)."&sender=".urlencode($sid)."&route=A&unicode=1";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
$curl_scraped_page=str_replace('"','',$curl_scraped_page);
$na=smsdb('$curl_scraped_page','$mo');
return $curl_scraped_page;
}



function esms($mo,$sms,$sid)
{
	if($sid=='')
	{
	$sid='OMHARI';
	}
	//login.bulksmsgateway.in/sendmessage.php?user=........&password=.......&mobile=........&message=.......&sender=.......&type=3 

$url="http://login.bulksmsgateway.in/sendmessage.php?user=9758684152&password=Hps202132@&mobile=".urlencode($mo)."&message=".urlencode($sms)."&sender=".urlencode($sid)."&type=3";

$url="http://sms.bulksmsserviceproviders.com/api/send_http.php?authkey=789ce0d51d7b4c891d880c54eef3f52f&mobiles=".urlencode($mo)."&message=".urlencode($sms)."&sender=".urlencode($sid)."&route=A";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
//$d= json_decode($curl_scraped_page, true);
//return $d["status"];
$curl_scraped_page=str_replace('"','',$curl_scraped_page);
smsdb($curl_scraped_page,$mo);
return $curl_scraped_page;
}




// login.bulksmsgateway.in/schedulesmsapi.php?user=........&password=.......&mobile=........&message=.......&sender=.......&type=3&scheduletime=YYYY-MM-DD HH:MM 

function ssms($mo,$sms,$time)
{
$url="http://login.bulksmsgateway.in/schedulesmsapi.php?user=9758684152&password=Hps202132@&mobile=".urlencode($mo)."&message=".urlencode($sms)."&senderid=OMHARI&scheduletime=".urlencode($time)."&type=3";

$url="http://sms.bulksmsserviceproviders.com/api/send_http.php?authkey=789ce0d51d7b4c891d880c54eef3f52f&mobiles=".urlencode($mo)."&message=".urlencode($sms)."&sender=".urlencode($sid)."&route=A&schtime".urlencode($time);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$curl_scraped_page = curl_exec($ch);
curl_close($ch);
$curl_scraped_page=str_replace('"','',$curl_scraped_page);
smsdb($curl_scraped_page,$mo);
return $curl_scraped_page;
}


function smsdb($sid,$mo)
{
                    $id=time().'_'.mt_rand('10','100');
                    $date=date('Y-m-d H:i:s');
$query = "INSERT INTO sms_status (id,smsid,status,number,date,del_date) VALUES ('$id','$sid','','$mo','$date','')";
                 $result = $con->query($query);
                 return '1';
}
?>