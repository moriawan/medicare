<div id="wrapper">

<div class="container_12" style="padding:0px;">

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



<br />
<br />



<table width="100%" style=" border-spacing:2px; border-collapse:separate">
<thead>

<?php

echo '<th style="width:150px">#'.$transaction['diagnosis_id'];
echo "</th><th colspan='5'> Problem : ".$transaction['problem']."</th>";

?>

</thead>

<tbody>

<tr style="width:100%">
<td style="font-weight:bold">Symptoms</td>
<td colspan='5'>
<?php 
echo $transaction['symptoms'];
?>
</td>
</tr>


<tr>
<td style="font-weight:bold">Diaganosis</td>
<td colspan='5'>
<?php 
echo $transaction['diagnosis'];
?>
</td>
</tr>

<tr>

<td style="font-weight:bold">Blood pressure</td>
<td>
<?php 
echo $transaction['blood_presure'];
?>
</td>


<td style="font-weight:bold">Heart beat</td>
<td>
<?php 
echo $transaction['heart_beat'];
?>
</td>


<td style="font-weight:bold">Temperature</td>
<td>
<?php 
echo $transaction['temperature'];
?>
</td>

</tr>

<tr>
<td  colspan="6"></td>
</tr>




<?php 

$medication = explode(";" , $transaction['medication']);
$medicationSpecial = explode(";" , $transaction['medication_special']);
$medicationTime = explode(";" , $transaction['medication_time']);


$i=0;$j=0;


foreach ($medication as $med ){
	 
	 if(strlen($med)<1){continue;}
			
	 echo "	<tr>
			  <td style='font-weight:bold'>Medication ".($j+1)."</td>
			  <td colspan='4'>
	 
	 ".$med;
	 
	 if(strlen($medicationSpecial[$i])>1)
		   echo "&nbsp; - &nbsp;".$medicationSpecial[$i++];
	 
	 echo "  </td>";
	 
	 
	 echo "<td>".$medicationTime[$j++]."
		  </td></tr>
		  ";
	 }
?>


<tr>
<td style="font-weight:bold; text-align:center" colspan="6"></td>
</tr>



<tr>

<td style="font-weight:bold">Recommendation</td>
<td colspan="5">
<?php 

if(strlen($transaction['recommendation'])>1)
	echo $transaction['recommendation'];
else echo "none";
?>
</td>
</tr>


</tbody>

</table>



<!--
<div class="clear grid_12" style="height:100px;"></div>

<div class="grid_6">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr><th colspan="4" align="center">Appointment History</th></tr>
                    </thead>  
                   <tr><td>25-05-12</td><td>Dr Kumar</td><td>Heart Burn</td><td>view send</td></tr>
                    <tr><td>25-05-12</td><td>Dr Kumar</td><td>Heart Burn</td><td>view send</td></tr>
                    <tr><td>25-05-12</td><td>Dr Kumar</td><td>Heart Burn</td><td>view send</td></tr>
                    <tr><td>25-05-12</td><td>Dr Kumar</td><td>Heart Burn</td><td>view send</td></tr>
                   <tr><td></td><td></td><td></td><td></td></tr>    
                 

 </table>
</div>

<div class="grid_6">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <thead>
                    <tr><th colspan="4" align="center">Medical History</th></tr>
                    </thead>
                   <tr><td>25-05-2012</td><td>Dr Sharma</td><td>CT Scan</td><td>view send</td></tr>    
                   <tr><td>25-05-2012</td><td>Dr Sharma</td><td>CT Scan</td><td>view send</td></tr>    
                   <tr><td>25-05-2012</td><td>Dr Sharma</td><td>CT Scan</td><td>view send</td></tr>    
                   <tr><td>25-05-2012</td><td>Dr Sharma</td><td>CT Scan</td><td>view send</td></tr>    
                   <tr><td></td><td></td><td></td><td></td></tr>

 </table>
</div>
-->


<div class="clear grid_12" style="height:50px;"></div>

<div class="grid_12">
<?php
$attributes = array('id' => 'form_diagnosis');
echo form_open('doctor/complete_eAppointment/'.$tid , $attributes) 
?>




<div class="grid_12" style="">

<p class="columnWidth" style="width:100%; text-align:center; font-weight:bold; font-size:16px;">Medications</p>

<br />




