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
        
        	<br>

            <div id="map_canvas" style="width:300px; height:300px; float:left"></div>
  
        	
           <div class="grid_8">
           
           		
                <?php 
				
	
				
				 $days[0]="Monday";
				 $days[1]="Tuesday";
				 $days[2]="Wednesday";
				 $days[3]="Thrusday";
				 $days[4]="Friday";
				 $days[5]="Sauturday";
				 $days[6]="Sunday";
				 
				 $day[0]="Mon";
				 $day[1]="Tues";
				 $day[2]="Wed";
				 $day[3]="Thr";
				 $day[4]="Fri";
				 $day[5]="Sat";
				 $day[6]="Sun";
				 
				  
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
					for($x =0 ; $x <sizeof($result['slot']['Monday']) ; $x++ ){
						
						echo "<tr>" ;
						
						for($i = 0 ; $i<7 ; $i++ ){
							echo '<td>' ;
							$tomorrow = mktime(date("H"),date("i"),date("s"),date("m"),date("d")+$i,date("Y"));
							$dateF = date('Y-m-d',$tomorrow);
							$tdday =  $days[date('N', strtotime($dateF))-1] ;
							echo '<a href="'.base_url().'index.php/appointment/confirm_booking/?date='.$dateF.'&time='.$result['slot'][$tdday][$x].'&doc_id='.$doc_id.'" >';
							
							echo $result['slot'][$tdday][$x] ;
							echo ' </a></td>' ;
						}
						echo  " </tr>" ;
					}
					
					 ?>
                  
                    
            	</tbody>
            	
            </table>
               
    		</div> 
           
           
           
           
        </div><!-- end .grid_12 -->

    </div><!-- END container_12 -->
</div>


</div>