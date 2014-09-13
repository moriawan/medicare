<div id="wrapper">

<div class="container_12" style="padding:0px;">

	<div class="grid_3">
        <img src="<?php echo base_url(); ?>/images/profile/<?php 
		$DP="1";
		echo "DP-$DP".".jpg"; ?>" alt="" style="float:left; width:200px; margin-right:20px;" />
       
    </div>
           
	<div class="grid_9">
        <div class="grid_4">
        <h1><?php echo "Dr. ".$fname." ".$lname ; ?></h1>
       
        <ul class="genList">
        
            <li>Speciality : <?php echo $speciality; ?><br />
            Sub-Speciality : <?php echo $subspeciality; ?></li>
            
            <li>Address :  <?php echo $address." , ".$city." , ".$state." <br> Landmark : ".$landmark ; ?></li>
            <li>Practicing Since : <?php echo $doctor_year ; ?> </li>
            <li>Consultation fee : Rs. <?php echo $fee ; ?> </li>
        </ul>
        
    	</div>
		<div class="grid_4">
        <h1>&nbsp;  </h1>
        
        <h3>Qualifications : </h3>
        <ul class="genList">
            <li>Graduation : <?php echo $doctor_grad_degree." ,".$doctor_grad_year." <br> ".$doctor_grad_college ; ?></li>
            <li>Post Graduation : <?php echo $doctor_postgrad_degree." ,".$doctor_postgrad_year." <br> ".$doctor_postgrad_college ; ?></li>
            <li>Super Graduation : <?php echo $doctor_supergrad_degree." ,".$doctor_supergrad_year." <br> ".$doctor_supergrad_college ; ?></li>
        </ul>
       
    	</div>        
    </div>

</div>
<div id="greyStripe">
    <!-- BEGIN container_12 -->
    <div class="container_12">
      
        <!-- begin .grid_12 -->
        <div class="grid_12">
        <p>
        <?php if($followUpId>0): ?>
        Thank You , Your e-booking with the doctor has been confirmed. The concerned Doctor will respond to your request in due time.
        <?php 
		else :
		 ?>
         Their was some problem with the booking plz contact the customer care for more information.
         <?php 
         endif;
			?>        
        </p>
        
        </div><!-- end .grid_12 -->

    </div><!-- END container_12 -->
</div>


</div>