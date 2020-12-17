<?php 

class StudentPin 
{


      public static function GetPinInfor($pin)
    {
        //Build the SQL query IsPinValid
        $sql = 'CALL student_get_pin_info(:pin)';
        //Build the parameter array 
        $params = array(
            ':pin' => $pin
        );
        //Execute the query and return the results
        return DatabaseHandler::GetRow($sql, $params);
    }



    public static function IsPinValid($pin)
    {
        $stud_pin = self::GetPinInfor($pin);
        if(empty($stud_pin['pin_id']))
            return 0;
        else 
            return 1;

        // $customer_id = $customer['customer_id'];
        // $hashed_password = $customer['password'];

        // if(PasswordHasher::Hash($password) != $hashed_password)
        //     return 1;
        // else 
        // {
        //     $_SESSION['schoolshop_customer_id'] = $customer_id;
        //     return 0;
        // }
    }







}
?>