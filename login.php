<?php 
//session_start(); 
//echo "popo";

include("co.php");
if(isset($_POST['submit']))
{
    $uname =$_POST['uname'];
	$pass =$_POST['password'];
//echo $u_pass;

$sql="select * from login where username='$uname'";
//echo $sql;

$result=mysqli_query($con,$sql);
$rowcount=mysqli_num_rows($result);
if($rowcount!=0)
{

	while($row=mysqli_fetch_array($result))
	{
		$dbu_name=$row['username'];
		$dbu_pass=$row['password'];
		$dbu_type=$row['usertype'];
        
		if($dbu_name==$uname && $dbu_pass==$pass)
		{
			//$_SESSION['uname']=$dbu_name;
            //$_SESSION['pass']=$dbu_pass;
		     //echo $dbu_type;
			if($dbu_type==0)	
			{
				//$_SESSION['usertype']="admin";
               	header('Location: adminindex.html');
			}
			else if($dbu_type==1)
			{
				//$_SESSION['usertype']="user";
                	header('Location: userindex.html');
			}
			else if($dbu_type==2)
			{
				//$_SESSION['usertype']="User";
					header('Location: userindex1.html');
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
			//header("location:signin.php?error=User Not Found");
	     	//echo "not found";	
}
}
?>