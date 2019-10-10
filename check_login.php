 <?php
session_start();
//$usr_name="popo";
include("dbconnect.php");
$u_name=(isset($_POST['uname'])?$_POST['uname'] :'');
$pass=(isset($_POST['password'])?$_POST['password'] :'');
//echo $pass;

$sql="select * from login where username='$u_name'";
//echo $sql;
$result=mysqli_query($con,$sql);
$rowcount=mysqli_num_rows($result);

if($rowcount!=0)
	{
		//echo"found";
		while($row=mysqli_fetch_array($result))
		{
			$login_id=$row['login_id'];
			$db_uname=$row['username'];
			$db_pass=$row['pass'];
			$db_type=$row['type'];
			$_SESSION['login_id']=$login_id;
			//$role=$row['role'];
			if($u_name==$db_uname&&$pass==$db_pass)
			{
				$_SESSION['u_name']=$username;
				$_SESSION['login']="1";
				
				$_SESSION['pass']=$password;
				
				if($db_type==0)
				{
					$_SESSION['type']="Admin";
					//echo "ok";
					header("location:../MAIN PROJECT/Admin/admin_home.php");
				}
				else if($db_type==1)
				{
					$_SESSION['type']="Homemakers";
					//echo "ok";
					$sql1="select * from homemakers_reg where login_id='$login_id'";
					//echo $sql;
					$result1=mysqli_query($con,$sql1);
					if($row1=mysqli_fetch_array($result1))
					$usr_name=$row1['name'];
					$_SESSION['usr_name']=$usr_name;
					header("location:../MAIN PROJECT/Homemakers/homemakers_home.php");
				}
				else if($db_type==2)
				{
					$_SESSION['type']="Customer";
					//echo "ok";
					$sql1="select * from customers_reg where login_id='$login_id'";
					//echo $sql;
					$result1=mysqli_query($con,$sql1);
					if($row1=mysqli_fetch_array($result1))
					$usr_name=$row1['name'];
					$_SESSION['usr_name']=$usr_name;
					header("location:../MAIN PROJECT/Customer/customer_home.php");
				}
			}
			else
			{
				header("location:../MAIN PROJECT/login.php?error=wrong password");
				//echo "wrong";
			}
		}
			
	}
	else
	{
		header("location:../MAIN PROJECT/login.php?error=User Not Found");
		//echo "not found";
	}

?>
				