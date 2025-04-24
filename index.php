<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form</title>
  <link rel="stylesheet" href="./css/style.css">
  <!-- link for embedding jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="./js/index.js"></script>
</head>
<body>
<!-- embedding php script for checking the validity of form -->
<?php require 'form-validation.php';?>
<!-- Form to input First Name, Last Name and display Full Name -->
<form id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
  <label for="fname">First Name:</label>
  <input type="text" id="fname" name="fname">
  <span class="error"><?php echo $input->fnameErr;?></span>
  <br><br>

  <label for="lname">Last Name:</label>
  <input type="text" id="lname" name="lname">
  <span class="error"><?php echo $input->lnameErr;?></span>
  <br><br>

  <label for="fullname">Full Name:</label>
  <input type="text" id="fullname" name="fullname" readonly>
  <br><br>
  
  <label for="image">Choose Image:</label>
  <input type="file" name="image" id="image">
  <span class="error"><?php echo $input->imageErr;?></span>
  <br><br>

  <label for="result">Enter Marks(Please enter in the format subject|marks, one perline):</label><br>
  <textarea id="result" name="result" rows="5" cols="20"></textarea>
  <br><br>

  <label for="contact">Contact Number(Enter number followed by country code):</label>
  <input type="text" id="contact" name="contact">
  <span class="error"><?php echo $input->contactErr;?></span>
  <br><br>

  <label for="email">Email:</label>
  <input type="text" id="email" name="email">
  <span class="error"><?php echo $input->emailErr;?></span>
  <br><br>
  
  <input type="submit" value="Submit">
</form>
</body>
</html>
