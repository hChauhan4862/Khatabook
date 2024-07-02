<?php
session_start();
include_once 'session.php';
if($_SESSION['user']=="")
{
	header("Location: index.php");
}
?>

<![if !IE]><div id="prcg" style="position:absolute; top:40%; left:35%; width:auto; font-size:36px; font-weight:bold; text-shadow: 1px 3px 4px rgba(146, 150, 70, 1);">
Loading GUI..
</div><![endif]><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--============================Head============================-->
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="noindex,nofollow" name="robots">
<!--=========Title=========-->
<title>WELCOME! TO HOME PAGE</title>
<!--=========Stylesheets=========-->
<link type="text/css" rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="css/teal.css">
<link type="text/css" rel="stylesheet" href="css/invalid.css">
<link type="text/css" rel="stylesheet" href="oht2.css">
<link type="text/css" rel="stylesheet" href="js/calender/date_input.css">
<style type="text/css">
.errormsgdiv {
	text-align:left;
	border:1px solid #CCC !important;
	height:100% !important;
	color:#000;
	font-size:15px;
	margin:20px 0px;
	padding:6px;
}
#security_innerdiv {
	text-align:left !important;
	border:none !important;
}
#creditcomments {
	border:10px solid rgba(82,82,82,0.698);
	width: 400px;
}
#creditcomments div{
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	background-color: #FFFFFF;
    border: 1px solid #3B5998;
	font-size: 1.2em;
    padding: 10px;
	
	}
	
#cloan{
	border:10px solid rgba(82,82,82,0.698);
	width: 400px;
}
#cloans div{
	-moz-border-radius:5px;
	-webkit-border-radius:5px;
	border-radius:5px;
	background-color: #FFFFFF;
    border: 1px solid #3B5998;
	font-size: 1.2em;
    padding: 10px;
	
	}

 body {
background:#004d84;
margin-top:10px;
}
</style>
<script src="js/jquery.tools.min.js" type="text/javascript"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript">

function bal2()
{
url='session.php?req=bal';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      a = this.responseText;
      document.getElementById("refno").value=a;
    }
  };
  xhttp.open("GET",url, true);
  xhttp.send();
}

 function showdivs(show,hide)
 {
   	 
  $("#"+show).show();
  $('#'+hide).hide();
 }
 
 function sample() {
	 
	 $("#facebox").show();
	 $("#error1").html('<img src="images/loading.gif">');
	 
	 }

</script>
</head>
<!--End Head-->

<!--============================Begin Body============================-->
<body id="login_page" background="images/bg.jpg">
<br/>
<div class="box" style="width:690px; height:500px;margin:0 auto; margin-top:0px;position:relative;">
  <div id="proccssing" style="position:absolute; top:40%; left:35%; width:auto; font-size:36px; font-weight:bold; text-shadow: 1px 3px 4px rgba(146, 150, 70, 1); display:none;">Processing....</div>
  <div class="header"> 
    <!--===Sub Navigation===-->
    <ul class="sub_nav">
      <!-- To make tabs in box header, just use "sub_nav" class on UL -->
      <li><a class="current" href="#" title="DIGITAL SIGNED KHATAUNI">ROR</a></li>
      <!-- <li><a class="" href="#" title="MESSAGE">SMS</a></li>  -->
      <li onclick="history('n');"><a href="#" class="" title="History And Lists">LIST</a></li>
      <li><a href="#" class="" title="Your Current Recharge Account Details">My Accounts</a></li>
<?php 
if($_SESSION['user2']!='')
{
echo '<li id="login2"><a href="#" class="current" title="BACK TO YOUR ACCOUNT" style=" padding-top:0px;"><img src="images/acswich.png" /></a></li>';
}
else
{
echo '<li id="logout"><a href="#" class="current" title="Logout" style=" padding-top:0px;"><img src="images/logout.png" /></a></li>';
}
?>
            
    </ul>
    <!--End sub navigation--> 
  </div>
  
<div style="position: fixed; z-index: 9999; top: 200.7px; left: 500.5px; display: none;" id="facebox">
  <div>
    <p id="msg1" style="text-align:center;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <img src="images/niclogo.png" />   <br><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WELCOM Mr. <?php echo $username; ?></b></br>  </p>
    <p id="msg2" style="text-align:center;">
      <button onclick="document.getElementById('facebox').style.display='none'" class="close button">Close</button>
    </p>
    
  </div>
</div>

