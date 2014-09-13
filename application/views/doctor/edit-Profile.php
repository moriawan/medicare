<?php
/*
function curPageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}*/
?>


<script type="text/javascript" >





var exp = Array() ;

exp['Experiences'] = <?php echo sizeof($experience) ;?> ;

exp['Certification'] = <?php echo sizeof($certifications) ;?> ;

exp['awards'] = <?php echo sizeof($awards) ;?> ;

var divname = Array() ;

divname['Experiences'] = 'professional_experience' ;

divname['Certification'] = 'certifications' ;

divname['awards'] = 'awards_publications' ;



var secScheduleVisibility = <?php 



if($secSchedule==false)

echo '0' ;

else

echo sizeof($secSchedule); ?> ;





function addField(div_id){

	



	var text = document.getElementById(div_id).innerHTML ; 

	

	if(exp[div_id]==0)

	exp[div_id]++ ;

	

	text  += '<input id="'+div_id+exp[div_id]+'" value="" name="subspeciality" class="field required full" placeholder="More" type="text" />' 

	

	exp[div_id]++ ;

	

	document.getElementById(div_id).innerHTML = text ;

	

	

}





function ComputeField(div_id){

	

	

	var text = "" ;

	

	if(exp[div_id]==0)

	{

		text += document.getElementById(div_id+'0').value  ; 

	}

	else

	for (var i=0 ; i < exp[div_id] ; i++ ){

	 

	 	if(i==0)

		text += document.getElementById(div_id+i).value  ; 

		else

		text += ';' + document.getElementById(div_id+i).value  ; 

		

	}

	

	document.getElementById(divname[div_id]).value = text ;

	

	alert(div_id+document.getElementById(divname[div_id]).value) ;

	

	return true ;

	

}









</script>





<div id="wrapper">



<div class="container_12">



  <!-- begin .grid_4 - IMAGE -->

    <div class="grid_3">

        <img src="<?php echo base_url(); ?>/images/profile/<?php 

		$DP = $uid;

		echo "DP-Doc-$DP".".jpg"; ?>" alt="" width="100%" />

      

      <div class="formBox" id="formBox1">

             

            

       <textarea id="advice" name="advice" class="area required" rows="" cols="" placeholder="Share an advice . . . "></textarea> 

               </div>

      

        	<p class="columnWidth"><a href="#" class="docname">Edit Profile</a></p>

           <ul class="genList">

             <li><a class="links" href="#" style="padding-left: 0px; ">Patients</a></li>

            <li><a class="links" href="#" style="padding-left: 0px; ">Messages</a></li>

        </ul>

      <a href="#" class="btn" style="opacity: 1; "><img src="<?php echo base_url(); ?>/images/btn.jpg" alt=""></a>

      </div><!-- end .grid_4 -->

    

    <div class="grid_8">  

  	<?php echo validation_errors();

		if(isset($result))

		  echo $result ; ?>

    <div class="layer1">


	 <p class="heading">Profile Picture</p>

    <div class="content_edit DisplayPic">
    
	<?php 
  		
		
		
		$medicare=base_url()."index.php/doctor/edit_profile";
		
		
		
		$medicare=preg_replace("/\//","-",$medicare);
		
		$medicare=preg_replace("/\?.*/","",$medicare);
		
		$medicare=preg_replace("/\-p[0-9]+/","",$medicare);
		
		

		
		
        $attributes = array('id' => 'form3');
  
        echo form_open_multipart('upload/do_upload/.-images-profile/jpg/DP-Doc-'.$uid.'/'.$medicare); 
  
        ?>

      
	<input type="file" name="userfile" size="20" style="padding-left:50px" />
	<input type="submit" class="submit" />

    </form>
  
    </div>

	<br />

    <p class="heading">Username / Change Password </p>

    <div class="content_edit">

    

	<?php 

		$attributes = array('id' => 'changepass');

		echo form_open('doctor/edit_profile', $attributes);

    ?>



                    <p>Username(Email) : <?php echo $email ; ?>  </p>

                    <p>Old Password<input id="oldpass" name="oldpass" class="field required half" placeholder="Old Password" type="text" /> </p>

                    <p>New Password : <input id="newpass" name="newpass" class="field required half" placeholder="New Password" type="text" /></p>

                    <p>Comfirm Password : <input id="confpass" name="confpass" class="field required half" placeholder="Confirm Password" type="text" /></p>

                    <p align="right"><input type="submit" id="submit" value="Confirm" align="right" /></p>

    </form>

    </div>

    </br>

    <p class="heading_map" >My Location</p>

    <div class="content_edit_map">

	<?php 

		$attributes = array('id' => 'changelocation');

		echo form_open('doctor/edit_profile', $attributes);

    ?>

	<p> State <input width="200px" value="<?php echo $state; ?>" type="text" id="doc_state" class="field required " placeholder="State" name="doc_state" /> City <input id="city" name="doc_city" value="<?php echo $city; ?>" class="field required " placeholder="City" type="text" /> </p>

   <p>

