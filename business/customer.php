<?php
//Business tier that manages customer account functionality
class Customer 
{
    //Check if a customer id existes in session GetClassNameById
    public static function IsAuthenticated()
    {
        if(!(isset($_SESSION['schoolshop_customer_id'])))
            return 0;
        else 
            return 1;
    }


    //Return customer_id and password for customer with email $email
    public static function GetLoginInfor($email)
    {
        //Build the SQL query IsValid Add
        $sql = 'CALL customer_get_login_info(:email)';
        //Build the parameter array 
        $params = array(
            ':email' => $email
        );
        //Execute the query and return the results
        return DatabaseHandler::GetRow($sql, $params);
    }



    public static function IsValid($email, $password)
    {
        $customer = self::GetLoginInfor($email);
        if(empty($customer['customer_id']))
            return 2;

        $customer_id = $customer['customer_id'];
        $hashed_password = $customer['password'];

        $password_f = $password.$email.$password;

        if(!password_verify($password_f, $customer['password']))
            return 1;
        else 
            return self::IsValidStudent($email, $password_f, $customer_id);
            
        
    }

    public static function IsValidStudent($email, $password, $customer_id)
    {
            // $mPassConstructed = $password.$email.$password;

            $mStudenId_n_password = self::GetStudentFromApplicants($email);
            $mStudentId = (int)$mStudenId_n_password['applicants_id'];

            // PasswordHasher::Hash($mPassConstructed) != $mStudenId_n_password['password'] Logout

            if((!password_verify($password, $mStudenId_n_password['password'])) || empty($mStudentId))
            {
                return 3;
            }
            else
            {
                //We will use the retrieved ID to also confirm that student id is in the active_class table of the database SetStatusToCurrentState
                if(self::IsStudentInActive($mStudentId))
                {
                    $_SESSION['schoolshop_customer_id'] = $customer_id;
                    $_SESSION['schoolshop_student_id'] = $mStudentId;
                    return 0;

                }
                else 
                    return 4;
            }

    }

    public static function IsStudentInActive($mStudentId)
    {
        //Build the sql query
        $sql = "SELECT student_in_active_classid(:student_id)";
        //Build the parameter array
        $params = array(
            ':student_id' => $mStudentId
        );
        //Execute the query and return the result
        return DatabaseHandler::GetOne($sql, $params);
    }

    public static function GetStudentFromApplicants($email)
    {
        //Build the sql query
        
        $sql = "SELECT applicants_id, password
                FROM applicants
                WHERE email = :email AND
                    status = 'Admitted' AND 
                    reg_number IS NOT NULL";

        //Build the parameter array 
        $params = array(
            ':email' => $email
        );

        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);
    }

    //First function 
//     BEGIN 
//     SELECT teachers_id, password FROM teachers WHERE email = inEmail;
// END
    public static function GetLoginInforStaff($email)
    {
        //Build the SQL query 
        $sql = 'CALL customer_get_login_info_staff(:email)';
        //Build the parameter array 
        $params = array(
            ':email' => $email
        );
        //Execute the query and return the results
        return DatabaseHandler::GetRow($sql, $params);
    }

    public static function GetListOfStates()
    {
        //Buile the sql query 
        $sql = "SELECT states_id, name 
                FROM states";
        //Execute the query and return the result
        return DatabaseHandler::GetAll($sql);
    }


    public static function GetFileList($path) {
        $files = array();
        if (!is_dir($path)) { return $files; }

        $items = scandir($path);
        foreach ($items as $item) {
            $item_path = $path . DIRECTORY_SEPARATOR . $item;
            if (is_file($item_path)) {
                $files[] = $item;
            }
        }
        return $files;
    }

    public static function IsDuplicate($postefile, $fileAlreadyPresent)
    {
        $result = false;
        foreach ($fileAlreadyPresent as $key => $present) {
            if($present === $postefile)
                $result = true;
        }
        return $result;

    }
