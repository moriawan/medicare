
<?php

$i=0;
$doc_img = 1 ;

echo '<div class="container_8" style="background:rgba(255,255,255,1); padding:10px;">' ;

foreach ($profile as $row)
		{
			
			echo '<div class="search grid_8 result_item" style=" padding:20px;">
					<div style="float:left " >
					<div style="float:left" >
					<img src="'.base_url().'images/lwt_map_icons/brown/'.($i+1).'.png" style="width:30px; height=20px ; float:left;">
					  </div>
					<img src="http://itsmedicare.com/images/profile/'.$doc_img.'" style="width:100px; float:left; margin-left:10px;">
					</div>
					<br>
					<div style="float:left ; margin-left:20px  " >
						<span style="font-weight:bold ; font-size:14 ;">'.$row['fname'].' '.$row['lname'].'</span>
						</div>
					<div style="float:right" >
						'.$row['speciality'].'
					</div>
					
					<div style="clear:both" ></div>
						<p class="columnwidth" style="margin-left:140px"> 	
					
					<span style="font-weight:bold">email </span> : '.$row['email'].' <br>
					<span style="font-weight:bold">Address : </span> 205, Dron Apartment , Civil Lines , Gurgaon
					
					</p>
					<input type="button" class="submit" value="Book Appointment" style="width:160px; margin-left:300px;" onclick="book('.$row['doctor_id'].')">
					
					
					</div>
					';
				$i++ ;
				
  				
			
		}
echo "</div>" ;
 
?>

