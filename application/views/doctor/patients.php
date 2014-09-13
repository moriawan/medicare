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
    
    
    <?php 
    
    $attributes = array('id' => 'form2');
    echo form_open('doctor/patients', $attributes) 
    
    ?>
   
        
        <input type="text" style="width:120px" class="field required " placeholder="Patient Id" name="pat_id" />
        
        <span style="width:10px" > </span>

        <input type="text" style="width:120px" class="field required" placeholder="Frist Name" name="fname"/>
        
        <span style="width:10px" > </span>

        <input type="text" style="width:120px" class="field required" placeholder="Last Name" name="lname"/>
        
        <input type="submit" class="submit" value="Search"
					 style="width:90px;" 
					 />
         <br />
         <br />
    </form>
    
    
            <table id="rounded-corner" summary="2007 Major IT Companies' Profit">
            <thead>
                <tr>
                	<th style="padding:5px !important; padding-bottom:15px !important ; padding-top:15px !important">S.No.</th>
                    <th style="padding:5px !important" >Id</th>
                    <th  style="padding:10px !important; width:150px " >Patient Name</th>
                    <th  style="padding:5px !important; width:200px">Email</th>
                    <th  style="padding:5px !important; width:120px" scope="col" class="rounded-q2">Mobile</th>
                    <th  style="padding:5px !important" scope="col" class="rounded-q3">Profile</th>
                    
                </tr>
            </thead>
                
            <tbody>
            
            <?php 
            
			$cnt = 1 ;
			
			if($patients) 
			foreach($patients as $patient ){
				
				echo '<tr>
						<td  style=" padding-bottom:10px !important padding:5px !important;">'.$cnt.'</td>
						<td  style="padding:5px !important">'.$patient->patient_id.'</td>
						<td  style="padding:10px !important; margin-left:20px !important ">'.$patient->fname.' '.$patient->lname.'</td>
						<td  style="padding:5px !important">'.$patient->email.'</td>
						<td  style="padding:5px !important">'.$patient->mobile.'</td>
						<td  style="padding:5px !important"><a href="'.base_url().'/index.php/permissions/request/'.$patient->patient_id.'" >View </a></td>
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