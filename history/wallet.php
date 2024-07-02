<?php
//session file
if(file_exists("session.php")){include_once('session.php');}else{include_once('../session.php');}
// session file

if($utype!='ADMIN' && $utype!='SUB~ADMIN' && $utype!='USER')
{
$_SESSION['user']='';
echo '<script>window.location ="index.php";</script>';
die('PLEASE WAIT');
}
?>
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
   //  echo '<td></td>';    	     
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
    <legend>OHT E~WALLET HISTORY</legend>
<p><?php include('menu.php'); ?></p> 
  
  <div id="rech_div" style="float:left;width:100%;">
  <table width="99%" border="0" ><tr><td  width="15%">


<table>
<tr>
<td><input type="button" class="button2" onclick="shpage('history/wallet.php?search=CREDIT')" value="ONLY CREDIT" style="padding:3px;" /></td>
<td><input type="button" class="button2" onclick="shpage('history/wallet.php?search=DEBIT')" value="ONLY DEBIT" style="padding:3px;" /></td>
<td width="100px"><input type="text" id="srch_frm" class="textfield date_input" readonly onchange="shpage('history/wallet.php?search=date&date='+this.value)" value="<?php echo $_REQUEST['date']; ?>"/></td>
<td>
<?php
if($utype=='ADMIN')
{
$sql = "SELECT * FROM user ";
$result = $conn->query($sql);
	if ($result->num_rows > 0) 
	{
		echo '<select selected="'.$_REQUEST['user'].'" onchange=shpage("history/wallet.php?search=user&user="+this.value)>';
		echo '<option value="admin">SELECT USER FOR HISTORY</option>';
		while($row = $result->fetch_assoc()) 
		{
			if($_REQUEST['user']==$row['username'])
			{
			echo '<option selected="selected" value="'. $row["username"]. '">'. $row["username"]. ' / '. $row["name"]. '</option>';
			}
			else
			{
			echo '<option value="'. $row["username"]. '">'. $row["username"]. ' / '. $row["name"]. '</option>';
			}
		}
		echo '</select>';
	}
}
?> 
</td>
  
  </td>
   </tr>
  </table>
    
    
  <div id="hstrydiv" style="margin-top:10px;">
    <table width="80%" cellspacing="0" cellpadding="0" border="0" class="grid_table wf" style=" margin-bottom:0; font-size:40px !important;">
      <thead>
        <tr>
          <th width="15%">TXN ID</th>
          <th width="10%">TYPE</th>
          <th width="7%">AMT</th>
          <th width="7%">CBAL</th>
          <th width="19%">DATE TIME</th>
          <th width="42%">COMMENT</th>
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
$sql1='';
$sch=$_REQUEST['search'];
if($sch=='user')
{
$user=$_REQUEST['user'];
}
else
{
$user=$_SESSION['user'];
}
if($sch=='CREDIT')
{
$sql1="WHERE `type`='CREDIT' AND `user`='$user'";
}
elseif($sch=='DEBIT')
{
$sql1="WHERE `type`='DEBIT' AND `user`='$user'";
}
elseif($sch=='date')
{
$d=$_REQUEST['date'];
$sql1="WHERE `date`='$d' AND `user`='$user'";
}
else
{
$sql1="WHERE `user`='$user'";
}


$sql = "SELECT * FROM ohtwallet ".$sql1." ORDER BY `id` DESC";


$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<tr>";
        echo '<td width="15%">'. $row["id"]. '</td>';

if($_SESSION['user']=='admin')       
{
if($row["type"]=='CREDIT'){echo '<td width="10%" onclick=changetxn("DEBIT","'.$row['id'].'") title="CHANGE TO DEBIT" style="color:blue">CREDIT</td>';}
elseif($row["type"]=='REFUND'){echo '<td width="10%" onclick=changetxn("DEBIT","'.$row['id'].'")  title="CHANGE TO DEBIT" style="color:green">REFUND</td>';}
else{echo '<td width="10%" onclick=changetxn("REFUND","'.$row['id'].'") title="CHANGE TO REFUND"  style="color:red">DEBIT</td>';}
}
else
{
if($row["type"]=='CREDIT'){echo '<td width="10%" style="color:blue">CREDIT</td>';}
elseif($row["type"]=='REFUND'){echo '<td width="10%" style="color:green">REFUND</td>';}
else{echo '<td width="10%" style="color:red">DEBIT</td>';}
}

        echo '<td width="7%">'. $row["amt"]. '</td>';
        echo '<td width="7%">'. $row["cbal"]. '</td>';
        echo '<td width="19%">'. $row["date"]. '  '. $row["time"].'</td>';
        echo '<td width="42%">'. $row["comment"]. '</td>';

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
	document.getElementById('wallet_radio').checked = true;
	document.getElementById("wallet_span").style.color='blue';
  ///////////////////////////////////////////////

	
	function cview(id){
		$.post("credit/view.php", {
			id: id
		}, function(data) { 
			//$('#cview').html(data);
			openWin2('credit/view.php?id=40');
		});
	}
	
////////////////////////////////////////////////////////////////
	function changetxn(status,txn){
	if(!confirm('Are you sure to change status of txn: '+txn+' to '+status))
	{
	return false;
	}
		var url = 'history/fund.php?txn='+txn+'&status='+status;
		//$('#hstry').fadeTo("fast", 0.33);
		$('#proccssing').css('display','block');
		$('#proccssing').html('Processing....');
		$.get(url, 
		function(data) { 
			$('#proccssing').css('display','none');
			alert(data);
			<?php $url=$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; $data=parse_url($url, PHP_URL_QUERY); ?>
			
			shpage('history/wallet.php?<?php echo $data; ?>');
		//	$('#hstry').fadeTo("slow", 1);
		//	$('#hstry').html(data);
		});
	}
		
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
    