
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
echo form_open_multipart('register/patient_welcome', $attributes) 

?>


<input id="martial_status" name="martial_status" class="field required half" placeholder="Martial Status" type="text" />

<select id="age" name="age" class="field required half" >
<option>Age</option>
<?php 

for($i=1;$i<=100;$i++){

	echo '<option>'.$i.'</option>';
}

?>
</select>
<br />
              
<input id="chronic_illness" name="chronic_illness" class="field required half" placeholder="Chronic Illness" type="text" />

<input type="text" id="blood_type" class="field required half" placeholder="Blood Type" name="blood_type" />

<br>

<input id="special_condition" name="special_condition" class="field required full" placeholder="Special Condition" type="text" onBlur="codeAddress()" />

<br>
  
<br>


<input id="other_condition" name="other_condition" class="field required full" placeholder="Other Condition" type="text" />

<br>
  
<input id="other_condition1" name="other_condition1" class="field required full" placeholder="Other Condition" type="text" />
 

 
<br />
<br />


<input type="submit" id="submit" value="Next Page" />
                
              
                
		</form><!-- end #form1 -->
        
</div><!-- end .grid_4 -->
        
</div><!-- end SERVICES - LINE 1 -->   
        
        
</div><!-- END container_12 -->
    
</div><!-- END GREYSTRIPE -->

</div>

<script type="text/javascript">

	$(function() {
				  var bloodTags = [
					"B+",
					"B-",
					"AB+",
					"AB-",
					"O+",
					"O-",
					"A+",
					"A-"
				  ];
				  $( "#blood_type" ).autocomplete({
					source: bloodTags
				  });
		  });
		  
		  
		  
			$(function() {
				  var maritialTags = ["Married","Unmarried"];
				  $( "#martial_status" ).autocomplete({
					source: maritialTags
				  });
		  });
		
</script>