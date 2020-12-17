<?php 

class TeachersList
{
    public $mListWarningMsg = false;
    public $mListOfTeachers;
    public $mListOfAdminTeachers;

    public function __construct()
    {
        if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] != true)
        {
            $redirect_to = Link::ToIndex();
            header('Location: ' . $redirect_to);
            exit();
        }

        if((!isset($_SESSION['admin_type'])) || ($_SESSION['admin_type']) != 7)
        {
            $this->mListWarningMsg = "You are not authorised to view the list of teacher page";
        }



    }



    public function init()
    {
        if((!isset($_SESSION['admin_type'])) || ($_SESSION['admin_type']) != 7)
        {
            $this->mListWarningMsg = "You are not authorised to view the list of teacher page";
        }
        else
        {
            
            $this->mListOfTeachers = Teachers::GetListOfTeachers();
            if($this->mListOfTeachers)
            {
                $this->mListOfTeachersCount = count($this->mListOfTeachers);
                //Build the link to employed_staff_profile_link
                
                for($i = 0; $i < count($this->mListOfTeachers); $i++)
                {
                    $this->mListOfTeachers[$i]['employed_staff_profile_link'] = Link::ToTeacherProfileAdmin($this->mListOfTeachers[$i]['teachers_id']);

                }

            }
                


            $this->mListOfAdminTeachers = Teachers::GetListOfAdminTeachers();
            if($this->mListOfAdminTeachers)
            {
                $this->mListOfAdminTeachersCount = count($this->mListOfAdminTeachers);

                for ($i=0; $i < count($this->mListOfAdminTeachers); $i++) 
                { 
                    $this->mListOfAdminTeachers[$i]['employed_staff_profile_link'] = Link::ToTeacherProfileAdmin($this->mListOfAdminTeachers[$i]['teachers_id']);
                }

            }
                

        }

        
    }



}


?>