<?php
include '../object/main.php';
$security=new security;
$security->checkUser();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>پنل مدیریت سایت</title>
<style type="text/css">
body p {
	color: #FFF;
}
manager_fm {
	color: #FFF;
}
.v {
	color: #FFF;
	font-weight: bold;
}
.ve {
	color: #FFF;
	font-weight: bold;
}
body p {
	font-weight: bold;
	color: #009;
}
veww {
	font-weight: bold;
}
</style>
</head>

<body>
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td height="33" colspan="2" align="center"><p><?php echo $_SESSION['user_name']; ?> به پنل کاربری خود خوش آمدید</p></td>
  </tr>
  <tr>
    <td width="77%" align="center" bgcolor="#000099" class="ve">امکانات</td>
    <td width="23%" align="center" bgcolor="#000099" class="v">دسترسی های سریع </td>
  </tr>
  <tr>
    <td rowspan="16" align="center" valign="top"><p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p></td>
    <?php
	$security->Covering("inc_temp/menu");
	?>
  </tr>
</table>
</body>
</html>