Address : <input id="address" value="<?php echo $address; ?>" name="doc_add" class="field required half" placeholder="Address" type="text" onBlur="codeAddress()" /> 

 <br />

   <br />

   <p>

    <div id="map_canvas" style="width:500px; height:300px ; display:compact;"></div>

    </p>

    <br>

    <input type="hidden" name="latitude" id="latitude"  />

    <input type="hidden" name="longitude" id="longitude"  />

    Land Mark : <input id="landmark" value="<?php echo $landmark; ?>" name="doc_land" class="field required half" placeholder="famous landmark nearby" type="text" />

    </p>

    

    <p align="right"><input type="submit" id="submit" value="Confirm" align="right" /></p>

    </form>

    </div>

    <br />

    <p class="heading">My Qualification</p>

    <div class="content_edit">

	<?php 

		$attributes = array('id' => 'changeprofile');

		echo form_open('doctor/edit_profile', $attributes);

    ?>

    <p>

    <input id="doctor_grad_degree" value="<?php echo $doctor_grad_degree; ?>" name="doctor_grad_degree" class="field required"  placeholder="Graduation Degree" type="text" />

<label for="doctor_grad_year" value="<?php echo $doctor_grad_year; ?>" class="lbl">Graduation year : </label>

<?php echo "<select name='doctor_grad_year' id='doctor_grad_year' ";



$curYear = date('Y');



for($k=1942;$k<$curYear;$k++)

{ 

	if($k==$doctor_grad_year)

	echo "<option selected='selected'>$k</option>" ;

	else

	echo "<option>$k</option>"; 

}

	

echo "</select> "; ?>



<br />



<input id="doctor_grad_college" value="<?php echo $doctor_grad_college; ?>" name="doctor_grad_college" class="field required full"  placeholder="Graduation College" type="text" />



<br>



<br />



<input id="doctor_postgrad_degree" value="<?php echo $doctor_postgrad_degree; ?>" name="doctor_postgrad_degree" class="field required"  placeholder="Post Graduation Degree" type="text" />

<label for="doctor_postgrad_year" class="lbl">Post Graduation year : </label>

<?php echo "<select name='doctor_postgrad_year' id='doctor_postgrad_year' ";



$curYear = date('Y');



for($k=1942;$k<$curYear;$k++)

{ if($k==$doctor_postgrad_year)

	echo "<option selected='selected'>$k</option>" ;

	else

	echo "<option>$k</option>";  }

	

echo "</select> "; ?>



<br />

<br />



<input id="doctor_postgrad_college" value="<?php echo $doctor_postgrad_college; ?>" name="doctor_postgrad_college" class="field required full"  placeholder="Post Graduation College" type="text" />



<br />



<br />



<input id="doctor_supergrad_degree" value="<?php echo $doctor_supergrad_degree; ?>" name="doctor_supergrad_degree" class="field required"  placeholder="Super Graduation Degree" type="text" />

<label for="doctor_supergrad_year" class="lbl">Super Graduation year : </label>

<?php echo "<select name='doctor_supergrad_year' id='doctor_supergrad_year' ";



