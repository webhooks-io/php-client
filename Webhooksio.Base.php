<?php

/**
 * Webhooks.io PHP-Client : Simple PHP base wrapper for the v1.0 API
 * 
 * PHP version 5.3.10
 * 
 * @package  PHP-Client
 * @author   Jeff Worford <jeff@webhooks.io>
 * @license  MIT License
 * @link     http://github.com/webhooks-io/php-client
 */
class WebhooksioBase
{
    protected $api_endpoint;
    protected $api_version;
    protected $api_token;
    protected $account_id;
    protected $application_id;
    protected $base_url;

    /**
     * Create the API base object. Requires an array of settings::
     * api endpoint, api version, api token, account id, application id, base url
     * Requires the cURL library
     * 
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        if (!in_array('curl', get_loaded_extensions())) 
        {
            throw new Exception('You need to install cURL, see: http://curl.haxx.se/docs/install.html');
        }
        
        if (!isset($settings['account_id'])
            || !isset($settings['application_id'])
            || !isset($settings['api_token']))
        {
            throw new Exception('Make sure you are passing in the correct parameters');
        }

        $this->account_id = $settings['account_id'];
        $this->application_id = $settings['application_id'];
        $this->api_token = $settings['api_token'];

        if (isset($settings['api_endpoint'])) {
        	$this->api_endpoint = $settings['api_endpoint'];
        } else {
        	$this->api_endpoint = 'https://api.webhooks.io';
        }

        if (isset($settings['api_version'])) {
        	$this->api_version = $settings['api_version'];
        } else {
        	$this->api_version = 'v1';
        }
    }



    /**
     * Expand endpoint parameters
     * 
     * @param $endpoint String endpoint.
     * @param array $params Array of parameters.
     * 
     * @return finalEndpoint
     */
    protected function expandEndpoint($endpoint, array $params)
    {
    	$placeholder = '';
		$finalEndpoint = '';
		$replacementCount = 0;

		$endpoint_array = explode('/', $endpoint);

		for($i = 0; $i < count($endpoint_array); $i++) {

			$placeholder = $endpoint_array[$i];

			if(strcmp(substr($placeholder,0,1),':') == 0) {
				$placeholder = substr($placeholder, ((strlen($placeholder) - 1) * -1));

                $finalEndpoint = $finalEndpoint . "/" . $params[$replacementCount];
                $replacementCount++;
			} else {
                if(strcmp($placeholder,'') !== 0) {
				    $finalEndpoint = $finalEndpoint . '/' . $placeholder;
                }
			}
		}

		return $finalEndpoint;
    }


    /**
     * Sends a given request as an HTTPPOST to the webhooks.io API.
     * 
     * @param string $endpoint String endpoint.
     * @param string $method HTTP Method.  Defaults to GET
     * @param string $body The message body content.
     * @param struct $headers
     * @param string $content_type Defaults to application/json.
     * 
     * @return httpresults
     */
    protected function execute(
    	$endpoint, 
    	$method = 'GET', 
    	$body = '', 
    	array $headers,
    	$content_type = 'application/json'
    	) 
   	{

        array_push($headers,$this->buildAuthorizationHeader());
   		$options = array( 
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_HEADER => false,
            CURLOPT_URL => $this->api_endpoint . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
        );

        echo("<strong>Request Endpoint:</strong> " . $this->api_endpoint . $endpoint . "<br /><br />");

        if (strcmp($method,"GET") !== 0) {
            $options[CURLOPT_POSTFIELDS] = $body;
        } else {
        	$options[CURLOPT_URL] .= $body;
        }

        $feed = curl_init();
        curl_setopt_array($feed, $options);
        $return = curl_exec($feed);
        curl_close($feed);

        return $return;
   	}


    /**
     * Private method to generate authorization header used by cURL
     * 
     * 
     * @return string $return Header used by cURL for request
     */    
    private function buildAuthorizationHeader()
    {
        return "Authorization: Bearer " . $this->api_token; 
    }





}
