<?php

	//Display all errors for debug.
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	require_once('./Webhooksio.Base.php');
	require_once('./Webhooksio.API.php');

	$settings = [];
	$settings['account_id'] = '{YOUR_ACCOUNT_ID}';
	$settings['application_id'] = '{YOUR_APPLICATION_ID}';
	$settings['api_token'] = '{YOUR_API_TOKEN}';

	$api = new WebhooksioAPI($settings);

	echo "<h1>Webhooks.io PHP Test Client</h1>";

	$rtn = $api->getAccount();
	echo("<strong>HTTP Reply:</strong> <br /><br />" . $rtn . "<br /><br />");
	
?>