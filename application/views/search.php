

<div id="wrapper">

<!-- BEGIN GREYSTRIPE -->

<div id="greyStripe" style="position:relative; top:-50px">

    <!-- BEGIN container_12 -->

    <div class="container_12" style="background:rgba(255,255,255,1); padding:10px;">

      <br />



    <h1>Search results</h1>

    

    <p>

    <br />



<?php



$i=0;




			

		
		//	$result2[]=$this->search_model->getName($row->doctor_id);

			
if($Dlist)
				foreach($Dlist as $listItem){

	echo '<div class="search grid_10 result_item" style=" padding:20px;">';

					echo '<div>

					<img src="'.base_url().'images/profile/dp-1.jpg" style="width:100px; float:left; margin-left:20px;">

					<h3 class="columnwidth name" style="margin-left:140px; margin-top:0px">'.$listItem['fname'].' '.$listItem['lname'].'</h3><br />';

				

					echo '<p class="columnwidth" style="margin-left:140px"> 

					

					<span style="font-weight:bold">email</span> : '.$listItem['email'].'<br />
					<span style="font-weight:bold">fee</span> : '.$listItem['fee'].'<br />';

					



			//echo $row->doctor_id.'<br />';

			//echo $row->fee.'<br />';

			echo '<span style="font-weight:bold">speaciality : </span>'.$listItem['speciality'].'<br />';

			echo  '<span style="font-weight:bold">Address : </span>'.$listItem['address'].'</p><br /><br /></div>';

			
			echo'<input type="button" class="submit" value="Book Appointment"

			 style="width:160px; margin-left:300px;" 

			 onclick="book('.$listItem['docotr_id'].')"/>';

			 echo'<input type="button" class="submit" value="Subscribe"

			 style="width:160px; margin-left:50px;" 

			 onclick="subscribe('.$listItem['docotr_id'].')"/>';

			 

		

			echo "</div>"; 

			

		}

?>



    </p>

    

    </div><!-- END container_12 -->

</div><!-- END GREYSTRIPE -->



</div>



