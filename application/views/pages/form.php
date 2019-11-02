<?php
$name = $email = $phone = "";
$nameErr= $emailErr = $phoneErr = "";
$success=0;

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $success=0;
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
    else {$success=1;}
  }


 if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    $success=0;
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
    else {$success=1;}
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "Phone Number is required";
    $success=0;
  } else {
    $phone = test_input($_POST["phone"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9]{10}+$/",$phone)) {
      $phoneErr = "Only 10 Digit Mobile Allowed";
    }
    else {$success=1;}
  }

if($success===1){
$application_no = "barcode".date('His');
//$imageResource = Zend_Barcode::factory('code128', 'image', array('text'=> "test"), array())->draw();
$imageResource=Zend_Barcode::factory('code128', 'image', array('text'=>$phone), array('imageType' => 'png'))->draw();
imagepng($imageResource, 'assets/barcode/'.$application_no.'.png');

}



?>


<img src="assets/barcode/<?php echo $application_no; ?>.png">