<div id="wrapper">







<div class="container_12">







  <!-- begin .grid_4 - IMAGE -->



    <div class="grid_3">



        <img src="<?php echo base_url(); ?>/images/profile/<?php 



		$DP = $uid;



		echo "DP-Doc-$DP".".jpg"; ?>" alt="" width="100%" />



      <div class="formBox" id="formBox1">



     <?php 



		 if($owner):



	 ?>       

       <textarea id="advice" name="advice" class="area required" rows="" cols="" placeholder="Share an advice . . . "></textarea> 

<?php 



else: echo  '<p class="columnWidth" style="font-weight:bold; font-size:16px; padding-left:10px;">'.$name.'</p>';







endif;



?>



               </div>



      		



            <?php



        	if($owner) echo '<p class="columnWidth"><a href="'.base_url().'index.php/doctor/edit_profile" class="docname">Edit Profile</a></p>';



           



		   ?>



		   <ul class="genList">



         

           

            <?php 

            if($owner == false ):

			?>

                <li>

         <a class="links" href="<?php echo base_url(); ?>index.php/message/thread/<?php echo $userId."/".$uid; ?>" style="padding-left: 0px; ">send message</a>

            

            <?php 

			else :

			?>

            

           

           

             <li><a class="links" href="<?php echo base_url();?>index.php/doctor/e_appointments/">e-appointments<?php if(sizeof($eAppointments)>0) echo " (".sizeof($eAppointments).")"; ?></a></li>



              <li><a class="links" href="#" style="padding-left: 0px; ">patients</a></li>



         



            <li><a class="links" href="<?php echo base_url();?>index.php/feeds/myfeeds/<?php 



			



			echo $cid;	



			



					



			//echo $cid;?>" style="padding-left: 0px; ">view feeds</a></li>



           <li> <a class="links" href="#" style="padding-left: 0px; ">messages</a>

            <?php 

			endif;

			

			?>

            </li>



        </ul>



      <a href="#" class="btn" style="opacity: 1; "><img src="<?php echo base_url(); ?>/images/btn.jpg" alt=""></a>



      </div><!-- end .grid_4 -->



    



    <div class="grid_8">  



  



<?php 



if($owner):







?>











<div id="appointments" style="visibility:hidden; position:absolute; width:100px; height:auto; padding:20px;">























<div id="cross" style="position:absolute; right:5px; top:3px; width:20px; height:20px; cursor:pointer" onclick="closelist()">x</div>







Appointments







<div id="appointment_list">



</div>







</div>











    <table width="100%" border="0" cellspacing="0" cellpadding="0">



                <thead>



                    <tr>



                    



<?php 



			







//make cyclic



	



for($l=0; $l<7;$l++){







	echo '<th style="width:200px;">'.substr($day_name[$l],0,3).'</th>';







}











?>



                    </tr>



                </thead>



                <tfoot>



                    <tr>



                    <td colspan="7"><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></td>



                    </tr>



            	</tfoot>



            	



                <tbody>







<?php 







for($j=0;$j<7;$j++){







	$size[$j]=sizeof($data['schedule'][$day_name[$j]]);







}







$maxslots=max($size);







//echo "<br />max slot = ".$maxslots;







for($k=0;$k<$maxslots;$k++){







	echo "<tr>";







	for($i=0;$i<7;$i++){











	if(isset($data['schedule'][$day_name[$i]][$k]))



		{







			$slot_time=$data['schedule'][$day_name[$i]][$k];







		}



	else {







			$slot_time = "N/A";  







		}











		if($k<sizeof($data['schedule'][$day_name[$i]]) && isset($data['app_time'][$day_name[$i]][$k])){







			$occupancy=sizeof($data['app_time'][$day_name[$i]][$k])/$rate_appointment;







			$hiddendiv="<div class='hiddendiv'>";



			



			foreach ($data['app_time'][$day_name[$i]][$k] as $appointment){



				



				$hiddendiv.="$appointment<br />";



				}



			



			$hiddendiv.="</div>";







			$occupancy=number_format($occupancy,1)*10;



			



			echo "<td class='data_".$occupancy." table_data' onclick='move_appointments(event)' >



			".$slot_time."<br />".$hiddendiv."</td>";







		}







		else echo "<td>".$slot_time."</td>";



			



	}







}











endif;



 ?>



  



                    </tr>



            	</tbody>



            	



            </table>



            



            



            



       



       <br />







       



<?php 



if($owner):

if($today):?>     



<div class="grid_8">



        	<div class="alertMessage"><img src="<?php echo base_url(); ?>/images/messages/alert.png" alt="">&nbsp;&nbsp;&nbsp;You



             have 



             <?php



             



			 echo sizeof($today);



			 ?> 



            appointments today</div>



        </div>



        



        



<div class="grid_8">



    	<ul class="genList">



            



            <?php
            
			foreach($today as $app):
						
			?>
            
            <li><a href="<?php echo base_url().'index.php/doctor/process_appointment/'.$app['transaction_id'] ;  ?>" >
            	<h5><span class="date"><?php echo $app['appointment_time']; ?></span>&nbsp;|&nbsp;<?php echo $app['patient_name']; ?></h5>
            	"<?php echo $app['problem']; ?>."
                
                </a>
            </li>
            
            
          <?php endforeach;?>



        </ul>



        <a class="toBlog" href="#">see all appointments &nbsp;<img src="<?php echo base_url(); ?>/images/linkarrow.jpg" alt=""></a>



    </div>



<?php else: ?>



  <a class="toBlog" href="#"><br />



You have no appointments today &nbsp;<img src="<?php echo base_url(); ?>/images/linkarrow.jpg" alt=""></a>



  



  <?php 

  

  endif;

  endif; 

	

  ?>







	</div>



</div>







</div>