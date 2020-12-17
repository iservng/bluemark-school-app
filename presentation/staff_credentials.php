<?php 
class StaffCredentials 
{
    //Public member available to smarty
    public $mSiteUrl;
    // public $mLinkToAdmin;
    // public $mLoginMessage;
    
    public $mLinkToIndex;

    //LINKS 
    public $mLinkToCheckEmploymentStatus;
    public $mLinkToLoginLink;
    public $mLinkToUploadCredentials;

    //The fields
    public $mUsername;
    public $mUsernameError = 0;
    
    public $mGender;
    public $mGenderError = 0;

    public $mStaffPasport;
    public $mStaffPasportError = 0;

    public $mPassword;
    public $mPasswordError = 0;

    public $mComfirmPassword;
    public $mComfirmPasswordError = 0;
    public $mSecondPasswordMsg = '';

    public $mStaffAddress;
    public $mStaffAddressError = 0;

    public $mBirthCert;
    public $mBirthCertError = 0;

    public $mPrimaryCert;
    public $mPrimaryCertError = 0;

    public $mStaffState;
    public $mStaffStateError = 0;

    public $mOlevelCert1;
    public $mOlevelCert1Error = 0;

    public $mOlevelCert2;
    public $mOlevelCert2Error = 0;

    public $mAlevelCert;
    public $mAlevelCertError = 0;

    public $mProCert;
    public $mProCertError = 0;


    // public $mUploadFormPartToShow = 1;
    public $mLoginMsg = false;
    public $mUploadErrMsge = "";
    public $mCheckErrMsg = "";

    public $mStaffPasportName;
    public $mBirthCertName;
    public $mPrimaryCertName;
    public $mOlevelCert1Name;
    public $mOlevelCert2Name;
    public $mAlevelCertName;
    public $mProCertName;
    public $mStatus;


    public $mFilesPresent;

    public $mFinalpassword;
    public $mUploadEmailErrMsg;
    //This determines which part of fom to be shown. the variable below shows the first part and when upload is complete it set this same variable to true so that the second part of the form which is success part will show.
    public $mUploadComplete = false;
    public $IsFilesSame;

    public $mFirstTitle;
    public $mFirstBody;
    public $mSecondTitle;
    public $mSecondBody;
    public $filedValuesOfFiles = array();
    public $mIsTwo_OlevelPresent = false;
    public $mProfCert_Present = false;

    private $_mErrors = 0;
    private $_mTeacherInfo;
 
    


