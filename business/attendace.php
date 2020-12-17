<?php
class Attendance 
{
    private $mClassId;
    private $mClassName;
    private $mDepartmentName;

    //Array of student Ids
    private $mStudentIds;

    //Array of the students attendance mark values 
    private $mAttendance;

    private $m;

    public function __construct()
    {
        $this->mClassId = $_SESSION['class_listed_id'];
        $this->mClassName = $_SESSION['class_name'];

    }
}
?>