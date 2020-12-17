<?php

//The class that handles student profile capabilities 
class StudentProfile 
{
    //Public members available to smarty
    public $mSiteUrl;
    public $mStudentProfileInfo;
    public $mStudentFullName;
    public $mProfilePassport;
    public $mAgeInfo;
    public $mStudentAge;
    public $mFname;
    public $mSname;
    public $mOthname;
    public $mGender;
    public $mState;

    public $mBloodgroup;
    public $mGenotype;
    public $mAllergies;
    public $mDefect;
    public $mImmunize;
    public $mOtherMediInfo;

    public $mDoctorname;
    public $mDoctorPhone;
    public $mDoctorAddress;

        public $mDadFname;
        public $mMomFname;
        public $mDadLastname;
        public $mMomLastname;
        public $mDadPhone;
        public $mMomPhone;
        public $mDadOfficeAddress;
        public $mMomOfficeAddress;
        public $mDadOccupation;
        public $mMomOccupation;
        public $mDadReligion;
        public $mMomReligion;
        public $mDadHouseAddress;
        public $mMomHouseAddress;

        public $mBirthCert;
        public $mPrimaryCert;
        public $mDoctorReport;

        public $mBirthCertUrl;
        public $mPrimaryCertUrl;
        public $mDoctorReportUrl;
        public $mSection;
        public $mStatus;
        public $mLinkToStudentProfileAdmin;
        public $mLinkToAdmin;
        public $mStudentId;
        public $mClassToAssign;
        public $mClassErrMasg = '';
        public $mIsAdmitted = false;
        public $mAdmitte_on;
        public $mClassNamee;
        public $mClasses;
        public $classAdmitedStatusMsg = false;
    public $mStudentRecordNotFound = false;
        public $mDoctorReportUrlMsg = '';

        public $mPrimaryCertUrlMsg = '';

    //Private member 
    private $_mStudentId;
    private $_mError = 0;


