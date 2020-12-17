<?php

//This class validate applicants user personal information
class PersonalInfo
{
    //Public variables available to smarty
    public $mSectionSelected;
    public $mShowPrimaryCert = true;

    //form fields 
    public $mFirstname;
    public $mFirstnameError = 0;

    public $mSurname;
    public $mSurnameError = 0;

    public $mOthername;
    public $mOthernameError = 0;

    public $mPassword;
    public $mPasswordError = 0;
    public $mConfirmPasswordErrorMessage;

    public $mConfirmPassword;
    public $mConfirmPasswordError = 0;

    public $mPrimarycertificate;
    public $mPrimarycertificateError = 0;
    

    public $mEmail;
    public $mEmailError = 0;
    public $mEmailMessage = '';

    public $mPassport;
    public $mPassportError = 0;

    public $mBirthcertificate;
    public $mBirthcertificateError = 0;

    public $mGender;
    public $mGenderError = 0;

    public $mStateoforigin;
    public $mStateoforiginError = 0;

    public $mDateofbirth;
    public $mDateofbirthError = 0;

    public $mSection;
    public $nursery_application_submitBtn;

    public $mPassportName100;
    public $mPassportName400;

    public $mBirthcertName400;
    public $mBirthcertName100;

    public $mPrimarycertName400;
    public $mPrimarycertName100;

    public $mLinkToPrimaryForm;
    public $mLinkToSecondaryForm;
    public $mLinkToNurseryForm;

    public $mSection4rmurl;
    public $mLinkOnTheForm;
    public $mDuplicateError = '';
    public $mDuplicateErrorMsg = false;

    //Private variables
    private $_mFieldsError = 0;


    //Class construct
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

        if($_GET['SelectedSection'] == 'Nursery' || $_GET['SelectedSection'] == 'Primary')
            $this->mShowPrimaryCert = false;

