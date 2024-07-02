// JavaScript Document
//-------------------------------------------
//--MOBILE RECHARGE---------
//-------------------------------------------
function Recharge(typ) {
	
if ($('#' + typ+'_debit_check').is(':checked')){
		var credit_check = 1;
		var cred_comments = $("#"+typ+"_debit_txt").val();
		}
	else{
		 var credit_check = 0;
	 	 var cred_comments= '';
	  }	

		var number='';var amount='';var operator=''; var operator_nme='';var circle=''; var cirid ='';var circle_nme='';var account=''; var cycle='';var dob='';
	
    var number = $('#' + typ + '_number').val();
    var avl_bal = $('#rch_bal').html();
    if (typ == 'mob' || typ == 'data') {
        if (isNaN(number) || number < 6000000000) {
            ShowError(typ + '_number', 1);
            return false;
        }
    }
	    var operator = $('#' + typ + '_provider').val();
    if (typ == 'post') {
        if (isNaN(number)) {
            ShowError(typ + '_number', 1);
            return false;
        }
    }
    else if (typ == 'dth' || typ == 'gas' || typ == 'ele' || typ == 'ins') {
       if(operator == 52 || operator == 53 )
	   {
		    if (number == '' )
			{
				ShowError(typ + '_number', 1);
           		return false;
			}
			else {
			var Exp = /^[a-zA-Z0-9- ]*$/;
			var regex = new RegExp(Exp);
			if(!regex.test(number))
				{
					ShowError(typ + '_number', 1);
					return false;
				}
			}
	   }
	   else
	   {
	    if (number == '' || isNaN(number)) {
            ShowError(typ + '_number', 1);
            return false;
        }
	   }
    }

    if (operator < 1) {
        ShowError(typ + '_provider', 1);
        return false;
    }
    var circle = $('#' + typ + '_circle').val();
    if (circle < 1) {
        ShowError(typ + '_circle', 1);
        return false;
    }
    if (typ == 'post') {
		if(operator==36 || operator==37 || operator==41){
			var account = $('#post_account').val();
			if (account == '' || account == null) {
				ShowError('post_account', 1);
				return false;
			}
		}
    }

    if (typ == 'ins') {
        var dob = $('#ins_dob').val();
		 if (dob == '' || dob == null) {
            ShowError('ins_dob', 1);
            return false;
        }
    }

    var amount = $('#' + typ + '_amount').val();
    if (isNaN(amount) || amount == '' || amount < 10) {
        ShowError(typ + '_amount', 1);
        return false;
    }

    if (typ == 'ele' && $('#' + typ + '_provider').val() == 46) {
        var cycle = $('#' + typ + '_cycle').val();
        if (cycle == '' || cycle == null) {

            ShowError('ele_cycle ', 1);
            return false;
        }
    }
	if (typ == 'ele' && $('#' + typ + '_provider').val() == 52) {
        var sub_div = $('#' + typ + '_sub_division_north_list').val();
        if (sub_div == '' || sub_div == null || sub_div == 0) {
            ShowError('ele_division_north_list ', 1);	
            return false;
        }
    }
	if (typ == 'ele' && $('#' + typ + '_provider').val() == 53) {
        var sub_div = $('#' + typ + '_sub_division_south_list').val();
        if (sub_div == '' || sub_div == null || sub_div == 0 ) {
            ShowError('ele_sub_division_south_list ', 1);	
            return false;
        }
    }
    var newBalance = avl_bal - amount;
    if (newBalance < 0) {
        alert('Sorry. You don\'t have enough balance to recharge.\nYour current Balance is : ' + avl_bal);
        return false;
    }

    var operator_nme = $('#' + typ + '_provider :selected').text();
    var circle_nme = $('#' + typ + '_circle :selected').text();
	

    ConfirmRecharge(typ, number, amount, operator, operator_nme, circle, circle_nme, account, cycle, dob,credit_check,cred_comments,sub_div);
    return false;

}

function ShowError(eid, stat) {
    if (stat == 1) {
        $('#' + eid).focus();
        $('#' + eid).css('background', '#FF8388');
    } else $('#' + eid).css('background', '#FFFFFF');
}

function showid(eid) {
    $('.dhv').hide();
    $('#' + eid).show(); //css('display','none');
}

