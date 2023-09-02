<?php
session_start();

class Security
{
    private $link;

    public function __construct()
    {
        $this->link = $this->connectToDatabase();
    }

    public  function connectToDatabase()
    {
        $serverName = "localhost";
        $serverUsername = "root";
        $serverPassword = "";
        $dbName = "dn";
        $link = mysqli_connect($serverName, $serverUsername, $serverPassword);
        if (!$link) {
            exit("Error in connecting to the server");
        }
        if (!mysqli_select_db($link, $dbName)) {
            exit("Error in connecting to the database");
        }
        mysqli_query($link, "SET NAMES utf8");
        mysqli_query($link, "SET CHARSET utf8");
        return $link;
    }

    public function hashValue($value)
    {
        return md5($value) . "speiw#sb^&ewiq";
    }

    public function checkPost($value)
    {
        $return1 = mysqli_real_escape_string($this->link, $value);
        $return2 = htmlspecialchars($return1);
        return $return2;
    }

    public function checkGet($value)
    {
        $return1 = mysqli_real_escape_string($this->link, $value ?? "");
        $return2 = htmlspecialchars($return1);
        $return3 = intval($return2);
        return $return3;
    }

    public function checkGetSearch($value)
    {
        $return1 = mysqli_real_escape_string($this->link, $value);
        $return2 = htmlspecialchars($return1);
        return $return2;
    }

    public function redirect($page, $parameter = "")
    {
        if (isset($page)) {
            $pageFilter = $parameter ? "$page.php?$parameter" : "$page.php";
            header("Location: $pageFilter");
            exit;
        }
    }

    public function covering($page)
    {
        $pageFilter = "$page.php";
        include "$pageFilter";
    }

    public function checkManage()
    {
        if ($_SESSION['manage_log'] !== true) {
            $this->redirect("../login/index");
        }
    }

    public function checkUser()
    {
        if ($_SESSION['user_log'] !== true) {
            $this->redirect("../login/index");
        }
    }

    public function read($value)
    {
        $return1 = strip_tags($value);
        $return2 = stripslashes($return1);
        return $return2;
    }
}

class Template
{
    public function isParametr($parameter, $text, $color)
    {
        $security = new Security;
        if (isset($_GET[$parameter])) {
            $security->checkGet($_GET[$parameter]);
            $this->massage($text, $color);
        }
    }

	public function message($text, $color="danger")
	{
		echo '<div class="alert alert-' . $color . '" role="alert">' . $text . '</div>';
	}
}

class Connect
{
    private $link;

    public function __construct()
    {
        $this->link = (new Security)->connectToDatabase();
    }

    public function query($sql)
    {
        $result = mysqli_query($this->link, $sql);
        if (!$result) {
            echo "Error in query";
        }
        return $result;
    }
}
?>