<?php
include_once('../session.php');

session_start();
if(!$_SESSION['user'])
{
die();
}
if($ubal<'15')
{
die('INSUFFICIENT FUND PLEASE CONTACT HARENDRA CHAUHAN +919758684152');
}
$refno= file_get_contents("sr.txt");
$n='1';
$q2=$refno + $n;
$q3=file_put_contents("sr.txt",$q2);
?>
    <?php 
    // session_destroy(); 
    require_once('../db.php');
    $txn=$_REQUEST['refno'];
    $village=$_REQUEST['village'];
    $khata=$_REQUEST['khata'];
     $name=$_REQUEST['name'];
    $date=date("Y-m-d");
    $user=$_SESSION['user'];
    $sql = "INSERT INTO ror (`txn`, `village`, `khata`, `pc`, `name`, `date`, `rorid`, `user`,`del`) VALUES ($refno,$village,$khata,'-1','NO DETAILS FIND','$date','','$user','0')";
    if ($conn->query($sql) === TRUE) {
 //   echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    die();
}
    ?>

<?php
if($_REQUEST['t']!='')
{
        if($_REQUEST['t']!==$_SESSION['refno'])
        {
        session_destroy();
        session_start();
        $_SESSION['muser']=$muser;
        header('Location: ../ror/genrate.php');
        }
        
        $c=$_SESSION["count"];
        $_SESSION["count"]=$c+1;
        
        if($c>'2')
        {
        session_destroy(); 
        session_start();
        $_SESSION['muser']=$muser;
        header('Location: ../ror/genrate.php?e=1');
        die();
        }
}
else
{
//session_destroy();
}


if($_REQUEST['e']=='1')
{
        $error='MAX LIMIT OF REFRESH PAGE IS 2 <div> THE LIMIT IS OVER PLEASE SUBMIT FORM AGAIN</div> ';
        session_destroy();
        session_start();
        $_SESSION['muser']=$muser;
}
elseif($_REQUEST['e']=='2')
{
        $error='ENTERED REF NUMBER IS NOT VALID';
        session_destroy();
        session_start();
        $_SESSION['muser']=$muser;
}
elseif($_REQUEST['e']=='3')
{
        $error='ENTERED VILLAGE CODE NUMBER IS NOT VALID';
        session_destroy();
        session_start();
        $_SESSION['muser']=$muser;
}
elseif($_REQUEST['e']=='4')
{
        $error='ENTERED KHATA NUMBER IS NOT VALID';
        session_destroy();
        session_start();
        $_SESSION['muser']=$muser;
}

else
{
        $error='GO BACK AND CHECK ENTERED DATA AGAIN <br>(EX- VILLAGE CODE, KHATA NO., REF NO.) ';
}
?>

<?php
// $q= file_put_contents("../roruser/".$_SESSION['refno'].".txt","AC: ".$_SESSION['khata'].", VILLAGE: ".$_SESSION['village']);
?>








