<?php
session_start();
//session file
if(file_exists("session.php")){include_once('session.php');}else{include_once('../session.php');}
// session file

if($utype!='ADMIN')
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
    <legend>USER LIST</legend>
    
<p>
<?php include_once('menu.php'); ?>
</p> 
  
  
  <div id="rech_div" style="float:left;width:100%;">
  <table width="99%" border="0" ><tr><td  width="15%"><input type="button" class="button2" id="admin" onclick="fund('1',this.id)";" value="SELF ADD FUND" style="padding:3px;" /></td></tr>
  </table>
    
    
  <div id="hstrydiv" style="margin-top:10px;">
    <table width="80%" cellspacing="0" cellpadding="0" border="0" class="grid_table wf" style=" margin-bottom:0; font-size:40px !important;">
      <thead>
        <tr>
          <th width="5%">ID</th>
          <th width="10%">UNAME</th>
          <th width="10%">PASSWORD</th>
          <th width="25%">NAME</th>
          <th width="5%">BALANCE</th>
          <th width="25%">MANAGE</th>
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

$sql = "SELECT * FROM user WHERE `username`!='admin' ORDER BY id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    if($row["status"]=='INACTIVE')
    {
    	echo '<tr bgcolor="#f44277" style="color:white;">';
    }
    else
    {
    	echo '<tr bgcolor="06BD27" style="color:white;">';
    }
        echo '<td width="5%">'. $row["id"]. '</td>';
        echo '<td width="10%">'. $row["username"]. '</td>';
        echo '<td width="10%">'. $row["password"]. '</td>';
        echo '<td width="25%">'. $row["name"]. '</td>';
        echo '<td width="5%">'. $row["bal"]. '</td>';
        echo '<td  width="25%"><input type="button" id="'.$row['username'].'" onclick="fund('.$row['id'].',this.id)";" value="FUND" style="padding:3px;" /><input type="button" class2="button2" id="'.$row['username'].'" onclick="login(this.id)";" value="LOGIN" style="padding:3px;" /><input type="button" id="'.$row['username'].'" onclick="status('.$row['id'].',this.id)";" value="STATUS" style="padding:3px;" /></td>';

    	echo '</tr>';
    }
} else {
    echo '<td colspan="7" style="color:red" align="center" height="20">NO SEARCH RESULT FIND</td>';
}

$conn->close();
?> 
         
        </tr>
          </tbody>
        
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
    $.date_input.initialize();
	document.getElementById('cred_radio').checked = true;
	document.getElementById("u_span").style.color='blue';
    function raisediv(id) {
        $("#raisedisp").show();
        $("#hstrydiv").hide();
        $("#trans_idd").html(id);
        $("#trans_id").val(id);
    }
 ///////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////
function login(as)
{
window.location ="index.php?login2="+as;
}
    function raise(){
        var trans_id = $("#trans_id").val();
        var msg = $("#msg").val();
        $("#error").html("<span style='color:orange'>Please Wait...</span>");
        $.post("history.php", {
            trans_id: trans_id,
            msg: msg
        }, function(data) {
            if (data.search('msg_error') > 0) {
                $("#error").html("<span style='color:red'>" + data + "</span>");
            }
            else {
                $("#error").html("<span style='color:green'>" + data + "</span>");
            }

        });
    }
    ////////////////////////////////////////////////
    
	    function fund(id,name)
 	    {
 	    var sechtml = '<form><div id="security_innerdiv"><label>AMOUNT TO ADD IN USER ID:-'+name+'</label><span id="security_error"></span><input id="sec_pin" class="textfield large" type="text" maxlength="5" title="Please Enter Amount" onkeyup="number(this,252)" placeholder="ENTER AMOUNT"><label>COMMENT</label><input id="comm" class="textfield large" type="text" placeholder="ENTER COMMENT"><input id="fuid" value="'+id+'" type="hidden"><div style="float:left; margin-top:10px; border:none !important;"><!--<input type="button" name="sec_forget" id="sec_forget" onclick="Security_forg();" class="button2" value="FORGET PIN" />--><input type="button" name="sec_button" id="sec_button" onclick="fund3();" class="button2" value="ADD FUND" /></div></div></form>';
			$('#fck').trigger('click');
			$('#msg1').html(sechtml);
	    }
	    function fund3() {
    var sec_pin = $("#sec_pin").val();
    var id = $("#fuid").val();
    if (sec_pin == '' || sec_pin == null || sec_pin.length < 1 || sec_pin.length >5 || isNaN(sec_pin)) 
    		{
        $("#security_error").html("<span style=color:red;font-weight:bold;>Please Enter a Valid Amount</span>");
        return false;
    		}
    		else
    		{
    		$("#security_error").html("<span style=color:orange;font-weight:bold;>Please Wait......</span>");
    		fund2();
    		}
    }
	
	function fund2(id,amt){
	var id=$("#fuid").val();
	var amt=$("#sec_pin").val();
	var comm=$("#comm").val();
        $('#msg2').css('display', 'none');
        $('#fck').trigger('click');
        //var amt= $("#amount").val();
	//amt=prompt('PLEASE ENTER AMOUNT');
	//alert(comm);
	//return false;
	
	loading('msg1', 'l');
	 $.post("history/fund.php",{amt:amt,id:id,comm:comm},
		function(data){
			$('#msg2').css('display', 'block');
			$('#fck').trigger('click');
			$('#msg1').html(data);
			userlist();
			});
		
	}
	

