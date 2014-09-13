<link href="../../stylesheets/layout.css" rel="stylesheet" type="text/css" />

<div id="wrapper">

<!-- BEGIN GREYSTRIPE -->

<div id="white_container" >

    <!-- BEGIN container_12 -->

    <div class="container_12">

<div id="main_top" class="container_12" style="padding:20px; background-size:cover;">
 <div class="grid_6" style="float:left; width:390px; border-radius:8px; background:rgba(230,230,230,0.8);  padding-bottom:10px; padding-right:10px; padding-top:10px;">


 <?php 
    $attributes = array('id' => 'form2');

    echo form_open('login', $attributes)
    ?>
		<h1>Doctor Login </h1>
    	<label style="font-weight:bold">Login as a Doctor</label>
<br />
        <label style="font-weight:bold">Username </label><input type="text" class="field required " placeholder="Email" name="Username" /><br />
        <label style="font-weight:bold">Password</label><input type="password" class="field required " placeholder="Password" name="Password"/>
        <input type="hidden" name="user_type" value="doctor"  />

<br /><br />

<?php 
	//Display Errors 

	if(isset($docErrors)){
		echo '<div class="message warning" style="display: block;"><p>' ;
		echo $docErrors ;
		echo '</p></div>' ;
	}
	
?>

<br />

		<input type="submit" value="Login" class="submit" />
</form>

<br />

  <label style="padding:10px; font-weight:bold;">New to Its Medicare <a href="<?php echo base_url();?>register/patient_register">Register now</a></label>

     </div>

 <div class="grid_6" style="float:right; width:390px; border-radius:8px; background:rgba(230,230,230,0.7);   padding-bottom:10px; padding-right:10px; padding-top:10px;">

   

	 <?php 
    $attributes = array('id' => 'form2');

    echo form_open('login', $attributes)
    ?>
		<h1> Patient Login </h1>
        <p>
    	<label style="font-weight:bold">Login as a Patient</label>
        </p>
        <br>
        <p>Username <input type="text" class="field required " placeholder="Email" name="Username" width="200px" /></p>
        <p>Password <input type="text" class="field required " placeholder="Passowrd" name="Password"  />
        <input type="hidden" name="user_type" value="patient"  />
        </p>

<br />

<?php 
	//Display Errors 

	if(isset($patErrors)){
		echo '<div class="message warning" style="display: block;"><p>' ;
		echo $patErrors ;
		echo '</p></div>' ;
	}
	
?>


<br />
<br />
		<input type="submit" value="Login" class="submit" />
</form>

<label style="padding:10px; font-weight:bold;">New to Its Medicare <a href="<?php echo base_url();?>register/patient_register">Register now</a></label>

    </div>
</div>
    </div>

    <!-- END container_12 -->

</div>

<!-- END GREYSTRIPE -->

</div>
