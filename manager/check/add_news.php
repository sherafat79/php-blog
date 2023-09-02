<?php
include '../../object/main.php';
include '../../tools/date/jdf.php';

$security = new Security;
$connect = new Connect;

if (isset($_POST['send'])) {
    $title = $security->checkPost($_POST['title']);
    $short = $security->checkPost($_POST['short']);
    $long = $security->checkPost($_POST['long']);

    if (empty($title) || empty($short) || empty($long) || empty($_FILES['file']['name'])) {
        $security->Redirect("../newsadd", "empty=8020");
    }

    if ($_FILES['file']['error'] > 0) {
        $security->Redirect("../newsadd", "uploaderror=2039");
    }

    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
        $allowedExtensions = ['.png', '.gif', '.jpg'];
        $fileExtension = strrchr($_FILES['file']['name'], '.');

        if (in_array($fileExtension, $allowedExtensions)) {
            $filename = $_FILES['file']['name'];
            $file = md5($filename . microtime()) . substr($filename, -5, 5);
            move_uploaded_file($_FILES['file']['tmp_name'], "./upload/" . $file);
            $date = jdate('Y/n/j');
            $name = $_SESSION['manage_name'];

            $sql = "INSERT INTO `tbl_news` (`title`, `short_text`, `long_text`, `date`, `name`, `pic`) VALUES ('$title', '$short', '$long', '$date', '$name', '$file')";
            $result = $connect->query($sql);

            if ($result) {
                $security->Redirect("../news", "insert=1010");
            } else {
                $security->Redirect("../news", "qqq=1010");
            }
        } else {
            $security->Redirect("../newsadd", "typeerror=1339");
        }
    } else {
        $security->Redirect("../newsadd", "uploaderror=1139");
    }
} else {
    $security->Redirect("../news");
}
?>