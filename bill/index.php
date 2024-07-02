<?php
include_once('../session.php');
$con = mysqli_connect('localhost', 'hcemr8ri9wai','Hps202132@', 'ohtdb') or die("Oops some thing went wrong");

$conn = new mysqli('localhost', 'hcemr8ri9wai', 'Hps202132@', 'ohtdb');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if($_REQUEST['id']=='')
{
exit('{"error":"true","msg":"INVALID ID"}');
}
$did= mysqli_real_escape_string($con, $_REQUEST['id']);
$res=mysqli_query($con, "SELECT * FROM mobill WHERE billid='$did'")  or die("Error: ".mysqli_error($dbc));
$b=mysqli_fetch_array($res, MYSQLI_ASSOC);

if($b["id"]=='')
{
exit('{"error":"true","msg":"NO BILL FIND"}');
}

?>

﻿<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
<meta name=Generator content="Microsoft Word 12 (filtered)">
<style>
<!--
 /* Font Definitions */
 @font-face
	{font-family:Wingdings;
	panose-1:5 0 0 0 0 0 0 0 0 0;}
@font-face
	{font-family:Mangal;
	panose-1:2 4 5 3 5 2 3 3 2 2;}
@font-face
	{font-family:"Cambria Math";
	panose-1:2 4 5 3 5 4 6 3 2 4;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:0in;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoHeader, li.MsoHeader, div.MsoHeader
	{mso-style-link:"Header Char";
	margin:0in;
	margin-bottom:.0001pt;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoFooter, li.MsoFooter, div.MsoFooter
	{mso-style-link:"Footer Char";
	margin:0in;
	margin-bottom:.0001pt;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
a:link, span.MsoHyperlink
	{color:blue;
	text-decoration:underline;}
a:visited, span.MsoHyperlinkFollowed
	{color:purple;
	text-decoration:underline;}
p.MsoAcetate, li.MsoAcetate, div.MsoAcetate
	{mso-style-link:"Balloon Text Char";
	margin:0in;
	margin-bottom:.0001pt;
	font-size:8.0pt;
	font-family:"Tahoma","sans-serif";}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:0in;
	margin-left:.5in;
	margin-bottom:.0001pt;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
	{margin-top:0in;
	margin-right:0in;
	margin-bottom:10.0pt;
	margin-left:.5in;
	line-height:115%;
	font-size:11.0pt;
	font-family:"Calibri","sans-serif";}
span.BalloonTextChar
	{mso-style-name:"Balloon Text Char";
	mso-style-link:"Balloon Text";
	font-family:"Tahoma","sans-serif";}
span.HeaderChar
	{mso-style-name:"Header Char";
	mso-style-link:Header;
	font-family:"Times New Roman","serif";}
span.FooterChar
	{mso-style-name:"Footer Char";
	mso-style-link:Footer;
	font-family:"Times New Roman","serif";}
.MsoPapDefault
	{margin-bottom:10.0pt;
	line-height:115%;}
 /* Page Definitions */
 @page WordSection1
	{size:8.5in 11.0in;
	margin:1.0in 1.0in 1.0in 1.0in;
	border:solid windowtext 3.0pt;
	padding:24.0pt 24.0pt 24.0pt 24.0pt;}
div.WordSection1
	{page:WordSection1;}
 /* List Definitions */
 ol
	{margin-bottom:0in;}
ul
	{margin-bottom:0in;}
-->
</style>

</head>

<body bgcolor=white lang=EN-US link=blue vlink=purple>

<div class=WordSection1>

<table align="cente" class=MsoTableGrid border=1 cellspacing=0 cellpadding=0 align=left
 style='border-collapse:collapse;border:none;margin-left:6.75pt;margin-right:
 6.75pt'>
 <tr>
  <td width=638 colspan=4 valign=top style='width:6.65in;border:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:13.0pt'>Pro-<?php echo $b['seller']; ?> | Mo:-09997981330, 9758684152</span></b></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:13.0pt'>            
                                                                              </span></b></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'>&nbsp;&nbsp;<img width=620 height=156
  src="BILL_files/image001.png" align=left hspace=30 alt="OM HARI TELECOM.png"><b><span
  style='font-size:17.0pt'>ADD.-</span></b><span style='font-size:17.0pt'>NEW
  BUS STAND NAGLA PADAM, CHANDAUS, ALIGARH</span></p>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:15.0pt'>WEB.-
  </span></b><a href="http://www.omharitelecom.com"><span style='font-size:
  15.0pt'>www.omharitelecom.com</span></a><span style='font-size:15.0pt'>, <b>EMAIL-
  </b></span><a href="mailto:csc.omharitelecom@gmail.com"><span
  style='font-size:15.0pt'>csc.omharitelecom@gmail.com</span></a><span
  style='font-size:15.0pt'> </span></p>
  </td>
 </tr>
 <tr style='height:93.1pt'>
  <td width=638 colspan=4 valign=top style='width:6.65in;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:93.1pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>

<!-- 
<img width=110 height=42 src="BILL_files/image002.jpg" align=left hspace=12 alt=images.jpg>
<img width=216 height=61 src="BILL_files/image003.jpg" align=left hspace=12 alt="C (1).gif">
<img width=177 height=65 src="BILL_files/image004.jpg" align=left hspace=12 alt="C (6).jpg">
<img width=58 height=44 src="BILL_files/image005.jpg"  align=left hspace=12 alt=images.png>
<img width=80 height=30  src="BILL_files/image006.jpg" align=left hspace=12 alt=t-series-1.jpg>
<img  width=115 height=25 src="BILL_files/image007.jpg" align=left hspace=12  alt="images (1).jpg">
<img width=95 height=45 src="BILL_files/image008.jpg"  align=left hspace=12 alt=download.png>
<img width=220 height=110  src="BILL_files/image009.jpg" align=left hspace=12 alt=I.jpg>
<img width=64  height=48 src="BILL_files/image010.jpg" align=left hspace=12 alt=images.jpg>

-->


<img width=600  height=150 src="BILL_files/l.png" align=left hspace=12 >

</p>

  </td>
 </tr>
 <tr>
  <td width=638 colspan=4 valign=top style='width:6.65in;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:18.0pt'>SOLD TO -</span></b><span
  style='font-size:18.0pt'>   <u><?php echo $b['buyer']; ?></u></span></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:18.0pt'>ADDRESS – </span></b><u><span
  style='font-size:18.0pt'><?php echo $b['buyeradd']; ?></span></u><b><span style='font-size:
  18.0pt'>                                 Date-   </span></b><u><span
  style='font-size:18.0pt'><?php echo $b['sdate']; ?></span></u></p>
  </td>
 </tr>
 <tr>
  <td width=79 valign=top style='width:59.4pt;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:18.0pt'>QUA.       </span></b></p>
  </td>
  <td width=414 valign=top style='width:310.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:18.0pt'>PARTICULER</span></b></p>
  </td>
  <td width=72 valign=top style='width:.75in;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:18.0pt'>PRICE</span></b></p>
  </td>
  <td width=73 valign=top style='width:54.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:18.0pt;font-family:"Arial","sans-serif";
  color:#212121;background:white'>Disc.</span></b></p>
  </td>
 </tr>
 <tr style='height:122.3pt'>
  <td width=79 valign=top style='width:59.4pt;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:122.3pt'>
  <p class=MsoListParagraph style='margin-bottom:0in;margin-bottom:.0001pt;
  text-indent:-.25in;line-height:normal'><span style='font-size:24.0pt;
  font-family:Wingdings'>Ø<span style='font:7.0pt "Times New Roman"'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span></span>&nbsp;</p>
  </td>
  <td width=414 valign=top style='width:310.5pt;border-top:none;border-left:
  none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:122.3pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:18.0pt'><b>COM. &amp; MODEL &nbsp;&nbsp;&nbsp;:</b><?php echo $b['com'].'&nbsp;'.$b['modal']; ?></span>
  </p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:18.0pt'>IMEI NO.     </span></b><span
  style='font-size:18.0pt'>{i}</span><b><span style='font-size:18.0pt'>        </span></b><u><span
  style='font-size:18.0pt'>:</span></u><u><span style='font-size:16.0pt'><?php echo $b['imei1']; ?></span></u></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:18.0pt'>                      {ii}       <u>:</u></span><u><span
  style='font-size:16.0pt'><?php echo $b['imei2']; ?></span></u></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;text-align:
  justify;line-height:normal'><b><span style='font-size:18.0pt'>CHARGER S.R.NO 
  </span></b><u><span style='font-size:18.0pt'>:</span></u><u><span
  style='font-size:16.0pt'><?php echo $b['charger']; ?></span></u></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><b><span style='font-size:18.0pt'>BATTERY S.R. NO. </span></b><u><span
  style='font-size:18.0pt'>:</span></u><u><span style='font-size:16.0pt'><?php echo $b['battery']; ?></span></u></p>
  </td>
  <td width=72 valign=top style='width:.75in;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid windowtext 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:122.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><u><span style='font-size:14.0pt'><?php echo $b['bprice']; ?></span></u></p>
  </td>
  <td width=73 valign=top style='width:54.9pt;border-top:none;border-left:none;
  border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;
  height:122.3pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><u><span style='font-size:14.0pt'><?php echo $b['bprice']-$b['sprice']; ?></span></u></p>
  </td>
 </tr>
 <tr style='height:20.65pt'>
  <td width=493 colspan=2 valign=top style='width:369.9pt;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:20.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><b><span style='font-size:20.0pt'>.      
                           TOTAL PRICE </span></b></p>
  </td>
  <td width=145 colspan=2 valign=top style='width:108.9pt;border-top:none;
  border-left:none;border-bottom:solid black 1.0pt;border-right:solid black 1.0pt;
  padding:0in 5.4pt 0in 5.4pt;height:20.65pt'>
  <p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
  text-align:center;line-height:normal'><u><span style='font-size:14.0pt'><?php echo $b['sprice']; ?></span></u></p>
  </td>
 </tr>
 <tr style='height:13.9pt'>
  <td width=638 colspan=4 valign=top style='width:6.65in;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:13.9pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='position:absolute;z-index:6;margin-left:380px;
  margin-top:20px;width:321px;height:168px'><img width=321 height=168
  src="BILL_files/image011.png"
  alt="Rounded Rectangle: SIGNATURE WITH STAMP&#13;&#10;…………………….&#13;&#10;&#13;&#10;"></span><span
  style='font-size:14.0pt;align:center'><?php echo $b['warantty']; ?></span></p>
  </td>
 </tr>
 <tr style='height:71.5pt'>
  <td width=638 colspan=4 valign=top style='width:6.65in;border:solid black 1.0pt;
  border-top:none;padding:0in 5.4pt 0in 5.4pt;height:71.5pt'>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:12.0pt'><b>VERIFY THIS BILL</b> (BILL ID:- <?php echo $b['billid']; ?>)</span></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>VISIT:-  <a href="http://omharitelecom.com?bill=<?php echo $b['billid']; ?>" target="_blank"><span style='font-size:13.5pt;
  text-decoration:none'>omharitelecom.com?bill=<?php echo $b['billid']; ?></span></a><span style='font-size:
  13.5pt;color:black'> </span></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'><span style='font-size:13.5pt;color:black'>Or Scan QR Code</span></p>
  <p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:
  normal'>


<img width=70 height=70 src="http://omharitelecom.com/qr/?data=<?php echo $b['billid']; ?>|<?php echo $b['buyer']; ?>|<?php echo $b['sdate']; ?>&size=70" align=left  hspace=35 alt="download (1).png">

<span style='font-size:26.0pt'>   THANK YOU</span></p>
<div>&nbsp;</div>
  </td>
 </tr>
</table>

<p class=MsoNormal><span style='font-size:26.0pt;line-height:115%'>&nbsp;</span></p>

</div>

</body>

</html>
