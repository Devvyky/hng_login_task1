<?php

require("functions.php");

$errors = "";
if (isset($_POST['sign_in_btn'])) {
  $email = $_POST['email_address'];
  $password = $_POST['password'];

  $errors = validateCredentials($email, $password);

  if (strcmp($errors, "<ul class='errors'></ul>") == 0) {
    $connected = check_credentials("database", $email, $password);
    if (strcmp($connected, "user_authentificated") == 0) {
      header("location:connected.php");
    } else {
      $errors = "<span class='info'>Your login or password don't match.</span><br/>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Poppins:400,500,600,700&display=swap" rel="stylesheet" />
  <link rel="shortcut icon" type="image/png" href="fav.png"/>
  <link rel="stylesheet" href="./style.css" type="text/css" />
  <title>Login | TEAM CODEIT</title>
</head>

<body>
  <div class="container">
    <section class="card">
      <div class="image_description">
        <h1 class="main_title">
          <span class="main_span">
            <span class="blue_text">TEAM</span>
            <span>
              <span class="red_text">C</span>
              <span class="orange_text"> &lt;</span>
              <span class="skyBlue_text">&frasl;</span>
              <span class="purple_text"> &gt;</span>
              <span class="orange_text">D</span>
              <span class="green_text">E</span>
            </span>
            <span class="blue_text">IT</span>
          </span>
        </h1>
        <img src="sign_in.svg" alt="sigin image">
      </div>
      <div id="login_form">
        <h4 id="welcomeText">Welcome back</h4>
        <h1 class="label_text">Sign in</h1>
        <p>New user? <a href="sign_up.php">Create an account</a></p>
        <div class="error"><?php echo $errors; ?></div>
        <form action="" class="form" method="POST">
          <input id="email" type="email" class="form_control" name="email_address" placeholder="Email address">
          <br>
          <input id="password" type="password" class="form_control" name="password" placeholder="Password">
          <br>
          <input id="sign_in_btn" name="sign_in_btn" type="submit" class="btn_submit" value="SIGN IN">
          <p class="bottom_text">
            <div class="forgot_password_block"><a href="#" id="forgotpassword">Forgot Password?</a></div>
          </p>
        </form>
      </div>
    </section>
  </div>
</body>

</html>