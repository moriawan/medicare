<div id="wrapper">

<div class="container_12">

  <!-- begin .grid_4 - IMAGE -->
    <div class="grid_3">
        <img src="<?php echo base_url(); ?>/images/profile/<?php 
		$DP="1";
		echo "DP-$DP".".jpg"; ?>" alt="" width="100%" />
      
      <div class="formBox" id="formBox1">
             
            
       <textarea id="advice" name="advice" class="area required" rows="" cols="" placeholder="Share an advice . . . "></textarea> 
      

               </div>
      
        	<p class="columnWidth"><a href="profile.php" class="docname">dit Profile</a></p>
           <ul class="genList">
            <li><a class="links" href="#" style="padding-left: 0px; ">Subscribers</a></li>
            <li><a class="links" href="#" style="padding-left: 0px; ">Patients</a></li>
            <li><a class="links" href="#" style="padding-left: 0px; ">Messages</a></li>
        </ul>
      <a href="#" class="btn" style="opacity: 1; "><img src="<?php echo base_url(); ?>/images/btn.jpg" alt=""></a>
      </div><!-- end .grid_4 -->
    
    <div class="grid_8">  
  

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                    
<?php 

for($l=0; $l<7;$l++){

	echo '<th>'.$day_name[$l].'</th>';

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
					
//make cyclic 


for($j=0;$j<7;$j++){
	
	$size[$j]=sizeof($data['schedule'][$day_name[$j]]);
	
	}



$maxslots=max($size);




	
for($k=0;$k<$maxslots;$k++){

	
	echo "<br />";

	for($i=0;$i<7;$i++){

		$slot_time=$data['schedule'][$day_name[$i]][$k];
		
		
		  if($k<sizeof($data['schedule'][$day_name[$i]]) && isset($data['app_time'][$day_name[$i]][$k])){
			
			$occupancy=sizeof($data['app_time'][$day_name[$i]][$k])/$rate_appointment;
			
			$hiddendiv="<div class='hiddendiv'>";
			
			foreach ($data['app_time'][$day_name[$i]][$k] as $appointment){
				
				$hiddendiv.="$appointment<br />";
				}
			
			$hiddendiv.="</div>";
			
			echo" ".$occupancy.$hiddendiv." ";
		
		}
		
		else echo " N/A ";
			
	}

}


/*
	
for($k=0;$k<$maxslots;$k++){

	
	echo "<tr>";

	for($i=0;$i<7;$i++){

		$slot_time=$data['schedule'][$day_name[$i]][$k];
		
		
		  if($k<sizeof($data['schedule'][$day_name[$i]]) && isset($data['app_time'][$day_name[$i]][$k])){
			
			$occupancy=sizeof($data['app_time'][$day_name[$i]][$k])/$rate_appointment;
			
			$hiddendiv="<div class='hiddendiv'>";
			
			foreach ($data['app_time'][$day_name[$i]][$k] as $appointment){
				
				$hiddendiv.="$appointment<br />";
				}
			
			$hiddendiv.="</div>";
			
			echo"<td class='data_".number_format($occupancy,1)." table_data'>".$occupancy.$hiddendiv."</td>";
		
		}
		
		else echo "<td>N/A</td>";
			
	}

}*/
 ?>
  
                    </tr>
            	</tbody>
            	
            </table>
            
            
            
       
       <br />

       
       
<div class="grid_8">
        	<div class="alertMessage"><img src="<?php echo base_url(); ?>/images/messages/alert.png" alt="">&nbsp;&nbsp;&nbsp;You have 3 new appointments</div>
        </div>
        
        
<div class="grid_8">
    	<ul class="genList">
            <li>
            	<h5><span class="date">31 Aug</span>&nbsp;|&nbsp;John Doe</h5>
            	"Lorem ipsum dolor sit amet, consectetur adipiscing elit."
            </li>
            <li>
            	<h5><span class="date">31 Aug</span>&nbsp;|&nbsp;John Doe</h5>
            	"Lorem ipsum dolor sit amet, consectetur adipiscing elit."
            </li>
            <li>
            	<h5><span class="date">31 Aug</span>&nbsp;|&nbsp;John Doe</h5>
            	"Lorem ipsum dolor sit amet, consectetur adipiscing elit."
            </li>
        </ul>
        <a class="toBlog" href="#">see all appointments &nbsp;<img src="<?php echo base_url(); ?>/images/linkarrow.jpg" alt=""></a>
    </div>


	</div>
</div>

</div>