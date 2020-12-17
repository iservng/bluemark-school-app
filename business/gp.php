<?php 

class GeneratePin
{
    


    /*

        WE WILL START MAKING THE FUNCTIONS THAT GENERATE THE PIN
        PROCEDURE 
        0. Create a file called called generat_pin
        1. Create a class for it (in step 0 above) 
        2. write the function that will generate the pin
        3. store the generated pin in a table called pin_generator 
        4. store the hash of each on the admissionpin
        5. make a (print PIN button available to the admin in the admin page) to the school requesting for the PIN can click the button and a pdf copy of the PINs will be downloaded to his or her system
        6a. an email is sent to me confirming that the user-of-the-app has clicked and downloaded the PINs
        6b. then the PINs save in the pin_generator table is completely deleted, so that only the hashs store in the admissionpin table is remaining 
        StringGen 
{

    public static function GenAdmissionNumber($num)

    */
    public static $mNumberChar = 12;

    public static function GetPin()
    {
        // self::$mNumberChar = $number;
        spl_autoload_register(function() {
            include_once("string.php");
        });

        $result = StringGen::GenAdmissionNumber(self::$mNumberChar);
        $result = $result . uniqid("onyekaonwutalu", true);
        $result = str_shuffle(strtoupper($result));
        $result = str_replace('.', '', $result);

        $result = substr($result, 0, self::$mNumberChar);
        return $result;

    }


    public static function GetThisManyPins($number)
    {
        $mAllPins = array();
        for ($i=0; $i < $number; $i++) { 
            $mAllPins[] = GeneratePin::GetPin();
        }
        return $mAllPins;
    }



    public static function GetAdminMaintenenceInfo($mUsername)
    {

        //Build the parameter array
        $sql = "SELECT maintain_id, password
                FROM maintain
                WHERE username = :username";
        $params = array(
            ':username' => $mUsername
        );
        //execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);


    }

    public static function GetLatestRequest()
    {
        //Build the sql query 
        $sql = "SELECT requested_id, numberOfPin, price, total, approve, sys_date
                FROM requested
                ORDER BY requested_id DESC
                LIMIT 1";
        //Execute the request and return the result
        return DatabaseHandler::GetRow($sql);
    }




    //ApproveRequestToPrint($this->mRequestedPinId)

    public static function ApproveRequestToPrint($mRequestedPinId)
    {
        //Build the sql query 
        $sql = "SELECT roadstar_approve_request_to_print(:mRequestedPinId)";
        //Build the parameter array
        $params = array(
            ':mRequestedPinId' => $mRequestedPinId
        );
        //Execute the request and return the result 
        return DatabaseHandler::GetOne($sql, $params);

    }



}

    // $result = GeneratePin::GetThisManyPins(5);
    // var_dump($result);;


    

?>