$curYear = date('Y');



for($k=1942;$k<$curYear;$k++)

{ if($k==$doctor_supergrad_year)

	echo "<option selected='selected'>$k</option>" ;

	else

	echo "<option>$k</option>"; }

	

echo "</select> "; ?>



<br />



<input id="doctor_supergrad_college" value="<?php echo $doctor_supergrad_college; ?>" name="doctor_supergrad_college" class="field required full"  placeholder="Super Graduation College" type="text" />

    </p>

     <p align="right"><input type="submit" id="submit" value="Confirm" align="right" /></p>

    </form>

    

    </div>

    <br />

    <p class="heading">Practice Details</p>

    <div class="content_edit">

	<?php 

		$attributes = array('id' => 'changedocapp');

		echo form_open('doctor/edit_profile', $attributes);

    ?>

    

    <p>

    

    First Name <input id="fname" name="fname" value="<?php echo $fname; ?>" class="field required " placeholder="First Name" type="text" />

Last Name<input id="lname" name="lname" value="<?php echo $lname; ?>" class="field required "  placeholder="Last Name" type="text" />

<br />

	   Consultation Fee : <input id="fee" value="<?php echo $fee; ?>" name="doc_fee" class="field required half" placeholder="Appointment fee in Rupees" type="text"  />

 <br />

Consultation Duration <input id="duration" value="<?php echo $appointment_duration; ?>" name="doc_duration" class="field required half"  placeholder="appointment Duration" type="text" />

<br />

	

    

	<p align="right"><input type="submit" id="submit" value="Confirm" align="right" /></p>

    </form>

    </p>

    </div>

    <br />

    <p class="heading">My Speciality</p>

    <div class="content_edit">

	<?php 

		$attributes = array('id' => 'changespeciality');

		echo form_open('doctor/edit_profile', $attributes);

    ?>

    

    <p>

    

    Speciality : <?php echo $speciality; ?> 

    <br />

    

	 Sub Speciality : <input id="subspeciality" value="<?php echo $subspeciality; ?>" name="subspeciality" class="field required half" placeholder="Sub Speciality " type="text" />



<br />





    </p>

     <p align="right"><input type="submit" id="submit" value="Confirm" align="right" /></p>

    </form>

    

    </div>

    

    <br />

    <p class="heading">Professional Experience</p>

    <div class="content_edit">

	<?php 

		$attributes = array('id' => 'Experience', 'onsubmit' => "return ComputeField('Experiences');");

		echo form_open('doctor/edit_profile', $attributes);

    ?>

    <input type="hidden" id="professional_experience" name="professional_experience" value=""  />

    

    <div id="Experiences">

    <?php

	

	$i=0 ;

	if(sizeof($experience)>0) 

	foreach($experience as $exp ) 

	{

     	echo '<input id="Experiences'.$i.'" value="'.$exp.'"  class="field required full" placeholder="Sub Speciality " type="text" />';

		$i++ ;

	}

	else{

		

		echo '<input id="Experiences0" value=""  class="field required full" placeholder="Professional Experience" type="text" />';

	}

    	

	?>

    </div>

    

     <p align="right"><input type="button" id="submit" value="Add More" align="right" onclick="addField('Experiences')" /><input type="submit" id="submit" value="Confirm" align="right" /></p>

    </form>

    

    </div>

    

    

    <br />

    <p class="heading">Certifications and Memberships</p>

    <div class="content_edit">

	<?php 

		$attributes = array('id' => 'certificate', 'onsubmit' => "return ComputeField('Certification');");

		echo form_open('doctor/edit_profile', $attributes);

    ?>

    <input type="hidden"  id="certifications" name="certifications" value=""  />

    



<br />

