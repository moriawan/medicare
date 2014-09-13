



<div id="wrapper-patient">





<div class="container_12">



  <!-- begin .grid_4 - IMAGE -->

    <div class="grid_3">

        <img src="<?php echo base_url(); ?>/images/profile/<?php 

		$DP = $uid;

		echo "DP-Patient-$DP".".jpg"; ?>" alt="" width="100%" />

      

      <div class="formBox" id="formBox1">

             

            

               </div>

      

        	<p class="columnWidth"><a href="<?php echo base_url()."index.php/patient/edit_profile"?>" class="docname">Edit Profile</a></p>

           <ul class="genList">

             <li><a class="links" href="<?php echo base_url()."index.php/groups"; ?>" style="padding-left: 0px; ">Groups</a></li>

            <li><a class="links" href="<?php echo base_url()."index.php/message"?>" style="padding-left: 0px; ">Messages</a></li>

        </ul>

     

      </div><!-- end .grid_4 -->

    

    

    

   

 <div id="patient-landing-panel-right" class="grid_8">  

   

    



<div id="patient-tab-nav" style="font-weight:bold;"> 

<span class="active">

Quick Book

</span>

<span>

Subscriptions

</span>

<span>

Lab Reports

</span>

<span>

Appointments

</span>

<span>

Permissions

</span>

</div>		







<div id="quickBook"  class="patient-div" style="display:block">



	<?php

    

	$attributes = array('id' => 'form2');

	echo form_open('filters', $attributes) 



    ?>



	<br/>

	<br/>

        

  	<label style="font-weight:bold; font-size:18px">Quick book an appointment</label>

    

  

    <br />    

    <br />

    <br />



    <div class="ui-widget">

    

    <input type="text" class="field required half" placeholder="search by city" name="city" id="city" /><br />

    

    </div>

    <br />



	<select name="speciality" style="width: 290px; border-radius:4px; margin-left:10px; opacity:0.6; height:25px">

    <option>search by Speciality</option>

	<?php

	foreach($speciality as $speciality_listing ){

		

		echo "<option>".$speciality_listing."</option>";

		}

    

    ?>

    </select>



    <br />



<!--    <input type="text" class="field required full" placeholder="search by speciality" name="speciality"/><br />

-->

     <br/>



   	<input type="submit" class="submit" style="width:200px" />



    </form>



</div>







<div id="Subscriptions" class="patient-div" style="padding-left:0px; padding-top:30px; display:none;">



<br />



<div class="grid_4">

		



        <p>



		<label style="font-weight:bold; font-size:18px">Subscribed Doctors</label><br />

        <br />



        <ul style="margin-left:10px; line-height:20px;">



      <?php

	  	for($i=0;$i<sizeof($subs['uid']);$i++){





	echo '<li>

	<div id="img-wrapper" style="width:85px; height:40px; float:left">

	

	<img style="height:40px; max-width:80px;" src="'.base_url().'images/profile/DP-Doc-'.$subs['uid'][$i].'.jpg"/>

	</div>

	

	<a style="color:#000" href="'.base_url().'index.php/feeds/myfeeds/'.$subs['cid'][$i]."/".$subs['uid'][$i].'">'.$subs['doctorDetails'][$i][0]['fname']." ".$subs['doctorDetails'][$i][0]['lname'].'</a> &nbsp;:

	

	<span style="font-size:12px">'.$subs['doctorAttribs'][$i][0]['speciality'].'</span>





<br />

<a href="'.base_url().'index.php/message/thread/'.$uid.'/'.$subs['uid'][$i].'/2/1" style="font-size:10px" >message</a>



			<a href="'.base_url().'index.php/patient/unSubscribe/'.$subs['uid'][$i].'/'.$subs['eid'].'" style="font-size:10px" >UnSubscribe</a></li>';



				



	  }



	  



	  ?>



        </ul >



        </p>

</div>



<div class="grid_3" class="findDoctors">



 <?php 



    



    $attributes = array('id' => 'form2');



    echo form_open('search', $attributes) 



    



    ?>



    



    	<label style="font-weight:bold">Find a Doctor</label>



