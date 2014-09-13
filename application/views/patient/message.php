

<div id="wrapper-patient">


<div class="container_12">

  <!-- begin .grid_4 - IMAGE -->
    <div class="grid_3">
        <img src="<?php echo base_url(); ?>/images/profile/<?php 
		$DP = $uid;
		echo "DP-Patient-$DP".".jpg"; ?>" alt="" width="100%" />
      
      <div class="formBox" id="formBox1">
             
            
               </div>
      
        	<p class="columnWidth"><a href="<?php echo base_url()."index.php/patient/edit_profile"?>" class="docname">Edit Profile</a></p>
           <ul class="genList">
             <li><a class="links" href="<?php echo base_url()."index.php/groups"; ?>" style="padding-left: 0px; ">Groups</a></li>
            <li><a class="links" href="<?php echo base_url()."index.php/message"?>" style="padding-left: 0px; ">Messages</a></li>
        </ul>
     
      </div><!-- end .grid_4 -->
    
    
    
   
 <div id="patient-landing-panel-right" class="grid_8">  
   
    

<div id="patient-tab-nav" style="font-weight:bold;"> 
<span>
Quick Book
</span>
<span>
Subscriptions
</span>
<span>
Lab Reports
</span>
<span>
Appointments
</span>
<span>
Permissions
</span>
</div>		

<br />
<br />


<span>Recieved Messages</span>
<br />
<br />


<div id="recieved">
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
		
		
		/*if($app['to_doctor'] == $uid && $app['user_2'] == 2)
			echo "<tr onclick='goToMessage(".$app['to_doctor'].",".$app['from_doctor'].",".$app['user_1'].")'>";
		else if($app['from_doctor'] == $uid && $app['user_1'] == 2)
			echo "<tr onclick='goToMessage(".$app['from_doctor'].",".$app['to_doctor'].",".$app['user_2'].")'>";
		*/
		if($app['to_doctor'] == $uid && $app['user_2'] == 2)
			echo "<tr onclick='goToMessage(".$app['to_doctor'].",".$app['from_doctor'].",".$app['user_1'].")'>";
		else continue;
		
		
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

<br />
<br />

<span>Sent Messages</span>
<br />
<br />

<div id="sent">
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
		
		
		if($app['to_doctor'] == $uid && $app['user_2'] == 2)
			continue;
		else if($app['from_doctor'] == $uid && $app['user_1'] == 2)
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



</div>