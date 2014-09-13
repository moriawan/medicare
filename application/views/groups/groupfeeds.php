
<div id="wrapper">
<!-- BEGIN GREYSTRIPE -->
<div id="greyStripe" style="position:relative; top:-20px;">
    <!-- BEGIN container_12 -->
    <div class="container_12" style="background:rgba(255,255,255,1); padding:10px;">
      <br />
    <div style="float:left; margin-left:50px;">
    <h1 style="border-bottom:none">Groups </h1>
    </div>
    
    <div style="float:right; margin-right:50px;"> 
    <a href="<?php echo base_url() ; ?>index.php/groups/startfeed" >
    <input type="button" align="right" class="submit" value="Start a Topic"
					 style="width:100px; margin-right:50px ;" 
					 />
	</a>
    
    </div>
    
    
    <div style="clear:both"></div>
    
    <p>
    <br />

<?php

$i=0;

foreach ($result as $row)
		{
			
			$timestamp = $row->lastPostTime ;
			$date =  gmdate("F j, g:i a", $timestamp);
			
			
			echo '<div class="search grid_10 result_item" style=" padding:20px;">';
		//	$result2[]=$this->search_model->getName($row->doctor_id);
			
					echo '<div>
					<p>
					<div style="float:left">
					<h3 class="columnwidth name" style="margin-left:20px; margin-top:0px; font-size:20px">'.$row->title.'</h3></div>
					<div style="float:right">
					<p>
					<span style="font-weight:bold">Comments : </span>'.$row->countPosts.' &nbsp;
					<span style="font-weight:bold">Unread : </span>'.$row->unread.' &nbsp;
					<input type="button" align="right" class="submit" value="View Feeds"
					 style="width:100px; margin-right:50px ;" 
					 onclick="view_feeds(\''.$row->conversationId.'\')"/>
					 
					 </p>
					 </div>
					 
					 <div style="clear: both;"></div>
					 
					</p>
					 
					 ';
					 echo '
					<div style="float:none" >
					<p class="columnwidth" style="margin-left:20px"> 
					<span style="font-weight:bold;font-size:16px">'.$row->lastPostMember.' </span> commented at '.$date.'<br />';
					
					echo '</p></div>';
					echo " </div> </div>"; 
			
		}
?>

    </p>
    
    </div><!-- END container_12 -->
</div><!-- END GREYSTRIPE -->

</div>

