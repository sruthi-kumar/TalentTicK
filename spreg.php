<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
 include 'co.php';
 $q="select * from district";
 $sql=mysqli_query($con,$q);
 $q1="select * from scategory";
 $sql1=mysqli_query($con,$q1);
 ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<script type="text/javascript" src="valid1.js"></script>
	<title>A2Z a corporate Category Flat Bootstrap Responsive Website Template | Status :: w3layouts</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="A2Z Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="//fonts.googleapis.com/css?family=Noto+Serif:400,400i,700,700i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
</head>

<body>
	<!-- header -->
	<div class="header-w3layouts">
		<div class="container">

			<div class="logo-nav-agileits">
				<div class="logo-nav-left">
					<h1>
						<a href="index.html">
							<span class="fa fa-home"></span>a2z
							<span class="logo-title">home services</span>
						</a>
					</h1>
				</div>

				<div class="header-grid-left-wthree">
					<div class="h3-title">
						<h3>contact us</h3>
					</div>
					<ul>
						<li>
							<span class="fa fa-envelope" aria-hidden="true"></span>
							<a href="mailto:info@example.com">johnmeenu.john15</a>
						</li>
						<li>
							<span class="fa fa-phone" aria-hidden="true"></span>9567986054</li>
						<li>
							<span class="fa fa-phone" aria-hidden="true"></span>9495334861
						</li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
			<div class="logo-nav-left1">
				<nav class="navbar navbar-default">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">Menu
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>

					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
						<ul class="nav navbar-nav">
							<li>
								<a href="index.html">Home</a>
							</li>
							<li>
								<a href="about.html">about us</a>
							</li>
							<li>
								<a href="services.html">services</a>
							</li>
							<li>
								<a href="signin.html">signin</a>
								<li>
								<a href="creg.php">sign up</a>
								
							</li>
							</li>
							
							<li>
								<a href="contact.html">contact us</a>
							</li>
							
							<li class="s-bar">
								<div class="search-w3_agileits">
									<input class="search_box" type="checkbox" id="search_box">
									<label class="icon-search" for="search_box">
										<span class="fa fa-search" aria-hidden="true"></span>
									</label>
									<div class="search_form">
										<form action="#" method="post">
											<input type="search" name="Search" placeholder=" " />
											<input type="submit" value="Search">
										</form>
									</div>
								</div>
							</li>
						</ul>
					</div>

				</nav>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //header -->
	<div class="banner-bg2">
		<div class="banner-info bg3 inner">
			<h3>one click repair service</h3>
			<p>repair.&nbsp;improve.&nbsp;maintain</p>
		</div>
	</div>
	<!-- breadcrumbs -->
	<div class="breadcrumbs-w3l">
		<div class="container">
			<span class="breadcrumbs">
				<a href="index.html">Home</a> |
				<span>Status</span>
			</span>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- track order -->


	<div class="w3ls-section banner-single" id="register">
		<div class="container">
			<h4 class="main-title">Join As A Service Provider</h4>
			<div class="about-inner-main">
				<div class="col-md-5 reg-img">
					<img src="images/a1.png" alt="" class="img-responsive" />
				</div>
				<div class="col-md-7  w3layouts-reg-form">
					<form action="spreg.php" name="myform"  method="post" class="banner_form" onsubmit="return validateform()">
						<p>Please fill your details as mentioned below </p>
						<div class="sec-left">
							<label class="contact-form-text">Name</label>
							<input autocomplete="off" placeholder="your name " name="name" type="text" pattern="[A-Z a-z]{1,}" title="use characters only">
						</div>
						
						<div class="sec-left">
							<label class="contact-form-text">Phone no.</label>
							<input autocomplete="off" placeholder="mobile no" name="phone" type="text">
						</div>
						<div class="sec-left">
							<label class="contact-form-text">Gender &nbsp&nbsp</label><br>
							<input type="radio"   name="gender" value="male">male &nbsp&nbsp
  			&nbsp&nbsp <input  type="radio" name="gender" value="female" >female
						</div>
						<div class="sec-left">
							<label class="contact-form-text">DOB &nbsp&nbsp&nbsp</label><br>
							<input type="date" name="dob" style="width:445px;height:45px;">
						</div>
						<div style="width:445px;height:45px; " class="form-select sec-left">
							<label class="contact-form-text" >Select District</label>
							<select name="dis"  >
								<option value="">---- SELECT ----</option>
								<?php
                                  while($fetch=mysqli_fetch_array($sql))
						            {
                                       ?>
                                        <option value="<?php echo $fetch['disid']?>"><?php echo $fetch['disname']?>  <?php
                                    }
						                ?>
							</select>
						</div><br><br><br><br>
					<div style="width:445px;height:45px; " class="form-select sec-left">
							<label  class="contact-form-text">city</label>
							<input autocomplete="off" placeholder="enter city" name="city" type="text">
						</div><br><br><br><br>
						
						<div class="form-tx">
							<label class="contact-form-text">Address</label>
							<textarea autocomplete="off" placeholder="your address" name="add"></textarea>
                   </div>
                   <div class="sec-left">
                    <label class="contact-form-text">Id proof</label>
                    <input name="file" type="file" accept=".pdf,.jpg,.jpeg,.png"  placeholder="Select file"
                        >
                </div>
                   <div class="form-select sec-left">
							<label class="contact-form-text">service category </label><br>
							<select name="service" style="width:445px;height:45px; " >
								<option value="">---- SELECT ----</option>
						                <?php
                                 while($fetch=mysqli_fetch_array($sql1))
						            {
                                       ?>
                                        <option value="<?php echo $fetch['sid']?>"><?php echo $fetch['sname']?>  <?php
                                    }
						                ?>
							</select>
						</div><br><br><br><br><br>
							 
							<div class="sec-left">
							<label class="contact-form-text">Username</label>
							<input autocomplete="off" placeholder="username" name="uname" type="text">
						</div>
						<div class="sec-left">
							<label class="contact-form-text">Password</label><br>
							<input style="width:445px;height:45px; "  placeholder="password" name="pass" type="password">
						</div>
						<div class="sec-left">
							<label class="contact-form-text">Confirm Password</label><br>
							<input style="width:445px;height:45px; "  placeholder="confirm password" name="cpass" type="password">
						</div>
						
						<div class="wthree-text">
							
							<div class="clearfix"> </div>
						</div>
						<input type="submit" value="submit" name="submit">
					</form>


				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //register -->
	<!-- footer -->
	<div class="footer-main-w3_agile">
		<div class="footer-dot">
			<div class="container">
				<div class="footer-bottom">
					<div class="col-md-4 col-sm-6 col-xs-6 footer-grid1 address">
						<h4>Contact Info</h4>
						<ul>
							<li>
								<span class="fa fa-home" aria-hidden="true"></span>
								<p>1234k Avenue,block-4,New York City.</p>
							</li>
							<li>
								<span class="fa fa-envelope-o" aria-hidden="true"></span>
								<a href="mailto:info@example.com">info@example.com</a>
							</li>
							<li>
								<span class="fa fa-phone" aria-hidden="true"></span>
								<p>+1234 567 892</p>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 footer-grid1 res">
						<h4>services</h4>
						<ul>
							<li>
								<a href="#">appliance repair</a>
							</li>
							<li>
								<a href="#">home improvement</a>
							</li>
							<li>
								<a href="#">home maintenance</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-6 footer-grid1 ftr-img">
						<h4>latest Posts</h4>
						<ul>
							<li>
								<a href="single.html">
									<img src="images/t1.jpg" alt=" " class="img-responsive" />
								</a>
							</li>
							<li>
								<a href="single.html">
									<img src="images/t2.jpg" alt=" " class="img-responsive" />
								</a>
							</li>
							<li>
								<a href="single.html">
									<img src="images/t3.jpg" alt=" " class="img-responsive" />
								</a>
							</li>
							<li>
								<a href="single.html">
									<img src="images/t4.jpg" alt=" " class="img-responsive" />
								</a>
							</li>
							<li>
								<a href="single.html">
									<img src="images/t1.jpg" alt=" " class="img-responsive" />
								</a>
							</li>
							<li>
								<a href="single.html">
									<img src="images/t2.jpg" alt=" " class="img-responsive" />
								</a>
							</li>
							<li>
								<a href="single.html">
									<img src="images/t3.jpg" alt=" " class="img-responsive" />
								</a>
							</li>
							<li>
								<a href="single.html">
									<img src="images/t2.jpg" alt=" " class="img-responsive" />
								</a>
							</li>
							<li>
								<a href="single.html">
									<img src="images/t4.jpg" alt=" " class="img-responsive" />
								</a>
							</li>
						</ul>
					</div>
					
					<div class="clearfix"></div>
				</div>
				
				</div>
			</div>
		</div>
	</div>
	<div class="cpy-footer">
		<div class="container">
			<div class="footer-top">
				<div class="logo-nav-left footer-top1">
					<h2>
						<a href="index.html">
							<span class="fa fa-home logo-ftr"></span>a2z
							<span class="logo-title">home services</span>
						</a>
					</h2>
				</div>
				<div class="footer-social">
					<h4>connect with us</h4>
					<ul>
						<li>
							<a href="#">
								<span class="fa fa-facebook icon_facebook"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-twitter icon_twitter"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-dribbble icon_dribbble"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-google-plus icon_g_plus"></span>
							</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		

	</div>
	<!--//footer  -->
	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //js-->
	<!--search-bar-->
	<script src="js/main.js"></script>
	<!--//search-bar-->
	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<script src="js/SmoothScroll.min.js"></script>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>
