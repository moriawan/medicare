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
        <link rel="stylesheet" href="<?php echo base_url(); ?>/stylesheets/base.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/stylesheets/ui.totop.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>/stylesheets/superfish.css" type="text/css" media="screen" />
        
        <link rel="stylesheet" href="<?php echo base_url(); ?>stylesheets/mosaic.css" type="text/css" media="screen" />
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

.grid_4 {
	margin:30px
}


/*
 #appointments .hiddendiv{
	 
	 	 visibility:visible;
	 }*/
</style>
        


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
  
  
	<!-- Begin JavaScript -->
        	
        <!-- jQuery <script src="js/jquery-1.9.0.js"></script> -->
		<script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/jquery-1.6.4.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/easing.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/sorttable.js"></script>
        
     
        
        <!-- jQuery plugins -->
         
		<script src="<?php echo base_url(); ?>/javascripts/jquery-ui-1.10.0.custom.min.js"></script>
  
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/jquery.ui.totop.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/superfish.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/hoverIntent.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/effects.js"></script>
        
          <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/mosaic.1.0.1.min.js"></script>
      
        
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
		 
		
        </script>    
		  
		  <script type="text/javascript" src="<?php echo base_url(); ?>/javascripts/medicare-global.js"></script>
      
 <?php endif; ?>     
        
      
        
        
        <!-- jQuery plugin init -->
        <script type="text/javascript">

<?php

if(isset($apps))
{
	$i=0;
	$j=0;

	$flag =0;	
	echo "var tableData = Array();";
	
	foreach($apps as $app){
		
		$j++;

		if($flag == 0){
		
			echo "\n\ntableData[".$i."] = '";
			$flag = 1;
		}
		
		echo "<tr>";

		echo "<td>".$app['transaction_id']."</td>";

		echo "<td>".substr($app['appointment_time'],0,10)."</td>";

		echo "<td>".$app['problem']."</td>";

		echo "<td>".$app['doctor']["fname"]." ".$app['doctor']["lname"]."</td>";

		echo "<td>".$app['transaction_status']."</td>";
		
		echo "<td onclick=\"goTo(".$app['transaction_id'].")\" style=\"cursor:pointer; color:#91B818; \">view</td>";
		
		echo "<td onclick=\"e_appointment(".$app['transaction_id'].")\" style=\"cursor:pointer; color:#91B818; \">Follow up</td>";
		
		
		echo "</tr>";
		if($j==10){
			
			$i++;
			$j = 0;
			$flag =0;
			
			echo "';";

			}
	}

	if($j<10)
		echo "';";
		
		
}
	?>	
  
		  
		  
		  
		  
		  
		  
		  
		  		
		
		
		
		
		
		
		
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
		  
		  
		  
function goToMessage(from,to,user_2){
	
	
	window.location = "<?php echo base_url() ?>index.php/message/thread/"+from+"/"+to+"/2/"+user_2;
		
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


		var currPage =0;
		
		
		
		$(document).ready(function(){   
			
		//Fill appointments
			
		//alert(tableData[0]);
		<?php 
		if(isset($apps)){
			
			echo '$("#appointmentsTable").html(tableData[currPage]);
			
			';
			
			echo 	'$("#older").click(function(){
			
			if(currPage > 0)
				currPage--;
			
			//alert(currPage);
			
			$("#appointmentsTable").html(tableData[currPage]);
		
		
		});
		
			$("#newer").click(function(){
			
			
			if(currPage + 1 < tableData.length)
				currPage++;
			
			//alert(currPage);
			
			$("#appointmentsTable").html(tableData[currPage]);
		
			
		});';
		}
		?>	
		// SCROLL TO TOP BUTTON
		$().UItoTop({ easingType: 'easeOutQuart' });
		
		// SUBMENU
		$('ul.sf-menu').superfish(); 
		
		
	


		if(window.location.hash) {
			
			  var hash = window.location.hash.substring(1); //Puts hash in variable, and removes the # character
     			
				$("#patient-tab-nav>span").removeClass('active');
				
					 
				switch(hash){
				
				case "Quick Book":
						$('.patient-div').css('display','none');
						$('#quickBook').css('display','block');
				break;
				
				case "Subscriptions":
						$('.patient-div').css('display','none');						
						$('#Subscriptions').css('display','block');
				break;
				
				case "Lab Reports":
						$('.patient-div').css('display','none');						
						$('#labReports').css('display','block');
				break;
				
				case "Appointments":
						$('.patient-div').css('display','none');						
						$('#Appointments').css('display','block');
				break;
				
				case "Permissions":
						window.location = "<?php echo base_url()?>index.php/permissions";
				break;
				
				default : alert(error);
				
				
				}
			
			}


		
		$("#patient-tab-nav>span").click(function(){
			
			$("#patient-tab-nav>span").removeClass('active');
			$(this).addClass('active');
			
			var tabStr = $(this).html();
					
			tabStr = tabStr.replace(/^\s+|\s+$/g,'')
						
			var currentURI = document.URL;
			
			if(currentURI != "<?php echo base_url()?>index.php/patient")
				window.location = "<?php echo base_url()?>index.php/patient#"+tabStr;
			
			switch(tabStr){
				
				case "Quick Book":
						$('.patient-div').css('display','none');
						$('#quickBook').css('display','block');
				break;
				
				case "Subscriptions":
						$('.patient-div').css('display','none');						
						$('#Subscriptions').css('display','block');
				break;
				
				case "Lab Reports":
						$('.patient-div').css('display','none');						
						$('#labReports').css('display','block');
				break;
				
				case "Appointments":
						$('.patient-div').css('display','none');						
						$('#Appointments').css('display','block');
				break;
				
				case "Permissions":
						window.location = "<?php echo base_url()?>index.php/permissions";
				break;
				
				default : alert(error);
				
				
				}
			
			});
		
		
		

		
		
				
		});
		
		
		
		
		
		
		function requestFollowUp(tid){
			
			window.location="<?php echo base_url()?>index.php/appointment/eAppointmentConfirm/"+tid;
		
			}
			
	
		function goTo(tid){
			
			window.open("<?php echo base_url()?>index.php/patient/appointment/"+tid, '_blank' )
			
			}

		function e_appointment(tid){
		
		window.open("<?php echo base_url()?>index.php/appointment/eAppointmentConfirm/"+tid, '_blank' )
			
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
