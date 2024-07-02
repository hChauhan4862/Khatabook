<?php
echo $q= file_get_contents("sr.txt");
$_SESSION['refno']=$q;
$n='1';
$q2=$q + $n;
$q3=file_put_contents("sr.txt",$q2);
?>