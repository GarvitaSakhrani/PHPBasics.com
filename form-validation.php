<?php

class form{

  public $fname , $lname = "";
  public $fnameErr , $lnameErr , $imageErr= "";
  public $image_path="";
  
  // function to check obtained values
  public function validate(){

      // First Name validation
      if (empty($_POST["fname"])) {
        $this->fnameErr = "First Name is required.";
      } else {
        $this->fname = $this->test_data($_POST["fname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $this->fname)) {
          $this->fnameErr = "Only alphabets are allowed for First Name.";
        }
      }
    
      // Last Name validation
      if (empty($_POST["lname"])) {
        $this->lnameErr = "Last Name is required.";
      } else {
        $this->lname = $this->test_data($_POST["lname"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $this->lname)) {
          $this->lnameErr = "Only alphabets are allowed for Last Name.";
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
    // function to validate image
    public function imgcheck(){
      if(!isset($_FILES['image'])){
        $this->imageErr = "Upload an image.";
      }
      else{
        $image_dir = "./uploads";
        $image_file = $image_dir . "/" . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($image_file,PATHINFO_EXTENSION));
        $extensions = array("jpeg","jpg","png","gif"); 
      
        if(!in_array($imageFileType, $extensions)) {      
            $this->imageErr = "File type not supported.";
            return;
      }
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_file)) {
        $this->image_path=$image_file;
        
    } else {
        $this->imageErr="Sorry, there was an error uploading your file.";
    }

    }
  }
}
// Creates object when the form is submitted successfully.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $input = new form();
  $input->imgcheck();
  $input->validate();
}

?>
