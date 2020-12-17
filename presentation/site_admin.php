<?php
class SiteAdmin 
{
    public $mSiteUrl;
    public $mLinkToAdmin;
    public $mLoginMessage;
    public $mUsername;
    public $mLinkToIndex;
    public $mMaintenanceMsg = false;
    public $mShowRequestTable = false;
    public $mMaintenanceMsg4Approval = false;

    public $mInnerContent = 'blank.tpl';

    private $_mErrors = 0;

    public function __construct()
    {
        // $this->mLinkToAdmin = Link::ToAdmin();
        $this->mLinkToAdmin = Link::ToMaintenanceAdmin();
        $this->mLinkToIndex = Link::ToIndex();
        $this->mSiteUrl = Link::Build('');
        $this->mInnerContent = 'site_maintenance_login.tpl';


        if(isset($_POST['submitBTNsa']))
        {

            //Modification of Admin login logic 
            if((isset($_POST['username_sa'])) && (isset($_POST['password_sa'])))
            {
                //The password and username(email) is not empty
                //Cross-check with the value in the database Validate
                include_once(BUSINESS_DIR . 'validator.php');
                include_once(BUSINESS_DIR . 'fields.php');
                include_once(BUSINESS_DIR . 'teachers.php');

                $validate = new Validate();
                $fields = $validate->getFields();

                //Add all the field values
                $fields->addField('username_sa');
                $fields->addField('password_sa');
                // $fields->addField('admin_type');

                $validate->email('username_sa', filter_input(INPUT_POST, 'username_sa', FILTER_SANITIZE_EMAIL));
                $validate->password('password_sa', filter_input(INPUT_POST, 'password_sa', FILTER_SANITIZE_STRING));

                if((empty($_POST['username_sa'])) || (empty($_POST['password_sa'])) || ($fields->hasErrors()))
                    $this->mLoginMessage = 'Login failed. Please try again 1';
                else 
                {
                    //Start comparing with values of the ones in the database 
                    $this->mUsername = filter_input(INPUT_POST, 'username_sa', FILTER_SANITIZE_EMAIL);
                    $this->mPassword = filter_input(INPUT_POST, 'password_sa', FILTER_SANITIZE_STRING);

                    //Retrieve the values from the databas 
                    $this->mUser = GeneratePin::GetAdminMaintenenceInfo($this->mUsername);
                    if($this->mUser)
                    {
                        $this->mPassword_m = HASH_PREFIX.HASH_PREFIX.$this->mPassword.$this->mUsername.$this->mPassword;

                        if(password_verify($this->mPassword_m, $this->mUser['password']))
                        {
                            $_SESSION['maintenance_on'] = true;
                            $this->mMaintenanceMsg = "Welcome Engineer";
                            $this->mShowRequestTable = true;

                            //Call for the latest request-to-print-PIN
                            $this->mLatestRequest = GeneratePin::GetLatestRequest();

                        }
                        else
                        {
                            $this->mLoginMessage = "Dont mess with us";
                            $this->_mErrors++;
                        }

                    }
                    else
                    {
                        $this->mLoginMessage = "Dont mess with us";
                        $this->_mErrors++;
                    }
                        
                }

            }
        }

    }




    public function init()
    {
        if((isset($_POST['ApproveSubmitBtn'])) && ($_POST['ApproveSubmitBtn'] === 'Approve'))
        {
            //Go to the table named requested and select 
            //requestedPinId
            $this->mRequestedPinId = (int)filter_input(INPUT_POST, 'requestedPinId', FILTER_VALIDATE_INT);
            $this->mApprovedOk = (int)GeneratePin::ApproveRequestToPrint($this->mRequestedPinId);

            if($this->mApprovedOk === 1)
            {
                
                $this->mMaintenanceMsg4Approval = "PIN printing has been approved";

            }

        }
    }
    
}

?>