    //Class constructor
    public function __construct()
    {
        //Ensure its a signed in user 
         if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] != true)
        {
            $redirect_to = Link::ToIndex();
            header('Location: ' . $redirect_to);
            exit();

        }




        //Check the submitted student id
        if(isset($_GET['StudentId']))
            $this->_mStudentId = (int)filter_input(INPUT_GET, 'StudentId');
        else 
            trigger_error('Student id not set');



        $this->mStudentId = $this->_mStudentId;


            //The logic for the admission and assigning of class
        if(isset($_POST['classAdmitedBtn']))
        {
            if(empty($_POST['classAdmited']))
            {
                $this->mClassErrMasg = 'Please select a class';
                $this->_mError++;
            }
            else 
            {
                $this->mStudentId = (int)filter_input(INPUT_POST, 'student_id');
                $this->mClassToAssign = (int)filter_input(INPUT_POST, 'classAdmited');
            }

        }
        
        


        //The code for cancelling of admission
        if(isset($_POST['cancelBtn']) && isset($_POST['student_id']))
        {
            $this->mStudentId = (int)filter_input(INPUT_POST, 'student_id');
        }

        



        //Call for the student with the sent id mClasses
        $this->mStudentProfileInfo = Customer::GetStudentProfileInfo($this->_mStudentId);
        $this->mAgeInfo = Customer::GetStudentAge($this->_mStudentId);
        $this->mSiteUrl = Link::Build('');
        $this->mLinkToStudentProfileAdmin = Link::ToStudentProfileAdmin($this->_mStudentId);
        $this->mLinkToAdmin = Link::ToAdmin();
        $this->mClasses = Teachers::GetClassList();
        

        
    }







    public function init()
    {
         //The code that assigns a class and admitts a student mStudentFullName
        if(isset($_POST['classAdmitedBtn']) && $this->_mError == 0)
        {
            $this->mStudentProfileInfo = Customer::AdmitAndAssignClass($this->mStudentId, $this->mClassToAssign);

            if(!$this->mStudentProfileInfo)
                $this->mStudentRecordNotFound = true;
            else
            {
                //SET classAdmitedStatusMsg = TRUE
                // $this->classAdmitedStatusMsg = true;
                $this->mClassToAssign = (int)$this->mStudentProfileInfo['class_assigned'];
                //Get class_name with class_assigned value

                $mClassNamee = Customer::GetClassNameById($this->mClassToAssign);
                $this->mClassNamee = $mClassNamee['class_name'];

                $this->mStatus = $this->mStudentProfileInfo['status'];
                $this->mAdmitte_on = $this->mStudentProfileInfo['admitted_on'];

                if($this->mAdmitte_on != null && !empty($this->mAdmitte_on) &&  $this->mStatus == 'Admitted' &&  !($this->mStatus == 'Pending') && !empty($this->mClassToAssign) && $this->mClassToAssign != null)
                    $this->mIsAdmitted = true;

            }

        }




        if(isset($_POST['cancelBtn']) && isset($_POST['student_id']))
        {
            
            $this->mStudentProfileInfo = Customer::CancelAdmission($this->mStudentId);
            $this->mIsAdmitted = false;
        }


        if(!$this->mStudentProfileInfo)
            $this->mStudentRecordNotFound = true;
        else
        {
            //Student complet name

            $this->mStudentFullName = $this->mStudentProfileInfo['firstname'] .' '. $this->mStudentProfileInfo['surname'];

            //The complete three names
            $this->mFname = $this->mStudentProfileInfo['firstname'];
            $this->mSname = $this->mStudentProfileInfo['surname'];
            $this->mOthname = $this->mStudentProfileInfo['othername'];
            if($this->mOthname == 'none' || $this->mOthname == null)
                $this->mOthname = 'None';
            else 
                $this->mOthname = $this->mStudentProfileInfo['othername'];

            
            //Gender
            $this->mGender = $this->mStudentProfileInfo['gender'];
            if($this->mGender == 1)
                $this->mGender = 'Male';
            elseif($this->mGender == 2)
                $this->mGender = 'Female';


            //State
            $this->mState = $this->mStudentProfileInfo['state'];


            //Email Address 
            $this->mEmailAdd = $this->mStudentProfileInfo['email'];

            //Bloodgroup
            $this->mBloodgroup = $this->mStudentProfileInfo['bloodgroup'];
            $this->mGenotype = $this->mStudentProfileInfo['genotype'];
            $this->mAllergies = $this->mStudentProfileInfo['allergies'];
            $this->mDefect = $this->mStudentProfileInfo['defects'];
            $this->mImmunize = $this->mStudentProfileInfo['immunize'];
            $this->mOtherMediInfo = $this->mStudentProfileInfo['otherinfo'];

            //Doctors information
            $this->mDoctorname = $this->mStudentProfileInfo['docname'];
            if($this->mDoctorname == 'None' || $this->mDoctorname == 'none')
                $this->mDoctorname = 'None';
            else 
                $this->mDoctorname = 'Dr. '.$this->mDoctorname;
            $this->mDoctorPhone = $this->mStudentProfileInfo['docphone'];
            $this->mDoctorAddress = $this->mStudentProfileInfo['docaddress'];

            //Parent Information
            $this->mDadFname = $this->mStudentProfileInfo['f_fname'];
            $this->mMomFname = $this->mStudentProfileInfo['m_fname'];

            $this->mDadLastname = $this->mStudentProfileInfo['f_lname'];
            $this->mMomLastname = $this->mStudentProfileInfo['m_lname'];

            $this->mDadPhone = $this->mStudentProfileInfo['f_phone'];
            $this->mMomPhone = $this->mStudentProfileInfo['m_phone'];

            $this->mDadOfficeAddress = $this->mStudentProfileInfo['f_office'];
            $this->mMomOfficeAddress = $this->mStudentProfileInfo['m_office'];

            $this->mDadOccupation = $this->mStudentProfileInfo['f_occupation'];
            $this->mMomOccupation = $this->mStudentProfileInfo['m_occupation'];

            $this->mDadReligion = $this->mStudentProfileInfo['f_religion'];
            $this->mMomReligion = $this->mStudentProfileInfo['m_religion'];

            $this->mDadHouseAddress = $this->mStudentProfileInfo['f_address'];
            $this->mMomHouseAddress = $this->mStudentProfileInfo['m_address'];


            

            //Student Passport Name
            $this->mProfilePassport = $this->mStudentProfileInfo['image1'];
            $this->mBirthCert = $this->mStudentProfileInfo['birthcert'];
            $this->mPrimaryCert = $this->mStudentProfileInfo['primarycert'];
            $this->mDoctorReport = $this->mStudentProfileInfo['docreport'];
            $this->mClassToAssign = $this->mStudentProfileInfo['class_assigned'];

            if($this->mClassToAssign == null || $this->mClassToAssign == '')
                $this->mClassToAssign = 'None';
            else 
                $this->mClassToAssign = $this->mStudentProfileInfo['class_assigned'];

            $this->mSection = $this->mStudentProfileInfo['section'];
            $this->mStatus = $this->mStudentProfileInfo['status'];
            $this->mAdmitte_on = $this->mStudentProfileInfo['admitted_on'];

            if(
                $this->mAdmitte_on != null && 
                !empty($this->mAdmitte_on) &&  
                $this->mStatus == 'Admitted' &&  
                !($this->mStatus == 'Pending') && 
                !empty($this->mClassToAssign) && 
                $this->mClassToAssign != null)
                $this->mIsAdmitted = true;
            
            $pos = strpos($this->mStudentProfileInfo['email'], '@');
            $userfolder = substr($this->mStudentProfileInfo['email'], 0, $pos) . '_folder';

            //Student Passport Location
            $this->mPassportUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$userfolder.DIRECTORY_SEPARATOR. $this->mProfilePassport);

            //Birth certificates and files 
            $this->mBirthCertUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$userfolder.DIRECTORY_SEPARATOR. $this->mBirthCert);

            

            if($this->mPrimaryCert == null || $this->mPrimaryCert == 'None' || $this->mPrimaryCert == 'none')
                $this->mPrimaryCertUrlMsg = 'File not Available';
            else 
                $this->mPrimaryCertUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$userfolder.DIRECTORY_SEPARATOR. $this->mPrimaryCert);



            if($this->mDoctorReport == NULL || $this->mDoctorReport == 'None' || $this->mDoctorReport == 'none')
                $this->mDoctorReportUrlMsg = 'File not Available';
            else 
                $this->mDoctorReportUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$userfolder.DIRECTORY_SEPARATOR. $this->mDoctorReport);
            
            //Age
            $this->mStudentAge = $this->mAgeInfo['age'];
            $this->mShowDob = $this->mAgeInfo['showage'];


        //    end here 

        }

        


    }




}
?>