<?php
include 'object/main.php';
$security = new security;
$connect = new connect;
if(!isset($_GET['id'])){
$security->Redirect("index");
}
?>
<html>
	<head>
		<title>جزئیات خبر مورد نظر</title>
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
				<div class="middle-center" id="themeyab-slide">
					<div id="myCarousel" class="carousel slide">
						<div class="carousel-inner">
							<?php 
							$security->Covering("inc_temp/slider");
							?>
						</div>
						<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
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
						<?php
						$security->Covering("inc_temp/news");
						?>
					</div>
					<div id="themeyab-content-left">
					  <div id="themeyab-content-main">
					  <div id="themeyab-news" class="style-content">
								<h3>جزئیات خبر</h3>
								<div id="news">
								  <div class="news-center">
                                  <?php
								  $id=$security->checkGet($_GET['id']);
							  $sql="SELECT * FROM `tbl_news` WHERE id='".$id."'";		
							   $result = $connect->query($sql);
							   while($rows=mysqli_fetch_assoc($result))
							   {
								  ?>
								    <table width="643" height="117" border="0" cellpadding="1" cellspacing="1">
								      <tr>
				  <td width="120">شماره خبر :<?php echo $security->read($rows['id']); ?> </td>
								        <td width="516">تاریخ انتشار:<?php echo $security->read($rows['date']); ?></td>
							          </tr>
								      <tr>
								        <td>عنوان خبر:</td>
								        <td><?php echo $security->read($rows['title']); ?></td>
							          </tr>
								      <tr>
								        <td height="26">متن خبر : </td>
								        <td><?php echo $security->read($rows['long_text']); ?></td>
							          </tr>
								      <tr>
								        <td>تصویر : </td>
								        <td>
                                        <?php 
										if($rows['pic']=='')
											echo 'تصویر شاخص وجود ندارد';
										else{
										 echo "<img src=./manager/check/upload/$rows[pic] />";
										}
										?>
                                        </td>
							          </tr>
								      <tr>
								        <td>نویسنده:</td>
								        <td><?php echo $security->read($rows['name']); ?></td>
							          </tr>
							        </table>
                                    <?php
							   }
									?>
								    <p>&nbsp;</p>
								    <p>&nbsp;</p>
								    <p>&nbsp;</p>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="full" id="themeyab-footer">
			<?php
			$security->Covering("inc_temp/footer");
			?>
		</div>			
	<script src="style/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="style/js/fs.js"></script>
	</body>
</html>	