<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <script>
        
            
        </script>
        <title>BhuLekh Ror</title>
    <style>
            [ng-cloak]{
                display: none;
            }
            @font-face {
                font-family: 'Akshar Unicode Regular';
                src: url(http://164.100.230.206/WebService/font/akshar_0.ttf);
            }
            body{
                    padding:0;
                    margin:0;
                    background-color:#f5f5f5;
                    font-family: 'Akshar Unicode Regular';
            }
            
            table.report{
                    border-collapse:collapse;
                    border:1px solid #CCC;	
                    width:100%;
                    background-color: #fff;
            }
            table.report tr td.heading{
                    color:#000;
                    padding:20px;
                    text-align:center;
            }
            table.report tr.sub-heading td{
                    color:#000;
                    font-size:12px;
                    padding:5px 10px;
                    text-align:left;
                    line-height: 17px;
            }
            table.report thead tr.sub-heading th{
                    color:#000;
                    font-size:12px;
                    padding:5px 10px;
                    text-align:left;
                    line-height: 17px;
            }
            table.report thead tr.sub-heading th{
                    border:1px solid #AEAEAE;
                    font-family: 'Akshar Unicode Regular';
            }
            table.report tr td{
                    border:1px solid #AEAEAE;
                    font-family: 'Akshar Unicode Regular';
            }
            .float-left{
                float: left;
            }
            .float-right{
                float: right;
            }
            .float-clear{
                clear: both;
            }
            table.report tr td {
            font-family: "Akshar Unicode Regular";
            }
            .custom-dialog{
                positin:absolute;
                width: 100%;
                min-height: 100%;
                z-index: 9999;
            }
            .custom-dialog .dialog-header{
                background-color: #fff;
                border-bottom: 1px solid #CCC;
                position: fixed;
                width:100%;
            }
            .custom-dialog .dialog-header ul.dialog-tools{
                list-style: none;
                padding: 0;
                margin: 0;
            }
            .custom-dialog .dialog-header ul.dialog-tools li{
                float: left;
                margin-left: 10px;
            }
            .custom-dialog .dialog-header ul.dialog-tools li a,.custom-dialog .dialog-header ul.dialog-tools li a:active, .custom-dialog .dialog-header ul.dialog-tools li a:focus{
                outline: none;
            }
            .custom-dialog .dialog-header ul.dialog-tools li a div.tool{
                padding: 7px 12px;
                border: 1px solid #e8e8e8;
                background-color: #f5f5f5;
                border-radius: 3px;
                color: #666;
            }
            .custom-dialog .dialog-header ul.dialog-tools li a div.tool:hover{
                background-color: #03a9f4;
                color: #fff;
                border-color: #03a9f4;
            }
            .custom-dialog .dialog-header ul.dialog-tools li a div.tool.close:hover{
                background-color: tomato;
                border-color: tomato;
            }
        </style>    

<SCRIPT>
    window.history.forward();
        function noBack()
        {
            window.history.forward();
        }
        
     document.getElementById("ref_no").innerHTML = localStorage.getItem("refno");
     document.getElementById("village").innerHTML = localStorage.getItem("village");
     document.getElementById("khata").innerHTML = localStorage.getItem("khata");
</SCRIPT>

    </head>
    
    <body oncontextmenu2= "return false" onpageshow="if (event.persisted) noBack();" onUnload="">
 <div id="error_msg" style="display:none; margin-top:30px; text-align: center; font-size: 20px; font-weight: 500;">
        <span id="error"></span>
        </div>
        
        <table style="position: absolute; width: 100%; height: 100%;" id="loading-screen">
            <tr>
                <td style="text-align: center">
                    <i class="fa fa-spinner fa-spin fa-5x"  aria-hidden="true"></i><br>
                    <span style="font-size: 15px;">loading...</span>
                </td>
            </tr>
            
        </table> 
        
        <main ng-cloak>
        <div class="custom-dialog">
        <!--Dialog Header Starts--->
        <div class="dialog-header">
            <div style="padding: 10px 20px;">
            <div class="float-left">
                
            </div>
           
           <div class="float-right">
                <ul class="dialog-tools">
                    <li style="font-size: 12px; margin-top: 10px;">
                        <i class="fa fa-info-circle"></i> OM HARI TELECOM (CSC KENDRA)
                    </li>
                    <li>
                        <a href="#" onclick="window.print();loadset();" class2="print-report2">
                            <div class="tool">
                                <i class="fa fa-print"></i>
                            </div>
                        </a>
                    </li>
                    
                    <div class="float-clear"></div>
                </ul>
            </div>
            <div class="float-clear"></div>
            </div>
        </div>
        <!--Dialog Header Ends--->
        
        <!--Dialog Content Starts--->

        
        <div class="dialog-content" style="background-color: rgb(245, 245, 245); height: 100%; overflow: auto; padding: 20px; width: 1600px;">
               
            <input type="hidden" id="qrtext" value=""/>
            <center>
	
        
        <div style="margin-top: 50px; background-color: #fff; box-shadow:0px 0px 2px #DFDFDF;" id="mdn-container">
      
        
        <table border="1" class="report" ng-cloak="ng-cloak">
            <thead> 
        	<tr class="sub-heading">
                    <th colspan="13" style="text-align:right; padding:10px; padding-bottom:10px;">
                        <center>
                        <div class="float-left" style="height: 40px;">
                                <img id="qr_code" src="" width="50px"/>
                        </div>
                            <span style="margin-top: 15px; display: inline-block; font-size: 18px;font-weight: lighter;">उद्धरण खतौनी <br></span>
                        <div class="float-right">
                                <span class='hid-sno'><b>उद्धरण क्रमांक :</b> <span style="font-weight: normal;" id="ror_id"></span></span>
                        </div><br>
                        <div class="float-right">
                                <span class='hid-sno'><b>Ref_no :</b> <span style="font-weight: normal;" id="ref_no"><?php echo $refno; ?></span></span>
                            </div>
                            <div class="float-clear"></div>    
                        </center>
                    </th>
                    
            </tr>
            <tr class="sub-heading" style="border-bottom:1px solid #e8e8e8;">
            	<th colspan="13" >
                   <div class="float-left" id="village_code" style="margin-right: 3%;">
                        <b>ग्राम क्रमांक :</b>  
                    </div>
                    <div class="float-left" id="village_name" style="margin-right: 3%;">
                        <b>ग्राम का नाम / परगना :</b> 
                    </div>
 
                    <div class="float-left" id="tehsil_name" style="margin-right: 3%;">
                        <b>तहसील :</b> 
                    </div>
                    <div class="float-left" id="district_name" style="margin-right: 3%;">
                        <b>जनपद :</b> 
                    </div>
                    <div class="float-left" id="fasli_year" style="margin-right: 3%;">
                        <b>फसली वर्ष :</b> 
                    </div>
                    <div class="float-left" id="partt">
                        <b>भाग :</b> 
                    </div>
                    <div class="float-clear"></div>  
                </th>
                <input type="hidden" id="district_code_census" value=""/>
                <input type="hidden" id="tehsil_code_census" value=""/>
                <input type="hidden" id="pargana_code_census" value=""/>
                <input type="hidden" id="village" value="<?php echo $_REQUEST['village']; ?><?php echo $_SESSION["village"]; ?>"/>
                <input type="hidden" id="khata" value="<?php echo $_REQUEST['khata']; ?><?php echo $_SESSION["khata"]; ?>"/>
                <input type="hidden" id="part" value="1"/>
                <input type="hidden" id="get" value="ror"/>
                <input type="hidden" id="api_key" value="apikey"/>
                <input type="hidden" id="csc_name" value="Generated through Online Portel"/>
                <input type="hidden" id="result" value=""/>
            </tr>
        
<!--        <tr class="sub-heading" style="border-bottom:1px solid #e8e8e8;">
            <th colspan="3" ><b>तहसील :</b> </th>
            <th colspan="3" ><b>जनपद :</b> </th>
            <th colspan="3" ><b>फसली वर्ष :</b> </th>
            <th colspan="3" ><b>भाग :</b></th>
            
        </tr>-->
            <tr class="sub-heading" style="border-bottom:1px solid #e8e8e8;">
            	<th style="vertical-align: top;"><b>खाता खतौनी क्रम संख्या</b></th>
                <th colspan="3" style="vertical-align: top;"><b>खातेदार का नाम / पिता पति संरक्षक का नाम / निवास स्थान</b></th>
                <th style="vertical-align: top;"><b>भौमिक अधिकार प्रारम्भ होने का वर्ष</b></th>
                <th style="vertical-align: top;"><b>खाते के प्रत्येक गाटे की खसरा संख्या</b></th>
                <th style="vertical-align: top;"><b>प्रत्येक गाटे का क्षेत्रफल (हे.)</b></th>
                <th style="vertical-align: top;"><b>खातेदार द्वारा देय मालगुजारी  या लगान</b></th>
                <th colspan="3" style="vertical-align: top;"><b>परिवर्तन सम्बन्धी आज्ञा या उसका सारांश उनकी संख्या तथा दिनाँक सहित और आज्ञा  देने वाले आधिकारी का पद</b></th>
                <th colspan="2" style="vertical-align: top;"><b>टिप्पणी</b></th>
                
            </tr>
            <tr class="sub-heading" style="border-bottom:1px solid #e8e8e8; text-align:center; font-weight: bold;">
            	<th>1</th>
                <th colspan="3"><center>--------------------------------2--------------------------------</center></th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
                <th>6</th>
                <th colspan="3" style="width: 25%">7-12</th>
                <th colspan="2" style="width: 10%">13</th>
    </tr>
        </thead>
           
            <tr class="sub-heading">
                <td colspan ="13" align="justify" id="land_type"><b>श्रेणी :</b></td>
            </tr>
            <tr class="sub-heading" style="border-bottom:1px solid #e8e8e8; text-align:center; font-weight: bold; border: none;">
            <tr class="sub-heading" style="border:1px solid #000;">
                <td valign="top"  id="khata_number"><font size="2"><span style="line-height: 22px;"></span></font></td>
                <td valign="top" colspan="3" id="namex"><font size="2"><span style="line-height: 22px;"></span></font></td>

                <td valign="top"><font size="2" id="yr_co_tenx"><span style="line-height: 22px;"></span></font></td>
                <td valign="top"><font size="2" id="khasra_nox"><span style="line-height: 22px;"></span></font></td>
                <td valign="top"><font size="2" id="aString"><span style="line-height: 22px;"></span></font></td>
                <td valign="top"><font size="2" ><span style="line-height: 22px;"></span></font></td>
                <td valign="top" colspan="3" style="font-size: 12px; text-align: justify;" class="order-text" id="order_descx"><span></span></td>
                <td valign="top" colspan="2" id="remark_descx"><font size="2" style="font-size: 12px; text-align: justify;"><span></span></font></td>
                
<!--                <td valign="top"><font size="2"><span style="line-height: 22px;"></span></font></td>
                <td valign="top"><font size="2" colspan="3" ><span style="line-height: 22px;"></span></font></td>
                <td valign="top"><font size="2" id="fatherx"><span style="line-height: 22px;"></span></font></td>
                <td valign="top"><font size="2" id="addressx"><span style="line-height: 22px;"></span></font></td>
                <td valign="top"><font size="2" ><span style="line-height: 22px;"><hr/></span></font></td>
                <td valign="top"><font size="2" ><span style="line-height: 22px;"><hr/></span></font></td>
                <td valign="top"><font size="2" ><span style="line-height: 22px;"><hr/></span></font></td>
                <td valign="top"><font size="2" ><span style="line-height: 22px;"><hr/></span></font></td>
                <td valign="top" width="40%" style="font-size: 12px; text-align: justify;" colspan="3" class="order-text" ><span></span></td>
                <td valign="top" colspan="2" ><font size="2" style="font-size: 12px; text-align: justify;" ><span></span></font></td>-->
            </tr>
            <tr>
                <td colspan="5">&nbsp;</td>
                <td valign="top" id="count"><b> </b> </td>
                <td valign="top" id="tot_area"><b></b></td>
                <td valign="top"><i class="fa fa-rupee"></i> <b><span id="lr_payblex"></span></b></td>
                <td colspan="3" id="tot_order">
                    <b></b>
                </td>
                <td id="tot_remark"><b></b></td>
            </tr>
            <tr>
                <td colspan="13" style="font-size: 12px;">

                    <span id="khata_hindi" style="display: inline-block; margin-right: 20px;">कुल गाटे- </span>
                    <span id="area_hindi" style="display: inline-block; margin-right: 20px;">कुल क्षेत्रफल- </span>
                    <span id="revenue_hindi" style="display: inline-block; margin-right: 20px;">कुल भू-राजस्व - </span>
                  
                </td>
                
            </tr>
              <tr>
                <td colspan="5" style="padding: 10px; border-right: none;" valign='top'>
                    <div class="float-left" style="line-height: 14px; font-size: 12px; font-weight: bold;">
                        <div style="" id="signed_by"><b>Data Digitally Signed by:</b></div><br><br>

                        <div style="padding:5px; font-size: 10px; font-weight: normal;">उपरोक्त उद्दरण खतौनी का वेरीफिकेशन http://upbhulekh.gov.in Website पर जाकर किया जा सकता है।</div>

                    </div>
                     <div class="float-right nic-logo"><img style="height: 30px; width: 65px;" src="http://164.100.230.206/WebService/images/niclogo.png"></div>
                    <div class="float-clear"></div>
                </td>
                 <td colspan="5" style="padding:5px; font-size: 10px;">
                    <div id="signed_by2"><b>सक्षम अधिकारी: </b></div>
                    <div id="district_tehsil"></div>
                    <div id="date"><b>दिनांक एवं समय:</b> Tue Nov 21 10:17:24 IST 2017<span style="font-weight: normal;"></span></div>
                    <i class="fa fa-info-circle"></i>&nbsp;&nbsp;यह उद्दरण खतौनी इलेक्ट्रोनिक डिलीवरी सिस्टम द्वारा तैयार की गयी है तथा डाटा डिजीटल हस्ताक्षर द्वारा हस्ताक्षरित है।
                </td>
                
                <td colspan="3" style="padding:10px; font-size: 11px;" valign='top'>
                    <div id=""><b></b></div>
                </td>
                
                
            </tr>
            </tr>
        </table>
       
        </div>
</center>
        </div> 
        <link rel="stylesheet" href="http://omhari1.atwebpages.com/user/ror/style.css" type="text/css" />
        <style>
            @font-face {
                font-family: 'Akshar Unicode Regular';
                src: url(http://164.100.230.206/WebService/font/akshar_0.ttf);
            }
            table.report{
                    border-collapse:collapse;
                    border:1px solid #CCC;	
                    width:100%;
                    background-color: #fff;
/*                    background-image: url(http://fcs.up.nic.in/Res_Images/goi.png);*/
                    background-position: center 300px;
                    background-repeat: no-repeat;
                    background-size: 300px auto;
                    font-family: 'Akshar Unicode Regular';
            }
            table.report tr td.heading{
                    color:#000;
                    padding:20px;
                    text-align:center;
                    font-family: 'Akshar Unicode Regular';
            }
            table.report tr.sub-heading td{
                    color:#000;
                    font-size:12px;
                    padding:5px 10px;
                    text-align:left;
                    line-height: 17px;
                    font-family: 'Akshar Unicode Regular';
            }
            table.report thead tr.sub-heading th, table.report tbody tr.sub-heading th{
                    color:#000;
                    font-size:12px;
                    padding:5px 10px;
                    text-align:left;
                    line-height: 17px;
                    font-family: 'Akshar Unicode Regular';
            }
            table.report thead tr.sub-heading th{
                    border:1px solid #AEAEAE;
                    font-family: 'Akshar Unicode Regular';
            }
            table.report tr td{
                    border:1px solid #AEAEAE;
                    font-family: 'Akshar Unicode Regular';
            }
            .float-left{
                float: left;
            }
            .float-right{
                float: right;
            }
            .float-clear{
                clear: both;
            }
            thead {
                display:table-header-group;
            }
            tbody {
                display:table-row-group;
            }
        </style>
        
        
        
        <!--Dialog Content Ends--->
        
        <!--Dialog Footer Ends--->
        <div></div>
        <!--Dialog Footer Ends--->
        
    </div>
    </main>
        
        <!--<button onclick="PrintContent()">Print</button>-->
        
       
    
    <noscript>
         <div class="noscriptmsg">
          <h2>You don't have javascript enabled.Please Enable JavaScript in your browser.</h2>
         </div>
    </noscript>
    </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script>
    $(document).ready(function(){  
        var village=$("#village").val();
        var get=$("#get").val();
        var khata=$("#khata").val();
        var part=$("#part").val();
        var api_key=$("#api_key").val();
        var csc_name=$("#csc_name").val();
        var ref_no=$("#ref_no").text();
        if((village === "null" && khata==="null" && get==="null" && part ==="null" && api_key==="null") || village === '' || khata === '' || part ==='' || get === '' || api_key === '')
        {
             $("#loading-screen").hide();
//           alert("Invalid Parameter"); 
             $("#error_msg").css("display","");
             $("#error").html('<?php echo $error; ?></br><br>THANKS YOU FOR VISIT US</br><a onclick="javascript:close();" href="#">GO BACK FROM HERE</a>');
                 return false;
        }else
            {
                $.ajax(
                    {
                        url: "http://164.100.230.206/WebService_Edistrict/service",
                        data:{
                            village:village,
                            part:part,
                            khata:khata,
                            get:get,
                            cscname:csc_name,
                            ref_no:ref_no,
                            api_key:api_key,
                         //   cscaddress:'OM HARI TELECOM, Nagla Padam, गभाना, चण्डौस, अलीगढ'
                        },
                        success:function(response){
                            var data=response;
                            if(data.RESPONSE){ 
                                $("#loading-screen").hide();
                                $("*[ng-cloak]").removeAttr("ng-cloak");
                                var namex="",fatherx="",addressx="",khasra_nox="",k_ser_nox="00002";
                                var temp_c=0,count=0,tot_area=0,tot_order=0,tot_remark=0,aString="",yr_co_tenx="",lr_payblex="",order_descx="",remark_descx="";
                                var areax="0.0000";
                                var records=data.DATA.records;
                                var signed_by=data.DATA.signed_by; 
                                var ror_id=data.DATA.ror_id;
                                var district_code=data.DATA.district_code_census;
                                var district_name=data.DATA.district_name_hindi;
                                var tehsil_code=data.DATA.tehsil_code_census;
                                var tehsil_name=data.DATA.tehsil_name_hindi;
                                var pargana_code=data.DATA.pargana_code_census;
                                var pargana_name=data.DATA.pargana_name_hindi;
                                var fasli_year=data.DATA.fasli_year;
                                var village_code=data.DATA.village_code_census;
                                var village_name=data.DATA.vname;
                                if(Object.prototype.toString.call( records ) === '[object Array]'){
                                    records.forEach(function(node){
                                        if(node["name"]!==""){
                                            namex+=node["name"] +" / " + node["father"] + " / " +node["address"] +"<br>";                                
                                        }
                                        fatherx+=node["father"]+"<br>";
                                        addressx+=node["address"]+"<br>";
                                        khasra_nox+=node["khasra_no"]+"<br>"; 
                                        if(node["area"]!=="0"){
                                        areax=node["area"];   
                                        aString +=areax+"<br>";
                                        tot_area=(+tot_area)  + (+areax);
                                        }       
                                        
                                       
                                        if(temp_c===0){
                                            yr_co_tenx+=node["yr_co_ten"];
                                        }
                                        if(node["land_revenue_payable"]!=="0"){
                                            lr_payblex=node["land_revenue_payable"];
                                        } 
                                       if(node["order_desc"]!==""){
                                           order_descx+=node["order_desc"]+"<br><br>"; 
                                           tot_order++;
                                       }
                                        if(node["remark_desc"]!==""){
                                            remark_descx+=node["remark_desc"]+"<br><br>";  
                                            tot_remark++;
                                        }
                                        
                                        if(order_descx===""){
                                              order_descx= "";
                                        }
                                        if(remark_descx===""){
                                              remark_descx= "";
                                        }
                                        if(node["khasra_no"]!==""){
                                        count++;
                                        }
                                        temp_c++;
                                        });
                                        $("#ror_id").html(ror_id);
                                        $("#namex").html(namex);
                                        $("#khasra_nox").html(khasra_nox);
                                        $("#aString").html(aString);
                                        $("#yr_co_tenx").html(yr_co_tenx);
                                        $("#lr_payblex").html(lr_payblex);
                                        $("#order_descx").html(order_descx);
                                        $("#remark_descx").html(remark_descx);
                                        $("#count").html(count);
                                        $("#tot_area").html((Math.round(tot_area*10000.0)/10000.0));
                                        stringtohindi($("#count").text(),$("#tot_area").text(),$("#lr_payblex").text());
                                        $("#tot_order").html(tot_order);
                                        $("#tot_remark").html( tot_remark);
                                        $("#village_code").append(village_code);
                                        $("#village_name").append( village_name +" / "+ pargana_name);
                                        $("#district_code_census").val(district_code);
                                        $("#tehsil_code_census").val(tehsil_code);
                                        $("#pargana_code_census").val(pargana_code);
                                        $("#tehsil_name").append(tehsil_name);
                                        $("#district_name").append(district_name);
                                        $("#fasli_year").append(fasli_year);
                                        $("#partt").append(part);
                                        $("#khata_number").append(khata);
                                        $("#signed_by").append(signed_by);
                                        $("#signed_by2").append(signed_by);
                                        $("#district_tehsil").html("<b>तहसील: </b>"+tehsil_name+"  <b>जनपद:</b>"+district_name);
                                        $("#land_type").append(data.DATA.land_type + " / " + data.DATA.land_type_desc );  
                                       // window.print();
                                        }else{
                                           namex="";
                                           fatherx="";
                                           addressx="";
                                           khasra_nox="";
                                           aString="";
                                           yr_co_tenx="";
                                           order_descx="";
                                           remark_descx="";
                                        }
                                        //comment it when run on local for testing
                                        //csc_webservice(ref_no,$("#ror_id").text());
                                        var date=new Date();
                                        var currdate= date.getDate() + '-' + (date.getMonth()+1) + '-' + date.getFullYear();
                                        var qrtext=$("#ror_id").text()+"@"+currdate+"@"+ref_no+"@"+village+"@"+tehsil_code+"@"+district_code+"@"+fasli_year+"@"+part+"@"+khata+"@"+count+"@"+$("#tot_area").text()+"@"+lr_payblex+"@"+tot_order+"@"+tot_remark;
                                        $.post("http://164.100.230.206/csc_webservice.jsp",{"act":"genqrcode", "qrtext":qrtext,"ref_no":ref_no}).done(function(data){
                                        var d=$.parseJSON(data);
                                        if(isJson(data)){
                                            data=$.parseJSON(data);
                                            $("#ror_id").text();
                                            $("img#qr_code").attr("src","http://164.100.230.206/WebService/JasperReports/QRCode/_QRCode.JPG");
                                          //  window.print();
                                        }else{
                                            alert("Invalid Response 1");
                                        }
                                    }).fail(function(e){
                                      //  alert("Invalid Response 2");
                                       $("img#qr_code").attr("src","https://chart.googleapis.com/chart?chs=50x50&cht=qr&choe=UTF-8&chl="+qrtext);
                                      setTimeout(function(){loadset(); }, 1000);
                                    });
                                   // window.print();
                            }else{
                                $("#loading-screen").hide();
                                $("#error_msg").css("display","");
                                $("#error").html(data.ERROR_MESSAGE);
                            }
                             
                        }
                    }
                ).done(function(response){   
                }).fail(function(e){
                    alert("Invalid Response 3");
                });
               $("a.print-report").click(function(e){
                e.preventDefault();
                PrintContent();
            });
            function PrintContent()
            {
                var DocumentContainer = document.getElementById('mdn-container');
                var WindowObject = window.open('','', "ContentData","width=740,height=325,top=200,left=250,toolbars=no,scrollbars=yes,status=no,resizable=no");
                WindowObject.document.writeln(DocumentContainer.innerHTML);
                WindowObject.document.close();
                WindowObject.focus();
                WindowObject.print();
              //  WindowObject.close();
            }
            function loadset(p)
		{
		var srch='';
		ref=$("#ref_no").text();
		rorid=$("#ror_id").text();
		name=$("#namex").text();
	//	url = 'pc.php';
	//	$.get(url, 
	//	function(data) {})
		 $.post("pc.php",{id:ref,ror:rorid,name:name}).done(function(data){})
		}
            function stringtohindi(khata,area,revenue){
                $.post("http://164.100.230.206/csc_webservice.jsp",{act:"stringtohindi",khata_hindi:khata,area_hindi:area,revenue_hindi:revenue}).done(function(data){
                if(isJson(data)){
                    data=$.parseJSON(data);
                    $("#khata_hindi").append(data.khata_hindi);
                     $("#area_hindi").append(data.area_hindi + "(हेक्टेयर)");
                      $("#revenue_hindi").append(data.revenue_hindi + "रुपये");
                }
                else{
                    alert("Invalid Response From The Server!");
                }
                }).fail(function(e){
                    alert(e.status);
                });
            }
            function isJson(str) {
                try {
                    JSON.parse(str);
                    } catch (e) {
                    return false;
                    }
                return true;
            }
            function csc_webservice(ref_no,ror_id) 
            {
                $.post("http://164.100.230.206/csc_webservice.jsp",{act:"cscwebservice",ref_no:ref_no,ror_id:ror_id}).done(function(data){
                if(isJson(data)){
                    data=$.parseJSON(data);
//                    alert(data.Result);
                    $("#result").val(data.Result);
                }
                else{
                    alert("Invalid Response From The Server!");
                }
    
                }).fail(function(e){
                   // alert(e.status);
                });
            }
         }
            
 
    });
    
    </script>

<script>

<script>

