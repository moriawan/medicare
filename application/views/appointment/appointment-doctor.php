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
        
        
        <?php 
		
		if(sizeof($experience)>0) 
		{
			echo '<h3>Professional Experience : </h3> <ul class="genList">' ;
				$i=0 ;
		
		foreach($experience as $exp ) 
		{
			echo '<li  style="padding-top:2px !important ; padding-bottom:2px !important ; border-bottom:none !important ; ">'.$exp.'</li>';
			$i++ ;
		}	
		}
		
		?>
        <div ></div>
        
        
    	</div>
		<div class="grid_4">
        <h1>&nbsp;  </h1>
        
        <h3>Qualifications : </h3>
        <ul class="genList">
            <li style="padding-top:2px !important ; padding-bottom:2px !important ; border-bottom:none !important ; ">Graduation : <?php echo $doctor_grad_degree." ,".$doctor_grad_year." <br> ".$doctor_grad_college ; ?></li>
            <li style="padding-top:2px !important ; padding-bottom:2px !important ; border-bottom:none !important ; ">Post Graduation : <?php echo $doctor_postgrad_degree." ,".$doctor_postgrad_year." <br> ".$doctor_postgrad_college ; ?></li>
            <li style="padding-top:2px !important ; padding-bottom:2px !important ; border-bottom:none !important ; ">Super Graduation : <?php echo $doctor_supergrad_degree." ,".$doctor_supergrad_year." <br> ".$doctor_supergrad_college ; ?></li>
        </ul>
       
       <?php 
		
		if(sizeof($certifications)>0) 
		{
			echo '<h3>Certifications and Memberships : </h3> <ul class="genList">' ;
				$i=0 ;
		
		foreach($certifications as $exp ) 
		{
			echo '<li style="padding-top:2px !important ; padding-bottom:2px !important ; border-bottom:none !important ; ">'.$exp.'</li>';
			$i++ ;
		}	
		}
		
		?>
        
        <?php 
		
		if(sizeof($awards)>0) 
		{
			echo '<h3>Awards : </h3> <ul class="genList">' ;
				$i=0 ;
		
		foreach($awards as $exp ) 
		{
			echo '<li  style="padding-top:2px !important ; padding-bottom:2px !important ; border-bottom:none !important ; ">'.$exp.'</li>';
			$i++ ;
		}	
		}
		
		?>
       
    	</div>        
    </div>

