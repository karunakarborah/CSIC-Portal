<h1><?php echo "Apply for Sample Analysis"; ?></h1>


<form action="<?php echo base_url();?>form" method="post" >

  <div class="form-row">

        <label class="col-sm-2 col-form-label">Name:*</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="name" value="" placeholder="Name"/></br>
        </div>
  </div>

  <div class="form-row">
        <label class="col-sm-2 col-form-label">Email:*</label> 
        <div class="col-sm-5">
          <input type="text" class="form-control" name="email" value="" placeholder="Email Address"/></br>
        </div>
  </div>

<div class="form-row">
        <label class="col-sm-2 col-form-label">Phone No:*</label> 
        <div class="col-sm-5">
          <input type="text" class="form-control" name="phone" value="" placeholder="10 Digit Valid Mobile Number"/></br></br>
        </div>
</div>


<div class="form-row">
          <input type="submit" name="submit" value="Submit" class="btn btn-success"/>
</div>

</form>


