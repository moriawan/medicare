<div id="wrapper">

<div class="container_12" style="padding:10px;">

<div class="grid_6" style="border-right:solid; border-color:#999 ">

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


<div class="grid_6">

<p class="columnWidth" style="width:65%; text-align:center; font-weight:bold; font-size:16px;">Start the Diagnosis</p>



<input id="symptoms" name="symptoms" class="field required half" placeholder="Symptoms" type="text" />

<input id="problem" name="problem" class="field required half"  placeholder="Problem" type="text" />

<input id="diagnosis" name="diagnosis" class="field required half"  placeholder="diagnosis" type="text" />

<br />
<br />
<br />

</div>


<label for="BP" class="lbl columnWidth" style="text-align:center; font-weight:bold; font-size:16px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Clinic tests&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </label>
<br />
<input id="BP" name="BP" class="field required half" placeholder="BP 1" type="text" style="width:120px" />

<input id="BP" name="BP" class="field required half"  placeholder="BP 2" type="text" style="width:120px" />

<input id="heart_beat" name="heart_beat" class="field required half"  placeholder="Heart Beat" type="text" style="width:120px"/>

<input id="temperature" name="temperature" class="field required half"  placeholder="Temperature" type="text" style="width:120px"/>

<input id="extra1" name="extra1" class="field  half"  placeholder="" type="text" />

<input id="extra2" name="extra2" class="field  half"  placeholder="" type="text" />

<input id="extra3" name="extra1" class="field  half"  placeholder="" type="text" />


<div class="grid_12" style="">


<label for="medication1">Medications</label><br />
<input id="medication1" name="medication1" class="field half" placeholder="" type="text" />
<label>M</label><input type="checkbox" class="check "  />
<label>A</label><input type="checkbox" class="check "  />
<label>E</label><input type="checkbox" class="check "  />
<label>N</label><input type="checkbox" class="check "  />

<input id="instruction1" name="instruction1" class="field half" placeholder="special instruction" type="text" />
<input id="medication1" name="medication1" class="field half" placeholder="" type="text" />
<label>M</label><input type="checkbox" class="check "  />
<label>A</label><input type="checkbox" class="check "  />
<label>E</label><input type="checkbox" class="check "  />
<label>N</label><input type="checkbox" class="check "  />
<input id="instruction1" name="instruction1" class="field half" placeholder="special instruction" type="text" />


<input id="medication1" name="medication1" class="field half" placeholder="" type="text" />
<label>M</label><input type="checkbox" class="check "  />
<label>A</label><input type="checkbox" class="check "  />
<label>E</label><input type="checkbox" class="check "  />
<label>N</label><input type="checkbox" class="check "  />

<input id="instruction1" name="instruction1" class="field half" placeholder="special instruction" type="text" />
<input id="medication1" name="medication1" class="field half" placeholder="" type="text" />
<label>M</label><input type="checkbox" class="check "  />
<label>A</label><input type="checkbox" class="check "  />
<label>E</label><input type="checkbox" class="check "  />
<label>N</label><input type="checkbox" class="check "  />
<input id="instruction1" name="instruction1" class="field half" placeholder="special instruction" type="text" />


<br />


<input type="submit" id="submit" value="Submit Diagnosis" />
                </div>
              
                
            </form>
           
</div>


</div>
</div>