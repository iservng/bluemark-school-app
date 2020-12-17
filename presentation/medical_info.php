<?php 

class MedicalInfo
{
    
    public $mBloodgroup;
    public $mBloodgroupError = 0;

    public $mDoctorsreport;
    public $mDoctorsreportError = 0;

    public $mGenotype;
    public $mGenotypeError = 0;

    public $mAllergies;
    public $mAllergiesError = 0;

    public $mDefects;
    public $mDefectsError = 0;

    public $mImmunized;
    public $mImmunizedError = 0;

    public $mDoctorsname;
    public $mDoctorsnameError = 0;

    public $mDoctorsphone;
    public $mDoctorsphoneError = 0;

    public $mDoctorsaddress;
    public $mDoctorsaddressError = 0;

    public $mOthermedicalinfo;
    public $mOthermedicalinfoError = 0;

    public $mDocReportError = 0;
    public $mDocReport;

    public $mDocreportName400;
    public $mDocreportName100; 

    public $mSection4rmurl;
    public $mLinkOnTheForm;

    //Private 
    private $_mFieldsError = 0;

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
            $this->mSection4rmurl = filter_input(INPUT_GET, 'SelectedSection');



        //Start all the validation stuff
         /***************** ****************
        //Start field validation stuff below 
        //Initialize the Validate Class
        **********************************/
        if(isset($_POST['user_medical_info']))
        {
            $validate = new Validate();
            $fields = $validate->getFields();

            //Add the class
            $fields->addField('bloodgroup');
            $fields->addField('genotype');
            $fields->addField('allergies');
            $fields->addField('defects');
            $fields->addField('immunized');
            $fields->addField('doctorsname');
            $fields->addField('doctorsphone');
            $fields->addField('doctorsaddress');
            $fields->addField('othermedicalinfo');

            //Start the validation stuff 
            $validate->bloodgroup('bloodgroup', filter_input(INPUT_POST, 'bloodgroup'));
            if(!isset($_POST['bloodgroup']) || $fields->hasErrors())
            {
                $this->mBloodgroupError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mBloodgroup = ucfirst(filter_input(INPUT_POST, 'bloodgroup'));

            
            $validate->bloodgroup('genotype', filter_input(INPUT_POST, 'genotype'));
            if(!isset($_POST['genotype']) || $fields->hasErrors())
            {
                $this->mGenderError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mGenotype = ucfirst(filter_input(INPUT_POST, 'genotype'));



            $validate->onyeka_address('allergies', filter_input(INPUT_POST, 'allergies'));
            if(!isset($_POST['allergies']) || $fields->hasErrors())
            {
                $this->mAllergiesError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mAllergies = ucfirst(filter_input(INPUT_POST, 'allergies'));


            
            $validate->onyeka_address('defects', filter_input(INPUT_POST, 'defects'));
            if(!isset($_POST['defects']) || $fields->hasErrors())
            {
                $this->mDefectsError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mDefects = ucfirst(filter_input(INPUT_POST, 'defects'));


            $validate->onyeka_address('immunized', filter_input(INPUT_POST, 'immunized'));
            if(!isset($_POST['immunized']) || $fields->hasErrors())
            {
                $this->mImmunizedError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mImmunized = ucfirst(filter_input(INPUT_POST, 'immunized'));


            
            $validate->onyekaname_text('doctorsname', filter_input(INPUT_POST, 'doctorsname'));
            if(!isset($_POST['doctorsname']) || $fields->hasErrors())
            {
                $this->mDoctorsnameError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mDoctorsname = ucfirst(filter_input(INPUT_POST, 'doctorsname'));



            $validate->phone('doctorsphone', filter_input(INPUT_POST, 'doctorsphone'));
            if(!isset($_POST['doctorsphone']) || $fields->hasErrors())
            {
                $this->mDoctorsphoneError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mDoctorsphone = filter_input(INPUT_POST, 'doctorsphone');



            $validate->onyeka_address('doctorsaddress', filter_input(INPUT_POST, 'doctorsaddress'));
            if(!isset($_POST['doctorsaddress']) || $fields->hasErrors())
            {
                $this->mDoctorsaddressError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mDoctorsaddress = filter_input(INPUT_POST, 'doctorsaddress');


            $validate->onyeka_address('othermedicalinfo', filter_input(INPUT_POST, 'othermedicalinfo'));
            if(!isset($_POST['othermedicalinfo']) || $fields->hasErrors())
            {
                $this->mOthermedicalinfoError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mOthermedicalinfo = ucfirst(filter_input(INPUT_POST, 'othermedicalinfo'));


            if(isset($_FILES['doctorsreport']))
            {
                if($_FILES['doctorsreport']['type'] == 'image/jpeg')
                {
                    $this->mDocReport = $_FILES['doctorsreport'];
                }
                elseif($_FILES['doctorsreport']['type'] == 'image/jpg')
                {
                    $this->mDocReport = $_FILES['doctorsreport'];
                }
                elseif($_FILES['doctorsreport']['type'] == 'image/png')
                {
                    $this->mDocReport = $_FILES['doctorsreport'];

                }
                else 
                {
                    
                    $this->mDocReportError = 1;
                    $this->_mFieldsError++;
                }
            }
            else 
            {
                $this->mDocReportError = 1;
                $this->_mFieldsError++;
            }



            
        }

        $this->mLinkToPrimaryForm = Link::ToPrimaryForm();
        $this->mLinkToSecondaryForm = Link::ToSecondaryForm();
        $this->mLinkToNurseryForm = Link::ToNurseryForm();

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
        if(isset($_POST['user_medical_info']) && $this->_mFieldsError == 0)
        {
            //Call the business function that addes the informatio to the database 
            //this is got to be an update sql stuff
            //Take the pic ture to it's folder just as passport 
            //if the local class varible has been load wih data 
            if(isset($this->mDocReport['tmp_name']))
            {
                //Access the current user ID informattions
                $userId = (int)$_SESSION['cur_user_id'];
                $userEmail = $_SESSION['cur_user_email'];

                if(isset($userId) && isset($userEmail))
                {
                    //Create the folder name string
                $pos = strpos($userEmail, '@');
                $userfolder = substr($userEmail, 0, $pos) . '_folder';
                //We will start processing the upload to its permanent position
                move_uploaded_file($this->mDocReport['tmp_name'], SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$userfolder.DIRECTORY_SEPARATOR.$this->mDocReport['name']);

                //Make the 400 and 100 copy
                ImageUtil::process_image(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$userfolder, $this->mDocReport['name']);

                //Deconstruct and extracts part in the file name strring 
                $i = strrpos($this->mDocReport['name'], '.');
                $image_name = substr($this->mDocReport['name'], 0, $i);
                $ext = substr($this->mDocReport['name'], $i);

                //Rename the filename embedding 100 or 400 the string
                $this->mDocreportName400 = $image_name . '_400' . $ext;
                $this->mDocreportName100 = $image_name . '_100' . $ext;

                //Unlink the orinal uploaded image 
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$userfolder.DIRECTORY_SEPARATOR.$this->mDocReport['name']);



                 // The save (sql update) the current user's medical information 
                Applicant::AddUserMedicalInfo($userId, $this->mDocreportName400, $this->mBloodgroup, $this->mGenotype, $this->mAllergies, $this->mDefects, $this->mImmunized, $this->mDoctorsname, $this->mDoctorsphone, $this->mDoctorsaddress, $this->mOthermedicalinfo);

                //Put the current for part in Session
                $_SESSION['form_part'] = filter_input(INPUT_POST, 'formPart');
                
                switch (filter_input(INPUT_GET, 'SelectedSection')) {
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
                {
                    trigger_error('The ID not set or Email not set for MEDICAL INFORMATION STORAGE');
                }
            }
        }
    }

    




}
?>