<br />



        

		 <input type="text" class="field required quarter" placeholder="search by name" name="name"/>



        <input type="text" class="field required quarter" placeholder="search by city" name="city" id="city2" /><br />







       <br />



        <select name="speciality" style="width: 160px; border-radius:4px; margin-left:10px; opacity:0.6; height:25px">

        <option>search by Speciality</option>

        <?php

        foreach($speciality as $speciality_listing ){

            

            echo "<option>".$speciality_listing."</option>";

            }

        

        ?>

        </select>

        

        

        

<br />









        <br />



		



        <br />



		<input type="submit" class="submit" />



        



      </form>





</div>

		



</div>







<div id="labReports" class="patient-div" style="display:none; padding-left:20px; padding-top:30px;">









<div class="grid_3">



	<br />

	<label style="font-weight:bold; font-size:18px">Lab Reports</label><br />

	<br />

	<br />



        <ul style="margin-left:10px; line-height:20px;">



       <?php



	  	for($i=0;$i<sizeof($reports);$i++){



			echo "<li style='font-size:14px;'><a href='".base_url()."uploads/".$reports[$i]['slug'].".pdf'>".$reports[$i]['name']."</a> - <span 			style='font-size:10px;'>".$reports[$i]['lab_name']."</span></li>";



		}

	  ?>



        <li><br /> </li>



        </ul>



       

</div>





<div class="grid_3">



		<?php 

  

        $attributes = array('id' => 'form3');

  

        echo form_open_multipart('upload/do_upload'); 

  

        ?>



      



    

		<div id="upload-div" style="display:block">

        

        



        <br />



		<?php if(isset($error))



		echo $error."<br />";



		?>





    	<label style="font-weight:bold">Upload report manually</label><br />



        <input type="text" class="field required quarter" placeholder="Enter name of report" name="name" /><br />



        <input type="text" class="field required quarter" placeholder="Enter name of lab" name="labName"/><br />



		<br />



		<input type="file" name="userfile" size="20" style="padding-left:10px" />



        <br />



		<input type="submit" class="submit" />



        </form>



		</div>    



    </div>  







</div>









<div id="Appointments" class="patient-div"  style="display:none; margin-top:20px;">





<br />

<span id="older" style="float:left; margin-left:10px; cursor: pointer; color: #91B818; font-style:italic; font-weight:bold">older</span>

<span id="newer" style="float:right; margin-right:10px; cursor: pointer; color: #91B818; font-style:italic; font-weight:bold">newer</span>

<br />



<br />



<table width="100%" border="0" cellspacing="0" cellpadding="0"  class="sortable">



 <thead>



                    <tr>





                    <th style="cursor:pointer">TID</th>



                    <th style="cursor:pointer">date</th>



                    <th style="cursor:pointer">problem</th>



                    <th style="cursor:pointer">Doctor name</th>



                    <th style="cursor:pointer">Status</th>

                    

                    <th class="sorttable_nosort">View</th>

                    

                    <th class="sorttable_nosort">Follow up</th>



                    </tr>



                    



 </thead>



 



 



<tbody id="appointmentsTable">



<?php

/*









	foreach($apps as $app){



		



	//	echo "<a href='".base_url()."index.php/patient/appointment/".$app['transaction_id'];



		



		echo "<tr>";



		



		echo "<td>".$app['transaction_id']."</td>";



		echo "<td>".substr($app['appointment_time'],0,10)."</td>";



		echo "<td>".$app['problem']."</td>";



		echo "<td>".$app['doctor']["fname"]." ".$app['doctor']["lname"]."</td>";



		echo "<td>".$app['transaction_status']."</td>";

		

		echo "<td style='color:#91B818; cursor:pointer' onclick='goTo(".$app['transaction_id'].")' style='cursor:pointer'>view</td>";

		

		echo "<td style='color:#91B818;  cursor:pointer' onclick='e_appointment(".$app['transaction_id'].")' style='cursor:pointer'>Follow up</td>";



		

		



		



		



		echo "</tr>";



	//	echo "</a>";



	}

*/

?>







</tbody>



 







</table>



</div>





<div id="Permission" class="patient-div"  style="display:none; margin-top:20px;">



</div>

























</div>





</div>

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

			

			$( "#city2" ).autocomplete({

			  source: availableTags

			});

		  });

		

</script>











