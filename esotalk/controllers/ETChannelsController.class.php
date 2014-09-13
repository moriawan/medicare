<?php
// Copyright 2011 Toby Zerner, Simon Zerner
// This file is part of esoTalk. Please see the included license file for usage information.

if (!defined("IN_ESOTALK")) exit;

/**
 * The channels controller handles the channel list page, and subscribing/unsubscribing to channels.
 *
 * @package esoTalk
 */
class ETChannelsController extends ETController {


//create channel

public function create()
{
	// Get the channels!
	$channels = ET::channelModel()->getAll();

	// Set up a form!
 	$form = ETFactory::make("form");
 	$form->action = URL("channels/create");

	// Get a list of groups!
 	$groups = ET::groupModel()->getAll();

 	// Make a list of the types of permissions!
	$permissions = array("view" => "View", "reply" => "Reply", "start" => "Start", "moderate" => "Moderate");

 	// Set which permission checkboxes should be checked on the form!
 	$form->setValue("permissions[".GROUP_ID_GUEST."][view]", 1);
 	$form->setValue("permissions[".GROUP_ID_MEMBER."][view]", 1);
 	$form->setValue("permissions[".GROUP_ID_MEMBER."][reply]", 1);
 	$form->setValue("permissions[".GROUP_ID_MEMBER."][start]", 1);

 	// If the form was submitted...
 	if ($form->validPostBack("save")) {

 		// Save the channel's information.
 		$model = ET::channelModel();
 		$channelId = $model->create(array(
 			"title" => $form->getValue("title"),
 			"slug" => $model->generateSlug($form->getValue("title")),
 			"description" => $form->getValue("description"),
 			"attributes" => array("defaultUnsubscribed" => $form->getValue("defaultUnsubscribed"))
	 	));

	 	// If there were errors, pass them on to the form.
	 	if ($model->errorCount()) $form->errors($model->errors());

	 	else {

		 	// Set the channel's permissions.
	 		$model->setPermissions($channelId, $form->getValue("permissions"));

	 		$this->message(T("message.changesSaved"), "success");
	 		$this->redirect(URL("channels"));

	 	}

 	}

 	// Overuse of exclamation marks!
 	$this->data("channels", $channels);
 	$this->data("channel", false);
 	$this->data("groups", $groups);
 	$this->data("permissions", $permissions);
 	$this->data("form", $form);
 	$this->render("admin/editChannel");
}




/**
 * Show the channel list page.
 *
 * @return void
 */
public function index()
{
	// Set the canonical URL and push onto the navigation stack.
	$url = "channels";
	$this->canonicalURL = URL($url, true);
	$this->pushNavigation("channels", "channels", URL($url));

	// Get all of the channels that we can view.
	$channels = ET::channelModel()->get();
	// Normally, render the channels list page.
	
	
	if ($this->responseType === RESPONSE_TYPE_DEFAULT) {
		$this->addJSFile("js/channels.js");
		$this->data("channels", $channels);
		$this->render("channels/index");
	}

	// But for JSON, add the channels as a JSON var and render.
	elseif ($this->responseType === RESPONSE_TYPE_JSON) {
		$this->json("channels", $channels);
		$this->render();
	}
}

// Custom view 

public function Json_view()
{
	// Set the canonical URL and push onto the navigation stack.
	$url = "channels";
	$this->canonicalURL = URL($url, true);
	$this->pushNavigation("channels", "channels", URL($url));

	// Get all of the channels that we can view.
	$channels = ET::channelModel()->get();
	//echo $data_channel = json_encode($channels);
	$i=0 ;
	echo '{';
	foreach ($channels as $channel){
		
		echo '"'.$i.'":';
		echo $data_channel = json_encode($channel);
		echo ', ';
		$i++; 
	}
	
	
	
	// Normally, render the channels list page.

}



/**
 * Toggle the user's subscription to a channel.
 *
 * @param int $channelId The ID of the channel to toggle subscription to.
 * @return void
 */
 
 
public function subscribe($channelId = "")
{
	if (!ET::$session->user or !$this->validateToken()) return;

	// If we don't have permission to view this channel, don't proceed.
	if (!ET::channelModel()->hasPermission((int)$channelId, "view")) return;

	// Work out if we're already unsubscribed or not, and switch to the opposite of that.
	$unsubscribed = !ET::SQL()
		->select("unsubscribed")
		->from("member_channel")
		->where("memberId", ET::$session->userId)
		->where("channelId", (int)$channelId)
		->exec()
		->result();

	// Write to the database.
	ET::channelModel()->setStatus($channelId, ET::$session->userId, array("unsubscribed" => $unsubscribed));

	// Normally, redirect back to the channel list.
	if ($this->responseType === RESPONSE_TYPE_DEFAULT) redirect(URL("channels"));

	// Otherwise, set a JSON var.
	$this->json("unsubscribed", $unsubscribed);
	$this->render();
}

}