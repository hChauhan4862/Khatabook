    <div> 
      <!--SMS Recharge-->
      
<div class="main_column" style="margin-right:0px; width:630px;" id="payment_div">
  <form action="#" method="post" id="paymentform">
    <fieldset style="width:100%;">
      <legend>UPDATE PAYMENTS</legend>
      <p id="error_pay" style="font-size:14px;"></p>
      <p>
        <label>Service: <strong>Mobile Recharge</strong></label>
      </p>
      <div style="float:left; width:48%;">
        <p>
          <label>Amount</label>
          <input type="text" class="textfield large" name="amount" id="amount" value=""/ title="Enter The Amount">
        </p>
        <p>
          <label>Payment Option</label>
          <select name="payment_option" id="payment_option" class="textfield large" title="Select a Payment Option" style="width:96%;">
                        <option value="SBI to SBI Transfer-32214087879">
            SBI to SBI Transfer-32214087879            </option>
                        <option value="SBI NEFT/RTGS -32214087879">
            SBI NEFT/RTGS -32214087879            </option>
                        <option value="ICICI NEFT/RTGS-118005000106">
            ICICI NEFT/RTGS-118005000106            </option>
                        <option value="DIRECT CASH AT TVM OFFICE">
            DIRECT CASH AT TVM OFFICE            </option>
                        <option value="BOI TO BOI TRANSFER - 853820110000139">
            BOI TO BOI TRANSFER - 853820110000139            </option>
                        <option value="POWER SBI ACCOUNT-3362XXX4422">
            POWER SBI ACCOUNT-3362XXX4422            </option>
                        <option value="SBI Group Transfer - 32214087879">
            SBI Group Transfer - 32214087879            </option>
                        <option value="SBI Cash Deposit -32214087879">
            SBI Cash Deposit -32214087879            </option>
                        <option value="SBI Cheque Deposit -32214087879">
            SBI Cheque Deposit -32214087879            </option>
                        <option value="HDFC TO HDFC-16628630000085">
            HDFC TO HDFC-16628630000085            </option>
                        <option value="HDFC NEFT/RTGS-16628630000085">
            HDFC NEFT/RTGS-16628630000085            </option>
                        <option value="HDFC CASH DEPOSIT-16628630000085">
            HDFC CASH DEPOSIT-16628630000085            </option>
                        <option value="HDFC CHEQUE DEPOSIT-16628630000085">
            HDFC CHEQUE DEPOSIT-16628630000085            </option>
                        <option value="ICICI ATM TRANSFER- 118005000476">
            ICICI ATM TRANSFER- 118005000476            </option>
                        <option value="ICICI CHEQUE DEPOSIT- 118005000476">
            ICICI CHEQUE DEPOSIT- 118005000476            </option>
                        <option value="UBI to UBI - 541501010050306">
            UBI to UBI - 541501010050306            </option>
                        <option value="UBI Cash Deposit - 541501010050306">
            UBI Cash Deposit - 541501010050306            </option>
                        <option value="BOI CASH DEPOSIT - 853820110000139">
            BOI CASH DEPOSIT - 853820110000139            </option>
                        <option value="BOI NEFT/RTGS - 853820110000139">
            BOI NEFT/RTGS - 853820110000139            </option>
                        <option value="BOI CHEQUE DEPOSIT - 853820110000139">
            BOI CHEQUE DEPOSIT - 853820110000139            </option>
                        <option value="ICICI CASH/CDM DEPOSIT- 118005000476">
            ICICI CASH/CDM DEPOSIT- 118005000476            </option>
                        <option value="ICICI NEFT/RTGS-118005000476">
            ICICI NEFT/RTGS-118005000476            </option>
                        <option value="ICICI TO ICICI TRANSFER-118005000476">
            ICICI TO ICICI TRANSFER-118005000476            </option>
                        <option value="IRCTC - RSP Without Digital Signature">
            IRCTC - RSP Without Digital Signature            </option>
                      </select>
        </p>
        <p>
          <label>Your Bank Account Name</label>
          <input type="text" class="textfield large" name="account_name" id="account_name" title="Enter Your Account Name" value=""/>
        </p>
      </div>
      <div style="float:left; width:48%; margin-left:1%;">
        <p>
          <label>Date of Payment</label>
          <input type="text" class="textfield large date_input" name="date_of_payment" id="date_of_payment" value="9/01/2018"  title="Enter the Date Of Payment"/>
        </p>
        <p>
          <label>Bank Reference Number</label>
          <input type="text" class="textfield large" name="ref_no" id="ref_no" value="" title="Enter Your Bank Reference Number"/>
        </p>
        <p>
          <label>Instructions</label>
          <textarea name="payment_msg" id="payment_msg" class="textfield large" style="resize:none;" title="Enter Your Instructions" ></textarea>
          <input type="hidden" name="wap" id="wap" />
        </p>
      </div>
      <p>
        <input type="button" name="payments" value="UPDATE" id="payments" class="button2" onclick="updatePayment();"/>
      </p>
    </fieldset>
  </form>
</div>
<script type="text/javascript">
function updatePayment(){
	var amount = document.getElementById('amount').value;	
	var payment_option = document.getElementById('payment_option').value;	
	var account_name = document.getElementById('account_name').value;	
	var date_of_payment = document.getElementById('date_of_payment').value;
	var ref_no = document.getElementById('ref_no').value;
	var payment_msg = document.getElementById('payment_msg').value;
	if(amount=='' || amount==null || isNaN(amount) || amount<=0){
		ShowError('amount',1);
		return false;
	}
	else 
	  $("#amount").css("background","#FFF");
	if(payment_option=='' || payment_option==null ){
		ShowError('payment_option',1);
		return false;
	}
	else 
	  $("#payment_option").css("background","#FFF");	
	if(account_name=='' || account_name==null ){
		ShowError('account_name',1);
		return false;
	}	
	else 
	  $("#account_name").css("background","#FFF");	
	
	if(date_of_payment=='' || date_of_payment==null ){
		ShowError('date_of_payment',1);
		return false;
	}	
	else 
	  $("#date_of_payment").css("background","#FFF");	
	
	if(ref_no=='' || ref_no==null ){
		ShowError('ref_no',1);
		return false;
	}	
	else 
	  $("#ref_no").css("background","#FFF");	
			loading('msg1', 'l');
			$('#msg2').css('display', 'none');
			$('#fck').trigger('click');
			$.post("http://www.smsalertbox.com/payments/index.php", {
				account_name: account_name,
				amount:amount,
				date_of_payment:date_of_payment,
				payment_msg:payment_msg,
				payment_option:payment_option,
				ref_no:ref_no,
				service:2,
				wap:'wap',
				desk:"desk",
				payments:'UPDATE'
			}, function(data) {
				$('#msg1').html(data);
				$('#msg2').css('display', '');
				document.getElementById('paymentform').reset();
			});

}

</script>    </div>