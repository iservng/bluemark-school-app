<?php



class Applicant 
{
   


/*8888888888888888888888888888888888888888888888888888888888888888888888888888
    AddPersonalInfo($mFirstname, $mSurname, $mOthername, $mPassword, $mConfirmPassword, $mEmail, $mGender, $mStateoforigin, $mDateofbirth, $mPassport, $mBirthcertificate, $mPrimarycertificate)
    GetTeacherEmailInfor 
******************************************************************/
    public static function AddPersonalInfo($passport_name_100, $passport_name_400, $birthcert_name_400, $primarycert_name_400, $mFirstname, $mEmail, $mSurname, $mOthername, $password, $Dateofbirth, $mGender, $mStateoforigin)
    {
        //Build the sql query 
        $sql = 'CALL applicant_add_user_personal_info(:passport_name_100, :passport_name_400, :birthcert_name_400, :primarycert_name_400, :mFirstname, :mEmail, :mSurname, :mOthername, :password, :mDateofbirth, :mGender, :mStateoforigin)';
        //Build the parameter array
        $params = array(
            ':passport_name_100' => $passport_name_100, 
            ':passport_name_400' => $passport_name_400, 
            ':birthcert_name_400' => $birthcert_name_400, 
            ':primarycert_name_400' => $primarycert_name_400, 
            ':mFirstname' => $mFirstname, 
            ':mEmail' => $mEmail, 
            ':mSurname' => $mSurname, 
            ':mOthername' => $mOthername, 
            ':password' => $password, 
            ':mDateofbirth' => $Dateofbirth, 
            ':mGender' => $mGender, 
            ':mStateoforigin' => $mStateoforigin
        );
        //Execute the query and return the result
        return DatabaseHandler::GetOne($sql, $params);

    }