    public function __construct()
    {
        $this->mSiteUrl = Link::Build('', 'https');
        //Enforce page to be accesse through HTTPS if USE_SSL is on
        if(USE_SSL == 'yes' && getenv('HTTPS') != 'on')
        {
            header('Location: https://' . getenv('SERVER_NAME') . getenv('REQUEST_URI'));
            exit();
        }
        //I never do any thing here 
        if(isset($_SESSION['uploaded']))
            $this->mUploadFormPartToShow = 2;


        /*
        Call the function to retrieve the list of states from the database 

        ************************************/
        $this->mListOfStates = Customer::GetListOfStates();





        /*
        Start the validation things
        ************************************/


        if(isset($_POST['StaffUploadBtn']))
        {
            // filedValuesOfFiles
            
            $this->IsFilesSame = false;

            //The user email 
            $staffEmail = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
            $pattern = '/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,5})(\.[a-z]{2,5})?$/';
            $mUsernameResult = preg_match($pattern, $staffEmail);
            if(!isset($_POST['username']) || !($mUsernameResult === 1))
            {
                $this->mUsernameError = 1;
                $this->_mErrors++;
                $this->mUploadEmailErrMsg = 'Use a valid email';
            }
            else 
            {
                $applicant_read = Applicant::GetTeacherEmailInfor(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL));
                if(empty($applicant_read['teachers_id']))
                {
                    $this->mUsernameError = 1;
                    $this->_mErrors++;
                    $this->mUploadEmailErrMsg = 'This email is unknown to our system';
                }
                else
                {
                    $this->mUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
                    // $this->filedValuesOfFiles[] = $this->mUsername; mmmm
                    
                } 
                    
            }
                
            //user gender
            $gparttern = '/^[a-zA-Z]{4,6}$/';
            $staffGender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
            $genderResult = preg_match($gparttern, $staffGender);
            if(!isset($_POST['gender']))
            {
                $this->mGenderError = 1;
                $this->_mErrors++;
            }
            else
            {
                if(($staffGender === 'Female') || ($staffGender === 'female'))
                    $this->mGender = 2;
                elseif(($staffGender === 'Male') || ($staffGender === 'male'))
                    $this->mGender = 1;
                else 
                {
                    $this->mGenderError = 1;
                    $this->_mErrors++;
                }
            } 
                
            //User passport
            if($_FILES['staffPassport']['error'] == 0)
            {
                $this->mStaffPasport = $_FILES['staffPassport'];
                $this->filedValuesOfFiles[] = $this->mStaffPasport;
            }
            else 
            {
                $this->mStaffPasportError = 1;
                $this->_mErrors++;
            }
                
            $staffPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $pasPattern = '/^[a-zA-Z0-9]{8,35}$/';
            $passResult = preg_match($pasPattern, $staffPassword);
            if(!isset($_POST['password']) || !($passResult === 1))
            {
                $this->mPasswordError = 1;
                $this->_mErrors++;
            }
            else 
                $this->mPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

            //Comfirm password
            $comfirmPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $pasPattern = '/^[a-zA-Z0-9]{8,35}$/';
            $pas2Result = preg_match($pasPattern, $comfirmPassword);
            if(!isset($_POST['comfirmPassword']) || !($pas2Result === 1))
            {
                $this->mComfirmPasswordError = 1;
                $this->_mErrors++;
                $this->mSecondPasswordMsg = 'Enter alphanumericals, 8 characters minimum, at least one must be Capital Letter';
            }
            else 
            {
                $mComfirmPassword = filter_input(INPUT_POST, 'comfirmPassword', FILTER_SANITIZE_STRING);
                $result = strcmp($this->mPassword, $mComfirmPassword);
                if(!($result === 0))
                {
                    $this->mComfirmPasswordError = 1;
                    $this->_mErrors++;
                    $this->mSecondPasswordMsg = 'Two passwords do not match';
                }
                else 
                    $this->mComfirmPassword = filter_input(INPUT_POST, 'comfirmPassword', FILTER_SANITIZE_STRING);
            }
                
            //Staff address mStaffAddressError
            $staffAddress = filter_input(INPUT_POST, 'staffAddress');
            $addressPattern = '/^[a-zA-Z0-9\.\s\t,]{1,200}$/';
            $addressResult = preg_match($addressPattern, $staffAddress);

            if(!(isset($_POST['staffAddress'])) || !($addressResult === 1))
            {
                $this->mStaffAddressError = 1;
                $this->_mErrors++;
            }
            else 
                $this->mStaffAddress = filter_input(INPUT_POST, 'staffAddress');

            //Staff state of residence 
            $staffState = filter_input(INPUT_POST, 'staffState');
            if(!isset($_POST['staffState']) || !is_numeric($staffState))
            {
                $this->mStaffStateError = 1;
                $this->_mErrors++;
            }
            else 
                $this->mStaffState = (int)filter_input(INPUT_POST, 'staffState', FILTER_VALIDATE_INT);




            //Birth Certificate
            if($_FILES['birthCert']['error'] == 0)
            {
                $this->mBirthCert = $_FILES['birthCert'];
                $this->filedValuesOfFiles[] = $this->mBirthCert;
            }
            else 
            {
                $this->mBirthCertError = 1;
                $this->_mErrors++;
            }

                
            if($_FILES['primaryCert']['error'] == 0)
            {
                $this->mPrimaryCert = $_FILES['primaryCert'];
                $this->filedValuesOfFiles[] = $this->mPrimaryCert;
            }
            else 
            {
                $this->mPrimaryCertError = 1;
                $this->_mErrors++;
            }
                
            if($_FILES['olevelCert1']['error'] == 0)
            {
                $this->mOlevelCert1 = $_FILES['olevelCert1'];
                $this->filedValuesOfFiles[] = $this->mOlevelCert1;
            }
            else 
            {
                $this->mOlevelCert1Error = 1;
                $this->_mErrors++;
            }
                
            if($_FILES['olevelCert2']['error'] == 0)
            {
                $this->mOlevelCert2 = $_FILES['olevelCert2'];
                $this->filedValuesOfFiles[] = $this->mOlevelCert2;

            }
                

            
            if($_FILES['alevelCert']['error'] == 0)
            {
                $this->mAlevelCert = $_FILES['alevelCert'];
                $this->filedValuesOfFiles[] = $this->mAlevelCert;
            }
            else 
            {
                $this->mAlevelCertError = 1;
                $this->_mErrors++;
            }
                

            if($_FILES['proCert']['error'] == 0)
            {
                $this->mProCert = $_FILES['proCert'];
                $this->filedValuesOfFiles[] = $this->mProCert;

            }
                

        }//End of submit button

