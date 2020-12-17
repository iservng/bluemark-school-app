<?php 

//class that shows only teacher applicants record
class StaffActivation 
{
    //public members 
    public $mTeacherApplicantsRecords;
    public $mTeacherApplicantsRecordsCount;
    public $mLinkToTeacherSpecificData;
    public $mStatus = 5;

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


        if(isset($_POST['teacher_awaiting_activation_date']) && isset($_POST['activation_date']))
        {
            $date = filter_input(INPUT_POST, 'teacher_awaiting_activation_date');
            $this->_mCurrentDate = substr($date, 0, 4);
        }
        else 
        {
            $date = new DateTime();
            $this->_mCurrentDate = $date->format('Y');
        }

        $this->mLinkApplicantsData = Link::ToAdmin();
        $this->mLinkToTeacherSpecificData = Link::ToTeacherSpecificApplicants();
    }



    public function init()
    {
        $this->mTeacherApplicantsRecords = Customer::GetTeacherApplicationsByStatus($this->_mCurrentDate, $this->mStatus);
        $this->mTeacherApplicantsRecordsCount = count($this->mTeacherApplicantsRecords);

        //Create the links to nursery student profiles TODAY 30-03-2020
        //I need to check the functions and make sure they do same thing
        for($i = 0; $i < count($this->mTeacherApplicantsRecords); $i++)
        {
            $this->mTeacherApplicantsRecords[$i]['link_to_teacher_profile'] = Link::ToTeacherProfileAdmin($this->mTeacherApplicantsRecords[$i]['teachers_id']);
        }
    }





}
?>