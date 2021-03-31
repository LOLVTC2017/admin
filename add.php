<?php
include 'database/db.php';
if (CheckSession()) {
    $DataUserAdmin = getData($_SESSION['login']);
}
if (!isset($_SESSION['login'])) {
    header("location: login.php");
}
if (CheckstatusUser($DataUserAdmin[0]['trangthai'])) {
    header("location: index.php");
}
?>
<?php
$alertText = "";
$today = date("d-M-Y");
if (isset($_POST['register_submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $member_code = $_POST['membership_code'];
    $status = $_POST['status'];
    if (checkUsername($_POST['username'])) {
        if (InsertData($username, $password, $member_code, $today, $status))
            $alertText = "SUCCESS";
        else $alertText = "ERROR";
    } else {
        $alertText = "Account already exist";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/76ee6cfa25.js" crossorigin="anonymous"></script>
    <script src="js.js"></script>
    <title>Admin Manager Page</title>
</head>

<body>
    <div class="container">
        <div class="side-navbar">
            <!-- This is side navbar -->
            <h1>User Manager</h1>
            <div class="admin-name">
                <span><i class="fas fa-user-tie"></i>
                </span>
                <p>
                    <?php echo CheckSession() ? $DataUserAdmin[0]['tentaikhoan'] : ""; ?>
                </p>
                <!--Print Session The user Logged  -->
            </div>
            <div class="list-item">
                <div class="manager">
                    <span><i class="fas fa-users-cog"></i>
                    </span>
                    <form action="index.php" method="post">
                        <?php echo (CheckSession() && $DataUserAdmin[0]['trangthai'] == 2) ? '<a class="btn" href="manager.php">Manager</a>' : "";
                        echo (CheckSession() && $DataUserAdmin[0]['trangthai'] == 1) ? '<a class="btn" href="manager.php">Edit</a>' : "";
                        ?>
                    </form>
                </div>
                <div class="logout">
                    <span><i class="fas fa-sign-out-alt"></i>
                    </span>
                    <a href="logout.php" ">Logout</a>
            </div> <!-- Use Function logout is this <a> -->
            </div>
        </div><!-- End Of Side Nav -->
<div class=" content">
                        <div style=" margin: 0 auto;width: 50%;display: flex;text-align: center;justify-content: center;background: var(--primary-color);" class="add-form">
                            <form style="padding:2em;" action="sign.php" method="post">
                                <p>User Name</p>
                                <input class="inp" type="text" name="username" id="">
                                <p>Member Code</p>
                                <input class="inp" type="text" name="membership_code" id="">
                                <p>password</p>
                                <input class="inp" type="password" name="password" id="">
                                <p>status</p>
                                <input class="inp" type="text" name="status" id="">
                                <br>
                                <p><?php echo $alertText; ?></p>
                                <br>
                                <input class="btn" type="submit" value="Register" name="register_submit">
                            </form>
                        </div>
                </div>
            </div>
        </div>