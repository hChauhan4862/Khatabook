<?php
/*
if (preg_match('@^[^/]+://[^/]+@', $_SERVER['HTTP_REFERER'], $match)) {
$u=$match[0];
	if($u!='http://users.omharitelecom.com')
	{
	die('<span style="color:red">ANAUTHORIZED ACCESS DETECT</span>');
	}
}
else
{
die('<span style="color:red">ANAUTHORIZED ACCESS DETECT</span>');
}


function get($u)
{
$url=$u;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch); 
return $data;
}
session_start();
if($_REQUEST['v']!='' AND $_REQUEST['k']!='' AND strlen($_REQUEST['k'])=='5')
{
$url='http://upbhulekh.gov.in/public/public_ror/public_ror_report.jsp?khata_number='.$_REQUEST['k'].'&village_code='.$_REQUEST['v'].'&fasli_code=999';
       echo '<body oncontextmenu="return false;" />';
       echo get($url);
       die();
}
$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$txn=$_REQUEST['id'];
if($_SESSION['user']=='admin')
{
$user='';
}
else
{
$u=$_SESSION['user'];
$user="AND `user`='$u'";
}
$sql = "SELECT khata,village FROM ror WHERE txn= $txn $user";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $khata=$row["khata"];
       $village=$row["village"];
       if(strlen($khata)=='1'){$khata='0000'.$khata;}
       elseif(strlen($khata)=='2'){$khata='000'.$khata;}
       elseif(strlen($khata)=='3'){$khata='00'.$khata;}
       elseif(strlen($khata)=='4'){$khata='0'.$khata;}
       $url='http://upbhulekh.gov.in/public/public_ror/public_ror_report.jsp?khata_number='.$khata.'&village_code='.$village.'&fasli_code=999';
       echo '<body oncontextmenu="return false;" />';
       echo get($url);
    }
} 
else
{
die('ANAUTHORIZED ACCESS DETECT');
}


exit(); //if not want to use below code
*/
?>
<script src="../disable.js"></script>
<?php


if($_REQUEST['v']!='' AND $_REQUEST['k']!='' AND strlen($_REQUEST['k'])=='5')
{

$kh=$_REQUEST['k'];
$vi=$_REQUEST['v'];
}
else
{
session_start();
$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$txn=$_REQUEST['id'];
if($_SESSION['user']=='admin')
{
$user='';
}
else
{
$u=$_SESSION['user'];
$user="AND `user`='$u'";
}
$sql = "SELECT khata,village FROM ror WHERE txn= $txn $user";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $khata=$row["khata"];
       $vi=$row["village"];
       if(strlen($khata)=='1'){$khata='0000'.$khata;}
       elseif(strlen($khata)=='2'){$khata='000'.$khata;}
       elseif(strlen($khata)=='3'){$khata='00'.$khata;}
       elseif(strlen($khata)=='4'){$khata='0'.$khata;}
       $kh=$khata;
    }
} 
else
{
die('ANAUTHORIZED ACCESS DETECT');
}
}



function get($u)
{
$url=$u;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}


///  PLOT DETAILS
$someJSON=get('http://164.100.230.206/WebService/service?village='.$vi.'&khata='.$kh.'&get=plot_detail&api_key=apikey');
$someArray = json_decode($someJSON, true);
 
if($someArray["RESPONSE"]!=true)
{
	echo $plot=$someArray["ERROR_MESSAGE"][0];die();
}
else
{
	$someArray2=$someArray["DATA"]["khata_detail"]["plot_detail"];
	$plot='';
	$tplot='0';
	foreach ($someArray2 as $key => $value) 
	{
			$plot=$plot.$value["khasra_no"].' &nbsp;&nbsp;('.$value["area"].')'.'<br>';
			$tplot=$tplot+$value["area"];
	}
}

////    OWNER NAME

$someJSON=get('http://164.100.230.206/WebService/service?village='.$vi.'&khata='.$kh.'&get=owner_detail&api_key=apikey');
$someArray = json_decode($someJSON, true);
 