<input id="medication1" name="medication1" class="field half"  placeholder="" type="text"  />
<label>M</label><input type="checkbox" class="check " name="1M"  id="1M"  />
<label>A</label><input type="checkbox" class="check " name="1A"  id="1A"  />
<label>E</label><input type="checkbox" class="check " name="1E"  id="1E" />
<label>N</label><input type="checkbox" class="check " name="1N"  id="1N" />
<input id="instruction1" name="instruction1" class="field half" placeholder="special instruction" type="text" style="margin-left:80px;" />

<input id="medication2" name="medication2" class="field half" placeholder="" type="text"  />
<label>M</label><input type="checkbox" class="check " name="2M" id="2M" />
<label>A</label><input type="checkbox" class="check " name="2A" id="2A" />
<label>E</label><input type="checkbox" class="check " name="2E" id="2E"/>
<label>N</label><input type="checkbox" class="check " name="2N" id="2N"/>
<input id="instruction2" name="instruction2" class="field half" placeholder="special instruction" type="text" style="margin-left:80px;" />

<input id="medication3" name="medication3" class="field half" placeholder="" type="text"  />
<label>M</label><input type="checkbox" class="check " name="3M" id="3M"  />
<label>A</label><input type="checkbox" class="check " name="3A" id="3A"  />
<label>E</label><input type="checkbox" class="check " name="3E" id="3E" />
<label>N</label><input type="checkbox" class="check " name="3N" id="3N" />
<input id="instruction3" name="instruction3" class="field half" placeholder="special instruction" type="text" style="margin-left:80px;" />

<input id="medication4" name="medication4" class="field half" placeholder="" type="text"  />
<label>M</label><input type="checkbox" class="check " name="4M" id="4M"  />
<label>A</label><input type="checkbox" class="check " name="4A" id="4A"  />
<label>E</label><input type="checkbox" class="check " name="4E" id="4E" />
<label>N</label><input type="checkbox" class="check " name="4N" id="4N" />
<input id="instruction4" name="instruction4" class="field half" placeholder="special instruction" type="text" style="margin-left:80px;" />

<br />
<br />
<br />

<input id="comments" name="comments" class="field" placeholder="Instructions and comment" type="text" style="width:870px; padding-left:20px;" />
<br />
<br />

<center>
<input type="submit" id="submit" value="Submit Diagnosis" style="width:200px" onclick="prepare_data()" />
</center>

                </div>
              
                
            </form>
           
</div>
<script type="text/javascript" >
//alert() ;
function prepare_data(){
			
			
			var medication = "" ;
			alert("Call") ;
			for(var i = 1; i<=4 ; i++ ){
				if(i==1)
				medication =  medication + document.getElementById("medication"+i).value  ;
				else
				medication =   medication + ";"+ document.getElementById("medication"+i).value  ;
				alert(i+medication) ;
			}	
			
			document.getElementById("medication").value = medication ;
			
			alert("medication") ;
			
			var medication_time = "" ;
			
			for(var i = 1; i<=4 ; i++ ){
				
				if(i==1){
					
					
					if(document.getElementById(1+"M").checked)
						medication_time += "M" ; 
					else 
						medication_time += "-" ; 
					if(document.getElementById(1+"A").checked)
						medication_time += "A" ; 
					else 
						medication_time += "-" ; 
					
					if(document.getElementById(1+"E").checked)
						medication_time += "E" ; 
					else 
						medication_time += "-" ; 
					
					if(document.getElementById(1+"N").checked)
						medication_time += "N" ; 
					else 
						medication_time += "-" ; 
					
				}
				else
				{
					medication_time += ";" ;
					
						if(document.getElementById(i+"M").checked)
						medication_time += "M" ; 
					else 
						medication_time += "-" ; 
					if(document.getElementById(i+"A").checked)
						medication_time += "A" ; 
					else 
						medication_time += "-" ; 
					
					if(document.getElementById(i+"E").checked)
						medication_time += "E" ; 
					else 
						medication_time += "-" ; 
					
					if(document.getElementById(i+"N").checked)
						medication_time += "N" ; 
					else 
						medication_time += "-" ; 
					
					
				}
			}
			alert(medication_time);
			document.getElementById("medication_time").value = medication_time ;
			
			var medication_special = "" ;
			for(var i = 1; i<=4 ; i++ ){
				if(i==1)
				medication_special =  medication_special + document.getElementById("instruction"+i).value  ;
				else
				medication_special =  medication_special + ";" + document.getElementById("instruction"+i).value  ;
			}	
			alert(medication_special) ;
			document.getElementById("medication_special").value = medication_special ;
			
		}
		
	
</script>

</div>
</div>