<div id="wrapper">
<!-- BEGIN GREYSTRIPE -->
<div class="container_12" style="padding-top:10px; background:#eee; border-radius:8px;">

<div class="grid_6" style="border-right:solid; border-color:#ccc">

<p class="columnWidth" style="line-height:40px; font-size:16px; background:none">

<img src="<?php echo base_url(); ?>/images/profile/<?php 
		$DP="1";
		echo "DP-$DP".".jpg"; ?>" alt="" style="float:left; width:150px; margin-right:20px;" />
        
        <span class="boldtext">Patient name </span>: <?php echo $patient['fname']." ".$patient['lname'] ; ?> <br>
		 <span class="boldtext">Age </span>: <?php echo $patient['age'] ; ?>
        <br />
		 <span class="boldtext">Blood Type </span>: <?php echo $patient['blood_type'] ; ?>
        <br />
		 <span class="boldtext">Martial Status </span>: <?php echo $patient['martial_status'] ; ?>
        <br />
		 <span class="boldtext">Mobile Number </span>: <?php echo $patient['mobile'] ; ?>
      
      
      
  </p>    
</div>


<div class="grid_6" style="line-height:40px; ">

    <p class="columnWidth" style="line-height:40px; font-size:16px; background:none">
    
         <span class="boldtext"> Special Condition </span>: <?php echo $patient['special_condition'] ; ?>
          <br />
         <span class="boldtext"> Chronic Illness </span>: <?php echo $patient['chronic_illness'] ; ?>
          <br />
         <span class="boldtext"> Other Condition </span>: <?php echo $patient['other_condition'] ; ?>
         <br />
         <span class="boldtext"> Other Condition </span>: <?php echo $patient['other_condition1'] ; ?>
         <br />
         <span class="boldtext"> Email </span>: <?php echo $patient['email'] ; ?>
         <br />


    </p>

</div>

</div>


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

