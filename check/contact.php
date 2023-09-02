<?php
include '../object/main.php';
$security=new security;
$connect=new connect;
if(isset($_POST['btn-send']))
{
	if($_POST['name']=='' || $_POST['text']=='')
	{
		$security->Redirect("../contact","empty=1012");
	}
	else{
		$name=$security->checkPost($_POST['name']);
		$email=$security->checkPost($_POST['email']);
		$text=$security->checkPost($_POST['text']);
		if(!preg_match("/[a-zA-Z0-9._-]+@[a-zA-Z0-9\.-]+\.[a-zA-Z\.]+/",$email))
		{
			$security->Redirect("../contact","email=8020");
		}
		else{
			$sql="INSERT INTO `tbl_contact` (`name` ,`email` ,`text` ,`flag`)
			VALUES ('".$name."',  '".$email."',  '".$text."',  '0')";
			  $result = $connect->query($sql);
			  if($result)
			  {
				  $security->Redirect("../contact","send=1010");
			  }
			  else{
				   $security->Redirect("../contact","error=1020");
			  }
		}
	}
}
else{
$security->Redirect("../contact");
}
?>