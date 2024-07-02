      <div style="display: block;"> 
<div>
  <table width="99%" border="0" >
  

<tr> <td width="33%"><select  onchange="loadsd();loadname()" id="d"title="PLEASE SELECT DISTRICT" onchange="ShowError('mob_provider',0);" style="width:33%; overflow:auto; overflow-x:hidden;font-size:18">>  
<?php
echo '<option>PLEASE SELECT</option>';
$url="http://upbhulekh.gov.in/public/public_ror/action/public_action.jsp?act=filldistrict";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch); 
$decoded = json_decode($data, true);

foreach ($decoded as $key => $value) {
//    echo $value['district_name'];
echo "<option value='".$value['district_code_census']."'>".$value['district_name_english']."</option>";
}
?></select>
</td>
<td width="33%"><select id="sd" onchange="loadvillage();loadname()" onchange="ShowError('mob_circle',0);" title="PLEASE SELECT TEHSIL" style="width:33%; overflow:auto; overflow-x:hidden;font-size:18"></select></td>
<td width="33%"><select id="village" title="PLEASE SELECT VILLAGE" onchange="loadname()" style="width:33%; overflow:auto; overflow-x:hidden;font-size:18"></select></td>
</tr>
</table>
<input type="hidden" id="refno">
        </div>
      
      
        <!-- Grey backgound applied to box body --> 
        
        <!-- Vertical nav --> 
        <!--Main Div Starts-->
        <div style="float:left; width:auto; height:auto;">
          <div style="float:left; width:20%; height:auto;">
            <ul class="vertical_menu" >
              <a  accesskey="K" href="#" title="SEARCH ROR BY KHATA NO.">
              <li style="background:url(images/mobile_icon.png) no-repeat left center; margin-right:5px; padding:10px 0 10px 35px;  font-size:16px; font-weight:bold; border:1px solid #CCCCCC; width:90px;" class="rounded">BY KHATA</li>
              </a> 
              <a href="#"  accesskey="N" title="SEARCH ROR BY NAME">
              <li  style="background:url(images/2-DTH.gif) no-repeat left center; margin-right:5px; padding:10px 0 10px 35px;  font-size:16px; font-weight:bold;border:1px solid #CCCCCC; width:90px;" class="rounded">BY NAME</li>
              </a> 
              <a  accesskey="G" href="#" title="SEARCH ROR BY GATA NO.">
              <li  style="background:url(images/data.png) no-repeat left center; margin-right:5px; padding:10px 0 10px 35px;  font-size:16px; font-weight:bold;border:1px solid #CCCCCC; width:90px;" class="rounded">BY GATA</li>
              </a> 
          
            </ul>
            <div style="color:#000; font-size:15px; height: 120px !important; font-weight:bold; text-align:center; margin-top:20px; padding:3px;" class="rounded sidediv" >
              <div style="background:#F7F7F7;" class="rounded">Wallet Balance </div>
              <div style="color:#090; font-size:36px; margin-top:10px;"><span id="rch_bal" onclick="bal();" style="word-wrap:break-word;"><?php echo $ubal ?></span></div>
              <div style="background:#F7F7F7;" class="rounded">PAYMENT</div>
              <div style="color:#090; font-size:36px; margin-top:10px;"><span id="rch_pay" onclick="bal();" style="word-wrap:break-word;"><?php echo $upay ?></span></div>
            </div>
            
          </div>
          <div class="main_column" style="margin-right:0px; width:665px;"> 
            <!-- Content area that wil show the form and stuff -->
            <div class="panes_vertical" > 
              <!-- All divs inside this div will become panes for navigation above --> 
              
              <!--MOBILE  RECHARGE  MAIN DIV STARTS--> 
              <!-- First Pane -->
              
              <div style="display:none;" id="mob" class="hdv" > 
                <!--=========Forms=========-->
                <form action="#" method="post" onsubmit="return false" autocomplete="off">
                <fieldset style="width:500px;">
                <legend>SEARCH ROR BY KHATA NO.</legend>
                <p> 
                  <!--[if FIREFOX]>
					Special instructions for IE 6 here
				<![endif]-->
                  <label>KHATA NUMBER:</label>
     <input id="khata" class="textfield large" maxlength="5"  type="text" style="width:50%;" maxlength="10" onkeypress="ShowError('mob_number',0);"  title="PLEASE ENTER 5 DIGIT KHATA NO." onkeyup="loadname()">
                </p>
                
                <p>
                  <input class="button2" id="rorkhata" disabled value="GET ROR (CHARGE Rs.15)" type="button" onclick="bhulekh('khata');">
                  <input class="button2" id="rorkhata2" disabled value="GET DUPLICATE ROR (FREE)" type="button" onclick="bhulekh('dup');">
              </p>


              <p>
              <label>NAME IN KHATA NO.:</label>
              <div id="ekname" style="height:150px; overflow:auto; overflow-x:hidden; width:100%;;font-size:15"></div>
              </p>
              
              </fieldset>
              
              
              </form>
              
              
            </div>
            
            <!--DTH  RECHARGE  MAIN DIV STARTS--> 
            
            <!-- Second Pane -->
            <div style="display: block;" class="hdv" id="dth"> 
              
              <!--=========Forms=========-->
              <form action="#" method="post" onsubmit="return false" autocomplete="off">
                <fieldset style="width:500px;">
                <legend>SEARCH ROR BY NAME.</legend>
                <p> 
                  <!--[if FIREFOX]>
					Special instructions for IE 6 here
				<![endif]-->
                  <label>NAME:</label>
