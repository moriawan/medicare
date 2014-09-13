

<script type="text/javascript" >



function ajaxRequest(){

	 var activexmodes=["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"] //activeX versions to check for in IE

	 if (window.ActiveXObject){ //Test for support for ActiveXObject in IE first (as XMLHttpRequest in IE7 is broken)

		 for (var i=0; i<activexmodes.length; i++){

		 try{

		  return new ActiveXObject(activexmodes[i])

		  }

		 catch(e){

			//suppress error

			}

		   }

		  }

		  else if (window.XMLHttpRequest) // if Mozilla, Safari etc

		   return new XMLHttpRequest()

		  else

		   return false

	 }





function grantAccess(id)

{



	var url = <?php echo "'".base_url()."index.php/permissions/grant"."/'" ; ?> ;

	url = url + id  ;

	var time = document.getElementById('acc'+id).value  ;

	

	url += "/" + time ; 

	

	//alert(url);

	

	var mygetrequest=new ajaxRequest();

		 mygetrequest.onreadystatechange=function(){

		 if (mygetrequest.readyState==4){

		  if (mygetrequest.status==200 || window.location.href.indexOf("http")==-1){

		        var jsondata=mygetrequest.responseText ; //retrieve result as an JavaScript object

		   		//alert(url+jsondata);

		   //var str="";

		   		document.getElementById('grant'+id).value = "Access Granted" ;

				document.getElementById('grant'+id).style.backgroundColor = '#63B952' ;

				document.getElementById('grant'+id).style.width = '140px' ;

				document.getElementById('acc'+id).style.visibility = "hidden"



		   		//alert("Successfully Subscibed");#63B952

				

			  }

				  else{

				     alert("An error has occured making the request");

				  }

			 }

			}

		

			//alert();

			mygetrequest.open("GET", url, true)

			mygetrequest.send(null)



	//window.location = url ;

	

}





function revokeAccess(id)

{

	

	var url = <?php echo "'".base_url()."index.php/permissions/revoke"."/'" ; ?> ;

	url = url + id  ;

	///alert();

	

	

	var mygetrequest=new ajaxRequest();

		 mygetrequest.onreadystatechange=function(){

		 if (mygetrequest.readyState==4){

		  if (mygetrequest.status==200 || window.location.href.indexOf("http")==-1){

		        var jsondata=mygetrequest.responseText ; //retrieve result as an JavaScript object

		   		//alert(url+jsondata);

		   //var str="";

		   		document.getElementById('rew'+id).value = "Access Revoked" ;

				document.getElementById('rew'+id).style.backgroundColor = '#F30' ;

				document.getElementById('rew'+id).style.width = '140px' ;

				

		   		//alert("Successfully Subscibed");#63B952

				

			  }

				  else{

				     alert("An error has occured making the request");

				  }

			 }

			}

		

			//alert();

			mygetrequest.open("GET", url, true)

			mygetrequest.send(null)



	//window.location = url ;

	

}







</script>




<div id="wrapper-patient">


<div class="container_12">

  <!-- begin .grid_4 - IMAGE -->
    <div class="grid_3">
        <img src="<?php echo base_url(); ?>/images/profile/<?php 
		$DP="1";
		echo "DP-Patient-$DP".".jpg"; ?>" alt="" width="100%" />
      
      <div class="formBox" id="formBox1">
             
            
               </div>
      
        	<p class="columnWidth"><a href="<?php echo base_url()."index.php/patient/edit_profile"?>" class="docname">Edit Profile</a></p>
           <ul class="genList">
             <li><a class="links" href="<?php echo base_url()."index.php/groups"; ?>" style="padding-left: 0px; ">Groups</a></li>
            <li><a class="links" href="<?php echo base_url()."index.php/message"?>" style="padding-left: 0px; ">Messages</a></li>
        </ul>
      <a href="#" class="btn" style="opacity: 1; "><img src="<?php echo base_url(); ?>/images/btn.jpg" alt=""></a>
    
      </div><!-- end .grid_4 -->
    
    
    
   
 <div id="patient-landing-panel-right" class="grid_8">  
   
    

<div id="patient-tab-nav" style="font-weight:bold;"> 
<span >
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
<span class="active">
Permissions
</span>
</div>		




<!-- BEGIN GREYSTRIPE -->


    <!-- BEGIN container_12 -->


      <br />
