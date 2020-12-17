<?php 

class StaffLogin 
{
    //Public member available to smarty
    public $mSiteUrl;
    // public $mLinkToAdmin;
    public $mLoginMessage;
    // public $mUsername;
    public $mLinkToIndex;

    public $mLinkToCheckEmploymentStatus;
    public $mLinkToLoginLink;

    //Login credentialsmLoginMessage
  
    public $mStaffEmail;
    public $mStaffEmailError = 0;
    public $mLinkToLogin;

    public $mStaffPassword;
    public $mStaffPasswordError = 0;
    public $mWarnErrorMsg;
    public $mCurrentStaffStatus;
    public $mStaffEmploymentProcessStage = array('Applicant', 'Suspended', 'Blocked', 'Pending', 'notified', 'Uploaded', 'Staff');
    public $mWaitingForActivation = false;
    //Private members 
    private $_mStaffAction;
    private $_mErrors = 0;


    public function __construct()
    {
        if(USE_SSL == 'yes' && getenv('HTTPS') != 'on')
            $this->mLinkToLogin = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')), 'https');
        else 
            $this->mLinkToLogin = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));

        $this->mLinkToRegisterCustomer = Link::ToRegisterCustomer();
        //I never do any thing here 
        $this->mSiteUrl = Link::Build('', 'https');

        
        //Make sure that the submit button was clicked 
        if(isset($_POST['LoginStaff']))
        {
                //Star validation stuff 
            if(!isset($_POST['stfusername']))
            {
                $this->mStaffEmailError = 1;
                $this->_mErrors++;
            }
            else
            {
                 //collect the credentials 
                $emailpattern = '/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,5})(\.[a-z]{2,5})?$/';
                $emailresult = preg_match($emailpattern, filter_input(INPUT_POST, 'stfusername'));
              
                if($emailresult !== 1)
                {
                    $this->mStaffEmailError = 1;
                    $this->_mErrors++;
                    $this->mLoginMessage = 'Access Denied';
                }
                else 
                    $this->mStaffEmail = filter_input(INPUT_POST, 'stfusername', FILTER_SANITIZE_EMAIL);
            } 
                
            $paswdpattern = '/^[a-zA-Z0-9]{8,35}$/';
            $password = filter_input(INPUT_POST, 'stfpassword');
            $pasResult = preg_match($paswdpattern, $password);

            if(!isset($_POST['stfpassword']) || !($pasResult === 1))
            {
                $this->mStaffPasswordError = 1;
                $this->_mErrors++;
                $this->mLoginMessage = 'Access Denied';
            }
            else 
                $this->mStaffPassword = filter_input(INPUT_POST, 'stfpassword');
        }

        $this->mLinkToCheckEmploymentStatus = Link::ToCheckEmploymentStatus();
        $this->mLinkToLoginLink = Link::ToStaffLoginPage();

        if(isset($_SESSION['waiting_for_activation']))
            $this->mWaitingForActivation = true;
    }


    public function init()
    {
        /*
            The construct has checking dealth with above
            1. The techer will be taken to his class (teachers_class.tpl)
            2. The teacher is not activated by admin (Then show him not_activate side of this form)
        */ 
        if(isset($_POST['LoginStaff']) && $this->_mErrors == 0)
        {
            /*
                0 = teacher exists, email and password all correct
                1 = teacher exists, but email or password invalid 
                2 = teacher does not exist//
            */
            $login_status = Customer::IsValidStaff($this->mStaffEmail, $this->mStaffPassword);
            switch ($login_status) {
                case 2:
                    $this->mWarnErrorMsg = 'Unauthorized Access';
                    break;
                case 1:
                    $this->mWarnErrorMsg = 'Staff Access only';
                    break;
                case 0:
                    /*
                        Every login credential is good 
                        but we need to know if has been activated
                    */
                    $staff_id = (int)$_SESSION['schoolshop_staff_id']; 
                    $staff_status = Customer::GetStaffStatusForLogin($staff_id);
                    $this->mCurrentStaffStatus = (int)$staff_status['status'];

                    if($this->mCurrentStaffStatus == 6)
                    {
                        //Redirect to the Teachers class           
                        //if(empty($_SESSION['staff_admin_logged']))
                        $_SESSION['staff_admin_logged'] = true;
                            
                        $redirect_to = Link::ToTeachersClassPage();
                        header('Location: ' . $redirect_to);
                        exit();
                    break;
                    }
                    
                    break;
                
                default:
                    # code...Take him to the front page 
                    $redirect_to = $this->mSiteUrl;
                    header('Location: ' . $redirect_to);
                    
                    break;
            }


        }

    }


}
?>