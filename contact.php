<?php
include 'object/main.php';
$security=new security;
$template=new template;
?>
<html>
	<head>
		<title>تماس با ما</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.css">
		<!-- HTML5 Shim for IE Backward Compatibility -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<![endif]-->
		<link rel="stylesheet" type="text/css" href="style/css/style.css">
		<!--[if IE 8]>
			<link rel="stylesheet" type="text/css" href="css/style-ie8.css">
		<![endif]-->
		<script type="text/javascript" src="style/js/jquery-1.8.3.min.js"></script>
	</head>
	<body>
		<div id="themeyab-page" class="full">
			<div id="themeyab-page-center" class="middle">	
			<?php
					$security->Covering("inc_temp/header");
				?>
				<div id="themeyab-menu-search" class="middle-center">
					<div id="themeyab-menu">
						<ul>
					<?php
					$security->Covering("inc_temp/menu_top");
					?>
						</ul>
					</div>
				
				</div>
				<div class="middle-center" id="themeyab-content">
					<div id="themeyab-content-right">
						<div id="themeyab-menu-right" class="style-content">
							<ul>
							<?php
								$security->Covering("inc_temp/menu_right");
								?>
							</ul>
						</div>
						<div class="page-contact">
							<div id="themeyab-newsletter" class="style-content newsletter-contact">
								<h3>عضویت در خبرنامه</h3>
								<span>با ثبت ایمیل خود در بخش خبرنامه ، مشترک آخرین اخبار و اطلاعات سازمان شوید:</span>
								<form action="">
									<input class="txt-register" type="text" onFocus="if(this.value=='Email Address') this.value='';" onBlur="if(this.value=='') this.value='Email Address';" value="Email Address"/>
									<input class="btn-register" type="button" value="ثبت"/>
								</form>
								<p><a href="#">یا میتوانید از طریق فید خبری اخبار ما را دنبال کنید.</a></p>
							</div>
						</div>	
					</div>
					<div id="themeyab-content-left" class="contact-left">
					  <h3>تماس با ما</h3>
                      <?php
 					if(isset($_GET['empty']))
					  {
						  $security->checkGet($_GET['empty']);
				$template->message("لطفا تمامی فیلد های موردنیاز را تکمیل نمایید","danger");
					  }
					 if(isset($_GET['email']))
					  {
						  $security->checkGet($_GET['email']);
				$template->message("لطفا ایمیل را صحیح وارد نمایید","danger");
					  }
					  	  else if(isset($_GET['error']))
					  {
						  $security->checkGet($_GET['error']);
				$template->message("با عرض پوزش پیام شما ثبت نشد","danger");
					  }
					  
					    else if(isset($_GET['send']))
					  {
						  $security->checkGet($_GET['send']);
				$template->message("با تشکر به زودی پیام شما توسط مدیریت بررسی می شود","green");
					  }
					  
					  ?>
			<form action="check/contact.php" method="post" name="contact">
				<input name="name" type="text" id="name" placeholder="نام شما..." />
						  <input name="email" type="text" id="email" placeholder="email..." dir="ltr" />
				<textarea name="text" id="text" type="text"/></textarea>
  <input type="submit" name="btn-send" value="ارسال پیغام" id="btn-send"/>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="full" id="themeyab-footer">
			<div class="middle">	
				<div class="middle-center" id="themeyab-footer-center">
					<p>تمام حقوق این سایت محفوظ و متعلق به سازمان می باشد.</p>
				</div>
			</div>
		</div>				
	<script src="style/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="style/js/fs.js"></script>
	</body>
</html>	