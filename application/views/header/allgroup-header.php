<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- Website title -->
<title>ITS MEDICARE</title>

	<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico" />


    <!-- Esotalk -->
	
        <link rel="stylesheet" href="<?php echo base_url(); ?>/esotalk/skins/base/base.css" type="text/css" media="screen" />
       


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
        
        
		
<?php if($loggedIn): ?>
		
        <!-- esotalk -->        
        <script type="text/javascript">
        
		function ET (){
			
			this.webpath = '<?php echo base_url(); ?>';
			
			this.language = new Array();
			
			this.language['message.ajaxRequestPending']="Hey! We're still processing some of your stuff! If you navigate away from this page you might lose any recent changes you've made, so wait a few seconds, ok?";
			this.language['message.ajaxDisconnected']="Unable to communicate with the server. Wait a few seconds and try again, or refresh the page.";
			this.language['Loading...']="Loading...";
			this.language['Notifications']="Notifications";
						
							
			this.userId='<?php echo $this->session->userdata('eso_id'); ?>';
			this.token='<?php echo $this->session->userdata('token');?>';
			
			this.notificationCheckInterval=30;
			
			}
			
		 var ET = new ET() ;
		 
		
        </script>    
		  
		  <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/medicare-global.js"></script>
      
 <?php endif; ?>     
        
        <!-- jQuery plugin init -->
        <script type="text/javascript">
		$(document).ready(function(){   
			
			// SCROLL TO TOP BUTTON
			$().UItoTop({ easingType: 'easeOutQuart' });
			
			// SUBMENU
			$('ul.sf-menu').superfish(); 

		});
	
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
	
	
	function subscribe(slug,chnId,title,desc)
	{
		
		
		var docID = <?php echo "'".$uid."'" ?> ;
		var url ="<?php echo base_url()?>index.php/groups/subscribe/?doc="+docID+"&ch="+chnId+"&slug="+slug+"&title="+title+"&desc="+desc ;
		
		var mygetrequest=new ajaxRequest();
		 mygetrequest.onreadystatechange=function(){
		 if (mygetrequest.readyState==4){
		  if (mygetrequest.status==200 || window.location.href.indexOf("http")==-1){
		   //var jsondata=eval("("+mygetrequest.responseText+")") //retrieve result as an JavaScript object
		   //alert("friend name"+jsondata.id);
		   //var str="";
		   		document.getElementById('subs'+chnId).value = "Subscribed" ;
				document.getElementById('subs'+chnId).style.backgroundColor = '#63B952' ;
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

		
		
		}
		
	function view_feeds(id){
		//alert("<?php echo base_url()?>index.php/groups/channel/"+id); 
		window.location="<?php echo base_url()?>index.php/groups/channel/"+id;
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
			
			</li>
			<li class="top-item">
				<a href="#"><?php				
				
				if($name=$this->session->userdata('name'))echo $name;
				else echo "Sign in or Register";

?></a><!-- main item -->
               
			</li>
          
<?php if($loggedIn): ?>
		  
           	<li class="top-item">
            	<a href="<?php echo base_url();?>index.php/logout">Logout</a><!-- main item -->
			
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
