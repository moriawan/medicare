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
	
		<script src="<?php echo base_url(); ?>/javascripts/jquery-ui-1.10.0.custom.min.js"></script>
  
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/jquery.ui.totop.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/superfish.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/hoverIntent.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/effects.js"></script>

        

        

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

      

      

        

        <!-- jQuery plugin init -->

        <script type="text/javascript">

		$(document).ready(function(){   

			// SCROLL TO TOP BUTTON

			$().UItoTop({ easingType: 'easeOutQuart' });

			// SUBMENU

			$('ul.sf-menu').superfish(); 

		

		});

		</script>

 

	<!-- End JavaScript -->  

	
<style type="text/css">
    
	.ui-helper-hidden-accessible{
		
		position:absolute;
		top:-20px;
		}
	
	.ui-menu-item {
		width:150px;
		border:thin;
		border-style:solid;
		padding:4px;
		background:rgba(235,235,235,1);
		cursor:pointer;
		
	}

    .ui-helper-hidden-accessible{
	
	visibility:hidden;
	}
	
    
</style>

    
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

            

             

<?php 

if(!isset($loggedIn)){

	

	if($this->session->userdata('uid'))

		$loggedIn = true;

	else $loggedIn = false;

	}



if($loggedIn): ?>

		  

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

