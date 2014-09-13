<div id="wrapper">

<div class="container_12">

  <!-- begin .grid_4 - IMAGE -->
   
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <thead>
                    <tr>
                    
                    <th>TID</th>
                    <th>date</th>
                    <th>problem</th>
                    <th>Doctor name</th>
                    <th>Status</th>
                    </tr>
                    
 </thead>
 
 
<tbody>
<?php


	foreach($apps as $app){
		
	//	echo "<a href='".base_url()."index.php/patient/appointment/".$app['transaction_id'];
		
		echo "<tr onclick='goTo(".$app['transaction_id'].")'>";
		
		echo "<td>".$app['transaction_id']."</td>";
		echo "<td>".substr($app['appointment_time'],0,10)."</td>";
		echo "<td>".$app['problem']."</td>";
		echo "<td>".$app['doctor']["fname"]." ".$app['doctor']["lname"]."</td>";
		echo "<td>".$app['transaction_status']."</td>";
		
		
		
		echo "</tr>";
	//	echo "</a>";
	}
?>

</tbody>
 

</table>
      
      
      
      
      
      
      
      
      
      
      

        
        
        
        
</div>

</div>