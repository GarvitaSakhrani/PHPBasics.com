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
  <input id= "contact" type="text" name="contact">
  <span class="error"><?php echo $input->contactErr;?></span>
  <br><br>
  
  <input type="submit" value="Submit">
</form>
<!-- Output to be displayed -->
<?php
  if(!empty($input->image_path)){
    echo"<img width=\"600\" height=\"600\" src =\"$input->image_path\" alt =\"Uploaded Image by user\" title=\"Image\">";
  }
  if (!empty($input->fname) && !empty($input->lname) && empty($input->fnameErr) && empty($input->lnameErr)) {
      echo "<h1>Hello, $input->fname " . "$input->lname</h1>";
  }
  if(!empty($input->marks)){
    echo "<table border=1>" ;
    echo "<tr><th>Subject</th><th>Marks</th></tr>";
    foreach($input->marks as $a){
      echo "<tr>";
      echo "<td>" . $a['subject'] . "</td>";
      echo "<td>" . $a['mark'] . "</td>";
      echo "</tr>";
  }
    echo "</table>";
  }
  echo"<br>";
  if(!empty($input->contact) && empty($input->contactErr)){
    echo "<h3>Contact Details:" . $input->contact . ".</h3>";
  }
  ?>

</body>
</html>