        $this->mLinkToCheckEmploymentStatus = Link::ToCheckEmploymentStatus();
        $this->mLinkToLoginLink = Link::ToStaffLoginPage();
        $this->mLinkToUploadCredentials = Link::ToUploadCredentials();

    }



    public function init()
    {
        if(isset($_POST['StaffUploadBtn']) && $this->_mErrors == 0)
        {
            $toHashPassword = HASH_PREFIX.$this->mPassword.$this->mUsername.$this->mComfirmPassword;
            
            $this->mFinalpassword = PasswordHasher::HashB($toHashPassword);
            //Rebuild the location to store files ff
            $applicant_read = Applicant::GetTeacherEmailInfor(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL));
            $this->_mTeacherInfo = Customer::GetTeacherUserInfo($applicant_read['teachers_id']);

            $t_fullname = strtolower($this->_mTeacherInfo['name']);
            $t_fullname = ucwords($t_fullname);
            $t_fullname = str_replace(' ', '', $t_fullname);
            
            //Concatenate the number to the fulname 
            $t_fulname = $t_fullname . $this->_mTeacherInfo['phone'];
            $t_foldername = $t_fulname.'_folder';

            #Ensure that this teacher has a folder in the "user" folder
            if(!is_dir(SITE_ROOT . '/user/' . $t_foldername))
                    mkdir(SITE_ROOT . '/user/' . $t_foldername, 0777);

                    /* NOT DOEN
                    Just here below i need to take care of the fact that  user can upload file with the same name in which case the move_upload_file function does not work as expected.
                    */

            //Check if any of the files has same name 
            //Retrive the file that are in the destination folder
            
                
            $this->mFilesPresent = Customer::GetFileList(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername);


            if(Customer::IsDuplicate($this->mStaffPasport['name'], $this->mFilesPresent) == false)
            {
                if(!move_uploaded_file($this->mStaffPasport['tmp_name'], SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mStaffPasport['name']))
                {
                    $this->_mErrors++;
                    $this->mUploadErrMsge = 'Your passport upload Failed, please try again!';
                }
                    
            }
            else
                $this->mCheckErrMsg = 'The file '.$this->mStaffPasport['name'] . ' already exists in our, please change and try again';
            
            

            //File checking for Birth certificate 
            $this->mFilesPresent = Customer::GetFileList(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername);

            if((Customer::IsDuplicate($this->mBirthCert['name'], $this->mFilesPresent) == false) && ($this->_mErrors == 0))
            {
                if(!move_uploaded_file($this->mBirthCert['tmp_name'], SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mBirthCert['name']))
                {
                    $this->_mErrors++;
                    $this->mUploadErrMsge = 'Your birth certificate upload Failed, please try again!';
                }
                    
            }
            else
                $this->mCheckErrMsg = 'The file '.$this->mBirthCert['name'] . ' already exists in our, please change and try again';
            
            


            //File checking for primary certificate 
            $this->mFilesPresent = Customer::GetFileList(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername);

            if((Customer::IsDuplicate($this->mPrimaryCert['name'], $this->mFilesPresent) == false) && ($this->_mErrors == 0))
            {
                if(!move_uploaded_file($this->mPrimaryCert['tmp_name'], SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mPrimaryCert['name']))
                {
                    $this->_mErrors++;
                    $this->mUploadErrMsge = 'Your primary certificate upload Failed, please try again!';
                }
                
            }
            else
                $this->mCheckErrMsg = 'The file '.$this->mPrimaryCert['name'] . ' already exists in our, please change and try again';
            

            //File checking for O-level certificate 
            $this->mFilesPresent = Customer::GetFileList(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername);

            if((Customer::IsDuplicate($this->mOlevelCert1['name'], $this->mFilesPresent) == false) && ($this->_mErrors == 0))
            {
                if(!move_uploaded_file($this->mOlevelCert1['tmp_name'], SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mOlevelCert1['name']))
                {
                    $this->_mErrors++;
                    $this->mUploadErrMsge = 'Your O-level certificate upload Failed, please try again!';
                }
                    
            }
            else
                $this->mCheckErrMsg = 'The file '.$this->mOlevelCert1['name'] . ' already exists in our, please change and try again';
            



            $this->mFilesPresent = Customer::GetFileList(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername);

            if((Customer::IsDuplicate($this->mAlevelCert['name'], $this->mFilesPresent) == false) && ($this->_mErrors == 0))
            {
                if(!move_uploaded_file($this->mAlevelCert['tmp_name'], SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mAlevelCert['name']))
                {
                    $this->_mErrors++;
                    $this->mUploadErrMsge = 'Your A-level certificate upload Failed, please try again!';
                }
                    
            }
            else
                $this->mCheckErrMsg = 'The file '.$this->mAlevelCert['name'] . ' already exists in our, please change and try again';
            
            


            if(isset($_FILES['olevelCert2']) && !(empty($_FILES['olevelCert2']['name'])) && !($_FILES['olevelCert2']['name'] == ""))
            {

                $this->mFilesPresent = Customer::GetFileList(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername);

                if((Customer::IsDuplicate($this->mOlevelCert2['name'], $this->mFilesPresent) == false) && ($this->_mErrors == 0))
                {
                    if(!move_uploaded_file($this->mOlevelCert2['tmp_name'], SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mOlevelCert2['name']))
                    {
                        $this->_mErrors++;
                        $this->mUploadErrMsge = 'The second O level certificate upload Failed, please try again!';

                    }
                        
                }
                else
                    $this->mCheckErrMsg = 'The file '.$this->mOlevelCert2['name'] . ' already exists in our, please change and try again';
                
                $this->mIsTwo_OlevelPresent = true;

            }
                

            if(isset($_FILES['proCert']) && !(empty($_FILES['proCert']['name'])) && !($_FILES['proCert']['name'] == ""))
            {
                $this->mFilesPresent = Customer::GetFileList(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername);

                if((Customer::IsDuplicate($this->mProCert['name'], $this->mFilesPresent) == false) && ($this->_mErrors == 0))
                {
                    if(!move_uploaded_file($this->mProCert['tmp_name'], SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mProCert['name']))
                    {
                        $this->_mErrors++;
                        $this->mUploadErrMsge = 'The professional certificate upload Failed, please try again!';
                    }
                        
                }
                else
                    $this->mCheckErrMsg = 'The file '.$this->mProCert['name'] . ' already exists in our, please change and try again';
                
                $this->mProfCert_Present = true;
            }
                

            

            //Use if to make sure all files are successfully store in parmernent location
            if(($this->mUploadErrMsge == "") && ($this->mCheckErrMsg == "") && ($this->_mErrors == 0)) 
            {
                //Start making the required sizes
                ImageUtil::process_image_anysize(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR . $t_foldername, $this->mStaffPasport['name'], 126, 126);
                $i = strrpos($this->mStaffPasport['name'], '.');
                $image_name = substr($this->mStaffPasport['name'], 0, $i);
                $ext = substr($this->mStaffPasport['name'], $i);
                // Set up the write paths
                $this->mStaffPasportName = $image_name . '_126' . $ext;
                //Delete the original uploaded passport
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mStaffPasport['name']);

                /*
                mBirthCert
                ****************************************/

                ImageUtil::process_image_anysize(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR . $t_foldername, $this->mBirthCert['name'], 600, 800);
                $i = strrpos($this->mBirthCert['name'], '.');
                $image_name = substr($this->mBirthCert['name'], 0, $i);
                $ext = substr($this->mBirthCert['name'], $i);
                // Set up the write paths
                $this->mBirthCertName = $image_name . '_600' . $ext;
                //Delete the original uploaded passport
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mBirthCert['name']);

                /*
                mPrimaryCert
                ****************************************/
                ImageUtil::process_image_anysize(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR . $t_foldername, $this->mPrimaryCert['name'], 600, 800);
                $i = strrpos($this->mPrimaryCert['name'], '.');
                $image_name = substr($this->mPrimaryCert['name'], 0, $i);
                $ext = substr($this->mPrimaryCert['name'], $i);
                // Set up the write paths
                $this->mPrimaryCertName = $image_name . '_600' . $ext;
                        
                //Delete the original uploaded passport
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mPrimaryCert['name']);

                /*
                mOlevelCert1
                ****************************************/
                ImageUtil::process_image_anysize(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR . $t_foldername, $this->mOlevelCert1['name'], 600, 800);
                $i = strrpos($this->mOlevelCert1['name'], '.');
                $image_name = substr($this->mOlevelCert1['name'], 0, $i);
                $ext = substr($this->mOlevelCert1['name'], $i);

                // Set up the write paths
                $this->mOlevelCert1Name = $image_name . '_600' . $ext;
                //Delete the original uploaded passport
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mOlevelCert1['name']);
                /*
                mOlevelCert2
                ****************************************/
                
                if($this->mIsTwo_OlevelPresent == true)
                {
                    ImageUtil::process_image_anysize(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR . $t_foldername, $this->mOlevelCert2['name'], 600, 800);
                    $i = strrpos($this->mOlevelCert2['name'], '.');
                    $image_name = substr($this->mOlevelCert2['name'], 0, $i);
                    $ext = substr($this->mOlevelCert2['name'], $i);
                    // Set up the write paths
                    $this->mOlevelCert2Name = $image_name . '_600' . $ext;
                    //Delete the original uploaded passport
                    unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mOlevelCert2['name']);
                }

                /*
                mAlevelCert
                ****************************************/
                ImageUtil::process_image_anysize(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR . $t_foldername, $this->mAlevelCert['name'], 600, 800);
                $i = strrpos($this->mAlevelCert['name'], '.');
                $image_name = substr($this->mAlevelCert['name'], 0, $i);
                $ext = substr($this->mAlevelCert['name'], $i);
                // Set up the write paths
                $this->mAlevelCertName = $image_name . '_600' . $ext;         
                //Delete the original uploaded passport
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mAlevelCert['name']);
                /*
                mProCert vv
                ****************************************/
                if($this->mProfCert_Present == true)
                {
                    ImageUtil::process_image_anysize(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR . $t_foldername, $this->mProCert['name'], 600, 800);
                    $i = strrpos($this->mProCert['name'], '.');
                    $image_name = substr($this->mProCert['name'], 0, $i);
                    $ext = substr($this->mProCert['name'], $i);
                    // Set up the write paths
                    $this->mProCertName = $image_name . '_600' . $ext;         
                    //Delete the original uploaded passport
                    unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$this->mProCert['name']);
                }
                $this->mStatus = 5;
                /*
                After the system is done cutting the files 
                start saving the file names 
                ****************************************/
                Applicant::AddStaffUploadedCredentials($applicant_read['teachers_id'],$this->mFinalpassword, $this->mBirthCertName, $this->mPrimaryCertName, $this->mOlevelCert1Name, $this->mAlevelCertName, $this->mStaffAddress, $this->mStaffPasportName, $this->mGender, $this->mStatus, $this->mStaffState, $this->mOlevelCert2Name, $this->mProCertName);
                /*
                After the system is done adding credentials and the files 
                
                
                The completion should signal the second part of the  form to be shown by 
                ****************************************/


                $this->mStaff = Customer::GetTeacherUserInfo($applicant_read['teachers_id']);
                $this->mStaffName = ucwords(strtolower($this->mStaff['name']));
                
                $this->mFirstTitle = '<b style="color: green;">Uploaded Successfully</b>';
                $this->mFirstBody = '<h3><b> Dear ' . $this->mStaffName . ' </b></h3> <br> All your information and credentials has been recieved and processing commenced. Its important to note that any forged document dictated will amount to cancellation of application and displinary action taken. Thanks for choosing us';
                $this->mSecondTitle = 'Credentials Upload Completed';
                $this->mSecondBody = 'The school will take appropriate processing actions on the recieved credentials and will get back to you through mail as soon as all information checks out correctly';
                $this->mUploadComplete = true;
            }
            else
            {
                // SITE_ROOT . '/user/' . $t_foldername tt
                //Remove files that are mistakenly uploaded
                Teachers::RemoveFileInAFolder(SITE_ROOT . '/user/' . $t_foldername, $this->filedValuesOfFiles);
                $this->mLoginMsg = $this->mUploadErrMsge . '<br> <br> ' . $this->mCheckErrMsg;

            } 
                

        }//End of submit button
    }



}
?>