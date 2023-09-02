<?php
include '../../object/main.php';
$security=new security;
$connect=new connect;
if(isset($_GET['id']))
{
	$id=$security->checkGet($_GET['id']);
	$sql="DELETE FROM `tbl_contact` WHERE id='".$id."'";
	$result = $connect->query($sql);
	if($result)
	{
		$security->Redirect("../massage","delete=1010");
	}
	else{
		$security->Redirect("../massage","errordel=2020");
	}
}else{
$security->Redirect("../massage");
}
?>