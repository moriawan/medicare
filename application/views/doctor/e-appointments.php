<div id="wrapper">

<div class="container_12">

  <!-- begin .grid_4 - IMAGE -->
   
 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 <thead>
                    <tr>
                    
                    <th>#</th>
                    <th>TID</th>
                    <th>comment</th>
                    <th>patient id</th>
                    <th>Status</th>
                    </tr>
                    
 </thead>
 
 
<tbody>
<?php

$j=1;

	foreach($eAppointments as $app){
		
	//	echo "<a href='".base_url()."index.php/patient/appointment/".$app['transaction_id'];
		
		echo "<tr onclick='goTo_eAppointment(".$app['transaction_id'].")'>";
		
		echo "<td>".$j++."</td>";
		echo "<td>".$app['transaction_id']."</td>";
		echo "<td>".$app['comment']."</td>";
		echo "<td>".$app['patient_id']."</td>";
		echo "<td>".$app['status']."</td>";
		
		
		
		echo "</tr>";
	//	echo "</a>";
	}
?>

</tbody>
 

</table>
      
      
      
      
      
      
      
      
      
      
      

        
        
        
        
</div>

</div>