<div id="Certification">

    <?php

	

	$i=0 ;

	if(sizeof($certifications)>0) 

	foreach($certifications as $exp ) 

	{

     	echo '<input id="Certification'.$i.'" value="'.$exp.'" class="field required full" placeholder="Awards and Publications " type="text" />';

		$i++ ;

	}

	else{

		

		echo '<input id="Certification0" value="" class="field required full" placeholder="Awards and Publications " type="text" />';

	}

    	

	?>

    </div>

    

     <p align="right"><input type="button" id="submit" value="Add More" align="right" onclick="addField('Certification')" /><input type="submit" id="submit" value="Confirm" align="right" /></p>

    </form>

    

    </div>

    

    <br />

    <p class="heading">Awards and Publications</p>

    <div class="content_edit">

	<?php 

		$attributes = array('id' => 'award', 'onsubmit' => "return ComputeField('awards');");

		echo form_open('doctor/edit_profile', $attributes);

    ?>

    <input type="hidden" id="awards_publications" name="awards_publications" value=""  />

    

   <div id="awards">

    <?php

	

	$i=0 ;

	if(sizeof($awards)>0) 

	foreach($awards as $exp ) 

	{

     	echo '<input id="awards'.$i.'" value="'.$exp.'" class="field required full" placeholder="Awards and Publications " type="text" />';

		$i++ ;

	}

	else{

		

		echo '<input id="awards0" value="" name="awards1" class="field required full" placeholder="Awards and Publications " type="text" />';

	}

    	

	?>

    </div>

    

     <p align="right"><input type="button" id="submit" value="Add More" align="right" onclick="addField('awards')" /><input type="submit" id="submit" value="Confirm" align="right" /></p>

    </form>

    

    </div>

    

    

    

    

    <br />

    <p class="heading">My Schedule </p>

    <div class="content_edit">

	<?php 

		$attributes = array('id' => 'changePrimarySchedule' , 'onsubmit' => 'compute_slots(1)');

		echo form_open('doctor/edit_profile', $attributes);

    ?>

    

    <p>

    

    

<label for="no_of_slots" style="margin-right:20px" >No of slots</label>



<select name="no_of_sessions" style="border-radius:4px; opacity:0.8; width:60px;" onchange="editform(this.value)">

<?php



for($i=0 ; $i<3 ; $i++ )

{

	if(($i+1)==$secSchedule['no_of_sessions']) 

	echo '<option selected="selected">'.($i+1).'</option>' ;

	else

	echo '<option>'.($i+1).'</option>' ;



}





?>

</select>





<input type="hidden" id="session_1_start" name="session_1_start" value=""   /> 

<input type="hidden" id="session_2_start" name="session_2_start" value=""   />

<input type="hidden" id="session_3_start" name="session_3_start" value=""   />

<input type="hidden" id="session_1_end" name="session_1_end" value=""   />

<input type="hidden" id="session_2_end" name="session_2_end" value=""   />

<input type="hidden" id="session_3_end" name="session_3_end" value=""   />





<br />

<br />





<div  id="slot_head_1" class="slot_head">Slot1 start&nbsp; &nbsp; &nbsp;  &nbsp;Slot1 end&nbsp; &nbsp; </div>

<div  id="slot_head_2" class="slot_head">Slot2 start&nbsp; &nbsp; &nbsp;  &nbsp;Slot2 end&nbsp; &nbsp; </div>

<div   id="slot_head_3" class="slot_head">Slot3 start&nbsp; &nbsp; &nbsp;  &nbsp;Slot3 end&nbsp; &nbsp; </div>



<?php 



		 $day_name[0]="Monday";

		 $day_name[1]="Tuesday";

		 $day_name[2]="Wednesday";

		 $day_name[3]="Thursday";

		 $day_name[4]="Friday";

		 $day_name[5]="Saturday";

		 $day_name[6]="Sunday";



$i=0;



foreach($day_name as $day){



	if($schedule['session_1_start'][$i]>2400)

		$schedule['session_1_start'][$i] = "" ;

	if($schedule['session_2_start'][$i]>2400)

		$schedule['session_2_start'][$i] = "" ;

	if($schedule['session_3_start'][$i]>2400)

		$schedule['session_3_start'][$i] = "" ;

	if($schedule['session_1_end'][$i]>2400)

		$schedule['session_1_end'][$i] = "" ;

	if($schedule['session_2_end'][$i]>2400)

		$schedule['session_2_end'][$i] = "" ;

	if($schedule['session_3_end'][$i]>2400)

		$schedule['session_3_end'][$i] = "" ;

		

	$i++ ;

	

}

