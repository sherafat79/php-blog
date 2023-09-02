<?php
include '../object/main.php';

$security = new Security;
$connect = new Connect;

if(isset($_POST['register'])) {
    $name = $security->checkPost($_POST['name']);
    $family = $security->checkPost($_POST['family']);
    $username = $security->checkPost($_POST['username']);
    $password = $security->checkPost($_POST['password']);
    $email = $security->checkPost($_POST['email']);

    // Check for empty fields
    if(empty($name) || empty($family) || empty($username) || empty($password) || empty($email)) {
        $security->redirect("../register", "empty=1920");
    }

    // Validate email format
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $security->redirect("../register", "email=2901");
    }

    // Check if username or email already exist
    $sql = "SELECT * FROM `tbl_user` WHERE username='".$username."' OR email='".$email."'";
    $checkUser = $connect->query($sql);
	$hashedPassword=$security->hashValue($password);
    if(mysqli_num_rows($checkUser) >= 1) {
        $security->redirect("../register", "exist=1010");
    } else {
        $sql = "INSERT INTO `tbl_user` (`name`, `family`, `username`, `password`, `email`, `level`) 
                VALUES ('".$name."', '".$family."', '".$username."', '".$hashedPassword."', '".$email."', '2')";
        $result = $connect->query($sql);

        if($result) {
            $security->redirect("../register", "success=1010");
        } else {
            $security->redirect("../register", "error=1202");
        }
    }
} else {
    $security->redirect("../register");
}
?>
