<!-- 
  html for edit profile page
  controller user
  model user_model
 -->
<h1 class=page-header><?php echo "Edit Profile"; ?></h1></br>


<div class="text-danger">
  <?php echo validation_errors(); ?>
</div><!--- text danger --->

<?php echo form_open('user/editprofile'); ?>

<div class="container border rounded shadow padding"><!--- main container start --->

<div class="form-row"><!--- form row 1 start --->
  <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">First Name:*</label>
  <div class="col-sm-8 col-md-4 col-lg-4">
    <input type="text", class="form-control", name="fname", value="<?php if(!empty($_POST)) echo set_value('fname'); else echo $fname; ?>" placeholder="First Name", /></br>
  </div><!--- col --->

  <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Last Name:*</label>
  <div class="col-sm-8 col-md-4 col-lg-4">
    <input type="text", class="form-control", name="lname", value="<?php if(!empty($_POST)) echo set_value('lname'); else echo $lname; ?>" placeholder="Last Name" autocomplete="off"/></br>
  </div><!--- col --->
</div><!--- form row 1 end --->


<div class="form-row"><!--- form row 2 start --->
  <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Phone No:*</label> 
  <div class="col-sm-8 col-md-4 col-lg-4">
    <input type="text", class="form-control", name="phone", value="<?php if(!empty($_POST)) echo set_value('phone'); else echo $phone; ?>" placeholder="10 Digit Valid Mobile Number"/></br>
  </div><!--- col --->

  <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Gender:*</label>
  <div class="col-sm-8 col-md-4 col-lg-4">        
    <select class="custom-select form-control" name="gender" value="<?php echo set_value('gender'); ?>" >
      <option value="female">Female</option>
      <option value="male">Male</option>
      <option value="other">Other</option>
    </select>
  </div><!--- col --->       
</div></br><!--- form row 2 end --->


<div class="form-row"><!--- form row 3 start --->
  <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Supervisor:*</label> 
  <div class="col-sm-8 col-md-4 col-lg-4">
    <input type="text", class="form-control", name="supervisor", value="<?php if(!empty($_POST)) echo set_value('supervisor'); else echo $supervisor; ?>" placeholder="Name of your Supervisor"/></br>
  </div>

  <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Department:*</label> 
  <div class="col-sm-8 col-md-4 col-lg-4">
    <input type="text", class="form-control", name="department", value="<?php if(!empty($_POST)) echo set_value('department'); else echo $department; ?>" placeholder="Name of your Department"/></br>
  </div>
</div><!--- form row 3 end --->


<div class="form-row"><!--- form row 4 start --->
  <label class="col-sm-4 col-md-3 col-lg-2 col-form-label">Institution Type:*</label>                  
  <div class="form-check-inline col-sm-12 col-md-1 col-lg-1" id="itype">
    <label class="form-check-label">
      <input type="radio" class="form-check-input" name="institution_type" id="r1" value="Dibrugarh University" onclick="enableTxtBox()">DU
    </label>
  </div><!--- form check 1--->

  <div class="form-check-inline col-sm-12 col-md-4 col-lg-4">
    <label class="form-check-label">
      <input type="radio" class="form-check-input" name="institution_type" id="r2" value="Other Academic Institution" onclick="enableTxtBox()">Other Academic Institution
    </label>
  </div><!--- form check 2--->

  <div class="form-check-inline col-sm-12 col-md-2 col-lg-2">
    <label class="form-check-label">
      <input type="radio" class="form-check-input" name="institution_type" id="r3" value="Industry" onclick="enableTxtBox()">Industry
    </label>
  </div><!--- form check 3--->
</div><!---form row 4 end --->

</br>
                  
<div class="form-row"><!--- form row 5 start --->
  <label class="col-sm-4 col-md-3 col-lg-2 col-form-label">Institution Name:*</label> 
    <div class="col-12 col-md-9 col-lg-10">
      <input type="text", class="form-control", id="iname" name="institution_name", disabled="true" >    
    </div>

  <script type="text/javascript"> //script start here                 
    function enableTxtBox()
        {
            if (document.getElementById("r1").checked)
            {
              document.getElementById("iname").disabled = false;  
              document.getElementById("iname").readOnly = true;
              document.getElementById("iname").value = "Dibrugarh University";
            }
            else if (document.getElementById("r2").checked)
            {

              document.getElementById("iname").disabled = false;                

            }
            else if (document.getElementById("r3").checked)
            {

              document.getElementById("iname").disabled = false;                

            }
        }               
  </script> <!-- script end here -->
</div><!---form row 5 end --->


<div class="form-row p-3"><!--- form row 6 start--->
  <div class = "col-12 d-flex justify-content-around">
    </span class="col-4 col-md-4 col-lg-2"><a href="<?php echo base_url()?>dashboard"><input class="btn btn-danger col-12" type="button" value="Cancel"></a></span>
    <input class="btn btn-success col-4 col-md-4 col-lg-2" type="submit",name="submit", value="Submit"/>
  </div>      
</div><!--- form row 6 end--->


<script src="jquery.disable-autofill.js"></script>
<script>
  $('input[autofill="off"]').disableAutofill();
</script>


</div><!--- main container end --->
<?php echo form_close(); ?>