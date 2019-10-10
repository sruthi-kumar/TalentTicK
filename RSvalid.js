function validateform()
{
var x=document.forms["myform"]["firstname"].value;
if(x=="")
{
alert("Please fill firstname");
document.getElementById('firstname').focus();
return false;
}

if ((x.length < 3) || (x.length)> 3);
  {
	alert("your characters must be 3 to 15 characters");
	document.getElementById('firstname').focus();
	return false;
  }


var y=document.forms["myform"]["lastname"].value;
if(y=="")
{
alert("Please fill lastname");
return false;
}

if( document.myform.phno.value == "" ||
           isNaN( document.myform.phno.value) ||
           document.myform.phno.value.length != 10 )
   {
     alert( "Please provide a 10 digit mobile no" );
     document.myform.phno.focus() ;
     return false;
   }
   {
  alert("Please choose your Gender: Male or Female");
return false;
}
   
var a=document.forms["myform"]["dob"].value;
if(a=="")
{
alert("Please fill dateofbirth field");
return false;
}
var b=document.forms["myform"]["address"].value;
if(b=="")
{
alert("Please fill address field");
return false;
}
if( document.myform.gpg.value == "" ||
           isNaN( document.myform.gpg.value) ||
           document.myform.gpg.value.length != 2 )
   {
     alert( "Please provide a 2 digit percentage" );
     document.myform.gpg.focus() ;
     return false;
   }

var d=document.forms["myform"]["gug"].value;
if(d=="")
{
alert("Please fill percentage field");
return false;
}
var e=document.forms["myform"]["g+2"].value;
if(e=="")
{
alert("Please fill percentage field");
return false;
}
var f=document.forms["myform"]["g10"].value;
if(f=="")
{
alert("Please fill address field");
return false;
}

var g=document.forms["myform"]["city"].value;
if(g=="")
{
alert("Please select a city");
return false;
}
var h=document.forms["myform"]["pincode"].value;
if(h == "" )
{
	alert("plese insert a pincode");
	return false;
}

if( document.myform.pincode.value == "" ||
          isNaN( document.myform.pincode.value)||
		  document.myform.pincode.value.length !=6 )
		  {
			  alert( "please provide valid pincode");
			  document.getElementById('pincode').focus();
			  return false
		  }
		  
if(myform.password.value != "" && myform.password.value == myform.confirmpassword.value) {
      if(myform.password.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        myform.password.focus();
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