</div>
<div id="greyStripe">
    <!-- BEGIN container_12 -->
    <div class="container_12">
      
        <!-- begin .grid_12 -->
        <div class="grid_12">
        
        	<br>
			<div style="width:300px; height:350px; float:left" > 
            <div id="map_canvas" style="width:300px; height:300px; float:left"></div>
  			<div style="width:300px; float:left" >
                <p>Address :  <?php echo $address." , ".$city." , ".$state." <br> Landmark : ".$landmark ; ?></p>
            
             </div>
            </div>
            
           <div class="grid_8">
           
           		
                <?php 
				
	
				
				 $days[0]="Monday";
				 $days[1]="Tuesday";
				 $days[2]="Wednesday";
				 $days[3]="Thrusday";
				 $days[4]="Friday";
				 $days[5]="Sauturday";
				 $days[6]="Sunday";
				 
				 $day[0]="Monday";
				 $day[1]="Tuesday";
				 $day[2]="Wednesday";
				 $day[3]="Thrusday";
				 $day[4]="Friday";
				 $day[5]="Sauturday";
				 $day[6]="Sunday";
				 
				  
				//echo date('N', strtotime('2011-05-11')); 
				
				
				
				?> 
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                    <?php
					for($i = 0 ; $i<7 ; $i++ ){
						echo '<th>' ;
						$tomorrow = mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$i,date("Y"));
						$dateF = date('Y-m-d',$tomorrow);
						echo $date = date('d-m ',$tomorrow);
						echo $day[date('N', strtotime($dateF))-1] ;
						echo '</th>' ;
					}
					
					 ?>
                   
                    </tr>
                </thead>
                
                <tfoot>
                    <tr>
                    <td colspan="7"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></td>
                    </tr>
            	</tfoot>
            	<tbody>
                
                
                
                    <?php
					for($x =0 ; $x <$result['max'] ; $x++ ){
							
							echo "<tr>" ;
							
							for($i = 0 ; $i<7 ; $i++ ){
								
								$tomorrow = mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$i,date("Y"));
								$dateF = date('Y-m-d',$tomorrow);
								$tdday =  $days[date('N', strtotime($dateF))-1] ;
								
								
									if(isset($result['slot'][$tdday])&&sizeof($result['slot'][$tdday])>$x)
									{
									echo '<td style="padding:0px !important ; padding-top:2px !important ; padding-bottom:2px !important ;padding-left:5px !important ;padding-right:5px !important " align="center">' ;
									echo '<a href="'.base_url().'index.php/appointment/confirm_booking/?date='.$dateF.'&time='.$result['slot'][$tdday][$x].'&doc_id='.$doc_id.'" >';
									
									echo $result['slot'][$tdday][$x] ;
									echo ' </a></td>' ;
									}
									else
									{
										echo '<td> </td> ' ;
									}
								
							
							}
							echo  " </tr>" ;
						
					}
					
					 ?>
                  
                    
            	</tbody>
            	
            </table>
               
    		</div> 
           
           
           
           
        </div><!-- end .grid_12 -->
      <?php   
      if($secLocation!=false)
	  {
      echo '<div class="grid_12">
        
        	<br>

            <div style="width:300px; height:350px; float:left" > 
            <div id="map_canvas2" style="width:300px; height:300px; float:left"></div>
  			<div style="width:300px; float:left" >
                <p>Address : '.$secLocation['address']." , ".$secLocation['city']." , ".$secLocation['state']." <br> Landmark : ".$secLocation['landmark'].'</p>
            
             </div>
            </div>
  
        	
           <div class="grid_8">';
         
				 
                echo '<table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>';
                   
					for($i = 0 ; $i<7 ; $i++ ){
						echo '<th>' ;
						$tomorrow = mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$i,date("Y"));
						$dateF = date('Y-m-d',$tomorrow);
						echo $date = date('d-m ',$tomorrow);
						echo $day[date('N', strtotime($dateF))-1] ;
						echo '</th>' ;
					}
					
					 
                   
                echo     '</tr>
                </thead>
                
                <tfoot>
                    <tr>
                    <td colspan="7"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></td>
                    </tr>
            	</tfoot>
            	<tbody>' ;
                 
                
                    
					for($x =0 ; $x <$secSlots['max'] ; $x++ ){
							
							
							for($i = 0 ; $i<7 ; $i++ ){
								
								$tomorrow = mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$i,date("Y"));
								$dateF = date('Y-m-d',$tomorrow);
								$tdday =  $days[date('N', strtotime($dateF))-1] ;
								
								
									if(isset($secSlots['slot'][$tdday])&&sizeof($secSlots['slot'][$tdday])>$x)
									{
									echo '<td style="padding:0px !important ; padding-top:2px !important ; padding-bottom:2px !important ;padding-left:5px !important ;padding-right:5px !important " align="center">' ;
									echo '<a href="'.base_url().'index.php/appointment/confirm_booking/?date='.$dateF.'&time='.$secSlots['slot'][$tdday][$x].'&doc_id='.$doc_id.'" >';
									
									echo $secSlots['slot'][$tdday][$x] ;
									echo ' </a></td>' ;
									}
									else
									{
										echo '<td> </td> ' ;
									}
								
							
							}
							echo  " </tr>" ;
						
					}
					
					
                  
                    
            echo '</tbody>
            	
            </table>
               
    		</div> 
           
           
           
           
        </div><!-- end .grid_12 -->';
	  }
		 ?>

    </div><!-- END container_12 -->
</div>


</div>