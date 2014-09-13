<div id="wrapper">

<div class="container_12">

  <!-- begin .grid_4 - IMAGE -->
    <div class="grid_3">
        <img src="<?php echo base_url(); ?>/images/profile/<?php 
		$DP="1";
		echo "DP-$DP".".jpg"; ?>" alt="" width="100%" />
      
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
  		<h1 style="margin:3px !important ; border-bottom:none !important"> My Patients </h1>
            <table id="rounded-corner" summary="2007 Major IT Companies' Profit">
            <thead>
                <tr>
                	<th scope="col" class="rounded" width="30px">S.No.</th>
                    <th scope="col" class="rounded-company !important">Id</th>
                    <th scope="col" class="rounded-company !important">Patient Name</th>
                    <th scope="col" class="rounded-q1">Email</th>
                    <th scope="col" class="rounded-q2">Mobile</th>
                    <th scope="col" class="rounded-q3">Profile</th>
                    <th scope="col" class="rounded-q4">Reports</th>
                </tr>
            </thead>
                
            <tbody>
            
            <?php 
            
			$cnt = 1 ;
			foreach($patients as $patient ){
				
				echo '<tr>
						<td>'.$cnt.'</td>
						<td>'.$patient['patient_id'].'</td>
						<td>'.$patient['fname'].' '.$patient['lname'].'</td>
						<td>'.$patient['email'].'</td>
						<td>'.$patient['mobile'].'</td>
						<td><a href="" >View </a></td>
						<td><a href="">Check</a></td>
                	</tr>';
				$cnt++ ;
				
			}
				
			
			?>
                
                
            </tbody>
            <tfoot>
                <?php
				
					if($cnt>9)
					echo '<tr>
							
							<td colspan="6">
							
							</td>
							<td>
							
							<a href="'.base_url().'index.php/doctor/my_patients/'.$nextPage.'" >
							Next 
							</a>
							</td>
					
					</tr>';
				
				?>
            </tfoot>
        </table>
    
    
    </div>
    
    
       <br />
	      

       

</div>

</div>