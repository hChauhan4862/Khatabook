<?php

function get($u)
{
$url=$u;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch); 
$decoded = json_decode($data, true);
return $data;
}

if($_REQUEST['act']=='sbacn')
{
$d=get('http://upbhulekh.gov.in/public/public_ror/action/public_action.jsp?act=sbacn&fasli-code-value=999&fasli-name-value&acn='.$_REQUEST['acn'].'&vcc='.$_REQUEST['vcc']);
$d2=json_decode($d, true);
	foreach ($d2 as $key => $value) 
	{
	echo "<div>".$value['name']." : ".$value['father']."</div>";
	
	}
	die();
}
elseif($_REQUEST['act']=='sbname')
{
//http://upbhulekh.gov.in/public/public_ror/action/public_action.jsp?act=sbname&vcc=121907&fasli-code-value=999&name=a
$d=get('http://upbhulekh.gov.in/public/public_ror/action/public_action.jsp?act=sbname&fasli-code-value=999&name='.$_REQUEST['name'].'&vcc='.$_REQUEST['vcc']);
$d2=json_decode($d, true);
	foreach ($d2 as $key => $value) 
	{
//<li><input type="radio" name="khata_number" onclick="setkhata(this.value)" value="00975" >00975 : अखलेश : सत्यपाल</li>
	//echo "<div>".$value['name']." : ".$value['father']."</div>";
echo '<li><input type="radio" name="khata_number" onclick="setkhata(this.value)" value="'.$value['khata_number'].'" id="'.$value['khata_number'].'" >'.$value['khata_number'].': '.$value['name'].' : '.$value['father'].'</li>';
	
	}
	die();
}

elseif($_REQUEST['act']=='sbksn')
{
//view-source:http://upbhulekh.gov.in/public/public_ror/action/public_action.jsp?act=sbksn&kcn=1077&vcc=121907&fasli-code-value=999
$d=get('http://upbhulekh.gov.in/public/public_ror/action/public_action.jsp?act=sgw&fasli-code-value=999&kcn='.$_REQUEST['kcn'].'&vcc='.$_REQUEST['vcc']);
$d2=json_decode($d, true);
	foreach ($d2 as $key => $value) 
	{
//<li><input type="radio" name="khata_number" onclick="setkhata(this.value)" value="00975" >00975 : अखलेश : सत्यपाल</li>
	//echo "<div>".$value['name']." : ".$value['father']."</div>";


echo '<li><input type="radio" name="khata_number" onclick="setkhata(this.value)" value="'.$value['khata_number'].'" id="'.$value['khata_number'].'" >'.$value['khata_number'].': '.$value['khasra_number'].' &nbsp;&nbsp;-&nbsp;&nbsp;'.$value['show_name'].'</li>';
	
	}
	die();
}



$url="http://upbhulekh.gov.in/public/public_ror/action/public_action.jsp?act=".$_REQUEST['act']."&district_code=".$_REQUEST['district_code']."&tehsil_code=".$_REQUEST['tehsil_code']."&village_code=".$_REQUEST['village_code']."&query=".$_REQUEST['query'];
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch); 
$decoded = json_decode($data, true);
if($_REQUEST['act']=='filldistrict')
	{
	echo "<option>PLEASE SELECT DISTRICT</option>";
	foreach ($decoded as $key => $value) 
	{
	echo "<option value='".$value['district_code_census']."'>".$value['district_name_english']."</option>";
	}
	}
	elseif($_REQUEST['act']=='fillTehsil')
	{
	echo "<option>PLEASE SELECT TEHSIL</option>";
	foreach ($decoded as $key => $value) 
	{
	echo "<option value='".$value['tehsil_code_census']."'>".$value['tehsil_name_english']."</option>";
	}
	}
	elseif($_REQUEST['act']=='fillVillage')
	{
	echo "<option>PLEASE SELECT VILLAGE</option>";
	foreach ($decoded as $key => $value) 
	{
	//echo "<option value='".$value['village_code_census']."'>".$value['vname_eng']."  (  ".$value['pname']."  )</option>";
	echo "<option value='".$value['village_code_census']."'>".$value['vname_eng']." - ".$value['vname']." (  ".$value['village_code_census']."  )</option>";
	}
	}
?>