<!-- Added validation script to authenticate user -->
<?php include 'validate-session.php'; ?>
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
<!-- Form to input details -->
<form id = "form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?q=6";?>" enctype="multipart/form-data">
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
  <textarea id= "result" name="result" rows="5" cols="20"></textarea>
  <br><br>

  <label for="contact">Contact Number(Enter number followed by country code):</label>
  <input type="text" id="contact" name="contact">
  <span class="error"><?php echo $input->contactErr;?></span>
  <br><br>

  <label for="email">Email:</label>
  <input type="text" id="email" name="email">
  <span class="error"><?php echo $input->emailErr;?></span>
  <br><br>
  <div class="submit-wrapper">
    <input type="submit" value="submit">
  </div>
  <br>
</form>
<script>
  $(document).ready(function() {
    const contact = document.getElementById("contact");
    if (!contact.value.startsWith("+91")) {
        contact.value = "+91";
    }
    contact.addEventListener("input", function() {
      if (!contact.value.startsWith("+91")) {
        contact.value = "+91" + contact.value.replace(/\D/g, "").slice(0, 10);
      }
    });
  });
</script>
<!-- Added links to move from one page to another -->
<div class="navigation">
  <a href="index.php?q=1">Task 1</a>
  <a href="index.php?q=2">Task 2</a>
  <a href="index.php?q=3">Task 3</a>
  <a href="index.php?q=4">Task 4</a>
  <a href="index.php?q=5">Task 5</a>
  <a href="index.php?q=6">Task 6</a>
</div>
<br>
<a class = "btn" href = "./logout-session.php">Logout</a>
</body>
</html>
