<?php 

// The class responsible for nursery application form nursery_application
class NurseryApplication 
{
   

    public $mFormContentCell;
    public $mSection;
    public $mLinkToApplicationDone;
    
    public $mSurname;
    public $mFirstname;
  

    //Private properties
  
    private $_mUserId;

    public function __construct()
    {
        $this->mSiteUrl = Link::Build('');

        //Check to ensure that user is authenticated using a valid pin and that user came in through the select-section page
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

        

        if(isset($_GET['SelectedSection']))
            $this->mSection = filter_input(INPUT_GET, 'SelectedSection', FILTER_SANITIZE_STRING);
        else 
            trigger_error('The section variable not set in nursery application dot php');

        
        $this->mFormContentCell = 'student_personal_info_form.tpl';
        

        //Link to where the form will be processed ie this same file
        $this->mLinkToNurseryForm = Link::ToNurseryForm();
        $this->mLinkToPrimaryForm = Link::ToPrimaryForm();
        $this->mLinkToSecondaryForm = Link::ToSecondaryForm();
        $this->mLinkToApplicationDone = Link::ToApplicationDone();
        

        // I STOPPED HEREE 27 - 02 - 2020
    }


    public function init()
    {
    

        if(isset($_SESSION['form_part']))
        {
            switch ($_SESSION['form_part']) {
                case 'userpersonalinfo':
                    //Provide the Medical information form bh
                    $this->mFormContentCell = 'student_medical_info_form.tpl';
                    break;
                case 'usermedicalinfo':
                    //Provide the Father information form
                    $this->mFormContentCell = 'student_father_info_form.tpl';
                    break;//
                case 'userfatherinfo':
                    //Provide the Mother information form/student_mother_info_form
                    $this->mFormContentCell = 'student_mother_info_form.tpl';
                    break;
                case 'usermotherinfo':
                    //Provide the Attestation information form
                    $this->mFormContentCell = 'student_attestation_form.tpl';
                    break;
                case 'userattestationinfo':
                    # code... that will redirect to the application complete page
                    $this->mFirstname = $_SESSION['user_fname'];
                    $this->mSurname = $_SESSION['user_lname'];

                    $_SESSION['application_for'] = $this->mSection;
                    $_SESSION['applicant_name'] = $this->mSurname.' '.$this->mFirstname; 

                    //Redirect to the Registration Done Page
                    $redirect_to = $this->mLinkToApplicationDone;
                    header('Location: ' . $redirect_to);
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