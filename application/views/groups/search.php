
<div id="wrapper">
<!-- BEGIN GREYSTRIPE -->
<div id="greyStripe" style="position:relative; top:-50px">
    <!-- BEGIN container_12 -->
    <div class="container_12" style="background:rgba(255,255,255,1); padding:10px;">
      <br />

    <h1>Search results</h1>
    
    <p>
    <br />

<?php

$i=0;

foreach ($result->result() as $row)
		{
			
			echo '<div class="search grid_10 result_item" style=" padding:20px;">';
		//	$result2[]=$this->search_model->getName($row->doctor_id);
			
				foreach($result2[$i++]->result() as $row2){
			
					echo '<div>
					<img src="'.base_url().'images/profile/dp-1.jpg" style="width:100px; float:left; margin-left:20px;">
					<h3 class="columnwidth name" style="margin-left:140px; margin-top:0px">'.$row2->fname.' '.$row2->lname.'</h3><br />';
				
					echo '<p class="columnwidth" style="margin-left:140px"> 
					
					<span style="font-weight:bold">email</span> : '.$row2->email.'<br />';
					
					}
					
					
			//echo $row->doctor_id.'<br />';
			//echo $row->fee.'<br />';
			echo '<span style="font-weight:bold">speaciality : </span>'.$row->speciality.'<br />';
			echo  '<span style="font-weight:bold">Address : </span>'.$row->address.'</p><br /><br /></div>';
			
			echo'<input type="button" class="submit" value="Book Appointment"
			 style="width:160px; margin-left:300px;" 
			 onclick="book('.$row->doctor_id.')"/>';
			 
		
			echo "</div>"; 
			
		}
?>

    </p>
    
    </div><!-- END container_12 -->
</div><!-- END GREYSTRIPE -->

</div>