/********************************************** CheckFile ********
 * Add
 * *****************************************************
******************************************************/
    public static function GetStatusByEmail($mail)
    {
        //Build the sql query
        $sql = 'CALL applicant_get_current_status_for_checking(:email)';
        //Build the parameter array
        $params = array(
            'email' => $mail
        );
        //Execute the query and return the result
        return DatabaseHandler::GetRow($sql, $params);

    }

    public static function IsEmailAvailable($email)
    {
        $staffChecking = self::GetLoginInforStaff($email);
            if(empty($staffChecking['teachers_id']))
                return 2;
            else 
                return 0;
    }
    
    public static function IsValidStaff($email, $password)
    {
        if($password === 'checkingStatus')
        {
            //A staff is checking his status
            $staffChecking = self::GetLoginInforStaff($email);
            if(empty($staffChecking['teachers_id']))
                return 2;
            else 
                return 0;
        }

        $staff = self::GetLoginInforStaff($email);
        if(empty($staff['teachers_id']))
            return 2;

        $staffm_id = (int)$staff['teachers_id'];
        $hashed_password = $staff['password'];
        $mPassword = HASH_PREFIX.HASH_PREFIX.$password.$email.$password;
        

        if(!(password_verify($mPassword, $hashed_password)))
            return 1;
        else 
        {
            $_SESSION['schoolshop_staff_id'] = $staffm_id;
            return 0;
        }
    }

    /******************************************************
 * *****************************************************
******************************************************/
    public static function GetAllWaitingForActivation($mCurrentDate, $activationNumber)
    {
        //Build the sql query
        $sql = 'CALL school_get_applicants_waiting_activation(:curDate, :actNumber)';
        //Build the parameter array
        $params = array(
            ':curDate' => $mCurrentDate,
            ':actNumber' => $activationNumber
        );
        //Execute the query and return the result IsValid
        return DatabaseHandler::GetRow($sql, $params);

    }


    public static function Logout()
    {
        unset($_SESSION['schoolshop_customer_id']);
        unset($_SESSION['schoolshop_student_id']); 
    }


    public static function GetCurrentCustomerId()
    {
        if(self::IsAuthenticated())
            return $_SESSION['schoolshop_customer_id'];
        else 
            return 0;
    }


    /* IsValid Adds a new customer Get account, log him in if $addAndLogin is true
    // and return customer_id*/ 
    public static function Add($name, $email, $password, $addAndLogin = true)
    {
        // $password = $password.$email.$password;
        // $hashed_password = password_hash($password, PASSWORD_BCRYPT);IsDuplicate

        //Build the SQL query
        $sql = 'CALL customer_add(:name, :email, :password)';
        //Build the parameter array 
        $params = array(
            ':name' => $name,
            ':email' => $email,
            ':password' => $password
        );
        //Execute the query and get the customer_id
        $customer_id = DatabaseHandler::GetOne($sql, $params);
        if($addAndLogin)
            $_SESSION['schoolshop_customer_id'] = $customer_id;
        
        return $customer_id;
    }



    public static function Get($customerId = null)
    {
        if(is_null($customerId))
            $customerId = self::GetCurrentCustomerId();

        //Build the SQL query 
        $sql = 'CALL customer_get_customer(:customer_id)';
        //Build the parameter array
        $params = array(
            ':customer_id' => $customerId
        );
        //Execute the query and return the results 
        return DatabaseHandler::GetRow($sql, $params);
    }



    public static function UpdateAccountDetails($name, $email, $password, $dayPhone, $evePhone, $modPhone, $customerId = null)
    {
        if(is_null($customerId))
            $customerId = self::GetCurrentCustomerId();

        $hashed_password = PasswordHasher::Hash($password);

        //Build the SQL query IsValid
        $sql = 'CALL customer_update_account(:customer_id, :name, :email, :password, :day_phone, :eve_phone, :mob_phone)';
        //Build the parameter array 
        $params = array(
            ':customer_id' => $customerId,
            ':name' => $name,
            ':email' => $email,
            ':password' => $hashed_password,
            ':day_phone' => $dayPhone,
            ':eve_phone' => $evePhone,
            ':mob_phone' => $modPhone
        );
        //Execute the query IsValid
        DatabaseHandler::Execute($sql, $params);
    }


    public static function DecryptCreditCard($encryptedCreditCard)
    {
        $secure_card = new SecureCard();
        $secure_card->LoadEncryptedDataAndDecrypt($encryptedCreditCard);

        $credit_card = array();
        $credit_card['card_holder'] = $secure_card->CardHolder;
        $credit_card['card_number'] = $secure_card->CardNumber;

        $credit_card['issue_date'] = $secure_card->IssueDate;
        $credit_card['expiry_date'] = $secure_card->ExpiryDate;
        $credit_card['issue_number'] = $secure_card->IssueNumber;
        $credit_card['card_type'] = $secure_card->CardType;
        $credit_card['card_number_x'] = $secure_card->CardNumberX;

        return $credit_card;
    }




    public static function GetPlainCreditCard()
    {
        $customer_data = self::Get();

        if(!(empty($customer_data['credit_card'])))
            return self::DecryptCreditCard($customer_data['credit_card']);
        else 
            return array(
                'card_holder' => '', 'card_number' => '',
                'issue_date' => '', 'expiry_date' => '',
                'issue_number' => '', 'card_type' => '',
                'card_number_x' => ''
            );
    }




    public static function UpdateCreditCardDetails($plainCreditCard, $customerId = null)
    {
        if(is_null($customerId))
            $customerId = self::GetCurrentCustomerId();

        $secure_card = new SecureCard();
        $secure_card->LoadPlainDataAndEncrypt($plainCreditCard['card_holder'], $plainCreditCard['card_number'], $plainCreditCard['issue_date'], $plainCreditCard['expiry_date'], $plainCreditCard['issue_number'], $plainCreditCard['card_type']);

        $encrypted_card = $secure_card->EncryptedData;

        //Build the SQL query 
        $sql = 'CALL customer_update_credit_card(:customer_id, :credit_card)';
        //Build the parameter array 
        $params = array(
            ':customer_id' => $customerId,
            ':credit_card' => $encrypted_card
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }

    public static function UpdateCreditCardDetails_onyeka($plainCreditCard, $customerId = null)
    {
        if(is_null($customerId))
            $customerId = self::GetCurrentCustomerId();

        $secure_card = new SecureCard();
        $secure_card->LoadPlainDataAndEncrypt($plainCreditCard['card_holder'], $plainCreditCard['card_number'], $plainCreditCard['issue_date'], $plainCreditCard['expiry_date'], $plainCreditCard['issue_number'], $plainCreditCard['card_type']);

        $encrypted_card = $secure_card->EncryptedData;

        //Build the SQL query 
        $sql = 'CALL customer_update_credit_card(:customer_id, :credit_card)';
        //Build the parameter array 
        $params = array(
            ':customer_id' => $customerId,
            ':credit_card' => $encrypted_card
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }




    public static function GetShippingRegions()
    {
        //Build the SQL query 
        $sql = 'CALL customer_get_shipping_regions()';
        //Execute the query and return the results IsValid
        return DatabaseHandler::GetAll($sql);

    }



    public static function UpdateAddressDetails($address1, $address2, $city, $region, $postalCode, $country, $shippingRegionId, $customerId = null)
    {
        if(is_null($customerId))
            $customerId = self::GetCurrentCustomerId();

        //Build the SQL query 
        $sql = 'CALL customer_update_address(:customer_id, :address_1, :address_2, :city, :region, :postal_code, :country, :shipping_region_id)';
        //uild the parameter array 
        $params = array(
            ':customer_id' => $customerId,
            ':address_1' => $address1,
            ':address_2' => $address2,
            ':city' => $city,
            ':region' => $region,
            ':postal_code' => $postalCode,
            ':country' => $country,
            ':shipping_region_id' => $shippingRegionId
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }


    //Gets all customers names with their associated ids
    public static function GetCustomersList()
    {
        //Build the SQL query 
        $sql = 'CALL customer_get_customers_list()';
        //Execute the query and return the result 
        return DatabaseHandler::GetAll($sql);
    }




// ------------------------------------------------------
//THESE FUNCTIONS HANDLE THE REQUESTS FROM APPLICANTS
// ------------------------------------------------------


/*

    SELECT applicants_id, firstname, surname, email, f_phone, applied_on, status 
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND reg_number IS NULL
    ORDER BY applied_on DESC; GetNurseryApplications

*/
    public static function GetCurrentApplications($year)
    {
            //Build theSQL query 
            $sql = 'CALL applicant_get_current_applications(:year)';
            //Build the parameter array
            $params = array(
                ':year' => $year
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetAll($sql, $params);
    }



    /*
       SELECT applicants_id, firstname, surname, email, f_phone, applied_on
    FROM applicants 
    WHERE YEAR(applied_on) = inYear AND section = 'Nursery' AND reg_number IS NULL
    ORDER BY applied_on; IsValid
    */
    public static function GetNurseryApplications($year)
    {
        //Build the SQL query 
        $sql = 'CALL applicant_get_nursery_applicants_by_year(:year)';
        //Build the parameter array
        $params = array(
            ':year' => $year
        );
        //Execute the query and return the results
        return DatabaseHandler::GetAll($sql, $params);
    }


     public static function GetPrimaryApplications($year)
    {
        //Build the SQL query 
        $sql = 'CALL applicant_get_primary_applicants_by_year(:year)';
        //Build the parameter array
        $params = array(
            ':year' => $year
        );
        //Execute the query and return the results
        return DatabaseHandler::GetAll($sql, $params);
    }



     public static function GetSecondaryApplications($year)
    {
        //Build the SQL query 
        $sql = 'CALL applicant_get_secondary_applicants_by_year(:year)';
        //Build the parameter array
        $params = array(
            ':year' => $year
        );
        //Execute the query and return the results
        return DatabaseHandler::GetAll($sql, $params);
    }


    public static function GetTeacherApplications($year)
    {
        //Build the SQL query 
        $sql = 'CALL applicant_get_teacher_applicants_by_year(:year)';
        //Build the parameter array
        $params = array(
            ':year' => $year
        );
        //Execute the query and return the results
        return DatabaseHandler::GetAll($sql, $params);
    }

    public static function GetTeacherApplicationsByStatus($CurrentDate, $status)
    {
         //Build the SQL query 
        $sql = 'CALL applicant_awaiting_by_year_and_status(:year, :status)';
        //Build the parameter array
        $params = array(
            ':year' => $CurrentDate,
            ':status' => $status
        );
        //Execute the query and return the results
        return DatabaseHandler::GetAll($sql, $params);

    }


    //The function that gets student application information
    public static function GetStudentProfileInfo($studentId)
    {
        //Build the SQL query
        $sql = 'CALL applicant_get_student_profile_info(:student_id)';
        //Build the parameter array
        $params = array(
            ':student_id' => $studentId
        );
        //Execute the query and return the result
        return DatabaseHandler::GetRow($sql, $params);
    }

    public static function GetClassNameById($mClassToAssign)
    {
        //Build the sql query AdmitAndAssignClass
        $sql = 'CALL applicant_get_classname_by_id(:id)';
        //build the parameter array 
        $params = array(
            ':id' => $mClassToAssign
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);

    }


    //The function that get student age GetCurrentApplications
    public static function GetStudentAge($studentId)
    {
        //Build the SQL query 
        $sql = 'CALL applicant_get_student_age(:student_id)';
        //Build the parameter array
        $params = array(
            ':student_id' => $studentId
        );
        //Execute the query and return the result GetClassNameById
        return DatabaseHandler::GetRow($sql, $params);
    }



    //The function that admits and assign a class to a student
    public static function AdmitAndAssignClass($studentId, $class_assign)
    {
        //Build the sql query 
        $sql = 'CALL applicant_admit_and_assign_class(:student_id, :class_assign)';
        //Build the parameter array
        $params = array(
            ':student_id' => $studentId,
            ':class_assign' => $class_assign
        );
        //Execute the query 
        return DatabaseHandler::GetRow($sql, $params);
    }


    public static function CancelAdmission($studentId)
    {
        //BuilD the SQL QUERY 
        $sql = 'CALL applicant_cancel_admission(:student_id)';
        //Build the parameter array
        $params = array(
            ':student_id' => $studentId
        );
        //Execute the query and return th result
        return DatabaseHandler::GetRow($sql, $params);
    }



    //Thfunction that count addmited student for the current yaer
    public static function GetAdmittedCurrentYearCount($Admitted)
    {
        //Build the sql query 
        $sql = 'CALL applicant_count_admitted_for_current_year(:admitted)';
        //Build the parameter array 
        $params = array(
            ':admitted' => $Admitted
        );
        //Execute the query and return the result
        return DatabaseHandler::GetOne($sql, $params);
    }


     public static function GetTeacherUserInfo($mTeacherId)
    {
        //Build the sql query 
        $sql = 'CALL applicant_get_teacher_info(:teacher_id)';
        //Build the parameter array 
        $params = array(
            ':teacher_id' => $mTeacherId
        );
        //Execute the query and return the result
        return DatabaseHandler::GetRow($sql, $params);

    }


    //Set the teacher applicant status to pending 
//     BEGIN 
//     UPDATE teachers 
//     SET status = inIndex
//     WHERE teachers_id = inTeacherId;IsValidStaff
// END
    public static function SetStatusToCurrentState($index, $mTeacherId)
    {
        //Build the sql query
        $sql = 'CALL applicant_set_teacher_applicant_to_pending(:pending, :teacher_id)';
        //Build the parameter array
        $params = array(
            ':pending' => $index,
            ':teacher_id' => $mTeacherId
        );
        //Execute the query
        DatabaseHandler::Execute($sql, $params);
    }



    //Get the staff current status 
    public static function GetStaffStatusForLogin($staffId)
    {
        //Build the sql query 
        $sql = 'CALL applicant_get_staff_current_status(:staff_id)';
        //Build the parameter array 
        $params = array(
            'staff_id' => $staffId
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);
    }


    public static function GetStaffStatusForChecking($mCheckingEmail)
    {
        //Build the sql query 
        $sql = 'CALL applicant_get_current_status_for_checking(:email)';
        //Build the parameter array
        $params = array(
            ':email' => $mCheckingEmail
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);

    }


    //Grabs  lists of all classes separately
    public static function GetOnlyNurseryClasses($departmentId)
    {
        //Build sql query
        // $sql = 'CALL school_get_nursery_classes(:department_id)';
        $sql = 'CALL school_get_classes_by_department(:department_id)';
        //Build the parameter array
        $params = array(
            ':department_id' => $departmentId
        );
        //Execute the query and return the result
        return DatabaseHandler::GetAll($sql, $params);

    }

    public static function GetOnlyPrimaryClasses($departmentId)
    {
        //Build sql query
        // $sql = 'CALL school_get_primary_classes(:department_id)';
        $sql = 'CALL school_get_classes_by_department(:department_id)';
        //Build the parameter array
        $params = array(
            ':department_id' => $departmentId
        );
        //Execute the query and return the result
        return DatabaseHandler::GetAll($sql, $params);

    }

    public static function GetOnlySecondaryClasses($departmentId)
    {
        //Build sql query
        // $sql = 'CALL school_get_secondary_classes(:department_id)';
        $sql = 'CALL school_get_classes_by_department(:department_id)';
        //Build the parameter array
        $params = array(
            ':department_id' => $departmentId
        );
        //Execute the query and return the result
        return DatabaseHandler::GetAll($sql, $params);

    }



    public static function SetTeacherClasses($mTeacherId, $classId)
    {
        //Build the sql 
        $sql = 'CALL school_set_teachers_classes(:teacher_id, :class_id)';
        //Build the parameter array
        $params = array(
            'teacher_id' => $mTeacherId,
            'class_id' => $classId
        );
        //Execute the query
        DatabaseHandler::Execute($sql, $params);

    }






}
?>