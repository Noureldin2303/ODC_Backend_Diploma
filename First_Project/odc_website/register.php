<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="register_style.css">
</head>

<body>
  <div class="container">
  <div class="logo"><img src="images/logo-4Z-Xo87kt-transformed.png" width="600px" height="600px"></div>
  <div id="card">
    <div id="card-content">
      <div id="card-title">
        <h2>LOGIN</h2>
        <div class="underline-title"></div>
      </div>
      <form action="signup.php" method="post" class="form">
        <label for="user-email" style="padding-top:13px">
          &nbsp;Name
        </label>
        <input id="user-email" class="form-content" type="text" name="name" required />
        <div class="form-border"></div>
        <label for="user-email" style="padding-top:13px">
          &nbsp;Email
        </label>
        <input id="user-email" class="form-content" type="email" name="email" required />
        <div class="form-border"></div>
        <label for="user-email" style="padding-top:13px">
          &nbsp;Phone
        </label>
        <input id="user-email" class="form-content" type="text" name="phone" required />
        <div class="form-border"></div>
        <label for="user-email" style="padding-top:13px">
          &nbsp;Course Type
        </label>
        <select name="type" id="city" class="form-content">
          <option value="online" name="type" class="form-content">online</option>
          <option value="offline" name="type" class="form-content">offline</option>
        </select>
        <div class="form-border"></div>
        <label for="user-email" style="padding-top:13px">
          &nbsp;Branche
        </label>
        <select name="brache" id="" class="form-content">
          <option value="" class="form-content"> select city</option>
          <?php
          $dbh = mysqli_connect("localhost", "root", "", "odc_website");
          $q = mysqli_query($dbh, "SELECT * FROM branches");
          $q = mysqli_fetch_all($q, MYSQLI_ASSOC);
          foreach ($q as $value) :
          ?>
            <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
          <?php
          endforeach
          ?>
        </select>
        <div class="form-border"></div>
        <label for="user-password" style="padding-top:22px">&nbsp;Password
        </label>
        <input id="user-password" class="form-content" type="password" name="password" required />
        <div class="form-border"></div>
        <input id="submit-btn" type="submit" name="submit" value="SIGNUP" />
        <a href="login.php" id="signup">Already have account?</a>
      </form>
    </div>
  </div>
</div>
</body>

</html>