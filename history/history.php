<?php
session_start();
//session file
if(file_exists("session.php")){include_once('session.php');}else{include_once('../session.php');}
// session file

if($utype=='')
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
    <legend>ROR HISTORY</legend>
    
<p><?php include('menu.php');?></p> 
  
  <div id="rech_div" style="float:left;width:100%;">
  <table width="99%" border="0" >
    <tr>
      <td><input id="search"  class="textfield large" type="text" value="TXN / REF ID" onclick="if(this.value=='TXN / REF ID') this.value='';" onblur="if(this.value=='') this.value='TXN / REF ID';" style="width:85px;"></td>
      
      <td>
      <!-- <input type="button" class="button2" value="SEARCH" onclick="history(-1);" style="padding:3px;" /> --> 
      <img style="height:25px" src="icon/search.png" onclick="history(-1);"></img>
      </td>


 <!--      <td>&nbsp;&nbsp;&nbsp;FROM</td>
    <td><input type="text" id="srch_frm" class="textfield date_input" onkeyup="ShowError('srch_frm',0);"  title="Start Date"  style="width:85px;"  value="09/01/2018"/></td>
      <td>TO</td>
      <td><input type="text" id="srch_to" onkeyup="ShowError('srch_to',0);" class="textfield date_input" title="End Date"  style="width:85px;" value="09/01/2018"/></td>
      <td><select id="srch_stat">
          <option value="" selected="selected">All</option>
          <option value="SUCCESS">SUCCESS</option>
          <option value="FAILURE">FAILED</option>
          <option value="REVERSED">REVERSED</option>
          <option value="DISPUTE">DISPUTE</option>
          <option value="PENDING">PENDING</option>
        </select></td>   
        -->
        
      <td><input type="button" class="button2" onclick="history(1);" value="TODAY REPORT" style="padding:3px;" /></td>
    </tr>
  </table>
  <div id="hstrydiv" style="margin-top:10px;">
    <table width="80%" cellspacing="0" cellpadding="0" border="0" class="grid_table wf" style=" margin-bottom:0; font-size:40px !important;">
      <thead>
        <tr>
          <th width="20%">TXN / REF ID</th>
          <th width="15%">VILLAGE</th>
          <th width="10%">KHATA</th>
          <th width="15%">STATUS</th>
          <th width="12%">DATE</th>
         <th width="10%"><?php if($_SESSION['user']!='admin'){echo 'ROR ID'; }else{echo 'USERNAME';} ?></th>
         <th width="17%">DETAILS</th>
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

if($_SESSION['user']!='admin')
{
$user=$_SESSION['user'];
$u="AND `user`='$user' AND `del`!='1'";
$u2="WHERE `user`='$user' AND `del`!='1'";
}
else
{
	if($_REQUEST['u']!='')
	{
	$use=$_REQUEST['u'];
	$au="AND `user`='$use'";
	$au2="WHERE `user`='$use'";
	}
	else
	{
	$au='';
	$au2='';
	}
	
	if($_REQUEST['del']=='1')
	{
	$u="AND `del`='1'".$au;
	$u2="WHERE `del`='1'".$au;
	}
	elseif($_REQUEST['del']=='2')
	{
	$u=$au;
	$u2=$au2;
	}
	else
	{
	$u="AND `del`!='1'".$au;
	$u2="WHERE `del`!='1'".$au;
	}
}

if($_REQUEST['p']=='1')
{
	if($_REQUEST['s']=='TXN / REF ID')
	{$s=$u2.' ORDER BY txn DESC ';}
	else{$t=$_REQUEST['s'];$s="WHERE `txn`='$t' $u";}
}
elseif ($_REQUEST['p']!='')
{
$date=date('Y-m-d');
$s="WHERE `date` = '$date' $u  ORDER BY txn DESC  ";
}
else
{
$s=$u2.' ORDER BY txn DESC ';
}
$sql = "SELECT * FROM ror $s";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<tr>";
    	if ($_SESSION['user']=='admin')
    	{
    	echo '<td title="click to delet" onclick="del2(this.innerHTML)" width="20%">'. $row["txn"]. '</td>';
    	}
    	else
    	{
    	echo '<td width="20%">'. $row["txn"]. '</td>';
    	}
        
        echo '<td width="15%">'. $row["village"]. '</td>';
        echo '<td width="10%">'. $row["khata"]. '</td>';
        if($row['del']=='1')
        {
        $del='(D)';
        }
        else
        {
        $del='';
        }
        if($row['pc']!='-1')
        {
         echo '<td style="color:blue" width="15%">SUCCESS'.$del.'</td>';
        }
       else
       {
       echo '<td style="color:red" width="15%">FAILED'.$del.'</td>';
       }
        echo '<td width="15%">'. $row["date"]. '</td>';
        if($_SESSION['user']=='admin')
        {
        echo '<td width="10%">'. $row["user"]. '</td>';
        }
        else
        {
        echo '<td width="10%">'. $row["rorid"]. '</td>';
        }

        if($row['pc']!='-1')
        {
      //  echo '<td width="18%"><a href="javascript:" title="'. $row["name"]. '">DETAILS</a></td>';
 echo '<td  width="15%"><input type="button" class="button2" ref="'.$row['txn'].'" onclick="genetatereceipt('.$row['txn'].')";" value="DETAILS" style="padding:3px;" /></td>';
        }
       else
       {
       echo '<td style="color:red" width="15%"></td>';
       }
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
	document.getElementById('rech_radio').checked = true;
	document.getElementById("r_span").style.color='blue';
    function raisediv(id) {
        $("#raisedisp").show();
        $("#hstrydiv").hide();
        $("#trans_idd").html(id);
        $("#trans_id").val(id);
    }
   
///////////////////////////////////////////////////////////////////////
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
	
	function genetatereceipt(id){
		 loading('msg1', 'l');
        $('#msg2').css('display', 'none');
        $('#fck').trigger('click');
		
	 $.post("history/rordetails.php",{greceipt:"greceipt",recid:id},
		function(data){
			$('#msg2').css('display', 'block');
			$('#fck').trigger('click');
			$('#msg1').html(data);
			
			});
		
	}
	
////////////////////////////////////////////////////////////////
	
	function del2(id){
		var y = confirm("Are you sure to Delet ror id: "+id+"?");
		if(y==false)
		  return false;
		loading('msg1', 'l');
		$('#msg2').css('display', 'none');
		$('#fck').trigger('click');
		$.post("ror/del.php", {
			id: id
		}, function(data) { 
			$('#msg2').css('display', 'block');
			$('#fck').trigger('click');
			$('#msg1').html(data);
			history('n');
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
	
function del(){
	id=prompt('PLEASE ENTER 15 DIGIT TXN NO.');
	if(!id || isNaN(id) || id.length !=15)
	{
	return false;
	}
	loading('msg1', 'l');
        $('#msg2').css('display', 'none');
        $('#fck').trigger('click');
	$.post("ror/del.php",{id:id},
		function(data){
			$('#msg2').css('display', 'block');
			$('#fck').trigger('click');
			$('#msg1').html(data);
			history('n');
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