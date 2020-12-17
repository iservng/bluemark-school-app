<?php 

class NurserySpecific 
{
     //public members 
    public $mNurseryApplicantsRecords;
    public $mNurseryApplicantsRecordsCount;
    public $mLinkToNurserySpecificData;

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

         if(isset($_POST['nursery_specific_session_date']) && isset($_POST['any_date']))
        {
            $date = filter_input(INPUT_POST, 'nursery_specific_session_date');
            $this->_mCurrentDate = substr($date, 0, 4);
        }
        else 
        {
            $date = new DateTime();
            $this->_mCurrentDate = $date->format('Y');
        }

        $this->mLinkApplicantsData = Link::ToAdmin();
        $this->mLinkToNurserySpecificData = Link::ToNurserySpecificApplicants();



    }



    public function init()
    {
        $this->mNurseryApplicantsRecords = Customer::GetNurseryApplications($this->_mCurrentDate);
        $this->mNurseryApplicantsRecordsCount = count($this->mNurseryApplicantsRecords);

        //Create the links to nursery student profiles TODAY 30-03-2020
        //I need to check the functions and make sure they do same thing
        for($i = 0; $i < count($this->mNurseryApplicantsRecords); $i++)
        {
            $this->mNurseryApplicantsRecords[$i]['link_to_student_profile'] = Link::ToStudentProfileAdmin($this->mNurseryApplicantsRecords[$i]['applicants_id']);
        }
    }
















}
?>