<script>
itstatus2();
function itstatus()
{
	if(navigator.onLine)
	{
	    document.getElementById("allpage").style.display='block';
	    document.getElementById("mainoffline").style.display='none';
	}
	else
	{
	    document.getElementById("allpage").style.display='none';
	    document.getElementById("mainoffline").style.display='block';
	}
itstatus();	
}
 

  <div class="body">
    <div class="panes" > 
      <!-- Any div under the class of "panes" will associate itself in the same order as the tabs defined above under "sub_nav"--> 
     
     
	<!-- Pane 1 TOP MENU-->   <?php include_once('ror/rorpage.php'); ?>     <!-- Pane 1 TOP MENU ENDS-->   
	<!-- Pane 2 TOP MENU-->   <?php // include_once('sms/index.php'); ?>       <!-- Pane 2 TOP MENU ENDS-->   
	<!-- Pane 3 TOP MENU -->  <?php include_once('history/history.php'); ?> <!-- Pane 3 TOP MENU ENDS-->     
	<!-- Pane 4 TOP MENU -->  <?php include_once('page/account.php'); ?>    <!-- Pane 4 TOP MENU ENDS -->
	<!-- Pane 7 TOP MENU-->   <div>&nbsp;</div>                             <!-- Pane 7 TOP MENU ENDS--> 
	</div>
  </div> 
</div>

<div style=" width:100%;text-align:center; font-size:12px; border-top:#CCC 1px solid; background:#E6E5E6 ; position:absolute; bottom:0; border-radius:0 0 5px 5px;"><strong>Powered By
  OM HARI TELECOM  .</strong>
  
<a href="#" id="cloanopen" rel="#cloan" style="display:none;">Open Modal</a>
<a href="#" id="fck" rel="#facebox" style="display:none;">Open Modal</a> 
<a href="#" id="cred" rel="#creditcomments" style="display:none;">Open Modal</a> </div>
</div>
<!--============================Modal============================-->





<div style="position: fixed; z-index: auto; top: 260px; left: 293.5px; display: none;" id="creditcomments">
  <div>
    <p id="msg3" style="text-align:center;">TEST MESSAGE</p>
    <p id="msg4" style="text-align:center;">
      <button onclick="creditclose();" class="close button">Close</button>
    </p>
  </div>
</div>


<div style="position: fixed; z-index: auto; top: 260px; left: 293.5px; display: none;" id="cloan">
  <div>
    <p id="msg3" style="text-align:center;">TEST MESSAGE</p>
    <p id="msg4" style="text-align:center;">
      <button onclick="document.getElementById('cloan').style.display='none'" class="close button">Close</button>
    </p>
  </div>
</div>
 

<!--End Modal--> 
<!--=========Date picker=========--> 
<script src="js/jCal.js" type="text/javascript"></script> 
<script src="js/calender/jquery.date_input.js" type="text/javascript"></script> 
<script src="js/mobile_networks_min.js" type="text/javascript"></script> 
<script src="js/js.js?v=1.0" type="text/javascript"></script> 
<script type="text/javascript">
	$('#prcg').css('display','none');
	$('#prcg').html('Processing...');
</script> 
<script type="text/javascript">
	function creditclose(){
		$('#creditcomments').hide();
		$('.debitrecharge').removeAttr('checked');
	}
$(window).load(function() {
 // $('.box').fadeIn();
});
  $(document).ready(function(){   
       
		 $(".debitrecharge").click(function(){
			 var id = $(this).attr('id');
			 var type = id.replace('_debit_check','');
			 if($('#'+id).is(':checked')){
				$("#creditcomments").fadeIn();
				$("#exposeMask").fadeIn();
				 var button = "<button onclick=showdivs('"+type+"','rch_confirm'); class=\"close button\">Close</button>";
				 var submitbut = "<div style=float:left;border:none;><input type=button name="+type+"_debit_but id="+type+"_debit_but class=button2 value=Submit rel=\"commentbut\" onclick=selectcomments('"+type+"')></div>";
				 var html = '<form><label style="text-align:left;">Comments</label><span id=commenterror style="text-align:left;"></span><input type="text" name="'+type+'_debit_txt" id="'+type+'_debit_txt" placeholder="ENTER YOUR COMMENTS" title="ENTER YOUR COMMENTS" class="tip-top"/>'+submitbut+'</form>';
		 		
				 $('#msg3').html(html);
				 $('#cred').trigger('click');
			}
			else{
				$("#creditcomments").fadeOut();
				$("#exposeMask").fadeOut();
			}
		 });
	
		 
		  
  $("#logout").click(function(){
	  $("#rech_commission").hide();
	 $.post("index.php",{cmd:"out"},
	 function(data){
		 window.location ='index.php';
		
	});
  });
  
  $("#login2").click(function(){
	 $.post("index.php",{login2:"admin"},
	 function(data){
		 window.location ='index.php';
		
	});
  });
 function loginu(user)
 {
  $.post("index.php",{login2:user},
	 function(data){
		 window.location ='index.php';
		
	});
 }
	 $.date_input.initialize();
 	document.getElementById("e_span").style.color='blue';
	
   });
   //setTimeout('$(".box").show();',5000);