$i=0;





foreach($day_name as $day){

	

	echo '

	

	<span id="slot1_span_'.$i.'">

	 <input type="text" style="width:60px" id="slot1_start_'.$day.'"  name="slot1_start_'.$day.'" class="field slot" placeholder="'.$day.'"  value="'.$schedule['session_1_start'][$i].'" />

	 <input type="text" style="width:60px"   id="slot1_end_'.$day.'"  name="slot1_end_'.$day.'" class="field slot" placeholder="'.$day.'" value="'.$schedule['session_1_end'][$i].'" />

	</span>

	

	<span id="slot2_span_'.$i.'">

	 <input type="text" style="width:60px"  id="slot2_start_'.$day.'" name="slot2_start_'.$day.'" class="field slot" placeholder="'.$day.'" value="'.$schedule['session_2_start'][$i].'"/>

	 <input type="text" style="width:60px"  id="slot2_end_'.$day.'" name="slot2_end_'.$day.'" class="field slot" placeholder="'.$day.'" value="'.$schedule['session_2_end'][$i].'"/>

	</span>

	

	<span id="slot3_span_'.$i.'">

	 <input type="text" style="width:60px"  id="slot3_start_'.$day.'" name="slot3_start_'.$day.'" class="field slot" placeholder="'.$day.'" value="'.$schedule['session_3_start'][$i].'" />

	 <input type="text" style="width:60px"  id="slot3_end_'.$day.'" name="slot3_end_'.$day.'" class="field slot" placeholder="'.$day.'" value="'.$schedule['session_3_end'][$i].'" />

	</span>

	

	<br />



	';

	

$i++;	

	}





?>



<br />

	

    

	<p align="right" ><span><input type="button" id="submit" value="Add Schedule" align="right" onclick="viewSchedule()" /></span><span align="right"><input type="submit" id="submit" value="Confirm" align="right" /></span></p>

    </form>

    </p>

    </div>

    <br />

    <div id="secondScheudule">

    <p class="heading">Secondary Schedule </p>

    <div class="content_edit">

	<?php 

		$attributes = array('id' => 'changeSecondarySchedule');

		echo form_open('doctor/edit_profile', $attributes);

    ?>

    

    <p>

    

    

<label for="no_of_slots" style="margin-right:20px" >No of slots</label>



<select name="second_no_of_sessions" style="border-radius:4px; opacity:0.8; width:60px;" onchange="editformSecond(this.value)">

<option>1</option>

<option>2</option>

<option selected="selected">3</option>

</select>

 &nbsp; </span>

<label for="no_of_slots" style=" margin-left:50px ; margin-right:20px" >Appointment Duration</label>



<select name="sec_appointment_duration"  id="sec_appointment_duration">

<option value="10">10</option>

<option value="15" selected="selected">15</option>

<option value="30">30</option>

<option value="45">45</option>

</select>





<input type="hidden" id="sec_session_1_start" name="sec_session_1_start" value=""   /> 

<input type="hidden" id="sec_session_2_start" name="sec_session_2_start" value=""   />

<input type="hidden" id="sec_session_3_start" name="sec_session_3_start" value=""   />

<input type="hidden" id="sec_session_1_end" name="sec_session_1_end" value=""   />

<input type="hidden" id="sec_session_2_end" name="sec_session_2_end" value=""   />

<input type="hidden" id="sec_session_3_end" name="sec_session_3_end" value=""   />



<br />

<br />





<div  id="second_slot_head_1" class="slot_head">Slot1 start&nbsp; &nbsp; &nbsp;  &nbsp;Slot1 end&nbsp; &nbsp; </div>

<div  id="second_slot_head_2" class="slot_head">Slot2 start&nbsp; &nbsp; &nbsp;  &nbsp;Slot2 end&nbsp; &nbsp; </div>

