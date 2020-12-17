<?php

//Class that takes care of the teacher admin profile page
class TeacherProfile
{
    //Public variables available to smarty
    public $mName = '';
    public $mPhone;
    public $mEmail;
    public $mDate;
    public $mAppliedDate;
    public $mAppliedTime;
    public $mStatus;
    public $mStatusOptions = array(
        'Applicant', //0
        'Suspended', //1
        'Blocked', //2
        'Pending', //3
        'Notified', //4
        'Uploaded', //5
        'Staff'//6
    );
    public $mTeacherProfileInfo;

    public $mIsStaff = false;
    public $mLinkToAdminList;
    public $mCvName;
    public $mCvUrl;

    public $mActionContentCell;
    public $mInterviewContentCell;
    public $mLinkToTeacherProfile;

    public $mSubBtnActionMsg;
    public $mProcessSuccessMsg;

    public $mStartEmploymentProcess = false;
    public $mActivateStaff = false;
    public $mDenyStaff = false;
    public $mInviteForInterviewBar = true;
    public $mSuspendStaff = false;
    public $mProcessErrorMsg = false;

    public $mStatusNo;
    public $mNextAction = '';

    // mLinkToTeacherProfile
    public $mInterviewTimeError = 0;
    public $mInterviewTime;
    public $mInterviewDateError = 0;
    public $mInterviewDate;
    public $mTeacher_Id;

    public $mTesting;
    public $mIsUploaded = false;

    public $mDenyBtnAction;
    public $mSuspendBtnAction;
    public $mDenyBtnActionError = 0;
    public $mSuspendBtnActionError = 0;

    public $mBirthcertUrl; 
    public $mPrimarycertUrl; 
    public $mO_LevelcertUrl;
    public $mO_Levelcert2Url;
    public $mA_LevelcertUrl;
    public $mProcertUrl;
    public $mAddress;
    public $mPassportUrl;
    public $mGender;

    public $mPassportAvater;
    public $mActivateBtnAction;
    public $mActivateBtnActionError = 0;
    public $mPdfContentBody;
    public $mEmploymentLetterUrl;
    public $mSiteUrl;

    public $mOnlyNurseryClasses;
    public $mNurseryId = 1;
    public $mOnlyPrimaryClasses;
    public $mPrimaryId = 2;
    public $mOnlySecondaryClasses;
    public $mSecondaryId = 3;

    public $mCsrf_activate;
    public $mSelectedClassIds = array();
    public $mNameForCV;
   


    //private members
    private $_mTeacherId;
    private $_mErrors = 0;

    //class constructor
    public function __construct()
    {

        if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] != true)
        {
            $redirect_to = Link::ToIndex();
            header('Location: ' . $redirect_to);
            exit();
        }
        //I need the id of this users suspendBtnAction
        if(isset($_GET['TeacherId']) && is_numeric($_GET['TeacherId']))
        {
            $this->_mTeacherId = (int)filter_input(INPUT_GET, 'TeacherId', FILTER_VALIDATE_INT);
        }
        else
            trigger_error('TeacherId not set');

        $this->mSiteUrl = Link::Build('', 'https');
        $this->mTeacher_Id = (int)filter_input(INPUT_GET, 'TeacherId', FILTER_VALIDATE_INT);

        //Using the id grab the teachers info from the database
        $_SESSION['teacher_user'] = Customer::GetTeacherUserInfo($this->_mTeacherId);

        //The key for the hash_mack function 
        if(empty($_SESSION['key']))
            $_SESSION['key'] = bin2hex(random_bytes(32));
        //Create CSRF Token
        $this->mCsrf_activate = hash_hmac('sha256', 'This is some string: teachers profile page', $_SESSION['key']);

         


        /********************************
        A list of nursery classes
        *****************************************/
        $this->mOnlyNurseryClasses = Customer::GetOnlyNurseryClasses($this->mNurseryId);

        /********************************
        A list of primary classes
        *****************************************/
        $this->mOnlyPrimaryClasses = Customer::GetOnlyPrimaryClasses($this->mPrimaryId);

        /********************************
        A list of secondary classes
        *****************************************/
        $this->mOnlySecondaryClasses = Customer::GetOnlySecondaryClasses($this->mSecondaryId);
        
        /********************************
        I will check the items for the submitted things for invition for interview
        *****************************************/
        if(array_key_exists('inviteTeacher', $_POST))
        {
            if(!isset($_POST['inteview_date']) || empty($_POST['inteview_date']))
            {
                $this->mInterviewDateError = 1;
                $this->_mErrors++;
            }
            else
                $this->mInterviewDate = filter_input(INPUT_POST, 'inteview_date');


            if(!isset($_POST['inteview_time']) || empty($_POST['inteview_time']))
            {
                $this->mInterviewTimeError = 1;
                $this->_mErrors++;
            }
            else
                $this->mInterviewTime = filter_input(INPUT_POST, 'inteview_time');
        }

