
<div id="wrapper">
<!-- BEGIN GREYSTRIPE -->
<div id="greyStripe" >
    <!-- BEGIN container_12 -->
    <div class="container_12">
      
      
<!--<P>yo whatsup ?</P>
-->

<p>
<h3>Your Notifications <br /></h3>

<?php

echo $notifications;

 ?>
 
 </p>



      </div>

</div>
</div>


<div id='messages'>
<?php foreach ($data["messages"] as $message): ?>
<div class='messageWrapper'>
<div class='message <?php echo $message["className"]; ?>' data-id='<?php echo @$message["id"]; ?>'><?php echo $message["message"]; ?></div>
</div>
<?php endforeach; ?>
</div>
