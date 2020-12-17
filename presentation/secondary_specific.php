<?php 

class SecondarySpecific
{
    //public members 
    public $mSecondaryApplicantsRecords;
    public $mSecondaryApplicantsRecordsCount;
    public $mLinkToSecondarySpecificData;

    //private members
    private $_mCurrentDate;
    //class construct 
    public function __construct()
    {
        if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] != true)
        {
            $redirect_to = Link::ToIndex();
            header('Location: ' . $redirect_to);
            exit();

        }

         if(isset($_POST['secondary_specific_session_date']) && isset($_POST['any_date']))
        {
            $date = filter_input(INPUT_POST, 'secondary_specific_session_date');
            $this->_mCurrentDate = substr($date, 0, 4);
        }
        else 
        {
            $date = new DateTime();
            $this->_mCurrentDate = $date->format('Y');
        }

        $this->mLinkApplicantsData = Link::ToAdmin();
        $this->mLinkToSecondarySpecificData = Link::ToSecondarySpecificApplicants();



    }



    public function init()
    {
        $this->mSecondaryApplicantsRecords = Customer::GetSecondaryApplications($this->_mCurrentDate);
        $this->mSecondaryApplicantsRecordsCount = count($this->mSecondaryApplicantsRecords);

        //Create the links to nursery student profiles TODAY 30-03-2020
        //I need to check the functions and make sure they do same thing
        for($i = 0; $i < count($this->mSecondaryApplicantsRecords); $i++)
        {
            $this->mSecondaryApplicantsRecords[$i]['link_to_student_profile'] = Link::ToStudentProfileAdmin($this->mSecondaryApplicantsRecords[$i]['applicants_id']);
        }
    }














}
?>