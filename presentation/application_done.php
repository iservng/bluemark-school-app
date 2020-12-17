<?php
//Class the handle the application done from various applicants 
class ApplicationDone 
{
    //public varuabless available to smarty
    public $mApplicant;
    public $mApplyingFor;
    public $mApplicantsMeessage;

    public $mSubject_1 = '';
    public $mSubject_2 = '';
    public $mSubject_3 = '';


    public $mIsTeacherApplicant = false;
   

    public $mEntranceExamDate = '';

    public $mOralInterviewDate = '';
    public $mAdmissionStartsDate = '';
    public $mAdmissionClosesDate = '';

    public $mDatabaseMessage = '';


    public $mLinkToNurseryForm;
    public $mLinkToPrimaryForm;
    public $mLinkToSecondaryForm;
    public $mLinkToApplicationDone;
    public $mExitApplicationsPage;
    public $mDeletApplicationSessions = false;


    //Private members
    private $_mApplicantError = 0;


    //Class consttructor
    public function __construct()
    {
        if(isset($_SESSION['applicant_name']))
            $this->mApplicant = $_SESSION['applicant_name'];

        if(isset($_SESSION['application_for']))
            $this->mApplyingFor = $_SESSION['application_for'];

        $this->mLinkToNurseryForm = Link::ToNurseryForm();
        $this->mLinkToPrimaryForm = Link::ToPrimaryForm();
        $this->mLinkToSecondaryForm = Link::ToSecondaryForm();
        $this->mLinkToApplicationDone = Link::ToApplicationDone();
        $this->mExitApplicationsPage = Link::ToExitApplicationsPage();

        if(isset($_POST['exitPageBtn']))
        {
            $this->mDeletApplicationSessions = true;
        }

    }

    public function init()
    {
        if(isset($_SESSION['application_for']) && $_SESSION['application_for'] == 'Employment')
        {
            $this->mApplicantsMeessage = 'Your Application to become an instruct in our school has been recieved, and processing commenced. We shall get back to you in due cause. BlueMark maintains its reputation of being the most accessible and impactful code school in the country by bringing affordability to the highest quality, hands-on education in the industry. There are many ways to get involved on our multiple campuses, including networking events, workshops, info sessions, part-time classes, and full-time immersive courses';
            $this->mIsTeacherApplicant = true;
        }
        elseif(isset($_SESSION['application_for']) && $_SESSION['application_for'] == 'Nursery')
        {
            //Nursery Applicant
            $this->mApplicantsMeessage = 'Your Application into '.$_SESSION['application_for'].' at '. SCHOOL_NAME.' has been recieved, and processing commenced.';

            $sectionId = (int)Catalog::GetDepartmentId($_SESSION['application_for']);
            $message_read = Applicant::GetAdmissionMessages($sectionId);

            $this->mSubject_1 = $message_read['subject_1'];
            $this->mSubject_2 = $message_read['subject_2'];
            $this->mSubject_3 = $message_read['subject_3'];

            $this->mEntranceExamDate = $message_read['entrance_exam_date'];
            $this->mOralInterviewDate = $message_read['oral_interview_date'];

            $this->mAdmissionStartsDate = $message_read['admission_starts'];
            $this->mAdmissionClosesDate = $message_read['admission_closes'];
            
            $this->mDatabaseMessage = $message_read['massage'];

            unset($_SESSION['pin_on_valid']);
            unset($_SESSION['pin_onyeka_valid']);

            //Deletet the session cookie from browser
            $name = session_name();
            $expire = strtotime('-1 year');
            $params = session_get_cookie_params();
            $path = $params['path'];
            $domain = $params['domain'];
            $secure = $params['secure'];
            $httponly = $params['httponly'];

            setcookie($name, '', $expire, $path, $domain, $secure, $httponly);

        }
        elseif(isset($_SESSION['application_for']) && $_SESSION['application_for'] == 'Primary')
        {
            $sectionId = Catalog::GetDepartmentId($_SESSION['application_for']);
            $message_read = Applicant::GetAdmissionMessages($sectionId);

            $this->mSubject_1 = $message_read['subject_1'];
            $this->mSubject_2 = $message_read['subject_2'];
            $this->mSubject_3 = $message_read['subject_3'];
            $this->mEntranceExamDate = $message_read['entrance_exam_date'];
            $this->mOralInterviewDate = $message_read['oral_interview_date'];
            $this->mAdmissionStartsDate = $message_read['admission_starts'];
            $this->mAdmissionClosesDate = $message_read['admission_closes'];
            $this->mDatabaseMessage = $message_read['massage'];

            //Unset all
            unset($_SESSION['pin_on_valid']);
            unset($_SESSION['pin_onyeka_valid']);

            //Deletet the session cookie from browser
            $name = session_name();
            $expire = strtotime('-1 year');
            $params = session_get_cookie_params();
            $path = $params['path'];
            $domain = $params['domain'];
            $secure = $params['secure'];
            $httponly = $params['httponly'];

            setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
            

        }
        elseif(isset($_SESSION['application_for']) && $_SESSION['application_for'] == 'Secondary')
        {
            $sectionId = Catalog::GetDepartmentId($_SESSION['application_for']);
            $message_read = Applicant::GetAdmissionMessages($sectionId);

            $this->mSubject_1 = $message_read['subject_1'];
            $this->mSubject_2 = $message_read['subject_2'];
            $this->mSubject_3 = $message_read['subject_3'];
            $this->mEntranceExamDate = $message_read['entrance_exam_date'];
            $this->mOralInterviewDate = $message_read['oral_interview_date'];
            $this->mAdmissionStartsDate = $message_read['admission_starts'];
            $this->mAdmissionClosesDate = $message_read['admission_closes'];
            $this->mDatabaseMessage = $message_read['massage'];

            unset($_SESSION['pin_on_valid']);
            unset($_SESSION['pin_onyeka_valid']);
            //Deletet the session cookie from browser
            $name = session_name();
            $expire = strtotime('-1 year');
            $params = session_get_cookie_params();
            $path = $params['path'];
            $domain = $params['domain'];
            $secure = $params['secure'];
            $httponly = $params['httponly'];

            setcookie($name, '', $expire, $path, $domain, $secure, $httponly);

        }



        if($this->mDeletApplicationSessions == true && isset($_POST['exit_page']))
        {
            //Delete all session used by application modules
          unset($_SESSION['show_onyeka_form']);
          unset($_SESSION['pin_on_valid']);
          unset($_SESSION['pin_onyeka_valid']);
          unset($_SESSION['cur_user_id']);
          unset($_SESSION['form_part']);
          unset($_SESSION['cur_user_email']);
          unset($_SESSION['user_fname']);
          unset($_SESSION['user_lname']);
          $_SESSION = array();
          session_destroy();

          //Deletet the session cookie from browser
          $name = session_name();
          $expire = strtotime('-1 year');
          $params = session_get_cookie_params();
          $path = $params['path'];
          $domain = $params['domain'];
          $secure = $params['secure'];
          $httponly = $params['httponly'];

          setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
          
          $redirect_to = Link::ToIndex();
          header('Location: ' . $redirect_to);
          exit;
          


        }

    }
}
?>