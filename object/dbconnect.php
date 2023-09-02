<?php
function query($sql)
{
	$Server_name = "localhost";
	$Server_username = "root";
	$Server_password = "";
	$Dbname = "dn";
	$link=mysqli_connect($Server_name,$Server_username,$Server_password) or
	 exit("Error in connect to server");
	if($link)
	{
		if(mysqli_select_db($Dbname))
		{
			mysqli_query("set names utf8");
			mysqli_query("set charset utf8");
			$result = mysqli_query($sql);
			if(!$result)
			{
				echo "Error in query";
			}
			return $result;
			
		}
		else{
			echo "Erron in connect to database";
		}
	}
	else{
	   echo "Error in connect to server";
	}
}
?>