function status(id,name)
 {
 	    var sechtml = '<form><div id="security_innerdiv"><label>SELECT STATUS FOR USER:-'+name+'</label><span id="security_error"></span><select id="userstatus"><option value="ACTIVE">ACTIVE</option><option value="INACTIVE">INACTIVE</option></select><input id="fuid" value="'+id+'" type="hidden"><div style="float:left; margin-top:10px; border:none !important;"><!--<input type="button" name="sec_forget" id="sec_forget" onclick="Security_forg();" class="button2" value="FORGET PIN" />--><input type="button" name="sec_button" id="sec_button" onclick="status2();" class="button2" value="UPDATE STATUS" /></div></div></form>';
			$('#fck').trigger('click');
			$('#msg1').html(sechtml);
}
function status2() 
{

    		$("#security_error").html("<span style=color:orange;font-weight:bold;>Please Wait......</span>");
    			var id=$("#fuid").val();
			var status=$("#userstatus").val();
		loading('msg1', 'l');
      		$('#msg2').css('display', 'none');
     		$('#fck').trigger('click');
		 $.post("history/fund.php",{status:status,id:id},
			function(data){
				$('#msg2').css('display', 'block');
				$('#fck').trigger('click');
				$('#msg1').html(data);
				userlist();
				});
    		
    }
	

	
////////////////////////////////////////////////////////////////
	
	function cleardue(id){
		var y = confirm("Are you sure to clear the due?");
		if(y==false)
		  return false;
		$.post("history.php", {
			id: id
		}, function(data) { 
			$('#fck').trigger('click');
			$('#msg1').html(data);
			creditsheet('');
		});
	}
	
////////////////////////////////////////////////////////////////	
	function userlist(){
		var url = 'history/userlist.php';
		$('#rech_div').fadeTo("fast", 0.33);
		$('#proccssing').css('display','block');
		$('#proccssing').html('Processing....');
		$.get(url, 
		function(data) { 
			$('#proccssing').css('display','none');
			$('#hstry').fadeTo("slow", 1);
			$('#hstry').html(data);
		});
	}

	function clist(){
		var url = 'history/credit.php';
		$('#rech_div').fadeTo("fast", 0.33);
		$('#proccssing').css('display','block');
		$('#proccssing').html('Processing....');
		$.get(url, 
		function(data) { 
			$('#proccssing').css('display','none');
			$('#hstry').fadeTo("slow", 1);
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
      <h2>ADD USER</h2>
    </div>
    <div class="modal-body">
      <p style="color:red">PLEASE FILL ALL DETAILS</p>
     
<form id="frm_details" name="frm_details" autocomplete="off">


<table>

<tr>
<td style="width:200px">COMPANY<span style="color:red">*</span>:-</td><td>			<input id="frm_com" list="mocom" autocomplete="off"></td>
<tr><td style="width:200px">MODAL<span style="color:red">*</span></td><td> 			<input id="frm_modal"  list="momodal"></td></tr>
<tr><td style="width:200px">PRICE AT BOX</td><td>						<input id="frm_bprice" ></td></tr>
<tr><td style="width:200px">PRICE TO YOU<span style="color:red">*</span></td><td>		<input id="frm_pprice"></td></tr>
<tr><td style="width:200px">PRICE FIXED TO CUSTOMER<span style="color:red">*</span></td><td>	<input id="frm_fprice" ></td></tr>
</table>


<input type="button" class="button2" id="addmobtn" onclick="adduser()" value="ADD USER">
 </form>
 
<script>
 function adduser()
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
    