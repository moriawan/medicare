<link href="../../stylesheets/layout.css" rel="stylesheet" type="text/css" />







<div id="wrapper">



<!-- BEGIN GREYSTRIPE -->



<div id="white_container" >



    <!-- BEGIN container_12 -->



    <div class="container_12">



      







<div id="main_top" class="container_12" style="padding:20px; background:url(<?php echo base_url();?>/images/home-image.jpg); background-size:cover;">







 <div class="left_side_colomun" style="width:400px; float:right">



 



 <div class="grid_6" style="float:right; width:390px; border-radius:8px; background:rgba(230,230,230,0.8);  padding-bottom:10px; padding-right:10px; padding-top:10px;">



   



   



<?php 

$attributes = array('id' => 'form1');

//echo form_open(base_url()."esotalk/user/curl_login", $attributes) ;

echo form_open("login", $attributes) ;

$medicare=base_url();
$medicare=preg_replace("/\//","-",$medicare);
$medicare=preg_replace("/\?.*/","",$medicare);
$medicare=preg_replace("/\-p[0-9]+/","",$medicare);


?>


    <label style="font-weight:bold">I&nbsp; am&nbsp;  a</label> 
    
     <label for="user" style="font-weight:bold">Patient</label>&nbsp;

     <input type="radio"  checked="checked" name="user_type" value="patient"  />

     <label for="user" style="font-weight:bold" >Doctor</label>&nbsp;

     <input type="radio" name="user_type" value="doctor" />


     <input type="submit" id="submit" value="Login" style="float:right; margin-top:33px" />

     <input name="Username" type="text" class="field login_input" placeholder="email" />

     <input name="Password" type="Password" class="field login_input" placeholder="password"/>

     <input name="medicare" type="text" value="<?php echo $medicare; ?>" hidden="true" />

     <br />

   </form>

<br /><br />
<br />
<br />



  <label style="padding:10px; font-weight:bold;">New to Its Medicare <a href="<?php echo base_url();?>index.php/register/patient_register">Register now</a></label>



     </div>

<div class="clear" style="height:50px"></div>


 <div class="grid_6" style="float:right; width:390px; border-radius:8px; background:rgba(230,230,230,0.7);   padding-bottom:10px; padding-right:10px; padding-top:10px;">



   



	 <?php 

    $attributes = array('id' => 'form2');

    echo form_open('filters', $attributes);



    ?>

    	<label style="font-weight:bold">Quick book an appointment</label>

<br />

        <input type="text" class="field required half" placeholder="search by city" name="city" id="city" /><br />

    <br />

	<select name="speciality" style="width: 290px; border-radius:4px; margin-left:10px; opacity:0.6; height:25px">

    <option>search by Speciality</option>

	<?php

	foreach($speciality as $speciality_listing ){

		echo "<option>".$speciality_listing."</option>";
		}

    ?>

    </select>
     <br /><br />

<label > &nbsp;Note : Search by any or all of the above filters</label>

        <br />
        <br />
		<input type="submit" class="submit" />
      </form>


    </div>



      



      



 </div>



 



</div>



 



 



 <div class="container_12" style="height:30px; background:#f0f0f0; margin-top:20px">



 



 <span class="tabs" onclick="ajax_login()">login ajax</span>



 <span class="tabs"></span>



 <span class="tabs"></span>



 <span class="tabs"></span>



  



 



 </div>



 



    </div>



    <!-- END container_12 -->



</div>



<!-- END GREYSTRIPE -->



</div>









<script>

	$(function() {

			var availableTags = [

			  

			      <?php 

		

		foreach($cities as $city)

			echo '"'.$city.'",';

			

		?>

		"heaven"

			];

			$( "#city" ).autocomplete({

			  source: availableTags

			});

		

		

		  });

		

</script>



