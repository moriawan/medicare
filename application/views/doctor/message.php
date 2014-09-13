<div id="wrapper">

<div class="container_12">

  <!-- begin .grid_4 - IMAGE -->



<table width="100%" border="0" cellspacing="0" cellpadding="0">

 <thead>

                    <tr>

                    <th>#</th>

                    <th>from</th>

                    <th>comment</th>

                    <th>checked</th>

                    </tr>

                    

 </thead>

 

 

<tbody>

<?php




	$j = 1;

	foreach($messages as $app){

		
	//	echo "<a href='".base_url()."index.php/patient/appointment/".$app['transaction_id'];
		
		if($app['to_doctor'] == $uid && $app['user_2'] == 1)
			echo "<tr onclick='goToMessage(".$app['to_doctor'].",".$app['from_doctor'].",".$app['user_1'].")'>";
		else if($app['from_doctor'] == $uid && $app['user_1'] == 1)
			echo "<tr onclick='goToMessage(".$app['from_doctor'].",".$app['to_doctor'].",".$app['user_2'].")'>";
		
		
		//echo "<td>".$name[0]['fname']." ".$name[0]['lname']."</td>";
		
		echo "<td>".$j++." | ".$app['user_2']."</td>";

		$oname =  $this->message_model->getDoctorName($app['from_doctor']);
		
		//echo $app['from_doctor'];
		
		if(sizeof($oname) == 1)
			echo "<td>".$oname[0]['fname']." ".$oname[0]['lname']."</td>";
		else
			{
					$oname =  $this->message_model->getPatientName($app['from_doctor']);
					echo "<td>".$oname[0]['fname']." ".$oname[0]['lname']."</td>";
			}
		//echo "<td>".$app['to_doctor']."</td>";

		echo "<td>".$app['message']."</td>";

		echo "<td>".substr($app['checked'],0,10)."</td>";

		

		echo "</tr>";

	//	echo "</a>";

	}

?>



</tbody>

 



</table>

      

        

        

</div>



</div>