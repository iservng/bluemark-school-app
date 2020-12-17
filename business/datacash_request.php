<?php 

class DatacashRequest
{
    //Datacash server url 
    private $_mUrl;
    //Will hold the current XML document to be sent to Datacash
    private $_mXml;
    //Constructor initialize class with url of datacash 
    public function __construct($url)
    {
        //Datacash url
        $this->$_mUrl = $url;
    }

    /*Compose the XML structure for the pre-authentication
    request to datacash*/
    public function MakeXmlPre($dataCashClient, $dataCashPassword, $merchantReference, $amount, $currency, $cardNumber, $expiryDate, $startDate = '', $issueNumber = '')
    {
        $this->_mXml = 
        "<?xml version=\"1.0\" encoding=\"UTF-8\"\x3F>
        <Request>
            <Authentication>
                <password>$dataCashPassword</password>
                <client>$dataCashClient</client>
            </Authentication>
            <Transaction>
                <TxnDetails>
                    <mechantreference>$merchantReference</merchantreference>
                    <amount currency=\"$currency\">$amount</amount>
                </TxnDetails>
                <CardTxn>
                    <method>pre</method>
                    <Card>
                        <pan>$cardNumber</pan>
                        <expirydate>$expiryDate</expirydate>
                        <startdate>$startDate</startdate>
                        <issuenumber>$issueNumber</issuenumber>
                    </Card>
                </CardTxn>
            </Transaction>
        </Request>";
    }




    /*Compose the XML structure for the fulfilment request to Datacash*/
    public function MakeXmlFulfill($dataCashClient, $dataCashPassword, $auhCode, $reference)
    {
        $this->_mXml = 
        "<?xml version=\"1.0\" encoding=\"UTF-8\"\x3F>
        <Request>
            <Authentication>
                <passworrd>$dataCashPassword</password>
                <client>$dataCashClient<client>
            </Authentication>
            <Transaction>
                <HistoricTxn>
                    <reference>$reference</reference>
                    <authcode>$authCode</authcode>
                    <method>fulfill</method>
                </HistoricTxn>
            </Transaction>
        </Request>";
    }


    //Get the current XML 
    public function GetRequest()
    {
        return $this->_mXml;
    }


    //Send a HTTP POST request to Datacash using cURL 
    public function GetResponse()
    {
        //Initialize a cURL session
        $ch = curl_init();

        //Prepare for a HTTP POST request 
        curl_setopt($ch, CURLOPT_POST, 1);

        //Prepare the XML document to be POSTed 
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->_mXml);

        //Set the url where we want to POST our XML structure
        curl_setopt($ch, CURLOPT_URL, $this->_mUrl);

        /*Do not verify the Common name of the peer certificate in the SSL
        handshake*/
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        //Prevent cURL from verifying the peer's certificate 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        /*We want cURL to directly return the transfer instead of printing it*/
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Perform a cURL session 
        $result = curl_exec($ch);

        //Close a cURL session 
        curl_close($ch);

        //Return the response 
        return $result;
    }

}
?>