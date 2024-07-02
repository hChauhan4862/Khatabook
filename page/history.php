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
    <legend>HISTORY</legend>
<p>
  <input type="radio" name="type_radio"  onclick="selecthistory('r');" checked="checked" id="rech_radio"/>
  <span style="font-size:14px; font-weight:bold; cursor:pointer;" id="r_span" onclick="selecthistory('r');">RECHARGE HISTORY</span>
  <input type="radio" name="type_radio" onclick="selecthistory('p');" id="pay_radio"/>
  <span style="font-size:14px; font-weight:bold; cursor:pointer;" id="p_span" onclick="selecthistory('p');">PAYMENT HISTORY</span> 
  
  <input type="radio" name="type_radio" onclick="selecthistory('c');" id="cred_radio"/>
  <span style="font-size:14px; font-weight:bold; cursor:pointer;" id="c_span" onclick="selecthistory('c');">CREDIT SHEET</span>
  
  </p>
  <div id="rech_div" style="float:left;width:100%;">
  <table width="100%" border="0" >
    <tr>
      <td><input id="search" class="textfield " type="text"  value="TxID / Mobile" onclick="if(this.value=='TxID / Mobile') this.value='';" onblur="if(this.value=='') this.value='TxID / Mobile';" style="width:85px;"></td>
      <td><input type="button" class="button2" value="SEARCH" onclick="history(-1);" style="padding:3px;" /></td>
      <td>&nbsp;&nbsp;&nbsp;FROM</td>
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
      <td><input type="button" class="button2" onclick="history(1);" value="SEARCH" style="padding:3px;" /></td>
    </tr>
  </table>
  <div id="hstrydiv" style="margin-top:10px;">
    <table width="80%" cellspacing="0" cellpadding="0" border="0" class="grid_table wf" style=" margin-bottom:0; font-size:40px !important;">
      <thead>
        <tr>
                    <th width="10%">ID</th>
          <th width="25%">NUMBER</th>
          <th width="20%">AMOUNT</th>
          <th width="20%">OPERATOR</th>
                    <th width="20%" align="right">STATUS</th>
          <!--<th width="">&nbsp;</th>--> 
        </tr>
      </thead>
    </table>
    <div style="float:left; width:100%; overflow:auto; height:230px;">
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
          <td colspan="7" align="center" height="20"></td>
        </tr>
          </tbody>
        
      </table>
    </div>
  </div>
</div>
<div id="pay_div" style="display:none; float:left;width:100%;">
 
    <span style="color:red; font-size:14px;"><strong>No Payment History Found !!</strong></span>
</div>


<!-- CREDIT SHEET TABLE-->

 <div id="cred_div" style="display:none; float:left;width:100%;">
 <table width="75%" border="0">
    <tr>
      <td align="left"><label> <strong><strong>Status :</strong></strong></label></td><td align="left">
     <select id="status" name="status" style="padding:0;" onchange="creditsheet(1)">
           <!-- <option value="all" >All</option>-->
            <option value="0" selected="selected" >Un-Paid</option>
            <option value="1" >Paid</option>
          </select>
     </td>
     <td><strong>Total <span id="cred_type"></span> Amount is :</strong> Rs.<span id="amntspan"></span></td>
     
    </tr>
  </table>
      
            <table cellspacing=" 0" cellpadding="0" border="0" class="grid_table wf" style=" margin-bottom:0; font-size:40px !important;">
        <thead>
          <tr>
            <th width="20%">SL</th>
            <th width="20%">TRANSACTION ID</th>
            <th width="20%">NUMBER</th>
            <th width="20%">AMOUNT</th>
            <th width="20%">STATUS</th>
          </tr>
        </thead>
        </table>

         <div  id="credittble" style="width:100%; float:left;"></div>
         
  		</div>

</fieldset>
<div id="raisedisp" style="display:none; float:left;width:450px; height:auto;">
  <form action="#" method="post">
    <fieldset style="width:440px;">
      <legend>Raise A Recharge Dispute</legend>
      <div id="error" style="font-size:13px;"></div>
      <div style="float:right;">
        <div class="button2" onclick="history(1);" style="cursor:pointer;"><strong> &lt;&lt; BACK</strong> </div>
      </div>
      <p>
        <label>Transaction ID:<span id="trans_idd"></span></label>
        <input type="hidden" id="trans_id" name="trans_id" />
      </p>
      <legend>Message</legend>
      <p>
        <textarea id="msg" name="msg" class="textfield large"></textarea>
      </p>
      <p>
        <input class="button2" id="button2" value="DISPUTE" type="button"  onclick="raise();">
      </p>
    </fieldset>
  </form>
</div>
<script type="text/javascript">
    $.date_input.initialize();
	document.getElementById("r_span").style.color='blue';
    function raisediv(id) {
        $("#raisedisp").show();
        $("#hstrydiv").hide();
        $("#trans_idd").html(id);
        $("#trans_id").val(id);
    }
    ///////////////////////////////////////////////
	function selecthistory(t){
		$("#rech_div,#pay_div,#cred_div").hide();
		document.getElementById('rech_radio').checked = false;
		document.getElementById('pay_radio').checked = false;
		document.getElementById('cred_radio').checked = false;
		document.getElementById("r_span").style.color='';
		document.getElementById("p_span").style.color='';
		document.getElementById("c_span").style.color='';
	 
		 if (t == 'r') {
				$("#rech_div").show();
				document.getElementById('rech_radio').checked = true;
				document.getElementById("r_span").style.color='blue';
			}
			
			else if (t == 'p') {
				$("#pay_div").show();
				document.getElementById('pay_radio').checked = true;
				document.getElementById("p_span").style.color='blue';
			}
			
			else if (t == 'c') {
				$("#cred_div").show();
				document.getElementById('cred_radio').checked = true;
				document.getElementById("c_span").style.color='blue';
				creditsheet('');
			}
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
		
	 $.post("history.php",{greceipt:"greceipt",recid:id},
		function(data){
			$('#msg2').css('display', 'block');
			$('#fck').trigger('click');
			$('#msg1').html(data);
			
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
	function creditsheet(c){
		var status = $("#status").val();
		if(status==0)
		 $("#cred_type").text('Un-Paid');
		 if(status==1)
		 $("#cred_type").text('Paid');
		var url = 'history.php?status='+status+'&do=search&creddo=1&page='+c;
		$('#creditbody').fadeTo("fast", 0.33);
		$('#proccssing').css('display','block');
		$('#proccssing').html('Processing....');
		$.get(url, 
		function(data) { 
			$('#proccssing').css('display','none');
			$('#creditbody').fadeTo("slow", 1);
			$('#credittble').html(data);
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