</body>
</html>

<?php
include 'co.php';
 if(isset($_POST['submit']))
{
$a=$_POST['name'];
$b=$_POST['phone'];
$c=$_POST['gender'];
$d=$_POST['dob'];
$e=$_POST['dis'];
$f=$_POST['city'];
$g=$_POST['add'];
$h=$_POST['service'];
$i=$_POST['uname'];
$j=$_POST['pass'];
$p=$_POST['file'];
/*$img=$_FILES["file"]["name"];
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
$image=$target_file;
*/
$sql="select * from login where username='$i'";
$result=mysqli_query($con,$sql);
$rowcount=mysqli_num_rows($result);
if($rowcount==0)
{
$sq="insert into login(username,password,usertype,status)values('$i','$j',2,0)";
if(mysqli_query($con,$sq))
{
 $s=mysqli_query($con,"select logid from login where username='$i' ");
	$r=mysqli_fetch_array($s,MYSQLI_ASSOC);
	$lid=$r['logid'];
	//echo "<script>alert('$e');</script>";
    $sql="insert into spreg(logid,name,phoneno,gender,dob,disid,city,address,sid,idproof)values('$lid','$a', '$b' , '$c', '$d' ,'$e', '$f', '$g', '$h','$p')";
   if(mysqli_query($con,$sql))
     {?>
	 <script>
 alert("Regesteration Successfull");
</script>";
	<?php
}
else
{
  echo"error:".$sql."<br>".mysqli_error($con);
}
}
}
else
{?>
	<script>
 alert("User Already Exists");
</script>";
<?php
}
}
mysqli_close($con);
?>