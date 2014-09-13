
<div id="wrapper">
<!-- BEGIN GREYSTRIPE -->
<div id="greyStripe" >
    <!-- BEGIN container_12 -->
    <div class="container_12">
      
        <!-- begin last works -->
        
            <div class="grid_2">
            <br />

    	</div>
        <!-- begin SERVICES - LINE 1 -->
        <div class="line">
        	<!-- begin .grid_4 -->
            <div class="grid_8">
            
    	<h1><?php echo $user_type; ?> Registration</h1>      
        <!-- Begin #form1 -->
          <!--  <form id="form1" method="post" action="" enctype="multipart/form-data">
           -->
           
           
<?php echo validation_errors(); ?>




<?php 

$attributes = array('id' => 'form1');
echo form_open('register/patient_welcome', $attributes) 

?>

<input id="fname" name="fname" class="field required half" placeholder="First Name" type="text" />
<input id="lname" name="lname" class="field required half"  placeholder="Last Name" type="text" />
<br />

<input id="email" name="email" class="field required full" placeholder="Please enter your email ID" type="text" />

<br />
              
<input id="phone" name="mobile" class="field required full" placeholder="Please enter your Phone number" type="text" />

<br />

<input type="password" id="pass" class="field required half" placeholder="Input password" name="pass" />
<input type="password" id="pass2" class="field required half" placeholder="Confirm password" name="pass2" />

<br />
    
<label for="securecode" class="lbl"><a href="#">Get one time secure code</a> </label>
<input id="securecode" name="securecode" class="field required"  placeholder="Enter your secure code" type="text" />

<br />

<label for="agreement" class="lbl">I agree with the <a href="#">terms and conditions</a></label>
<input type="checkbox" class="check required"  />

<br />
<br />


                 <input type="submit" id="submit" value="Sign Up" />
                
              
                
            </form><!-- end #form1 -->
    </div><!-- end .grid_4 -->
        
        </div><!-- end SERVICES - LINE 1 -->   
        
        
    </div><!-- END container_12 -->
</div><!-- END GREYSTRIPE -->

</div>

