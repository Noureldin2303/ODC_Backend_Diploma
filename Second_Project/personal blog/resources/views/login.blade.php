<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>HTML5 Login Form with validation Example</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" />
  <link rel="stylesheet" href="./assets/css/login_style.css" />
</head>

<body>
  <div id="login-form-wrap">
    <h2>Login</h2>
    <form action="{{ url('postlogin') }}" method="post" id="login-form">
      @csrf
      <p>
        <input type="email" id="email" name="email" placeholder="Email Address" required /><i class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="password" id="username" name="password" placeholder="password" required /><i class="validation"><span></span><span></span></i>
      </p>
      <p>
        <input type="submit" id="login" value="Login" />
      </p>
    </form>
    <div id="create-account-wrap">

    </div>
  </div>

</body>

</html>