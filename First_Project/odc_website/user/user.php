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
    <link rel="stylesheet" href="user.css">

</head>
<body>
    <div class="d-flex flex-column align-items-center text-center">
        <img src="../images/logo.png" alt="LOGO" class="rounded-circle" width="170" style="position: absolute;top: 0;left: 20px;">
      </div>
    <div class="container">
        <header>Profile Info</header>
        <form action="#">
            <div class="d-flex flex-column align-items-center text-center">
                <img src="https://yannflucksa.ch/wp-content/uploads/2020/02/user-1536x1536.png" alt="Admin" class="rounded-circle" width="120">
              </div>
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Full Name</label>
                            <input type="text" placeholder="<?= $users['name']; ?>">
                        </div>

                        <div class="input-field">
                            <label>E-mail</label>
                            <input type="text" placeholder=" <?= $users['email']; ?>">
                        </div>

                        <div class="input-field">
                            <label>Phone</label>
                            <input type="text" placeholder="<?= $users['phone']; ?>">
                        </div>

                        <div class="input-field">
                            <label>Course</label>
                            <input type="text" placeholder=" <?= $users['course_name']; ?>">
                        </div>

                        <div class="input-field">
                            <label>Course Type</label>
                            <input type="text" placeholder="<?= $users['course_type']; ?>">
                        </div>
                        <?php
                        $bran = $users['branches_id'];
                        $query = mysqli_query($connection, "SELECT * FROM `branches` WHERE id='$bran'");
                        $brans =  mysqli_fetch_assoc($query);
                        ?>
                        <div class="input-field">
                            <label>Branch</label>
                            <input type="text" placeholder=" <?= $brans['name'] ?>">
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="text" placeholder=" <?= $users['password']; ?>">
                        </div>

                        <div class="input-field">
                        <label>Assignments</label>
                            <select required>
                        <?php
                        $q1 = mysqli_query($connection, "SELECT * FROM assign WHERE branch_id='$bran'");
                        $assign =  mysqli_fetch_all($q1, MYSQLI_ASSOC);
                        if (empty($assign)) {
                            ?>
                            <option>No assignments yet</option>
                          <?php
                        } else {
                          foreach ($assign as $v) :
                            ?>
                                <option><a href="../admin/upload/<?= $v['file']; ?>"><?= $v['file']; ?></a></option>
                            <?php
                            endforeach;
                            } ?>  
                            </select>
                        </div>
                        
                        <div class="input-field"></div>
                        <a href="update.php"><input type="button" class="Btn" value="EDIT" style="background-color: rgb(238, 146, 40);color:aliceblue;border:none;width:120px;height:35px;border-radius:5px;"></a>
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
