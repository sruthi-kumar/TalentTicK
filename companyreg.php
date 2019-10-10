<!DOCTYPE html>
<html lang="en">
<head>
<script>
function validateform()
{
var x=document.forms["myform1"]["cname"].value;
if(x=="")
{
alert("Please fill company name");
return false;
}
var email = document.myform1.email.value;
  atpos = email.indexOf("@");
  dotpos = email.lastIndexOf(".");
  if (email == "" || atpos < 1 || ( dotpos - atpos < 2 )) 
  {
     alert("Please enter correct email ID")
   document.getElementById('email').focus();
     return false;
  }


  var digits = "0123456789";
var phoneNumberDelimiters = "()- ";
var validWorldPhoneChars = phoneNumberDelimiters + "+";
var minDigitsInIPhoneNumber = 10;

function isInteger(s)
{   var i;
    for (i = 0; i < s.length; i++)
    {   
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    
    return true;
}
function trim(s)
{   var i;
    var returnString = "";
    
    for (i = 0; i < s.length; i++)
    {   
        
        var c = s.charAt(i);
        if (c != " ") returnString += c;
    }
    return returnString;
}
function stripCharsInBag(s, bag)
{   var i;
    var returnString = "";
    
    for (i = 0; i < s.length; i++)
    {   
        
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function checkInternationalPhone(strPhone){
var bracket=3
strPhone=trim(strPhone)
if(strPhone.indexOf("+")>1) return false
if(strPhone.indexOf("-")!=-1)bracket=bracket+1
if(strPhone.indexOf("(")!=-1 && strPhone.indexOf("(")>bracket)return false
var brchr=strPhone.indexOf("(")
if(strPhone.indexOf("(")!=-1 && strPhone.charAt(brchr+2)!=")")return false
if(strPhone.indexOf("(")==-1 && strPhone.indexOf(")")!=-1)return false
s=stripCharsInBag(strPhone,validWorldPhoneChars);
return (isInteger(s) && s.length >= minDigitsInIPhoneNumber);
}

	var Phone=document.myform1.phno
	
	if ((Phone.value==null)||(Phone.value=="")){
		alert("Please Enter your Phone Number")
		Phone.focus()
		return false
	}
	if (checkInternationalPhone(Phone.value)==false){
		alert("Please Enter a Valid Phone Number")
		Phone.value=""
		Phone.focus()
		return false
	}
	
var x=new RegExp("^([6-9]{1})([0-9]{9})$");
if(!x.test(document.myform1.phno.value))
{
	alert("Phone number is invalid");
	myform1.phno.focus();
	return false;
}

   
   

var d=document.forms["myform1"]["address"].value;
if(d=="")
{
alert("Please fill address field");
return false;
}


var i=document.forms["myform1"]["city"].value;
if(i=="")
{
alert("Please select a city");
return false;
}

   var n=document.forms["myform1"]["pincode"].value;
if(n=="")
{
alert("Please Fil pincode");
 document.getElementById("pincode").focus();
return false;
}
else if(document.myform1.pincode.value.length!="6")
{
	alert("Provide pincode as 6 numbers");
	document.getElementById("pincode").focus();
	return false;
}
var o=document.forms["myform1"]["password"].value;
if(o=="")
{
alert("Please Fill password Field");
document.getElementById('password').focus();
return false;
}
if(o.length<8){  
   alert("Password must be at least 8 characters long.");  
   document.getElementById('password').focus();
    return false;  
}
var h=document.forms["myform1"]["confirm password"].value;
if(h=="")
{
alert("Please Fill confirm password Field");
document.getElementById('confirm password').focus();
return false;
}
var pwd = document.getElementById("password").value;
       var cpwd = document.getElementById("confirm password").value;
        if (pwd != cpwd) {
            alert("Passwords do not match.");
			document.getElementById('confirm password').focus();
            return false;
        }
return (true);
}
 </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>companyreg</title>

    <link rel="stylesheet" href="Rfonts/material-icon/Rcss/material-design-iconic-Rfont.min.css">

  
    <link rel="stylesheet" href="Rcss/style.css">
</head>
<body>

    <div class="main">

        <div class="container">
            <form name="myform1"  method="POST" class="appointment-form" id="appointment-form">
                <h2>Registration</h2>
                <div class="form-group-1">
                    <input type="text" autocomplete="off" name="cname" id="cname" placeholder="Company's Name"  onkeypress="return (event.charcode > 64 &&
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" />
                    

                    <input type="email" autocomplete="off" name="email" id="email" placeholder="Email" />
					                    
                    <input type="number" autocomplete="off" name="phno" id="phono" placeholder="Phone number" />
                    <input type="text" autocomplete="off" name="address" id="address" placeholder="Address"/>
	            

				<div class="select-list">
                        <select name="city" >
                            <option slected >State</option>
                            <option value="Andhra pradesh">Andhra pradesh</option>
                            <option value="Arunachal pradesh">Aunachal pradesh</option>
							<option value="Bihar">Bihar</option>
							<option value="Tamil nadu">Tamil nadu</option>
							<option value="Karnataka">Karnataka</option>
							<option value="Kerala">Kerala</option>
							<option value="Madhaya pradesh">Madhaya pradesh</option>
                        </select>
				<input type="number" autocomplete="off" name="pincode" id="pincode" placeholder="Pincode" />
				
				<input type="password" autocomplete="off" name="password" id="password" placeholder="password" />
                <input type="password" name="confirm password" id="confirm password" placeholder="confirm password"/>
					
                </div>
				

                <div class="form-submit">
                    <input type="submit" name="submit" onClick="return validateform();" id="submit" class="submit" value="Register" />
                </div>
            </form>

        </div>

    </div>

    <!-- JS -->
	
    <script src="Rvendor/jquery/jquery.min.js"></script>
    <script src="Rjs/main.js"></script>
</body> 
</html>
<?php 
include 'connection.php'; 
if(isset($_POST['submit']))
{
  $a=$_POST['cname'];
  $b=$_POST['email'];
  $c=$_POST['phno'];
  $d=$_POST['address'];
  $e=$_POST['city'];
  $f=$_POST['pincode'];
  $g=$_POST['password'];
$sq="insert into loginn1(username,password,usertype)values('$b','$g',2)";
if(mysqli_query($co,$sq))
{
	$se=mysqli_query($co,"select loginid from loginn1 where username='$b'");
	$r=mysqli_fetch_array($se,MYSQLI_ASSOC);
	$lid=$r['loginid'];
	//echo "<script>alert('$lid');</script>";
$sql="insert into cregister(loginid,cname,email,phno,address,city,pincode,password)values('$lid','$a','$b','$c','$d','$e','$f','$g')";
$ch=mysqli_query($co,$sql);
if($ch)
{?>
	 <script>
 alert("Regesteration Successfull");
  window.location='login.html'
</script>
	<?php
}
else
{
  echo"error:".$sql."<br>".mysqli_error($co);
}
}
}
mysqli_close($co);
?>


