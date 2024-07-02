<?php
session_start();
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
    <legend>CREDIT LIST</legend>
<p><?php include('menu.php'); ?></p> 
  
  <div id="rech_div" style="float:left;width:100%;">
  <table width="99%" border="0" ><tr><td  width="15%">
  
<input type="button" class="button2" id="myBtn" value="ADD DUE" style="padding:3px;" />
<input type="button" class="button2" onclick="clist('search=all')" value="ALL UNCLEARED DUES" style="padding:3px;" />
<input type="button" class="button2" onclick="clist('search=today')" value="BEFORE TODAY DUES" style="padding:3px;" />
<input type="button" class="button2" onclick="clist('search=clear')" value="CLEARED DUES" style="padding:3px;" />
<input type="button" class="button2" onclick="todaysms()" value="SMS" style="padding:3px;" />

<input type="button" class="button2" onclick="shpage('history/creditchart.php?search=')" value="VIEW AS CHART" style="padding:3px;" />


<input style="width:50%" class="textfield" list="cnamelist" value="<?php echo $_REQUEST['name']; ?>" placeholder="SEARCH BY NAME MOBILE NO." onblur="clist('search=name&name='+this.value)" id="searchname">



  </td>
   </tr>
  </table>
    
    
  <div id="hstrydiv" style="margin-top:10px;">
    <table width="80%" cellspacing="0" cellpadding="0" border="0" class="grid_table wf" style=" margin-bottom:0; font-size:40px !important;">
      <thead>
        <tr>
          <th width="5%">ID</th>
          <th width="10%">DATE</th>
          <th width="25%">NAME</th>
          <th width="10%">MO</th>
          <th width="10%">DUEDATE</th>
          <th width="5%">AMOUNT</th>
          <th width="34%">MANAGE</th>
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

$sql1=" WHERE `amt`!='0' ";
if($_REQUEST['search']=='today')
{
$nday= date('Y-m-d', strtotime($date .' +1 day'));
$sql1="WHERE `amt`!='0' AND `duedate`<'$nday'";
}
elseif($_REQUEST['search']=='clear')
{
$sql1="WHERE `amt`='0'";
}
elseif($_REQUEST['search']=='name')
{
	if($_REQUEST['name']!='')
	{
	$name=$_REQUEST['name'];
	$sql1="WHERE `name`='$name'";
	}
}

$sql = "SELECT * FROM creadit $sql1";
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<tr>";
        echo '<td width="5%">'. $row["id"]. '</td>';
        echo '<td width="10%">'. $row["cdate"]. '</td>';
        echo '<td width="25%">'. $row["name"]. '</td>';
        echo '<td width="10%">'. $row["mo"]. '</td>';
        $date= date('d/m/Y', strtotime($row["duedate"]));
        echo '<td width="10%">'.$date. '</td>';
if($row['amt']=='0')
{
        echo '<td width="5%">'. $row["samt"]. '</td>';
        echo '<td  width="34%">
<input type="button" class="button2"onclick=openWin2("credit/view.php?id='.$row['id'].'","cview") style="padding:0px;" value="VIEW FULL DETAILS" /></td>';
}
else
{
        echo '<td width="5%">'. $row["amt"]. '</td>';
        echo '<td  width="34%"><input type="button" class2="button2" onclick=due('.$row['id'].',"amt","PLEASE_ENTER_AMOUNT_PAIDED_BY_CUSTOMER","amt","number") value="PAID" style="padding:0px;" />';
        echo '
      <input type="button" class2="button2" placeholder="date" onclick=due('.$row['id'].',"amt","PLEASE_ENTER_NEXT_DUE_DATE","date","date") value="DATE" style="padding:0px;" />
	 <input type="button" class2="button2"onclick="duesms('.$row['id'].',this.placeholder)";" style="padding:0px;" placeholder="हैलो '.$row['name'].',
आपने दिनांक '.$row["cdate"].' को ओम हरि टेलीकॉम से '.$row["amt"].' रू का उधार लिया था।
आपका वायदा '.$date.'  का था और आज  '.date('d/m/Y').' हो गयी है।
अत: कृपया दुकान पर जाकर अपना बकाया भुगतान अदा करें।
Thank&Regard
Om Hari Telecom
+919758684152" value="SMS" />
        
<input type="button" class2="button2"onclick=openWin2("credit/view.php?id='.$row['id'].'","cview") style="padding:0px;" value="VIEW" />
        
         </td>';
}
    	echo '</tr>';
    	
    					}
} 
else 
{
    echo '<td colspan="7" style="color:red" align="center" height="20">NO SEARCH RESULT FIND</td>';
}

