<script type="text/javascript" >
	
	var avail = "<?php 
					if(isset($availability))
					echo $availability;
					else
					echo "1111111" ;
					 ?>" ;
	var time = "<?php
					if(isset($time))
					echo $time;
					else
					echo '' ;
					 ?>" ;
	var fee = "<?php 
					if(isset($fee))
					echo $fee;
					else
					echo '' ;
					 ?>" ;
	var speciality = "<?php echo $speciality ?>" ;
	var city = "<?php echo $city ?>" ;
	var state = "<?php 
					if(isset($state))
					echo $state;
					 ?>" ; 
	
	
	function filterresults( act , data )
		{
			if(act=='day'){
				
				if(avail=="1111111")
				avail="0000000"
				
				var newavail = "" ;
				//alert(avail) 
				for(var i=0 ; i<7 ; i++){
					if((i)==data){
						if(avail[i]=="0")
							newavail += "1" ;
						else	
							newavail += "0" ;
					}
					else if(avail[i]=="1")
						newavail += "1" ;
					else 
						newavail += "0" ;
				}
				
				avail = newavail ;
				//alert(avail) ;
			}
			if(act=='time'){
				
				time = data ;	
				
			}
			if(act=='fee'){
				
				fee = data ;	
				
			}
			
		callurl();
		
	}

	function callurl(){
		
		var url = '<?php echo base_url(); ?>' ;
		
		url += "index.php/filters/?city="+city+"&availability="+avail+"&speciality="+speciality ;
		
		if(time!=""){
			url += "&time=" + time ; 	
		}
		if(fee!=""){
			url += "&fee=" + fee ; 	
		}
		
		window.location = url ;
		
	}


</script>
<div id="wrapper">
<!-- BEGIN GREYSTRIPE -->
<div id="greyStripe" style="position:relative; top:-50px">
    <!-- BEGIN container_12 -->
    
    <div id="map_container" class="container_12" style="background:rgba(255,255,255,1); padding:10px ;">
    	<div id="map_canvas" style="width:915px; height:300px; margin-left:20px"></div>
    </div>
    
    <div class="container_12" style="background:rgba(255,255,255,1); padding:10px;">
      <br />
      
    <div class="grid_3 filter" >
    
    	<div class="dlist_left_mid">
      <table width="139" border="0" cellspacing="0" cellpadding="3">
	  <tbody><tr>
	  <td valign="middle">
	  <div style="font-size:15px;"><b>Filter By:</b>&nbsp;</div></td><td valign="middle"><a href="javascript:applyFilter();"><img src="images/apply-btn.jpg" border="0"></a>
	  </td></tr>
	  </tbody></table>
      
      
	  <input type="hidden" name="day" value="1111111" >
	  <table width="100%" border="0" cellspacing="0" cellpadding="6">
	  <tbody><tr><td bgcolor="#E9E9E9"><b>Days</b></td></tr>
	  <tr><td>
	  <ul class="bullet3">
      <?php
	  
	  	 $days[0]="Monday";
		 $days[1]="Tuesday";
		 $days[2]="Wednesday";
		 $days[3]="Thrusday";
		 $days[4]="Friday";
		 $days[5]="Sauturday";
		 $days[6]="Sunday";  
		 
		 $i=0 ;
		 foreach($days as $day )
	  		{
				if(isset($availability)&&$availability[$i]=='1')
					$checked = "checked=true" ;
				else
					$checked = "" ;
				
	  			echo '<li><input type="checkbox" id="day_filter_'.$i.'" value="6" '.$checked.' onchange="filterresults(\'day\' , '.$i.' )"> <b style="font-size:11px;">'.$day.'</b></li>';
				$i++ ;	
			}		
		?>
                
        
		</td></tr>
		<tr><td bgcolor="#E9E9E9"><b>Timings</b></td></tr>
	    <tr><td>
		<ul class="bullet3">
        <?php 
		
		 $timeDuration[0]="0000-0900";
		 $timeDuration[1]="0900-1200";
		 $timeDuration[2]="1200-1700";
		 $timeDuration[3]="1700-2000";
		 $timeDuration[4]="2000-2400";
		 
		 $timeName[0]=" Before 9 AM";
		 $timeName[1]="9 AM - Noon";
		 $timeName[2]="Noon - 5pm";
		 $timeName[3]="5 PM - 8pm";
		 $timeName[4]="After - 8pm";
		
		 $i=0 ;
		 foreach($timeDuration as $tm )
	  		{
				if(isset($time)==true&&$tm==$time)
					$selected = 'checked=true' ;
				else
					$selected = "" ;
				
	  			echo '<li><input type="radio" name="time" value="'.$tm.'" '.$selected.' onchange="filterresults(\'time\' ,  \''.$timeDuration[$i].
				'\' )"  > <b style="font-size:11px; ">'.$timeName[$i].'</b></li>';
				$i++ ;	
			}	
		
		?>

		</ul>
		</td></tr>
	  <tr><td bgcolor="#E9E9E9"><b>Consultation Fee</b></td></tr>
	  <tr><td>
	  <ul class="bullet3">
      <?php  
	  
	  	 $feeVal[0]="0-199";
		 $feeVal[1]="200-399";
		 $feeVal[2]="400-699";
		 $feeVal[3]="700-1000";
		 $feeVal[4]="1000-10000";
		 
		 $feeName[0]="Upto Rs. 199";
		 $feeName[1]="Rs. 200 -  Rs. 399";
		 $feeName[2]="Rs. 400 -  Rs. 699";
		 $feeName[3]="Rs. 700 -  Rs. 1000";
		 $feeName[4]="Above Rs. 1000";
		
		 $i=0 ;
		 foreach( $feeName as $fe )
	  		{
				if(isset($fee)==true&&$feeVal[$i]==$fee)
					$selected = 'checked="yes"' ;
				else
					$selected = "" ;
				
	  			echo '<li><input type="radio" name="fee" value="'.$feeVal[$i].'" '.$selected.' onchange="filterresults(\'fee\' ,  \''.$feeVal[$i].
				'\' )"  > <b style="font-size:11px; ">'.$fe.'</b></li>';
				$i++ ;	
			}	
		
	  
	  ?>
	   </ul>
	  </td></tr>
	  	  	  	  </tbody></table>
	  </form>
    </div>
    </div>
	<div class="grid_6" style=" padding:20px;" style="float:left">
    <h1>Search results</h1>
    </div>
    <div class="grid_2" style=" padding:20px;" style="float:right">
    <input type="button" id="map_button" value="Show Map" onclick="showmap();"  />
    </div>
    
    
    
    <p>