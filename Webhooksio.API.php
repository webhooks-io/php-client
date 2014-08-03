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
class WebhooksioAPI extends WebhooksioBase
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
        parent::__construct($settings);
    }

    /**
     * Lists all sub accounts user an account.
     * 
     * GET - /v1/accounts/:account_id/subaccounts
     * 
     * Full details can be found at http://webhooks.io/docs/api/#list-sub-accounts
     * 
     * @method getSubAccounts
     * @param {String} account_id 
     * @param {Object} params
     * @param {Function} callback
    */
    public function getSubAccounts(struct $params=null){
        $endpoint = $this->expandEndpoint('/v1/accounts/:account_id/subaccounts', [$this->account_id]);
        return $this->execute($endpoint, 'GET', $params, []);
    }

     /**
     * Returns the details of a specfic account.
     * 
     * GET - /v1/accounts/:account_id
     * 
     * Full details can be found at http://webhooks.io/docs/api/#get-account
     * 
     * @param {String} account_id 
     * @param {Object} params
     * @param {Function} callback
    */
    public function getAccount(struct $params=null){
        $endpoint = $this->expandEndpoint('/v1/accounts/:account_id', [$this->account_id]);
        return $this->execute($endpoint, 'GET', $params, []);
    }


}
