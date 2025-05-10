<?php
session_start();

// If user already logged in then directly redirect it to the required page.
if($_SESSION['logged_in'] == true){
  $test = isset($_GET['redirect'])? $_GET['redirect']: 'index.php?q=4';
  header("Location: $test");
  exit();
}

// If user not logged in then authenticate the user and redirect it to the required page.
if($_SERVER['REQUEST_METHOD'] == "POST"){
   $username = $_POST['username'];
   $password = $_POST['password'];

   $registeredUsername = "root";
   $registeredPassword = "root1234";

   if($username === $registeredUsername && $password === $registeredPassword){
    $_SESSION['logged_in'] = true;
    $test = isset($_GET['redirect'])? $_GET['redirect']: 'index.php?q=4';
    header("Location: $test");
    exit();
   }
   else{
    $showError = "Please enter valid username and password";
   }
}
?>
<!-- Login Form HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/style.css">
  <title>User Authentication</title>
</head>
<body>
  <div class="login-form">
    <h1>Sign In</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . (isset($_GET['redirect']) ? '?redirect=' . $_GET['redirect'] : ''); ?>">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required>
      <br><br>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>
      <br><br>
      <!-- if any error encountered, then display error -->
      <?php
      if(isset($showError)){
        echo '<span class="error">' . $showError . '</span>';
      }
      ?>
      <div class="submit-wrapper">
      <input type="submit" value="submit">
      </div>
    </form>

  </div>
</body>
</html>
