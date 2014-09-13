<script type="text/javascript" >

function open_profile(id)
{
	var url = <?php echo "'".base_url()."index.php/profile/index/"."'" ; ?> ;
	url = url + id ;
	//alert(url) ;
	window.location = url ;
	
}


</script>


<div id="wrapper">
<!-- BEGIN GREYSTRIPE -->
<div id="greyStripe" style="position:relative; top:-20px;">
    <!-- BEGIN container_12 -->
    <div class="container_12" style="background:rgba(255,255,255,1); padding:10px;">
      <br />
    <h1>Pending Requests </h1>
    
    <p>

<?php

$i=0;
if(sizeof($Requests)>0)
foreach ($Requests as $row)
		{
			
			echo '<div class="search grid_10 result_item" >';
		//	$result2[]=$this->search_model->getName($row->doctor_id);
			
					echo '<div style=" margin-top:10px  ;">
					<div style="float:left">
					
					
					<h4 class="columnwidth name" style="margin-left:20px; margin-top:0px; font-size:14px"><span style="color:#909090 ; font-weight:bold">Patient Name :  </span> '.$row['fname'].' '.$row['lname'].'<span style=" margin-left:20px ; color:#909090 ; font-weight:bold">Mobile No :  </span> '.$row['mobile'].'</h4>
					<h4 class="columnwidth name" style="margin-left:20px; margin-top:0px; font-size:14px"><span style="color:#909090 ; font-weight:bold">Patient Id :  </span> '.$row['patient_id'].'<span style=" margin-left:20px ; color:#909090 ; font-weight:bold">Email Id :  </span> '.$row['email'].'</h4>
					
					</div>
					
					<div style="float:right">
					<input type="button" align="right" class="submit" value="Request Pending"
					 style="width:140px; margin-right:50px ;" 
					 />
					 </div>
					 
					 
					 

					 
					 ';
					/*echo '
					<div style="float:none" >
					<p class="columnwidth" style="margin-left:20px"> 
					<span style="font-weight:bold;font-size:16px"> Description </span> : '.$row->description.'<br />';
					
					echo '<span style="font-weight:bold">Coversations : </span>'.$row->countConversations.' &nbsp; ';
					echo  '<span style="font-weight:bold">Posts : </span>'.$row->countPosts.'</p></div>';
					
					*/
					
					echo'</div>';
					 
					echo "</div>"; 
			
		}
?>

    </p>
    
    </div><!-- END container_12 -->
    
     
    <div class="container_12" style="background:rgba(255,255,255,1); padding:10px;">
      <br />
    <h1>Allowed </h1>
    
    <p>

<?php

$i=0;
if(sizeof($Allowed)>0)
foreach ($Allowed as $row)
		{
			
			echo '<div class="search grid_10 result_item" >';
		//	$result2[]=$this->search_model->getName($row->doctor_id);
			
					echo '<div style=" margin-top:10px  ;">
					<div style="float:left">
					
					
					<h4 class="columnwidth name" style="margin-left:20px; margin-top:0px; font-size:14px"><span style="color:#909090 ; font-weight:bold">Patient Name :  </span> '.$row['fname'].' '.$row['lname'].'<span style=" margin-left:20px ; color:#909090 ; font-weight:bold">Mobile No :  </span> '.$row['mobile'].'</h4>
					<h4 class="columnwidth name" style="margin-left:20px; margin-top:0px; font-size:14px"><span style="color:#909090 ; font-weight:bold">Patient Id :  </span> '.$row['patient_id'].'<span style=" margin-left:20px ; color:#909090 ; font-weight:bold">Email Id :  </span> '.$row['email'].'</h4>
					
					</div>
					
					<div style="float:right">
					<input type="button" align="right" class="submit" value="Access Profile" onclick="open_profile('.$row['patient_id'].')"
					 style="width:140px; margin-right:50px ;" 
					 />
					 </div>
					 
					 
					 

					 
					 ';
					/*echo '
					<div style="float:none" >
					<p class="columnwidth" style="margin-left:20px"> 
					<span style="font-weight:bold;font-size:16px"> Description </span> : '.$row->description.'<br />';
					
					echo '<span style="font-weight:bold">Coversations : </span>'.$row->countConversations.' &nbsp; ';
					echo  '<span style="font-weight:bold">Posts : </span>'.$row->countPosts.'</p></div>';
					
					*/
					
					echo'</div>';
					 
					echo "</div>"; 
			
		}
?>

    </p>
    
    </div><!-- END container_12 -->
    
    
    

    
    
    
    
</div><!-- END GREYSTRIPE -->

</div>

