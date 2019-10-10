<!DOCTYPE html>
<html lang="en">
<head>
<script>
function validateform()
{
var f=document.forms["myform1"]["firstname"].value;
if(f=="")
{
alert("Please fill firstname");
return false;
}

var a=document.forms["myform1"]["lastname"].value;
if(a=="")
{
alert("Please fill lastname");
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

	var Phone=document.myform1.phone_number
	
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
if(!x.test(document.myform1.phone_number.value))
{
	alert("Phone number is invalid");
	myform1.phone_number.focus();
	return false;
}



   var b=document.forms["myform1"]["gender"].value;
   if(b=="")
   {
  alert("Please choose your Gender: Male or Female");
return false;
}

   var d=document.forms["myform1"]["dob"].value;
if(d=="")
{
alert("Please Fill Date of birth");
document.getElementById("dob").focus();
return false;
}
var GivenDate =document.forms["myform1"]["dob"].value;
var CurrentDate = new Date();
GivenDate = new Date(GivenDate);

if(GivenDate > CurrentDate)
{
    alert('Given date is greater than the current date.');
	document.getElementById("dob").focus();
	return false;
	
}

var q=document.forms["myform1"]["address"].value;
if(q=="")
{
alert("Please fill address field");
return false;
}
var n=document.forms["myform1"]["gpg"].value;
if(n=="")
{
alert("Please Fill percentage");
 document.getElementById("gpg").focus();
return false;
}
else if(document.myform1.gpg.value.length!="2")
{
	alert("Provide percentage as 2 digits");
	document.getElementById("gpg").focus();
	return false;
}

var m=document.forms["myform1"]["gug"].value;
if(m=="")
{
alert("Please Fill percentage");
 document.getElementById("gug").focus();
return false;
}
else if(document.myform1.gug.value.length!="2")
{
	alert("Provide percentage as 2 digits");
	document.getElementById("gug").focus();
	return false;
}

var j=document.forms["myform1"]["gpt"].value;
if(j=="")
{
alert("Please Fill percentage");
 document.getElementById("gpt").focus();
return false;
}
else if(document.myform1.gpt.value.length!="2")
{
	alert("Provide percentage as 2 digits");
	document.getElementById("gpt").focus();
	return false;
}
var l=document.forms["myform1"]["gten"].value;
if(l=="")
{
alert("Please Fill percentage");
 document.getElementById("gten").focus();
return false;
}
else if(document.myform1.gten.value.length!="2")
{
	alert("Provide percentage as 2 digits");
	document.getElementById("gten").focus();
	return false;
}

var m=document.forms["myform1"]["city"].value;
if(m=="")
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
    <title>Register</title>

    <link rel="stylesheet" href="Rfonts/material-icon/Rcss/material-design-iconic-Rfont.min.css">

  
    <link rel="stylesheet" href="Rcss/style.css">
</head>
<body>

    <div class="main">

        <div class="container">
            <form name="myform1"  method="POST" class="appointment-form" id="appointment-form">
                <h2>Registration</h2>
                <div class="form-group-1">
                    <input type="text" autocomplete="off" name="firstname" id="firstname" placeholder="First Name" onkeypress="return (event.charcode > 64 &&
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" />
                    <input type="text" autocomplete="off" name="lastname" id="lastname" placeholder="Last Name"  onkeypress="return (event.charcode > 64 &&
		event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"/>
                    <input type="email" autocomplete="off" name="email" id="email" placeholder="Email"  />
					                    
                    <input type="number" autocomplete="off" name="phone_number" id="phone_number" placeholder="Phone number"/>
                    <div class="select-list">
                        <select name="gender"  id="gender">
                            <option slected value="Gender">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    
				<input type="date" name="dob" id="dob" placeholder="Date Of Birth" 	/>
				<input type="text" autocomplete="off" name="address" id="address" placeholder="Address"  />
	            
				<label>=Resume</label>
				
				<div class="form-group-1">
				<label> Resume </label>
				<input name="resume" type="file" accept=".pdf,.jpg,.jpeg,.png" placeholder="Resume">
			
				</div>
				<input type="number" autocomplete="off" name="gpg" id="gpg" placeholder="Percentage in PG" />
				<input type="number" autocomplete="off" name="gug" id="gug" placeholder="Percentage in UG" />
				<input type="number" autocomplete="off" name="g+2" id="gpt" placeholder="Percentage in Plus Two"/>
				<input type="number" autocomplete="off" name="g10" id="gten" placeholder="Percnetage in 10th"/>
				<div class="select-list">
                        <select name="city" >
                            <option slected >City</option>
                            <option value="Trivandrum">Trivandrum</option>
                            <option value="Kollam">Kollam</option>
							<option value="Pathanamthitta">Pathanamthitta</option>
							<option value="Alappuzha">Alappuzha</option>
							<option value="Idukki">Idukki</option>
							<option value="Kottayam">Kottayam</option>
							<option value="Ernakulam">Ernakulam</option>
                        </select>
				<input type="number" autocomplete="off" name="pincode" id="pincode" placeholder="Pincode" />
			
				<input type="password" autocomplete="off" name="password" id="password" placeholder="password"/>
                <input type="password" autocomplete="off" name="confirm password" id="confirm password" placeholder="confirm password"/>
					
                </div>
				

                <div class="form-submit">
                    <input type="submit" onClick="return validateform();" name="submit" id="submit" class="submit" value="Register" />
                </div>
            </form>

        </div>

    </div>

    <!-- JS -->
	
    <script src="Rvendor/jquery/jquery.min.js"></script>
    <script src="Rjs/main.js"></script>
</body>) 
</html>


<?php 
include 'connection.php'; 
if(isset($_POST['submit']))
{
  $a=$_POST['firstname'];
  $b=$_POST['lastname'];
  $c=$_POST['email'];
  $d=$_POST['phone_number'];
  $e=$_POST['gender'];
  $f=$_POST['dob'];
  $g=$_POST['address'];
  $q=$_POST['resume'];
  $i=$_POST['gpg'];
  $j=$_POST['gug'];
  $k=$_POST['g+2'];
  $l=$_POST['g10'];
  $m=$_POST['city'];
  $n=$_POST['pincode'];
  $p=$_POST['password'];
 $sql="select * from login where username='$i'";
$result=mysqli_query($con,$sql);
$rowcount=mysqli_num_rows($result);
if($rowcount==0)
{
$sq="insert into loginn1(username,password,usertype)values('$c','$p',1)";
if(mysqli_query($co,$sq))
{
	$se=mysqli_query($co,"select loginid from loginn1 where username='$c'");
	$r=mysqli_fetch_array($se,MYSQLI_ASSOC);
	$lid=$r['loginid'];
	//echo "<script>alert('$lid');</script>";
$sql="insert into register(loginid,firstname,lastname,mobileno,gender,dob,address,resume,gpg,gug,g10,g12,city,pincode,status,password)values('$lid','$a','$b','$d','$e','$f','$g','$q','$i','$j','$l','$k','$m','$n',1,'$p')";
 $ch=mysqli_query($co,$sql);
if($ch)
{
	?>
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
else
{
?>
<script>
 alert("User Already Exists");
</script>";
<?php
}
}
}
mysqli_close($co);
?>