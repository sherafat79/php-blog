
<?php
include '../object/main.php';
$security=new security;
$template=new template;
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >
</head>
<body  dir="rtl">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">ورود</h2>
                    </div>
                    <div class="card-body">
                    <?php
$template->isParametr("passwordset"," رمز عبور جدید برای شما تعیین شد و شما می توانید هم اکنون وارد سامانه شوید","green");
if(isset($_GET['empty']))
{
	$security->checkGet($_GET['empty']);
	$template->message("لطفا تمامی فیلد ها را تکمیل نمایید","danger");
}
else if(isset($_GET['errorlog']))
{
	$security->checkGet($_GET['errorlog']);
	$template->message("مشخصات وارد شده صحیح نمی باشد","danger");
}
else if(isset($_GET['email']))
{
	$security->checkGet($_GET['email']);
	$template->message("ایمیل را به شکل صحیح وارد نمایید","danger");
}
else if(isset($_GET['captcha']))
{
	$security->checkGet($_GET['captcha']);
	$template->message("کد تصویر امنیتی را صحیح وارد نمایید","danger");
}

?>
                        <form action="check.php" method="post">
                            <input type="hidden" name="login">
                            <div class="mb-3">
                                <label for="username" class="form-label">نام کاربری</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="نام کاربری..." required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">رمز عبور</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="رمز عبور..." required>
                            </div>

                            <div class="mb-3 text-center">
                                <img src="../tools/captcha/Captcha.php" alt="کد امنیتی" class="img-fluid rounded">
                            </div>

                            <div class="mb-3">
                                <label for="captcha" class="form-label">کد امنیتی</label>
                                <input type="text" id="captcha" name="captcha" class="form-control" placeholder="کد امنیتی را وارد کنید..." maxlength="5" required>
                            </div>

                            <div class="mb-3 text-center">
                               
                                <button type="submit" class="btn btn-primary">ورود</button>
                            </div>
                        </form>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and Popper.js (for Bootstrap tooltips) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
