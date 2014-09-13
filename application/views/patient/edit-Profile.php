<div id="wrapper">

<div class="container_12">

  <!-- begin .grid_4 - IMAGE -->
    <div class="grid_3">
        <img src="<?php echo base_url(); ?>/images/profile/<?php 
	
		$DP = $uid;
		echo "DP-Patient-$DP".".jpg"; ?>" alt="" width="100%" />
      
      <div class="formBox" id="formBox1">
             
            
       <textarea id="advice" name="advice" class="area required" rows="" cols="" placeholder="Share an advice . . . "></textarea> 
               </div>
      
        	<p class="columnWidth"><a href="#" class="docname">Edit Profile</a></p>
           <ul class="genList">
             <li><a class="links" href="#" style="padding-left: 0px; ">Patients</a></li>
            <li><a class="links" href="#" style="padding-left: 0px; ">Messages</a></li>
        </ul>
      <a href="#" class="btn" style="opacity: 1; "><img src="<?php echo base_url(); ?>/images/btn.jpg" alt=""></a>
      </div><!-- end .grid_4 -->
    
    <div class="grid_8">  
  	<?php echo validation_errors();
		if(isset($result))
		  echo $result ; ?>
    <div class="layer1">
    
    
     <p class="heading">Profile Picture</p>

    <div class="content_edit DisplayPic">
    
	<?php 
  		
		
		
		$medicare=base_url()."index.php/patient/edit_profile";
		
		
		
		$medicare=preg_replace("/\//","-",$medicare);
		
		$medicare=preg_replace("/\?.*/","",$medicare);
		
		$medicare=preg_replace("/\-p[0-9]+/","",$medicare);
		
		

		
		
        $attributes = array('id' => 'form3');
  
        echo form_open_multipart('upload/do_upload/.-images-profile/jpg/DP-Patient-'.$uid.'/'.$medicare); 
  
        ?>

      
	<input type="file" name="userfile" size="20" style="padding-left:50px" />
	<input type="submit" class="submit" />

    </form>
  
    </div>

    
    <br />

    
    <p class="heading">Username / Change Password </p>
    <div class="content_edit">
    
	<?php 
		$attributes = array('id' => 'changepass');
		echo form_open('patient/edit_profile', $attributes);
    ?>

                    <p>Username(Email) : <?php echo $email ; ?>  </p>
                    <p>Old Password<input id="oldpass" name="oldpass" class="field required half" placeholder="Old Password" type="text" /> </p>
                    <p>New Password : <input id="newpass" name="newpass" class="field required half" placeholder="New Password" type="text" /></p>
                    <p>Comfirm Password : <input id="confpass" name="confpass" class="field required half" placeholder="Confirm Password" type="text" /></p>
                    <p align="right"><input type="submit" id="submit" value="Confirm" align="right" /></p>
    </form>
    </div>
    </br>
    <p class="heading" >My Location</p>
    <div class="content_edit">
	<?php 
		$attributes = array('id' => 'changelocation');
		echo form_open('patient/edit_profile', $attributes);
    ?>
	<p> State <input width="200px" value="<?php echo $state; ?>" type="text" id="doc_state" class="field required " placeholder="State" name="doc_state" /> City <input id="city" name="doc_city" value="<?php echo $city; ?>" class="field required " placeholder="City" type="text" /> </p>
   <p>
Address : <input id="address" value="<?php echo $address; ?>" name="doc_add" class="field required half" placeholder="Address" type="text" onBlur="codeAddress()" /> 
 <br />
   <br />
   <p>
    <div id="map_canvas" style="width:500px; height:300px ; display:compact;"></div>
    </p>
    <br>
    <input type="hidden" name="latitude" id="latitude" value="<?php echo $latitude ; ?>"  />
    <input type="hidden" name="longitude" id="longitude" value="<?php echo $longitude ; ?>"  />
    Land Mark : <input id="landmark" value="<?php echo $landmark; ?>" name="doc_land" class="field required half" placeholder="famous landmark nearby" type="text" />
    </p>
     <p align="right"><input type="submit" id="submit" value="Confirm" align="right" /></p>
    </form>
    </div>
    <br />

    <p class="heading">Name</p>
    <div class="content_edit">
	<?php 
		$attributes = array('id' => 'changedocapp');
		echo form_open('patient/edit_profile', $attributes);
    ?>
    
    <p>
    
    First Name <input id="fname" name="fname" value="<?php echo $fname; ?>" class="field required " placeholder="First Name" type="text" />
Last Name<input id="lname" name="lname" value="<?php echo $lname; ?>" class="field required "  placeholder="Last Name" type="text" />
<br />
	  
	<p align="right"><input type="submit" id="submit" value="Confirm" align="right" /></p>
    </form>
    </p>
    </div>
    <br />
    <p class="heading">My Profile</p>
    <div class="content_edit">
	<?php 
		$attributes = array('id' => 'changeprofile');
		echo form_open('patient/edit_profile', $attributes);
    ?>
    
    <p>
    
	 Special Condition : <input id="special_condition" value="<?php echo $special_condition; ?>" name="special_condition" class="field required half" placeholder="Special Condition " type="text" />

<br />

Chronic Illness : <input id="chronic_illness" value="<?php echo $chronic_illness; ?>" name="chronic_illness" class="field required half" placeholder="Chronic Illness " type="text" />

<br />

Age : <input id="age" value="<?php echo $age; ?>" name="age" class="field required half" placeholder="Patient Age " type="text" />

<br />

Martial Status : <input id="martial_status" value="<?php echo $martial_status; ?>" name="martial_status" class="field required half" placeholder="Martial Status " type="text" />

<br />

Blood Type : <input id="blood_type" value="<?php echo $blood_type; ?>" name="blood_type" class="field required half" placeholder="Blood Type " type="text" />

<br />

Other Condition : <input id="other_condition" value="<?php echo $other_condition; ?>" name="other_condition" class="field required half" placeholder="Other Condition " type="text" />

<br />

Other Condition : <input id="other_condition1" value="<?php echo $other_condition1; ?>" name="other_condition1" class="field required half" placeholder="Other Condition " type="text" />

<br />


    </p>
     <p align="right"><input type="submit" id="submit" value="Confirm" align="right" /></p>
    </form>
    
    </div>
    
    
    </div>         
    </div>        
       
       <br />

       

</div>

</div>