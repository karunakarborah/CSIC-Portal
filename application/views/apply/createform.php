<?php

$fname= $_POST["fname"];
$lname= $_POST["lname"];
$phone= $_POST["phone"];
$email= $_POST["email"];
$supervisor= $_POST["supervisor"];
$department= $_POST["department"];
$institution= $_POST["institution"];



date_default_timezone_set('Asia/Kolkata');
$application_no = date('HisdmY');
//$imageResource = Zend_Barcode::factory('code128', 'image', array('text'=> "test"), array())->draw();
$imageResource=Zend_Barcode::factory('code128', 'image', array('text'=>$application_no), array('imageType' => 'png'))->draw();
imagepng($imageResource, 'assets/barcode/'.$application_no.'.png');


?>



<div class="row">

	<div class="col">

		<h2>Review your Application</h2>
		

	<!-- </div>

	<div class="col-3">
		<img src="assets/img/dulogo.png" width="75" height="75"> -->
	</div>

</div>

<!-- <div class="row" style="height:100px;">
	<div class="col-6">

		<h4>Application No: <?php echo $application_no;?></h4>

	</div>

	<div class="col-6">

		<img src="assets/barcode/<?php echo $application_no; ?>.png">

	</div>

</div> -->

<div class="row">

	<div class="col-3">

		Applicant : <br/><h5><?php echo ucfirst($fname)." ".ucfirst($lname); ?></h5>

	</div>

	<div class="col-3">

		Supervisor : <br/><h5><?php echo ucfirst($supervisor); ?></h5>

	</div>

	<div class="col-3">

		Department : <br/><h5><?php echo ucfirst($department); ?></h5>

	</div>

</div>


<br/>
<br/>

<div class="row">

	<div class="col-3">
		<button class="btn btn-warning", onclick="goBack()">Edit / Go Back</button>
		<script>
			function goBack() {
  			window.history.back();
			}
		</script> 
	</div>

	<!-- <div class="col-3">
		<button class="btn btn-success", onclick="myFunction()">Print Application</button>

				<script>
				function myFunction() {
  				window.print();
				}
				</script>
	</div> -->

	<div class="col-3">

		<form action="<?php echo base_url();?>apply/createpdf" method="post" >
			<input type="hidden" name="application_no" value="<?php echo $application_no;?>" />
			<input type="hidden" name="fname" value="<?php echo $fname;?>" />
			<input type="hidden" name="lname" value="<?php echo $lname;?>" />
			<input type="hidden" name="phone" value="<?php echo $phone;?>" />
			<input type="hidden" name="email" value="<?php echo $email;?>" />
			<input type="hidden" name="supervisor" value="<?php echo $supervisor;?>" />
			<input type="hidden" name="department" value="<?php echo $department;?>" />
			<input type="hidden" name="institution" value="<?php echo $institution;?>" />			
			<input type="submit" name="download" value="Submit &amp Download Form" class="btn btn-success"/>


		</form>
	</div>
</div>