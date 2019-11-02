<h1><?php echo $_SESSION["fname"];?>'s Dashboard</h1>

<div class="row">

    <div class = "col col-lg-4">
      <div class="card border-info shadow">
      <p class="card-header"><span class="h5"><i class="fas fa-exclamation-circle"></i> Application Status</span></p>                          
            <div class = "card-body">
                  <div class="table-responsive">
                        <table class="table table-sm">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col" >#</th>                            
                            <th scope="col" >Application No.</th>                            
                            <th scope="col" >Status</th> 
                            </tr>                            
                        </thead>
                        <tbody>

                            <tr>
                            <th scope="row">1</th>
                            <td class="text-left">SEM123456</td>
                            <td><i class="far fa-check-circle"></i> Ready</td>                            
                            </tr>

                            <tr>
                            <th scope="row">2</th>
                            <td class="text-left">XRD123456</td>
                            <td><i class="fas fa-hourglass-half"></i> Queued</td>                            
                            </tr>

                            <tr>
                            <th scope="row">3</th>
                            <td class="text-left">NMR123456</td>
                            <td><i class="far fa-times-circle"></i> Rejected</td>                            
                            </tr>

                            <tr>
                            <th scope="row">4</th>
                            <td class="text-left">SEM456789</td>
                            <td><i class="far fa-paper-plane"></i> Despatched</td>                            
                            </tr>
                   
                        </tbody>
                        </table> 
                  </div>      
            </div>
      </div>    
    </div>
 
    <div class = "col col-lg-4">
      <div class="card border-info shadow">
      <p class="card-header"><span class="h5"><i class="fas fa-file-import"></i> New Application</span></p>                          
            <div class = "card-body d-flex justify-content-around">
            <!-- <img src="assets/img/avatar.png" width="30%" alt="..." class="rounded-circle"> 
            <img src="assets/img/avatar.png" width="30%" alt="..." class="rounded-circle"> 
            <img src="assets/img/avatar.png" width="30%" alt="..." class="rounded-circle">       -->

            <a href="<?php echo base_url()?>apply/applynmr"><button class="btn btn-outline-secondary btn-circle btn-circle-xl m-1"><b>NMR</b></button></a>           
            <a href="<?php echo base_url()?>apply/applysem"><button class="btn btn-outline-orange btn-circle btn-circle-xl m-1"><b>SEM</b></button></a>
            <a href="<?php echo base_url()?>apply/applyxrd"><button class="btn btn-outline-primary btn-circle btn-circle-xl m-1"><b>XRD</b></button></a>
            </div>
      </div>    
    </div>

    <div class = "col col-lg-4">
      <div class="card border-info shadow">
      <p class="card-header"><span class="h5"><i class="fas fa-user"></i> Profile </span><small><a href="<?php echo base_url() ?>user/editprofile">Edit Profile</a> | <a href="<?php echo base_url() ?>user/changepw">Change Password</a></small></p>                          
            <div class = "card-body">
                  <?php if(isset($data['message'])) echo $data['message']; ?>
                  <h3 class="card-title"><?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?></h3>
                  <p class="card-text"><?php echo $_SESSION['department'];?></br>
                  <?php echo $_SESSION['institution_name'];?></br>
                  <?php if($_SESSION['institution_type']!="Dibrugarh University") echo "(".$_SESSION['institution_type'].")</br>";?>            
                  Contact: <?php echo $_SESSION['phone'];?></br>
                  Email: <?php echo $_SESSION['email'];?></br>
                  Supervisor: <?php echo $_SESSION['supervisor'];?></p>          
            </div>
      </div>    
    </div>

</div>
