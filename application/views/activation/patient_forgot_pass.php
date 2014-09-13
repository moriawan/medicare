
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
		echo form_open('activation/doctor_forgot_pass', $attributes);

        echo ' Please enter the Email used for Registration
		<br>
		  <p>Email : <input id="email" name="email" class="field required " placeholder="Email" type="text" /></p>
     
		  <p align="right"><input type="submit" id="submit" value="Confirm" align="right" /></p>	
    			</form>' ;
	
	
		}
		else{
						echo '<p> '.$response.'  </p>' ;
		}
		
		
	
	?> 
    
    
    
    
    <br /><br />

THANK YOU FOR CHOOSING ITS
    </p>
    
    </div><!-- END container_12 -->
</div><!-- END GREYSTRIPE -->

</div>

