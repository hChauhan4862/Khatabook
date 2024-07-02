      <div style="display: block;"> 
        <!-- Grey backgound applied to box body --> 
        
        <!-- Vertical nav --> 
        <!--Main Div Starts-->
        <div style="float:left; width:auto; height:auto;">
          <div style="float:left; width:27%; height:auto;">
            <ul class="vertical_menu" >
              <a href="#" title="Recharge Your Mobile">
              <li style="background:url(images/mobile_icon.png) no-repeat left center; margin-right:5px; padding:10px 0 10px 35px;  font-size:16px; font-weight:bold; border:1px solid #CCCCCC; width:138px;" class="rounded">Mobile</li>
              </a> <a href="#" title="Recharge Your DTH">
              <li  style="background:url(images/2-DTH.gif) no-repeat left center; margin-right:5px; padding:10px 0 10px 35px;  font-size:16px; font-weight:bold;border:1px solid #CCCCCC; width:138px;" class="rounded">DTH</li>
              </a> <a href="#" title="Recharge Your DTH">
              <li  style="background:url(images/data.png) no-repeat left center; margin-right:5px; padding:10px 0 10px 35px;  font-size:16px; font-weight:bold;border:1px solid #CCCCCC; width:138px;" class="rounded">Data Card</li>
              </a> <a href="#" title="Post-Paid Bill">
              <li style="background:url(images/postmobile.png) no-repeat left center; margin-right:5px; padding:10px 0 10px 35px;  font-size:16px; font-weight:bold;border:1px solid #CCCCCC; width:138px;" class="rounded">Postpaid Bill</li>
              </a> <a href="#" title="Pay Your Utility Bills (GAS, Electricity & Insurance)">
              <li style="background:url(images/utility.png) no-repeat left center; margin-right:5px; padding:10px 0 10px 35px;  font-size:16px; font-weight:bold;border:1px solid #CCCCCC; width:138px;" class="rounded">Utility Bills</li>
              </a>
            </ul>
            <div style="color:#000; font-size:15px; height: 80px !important; font-weight:bold; text-align:center; margin-top:20px; padding:3px;" class="rounded sidediv" >
              <div style="background:#F7F7F7;" class="rounded">Recharge Balance </div>
              <div style="color:#090; font-size:36px; margin-top:10px;"><span id="rch_bal" style="word-wrap:break-word;">5000</span></div>
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
                <form action="#" method="post">
                <fieldset style="width:440px;">
                <legend>Mobile Recharge</legend>
                <p> 
                  <!--[if FIREFOX]>
					Special instructions for IE 6 here
				<![endif]-->
                  <label>Mobile:</label>
                  <input id="mob_number" class="textfield large" type="text" maxlength="10" onkeypress="ShowError('mob_number',0);"  title="Please Enter Your 10 Digit Mobile Number" onkeyup="DetectMobile(this.value,'mob_provider','mob_circle');" onblur="DetectMobile(this.value,'mob_provider','mob_circle');">
                </p>
                <p>
                  <label>Operator:</label>
                  <select id="mob_provider"title="Please Select Your Operator" onchange="ShowError('mob_provider',0);"  style="width:390px;">
                    <option value="0">--SELECT--</option>
                    <option value="1">Airtel</option>
                    <option value="2">Vodafone</option>
                    <option value="3">BSNL TopUp</option>
                    <option value="301">BSNL Recharge/Validity</option>
                    <option value="302">BSNL 3G</option>
                    <option value="303">BSNL STV</option>
                    <option value="4">Reliance-CDMA</option>
                    <option value="5">Reliance-GSM</option>
                    <option value="6">Aircel</option>
                    <option value="7">MTNL Topup</option>
                    <option value="701">MTNL Recharge/Special</option>
                    <option value="8">Idea</option>
                    <option value="9">Tata Indicom</option>
                    <option value="10">Loop Mobile</option>
                    <option value="11">Tata Docomo</option>
                    <option value="1101">Tata Docomo Special</option>
                    <option value="12">Virgin CDMA</option>
                    <option value="13">MTS</option>
                    <option value="14">Virgin GSM</option>
                    <option value="16">Uninor</option>
                    <option value="1601">Uninor Special</option>
                    <option value="17">Videocon</option>
                    <option value="1701">Videocon Special</option>
                  </select>
                </p>
                <p>
                  <label>Circle:</label>
                  <select id="mob_circle" onchange="ShowError('mob_circle',0);" title="Please Select Your Circle" style="width:390px;">
                    <option value="0">--SELECT--</option>
                    <option value="1">Andhra Pradesh</option>
                    <option value="2">Assam</option>
                    <option value="3">Bihar &amp; Jharkhand</option>
                    <option value="4">Chennai</option>
                    <option value="5">Delhi</option>
                    <option value="6">Gujarat</option>
                    <option value="7">Haryana</option>
                    <option value="8">Himachal Pradesh</option>
                    <option value="9">Jammu &amp; Kashmir</option>
                    <option value="10">Karnataka</option>
                    <option value="11">Kerala</option>
                    <option value="12">Kolkata</option>
                    <option value="13">Maharashtra</option>
                    <option value="14">Madhya Pradesh &amp; Chhattisgarh</option>
                    <option value="15">Mumbai</option>
                    <option value="16">North East</option>
                    <option value="17">Orissa</option>
                    <option value="18">Punjab</option>
                    <option value="19">Rajasthan</option>
                    <option value="20">Tamil Nadu</option>
                    <option value="21">Uttar Pradesh - East</option>
                    <option value="22">Uttar Pradesh - West</option>
                    <option value="23">West Bengal</option>
                  </select>
                </p>
                <p>
                  <label>Amount:</label>
                  <input id="mob_amount" class="textfield large" type="text" onkeyup="ShowError('mob_amount',0);" title="Please Enter the Amount" >
                </p>
                <p>
                  <input class="button2" id="button2" value="RECHARGE MOBILE" type="button" onclick="Recharge('mob');">
                  <input type="checkbox" name="mob_debit_check" id="mob_debit_check" class="debitrecharge"/>
                  MARK AS CREDIT
              
              </p>
              </fieldset>
              </form>
            </div>
            
            <!--DTH  RECHARGE  MAIN DIV STARTS--> 
            
            <!-- Second Pane -->
            <div style="display: block;" class="hdv" id="dth"> 
              
              <!--=========Forms=========-->
              <form action="#" method="post">
                <fieldset style="width:440px;">
                  <legend>DTH Recharge</legend>
                  <p>
                    <label>Suscriber ID:</label>
                    <input id="dth_number" class="textfield large" onkeypress="ShowError('dth_number',0);" type="text" title="Please Enter Your Suscriber ID">
                  </p>
                  <p>
                    <label>Operator:</label>
                    <select id="dth_provider" title="Please Select Your Operator" onchange="ShowError('dth_provider',0);"  style="width:435px;">
                      <option value="0">--SELECT--</option>
                      <option value="18">Dish TV DTH</option>
                      <option value="19">Tata Sky DTH</option>
                      <option value="23">Airtel DTH</option>
                      <option value="20">Big TV DTH</option>
                      <option value="21">Videocon DTH</option>
                      <option value="22">Sun DTH</option>
                    </select>
                  </p>
                  <p>
                    <label>Circle:</label>
                    <select id="dth_circle"  onchange="ShowError('dth_circle',0);"title="Please Select Your Circle" style="width:435px;">
                      <option value="0">--SELECT--</option>
                      <option value="1">Andhra Pradesh</optionele_sub_division_south_list>
                      <option value="2">Assam</option>
                      <option value="3">Bihar &amp; Jharkhand</option>
                      <option value="4">Chennai</option>
                      <option value="5">Delhi</option>
                      <option value="6">Gujarat</option>
                      <option value="7">Haryana</option>
                      <option value="8">Himachal Pradesh</option>
                      <option value="9">Jammu &amp; Kashmir</option>
                      <option value="10">Karnataka</option>
                      <option value="11">Kerala</option>
                      <option value="12">Kolkata</option>
                      <option value="13">Maharashtra</option>
                      <option value="14">Madhya Pradesh &amp; Chhattisgarh</option>
                      <option value="15">Mumbai</option>
                      <option value="16">North East</option>
                      <option value="17">Orissa</option>
                      <option value="18">Punjab</option>
                      <option value="19">Rajasthan</option>
                      <option value="20">Tamil Nadu</option>
                      <option value="21">Uttar Pradesh - East</option>
                      <option value="22">Uttar Pradesh - West</option>
                      <option value="23">West Bengal</option>
                    </select>
                  </p>
                  <p>
                    <label>Amount:</label>
                    <input class="textfield large" id="dth_amount" type="text" onkeyup="ShowError('dth_amount',0);" title="Please Enter the Amount">
                  </p>
                  <p>
                    <input class="button2" id="button2" value="RECHARGE DTH" type="button"  onclick="Recharge('dth');">
                    <input type="checkbox" name="dth_debit_check" id="dth_debit_check" class="debitrecharge"/>
                  MARK AS CREDIT
                       
                  </p>
                </fieldset>
              </form>
            </div>
            
            <!--DATACARD RECHARGE DIV STARTS-->
            
            <div style="display:block;" id="data" class="hdv" > 
              
              <!--=========Forms=========-->
              <form action="#" method="post">
                <fieldset style="width:440px;">
                  <legend>DATA-CARD Recharge</legend>
                  <p>
                    <label>Mobile:</label>
                    <input id="data_number" class="textfield large" type="text" maxlength="10" onkeypress="ShowError('data_number',0);"  title="Please Enter Your 10 Digit Mobile Number" onkeyup="DetectMobile(this.value,'data_provider','data_circle');" onblur="DetectMobile(this.value,'data_provider','data_circle');">
                  </p>
                  <p>
                    <label>Operator:</label>
                    <select id="data_provider"title="Please Select Your Operator" onchange="ShowError('data_provider',0);"  style="width:435px;">
                      <option value="0">--SELECT--</option>
                      <option value="4">Reliance Netconnect</option>
                      <option value="9">Tata Photon</option>
                      <option value="13">MTS Blaze</option>
                    </select>
                  </p>
                  <p>
                    <label>Circle:</label>
                    <select id="data_circle" onchange="ShowError('data_circle',0);" title="Please Select Your Circle" style="width:435px;">
                      <option value="0">--SELECT--</option>
                      <option value="1">Andhra Pradesh</option>
                      <option value="2">Assam</option>
                      <option value="3">Bihar &amp; Jharkhand</option>
                      <option value="4">Chennai</option>
                      <option value="5">Delhi</option>
                      <option value="6">Gujarat</option>
                      <option value="7">Haryana</option>
                      <option value="8">Himachal Pradesh</option>
                      <option value="9">Jammu &amp; Kashmir</option>
                      <option value="10">Karnataka</option>
                      <option value="11">Kerala</option>
                      <option value="12">Kolkata</option>
                      <option value="13">Maharashtra</option>
                      <option value="14">Madhya Pradesh &amp; Chhattisgarh</option>
                      <option value="15">Mumbai</option>
                      <option value="16">North East</option>
                      <option value="17">Orissa</option>
                      <option value="18">Punjab</option>
                      <option value="19">Rajasthan</option>
                      <option value="20">Tamil Nadu</option>
                      <option value="21">Uttar Pradesh - East</option>
                      <option value="22">Uttar Pradesh - West</option>
                      <option value="23">West Bengal</option>
                    </select>
                  </p>
                  <p>
                    <label>Amount:</label>
                    <input id="data_amount" class="textfield large" type="text" onkeyup="ShowError('data_amount',0);" title="Please Enter the Amount" >
                  </p>
                  <p>
                    <input class="button2" id="button2" value="RECHARGE DATACARD" type="button" onclick="Recharge('data');">
                  <input type="checkbox" name="data_debit_check" id="data_debit_check" class="debitrecharge"/>
                  MARK AS CREDIT
                  </p>
                </fieldset>
              </form>
            </div>
            
            <!--POST-PAID BILLS DIV STARTS-->
            
            <div style="display:block;" id="post" class="hdv" > 
              
              <!--=========Forms=========-->
              <form action="#" method="post">
                <fieldset style="width:440px;">
                  <legend>POST-PAID BILL</legend>
                  <p>
                    <label>Operator:</label>
                    <select id="post_provider"title="Please Select Your Operator" onchange="ShowError('post_provider',0);showaccount(this.value);"  style="width:435px;">
                      <option value="0">--SELECT--</option>
                      <option value="42">Airtel Landline</option>
                      <option value="36">BSNL Mobile</option>
                      <option value="37">BSNL Landline</option>
                      <option value="31">Airtel Mobile</option>
                      <option value="32">Idea</option>
                      <option value="33">Vodafone</option>
                      <option value="34">Reliance GSM</option>
                      <option value="35">Reliance CDMA</option>
                      <option value="38">Tata Docomo PostPaid</option>
                      <option value="39">Tata PostPaid</option>
                      <option value="41">MTNL Delhi Landline</option>
                      <option value="40">Loop Mobile PostPaid</option>
                    </select>
                  </p>
                  <p>
                    <label>Circle:</label>
                    <select id="post_circle" onchange="ShowError('post_circle',0);" title="Please Select Your Circle" style="width:435px;">
                      <option value="0">--SELECT--</option>
                      <option value="1">Andhra Pradesh</option>
                      <option value="2">Assam</option>
                      <option value="3">Bihar &amp; Jharkhand</option>
                      <option value="4">Chennai</option>
                      <option value="5">Delhi</option>
                      <option value="6">Gujarat</option>
                      <option value="7">Haryana</option>
                      <option value="8">Himachal Pradesh</option>
                      <option value="9">Jammu &amp; Kashmir</option>
                      <option value="10">Karnataka</option>
                      <option value="11">Kerala</option>
                      <option value="12">Kolkata</option>
                      <option value="13">Maharashtra</option>
                      <option value="14">Madhya Pradesh &amp; Chhattisgarh</option>
                      <option value="15">Mumbai</option>
                      <option value="16">North East</option>
                      <option value="17">Orissa</option>
                      <option value="18">Punjab</option>
                      <option value="19">Rajasthan</option>
                      <option value="20">Tamil Nadu</option>
                      <option value="21">Uttar Pradesh - East</option>
                      <option value="22">Uttar Pradesh - West</option>
                      <option value="23">West Bengal</option>
                    </select>
                  </p>
                  <div id="mobile_para" style="width:100%; float:left;">
                    <label id="lab_number">Mobile:</label>
                    <input id="post_number" class="textfield large" type="text" maxlength="20" onkeypress="ShowError('post_number',0);"  title="Please Enter Your Mobile Number" >
                  </div>
                  <div id="account_div" style="display:none; width:48%;margin-left: 4%; float:left;">
                    <label>Account Number:</label>
                    <input id="post_account" class="textfield large" type="text" onkeyup="ShowError('post_account',0);" title="Please Enter the Account Number" >
                  </div>
                  <p style="width:100%;">
                    <label>Amount:</label>
                    <input id="post_amount" class="textfield large" type="text" onkeyup="ShowError('post_amount',0);" title="Please Enter the Amount">
                  </p>
                  <p>
                    <input class="button2" id="button2" value="PAY POST-PAID BILL" type="button" onclick="Recharge('post');">
                     <input type="checkbox" name="post_debit_check" id="post_debit_check" class="debitrecharge"/>
                  MARK AS CREDIT
                  </p>
                </fieldset>
              </form>
            </div>
            <!--UTILITY BILLS DIV STARTS-->
            
            <div style="display:block;" id="utility" class="hdv" > 
              <!--=========Forms=========-->
              <form action="#" method="post">
                <fieldset style="width:440px;">
                  <legend>UTILITY BILLS</legend>
                  <p>
                    <input type="radio" name="type_radio" onclick="selectutility('e');" id="ele_radio" checked="checked"/>
                    <span style="font-size:14px; font-weight:bold; cursor:pointer;" id="e_span" onclick="selectutility('e');">ELECTRICITY</span>
                    <input type="radio" name="type_radio" onclick="selectutility('i');" id="ins_radio"/>
                    <span style="font-size:14px; font-weight:bold; cursor:pointer;" id="i_span" onclick="selectutility('i');">INSURANCE</span>
                    <input type="radio" name="type_radio" onclick="selectutility('g');"  id="gas_radio"/>
                    <span style="font-size:14px; font-weight:bold; cursor:pointer;" id="g_span" onclick="selectutility('g');">GAS</span> </p>
                  
                  <!--BILLs DIVS-->
                  
                  <div class="electricity">
                    <p >
                      <label>ELECTRICITY PROVIDER :</label>
                      <select id="ele_provider" onchange="selectcycle(this.value);">
                        <option value="0">-Select-</option>
                        <option value="43">BSES Rajdhani Power Delhi</option>
                        <option value="44">BSES Yamuna Power Delhi</option>
                        <option value="45">Tata Power Delhi</option>
                        <option value="46">Reliance Energy Mumbai</option>
                       <option value="52">North Bihar Electricity</option>
						<option value="53">South Bihar Electricity</option>   
						<option value="54">BEST Electricity</option>
                      </select>
                    </p>
                    <p>
                      <label id="label_uprovider">CA NUMBER :</label>
                      <input id="ele_number" class="textfield large" type="text" maxlength="10" onkeypress="ShowError('ele_number',0);"  title="Please Enter Your Electricity Number">
                    </p>
                    <div id="post_amount_p" style=" width:100%; float:left;">
                      <p >
                        <label>AMOUNT :</label>
                        <input id="ele_amount" class="textfield large" type="text" onkeyup="ShowError('ele_amount',0);" title="Please Enter the Amount" >
                      </p>
                    </div>
                    <div id="ele_cycle_p" style="display:none; width:48%;margin-left: 2%; float:left;">
                      <p >
                        <label>CYCLE:</label>
                        <input id="ele_cycle" class="textfield large" type="text" onkeyup="ShowError('ele_amount',0);" title="Please Enter the Cycle" >
                      </p>
                    </div>
                     <div id="ele_Sub_div" style="display:none; width:48%;margin-left: 2%; float:left;">
						 
                      <p >
                        <label>Sub Division:</label>
                        <select id='ele_sub_division_north_list' style="display:none; " onchange="ShowError('ele_sub_division_north_list',0);" name="ele_sub_division_north_list" style="width:435px;">
							<option value="0">-Select-</option>
							<option value="Araria">Araria</option>
							<option value="Farbisganj">Farbisganj</option>
							<option value="Barsoi">Barsoi</option>
							<option value="Katihar (Rural)">Katihar (Rural)</option>
							<option value="Katihar (Urban)">Katihar (Urban)</option>
							<option value="Bahadurganj">Bahadurganj</option>
							<option value="Kishanganj">Kishanganj</option>
							<option value="Thakurganj">Thakurganj</option>
							<option value="Banmankhi">Banmankhi</option>
							<option value="Dhamdaha">Dhamdaha</option>
							<option value="Gulabbagh">Gulabbagh</option>
							<option value="Purnea (Rural)">Purnea (Rural)</option>
							<option value="Purnea (Urban)">Purnea (Urban)</option>
							<option value="Gogari">Gogari</option>
							<option value="Khagaria (Urban)">Khagaria (Urban)</option>
							<option value="Khagaria (Rural)">Khagaria (Rural)</option>
							<option value="Madhepur">Madhepur</option>
							<option value="Udakishaganj">Udakishaganj</option>
							<option value="Saharsa (Urban)">Saharsa (Urban)</option>
							<option value="Saharsa (Rural)">Saharsa (Rural)</option>
							<option value="Simri Bakhtiyarpur">Simri Bakhtiyarpur</option>
							<option value="Birpur">Birpur</option>
							<option value="Supaul">Supaul</option>
							<option value="Triveniganj">Triveniganj</option>
							<option value="Benipur">Benipur</option>
							<option value="Biraul">Biraul</option>
							<option value="Darbhanga (Rural)">Darbhanga (Rural)</option>
							<option value="Sakri">Sakri</option>
							<option value="Darbhanga (Urban)">Darbhanga (Urban)</option>
							<option value="Laheriasarai">Laheriasarai</option>
							<option value="Jhanjharpur">Jhanjharpur</option>
							<option value="Nirmali">Nirmali</option>
							<option value="Phulparas">Phulparas</option>
							<option value="Benipatti">Benipatti</option>
							<option value="JaiNagar">JaiNagar</option>
							<option value="Madhubani">Madhubani</option>
							<option value="Bachwara">Bachwara</option>
							<option value="Barauni">Barauni</option>
							<option value="Ballia">Ballia</option>
							<option value="Begusarai">Begusarai</option>
							<option value="Manjhaul">Manjhaul</option>
							<option value="Dalsingsarai">Dalsingsarai</option>
							<option value="Mohaddinagar">Mohaddinagar</option>
							<option value="Sarairanjan">Sarairanjan</option>
							<option value="Rosera">Rosera</option>
							<option value="Kalyanpur">Kalyanpur</option>
							<option value="Pusa">Pusa</option>
							<option value="Samastipur (Rural)">Samastipur (Rural)</option>
							<option value="Samastipur (Urban)">Samastipur (Urban)</option>
							<option value="Marhaurah">Marhaurah</option>
							<option value="Sonepur">Sonepur</option>
							<option value="Baniapur">Baniapur</option>
							<option value="Chhapra (Urban)">Chhapra (Urban)</option>
							<option value="Chhapra (Rural)">Chhapra (Rural)</option>
							<option value="Barauli">Barauli</option>
							<option value="Gopalganj">Gopalganj</option>
							<option value="Kuchaikot">Kuchaikot</option>
							<option value="Mirganj">Mirganj</option>
							<option value="Maharajganj">Maharajganj</option>
							<option value="Mairwa">Mairwa</option>
							<option value="Siwan (Rural)">Siwan (Rural)</option>
							<option value="Siwan (Urban)">Siwan (Urban)</option>
							<option value="Bagaha">Bagaha</option>
							<option value="Nbettiah">Nbettiah</option>
							<option value="Narkatiyaganj">Narkatiyaganj</option>
							<option value="Ramnagar">Ramnagar</option>
							<option value="Areraj">Areraj</option>
							<option value="Chakia">Chakia</option>
							<option value="Motihari">Motihari</option>
							<option value="Dhaka">Dhaka</option>
							<option value="Ghorashahan">Ghorashahan</option>
							<option value="Raxaul">Raxaul</option>
							<option value="Bidupur">Bidupur</option>
							<option value="Hajipur">Hajipur</option>
							<option value="Lalganj">Lalganj</option>
							<option value="Mahnar">Mahnar</option>
							<option value="Mahua">Mahua</option>
							<option value="Dholi">Dholi</option>
							<option value="Muzzaffarpur (East)">Muzzaffarpur (East)</option>
							<option value="Skmch">Skmch</option>
							<option value="Kalyani">Kalyani</option>
							<option value="Maripur">Maripur</option>
							<option value="Saraiyaganj">Saraiyaganj</option>
							<option value="Motipur">Motipur</option>
							<option value="Muzzafarpur (West)">Muzzafarpur (West)</option>
							<option value="Sraiya">Sraiya</option>
							<option value="Bairgania">Bairgania</option>
							<option value="Pupri">Pupri</option>
							<option value="Runnisaidpur">Runnisaidpur</option>
							<option value="Sitmarhi">Sitmarhi</option>
							<option value="Shehohar">Shehohar</option>

					</select>	
					<select id='ele_sub_division_south_list' onchange="ShowError('ele_sub_division_south_list',0);" name="ele_sub_division_south_list"  style="width:435px;">
						<option value="0">-Select-</option>
						<option value="Amarpur">Amarpur</option>
						<option value="Arrah - (R )">Arrah - (R )</option>
						<option value="Arrah - I">Arrah - I</option>
						<option value="Arrah - II">Arrah - II</option>
						<option value="Arwal">Arwal</option>
						<option value="Asthanwan">Asthanwan</option>
						<option value="Aurangabad">Aurangabad</option>
						<option value="Bahadurpur">Bahadurpur</option>
						<option value="Baktiyarpur">Baktiyarpur</option>
						<option value="Banka">Banka</option>
						<option value="Bankipur">Bankipur</option>
						<option value="Barbigha">Barbigha</option>
						<option value="Barh">Barh</option>
						<option value="Barhaiya">Barhaiya</option>
						<option value="Barun">Barun</option>
						<option value="Bhabhua">Bhabhua</option>
						<option value="Bhagalpur">Bhagalpur</option>
						<option value="Bhagalpur (East)">Bhagalpur (East)</option>
						<option value="Bhagalpur (R )">Bhagalpur (R )</option>
						<option value="Bhagalpur (West)">Bhagalpur (West)</option>
						<option value="Biharsharif  (R )">Biharsharif  (R )</option>
						<option value="Biharshariff (U - I)">Biharshariff (U - I)</option>
						<option value="Biharshariff (U - II)">Biharshariff (U - II)</option>
						<option value="Bihta">Bihta</option>
						<option value="Bikram">Bikram</option>
						<option value="Bikramganj">Bikramganj</option>
						<option value="Board Colony">Board Colony</option>
						<option value="Buxar (R )">Buxar (R )</option>
						<option value="Buxar (U )">Buxar (U )</option>
						<option value="Chandi">Chandi</option>
						<option value="Danapur">Danapur</option>
						<option value="Daudnagar">Daudnagar</option>
						<option value="Dehri - I">Dehri - I</option>
						<option value="Dehri - II">Dehri - II</option>
						<option value="Dholi">Dholi</option>
						<option value="Didagaon">Didagaon</option>
						<option value="Digha">Digha</option>
						<option value="Dumraon">Dumraon</option>
						<option value="Ekangarsarai">Ekangarsarai</option>
						<option value="Fatika">Fatika</option>
						<option value="Gaighat">Gaighat</option>
						<option value="Gardanibagh">Gardanibagh</option>
						<option value="Gaya (R ) (Bhodhgaya)">Gaya (R ) (Bhodhgaya)</option>
						<option value="Goh">Goh</option>
						<option value="Hathidah">Hathidah</option>
						<option value="Hilsa">Hilsa</option>
						<option value="Imamganj">Imamganj</option>
						<option value="Islampur">Islampur</option>
						<option value="Jagdishpur">Jagdishpur</option>
						<option value="Jakkanpur">Jakkanpur</option>
						<option value="Jamalpur">Jamalpur</option>
						<option value="Jamui">Jamui</option>
						<option value="Jehanabad">Jehanabad</option>
						<option value="Jhajha">Jhajha</option>
						<option value="Kadamkuan">Kadamkuan</option>
						<option value="Kahalgaon">Kahalgaon</option>
						<option value="Kalyani">Kalyani</option>
						<option value="Kankarbagh">Kankarbagh</option>
						<option value="Karbigahiya">Karbigahiya</option>
						<option value="Katra">Katra</option>
						<option value="Khagaul">Khagaul</option>
						<option value="Khajpuera">Khajpuera</option>
						<option value="Kharagpur">Kharagpur</option>
						<option value="Kochas">Kochas</option>
						<option value="Kudra">Kudra</option>
						<option value="Lakhisarai">Lakhisarai</option>
						<option value="Machuatoli">Machuatoli</option>
						<option value="Magarhi">Magarhi</option>
						<option value="Makhdumpur">Makhdumpur</option>
						<option value="Maner">Maner</option>
						<option value="Manour">Manour</option>
						<option value="Maroofganj">Maroofganj</option>
						<option value="Maurya Lok">Maurya Lok</option>
						<option value="Meena Bazar">Meena Bazar</option>
						<option value="Mohania">Mohania</option>
						<option value="Mokama">Mokama</option>
						<option value="Motipur">Motipur</option>
						<option value="Munger">Munger</option>
						<option value="Muzaffarpur (E ) (Bela)">Muzaffarpur (E ) (Bela)</option>
						<option value="Muzaffarpur (W ) (Turki)">Muzaffarpur (W ) (Turki)</option>
						<option value="Nabinagar">Nabinagar</option>
						<option value="Nalanda">Nalanda</option>
						<option value="Nasriganj">Nasriganj</option>
						<option value="Naubatpur">Naubatpur</option>
						<option value="Naugachhia">Naugachhia</option>
						<option value="Nawadah">Nawadah</option>
						<option value="New Capital">New Capital</option>
						<option value="Paliganj">Paliganj</option>
						<option value="Patliputra">Patliputra</option>
						<option value="Patna City">Patna City</option>
						<option value="Phulwarisharif">Phulwarisharif</option>
						<option value="Piro">Piro</option>
						<option value="Power House (Maripur)">Power House (Maripur)</option>
						<option value="Rafiganj">Rafiganj</option>
						<option value="Rajauli">Rajauli</option>
						<option value="Rajendra Nagar">Rajendra Nagar</option>
						<option value="Rajgir">Rajgir</option>
						<option value="Ramgarh">Ramgarh</option>
						<option value="Runnisaidpur">Runnisaidpur</option>
						<option value="S. K. Puri">S. K. Puri</option>
						<option value="Sadakat Ashram">Sadakat Ashram</option>
						<option value="Saraiya">Saraiya</option>
						<option value="Saraiyaganj">Saraiyaganj</option>
						<option value="Sasaram (R ) (Nokha)">Sasaram (R ) (Nokha)</option>
						<option value="Shekhpura">Shekhpura</option>
						<option value="Sherghati">Sherghati</option>
						<option value="Sikandara">Sikandara</option>
						<option value="Sitamarhi (U )">Sitamarhi (U )</option>
						<option value="SKMCH">SKMCH</option>
						<option value="Ssaram (U )">Ssaram (U )</option>
						<option value="Sultanganj">Sultanganj</option>
						<option value="Surajgarha">Surajgarha</option>
						<option value="Tarapur">Tarapur</option>
						<option value="Tekari">Tekari</option>
						<option value="University">University</option>
						<option value="Urban - I (Power House)">Urban - I (Power House)</option>
						<option value="Urban - II (Golpethar)">Urban - II (Golpethar)</option>
						<option value="Urban - III (Chandchaura)">Urban - III (Chandchaura)</option>
						<option value="Warsliganj">Warsliganj</option>
						<option value="Gaya Urban">Gaya Urban</option>

					</select>		

                      </p>
                    </div>

                    <p >
                      <input class="button2" id="button2" value="PAY ELECTRICITY BILL" type="button" onclick="Recharge('ele');">
                      
                      <input type="checkbox" name="ele_debit_check" id="ele_debit_check" class="debitrecharge"/>
                  MARK AS CREDIT 
                    </p>
                  </div>
                  <div class="insurance" style="display:none;">
                    <p >
                      <label>INSURANCE PROVIDER :</label>
                      <select id="ins_provider">
                        <option value="0">-Select-</option>
                        <option value="48">ICICI Prudential</option>
                        <option value="49">Tata AIA</option>
                      </select>
                    </p>
                    <p>
                      <label>POLICY NUMBER :</label>
                      <input id="ins_number" class="textfield large" type="text" maxlength="10" onkeypress="ShowError('ins_number',0);"  title="Please Enter Your Policy Number">
                    </p>
                    <div style=" width:50%; float:left;">
                      <p >
                        <label>DATE OF BIRTH :</label>
                        <input id="ins_dob" class="textfield large date_input" type="text" onkeyup="ShowError('ins_dob',0);" title="Please Enter the DOB" value="01-01-1985" >
                      </p>
                    </div>
                    <div  style="width:48%;margin-left: 2%; float:left;">
                      <p>
                        <label>AMOUNT:</label>
                        <input id="ins_amount" class="textfield large" type="text" onkeyup="ShowError('ins_amount',0);" title="Please Enter The Amount" >
                      </p>
                    </div>
                    <p >
                      <input class="button2" id="button2" value="PAY INSURANCE BILL" type="button" onclick="Recharge('ins');">
                       <input type="checkbox" name="ins_debit_check" id="ins_debit_check" class="debitrecharge"/>
                  MARK AS CREDIT
                    </p>
                  </div>
                  <div class="gas" style="display:none;">
                    <p>
                      <label>GAS PROVIDER :</label>
                      <select id="gas_provider">
                        <option value="0">-Select-</option>
                        <option value="47">Mahanagar Gas</option>
                      </select>
                    </p>
                    <p>
                      <label id="label_uprovider">NUMBER :</label>
                      <input id="gas_number" class="textfield large" type="text" maxlength="10" onkeypress="ShowError('gas_number',0);"  title="Please Enter Your Gas Number">
                    </p>
                    <p >
                      <label>AMOUNT :</label>
                      <input id="gas_amount" class="textfield large" type="text" onkeyup="ShowError('gas_amount',0);" title="Please Enter the Amount" >
                    </p>
                    <p >
                      <input class="button2" id="button2" value="PAY GAS BILL" type="button" onclick="Recharge('gas');">
                       <input type="checkbox" name="gas_debit_check" id="gas_debit_check" class="debitrecharge"/>
                  MARK AS CREDIT
                    </p>
                  </div>
                </fieldset>
              </form>
            </div>
            
            <!--Confirmation Div Starts For DTH Recharge-->
            
            <div id="rch_confirm"  style="display:block; float:left; word-wrap:break-word;"  class="hdv" >
              <input type="hidden" id="cnfm_rch_val" value="" />
              <fieldset style="width:450px;">
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