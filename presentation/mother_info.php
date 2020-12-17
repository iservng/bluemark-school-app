<?php 

//Class that handles the saving of mother information 
class MotherInfo
{
    //Public member that are available to smarty
    public $mMothersfirstname;
    public $mMothersfirstnameError = 0;

    public $mMotherslastname;
    public $mMotherslastnameError = 0;

    public $mMothersphone;
    public $mMothersphoneError = 0;

    public $mMothersofficeaddress;
    public $mMothersofficeaddressError = 0;

    public $mMothersoccupation;
    public $mMothersoccupationError = 0;

    public $mMothersreligion;
    public $mMothersreligionError = 0;

    public $mMotherresidentialaddress;
    public $mMotherresidentialaddressError = 0;

    public $mLinkToNurseryForm;
    public $mLinkToPrimaryForm;
    public $mLinkToSecondaryForm;
    public $mLinkToApplicationDone;

    public $mLinkOnTheForm;
    public $mSection4rmurl;


    //Private member 
    private $_mFieldsError;

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


           //Get the the user selected school section loginc going
        if(isset($_GET['SelectedSection']))
            $this->mSection4rmurl = filter_input(INPUT_GET, 'SelectedSection');

        if(isset($_POST['user_mother_info']))
        {
            $validate = new Validate();
            $fields = $validate->getFields();

            //Add all the field values
            $fields->addField('mothersfirstname');
            $fields->addField('motherslastname');
            $fields->addField('mothersphone');
            $fields->addField('mothersofficeaddress');
            $fields->addField('mothersoccupation');
            $fields->addField('mothersreligion');
            $fields->addField('motherresidentialaddress');


            //Start the validation stuff 
            $validate->onyekaname_text('mothersfirstname', filter_input(INPUT_POST, 'mothersfirstname'));
            if(!isset($_POST['mothersfirstname']) || $fields->hasErrors())
            {
                $this->mMothersfirstnameError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mMothersfirstname = ucfirst(filter_input(INPUT_POST, 'mothersfirstname'));


            
            $validate->onyekaname_text('motherslastname', filter_input(INPUT_POST, 'motherslastname'));
            if(!isset($_POST['motherslastname']) || $fields->hasErrors())
            {
                $this->mMotherslastnameError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mMotherslastname = ucfirst(filter_input(INPUT_POST, 'motherslastname'));



            $validate->phone('mothersphone', filter_input(INPUT_POST, 'mothersphone'));
            if(!isset($_POST['mothersphone']) || $fields->hasErrors())
            {
                $this->mMothersphoneError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mMothersphone = filter_input(INPUT_POST, 'mothersphone');



            $validate->onyeka_address('mothersofficeaddress', filter_input(INPUT_POST, 'mothersofficeaddress'));
            if(!isset($_POST['mothersofficeaddress']) || $fields->hasErrors())
            {
                $this->mMothersofficeaddressError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mMothersofficeaddress = filter_input(INPUT_POST, 'mothersofficeaddress');


            
            $validate->onyeka_address('mothersoccupation', filter_input(INPUT_POST, 'mothersoccupation'));
            if(!isset($_POST['mothersoccupation']) || $fields->hasErrors())
            {
                $this->mMothersoccupationError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mMothersoccupation = ucfirst(filter_input(INPUT_POST, 'mothersoccupation'));



            $validate->onyekaname_text('mothersreligion', filter_input(INPUT_POST, 'mothersreligion'));
            if(!isset($_POST['mothersreligion']) || $fields->hasErrors())
            {
                $this->mMothersreligionError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mMothersreligion = ucfirst(filter_input(INPUT_POST, 'mothersreligion'));


            $validate->onyeka_address('motherresidentialaddress', filter_input(INPUT_POST, 'motherresidentialaddress'));
            if(!isset($_POST['motherresidentialaddress']) || $fields->hasErrors())
            {
                $this->mMotherresidentialaddressError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mMotherresidentialaddress = filter_input(INPUT_POST, 'motherresidentialaddress');


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




    public function init()
    {
        if(isset($_POST['user_mother_info']) && $this->_mFieldsError == 0)
        {
            $userId = (int)$_SESSION['cur_user_id'];
            $userEmail = $_SESSION['cur_user_email'];
            if(isset($userEmail) && isset($userId))
            {
                Applicant::AddMotherInfo($userId, $this->mMothersfirstname, $this->mMotherslastname, $this->mMothersphone, $this->mMothersofficeaddress, $this->mMothersoccupation, $this->mMothersreligion, $this->mMotherresidentialaddress);

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
                trigger_error('The user ID and Email is not set in mother information section of the form');
        }
    }





}
?>