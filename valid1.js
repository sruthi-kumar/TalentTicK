function validateform()
{
	var x=new RegExp("^[a-zA-z ]*$");
if(!x.test(document.myform.firstname.value))
{
	alert("Enter name with characters only");
	myform.firstname.focus();
	return false;
}
var x=document.forms["myform"]["firstname"].value;
if(x.length<2 || x.length>30)
{
alert("Please enter name with more than 2 letters and less than 30 letters");
document.getElementById("firstname").focus();
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

	var Phone=document.myform.phone_number
	
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
if(!x.test(document.myform.phone_number.value))
{
	alert("Phone number is invalid");
	myform.phone_number.focus();
	return false;
}
      var k=document.forms["myform"]["gender"].value;
if(k=="")
{
  alert("Please choose your Gender: Male or Female");
return false;
}
   var h=document.forms["registration"]["dob"].value;
if(h=="")
{
alert("Please Fill Date of birth");
document.getElementById("dob").focus();
return false;
}
var GivenDate =document.forms["myform"]["dob"].value;
var CurrentDate = new Date();
GivenDate = new Date(GivenDate);

if(GivenDate > CurrentDate){
    alert('Given date is greater than the current date.');
	document.getElementById("dob").focus();
	return false;
}

   
   
   
   
   
   
   var c=document.forms["myform"]["address"].value;
if(c=="")
{
alert("Please fill address field");
return false;
}
var b=document.forms["myform"]["city"].value;
if(b=="")
{
alert("Please select a city");
return false;
}
var g=document.forms["myform"]["pincode"].value;
if(g=="")
{
alert("Please pincode");
 document.getElementById("pincode").focus();
return false;
}
else if(document.myform.pincode.value.length!="6")
{
	alert("Provide pincode as 6 numbers");
	document.getElementById("pincode").focus();
	return false;
}


   

   

    if(myform.password.value != "" && myform.password.value == myform.confirmpass.value) {
      if(myform.password.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        myform.pass.focus();
        return false;
      }
      
      re = /[0-9]/;
      if(!re.test(myform.password.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        myform.password.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(myform.password.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        myform.password.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(myform.password.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        myform.password.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      myform.password.focus();
      return false;
    }

    return true;
 }