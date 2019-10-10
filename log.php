<?php 
session_start(); 
include("connection.php");
$u_name=(isset($_POST['email'])?$_POST['email'] :'');
$pass=(isset($_POST['pass'])?$_POST['pass'] :'');

include("connection.php");
if(isset($_POST['submit']))
{
    $email =$_POST['email'];
	$pass =$_POST['pass'];
//echo $u_pass;

$sql="select * from loginn1 where username='$email'";
//echo $sql;

$result=mysqli_query($co,$sql);
$rowcount=mysqli_num_rows($result);
if($rowcount!=0)
{

	while($row=mysqli_fetch_array($result))
	{
		$loginid=$row['loginid'];
		$dbu_name=$row['username'];
		$dbu_pass=$row['password'];
		$dbu_type=$row['usertype'];
		$_SESSION['loginid']=$loginid;

        
		if($dbu_name==$email && $dbu_pass==$pass)
		{
			$_SESSION['uname']=$dbu_name;
            $_SESSION['pass']=$dbu_pass;
			$_SESSION['login']="1";
		     //echo $dbu_type;
			
			if($dbu_type==0)	
		{
				$_SESSION['usertype']="admin";
               	header('Location: new-post.html');
			}
			else if($dbu_type==1)
			{
				$_SESSION['usertype']="Student";
				$sql1="select * from register.php where loginid='$loginid'";
				$result1=mysqli_query($co,$sql1);
					if($row1=mysqli_fetch_array($result1))
					$usr_name=$row1['email'];
					$_SESSION['usr_name']=$usr_name;
                	header('Location: view job.php');
			}
			else if($dbu_type==2)
			{
				$_SESSION['usertype']="company";
			$sql1="select * from companyreg where loginid='$loginid'";
			$result1=mysqli_query($co,$sql1);
					if($row1=mysqli_fetch_array($result1))
					$usr_name=$row1['email'];
					$_SESSION['usr_name']=$usr_name;
					header("location: new-post.html");
			}
		}
		else
        {
			?>
			<script>
 alert("Invalid login credentials");
 window.location='login.html'
</script>;
<?php
        }
	}
}
else
{
	?>
	<script>
 alert("User not found");
 window.location='login.html'
</script>;
<?php
        }
	}
else
{
	?>
	<script>
 alert("User not found");
 window.location='login.html'
</script>;
<?php
			//header("location:signin.php?error=User Not Found");
	     	//echo "not found";	
}

?>