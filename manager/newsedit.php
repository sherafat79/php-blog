<?php
include '../object/main.php';
$security=new security;
$connect = new connect;
$template=new template;
$security->checkManage();
if(!isset($_GET['id']))
{
   $security->Redirect("news");
}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>پنل مدیریت | ایجاد خبر</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="../style/admin/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../style/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="../style/admin/dist/css/bootstrap-rtl.min.css">
  <!-- template rtl version -->
  <link rel="stylesheet" href="../style/admin/dist/css/custom-style.css">

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php
            $security->Covering("inc_temp/header");
            ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php
            $security->Covering("inc_temp/menu");
            ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ویرایش خبر</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">ویرایش خبر</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
               
              </div>
              <?php
	$template->isParametr("empty","لطفا فیلد های مورد نیاز را تکمیل کنید","danger");
	$template->isParametr("uploaderror","خطایی در فایل مورد نظر وجود دارد","danger");
	$template->isParametr("typeerror","پسوند فایل مورد نظر شما صحیح نمی باشد","danger");
	 ?>
              <!-- /.card-header -->
              <!-- form start -->


              <?php
                if (isset($_GET['empty'])) {
                    $security->checkGet($_GET['empty']);
                    $template->message("لطفا تمامی فیلد ها را تکمیل نمایید", "danger");
                }
                $id = $security->checkGet($_GET['id']);
                $result = $connect->query("SELECT * FROM `tbl_news` WHERE id='".$id."'");
                while ($rows = mysqli_fetch_assoc($result)) {
                    $_SESSION['newsid'] = $rows['id'];
                    $_SESSION['newspic'] = $rows['pic'];
                ?>
              <form role="form"   action="check/edit_news.php" method="post" name="frmnewsadd" enctype="multipart/form-data" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">عنوان خبر</label>
                    <input name="title" class="form-control" id="exampleInputEmail1" placeholder="عنوان را وارد کنید" value="<?php echo $security->read($rows['title']); ?>"/>
                  
                  </div>
                  <div class="form-group">
                    <label>متن کوتاه</label>
                    <textarea name="short" class="form-control" rows="3" placeholder="بنویسید..."><?php echo $security->read($rows['short_text']); ?></textarea>
                  </div>
                  <input type="hidden" name="edit">
                  <div class="form-group">
                    <label>متن خبر</label>
                    <textarea name="long" class="form-control" rows="3" placeholder="بنویسید..."><?php echo $security->read($rows['long_text']); ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">تصویر شاخص</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                      </div>
                    
                    </div>
                  </div>
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ارسال</button>
                </div>
              </form>
              <?php
                }
                ?>
            </div>
            <!-- /.card -->


          </div>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>CopyLeft &copy; 2023<a href="http://github.com/hesammousavi/">ساناز هوشمند</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../style/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../style/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../style/admin/dist/js/adminlte.min.js"></script>
</body>
</html>
