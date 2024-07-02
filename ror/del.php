<?php
session_start();
if($_SESSION['user']!='admin')
{
die('404');
}
$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$uname=$_REQUEST['id'];
 $sql="UPDATE ror SET `del`='1' WHERE txn='$uname'";
    if ($conn->query($sql) === TRUE) {
   echo "<div>".$uname."  SUCCESSFULLY DELETED</div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}