        //Start all the validation stuff
         /***************** ****************
        //Start field validation stuff below 
        //Initialize the Validate Class
        **********************************/
        if(isset($_POST['user_personal_info']))
        {
            $validate = new Validate();
            $fields = $validate->getFields();

            //Add the field names 
            //field names to be added
            $fields->addField('firstname');
            // $fields->addField('passport');
            $fields->addField('email');
            $fields->addField('surname');
            $fields->addField('othername');
            $fields->addField('password');
            $fields->addField('confirmPassword');
            $fields->addField('dateofbirth');
            $fields->addField('gender');
            $fields->addField('stateoforigin');
            // $fields->addField('birthcertificate');

            
                 /***************** ****************
            //The actuall validation logic 
            **********************************/
            $validate->onyekaname_text('firstname', $_POST['firstname']);
            if ($fields->hasErrors()) 
            {
                $this->mFirstnameError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mFirstname = ucfirst(filter_input(INPUT_POST, 'firstname'));


            
            $validate->onyekaname_text('surname', filter_input(INPUT_POST, 'surname'));
            if(!isset($_POST['surname']) || $fields->hasErrors())
            {
                $this->mSurnameError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mSurname = ucfirst(filter_input(INPUT_POST, 'surname'));


            if(isset($_POST['othername']))
            {
                $validate->onyekaname_text('othername', filter_input(INPUT_POST, 'othername'));
                if($fields->hasErrors())
                {
                    $this->mOthernameError = 1;
                    $this->_mFieldsError++;
                }
                else 
                    $this->mOthername = ucfirst(filter_input(INPUT_POST, 'othername'));
            }
            else 
            {
                $this->mOthername = 'None';
            }



            $validate->password('password', filter_input(INPUT_POST, 'password'));
            if(!isset($_POST['password']) || $fields->hasErrors())
            {
                $this->mPasswordError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mPassword = filter_input(INPUT_POST, 'password'); 



                   
            $validate->password('confirmPassword', filter_input(INPUT_POST, 'confirmPassword'));
            if(!isset($_POST['confirmPassword']) || $fields->hasErrors())
            {
                $this->mConfirmPasswordError = 1;
                $this->_mFieldsError++;
                $this->mConfirmPasswordErrorMessage = 'Please re-enter your password';
            }
            else 
            {
                $validate->verify('confirmPassword', $this->mPassword, filter_input(INPUT_POST, 'confirmPassword'));
                if($fields->hasErrors())
                {
                    $this->mConfirmPasswordError = 1;
                    $this->_mFieldsError++;
                    $this->mConfirmPasswordErrorMessage = 'Password do not match';
                }
                else 
                    $this->mConfirmPassword = filter_input(INPUT_POST, 'confirmPassword');
            }



            
            $validate->email('email', filter_input(INPUT_POST, 'email'));
            if(!isset($_POST['email']) || $fields->hasErrors())
            {
                $this->mEmailError = 1;
                $this->_mFieldsError++;
                $this->mEmailMessage = $_POST['email'] . ' is invalid';
            }
            else 
            {
                //Check if we have any applicant with submitted email
                $applicant_read = Applicant::GetLoginInfor($_POST['email']);
                if($applicant_read)
                {
                    //Place a $emailMessage = 'email is already in use in our system';
                    $this->mEmailError = 1;
                    $this->_mFieldsError++;
                    $this->mEmailMessage = $_POST['email'] . ' is already in use in our system';
                }
                else 
                    $this->mEmail = filter_input(INPUT_POST, 'email');
            }



            $validate->onyekaname_text('gender', filter_input(INPUT_POST, 'gender'));
            if(!isset($_POST['gender']) || $fields->hasErrors())
            {
                $this->mGenderError = 1;
                $this->_mFieldsError++;
            }
            else 
            {
                if(strtolower($_POST['gender']) == 'male')
                    $this->mGender = 1;
                elseif(strtolower($_POST['gender']) == 'female')
                    $this->mGender = 2;
                else
                {
                    $this->mGenderError = 1;
                    $this->_mFieldsError++;
                }
                    
            }



            $validate->state('stateoforigin', ucfirst(filter_input(INPUT_POST, 'stateoforigin')));
            if(!isset($_POST['stateoforigin']) || $fields->hasErrors())
            {
                $this->mStateoforiginError = 1;
                $this->_mFieldsError++;
            }
            else 
                $this->mStateoforigin = ucfirst(filter_input(INPUT_POST, 'stateoforigin'));


            // $validate->onyeka_date('dateofbirth', filter_input(INPUT_POST, 'dateofbirth'));
            if(!isset($_POST['dateofbirth']))
            {
                $this->mDateofbirthError = 1;
                $this->_mFieldsError++;
            }
            else
            {
                $thisye = new DateTime();
                $disye = (int)$thisye->format('Y');
                if((int)substr($_POST['dateofbirth'], 0, 4) === $disye)
                {
                    $this->mDateofbirthError = 1;
                    $this->_mFieldsError++;
                }
                else
                    $this->mDateofbirth = filter_input(INPUT_POST, 'dateofbirth');
            } 

            // unlink( )

            /***********
             * start processing passport file 
             * ***********/
            

            if(!isset($_FILES['passport']) || ($_FILES['passport']['name'] == ''))
            {
                $this->mPassportError = 1;
                $this->_mFieldsError++;
            }
            else 
            {
                if($_FILES['passport']['type'] == 'image/jpeg')
                {
                    $this->mPassport = $_FILES['passport'];
                }
                elseif($_FILES['passport']['type'] == 'image/jpg')
                {
                    $this->mPassport = $_FILES['passport'];
                }
                elseif($_FILES['passport']['type'] == 'image/png')
                {
                    $this->mPassport = $_FILES['passport'];
                }
                else
                {
                    $this->mPassportError = 1;
                    $this->_mFieldsError++;
                }
            }

            /***********
             * start processing birth certificate file 
             * ***********/
            if(!isset($_FILES['birthcertificate']) || ($_FILES['birthcertificate']['name'] == ''))
            {
                $this->mBirthcertificateError = 1;
                $this->_mFieldsError++;
            }
            else
            {
                if($_FILES['birthcertificate']['type'] == 'image/jpeg')
                {
                    $this->mBirthcertificate = $_FILES['birthcertificate'];
                }
                elseif($_FILES['birthcertificate']['type'] == 'image/jpg')
                {
                    $this->mBirthcertificate = $_FILES['birthcertificate'];
                }
                elseif($_FILES['birthcertificate']['type'] == 'image/png')
                {
                    $this->mBirthcertificate = $_FILES['birthcertificate'];
                }
                else
                {
                    $this->mBirthcertificateError = 1;
                    $this->_mFieldsError++;
                }
            }

            /***********
             * start processing primary certificate file 
             * if the user is applying to secondary
             * ***********/
             if(isset($_FILES['primarycertificate']) && ($_FILES['primarycertificate']['name'] != ''))
            {
                if($_FILES['primarycertificate']['type'] == 'image/jpeg')
                {
                    $this->mPrimarycertificate = $_FILES['primarycertificate'];
                }
                elseif($_FILES['primarycertificate']['type'] == 'image/jpg')
                {
                    $this->mPrimarycertificate = $_FILES['primarycertificate'];
                }
                elseif($_FILES['primarycertificate']['type'] == 'image/png')
                {
                    $this->mPrimarycertificate = $_FILES['primarycertificate'];
                }
                else 
                {
                    $this->mPrimarycertificateError = 1;
                    $this->_mFieldsError++;
                }
            }
            

        }

        //Linkt 
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
        if(isset($_POST['user_personal_info']) && $this->_mFieldsError == 0)
        {
            //Saving the passport of  the student ff
            //step 1. check if there is a directory with thee users-name
            $pos = strpos($this->mEmail, '@');
            $userfolder = substr($this->mEmail, 0, $pos) . '_folder';

            if(!is_dir(SITE_ROOT . '/user/' . $userfolder))
            {
                mkdir(SITE_ROOT . '/user/' . $userfolder, 0777);
                //move the passport to the newly created user's directory
                

                $success = move_uploaded_file($this->mPassport['tmp_name'], SITE_ROOT.'/user/'.$userfolder.'/'.$this->mPassport['name']);


                //Just before move file to permanent folder, check if there is a duplicate file then issues warning 
                $this->mFilesPresent = Customer::GetFileList(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$userfolder);
                //move the birth certificate to the same folder 
                if(($success) && (Customer::IsDuplicate($this->mBirthcertificate['name'], $this->mFilesPresent) == false))
                    move_uploaded_file($this->mBirthcertificate['tmp_name'], SITE_ROOT.'/user/'.$userfolder.'/'.$this->mBirthcertificate['name']);
                else    
                    $this->mDuplicateError = "The file " . $this->mBirthcertificate['name'] . " already exist, please change and try again";




                //optional file 
                if(isset($_FILES['primarycertificate']) && ($_FILES['primarycertificate']['error'] == 0))
                {
                    $this->mFilesPresent = Customer::GetFileList(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$userfolder);

                    if(Customer::IsDuplicate($this->mPrimarycertificate['name'], $this->mFilesPresent) == false)
                        move_uploaded_file($this->mPrimarycertificate['tmp_name'], SITE_ROOT.'/user/'.$userfolder.'/'.$this->mPrimarycertificate['name']);
                    else 
                        $this->mDuplicateError = "The file " . $this->mPrimarycertificate['name'] . " already exist, please change and try again";
                }
                    

                if(isset($_FILES['doctorsreport']) && ($_FILES['doctorsreport']['error'] == 0))
                {
                    $this->mFilesPresent = Customer::GetFileList(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$userfolder);

                    if(Customer::IsDuplicate($this->mDoctorsreport['name'], $this->mFilesPresent) == false)
                        move_uploaded_file($this->mDoctorsreport['tmp_name'], SITE_ROOT.'/user/'.$userfolder.'/'.$this->mDoctorsreport['name']);
                    else
                        $this->mDuplicateError = "The file " . $this->mDoctorsreport['name'] . " already exists, please change and try again"; 

                }
                
                /*****************
                 * Create the 100px and 400px of passport
                 * Then using the if condition we can eliminate a situatioan where a file that does not exist id given to "ImageUtil::process_image" method for processing
                 * ***************/

                if(is_file(SITE_ROOT.'/user/'.$userfolder.DIRECTORY_SEPARATOR.$this->mPassport['name']))
                {
                    ImageUtil::process_image(SITE_ROOT.'/user/'.$userfolder, $this->mPassport['name']);

                    $i = strrpos($this->mPassport['name'], '.');
                    $image_name = substr($this->mPassport['name'], 0, $i);
                    $ext = substr($this->mPassport['name'], $i);

                    // Set up the write paths
                    $this->mPassportName100 = $image_name . '_400' . $ext;
                    $this->mPassportName400 = $image_name . '_100' . $ext;

                }
                else {
                    $this->mDuplicateError = "Select and upload unique files only for Passport field";
                }
                //Delete the original uploaded passport
                unlink(SITE_ROOT.'/user/'.$userfolder.DIRECTORY_SEPARATOR.$this->mPassport['name']);

                /*****************
                 * Create the 100px and 400px of Birth certificate
                 * ***************/
                if(is_file(SITE_ROOT.'/user/'.$userfolder. DIRECTORY_SEPARATOR.$this->mBirthcertificate['name']))
                {
                    ImageUtil::process_image(SITE_ROOT.'/user/'.$userfolder, $this->mBirthcertificate['name']);

                    $i = strrpos($this->mBirthcertificate['name'], '.');
                    $image_name = substr($this->mBirthcertificate['name'], 0, $i);
                    $ext = substr($this->mBirthcertificate['name'], $i);

                    // Set up the write paths
                    $this->mBirthcertName400 = $image_name . '_400' . $ext;
                    $this->mBirthcertName100 = $image_name . '_100' . $ext;

                }
                else 
                    $this->mDuplicateError = "Use a unique file for Birth Certificate";
                

                //Delete the original uploaded passport
                if(is_file(SITE_ROOT.'/user/'.$userfolder.DIRECTORY_SEPARATOR.$this->mBirthcertificate['name']))
                    unlink(SITE_ROOT.'/user/'.$userfolder.DIRECTORY_SEPARATOR.$this->mBirthcertificate['name']);

                /*****************
                 * Create the 100px and 400px of Primary certificate
                 * only if its set/user is applying to secondary
                 * ***************/

                if((isset($_FILES['primarycertificate'])) && (!empty($_FILES['primarycertificate']['name'])))
                {
                    if(is_file(SITE_ROOT.'/user/'.$userfolder.DIRECTORY_SEPARATOR.$this->mPrimarycertificate['name']))
                    {
                        ImageUtil::process_image(SITE_ROOT.'/user/'.$userfolder, $this->mPrimarycertificate['name']);

                        $i = strrpos($this->mPrimarycertificate['name'], '.');
                        $image_name = substr($this->mPrimarycertificate['name'], 0, $i);
                        $ext = substr($this->mPrimarycertificate['name'], $i);

                        // Set up the write paths
                        $this->mPrimarycertName400 = $image_name . '_400' . $ext;
                        $this->mPrimarycertName100 = $image_name . '_100' . $ext;

                    }
                    else 
                        $this->mDuplicateError = "Use unique file in each file for your primary certificate";
                    
                    //Delete the original uploaded passport
                    if(is_file(SITE_ROOT.'/user/'.$userfolder.DIRECTORY_SEPARATOR.$this->mPrimarycertificate['name']))
                        unlink(SITE_ROOT.'/user/'.$userfolder.DIRECTORY_SEPARATOR.$this->mPrimarycertificate['name']);

                }
                else 
                    $this->mPrimarycertificate = 'None';
                
            }

            /***************
             * Call the function to add personal info to the database
             * ***************/ 
            //Reconstruct the password
            $to_reconstruct = $this->mPassword.$this->mEmail.$this->mConfirmPassword;
            $password = password_hash($to_reconstruct, PASSWORD_BCRYPT);

            if(
            ($this->mDuplicateError == '') && 
            (!empty($this->mPassportName100)) && 
            (!empty($this->mPassportName400)) && 
            (!empty($this->mBirthcertName400)) &&  
            (!empty($this->mFirstname)) && 
            (!empty($this->mEmail)) && 
            (!empty($this->mSurname)) &&  
            (!empty($password)) && 
            (!empty($this->mDateofbirth)) && 
            (!empty($this->mGender)) && 
            (!empty($this->mStateoforigin))
            )
            {
                

                $_SESSION['cur_user_id'] = (int)Applicant::AddPersonalInfo($this->mPassportName100, $this->mPassportName400, $this->mBirthcertName400, $this->mPrimarycertName400, $this->mFirstname, $this->mEmail, $this->mSurname, $this->mOthername, $password, $this->mDateofbirth, $this->mGender, $this->mStateoforigin);

                //After adding a student to the applicants database table the same should be added to the customers table 
                
                $this->mOthername = ($this->mOthername) ? $this->mOthername : "";
                $this->mStudentfullname = $this->mFirstname . " " . $this->mOthername . " " . $this->mSurname;
                Customer::Add($this->mStudentfullname, $this->mEmail, $password, false);

                 //Make a little swirch statement to decide which face of the form should be redirected to or shown to the user
                //ie whether to nursery, primary or secondary 
                $_SESSION['form_part'] = filter_input(INPUT_POST, 'formPart');
                $_SESSION['cur_user_email'] = $this->mEmail;
                $_SESSION['user_fname'] = $this->mFirstname;
                $_SESSION['user_lname'] = $this->mSurname;


                
                switch (filter_input(INPUT_GET, 'SelectedSection')) {
                    case 'Nursery':
                        
                        $redirect_to = Link::ToNurseryForm();
                        header('Location: ' . $redirect_to);
                        break;
                    case 'Primary':
                        
                        $redirect_to = Link::ToPrimaryForm();
                        header('Location: ' . $redirect_to);
                        break;
                    case 'Secondary':
                        
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
                
                //Remove the created student folder rr
                Teachers::RemoveAFolder(SITE_ROOT.'/user/'.$userfolder);
                //Set error message
                $this->mDuplicateErrorMsg = ($this->mDuplicateError) ? $this->mDuplicateError : "ERROR: All fields are required, please fill and try again";

            } 
                

    

        }

        


    }

}
?>