<input id="nameror" class="textfield large" onfocus="unicod()" name="nameror" type="text" style="width:50%;" title="PLEASE ENTER NAME." onblur="loadkhata()">
                </p>
                
            
              <p>
              <label>RESULT.:</label>
              <div id="namerortext" style="height:150px; overflow:auto; overflow-x:hidden; width:100%;;font-size:15"></div>
              </p>
              
              </fieldset>
              
              
              </form>
              
            </div>
            
            <!--DATACARD RECHARGE DIV STARTS-->
            
            <div style="display:block;" id="data" class="hdv" > 
              
              <!--=========Forms=========-->

<form action="#" method="post" onsubmit="return false" autocomplete="off">
                <fieldset style="width:500px;">
                <legend>SEARCH ROR BY GATA NO..</legend>
                <p> 
                  <!--[if FIREFOX]>
					Special instructions for IE 6 here
				<![endif]-->
                  <label>GATA NUMBER:</label>
     <input id="gataror" class="textfield large" type="text" title="PLEASE ENTER GATA NUMBER" onblur="loadgata()">
                </p>
                
            
              <p>
              <label>RESULT.:</label>
              <div id="gatarortext" style="height:150px; overflow:auto; overflow-x:hidden; width:100%;;font-size:15"></div>
              </p>
              
              </fieldset>
              
              
              </form>

            </div>
            

            <!--Confirmation Div Starts For DTH Recharge-->
            
            <div id="rch_confirm"  style="display:block; float:left; word-wrap:break-word;"  class="hdv" >
              <input type="hidden" id="cnfm_rch_val" value="" />
              <fieldset style="width:500px;">
                <legend>Confirm Your Recharge</legend>
                <div style="float:left; width:100%;">
                  <div class="rounded sidediv confirm_div" id="num_tr" style="margin-left:0 !important;">
                    <div class="rounded" style="background:#F7F7F7;" id="num_tit">NUMBER</div>
                    <div style="color:#090; font-size:30px; margin-top:10px;" id="rch_number"> </div>
                  </div>
                  <div class="rounded sidediv confirm_div" id="amt_tr">
                    <div class="rounded" style="background:#F7F7F7;">AMOUNT</div>
                    <div style="color:#090; font-size:30px; margin-top:10px;" id="rch_amount"> </div>
                  </div>
                </div>
                <div style="clear:both;"></div>
                <div style="float:left; width:100%;">
                  <div class="rounded sidediv confirm_div" style=" margin-left:0 !important;" id="op_tr">
                    <div class="rounded" style="background:#F7F7F7;" id="op_tit">OPERATOR</div>
                    <div style="color:#090; font-size:20px; margin-top:10px;" id="rch_provider"> </div>
                  </div>
                  <div class="rounded sidediv confirm_div"  id="cir_tr">
                    <div class="rounded" style="background:#F7F7F7;" id="cir_tit">CIRCLE</div>
                    <div style="color:#090; font-size:20px; margin-top:10px;" id="rch_circle"> </div>
                  </div>
                  <div class="rounded sidediv confirm_div" style="display:none;" id="dob_tr">
                    <div class="rounded" style="background:#F7F7F7;" id="dob_tit">DOB</div>
                    <div style="color:#090; font-size:20px; margin-top:10px;" id="rch_dob"> </div>
                  </div>
                  <div class="rounded sidediv confirm_div" id="cycle_tr">
                    <div class="rounded" style="background:#F7F7F7;" id="cyc_tit">CYCLE</div>
                    <div style="color:#090; font-size:20px; margin-top:10px;" id="rch_cycle"> </div>
                  </div>
                </div>
                <div style="clear:both;"></div>
                <div style="float:left; width:100%;">
                  <div class="rounded sidediv confirm_div" style="margin-left:0 !important;" id="acc_tr">
                    <div class="rounded" style="background:#F7F7F7;" id="acc_tit">ACCOUNT NUMBER</div>
                    <div style="color:#090; font-size:20px; margin-top:10px;" id="rch_account"> </div>
                  </div>
                </div>
                <div style="clear:both;"></div>
                <div style="float:left; width:100%; margin-top:10px;" align="center">
                  <input type="submit" id="button" class="button" value="BACK" onclick="DoRecharge(0);" />
                  <input type="submit" name="button2" id="button2" onclick="DoRecharge(1)" class="button2" value="RECHARGE" />
                </div>
              </fieldset>
            </div>
            
            <!--Confirmation Div Ends--> 
            
          </div>
        </div>
      </div>
      <!--Main Div Ends--> 
      <!--ADDING THE SIDE TABS ENDS---> 
      
    </div>
    
    
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
 <script type="text/javascript">
	    google.load("elements", "1", {
  packages: "transliteration"
  });
      function unicod() {
	  var tess='HINDI';
switch (tess){
case "HINDI": 
var options = {
            sourceLanguage:
                google.elements.transliteration.LanguageCode.ENGLISH,
            destinationLanguage:
                [google.elements.transliteration.LanguageCode.HINDI],
            shortcutKey: 'ctrl+g',
            transliterationEnabled: true
        };
}

        var control = new google.elements.transliteration.TransliterationControl(options);
        control.makeTransliteratable(['nameror']);
     }
      google.setOnLoadCallback(onLoad);
    </script>