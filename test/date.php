<?php
date_default_timezone_set("Asia/Bangkok");
//echo $t1= date("Y-m-d");
//echo $t2= date("d-m-Y");


$time_now=mktime(date('h')+5,date('i')+30,date('s'));  // if is not set default time zone to asia this will work
echo date("d-m-Y H:i:sa", $time_now);

 time();

//$row['join_date'] = '2011-12-05';
//$nice_date = date('d-m-Y', strtotime( $row['join_date'] ));