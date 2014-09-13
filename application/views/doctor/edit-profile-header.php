<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<style >
.layer1 {
margin: 0;
padding: 0;
width: 500px;
}
 
.heading {
margin: 1px;
color: #fff;
padding: 3px 10px;
cursor: pointer;
position: relative;
background-color:#B1E8EC;
width:600px ;
font-size:26px ;
line-height:42px ;
}
.heading_map {
margin: 1px;
color: #fff;
padding: 3px 10px;
cursor: pointer;
position: relative;
background-color:#B1E8EC;
width:600px ;
font-size:26px ;
line-height:42px ;
}
.content_edit {
padding: 5px 10px;
background-color:#fafafa;
width:600px ;
display:none ;
}
.content_edit_map {
padding: 5px 10px;
background-color:#fafafa;
width:600px ;
}

p { padding: 5px 0; }
</style>
<!-- Website title -->
<title>ITS MEDICARE</title>

	<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico" />

	<!-- Begin Stylesheets -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/stylesheets/reset.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/stylesheets/960_12_col.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/stylesheets/layout.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/stylesheets/ui.totop.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/stylesheets/superfish.css" type="text/css" media="screen" />
	<!-- End Stylesheets -->
    
    <!-- Begin Google Web Fonts -->
    	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
	<!-- End Google Web Fonts -->
    
	<!-- Begin JavaScript -->
    
    	<!-- jQuery -->
		<script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/easing.js"></script>
        
        <!-- jQuery plugins -->
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/jquery.ui.totop.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/superfish.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/hoverIntent.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/effects.js"></script>
        <script type="text/javascript"
      src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA119tDlAbT1EfNwEEeXRpEPDHDSg76SPs&sensor=false">
    </script>
        
        <!-- jQuery plugin init -->
        <script type="text/javascript">
		$(document).ready(function(){   
			
			// SCROLL TO TOP BUTTON
			$().UItoTop({ easingType: 'easeOutQuart' });
			
			// SUBMENU
			$('ul.sf-menu').superfish(); 
			
			
			
			jQuery(".content").hide();
  //toggle the componenet with class msg_body
		  jQuery(".heading").click(function()
		  {
			jQuery(this).next(".content_edit").slideToggle(500);
		  });
		  jQuery(".heading_map").click(function()
		  {
			jQuery(this).next(".content_edit_map").slideToggle(500);
		  });
		  
		  
		  
			var geocoder;
			var map;
			var marker;
			var marker2;
			

			initialize();
			
			//$('.content_edit_map').hide();

		});
		
		
function toggleBounce(num) {
	
	// alert();
	
	var pre ;
	
	if(num==2)
		pre = "sec_" ;
	else
		pre = "" ;	
		
	  if (marker.getAnimation() != null) {
		marker.setAnimation(null);
	  } else {
		  
		  if(num==2){ 
			marker2.setAnimation(google.maps.Animation.BOUNCE);
			var lat=marker2.position.lat();
			var lng=marker2.position.lng();
		  }
		  else{
			marker.setAnimation(google.maps.Animation.BOUNCE);
			var lat=marker.position.lat();
			var lng=marker.position.lng();
			  
		  }
		  
	  }
	  
	
	document.getElementById(pre+"latitude").value=lat;
    document.getElementById(pre+"longitude").value=lng;
	
	
		
  }
				
