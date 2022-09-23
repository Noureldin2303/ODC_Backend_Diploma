<?php
//error_reporting(0);
session_start();
$id = $_SESSION['crud']['id'];
//echo $id;

$connection = mysqli_connect("localhost", "root", "", "odc_website");
$query = mysqli_query($connection, "SELECT * FROM `odc_users` WHERE id='$id'");
$users =  mysqli_fetch_assoc($query);
//print_r($users)

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update.css">

</head>
<body>
    <div class="d-flex flex-column align-items-center text-center">
        <img src="../images/logo.png" alt="LOGO" class="rounded-circle" width="170" style="position: absolute;top: 0;left: 20px;">
      </div>
    <div class="container">
        <header>Profile Info</header>
        <form action="doupdate.php" method="post">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="https://yannflucksa.ch/wp-content/uploads/2020/02/user-1536x1536.png" alt="Admin" class="rounded-circle" width="120">
              </div>
              <div class="d-flex flex-column align-items-center text-center">
                <div class="d-flex flex-column align-items-center text-center">
                    <img class="logo" src="images/logo2.jpg" alt="Logo" width="100px" height="100px">
                </div>
            </div>
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" value="<?= $users['name']; ?>" name="name">
                        </div>

                        <div class="input-field">
                            <label>E-mail</label>
                            <input type="text" value=" <?= $users['email']; ?>" name="email">
                        </div>

                        <div class="input-field">
                            <label>Phone</label>
                            <input type="text" value="<?= $users['phone']; ?>" name="phone">
                        </div>

                        <div class="input-field">
                            <label>Course Type</label>
                            <input type="text" value="<?= $users['course_type']; ?>" name="type">
                        </div>
                        
                        <div class="input-field">
                            <label>Password</label>
                            <input type="text" value=" <?= $users['password']; ?>" name="password">
                        </div>

                        <div class="input-field"></div>
                        <input type="submit" class="Btn" value="SAVE" style="background-color: rgb(238, 146, 40);color:aliceblue;border:none;width:120px;height:35px;border-radius:5px;">
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
        <form method="post" action="../admin/logout.php">
            <input type="submit" class="Btn" value="Logout" style="position: absolute;top: 40px;right: 50px;background-color: rgb(238, 146, 40);color:aliceblue;border:none;width:120px;height:35px;border-radius:5px;">
            </form>
    </div>

    <!--<script src="script.js"></script>-->
</body>
</html>
