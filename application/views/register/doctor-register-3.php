
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
echo form_open('register/doctor_welcome', $attributes) 

?>


<!-- 
  function insert_profile_reg($doc_id)
    {
		$data['doctor_id'] = $doc_id ;
    	$data['doctor_year'] = $_POST['doc_year']; 
        $data['doctor_grad_year'] = $_POST['doc_grad_year'];
		$data['doctor_grad_degree'] = $_POST['doc_grad_degree']; 
        $data['doctor_grad_college'] = $_POST['doc_grad_coll'];
		$data['doctor_postgrad_year'] = $_POST['doc_pgrad_year'];
		$data['doctor_postgrad_degree'] = $_POST['doc_pgrad_degree']; 
        $data['doctor_postgrad_college'] = $_POST['doc_pgrad_coll'];
        $data['doctor_supergrad_year'] = $_POST['doc_sgrad_year'];
		$data['doctor_supergrad_degree'] = $_POST['doc_sgrad_degree']; 
        $data['doctor_supergrad_college'] = $_POST['doc_sgrad_coll'];
		$this->db->insert('doctors_profile', $data);
    }

        -->


<label for="doctor_year" class="lbl">Practicing since : </label>
<?php echo "<select name='doctor_year' id='doctor_year' ";

$curYear = date('Y');

for($k=1960;$k<$curYear;$k++)
{ echo "<option>$k</option>"; }
	
echo "</select> "; ?>


<br>





<input id="doctor_grad_degree" name="doctor_grad_degree" class="field required"  placeholder="Graduation Degree" type="text" />
<label for="doctor_grad_year" class="lbl">Graduation year : </label>
<?php echo "<select name='doctor_grad_year' id='doctor_grad_year' ";

$curYear = date('Y');

for($k=1942;$k<$curYear;$k++)
{ echo "<option>$k</option>"; }
	
echo "</select> "; ?>

<br />

<input id="doctor_grad_college" name="doctor_grad_college" class="field required full"  placeholder="Graduation College" type="text" />



<br />
<br>

<br />

<input id="doctor_postgrad_degree" name="doctor_postgrad_degree" class="field required"  placeholder="Post Graduation Degree" type="text" />
<label for="doctor_postgrad_year" class="lbl">Post Graduation year : </label>
<?php echo "<select name='doctor_postgrad_year' id='doctor_postgrad_year' ";

$curYear = date('Y');

for($k=1942;$k<$curYear;$k++)
{ echo "<option>$k</option>"; }
	
echo "</select> "; ?>

<br />

<input id="doctor_postgrad_college" name="doctor_postgrad_college" class="field required full"  placeholder="Post Graduation College" type="text" />






<br />
<br>

<br />

<input id="doctor_supergrad_degree" name="doctor_supergrad_degree" class="field required"  placeholder="Super Graduation Degree" type="text" />
<label for="doctor_supergrad_year" class="lbl">Super Graduation year : </label>
<?php echo "<select name='doctor_supergrad_year' id='doctor_supergrad_year' ";

$curYear = date('Y');

for($k=1942;$k<$curYear;$k++)
{ echo "<option>$k</option>"; }
	
echo "</select> "; ?>

<br />

<input id="doctor_superostgrad_college" name="doctor_supergrad_college" class="field required full"  placeholder="Super Graduation College" type="text" />




<br />
<br />


                 <input type="submit" id="submit" value="Next Page" />
                
              
                
            </form><!-- end #form1 -->
    </div><!-- end .grid_4 -->
        
        </div><!-- end SERVICES - LINE 1 -->   
        
        
    </div><!-- END container_12 -->
</div><!-- END GREYSTRIPE -->

</div>

