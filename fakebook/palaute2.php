<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo "$title"; ?></title>
<link href="fakebook-styles.css" rel="stylesheet" type="text/css" />
<link rel="SHORTCUT ICON" href="favicon.ico" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<style type="text/css">
#palauteeeeee {
	width: 600px;
	height: 500px;
	margin: auto;
	padding: 50px 0;
	-webkit-border-radius: 25px;
	-moz-border-radius: 25px;
	-o-border-radius: 25px;
	border-radius: 25px;
	background-color: #dbe8f9;
}

body {
	margin: 0;
}

table {
	margin: auto;
	color: #5A698B;
}

td {
	background-color: #c1d5f0;
	padding: 9px;
	font-size: 14px;
}

.title {
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	-o-border-radius: 10px;
	border-radius: 10px;
	letter-spacing: 2px;
}

.left {
	-webkit-border-top-left-radius: 10px;
	-webkit-border-bottom-left-radius: 10px;
	-moz-border-top-left-radius: 10px;
	-moz-border-bottom-left-radius: 10px;
	-o-border-top-left-radius: 10px;
	-o-border-bottom-left-radius: 10px;
	border-top-left-radius: 10px;
	border-bottom-left-radius: 10px;
}

.right {
	-webkit-border-top-right-radius: 10px;
	-webkit-border-bottom-right-radius: 10px;
	-moz-border-top-right-radius: 10px;
	-moz-border-bottom-right-radius: 10px;
	-o-border-top-right-radius: 10px;
	-o-border-bottom-right-radius: 10px;
	border-top-right-radius: 10px;
	border-bottom-right-radius: 10px;
}

.input {
	width: 243px;
	height: 22px;
	border: 1px solid #8595B2;
	color: #5A698B;
}

.submit {
	background: url('images/b_send.gif') no-repeat;
	width: 52px;
	height: 19px;
	border: none;
}

.textarea {
	resize: none;
	border: 1px solid #8595B2;
	color: #5A698B;
}

.submit:hover {
	background: url('images/b_send-hover.gif') no-repeat;
	cursor: pointer;
}

label {
	cursor: pointer;
}

</style>

<script type="text/javascript">
<!--
function validateForm()
{
	var x=document.forms["myForm"]["nimi"].value
	var b=document.forms["myForm"]["email"].value
	var e=document.forms["myForm"]["otsikko"].value
	var c=document.forms["myForm"]["commenttextarea"].value

	
	if (x=="" && b=="" && e=="")
  {
  alert("Kirjoita etunimesi, sukunimesi ja emailisi!");
  
  return false;
  }
	else if (x=="" && b=="")
  {
  alert("Kirjoita etunimesi ja sukunimesi!");
  
  return false;
  }


else if (x=="" && e=="")
{
alert("Kirjoita etunimesi ja emailisi");

return false;
}


else if (b=="" && e=="")
{
alert("Kirjoita sukunimesi ja emailisi");

return false;
}



/* var x=document.forms["myForm"]["fname"].value */
else if (x==null || x=="")
  {
  alert("Kirjoita etunimesi!");
  
  return false;
  }
/*  var b=document.forms["myForm"]["sname"].value */

 else if (b==null || b=="")
  	{
	alert("Kirjoita sukunimesi!");
  
  return false;
  

	}
	else if (c=="")
  {
  alert("Jatit kommentin tyhjaksi!");
  
  return false;
  }
	
var e=document.forms["myForm"]["email"].value
var atpos=e.indexOf("@");
var dotpos=e.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=e.length)
  {
  alert("Virheellinen e-mail osoite");
  return false;
  }


  
}



-->
</script>

</head>
<body>
<div id="container">
	<div id="headerwrap">
    	<div id="header">
        	<div id="headerotsikko">
            	<h1><a href="index.php">fakebook</a></h1>
            </div>
            <div id="headerlogin">








          	<?php // include('navbar.php'); 


 ?>










         </div>
        </div>
       
    	
    </div>
 
            
	<div id="contentwrap">
		<div id="content">
   
<div id="palauteeeeee">
<form method="post" action="tallenna-palaute.php" name="myForm" onsubmit="return validateForm()">
<table width="500" cellspacing="3">
	
    	<tr>
        <td class="title" align="center" colspan="2"><b>Yhteydenottolomake</b></td>
        </tr>	
    
    	<tr>
        <td class="left" width="35%" align="right"><label for="namefield">Nimi:</label></td>
        <td class="right" width="65%"><input class="input" type="text" id="namefield" name="nimi" onfocus="window.status='Your name'" onblur="window.status=window.defaultStatus" /></td>
        </tr>
        
        <tr>
        <td class="left" align="right"><label for="emailfield">S&auml;hk&ouml;posti:</label></td><td class="right"><input class="input" type="text" name="email" id="emailfield" onfocus="window.status='Your e-mail address'" onblur="window.status=window.defaultStatus" /></td>
        </tr>
        
        <tr>
        <td class="left" align="right"><label for="websitefield">Otsikko:</label></td><td class="right"><input class="input" type="text" id="websitefield" name="otsikko" onfocus="window.status='Kirjoita otsikko'" onblur="window.status=window.defaultStatus" /></td>
        </tr>
        
        <tr>
        <td valign="top" class="left" align="right"><label for="commenttextarea">Kommentti:</label></td>
        <td class="right"><textarea class="textarea" id="commenttextarea" name="commenttextarea" cols="32" rows="6" onfocus="window.status='Sinun kommenttisi'" onblur="window.status=window.defaultStatus"></textarea></td>
        </tr>
        
        <tr>
        <td class="title" align="center" colspan="2"><input class="submit" type="submit" value="&nbsp;" onmouseover="window.status='Submit the contact form'" onmouseout="window.status=window.defaultStatus" /></td>
        </tr>
    
</table>
</form>


</div>
		
			
		</div>
	</div>





<?php
include('sivunloppu.html');
?>