function ConfirmRecharge(typ, num, amt, opid, opnme, cirid, cirname, account, cycle, dob,credit_check,cred_comments,sub_div) {

    $('.hdv').hide();
    $('#num_tit').html("NUMBER");
    $('#op_tit').html("OPERATOR");
    $('#cir_tit').html("CIRCLE");
    $('#dob_tr').hide();
    $('#cir_tr').show();
    $('#cycle_tr').hide();
    ClearForm(typ);
    $('#acc_tr').hide();
    $('#cycle_tr').hide();
    if (typ == 'ele' || typ == 'gas' || typ == 'ins') {
        $('#cir_tr').hide();
        $('#op_tit').html("PROVIDER");
		
    }
    if (typ == 'ins') {
        $('#num_tit').html("POLICY NUMBER");
        $('#dob_tr').show();


    }
    showdivs('rch_confirm', typ);
    $('#cnfm_rch_val').val(typ + '|' + num + '|' + amt + '|' + opid + '|' + cirid + '|' + account + '|' + cycle + '|' + dob + '|' + credit_check + '|' + cred_comments+ '|' + encodeURIComponent(sub_div).replace(/\(/g, "%28").replace(/\)/g, "%29"));

    $('#rch_number').html(num);
    $('#rch_provider').html(opnme);
    $('#rch_circle').html(cirname);
    $('#rch_amount').html(amt);
    $('#rch_dob').html(dob);
    if (typ == 'post') {
        $('#acc_tr').show();
        $('#rch_account').html(account);
    }
    if (typ == 'ele' && cycle != null) {
        $('#cycle_tr').show();

        $('#rch_cycle').html(cycle);
		if(opid == '52' || opid == '53')
		{
			 $('#cyc_tit').html("SUB Division");
			 $('#rch_cycle').show();
			 $('#rch_cycle').html(sub_div)
		}
    }

}
function ClearForm(typ) {
    //--FORM RESET
    $('#' + typ + '_number').val('');
    $('#' + typ + '_provider').val(0);
    $('#' + typ + '_circle').val(0);
    $('#' + typ + '_amount').val('');
}

	function Security_confirm() {
    var sec_pin = $("#sec_pin").val();
    if (sec_pin == '' || sec_pin == null || sec_pin.length < 4 || sec_pin.length > 8 || isNaN(sec_pin)) {
        $("#security_error").html("<span style=color:red;font-weight:bold;>Please Enter a Valid Security PIN</span>");
        return false;
    }

    else {
        $("#security_error").html("<span style=color:orange;font-weight:bold;>Checking...Please Wait</span>");
        $.post("recharge.php", {
            sec_pin: sec_pin
        }, function (data) {
            
            if (data == 'ok') {
                DoRecharge(3);
            }
			
			else {
				$("#security_error").html("<span style=color:red;font-weight:bold;>Please Enter the Correct Security PIN</span>");
			}
        });
   	 }
}

function DoRecharge(s) {
	
    var rch = $('#cnfm_rch_val').val().split('|');
	
    var typ = rch[0];
    if (s == 0) {
        $('#' + typ + '_number').val(rch[1]);
        $('#' + typ + '_provider').val(rch[3]);
        $('#' + typ + '_circle').val(rch[4]);
        $('#' + typ + '_amount').val(rch[2]);
        $('#' + typ + '_account').val(rch[5]);
        $('#' + typ + '_dob').val(rch[7]);
		
        if (typ == 'gas' || typ == 'ele' || typ == 'ins') typ = 'utility';
        showdivs(typ, 'rch_confirm');
    }
	
    if (s == 1) {
		if(rch[2]>499){
			

			var sechtml = '<form><div id="security_innerdiv"><label>SECURITY PIN :</label><span id="security_error"></span><input id="sec_pin" class="textfield large" type="password" maxlength="8" title="Please Enter Your Security PIN" placeholder="ENTER YOUR SECURITY PIN"><div style="float:left; margin-top:10px; border:none !important;"><!--<input type="button" name="sec_forget" id="sec_forget" onclick="Security_forg();" class="button2" value="FORGET PIN" />--><input type="button" name="sec_button" id="sec_button" onclick="Security_confirm();" class="button2" value="RECHARGE" /></div></div></form>';
			$('#fck').trigger('click');
			$('#msg1').html(sechtml);
			 return false;
			}
		
        loading('msg1', 'l');
        $('#msg2').css('display', 'none');
        $('#fck').trigger('click');
       	$.post("recharge.php", {
            rch: rch
        },
        function (data) {
			//alert(data);
            $('#msg1').html(data);
            $('#msg2').css('display', '');

        });
		
    }
	
	if(s==3){
		
		 loading('msg1', 'l');
        $('#msg2').css('display', 'none');
        $('#fck').trigger('click');
        $.post("recharge.php", {
            rch: rch
        },
        function (data) {
			
            $('#msg1').html(data);
            $('#msg2').css('display', '');

        });
		
		
	}
}

function loading(eid, sze) {
    if (sze == 'l') $('#' + eid).html('<br/>Processing..Please wait..<br/><img src="images/ldng.gif" />');
    if (sze == 'br') $('#' + eid).html('<br/>Processing..Please wait..<br/><img src="images/loading_br.gif" />');
    if (sze == 'll') $('#' + eid).html('<br/>Processing..Please wait..<br/><img src="images/loading_ll.gif" />');
}