    public static function AddUserMedicalInfo($userId, $docreport_name_400, $mBloodgroup, $mGenotype, $mAllergies, $mDefects, $mImmunized, $mDoctorsname, $mDoctorsphone, $mDoctorsaddress, $mOthermedicalinfo)
    {
        //Build the the sql
        $sql = 'CALL applicant_add_medical_info(:userId, :docreport_name_400, :mBloodgroup, :mGenotype, :mAllergies, :mDefects, :mImmunized,:mDoctorsname, :mDoctorsphone, :mDoctorsaddress, :mOthermedicalinfo)';
        //Build the parameter array()
        $params = array(
            ':userId' => $userId, 
            ':docreport_name_400' => $docreport_name_400, 
            ':mBloodgroup' => $mBloodgroup, 
            ':mGenotype' => $mGenotype, 
            ':mAllergies' => $mAllergies, 
            ':mDefects' => $mDefects, 
            ':mImmunized' => $mImmunized,
            ':mDoctorsname' => $mDoctorsname, 
            ':mDoctorsphone' => $mDoctorsphone, 
            ':mDoctorsaddress' => $mDoctorsaddress, 
            ':mOthermedicalinfo' => $mOthermedicalinfo
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }


    public static function AddFatherInfo($userId, $mFathersfirstname, $mFatherslastname, $mFathersphone, $mFathersofficeaddress, $mFathersoccupation, $mFathersreligion, $mFatherresidentialaddress)
    {
        //Build the sql query 
        $sql = 'CALL applicant_add_father_info(:userId, :mFathersfirstname, :mFatherslastname, :mFathersphone, :mFathersofficeaddress, :mFathersoccupation, :mFathersreligion, :mFatherresidentialaddress)';
        //Build the parameter array
        $params = array(
            ':userId' => $userId, 
            ':mFathersfirstname' => $mFathersfirstname, 
            ':mFatherslastname' => $mFatherslastname, 
            ':mFathersphone' => $mFathersphone, 
            ':mFathersofficeaddress' => $mFathersofficeaddress,
            ':mFathersoccupation' => $mFathersoccupation, 
            ':mFathersreligion' => $mFathersreligion, 
            ':mFatherresidentialaddress' => $mFatherresidentialaddress 
        );
        //Execute the query
        DatabaseHandler::Execute($sql, $params);

    }

    public static function AddMotherInfo($userId, $mMothersfirstname, $mMotherslastname, $mMothersphone, $mMothersofficeaddress, $mMothersoccupation, $mMothersreligion, $mMotherresidentialaddress)
    {
        //Build the sql query 
        $sql = 'CALL applicant_add_mother_info(:userId, :mMothersfirstname, :mMotherslastname, :mMothersphone, :mMothersofficeaddress, :mMothersoccupation, :mMothersreligion, :mMotherresidentialaddress)';
        //Build the parameter array
        $params = array(
            ':userId' => $userId, 
            ':mMothersfirstname' => $mMothersfirstname, 
            ':mMotherslastname' => $mMotherslastname, 
            ':mMothersphone' => $mMothersphone, 
            ':mMothersofficeaddress' => $mMothersofficeaddress, 
            ':mMothersoccupation' => $mMothersoccupation, 
            ':mMothersreligion' => $mMothersreligion, 
            ':mMotherresidentialaddress' => $mMotherresidentialaddress
        );
        //Execute the query
        DatabaseHandler::Execute($sql, $params);//make personal infor do it

    }


    public static function AddUserAttestation($mUserId, $mAttestation, $mSection)
    {
        //Build the sql query 
        $sql = 'CALL applicant_user_attestation(:userId, :attestation, :section)';
        //Build the parameter 
        $params = array(
            ':userId' => $mUserId,
            ':attestation' => $mAttestation,
            ':section' => $mSection
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }


   





    //Function that save the meddical info of student applicant
    public static function add_medical_info($id, $Bloodgroup, $Genotype, $Allergies, $Defects, $Immunized, $Doctorsname, $Doctorsphone,  $Doctorsaddress, $Othermedicalinfo)
    {
        //Build the sql query 
        $sql = 'CALL applicant_add_medical_info(:id :bloodgroup, :genotype, :allergies, :defect, :immunized, :doctorname, :doctorphone, :doctoraddress, :otherinfo)';
        
        //Build the parameter array 
        $params = array(
            ':id' => $id,
            ':bloodgroup' => $Bloodgroup,
            ':genotype' => $Genotype,
            ':allergies' => $Allergies,
            ':defect' => $Defects,
            ':immunized' => $Immunized,
            ':doctorname' => $Doctorsname,
            ':doctorphone' => $Doctorsphone,
            ':doctoraddress' => $Doctorsaddress,
            ':otherinfo' => $Othermedicalinfo

        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }



    //The function that stores fathers info
    public static function add_father_info($userId, $Fathersfirstname, $Fatherslastname, $Fathersphone, $Fathersofficeaddress, $Fathersoccupation, $Fathersreligion, $Fatherresidentialaddress)
    {
        //Build the sql query 
        $sql = 'CALL applicant_add_father_info(:id, :f_fname, :f_lname, :f_phone, :f_office, :f_occupation, :f_religion, :f_residence)';
        //Build the parameter array 
        $params = array(

            ':id' => $userId,
            ':f_fname' => $Fathersfirstname,
            ':f_lname' => $Fatherslastname,
            ':f_phone' => $Fathersphone,
            ':f_office' => $Fathersofficeaddress,
            ':f_occupation' => $Fathersoccupation,
            ':f_religion' => $Fathersreligion,
            ':f_residence' => $Fatherresidentialaddress
            
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }



    public static function add_mother_info($userId, $Mothersfirstname, $Motherslastname, $Mothersphone, $Mothersofficeaddress, $Mothersoccupation, $Mothersreligion, $Motherresidentialaddress)
    {
        //Build the sql query 
        $sql = 'CALL applicant_add_mother_info(:id, :m_fname, :m_lname, :m_phone, :m_office, :m_occupation, :m_religion, :m_residence)';
        //Build the parameter array 
        $params = array(

            ':id' => $userId,
            ':m_fname' => $Fathersfirstname,
            ':m_lname' => $Fatherslastname,
            ':m_phone' => $Fathersphone,
            ':m_office' => $Fathersofficeaddress,
            ':m_occupation' => $Fathersoccupation,
            ':m_religion' => $Fathersreligion,
            ':m_residence' => $Fatherresidentialaddress
            
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }




    //Get applicant email id info 
    public static function GetLoginInfor($email)
    {
        //Build the sqql query 
        $sql = 'CALL applicant_get_login_info(:email)';
        //Build the parameter array 
        $params = array(
            ':email' => $email
        );
        //Execute the query andd return the result
        return DatabaseHandler::GetRow($sql, $params);


    }

    //Get the teacher email info
    public static function GetTeacherEmailInfor($email)
    {
        //Build the sqql query 
        $sql = 'CALL applicant_get_teacher_login_info(:email)';
        //Build the parameter array 
        $params = array(
            ':email' => $email
        );
        //Execute the query andd return the result
        return DatabaseHandler::GetRow($sql, $params);
    }



    //Function that save the applying teachers information 
    public static function add_teacher_info($TeacherFullname, $TeacherPhone, $TeacherEmail, $teacher_cv_name)
    {
        //Build the sql query 
        $sql = 'CALL applicant_add_teacher_info(:fulname, :phone, :email, :cv_name)';
        //Build the parameter array
        $params = array(
            ':fulname' => $TeacherFullname,
            ':phone' => $TeacherPhone,
            ':email' => $TeacherEmail,
            ':cv_name' => $teacher_cv_name
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }



    public static function GetAdmissionMessages($id)
    {
        //Build sql query 
        $sql = 'CALL applicant_get_admission_messages(:id)';
        //Build the paramater array
        $params = array(
            ':id' => $id
        );
        //execute the query and return the results
        return DatabaseHandler::GetRow($sql, $params);
    }


    public static function GetCheckUserAdmissionStatus($email)
    {
        //Build the sql query AddPersonalInfo
        $sql = 'CALL applicant_check_user_admission_status(:email)';
        //Buile the parameter array
        $params = array(
            ':email' => $email
        );
        // Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);

    }



    /*
    The function for uploading teachers files and information 

    AddStaffUploadedCredentials($applicant_read['teachers_id'],$this->mFinalpassword, $this->mBirthCertName, $this->mPrimaryCertName, $this->mOlevelCert1Name, $this->mAlevelCertName, $this->mStaffAddress, $this->mStaffPasportName, $this->mGender, $this->mStatus, $this->mStaffState, $this->mOlevelCert2Name, $this->mProCertName)


    */
    public static function AddStaffUploadedCredentials($teachersId, $mFinalpassword, $mBirthCertName, $mPrimaryCertName, $mOlevelCert1Name, $mAlevelCertName, $mStaffAddress,  $mStaffPasportName, $mGender, $mStatus, $mStaffState, $mOlevelCert2Name = null, $mProCertName = null)
    {
        //Build the sql query GetCheckUserAdmissionStatus
        $sql = 'CALL applicant_add_staff_credentials(:teachersId, :mFinalpassword, :mBirthCertName, :mPrimaryCertName, :mOlevelCert1Name, :mAlevelCertName, :mStaffAddress,  :mStaffPasportName, :mGender, :mStatus, :mStaffState, :mOlevelCert2Name, :mProCertName)';
        //Build the parameter array
        $params = array(
            ':teachersId' => $teachersId, 
            ':mFinalpassword' => $mFinalpassword, 
            ':mBirthCertName' => $mBirthCertName, 
            ':mPrimaryCertName' => $mPrimaryCertName, 
            ':mOlevelCert1Name' => $mOlevelCert1Name, 
            ':mAlevelCertName' => $mAlevelCertName, 
            ':mStaffAddress' => $mStaffAddress,  
            ':mStaffPasportName' => $mStaffPasportName, 
            ':mGender' => $mGender, 
            ':mStatus' => $mStatus,
            ':mStaffState' => $mStaffState,
            ':mOlevelCert2Name' => $mOlevelCert2Name, 
            ':mProCertName' => $mProCertName
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }






  




}
?>