<?php
include '../object/main.php';

$security = new security;
$connect = new connect;

if (isset($_POST['login'])) {
    $username = $security->checkPost($_POST['username']);
    $password = $security->checkPost($_POST['password']);
    $captcha = $security->checkPost($_POST['captcha']);

    // Check for empty fields
    if (empty($username) || empty($password)) {
        $security->Redirect("index", "empty=1090");
    }

    // Check captcha
    if ($_SESSION['captcha'] !== $captcha) {
        $security->Redirect("index", "captcha=9022");
    }

    $pass_hash = $security->hashValue($password);
    $sql = "SELECT * FROM `tbl_user` WHERE username='".$username."' AND password='".$pass_hash."'";
    $result = $connect->query($sql);
    $rows = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) == 1) {
        if ($rows["level"] == 1) {
            $_SESSION['manage_name'] = $rows['name']." ".$rows['family'];
            $_SESSION['manage_log'] = true;
            $security->Redirect("../manager/index", "welcome=1010");
        } elseif ($rows["level"] == 2) {
            $_SESSION['user_name'] = $rows['name']." ".$rows['family'];
            $_SESSION['user_log'] = true;
            $security->Redirect("../user/index", "welcome=1010");
        }
    } else {
        $security->Redirect("index", "errorlog=9020");
    }
} else {
	die("ddd");
    $security->Redirect("index");
}
?>