if($someArray["RESPONSE"]!=true)
{
	$name=$someArray["ERROR_MESSAGE"][0];die();
}
else
{
	$someArray2=$someArray["DATA"]["khata_detail"]["owner_detail"];
	$name='';
	foreach ($someArray2 as $key => $value) 
	{
		$name=$name.'<b>'.$value["seq_no"].'</b>.&nbsp;&nbsp;'.$value["name"].' / '.$value["father"].' / '.$value["address"].'<br>';
	}
}

///   ORDER DETAILS


$someJSON=get('http://164.100.230.206/WebService/service?village='.$vi.'&khata='.$kh.'&get=order_detail&api_key=apikey');
$someArray = json_decode($someJSON, true);
 
if($someArray["RESPONSE"]!=true)
{
	$order=$someArray["ERROR_MESSAGE"][0];//die();
}
else
{
	$someArray2=$someArray["DATA"]["khata_detail"]["order_detail"];
	$order='';
	foreach ($someArray2 as $key => $value) 
	{
							//	echo	$value["khasra_no"].'<br>';
		 $order=$order.$value["order_desc"].'<br><br>';
	}
}

?>

<body >
<meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="no-cache">
        <meta http-equiv="Expires" content="-1">
        <meta http-equiv="Cache-Control" content="no-cache">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<?php
//include('rorfile/2.php')  ;
?>
                <div class="float-clear"></div>
            </div>
        </header>        
    <div style=" background-color: transparent;" id="mdn-container">
          
        
    	<table border="1" class="report">
            <thead> 
        	<tr class="sub-heading">
                    <th colspan="12" style="text-align:right; padding:10px; padding-bottom:10px;">
                        <center>
                            <div style="font-size: 20px; padding: 5px 0px 0px 5px;">OM HARI TELECOM (खतौनी की नकल)<br>
                                


                            </div>
                        </center>
                    </th>
                </tr>
            

            
            
        </thead>
            
            <tbody>
            <tr class="sub-heading" style="border-bottom:1px solid #e8e8e8;">
                <td valign="top" colspan="5"><b>खातेदार का नाम / पिता पति संरक्षक का नाम / निवास स्थान</b></td>
                <td valign="top" width="16%"><b>खसरा संख्या  ( क्षेत्रफल ) </b></td>
                <td valign="top" width="60%" colspan="3"><b>आदेश</b></td>
            </tr>    
            <tr class="sub-heading" style="border-bottom:1px solid #e8e8e8; text-align:center; font-weight: bold; border: none;">
    
            </tr><tr class="sub-heading" style="border:1px solid #000;">
               <td valign="top" colspan="5"><font size="2"><span style="line-height: 22px;"><?php echo $name; ?><br></span></font></td>  
	       <td valign="top"><font size="2"><span style="line-height: 22px;"><?php echo $plot; ?>&nbsp;</span></font> &nbsp;<br></td>
               <td valign="top" width="60%" colspan="3" style="font-size: 12px; text-align: justify;" class="order-text"><span><?php echo $order; ?><br></span></td>
            </tr>
            
            <tr>
                <td colspan="5" style="font-size: 14px;"><b>योग कुल क्षेत्रफल </b></td>
                <td style="text-align: center"><b><?php echo $tplot; ?></b></td>
                <td></td>
            </tr>
            

            <style>
            tfoot{
                width: 85%;
                max-width: 1024px;
                min-width: 960px;
                background-color: #000;
                color: #fff;
            }
            tfoot{
                background-color: #3673AC;
                color: #fff;
            }
            tfoot .nic-logo{
                padding: 10px;
                padding-bottom: 0;
            }
            tfoot .nic-logo img{
                width: 100px;
            }
            </style>
            </tbody>
            <tfoot>
                <tr><td colspan="12"><div class="inner">
                  	  <div class="float-left" style="font-size: 14px; text-align: center; padding: 10px; margin-top: 2px; color: #fff">
                    	    <b>Software Powered By</b> :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  Harendra Chauhan (WEBSITE BUILDER).
                   	  </div>
                    <div class="float-clear"></div>
                    </div></td></tr>
            </tfoot>

        </table>
        </div></center>

<style>
    .show-on-print{
        display: none !important;
    }
</style></body>