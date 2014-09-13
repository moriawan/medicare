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
echo form_open('doctor/complete_appointment', $attributes) 
?>


<div class="grid_6" style="width:450px">

<p class="columnWidth" style="width:100%; text-align:center; font-weight:bold; font-size:16px;">Start the Diagnosis</p>

<br />


<input id="symptoms" name="symptoms" class="field required full_12" placeholder="Symptoms" type="text" />
<br />
<input id="problem" name="problem" class="field required full_12"  placeholder="Problem" type="text" />
<br />
<input id="diagnosis" name="diagnosis" class="field required full_12"  placeholder="diagnosis" type="text" />

<br />
<br />
<br />

</div>

<div class="grid_6" style="width:430px;">

<p class="columnWidth" style="width:100%; text-align:center; font-weight:bold; font-size:16px;">Clinic tests</p>

<br />


<input id="BP" name="blood_presure" class="field required half_12"  placeholder="Blood Pressure" type="text" value=""  />

<input id="heart_beat" name="heart_beat" class="field required half_12"  placeholder="Heart Beat" type="text" value="" />

<input id="temperature" name="temperature" class="field required half_12"  placeholder="Temperature" type="text" value="" />

<input id="other" name="other" class="field  full_12"  placeholder="" type="text" value="" />

<input id="other2" name="other2" class="field  full_12"  placeholder="" type="text" value="" />

<input id="other3" name="other1" class="field  full_12"  placeholder="" type="text" />

</div>


<div class="grid_12" style="">

<br />
<br />

<input type="hidden" name="medication" id="medication" />
<input type="hidden" name="medication_time" id="medication_time"  />
<input type="hidden" name="medication_special" id="medication_special"  />
<input type="hidden" name="trans" value="<?php echo $trans ; ?>"  />
<label for="medication1" style="font-weight:bold">Medications</label><br />



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

<input id="recommendation" name="recommendation" class="field" placeholder="special recommendation" type="text" style="width:870px; padding-left:20px;" />
<br />
<br />

<input type="submit" id="submit" value="Submit Diagnosis" style="width:200px" onclick="prepare_data()" />
                </div>
              
                
            </form>
           
</div>
<script type="text/javascript" >
//alert() ;
function prepare_data(){
			
			
			var medication = "" ;
			//alert("Call") ;
			for(var i = 1; i<=4 ; i++ ){
				if(i==1)
				medication =  medication + document.getElementById("medication"+i).value  ;
				else
				medication =   medication + ";"+ document.getElementById("medication"+i).value  ;
				//alert(i+medication) ;
			}	
			
			document.getElementById("medication").value = medication ;
			
			//alert("medication") ;
			
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
			//alert(medication_time);
			document.getElementById("medication_time").value = medication_time ;
			
			var medication_special = "" ;
			for(var i = 1; i<=4 ; i++ ){
				if(i==1)
				medication_special =  medication_special + document.getElementById("instruction"+i).value  ;
				else
				medication_special =  medication_special + ";" + document.getElementById("instruction"+i).value  ;
			}	
			//alert(medication_special) ;
			document.getElementById("medication_special").value = medication_special ;
			
		}
		
	
</script>

</div>
</div>