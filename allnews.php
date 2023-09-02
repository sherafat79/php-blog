<?php
include 'object/main.php';
$security = new security;
$connect = new connect;
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست اخبار سایت</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="style/css/style.css">
    <!--[if IE 8]>
    <link rel="stylesheet" type="text/css" href="css/style-ie8.css">
    <![endif]-->
    <script type="text/javascript" src="style/js/jquery-1.8.3.min.js"></script>
</head>
<body>
<div id="themeyab-page" class="full">
    <div id="themeyab-page-center" class="middle">
        <?php $security->Covering("inc_temp/header"); ?>
        <div id="themeyab-menu-search" class="middle-center">
            <div id="themeyab-menu">
                <ul>
                    <?php $security->Covering("inc_temp/menu_top"); ?>
                </ul>
            </div>
            
        </div>
        <div class="middle-center" id="themeyab-slide">
            <div id="myCarousel" class="carousel slide">
                <div class="carousel-inner">
                    <?php $security->Covering("inc_temp/slider"); ?>
                </div>
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
            </div>
        </div>
        <div class="middle-center" id="themeyab-content">
            <div id="themeyab-content-right">
                <div id="themeyab-menu-right" class="style-content">
                    <ul>
                        <?php $security->Covering("inc_temp/menu_right"); ?>
                    </ul>
                </div>
                <?php $security->Covering("inc_temp/news"); ?>
            </div>
            <div id="themeyab-content-left">
                <div id="themeyab-content-main">
                    <div id="themeyab-news" class="style-content">
                        <h3>لیست کلیه اخبار سایت</h3>
                        <div id="news">
                            <div class="news-center">
                                <table width="596" border="0" cellspacing="1" cellpadding="1">
                                    <?php
                                    $counter = 20;
                                   
                                    $sql = "SELECT * FROM `tbl_news` ORDER BY `id` DESC";
                                    $result = $connect->query($sql);
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        echo "<tr>
                                            <td width='300'><a href=newsdetail.php?id={$rows['id']}>{$security->read($rows['title'])}</a></td>
                                            <td width='283'>{$security->read($rows['date'])}</td>
                                        </tr>";
                                    }
                                    ?>
                                </table>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="full" id="themeyab-footer">
    <?php $security->Covering("inc_temp/footer"); ?>
</div>
<script src="style/js/bootstrap.min.js"></script>
<script type="text/javascript" src="style/js/fs.js"></script>
</body>
</html>