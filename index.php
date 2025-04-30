<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel = "stylesheet" href = "./css/style.css">
  <!-- link for embedding jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="./js/index.js"></script>
  <!-- css to display error message -->
  <style>
    .error {color: #FF0000;}
  </style>
</head>
<body>
<!-- embedding php script for checking the validity of form -->
<?php require 'form-validation.php';?>

<!-- Form to input First Name, Last Name and display Full Name -->
<form id = "form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="fname">First Name:</label>
  <input type="text" id="fname" name="fname">
  <span class="error">* <?php echo $input->fnameErr;?></span>
  <br><br>

  <label for="lname">Last Name:</label>
  <input type="text" id="lname" name="lname">
  <span class="error">* <?php echo $input->lnameErr;?></span>
  <br><br>

  <label for="fullname">Full Name:</label>
  <input type="text" id="fullname" name="fullname" readonly>
  <br><br>

  <input type="submit" value="Submit">
</form>

<!-- If both fields are error free then set Full Name -->
<?php if (!empty($input->fname) && !empty($input->lname) && empty($input->fnameErr) && empty($input->lnameErr)) {
      echo "<h1>Hello, $input->fname " . "$input->lname</h1>";
  }?>

</body>
</html>
