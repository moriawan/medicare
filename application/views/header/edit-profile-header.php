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
.content_edit {
padding: 5px 10px;
background-color:#fafafa;
width:600px ;
display:none ;
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
		
		var geocoder;
		var map;
		var marker;

		
		
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
		  
		  
		  
			
			initialize();

		});
		
		
				
function initialize() {
    
	geocoder = new google.maps.Geocoder();
	var lati = <?php echo $latitude ?> ;
	var long = <?php echo $longitude ?> ;
    var latlng = new google.maps.LatLng(lati, long);
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
}

		
function toggleBounce() {
	
	//alert();
		
	  if (marker.getAnimation() != null) {
		marker.setAnimation(null);
	  } else {
		marker.setAnimation(google.maps.Animation.BOUNCE);
	  }
	
	var lat=marker.position.lat();
	var lng=marker.position.lng();
	
	document.getElementById("latitude").value=lat;
    document.getElementById("longitude").value=lng;
	
  }

 		
 function codeAddress() {
	
	var city = document.getElementById("city").value
    var address = document.getElementById("address").value;
    
	geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        marker.setPosition(results[0].geometry.location) ;
		//
  		//google.maps.event.addListener(marker, 'click', toggleBounce);
		var lat=marker.position.lat();
		var lng=marker.position.lng();
		
		document.getElementById("latitude").value=lat;
		document.getElementById("longitude").value=lng;
		
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
				<a href="#"><?php 
				
				
				if(isset($name))echo $name;
				else echo "Sign in or Register";
				?></a><!-- main item -->
               
			</li>
            
            	<li class="top-item">
            	<a href="<?php echo base_url();?>">Dashboard</a><!-- main item -->
			
			</li>
            
        
            
			
       
<?php if($loggedIn): ?>
		  
           	<li class="top-item">
            	<a href="<?php echo base_url();?>index.php/logout">Logout</a><!-- main item -->
			
			</li>
           		<li class="top-item" style="background:rgba(102,102,102,1); border-radius:3px; color:rgba(255,255,255,1)">
			<a href="<?php echo base_url(); ?>index.php/message" id="poll" class="messages">0</a>
            </li>
          
			<li class="top-item" style="background:rgba(102,102,102,1); border-radius:3px">
			<a href="http://localhost/medicare/index.php/activity/get" id="notifications" class="popupButton">0</a>
            <!-- main item -->
			</li>	
            
<?php endif; ?>

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