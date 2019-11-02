<?php
//session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CSIC - <?php echo $title; ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fontawesome.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/sticky-footer-navbar.css">

    <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/popper.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>    

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

</head>

<body>

  <!-- <script src="<?php //echo base_url();?>assets/js/bootstrap.js"></script> -->

	<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
  <a class="navbar-brand" href="<?php echo base_url(); ?>">CSIC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <?php
          if(!isset($_SESSION['logged_in'])){
            // echo "<li class=\"nav-item\">";
            // echo "  <a class=\"nav-link\" href=\"".base_url()."\">Home <span class=\"sr-only\">(current)</span></a>";
            // echo "</li>";
          }
      
          if(isset($_SESSION['logged_in'])){


            echo "<li class=\"nav-item\">";
            echo  "<a class=\"nav-link\" href=\"".base_url()."dashboard\">Dashboard</a>";
            echo "</li>"; 
            
            
              echo "<li class=\"nav-item dropdown\">";
              echo "<a class=\"nav-link dropdown-toggle\" href=\"#\" id=\"navbarDropdownMenuLink\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">";
              echo "Apply";
              echo "</a>";
              echo "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdownMenuLink\">";
              echo "  <a class=\"dropdown-item\" href=\"".base_url()."apply/applynmr\">NMR</a>";
              echo "  <a class=\"dropdown-item\" href=\"".base_url()."apply/applysem\">SEM</a>";
              echo "  <a class=\"dropdown-item\" href=\"".base_url()."apply/applyxrd\">XRD</a>";
              echo "</div>";
              echo "</li>";                         
                     

              echo "<li class=\"nav-item\">";
              echo   "<a class=\"nav-link\" href=\"".base_url()."status\">Status</a>";
              echo "</li>";   

              // echo "<li class=\"nav-item\">";
              // echo "<a class=\"nav-link\" href=\"".base_url()."pricing\">Pricing</a>";
              // echo "</li>";

              if($_SESSION['is_admin']==TRUE){

                echo "<li class=\"nav-item\">";
                echo   "<a class=\"nav-link\" href=\"".base_url()."pages/validate\">Validate</a>";
                echo "</li>";
            }
          }

          
            echo "<li class=\"nav-item\">";
            echo "  <a class=\"nav-link\" href=\"".base_url()."pages/pricing\">Pricing</a>";
            echo "</li>";

            echo "<li class=\"nav-item\">";
            echo "  <a class=\"nav-link\" href=\"".base_url()."pages/contacts\">Contacts</a>";
            echo "</li>";
         

          
        ?>
        </ul>
<?php
  if(isset($_SESSION['logged_in'])){
  echo "<span style='color:white'>Hello ".$_SESSION['fname']."</span>";
  echo "<a class=\"nav-link font-weight-bold text-danger\" href= \"".base_url()."user/logout\">Logout <i class=\"fas fa-power-off\"></i></a>";
  }
  else{
    echo "<a class=\"nav-link font-weight-bold text-primary\" href= \"".base_url()."user/register\">Register <i class=\"fas fa-user-plus\"></i></a>";
    echo "<a class=\"nav-link font-weight-bold text-success\" href= \"".base_url()."user/login\">Login <i class=\"fas fa-user\"></i></a>";
  }
?>
  </div>
</nav>
</br>
	 <div class="container" style="padding: 0 15px 0 15px">
	

