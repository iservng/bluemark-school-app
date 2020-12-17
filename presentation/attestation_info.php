<?php 
//The attestation logic handler
class AttestationInfo 
{
    //Public members 
    public $mAttestationError = 0;
    public $mAttestation;
    public $mUserId;


    public $mLinkToNurseryForm;
    public $mLinkToPrimaryForm;
    public $mLinkToSecondaryForm;
    public $mLinkToApplicationDone;

    public $mSection4rmurl;

    public $mLinkOnTheForm;

    //Private members
    private $_mFieldErrors;

    //Class constructor 
    public function __construct()
    {
         //Ensure the this page is viewd securely
        if(!isset($_SESSION['show_onyeka_form']) || 
        $_SESSION['show_onyeka_form'] != true || 
        !isset($_SESSION['pin_on_valid']) || 
        !isset($_SESSION['pin_onyeka_valid']) || 
        $_SESSION['pin_on_valid'] == false || 
        $_SESSION['pin_onyeka_valid'] != 1) 
        {
            //Redirects to the Home page
            $this->mSiteUrl = Link::Build('');
            header('Location: ' . $this->mSiteUrl);
            exit();

        }


        
       

        $userId = (int)$_SESSION['cur_user_id'];
        $userEmail = $_SESSION['cur_user_email'];
        if(isset($userEmail) && isset($userId))
        {
            $this->mUserId = $userId;


        }
        else 
            trigger_error('The user ID and Email is not set in attestation information section of the form');


        if(isset($_GET['SelectedSection']))
            $this->mSection4rmurl = filter_input(INPUT_GET, 'SelectedSection');


        if(isset($_POST['user_attestation_info']))
        {
            $this->mAttestation = filter_input(INPUT_POST, 'attestation', FILTER_SANITIZE_STRING);
            //Check if the right value
             if($this->mAttestation == 'Agree')
            {
                $this->mAttestation = 1;
            }
            else 
            {
                 $this->mAttestationError = 1;
                $this->_mFieldErrors++;
            }
        }

        


        $this->mLinkToNurseryForm = Link::ToNurseryForm();
        $this->mLinkToPrimaryForm = Link::ToPrimaryForm();
        $this->mLinkToSecondaryForm = Link::ToSecondaryForm();
        $this->mLinkToApplicationDone = Link::ToApplicationDone();

        //Swit the link on the form
        switch ($this->mSection4rmurl) {
            case 'Primary':
                $this->mLinkOnTheForm = Link::ToPrimaryForm();
                break;
            case 'Nursery':
                $this->mLinkOnTheForm = Link::ToNurseryForm();
                break;
            case 'Secondary':
                $this->mLinkOnTheForm = Link::ToSecondaryForm();
                break;
            default:
                # code...
                break;
        }
            

    }



    public function init()
    {
        if(isset($_POST['user_attestation_info']) && $this->_mFieldErrors == 0)
        {
            //Call the business tier function that will save the attestation
            //But check the field again
            if(isset($this->mUserId))
            {
                Applicant::AddUserAttestation($this->mUserId, $this->mAttestation, $this->mSection4rmurl);
                //Identify what part of form was submitted
                $_SESSION['form_part'] = filter_input(INPUT_POST, 'formPart');

                switch (filter_input(INPUT_GET, 'SelectedSection')) 
                {
                case 'Nursery':
                    
                    $redirect_to = Link::ToNurseryForm();
                    header('Location: ' . $redirect_to);
                    break;

                case 'Primary':
                    // $_SESSION['form_part'] = filter_input(INPUT_POST, 'formPart');
                    $redirect_to = Link::ToPrimaryForm();
                    header('Location: ' . $redirect_to);
                    break;

                case 'Secondary':
                    // $_SESSION['form_part'] = filter_input(INPUT_POST, 'formPart');
                    $redirect_to = Link::ToSecondaryForm();
                    header('Location: ' . $redirect_to);
                    break;
                    
                default:
                    # code...
                    break;
                }
            }
                

            


        }





    }

}
?>