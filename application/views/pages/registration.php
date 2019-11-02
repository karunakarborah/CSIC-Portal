<!--
<form action="index.php/insertdb" method="post">
Name: <input type="text" name="name">
<input type="submit" value="Next">
</form>
-->
<h1><?php echo $title; ?></h1></br>
<?php
$name = $email = $nameErr= $emailErr = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }


 if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }


}

?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  Name: <input type="text" name="name" value="<?php echo $name;?>"/> <span class="error">* <?php echo $nameErr;?></span></br></br>
  Email: <input type="text" name="email" value="<?php echo $email;?>"/> <span class="error">* <?php echo $emailErr;?></span></br></br>
  <input type="submit" name="submitnext" value="Register" class="btn btn-success"/>
</form>   


