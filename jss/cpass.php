<?php
if (!empty($_REQUEST['button'])) {
    $email = $_REQUEST['email'];
    $pass = $_REQUEST['password'];
    $cpass = $_REQUEST['cpassword'];
    if ($pass != $cpass) {
        echo "<script> alert(' Please enter same password')</script>";
    } else {
        echo "<script> alert(' Success ')</script>"; }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home page</title>
    <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="inner">
            <div class="welcome">
                A simple Registration Form
            </div>
            <div class="registration_options">
                <form action="" method="post">
                    <div class="rleft_body">
                        <label for="">
                            Enter your email here
                        </label>
                        <br>
                        <label for="">
                            Enter your password here
                        </label>
                        <br>
                        <label for="">
                            Enter password again here
                        </label>
                    </div>
                    <div class="rright_body">
                        <input type="email" name="email" id="">
                        <br><br>
                        <input type="password" name="password" id="">
                        <br><br>
                        <input type="text" name="cpassword" id="">
                    </div>
                    <div class="registration_submit">
                        <input type="submit" value="Save" id="save" name="button">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>