<?php 

//The class that handles the loeading of applicants data
class ApplicantsData
{
    //Public variables available to smarty mNurseryApplicantsRecordsCount
    public $mAllApplicantsRecords;
    public $mAllApplicantsRecordsCount = 0;
    public $mLinkToAdmin;
    public $mLinkApplicantsData;
    public $mShowSubRecords = false;
    

    //Nuery
    public $mNurseryApplicantsRecords;
    public $mNurseryApplicantsRecordsCount  = 0;


    public $mPrimaryApplicantsRecords;
    public $mPrimaryApplicantsRecordsCount = 0;


    public $mSecondaryApplicantsRecords;
    public $mSecondaryApplicantsRecordsCount =  0;

    public $mTeacherApplicantsRecords;
    public $mTeacherApplicantsRecordsCount = 0;

    public $mAllApplicantsRecordNull = true;


    public $mLinkToStudentProile;
    public $mLinkToTeachersProfile;

    //specifics
    public $mTeacherSpecific;
    public $mNurserySpecific;
    public $mPrimarySpecific;
    public $mSecondarySpecific;
    public $mActivationSpecific;

    public $mWaitingForActivation;
    public $mNumberWaitingForActivation;
    public $mWaitingForActivationNumber = 5;

    //Private variables 
    private $_mCurrentDate;

    //Class constructor
    public function __construct() 
    {
        if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] != true)
        {
            $redirect_to = Link::ToIndex();
            header('Location: ' . $redirect_to);
            exit();

        }

        if(isset($_POST['session_date']) && isset($_POST['any_date']))
        {
            $date = filter_input(INPUT_POST, 'session_date');
            $this->_mCurrentDate = substr($date, 0, 4);
        }
        else 
        {
            $date = new DateTime();
            $this->_mCurrentDate = $date->format('Y');

        }

        

        $this->mLinkApplicantsData = Link::ToAdmin();
        // $this->mLinkToStudentProile = Link::ToStudentProfileAdmin();
        $this->mTeacherSpecific = Link::ToTeacherSpecificApplicants();
        $this->mNurserySpecific = Link::ToNurserySpecificApplicants();
        $this->mPrimarySpecific = Link::ToPrimarySpecificApplicants();
        $this->mSecondarySpecific = Link::ToSecondarySpecificApplicants();
        $this->mActivationSpecific = Link::ToActivationSpecific();
        
    }







    public function init()
    {
        //Grabs all the applicants for the current year
        $this->mAllApplicantsRecords = Customer::GetCurrentApplications($this->_mCurrentDate);
        $this->mAllApplicantsRecordsCount = count($this->mAllApplicantsRecords);

        //Grabs all that needs activation according to the current year or a specified year 
        $this->mWaitingForActivation = Customer::GetAllWaitingForActivation($this->_mCurrentDate, $this->mWaitingForActivationNumber);
        $this->mNumberWaitingForActivation = count($this->mWaitingForActivation);

        //Create the links to student profiles
        for($i = 0; $i < count($this->mAllApplicantsRecords); $i++)
        {
            $this->mAllApplicantsRecords[$i]['link_to_student_profile'] = Link::ToStudentProfileAdmin($this->mAllApplicantsRecords[$i]['applicants_id']);
        }




        $this->mNurseryApplicantsRecords = Customer::GetNurseryApplications($this->_mCurrentDate);
        $this->mNurseryApplicantsRecordsCount = count($this->mNurseryApplicantsRecords);

        //Create the links to nursery student profiles TODAY 30-03-2020
        //I need to check the functions and make sure they do same thing
        for($i = 0; $i < count($this->mNurseryApplicantsRecords); $i++)
        {
            $this->mNurseryApplicantsRecords[$i]['link_to_student_profile'] = Link::ToStudentProfileAdmin($this->mNurseryApplicantsRecords[$i]['applicants_id']);
        }



        $this->mPrimaryApplicantsRecords = Customer::GetPrimaryApplications($this->_mCurrentDate);
        $this->mPrimaryApplicantsRecordsCount = count($this->mPrimaryApplicantsRecords);
        //Create the links to nursery student profiles TODAY 30-03-2020
        //I need to check the functions and make sure they do same thing
        for($i = 0; $i < count($this->mPrimaryApplicantsRecords); $i++)
        {
            $this->mPrimaryApplicantsRecords[$i]['link_to_student_profile'] = Link::ToStudentProfileAdmin($this->mPrimaryApplicantsRecords[$i]['applicants_id']);
        }


        $this->mSecondaryApplicantsRecords = Customer::GetSecondaryApplications($this->_mCurrentDate);
        $this->mSecondaryApplicantsRecordsCount = count($this->mSecondaryApplicantsRecords);
        //Create the links to nursery student profiles TODAY 30-03-2020
        //I need to check the functions and make sure they do same thing
        for($i = 0; $i < count($this->mSecondaryApplicantsRecords); $i++)
        {
            $this->mSecondaryApplicantsRecords[$i]['link_to_student_profile'] = Link::ToStudentProfileAdmin($this->mSecondaryApplicantsRecords[$i]['applicants_id']);
        }



        $this->mTeacherApplicantsRecords = Customer::GetTeacherApplications($this->_mCurrentDate);
        $this->mTeacherApplicantsRecordsCount = count($this->mTeacherApplicantsRecords);
        //Create the links to nursery student profiles TODAY 30-03-2020
        //I need to check the functions and make sure they do same thing
        for($i = 0; $i < count($this->mTeacherApplicantsRecords); $i++)
        {
            $this->mTeacherApplicantsRecords[$i]['link_to_teacher_profile'] = Link::ToTeacherProfileAdmin($this->mTeacherApplicantsRecords[$i]['teachers_id']);
        }


        

            if($this->mAllApplicantsRecordsCount == 0 && $this->mNurseryApplicantsRecordsCount  == 0 && $this->mPrimaryApplicantsRecordsCount == 0 && $this->mSecondaryApplicantsRecordsCount ==  0 && $this->mTeacherApplicantsRecordsCount == 0)
            {
                $this->mAllApplicantsRecordNull = false;
                $this->mShowSubRecords = false;
            }
            



        if(isset($_POST['showSubRecordsBtn']) && isset($_POST['showSubRecords']))
            $this->mShowSubRecords = true;
        

        if(isset($_POST['showSubRecordsBtn']) && isset($_POST['hideSubRecords']))
            $this->mShowSubRecords = false;
        



    }


}
?>