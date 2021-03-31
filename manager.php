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
$DataUsers2 = getAllData();
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    DeleteData($id);
    header("Refresh: 0 url=manager.php");
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
                        echo (CheckSession() && $DataUserAdmin[0]['trangthai'] == 1) ?
                            '<a class="btn" href="update.php?user={$DataUserAdmin[0]["id"]}>Edit<a>' : "";
                        ?>
                    </form>
                </div>
                <div class="logout">
                    <span><i class="fas fa-sign-out-alt"></i>
                    </span>
                    <a href="logout.php" ">Logout</a>
            </div> <!-- Use Function logout is this <a> -->
            </div>
        </div><!-- End Of Side -->
    <div class=" content">
                        <?php echo (CheckSession() && $DataUserAdmin[0]['trangthai'] == 2) ?
                            '<div style="
     margin-bottom: 2em;"><a href="add.php" style="padding:10px; background:var(--another-color)">Add User</a> </div>' : ""; ?>
                        <div class="table-container" id="table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Account Name</th>
                                        <th>employee code</th>
                                        <th>Date Created</th>
                                        <th>Permissions</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!empty($DataUsers2)) {
                                        foreach ($DataUsers2 as $data) {
                                            $date = Dateformat($data['ngaytao']);
                                            $permission = Decentralization($data['trangthai']);
                                            if ($permission != "admin") {
                                                echo "<tr>";
                                                echo "<td>{$data['id']}</td>";
                                                echo "<td>{$data['tentaikhoan']}</td>";
                                                echo "<td>{$data['manhanvien']}</td>";
                                                echo "<td>{$date}</td>";
                                                echo "<td>{$permission}</td>";
                                                echo "<td class='control'>
                                    <a href='update.php?user={$data['id']}'>Edit</a>
                                    <a href='manager.php?delete={$data['id']}'>Delete</a>
                                </td>";
                                                echo "</tr>";
                                            }
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>

                </div>
            </div>
</body>

</html>