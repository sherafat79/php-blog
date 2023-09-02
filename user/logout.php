<?php
session_start();
unset($_SESSION['user_log']);
unset($_SESSION['user_name']);
header("location:../login");
exit;
?>