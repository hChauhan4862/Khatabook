<?php
session_start();
$error='';
$mysql_hostname = "localhost";
$mysql_user = "hcemr8ri9wai";
$mysql_password = 'Hps202132@';
$mysql_database = "ohtdb";

$con = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) 

or die("Oops some thing went wrong");
?>
<?php
if($_REQUEST['cmd']=='out')
{
setcookie('user','', time() + (86400 * 30), "/");
$_SESSION['user']='';
die('1');
}

if($_SESSION['user']!="")
{	if($_REQUEST['login2']=='admin')
	{
		if($_SESSION['user2']=='admin')
		{
		$_SESSION['user']='admin';
		$_SESSION['user2']='';
		header("Location: home.php");
		}
		else
		{
		$_SESSION['user']='';
		$error = "<p style='color: red'>UNAUTHORIZED ACCESS DETECT</p>";
		}
	}
	elseif($_REQUEST['login2']!='' )
	{
		if($_SESSION['user']=='admin')
		{
		$_SESSION['user']=$_REQUEST['login2'];
		$_SESSION['user2']='admin';
		header("Location: home.php");
		}
		else
		{
		$_SESSION['user']='';
		$error = "<p style='color: red'>UNAUTHORIZED ACCESS DETECT</p>";
		}
	}
	else
	{
	header("Location: home.php");
	}
}

if(!isset($_SESSION['user']) or $_SESSION['user']=='')
{
	if(isset($_COOKIE['user'])) 
	{
	$_SESSION['user']=$_COOKIE['user'];
	header("Location: home.php");
	}
}

if(isset($_REQUEST['Login']))
{
	$uname= mysqli_real_escape_string($con, $_REQUEST['uname']);
	$upass = mysqli_real_escape_string($con, $_REQUEST['password']);
	$res=mysqli_query($con, "SELECT * FROM user WHERE username='$uname'")  or die("Error: ".mysqli_error($dbc));
	$row=mysqli_fetch_array($res, MYSQLI_ASSOC);
	$rpass=$row['password'];
	if(md5($rpass)==md5($upass))
	{
		if($row['status']=='INACTIVE')
		{
		$error = "<p style='color: red'>YOUR ACCOUNT IS INACTIVE</p>";
		}
		else
		{
		if($_REQUEST['remember']=='1')
		{
		setcookie('user', $row['username'], time() + (86400 * 30), "/");
		$test=$_COOKIE['PHPSESSID'];
		setcookie('PHPSESSID', $test, time() + (86400 * 30), "/");
		}
		$_SESSION['user'] = $row['username'];
		$_SESSION['utype'] = $row['type'];
		header("Location: home.php");
		}
	}
	else
	{
            $error = "<p style='color: red'>INVALID LOGIN ATTEMPT</p>";
		
	}
	
}
?>



<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta content="noindex,nofollow" name="robots">
<link rel="shortcut icon" href="favicon.ico" />

<!--=========Title=========-->
<title>LOGIN</title>
<!--=========Stylesheets=========-->
<link type="text/css" rel="stylesheet" href="css/style.css">
<link type="text/css" rel="stylesheet" href="css/teal.css">
<link type="text/css" rel="stylesheet" href="css/invalid.css">
<style>
body {
	background:#004d84;
	margin-top:20px;
}
</style>
</head>
<!--End Head-->

<!--============================Begin Body============================-->
<body id="login_page" style="font-size:12px;">
<div style="margin: 0px auto; width:100%; height:100%;">
  <div class="wrapper content" >
    <div class="box"> 
      <!--Begin Login Header-->
      <div class="header">
        <p><img width="30" height="30" alt="Half Width Box" src="images/half_width_icon.png">User Login</p>
      </div>
      <!--End Login Header-->
      <div class="body">
        <div id="loginform">
          <form action="" autocomplete="off" method="post">
            <table width="100%" border="0">
              <tr>
                <td colspan="2" class="label1"><b style="color:red;">
                                                      </b></td>
              </tr>
              
              <tr>
                <td colspan="2" class="label1">User Name:</td>
              </tr>
              <tr>
                <td colspan="2"><input type="text" value="<?php echo $_REQUEST['uname']; ?>" name="uname"  class="textfield large"  title="Please Enter Your Username"></td>
              </tr>
              <tr>
                <td colspan="2" class="label1">Password:</td>
              </tr>
              <tr>
                <td colspan="2"><input type="password" name="password"  class="textfield large"  title="Please Enter the Password"></td>
              </tr>
               
                <tr> 
                <td width="46%"><p><input type="submit" value="Login" class="button2" name="Login"><button type="reset" class="button">RESET</button></p></td>
                <td width="54%" class="label"><label for="remember"><input type="checkbox" name="remember" id="remember" class="styled" value="1" onclick="if(this.checked==true){alert('Please Dont Click This if this is Not Your Computer/Laptop or Mobile \n Otherwise Your Login Session will be save for 30 Days')}" >Keep Me signed in for 30days</label></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
       
<div class="<?php if($error!=''){echo 'warning';}else{echo 'info';}?>"> <strong><img width="28" height="29" class="icon" alt="Information" src="images/iinfo_icon.png"></strong><?php if($error!=''){echo $error;}else{echo 'Just press login to continue.';}?><a class="close_notification" href="#"><img width="6" height="6" alt="Close" src="images/close_icon.gif"></a> </div>
  </div>
  <!--End Wrapper--> 
</div>
</body>
</html>