Webhooks.io PHP Client (beta)
=======

The [full documention can be found here](http://webhooks.io/docs/api) and this client mirrors each of the corresponding API calls as much as possible.  If you see an option in the API it can be passed as a parameter in the API call.

Getting Started
-----

1\. [Obtain your Webhooks.io API credentials](https://console.webhooks.io)

2\. Create a Webhooks.io Client Object:

```
<?php

require_once('./Webhooksio.Base.php');
require_once('./Webhooksio.API.php');

$settings = [];
$settings['account_id'] = '{YOUR_ACCOUNT_ID}';
$settings['api_token'] = '{YOUR_API_TOKEN}';
$settings['application_id'] = '{YOUR_APPLICATION_ID}'; // optional

$wh_api = new WebhooksioAPI($settings);

?>
```

Usage
-----

###Accounts

####Account Registration

Creates a new account.  This is the same call that is used when a user registers from webhooks.io.

```
$result = $wh_api->registerAccount($options);
```
#####Parameters

* ```$options``` - Structure of the possible options.
#####Options

* ```name``` - Account/Company name (example: Sample Company, LLC)
* ```first_name``` (required) - First name of the primary user on the account. (example: Bob)
* ```last_name``` (required) - Last name of the primary user on the account. (example: Smith)
* ```email_address``` (required) - The primary email address for the user on the account. (example: bob.smith@example.com)
* ```password``` (required) - The password for the user on the account
* ```password_confirm``` (required) - The confirmation entry for the password. (example: Bob)
* ```plan_id``` (required) - The plan id selected for the account.  Use /plans resource for a list of all plans.
* ```card_number``` - The credit card number to be used for billing.
* ```card_month``` - The expiration month for the credit card.
* ```card_year``` - The expiration year for the credit card.
* ```card_cvc``` - The CVC on the credit card.
* ```coupon``` - A coupon code to be used.
* ```referrer``` - The location the user came from.
* ```email_verification_callback_url``` - The URL for where the user should be directed to upon verification of the email address.  A query param of ?status=[success,failure] will be appended to this URL.
* ```invite_code``` (required) - The invite code used to create account.

####Create Sub Account

Creates a sub account.

```
$result = $wh_api->createSubAccount($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - First name of the primary user on the account. (example: Bob)
* ```account_key``` - Identifier from another system. (example: acct123456789)

####List Sub Accounts

Lists all sub accounts user an account.

```
$result = $wh_api->getSubAccounts($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```account_key``` - Identifier from another system. (example: acct123456789)

####Get Account

Returns the details of a specfic account.

```
$result = $wh_api->getAccount($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Update Account

Updates the details on an account.

```
$result = $wh_api->updateAccount($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - Friendly name for the account. (example: Bob)
* ```account_key``` - Identifier from another system. (example: acct123456789)

####Delete Account

Deletes an account or sub account.

```
$result = $wh_api->deleteAccount($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
###Applications

####Create Application

Adds an application to an account

```
$result = $wh_api->createApplication($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - Name for the bucket. (example: My Awesome Application)
* ```categories``` (required) - The categories the application belongs to. (example: ecommerce,payment)
* ```overview``` (required) - A short description of the application - 255 characters or less. (example: This is the details of my awesome application.)
* ```description``` (required) - A full description of the application. (example: This is the details of my awesome application.)
* ```homepage_url``` (required) - The url of the application homepage. (example: http://mywebsite.com)
* ```api_url``` (required) - The url to the API documention for the application. (example: http://api.mywebsite.com)
* ```logo_url``` (required) - The url to the logo. (example: http://mywebsite.com/webhooksio/logo.jpg)
* ```active``` (required) - If the application should be active (viewable) or not.

####Update Application

Updates an Application.

```
$result = $wh_api->updateApplication($account_id, $application_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - Name for the bucket. (example: My Awesome Application)
* ```categories``` (required) - The categories the application belongs to. (example: ecommerce,payment)
* ```overview``` (required) - A short description of the application - 255 characters or less. (example: This is the details of my awesome application.)
* ```description``` (required) - A full description of the application. (example: This is the details of my awesome application.)
* ```homepage_url``` (required) - The url of the application homepage. (example: http://mywebsite.com)
* ```api_url``` (required) - The url to the API documention for the application. (example: http://api.mywebsite.com)
* ```logo_url``` (required) - The url to the logo. (example: http://mywebsite.com/webhooksio/logo.jpg)
* ```active``` (required) - If the application should be active (viewable) or not.

####Get Application

Returns the details for a specfic application.

```
$result = $wh_api->getApplication($account_id, $application_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####List Applications

Returns a collection of applications for an account.

```
$result = $wh_api->getApplications($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Delete Application

Deletes an application.

```
$result = $wh_api->deleteApplication($account_id, $application_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Create Application Version

Adds a version to an application.

```
$result = $wh_api->createApplicationVersion($account_id, $application_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```key``` (required) - The key/id for this version. (example: 1.1)
* ```release_date``` (required) - The date this version was released.
* ```version_json``` (required) - The complete JSON definition for the version.
* ```examples_json``` (required) - The complete JSON definition for the version examples/recipies
* ```active``` (required) - If the version should be active (viewable) or not.

####Update Application Version

Updates an application version.

```
$result = $wh_api->updateApplicationVersion($account_id, $application_id, $application_version_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$application_version_id``` -  (example: AVe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```key``` (required) - The key/id for this version. (example: 1.1)
* ```release_date``` (required) - The date this version was released.
* ```version_json``` (required) - The complete JSON definition for the version.
* ```examples_json``` (required) - The complete JSON definition for the version examples/recipies
* ```active``` (required) - If the version should be active (viewable) or not.

####Get Application Version

Returns the details for a specfic application version.

```
$result = $wh_api->getApplicationVersion($account_id, $application_id, $application_version_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$application_version_id``` -  (example: AVe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####List Application Versions

Returns a collection of versions for an application.

```
$result = $wh_api->getApplicationVersions($account_id, $application_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Delete Application Version

Deletes a version for an application.

```
$result = $wh_api->deleteApplicationVersion($account_id, $application_id, $application_version_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$application_version_id``` -  (example: AVe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
###Buckets

####Create Bucket

Adds a bucket to an account

```
$result = $wh_api->createBucket($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - Name for the bucket. (example: My Bucket)
* ```key``` - The key for the bucket. (example: my-bucket)

####Update Bucket

Updates a bucket.

```
$result = $wh_api->updateBucket($account_id, $bucket_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$bucket_id``` -  (example: BUe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - Name for the bucket. (example: My Bucket)
* ```key``` - The key for the bucket. (example: my-bucket)

####Get Bucket

Returns the details for a specfic bucket.

```
$result = $wh_api->getBucket($account_id, $bucket_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$bucket_id``` -  (example: BUe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####List Buckets

Returns a collection of buckets for an account.

```
$result = $wh_api->getBuckets($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Delete Bucket

Deletes a bucket.

```
$result = $wh_api->deleteBucket($account_id, $bucket_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$bucket_id``` -  (example: BUe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
###Inputs

####Create Input

Adds an input to an account

```
$result = $wh_api->createInput($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```bucket_id``` (required) - The bucket the input belongs to (example: BUe987d754d82a419e8c54c2185ed0ef29)
* ```name``` (required) - Name for the input. (example: My Bucket)
* ```status``` - The status of the bucket, defaults to active.
* ```event_location``` - The location of the event, header, payload, query param, etc (example: payload)
* ```event_path``` - The path to the value that specifies what type of event is coming in.  This starts with the value msg. (example: msg.event)
* ```event_filters``` - The events that this input should be triggerd for.  This can be a comma delimited list of events. (example: account.created,message.sent)
* ```delivery_mode``` - The mode the request should be made in.  Valid options include sync and async.
* ```response_code``` - HTTP Response code to provide upon hook receipt - defaults to 200
* ```response_content``` - Any content that should be provided upon hook receipt.
* ```response_content_type``` - The content type that should be returned upon hook receipt, this should mirror the data in the response_content variable. (example: application/json)
* ```authentication_failures``` - How to handle authentication failures.
* ```authentication_type``` - The type of authentication to apply to incoming requests.

####Update Input

Updates the details for an input.

```
$result = $wh_api->updateInput($account_id, $input_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$input_id``` -  (example: INe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - Name for the input. (example: My Bucket)
* ```status``` - The status of the bucket, defaults to active.
* ```event_location``` - The location of the event, header, payload, query param, etc (example: payload)
* ```event_path``` - The path to the value that specifies what type of event is coming in.  This starts with the value msg. (example: msg.event)
* ```event_filters``` - The events that this input should be triggerd for.  This can be a comma delimited list of events. (example: account.created,message.sent)
* ```delivery_mode``` - The mode the request should be made in.  Valid options include sync and async.
* ```response_code``` - HTTP Response code to provide upon hook receipt - defaults to 200
* ```response_content``` - Any content that should be provided upon hook receipt.
* ```response_content_type``` - The content type that should be returned upon hook receipt, this should mirror the data in the response_content variable. (example: application/json)
* ```authentication_failures``` - How to handle authentication failures.
* ```authentication_type``` - The type of authentication to apply to incoming requests.

####Get Input

Returns the details for a specfic input.

```
$result = $wh_api->getInput($account_id, $input_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$input_id``` -  (example: INe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####List Inputs

Returns a collection of inputs for an account.

```
$result = $wh_api->getInputs($account_id, $bucket_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$bucket_id``` -  (example: BUe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```key``` - Name for the bucket.
* ```event_filter``` - The event that should be filtered on.

####Delete Input

Deletes an input.

```
$result = $wh_api->deleteInput($account_id, $input_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$input_id``` -  (example: INe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
###Destinations

####Create Destination

Adds an destination for an input.

```
$result = $wh_api->createDestination($account_id, $input_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$input_id``` -  (example: INe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - Name for the input. (example: My Final Destination)
* ```endpoint_url``` (required) - The URL the messages should be sent to.
* ```delivery_order``` - How the deliveries should operate.  Valid options are random or fifo.  The default is random (example: random)
* ```status``` - The status of the bucket, defaults to active.
* ```message_method``` - The HTTP method the message will be sent with.  If null the method will pass through. (example: GET)
* ```event_filters``` - The events that this input should be triggerd for.  This can be a comma delimited list of events. (example: account.created,message.sent)
* ```authentication_type``` - The type of authentication to apply to incoming requests.
* ```retry_policy_id``` - The retry algorithm that will be used for failed attempts.
* ```retry_count``` - The number of times the hook will be retried.
* ```retry_interval``` - The interval for which the retries will be set.
* ```verify_ssl``` - Ensure the SSL certificate is trusted and valid.  If false, this will bypass this protection.
* ```headers_to_include``` - A comma delimited list of custom headers to include.
* ```header_prefix``` - The prefix of the custom headers that will be included.  The default is Webhooks (example: Webhooks)
* ```alert_on_failure``` - A comma delimited list of email addresses to alert when a webhook enters the failed status. (example: bob@mail.com,john@email.com)

####Update Destination

Updates the details of an destination.

```
$result = $wh_api->updateDestination($account_id, $destination_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$destination_id``` -  (example: OUe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - Name for the input. (example: My Final Destination)
* ```endpoint_url``` (required) - The URL the messages should be sent to.
* ```delivery_order``` - How the deliveries should operate.  Valid options are random or fifo.  The default is random (example: random)
* ```status``` - The status of the bucket, defaults to active.
* ```message_method``` - The HTTP method the message will be sent with.  If null the method will pass through. (example: GET)
* ```event_filters``` - The events that this input should be triggerd for.  This can be a comma delimited list of events. (example: account.created,message.sent)
* ```authentication_type``` - The type of authentication to apply to incoming requests.
* ```retry_policy_id``` - The retry algorithm that will be used for failed attempts.
* ```retry_count``` - The number of times the hook will be retried.
* ```retry_interval``` - The interval for which the retries will be set.
* ```verify_ssl``` - Ensure the SSL certificate is trusted and valid.  If false, this will bypass this protection.
* ```headers_to_include``` - A comma delimited list of custom headers to include.
* ```header_prefix``` - The prefix of the custom headers that will be included.  The default is Webhooks (example: Webhooks)
* ```alert_on_failure``` - A comma delimited list of email addresses to alert when a webhook enters the failed status. (example: bob@mail.com,john@email.com)

####Get Destination

Returns the details for a specfic destination.

```
$result = $wh_api->getDestination($account_id, $destination_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$destination_id``` -  (example: OUe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####List Destination

Returns a collection of destinations.

```
$result = $wh_api->getDestinations($account_id, $input_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$input_id``` -  (example: INe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```destination_key``` - Name for the bucket.

####Delete Destination

Deletes an destination.

```
$result = $wh_api->deleteDestination($account_id, $destination_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$destination_id``` -  (example: OUe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
###Recipes

####Create Recipe

Adds a Recipe to an account

```
$result = $wh_api->createRecipe($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - Name for the recipe. (example: My Recipe)
* ```sample_code``` - Sample code used to pass to the recipe during editing to test script.
* ```type``` (required) - The type of recipe, either input or desination. (example: input)
* ```notes``` - Any notes required to help understand the recipe. (example: This is used to transform the payload to work with Slack webhooks.)
* ```recipe_draft``` (required) - During development, this is the receipe that is saved. (example: return { x: 1, x: 2 };)

####Update Recipe

Updates a Recipe.

```
$result = $wh_api->updateRecipe($account_id, $recipe_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$recipe_id``` -  (example: REe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - Name for the recipe. (example: My Recipe)
* ```sample_code``` - Sample code used to pass to the recipe during editing to test script.
* ```type``` (required) - The type of recipe, either input or desination. (example: input)
* ```notes``` - Any notes required to help understand the recipe. (example: This is used to transform the payload to work with Slack webhooks.)
* ```recipe_draft``` (required) - During development, this is the receipe that is saved. (example: return { x: 1, x: 2 };)

####Publish Recipe

Publishes the draft recipe so it can be used as the production recipe.

```
$result = $wh_api->publishRecipe($account_id, $recipe_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$recipe_id``` -  (example: REe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Get Recipe

Returns the details for a specfic recipe.

```
$result = $wh_api->getRecipe($account_id, $recipe_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$recipe_id``` -  (example: REe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####List Recipe

Returns a collection of recipes for an account.

```
$result = $wh_api->getRecipes($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Delete Recipe

Deletes a Recipe.

```
$result = $wh_api->deleteRecipe($account_id, $recipe_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$recipe_id``` -  (example: REe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Test Recipe

Provides the ability to test a recipe to ensure the output is correct.  The recipe MUST be wrapped in 'function wh(){}' and return exit([data]) as shown in the sample below.

```
$result = $wh_api->testRecipe($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```sample_code``` - Sample code to be used during the testing of this recipe. (example: {"name": "Sample Code", "details": "This is a sample test of the recipe processor"})
* ```type``` (required) - The type of recipe, either input or destination. (example: input)
* ```recipe``` (required) - The recipe to be tested. (example: function wh(){ result.data = {"name": data.name, "client_id": 8000}; exit(result); })
* ```event_type``` - The event type. (example: invoice.create)

###Providers

####Create Consumer

Creates a consumer for an application

```
$result = $wh_api->createConsumer($account_id, $application_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```consumer_id``` (required) - The id for the consumer of the application.  This id should be the unique id from the application provider that identifies this customer/consumer of the application.
* ```bucket_key``` (required) - The bucket key that identifies the container for this consumer, if this does not exist it will be created. Default is default. (example: default)
* ```name``` (required) - The name of the consumer.  This could be the account name within the provider application for example. (example: ACME Corp, Inc.)

####Get Consumers

Returns a list of all the consumers for a particular application.

```
$result = $wh_api->getConsumers($account_id, $application_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Update Consumer

Updates the details for a particular consumer.

```
$result = $wh_api->updateConsumer($account_id, $application_id, $consumer_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$options``` - Structure of the possible options.
#####Options

* ```name``` (required) - The name of the consumer.  This could be the account name within the provider application for example. (example: ACME Corp, Inc.)

####Get Consumer

Get the details for a particular consumer.

```
$result = $wh_api->getConsumer($account_id, $application_id, $consumer_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$options``` - Structure of the possible options.
####Delete Consumer

Removes a consumer from a particular application.

```
$result = $wh_api->deleteConsumer($account_id, $application_id, $consumer_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$options``` - Structure of the possible options.
####List Consumer destinations

Returns all the destinations for the consumer of a given application.

```
$result = $wh_api->getConsumerDestinations($account_id, $application_id, $consumer_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$options``` - Structure of the possible options.
#####Options

* ```bucket_key``` (required) - The bucket key the destination shoud be created for. (example: default)
* ```destination_key``` - Name for the bucket.

####Create Consumer destination

Adds an destination for the consumer of a given application.

```
$result = $wh_api->createConsumerDestination($account_id, $application_id, $consumer_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$options``` - Structure of the possible options.
#####Options

* ```application_version_id``` (required) - The version of the application the destination should respond to. (example: Webhooks)
* ```name``` (required) - Name for the input. (example: My Bucket)
* ```bucket_key``` (required) - The bucket key the destination shoud be created for. (example: default)
* ```endpoint_url``` (required) - The status of the bucket, defaults to active.
* ```delivery_order``` - How the deliveries should operate.  Valid options are random or fifo.  The default is random (example: random)
* ```status``` - The status of the bucket, defaults to active.
* ```message_method``` - The HTTP method the message will be sent with.  If null the method will pass through. (example: GET)
* ```event_filters``` - The events that this input should be triggerd for.  This can be a comma delimited list of events. (example: account.created,message.sent)
* ```authentication_type``` - The type of authentication to apply to incoming requests.
* ```retry_policy_id``` - The retry algorithm that will be used for failed attempts.
* ```retry_count``` - The number of times the hook will be retried.
* ```retry_interval``` - The interval for which the retries will be set.
* ```verify_ssl``` - Ensure the SSL certificate is trusted and valid.  If false, this will bypass this protection.
* ```headers_to_include``` - A comma delimited list of custom headers to include.
* ```header_prefix``` - The prefix of the custom headers that will be included.  The default is Webhooks (example: Webhooks)
* ```alert_on_failure``` - A comma delimited list of email addresses to alert when a webhook enters the failed status. (example: bob@mail.com,john@email.com)

####Update Consumer destination

Updates an destination for the consumer of a given application.

```
$result = $wh_api->updateConsumerDestination($account_id, $application_id, $consumer_id, $destination_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$destination_id``` -  (example: OUe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```application_version_id``` (required) - The version of the application the destination should respond to. (example: Webhooks)
* ```name``` (required) - Name for the input. (example: My Bucket)
* ```endpoint_url``` (required) - The status of the bucket, defaults to active.
* ```delivery_order``` - How the deliveries should operate.  Valid options are random or fifo.  The default is random (example: random)
* ```status``` - The status of the bucket, defaults to active.
* ```message_method``` - The HTTP method the message will be sent with.  If null the method will pass through. (example: GET)
* ```event_filters``` - The events that this input should be triggerd for.  This can be a comma delimited list of events. (example: account.created,message.sent)
* ```authentication_type``` - The type of authentication to apply to incoming requests.
* ```retry_policy_id``` - The retry algorithm that will be used for failed attempts.
* ```retry_count``` - The number of times the hook will be retried.
* ```retry_interval``` - The interval for which the retries will be set.
* ```verify_ssl``` - Ensure the SSL certificate is trusted and valid.  If false, this will bypass this protection.
* ```headers_to_include``` - A comma delimited list of custom headers to include.
* ```header_prefix``` - The prefix of the custom headers that will be included.  The default is Webhooks (example: Webhooks)
* ```alert_on_failure``` - A comma delimited list of email addresses to alert when a webhook enters the failed status. (example: bob@mail.com,john@email.com)

####Delete Consumer destination

Deletes an destination for the consumer of a given application.

```
$result = $wh_api->deleteConsumerDestination($account_id, $application_id, $consumer_id, $destination_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$destination_id``` -  (example: OUe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####List Consumer Buckets

Returns all the buckets for the consumer of a given application.

```
$result = $wh_api->getConsumerBuckets($account_id, $application_id, $consumer_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$options``` - Structure of the possible options.
####Send webhook to consumer

Sends a webhook to a particular consumer of an application for the given bucket_key.

```
$result = $wh_api->sendConsumerWebhookRequest($account_id, $application_id, $consumer_id, $bucket_key, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$bucket_key``` -  (example: development)
* ```$options``` - Structure of the possible options.
####Check consumer subscription

Checks to see if the consumer is subscribed to a given event or set of events.  If the event query param is not passed the complete list of events will be returned.

```
$result = $wh_api->getConsumerSubscription($account_id, $application_id, $consumer_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$options``` - Structure of the possible options.
#####Options

* ```bucket_key``` (required) - The bucket key the subscription should be checked for. (example: development)
* ```event_name``` (required) - The name of the event to check.
* ```include_destination_detail``` - If the details of each subscribed destination should be returned.

####Consumer Request Log

Returns a log of all messages for a given consumer.

```
$result = $wh_api->getConsumerRequestLog($account_id, $application_id, $consumer_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$options``` - Structure of the possible options.
#####Options

* ```start_date``` - The start date for the data.  This can be an exact UTC date or a texted based time period.  Valid text time periods can be found at: http://sugarjs.com/date_formats#text_formats
* ```end_date``` - The end date for the data.  This can be an exact UTC date or a texted based time period.  Valid text time periods can be found at: http://sugarjs.com/date_formats#text_formats
* ```destination_id``` - 
* ```http_status``` - 

####Create Client Token

Generates a client token to be used with the embedded views.

```
$result = $wh_api->createClientToken($account_id, $application_id, $consumer_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$options``` - Structure of the possible options.
#####Options

* ```bucket_key``` - The bucket key the client token should be generated for.  This can be an arbitrary value that maps back to your system. (example: development)
* ```paths``` - The permitted paths.

####Get Embedded View HTML

Returns the HTML for the embedded view.

```
$result = $wh_api->getEmbeddedViewHtml($account_id, $application_id, $consumer_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$application_id``` -  (example: APe987d754d82a419e8c54c2185ed0ef29)
* ```$consumer_id``` -  (example: my_customer_id)
* ```$options``` - Structure of the possible options.
#####Options

* ```bucket_key``` - The bucket key the client token should be generated for.  This can be an arbitrary value that maps back to your system. (example: development)
* ```paths``` - The permitted paths.
* ```css_url``` - URL to a css file that will be applied to the application styles.

###Reporting

####Overview Report

Returns a general overview.

```
$result = $wh_api->getOverviewReport($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```start_date``` (required) - The start date for the data.
* ```end_date``` (required) - The end date for the data.
* ```precision``` (required) - The end date for the data.
* ```application_id``` - The application id the data should be filtered with.
* ```bucket_id``` - The end date for the data.
* ```destination_id``` - The end date for the data.
* ```input_id``` - The end date for the data.
* ```include_sub_accounts``` - If sub account data should be included.

####Summary Report

Returns a general summary report.

```
$result = $wh_api->getSummaryReport($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```start_date``` - The start date for the data.
* ```end_date``` - The end date for the data.
* ```bucket_id``` - The end date for the data.
* ```destination_id``` - The end date for the data.
* ```input_id``` - The end date for the data.

####Request Log

Returns a log of all messages.

```
$result = $wh_api->getRequestLog($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```start_date``` - The start date for the data.  This can be an exact UTC date or a texted based time period.  Valid text time periods can be found at: http://sugarjs.com/date_formats#text_formats
* ```end_date``` - The end date for the data. This can be an exact UTC date or a texted based time period.  Valid text time periods can be found at: http://sugarjs.com/date_formats#text_formats
* ```input_id``` - 
* ```bucket_id``` - 
* ```http_status``` - 

###Messages

####Get Incoming Message

Returns the details regarding an incoming message.

```
$result = $wh_api->getIncomingMessage($account_id, $incoming_message_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$incoming_message_id``` -  (example: IMe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```include_outgoing_messages``` - If the outgoing messages should be included as well.

####Get Outgoing Message

Returns the details regarding an outgoing message, including all attempts

```
$result = $wh_api->getOutgoingMessage($account_id, $outgoing_message_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$outgoing_message_id``` -  (example: OMe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Get Outgoing Message Status Details

Returns the basic information regarding the status of the outgoing request.

```
$result = $wh_api->getOutgoingMessageStatus($account_id, $outgoing_message_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$outgoing_message_id``` -  (example: OMe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
###Users

####Login

Authenticates the users login credentials

```
$result = $wh_api->login($options);
```
#####Parameters

* ```$options``` - Structure of the possible options.
#####Options

* ```email_address``` (required) - The user's email address.
* ```password``` (required) - The password supplied for login.

####Change Password

Allows a user to change their password.  Either the existing password or change key must be passed...and must match in order for this call to be successful.

```
$result = $wh_api->changePassword($account_id, $user_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$user_id``` -  (example: USe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```new_password``` (required) - The new password for the account.
* ```new_confirm_password``` (required) - A confirmation of the new password for their account.
* ```change_key``` - The code that was supplied in the password change email to allow them to change their email.
* ```existing_password``` - The current password on the user account.

####Lookup API Token

Provides a user a way to lookup their own API token.  This is used when using ST or client-bearer-token authentication so the user can get a longer lasting API token.  This operation can only be carried out for the currently authenticated user.

```
$result = $wh_api->getAPIToken($account_id, $user_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$user_id``` -  (example: USe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Reset Password

Allows the user to request their password to be emailed to them.  Really this provides them a link to the change password form.

```
$result = $wh_api->resetPassword($options);
```
#####Parameters

* ```$options``` - Structure of the possible options.
#####Options

* ```email_address``` (required) - The primary email address for the user on the account. (example: bob.smith@example.com)

####Lookup Password Change Key

Looks up the meta data for the password change key.

```
$result = $wh_api->lookupPasswordChangeKey($password_change_key, $options);
```
#####Parameters

* ```$password_change_key``` -  (example: CKe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Create User

Adds a user to an account.

```
$result = $wh_api->createUser($account_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```first_name``` (required) - First name of the primary user on the account. (example: Bob)
* ```last_name``` (required) - Last name of the primary user on the account. (example: Smith)
* ```email_address``` (required) - The primary email address for the user on the account. (example: bob.smith@example.com)
* ```password``` (required) - The password for the user on the account
* ```permission_level``` (required) - The permission level for the user account.
* ```timezone``` (required) - The timezone the user is located in.  Default is Etc/GTM
* ```notify``` (required) - If the user should be notified that an account has been created for them.

####Update User

Updates a users account information.

```
$result = $wh_api->updateUser($account_id, $user_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$user_id``` -  (example: USe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
#####Options

* ```first_name``` (required) - First name of the primary user on the account. (example: Bob)
* ```last_name``` (required) - Last name of the primary user on the account. (example: Smith)
* ```email_address``` (required) - The primary email address for the user on the account. (example: bob.smith@example.com)
* ```password``` - The password for the user on the account
* ```timezone``` (required) - The timezone the user is located in.  Default is Etc/GMT
* ```permission_level``` - The permission level for the user account.

####Get User

Returns the details for a specfic user.

```
$result = $wh_api->getUser($account_id, $user_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$user_id``` -  (example: USe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####List Users

Returns a collection of users.

```
$result = $wh_api->getUsers($account_id, $user_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$user_id``` -  (example: USe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Delete User

Deletes a user.

```
$result = $wh_api->deleteUser($account_id, $user_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$user_id``` -  (example: USe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
####Verify Email Address

Handles validating the email address once the user has clicked the validation link in an email.

```
$result = $wh_api->verifyEmailAddress($email_verification_key, $options);
```
#####Parameters

* ```$email_verification_key``` -  (example: EV4d3dc5927f304df08ad36c5a3a893c52)
* ```$options``` - Structure of the possible options.
####Resend Verification Email

Resends a verification email for a user.

```
$result = $wh_api->resendVerificationEmail($account_id, $user_id, $options);
```
#####Parameters

* ```$account_id``` -  (example: ACe987d754d82a419e8c54c2185ed0ef29)
* ```$user_id``` -  (example: USe987d754d82a419e8c54c2185ed0ef29)
* ```$options``` - Structure of the possible options.
###Utils

####Health Check

System health check

```
$result = $wh_api->healthCheck($options);
```
#####Parameters

* ```$options``` - Structure of the possible options.
####Gets Plans

Returns all the possible public plans.

```
$result = $wh_api->getPlans($options);
```
#####Parameters

* ```$options``` - Structure of the possible options.
####Get Plan

Returns the details of a specific plan.

```
$result = $wh_api->getPlan($plan_id, $options);
```
#####Parameters

* ```$plan_id``` -  (example: starter)
* ```$options``` - Structure of the possible options.
####Get Timezones

Returns all valid timezones.

```
$result = $wh_api->getTimezones($options);
```
#####Parameters

* ```$options``` - Structure of the possible options.
####Gets Retry Policies

Returns the possible retry policies along with the system default policy.

```
$result = $wh_api->getRetryPolicies($options);
```
#####Parameters

* ```$options``` - Structure of the possible options.
####Gets Retry Policy

Returns the details of a specific retry policy.

```
$result = $wh_api->getRetryPolicy($policy_id, $options);
```
#####Parameters

* ```$policy_id``` -  (example: linear)
* ```$options``` - Structure of the possible options.
