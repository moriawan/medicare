<?php
// Copyright 2011 Toby Zerner, Simon Zerner
// This file is part of esoTalk. Please see the included license file for usage information.

if (!defined("IN_ESOTALK")) exit;

/**
 * Default master view. Displays a HTML template with a header and footer.
 *
 * @package esoTalk
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta charset='<?php echo T("charset", "utf-8"); ?>'>
<title><?php echo $data["pageTitle"]; ?></title>
<?php echo $data["head"]; ?>
</head>

<body class='<?php echo $data["bodyClass"]; ?>'>
<?php $this->trigger("pageStart"); ?>

<div id='messages'>
<?php foreach ($data["messages"] as $message): ?>
<div class='messageWrapper'>
<div class='message <?php echo $message["className"]; ?>' data-id='<?php echo @$message["id"]; ?>'><?php echo $message["message"]; ?></div>
</div>
<?php endforeach; ?>
</div>

<div id='wrapper'>

<!-- HEADER -->


<div id='hdr'>
<div id='hdr-content'>

<h1 id='forumTitle'><a href='<?php echo URL(""); ?>'><?php echo $data["forumTitle"]; ?></a></h1>

<ul id='mainMenu' class='menu'>
<?php if ($data["backButton"]): ?>
<li><a href='<?php echo $data["backButton"]["url"]; ?>' id='backButton'>&laquo;<span> <?php echo T("Back to {$data["backButton"]["type"]}"); ?><span></a></li>
<?php endif; ?>
<?php if (!empty($data["mainMenuItems"])) echo $data["mainMenuItems"]; ?>
</ul>

<ul id='userMenu' class='menu'>
<?php echo $data["userMenuItems"]; ?>
<li><a href='<?php echo URL("conversation/start"); ?>' class='link-newConversation button'><?php echo T("New Conversation"); ?></a></li>
</ul>

</div>
</div>

<?php 


?>



<!-- BODY -->
<div id='body'>
<div id='body-content'>
<?php echo $data["content"]; ?>
</div>
</div>

<!-- FOOTER -->
<div id='ftr'>
<div id='ftr-content'>
<ul class='menu'>
<li id='goToTop'><a href='#'><?php echo T("Go to top"); ?></a></li>
<?php echo $data["metaMenuItems"]; ?>
<?php if (!empty($data["statisticsMenuItems"])) echo $data["statisticsMenuItems"]; ?>
</ul>
</div>
</div>
<?php $this->trigger("pageEnd"); ?>

</div>

</body>
</html>