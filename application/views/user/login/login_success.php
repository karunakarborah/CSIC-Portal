<?php
if (isset($_SESSION['logged_in'])){
if ($_SESSION['lname'] != NULL){
    echo "you have logged in as: ";
    echo $_SESSION['fname']." ".$_SESSION['lname'];                   
}
}
else
echo "fujhjh";


?>