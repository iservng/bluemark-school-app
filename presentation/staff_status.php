<?php 

class StaffStatus 
{
    //Public member available to smarty
    public $mSiteUrl;
    public $mLinkToAdmin;
    public $mStatusMessage;
    public $mUsername;
    public $mLinkToIndex;

    public $mLinkToCheckEmploymentStatus;
    public $mLinkToLoginLink;
    public $mLinkToUploadCredentials;

    public $mCheckingEmail;
    public $mCheckingEmailError;
    public $mShowWaitingForActivation = false;

    public $mFirstTitle;
    public $mFirstBody;

    public $mSecondTitle;
    public $mSecondBody;
    public $mEmailExists;


    private $_mErrors;



    public function __construct()
    {
        if(USE_SSL == 'yes' && getenv('HTTPS') != 'on')
            $this->mLinkToCheckEmploymentStatus = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')), 'https');
        else 
            $this->mLinkToCheckEmploymentStatus = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));

        $this->mLinkToRegisterCustomer = Link::ToRegisterCustomer();
        //I never do any thing here 
        $this->mSiteUrl = Link::Build('', 'https');



        ///If the button is clicked 
        if(isset($_POST['StaffCheckedBtn']))
        {
            //Start validation
            $emailPattern = '/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,5})(\.[a-z]{2,5})?$/';
            $checkEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
            $emailOK = preg_match($emailPattern, $checkEmail);

            if(!(isset($_POST['userEmail'])) || !($emailOK === 1))
            {
                $this->mCheckingEmailError = 1;
                $this->_mErrors++;
            }
            else 
                $this->mCheckingEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_EMAIL);
        }


        // $this->mLinkToCheckEmploymentStatus = Link::ToCheckEmploymentStatus();
        $this->mLinkToLoginLink = Link::ToStaffLoginPage();
        $this->mLinkToUploadCredentials = Link::ToUploadCredentials();
        //I never do any thing here
        
        //1. $this->mShowWaitingForActivation; = has initial value
        //2.  $this->mSiteUrl; = has its value 
        $this->mLinkToCheckEmploymentStatusForForm = Link::ToCheckEmploymentStatus();
        $this->mStatusMessage = "";
        $this->mLinkToIndex = $this->mSiteUrl;

        $this->mFirstTitle = "";
        $this->mFirstBody = "";

        $this->mSecondTitle = "";
        $this->mSecondBody = "";

        
        

            
    }


    public function init()
    {
        if(isset($_POST['StaffCheckedBtn']) && $this->_mErrors == 0)
        {
            /*
            We want to make sure that this persons email is been used used for applying for the post of a teacher previouse

            1. Check email for its existance in the database
            */

            $this->mEmailExists = (int)Customer::IsEmailAvailable($this->mCheckingEmail);
            if($this->mEmailExists === 0)
            {
                //Here we are sure the email exists 
                //so what is the id of this email

                $status = Customer::GetStatusByEmail($this->mCheckingEmail);
                $currentStatus = (int)$status['status'];
                

                /**
                 * Switch the status to execute the rigth code 
                 * public $mStatusOptions = array('Applicant', 'Suspended', 'Blocked', 'Pending', 'Notified', 'Uploaded', 'Staff');
                 */
                switch ($currentStatus) {
                    case 0:
                        # code...Applicant
                        $this->mFirstTitle = "Employment not in progress";
                        $this->mFirstBody = "Recruitment of new staff is not yet in progress.The school will get in touch with you as soon as it needs your services. Thanks for choosing us";

                        $this->mSecondTitle = "You will be notified";
                        $this->mSecondBody = "Please ensure to consistently check your mails, as the school reaches out to its potential staff through mail. Double apllication will not be processed";
                        $this->mShowWaitingForActivation = true;

                        break;
                    case 1:
                        # code...Suspended
                        $this->mFirstTitle = "You are suspended";
                        $this->mFirstBody = "Suspension was as a displinary measure .The school will get in touch with you as soon as it needs your services. Thanks for choosing us";

                        $this->mSecondTitle = "Suspension Active";
                        $this->mSecondBody = "Please ensure to consistently check your mails, as the school reaches out to its potential staff through mail. Double apllication will not be processed";
                        $this->mShowWaitingForActivation = true;
                        break;
                    case 2:
                        # code...Blocked
                        $this->mFirstTitle = "You are blocked";
                        $this->mFirstBody = "Your are no more authorized to use our sytem any more .The school will get in touch with you as soon as it needs your services. Thanks for choosing us";

                        $this->mSecondTitle = "Completely Blocked";
                        $this->mSecondBody = "In line with our standard of service, once your are not a member of the school your are not allowed into the system. Thank for understanding";
                        $this->mShowWaitingForActivation = true;
                        break;
                    case 3:
                        # code...Pending
                        $this->mFirstTitle = "Your application is pending";
                        $this->mFirstBody = "Your application is in queue for processing .The school will get in touch with you as soon as possible. Thanks for choosing us";

                        $this->mSecondTitle = "Pending";
                        $this->mSecondBody = "In line with our standard of service, you will recieve mail form the school updating on next steps to take. Thank for understanding";
                        $this->mShowWaitingForActivation = true;
                        break;
                    case 4:
                        # code...Notified
                        $this->mFirstTitle = "Upload your credentials";
                        $this->mFirstBody = "Your application is in queue for processing .The school expect to recieve soft copies of your credentials as mentioned in the CV you submitted. Thanks for choosing us";

                        $this->mSecondTitle = '<a href="' .$this->mLinkToUploadCredentials. '">Click here to Upload</a>';
                        $this->mSecondBody = "In line with our standard of service, Use the link provided to proceed with the next step. The link will redirect you to the Credentials Upload Page";
                        $this->mShowWaitingForActivation = true;
                        break;
                    case 5:
                        # code...Uploaded
                        $this->mFirstTitle = "Awaiting Activation";
                        $this->mFirstBody = "Your uploaded credentials have been recieved.The school is finalizing the validation of your submitted credentials in the CV you submitted. Thanks for choosing us";

                        $this->mSecondTitle = 'Account Activation';
                        $this->mSecondBody = "In line with our standard of service, the school resreves the right to activate your account when it deams fit, please ensure to keep checking as it may not take any long. After activation of account, your account will then be accessed using your Email and Password only";
                        $this->mShowWaitingForActivation = true;
                        break;
                    case 6:
                        # code...Staff
                        $this->mFirstTitle = '<b style="color:green">Account Activation Completed</b>';
                        $this->mFirstBody = "Your account has been activated.The school is happy to inform you that your account has been activate, your are a authorized staff, and looks forward to aa great working xperience with you. Thanks for choosing us";

                        $this->mSecondTitle = '<a href="'.$this->mLinkToLoginLink.'">Click to Sign-in</a>';
                        $this->mSecondBody = "In line with our standard of service, the school resreves the right to activate, suspend or block your account when it deams fit, please ensure to always login with only your correct login credentials. Your account will be accessed using your Email and Password only";
                        $this->mShowWaitingForActivation = true;
                        break;
                    default:
                        # code...
                        break;
                }


            }
            else 
            {
                $this->mStatusMessage = 'This email ' . $_POST['userEmail'] . ' does not exist in our system';
            }
            

        }
         
        

    }




}
?>