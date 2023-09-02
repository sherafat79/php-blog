<?php
include '../object/main.php';
$security = new Security;
$connect = new Connect;
$security->checkManage();
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

  <title>پنل مدیریت |  کاربران</title>

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
            <h1 class="m-0 text-dark">کاربران</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="#">خانه</a></li>
              <li class="breadcrumb-item active">کاربران</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">جدول کاربران</h3>

                
              </div>
              
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <tbody><tr>
                    <th>شماره</th>
                    <th>نام </th>
                    <th>نام خانوادگی</th>
                    <th>نام کاربری</th>
                    <th>ایمیل</th>
                    <th>سطح</th>
                  
                    <th>عملیات</th>
                    
                  </tr>
                  <?php
                    
                    
                    $result = $connect->query("SELECT * FROM `tbl_user` ORDER BY `id` DESC ");

                    while ($rows = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                        <td>{$rows['id']}</td>
                        <td>{$rows['name']}</td>
                        <td>{$rows['family']}</td>
                        <td>{$rows['username']}</td>
                        <td>{$rows['email']}</td>
                        <td>" . ($rows['level'] == 2 ? "کاربر" : "ادمین") . "</td>
                            <td class='d-flex gap-2'>
                                <a class='btn  btn-primary' href='check/update_user.php?id={$rows['id']}'>تبدیل به " . ($rows['level'] == 1 ? "کاربر" : "ادمین") . "</a>
                                <a class='btn mr-3  btn-danger' href='check/del_users.php?id={$rows['id']}'>حذف</a>
                            </td>
                        </tr>";
                    }
                    ?>
                
                 
                </tbody></table>
              </div>
              <!-- /.card-body -->
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
