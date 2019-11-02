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

</head>

<body style="margin-bottom: 0px">

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
              echo "  <a class=\"dropdown-item\" href=\"#\">NMR</a>";
              echo "  <a class=\"dropdown-item\" href=\"#\">SEM</a>";
              echo "  <a class=\"dropdown-item\" href=\"#\">XRD</a>";
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
<!-- </br> -->
	 <!-- <div class="container" style="padding: 0 15px 0 15px"> -->
	

