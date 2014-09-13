
<div id="wrapper">
<!-- BEGIN GREYSTRIPE -->
<div id="greyStripe" >
    <!-- BEGIN container_12 -->
    <div class="container_12">
      
    <h1>ITS MEDICARE Activation</h1>
    
    <p>
    <br />
	
    
    <?php 
		if($result==true){
			
		$attributes = array('id' => 'changepass');
		echo form_open('activation/doctor_change_pass', $attributes);

        echo '      <p>Username(Email) : '.$email.'  </p>
                    <input name="actcode" type="hidden" value="'.$actcode.'" />
                    <p>New Password : <input id="newpass" name="pass" class="field required half" placeholder="New Password" type="text" /></p>
                    <p>Comfirm Password : <input id="confpass" name="pass2" class="field required half" placeholder="Confirm Password" type="text" /></p>
					<input type="hidden" name="doctor_id" value="'.$doctor_id.'" >
                    <p align="right"><input type="submit" id="submit" value="Confirm" align="right" /></p>
					
    			</form>' ;
	
	
		}
		else{
			
			echo '<p> Sorry This activation link has expired </p>' ;
		}
		
		
	
	?> 
    
    
    
    
    <br /><br />

THANK YOU FOR CHOOSING ITS
    </p>
    
    </div><!-- END container_12 -->
</div><!-- END GREYSTRIPE -->

</div>

