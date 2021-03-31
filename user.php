<!-- On her use php session when the user not login yet back to login page -->
<!-- This is main page for admin manager -->

<?php
include 'database/db.php';
if (CheckSession()) {
    $DataUserAdmin = getData($_SESSION['login']);
}
if (CheckstatusUser($DataUserAdmin[0]['trangthai']) == false) {
    header("location: index.php");
}

$nameErr = $membercodeErr = $statusError = $passwordErr = "";
if (isset($_POST['change_submit'])) {
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
    UpdateDataUser($username, $password, $membercode, $DataUserAdmin[0]['id']);
    header("location:index.php");
}
if (!isset($_SESSION['login'])) {
    header("location: login.php");
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
                        $a = 5;
                        echo (CheckSession() && $DataUserAdmin[0]['trangthai'] == 1) ?
                            '<a class="btn" href="user.php">Edit<a>' : "";
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
                        <div style="
    display: flex;
    justify-content: center;
    background: var(--primary-color);
    padding: 2em;
    width:50%;
    margin:0 auto;
">
                            <!-- Edit Form Container -->
                            <form method="post" action="user.php">
                                <!-- action use php self -->
                                <div class="code-input">
                                    <p>User Name</p>
                                    <input type="text" name="username" placeholder="enter user name " value="<?php echo $DataUserAdmin[0]['tentaikhoan']; ?>" id="">
                                </div>
                                <div class="errortext">
                                    <?php echo $nameErr; ?>
                                </div>
                                <div class="code-input">
                                    <p>employee code</p>
                                    <input type="text" name="membership_code" placeholder="enter employee code " value="<?php echo $DataUserAdmin[0]['manhanvien']; ?>" id="">
                                </div>
                                <div class="errortext">
                                    <?php echo $membercodeErr; ?>
                                </div>
                                <div class="code-input">
                                    <p>Password</p>
                                    <input type="text" name="password" value="<?php echo $DataUserAdmin[0]['matkhau']; ?>" id="">
                                </div>
                                <div class="errortext">
                                    <?php echo $passwordErr; ?>
                                </div>
                                <div class="errortext">
                                    <?php echo $statusError; ?>
                                </div>
                                <div class="update-code">
                                    <input type="submit" value="Thay Đổi" name="change_submit">
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>
</body>

</html>