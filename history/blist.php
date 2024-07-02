<?php
//session file
if(file_exists("session.php")){include_once('session.php');}else{include_once('../session.php');}
// session file

if($utype!='ADMIN' && $utype!='SUB~ADMIN')
{
$_SESSION['user']='';
echo '<script>window.location ="index.php";</script>';
die('PLEASE WAIT');
}
?>
   <div>
      <div style="display:block; width:auto; height:auto; " id="rech_history"> 
        <script>
//$('#prcg').css('display','none');
$('#prcg').html('Loading Data..');
//$('body').fadeTo("fast", 0.20);
//$('#prcg').fadeTo("fast", 1);
</script>
        <div id="hstry" style="float:left; width:650px; height:auto; overflow:hidden;">
          <style type="text/css">
.odd{ background:#ebf7ff;}
.even{ background:#FFF;}
.odd td,.even td{ border-bottom:none;}

 .odd tr:hover{ background:#ebf7ff !important;}
 .even tr:hover{ background:#FFF !important;}
</style>
<div  id="hstrytble"></div>

 <fieldset>
    <legend>MOBILE / BILL LIST</legend>
<p><?php include('menu.php'); ?></p> 
  
  <div id="rech_div" style="float:left;width:100%;">
  <table width="99%" border="0" ><tr><td  width="15%">
  
<input type="button" class="button2" id="myBtn" value="ADD MOBILE" style="padding:3px;" />
<input type="button" class="button2" onclick="shpage('history/blist.php?search=')" value="ALL" style="padding:3px;" />
<input type="button" class="button2" onclick="shpage('history/blist.php?search=availble')" value="ONLY AVAILBLE" style="padding:3px;" />
<input type="button" class="button2" onclick="shpage('history/blist.php?search=oof')" value="OUT OF STACK" style="padding:3px;" />
  
  </td>
   </tr>
  </table>
    
    
  <div id="hstrydiv" style="margin-top:10px;">
    <table width="80%" cellspacing="0" cellpadding="0" border="0" class="grid_table wf" style=" margin-bottom:0; font-size:40px !important;">
      <thead>
        <tr>
          <th width="5%">ID</th>
          <th width="15%">ADD DATE</th>
          <th width="20%">COM/MODAL</th>
          <th width="20%">P/F/S PRICE</th>
          <th width="10%">STATUS</th>
          <th width="24%">MANAGE</th>
        </tr>
      </thead>
    </table>
    <div style="float:left; width:99%; overflow:auto; height:230px;">
      <table width="80%" cellspacing="0" cellpadding="0" border="0" class="grid_table wf" style="line-height:22px; font-size:40px !important;">
        <tbody id="hbdy">
                  <style>
.trd td{ border-bottom:none;}
.payment_div {
	float:left;
	width:100%;
	word-wrap:break-word;
	background-color:#fff;
	padding:1%;
	/*margin: 0 1em 0.3em;*/
	margin-bottom:1%;
	/*padding-right:0;*/
	border:1px solid #CCC;
	line-height:2.8em;
	border-radius:5px;
}
.payment_div p {
	line-height:1em;
}
.fbold{ font-weight:bold !important;}
</style>
        <tr>
 
<?php

$servername = "localhost";
$username = "hcemr8ri9wai";
$password = "Hps202132@";
$dbname = "ohtdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql1='';

if($_REQUEST['search']=='availble')
{
$sql1="WHERE `status`='AVAILBLE'";
}
elseif($_REQUEST['search']=='oof')
{
$sql1="WHERE `status`!='AVAILBLE'";
}

$sql = "SELECT * FROM mobill ".$sql1;


$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<tr>";
        echo '<td width="5%">'. $row["id"]. '</td>';
        echo '<td width="15%">'. $row["adate"]. '</td>';
        echo '<td width="20%">'. $row["com"]. ' '.$row["modal"].'</td>';
        echo '<td width="20%">'. $row["pprice"]. '-'. $row["fprice"]. '-'. $row["sprice"]. '</td>';
if($row["status"]=='AVAILBLE')
{
echo '<td width="10%" bgcolor="#00FF00">AVAILBLE</td>';
echo '<td  width="19%"><input type="button" class="button2" onclick=mbill('.$row['id'].') value="CREATE BILL" style="padding:0px;" />';
}
else
{
echo '<td width="10%" bgcolor="#f44277">O. O. S.</td>';
echo '<td  width="19%"><input type="button" class2="button2" onclick=window.open("bill?id='.$row['billid'].'") value="VIEW" style="padding:0px;" /><input type="button" class2="button2" onclick=mbill('.$row['id'].') value="CREATE" style="padding:0px;" />';
}
echo '</td></tr>';
    	
    					}
} 
else 
{
    echo '<td colspan="7" style="color:red" align="center" height="20">NO SEARCH RESULT FIND</td>';
}

?> 
         
        </tr>
          </tbody>
        
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
    $.date_input.initialize();
	document.getElementById('blist_radio').checked = true;
	document.getElementById("blist_span").style.color='blue';
    function raisediv(id) {
        $("#raisedisp").show();
        $("#hstrydiv").hide();
        $("#trans_idd").html(id);
        $("#trans_id").val(id);
    }
  ///////////////////////////////////////////////
 ///////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////
    
		    function mbill(id)
 	    {
 	// sechtml = '<div><form autocomplete="off"><div id="security_innerdiv"><lable>BUYER NAME</lable><span id="security_error"></span><input style="width:350px" id="bill_buyer" class="textfield"><span>BUYER ADD</span><input style="width:350px" id="bill_buyeradd" value="NAGLA PADAM" class="textfield"><span>PRICE</span><input style="width:350px" id="bill_price" class="textfield"><span>IMEI1</span><input style="width:350px" id="bill_imei1" class="textfield"><span>IMEI2</span><input style="width:350px" id="bill_imei2" class="textfield"><span>CHARGER</span><input style="width:350px" id="bill_charger" class="textfield"><span>BATTERY</span><input style="width:350px" id="bill_battery" class="textfield"><span>WARRANTY</span><select id="bill_warranty" style="width:345px"><option value="ALL WARANTTY BY SERVICE CENTER ONLY , NO WARRANTY BY OM HARI TELECOM">YES</option><option value="THIS PRODUCT HAS NO WARRANTY">NO</option></select><input id="fuid" value="'+id+'" type="hidden"><div style="float:left; margin-top:10px; border:none !important;"><input type="button" name="sec_button" id="sec_button" onclick="mbill1();" class="button2" value="SUBMIT" /></div></div></form></div>';
 	 
 	 sechtml = '<div><form autocomplete="off"><div id="security_innerdiv"><span id="security_error"></span><input placeholder="BUYER NAME" style="width:350px" id="bill_buyer" class="textfield"><input placeholder="BUYER ADD" style="width:350px" id="bill_buyeradd" value="NAGLA PADAM" class="textfield"><input placeholder="PRICE" style="width:350px" id="bill_price" class="textfield"><input placeholder="IMEI1" style="width:350px" id="bill_imei1" class="textfield"><input placeholder="IMEI2" style="width:350px" id="bill_imei2" class="textfield"><input placeholder="CHARGER" style="width:350px" id="bill_charger" class="textfield"><input placeholder="BATTERY" style="width:350px" id="bill_battery" class="textfield"><select id="bill_warranty" style="width:345px"><option value="">WARRRANTY</option><option value="ALL WARANTTY BY SERVICE CENTER ONLY , NO WARRANTY BY OM HARI TELECOM">YES</option><option value="THIS PRODUCT HAS NO WARRANTY">NO</option></select><input id="fuid" value="'+id+'" type="hidden"><div style="float:left; margin-top:10px; border:none !important;"><input type="button" name="sec_button" id="sec_button" onclick="mbill1();" class="button2" value="SUBMIT" /></div></div></form></div>';
			$('#fck').trigger('click');
			$('#msg1').html(sechtml);
	    }
	    
	function mbill1() {
    var buyer= $("#bill_buyer").val();
    var price= $("#bill_price").val();
    var buyeradd= $("#bill_buyeradd").val();
    var imei1= $("#bill_imei1").val();
    var imei2= $("#bill_imei2").val();
    var charger= $("#bill_charger").val();
    var battery= $("#bill_battery").val();
    var warranty= $("#bill_warranty").val();
    var id = $("#fuid").val();
    if (buyer== '' || buyeradd== '' || imei1== '' || warranty== '') 
    		{
        		$("#security_error").html("<span style=color:red;font-weight:bold;>INVALID DATA PLEASE CHECK AGAIN</span>");
       			 return false;
    		}
    		else
    		{
    		$("#security_error").html("<span style=color:orange;font-weight:bold;>Please Wait......</span>");
				loading('msg1', 'l');
				$('#msg2').css('display', 'none');
				$('#fck').trigger('click');
			$.post("bill/cbill.php",{id:id,buyer:buyer,badd:buyeradd,imei1:imei1,imei2:imei2,charger:charger,battery:battery,warranty:warranty,price:price},
					function(data){
				$('#msg2').css('display', 'block');
				$('#fck').trigger('click');
				$('#msg1').html(data);
				}); 
    		}
    }
	
////////////////////////////////////////////////////////////////
	
	function cview(id){
		$.post("credit/view.php", {
			id: id
		}, function(data) { 
			//$('#cview').html(data);
			openWin2('credit/view.php?id=40');
		});
	}
	
////////////////////////////////////////////////////////////////	
	function userlist(){
		var url = 'history/userlist.php';
		//$('#hstry').fadeTo("fast", 0.33);
		$('#proccssing').css('display','block');
		$('#proccssing').html('Processing....');
		$.get(url, 
		function(data) { 
			$('#proccssing').css('display','none');
		//	$('#hstry').fadeTo("slow", 1);
			$('#hstry').html(data);
		});
	}
	
	function clist(data){
		var url = 'history/credit.php?'+data;
		//$('#hstry').fadeTo("fast", 0.33);
		$('#proccssing').css('display','block');
		$('#proccssing').html('Processing....');
		$.get(url, 
		function(data) { 
			$('#proccssing').css('display','none');
			//$('#hstry').fadeTo("slow", 1);
			$('#hstry').html(data);
		});
	}
	


	
</script>         </div>
        <!--=========Pagination=========--> 
        <!--End Pagination--> 
      </div>
      <div style="float:left; width:650px; height:400px; display:none;" id="export_div">
        <form>
          <fieldset>
            <legend>Export Recharge History</legend>
          </fieldset>
        </form>
        <div></div>
      </div>
    </div>
    
    
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 500px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */


.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
</head>
<body>


<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h2>ADD MOBILE IN MOBILE LIST</h2>
    </div>
    <div class="modal-body">
      <p style="color:red">PLEASE FILL ALL DETAILS</p>
     
<form id="frm_details" name="frm_details" autocomplete="off">


<?php
$date=date('Y-m-d');
$date = strtotime($date);
$date = strtotime("+20 day", $date);
$d=date('Y-m-d', $date);
?>

<table>

<tr>
<td style="width:200px">COMPANY<span style="color:red">*</span>:-</td><td>			<input id="frm_com" list="mocom" autocomplete="off"></td>
<tr><td style="width:200px">MODAL<span style="color:red">*</span></td><td> 			<input id="frm_modal"  list="momodal"></td></tr>
<tr><td style="width:200px">PRICE AT BOX</td><td>						<input id="frm_bprice" ></td></tr>
<tr><td style="width:200px">PRICE TO YOU<span style="color:red">*</span></td><td>		<input id="frm_pprice"></td></tr>
<tr><td style="width:200px">PRICE FIXED TO CUSTOMER<span style="color:red">*</span></td><td>	<input id="frm_fprice" ></td></tr>
</table>

<datalist id="mocom">
    <option value="INTEX">
    <option value="LAVA">
    <option value="MICROMAX">
    <option value="MAXKING">
    <option value="CXTEL">
    <option value="VITEL">
    <option value="KECHADDA">
    <option value="KEKAI">
    <option value="FORME">
    <option value="ITEL">
    <option value="JIVI">
    <option value="JIO">
    <option value="NOKIA">
    <option value="SAMSUNG">
    <option value="MI">
</datalist>

<?php
$sql = "SELECT * FROM mobill ";


$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
 echo '<datalist id="momodal">';
    while($row = $result->fetch_assoc()) 
    {
        echo '<option value="'.$row['modal'].'">'. $row['com']. '</option>';

    }
echo '</datalist>';
} 
?>




<input type="button" class="button2" id="addmobtn" onclick="addmo()" value="ADD MOBILE">
 </form>
 
<script>
 function addmo()
{
	var com=$("#frm_com").val();
	var modal=$("#frm_modal").val();
	var bprice=$("#frm_bprice").val();
	var pprice=$("#frm_pprice").val();
	var fprice=$("#frm_fprice").val();
$("#addmobtn").attr("disabled", "disabled");
$("#addmobtn").val("PLEASE WAIT");
	 $.post("bill/create.php",{req:'add',com:com,modal:modal,bprice:bprice,pprice:pprice,fprice:fprice},
		function(data)
		{
			$('#statusdue').html(data);
			$("#addmobtn").removeAttr("disabled");
			$("#addmobtn").val("ADD MOBILE");
		});
		
}
</script>
      </p>
      
    </div>
    <div class="modal-footer">
      <h3>STATUS:- <span id="statusdue"></span></h3>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


</script>

</body>
</html>
