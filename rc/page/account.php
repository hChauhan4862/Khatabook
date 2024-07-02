 <div style="display: none;"> 
        <!--My Accounts-->
        <div style="float:left; width:650px; height:400px; ">
          <div style="display: block; float:left; width:310px;"> 
            <!--=========Forms=========-->
            <form action="#" method="post">
              <fieldset>
                <legend>Profile</legend>
                <p>
                  <label>Username(450648):</label>
                  <input name="useruname" readonly="readonly" id="useruname" value="mohan556" class="textfield large" type="text">
                </p>
                <p>
                  <label>Name:</label>
                  <input name="username" id="username" value="MOHAN CHAND" class="textfield large" type="text" readonly="readonly">
                </p>
                <p>
                  <label>Mobile:</label>
                  <input name="mobile" id="mobile" value="8475960002" class="textfield large" type="text" readonly="readonly">
                </p>
                <p>
                  <label>Email:</label>
                  <input name="email" id="email" value="mohan555@gmail.com" class="textfield large" type="text" readonly="readonly">
                </p>
                <p>
                <label>User Type : 
                User                </label>
                </p>
                <p>
                  <!--<input name="button2" class="button2" id="button2" value="UPDATE" type="button">-->
                  <!--<input name="button" class="button" id="button" value="Cancel" type="submit">-->
                </p>
              </fieldset>
            </form>
          </div>
          <div style="display: block; float:left; width:310px; height:400px;  margin-left:10px;">
            <div class="clearfix accordion"> 
              <!-- Accordion 1 -->
              <h2 class="current"> <img width="6" height="6" class="arrow_right" alt="" src="images/arrow_right.png"> <img width="6" height="6" class="arrow_down" alt="" src="images/arrow_down.png"> Change Password </h2>
              <div class="pane" style="display: block;"> <div id="uinfo" style="color: #004D84;font-size: 12px;font-weight: bold;"></div>
                <!-- All div's with a class of .pane will become accordion panes -->
                <form action="#" method="post" id="chpwdfrm">
                  <p>
                    <label>Current Password:</label>
                    <input name="cpassword" id="cpassword" class="textfield large" type="password" title="Please Enter Current Password">
                  </p>
                  <p>
                    <label>New Password:</label>
                    <input name="new_password" id="new_password" class="textfield large" type="password" title="Please Enter New Password Minimum Six Charector">
                  </p>
                  <p>
                    <label>Confirm New Password:</label>
                    <input name="confirm_password" id="confirm_password" class="textfield large" type="password" title="Please Enter Confirm New Password Match With New Password">
                  </p>
                  <p>
                    <input name="button2" class="button2" id="button2" value="UPDATE" type="button" onclick="chkpassword();">
                    <input name="button" class="button" id="button" value="Cancel" type="button">
                  </p>
                </form>
              </div>
              <!-- Accordion 2
              <h2 class=""> <img width="6" height="6" class="arrow_right" alt="" src="images/arrow_right.png"> <img width="6" height="6" class="arrow_down" alt="" src="images/arrow_down.png"> Change Transaction PIN </h2>
              <div class="pane" style="display: none;"><div id="sms_pin_info" style="color: #004D84;font-size: 12px;font-weight: bold;"></div>
                <form action="#" method="post">
                  <p>
                    <label>Current PIN:</label>
                    <input name="cpin" id="cpin" class="textfield large" type="password" title="Please Enter Your Current PIN">
                  </p>
                  <p>
                    <label>New PIN:</label>
                    <input name="npin" id="npin" class="textfield large" type="password" title="Please Enter Your New PIN">
                  </p>
                  <p>
                    <label>Confirm New PIN:</label>
                    <input name="cnpin" id="cnpin" class="textfield large" type="password" title="Please Enter Confirm New PIN">
                  </p>
                  <p>
                    <input name="button2" class="button2" id="button2" value="UPDATE" type="button" onclick="change_pin();">
                    <input name="button" class="button" id="button" value="Cancel" type="button">
                  </p>
                </form>
              </div>
              <!-- Accordion 3 
              <h2 class=""> <img width="6" height="6" class="arrow_right" alt="" src="images/arrow_right.png"> <img width="6" height="6" class="arrow_down" alt="" src="images/arrow_down.png"> Requesting Number </h2>
              <div class="pane" style="display: none;"><div id="sms_mobile_info" style="color: #004D84;font-size: 12px;font-weight: bold;"></div>
                <form action="#" method="post">
                  <p>
                    <label>Mobile Number:</label>
                    <input name="sms_mobile" id="sms_mobile" value="0" class="textfield large" type="text" title="Please Enter Your Username">
                  </p>
                  <p>
                    <input name="button2" class="button2" id="button2" value="UPDATE" type="button" onclick="requesting_number();" >
                    <input name="button" class="button" id="button" value="Cancel" type="button">
                  </p>
                </form>
                 </div>-->
            </div>
            <!--<div style="float:left; width:300px; height:180px; border:#00F 1px solid; margin-top:10px;"></div>--> 
          </div>
        </div>
        <!--<div align="center" style="margin-top:130px;"> <span style=" color:#333; font-size:25px;">Your Recharge Balance is:</span>
          <p style="margin-top:20px;"> <span style=" color:#060; font-size:50px;">Rs.50</span></p>
        </div>--> 
      </div>    