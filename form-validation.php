<?php

class form{
  // variables declared as empty string
  public $fname , $lname = "";
  public $fnameErr , $lnameErr = "";
  
  // function to check obtained values
  public function validate(){

      // First Name validation
      if (empty($_POST["fname"])) {
        $this->fnameErr = "First Name is required";
      } else {
        $this->fname = $this->test_data($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $this->fname)) {
          $this->fnameErr = "Only alphabets are allowed for First Name";
        }
      }
    
      // Last Name validation
      if (empty($_POST["lname"])) {
        $this->lnameErr = "Last Name is required";
      } else {
        $this->lname = $this->test_data($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $this->lname)) {
          $this->lnameErr = "Only alphabets are allowed for Last Name";
        }
      }
    }
    // function to refine the input values
    public function test_data($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  
}
// Creates object when the form is submitted successfully.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $input = new form();
  $input->validate();
}

?>
