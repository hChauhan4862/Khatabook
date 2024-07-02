 <style type="text/css">
.odd{ background:#ebf7ff;}
.even{ background:#FFF;}
.odd td,.even td{ border-bottom:none;}

 .odd tr:hover{ background:#ebf7ff !important;}
 .even tr:hover{ background:#FFF !important;}
</style>



<?php /* if($utype=='ADMIN'){?>
  <input type="radio" name="type_radio"  onclick="selecthistory('r');" id="rech_radio"/>
  <span style="font-size:14px; font-weight:bold; cursor:pointer;" id="r_span" onclick="selecthistory('r');">ROR HISTORY</span>
<input type="radio" name="type_radio" onclick="selecthistory('u');" id="cred_radio"/>
<span style="font-size:14px; font-weight:bold; cursor:pointer;" id="u_span" onclick="selecthistory('u');">USER LIST</span>
<input type="radio" name="type_radio" onclick="selecthistory('c');" id="cred2_radio"/>
<span style="font-size:14px; font-weight:bold; cursor:pointer;" id="c_span" onclick="selecthistory('c');">CREDIT LIST</span>
<input type="radio" name="type_radio" onclick="shpage('/history/blist.php');" id="blist_radio"/>
<span style="font-size:14px; font-weight:bold; cursor:pointer;" id="blist_span" onclick="shpage('/history/blist.php');">MOBILE LIST</span>
<input type="radio" name="type_radio" onclick="shpage('/history/wallet.php');" id="wallet_radio"/>
<span style="font-size:14px; font-weight:bold; cursor:pointer;" id="wallet_span" onclick="shpage('/history/wallet.php');">WALLET HISTORY</span>





<?php }elseif($utype=='SUB~ADMIN'){?>
  <input type="radio" name="type_radio"  onclick="selecthistory('r');" checked="checked" id="rech_radio"/>
  <span style="font-size:14px; font-weight:bold; cursor:pointer;" id="r_span" onclick="selecthistory('r');">ROR HISTORY</span>
<input type="radio" name="type_radio" onclick="selecthistory('c');" id="cred2_radio"/>
<span style="font-size:14px; font-weight:bold; cursor:pointer;" id="c_span" onclick="selecthistory('c');">CREDIT LIST</span>
<input type="radio" name="type_radio" onclick="shpage('/history/blist.php');" id="blist_radio"/>
<span style="font-size:14px; font-weight:bold; cursor:pointer;" id="blist_span" onclick="shpage('/history/blist.php');">MOBILE LIST</span>
<input type="radio" name="type_radio" onclick="shpage('/history/wallet.php');" id="wallet_radio"/>
<span style="font-size:14px; font-weight:bold; cursor:pointer;" id="wallet_span" onclick="shpage('/history/wallet.php');">WALLET HISTORY</span>






<?php }elseif($utype=='USER'){?>
  <input type="radio" name="type_radio"  onclick="selecthistory('r');" checked="checked" id="rech_radio"/>
  <span style="font-size:14px; font-weight:bold; cursor:pointer;" id="r_span" onclick="selecthistory('r');">ROR HISTORY</span>
<input type="radio" name="type_radio" onclick="shpage('/history/wallet.php');" id="wallet_radio"/>
<span style="font-size:14px; font-weight:bold; cursor:pointer;" id="wallet_span" onclick="shpage('/history/wallet.php');">WALLET HISTORY</span>
<?php } */ ?>

<script>	
function selecthistory(t){
		 if (t == 'r') {
				$("#rech_div").show();
				document.getElementById('rech_radio').checked = true;
				document.getElementById("r_span").style.color='blue';
				history('n');
			}
			
			else if (t == 'u') {
				$("#cred_div").show();
				document.getElementById('cred_radio').checked = true;
				document.getElementById("u_span").style.color='blue';
				userlist('');
			}
			else if (t == 'c') {
				$("#cred_div").show();
				document.getElementById('cred2_radio').checked = true;
				document.getElementById("c_span").style.color='blue';
				clist('');
			}
	 }

function shpage(url)
{
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
	
</script>