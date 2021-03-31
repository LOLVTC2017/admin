<!-- Use Php session Right Here -->
<?php
include 'database/db.php';
$alertText = "";
if (isset($_POST['login_submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    if (Login($username, $password)) {
        header("location: index.php");
    } else {
        $alertText = "password and username is not correct";
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
    <div class="login-container">
        <div class="form-control">
            <form action="login.php" method="post">
                <p>User Name</p>
                <input class="inp" type="text" name="username" id="">
                <p>password</p>
                <input class="inp" type="password" name="password" id="">
                <br>
                <p><?php echo $alertText; ?></p>
                <br>
                <input class="btn" type="submit" value="Login" name="login_submit">
            </form>
            <div class="sign-link">
                <p>Dont Have Account</p>
                <a href="sign.php" style="background: var(--another-color);">Sign Here</a>
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