function initialize() {
    geocoder = new google.maps.Geocoder();
	
	var lati = <?php echo $latitude ?> ;
	var long = <?php echo $longitude ?> ;
	
	var lati2 = <?php if($secSchedule==false)
						echo $latitude ;
					else 
						echo $secSchedule['sec_latitude'] ; ?> ;
	var long2 = <?php if($secSchedule==false)
						echo $latitude ;
					else 
						echo $secSchedule['sec_longitude'] ; ?> ;
	
    var latlng = new google.maps.LatLng(lati, long);
	var latlng2 = new google.maps.LatLng(lati2, long2);
    var mapOptions = {
      zoom: 15,
      center: latlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
	
	marker = new google.maps.Marker({
    map:map,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: latlng
  });
  
  google.maps.event.addListener(marker, 'mouseup', function(){ toggleBounce(1); });
  
  
  map2 = new google.maps.Map(document.getElementById("map_canvas2"), mapOptions);
	
	marker2 = new google.maps.Marker({
    map:map2,
    draggable:true,
    animation: google.maps.Animation.DROP,
    position: latlng2
  });
  google.maps.event.addListener(marker2, 'mouseup', function(){ toggleBounce(2); });
  
  //codeAddress();
}

function toggleBounce(num) {
	
	// alert();
	
	var pre ;
	
	if(num==2)
		pre = "sec_" ;
	else
		pre = "" ;	
		
	  if (marker.getAnimation() != null) {
		marker.setAnimation(null);
	  } else {
		marker.setAnimation(google.maps.Animation.BOUNCE);
	  }
	  
	var lat=marker.position.lat();
	var lng=marker.position.lng();
	
	document.getElementById(pre+"latitude").value=lat;
    document.getElementById(pre+"longitude").value=lng;
	
	
		
  }


 		
 function codeAddress(num) {
	
	var pre ;
	
	if(num==2)
		pre = "sec_" ;
	else
		pre = "" ;	
	
	//alert(pre) ;
    var address = document.getElementById(pre+"address").value + " , " +document.getElementById(pre+"doc_city").value;
	
	geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
		  
		  if(num==2)
		  {
			map2.setCenter(results[0].geometry.location);
        	marker2.setPosition(results[0].geometry.location) ;
			var lat=marker2.position.lat();
			var lng=marker2.position.lng();
		  }
		  else
		  {
        	map.setCenter(results[0].geometry.location);
        	marker.setPosition(results[0].geometry.location) ;
			var lat=marker.position.lat();
			var lng=marker.position.lng();
		  }
  				//
			//google.maps.event.addListener(marker, 'click', toggleBounce);
			
			
			document.getElementById(pre+"latitude").value=lat;
			document.getElementById(pre+"longitude").value=lng;
		
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
  
    });
	
	
  }
		
		
		
		
		</script>
 
	<!-- End JavaScript -->  
	
</head>
<body>

<!-- BEGIN container_12 -->
<div class="container_12">

<!-- BEGIN HEADER -->
<div id="header">
	
    <!-- begin .grid_3 - LOGO -->
    <div id="logo" class="grid_3">
    	<img src="<?php echo base_url(); ?>/images/logo.png" alt="" />
    </div><!-- end .grid_3 -->
    
    <!-- begin .grid_9 - NAVIGATION -->
    <div id="navigation" class="grid_9">
        
        <ul class="sf-menu">
			<li class="top-item">
            	<a href="<?php echo base_url();?>">Home</a><!-- main item -->
				<ul class="sub-items">
					<li class="first-sub"><a href="index.html">maker 2</a></li>
					<li class="last-sub"><a href="index_orbit.html">Orbit Slider</a></li>
				</ul>
			</li>
           
			<li class="top-item">
				<a href="#"><?php $user="Aman Verma"; echo $user;?></a><!-- main item -->
               
			</li>	
			<li class="top-item">
			<a href="http://localhost/medicare/index.php/activity/get" id="notifications" class="popupButton">0</a>
            <!-- main item -->
			</li>	
		</ul>
        
    </div><!-- end .grid_9 -->
    
    <div class="clear"></div>
    
</div><!-- END HEADER -->
	
    <!-- begin TITLE -->
    <div id="title">
		<!-- begin .grid_12 -->
        <div class="grid_12">
			<div class="title">Services</div>
            <div class="sub-title">"page type info will be displayed here"
</div>
            <div class="clear"></div>
        </div><!-- end .grid_12 -->
  </div><!-- end TITLE -->
	
  <!-- begin .grid_4 - IMAGE -->
    <!-- end .grid_4 -->
    
    

<!-- end of center content, please contact AMV before modifiying center code -->


</div><!-- END container_12 -->
