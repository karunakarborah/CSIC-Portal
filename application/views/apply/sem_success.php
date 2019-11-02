<h1>SEM Application</h1>
<h5>You have successfully generated your request.Your Application Number is <b><?php echo $application_no;?></b></h5>
<p>To complete your application process: 
<ol>
<li>Download this application form from the link given below.</li>
<li>Print the application and get it duely signed by your Supervisor/HOD/Chairperson.</li>
<li>Submit the form at CSIC, DU along with payment receipt (Bank Challan/Demand Draft).</li>
</ol>
</p>

<form action="<?php echo base_url();?>apply/create_pdf_sem/<?php echo $application_no; ?>" method="post" >

            <input type="hidden" name="application_no" value="<?php echo $application_no;?>" />
			<input type="hidden" name="fname" value="<?php echo $_SESSION['fname'];?>" />
			<input type="hidden" name="lname" value="<?php echo $_SESSION['lname'];?>" />
			<input type="hidden" name="phone" value="<?php echo $_SESSION['phone'];?>" />
			<input type="hidden" name="email" value="<?php echo $_SESSION['email'];?>" />
			<input type="hidden" name="supervisor" value="<?php echo $_SESSION['supervisor'];?>" />
			<input type="hidden" name="department" value="<?php echo $_SESSION['department'];?>" />
			<input type="hidden" name="institution" value="<?php echo $_SESSION['institution_name'];?>" />	

<input type="submit" class="btn btn-success" value="Download Application" />
</form>

