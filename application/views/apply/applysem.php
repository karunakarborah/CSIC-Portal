<h1><?php echo "Apply for SEM Analysis"; ?></h1>

<div class="text-danger">
  <?php echo validation_errors(); ?>
</div><!--- text danger --->

<?php echo form_open('apply/applysem'); ?><!-- form open -->

<div class="container border rounded shadow padding">

    <div class="form-row"><!--- form row 1 start --->

        <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Sample Type:*</label>
        <div class="col-sm-8 col-md-6 col-lg-6">
            <input type="text", class="form-control", name="sample_type", value="<?php echo set_value('sample_type');?>", placeholder="eg. Powder/Thin Flim/Biological/Other", /></br>
        </div><!--- col --->

        <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Number of Samples:*</label>
        <div class="col-sm-8 col-md-2 col-lg-2">        
            <select class="custom-select form-control" name="no_of_samples">
            <option value=1 <?php echo (isset($_POST['no_of_samples']) && $_POST['no_of_samples']==1)? 'selected="selected"':'';?> >1</option>
            <option value=2 <?php echo (isset($_POST['no_of_samples']) && $_POST['no_of_samples']==2)? 'selected="selected"':'';?>>2</option>
            <option value=3 <?php echo (isset($_POST['no_of_samples']) && $_POST['no_of_samples']==3)? 'selected="selected"':'';?>>3</option>
            <option value=4 <?php echo (isset($_POST['no_of_samples']) && $_POST['no_of_samples']==4)? 'selected="selected"':'';?>>4</option>
            <option value=5 <?php echo (isset($_POST['no_of_samples']) && $_POST['no_of_samples']==5)? 'selected="selected"':'';?>>5</option>
            <option value=6 <?php echo (isset($_POST['no_of_samples']) && $_POST['no_of_samples']==6)? 'selected="selected"':'';?>>6</option>
            <option value=7 <?php echo (isset($_POST['no_of_samples']) && $_POST['no_of_samples']==7)? 'selected="selected"':'';?>>7</option>
            <option value=8 <?php echo (isset($_POST['no_of_samples']) && $_POST['no_of_samples']==8)? 'selected="selected"':'';?>>8</option>
            <option value=9 <?php echo (isset($_POST['no_of_samples']) && $_POST['no_of_samples']==9)? 'selected="selected"':'';?>>9</option>
            <option value=10 <?php echo (isset($_POST['no_of_samples']) && $_POST['no_of_samples']==10)? 'selected="selected"':'';?>>10</option>
            </select>
        </div><!--- col --->  

    </div></br><!--- form row 1 end --->


    <div class="form-row"><!--- form row 2 start --->
        <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Sample Code/Name:*</label> 
        <div class="col-sm-8 col-md-10 col-lg-10">
            <input type="text", class="form-control", name="sample_code", value="<?php echo set_value('sample_code');?>" placeholder="Comma separated Sample Code/Name/ID etc."/></br>
        </div><!--- col --->  
    </div><!--- form row 2 end --->


    <div class="form-row"><!--- form row 3 start --->

        <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Structure:*</label>                  
        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2" id="itype">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="structure" id="r1" value="Crystalline" <?php echo (isset($_POST['structure']) && $_POST['structure']=="Crystalline")? 'checked="checked"':'';?>>Crystalline
            </label>
        </div><!--- form check 1--->

        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="structure" id="r2" value="Amorphous" <?php echo (isset($_POST['structure']) && $_POST['structure']=="Amorphous")? 'checked="checked"':'';?>>Amorphous
            </label>
        </div><!--- form check 2--->

        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="structure" id="r3" value="Unknown" <?php echo (isset($_POST['structure']) && $_POST['structure']=="Unknown")? 'checked="checked"':'';?>>Unknown
            </label>
        </div><!--- form check 3--->

    </div><!--- form row 3 end --->


    <div class="form-row"><!--- form row 4 start --->

        <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Volatility:*</label>                  
        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2" id="itype">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="volatility" id="r1" value="Volatile" <?php echo (isset($_POST['volatility']) && $_POST['volatility']=="Volatile")? 'checked="checked"':'';?>>Volatile
            </label>
        </div><!--- form check 1--->

        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="volatility" id="r2" value="Non-Volatile" <?php echo (isset($_POST['volatility']) && $_POST['volatility']=="Non-Volatile")? 'checked="checked"':'';?>>Non-Volatile
            </label>
        </div><!--- form check 2--->

        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="volatility" id="r3" value="Unknown" <?php echo (isset($_POST['volatility']) && $_POST['volatility']=="Unknown")? 'checked="checked"':'';?>>Unknown
            </label>
        </div><!--- form check 3--->

    </div><!--- form row 4 end --->


    <div class="form-row"><!--- form row 4 start --->

        <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Moisture Sensitivity:*</label>                  
        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2" id="itype">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="moisture_sensitivity" id="r1" value="Low" <?php echo (isset($_POST['moisture_sensitivity']) && $_POST['moisture_sensitivity']=="Low")? 'checked="checked"':'';?>>Low
            </label>
        </div><!--- form check 1--->

        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="moisture_sensitivity" id="r2" value="Moderate" <?php echo (isset($_POST['moisture_sensitivity']) && $_POST['moisture_sensitivity']=="Moderate")? 'checked="checked"':'';?>>Moderate
            </label>
        </div><!--- form check 2--->

        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="moisture_sensitivity" id="r3" value="High" <?php echo (isset($_POST['moisture_sensitivity']) && $_POST['moisture_sensitivity']=="High")? 'checked="checked"':'';?>>High
            </label>
        </div><!--- form check 3--->

        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="moisture_sensitivity" id="r4" value="Unknown" <?php echo (isset($_POST['moisture_sensitivity']) && $_POST['moisture_sensitivity']=="Unknown")? 'checked="checked"':'';?>>Unknown
            </label>
        </div><!--- form check 4--->

    </div><!--- form row 4 end --->



    <div class="form-row"><!--- form row 5 start --->

        <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Conductivity:*</label>                  
        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2" id="itype">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="conductivity" id="r1" value="Conductor" <?php echo (isset($_POST['conductivity']) && $_POST['conductivity']=="Conductor")? 'checked="checked"':'';?>>Conductor
            </label>
        </div><!--- form check 1--->

        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="conductivity" id="r2" value="Semi-Conductor" <?php echo (isset($_POST['conductivity']) && $_POST['conductivity']=="Semi-Conductor")? 'checked="checked"':'';?>>Semi-Conductor
            </label>
        </div><!--- form check 2--->

        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="conductivity" id="r3" value="Non-Conductor" <?php echo (isset($_POST['conductivity']) && $_POST['conductivity']=="Non-Conductor")? 'checked="checked"':'';?>>Non-Conductor
            </label>
        </div><!--- form check 3--->

        <div class="form-check-inline col-sm-12 col-md-2 col-lg-2">
            <label class="form-check-label">
            <input type="radio" class="form-check-input" name="conductivity" id="r4" value="Unknown" <?php echo (isset($_POST['conductivity']) && $_POST['conductivity']=="Unknown")? 'checked="checked"':'';?>>Unknown
            </label>
        </div><!--- form check 4--->

    </div><!--- form row 5 end --->



    <div class="form-row"><!--- form row 6 start --->

    <label class="col-sm-4 col-md-2 col-lg-2 col-form-label">Analysis:*</label>
        <div class="form-check form-check-inline col-sm-12 col-md-2 col-lg-2">
            <input class="form-check-input" name="analysis[]" type="checkbox" id="inlineCheckbox1" value="Morphology" <?php echo (isset($_POST['analysis']) && in_array("Morphology", $_POST['analysis']))? 'checked="checked"':'';?>>
            <label class="form-check-label" for="inlineCheckbox1">Morphology</label>
        </div>

        <div class="form-check form-check-inline col-sm-12 col-md-2 col-lg-2">
            <input class="form-check-input" name="analysis[]" type="checkbox" id="inlineCheckbox2" value="EDX" <?php echo (isset($_POST['analysis']) && in_array("EDX", $_POST['analysis']))? 'checked="checked"':'';?>>
            <label class="form-check-label" for="inlineCheckbox2">EDX</label> &nbsp;            
        </div>


        <!-- <script src="<?php echo base_url();?>assets/js/divs.js"></script>
        <script src="<?php echo base_url();?>assets/js/ptable.js"></script>
        <script src="<?php echo base_url();?>assets/js/ptldata.js"></script> 
        <div class="fluid col-12 d-flex justify-content-around">       
        <script language=javascript> document.write(PTgetTable())</script></br>
        </div>
        
        <input type="button" class="btn btn-sm btn-primary" onclick="getElements()" value="Get Selected Elements"/></br></br>

        <input type="text" id="elements" name="elements" class="form-control"/>
        <script language=javascript>
        function getElements(){
            var atoms=prompt(document.write(PTgetTable()));
            document.getElementById("elements").value = PTgetSelectedList(1);
        }
        </script>  -->


    </div><!--- form row 6 end --->

    <div class="form-row"><!--- form row 7 start --->

   
        <label class="col-sm-4 col-md-2 col-lg-2 col-form-control" for="exampleFormControlTextarea1">Note to Operator</label>
        <div class="col-sm-8 col-md-10 col-lg-10">
            <textarea class="form-control", name="instructions" id="exampleFormControlTextarea1" rows="3" value="<?php echo set_value('instructions');?>" placeholder="Handling Instructions, Desired Magnifications, Suggessted Elements for EDX, or any other information to the operator "></textarea>
        </div><!--- col --->  


    </div><!--- form row 7 end --->


    <div class="text-danger">
    <br>
    <i class="fas fa-info-circle"></i> Please provide reference data, image, published papers for best results</br>
    <i class="fas fa-info-circle"></i> If the sample(s) present(s) any danger to the operator or equipment then kindly provide appropriate handling instructions or stipulates any special treatment as protocol, otherwise the user will be solely responsible for the damage done.</br>
    <i class="fas fa-info-circle"></i> The use of this facility (CSIC, Dibrugarh University) must be acknowledged in the publications/thesis/reports of the user and same should be informed via email to csic@dibru.ac.in.
    <center>
    <input type="checkbox" class="form-check-input" name="accept" id="exampleCheck1" value=1>
    <label class="form-check-label text-primary" for="exampleCheck1">* I accept the above terms and conditions</label>
    </center>
    </br>
    </div>


    <div class="form-row p-3"><!--- form row button group start--->
    <div class = "col-12 d-flex justify-content-around">
        </span class="col-4 col-md-4 col-lg-2"><a href="<?php echo base_url()?>dashboard"><input class="btn btn-danger col-12" type="button" value="Cancel"></a></span>
        <input class="btn btn-success col-4 col-md-4 col-lg-2" type="submit",name="submit", value="Submit"/>
    </div>      
    </div><!--- form row button group end--->

</div><!--- container -->
<?php echo form_close(); ?> <!-- form close -->