/* function to show the account number in postpaid Bill*/

	function selectcomments(id){
		var comments = $("#"+id+"_debit_txt").val();
		if(comments=='' || comments==null){
			$("#commenterror").html("<span style=\"color:red;font-weight:bold; float:left;\">Please Enter a comment</span>");
			return false;
		}
		$("#creditcomments").fadeOut();
		$("#exposeMask").fadeOut();
	}
    function showaccount(val) {
        $("#mobile_para").css("width", "100%");
		document.getElementById('post_number').value = null;
        document.getElementById('post_circle').value = 0;
        document.getElementById('lab_number').innerHTML = 'Number:';
        for (i = 1; i < 24; i++) {
            document.getElementById('post_circle').options[i].style.display = 'block';
        }
        document.getElementById('account_div').style.display = 'none';
        if (val == 36 || val == 37 || val == 41) {
            $("#mobile_para").css("width", "48%");
            document.getElementById('lab_number').innerHTML = 'Number With STD Code:';
            document.getElementById('account_div').style.display = 'block';
        }
		if(val==42){
			
			document.getElementById('lab_number').innerHTML = 'Number With STD Code:';
			
			}
        if (val == 41) {
            for (i = 1; i < 24; i++) {
                document.getElementById('post_circle').options[i].style.display = 'none';
            }
            document.getElementById('post_number').value = '011';
            document.getElementById('post_circle').value = 5;
            document.getElementById('post_circle').options[5].style.display = 'block';
        }
    }
/*Function to select the utility divs according to the radio button selection*/
    function selectutility(t) {
        $(".gas,.electricity,.insurance").hide();
		document.getElementById('gas_radio').checked = false;
		document.getElementById('ele_radio').checked = false;
		document.getElementById('ins_radio').checked = false;
		document.getElementById("g_span").style.color='';
		document.getElementById("e_span").style.color='';
		document.getElementById("i_span").style.color='';

        if (t == 'g') {
            $(".gas").show();
			document.getElementById('gas_radio').checked = true;
			document.getElementById("g_span").style.color='blue';
        }
        else if(t=='e'){
            $(".electricity").show();
			document.getElementById('ele_radio').checked = true;
			document.getElementById("e_span").style.color='blue';

        }
		else if(t=='i'){
			$(".insurance").show();	
			document.getElementById('ins_radio').checked = true;
			document.getElementById("i_span").style.color='blue';
			
		}
    }
/*Function to show the Cycle in Electricity Bills*/
    function selectcycle(t) {
        $("#ele_cycle_p").hide();
		$("#post_amount_p").css("width","100%");
		$('#ele_Sub_div').css("display","none");
		$('#ele_sub_division_south_list').css("display","none");
		$('#ele_sub_division_north_list').css("display","none");
        if (t == '46') {
			$("#post_amount_p").css("width","50%");
			$("#ele_cycle_p").show();
			
			}
		if (t == '52') 
		{
			$("#post_amount_p").css("width","50%");
			$('#ele_Sub_div').css("display","block");
			$('#ele_sub_division_north_list').css("display","block");
			
			
        }
        if (t == '53')
		{
			$("#post_amount_p").css("width","50%");
			$('#ele_Sub_div').css("display","block");
			$('#ele_sub_division_south_list').css("display","block");
			
        }
    }
///////////////////////////////////////////////////////////	
</script>
</body>
<!--End Body-->
</html>

<script src="oht.js"></script>

<?php
if($_REQUEST['r']!='0' && $_SESSION['user']!='admin' && $utype!='SUB~ADMIN')
{
?>
<script type="text/javascript" src="disable.js" ></script>
<?php
}
?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>