<?php
$q= file_get_contents("sr.txt");
$_SESSION['refno']=$q;
$n='1';
$q2=$q + $n;
$q3=file_put_contents("sr.txt",$q2);
?> 

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        BHULEKH
        <small>UTTAR PRADESH ROR</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Service</a></li>
        <li class="active">Ror</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
       
        <!-- right column -->
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">FILL FORM TO GENRATE ROR</h3>
			  			
            </div>
            <h4 align="center" style="color:#629b55;"><b id="ssms"></b></h4>
            <h4 align="center" style="color:#FF6600;"><b id="fsms"></b></h4>
            <!-- /.box-header -->
            <!-- form start -->
            
            <form class="form-horizontal" autocomplete="off" onSubmit="return false;"  >
			<div style="display:none">
			<input type="hidden" name="request" value="ror">
		</div>
		
		              <div class="box-body">
               <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">DISTRICT</label>
				  <div class="col-sm-6">
				    <select onchange="loadsd()" name="d" id="d" class="form-control" >
				    <option>PLEASE SELECT</option>
				    <?php
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
?>

</select>   		
                </div>
				</div>
		
              <div class="box-body">
               <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">SUB-DISTRICT</label>
				  <div class="col-sm-6">
				    <select name="sd" list="com" onchange="loadvillage()" accesskey="g" id="sd" class="form-control" ><option>PLEASE SELECT</option></select>   		
                </div>
				</div>
				<div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">VILLAGE</label>
				  <div class="col-sm-6">
                    <select name="village" id="village" class="form-control" onchange="loadname()" ><option>PLEASE SELECT</option></select>
                   <span style="color:#fd5900;font-weight: bold;" id="evillage"></span>
                </div>
				</div>
			   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">KHATA NO.</label>

                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="khata" maxlength="5" onkeypress="return number(event,'ekhata');" onkeyup="loadname()" id="khata" placeholder="Please Enter Your Khata Sankhya" required>
                    <span style="color:#fd5900;font-weight: bold;" id="ekhata"></span>
                    <span style="color:blue;font-weight: bold;" id="ekname"></span>
                  </div>
                </div>
                
          
          
                          <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">NAME </label>

                  <div class="col-sm-6">
                  <input type="text" class="form-control" onblur="loadkhata()" onfocus="unicod()" name="nror" id="nror" placeholder="PLEASE ENTER SOME FIRST CHARCTER OF YOUR NAME" >
                 
				  </div>
                </div>      
                
                
                
                
                <div class="form-group">
                
                
                
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">REF NO.</label>

                  <div class="col-sm-6">
                  <input type="text" class="form-control" name="refno" id="refno" readonly placeholder="Please Re-Enter Your New Password" required value="<?php echo $q; ?>">
                 
				  </div>
                </div>
				
				
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" onclick="return bhulekh()" class="btn btn-success">Submit</button>
				<button type="reset" class="btn btn-primary">Reset</button>
                </div>
              <!-- /.box-footer -->

            </form>
			 <!-- form end -->
          </div>
          <!-- /.box -->
        </div>
        <!-- Send sms box end -->
		<!-- Instructions box start-->
		<div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Instruction For Genrating Ror</h3>
				<div class="box-tools pull-right">
                
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="timeline-body" style="text-transform: uppercase;">
					<b>1. </b>PLEASE SELECT VALID SUB-DISTRICT FROM LIST<br>
					<b>2. </b>PLEASE ENTER VALID 6 DIGIT VILLAGE CODE<br>
					<b>3. </b>PLEASE ENTER VALID 5 DIGIT KHATA NO.</br>
					<b>4. </b>If you search Khata by name You need to enter khata no. in khata field</br>
					
					
					<b>5. </b>AFTER SUCCESSFULY GENRATE ROR PLEASE CLICK ON PRINT BUTTON TO PRINT</br>
                </div>
			 </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
		<!-- Instructions box end-->
		
		
		
				<!-- NAme search box start-->
		<div class="col-md-4">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">NAME SEARCH RESULT</h3>
				<div class="box-tools pull-right">
                
				</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="timeline-body" id="nrort">
					
                  
                </div>
			 </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
		<!-- Instructions box end-->