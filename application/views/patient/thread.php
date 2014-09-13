<div id="wrapper">

<div class="container_12" style="width:700px !important;">

  <!-- begin .grid_4 - IMAGE -->




<?php

	
		
	$flag = 1;
	$output = "";
	
	//echo $user_1." ".$user_2."<br />";
	
	if($user_2 == 1 )
		$oname =  $this->message_model->getDoctorName($to);
	else if($user_2 == 2)
		$oname =  $this->message_model->getPatientName($to);
	
	//echo $from." ".$to;
	
	echo "<div class='message_title'>".$oname[0]['fname']." ".$oname[0]['lname']." - messages</div><br />";
	
	/*				
	if(sizeof($oname) == 1)
			{}
	else
	  {
			  $oname =  $this->message_model->getPatientName($app['from_doctor']);
	  }
			
	  echo "";
		
			*/  
	
	
	foreach($messages as $app){

	
		
	//	echo "<a href='".base_url()."index.php/patient/appointment/".$app['transaction_id'];
		
		
		if($app['from_doctor'] == $uid)
			$output.= "<div class='message_me'>";
		else {
	
			$output.= "<div class='message_you'>";;
			
		}
		
		
		
		//$oname =  $this->message_model->getDoctorName($app['from_doctor']);
		
		//echo "<span>".$oname[0]['fname']." ".$oname[0]['lname']."</span>";
		
		//$oname =  $this->message_model->getDoctorName($app['to_doctor']);
		
		//echo "<span>".$oname[0]['fname']." ".$oname[0]['lname']."</span>";
	
		//echo "<td>".$app['to_doctor']."</td>";

		$output.= "<span>".$app['message']."</span>";

		//echo "<span>".substr($app['checked'],0,10)."</span>";

		

		$output.=  "</div><br /><br /><br />";

//	echo "</a>";

	}

echo $output;

?>




<br />
<br />
<br />
<br />

<textarea id="message_text" style="min-width:700px; max-width:700px; min-height:100px"></textarea>
  
<input type="submit" onclick="processMessage(<?php echo $from.",".$to.",".$user_1.",".$user_2; ?>)" />
      

        

</div>



</div>