// mCvUrl
         
        if(isset($_POST['denyBtnAction']))
        {
            $actionString = filter_input(INPUT_POST, 'denyBtnAction');
            if($actionString != 'Cancel employment')
            {
                $this->mDenyBtnActionError = 1;
                $this->_mErrors++;
                $this->mTesting = '<b style="color: red;">Action not executed</b>';
            }
            else
            {
                $this->mDenyBtnAction = filter_input(INPUT_POST, 'denyBtnAction');
                $this->mTesting = '<b style="color: green;">' . $this->mDenyBtnAction . ' success</b>';
            }
                
        }
        
            

        if(isset($_POST['suspendBtnAction']))
        {
            $actionString = filter_input(INPUT_POST, 'suspendBtnAction', FILTER_SANITIZE_STRING);
            if($actionString != 'Suspend staff')
            {
                $this->mSuspendBtnActionError = 1;
                $this->_mErrors++;
                $this->mTesting = '<b style="color: red;">Action not executed</b>';
            }
            else
            {
                $this->mSuspendBtnAction = filter_input(INPUT_POST, 'suspendBtnAction');
                $this->mTesting = '<b style="color: green;">' . $this->mSuspendBtnAction . ' success</b>';
            } 
                
        }



        $this->mTeacherProfileInfo = $_SESSION['teacher_user'];
        $this->mLinkToAdminList = Link::ToAdmin();
        // $this->mLinkToAdmin = Link::ToAdmin();;

        $this->mActionContentCell = 'admin_teacher_actions.tpl';
        $this->mInterviewContentCell = 'invit_teacher_actions.tpl';


        $this->mLinkToTeacherProfile = Link::ToTeacherProfileAdmin($this->_mTeacherId);
        $this->mSubBtnActionMsg = 'Invite For Interview';



    }



    public function init()
    {
        if($this->mTeacherProfileInfo)
        {
            // $this->mErrorMessage = 'Teacher information not found <br><br> <a href="" class="btn btn-outline btn-success"> Got It </a>';
            //     //if the teacher is not assigned to the class that is given to the student
            // $this->mContentCell = 'warning_box.tpl';
        // }
        // else
        // {
            //Extract piece of information
        $this->mNameForCV = $this->mTeacherProfileInfo['name'];
        $this->mName = ucwords(strtolower($this->mTeacherProfileInfo['name']));
        
        $this->mEmail = $this->mTeacherProfileInfo['email'];
        $this->mPhone = $this->mTeacherProfileInfo['phone'];
        $this->mCvName = $this->mTeacherProfileInfo['cvname'];
        $this->mAppliedDate = $this->mTeacherProfileInfo['applied_date'];
        $this->mAppliedTime = $this->mTeacherProfileInfo['applied_time'];

        

        $this->mStatusNo = (int)$this->mTeacherProfileInfo['status'];
        $this->mStatus = $this->mStatusOptions[$this->mStatusNo];

        if($this->mStatusNo == 3)
        {
            $this->mInviteForInterviewBar = false;
            $this->mDenyStaff = true;
            $this->mStartEmploymentProcess = true;

        }
        elseif($this->mStatusNo == 4)
        {
            $this->mDenyStaff = true;
            $this->mStartEmploymentProcess = false;
            $this->mActivateStaff = true;
            $this->mInviteForInterviewBar = false;
        }
        elseif($this->mStatusNo == 5)
        {
            $this->mDenyStaff = true;
            $this->mStartEmploymentProcess = false;
            $this->mActivateStaff = true;
            $this->mInviteForInterviewBar = false;
            $this->mStatus = $this->mStatusOptions[$this->mStatusNo];

            /*
            Since the activity of uploading has changed the status to uploaded
            The Admin should be able to see the files that are uploaded
            */
            $this->mIsUploaded = true;

        }
        elseif($this->mStatusNo == 6)
        {

            $this->mDenyStaff = true;
            $this->mStartEmploymentProcess = false;
            $this->mActivateStaff = false;
            $this->mInviteForInterviewBar = false;
            $this->mSuspendStaff = true;
            $this->mStatus = '<b style="color: green;">' . $this->mStatusOptions[$this->mStatusNo] . '</b>';

            /*
            Since the activity of uploading has changed the status to uploaded
            The Admin should be able to see the files that are uploaded mCvUrl
            */
            $this->mIsUploaded = true;
            $this->mTesting = '<b style="color: green;">Activated</b>';
        }
        elseif($this->mStatusNo == 2)
        {
            // $this->mIsUploaded = true;
            $this->mTesting = '<b style="color: red;">Blocked</b>';
            $this->mStatus = $this->mStatusOptions[$this->mStatusNo];

            $this->mDenyStaff = false;
            $this->mStartEmploymentProcess = true;
            $this->mActivateStaff = true;
            $this->mInviteForInterviewBar = false;
        }
        elseif($this->mStatusNo == 1)
        {
            $this->mTesting = '<b style="color: red;">Suspended</b>';
            // $this->mStatusNo = 1;
            // Customer::SetStatusToCurrentState($this->mStatusNo, $this->_mTeacherId);
            $this->mStatus = $this->mStatusOptions[$this->mStatusNo];

            $this->mDenyStaff = false;
            $this->mStartEmploymentProcess = true;
            $this->mActivateStaff = true;
            $this->mInviteForInterviewBar = false;
        }
            

        //Curriculum vitea
        $t_fullname = str_replace(' ', '', $this->mNameForCV);
            //Concatenate the number to the fulname
        $t_fulname = $t_fullname . $this->mPhone;
        $t_foldername = $t_fulname.'_folder';

        // echo $this->mNameForCV;

        // $this->mCvName = $this->mTeacherProfileInfo['cvname'];
        // $this->mCvUrl = Link::Build('');
        $this->mCvUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR. $this->mCvName);


        /*
        This is the file arae mBirthcertUrl
        */
        if($_SESSION['teacher_user']['birthcert'])
            $this->mBirthcertUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR. $_SESSION['teacher_user']['birthcert']);
        else 
            $this->mBirthcertUrl = ''; 

        
        if($_SESSION['teacher_user']['primarycert'])
            $this->mPrimarycertUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR. $this->mTeacherProfileInfo['primarycert']);
        else 
            $this->mPrimarycertUrl = '';


        if($_SESSION['teacher_user']['o_Levelcert'])
            $this->mO_LevelcertUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR. $this->mTeacherProfileInfo['o_Levelcert']);
        else 
            $this->mO_LevelcertUrl = '';


        
        if($_SESSION['teacher_user']['o_Levelcert2'])
            $this->mO_Levelcert2Url = Link::Build('user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR. $this->mTeacherProfileInfo['o_Levelcert2']);
        else 
            $this->mO_Levelcert2Url = '';

        if($_SESSION['teacher_user']['a_Levelcert'])
            $this->mA_LevelcertUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR. $this->mTeacherProfileInfo['a_Levelcert']);
        else 
            $this->mA_LevelcertUrl = '';


        if($_SESSION['teacher_user']['procert'])
            $this->mProcertUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR. $this->mTeacherProfileInfo['procert']);
        else 
            $this->mProcertUrl = '';



        if($_SESSION['teacher_user']['passport'])
            $this->mPassportUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR. $this->mTeacherProfileInfo['passport']);
        else 
            $this->mPassportUrl = Link::Build('user'.DIRECTORY_SEPARATOR.'avater'.DIRECTORY_SEPARATOR.'avater.png');




        if($_SESSION['teacher_user']['address'])
            $this->mAddress = $this->mTeacherProfileInfo['address'];
        else 
            $this->mAddress = '';

        if($_SESSION['teacher_user']['gender'])
        {
            $mGender = (int)$this->mTeacherProfileInfo['gender'];
            if($mGender == 1)
                $this->mGender = 'Uncle';
            else 
                $this->mGender = 'Auntie';

        }
        else 
            $this->mGender = '';



        /*
        The code below finds an applicant who is right, then Invitation is sent to the applicant for Interview. 
        */
        if(array_key_exists('inviteTeacher', $_POST) && $this->_mErrors == 0)
        {
            try {

                // include_once 'mail_helper.php';

                $to_address = $this->mEmail;
                $to_name = $this->mName;
                $from_address = ADMIN_EMAIL;
                $from_name = STORE_NAME;
                $subject = 'Invitation for Interview';

                //Get the date and the time
                $body = '<h3>Dear '. $this->mName .'</h3><p> The employment application you submitted has been recieve and processed. We are happy to invit you for interview on the <b>'. $this->mInterviewDate .'</b> by  <b>'. $this->mInterviewTime .'.</b> Please ensure to come with oriiginal copies of your mentioned credentials </p>';
                $is_body_html = true;

                //Put it in a try catch
                //repare code here 
                // if(EmailSender::SendEmail($to_address, $to_name, $from_address, $from_name, $subject, $body, $is_body_html))
                // {
                    $this->mInviteForInterviewBar = false;
                    $this->mStatusNo = 3;
                    Customer::SetStatusToCurrentState($this->mStatusNo, $this->_mTeacherId);
                    $this->mStatus = $this->mStatusOptions[$this->mStatusNo];

                    //Expose the two buttons
                    /*
                    1. The mDenyStaff
                    2. mStartEmploymentProcess
                    
                    */
                    $this->mDenyStaff = true;
                    $this->mStartEmploymentProcess = true;
                    $this->mProcessSuccessMsg = 'Email sent to this applicant teacher';

                // }
                // else
                // {
                //     $this->mProcessErrorMsg = 'Email NOT SENT: This could be due poor internet connection, please check and try again! ';
                //     //if the teacher is not assigned to the class that is given to the student
                //     // $this->mContentCell = 'warning_box.tpl';
                // }

                
            } catch (PDOException $e) {
                trigger_error('Email not sent: ' . $e->getMessage());
            }
        }

        /*
        After the Interview the Admin will use the profile button 'Start employment process' to 
        1. Tell the applicant that he or she has been select due to the last interview
        2. That he or she should upload soft copies of the credential to complete his or her own side of the process
        3. the button also changes the status of the applicant to 'Notified' 
        */

        if(array_key_exists('startBtnAction', $_POST))
        {
            try {
                //code...
                // include_once 'mail_helper.ph/p';
                $this->mTesting = '<b style="color: red;">Started Process!</b>';

                $to_address = $this->mTeacherProfileInfo['email'];
                $to_name = $this->mTeacherProfileInfo['name'];
                $from_address = ADMIN_EMAIL;
                $from_name = STORE_NAME;
                $subject = 'Your have been selected';
                

                $body = '<h3>Congratulations '. $this->mName .'! </h3>After the Interview conducted, the school is glad to inform that you been select due to the last successful interview. In complaince with our employment  standard procedure you are hereby expected to upload soft copies of the credential to complete your own side of the process 
                <p>Once again congratulation you are expected to upload soft copies of the credential on or before three working days
                <br><br>
                <b>Head of Admin</b><br>
                <span>Neato C Parkfield</span>
                </p>';
                $is_body_html = true;

                //Put it in a try catch
                // EmailSender::SendEmail($to_address, $to_name, $from_address, $from_name, $subject, $body, $is_body_html);

                $this->mInviteForInterviewBar = false;
                $this->mStatusNo = 4;
                Customer::SetStatusToCurrentState($this->mStatusNo, $this->_mTeacherId);
                $this->mStatus = $this->mStatusOptions[$this->mStatusNo];

                $this->mDenyStaff = true;
                $this->mStartEmploymentProcess = false;
                $this->mActivateStaff = true;
                $this->mInviteForInterviewBar = false;
            } catch (PDOException $e) {
                trigger_error($e->getMessage());
            }
            

        }








        if(array_key_exists('denyBtnAction', $_POST) && $this->_mErrors == 0)
        {
            /*
            This should nomally be used to reject a particular application submittion 
            Basically the status is set to 'Blocked' which is two
            */
            $this->mTesting = '<b style="color: red;">Blocked</b>';
            $this->mStatusNo = 2;
            Customer::SetStatusToCurrentState($this->mStatusNo, $this->_mTeacherId);
            $this->mStatus = $this->mStatusOptions[$this->mStatusNo];

            $this->mDenyStaff = false;
            $this->mStartEmploymentProcess = true;
            $this->mActivateStaff = true;
            $this->mInviteForInterviewBar = false;

        }
        /*
        To suspend a staff, which means seting status to 1, this button is used when there is some deciplinary measure placed on a particular denyBtnAction
        */
        if(array_key_exists('suspendBtnAction', $_POST) && $this->_mErrors == 0)
        {
            $this->mTesting = '<b style="color: red;">Suspended</b>';
            $this->mStatusNo = 1;
            Customer::SetStatusToCurrentState($this->mStatusNo, $this->_mTeacherId);
            $this->mStatus = $this->mStatusOptions[$this->mStatusNo];
            $this->mDenyStaff = false;
            $this->mStartEmploymentProcess = true;
            $this->mActivateStaff = true;
            $this->mInviteForInterviewBar = false;
        }
        /*
        This buttom eithe activate a new staff or a suspended/Blocked staff
        this system check if the password field is null 
        */
        if(array_key_exists('activateBtnAction', $_POST) && $this->_mErrors == 0)
        {
            //Check for token_csrf_key to prevent CSRF attack
            if(hash_equals($this->mCsrf_activate, $_POST['token_csrf_key']))
            {
                if($this->mStatusNo == 2 || $this->mStatusNo == 3)
                {
                    $this->mDenyStaff = true;
                    $this->mStartEmploymentProcess = false;
                    $this->mActivateStaff = false;
                    $this->mInviteForInterviewBar = false;
                    $this->mStatusNo = 6;
                    Customer::SetStatusToCurrentState($this->mStatusNo, $this->_mTeacherId);
                    $this->mStatus = $this->mStatusOptions[$this->mStatusNo];
                    $this->mSuspendStaff = true;
                    $this->mStatus = '<b style="color: green;">' . $this->mStatusOptions[$this->mStatusNo] . '</b>';
                    /*
                    Since the activity of uploading has changed the status to uploaded
                    The Admin should be able to see the files that are uploaded
                    */
                    $this->mIsUploaded = true;
                    $this->mTesting = '<b style="color: green;"> Old staff Activated</b>';

                }
                elseif($this->mStatusNo == 5)
                {
                    /*
                    We shall collect all the selected class ids and process them 
                    */
                    $this->mSelectedClassIds = $_POST['classId'];
                    foreach ($this->mSelectedClassIds as $key => $value) {
                        Customer::SetTeacherClasses($this->mTeacher_Id, (int)$value);
                    }
                    


                    /*
                    The making of the pdf employment letter
                    */
                    // include_once 'mail_helper.php';
                    require_once 'fpdf181'.DIRECTORY_SEPARATOR.'autoload.inc.php';
                    // $mi_image = Link::Build('user'.DIRECTORY_SEPARATOR.'avater'.DIRECTORY_SEPARATOR.'logos.png');
                    //Curriculum vitea
                    $lowerIt = ucwords(strtolower($this->mTeacherProfileInfo['name']));
                    $t_fullname = str_replace(' ', '', $lowerIt);
                    //Concatenate the number to the fulname
                    $t_fulname = $t_fullname . $this->mPhone;
                    $t_foldername = $t_fulname.'_folder';
                    $pdf_file_name = $t_fulname.'.pdf';
                    $makedate = new DateTime();
                    $today = $makedate->format('Y-m-d');
                    /**************************************** *
                     * maker of pdf employment leter 
                    **********************************************/
                    //Include the library
                    include_once 'employment_letter.php';
                    /**************************************** *
                     * maker of pdf employment leter mm
                    **********************************************/
                    $path = $_SESSION['file_name'];
            
                    try {

                        $to_address = $this->mEmail;
                        $to_name = $this->mName;
                        $from_address = ADMIN_EMAIL;
                        $from_name = STORE_NAME;
                        $subject = 'Employment Letter';
                        $pdf_file_name = $subject;
                        //Get the date and the time
                        $body = '<h3>Dear '. $this->mName .'</h3><p> The employment letter is live and has been documented and processed. We are happy to invit you into our great school by Please ensure to contact school when any  </p>';
                        $is_body_html = true;
                        //Put it in a try catch
                        // EmailSender::SendEmailWithAttachment($path, $pdf_file_name, $to_address, $to_name, $from_address, $from_name, $subject, $body, $is_body_html);

                        //This person is a new staff
                        $this->mDenyStaff = true;
                        $this->mStartEmploymentProcess = false;
                        $this->mActivateStaff = false;
                        $this->mInviteForInterviewBar = false;

                        $this->mStatusNo = 6;
                        Customer::SetStatusToCurrentState($this->mStatusNo, $this->_mTeacherId);
                        $this->mStatus = $this->mStatusOptions[$this->mStatusNo];

                        $this->mSuspendStaff = true;
                        $this->mStatus = '<b style="color: green;">' . $this->mStatusOptions[$this->mStatusNo] . '</b>';

                        /*
                        Since the activity of uploading has changed the status to uploaded
                        The Admin should be able to see the files that are uploaded
                        */
                        $this->mIsUploaded = true;
                        $this->mTesting = '<b style="color: green;">'. $this->mName .' Activation Complete</b>';


                    } catch(PDOException $e) {
                        //throw $th;
                        trigger_error($e->getMessage());

                    }
                    

                }

            }//ENDING OF token_csrf_key
            

        }

        }
        
        
    }


}
?>
