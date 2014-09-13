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

<div class="clear grid_12" style="height:50px;"></div>

<div class="grid_12">


<div class="grid_6" style="width:450px">

<p class="columnWidth" style="width:100%; text-align:center; font-weight:bold; font-size:16px;">Diagnosis Report</p>

<br />

<p>
<span style="font-weight:bold; font-size:13px;">
Problem : 
</span> 
<?php
if(isset($problem)){
	echo $problem;
}
?>
</p>
<p>
<span style="font-weight:bold; font-size:13px;">
Symptoms : 
</span> 
<?php
if(isset($symptoms)){
	echo $symptoms;
}
?>
</p>
<p>
<span style="font-weight:bold; font-size:13px;">
Diagnosis : 
</span> 
<?php
if(isset($diagnosis)){
	echo $diagnosis;
}
?>
</p>

<br />
<br />
<br />

</div>

<div class="grid_6" style="width:430px;">

<p class="columnWidth" style="width:100%; text-align:center; font-weight:bold; font-size:16px;">Clinic tests</p>

<br />


<p>
<span style="font-weight:bold; font-size:13px;">
Blood Pressure 
</span> 
<?php
if(isset($blood_presure)){
	echo $blood_presure;
}
?>
</p>

<p>
<span style="font-weight:bold; font-size:13px;">
Heart Beat
</span> 
<?php
if(isset($heart_beat)){
	echo $heart_beat;
}
?>
</p>

<p>
<span style="font-weight:bold; font-size:13px;">
Temperature
</span> 
<?php
if(isset($diagnosis)){
	echo $diagnosis;
}
?>
</p>

<p>
<span style="font-weight:bold; font-size:13px;">
Other
</span> 
<?php
if(isset($other)){
	echo $other;
}
?>
</p>

</div>


<div class="grid_12" style="">

<br />
<br />
<?php 
$medication = explode(';', $medication);
$medication_special = explode(';', $medication_special);
$medication_time =  explode(';', $medication_time);

$size = sizeof($medication);
for ($i=0 ; $i <  $size ; $i++ ){

echo '<p>
<span style="font-weight:bold;  font-size:13px; float:left ;  ">';
echo "Medication ".($i+1)."</span><span style='min-width:200px ;float:left ; margin-left:20px'>" ; 
echo " ".$medication[$i].'</span><span style="font-weight:bold; font-size:13px; float:left ;"> Schedule </span>: <span style="min-width:100px ;float:left ; margin-left:20px">';
echo " ".$medication_time[$i].'</span><span style="font-weight:bold; font-size:13px;"> Special Instruction :  </span>';echo $medication_special[$i] ; 
echo "</p>" ;
}
?>



<br />
<br />
<p>
<span style="font-weight:bold;  font-size:13px; float:left ;  ">Special Recommendation : </span> <?php echo $recommendation ; ?>
</p>

<br />
<br />


<a href='<?php echo base_url()."reports/generate/".$diagnosis_id; ?>' >
<input type="submit" id="submit" value="Print Report" style="width:200px" />
</a>
                </div>
              
              
           
</div>


</div>
</div>