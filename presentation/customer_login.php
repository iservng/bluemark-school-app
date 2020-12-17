<?php

class CustomerLogin
{
    //Public stuff 
    public $mErrorMessage;
    public $mLinkToLogin;
    public $mLinkToRegisterCustomer;
    public $mEmail = '';
    public $mIsPageMassage;
    public $mSubPageMassage;

    //class constructor 
    public function __construct()
    {
        if(USE_SSL == 'yes' && getenv('HTTPS') != 'on')
            $this->mLinkToLogin = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')), 'https');
        else 
            $this->mLinkToLogin = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));

        $this->mLinkToRegisterCustomer = Link::ToRegisterCustomer();
    }


    public function init()
    {
        //Decide if we have submitted 
        if(isset($_POST['Login']))
        {
            //Get login status

            /*
                NOTE: NOT DONE YETXX
                WHEN A CUSTOMER LOGGS IN MEANS A STUDENT LOGS IN SO WE MUST UPDATE TO HADLE THE VALIDATION OF STUDENT FROM THE APPLICANT TABLE AND AMKE SURE IT A VALID STUDENT USING THE ALLAPPROPRIATE TABLE

                NOTE: now DONE 23 - 09 - 2020 / 6:48am
            */
            $login_status = Customer::IsValid($_POST['email'], $_POST['password']);


            switch ($login_status) 
            {
                case 4:
                    $this->mErrorMessage = 'Congratulations.';
                    $this->mIsPageMassage = $this->mErrorMessage;
                    $this->mSubPageMassage = 'Print Admission Letter';
                    break;
                case 3:
                    $this->mErrorMessage = 'Unrecognized Password 3';
                    $this->mIsPageMassage = 'Access Denied';
                    $this->mEmail = $_POST['email'];
                    break;
                case 2:
                    $this->mErrorMessage = 'Unrecognized Email 2.';
                    $this->mIsPageMassage = $this->mErrorMessage;
                    $this->mEmail = $_POST['email'];
                    break;

                case 1:
                    $this->mErrorMessage = 'Unrecognized Password 1';
                    $this->mIsPageMassage = 'Access Denied';
                    $this->mEmail = $_POST['email'];
                    break;

                case 0:
                    $redirect_to_link = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));
                    header('Location:' . $redirect_to_link);
                    exit();
                    break;
                default:
                    # code...
                    break;
            }
        }
    }
}
?>