<h1><?php echo "Validate Application"; ?></h1></br>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Application Number: <input type="text" name="num" value="" autofocus>
<input type="submit" value="Submit" class="btn btn-success">
</form>

<?php
$num="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$num = $_POST["num"];
echo "Application Number ".$num;

}