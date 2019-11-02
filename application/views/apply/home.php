
<h1 class=page-header><?php echo "Apply for Sample Analysis"; ?></h1></br>


<div class="text-danger">
<?php echo validation_errors(); ?>
</div>

<?php echo form_open('apply'); ?>



<div class="form-row">

        <label class="col-sm-2 col-form-label">First Name:*</label>
        <div class="col-sm-3">
          <input type="text", class="form-control", name="fname", value="<?php echo set_value('fname'); ?>" placeholder="First Name", /></br>
        </div>



        <label class="col-sm-2 col-form-label">Last Name:*</label>
        <div class="col-sm-3">
          <input type="text", class="form-control", name="lname", value="<?php echo set_value('lname'); ?>" placeholder="Last Name"/></br>
        </div>
  </div>

  <div class="form-row">

        <label class="col-sm-2 col-form-label">Phone No:*</label> 
        <div class="col-sm-3">
          <input type="text", class="form-control", name="phone", value="<?php echo set_value('phone'); ?>" placeholder="10 Digit Valid Mobile Number"/></br>
        </div>


        <label class="col-sm-2 col-form-label">Email:*</label> 
        <div class="col-sm-3">
          <input type="text", class="form-control", name="email", value="<?php echo set_value('email'); ?>" placeholder="Email Address"/></br>
        </div>
  </div>

<div class="form-row">
        <label class="col-sm-2 col-form-label">Supervisor:*</label> 
        <div class="col-sm-3">
          <input type="text", class="form-control", name="supervisor", value="<?php echo set_value('supervisor'); ?>" placeholder="Name of your Supervisor"/></br>
        </div>


        <label class="col-sm-2 col-form-label">Department:*</label> 
        <div class="col-sm-3">
          <input type="text", class="form-control", name="department", value="<?php echo set_value('department'); ?>" placeholder="Name of your Department"/></br>
        </div>
</div>

<div class="form-row">

    <label class="col-sm-2 col-form-label">Institution:*</label> 
    <div class="col-sm-3">
    <select class="custom-select" name="institution" id="itype" value="<?php echo set_value('institution'); ?>" >          
      <option value="1">Dibrugarh University</option>
      <option value="2">Other Academic</option>
      <option value="3">Industry</option>
    </select>
    </div>

    

  <label class="col-sm-2 col-form-label">Institution Name:*</label> 
    <div class="col-sm-3">
      <input type="text", class="form-control", id="iname" name="institution_name", value="<?php echo set_value('institution_name'); ?>" disabled="true" >    
    </div>

  <script type="text/javascript">
    
           var sel = document.getElementById("itype"), text = document.getElementById("iname");

            sel.onchange = function(e) {
            text.disabled = (sel.value == "1");
            };
     
  </script>


</div>



<div class="form-row">
      <div class = "col-4">
      </div>
      <div class = "col-4">
          <br/><br/><input type="submit",name="submit", value="Submit", class="btn btn-success"/>
      </div>
      <div class = "col-4">
      </div>
</div> 




<?php echo form_close(); ?>

