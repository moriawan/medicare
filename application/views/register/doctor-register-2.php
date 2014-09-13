
<div id="wrapper">

<!-- BEGIN GREYSTRIPE -->

<div id="greyStripe" >

    <!-- BEGIN container_12 -->

    <div class="container_12">

      

        <!-- begin last works -->

        

            <div class="grid_2">

            <br />



    	</div>

        <!-- begin SERVICES - LINE 1 -->

        <div class="line">

        	<!-- begin .grid_4 -->

            <div class="grid_8">

    	<h1>Complete your Registration</h1>      

        <!-- Begin #form1 -->

          <!--  <form id="form1" method="post" action="" enctype="multipart/form-data">

           -->

           

           

<?php echo validation_errors(); ?>









<?php 



$attributes = array('id' => 'form1');

echo form_open('register/doctor_form_3', $attributes) 



?>





<input id="fee" name="doc_fee" class="field required half" placeholder="Appointment fee in Rupees" type="text" />



<select id="duration" name="doc_duration" class="field required half"  placeholder="appointment Duration" style="width:285px" >
<option style="opacity:0.3">duration</option>
<?php 
for($i=0; $i<5; $i++):
?>
<option>
<?php echo ($i*10 + 10); ?>
</option>

<?php endfor; ?>
</select>




<br />

              

<input id="city" name="doc_city" class="field required half" placeholder="City" type="text" />



<input type="text" name="doc_state" id="state" class="field required half" placeholder="State"  />



<br>



<input id="address" name="doc_add" class="field required full" placeholder="Address" type="text" onBlur="codeAddress()" />



<br>

<br>



<div id="map_canvas" style="width:615px; height:300px"></div>

  

<br>





<input id="landmark" name="doc_land" class="field required full" placeholder="famous landmark nearby" type="text" />



<br>


<br />

	<select id="speciality" name="doc_speciality" class="field required full" style="width:600px">
    <option>Speciality</option>
	<?php
	foreach($speciality as $speciality_listing ){
		
		echo "<option>".$speciality_listing."</option>";
		}
    
    ?>
    </select>


 <input type="text" id="latitude" name="latitude" style="visibility:hidden" />

 <input type="text" id="longitude" name="longitude" style="visibility:hidden" />

 

<br />



<label for="no_of_slots" style="margin-right:20px" >No of slots</label>



<select name="no_of_sessions" style="border-radius:4px; opacity:0.8; width:60px;" onchange="editform(this.value)">

<option>1</option>

<option>2</option>

<option selected="selected">3</option>

</select>



<br />

<br />





<div  id="slot_head_1" class="slot_head">Slot1 start&nbsp; &nbsp; &nbsp;  &nbsp;Slot1 end&nbsp; &nbsp; </div>

<div  id="slot_head_2" class="slot_head">Slot2 start&nbsp; &nbsp; &nbsp;  &nbsp;Slot2 end&nbsp; &nbsp; </div>

<div   id="slot_head_3" class="slot_head">Slot3 start&nbsp; &nbsp; &nbsp;  &nbsp;Slot3 end&nbsp; &nbsp; </div>



<?php 



$k=0;