<div   id="second_slot_head_3" class="slot_head">Slot3 start&nbsp; &nbsp; &nbsp;  &nbsp;Slot3 end&nbsp; &nbsp; </div>



<?php 





$day_name[0]="Monday";

$day_name[1]="Tuesday";

$day_name[2]="Wednesday";

$day_name[3]="Thursday";

$day_name[4]="Friday";

$day_name[5]="Saturday";

$day_name[6]="Sunday";



$i=0;



if($secSchedule){



foreach($day_name as $day){



	if($secSchedule['session_1_start'][$i]>2400)

		$secSchedule['session_1_start'][$i] = "" ;

	if($secSchedule['session_2_start'][$i]>2400)

		$secSchedule['session_2_start'][$i] = "" ;

	if($secSchedule['session_3_start'][$i]>2400)

		$secSchedule['session_3_start'][$i] = "" ;

	if($secSchedule['session_1_end'][$i]>2400)

		$secSchedule['session_1_end'][$i] = "" ;

	if($secSchedule['session_2_end'][$i]>2400)

		$secSchedule['session_2_end'][$i] = "" ;

	if($secSchedule['session_3_end'][$i]>2400)

		$secSchedule['session_3_end'][$i] = "" ;

		

	$i++ ;

	

}





$i=0;



foreach($day_name as $day){

	

	echo '

	

	<span id="second_slot1_span_'.$i.'">

	 <input type="text" style="width:60px" id="sec_slot1_start_'.$day.'"  name="slot1_start_'.$day.'" class="field slot" placeholder="'.$day.'"  value="'.$secSchedule['session_1_start'][$i].'" />

	 <input type="text" style="width:60px"   id="sec_slot1_end_'.$day.'"  name="slot1_end_'.$day.'" class="field slot" placeholder="'.$day.'" value="'.$secSchedule['session_1_end'][$i].'" />

	</span>

	

	<span id="second_slot2_span_'.$i.'">

	 <input type="text" style="width:60px"  id="sec_slot2_start_'.$day.'" name="slot2_start_'.$day.'" class="field slot" placeholder="'.$day.'" value="'.$secSchedule['session_2_start'][$i].'"/>

	 <input type="text" style="width:60px"  id="sec_slot2_end_'.$day.'" name="slot2_end_'.$day.'" class="field slot" placeholder="'.$day.'" value="'.$secSchedule['session_2_end'][$i].'"/>

	</span>

	

	<span id="second_slot3_span_'.$i.'">

	 <input type="text" style="width:60px"  id="sec_slot3_start_'.$day.'" name="slot3_start_'.$day.'" class="field slot" placeholder="'.$day.'" value="'.$secSchedule['session_3_start'][$i].'" />

	 <input type="text" style="width:60px"  id="sec_slot3_end_'.$day.'" name="slot3_end_'.$day.'" class="field slot" placeholder="'.$day.'" value="'.$secSchedule['session_3_end'][$i].'" />

	</span>

	

	<br />



	';

	

$i++;	

	}

	

	echo '<p> State <input width="200px" value="'.$secSchedule['sec_doc_state'].'" type="text" id="sec_doc_state" class="field required " placeholder="State" name="sec_doc_state" /> City <input id="sec_doc_city" name="sec_doc_city" value="'.$secSchedule['sec_doc_city'].'" class="field required " placeholder="City" type="text" /> </p>

   <p>

Address : <input id="sec_address" value="'.$secSchedule['sec_address'].'" name="sec_address" class="field required half" placeholder="Address" type="text" onBlur="codeAddress(2)" /> 

 <br />

   <br />

   <p>

    <div id="map_canvas2" style="width:500px; height:300px ; display:compact;"></div>

    </p>

    <br>

    <input type="hidden" name="sec_latitude" id="sec_latitude" value="'.$secSchedule['sec_latitude'].'"  />

    <input type="hidden" name="sec_longitude" id="sec_longitude" value="'.$secSchedule['sec_longitude'].'"  />

    Land Mark : <input id="sec_doc_landmark" value="'.$secSchedule['sec_doc_landmark'].'" name="sec_doc_landmark" class="field required half" placeholder="famous landmark nearby" type="text" />

    </p>

    

	<p align="right"><input type="submit" id="submit" value="Confirm" align="right" onclick="compute_slots(2)" /></p>

    </p>';

}

