<?php 

class InviteOptions
{
    //public members
    public $mInterviewDate;
    public $mInterviewTime;
    public $mInterviewTimeError = 0;
    public $mInterviewDateError = 0;
    public $mEmailSendMsg;
    public $mName;
    public $mEmail;

    //Private members
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
        //I need the id of this users 
        if(isset($_GET['TeacherId']))
            $this->_mTeacherId = (int)filter_input(INPUT_GET, 'TeacherId', FILTER_VALIDATE_INT);
        else 
            trigger_error('TeacherId not set');



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
        
        $this->mLinkToTeacherProfile = Link::ToTeacherProfileAdmin($this->_mTeacherId);
    }




    public function init()
    {
        //Start checking to send the email for interview
        if(isset($_POST['inviteTeacher']) && $this->_mErrors == 0)
        {
                $this->mEmail = $_SESSION['teacher_user']['email'];
                $this->mName = $_SESSION['teacher_user']['name'];
                //Call the send email class 
                $from_address = ADMIN_EMAIL;
                $from_name = STORE_NAME;

                $to_address = $this->mEmail;
                $to_name = $this->mName;

                $subject = 'Invitation For Interview';
                $body = '<p> The application you submitted has been recieve and processed. We are happy to invit you for interview on the '. $this->mInterviewDate .' </p>';

                $is_body_html = true;

                try {

                    //code...JUXT TO TEXT THE OTHER CODE 
                    // require_once('mail_helper.php');
                    // EmailSender::SendEmail($to_address, $to_name, $from_address, $from_name, $subject, $body, $is_body_html);

                    /*
                    After the applicant have been invited for interview
                    then we shall set his status to pendind in the databa
                    */ 
                    $_SESSION['invit_msg'] = true;
                    
                    //Then we shall call the redirect again
                    // $redirect_to = Link::ToTeacherProfileAdmin($this->_mTeacherId);
                    // header('Location: ' . $redirect_to);
                    // exit();
                    

                } catch (PDOException $e) {
                    trigger_error($e->getMessage());
                }
            

        }

    }








}
?>