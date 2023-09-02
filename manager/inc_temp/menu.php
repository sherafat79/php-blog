
<?php
// Get the current page URL
$currentUrl = $_SERVER['REQUEST_URI'];



// Create a function to check if a menu item is active
function isActive($url, $currentUrl)
{
    return ("/manager/".$url === $currentUrl) ? 'active' : '';
}function isOpen($url, $currentUrl)
{
    return ("/manager/".$url === $currentUrl) ? 'menu-open' : '';
}
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
     
      <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['manage_name']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview  <?php echo isOpen("newsadd.php", $currentUrl); ?>  <?php echo isOpen("news.php", $currentUrl); ?> ">
              <a href="#" class="nav-link <?php echo isActive("newsadd.php", $currentUrl); ?> <?php echo isActive("news.php", $currentUrl); ?>">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                  اخبار
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item ">
                  <a href="newsadd.php" class="nav-link <?php echo isActive("newsadd.php", $currentUrl); ?> ">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>ثبت خبر جدید</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="news.php" class="nav-link <?php echo isActive("news.php", $currentUrl); ?>">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>لیست اخبار</p>
                  </a>
                </li>
              </ul>
            </li>   <li class="nav-item has-treeview  <?php echo isOpen("massage.php", $currentUrl); ?> ">
              <a href="#" class="nav-link  <?php echo isActive("massage.php", $currentUrl); ?>">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                  پیام ها 
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="massage.php" class="nav-link <?php echo isActive("massage.php", $currentUrl); ?> ">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>مشاهده پیام ها</p>
                  </a>
                </li>
                
              </ul>
            </li> <li class="nav-item has-treeview <?php echo isOpen("users.php", $currentUrl); ?>">
              <a href="#" class="nav-link  <?php echo isActive("users.php", $currentUrl); ?>">
                <i class="nav-icon fa fa-dashboard"></i>
                <p>
                کاربران
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="users.php" class="nav-link <?php echo isActive("users.php", $currentUrl); ?> ">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>مشاهده کاربران</p>
                  </a>
                </li>
               
              </ul>
              <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                 خروج
                
                </p>
              </a>
            </li>
            </li>
           
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>
