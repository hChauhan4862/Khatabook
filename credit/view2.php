<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: block; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 50%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
</style>
</head>
<body>


<div id="myModalview" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <h2>VIEW DUE DETAILS</h2>
    </div>
    <div class="modal-body">
     
<p>

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    height:50px;
    overflow:auto;
}

td, th {
    border: 1px solid #dddddd;
   // text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<?php
session_start();
$con = mysqli_connect('localhost', 'hcemr8ri9wai','Hps202132@', 'ohtdb') or die("Oops some thing went wrong");

$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if($_REQUEST['id']=='')
{
exit('DUE ID REQUIRED');
}
$did= mysqli_real_escape_string($con, $_REQUEST['id']);
$res=mysqli_query($con, "SELECT * FROM creadit WHERE id='$did'")  or die("Error: ".mysqli_error($dbc));
$row2=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>
<p><b>LAST SMS DATE:- </b> <?php echo $row2['smsdate'] ?> </p>
<p><b>RESION FOR CREDIT:- </b> <?php echo $row2['comment'] ?> </p>
<p><b>MOBILE, ADD. MOBILE :- </b> <?php echo $row2['mo'] ?>,<?php echo $row2['amo'] ?> </p>

<div  style="overflow:auto; height:250px;">
<table>
<tr>
<th style="width:15%">DATE</th>  
<th style="width:200%">COMMENT</th>  
<th style="width:20%">USER</th>
</tr>

<?php
$sql = "SELECT * FROM credith WHERE dueid='$did' ORDER BY id ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<tr>";
        echo '<td width="15%">'. $row["date"]. '</td>';
        echo '<td width="200%">'. $row["comment"]. '</td>';
        echo '<td width="20%">'. $row["user"]. '</td>';
    	echo '</tr>';
    }
} else {
    echo '<td colspan="7" style="color:red;" align="center" height="20">HISTORY FOR THIS DUE IS NOT AVAILBLE</td>';
}

?>
</table>
</div>
      </p>
      
    </div>
    <div class="modal-footer">
      <h3></h3>
    </div>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('myModalview');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script>
function c()
{
jQuery.ajax({
    url: '/create.php',
    method: 'GET',
    data: $('#frm_details').serialize()
}).done(function (response) {
alert(response);
    // Do something with the response
}).fail(function () {
    // Whoops; show an error.
});
}
</script>

</body>
</html>