foreach($day_name as $day){

	

	echo '

	

	<span id="slot1_span_'.$k.'">
	
    <select id="slot1_start_'.$day.'"  name="slot1_start_'.$day.'" class="field slot">
    <option>
	'.substr($day,0,3).'
    </option>
	';
	for($i=8; $i<=22;$i++){
		for( $j=0; $j<=5;$j++)
			{
				$temp = $j*10;
				echo "<option>".$i.":".$temp."</option>";
			}
		}
	
	
   	echo '</select> <select id="slot1_end_'.$day.'"  name="slot1_end_'.$day.'" class="field slot">
    <option>
	'.substr($day,0,3).'
    </option>
	';
	for($i=8; $i<=22;$i++){
		for( $j=0; $j<=5;$j++)
			{
				$temp = $j*10;
				echo "<option>".$i.":".$temp."</option>";
			}
		}
echo ' </select>';
	
	
echo '</span>

	

	<span id="slot2_span_'.$k.'">


    <select id="slot2_start_'.$day.'" name="slot2_start_'.$day.'" class="field slot">
    <option>
	'.substr($day,0,3).'
    </option>
	';
	for($i=8; $i<=22;$i++){
		for( $j = 0; $j <= 5; $j++)
			{
				$temp = $j*10;
				echo "<option>".$i.":".$temp."</option>";
			}
		}
	
	
   	echo '</select> <select id="slot2_end_'.$day.'" name="slot2_end_'.$day.'" class="field slot" >
    <option>
	'.substr($day,0,3).'
    </option>
	';
	for($i=8; $i<=22;$i++){
		for( $j=0; $j<=5;$j++)
			{
				$temp = $j*10;
				echo "<option>".$i.":".$temp."</option>";
			}
		}
echo ' </select>

	</span>

	

	<span id="slot3_span_'.$k.'">

	
    <select id="slot3_start_'.$day.'" name="slot3_start_'.$day.'" class="field slot" ">
    <option>
	'.substr($day,0,3).'
    </option>
	';
	for($i=8; $i<=22;$i++){
		for( $j=0; $j<=5;$j++)
			{
				$temp = $j*10;
				echo "<option>".$i.":".$temp."</option>";
			}
		}
	
	
   	echo '</select> <select id="slot3_end_'.$day.'" name="slot3_end_'.$day.'" class="field slot"" >
    <option>
	'.substr($day,0,3).'
    </option>
	';
	for($i=8; $i<=22;$i++){
		for( $j=0; $j<=5;$j++)
			{
				$temp = $j*10;
				echo "<option>".$i.":".$temp."</option>";
			}
		}
echo ' </select>
		</span>
		<br />';


$k++;	

	}





?>



<br />

<br />



<center>



<input type="submit" id="submit" onclick="compute_slots()" value="Next Page" />



</center>



<input id="session_1_start" name="session_1_start" type="text" style="visibility:hidden" />

<input id="session_2_start" name="session_2_start" type="text" style="visibility:hidden" />

<input id="session_3_start" name="session_3_start" type="text" style="visibility:hidden" />



<input id="session_1_end" name="session_1_end" type="text" style="visibility:hidden" />

<input id="session_2_end" name="session_2_end" type="text" style="visibility:hidden" />

<input id="session_3_end" name="session_3_end" type="text" style="visibility:hidden" />

 

<!--

<input type="button" onclick="compute_slots()" />



        -->

                

              

                

		</form><!-- end #form1 -->

        

</div><!-- end .grid_4 -->

        

</div><!-- end SERVICES - LINE 1 -->   

        

        

</div><!-- END container_12 -->

    

</div><!-- END GREYSTRIPE -->



</div>



<script>



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

	

	

	

function compute_slots(){

	

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



//alert(z);



for(var j=1;j<=3;j++)

{

	for(var i=1;i<=7;i++)

			{

				

		var x1='slot'+j+'_start_'+days[i-1];

		var x2='slot'+j+'_end_'+days[i-1];

		

		//alert(x);

		

		var z1=document.getElementById(x1).value;

		var z2=document.getElementById(x2).value;





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

	

	//session_1_start=session_1_start;

	//alert(session_1_start+" "+session_2_start+" "+session_3_start);

	

	//alert(session_1_start+" "+session_2_start+" "+session_3_start);

	

	document.getElementById('session_1_start').value=session_1_start;

	document.getElementById('session_2_start').value=session_2_start;

	document.getElementById('session_3_start').value=session_3_start;

	

	document.getElementById('session_1_end').value=session_1_end;

	document.getElementById('session_2_end').value=session_2_end;

	document.getElementById('session_3_end').value=session_3_end;

	

	

	

	//alert(session_1_start+" "+session_2_start+" "+session_3_start);

	//alert(session_1_end+" "+session_2_end+" "+session_3_end);

	

}



	  $(function() {
			var stateTags = ["Delhi","Haryana","Utar pradesh, Maharashtra, Rajasthan, Uttarakhand, Bihar, Gujrat, Punjab, Tamil Nadu, Karnataka, Orrissa "];
			$( "#state" ).autocomplete({
			  source: stateTags
			});
		  });


</script>
