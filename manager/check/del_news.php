<?php
include '../../object/main.php';

$security = new Security;
$connect = new Connect;

if (isset($_GET['id'])) {
    $id = $security->checkGet($_GET['id']);
    $sql_select = "SELECT * FROM `tbl_news` WHERE id='$id'";
    $sql_delete = "DELETE FROM `tbl_news` WHERE id='$id'";

    $result_select = $connect->query($sql_select);
    if (mysqli_num_rows($result_select) >= 1) {
        $rows = mysqli_fetch_assoc($result_select);
        $img = "./upload/{$rows['pic']}";
        unlink($img);

        $result = $connect->query($sql_delete);
        if ($result) {
            $security->Redirect("../news", "delete=1010");
        } else {
            $security->Redirect("../news", "error_del=2030");
        }
    } else {
        $security->Redirect("../news", "error_found=1020");
    }
} else {
    $security->Redirect("../news");
}
?>
