<div id="wrapper">

<div class="container_12" style="padding:0px;">

<div class="container_12" style="padding-top:10px; background:#eee; border-radius:8px;">

<div class="grid_6" style="border-right:solid; border-color:#ccc">

<p class="columnWidth" style="line-height:40px; font-size:16px; background:none">

<img src="<?php echo base_url(); ?>/images/profile/<?php 
		$DP="1";
		echo "DP-$DP".".jpg"; ?>" alt="" style="float:left; width:150px; margin-right:20px;" />
        
        <span class="boldtext">Patient name </span>: Aman Verma<br>
		 <span class="boldtext">Age </span>: 20
        <br />
		 <span class="boldtext">Sex </span>: male
        <br />
		 <span class="boldtext">Family History </span>: xxxxxxxx
        <br />
		 <span class="boldtext">Post Doctor Visit </span>: xxxxxxxx
      
      
      
  </p>    
</div>


<div class="grid_6" style="line-height:40px; ">

    <p class="columnWidth" style="line-height:40px; font-size:16px; background:none">
    
         <span class="boldtext"> Allergies </span>: none
          <br />
         <span class="boldtext"> Present Disease </span>: xxxxxxxx
          <br />
         <span class="boldtext"> Last Test date </span>: xxxxxxxx
         <br />


    </p>

</div>

</div>
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


<div class="clear grid_12" style="height:50px;"></div>

<div class="grid_12">
<?php
$attributes = array('id' => 'form_diagnosis');
echo form_open('register/patient_welcome', $attributes) 
?>


<div class="grid_6" style="width:450px">

<p class="columnWidth" style="width:100%; text-align:center; font-weight:bold; font-size:16px;">Start the Diagnosis</p>

<br />


<input id="symptoms" name="symptoms" class="field required full_12" placeholder="Symptoms" type="text" />

<input id="problem" name="problem" class="field required full_12"  placeholder="Problem" type="text" />

<input id="diagnosis" name="diagnosis" class="field required full_12"  placeholder="diagnosis" type="text" />

<br />
<br />
<br />

</div>

<div class="grid_6" style="width:430px;">

<p class="columnWidth" style="width:100%; text-align:center; font-weight:bold; font-size:16px;">Clinic tests</p>

<br />

<input id="BP" name="BP" class="field required half_12" placeholder="BP 1" type="text" s/>

<input id="BP" name="BP" class="field required half_12"  placeholder="BP 2" type="text"  />

<input id="heart_beat" name="heart_beat" class="field required half_12"  placeholder="Heart Beat" type="text" />

<input id="temperature" name="temperature" class="field required half_12"  placeholder="Temperature" type="text" />

<input id="extra1" name="extra1" class="field  full_12"  placeholder="" type="text" />

<input id="extra2" name="extra2" class="field  full_12"  placeholder="" type="text" />

<input id="extra3" name="extra1" class="field  full_12"  placeholder="" type="text" />

</div>


<div class="grid_12" style="">

<br />
<br />



<label for="medication1" style="font-weight:bold">Medications</label><br />



<input id="medication1" name="medication1" class="field half" placeholder="" type="text"  />
<label>M</label><input type="checkbox" class="check "  />
<label>A</label><input type="checkbox" class="check "  />
<label>E</label><input type="checkbox" class="check "  />
<label>N</label><input type="checkbox" class="check "  />
<input id="instruction1" name="instruction1" class="field half" placeholder="special instruction" type="text" style="margin-left:80px;" />

<input id="medication1" name="medication1" class="field half" placeholder="" type="text"  />
<label>M</label><input type="checkbox" class="check "  />
<label>A</label><input type="checkbox" class="check "  />
<label>E</label><input type="checkbox" class="check "  />
<label>N</label><input type="checkbox" class="check "  />
<input id="instruction1" name="instruction1" class="field half" placeholder="special instruction" type="text" style="margin-left:80px;" />

<input id="medication1" name="medication1" class="field half" placeholder="" type="text"  />
<label>M</label><input type="checkbox" class="check "  />
<label>A</label><input type="checkbox" class="check "  />
<label>E</label><input type="checkbox" class="check "  />
<label>N</label><input type="checkbox" class="check "  />
<input id="instruction1" name="instruction1" class="field half" placeholder="special instruction" type="text" style="margin-left:80px;" />

<input id="medication1" name="medication1" class="field half" placeholder="" type="text"  />
<label>M</label><input type="checkbox" class="check "  />
<label>A</label><input type="checkbox" class="check "  />
<label>E</label><input type="checkbox" class="check "  />
<label>N</label><input type="checkbox" class="check "  />
<input id="instruction1" name="instruction1" class="field half" placeholder="special instruction" type="text" style="margin-left:80px;" />

<br />
<br />
<br />

<input id="recommendation" name="recommendation" class="field" placeholder="special recommendation" type="text" style="width:870px; padding-left:20px;" />
<br />
<br />

<input type="submit" id="submit" value="Submit Diagnosis" style="width:200px" />
                </div>
              
                
            </form>
           
</div>


</div>
</div>