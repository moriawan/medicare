
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
    <a href="<?php echo base_url() ; ?>index.php/groups/create" >
    <input type="button" align="right" class="submit" value="Create Group"
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
			
			echo '<div class="search grid_10 result_item" style=" padding:20px;">';
		//	$result2[]=$this->search_model->getName($row->doctor_id);
			
					echo '<div>
					<div style="float:left" onclick="view_feeds(\''.$row->slug.'\')">
					<h3 class="columnwidth name" style="margin-left:20px; margin-top:0px; font-size:30px">'.$row->title.'</h3></div>
					
					<div style="float:right">
					<input id="subs'.$row->channelId.'" type="button" align="right" class="submit" value="Subscribe"
					 style="width:160px; margin-right:50px ;" 
					 onclick="subscribe(\''.$row->slug.'\',\''.$row->channelId.'\',\''.$row->title.'\',\''.$row->description.'\')"/>
					 </div>
					 <div style="clear: both;"></div>

					 
					 ';
					echo '
					<div style="float:none" >
					<p class="columnwidth" style="margin-left:20px"> 
					<span style="font-weight:bold;font-size:16px"> Description </span> : '.$row->description.'<br />';
					
					echo '<span style="font-weight:bold">Coversations : </span>'.$row->countConversations.' &nbsp; ';
					echo  '<span style="font-weight:bold">Posts : </span>'.$row->countPosts.'</p></div>';
					
					echo'</div>';
					 
					echo "</div>"; 
			
		}
?>

    </p>
    
    </div><!-- END container_12 -->
</div><!-- END GREYSTRIPE -->

</div>

