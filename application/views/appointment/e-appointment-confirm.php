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
        
        <?php 
/*
		$timestamp = $date ;
		
		$ttime = (int)((int)($time)/100) ;
		$ttime .= ":"  ;
		if($time%100<10){
		$ttime .= "0".((int)$time)%100 ;
		
		}
		else
		$ttime .= ((int)$time)%100 ;
		
		$ttime .= ":00" ;
		
		$timestamp .= " ".$ttime ;
		//echo $timestamp ;*/
		$attributes = array('id' => 'form1');
		echo form_open('appointment/eAppointmentBooking/'.$tid, $attributes) 
		?>
        
        	<h2><span style="float:left; width:400px ;"> Confirm e-appointment </span></h2>
        <br />

        	<h2><span style="float:left; width:400px ;">Comment </span></h2> <input id="problem" name="problem" class="field required full"
             placeholder="Questions or Problems that you have" type="text" />
            
            <input type="hidden" value="<?php echo $doctor_id ?>" name="doctor_id"  />
           <br />
           <br />
           <input type="submit" id="submit" name="submit" value="Confirm " />
           
           </form >
        </div><!-- end .grid_12 -->

    </div><!-- END container_12 -->
</div>


</div>