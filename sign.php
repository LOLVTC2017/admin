<!-- Use Php session Right Here -->
<?php
include 'database/db.php';
$alertText = "";
$date = date("Y-m-d");
$nameErr = $membercodeErr = $passwordErr = "";
if (isset($_POST['register_submit'])) {
    if (empty($_POST['username'])) {
        $nameErr = "do not empty user name";
    } else {
        $username = $_POST['username'];
    }
    if (empty($_POST['membership_code'])) {
        $membercodeErr = "do not empty employee code ";
    } else {
        $membercode = $_POST['membership_code'];
    }
    if (empty($_POST['password'])) {
        $passwordErr = "do not empty password  ";
    } else {
        $password = md5($_POST['password']);
    }
    if (checkUsername($username)) {
        if (InsertData($username, $password, $member_code, $date, 1))
            $alertText = "SUCCESS";
        else $alertText = "ERROR";
    } else {
        $alertText = "Account already exist";
    }
}
if (isset($_SESSION['login'])) {
    header("location: index.php");
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="sign-container">
        <div class="form-control">
            <form action="sign.php" method="post">
                <p>User Name</p>
                <input class="inp" type="text" name="username" id="">
                <div class="errortext">
                    <?php echo $nameErr; ?>
                </div>
                <p>Member Code</p>
                <input class="inp" type="text" name="membership_code" id="">
                <div class="errortext">
                    <?php echo $membercodeErr; ?>
                </div>
                <p>password</p>
                <input class="inp" type="password" name="password" id="">
                <div class="errortext">
                    <?php echo $passwordErr; ?>
                </div>
                <br>
                <p><?php echo $alertText; ?></p>
                <br>
                <input class="btn" type="submit" value="Register" name="register_submit">
            </form>
            <div class="back-login" style="font-size: 2em;">
                <p>already member</p>
                <a href="login.php" style="background: var(--another-color);">login here</a>
            </div>
        </div>
    </div>
</body>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>