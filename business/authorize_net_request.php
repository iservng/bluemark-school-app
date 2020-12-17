<?php 

class AuthorizeNetRequest
{
    //Authorize server url 
    private $_mUrl;

    //Will hold the current request to be sent to authorize.net
    private $_mRequest;

    //Constructor initializes the class with url of authorize.net
    public function __construct($url)
    {
        $this->$_mUrl = $url;
    }

    public function SetRequest($request)
    {
        $this->$_mRequest = '';

        $request_init = array(
            'x_login' => AUTHORIZE_NET_LOGIN_ID,
            'x_tran_key' => AUTHORIZE_NET_TRANSACTION_KEY,
            'x_version' => '3.1',
            'x_test_request' => AUTHORIZE_NET_TEST_REQUEST,
            'x_delim_data' => 'TRUE',
            'x_delim_char' => '|',
            'x_relay_response' => 'FALSE'
        );

        $request = array_merge($request_init, $request);

        foreach($request as $key => $value)
        {
            $this->$_mRequest .= $key . '=' . urlencode($value) . '&';
        }
    }


    //Send an HTTP request to Authorize.net using cURL
    public function GetResponse()
    {
        //Initialize a curl session 
        $ch = curl_init();

        //Prepare for an HTTP REQUEST 
        curl_setopt($ch, CURLOPT_POST, 1);

        //Prepare the request to be POSTed 
        curl_setopt($ch, CURLOPT_POSTFIELDS, rtrim($this->$_mRequest, '& '));

        //Set the url where we want to POST our data 
        curl_setopt($ch, CURLOPT_URL, $this->$_mUrl);

        //Do not verify the common name of the peer certificate in the SSL handshake;
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        //We wnat curl to directly return the transfer instead of print it 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Perform a cURL session 
        $result = curl_exec($ch);

        //Close the cURL session 
        curl_close($ch);

        //Return the response 
        return $result;

    }



    



}
?>