<?php
include '../../object/main.php';
include '../../tools/date/jdf.php';
$security = new Security;
$connect = new Connect;

if (isset($_POST['edit'])) {
  
    $title = $security->checkPost($_POST['title']);
    $short = $security->checkPost($_POST['short']);
    $long = $security->checkPost($_POST['long']);
    $date = jdate('Y/n/j');
    
    if ( empty($title) || empty($short) || empty($long)) {
		
        $security->Redirect("../news", "empty=2033");
    } else {
        if ($_FILES['file']['name'] == '') {
            $sql = "UPDATE `tbl_news` SET
                `title` = '$title',
                `short_text` = '$short',
                `long_text` = '$long',
                `date` = '$date'
                WHERE `tbl_news`.`id` = '{$_SESSION['newsid']}'";

            $result = $connect->query($sql);

            if ($result) {
                $security->Redirect("../news", "update=1010");
            } else {
                $security->Redirect("../news", "qqq=1010");
            }
        } else {
            if ($_FILES['file']['error'] > 0) {
                $security->Redirect("../news", "uploaderror=2039");
            } else {
                if (is_uploaded_file($_FILES['file']['tmp_name'])) {
                    $white = array('.png', '.gif', '.jpg');
                    $file = strrchr($_FILES['file']['name'], '.');
                    
                    if (in_array($file, $white)) {
                        $filename = $_FILES['file']['name'];
                        $file = md5($filename . microtime()) . substr($filename, -5, 5);
                        move_uploaded_file($_FILES['file']['tmp_name'], "./upload/" . $file);

                        $sql_update = "UPDATE `tbl_news` SET
                            `title` = '$title',
                            `short_text` = '$short',
                            `long_text` = '$long',
                            `date` = '$date',
                            `pic` = '$file'
                            WHERE `tbl_news`.`id` = '{$_SESSION['newsid']}'";

                        $result_u = $connect->query($sql_update);

                        if ($result_u) {
                            $file_for_del = "./upload/" . $_SESSION['newspic'];
                            unlink($file_for_del);
                            $security->Redirect("../news", "update=1010");
                        } else {
                            $security->Redirect("../news", "queryupload=1110");
                        }
                    } else {
                        $security->Redirect("../news", "typeerror=1339");
                    }
                } else {
                    $security->Redirect("../news", "uploaderror=1139");
                }
            }
        }
    }
} else {
	
    $security->Redirect("../news");
}
?>
