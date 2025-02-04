<?php

require("functions.php");

$errors = "";
if (isset($_POST['sign_in_btn'])) {
  $email = $_POST['email_address'];
  $password = $_POST['password'];
  $name = $_POST['full_name'];

  $errors = validateCredentialsSignUp($email, $password, $name);

  if (strcmp($errors, "<ul class='errors'></ul>") == 0) {
    $connected = add_user("database", $email, $password, $name);
    if (strcmp($connected, "succes") == 0) {
      header("location:sign_in.php");
    } else if (strcmp($connected, "username_exists") == 0) {
      $errors = "<span class='info'>Email already exists in our database.</span><br/>";
    }
     else{
      $errors = "<span class='info'>Error registering your informations.</span><br/>";
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
  <title>Signup | TEAM CODEIT</title>
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
        <img src="signupimg.svg" alt="sigin image">
      </div>
      <div id="login_form">
        <h1 class="label_text">Sign up</h1>
        <p>Already a member? <a href="sign_in.php">Sign in</a></p>
        <div class="error"><?php echo $errors; ?></div>
        <form action="" class="form" method="POST">
          <input id="name" type="text" class="form_control" name="full_name" placeholder="Full name">
          <br>
          <input id="email" type="email" class="form_control" name="email_address" placeholder="Email address">
          <br>
          <input id="password" type="password" class="form_control" name="password" placeholder="Password">
          <br>
          <input id="sign_in_btn" name="sign_in_btn" type="submit" class="btn_submit" value="SIGN UP">
          
        </form>
      </div>
    </section>
  </div>
</body>

</html>