<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
error_reporting(0);
session_start();
//if ($_SESSION['crud']['admin'] != 1) header("location:../logout.php");

include 'include.php';

$id = $_SESSION['city_id'];
if (isset($_POST['sub'])) {
    $id = $_POST['city'];
    $_SESSION['city_id'] = $id;
}

if (isset($_POST['sfile'])) {
    $imgname = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    move_uploaded_file($tmp, "upload/" . $imgname);
    $qq = mysqli_query($dbh, "INSERT INTO `assign`(`file`, `branch_id`) VALUES ('$imgname','$id')");
}

?>

<body>
    <center>
        <img src="../images/images.png" alt="LOGO" class="rounded-circle" width="570">
    </center>
    <div class="wrapper">
        <form align="center" action="" method="post">
            <select name="city" id="" class="city">
                <option value="" class="city"> select city</option>
                <?php
                $q = mysqli_query($dbh, "SELECT * FROM branches");
                $q = mysqli_fetch_all($q, MYSQLI_ASSOC);
                foreach ($q as $value) :
                ?>
                    <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                <?php
                endforeach
                ?>
            </select>
            <br>
            <br>
            <input type="submit" name="sub">
        </form>
        <br>
        <div class="title">
            <div class="line"></div>
            activited users
            <div class="line"></div>
        </div>

        <div class="container">
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>phone</td>
                            <td>password</td>
                            <td>course name</td>
                            <td>course type</td>
                            <td>action</td>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q1 = mysqli_query($dbh, "SELECT * FROM odc_users WHERE branches_id ='$id' AND active=1");
                        $q1 = mysqli_fetch_all($q1, MYSQLI_ASSOC);
                        foreach ($q1 as $value) :
                        ?>
                            <tr>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['phone'] ?></td>
                                <td><?= $value['password'] ?></td>
                                <td><?= $value['course_name'] ?></td>
                                <td><?= $value['course_type'] ?></td>
                                <td>
                                    <a href="delete.php?id=<?= $value['id'] ?>">delete</a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="title">
            <div class="line"></div>
            request
            <div class="line"></div>
        </div>

        <div class="container">
            <div class="table">
                <table cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Email</td>
                            <td>phone</td>
                            <td>password</td>
                            <td>course name</td>
                            <td>course type</td>
                            <td>action</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q1 = mysqli_query($dbh, "SELECT * FROM odc_users WHERE branches_id ='$id' AND active=0");
                        $q1 = mysqli_fetch_all($q1, MYSQLI_ASSOC);
                        foreach ($q1 as $value) :
                        ?>
                            <tr>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td><?= $value['phone'] ?></td>
                                <td><?= $value['password'] ?></td>
                                <td><?= $value['course_name'] ?></td>
                                <td><?= $value['course_type'] ?></td>
                                <td>
                                    <a href="update.php?id=<?= $value['id'] ?>">accept</a>
                                    <a href="delete.php?id=<?= $value['id'] ?>">reject</a>
                                </td>
                            </tr>
                        <?php
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <center>
            <form action="" method="POST">
                <input type="text" name="data" placeholder="search with name or phone">
                <input type="submit" name="search" value="search">
            </form><br>
            <?php
            if (isset($_POST['search'])) :
                $data = $_POST['data'];
                $q = mysqli_query($dbh, "SELECT * FROM odc_users WHERE `name` LIKE '%$data%' OR `phone` LIKE '%$data%'");
                $q7 = mysqli_fetch_all($q, MYSQLI_ASSOC); ?>
                <div class="container">
                    <div class="table">
                        <table cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>phone</td>
                                    <td>password</td>
                                    <td>course name</td>
                                    <td>course type</td>
                                    <td>action</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($q7 as $value) :
                                ?>
                                    <tr>
                                        <td><?= $value['name'] ?></td>
                                        <td><?= $value['email'] ?></td>
                                        <td><?= $value['phone'] ?></td>
                                        <td><?= $value['password'] ?></td>
                                        <td><?= $value['course_name'] ?></td>
                                        <td><?= $value['course_type'] ?></td>
                                        <td>
                                            <a href="delete.php?id=<?= $value['id'] ?>">delete</a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php endif; ?>
            <br>
            <div class="title">
                <div class="line"></div>
                send assignment
                <div class="line"></div>
            </div>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="costum-file">
                    <span>Click To Upload Your File</span>
                    <input type="file" name="img">
                </div>
                <input type="submit" name="sfile">
            </form>
            
            <form method="post" action="logout.php">
            <input type="submit" class="Btn" value="Logout" style="position: absolute;top: 40px;right: 50px;background-color: rgb(238, 146, 40);color:aliceblue;border:none;width:120px;height:53px;border-radius:5px;">
            </form>
        </center>
        
    </div>
</body>

</html>