function history(p)
{
	var srch='';
	//loading('hstrytble','ll');
	if(p=='del')
	{
	del= $('#delst').val();
	user= $('#user').val();
		if(user=='')
		{
		var url = 'history/history.php?del='+del;
		}
		else
		{
		var url = 'history/history.php?del='+del+'&u='+user;
		}
		alert(url);
	}
	else if(p=='n'){
		var url = 'history/history.php';
	  }
	  else if(p!='-1'){
		var srch_frm = $('#srch_frm').val();
		var srch_to = $('#srch_to').val();
		var srch_stat = $('#srch_stat').val();
		var url = 'history/history.php?p=2&s='+srch+'&sdate='+srch_frm+'&edate='+srch_to+'&srch_stat='+srch_stat;
	  }
	  else if(p=='-1')
	 {
	 srch = $('#search').val();
	 var p=1;
		var url = 'history/history.php?p='+p+'&s='+srch;
	 }
     
	 $('#hbdy').fadeTo("fast", 0.33);
	 $('#proccssing').css('display','block');
	 $('#proccssing').html('Processing....');
		$.get(url, 
		function(data) {
			$('#proccssing').css('display','none');
			$('#hbdy').fadeTo("slow", 1);
		$('#hstry').html(data);
		});
}

function ExportHistory() {
    var frm = $('#srch_frm').val();
    if (frm == '') {
        ShowError('srch_frm', 1);
        return false;
    }
    var to = $('#srch_to').val();
    if (to == '') {
        ShowError('srch_to', 1);
        return false;
    }
    var stat = $('#srch_stat').val();
    loading('dwncsv', 'br');
    $.get('history.php?cmd=genlink&frm=' + frm + '&to=' + to + '&stat=' + stat, function (data) {
        $('#dwncsv').html(data);
    });
}

/*
* CHANGE PASSWORD@jobindcruz
*/

function chkpassword() {

    var cpassword = $('#cpassword').val();
    var new_password = $('#new_password').val();
    var confirm_password = $('#confirm_password').val();

    if (cpassword == '') {
        ShowError('cpassword', 1);
        return false;
    }
    else {
        $.get("ajax_my_accounts.php", {
            validate: "1",
            f: "users_password",
            v: cpassword,
            m: "password"
        }, function (data) {
            if (data != '') {
                $('#msg1').css('display', 'block');
                $('#msg1').html('Invalid Current Password');
                return false;
            }
        });
    }

    if (new_password == '') {
        ShowError('new_password', 1);
        return false;
    }

    if (confirm_password == '') {
        ShowError('confirm_password', 1);
        return false;
    }

    if (new_password != confirm_password) {
        ShowError('confirm_password', 1);
        return false;
    }

    loading('msg1', 'll');
    $('#fck').trigger('click');

    $.ajax({
        type: "POST",
        url: "change_password.php",
        data: "cpass=" + cpassword + "&newpass=" + new_password + "&conpass=" + confirm_password,
        success: function (msg) {
            $('#msg1').css('display', 'block');
            $('#msg1').html(msg);
			if(msg.search('msg_success')>0)
				document.getElementById('chpwdfrm').reset();
        }
    });
}

/*
* CHANGE SMS RECHARGE REQUESTING MOBILE NUMBER 
*/
function requesting_number() {
    var sms_mobile = $('#sms_mobile').val();

    if (sms_mobile == '') {
        ShowError('sms_mobile', 1);
        return false;
    }

    loading('msg1', 'll');
    $('#fck').trigger('click');

    $.ajax({
        type: "POST",
        url: "requesting_number.php",
        data: "sms_mobile=" + sms_mobile,
        success: function (msg) {
            $('#msg1').css('display', 'block');
            $('#msg1').html(msg);
        }
    });
}

/*
* CHANGE SMS RECHARGE REQUESTING PIN NUMBER 
*/

function change_pin() {
    var cpin = $('#cpin').val();
    var npin = $('#npin').val();
    var cnpin = $('#cnpin').val();

    if (cpin == '') {
        ShowError('cpin', 1);
        return false;
    }

    if (npin == '') {
        ShowError('npin', 1);
        return false;
    }

    if (cnpin == '') {
        ShowError('cnpin', 1);
        return false;
    }

    loading('msg1', 'll');
    $('#fck').trigger('click');
    $.ajax({
        type: "POST",
        url: "change_pin.php",
        data: "cpin=" + cpin + "&npin=" + npin + "&cnpin=" + cnpin,
        success: function (msg) {
            $('#msg1').css('display', 'block');
            $('#msg1').html(msg);

        }
    });
}
