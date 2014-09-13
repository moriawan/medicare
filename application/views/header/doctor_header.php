<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



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

         <link rel="stylesheet" href="<?php echo base_url(); ?>/stylesheets/base.css" type="text/css" media="screen" />

       

	<!-- End Stylesheets -->

    

    <!-- Begin Google Web Fonts -->

    	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

	<!-- End Google Web Fonts -->

  

  

  

<style type="text/css">

   

   

   #appointments {

	position: absolute;

	width: 200px;

	min-height: 100px;

	left: 0px;

	top: 0px;

	background: #FFF;

	z-index: 40;

	text-align: center;

	color: #666;

	border-top-right-radius: 8px;

	border-bottom-right-radius: 8px;

	border-bottom-left-radius:8px;

	border: thin;

	border-style: solid;

}

        #appointments #appointment_title {

	width: 100%;

	background: #399;

	border-bottom: solid;

	padding-top: 10px;

	padding-bottom: 10px;

}

/*

 #appointments .hiddendiv{

	 

	 	 visibility:visible;

	 }*/

</style>
        

  

	<!-- Begin JavaScript -->

    

    	

        <!-- jQuery -->

		<script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/jquery-1.6.4.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/easing.js"></script>

        

        

        

        <!-- jQuery plugins -->

        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/jquery.ui.totop.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/superfish.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/hoverIntent.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/effects.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/jquery.balloon.min.js"></script>
        


        

        

        <!-- esotalk -->        

		

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

		 

		

	//////////////////////////////////////////////////////	

				  

		  (function poll(){

			 setTimeout(function(){

			  $.ajax({

				  type: "POST",

				  url: "<?php echo base_url(); ?>index.php/message/poll/"+<?php echo $uid;?>,

				  data: { name: "John", location: "Boston" }

					  }).done(function( msg ) {

							

							$('#poll').html(msg);

							console.log( "Data Saved: " + msg );

							poll();

					  

							});

			}, 3000);

		  })();

		  

		  



		///////////////////////////////////////////

		

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



		

		$(".table_data").click(function(event){

			move_appointments(event);
			});

		$('td').showBalloon().mouseover(
				function(){ 
				var temp = $(this).find('div').html() ;
				
				$(this).showBalloon({
				  	contents: '<a href="#"> '+temp+' </a><br />' ,
					position: "bottom" ,
					showDuration: 100 ,
					hideDuration: 0
					
				}); }
			  ).mouseout(function(){ $(this).hideBalloon(); });
			

		

		});

	

function move_appointments(e){

	

	var appointments=document.getElementById('appointments');

	var appointment_list=document.getElementById('appointment_list');

	

	

	//alert(e.target.innerHTML);

	

	if(appointments.style.visibility=="hidden"||1)

	{

		var hid = $(e.target).children()[1].innerHTML;

		

		//appointment_list.innerHTML= e.target.innerHTML;

		

		

		appointment_list.innerHTML=hid;

		appointments.style.visibility="visible";

		

		

		}

	else {

		appointments.style.visibility="hidden"

		appointment_list.innerHTML="";

	}

	

	

	var curx=(window.Event) ? e.pageX : event.clientX + (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);

	

	

	var cury=(window.Event) ? e.pageY : event.clientY + (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);





curx=curx*1-20;

cury=cury*1+20;







	appointments.style.left=curx+"px";

	appointments.style.top=cury+"px";

	

	}





function closelist(){

	

	var list = document.getElementById('appointments');

	

	list.style.visibility = "hidden"

	

	}





function goTo_eAppointment(tid){

	

	window.location = "<?php echo base_url() ?>index.php/doctor/process_eAppointment/"+tid;

	

	}





function goToMessage(from, to, user_2){

	

	window.location = "<?php echo base_url() ?>index.php/message/thread/"+from+"/"+to+"/1/"+user_2;

		

	}





function processMessage(from, to, user_1, user_2){

	

	

	var message = $('#message_text').val();

	

//$('#message_text').css("width","100px");

	 

	

	sendMessage(from, to, message, user_1, user_2);

	}





function sendMessage(from,to, message, user_1, user_2){

	

	//alert(from+" "+to+" "+message);

	//alert(message);

	message = encodeURIComponent(message);

	

	alert(from+" "+to+" "+user_1+" "+user_2+" "+escape(message));

	//alert(message);

	//return;

	

	window.location = "<?php echo base_url() ?>index.php/message/sendMessage/"+from+"/"+to+"/"+message+"/"+user_1+"/"+user_2;

		

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

				

				

				if(isset($name))echo $name;

				else echo "Sign in or Register";

				?></a><!-- main item -->

               

			</li>

       

<?php if($loggedIn): ?>

		  

           	<li class="top-item">

            	<a href="<?php echo base_url();?>index.php/logout">Logout</a><!-- main item -->

			

			</li>

           	

			<li class="top-item" style="background:rgba(102,102,102,1); border-radius:3px; color:rgba(255,255,255,1)">

			<a href="<?php echo base_url(); ?>index.php/message" id="poll" class="messages">0</a>

            </li>

            <li class="top-item" style="background:rgba(102,102,102,1); border-radius:3px">

            <a href="<?php echo base_url()?>index.php/activity/get" id="notifications" class="popupButton">0</a>

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

