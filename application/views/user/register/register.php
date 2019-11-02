<h1 class=page-header><?php echo "Register"; ?></h1>

<?php
  if(!empty(validation_errors()))
    echo "<div class=\" alert alert-danger\">";
    echo validation_errors();
    echo "</div>";
?>


<?php echo form_open('user/register'); ?>
<div class="container fluid">

<div class="row row-eq-height">

  
  <div class = "col col-12 col-sm-12 col-md-12 col-lg-8 padding">
    <div class="card h-100 border-info shadow">
      <p class="card-header">Profile Info</p>
        <div class="card-body">


              <div class="form-row">
                      <label class="col-sm-4 col-md-4 col-lg-2 col-form-label">First Name:*</label>
                      <div class="col-sm-8 col-lg-4">
                        <input type="text", class="form-control", name="fname", value="<?php echo set_value('fname'); ?>" placeholder="First Name", /></br>
                      </div>

                      <label class="col-sm-4 col-md-4 col-lg-2 col-form-label">Last Name:*</label>
                      <div class="col-sm-8 col-lg-4">
                        <input type="text", class="form-control", name="lname", value="<?php echo set_value('lname'); ?>" placeholder="Last Name" autocomplete="off"/></br>
                      </div>
                </div>




                <div class="form-row">

                      <label class="col-sm-4 col-lg-2 col-form-label">Phone No:*</label> 
                        <div class="col-sm-8 col-lg-4">
                          <input type="text", class="form-control", name="phone", value="<?php echo set_value('phone'); ?>" placeholder="10 Digit Valid Mobile Number"/></br>
                        </div>
                      
                      <label class="col-sm-4 col-md-4 col-lg-2 col-form-label">Gender:*</label>
                        <div class="col-sm-8 col-md-8 col-lg-4">        
                          <select class="custom-select" name="gender" value="<?php echo set_value('gender'); ?>" >          
                            <option value="female">Female</option>
                            <option value="male">Male</option>
                            <option value="other">Other</option>
                          </select>
                        </div>                    
                </div>

              <div class="form-row">
                      <label class="col-sm-4 col-lg-2 col-form-label">Supervisor:*</label> 
                      <div class="col-sm-8 col-lg-4">
                        <input type="text", class="form-control", name="supervisor", value="<?php echo set_value('supervisor'); ?>" placeholder="Name of your Supervisor"/></br>
                      </div>


                      <label class="col-sm-4 col-lg-2 col-form-label">Department:*</label> 
                      <div class="col-sm-8 col-lg-4">
                        <input type="text", class="form-control", name="department", value="<?php echo set_value('department'); ?>" placeholder="Name of your Department"/></br>
                      </div>
              </div>

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
          </div>
        </div>
      </div>

      <div class = "col col-12 col-sm-12 col-md-12 col-lg-4 padding">
    <div class="card h-100 border-info shadow">
      <p class="card-header">Login Info</p>
        <div class="card-body">
            <div class="form-row">
              <label class="form-label">Email:*</label>                
                        <input type="text", class="form-control", name="email", value="<?php echo set_value('email'); ?>" placeholder="Email Address"/></br>            
              </div>

              <div class="form-row">
              <label class="form-label">Password:*</label>
                        <input type="password", class="form-control", name="password", value="<?php echo set_value('password'); ?>" placeholder="Password", autocomplete="off"/></br>
              </div>

              <div class="form-row">
              <label class="form-label">Confirm Password:*</label>
                      <input type="password", class="form-control", name="confirm_password", value="<?php echo set_value('confirm_password'); ?>" placeholder="Confirm Password"/></br>
              </div>

              <div class="row padding">
                <div class="col-12 d-flex justify-content-around">
                  </center><input type="submit",name="submit", value="Register", class="btn btn-success col-8"/></center>
                </div>
              </div>

        </div> <!-- card body -->
    </div><!-- card -->
  </div><!--- col -->




</div>
</div>


     

<script src="jquery.disable-autofill.js"></script>
<script>
  $('input[autofill="off"]').disableAutofill();
</script>


<?php echo form_close(); ?>