else{

	

	$i=0 ;

	

	foreach($day_name as $day){

	

	echo '

	

	<span id="second_slot1_span_'.$i.'">

	 <input type="text" style="width:60px" id="sec_slot1_start_'.$day.'"  name="slot1_start_'.$day.'" class="field slot" placeholder="'.$day.'"   />

	 <input type="text" style="width:60px"   id="sec_slot1_end_'.$day.'"  name="slot1_end_'.$day.'" class="field slot" placeholder="'.$day.'" />

	</span>

	

	<span id="second_slot2_span_'.$i.'">

	 <input type="text" style="width:60px"  id="sec_slot2_start_'.$day.'" name="slot2_start_'.$day.'" class="field slot" placeholder="'.$day.'" />

	 <input type="text" style="width:60px"  id="sec_slot2_end_'.$day.'" name="slot2_end_'.$day.'" class="field slot" placeholder="'.$day.'" />

	</span>

	

	<span id="second_slot3_span_'.$i.'">

	 <input type="text" style="width:60px"  id="sec_slot3_start_'.$day.'" name="slot3_start_'.$day.'" class="field slot" placeholder="'.$day.'" />

	 <input type="text" style="width:60px"  id="sec_slot3_end_'.$day.'" name="slot3_end_'.$day.'" class="field slot" placeholder="'.$day.'" />

	</span>

	

	<br />



	';

	

	

	$i++;	

	}

	

	echo '<p> State <input width="200px" value="" type="text" id="sec_doc_state" class="field required " placeholder="State" name="sec_doc_state" /> City <input id="sec_doc_city" name="sec_doc_city" value="" class="field required " placeholder="City" type="text" /> </p>

   <p>

Address : <input id="sec_doc_address" value="" name="sec_address" class="field required half" placeholder="Address" type="text" onBlur="codeAddress(2)" /> 

 <br />

   <br />

   <p>

    <div id="map_canvas2" style="width:500px; height:300px ; display:compact;"></div>

    </p>

    <br>

    <input type="hidden" name="sec_latitude" id="sec_latitude"  />

    <input type="hidden" name="sec_longitude" id="sec_longitude"  />

    Land Mark : <input id="sec_doc_landmark" value="" name="sec_doc_landmark" class="field required half" placeholder="famous landmark nearby" type="text" />

    </p>

    

	<p align="right"><input type="submit" id="submit" value="Confirm" align="right" onclick="compute_slots(2)" /></p>

    </form>

    </p>' ;

	

}





?>



<br />

	

    </div>

    <br />

    

    

    

    </div>         

    </div>        

       

       <br />



</div>       



</div>



</div>

<script>

if(secScheduleVisibility==0)

document.getElementById('secondScheudule').style.visibility = "hidden" ; 



function viewSchedule(){

	

	document.getElementById('secondScheudule').style.visibility = "visible" ;	

	

}





function editformSecond(no_slots){

	

	

	if(no_slots==2){

		

		for(var i=0;i<7;i++)

			{

				document.getElementById('second_slot_head_3').style.visibility="hidden";

				document.getElementById('second_slot_head_2').style.visibility="visible";

				

				document.getElementById('second_slot3_span_'+i).style.visibility="hidden";

				document.getElementById('second_slot2_span_'+i).style.visibility="visible";

			

			}

		}



	else if(no_slots==1){

		

		for(var i=0;i<7;i++)

			{

				document.getElementById('second_slot_head_2').style.visibility="hidden";

				document.getElementById('second_slot_head_3').style.visibility="hidden";

				

				document.getElementById('second_slot2_span_'+i).style.visibility="hidden";

				document.getElementById('second_slot3_span_'+i).style.visibility="hidden";

		

			}

			

		}



	else if(no_slots==3){

		

		for(var i=0;i<7;i++)

			{

				document.getElementById('second_slot_head_2').style.visibility="visible";

				document.getElementById('second_slot_head_3').style.visibility="visible";

				

				document.getElementById('second_slot2_span_'+i).style.visibility="visible";

				document.getElementById('second_slot3_span_'+i).style.visibility="visible";

		

				}

		}

	

	}

	

	



