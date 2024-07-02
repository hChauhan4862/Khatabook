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
  
<input type="button" class="button2" onclick="clist('search=all')" value="AS TABLE" style="padding:3px;" />
<input type="button" class="button2" onclick="shpage('history/creditchart.php?search=')" value="REFRESH CHART" style="padding:3px;" />

  </td>
   </tr>
  </table>
    
    
    
<?php
$con = mysqli_connect('localhost', 'hcemr8ri9wai','Hps202132@', 'ohtdb') or die("Oops some thing went wrong");

$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$res=mysqli_query($con, "SELECT count(id) as count, sum(amt) as sum, sum(samt) as ssum FROM creadit")  or die("Error: ".mysqli_error($dbc));
$b=mysqli_fetch_array($res, MYSQLI_ASSOC);
$total=$b['ssum'];
$unpaid=$b['sum'];
$total1=$b['count'];

$nday= date('Y-m-d');
$res=mysqli_query($con, "SELECT count(id) as count, sum(amt) as sum, sum(samt) as ssum FROM creadit WHERE `duedate`<'$nday'")  or die("Error: ".mysqli_error($dbc));
$b=mysqli_fetch_array($res, MYSQLI_ASSOC);
$bftoday=$b['sum'];
$bftoday1=$b['count'];
if(!$bftoday){$bftoday='0';}
if(!$bftoday1){$bftoday1='0';}

$nday= date('Y-m-d');
$res=mysqli_query($con, "SELECT count(id) as count, sum(amt) as sum, sum(samt) as ssum FROM creadit WHERE `duedate`>'$nday'")  or die("Error: ".mysqli_error($dbc));
$b=mysqli_fetch_array($res, MYSQLI_ASSOC);
$aftoday=$b['sum'];
$aftoday1=$b['count'];
if(!$aftoday){$aftoday='0';}
if(!$aftoday1){$aftoday1='0';}

$nday= date('Y-m-d');
$res=mysqli_query($con, "SELECT count(id) as count, sum(amt) as sum, sum(samt) as ssum FROM creadit WHERE `duedate`='$nday'")  or die("Error: ".mysqli_error($dbc));
$b=mysqli_fetch_array($res, MYSQLI_ASSOC);
$today=$b['sum'];
$today1=$b['count'];
if(!$today){$today='0';}
if(!$today1){$today1='0';}


?>    

<span id="piechart"></span>
<span id="piechart2"></span>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'A'],
  ['PAIDED', <?php echo $total-$unpaid ?>],
  ['BEFORE TODAY PROMIS', <?php echo $bftoday ?>],
  ['AFTER TODAY PROMIS', <?php echo $aftoday ?>],
  ['TODAY PROMIS', <?php echo $today ?>]
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'CREDIT CUSTOMER (TOTAL AMT <?php echo $total ?>)', 'width':700, 'height':280};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>



</body>
</html>


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
    