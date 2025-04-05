<?php

class form{
 
  public $fname , $lname , $result, $contact, $email = "";
  public $fnameErr , $lnameErr ,$contactErr, $imageErr, $emailErr = "";
  public $image_path="";
  public $marks =[];
  public $validemail ="";
  
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
        $this->imageErr = "Sorry, there was an error uploading your file.";
    }

    }
  }
  // function to validate entered subject and marks
  public function resultcheck(){
    $this->result = $_POST["result"];
    $lines=explode("\n",$this->result);
    foreach($lines as $x){
      $x= trim($x);
      if(!empty($x)){
        $item = explode("|",$x);
        if(count($item)==2 && is_numeric($item[1])){
          $this->marks[] = ["subject"=>trim($item[0]), "mark"=>trim($item[1])];
        }
      }
    }
  }
  // function to validate contact number
  public function numbercheck(){
    if (empty($_POST["contact"])) {
      $this->contactErr = "Contact Number is required.";
    } else {
      $this->contact = $this-> test_data($_POST["contact"]);
      if (!preg_match('/^(\+91)[6-9]\d{9}$/', $this->contact)) {
        $this->contactErr = "Only Numeric 10 digit number is allowed";
      }
    }
  }

  // function to validate email address
  public function emailcheck(){
    if(empty($_POST["email"])){
      $this->emailErr = "Email Id is required.";
    }
    else{
      $this->email = $this->test_data($_POST["email"]);
      if(!preg_match("/^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/",$this->email)){
        $this->emailErr = "Please Enter valid email address.";
      }
      else{
        // API Access Key
        $access_key = '2ba2666ced6f9df40d4ecf002b34e212';

        //email address to check
        $email_address = $this->email;

        // Initialize CURL
        $ch = curl_init('http://apilayer.net/api/bulk_check?access_key='.$access_key.'&email='.$email_address.'');  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
       $validationResult = json_decode($json, true);
       
      //Condition to check if mail address is available
       if($validationResult['mx_found']){
        echo "Email registered successfully.";
       }
       else{
         $this->emailErr = "Enter valid email.";
       }

      }
    }
  }
  
}
// Creates object when the form is submitted successfully.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $input = new form();
  $input->imgcheck();
  $input->validate();
  $input->resultcheck();
  $input->numbercheck();
  $input->emailcheck();
}
?>
