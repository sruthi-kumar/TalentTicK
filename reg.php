<!DOCTYPE html>
<html lang="en">
  <head>
  <script>

function validateform()
{
	 
var x=document.forms["registration"]["name"].value;
if(x=="")
{
alert("Please Fill name");
document.getElementById("name").focus();
return false;
}
var x=new RegExp("^[a-zA-z ]*$");
if(!x.test(document.registration.name.value))
{
	alert("Enter name with characters only");
	registration.name.focus();
	return false;
}
var x=document.forms["registration"]["name"].value;
if(x.length<2 || x.length>30)
{
alert("Please enter name with more than 2 letters and less than 30 letters");
document.getElementById("name").focus();
return false;
}
var x=document.forms["registration"]["address"].value;
if(x=="")
{
alert("Please Fill address");
document.getElementById("address").focus();
return false;
}
var x=document.forms["registration"]["dob"].value;
if(x=="")
{
alert("Please Fill Date of birth");
document.getElementById("dob").focus();
return false;
}
var GivenDate =document.forms["registration"]["dob"].value;
var CurrentDate = new Date();
GivenDate = new Date(GivenDate);

if(GivenDate > CurrentDate){
    alert('Given date is greater than the current date.');
	document.getElementById("dob").focus();
	return false;
}

var x=document.forms["registration"]["ano"].value;
if(x=="")
{
alert("Please Fill Adhar number");
 document.getElementById("ano").focus();
return false;
}
else if(document.registration.ano.value.length!="12")
{
	alert("Provide Adher number as 12 numbers");
	document.getElementById("ano").focus();
	return false;
}
var x=document.forms["registration"]["gname"].value;
if(x=="0")
{
	alert("Please fill Group name");
	document.getElementById("gname").focus();
	return false;
}
if( document.registration.wno.value== "0" )
         {
            alert( "Please provide your Ward number" );
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

	var Phone=document.registration.cno
	
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
if(!x.test(document.registration.cno.value))
{
	alert("Phone number is invalid");
	registration.cno.focus();
	return false;
}	
var x=document.forms["registration"]["uname"].value;
if(x=="")
{
alert("Please Fill username");
 document.getElementById("uname").focus();
return false;
}
else if(!isNaN(x))
{
	alert("Username should not contain numbers");
	document.getElementById("uname").focus();
	return false;
	}
else if(document.registration.uname.value.length<6)
{
	alert("Enter username with more than six characters");
	document.getElementById("uname").focus();
	return false;
}	
var x=document.forms["registration"]["pass"].value;
if(x=="")
{
alert("Please Fill  password");
 document.getElementById("pass").focus();
return false;
}
/*else if(document.registration.pass.value.length<8)
{
	alert("Password should be minimum 8 characters long");
	document.getElementById("pass").focus();
	return false;
}*/
var passw=  /^[A-Za-z]\w{7,14}$/;
if(document.registration.pass.value.match(passw))
{
	
}	
else
{ 
alert('Wrong...!')
return false;
}


var x=document.forms["registration"]["cpass"].value;
if(x=="")
{
alert("Please Fill confirm password");
 document.getElementById("cpass").focus();
return false;
}

var pwd=document.getElementById("pass").value;
var cpwd=document.getElementById("cpass").value;
if(pwd!=cpwd){
	     alert("Password not matching");
		 document.getElementById("cpass").focus();         		 
		 return false;
}
return true
}
</script>

    <title>Pragathi&mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
  <!--<div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <!--<div class="site-navbar-wrap js-site-navbar bg-white">-->
      

    
    <div class="site-section site-section-sm">
      <div class="container">
	  
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="index.html">Register here</a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    
                    <div class="d-inline-block d-lg-none  ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu h3"></span></a></div>
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li>
                        <a href="index.html">Home</a>
                      </li>
                      
                      <li><a href="login.html">Login</a></li>
                      <li><a href="about.html">About</a></li>
                      <li class="active"><a href="contact.html">Contact</a></li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    
  
  
        <div class="row">
       
          <div class="col-md-12 col-lg-8 mb-5">
          
            
          
            <form name="registration" action="" class="p-5 bg-white" method="POST">

              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Full Name</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="" >
                </div>
              </div>
			  <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="message">Address</label> 
                  <textarea name="message" name="address" id="address" cols="30" rows="5" class="form-control" placeholder=""></textarea>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="font-weight-bold" for="email">Date of birth</label>
                  <input type="date" name="dob" id="dob" class="form-control" placeholder="">
                </div>
              </div>
			  <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Adhar number</label>
                  <input type="text" name="anumber" id="ano" class="form-control" placeholder="">
                </div>
              </div>
			  <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0" style="width:200px;">
                  <label class="font-weight-bold" for="fullname">Group name</label><br>
                  <select  name="gname" id="gname" style="width: 800px; height: 2.8em;">
								<option value="0">---- SELECT ----</option>
								<option value="Group1">Group 1</option>
								<option value="Group2">Group 2</option>
								<option value="Group3">Group 3</option>
								<option value="Group4">Group 4</option>
								<option value="Group5">Group 5</option>
							</select>
                </div>
              </div>
			  <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Ward number</label>
                  <select name="wnumber" id="wno" style="width: 800px; height: 2.8em;">
								<option value="0">---- SELECT ----</option>
								<option value="Ward1">Ward 1</option>
								<option value="Ward2">Ward 2</option>
								<option value="Ward3">Ward 3</option>
								<option value="Ward4">Ward 4</option>
								<option value="Ward5">Ward 5</option>
							</select>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Contact number</label>
                  <input type="text" name="cnumber" id="cno" class="form-control" placeholder="">
                </div>
              </div>
			  <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="phone">Username</label>
                  <input type="text" name="username" id="uname" class="form-control" placeholder="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Password</label>
                  <input type="password" name="password" id="pass" class="form-control" placeholder="">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                  <label class="font-weight-bold" for="fullname">Confirm password</label>
                  <input type="password" name="cpassword" id="cpass" class="form-control" placeholder="">
                </div>
              </div>
			  <!--<button name="submit" Class="btn" onClick="return validateform();">Register</button>-->

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" name="submit" value="Register" onClick="return validateform();" class="btn btn-primary pill px-4 py-2">
                </div>
              </div>

  
            </form>
          </div>

          <!--<div class="col-lg-4">
            <div class="p-4 mb-3 bg-white">
              <h3 class="h5 text-black mb-3">Contact Info</h3>
              <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">youremail@domain.com</a></p>

            </div>
            
            
          </div>-->
        </div>
      </div>
    </div>
    


    
    <footer class="site-footer">
      <div class="container">
        

        <!--<div class="row">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4 text-white">About</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellat quos rem ullam, placeat amet.</p>
            <p><a href="#" class="btn btn-primary pill text-white px-4">Read More</a></p>
          </div>-->
          <!--<div class="col-md-6">
            <div class="row">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Approach</a></li>
                    <li><a href="#">Sustainability</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Careers</a></li>
                  </ul>
              </div>-->
              <!--<div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Ministries</h3>
                  <ul class="list-unstyled">
                    <li><a href="#">Children</a></li>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">Bible Study</a></li>
                    <li><a href="#">Church</a></li>
                    <li><a href="#">Missionaries</a></li>
                  </ul>
              </div>-->
			  <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
           Site developed by Athira S | athiras@mca.ajce.in 
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
            </div>
          </div>

          
          <!--<div class="col-md-2">
            <div class="col-md-12"><h3 class="footer-heading mb-4 text-white">Social Icons</h3></div>
              <div class="col-md-12">
                <p>
                  <a href="#" class="pb-2 pr-2 pl-0"><span class="icon-facebook"></span></a>
                  <a href="#" class="p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="p-2"><span class="icon-instagram"></span></a>
                  <a href="#" class="p-2"><span class="icon-vimeo"></span></a>

                </p>
              </div>
          </div>
        </div>-->
        
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  
  <script src="js/mediaelement-and-player.min.js"></script>

  <script src="js/main.js"></script>
    

  <script>
      document.addEventListener('DOMContentLoaded', function() {
                var mediaElements = document.querySelectorAll('video, audio'), total = mediaElements.length;

                for (var i = 0; i < total; i++) {
                    new MediaElementPlayer(mediaElements[i], {
                        pluginPath: 'https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/',
                        shimScriptAccess: 'always',
                        success: function () {
                            var target = document.body.querySelectorAll('.player'), targetTotal = target.length;
                            for (var j = 0; j < targetTotal; j++) {
                                target[j].style.visibility = 'visible';
                            }
                  }
                });
                }
            });
    </script>

  </body>
</html>
<?php 
include 'co.php'; 
if(isset($_POST['submit']))
{
  $a=$_POST['name'];
  $b=$_POST['address'];
  $c=$_POST['dob'];
  $d=$_POST['anumber'];
  $e=$_POST['gname'];
  $f=$_POST['wnumber'];
  $g=$_POST['cnumber'];
  $h=$_POST['username'];
  $i=$_POST['password'];
   //echo "<script>alert('$g');</script>";
$sq="insert into login(username,password,usertype,status)values('$h','$i',1,0)";
if(mysqli_query($con,$sq))
{
	$s=mysqli_query($con,"select logid from login where username='$h'");
	$r=mysqli_fetch_array($s,MYSQLI_ASSOC);
	$lid=$r['logid'];
	//echo "<script>alert('$lid');</script>";
$sql="insert into reg(logid,name,address,dob,ano,gname,wno,cno)values('$lid','$a','$b','$c','$d','$e','$f','$g')";
 $ch=mysqli_query($con,$sql);
if($ch)
{?>
 <script>
 alert("Regesteration Successfull");
 window.location='login.html'</script>
	<?php
}
else
{
  echo"error:".$sql."<br>".mysqli_error($con);
}
}
}
mysqli_close($con);
?>

