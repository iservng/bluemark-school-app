<?php 
//This class processes the father information
class FatherInfo
{
    //Public members
   
    public $mFathersfirstname;
    public $mFathersfirstnameError = 0;

    public $mFatherslastname;
    public $mFatherslastnameError = 0;

    public $mFathersphone;
    public $mFathersphoneError = 0;

    public $mFathersofficeaddress;
    public $mFathersofficeaddressError = 0;

    public $mFathersoccupation;
    public $mFathersoccupationError = 0;

    public $mFathersreligion;
    public $mFathersreligionError = 0;

    public $mFatherresidentialaddress;
    public $mFatherresidentialaddressError = 0;

    public $mSelectedSection;
    public $mLinkToNurseryForm;
    public $mLinkToPrimaryForm;
    public $mLinkToSecondaryForm;

    public $mSection4rmurl;
    public $mLinkOnTheForm;

    //Private members
    public $_mFieldsError;

    //class constructor
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



        //Get the the user selected school section loginc going
        if(isset($_GET['SelectedSection']))
            $this->mSection4rmurl = filter_input(INPUT_GET, 'SelectedSection', FILTER_SANITIZE_STRING);
        else 
            trigger_error('SelectedSection is not set at father info dot php');

        if(isset($_POST['user_father_info']))
        {
            $validate = new Validate();
            $fields = $validate->getFields();

            //Add the neccessary field names
            $fields->addField('fathersfirstname');
            $fields->addField('fatherslastname');
            $fields->addField('fathersphone');
            $fields->addField('fathersofficeaddress');
            $fields->addField('fathersoccupation');
            $fields->addField('fathersreligion');
            $fields->addField('fatherresidentialaddress');

            //Start the validation stuff 
            
            $validate->onyekaname_text('fathersfirstname', filter_input(INPUT_POST, 'fathersfirstname'));
            if(!isset($_POST['fathersfirstname']) || $fields->hasErrors())
            {
                $this->mFathersfirstnameError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mFathersfirstname = ucfirst(filter_input(INPUT_POST, 'fathersfirstname'));


            $validate->onyekaname_text('fatherslastname', filter_input(INPUT_POST, 'fatherslastname'));
            if(!isset($_POST['fatherslastname']) || $fields->hasErrors())
            {
                $this->mFatherslastnameError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mFatherslastname = ucfirst(filter_input(INPUT_POST, 'fatherslastname'));


            $validate->phone('fathersphone', filter_input(INPUT_POST, 'fathersphone'));
            if(!isset($_POST['fathersphone']) || $fields->hasErrors())
            {
                $this->mFathersphoneError = 1;
                $this->_mFieldsError++;
            }
            else
                $this->mFathersphone = filter_input(INPUT_POST, 'fathersphone');



            $validate->onyeka_address('fathersofficeaddress', filter_input(INPUT_POST, 'fathersofficeaddress'));
            if(!isset($_POST['fathersofficeaddress']) || $fields->hasErrors())
            {
                $this->mFathersofficeaddressError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mFathersofficeaddress = filter_input(INPUT_POST, 'fathersofficeaddress');


            $validate->onyeka_address('fathersoccupation', filter_input(INPUT_POST, 'fathersoccupation'));
            if(!isset($_POST['fathersoccupation']) || $fields->hasErrors())
            {
                $this->mFathersoccupationError = 1;
                $this->_mFieldsError++;
            }
            else
                $this->mFathersoccupation = ucfirst(filter_input(INPUT_POST, 'fathersoccupation'));



            $validate->onyekaname_text('fathersreligion', filter_input(INPUT_POST, 'fathersreligion'));
            if(!isset($_POST['fathersreligion']) || $fields->hasErrors())
            {
                $this->mFathersreligionError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mFathersreligion = ucfirst(filter_input(INPUT_POST, 'fathersreligion'));


            
            $validate->onyeka_address('fatherresidentialaddress', filter_input(INPUT_POST, 'fatherresidentialaddress'));
            if(!isset($_POST['fatherresidentialaddress']) || $fields->hasErrors())
            {
                $this->mFatherresidentialaddressError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mFatherresidentialaddress = filter_input(INPUT_POST, 'fatherresidentialaddress');
            

        }


        $this->mLinkToNurseryForm = Link::ToNurseryForm();
        $this->mLinkToPrimaryForm = Link::ToPrimaryForm();
        $this->mLinkToSecondaryForm = Link::ToSecondaryForm();
        $this->mLinkToApplicationDone = Link::ToApplicationDone();

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


    //Init function 
    public function init()
    {
        if(isset($_POST['user_father_info']) && $this->_mFieldsError == 0)
        {
            $userId = (int)$_SESSION['cur_user_id'];
            $userEmail = $_SESSION['cur_user_email'];

            if(isset($userId) && isset($userEmail))
            {
                Applicant::AddFatherInfo($userId, $this->mFathersfirstname, $this->mFatherslastname, $this->mFathersphone, $this->mFathersofficeaddress, $this->mFathersoccupation, $this->mFathersreligion, $this->mFatherresidentialaddress);

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
            else 
                trigger_error('The userID and userEmail variable are not set in AddFathers init function');
            //Call the business tier class function to save fathers info
            

        }
    }





}
?>