//$conn->close();
?> 
         
        </tr>
          </tbody>
        
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
    $.date_input.initialize();
	document.getElementById('cred2_radio').checked = true;
	document.getElementById("c_span").style.color='blue';
    function raisediv(id) {
        $("#raisedisp").show();
        $("#hstrydiv").hide();
        $("#trans_idd").html(id);
        $("#trans_id").val(id);
    }
    ///////////////////////////////////////////////
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
    
		    function due(id,name,lable,type,c)
 	    {
 	 sechtml = '<form onsubmit="due3();reurn false;"><div id="security_innerdiv"><label>'+lable+'</label><span id="security_error"></span><span id="252" style="color:red"></span><input style="width:350px" id="sec_pin" class="textfield" type="'+c+'" placeholder=""><input id="fuid" value="'+id+'" type="hidden"><input id="aatype" value="'+type+'" type="hidden"><div style="float:left; margin-top:10px; border:none !important;"><input type="button" name="sec_button" id="sec_button" onclick="due3();" class="button2" value="SUBMIT" /></div></div></form>';
			$('#fck').trigger('click');
			$('#msg1').html(sechtml);
	    }

		    function duesms(id,sms)
 	    {
 	 sechtml = '<form onsubmit="due3();return false;"><div id="security_innerdiv"><label>ENTER SMS</label><span id="security_error"></span><textarea rows="10" style="width:350px" id="sec_pin" class="textfield" type="text" placeholder="">'+sms+'</textarea><input id="fuid" value="'+id+'" type="hidden"><input id="aatype" value="sms" type="hidden"><div style="float:left; margin-top:10px; border:none !important;"><input type="button" name="sec_button" id="sec_button" onclick="due3();" class="button2" value="SUBMIT" /></div></div></form>';
			$('#fck').trigger('click');
			$('#msg1').html(sechtml);
	    }
	    
	    function due3() {
    var sec_pin = $("#sec_pin").val();
    var id = $("#fuid").val();
    if (sec_pin == '' || sec_pin == null ) 
    		{
        $("#security_error").html("<span style=color:red;font-weight:bold;>INVALID COMMAND</span>");
        return false;
    		}
    		else
    		{
    		$("#security_error").html("<span style=color:orange;font-weight:bold;>Please Wait......</span>");
    		due2();
    		}
    }
	
	function due2(id,amt){
	var id=$("#fuid").val();
	var value=$("#sec_pin").val();
	var req=$("#aatype").val();
		 loading('msg1', 'l');
        $('#msg2').css('display', 'none');
        $('#fck').trigger('click');
        //var amt= $("#amount").val();
	//amt=prompt('PLEASE ENTER AMOUNT');
	//alert(amt);
	 $.post("credit/due.php",{value:value,id:id,req:req},
		function(data){
			$('#msg2').css('display', 'block');
			$('#fck').trigger('click');
			$('#msg1').html(data);
			clist('a');
			}); 
		
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
	

function todaysms(){
c=confirm('ARE YOU SURE TO SEND SMS TO ALL DUES OF TODAY');
if(c!=true)
{
return false;
}
	loading('msg1', 'l');
        $('#msg2').css('display', 'none');
        $('#fck').trigger('click');
	 $.post("credit/smstoday.php",{req:'sms'},
		function(data){
			$('#msg2').css('display', 'block');
			$('#fck').trigger('click');
			$('#msg1').html(data);
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
      <h2>ADD CREDIT CUSTOMER</h2>
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
<td style="width:200px">CUSTOMER NAME<span style="color:red">*</span>:-</td><td><input id="frm_name" name="name" list="cnamelist"></td>
<tr><td style="width:200px">MOBILE NO.<span style="color:red">*</span></td><td> <input id="frm_mo"  name="mo" list="cmolist"></td></tr>
<tr><td style="width:200px">ADDITIONAL MOBILE NO.</td><td><input id="frm_amo"  name="amo"></td></tr>
<tr><td style="width:200px">DUE DATE.<span style="color:red">*</span></td><td><input id="frm_date" min='<?php echo date('Y-m-d'); ?>' max='<?php echo $d; ?>' name="date" type="date"></td></tr>
<tr><td style="width:200px">CREDIT AMOUNT.<span style="color:red">*</span></td><td><input id="frm_amt"  name="amt"></td></tr>
<tr><td style="width:200px">REASON FOR CREDIT.<span style="color:red">*</span></td><td><input id="frm_comment"  name="comment" type="text"></td></tr></tr>
</table>
<input type="button" class="button2" onclick="adddue()" id="addmobtn" value="ADD CUSTOMER">
 </form>
 

<?php
echo '<datalist id="cmolist">';
$sql = "SELECT * FROM creadit";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['mo'].'">'. $row["name"]. '</option>';
    	
    }
} 
echo '</datalist>';

echo '<datalist id="cnamelist">';
$sql = "SELECT * FROM creadit";
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['name'].'">'. $row["mo"]. ','.$row["amo"].'</option>';
    	
    }
} 
echo '</datalist>';
?> 

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

function adddue()
{
	var name=$("#frm_name").val();
	var mo=$("#frm_mo").val();
	var amo=$("#frm_amo").val();
	var date=$("#frm_date").val();
	var amt=$("#frm_amt").val();
	var comment=$("#frm_comment").val();
	
	
	
$("#addmobtn").attr("disabled", "disabled");
$("#addmobtn").val("PLEASE WAIT");
	
	 $.post("credit/create.php",{req:'add',name:name,mo:mo,amo:amo,date:date,amt:amt,comment:comment},
		function(data)
		{
			$('#statusdue').html(data);
			$("#addmobtn").removeAttr("disabled");
			$("#addmobtn").val("ADD CREDIT CUSTOMER");
		});
		
}
</script>


</body>
</html>
