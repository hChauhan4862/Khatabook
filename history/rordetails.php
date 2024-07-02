<?php
$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$txn=$_REQUEST['recid'];
$sql = "SELECT * FROM ror WHERE txn= $txn";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    
$ror=$row["rorid"];
$ror=str_replace("CTZ","",$ror);

    ?>
    
    
<div style="overflow:auto; height:300px;">
<b><p>ROR ID:- <?php echo $row["rorid"]; ?></p></b>

<b>NAME: &nbsp;&nbsp;</b><?php echo $row["name"]; ?>
</div>
<p><a onclick="openWin2('ror/verify.php?id=<?php echo $txn; ?>');" href="javascript:">VIEW CURRENT ROR</a>  

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

 <a href="//omharitelecom.com?ror=<?php echo $ror; ?>" target="_blank">VERIFY ROR</a></p>


<?php
    }
} else {
    echo 'SOMETHING WENT WRONG';
}
?>