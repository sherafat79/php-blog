<?php
include 'object/main.php';
$security = new security;
$connect = new connect;
?>
<html>
	<head>
		<title>صفحه اصلی دانشجو نیوز</title>
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
						<div id="themeyab-last-events" class="style-content">
							<h2>آخرین رویدادها</h2>
						<ul>
                    <?php
					$sql="SELECT * FROM `tbl_news` ORDER BY `id` DESC LIMIT 0,5";
					$result = $connect->query($sql);
					while($rows=mysqli_fetch_assoc($result))
					{
						echo "<li><a href=newsdetail.php?id=$rows[id]>".$rows['short_text']."</a></li>
";
					}
					?>
								
							</ul>
						</div>
						<div id="themeyab-content-main">
							<div id="themeyab-news" class="style-content">
								<h3>اخبار سازمان</h3>
								<div id="news">
						<?php
						$counter=10;
						$page =$security->checkGet(@$_GET['page'])??0;
						
						$start=($page)*$counter;
					
						$sql_news="SELECT * FROM `tbl_news` ORDER BY `id` DESC LIMIT ".$start.",".$counter."";
					
						$result_news=$connect->query($sql_news);
						while($rows_n=mysqli_fetch_assoc($result_news))
						{
												?>
                                    <div class="news-center">
					<?php echo "<a href=newsdetail.php?id=$rows_n[id]>";?>
                    <img src="<?php 
					 if($rows_n['pic']=='')
					 {
					 	echo "style/no-image.jpg";
					 }
					else{
						 echo "./manager/check/upload/".$rows_n['pic']; 
					}
					 
					 ?>" alt=""/>
                                 
										<p><span><?php echo $rows_n['title']; ?>
                                        </span>
                                        <?php
										echo $rows_n['short_text'];
										?>
                                        </p>
                                        </a>
								  </div>
                                  <?php
									}
								?>
	 <?php
	 $sql="SELECT * FROM `tbl_news`";
	 $query=$connect->query($sql);
	 $number=mysqli_num_rows($query);
	 $number=ceil($number/$counter);
	 if($page>0 && $page<$number) 
	 {
		 echo " <a href=?page=".($page+1)."> بعدی </a> ";
	 }
	 if($page>1 && $page<=$number)
	 {
		 echo " <a href=?page=".($page-1)."> قبلی </a> ";
	 }
	 echo "<br/>صفحه فعلی:".$page;
     ?>
                                  <br/>
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