function editform(no_slots){

	

	

	if(no_slots==2){

		

		for(var i=0;i<7;i++)

			{

				document.getElementById('slot_head_3').style.visibility="hidden";

				document.getElementById('slot_head_2').style.visibility="visible";

				

				document.getElementById('slot3_span_'+i).style.visibility="hidden";

				document.getElementById('slot2_span_'+i).style.visibility="visible";

			

			}

		}



	else if(no_slots==1){

		

		for(var i=0;i<7;i++)

			{

				document.getElementById('slot_head_2').style.visibility="hidden";

				document.getElementById('slot_head_3').style.visibility="hidden";

				

				document.getElementById('slot2_span_'+i).style.visibility="hidden";

				document.getElementById('slot3_span_'+i).style.visibility="hidden";

		

			}

			

		}



	else if(no_slots==3){

		

		for(var i=0;i<7;i++)

			{

				document.getElementById('slot_head_2').style.visibility="visible";

				document.getElementById('slot_head_3').style.visibility="visible";

				

				document.getElementById('slot2_span_'+i).style.visibility="visible";

				document.getElementById('slot3_span_'+i).style.visibility="visible";

		

				}

		}

	

	}

	

	

	

function compute_slots(num){

	

var session_1_start="";

var session_2_start="";

var session_3_start="";



var session_1_end="";

var session_2_end="";

var session_3_end="";





var days=new Array();







days[0]='Monday';

days[1]='Tuesday';

days[2]='Wednesday';

days[3]='Thursday';

days[4]='Friday';

days[5]='Saturday';

days[6]='Sunday';



//i=1;



//var x='slot'+i+'_start_'+days[i-1];

//var z=document.getElementById(x).value;







for(var j=1;j<=3;j++)

{

	for(var i=1;i<=7;i++)

			{

		

		if(num==2)

		{

		var x1='sec_slot'+j+'_start_'+days[i-1];

		var x2='sec_slot'+j+'_end_'+days[i-1];

		}

		else

		{

			var x1='slot'+j+'_start_'+days[i-1];

			var x2='slot'+j+'_end_'+days[i-1];

		}

		

		//alert(x);

		//alert(""+x1);

		var z1=document.getElementById(x1).value;

		var z2=document.getElementById(x2).value;

		//alert(""+x1);



		if(!z1){z1=9999}

		if(!z2){z2=9999}

			



	

	switch(j){

			

	case 1:	

				session_1_start+=z1+";";

				session_1_end+=z2+";";

			

	break;

	

	case 2:

				session_2_start+=z1+";";

				session_2_end+=z2+";";

			

	break;

	

	case 3:			session_3_start+=z1+";";

			  	 session_3_end+=z2+";";

	

	break;

		

		default:alert('error');

		}

		

	}



}



	

	if(num==2)

		{

			document.getElementById('sec_session_1_start').value=session_1_start;

			document.getElementById('sec_session_2_start').value=session_2_start;

			document.getElementById('sec_session_3_start').value=session_3_start;

			

			document.getElementById('sec_session_1_end').value=session_1_end;

			document.getElementById('sec_session_2_end').value=session_2_end;

			document.getElementById('sec_session_3_end').value=session_3_end;

	

		}

		else

		{

			document.getElementById('session_1_start').value=session_1_start;

			document.getElementById('session_2_start').value=session_2_start;

			document.getElementById('session_3_start').value=session_3_start;

			

			document.getElementById('session_1_end').value=session_1_end;

			document.getElementById('session_2_end').value=session_2_end;

			document.getElementById('session_3_end').value=session_3_end;

	

		}

		

	

	return false

	

}	





</script>