<br />
<br />

    <h1>Pending Requests </h1>

    <br />
<br />


    <p>



<?php



$i=0;

if(sizeof($Requests)>0)

foreach ($Requests as $row)

		{

			

			echo '<div class="search grid_8 result_item" >';

		//	$result2[]=$this->search_model->getName($row->doctor_id);

			

					echo '<div style=" margin-top:10px  ;">

					<div style="float:left">

					

					

					<h4 class="columnwidth name" style="margin-left:20px; margin-top:0px; font-size:14px"><span style="color:#909090 ; font-weight:bold">Doctor :  </span> '.$row['fname'].' '.$row['lname'].'<span style=" margin-left:20px ; color:#909090 ; font-weight:bold">Speciality :  </span> '.$row['speciality'].'</h4>

					<h4 class="columnwidth name" style="margin-left:20px; margin-top:0px; font-size:14px"><span style="color:#909090 ; font-weight:bold">Id :  </span> '.$row['doctor_id'].'<span style=" margin-left:20px ; color:#909090 ; font-weight:bold">Email Id :  </span> '.$row['email'].'</h4>

					

					</div>

					

					<div style="float:right">

					

					<select id="acc'.$row['doctor_id'].'" >

						<option value="2" >2 days </option>

						<option value="5" >5 days </option>

						<option value="7" >7 days </option>

						<option value="15" >15 days </option>

					</select>

					<input id="grant'.$row['doctor_id'].'" type="button" align="right" class="submit" value="Grant Access" onclick="grantAccess('.$row['doctor_id'].')"

					 style="width:100px; margin-right:50px ;" 

					 />

					 </div>

					 

					 

					 



					 

					 ';

					/*echo '

					<div style="float:none" >

					<p class="columnwidth" style="margin-left:20px"> 

					<span style="font-weight:bold;font-size:16px"> Description </span> : '.$row->description.'<br />';

					

					echo '<span style="font-weight:bold">Coversations : </span>'.$row->countConversations.' &nbsp; ';

					echo  '<span style="font-weight:bold">Posts : </span>'.$row->countPosts.'</p></div>';

					

					*/

					

					echo'</div>';

					 

					echo "</div>"; 

			

		}

?>



    </p>

    

  
      <br />

    <h1>Allowed </h1>

    

    <p>



<?php



$i=0;



foreach ($Allowed as $row)

		{

			

			echo '<div class="search grid_8 result_item" >';

		//	$result2[]=$this->search_model->getName($row->doctor_id);

			

					echo '<div style=" margin-top:10px  ;">

					<div style="float:left">

					

					

					<h4 class="columnwidth name" style="margin-left:20px; margin-top:0px; font-size:14px"><span style="color:#909090 ; font-weight:bold">Patient Name :  </span> '.$row['fname'].' '.$row['lname'].'<span style=" margin-left:20px ; color:#909090 ; font-weight:bold">Speciality :  </span> '.$row['speciality'].'</h4>

					<h4 class="columnwidth name" style="margin-left:20px; margin-top:0px; font-size:14px"><span style="color:#909090 ; font-weight:bold">Patient Id :  </span> '.$row['doctor_id'].'<span style=" margin-left:20px ; color:#909090 ; font-weight:bold">Email Id :  </span> '.$row['email'].'</h4>

					

					</div>

					

					<div style="float:right">

					<input id="rew'.$row['doctor_id'].'" type="button" align="right" class="submit" value="Revoke Access" onclick="revokeAccess('.$row['doctor_id'].')"

					 style="width:100px; margin-right:50px ;" 

					 />

					 </div>

					 

					 

					 



					 

					 ';

					/*echo '

					<div style="float:none" >

					<p class="columnwidth" style="margin-left:20px"> 

					<span style="font-weight:bold;font-size:16px"> Description </span> : '.$row->description.'<br />';

					

					echo '<span style="font-weight:bold">Coversations : </span>'.$row->countConversations.' &nbsp; ';

					echo  '<span style="font-weight:bold">Posts : </span>'.$row->countPosts.'</p></div>';

					

					*/

					

					echo'</div>';

					 

					echo "</div>"; 

			

		}

?>



    </p>

    

    </div><!-- END container_12 -->

    

    

    



    

    

    

    

</div><!-- END GREYSTRIPE -->



</div>



