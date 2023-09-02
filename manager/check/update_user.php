<?php
include '../../object/main.php';
$security = new security;
$connect = new connect;

if (isset($_GET['id'])) {
    $id = $security->checkGet($_GET['id']);

    // Fetch the current user level
    $getUserLevelSql = "SELECT `level` FROM `tbl_user` WHERE `id` = '{$id}'";
    $getUserLevelResult = $connect->query($getUserLevelSql);

    if ($getUserLevelResult) {
        $user = mysqli_fetch_assoc($getUserLevelResult);
        $newLevel = ($user['level'] == 1) ? 2 : 1; // Toggle the user level

        // Update the user's level
        $sql = "UPDATE `tbl_user` SET `level` = '{$newLevel}' WHERE `id` = '{$id}'";
        $result = $connect->query($sql);

        if ($result) {
            $security->Redirect("../users", "update=2020");
        } else {
            $security->Redirect("../users", "error=2020");
        }
    } else {
        $security->Redirect("../users", "error=2020");
    }
} else {
    $security->Redirect("../users");
}
?>