function $_GET(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, "\\$&");
        var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
            results = regex.exec(url);
     //   if (!results) return null;
        if (!results) return '';
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, " "));
 }
 function efund(t,amt)
 	    {
	var bal=document.getElementById("rch_bal").innerHTML;
 	    var sechtml = '<div><form><div id="security_innerdiv"><label>ERROR: INSUFFICIENT FUND-'+t+'</label><p>WE NEED RS '+amt+' '+t+', BUT YOU HAVE ONLY Rs. '+bal+'<div style="float:left; margin-top:10px; border:none !important;"></div></div></form></div>';
			$('#fck').trigger('click');
			$('#msg1').html(sechtml);
	    }
 
 function openWin(url) {
  //  myWindow.close();
    myWindow = window.open("a", "myWindow", "");
    myWindow.document.write("<body oncontextmenu='return false'><iframe src='"+url+"' height='97%' width='100%'></iframe><button onclick='window.close()' style='margin-left:auto;margin-right:auto;display:block;margin-bottom:1%'>CLOSE TAB</button></body>");
}
function openWin2(url,size)
{
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      a = this.responseText;
  //  myWindow.close();
  if(size=='cview')
  {
  size="width=800px,height=600px;toolbar=yes,scrollbars=no,resizable=yes";
  }
  else
  {
  size="width=1000,height=500;toolbar=yes,scrollbars=yes,resizable=yes";
  }
    myWindown = window.open("404", "myWindow", size);
    myWindown.document.write(a+'<script src="http://users.omharitelecom.com/disable.js"></script><button onclick="window.close()" style="margin-left:auto;margin-right:auto;display:block;margin-bottom:1%">CLOSE TAB</button>');
    }
  };
  xhttp.open("GET",url, true);
  xhttp.send();
}

function closeWin() {
    myWindow.close();
}


function bhulekh(t){
if(t=='dup')
{
	 v= document.getElementById("village").value;
         k= document.getElementById("khata").value;  
url='ror/verify.php?v='+v+'&k='+k;
url=openWin2(url);
return false;
}
	var bal=document.getElementById("rch_bal").innerHTML;
	if(bal<15)
	{
	efund('To Genrate ROR','15');
	return false;
	}
        var village = document.getElementById("village");
        var khata = document.getElementById("khata");
        var refno = document.getElementById("refno");       
        village2=village.value;
        khata2=khata.value;
        refno2=refno.value;
 openWin('ror/genrate.php?village='+village2+'&khata='+khata2);
        return false;
}

bal();
function bal() 
{
url='session.php?req=bal';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("rch_bal").innerHTML= this.responseText;
     setTimeout(pay(), 5000);
    }
  };
  xhttp.open("GET",url, true);
  xhttp.send();
}
function pay() 
{
url='session.php?req=pay';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("rch_pay").innerHTML= this.responseText;
      setTimeout(bal(), 5000);
    }
  };
  xhttp.open("GET",url, true);
  xhttp.send();
}

function number(evt,e) 
{
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
	//alert(charCode);
    if (charCode > 31 && (charCode < 45 || charCode > 57 )) {
        document.getElementById(e).innerHTML="Please Enter Number Only";
		return false;
    }
	document.getElementById(e).innerHTML="";
    return true;
}
function alpha(evt,e) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
	//alert(charCode);
    if (charCode > 31 && (charCode < 45 || charCode > 57 )) {
	document.getElementById(e).innerHTML="";
		return true;
    }
	document.getElementById(e).innerHTML="Enter Only Characters";
    return false;
}

function loadsd()
{
document.getElementById('proccssing').style.display='block';
a=document.getElementById("d").value;
url='ror/search.php?act=fillTehsil&district_code='+a;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("sd").innerHTML = this.responseText;
      document.getElementById("village").innerHTML = '';
document.getElementById('proccssing').style.display='none';
    }
  };
  xhttp.open("GET",url, true);
  xhttp.send();
}

function loadvillage()
{
document.getElementById('proccssing').style.display='block';
a=document.getElementById("d").value;
b=document.getElementById("sd").value;
url='ror/search.php?act=fillVillage&district_code='+a+'&tehsil_code='+b;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
  //  alert(this.responseText);
      document.getElementById("village").innerHTML = this.responseText;
document.getElementById('proccssing').style.display='none';
    }
  };
  xhttp.open("GET",url, true);
  xhttp.send();
}


function loadname()
{
a=document.getElementById("village").value;
b=document.getElementById("khata").value;
if(b.length!='5')
{
document.getElementById("ekname").innerHTML = '';
document.getElementById("rorkhata").disabled = true; 
document.getElementById("rorkhata2").disabled = true; 
return false;
}
url='ror/search.php?act=sbacn&fasli-code-value=999&acn='+b+'&vcc='+a;
document.getElementById('proccssing').style.display='block';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
  d=this.responseText;
  //d=data(url);
document.getElementById("ekname").innerHTML = d; 
if(d!='')
{
document.getElementById("rorkhata").disabled = false; 
document.getElementById("rorkhata2").disabled = false; 
}
else
{
document.getElementById("ekname").innerHTML = '<span style="color:red">NO RECORD FIND</span>';
}
document.getElementById('proccssing').style.display='none';  
}  
};
  xhttp.open("GET",url, true);
  xhttp.send();
  return r;
}

function setkhata(v)
{
document.getElementById("khata").value=v;
loadname();
}


function loadkhata()
{
a=document.getElementById("village").value;
b=document.getElementById("nameror").value;
if(b=='')
{
return false;
}
url='ror/search.php?act=sbname&vcc='+a+'&name='+b;
document.getElementById('proccssing').style.display='block';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
  d=this.responseText;
  if(d=='')
  {
  d='<span style="color:red">NO RESULT WITH NAME '+b+' And Village Code '+a;
  }
document.getElementById("namerortext").innerHTML = d; 
document.getElementById('proccssing').style.display='none';  
}  
};
  xhttp.open("GET",url, true);
  xhttp.send();
  return r;
}


function loadgata()
{
a=document.getElementById("village").value;
b=document.getElementById("gataror").value;
if(b=='')
{
return false;
}
url='ror/search.php?act=sbksn&vcc='+a+'&kcn='+b;
document.getElementById('proccssing').style.display='block';
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
  d=this.responseText;
    if(d=='')
  {
  d='<span style="color:red">NO RESULT WITH GATA '+b+' And Village Code '+a;
  }
document.getElementById("gatarortext").innerHTML = d; 
document.getElementById('proccssing').style.display='none';  
}  
};
  xhttp.open("GET",url, true);
  xhttp.send();
}

