<?php
session_start();
unset($_SESSION['manage_log']);
unset($_SESSION['manage_name']);
header("location:../login");
exit;
?>