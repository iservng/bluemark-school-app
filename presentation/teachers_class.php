<?php 

class TeachersClass
{
    /*
    Public memebers availabe to smarty template engine
    */
    public $mSiteUrl;
    public $mToTeachersClassPage;
    public $mlinkToLogout;
    public $mStaffLogged;
    public $mStaff;
    public $mStaffName;
    public $mCurrentTerm;
    public $mLinkToTeacherPage;

    public $mTimezone;
    public $mTodaysDate;
    public $mWeekValues;
    public $mIsWeekName;

    public $mThisWeekStart;
    public $mThisWeekEnds;
    public $mIsWeekNameErr;

    public $mClassId;
    public $mClassName;
    public $mDepartmentId;
    public $mDepartmentName;
    public $mContentCell = 'blank.tpl';

    public $mStudentToClassEmailError = 0;
    public $mStudentEmailErrorMsg;
    public $mStudentToClassEmail;
    public $mRegistrationNumber;
    public $mClass_name;
    public $mErrorMessage;
    public $mConfirmationHeading;
    public $mConfirmationMessage;
    public $mLinkToClassList;
    public $mListClassId;
    public $mConfirmatoryList;
    public $mConfirmatoryListCount;
    public $mTeacherCanRegister = false;
    public $mTerm;
    public $mLinkToDeleteStudent;
    public $mFullyTrue = false;
    public $mTermId;
    public $mIdToDelete;
    public $mAllSubjects;
    public $mSubjectsIds;
    public $mSubjectOfferedBySpecificClass;
    // alreadytotal($classId)
    public $mLinkToListOutSubject;
    public $mTodaysDateForAttendance;
    public $mStudentIdz;
    public $mSchoolSession;
    public $mTodaysAttendanceStatus;
    public $mShowMorningButton = false;
    public $mShowAfternoonButton = false;
    public $mIsAttendanceOk = false;
    public $mAttendanceValues;
    public $mTodaysPercentage;
    public $mWeeklyPercentagez;
    public $mWeeklyTotals;
    public $mEachStudentWkTotal;
    public $mEachStudentAttTotalCount;
    public $mTodaydateId;
    public $thisTermStarted;
    public $thisTermEnds;
    public $mWeekValuesid;
    public $prviousData;
    public $mCurrentTermId;
    public $current_year;
    public $mTodaysPercentageCount;
    public $currentTotal;
    public $mPercentRecordId;
    public $mShowAttendanceReportBtn = false;

    //Some Checking 
    public $mMaleClassCount;
    public $mFemaleClassCount;


    public $mTermHasEnded = false;
    public $mDateAttendanceTermStarted;
    public $mDateAttendanceTermEnds;

    //Below can be deleted 
    public $as_is;
    public $yearonly;
    public $mCsrfToken;

    //First CA Items 
    public $mCsrffirstca;
    public $mShowYesSubmitBtn = false;
    public $mSubjectId;
    public $mStudentScores;
    public $mShowCaLinks = false;
    public $mStudentName;
    public $mEditFirstCa = false;
    public $mEditSecondCa = false;
    public $mEditThirdCa = false;
    public $mEditExams = false;
    public $mTeacherStudentDetail;

    public $mClassName_current;
    public $mClassName_admited;
    public $mPassportUrl;
    public $mProfilePassport;
    public $mProgressComfirm = false;

    //LESSON PLAN mTopicError
    public $mInstructionalImagesError = false;
    public $mTopicError = false;
    public $mBehaviouralObjError = false;
    public $mInstructionalMtrError = false;
    public $mMethodologyError = false;
    public $mPreviouseKnowledgeError = false;
    public $mGenderError = false;

    public $mIntroductionError = false;
    public $mIntroNoteError = false;
    public $mDefinitionNoteError = false;
    public $mSubTopic_1Error = false;
    public $mSubTopic_1_bodyError = false;
    public $mSubTopic_2Error  = false;
    public $mSubTopic_2_bodyError = false;
    public $mSubTopic_3Error = false;
    public $mSubTopic_3_bodyError = false; 
    public $mSummaryError = false;
    public $mSummary_bodyError = false;
    public $mLP2FErrors = false;

    public $mStudentsActivitiesError = false;
    public $mEvaluationError = false;
    public $mLessonPlanSummaryError = false;
    public $mConclusionError = false;
    public $mAssignmentError = false;
    public $mReferencesError = false;
    public $mEditingLessonNote = false;
    public $mLessonNoteEditError = false;
    public $mIsPublished = false;
    public $mConfirmatoryListErrMsg = false;
    public $mGetStudentCaExamsRecordsCount = 0;
    public $mCaTypes = array('First CA', 'Second CA', 'Third CA', 'Exams');


    /*
    private memebers 
    */
    private $_mErrors = 0;
    /*
    class constructor
    */
    public function __construct()
    {
        
        $this->mSiteUrl = Link::Build('', 'https');
        //Make sure its loaded through sure channel if neccessary
         //Enforce page to be accesse through HTTPS if USE_SSL is on
        if(USE_SSL == 'yes' && getenv('HTTPS') != 'on')
        {
            header('Location: https://' . getenv('SERVER_NAME') . getenv('REQUEST_URI'));
            exit();
        }

        //Make sure the user is an authenticated staff
        if(!isset($_SESSION['staff_admin_logged']))
        {
            //Redirect the user to the main page 
            $redirect_to = $this->mSiteUrl;
            header('Location: ' . $redirect_to);
            exit();
        }

        //The logout logic 
        if(isset($_GET['Page']) && ($_GET['Page'] == 'Logout'))
        {
            // unset($_SESSION['admin_logged']);
            unset($_SESSION['staff_admin_logged']);
            header('Location: ' . $this->mSiteUrl);
            exit();
        }

        /*
        ToListOutSubject($classId)
        */
        

        $this->mlinkToLogout = Link::ToLogoutStaff();
        $this->mToTeachersClassPage = Link::ToTeachersClassPage();

        //Get the details of this staff who is logged
        $this->mStaff = Customer::GetTeacherUserInfo((int)$_SESSION['schoolshop_staff_id']);
        $this->mStaffName = ucwords(strtolower($this->mStaff['name']));

        //What term is it 
        $this->mTerm = Teachers::GetCurrentTerm();
        $this->mCurrentTerm = trim($this->mTerm['current_term']);
        $this->mLinkToTeacherPage = Link::ToTeachersClassPage();


        /**CheckAttendanceStatus
         * We shall call for the complete list of all the schools's subject 
         * so that teacher can select fron it when adding subject to the class
         */
        $this->mAllSubjects = Teachers::GetAllSubjects();
        $this->mAllSubjectsCount = count($this->mAllSubjects);


        /**
         * We shall grab what the current admission session is
         */
        $this->mSchoolSession = Teachers::GetCurrentAdmissionSession();


        /**
         * We shall start building the cross site request forgery functionality
         */
        if(empty($_SESSION['key']))
            $_SESSION['key'] = bin2hex(random_bytes(32));
        
        $this->mCsrfToken = hash_hmac('sha256', 'Protect sina csrf attack: class_members_box.tpl', $_SESSION['key']);

        $this->mCsrffirstca = hash_hmac('sha256', 'Protect sina csrf attack: add_first_ca.tpl', $_SESSION['key']);
    
        

        /**
         * Get the id of the term whos name = this->mCurrentTerm mClass_name
         */
        $this->mTermId = Teachers::GetCurrentTermIdByName($this->mCurrentTerm);
        $this->mCurrentTermId = (int)$this->mTermId['term_id'];

        if(isset($_GET['ClassList']))
            $this->mListClassId = (int)filter_input(INPUT_GET, 'classListId', FILTER_VALIDATE_INT);
        

        /*
        What classes assign to this teacher
        */
        $this->mAssignedClasses = Teachers::GetTeacherAssignedClasses((int)$_SESSION['schoolshop_staff_id']);

        //Remove spaces in the class name to avoid unwanted errors in the UI
        for($i=0; $i < count($this->mAssignedClasses); $i++) { 
            $this->mCl = str_replace(' ', '', $this->mAssignedClasses[$i]['class_name']);
        }
    

        for ($i=0; $i < count($this->mAssignedClasses); $i++) { 
            $this->mAssignedClasses[$i]['list_out_link'] = Link::ToListOutSubject($this->mAssignedClasses[$i]['class_id']);
        }

        for ($i=0; $i < count($this->mAssignedClasses); $i++) { 
            $this->mAssignedClasses[$i]['list_out_members'] = Link::ToListOutClassMembers($this->mAssignedClasses[$i]['class_id']);
        }

         /*
        The code below has all its takes to retrieve the subjects that are assigned to this current class
        ==========================================================
        */

        for ($i=0; $i < count($this->mAssignedClasses); $i++) { 
            $this->mAssignedClasses[$i]['list_of_subjects'] = Teachers::GetAllSubjectsForASpecifiedClass($this->mAssignedClasses[$i]['class_id']);
            if(!empty($this->mAssignedClasses[$i]['list_of_subjects']))
                $this->mShowYesSubmitBtn = true;
        }
        // =====================================================




        $this->mTimezone = date_default_timezone_get();
        if($this->mTimezone != 'Africa/Lagos')
        {
            date_default_timezone_set('Africa/Lagos');

            //Get the todays date logic 
            $mTodaysDate = new DateTime();
            $this->mTodayDate = $mTodaysDate->format('Y-m-d');

            $this->mTodayDate4Display = $mTodaysDate->format('l, F d, Y');


            $this->mTodayDate4Report = $mTodaysDate->format('d-m-Y');
            $this->current_year = $mTodaysDate->format('Y');


            /**
             * The todays date will be checked to ensure that its stored and no duplicate in the todays_date table, after which the todaysdateid is returned.
             * But we must not add the date on week-ends to make it easy to calculate the total-number-of-times-school-was-open 
             */
            if(DateWeek::IsDateWeekend($this->mTodayDate) == false)
                $this->mTodaydateId = Teachers::AddTodaysDate($this->mTodayDate);
            
                

            $termStartId = 1;
            $termEndId = 15;

            $this->mDateAttendanceTermStarted = Teachers::GetAttendanceStartOrEndDate($termStartId);

            $this->thisTermStarted = $this->mDateAttendanceTermStarted['week_start'];
            

            $this->mDateAttendanceTermEnds = Teachers::GetAttendanceStartOrEndDate($termEndId);
            $this->thisTermEnds = $this->mDateAttendanceTermEnds['week_stop'];

            //Convert todays date to timestamp 
            $today_timestamp = strtotime($this->mTodayDate);
            //Convert the term start date to timestamp 
            $term_start_date = strtotime($this->thisTermStarted);
            //Convert the term end date to timestamp 
            $term_end_date = strtotime($this->thisTermEnds);

            //Impliement the logic 
            if($term_start_date <= $today_timestamp )
                $_SESSION['within_start_date'] = true;


            if($term_end_date >= $today_timestamp)
                $_SESSION['within_end_date'] = true;  



            //We will run it against the weeks table to determine what week it belongs to 
            $this->mWeekValues = Teachers::GetWeekInfo($this->mTodayDate);
            if(count($this->mWeekValues > 0))
            {
                $this->mIsWeekName = $this->mWeekValues['week_what'];
                $this->mThisWeekStart = 'Week start <b style="color: #1087dd;">'.$this->mWeekValues['week_start']. '</b>';
                $this->mThisWeekEnds = 'Week ends <b style="color: #1087dd;">'.$this->mWeekValues['week_stop'].'</b>';
                $this->mThisWeeksId = $this->mWeekValues['weeks_and_dates_id'];
            } 
            else 
                $this->mIsWeekNameErr = 'Weeks Information not set';
        }
        else 
        {
            //This means the date time zone is set to Africa Lagos
            //Get the todays date logic 
            $mTodaysDate = new DateTime();
            $this->mTodayDate = $mTodaysDate->format('Y-m-d');
            $this->mTodayDate4Display = $mTodaysDate->format('l, F d, Y');
            $this->mTodayDate4Report = $mTodaysDate->format('d-m-Y');
            $this->current_year = $mTodaysDate->format('Y');


            if(DateWeek::IsDateWeekend($this->mTodayDate) == false)
                $this->mTodaydateId = Teachers::AddTodaysDate($this->mTodayDate);



            $termStartId = 1;
            $termEndId = 15;


            $this->mDateAttendanceTermStarted = Teachers::GetAttendanceStartOrEndDate($termStartId);

            $this->thisTermStarted = $this->mDateAttendanceTermStarted['week_start'];
            

            $this->mDateAttendanceTermEnds = Teachers::GetAttendanceStartOrEndDate($termEndId);
            $this->thisTermEnds = $this->mDateAttendanceTermEnds['week_stop'];

            //Convert todays date to timestamp 
            $today_timestamp = strtotime($this->mTodayDate);

            //Convert the term start date to timestamp 
            $term_start_date = strtotime($this->thisTermStarted);

            //Convert the term end date to timestamp 
            $term_end_date = strtotime($this->thisTermEnds);

            //Impliement the logic 
            if($term_start_date <= $today_timestamp )
                $_SESSION['within_start_date'] = true;


            if($term_end_date >= $today_timestamp)
                $_SESSION['within_end_date'] = true; 
            


            //We will run it against the weeks table to determine what week it belongs to 
            $this->mWeekValues = Teachers::GetWeekInfo($this->mTodayDate);
            

            if($this->mWeekValues && count($this->mWeekValues) > 0)
            {
                $this->mIsWeekName = $this->mWeekValues['week_what'];
                $this->mThisWeekStart = 'Week start: <b style="color: #999;">'.$this->mWeekValues['week_start'].'</b>';

                $this->mThisWeekEnds = 'Week ends: <b style="color: #999;">'.$this->mWeekValues['week_stop'].'</b>';
                $this->mThisWeeksId = $this->mWeekValues['weeks_and_dates_id'];
            }
            else 
                $this->mIsWeekName = 'Weeks Information not set. <span style="color: red;">The new term start date must be set by admin unit.</span>';

        }






        


















        /**
         * This section of logic below starts the process of collection and validating information needeed  to add student to a class
         * 
         */
        if(isset($_POST['requestToAddEmail']))
        {

            //We also want to make sure that the email is in the applicants table and that the admission status is admitted.
            
            $this->mClassId = (int)filter_input(INPUT_POST, 'whatClassId', FILTER_VALIDATE_INT);
            $this->mClassName = filter_input(INPUT_POST, 'whatClassName', FILTER_SANITIZE_STRING);
            $this->mDepartmentId = (int)filter_input(INPUT_POST, 'departmentId', FILTER_VALIDATE_INT);
            $this->mDepartmentName = filter_input(INPUT_POST, 'departmentName', FILTER_SANITIZE_STRING);
            $_SESSION['classId'] = $this->mClassId;
            $_SESSION['departmentName'] = $this->mDepartmentName;
            $_SESSION['className'] = $this->mClassName;

            //validat the email supplied by the student 
            if(!isset($_POST['addStudentToClassEmail']) || empty($_POST['addStudentToClassEmail']))
            {
                $this->mStudentToClassEmailError = 1;
                $this->_mErrors++;
                $this->mStudentEmailErrorMsg = 'ERROR: Unrecognized Email, please check and try again'. '<span>&nbsp;</span> <span>&nbsp;</span> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-primary btn-xs"> Got It</a>';

            }
            elseif(!$this->mWeekValues)
            {
                $this->mStudentToClassEmailError = 1;
                $this->_mErrors++;
                $this->mStudentEmailErrorMsg = 'ERROR: Term has ended, please contact admin to set new term start date'. '<span>&nbsp;</span> <span>&nbsp;</span> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-primary btn-xs"> Got It</a>';
            }
            else 
            {
                
                $validate = new Validate();
                $fields = $validate->getFields();

                $fields->addField('addStudentToClassEmail');
                $validate->email('addStudentToClassEmail', filter_input(INPUT_POST, 'addStudentToClassEmail'));

                if($fields->hasErrors())
                {

                    $this->mStudentToClassEmailError = 1;
                    $this->_mErrors++;
                    $this->mStudentEmailErrorMsg = 'ERROR: Unrecognized Email, please check and try again' . '<span>&nbsp;</span> <span>&nbsp;</span> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-primary btn-xs"> Got It</a>';

                }
                else 
                {
                    /**
                     * Here means that the email of the student to be added to the class in which the teacher is handling is ok. Then the email is used to retrieve information about the student from the applicants table in the database.
                     */

                    $_SESSION['toAddstudentInfo'] = Teachers::GetStudentInfoByEmail(filter_input(INPUT_POST, 'addStudentToClassEmail', FILTER_VALIDATE_EMAIL));

                    if(empty($_SESSION['toAddstudentInfo']['applicants_id']) || !($_SESSION['toAddstudentInfo']['status'] === 'Admitted'))
                    {

                        $this->mStudentToClassEmailError = 1;                 
                        $this->_mErrors++;
                        $this->mStudentEmailErrorMsg = 'ERROR: Unrecognized Email or unprocessed admission, please check with Admin and try again' . '<span>&nbsp;</span> <span>&nbsp;</span> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-primary btn-xs"> Got It</a>';
                        unset($_SESSION['toAddstudentInfo']);

                    }
                    else 
                        $this->mStudentToClassEmail = filter_input(INPUT_POST, 'addStudentToClassEmail', FILTER_VALIDATE_EMAIL);

                }
                    
            }
            
        }
        //Start collecting and validating for the insertion of subjects in classes










        //VALIDATION FOR THE LESSON PLAN SELECT SUBJECT MENU 
        if(isset($_POST['addLessonPlan']))
        {
            //collect all the important parameter in a local variable 
            $this->mClassAction = filter_input(INPUT_POST, 'ClassAction', FILTER_SANITIZE_STRING);
        
            //Start validating 
            if(!hash_equals($this->mCsrffirstca, $_POST['csrffirstca']))
            {
                //Meaning the page is submitted by an attacker confirmatory_topic
                $this->mErrorMessage = 'The page submitted is unknown to the system. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';

                $this->_mErrors++;
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!$this->mClassAction || $this->mClassAction !== 'writelessonplan')
            {
                //Meaning that clas action was not set 
                $this->mErrorMessage = 'Unknown class action  found,  please exit and try again. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';

                $this->_mErrors++;
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!isset($_POST['ClassActionId']) || !is_numeric($_POST['ClassActionId']) || empty($_POST['ClassActionId']))
            {
                //Meaning that clas id was not set 
                $this->mErrorMessage = 'Class ID not found, please exit and try again. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';

                $this->_mErrors++;
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!isset($_POST['subject_id']) || !is_numeric($_POST['subject_id']) || empty($_POST['subject_id']))
            {
                //Meaning that subject id was not set 
                $this->mErrorMessage = 'Subject ID not found, please exit and try again. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';

                $this->_mErrors++;
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!isset($_POST['confirmatory_topic_' . $_POST['subject_id']]) || empty($_POST['confirmatory_topic_' . $_POST['subject_id']]))
            {
                $this->mErrorMessage = 'Enter the subject topic, and try again. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';

                $this->_mErrors++;
                $this->mContentCell = 'warning_box.tpl';

            }
            else
            {
                
                $pattern = '/^[a-zA-Z0-9\s\.,-]{3,70}$/';

                if(preg_match($pattern, $_POST['confirmatory_topic_' . $_POST['subject_id']]) === 1)
                {

                    $this->mClassId = (int)filter_input(INPUT_POST, 'ClassActionId', FILTER_VALIDATE_INT);
                    $_SESSION['mClassId'] = $this->mClassId;
                    $this->mSubjectId = (int)filter_input(INPUT_POST, 'subject_id', FILTER_VALIDATE_INT);
                    $_SESSION['mSubjectId'] = $this->mSubjectId;

                    $this->mConfirmatoryTopic = ucwords(trim(filter_input(INPUT_POST, 'confirmatory_topic_' . $_POST['subject_id'], FILTER_SANITIZE_STRING)));
                    $_SESSION['mSubjectTopic'] = $this->mConfirmatoryTopic;

                }
                else
                {
                    $this->mErrorMessage = 'Enter valid subject topic, and try agin. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';

                    $this->_mErrors++;
                    $this->mContentCell = 'warning_box.tpl';
                }
                
            }

        }//(end)->VALIDATION FOR THE LESSON PLAN SELECT SUBJECT MENU

    
    } 





    

    public function init()
    {
        /**DateWeek::IsDateWeekend
         * The logic below is used to say that its the continuation of the logic for adding student to a class above. It generates the registration umber for the student 
         * and stores it in a session-variable 
         * 
         * The information of the student to be added, which was retrieved in the logic above is also stored in a session-variable and used in inside here below.
         */
        if(isset($_POST['requestToAddEmail']) && $this->_mErrors == 0)
        {
            //We shall generate the registration number for the student so that it can be added to his or her class records table confirmStudentBtn
            $this->mRegistrationNumber = StringGen::GenAdmissionNumber(6).'/'.$_SESSION['toAddstudentInfo']['applicants_id'].'/'.$_SESSION['toAddstudentInfo']['miSeconds'];

            $_SESSION['reg_num'] = $this->mRegistrationNumber;
            $this->mStudentToAddInfo = $_SESSION['toAddstudentInfo'];

            /*
                Getting the class name from applicant table using the ID from class_assigned column 
            */
            $classname = Customer::GetClassNameById($_SESSION['toAddstudentInfo']['class_assigned']);
            $this->mClass_name = $classname['class_name'];

            $_SESSION['class_name'] = $this->mClass_name;

            $this->mContentCell = 'add_student_box.tpl';

        }













        //Logic that validaes the process of actually adding the student to class record table
        if(isset($_POST['confirmStudentBtn']))
        {
            /*
                Before we get on with any operation we must make sure the department name from the applicants table is same with the department name form the
            */ 
            if(trim($_SESSION['departmentName']) != trim($_SESSION['toAddstudentInfo']['section']))
            {

                $this->mErrorMessage = $_SESSION['departmentName'].' = '.$_SESSION['toAddstudentInfo']['section'].' The student should be added to ' . $_SESSION['toAddstudentInfo']['class_assigned'] . ' in the ' . $_SESSION['toAddstudentInfo']['section'] . ' section/department' . '<br><br> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-success"> Got It </a>';

                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = ' The term has ended, please contact admin to set new term start date' . '<br><br> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-success"> Got It </a>';

                $this->mContentCell = 'warning_box.tpl';
            }
            else 
            {
                /**
                * We need to also ensure that this teacher is registering children into class or classes assigned to her or him
                */
                for ($i = 0; $i < count($this->mAssignedClasses); $i++) 
                {
                    if($this->mAssignedClasses[$i]['class_id'] == $_SESSION['toAddstudentInfo']['class_assigned'])
                    {
                        $this->mTeacherCanRegister = true;
                    
                    }
                }

                if(!$this->mTeacherCanRegister)
                {
                    $this->mErrorMessage = 'You cannot register a student into this class, you can only register students into class assigned to you! .' . '<br><br> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-success"> Got It </a>';
                    //if the teacher is not assigned to the class that is given to the student
                    $this->mContentCell = 'warning_box.tpl';
                    
                }
                else 
                {
                    /**
                     * STEP1 
                     * First the student ID id registered into the active_class table of the databes, this is important because 
                     * 
                     * CORRECTIONS
                     * ---------------
                     * Friday, 22nd May 2020
                     * 
                     */


                    Teachers::RegisterStudentsActiveClass($_SESSION['classId'], $_SESSION['toAddstudentInfo']['applicants_id'], $this->mSchoolSession['session_date'], $this->mCurrentTerm);

                    //Insert the registration number 
                    Teachers::InsertRegistrationNumber($_SESSION['reg_num'], $_SESSION['toAddstudentInfo']['applicants_id']);

                    //uNDONE 
                    //SEND THE STUDENT HIS OR HER ADMISSION LETTER
                    $this->mLinkToClassList = Link::ToTeachersClassList($_SESSION['classId']);

                    $this->mConfirmationHeading = $_SESSION['toAddstudentInfo']['firstname'].' '.$_SESSION['toAddstudentInfo']['surname'];

                    $this->mConfirmationMessage = 'Student registered successfuly into ' .$_SESSION['class_name'] .', ' . ' <br><br> <a href="'.$this->mLinkToClassList.'" class="btn btn-outline btn-success"> VIEW LIST </a>';

                    $this->mContentCell = 'confirmed_box.tpl';
                    
                }

            } 

        }//End of the confirmStudentBtn












        /**
        * The logic that list out the student of a specified class
        * this logic should by default list acurately all the members of a class that a *teacher is signed-in-to. This means that the teacher is already in a particular class which was assigned to him by the admin during his employment
         */
        if(isset($_GET['ClassList']) && isset($_GET['ClassAction']) && $_GET['ClassAction'] == 'List')
        {

            $classname = Customer::GetClassNameById($_SESSION['toAddstudentInfo']['class_assigned']);
            $this->mClass_name = $classname['class_name'];
            
            $active_status = 1; 

            $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mListClassId, $this->mCurrentTerm, $active_status);

            /** Friday 22 May 2020
             * The class ID is known (Teacher is signed in to a class)
             * The current Term is known (App reads it from the database)
             * Active status is or must be positive ie 1 
             */

            $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
            $this->mContentCell = 'class_box.tpl';
        }








        /**
         * The logic that deletes student from a specified class
         */
        if(isset($_GET['deleteStudentBtn']) && isset($_GET['ClassAction']) && $_GET['ClassAction'] == 'DeleteStudent')
        {

            if(!$_GET['ClassActionId'])
            {
                $this->mErrorMessage = 'Please select class from which to be deleted.' . '<br><br> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-success"> Got It </a>';
                //if the teacher is not assigned to the class that is given to the student
                $this->mContentCell = 'warning_box.tpl';
            } 
            else 
            {
                $this->mClassId = (int)filter_input(INPUT_GET, 'ClassActionId', FILTER_VALIDATE_INT);

                $_SESSION['deleteId'] = $this->mClassId;

                $classname = Customer::GetClassNameById($this->mClassId);
                $this->mClass_name = $classname['class_name'];

                $active_status = 1;

                //We need a list of people from this class specified above 
                $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                $this->mContentCell = 'class_box_delete.tpl';

            }

        }







        if(isset($_POST['todeleteListBtn']))
        {

            if(!isset($_POST['todeleteStudenIds']))
            {
                $this->mErrorMessage = 'Please select student be deleted.' . '<br><br> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-success"> Got It </a>';
                //if the teacher is not assigned to the class that is given to the student
                $this->mContentCell = 'warning_box.tpl';

            }
            else 
            {
                //We shall first collect the ids of the students to delete view_record
                $this->mIdToDelete = $_POST['todeleteStudenIds'];

                 //we shall call the funcion that deletes the students from the active_table list
                $active_zero = 0;
                foreach ($this->mIdToDelete as $key => $studentId) {
                    Teachers::MarkActiveStatusToZero($active_zero, (int)$studentId);
                }

                //After we re done setting the active_status to zero 
                $this->mClassId = $_SESSION['deleteId'];
                $classname = Customer::GetClassNameById($this->mClassId);
                $this->mClass_name = $classname['class_name'];

                $active_status = 1;

                //We need a list of people from this class specified above 
                $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                $this->mContentCell = 'class_box_delete.tpl';

            }

        }










        if(isset($_POST['addSubjectBtn']) && isset($_POST['ClassAction']) && $_POST['ClassAction'] === 'AddSubject') 
        {
            if(!isset($_POST['subjectId']) || count($_POST['subjectId']) <= 0)
            {

                $this->mErrorMessage = 'Please select subject(s) to be added to ' . $_POST['Class_name'] . '<br><br> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-success"> Got It </a>';
                //if the teacher is not assigned to the class that is given to the student
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'Subject(s) must not be added after the term has ended <br><br> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-success"> Got It </a>';
                //if the teacher is not assigned to the class that is given to the student
                $this->mContentCell = 'warning_box.tpl';

            }
            else
            {
                // We must ensure that its imposible to add subject after the term has ended

                //GRAB THE SUBJECTS IDS
                $this->mSubjectsIds = $_POST['subjectId'];
                $this->mClassId = (int)filter_input(INPUT_POST, 'ClassToAddSubjectId', FILTER_VALIDATE_INT);

                $_SESSION['delete_classid'] = $this->mClassId;

                $this->mClassName = filter_input(INPUT_POST, 'Class_name', FILTER_SANITIZE_STRING);

                $_SESSION['delete_classname'] = $this->mClassName;

                //Call the business tier function that will add these to the database 
                foreach ($this->mSubjectsIds as $key => $value) {
                    Teachers::AddSubjectsToClass($this->mClassId, (int)$value);
                }

                //After we have finished inserting thee ids we need the function to read it for the purpose of display 
                $this->mSubjectOfferedBySpecificClass = Teachers::GetAllSubjectsForASpecifiedClass($this->mClassId);
                $this->mClassSubjectCount = count($this->mSubjectOfferedBySpecificClass);

                for ($i = 0; $i < count($this->mSubjectOfferedBySpecificClass); $i++) { 
                    $this->mSubjectOfferedBySpecificClass[$i]['link_delete_subject'] = Link::ToTeacherDeleteSubject($this->mSubjectOfferedBySpecificClass[$i]['subject_id'], $this->mClassId);
                }

                //The subjects which are specific for the specified class will then be shown as a feed back for the user to see 
                
                $this->mContentCell = 'class_subject_box.tpl';


            }
        } 







        /**
         * The logic that deletes a subject from the class
         */
        if(isset($_GET['ClassAction']) && $_GET['ClassAction'] === 'DeleteSubject') 
        {
            if(!isset($_GET['SubjectId']))
            {
                $this->mErrorMessage = 'Please select subject(s) to be deleted from ' . $_SESSION['delete_classname'] . '<br><br> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-success"> Got It </a>';
                //if the teacher is not assigned to the class that is given to the student
                $this->mContentCell = 'warning_box.tpl';
            }
            else 
            {

                //Get the id from the submitted form to know what action to perform
                $this->mSubjectsIds = (int)filter_input(INPUT_GET, 'SubjectId', FILTER_VALIDATE_INT);

                $this->mClassId = (int)filter_input(INPUT_GET, 'ClassId', FILTER_VALIDATE_INT);
                
                //We shall then use the subject id as a parameter of a function that deletes the subject (change the subjects_status field to 0)
                // Teachers::DeleteSubjectFromClass($this->mSubjectsIds, $this->mClassId);

                //After we had deleted the specified sujec from the class, we shall re-render the box for list of subjects 
                //After we have finished inserting thee ids we need the function to read it for the purpose of display 
                $this->mSubjectOfferedBySpecificClass = Teachers::GetAllSubjectsForASpecifiedClass($this->mClassId);
                $this->mClassSubjectCount = count($this->mSubjectOfferedBySpecificClass);

                for ($i = 0; $i < count($this->mSubjectOfferedBySpecificClass); $i++) { 
                    $this->mSubjectOfferedBySpecificClass[$i]['link_delete_subject'] = Link::ToTeacherDeleteSubject($this->mSubjectOfferedBySpecificClass[$i]['subject_id'], $this->mClassId);
                }

                //The subjects which are specific for the specified class will then be shown as a feed back for the user to see 
                $this->mContentCell = 'class_subject_box.tpl';

            }
            

        }







        /**
         * The logic that list out subjects at any given time 
         */

        if(isset($_GET['ClassAction']) && $_GET['ClassAction'] === 'ListOutSubject') 
        {

            if(!isset($_GET['ClassId']) || empty($_GET['ClassId']))
            {
                $this->mErrorMessage = 'Please select class to be displayed ' . '<br><br> <a href="'.$this->mLinkToTeacherPage.'" class="btn btn-outline btn-success"> Got It </a>';
                //if the teacher is not assigned to the class that is given to the student
                $this->mContentCell = 'warning_box.tpl';
            }
            else 
            {
                
                //Grab the class id submitted 
                $this->mClassId = (int)filter_input(INPUT_GET, 'ClassId', FILTER_VALIDATE_INT);
                $ClassName = Customer::GetClassNameById($this->mClassId);
                $this->mClassName = $ClassName['class_name'];

                // Grab the subjects for a particular class 
                $this->mSubjectOfferedBySpecificClass = Teachers::GetAllSubjectsForASpecifiedClass($this->mClassId);
                $this->mClassSubjectCount = count($this->mSubjectOfferedBySpecificClass);

                for ($i = 0; $i < count($this->mSubjectOfferedBySpecificClass); $i++) { 
                    $this->mSubjectOfferedBySpecificClass[$i]['link_delete_subject'] = Link::ToTeacherDeleteSubject($this->mSubjectOfferedBySpecificClass[$i]['subject_id'], $this->mClassId);
                }

                
                //The subjects which are specific for the specified class will then be shown as a feed back for the user to see 
                $this->mContentCell = 'class_subject_box.tpl';

            }

        }









        /**
         * The logic that list of the class members at any time for teachers viewing 
         */
        if(isset($_GET['ClassAction']) && $_GET['ClassAction'] === 'StudentList') 
        {
            //Checking if the id of the class is set 
            if(!isset($_GET['ClassId']))
            {

                $this->mErrorMessage = 'Please select class to be displayed ' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Got It </a>';
                $this->mContentCell = 'warning_box.tpl';

            }
            else 
            {

                $this->mClassId = (int)filter_input(INPUT_GET, 'ClassId', FILTER_VALIDATE_INT);
                $_SESSION['class_listed_id'] = $this->mClassId;

                $classname = Customer::GetClassNameById($this->mClassId);
                $_SESSION['class_name'] = $classname['class_name'];
                $this->mClass_name = $classname['class_name'];

                #Just before we add any scores we need to check and see what has been added
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];
                // var_dump($mDepartmentName);

                $result = Teachers::IsSubjectCaStarted($this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);
                $result = (int)$result['alreadytotal'];

                #So if we have something in the above variable, it means that the CA recordings have started
                if($result > 0)
                    $this->mShowCaLinks = true;

                /**
                 * The logic that control the way that the button for selecting morning and afternoon button
                 * $this->mTodaysAttendanceStatus
                 */

                $this->mTodaysAttendanceStatus = Teachers::CheckAttendanceStatus($this->mClassId, $this->mTodayDate, $this->mCurrentTermId, $this->mTodaydateId);
                //=============================================================
                // var_dump($this->mTodaysAttendanceStatus);

                if(!$this->mTodaysAttendanceStatus)
                {

                    $this->mShowMorningButton = true;
                    $this->mShowAfternoonButton = false;

                }
                elseif($this->mTodaysAttendanceStatus['attendance_status_id'] && !$this->mTodaysAttendanceStatus['morning'] && !$this->mTodaysAttendanceStatus['afternoon'])
                {
                    $this->mShowMorningButton = true;
                    $this->mShowAfternoonButton = false;
                }
                elseif($this->mTodaysAttendanceStatus['attendance_status_id'] && $this->mTodaysAttendanceStatus['morning'] && !$this->mTodaysAttendanceStatus['afternoon'])
                {
                    
                    $this->mShowMorningButton = false;
                    $this->mShowAfternoonButton = true;
                }
                elseif($this->mTodaysAttendanceStatus['attendance_status_id'] && $this->mTodaysAttendanceStatus['morning'] && $this->mTodaysAttendanceStatus['afternoon']) 
                {
                    $this->mShowMorningButton = false;
                    $this->mShowAfternoonButton = false;
                    $this->mIsAttendanceOk = true;
                    $this->mShowAttendanceReportBtn = true;
                    
                }


                $active_status = 1;

                //We need a list of people from this class specified above 
                $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                /**
                 * Count Male and Female
                 */
                $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                $this->mContentCell = 'class_members_box.tpl';

            }
        }
















        /**
         * The logic below will take attendance when the class title name is clicked on, assuming the teacher want to take attendance with the first page
         * 
         *  1. First the logic ensures that the attendace submit button is clicked 
         *  2. it makes sure that the action to be executed is "takeTodaysAttendance".
         * 
         * ==== ABANDONED BELOW================================
         */
        if(isset($_POST['attendanceListBtn']) && isset($_POST['classAttendance_action']) && $_POST['classAttendance_action'] === 'takeTodaysAttendance')
        {

            $this->mClassId = $_SESSION['class_listed_id'];
            $this->mClass_name = $_SESSION['class_name'];

            //Get the department name using the class ID
            $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
            $this->mDepartmentName = $mDepartmentName['department_name'];
            $_SESSION['department_name'] = $this->mDepartmentName;

            //This below logic ensure that a teacher is authorized to register a student into a specified class
            foreach ($this->mAssignedClasses as $key => $tclassId) {
                if((int)$tclassId['class_id'] == (int)$_SESSION['class_listed_id'])
                    $this->mTeacherCanRegister = true;
                
            }
            
            /**
             * Now its pretty sure that TAKE ATTENDANCE IS MEANT
             * Then we begin to check a bunch of other parameter that will ensure attendance is taken correctly
             */
            if(!hash_equals($this->mCsrfToken, $_POST['classAttendance_csrf']) || !isset($_POST['theDaysDate']) || !isset($_SESSION['class_listed_id']))
            {
                /**
                 * The logic above ensues that the page or the form is free of CSRF attack
                 */
                $this->mErrorMessage = 'Unexpected error, please try again!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Got It </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!isset($_SESSION['within_start_date']) || $_SESSION['within_start_date'] != true)
            {
                /**
                 * The logic above ensures that the todays date is not less than the term-start date, else it would mean the admin need to set the date that the current term started 
                 */
                $this->mErrorMessage = 'The term start date has not been set by the admin incharge. Please contact admin and try again!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Got It </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!isset($_SESSION['within_end_date']) || $_SESSION['within_end_date'] != true)
            {
                /**
                 * The logic above ensures that the todays date is not greater than the term-end date, else it would mean the term has ended, so no need to take attendance. 
                 */
                $this->mErrorMessage = 'The term has ended. Please contact admin and try again!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Got It </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!isset($_POST['attendanceStudenIds']) || count($_POST['attendanceStudenIds']) <= 0)
            {
                /**
                 * The logic above ensures that atleast one student has been submitted for attendance taking and that the submitted value is not empty, else it would mean that empty was submitted. 
                 */
                $this->mErrorMessage = 'Please click on the take-attendance check box before submitting!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!$this->mTeacherCanRegister)
            {
                /**
                 * The logic above ensures that the teacher logged-in is authorized to register a student into the specified class.
                 */
                
                $this->mErrorMessage = 'You are not authorized to register a student into this class, please contact admin and try again!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success">Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(DateWeek::IsDateWeekend($this->mTodayDate)) 
            {
                /**
                 * The logic above ensures that the the date of today is not on a week end. 
                 */
                $this->mErrorMessage = 'You are not authorized to register attendance of this class on a weekend, please use working date and try again. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif (!(strtotime($this->mTodayDate) === strtotime($_POST['theDaysDate'])))
            {
                /**
                 * The logic above ensure that the date selectected by the user and the system date for today is the same. 
                 */
                $this->mErrorMessage = 'The date selected does not correspond to todays date, please use working date and try again. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!isset($_POST['maControl']))
            {
                /**
                 * The logic above ensure that the date selectected by the user and the system genarated by the sysem. 
                 */
                $this->mErrorMessage = 'The Attendance for today had already been taken or Morning/Afternoon control is not checked. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            else
            {

                //============================================

                //to write the logic for maControl
                /**
                 * This means all parameter that could cause attendance to be taking wrongly has been 

                * checked and taking care-of 
                 * 1. Determin what term is it
                 * 2. Execute the appropriate function
                 * 3. We shall examine what school-section it is.
                 */

                if($this->mDepartmentName == 'Nursery')
                {
                    /*
                    After we must have determined the school-section, then we shall take note of what term it is, Using switch-statement. The the information be inserted in the NURSERY-FIRST-TERM-ATTENDANCE-TABLE (fn_attendance).
                     */
                    switch ($this->mCurrentTermId) {
                        case 1:
                    // ==============================================
                            # First Term
                            #---------------
                            # Attendance period
                            # class ID
                            $this->mClassId =  $_SESSION['class_listed_id'];
                            $active_status = 1;

                            #This below gives the total number of students in this class 
                            $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                            # The week ID
                            $this->mWeekValuesid = (int)$this->mWeekValues['weeks_and_dates_id'];

                            # Retrieve all submitted students IDs
                            $this->mStudentIdz = filter_input(INPUT_POST, 'attendanceStudenIds', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

                            $this->mAttendanceValues = filter_input(INPUT_POST, 'attendanceValues', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                            
                            # Count the submitted students IDs.
                            $studentInClassCount = count($this->mStudentIdz);

                            #The array to collect the ID of each attendance record
                            $attRecordIds = array();
                            $weeklyTotalIds = array();
                            $studentIdArrInt = array();
                            $attendanceValueInt = array();

                            #Attendance Mark 
                            // $mAttendanceMark = 1;
                            $mAttendanceMark = $_POST['maControl'];
                            $mToday = $_POST['theDaysDate'];

                            # Just before adding the studentids below we shall first convert the student IDs to integer by casting each values.
                            foreach ($this->mStudentIdz as $key => $value) {
                                $studentIdArrInt[$key] = (int)$value;
                            }

                            foreach ($this->mAttendanceValues as $key => $value) {
                                $attendanceValueInt[$key] = (int)$value;
                            }

                            # Call the function to register each attendance details
                            foreach ($studentIdArrInt as $key => $student_id) 
                            {   
                                //1. I can call this same functunction below irrespect of the term or department
                                $attRecordIds[$key] = Teachers::RegisterTodaysAttendance($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$attendanceValueInt[$key], $mAttendanceMark, $this->mDepartmentName);
                                // -----------------------
                                #CALL the function to calculate each students daily total
                                // FROM fn_attendance
                                $this->mWeeklyTotals = Teachers::GetEachStudentWeeklyTotal($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, $this->mDepartmentName);
                                
                                //First grab what have been saved already in the weekly_totals table to see if any record has been entered fo this paricular student ID with the associated parameters 
                                $this->prviousData = Teachers::PreviousStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mCurrentTermId);

                                if($this->prviousData)
                                {

                                    $this->currentTotal = (int)$this->mWeeklyTotals['week_total'] + (int)$this->prviousData['weektotal'];
                                    //fOReach of this ID as in the loop. Record in the weekly_totals table the value returned for each particular studentid
                                    Teachers::UpdateStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->currentTotal);
                                    
                                }
                                else
                                    Teachers::AddStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->mWeeklyTotals['week_total']);

                            }

                            #Retrieve all the attendance totals (of the 15 weeks) from the weekly_totals table. This retrives totals for each student and arrenges them according to student ID. 
                            $this->mEachStudentAttTotal = Teachers::GetEachStudentsWeeklyAttendanceTotal($this->mClassId, $this->mCurrentTermId, $this->current_year, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop']);
                            
                            $this->mEachStudentAttTotalCount = count($this->mEachStudentAttTotal);

                            /*
                                1. Since weekly percentage is calculate every friday for each week, therefor i need a check to ensure that today is friday and that the dates are within the term_start and term_stop date.

                                2. Secondly since attendance is taken twice per day the program needs to ensure that the morning and afternoon attendance has been taken.

                                3.If the two conditions above have been met than the value should be stored in the weekly_percentage table of the database.
                            */
                            
                            if(strtotime($this->mWeekValues['week_stop']) === strtotime($mToday))
                            {

                                $this->mTodaysAttendanceStatus = Teachers::CheckAttendanceStatus($this->mClassId, $this->mWeekValues['week_stop'], $this->mCurrentTermId, $this->mTodaydateId);

                                if(!(empty($this->mTodaysAttendanceStatus['afternoon'])) && ((int)$this->mTodaysAttendanceStatus['afternoon'] == 1))
                                {
                                    $this->mWeeklyPercentagez = Teachers::GetWeeklyPercentageForToday($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop'], $this->mDepartmentName);

                                    /*
                                        Now that we are sure that its the end of the week then we shall record the value for the weeks percentage in the weekly_percentage table of the database. The reason is to make sure that percentage are entered once for every week. That is on fridays.
                                     */
                                    Teachers::AddThisWeeksAttendancePercentage($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_stop'], $this->mWeeklyPercentagez['week_what'], (int)$this->mWeeklyPercentagez['dailypercent']);

                                }

                            }
                            

                            /*
                                Just after the logic above that checks if its friday and adds the weekly percentages only on fridays. This below function also calculates the weekly percentages, then arrenges them according to the weeks after which its presented to the UI for the viewing pleasure of the teacher 
                                ===================================
                            */
                            $this->mAllWeeksPercentage = Teachers::GetAllWeeksPercenatage($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                            $this->mWeeklyPercentagezCount = count($this->mAllWeeksPercentage);
                            
                            //CLASS GENDER COUNT mClass_name
                            // ===================
                            $active_status = 1; 
                            $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);
                            $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                            $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                            
                            $this->mContentCell = 'attendance_success.tpl';
                            
                    // ==============================================================
                            break;

                        case 2:
                            # Second Term
                            #---------------
                            # Attendance period
                            # class ID
                            $this->mClassId =  $_SESSION['class_listed_id'];
                            $active_status = 1;

                            #This below gives the total number of students in this class 
                            $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                            # The week ID
                            $this->mWeekValuesid = (int)$this->mWeekValues['weeks_and_dates_id'];

                            # Retrieve all submitted students IDs
                            $this->mStudentIdz = filter_input(INPUT_POST, 'attendanceStudenIds', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

                            $this->mAttendanceValues = filter_input(INPUT_POST, 'attendanceValues', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                            
                            # Count the submitted students IDs.
                            $studentInClassCount = count($this->mStudentIdz);

                            #The array to collect the ID of each attendance record
                            $attRecordIds = array();
                            $weeklyTotalIds = array();
                            $studentIdArrInt = array();
                            $attendanceValueInt = array();

                            #Attendance Mark 
                            // $mAttendanceMark = 1;
                            $mAttendanceMark = $_POST['maControl'];
                            $mToday = $_POST['theDaysDate'];

                            # Just before adding the studentids below we shall first convert the student IDs to integer by casting each values.
                            foreach ($this->mStudentIdz as $key => $value) {
                                $studentIdArrInt[$key] = (int)$value;
                            }

                            foreach ($this->mAttendanceValues as $key => $value) {
                                $attendanceValueInt[$key] = (int)$value;
                            }

                            # Call the function to register each attendance details
                            foreach ($studentIdArrInt as $key => $student_id) 
                            {   
                                //1. I can call this same functunction below irrespect of the term or department
                                $attRecordIds[$key] = Teachers::RegisterTodaysAttendance($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$attendanceValueInt[$key], $mAttendanceMark, $this->mDepartmentName);
                                
                                #CALL the function to calculate each students daily total
                                // FROM fn_attendance
                                $this->mWeeklyTotals = Teachers::GetEachStudentWeeklyTotal($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, $this->mDepartmentName);
                                
                                //First grab what have been saved already in the weekly_totals table to see if any record has been entered fo this paricular student ID with the associated parameters 
                                $this->prviousData = Teachers::PreviousStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mCurrentTermId);

                                if(!(empty($this->prviousData['weekly_total_id'])))
                                {

                                    $this->currentTotal = (int)$this->mWeeklyTotals['week_total'] + (int)$this->prviousData['weektotal'];
                                    //fOReach of this ID as in the loop. Record in the weekly_totals table the value returned for each particular studentid
                                    Teachers::UpdateStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->currentTotal);
                                    
                                }
                                else
                                    Teachers::AddStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->mWeeklyTotals['week_total']);

                            }

                            #Retrieve all the attendance totals (of the 15 weeks) from the weekly_totals table. This retrives totals for each student and arrenges them according to student ID. 
                            $this->mEachStudentAttTotal = Teachers::GetEachStudentsWeeklyAttendanceTotal($this->mClassId, $this->mCurrentTermId, $this->current_year, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop']);
                            
                            $this->mEachStudentAttTotalCount = count($this->mEachStudentAttTotal);

                            /*
                                1. Since weekly percentage is calculate every friday for each week, therefor i need a check to ensure that today is friday and that the dates are within the term_start and term_stop date.

                                2. Secondly since attendance is taken twice per day the program needs to ensure that the morning and afternoon attendance has been taken.

                                3.If the two conditions above have been met than the value should be stored in the weekly_percentage table of the database.
                            */
                            
                            if(strtotime($this->mWeekValues['week_stop']) === strtotime($mToday))
                            {

                                $this->mTodaysAttendanceStatus = Teachers::CheckAttendanceStatus($this->mClassId, $this->mWeekValues['week_stop'], $this->mCurrentTermId, $this->mTodaydateId);

                                if(!(empty($this->mTodaysAttendanceStatus['afternoon'])) && ((int)$this->mTodaysAttendanceStatus['afternoon'] == 1))
                                {
                                    $this->mWeeklyPercentagez = Teachers::GetWeeklyPercentageForToday($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop'], $this->mDepartmentName);

                                    /*
                                        Now that we are sure that its the end of the week then we shall record the value for the weeks percentage in the weekly_percentage table of the database. The reason is to make sure that percentage are entered once for every week. That is on fridays.
                                     */
                                    Teachers::AddThisWeeksAttendancePercentage($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_stop'], $this->mWeeklyPercentagez['week_what'], (int)$this->mWeeklyPercentagez['dailypercent']);

                                }

                            }
                            

                            /*
                                Just after the logic above that checks if its friday and adds the weekly percentages only on fridays. This below function also calculates the weekly percentages, then arrenges them according to the weeks after which its presented to the UI for the viewing pleasure of the teacher 
                                ===================================
                            */
                            $this->mAllWeeksPercentage = Teachers::GetAllWeeksPercenatage($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                            $this->mWeeklyPercentagezCount = count($this->mAllWeeksPercentage);
                            
                            //CLASS GENDER COUNT mClass_name
                            // ===================
                            $active_status = 1; 
                            $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);
                            $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                            $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                            
                            $this->mContentCell = 'attendance_success.tpl';
                            break;
                        case 3:
                            # Third Term
                            #---------------
                            # Attendance period
                            # class ID
                            $this->mClassId =  $_SESSION['class_listed_id'];
                            $active_status = 1;

                            #This below gives the total number of students in this class 
                            $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                            # The week ID
                            $this->mWeekValuesid = (int)$this->mWeekValues['weeks_and_dates_id'];

                            # Retrieve all submitted students IDs
                            $this->mStudentIdz = filter_input(INPUT_POST, 'attendanceStudenIds', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

                            $this->mAttendanceValues = filter_input(INPUT_POST, 'attendanceValues', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                            
                            # Count the submitted students IDs.
                            $studentInClassCount = count($this->mStudentIdz);

                            #The array to collect the ID of each attendance record
                            $attRecordIds = array();
                            $weeklyTotalIds = array();
                            $studentIdArrInt = array();
                            $attendanceValueInt = array();

                            #Attendance Mark 
                            // $mAttendanceMark = 1;
                            $mAttendanceMark = $_POST['maControl'];
                            $mToday = $_POST['theDaysDate'];

                            # Just before adding the studentids below we shall first convert the student IDs to integer by casting each values.
                            foreach ($this->mStudentIdz as $key => $value) {
                                $studentIdArrInt[$key] = (int)$value;
                            }

                            foreach ($this->mAttendanceValues as $key => $value) {
                                $attendanceValueInt[$key] = (int)$value;
                            }

                            # Call the function to register each attendance details
                            foreach ($studentIdArrInt as $key => $student_id) 
                            {   
                                //1. I can call this same functunction below irrespect of the term or department
                                $attRecordIds[$key] = Teachers::RegisterTodaysAttendance($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$attendanceValueInt[$key], $mAttendanceMark, $this->mDepartmentName);
                                
                                #CALL the function to calculate each students daily total
                                // FROM fn_attendance
                                $this->mWeeklyTotals = Teachers::GetEachStudentWeeklyTotal($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, $this->mDepartmentName);
                                
                                //First grab what have been saved already in the weekly_totals table to see if any record has been entered fo this paricular student ID with the associated parameters 
                                $this->prviousData = Teachers::PreviousStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mCurrentTermId);

                                if(!(empty($this->prviousData['weekly_total_id'])))
                                {

                                    $this->currentTotal = (int)$this->mWeeklyTotals['week_total'] + (int)$this->prviousData['weektotal'];
                                    //fOReach of this ID as in the loop. Record in the weekly_totals table the value returned for each particular studentid
                                    Teachers::UpdateStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->currentTotal);
                                    
                                }
                                else
                                    Teachers::AddStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->mWeeklyTotals['week_total']);

                            }

                            #Retrieve all the attendance totals (of the 15 weeks) from the weekly_totals table. This retrives totals for each student and arrenges them according to student ID. 
                            $this->mEachStudentAttTotal = Teachers::GetEachStudentsWeeklyAttendanceTotal($this->mClassId, $this->mCurrentTermId, $this->current_year, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop']);
                            
                            $this->mEachStudentAttTotalCount = count($this->mEachStudentAttTotal);

                            /*
                                1. Since weekly percentage is calculate every friday for each week, therefor i need a check to ensure that today is friday and that the dates are within the term_start and term_stop date.

                                2. Secondly since attendance is taken twice per day the program needs to ensure that the morning and afternoon attendance has been taken.

                                3.If the two conditions above have been met than the value should be stored in the weekly_percentage table of the database.
                            */
                            
                            if(strtotime($this->mWeekValues['week_stop']) === strtotime($mToday))
                            {

                                $this->mTodaysAttendanceStatus = Teachers::CheckAttendanceStatus($this->mClassId, $this->mWeekValues['week_stop'], $this->mCurrentTermId, $this->mTodaydateId);

                                if(!(empty($this->mTodaysAttendanceStatus['afternoon'])) && ((int)$this->mTodaysAttendanceStatus['afternoon'] == 1))
                                {
                                    $this->mWeeklyPercentagez = Teachers::GetWeeklyPercentageForToday($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop'], $this->mDepartmentName);

                                    /*
                                        Now that we are sure that its the end of the week then we shall record the value for the weeks percentage in the weekly_percentage table of the database. The reason is to make sure that percentage are entered once for every week. That is on fridays.
                                     */
                                    Teachers::AddThisWeeksAttendancePercentage($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_stop'], $this->mWeeklyPercentagez['week_what'], (int)$this->mWeeklyPercentagez['dailypercent']);

                                }

                            }
                            

                            /*
                                Just after the logic above that checks if its friday and adds the weekly percentages only on fridays. This below function also calculates the weekly percentages, then arrenges them according to the weeks after which its presented to the UI for the viewing pleasure of the teacher 
                                ===================================
                            */
                            $this->mAllWeeksPercentage = Teachers::GetAllWeeksPercenatage($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                            $this->mWeeklyPercentagezCount = count($this->mAllWeeksPercentage);
                            
                            //CLASS GENDER COUNT mClass_name
                            // ===================
                            $active_status = 1; 
                            $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);
                            $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                            $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                            
                            $this->mContentCell = 'attendance_success.tpl';
                            break;
                        default:
                            # code...
                            break;
                    }


                }
                elseif($this->mDepartmentName == 'Primary')
                {

                    switch ($this->mCurrentTermId) {
                        case 1:
                            # First Term
                            #---------------
                            # Attendance period
                            # class ID
                            $this->mClassId =  $_SESSION['class_listed_id'];
                            $active_status = 1;

                            #This below gives the total number of students in this class 
                            $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                            # The week ID
                            $this->mWeekValuesid = (int)$this->mWeekValues['weeks_and_dates_id'];

                            # Retrieve all submitted students IDs
                            $this->mStudentIdz = filter_input(INPUT_POST, 'attendanceStudenIds', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

                            $this->mAttendanceValues = filter_input(INPUT_POST, 'attendanceValues', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                            
                            # Count the submitted students IDs.
                            $studentInClassCount = count($this->mStudentIdz);

                            #The array to collect the ID of each attendance record
                            $attRecordIds = array();
                            $weeklyTotalIds = array();
                            $studentIdArrInt = array();
                            $attendanceValueInt = array();

                            #Attendance Mark 
                            // $mAttendanceMark = 1;
                            $mAttendanceMark = $_POST['maControl'];
                            $mToday = $_POST['theDaysDate'];

                            # Just before adding the studentids below we shall first convert the student IDs to integer by casting each values.
                            foreach ($this->mStudentIdz as $key => $value) {
                                $studentIdArrInt[$key] = (int)$value;
                            }

                            foreach ($this->mAttendanceValues as $key => $value) {
                                $attendanceValueInt[$key] = (int)$value;
                            }

                            # Call the function to register each attendance details
                            foreach ($studentIdArrInt as $key => $student_id) 
                            {   
                                //1. I can call this same functunction below irrespect of the term or department
                                $attRecordIds[$key] = Teachers::RegisterTodaysAttendance($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$attendanceValueInt[$key], $mAttendanceMark, $this->mDepartmentName);
                                
                                #CALL the function to calculate each students daily total
                                // FROM fn_attendance
                                $this->mWeeklyTotals = Teachers::GetEachStudentWeeklyTotal($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, $this->mDepartmentName);
                                
                                //First grab what have been saved already in the weekly_totals table to see if any record has been entered fo this paricular student ID with the associated parameters 
                                $this->prviousData = Teachers::PreviousStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mCurrentTermId);

                                if(!(empty($this->prviousData['weekly_total_id'])))
                                {

                                    $this->currentTotal = (int)$this->mWeeklyTotals['week_total'] + (int)$this->prviousData['weektotal'];
                                    //fOReach of this ID as in the loop. Record in the weekly_totals table the value returned for each particular studentid
                                    Teachers::UpdateStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->currentTotal);
                                    
                                }
                                else
                                    Teachers::AddStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->mWeeklyTotals['week_total']);

                            }

                            #Retrieve all the attendance totals (of the 15 weeks) from the weekly_totals table. This retrives totals for each student and arrenges them according to student ID. 
                            $this->mEachStudentAttTotal = Teachers::GetEachStudentsWeeklyAttendanceTotal($this->mClassId, $this->mCurrentTermId, $this->current_year, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop']);
                            
                            $this->mEachStudentAttTotalCount = count($this->mEachStudentAttTotal);

                            /*
                                1. Since weekly percentage is calculate every friday for each week, therefor i need a check to ensure that today is friday and that the dates are within the term_start and term_stop date.

                                2. Secondly since attendance is taken twice per day the program needs to ensure that the morning and afternoon attendance has been taken.

                                3.If the two conditions above have been met than the value should be stored in the weekly_percentage table of the database.
                            */
                            
                            if(strtotime($this->mWeekValues['week_stop']) === strtotime($mToday))
                            {

                                $this->mTodaysAttendanceStatus = Teachers::CheckAttendanceStatus($this->mClassId, $this->mWeekValues['week_stop'], $this->mCurrentTermId, $this->mTodaydateId);

                                if(!(empty($this->mTodaysAttendanceStatus['afternoon'])) && ((int)$this->mTodaysAttendanceStatus['afternoon'] == 1))
                                {
                                    $this->mWeeklyPercentagez = Teachers::GetWeeklyPercentageForToday($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop'], $this->mDepartmentName);

                                    /*
                                        Now that we are sure that its the end of the week then we shall record the value for the weeks percentage in the weekly_percentage table of the database. The reason is to make sure that percentage are entered once for every week. That is on fridays.
                                     */
                                    Teachers::AddThisWeeksAttendancePercentage($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_stop'], $this->mWeeklyPercentagez['week_what'], (int)$this->mWeeklyPercentagez['dailypercent']);

                                }

                            }
                            

                            /*
                                Just after the logic above that checks if its friday and adds the weekly percentages only on fridays. This below function also calculates the weekly percentages, then arrenges them according to the weeks after which its presented to the UI for the viewing pleasure of the teacher 
                                ===================================
                            */
                            $this->mAllWeeksPercentage = Teachers::GetAllWeeksPercenatage($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                            $this->mWeeklyPercentagezCount = count($this->mAllWeeksPercentage);
                            
                            //CLASS GENDER COUNT mClass_name
                            // ===================
                            $active_status = 1; 
                            $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);
                            $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                            $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                            
                            $this->mContentCell = 'attendance_success.tpl';
                            break;
                        case 2:
                            # Second Term
                            #---------------
                            # Attendance period
                            # class ID
                            $this->mClassId =  $_SESSION['class_listed_id'];
                            $active_status = 1;

                            #This below gives the total number of students in this class 
                            $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                            # The week ID
                            $this->mWeekValuesid = (int)$this->mWeekValues['weeks_and_dates_id'];

                            # Retrieve all submitted students IDs
                            $this->mStudentIdz = filter_input(INPUT_POST, 'attendanceStudenIds', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

                            $this->mAttendanceValues = filter_input(INPUT_POST, 'attendanceValues', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                            
                            # Count the submitted students IDs. personalprogress
                            $studentInClassCount = count($this->mStudentIdz);

                            #The array to collect the ID of each attendance record
                            $attRecordIds = array();
                            $weeklyTotalIds = array();
                            $studentIdArrInt = array();
                            $attendanceValueInt = array();

                            #Attendance Mark 
                            // $mAttendanceMark = 1;
                            $mAttendanceMark = $_POST['maControl'];
                            $mToday = $_POST['theDaysDate'];

                            # Just before adding the studentids below we shall first convert the student IDs to integer by casting each values.
                            foreach ($this->mStudentIdz as $key => $value) {
                                $studentIdArrInt[$key] = (int)$value;
                            }

                            foreach ($this->mAttendanceValues as $key => $value) {
                                $attendanceValueInt[$key] = (int)$value;
                            }

                            # Call the function to register each attendance details
                            foreach ($studentIdArrInt as $key => $student_id) 
                            {   
                                //1. I can call this same functunction below irrespect of the term or department
                                $attRecordIds[$key] = Teachers::RegisterTodaysAttendance($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$attendanceValueInt[$key], $mAttendanceMark, $this->mDepartmentName);
                                
                                #CALL the function to calculate each students daily total
                                // FROM fn_attendance
                                $this->mWeeklyTotals = Teachers::GetEachStudentWeeklyTotal($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, $this->mDepartmentName);
                                
                                //First grab what have been saved already in the weekly_totals table to see if any record has been entered fo this paricular student ID with the associated parameters 
                                $this->prviousData = Teachers::PreviousStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mCurrentTermId);

                                if(!(empty($this->prviousData['weekly_total_id'])))
                                {

                                    $this->currentTotal = (int)$this->mWeeklyTotals['week_total'] + (int)$this->prviousData['weektotal'];
                                    //fOReach of this ID as in the loop. Record in the weekly_totals table the value returned for each particular studentid
                                    Teachers::UpdateStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->currentTotal);
                                    
                                }
                                else
                                    Teachers::AddStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->mWeeklyTotals['week_total']);

                            }

                            #Retrieve all the attendance totals (of the 15 weeks) from the weekly_totals table. This retrives totals for each student and arrenges them according to student ID. 
                            $this->mEachStudentAttTotal = Teachers::GetEachStudentsWeeklyAttendanceTotal($this->mClassId, $this->mCurrentTermId, $this->current_year, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop']);
                            
                            $this->mEachStudentAttTotalCount = count($this->mEachStudentAttTotal);

                            /*
                                1. Since weekly percentage is calculate every friday for each week, therefor i need a check to ensure that today is friday and that the dates are within the term_start and term_stop date.

                                2. Secondly since attendance is taken twice per day the program needs to ensure that the morning and afternoon attendance has been taken.

                                3.If the two conditions above have been met than the value should be stored in the weekly_percentage table of the database.
                            */
                            
                            if(strtotime($this->mWeekValues['week_stop']) === strtotime($mToday))
                            {

                                $this->mTodaysAttendanceStatus = Teachers::CheckAttendanceStatus($this->mClassId, $this->mWeekValues['week_stop'], $this->mCurrentTermId, $this->mTodaydateId);

                                if(($this->mTodaysAttendanceStatus['afternoon']) && ((int)$this->mTodaysAttendanceStatus['afternoon'] == 1))
                                {
                                    $this->mWeeklyPercentagez = Teachers::GetWeeklyPercentageForToday($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop'], $this->mDepartmentName);

                                    /*
                                        Now that we are sure that its the end of the week then we shall record the value for the weeks percentage in the weekly_percentage table of the database. The reason is to make sure that percentage are entered once for every week. That is on fridays.
                                     */
                                    Teachers::AddThisWeeksAttendancePercentage($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_stop'], $this->mWeeklyPercentagez['week_what'], (int)$this->mWeeklyPercentagez['dailypercent']);

                                }

                            }
                            

                            /*
                                Just after the logic above that checks if its friday and adds the weekly percentages only on fridays. This below function also calculates the weekly percentages, then arrenges them according to the weeks after which its presented to the UI for the viewing pleasure of the teacher 
                                ===================================
                            */
                            $this->mAllWeeksPercentage = Teachers::GetAllWeeksPercenatage($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                            $this->mWeeklyPercentagezCount = count($this->mAllWeeksPercentage);
                            
                            //CLASS GENDER COUNT mClass_name
                            // ===================
                            $active_status = 1; 
                            $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);
                            $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                            $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                            
                            $this->mContentCell = 'attendance_success.tpl';
                            break;
                        case 3:
                            # Third Term
                            #---------------
                            # Attendance period
                            # class ID
                            $this->mClassId =  $_SESSION['class_listed_id'];
                            $active_status = 1;

                            #This below gives the total number of students in this class 
                            $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                            # The week ID
                            $this->mWeekValuesid = (int)$this->mWeekValues['weeks_and_dates_id'];

                            # Retrieve all submitted students IDs
                            $this->mStudentIdz = filter_input(INPUT_POST, 'attendanceStudenIds', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

                            $this->mAttendanceValues = filter_input(INPUT_POST, 'attendanceValues', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                            
                            # Count the submitted students IDs.
                            $studentInClassCount = count($this->mStudentIdz);

                            #The array to collect the ID of each attendance record
                            $attRecordIds = array();
                            $weeklyTotalIds = array();
                            $studentIdArrInt = array();
                            $attendanceValueInt = array();

                            #Attendance Mark 
                            // $mAttendanceMark = 1;
                            $mAttendanceMark = $_POST['maControl'];
                            $mToday = $_POST['theDaysDate'];

                            # Just before adding the studentids below we shall first convert the student IDs to integer by casting each values.
                            foreach ($this->mStudentIdz as $key => $value) {
                                $studentIdArrInt[$key] = (int)$value;
                            }

                            foreach ($this->mAttendanceValues as $key => $value) {
                                $attendanceValueInt[$key] = (int)$value;
                            }

                            # Call the function to register each attendance details
                            foreach ($studentIdArrInt as $key => $student_id) 
                            {   
                                //1. I can call this same functunction below irrespect of the term or department
                                $attRecordIds[$key] = Teachers::RegisterTodaysAttendance($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$attendanceValueInt[$key], $mAttendanceMark, $this->mDepartmentName);
                                
                                #CALL the function to calculate each students daily total
                                // FROM fn_attendance
                                $this->mWeeklyTotals = Teachers::GetEachStudentWeeklyTotal($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, $this->mDepartmentName);
                                
                                //First grab what have been saved already in the weekly_totals table to see if any record has been entered fo this paricular student ID with the associated parameters 
                                $this->prviousData = Teachers::PreviousStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mCurrentTermId);

                                if(!(empty($this->prviousData['weekly_total_id'])))
                                {

                                    $this->currentTotal = (int)$this->mWeeklyTotals['week_total'] + (int)$this->prviousData['weektotal'];
                                    //fOReach of this ID as in the loop. Record in the weekly_totals table the value returned for each particular studentid
                                    Teachers::UpdateStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->currentTotal);
                                    
                                }
                                else
                                    Teachers::AddStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->mWeeklyTotals['week_total']);

                            }

                            #Retrieve all the attendance totals (of the 15 weeks) from the weekly_totals table. This retrives totals for each student and arrenges them according to student ID. 
                            $this->mEachStudentAttTotal = Teachers::GetEachStudentsWeeklyAttendanceTotal($this->mClassId, $this->mCurrentTermId, $this->current_year, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop']);
                            
                            $this->mEachStudentAttTotalCount = count($this->mEachStudentAttTotal);

                            /*
                                1. Since weekly percentage is calculate every friday for each week, therefor i need a check to ensure that today is friday and that the dates are within the term_start and term_stop date.

                                2. Secondly since attendance is taken twice per day the program needs to ensure that the morning and afternoon attendance has been taken.

                                3.If the two conditions above have been met than the value should be stored in the weekly_percentage table of the database.
                            */
                            
                            if(strtotime($this->mWeekValues['week_stop']) === strtotime($mToday))
                            {

                                $this->mTodaysAttendanceStatus = Teachers::CheckAttendanceStatus($this->mClassId, $this->mWeekValues['week_stop'], $this->mCurrentTermId, $this->mTodaydateId);

                                if(!(empty($this->mTodaysAttendanceStatus['afternoon'])) && ((int)$this->mTodaysAttendanceStatus['afternoon'] == 1))
                                {
                                    $this->mWeeklyPercentagez = Teachers::GetWeeklyPercentageForToday($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop'], $this->mDepartmentName);

                                    /*
                                        Now that we are sure that its the end of the week then we shall record the value for the weeks percentage in the weekly_percentage table of the database. The reason is to make sure that percentage are entered once for every week. That is on fridays.
                                     */
                                    Teachers::AddThisWeeksAttendancePercentage($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_stop'], $this->mWeeklyPercentagez['week_what'], (int)$this->mWeeklyPercentagez['dailypercent']);

                                }

                            }
                            

                            /*
                                Just after the logic above that checks if its friday and adds the weekly percentages only on fridays. This below function also calculates the weekly percentages, then arrenges them according to the weeks after which its presented to the UI for the viewing pleasure of the teacher 
                                ===================================
                            */
                            $this->mAllWeeksPercentage = Teachers::GetAllWeeksPercenatage($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                            $this->mWeeklyPercentagezCount = count($this->mAllWeeksPercentage);
                            
                            //CLASS GENDER COUNT mClass_name
                            // ===================
                            $active_status = 1; 
                            $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);
                            $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                            $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                            
                            $this->mContentCell = 'attendance_success.tpl';
                            break;
                        default:
                            # code...Primary
                            break;
                    }

                }
                elseif($this->mDepartmentName == 'Secondary')
                {

                    switch ($this->mCurrentTermId) {
                        case 1:
                            # First Term
                            #---------------
                            # Attendance period
                            # class ID
                            $this->mClassId =  $_SESSION['class_listed_id'];
                            $active_status = 1;

                            #This below gives the total number of students in this class 
                            $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                            # The week ID
                            $this->mWeekValuesid = (int)$this->mWeekValues['weeks_and_dates_id'];

                            # Retrieve all submitted students IDs
                            $this->mStudentIdz = filter_input(INPUT_POST, 'attendanceStudenIds', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

                            $this->mAttendanceValues = filter_input(INPUT_POST, 'attendanceValues', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                            
                            # Count the submitted students IDs.
                            $studentInClassCount = count($this->mStudentIdz);

                            #The array to collect the ID of each attendance record
                            $attRecordIds = array();
                            $weeklyTotalIds = array();
                            $studentIdArrInt = array();
                            $attendanceValueInt = array();

                            #Attendance Mark 
                            // $mAttendanceMark = 1;
                            $mAttendanceMark = $_POST['maControl'];
                            $mToday = $_POST['theDaysDate'];

                            # Just before adding the studentids below we shall first convert the student IDs to integer by casting each values.
                            foreach ($this->mStudentIdz as $key => $value) {
                                $studentIdArrInt[$key] = (int)$value;
                            }

                            foreach ($this->mAttendanceValues as $key => $value) {
                                $attendanceValueInt[$key] = (int)$value;
                            }

                            # Call the function to register each attendance details
                            foreach ($studentIdArrInt as $key => $student_id) 
                            {   
                                //1. I can call this same functunction below irrespect of the term or department
                                $attRecordIds[$key] = Teachers::RegisterTodaysAttendance($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$attendanceValueInt[$key], $mAttendanceMark, $this->mDepartmentName);
                                
                                #CALL the function to calculate each students daily total
                                // FROM fn_attendance
                                $this->mWeeklyTotals = Teachers::GetEachStudentWeeklyTotal($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, $this->mDepartmentName);
                                
                                //First grab what have been saved already in the weekly_totals table to see if any record has been entered fo this paricular student ID with the associated parameters 
                                $this->prviousData = Teachers::PreviousStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mCurrentTermId);

                                if(!(empty($this->prviousData['weekly_total_id'])))
                                {

                                    $this->currentTotal = (int)$this->mWeeklyTotals['week_total'] + (int)$this->prviousData['weektotal'];
                                    //fOReach of this ID as in the loop. Record in the weekly_totals table the value returned for each particular studentid
                                    Teachers::UpdateStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->currentTotal);
                                    
                                }
                                else
                                    Teachers::AddStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->mWeeklyTotals['week_total']);

                            }

                            #Retrieve all the attendance totals (of the 15 weeks) from the weekly_totals table. This retrives totals for each student and arrenges them according to student ID. 
                            $this->mEachStudentAttTotal = Teachers::GetEachStudentsWeeklyAttendanceTotal($this->mClassId, $this->mCurrentTermId, $this->current_year, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop']);
                            
                            $this->mEachStudentAttTotalCount = count($this->mEachStudentAttTotal);

                            /*
                                1. Since weekly percentage is calculate every friday for each week, therefor i need a check to ensure that today is friday and that the dates are within the term_start and term_stop date.

                                2. Secondly since attendance is taken twice per day the program needs to ensure that the morning and afternoon attendance has been taken.

                                3.If the two conditions above have been met than the value should be stored in the weekly_percentage table of the database.
                            */
                            
                            if(strtotime($this->mWeekValues['week_stop']) === strtotime($mToday))
                            {

                                $this->mTodaysAttendanceStatus = Teachers::CheckAttendanceStatus($this->mClassId, $this->mWeekValues['week_stop'], $this->mCurrentTermId, $this->mTodaydateId);

                                if(!(empty($this->mTodaysAttendanceStatus['afternoon'])) && ((int)$this->mTodaysAttendanceStatus['afternoon'] == 1))
                                {
                                    $this->mWeeklyPercentagez = Teachers::GetWeeklyPercentageForToday($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop'], $this->mDepartmentName);

                                    /*
                                        Now that we are sure that its the end of the week then we shall record the value for the weeks percentage in the weekly_percentage table of the database. The reason is to make sure that percentage are entered once for every week. That is on fridays.
                                     */
                                    Teachers::AddThisWeeksAttendancePercentage($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_stop'], $this->mWeeklyPercentagez['week_what'], (int)$this->mWeeklyPercentagez['dailypercent']);

                                }

                            }
                            

                            /*
                                Just after the logic above that checks if its friday and adds the weekly percentages only on fridays. This below function also calculates the weekly percentages, then arrenges them according to the weeks after which its presented to the UI for the viewing pleasure of the teacher 
                                ===================================
                            */
                            $this->mAllWeeksPercentage = Teachers::GetAllWeeksPercenatage($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                            $this->mWeeklyPercentagezCount = count($this->mAllWeeksPercentage);
                            
                            //CLASS GENDER COUNT mClass_name
                            // ===================
                            $active_status = 1; 
                            $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);
                            $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                            $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                            
                            $this->mContentCell = 'attendance_success.tpl';
                            break;
                        case 2:
                            # Second Term
                            #---------------
                            # Attendance period
                            # class ID
                            $this->mClassId =  $_SESSION['class_listed_id'];
                            $active_status = 1;

                            #This below gives the total number of students in this class 
                            $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                            # The week ID
                            $this->mWeekValuesid = (int)$this->mWeekValues['weeks_and_dates_id'];

                            # Retrieve all submitted students IDs
                            $this->mStudentIdz = filter_input(INPUT_POST, 'attendanceStudenIds', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

                            $this->mAttendanceValues = filter_input(INPUT_POST, 'attendanceValues', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                            
                            # Count the submitted students IDs.
                            $studentInClassCount = count($this->mStudentIdz);

                            #The array to collect the ID of each attendance record
                            $attRecordIds = array();
                            $weeklyTotalIds = array();
                            $studentIdArrInt = array();
                            $attendanceValueInt = array();

                            #Attendance Mark 
                            // $mAttendanceMark = 1;
                            $mAttendanceMark = $_POST['maControl'];
                            $mToday = $_POST['theDaysDate'];

                            # Just before adding the studentids below we shall first convert the student IDs to integer by casting each values.
                            foreach ($this->mStudentIdz as $key => $value) {
                                $studentIdArrInt[$key] = (int)$value;
                            }

                            foreach ($this->mAttendanceValues as $key => $value) {
                                $attendanceValueInt[$key] = (int)$value;
                            }

                            # Call the function to register each attendance details
                            foreach ($studentIdArrInt as $key => $student_id) 
                            {   
                                //1. I can call this same functunction below irrespect of the term or department
                                $attRecordIds[$key] = Teachers::RegisterTodaysAttendance($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$attendanceValueInt[$key], $mAttendanceMark, $this->mDepartmentName);
                                
                                #CALL the function to calculate each students daily total
                                // FROM fn_attendance
                                $this->mWeeklyTotals = Teachers::GetEachStudentWeeklyTotal($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, $this->mDepartmentName);
                                
                                //First grab what have been saved already in the weekly_totals table to see if any record has been entered fo this paricular student ID with the associated parameters 
                                $this->prviousData = Teachers::PreviousStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mCurrentTermId);

                                if(!(empty($this->prviousData['weekly_total_id'])))
                                {

                                    $this->currentTotal = (int)$this->mWeeklyTotals['week_total'] + (int)$this->prviousData['weektotal'];
                                    //fOReach of this ID as in the loop. Record in the weekly_totals table the value returned for each particular studentid
                                    Teachers::UpdateStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->currentTotal);
                                    
                                }
                                else
                                    Teachers::AddStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->mWeeklyTotals['week_total']);

                            }

                            #Retrieve all the attendance totals (of the 15 weeks) from the weekly_totals table. This retrives totals for each student and arrenges them according to student ID. 
                            $this->mEachStudentAttTotal = Teachers::GetEachStudentsWeeklyAttendanceTotal($this->mClassId, $this->mCurrentTermId, $this->current_year, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop']);
                            
                            $this->mEachStudentAttTotalCount = count($this->mEachStudentAttTotal);

                            /*
                                1. Since weekly percentage is calculate every friday for each week, therefor i need a check to ensure that today is friday and that the dates are within the term_start and term_stop date.

                                2. Secondly since attendance is taken twice per day the program needs to ensure that the morning and afternoon attendance has been taken.

                                3.If the two conditions above have been met than the value should be stored in the weekly_percentage table of the database.
                            */
                            
                            if(strtotime($this->mWeekValues['week_stop']) === strtotime($mToday))
                            {

                                $this->mTodaysAttendanceStatus = Teachers::CheckAttendanceStatus($this->mClassId, $this->mWeekValues['week_stop'], $this->mCurrentTermId, $this->mTodaydateId);

                                if(!(empty($this->mTodaysAttendanceStatus['afternoon'])) && ((int)$this->mTodaysAttendanceStatus['afternoon'] == 1))
                                {
                                    $this->mWeeklyPercentagez = Teachers::GetWeeklyPercentageForToday($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop'], $this->mDepartmentName);

                                    /*
                                        Now that we are sure that its the end of the week then we shall record the value for the weeks percentage in the weekly_percentage table of the database. The reason is to make sure that percentage are entered once for every week. That is on fridays.
                                     */
                                    Teachers::AddThisWeeksAttendancePercentage($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_stop'], $this->mWeeklyPercentagez['week_what'], (int)$this->mWeeklyPercentagez['dailypercent']);

                                }

                            }
                            

                            /*
                                Just after the logic above that checks if its friday and adds the weekly percentages only on fridays. This below function also calculates the weekly percentages, then arrenges them according to the weeks after which its presented to the UI for the viewing pleasure of the teacher 
                                ===================================
                            */
                            $this->mAllWeeksPercentage = Teachers::GetAllWeeksPercenatage($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                            $this->mWeeklyPercentagezCount = count($this->mAllWeeksPercentage);
                            
                            //CLASS GENDER COUNT mClass_name
                            // ===================
                            $active_status = 1; 
                            $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);
                            $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                            $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                            
                            $this->mContentCell = 'attendance_success.tpl';
                            break;
                        case 3:
                            # Third Term
                            #---------------
                            # Attendance period
                            # class ID
                            $this->mClassId =  $_SESSION['class_listed_id'];
                            $active_status = 1;

                            #This below gives the total number of students in this class 
                            $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                            # The week ID
                            $this->mWeekValuesid = (int)$this->mWeekValues['weeks_and_dates_id'];

                            # Retrieve all submitted students IDs
                            $this->mStudentIdz = filter_input(INPUT_POST, 'attendanceStudenIds', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

                            $this->mAttendanceValues = filter_input(INPUT_POST, 'attendanceValues', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
                            
                            # Count the submitted students IDs.
                            $studentInClassCount = count($this->mStudentIdz);

                            #The array to collect the ID of each attendance record
                            $attRecordIds = array();
                            $weeklyTotalIds = array();
                            $studentIdArrInt = array();
                            $attendanceValueInt = array();

                            #Attendance Mark 
                            // $mAttendanceMark = 1;
                            $mAttendanceMark = $_POST['maControl'];
                            $mToday = $_POST['theDaysDate'];

                            # Just before adding the studentids below we shall first convert the student IDs to integer by casting each values.
                            foreach ($this->mStudentIdz as $key => $value) {
                                $studentIdArrInt[$key] = (int)$value;
                            }

                            foreach ($this->mAttendanceValues as $key => $value) {
                                $attendanceValueInt[$key] = (int)$value;
                            }

                            # Call the function to register each attendance details
                            foreach ($studentIdArrInt as $key => $student_id) 
                            {   
                                //1. I can call this same functunction below irrespect of the term or department
                                $attRecordIds[$key] = Teachers::RegisterTodaysAttendance($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$attendanceValueInt[$key], $mAttendanceMark, $this->mDepartmentName);
                                
                                #CALL the function to calculate each students daily total
                                // FROM fn_attendance
                                $this->mWeeklyTotals = Teachers::GetEachStudentWeeklyTotal($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, $this->mDepartmentName);
                                
                                //First grab what have been saved already in the weekly_totals table to see if any record has been entered fo this paricular student ID with the associated parameters 
                                $this->prviousData = Teachers::PreviousStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mCurrentTermId);

                                if(!(empty($this->prviousData['weekly_total_id'])))
                                {

                                    $this->currentTotal = (int)$this->mWeeklyTotals['week_total'] + (int)$this->prviousData['weektotal'];
                                    //fOReach of this ID as in the loop. Record in the weekly_totals table the value returned for each particular studentid
                                    Teachers::UpdateStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->currentTotal);
                                    
                                }
                                else
                                    Teachers::AddStudentWeeklyTotals($this->mWeekValuesid, (int)$student_id, $this->mClassId, $this->mTodaydateId, $mToday, $this->mCurrentTermId, (int)$this->mWeeklyTotals['week_total']);

                            }

                            #Retrieve all the attendance totals (of the 15 weeks) from the weekly_totals table. This retrives totals for each student and arrenges them according to student ID. 
                            $this->mEachStudentAttTotal = Teachers::GetEachStudentsWeeklyAttendanceTotal($this->mClassId, $this->mCurrentTermId, $this->current_year, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop']);
                            
                            $this->mEachStudentAttTotalCount = count($this->mEachStudentAttTotal);

                            /*
                                1. Since weekly percentage is calculate every friday for each week, therefor i need a check to ensure that today is friday and that the dates are within the term_start and term_stop date.

                                2. Secondly since attendance is taken twice per day the program needs to ensure that the morning and afternoon attendance has been taken.

                                3.If the two conditions above have been met than the value should be stored in the weekly_percentage table of the database.
                            */
                            
                            if(strtotime($this->mWeekValues['week_stop']) === strtotime($mToday))
                            {

                                $this->mTodaysAttendanceStatus = Teachers::CheckAttendanceStatus($this->mClassId, $this->mWeekValues['week_stop'], $this->mCurrentTermId, $this->mTodaydateId);

                                if(!(empty($this->mTodaysAttendanceStatus['afternoon'])) && ((int)$this->mTodaysAttendanceStatus['afternoon'] == 1))
                                {
                                    $this->mWeeklyPercentagez = Teachers::GetWeeklyPercentageForToday($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop'], $this->mDepartmentName);

                                    /*
                                        Now that we are sure that its the end of the week then we shall record the value for the weeks percentage in the weekly_percentage table of the database. The reason is to make sure that percentage are entered once for every week. That is on fridays.
                                     */
                                    Teachers::AddThisWeeksAttendancePercentage($this->mWeekValuesid, $this->mClassId, $this->mCurrentTermId, $this->mWeekValues['week_stop'], $this->mWeeklyPercentagez['week_what'], (int)$this->mWeeklyPercentagez['dailypercent']);

                                }

                            }
                            

                            /*
                                Just after the logic above that checks if its friday and adds the weekly percentages only on fridays. This below function also calculates the weekly percentages, then arrenges them according to the weeks after which its presented to the UI for the viewing pleasure of the teacher 
                                ===================================
                            */
                            $this->mAllWeeksPercentage = Teachers::GetAllWeeksPercenatage($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                            $this->mWeeklyPercentagezCount = count($this->mAllWeeksPercentage);
                            
                            //CLASS GENDER COUNT mClass_name
                            // ===================
                            $active_status = 1; 
                            $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);
                            $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                            $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                            
                            $this->mContentCell = 'attendance_success.tpl';
                            break;
                        default:
                            # code...
                            break;
                    }

                }


                //==============================================
            }

        

        }
/*
=====================================================
 ==== ABANDONED ABOVE================================
 =======================================================
*/





        if(isset($_POST['ViewAttendanceReport']))
        {
            /*
            GetAllWeeksPercenatage
            */
            if($this->mWeekValues)
            {
                $this->mClassId = $_SESSION['class_listed_id'];
                $this->mClass_name = $_SESSION['class_name'];
                
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];
                // $this->mDepartmentName = $_SESSION['department_name'];
                // ==============================================
                $this->mEachStudentAttTotal = Teachers::GetEachStudentsWeeklyAttendanceTotal($this->mClassId, $this->mCurrentTermId, $this->current_year, $this->mWeekValues['week_start'], $this->mWeekValues['week_stop']);

                
                $this->mEachStudentAttTotalCount = count($this->mEachStudentAttTotal);
                // =============================================
                $this->mAllWeeksPercentage = Teachers::GetAllWeeksPercenatage($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);
                $this->mWeeklyPercentagezCount = count($this->mAllWeeksPercentage);

                // ===================================================
                $active_status = 1;
                $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                // =============================================================
                
                $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);
                $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                $this->mContentCell = 'attendance_success.tpl';

            }
            else
            {
                /*
                THIS BELOW RUNS WHEN THE TERM HAS ENDED (BECAUSE THE )
                */
                $this->mClassId = $_SESSION['class_listed_id'];
                $this->mClass_name = $_SESSION['class_name'];
                
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                
                
                $this->mEachStudentAttTotal = Teachers::GetEachStudentsWeeklyAttendanceTotal_tEnd($this->mClassId, $this->mCurrentTermId, $this->current_year);
                $this->mEachStudentAttTotalCount = count($this->mEachStudentAttTotal);
                // =============================================

                
                

                $this->mAllWeeksPercentage = Teachers::GetAllWeeksPercenatage_tEnd($this->mClassId, $this->mCurrentTermId, $this->current_year, $this->mDepartmentName);
                $this->mWeeklyPercentagezCount = count($this->mAllWeeksPercentage);

                // ===================================================
                $active_status = 1;
                $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);

                $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                // =============================================================
                
                $this->mMaleClassCount = Teachers::MaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);
                $this->mFemaleClassCount = Teachers::FemaleClassCount($this->mClassId, $this->mCurrentTerm, $active_status);

                $this->mContentCell = 'attendance_success.tpl';
            }
            
        }













// ======================================================================================
        /*
        THIS CODES BELOW IS FOR THE ADDITION OF FIRST CA addFirstCABtn
        THE STEPS THROUGH ADDING OF FIRST-CA SCORE OF STUDENTS TO THE DATABASE
        STEP 1.
        */
        if(isset($_POST['addFirstCABtn']) && isset($_POST['ClassAction']) && $_POST['ClassAction'] === 'recordFirstCA')
        {
            $this->mSubjectId = (int)filter_input(INPUT_POST, 'subject_id', FILTER_VALIDATE_INT);
            $_SESSION['subject_id'] = $this->mSubjectId;

            $mSubjectName = Teachers::GetSubjectNameById($this->mSubjectId);
        

            //Guard against csrf attack
            if(!hash_equals($this->mCsrffirstca, $_POST['csrffirstca']))
            {
                $this->mErrorMessage = 'The page submitted is unknown to the system hence the error. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!$mSubjectName)
            {
                $this->mErrorMessage = 'The subject selected is not registered for this class, please contact the admin for clearification. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The Term has ended, please contact admin for setting of new term date. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                /*
                    Here shows that the csrf attack has been taken care-of and every thing is clare, so we can proceed with the precessing.
                    1. We'll grab the ID of the class for wich to add the first ca
                    2. We need to know what term, section, and what ca it is.
                */
                $this->mSubjectName = $mSubjectName['name'];
                $_SESSION['subject_name'] = $this->mSubjectName;
                $_SESSION['ca_type'] = filter_input(INPUT_POST, 'CaType', FILTER_SANITIZE_STRING);

                $this->mClassId = (int)filter_input(INPUT_POST, 'ClassActionId', FILTER_VALIDATE_INT); 
                $_SESSION['classid'] = $this->mClassId;
                    
                $active_status = 1;
                $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);
                $this->mConfirmatoryListCount = count($this->mConfirmatoryList);

                #Just before we add any scores we need to check and see what has been added //
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                $result = Teachers::IsSubjectCaDone($this->mSubjectId, $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $_SESSION['ca_type'], $this->mTodayDate, $this->thisTermStarted, $this->thisTermEnds);
                $result = (int)$result['alreadytotal'];

                #This code below checks and makes sure that if the particular CA has been recorded once, then it should not be repeated again.
                if($result > 0)
                {
                    $this->mErrorMessage = 'First Continous Assesment Marks for '. $_SESSION['subject_name'].' has been recorded. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    $this->mContentCell = 'warning_box.tpl';
                }
                else
                    $this->mContentCell = 'first_ca_adder.tpl';

            

            }//This is the end of the else-clause that checks csrf-attack attendanceListBtn

        }


        /*
        The second step
        STEP 2
        */
        if(isset($_POST['firstCaForStorage']))
        {
            #The code below will take all the submited scores and student ID, then prepare for calling the function that will add the data to the database.
            #1.student ids
            $this->mSubjectId = $_SESSION['subject_id'];

            $mStudentIdz = array();
            $this->mStudentIdz = filter_input(INPUT_POST, 'student_id', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            foreach($this->mStudentIdz as $key => $idz)
            {
                $mStudentIdz[$key] = (int)$idz;
            }

        
            $letters = array();
            $mStudentScores = array();
            $this->mStudentScores = filter_input(INPUT_POST, 'first_ca_score', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            foreach($this->mStudentScores as $key => $scores)
            {
                if(is_numeric($scores) && $scores < 20.1)
                    $mStudentScores[$key] = (int)$scores;
                else
                    $letters[] = $scores;
            }

            #This ensures that only numeric values are used by the system
            if(count($letters) > 0)
            {
                $this->mErrorMessage = 'An unexpected non-numeric value or values greater than 20 was found in the CA marks you entered, please use only numbers less than 20.1 for the CA values. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The term has ended, please contact admin to set new term start date. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                
                $this->mClassId = $_SESSION['classid'];
                $addedIds = array();
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                #Call the function that will add these scores to the database.
                foreach ($mStudentScores as $key => $stScores) 
                {
                    $addedIds[] = Teachers::AddCA_record($stScores, $mStudentIdz[$key], $this->mSubjectId, $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $_SESSION['ca_type'], $this->mTodayDate);
                }
                
                if(count($addedIds) == count($mStudentIdz))
                {
                    #show success report
                    $this->mConfirmationHeading = 'First CA for ' . $_SESSION['subject_name'] . ' recorded successfully!';
                    $this->mConfirmationMessage = 'The total of ' . count($addedIds) . ' was entered. You can improve your productivity by sugesting what works best for you and BlueMark will move to its implemetation. <br><br> <a href="'.$this->mToTeachersClassPage.'" class="btn btn-outline btn-success"> Success ok </a>';
                    $this->mShowCaLinks = true;
                    $this->mContentCell = 'confirmed_box.tpl';
                }
                else
                {
                    $this->mErrorMessage = 'An unexpected network error, please contact the admin for clearification. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    $this->mContentCell = 'warning_box.tpl';
                }
            }

        }


// ======================================================================================

        /*
        THIS CODES BELOW IS FOR THE ADDITION OF SECOND CA addSecondCABtn
        THE STEPS THROUGH ADDING OF SECOND-CA SCORE OF STUDENTS TO THE DATABASE
        STEP 1.
        */
        if(isset($_POST['addSecondCABtn']) && isset($_POST['ClassAction']) && $_POST['ClassAction'] === 'recordSecondCA')
        {
            $this->mSubjectId = (int)filter_input(INPUT_POST, 'subject_id', FILTER_VALIDATE_INT);
            $_SESSION['subject_id'] = $this->mSubjectId;

            $mSubjectName = Teachers::GetSubjectNameById($this->mSubjectId);
            //Guard against csrf attack 
            if(!hash_equals($this->mCsrffirstca, $_POST['csrffirstca']))
            {
                $this->mErrorMessage = 'The page submitted is unknown to the system hence the error. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!$mSubjectName)
            {
                $this->mErrorMessage = 'The subject selected is not registered for this class, please contact the admin for clearification. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The term has ended, please contact admin to set new term start date. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                /*
                    Here shows that the csrf attack has been taken care-of and every thing is clare, so we can proceed with the precessing.
                    1. We'll grab the ID of the class for wich to add the first ca
                    2. We need to know what term, section, and what ca it is.
                */
                $this->mSubjectName = $mSubjectName['name'];
                $_SESSION['subject_name'] = $this->mSubjectName;
                $_SESSION['ca_type'] = filter_input(INPUT_POST, 'CaType', FILTER_SANITIZE_STRING);

                $this->mClassId = (int)filter_input(INPUT_POST, 'ClassActionId', FILTER_VALIDATE_INT); 
                $_SESSION['classid'] = $this->mClassId;
                    
                $active_status = 1;
                $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);
                $this->mConfirmatoryListCount = count($this->mConfirmatoryList);

                #Just before we add any scores we need to check and see what has been added
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                $result = Teachers::IsSubject2CaDone($this->mSubjectId, $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);
                $result = (int)$result['alreadytotal'];

                #This code below checks and makes sure that if the particular CA has been recorded once, then it should not be repeated again.personalprogress
                if($result > 0)
                {
                    $this->mErrorMessage = 'wow Second Continous Assesment Marks for '. $_SESSION['subject_name'].' has been recorded. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    $this->mContentCell = 'warning_box.tpl';
                }
                else
                    $this->mContentCell = 'second_ca_adder.tpl';

            }

        }
        /*
        The second step--STEP 2
        */
        if(isset($_POST['secondCaForStorage']))
        {
            #The code below will take all the submited scores and student ID, then prepare for calling the function that will add the data to the database.
            #1.student ids
            $this->mSubjectId = $_SESSION['subject_id'];

            $mStudentIdz = array();
            $this->mStudentIdz = filter_input(INPUT_POST, 'student_id', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            foreach($this->mStudentIdz as $key => $idz)
            {
                $mStudentIdz[$key] = (int)$idz;
            }

            $letters = array();
            $mStudentScores = array();
            #This logic below prevent non-numeric and number above 20 from being inputed as as value of CA.
            
            $this->mStudentScores = filter_input(INPUT_POST, 'second_ca_score', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            foreach($this->mStudentScores as $key => $scores)
            {
                if(is_numeric($scores) && $scores < 20.1)
                    $mStudentScores[$key] = (int)$scores;
                else
                    $letters[] = $scores;
            }

             #This ensures that only numeric values are used by the system
            if(count($letters) > 0)
            {
                $this->mErrorMessage = 'Please use only numbers less than 20.1 for the CA values. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The term has ended, please contact admin to set new term start date. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                $this->mClassId = $_SESSION['classid'];
                $addedIds = array();
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                #Call the function that will add these scores to the database.
                foreach ($mStudentScores as $key => $stScores) 
                {
                    Teachers::UpdateSecondCazForOneStudent((int)$this->mSubjectId, $stScores, (int)$mStudentIdz[$key], $this->mCurrentTermId, $this->mDepartmentName, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds);
                    $addedIds[] = $key;
                }

                if(count($addedIds) == count($mStudentIdz))
                {
                    #show success report
                    $this->mConfirmationHeading = 'Second CA for ' . $_SESSION['subject_name'] . ' recorded successfully!';
                    $this->mConfirmationMessage = 'The total of ' . count($addedIds) . ' students records was entered. <br><br>You can improve your productivity by sugesting what works best for you and BlueMark will move to its implemetation.<br><br>Thank you for choosing  <span style="color: #337ab7">BlueMark </span> <br><br> <a href="'.$this->mToTeachersClassPage.'" class="btn btn-outline btn-success"> Success ok </a>';
                    $this->mShowCaLinks = true;
                    $this->mContentCell = 'confirmed_box.tpl';
                }
                else
                {
                    $this->mErrorMessage = 'An unexpected network error, please contact the BlueMark-administrator-(08134899043) for clearification. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    $this->mContentCell = 'warning_box.tpl';
                }

            }

        }
// ======================================================================================
        /*
        THIS CODES BELOW IS FOR THE ADDITION OF THIRD CA 
        THE STEPS THROUGH ADDING OF SECOND-CA SCORE OF STUDENTS TO THE DATABASE
        STEP 1. addThirdCABtn
        */

        if(isset($_POST['addThirdCABtn']) && isset($_POST['ClassAction']) && $_POST['ClassAction'] === 'recordThirdCA')
        {
            $this->mSubjectId = (int)filter_input(INPUT_POST, 'subject_id', FILTER_VALIDATE_INT);
            $_SESSION['subject_id'] = $this->mSubjectId;

            $mSubjectName = Teachers::GetSubjectNameById($this->mSubjectId);
            //Guard against csrf attack 
            if(!hash_equals($this->mCsrffirstca, $_POST['csrffirstca']))
            {
                $this->mErrorMessage = 'The page submitted is unknown to the system hence the error. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$mSubjectName)
            {
                $this->mErrorMessage = 'The subject selected is not registered for this class, please contact the admin for clearification. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The term has ended, please contact admin to set new term start date. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                /*
                    Here shows that the csrf attack has been taken care-of and every thing is clare, so we can proceed with the precessing.
                    1. We'll grab the ID of the class for wich to add the first ca
                    2. We need to know what term, section, and what ca it is.
                */
                $this->mSubjectName = $mSubjectName['name'];
                $_SESSION['subject_name'] = $this->mSubjectName;
                $_SESSION['ca_type'] = filter_input(INPUT_POST, 'CaType', FILTER_SANITIZE_STRING);

                $this->mClassId = (int)filter_input(INPUT_POST, 'ClassActionId', FILTER_VALIDATE_INT); 
                $_SESSION['classid'] = $this->mClassId;
                    
                $active_status = 1;
                $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);
                $this->mConfirmatoryListCount = count($this->mConfirmatoryList);

                #Just before we add any scores we need to check and see what has been added
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                $result = Teachers::IsSubject3CaDone($this->mSubjectId, $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);
                $result = (int)$result['alreadytotal'];

                #This code below checks and makes sure that if the particular CA has been recorded once, then it should not be repeated again.
                if($result > 0)
                {
                    $this->mErrorMessage = 'Third Continous Assesment Marks for '. $_SESSION['subject_name'].' has been recorded. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    $this->mContentCell = 'warning_box.tpl';
                }
                else
                    $this->mContentCell = 'third_ca_adder.tpl';
            }

        }

        /*
        The third step--STEP 2
        */
        if(isset($_POST['thirdCaForStorage']))
        {
            #The code below will take all the submited scores and student ID, then prepare for calling the function that will add the data to the database.
            #1.student ids
            $this->mSubjectId = $_SESSION['subject_id'];

            $mStudentIdz = array();
            $this->mStudentIdz = filter_input(INPUT_POST, 'student_id', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            foreach($this->mStudentIdz as $key => $idz)
            {
                $mStudentIdz[$key] = (int)$idz;
            }

            $letters = array();
            $mStudentScores = array();

            #This logic below prevent non-numeric and number above 20 from being inputed as as value of CA.
            $this->mStudentScores = filter_input(INPUT_POST, 'third_ca_score', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            foreach($this->mStudentScores as $key => $scores)
            {
                if(is_numeric($scores) && $scores < 20.1)
                    $mStudentScores[$key] = (int)$scores;
                else
                    $letters[] = $scores;
            }

            #This ensures that only numeric values are used by the system
            if(count($letters) > 0)
            {
                $this->mErrorMessage = 'Please use only numbers less than 20.1 for the CA values. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The term has ended, please contact admin to set new term start date. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                $this->mClassId = $_SESSION['classid'];
                $addedIds = array();
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                #Call the function that will add these scores to the database.
                foreach ($mStudentScores as $key => $stScores) 
                {
                    
                    Teachers::UpdateThirdCazForOneStudent((int)$this->mSubjectId, $stScores, (int)$mStudentIdz[$key], $this->mCurrentTermId, $this->mDepartmentName, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds);
                    $addedIds[] = $key;

                }

                if(count($addedIds) == count($mStudentIdz))
                {
                    #show success report
                    $this->mConfirmationHeading = 'Third CA for ' . $_SESSION['subject_name'] . ' recorded successfully!';
                    $this->mConfirmationMessage = 'The total of ' . count($addedIds) . ' students records was entered. <br><br>You can improve your productivity by sugesting what works best for you and BlueMark will ensure the implemetation.<br><br>Thank you for choosing  <span style="color: blue">BlueMark </span> <br><br> <a href="'.$this->mToTeachersClassPage.'" class="btn btn-outline btn-success"> Success ok </a>';
                    $this->mShowCaLinks = true;
                    $this->mContentCell = 'confirmed_box.tpl';
                }
                else
                {
                    $this->mErrorMessage = 'An unexpected network error, please contact the BlueMark-administrator-(08134899043) for clearification. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    $this->mContentCell = 'warning_box.tpl';
                }

            }

        }

// ======================================================================================
        /*
        THIS CODES BELOW IS FOR THE ADDITION OF EXAMS MARKS 
        THE STEPS THROUGH ADDING OF SECOND-CA SCORE OF STUDENTS TO THE DATABASE
        STEP 1. addExamsBtnaddExamsBtn
        */
        if(isset($_POST['addExamsBtn']) && isset($_POST['ClassAction']) && $_POST['ClassAction'] === 'recordExams')
        {
            $this->mSubjectId = (int)filter_input(INPUT_POST, 'subject_id', FILTER_VALIDATE_INT);
            $_SESSION['subject_id'] = $this->mSubjectId;

            $mSubjectName = Teachers::GetSubjectNameById($this->mSubjectId);
            //Guard against csrf attack 
            if(!hash_equals($this->mCsrffirstca, $_POST['csrffirstca']))
            {
                $this->mErrorMessage = 'The page submitted is unknown to the system hence the error. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$mSubjectName)
            {
                $this->mErrorMessage = 'The subject selected is not registered for this class, please contact the admin for clearification. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The term has ended, please contact admin to set new term start date. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                /*
                    Here shows that the csrf attack has been taken care-of and every thing is clare, so we can proceed with the precessing.
                    1. We'll grab the ID of the class for wich to add the first ca
                    2. We need to know what term, section, and what ca it is.
                */
                $this->mSubjectName = $mSubjectName['name'];
                $_SESSION['subject_name'] = $this->mSubjectName;
                $_SESSION['ca_type'] = filter_input(INPUT_POST, 'CaType', FILTER_SANITIZE_STRING);

                $this->mClassId = (int)filter_input(INPUT_POST, 'ClassActionId', FILTER_VALIDATE_INT); 
                $_SESSION['classid'] = $this->mClassId;
                    
                $active_status = 1;
                $this->mConfirmatoryList = Teachers::GetListOfAdmittedStudentByClassId($this->mClassId, $this->mCurrentTerm, $active_status);
                $this->mConfirmatoryListCount = count($this->mConfirmatoryList);

                #Just before we add any scores we need to check and see what has been added
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                $result = Teachers::IsSubjectExamDone($this->mSubjectId, $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);
                $result = (int)$result['alreadytotal'];

                #This code below checks and makes sure that if the particular CA has been recorded once, then it should not be repeated again.//examsForStorage
                if($result > 0)
                {
                    $this->mErrorMessage = 'Exams Marks for '. $_SESSION['subject_name'].' has been recorded. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    $this->mContentCell = 'warning_box.tpl';
                }
                else
                    $this->mContentCell = 'exams_adder.tpl';
            }

        }

        /*
        The exams step--STEP 2
        */
        if(isset($_POST['examsForStorage']))
        {
            #The code below will take all the submited scores and student ID, then prepare for calling the function that will add the data to the database.
            #1.student ids
            $this->mSubjectId = $_SESSION['subject_id'];

            $mStudentIdz = array();
            $this->mStudentIdz = filter_input(INPUT_POST, 'student_id', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            foreach($this->mStudentIdz as $key => $idz)
            {
                $mStudentIdz[$key] = (int)$idz;
            }

            $letters = array();
            $mStudentScores = array();

            #This logic below prevent non-numeric and number above 20 from being inputed as as value of CA.
            $this->mStudentScores = filter_input(INPUT_POST, 'exams_score', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            foreach($this->mStudentScores as $key => $scores)
            {
                if(is_numeric($scores) && $scores < 40.1)
                    $mStudentScores[$key] = (int)$scores;
                else
                    $letters[] = $scores;
            }

            #This ensures that only numeric values are used by the system
            if(count($letters) > 0)
            {
                $this->mErrorMessage = 'Please use only numbers less than 40.1 for the CA values. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The term has ended, please contact admin to set new term start date. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';

                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                $this->mClassId = $_SESSION['classid'];
                $addedIds = array();
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                #Call the function that will add these scores to the database.
                foreach ($mStudentScores as $key => $stScores) 
                {
                    
                    Teachers::UpdateExamzForOneStudent((int)$this->mSubjectId, $stScores, (int)$mStudentIdz[$key], $this->mCurrentTermId, $this->mDepartmentName, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds);
                    $addedIds[] = $key;

                }

                if(count($addedIds) == count($mStudentIdz))
                {
                    #show success report  personalprogress
                    $this->mConfirmationHeading = 'Exams scores for ' . $_SESSION['subject_name'] . ' recorded successfully!';
                    $this->mConfirmationMessage = 'The total of ' . count($addedIds) . ' students records was entered. <br><br>You can improve your productivity by sugesting what works best for you and BlueMark will ensure the implemetation.<br><br>Thank you for choosing  <span style="color: blue">BlueMark </span> <br><br> <a href="'.$this->mToTeachersClassPage.'" class="btn btn-outline btn-success"> Success ok </a>';
                    $this->mShowCaLinks = true;
                    $this->mContentCell = 'confirmed_box.tpl';
                }
                else
                {
                    $this->mErrorMessage = 'An unexpected network error, please contact the BlueMark-administrator-(08134899043) for clearification. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    $this->mContentCell = 'warning_box.tpl';
                }

            }

        }














































        /*
        The logi below will handle the student records computation and presentation of a tabulated results
        */
        if(isset($_POST['ClassAction']) && isset($_POST['StudentId']) && $_POST['ClassAction'] == 'CaExamsRecords' && isset($_POST['view_record']))
        {
            $_SESSION['CaExamsStudentId'] = (int)filter_input(INPUT_POST, 'StudentId', FILTER_VALIDATE_INT);
            $_SESSION['CaExamsClassId'] = (int)filter_input(INPUT_POST, 'ClassId', FILTER_VALIDATE_INT);

            if(!is_numeric($_SESSION['CaExamsStudentId']) || !is_numeric($_SESSION['CaExamsClassId']))
            {

                $this->mErrorMessage = 'An unexpected parameter error, please contact the admin for clearification. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';

            }
            else
            {
                // cc thisTermStarted ;mGetStudentCaExamsRecordsCount
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($_SESSION['CaExamsClassId']);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                $this->mStudentCaExamRecord = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                $this->mGetStudentCaExamsRecordsCount = count($this->mStudentCaExamRecord);
                if($this->mGetStudentCaExamsRecordsCount > 0)
                {
                    $this->mStudentName = $this->mStudentCaExamRecord[0]['firstname'] . ' ' . $this->mStudentCaExamRecord[0]['surname'];
                    $this->mStudentCaExamRecordCount = count($this->mStudentCaExamRecord);

                    $this->mStudentIdz = $_SESSION['CaExamsStudentId'];
                    $this->mClassId = $_SESSION['CaExamsClassId'];
                    $this->mTeacherStudentDetail = Link::ToTeacherStudentDetail($this->mStudentIdz, $this->mClassId);

                    $this->mContentCell = 'student_record_box.tpl';

                }
                else
                {
                    
                    // --------------------------------------EditfirstCa
                    $this->mSubjectOfferedBySpecificClass = Teachers::GetAllSubjectsForASpecifiedClass($_SESSION['CaExamsClassId']);
                    $this->mConfirmatoryListCount = count($this->mSubjectOfferedBySpecificClass);
                    //-------------------------------------------
                    $mStudentFullName = Teachers::GetStudentFullname($_SESSION['CaExamsStudentId']);

                    $this->mStudentFullName = $mStudentFullName['firstname'] .' '.$mStudentFullName['surname'];
                    //-----------------------------------------------
                    $this->mCaTypes;
                        // ------------------------------------------------------//
                    $this->mConfirmatoryListErrMsg = "No CAs or Exams Records found";
                    $this->mContentCell = 'ca_to_add_selector_box.tpl';
                    // 3094 mGetStudentCaExamsRecordsCount
                }
                    

            }

        }


        
        /*
            THE LOGIC BELOW WILL WILL SHOW IF THE PARTICULAR STUDENTS CA RECORD HAS NOT BEEN ENTERED INTO THE DATABASE 
        
        */
        if(isset($_POST['submitBtnSingleCA']))
        {

            //Retrieve the post-values as a local variable 
            $this->mStudentId = (int)$_SESSION['CaExamsStudentId'];
            $this->mClassId = (int)$_SESSION['CaExamsClassId'];
            
            $this->mSubjectId = (int)filter_input(INPUT_POST, 'subject_id', FILTER_VALIDATE_INT);
            $this->mCaType = (int)filter_input(INPUT_POST, 'ca_type', FILTER_VALIDATE_INT);
            $this->mScore = (int)filter_input(INPUT_POST, 'score_mark', FILTER_VALIDATE_INT);

            // var_dump($this->mStudentId, $this->mClassId, $this->mSubjectId, $this->mCaType, $this->mScore);

            // Make sure the entered score is a number and not empty
            if((empty($this->mScore)) || (!is_numeric($this->mScore)))
            {
                $this->mErrorMessage = 'Enter a numeric value for the student score. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';

            }
            else
            {
                //Here means every is looking good so we switch to know what CA this is, then act accordingly
                switch ($this->mCaType) {
                    case 1:
                        # code This is first CA ...
                        $this->mCaType = 'first_ca';
                        $addedIds = array();

                        #Retrieve the department name EditfirstCa
                        $mDepartmentName = Teachers::GetDepartnameUsingClassId($_SESSION['CaExamsClassId']);
                        $this->mDepartmentName = $mDepartmentName['department_name'];

                        $addedIds[] = Teachers::AddCA_record($this->mScore, $this->mStudentId, $this->mSubjectId, $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $this->mCaType, $this->mTodayDate);

                        #Retrieve the subject name
                        $mSubjectName = Teachers::GetSubjectNameById($this->mSubjectId);
                        $this->mSubjectName = $mSubjectName['name'];

        
                        #Display success message
                        $this->mConfirmationHeading = 'First CA for ' . $this->mSubjectName . ' recorded successfully!';
                        $this->mConfirmationMessage = 'The total of ' . count($addedIds) . ' was entered. You can improve your productivity by sugesting what works best for you and BlueMark will move to its implemetation. <br><br> <a href="'.$this->mToTeachersClassPage.'" class="btn btn-outline btn-success"> Success ok </a>';
                        $this->mShowCaLinks = true;
                        $this->mContentCell = 'confirmed_box.tpl';
                        break;

                    case 2:
                        # code This is second CA...
                        Teachers::UpdateSecondCazForOneStudent($this->mSubjectId, $this->mScore, $this->mStudentId, $this->mCurrentTermId, $this->mDepartmentName, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds);

                        #Retrieve the subject name
                        $mSubjectName = Teachers::GetSubjectNameById($this->mSubjectId);
                        $this->mSubjectName = $mSubjectName['name'];

                        #Display success message
                        $this->mConfirmationHeading = 'Second CA for ' . $this->mSubjectName . ' recorded successfully!';
                        $this->mConfirmationMessage = 'The total number of record entered is 1. You can improve your productivity by sugesting what works best for you and BlueMark will move to its implemetation. <br><br> <a href="'.$this->mToTeachersClassPage.'" class="btn btn-outline btn-success"> Success ok </a>';
                        $this->mShowCaLinks = true;
                        $this->mContentCell = 'confirmed_box.tpl';

                        break;
                    case 3:
                        # code This is Third CA...
                        Teachers::UpdateThirdCazForOneStudent($this->mSubjectId, $this->mScore, $this->mStudentId, $this->mCurrentTermId, $this->mDepartmentName, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds);

                        #Retrieve the subject name
                        $mSubjectName = Teachers::GetSubjectNameById($this->mSubjectId);
                        $this->mSubjectName = $mSubjectName['name'];

                        #Display success message
                        $this->mConfirmationHeading = 'Third CA for ' . $this->mSubjectName . ' recorded successfully!';
                        $this->mConfirmationMessage = 'The total number of record entered is 1. You can improve your productivity by sugesting what works best for you and BlueMark will move to its implemetation. <br><br> <a href="'.$this->mToTeachersClassPage.'" class="btn btn-outline btn-success"> Success ok </a>';
                        $this->mShowCaLinks = true;
                        $this->mContentCell = 'confirmed_box.tpl';
                        break;
                    case 4:
                        # code This is Exams Scores...
                        Teachers::UpdateExamzForOneStudent($this->mSubjectId, $this->mScore, $this->mStudentId, $this->mCurrentTermId, $this->mDepartmentName, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds);

                        #Retrieve the subject name
                        $mSubjectName = Teachers::GetSubjectNameById($this->mSubjectId);
                        $this->mSubjectName = $mSubjectName['name'];

                        #Display success message
                        $this->mConfirmationHeading = 'Exam for ' . $this->mSubjectName . ' recorded successfully!';
                        $this->mConfirmationMessage = 'The total number of record entered is 1. You can improve your productivity by sugesting what works best for you and BlueMark will move to its implemetation. <br><br> <a href="'.$this->mToTeachersClassPage.'" class="btn btn-outline btn-success"> Success ok </a>';
                        $this->mShowCaLinks = true;
                        $this->mContentCell = 'confirmed_box.tpl';

                        break;
                    default:
                        # code...
                        $this->mErrorMessage = 'Enter a numeric value for the student score. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                        $this->mContentCell = 'warning_box.tpl';
                        break;
                }

            }

        }




        /*
        THE LOGIC BELOW WILL WILL SHOW THE FULL DETAIL OF A STUDENT TO HIS TEACHER FROM THE TEACHERS PAGE.33
        */
        

        if(isset($_GET['ClassAction']) && $_GET['ClassAction'] === 'ShowStudentDetails' && isset($_GET['StudentId']) && isset($_GET['ClassId']))
        {
            $this->mStudentIdz = (int)filter_input(INPUT_GET, 'StudentId', FILTER_VALIDATE_INT);
            $this->mClassId = (int)filter_input(INPUT_GET, 'ClassId', FILTER_VALIDATE_INT);
            if(!is_numeric($this->mStudentIdz) || !is_numeric($this->mClassId))
            {
                $this->mErrorMessage = 'An unexpected parameter error, please contact the admin for clearification. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {

                #Call the function to get all neaccessary details about this particular student.
                $this->mStudentsDetails = Teachers::GetStudentsFullDetailsForTeacher($this->mStudentIdz);
                $this->mAdmittedClassId = (int)$this->mStudentsDetails['class_assigned'];
                // have not writen this function
                $this->mClassName_admited = Customer::GetClassNameById($this->mAdmittedClassId);
                $this->mClassName_current = Customer::GetClassNameById($this->mClassId);
                
                $this->mProfilePassport = $this->mStudentsDetails['image1'];
                $pos = strpos($this->mStudentsDetails['email'], '@');
                $userfolder = substr($this->mStudentsDetails['email'], 0, $pos) . '_folder';

                //Student Passport Location
                $this->mPassportUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$userfolder.DIRECTORY_SEPARATOR. $this->mProfilePassport);

                if($this->mStudentsDetails['gender'] == 1)
                    $this->mGender = 'Male';
                else
                    $this->mGender = 'Female';

                if($this->mStudentsDetails['othername'])
                    $this->mOthername = $this->mStudentsDetails['othername'];
                else
                    $this->mOthername = '';
                
                $this->mStudentName = $this->mStudentsDetails['firstname'] .' '.$this->mStudentsDetails['surname'];

                $this->mConfirmatoryListCount = count($this->mStudentsDetails);
                $this->mContentCell = 'student_teacher_mini_info.tpl';

            }
        }











        /*
        This section below handle the editing of CA and EXAM student scores
        All CA is handled below 
        */
        if(isset($_POST['EditfirstCa']))
        {
            
            if(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'Editing is deactivated when the term ends. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                $this->mEditFirstCa = true;
                $this->mEditSecondCa = false;
                $this->mEditThirdCa = false;
                $this->mEditExams = false;
                // -----------------------------------mStudentCaExamsRecords
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($_SESSION['CaExamsClassId']);
                $this->mDepartmentName = $mDepartmentName['department_name'];
// mStudentCaExamRecord
                $this->mStudentCaExamRecord = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                $this->mStudentName = $this->mStudentCaExamRecord[0]['firstname'] . ' ' . $this->mStudentCaExamRecord[0]['surname'];
                // mGetStudentCaExamsRecordsCount
                $this->mGetStudentCaExamsRecordsCount = count($this->mStudentCaExamRecord);

                $this->mContentCell = 'student_record_box.tpl';

            }
            
        }



        //FINISH EDITING first CA (FinishEditfirstCa) LOGIC BELOW 
        if(isset($_POST['FinishEditfirstCa']))
        {
            #We will retrieve the values(marks) that were updated,
            #We'll retrieve the IDs of the various subjects for which updates was made 
            #We' ll retrieve the id of the student whos marks are being updated 
            $this->firstCaScores = filter_input(INPUT_POST, 'firstCaScores', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $this->mSubjectId = filter_input(INPUT_POST, 'subject_id', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $this->mStudentIdz = (int)filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);

            #The code that will prevent non-numeric values from being added as scores 
            
            #Call the function that will update the marks in the database table 
            $letters = array();
            $mStudentScores = array();
            foreach($this->firstCaScores as $key => $scores)
            {
                if(is_numeric($scores) && $scores < 20.1)
                    $mStudentScores[$key] = (int)$scores;
                else
                    $letters[] = $scores;
            }


            if(count($letters) > 0)
            {
                $this->mErrorMessage = 'An unexpected non-numeric value or value greater than 20 was found in the CA marks you entered, please use only numbers for the CA values. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The term has ended, and editing deactivated. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';

                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                $this->mClassId =  $_SESSION['CaExamsClassId'];
                $addedIds = array();
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                foreach ($mStudentScores as $key => $stScores) 
                {
                    Teachers::UpdateFirstCazForOneStudent((int)$this->mSubjectId[$key], $stScores, $this->mStudentIdz, $this->mCurrentTermId, $this->mDepartmentName, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds);
                }
                
                #Show the outcome to the teacher user that his or her update is succesful
                $this->mEditFirstCa = false;
                $this->mEditSecondCa = false;
                $this->mEditThirdCa = false;
                $this->mEditExams = false;
                
                // ------------------------------------------------------------
                $this->mStudentCaExamRecord = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                $this->mStudentName = $this->mStudentCaExamRecord[0]['firstname'] . ' ' . $this->mStudentCaExamRecord[0]['surname'];
                $this->mGetStudentCaExamsRecordsCount = count($this->mStudentCaExamRecord);
                //-----------------------------------------------------

                $this->mContentCell = 'student_record_box.tpl';

            }
            
        }

        //2nd CA Edit
        if(isset($_POST['EditsecondCa']))
        {
            if(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The term has ended, and editing deactivated. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';

                $this->mContentCell = 'warning_box.tpl';

            }
            else 
            {
                $this->mEditFirstCa = false;
                $this->mEditSecondCa = true;
                $this->mEditThirdCa = false;
                $this->mEditExams = false;
                // ----------------------------------------
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($_SESSION['CaExamsClassId']);
                $this->mDepartmentName = $mDepartmentName['department_name'];
                //----------------------------------------------
                // $this->mConfirmatoryList = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                // $this->mStudentName = $this->mConfirmatoryList[0]['firstname'] . ' ' . $this->mConfirmatoryList[0]['surname'];
                // $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                //---------------------------------------------------
                $this->mStudentCaExamRecord = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                $this->mStudentName = $this->mStudentCaExamRecord[0]['firstname'] . ' ' . $this->mStudentCaExamRecord[0]['surname'];
                $this->mGetStudentCaExamsRecordsCount = count($this->mStudentCaExamRecord);

                $this->mContentCell = 'student_record_box.tpl';

            }
            
        }


        //FINISH EDITING second CA (FinishEditsecondCa) LOGIC BELOW
        if(isset($_POST['FinishEditsecondCa']))
        {
            #We will retrieve the values(marks) that were updated,
            #We'll retrieve the IDs of the various subjects for which updates was made 
            #We' ll retrieve the id of the student whos marks are being updated 
            $this->secondCaScores = filter_input(INPUT_POST, 'secondCaScores', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $this->mSubjectId = filter_input(INPUT_POST, 'subject_id', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $this->mStudentIdz = (int)filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);


            #The code that will prevent non-numeric values from being added as scores then
            #Call the function that will update the marks in the database table 
            $letters = array();
            $mStudentScores = array();
            
            foreach($this->secondCaScores as $key => $scores)
            {
                if(is_numeric($scores) && $scores < 20.1)
                    $mStudentScores[$key] = (int)$scores;
                else
                    $letters[] = $scores;
            }

            $result = array();
            $mDepartmentName = Teachers::GetDepartnameUsingClassId($_SESSION['CaExamsClassId']);
            $this->mDepartmentName = $mDepartmentName['department_name'];
            

            #The code below check to make sure the particulat subject CA marks had previously been record before any updation operation can be carried out on it.
            foreach ($this->mSubjectId as $key => $subject_id) {

                $result[] = Teachers::IsSubject2CaDone($subject_id, $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);

            }
            
            $oneIsEmpty = false;
            for ($i=0; $i < count($result); $i++) { 
                if((int)$result[$i]['alreadytotal'] == 0)
                    $oneIsEmpty = true;
            
            }


            if(count($letters) > 0 || $oneIsEmpty == true)
            {
                $this->mErrorMessage = 'An unexpected non-numeric value or value greater than 20 may have caused an error in the CA marks you entered, please use only numbers for the CA values. <br><br>Please also ensure that these CAs had previously been recorded before updating as it can cause such errors to occure. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mWeekValues)
            {

                $this->mErrorMessage = 'The term has ended and all editing deactivated. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';

            }
            else
            {
                
                $this->mClassId =  $_SESSION['CaExamsClassId'];
                $addedIds = array();

                foreach ($mStudentScores as $key => $stScores) 
                {
                    
                    Teachers::UpdateSecondCazForOneStudent((int)$this->mSubjectId[$key], $stScores, $this->mStudentIdz, $this->mCurrentTermId, $this->mDepartmentName, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds);

                }
                #Show the outcome to the teacher user that his or her update is succesful
                $this->mEditFirstCa = false;
                $this->mEditSecondCa = false;
                $this->mEditThirdCa = false;
                $this->mEditExams = false;
                // -----------------------------------mGetStudentCaExamsRecordsCount

                // $this->mConfirmatoryList = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                // $this->mStudentName = $this->mConfirmatoryList[0]['firstname'] . ' ' . $this->mConfirmatoryList[0]['surname'];
                // $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                // -----------------------------------------------
                $this->mStudentCaExamRecord = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                $this->mStudentName = $this->mStudentCaExamRecord[0]['firstname'] . ' ' . $this->mStudentCaExamRecord[0]['surname'];
                $this->mGetStudentCaExamsRecordsCount = count($this->mStudentCaExamRecord);

                $this->mContentCell = 'student_record_box.tpl';
                
            }

        }


        //3 CA Edit
        if(isset($_POST['EditthirdCa']))
        {
            if(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The term has ended and all editing deactivated. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';

            }
            else 
            {
                $this->mEditFirstCa = false;
                $this->mEditSecondCa = false;
                $this->mEditThirdCa = true;
                $this->mEditExams = false;
                // ----------------------------------------
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($_SESSION['CaExamsClassId']);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                // $this->mConfirmatoryList = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                // $this->mStudentName = $this->mConfirmatoryList[0]['firstname'] . ' ' . $this->mConfirmatoryList[0]['surname'];
                // $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                //------------------------------------------------------
                $this->mStudentCaExamRecord = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                $this->mStudentName = $this->mStudentCaExamRecord[0]['firstname'] . ' ' . $this->mStudentCaExamRecord[0]['surname'];
                $this->mGetStudentCaExamsRecordsCount = count($this->mStudentCaExamRecord);

                $this->mContentCell = 'student_record_box.tpl';

            }
            

        }

        //FINISH EDITING Third CA (FinishEditthirdCa) LOGIC BELOW
        if(isset($_POST['FinishEditthirdCa']))
        {
            #We will retrieve the values(marks) that were updated,
            #We'll retrieve the IDs of the various subjects for which updates was made 
            #We' ll retrieve the id of the student whos marks are being updated 
            $this->thirdCaScores = filter_input(INPUT_POST, 'thirdCaScores', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $this->mSubjectId = filter_input(INPUT_POST, 'subject_id', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $this->mStudentIdz = (int)filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);

            #The code that will prevent non-numeric values from being added as scores then
            $letters = array();
            $mStudentScores = array();
            
            foreach($this->thirdCaScores as $key => $scores)
            {
                if(is_numeric($scores) && $scores < 20.1)
                    $mStudentScores[$key] = (int)$scores;
                else
                    $letters[] = $scores;
            }

            $result = array();
            $mDepartmentName = Teachers::GetDepartnameUsingClassId($_SESSION['CaExamsClassId']);
            $this->mDepartmentName = $mDepartmentName['department_name'];

            $oneIsEmpty = false;
            #The code below check to make sure the particulat subject CA marks had previously been record before any updation operation can be carried out on it.
            foreach ($this->mSubjectId as $key => $subject_id) {

                $result[] = Teachers::IsSubject3CaDone($subject_id, $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);

            }
            
            for ($i=0; $i < count($result); $i++) { 
                if((int)$result[$i]['alreadytotal'] == 0)
                    $oneIsEmpty = true;
            }
            
            if(count($letters) > 0 || $oneIsEmpty == true)
            {
                $this->mErrorMessage = 'An unexpected non-numeric value or value greater than 20 may have caused an error in the CA marks you entered, please use only numbers for the CA values. <br><br>Please also ensure that these CAs had previously been recorded before updating as it can cause such errors to occure. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'Term has ended and all editing is deactivated. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                $this->mClassId =  $_SESSION['CaExamsClassId'];
                $addedIds = array();

                foreach ($mStudentScores as $key => $stScores) 
                {
                    // UpdateFirstCazForOneStudent
                    Teachers::UpdateThirdCazForOneStudent((int)$this->mSubjectId[$key], $stScores, $this->mStudentIdz, $this->mCurrentTermId, $this->mDepartmentName, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds);
                }
                #Show the outcome to the teacher user that his or her update is succesful
                $this->mEditFirstCa = false;
                $this->mEditSecondCa = false;
                $this->mEditThirdCa = false;
                $this->mEditExams = false;
                // -----------------------------------
                // $this->mConfirmatoryList = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                // $this->mStudentName = $this->mConfirmatoryList[0]['firstname'] . ' ' . $this->mConfirmatoryList[0]['surname'];
                // $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                // ------------------------------------------
                $this->mStudentCaExamRecord = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                $this->mStudentName = $this->mStudentCaExamRecord[0]['firstname'] . ' ' . $this->mStudentCaExamRecord[0]['surname'];
                $this->mGetStudentCaExamsRecordsCount = count($this->mStudentCaExamRecord);

                $this->mContentCell = 'student_record_box.tpl';
            }

        }



        //Edite Exams 
        if(isset($_POST['Editexams']))
        {
            if(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'Term has ended and all editing is deactivated. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';

            }
            else 
            {
                $this->mEditFirstCa = false;
                $this->mEditSecondCa = false;
                $this->mEditThirdCa = false;
                $this->mEditExams = true;
                // ----------------------------------------
                $mDepartmentName = Teachers::GetDepartnameUsingClassId($_SESSION['CaExamsClassId']);
                $this->mDepartmentName = $mDepartmentName['department_name'];
                // ---------------------------------------------
                // $this->mConfirmatoryList = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                // $this->mStudentName = $this->mConfirmatoryList[0]['firstname'] . ' ' . $this->mConfirmatoryList[0]['surname'];
                // $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                //------------------------------------------------
                $this->mStudentCaExamRecord = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                $this->mStudentName = $this->mStudentCaExamRecord[0]['firstname'] . ' ' . $this->mStudentCaExamRecord[0]['surname'];
                $this->mGetStudentCaExamsRecordsCount = count($this->mStudentCaExamRecord);

                $this->mContentCell = 'student_record_box.tpl';

            }
            
        }


         //FINISH EDITING Exams (FinishEditexams) LOGIC BELOW
        if(isset($_POST['FinishEditexams']))
        {
            #We will retrieve the values(marks) that were updated,
            #We'll retrieve the IDs of the various subjects for which updates was made 
            #We' ll retrieve the id of the student whos marks are being updated 
            $this->examScores = filter_input(INPUT_POST, 'examScores', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $this->mSubjectId = filter_input(INPUT_POST, 'subject_id', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            $this->mStudentIdz = (int)filter_input(INPUT_POST, 'student_id', FILTER_VALIDATE_INT);

            #The code that will prevent non-numeric values from being added as scores then
            $letters = array();
            $mStudentScores = array();
            
            foreach($this->examScores as $key => $scores)
            {
                if(is_numeric($scores) && $scores < 40.1)
                    $mStudentScores[$key] = (int)$scores;
                else
                    $letters[] = $scores;
            }

            $result = array();
            $mDepartmentName = Teachers::GetDepartnameUsingClassId($_SESSION['CaExamsClassId']);
            $this->mDepartmentName = $mDepartmentName['department_name'];

            #The code below check to make sure the particulat subject CA marks had previously been record before any updation operation can be carried out on it.
            foreach ($this->mSubjectId as $key => $subject_id) {

                $result[] = Teachers::IsSubjectExamDone($subject_id, $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);

            }
            
            $oneIsEmpty = false;
            for ($i=0; $i < count($result); $i++) { 
                if((int)$result[$i]['alreadytotal'] == 0)
                    $oneIsEmpty = true;
            }

            if(count($letters) > 0 || $oneIsEmpty == true)
            {
                $this->mErrorMessage = 'An unexpected non-numeric value or value greater than Exams-Total may have caused an error in the CA marks you entered, please use only numbers for the CA values. <br><br>Please also ensure that these CAs had previously been recorded before updating as it can cause such errors to occure. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mWeekValues)
            {
                 $this->mErrorMessage = 'Term has ended, and all editing deactivated. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                $this->mContentCell = 'warning_box.tpl';
                
            }
            else
            {
                
                $this->mClassId =  $_SESSION['CaExamsClassId'];
                $addedIds = array();
                // $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                // $this->mDepartmentName = $mDepartmentName['name'];

                foreach ($mStudentScores as $key => $stScores) 
                {
                    // UpdateFirstCazForOneStudent
                    Teachers::UpdateExamzForOneStudent((int)$this->mSubjectId[$key], $stScores, $this->mStudentIdz, $this->mCurrentTermId, $this->mDepartmentName, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds);
                }
                #Show the outcome to the teacher user that his or her update is succesful
                $this->mEditFirstCa = false;
                $this->mEditSecondCa = false;
                $this->mEditThirdCa = false;
                $this->mEditExams = false;
                // -----------------------------------

                // $this->mConfirmatoryList = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                // $this->mStudentName = $this->mConfirmatoryList[0]['firstname'] . ' ' . $this->mConfirmatoryList[0]['surname'];
                // $this->mConfirmatoryListCount = count($this->mConfirmatoryList);
                // ------------------------------------------
                $this->mStudentCaExamRecord = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                $this->mStudentName = $this->mStudentCaExamRecord[0]['firstname'] . ' ' . $this->mStudentCaExamRecord[0]['surname'];
                $this->mGetStudentCaExamsRecordsCount = count($this->mStudentCaExamRecord);

                $this->mContentCell = 'student_record_box.tpl';

            }

        }






        //THIS SECTION OF CODE BELOW TAKES CARE OF STUDENTS PERSONAL PROGRESS 
        if(isset($_POST['personalprogress']))
        {
            if(!hash_equals($this->mCsrffirstca, $_POST['csrffirstca']))
            {
                $this->mErrorMessage = 'The page submitted is unknown to the system hence the error. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mWeekValues)
            {
                $this->mErrorMessage = 'The term has ended and all report-card related activities are deactivated. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            else 
            {
                $this->mClassId = (int)$_SESSION['CaExamsClassId'];
                $this->mStudentIdz = (int)$_SESSION['CaExamsStudentId'];

                #Collect all the values for the personal progress.
                $this->mPunctuality = (int)filter_input(INPUT_POST, 'punctuality', FILTER_VALIDATE_INT);
                $this->mRespect = (int)filter_input(INPUT_POST, 'respect', FILTER_VALIDATE_INT);
                $this->mPoliteness = (int)filter_input(INPUT_POST, 'politeness', FILTER_VALIDATE_INT);
                $this->mRelationship = (int)filter_input(INPUT_POST, 'relationship', FILTER_VALIDATE_INT);
                $this->mAttentiveness = (int)filter_input(INPUT_POST, 'attentiveness', FILTER_VALIDATE_INT);
                $this->mObedience = (int)filter_input(INPUT_POST, 'obedience', FILTER_VALIDATE_INT);
                $this->mNeatness = (int)filter_input(INPUT_POST, 'neatness', FILTER_VALIDATE_INT);
                $this->mHandwriting = (int)filter_input(INPUT_POST, 'handwriting', FILTER_VALIDATE_INT);
                $this->mFluency = (int)filter_input(INPUT_POST, 'fluency', FILTER_VALIDATE_INT);
                $this->mFriendliness = (int)filter_input(INPUT_POST, 'friendliness', FILTER_VALIDATE_INT);

                #Teachers comment and Next Term Start Date 
                $this->mNextTermStarts = filter_input(INPUT_POST, 'nextTermStarts');
                $this->mTeachersComment = filter_input(INPUT_POST, 'teacherComment', FILTER_SANITIZE_STRING);

                $pattern = '/^[a-zA-Z0-9\.\s-]{3,}$/';


                #If any of the values is not numeric show error
                if(!is_numeric($this->mPunctuality) || $this->mPunctuality == 0 || !is_numeric($this->mRespect) || $this->mRespect == 0 || !is_numeric($this->mPoliteness) || $this->mPoliteness == 0 || !is_numeric($this->mRelationship) || $this->mRelationship == 0 || !is_numeric($this->mAttentiveness) || $this->mAttentiveness == 0 || !is_numeric($this->mObedience) || $this->mObedience == 0 || !is_numeric($this->mNeatness) || $this->mNeatness == 0 || !is_numeric($this->mHandwriting) || $this->mHandwriting == 0 || !is_numeric($this->mFluency) || $this->mFluency == 0 || !is_numeric($this->mFriendliness) || $this->mFriendliness == 0)
                {
                    $this->mErrorMessage = 'All fields are required. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                    $this->mContentCell = 'warning_box.tpl';
                   

                }
                elseif(!preg_match($pattern, $this->mTeachersComment))
                {
                    $this->mErrorMessage = 'The Teachers Comment contains value(s) unknown to the system hence the error. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                    $this->mContentCell = 'warning_box.tpl';
                    

                }
                elseif(empty($this->mNextTermStarts) || (strtotime($this->mNextTermStarts) < strtotime($this->thisTermEnds)))
                {
                    $this->mErrorMessage = 'Please enter the Next Term Start Date, it must be accurate to a date in the future. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                    $this->mContentCell = 'warning_box.tpl';

                }
                else
                {
                    ##Call the function to store it in the database 
                    $id = Teachers::AddStudentsPersonalProgress($this->mClassId, $this->mStudentIdz, $this->mCurrentTermId, $this->mPunctuality, $this->mRespect, $this->mPoliteness, $this->mRelationship, $this->mAttentiveness, $this->mObedience, $this->mNeatness, $this->mHandwriting, $this->mFluency, $this->mFriendliness, $this->mTeachersComment);

                    #Using update statement insert the date and techers comment
                    if($id)
                    {
                        #1. Update the Next time school starts date
                        #2. Show the persons record page again.
                        $tableId = 1;
                        Teachers::UpdateNextTermStartDate($this->mNextTermStarts, $tableId);

                        #Show the outcome to the teacher user that his or her update is succesful  mGetStudentCaExamsRecordsCount
                        $this->mEditFirstCa = false;
                        $this->mEditSecondCa = false;
                        $this->mEditThirdCa = false;
                        $this->mEditExams = false;
                        $this->mProgressComfirm = true;

                        // ----------------------------------- mGetStudentCaExamsRecordsCount
                        $mDepartmentName = Teachers::GetDepartnameUsingClassId($_SESSION['CaExamsClassId']);
                        $this->mDepartmentName = $mDepartmentName['department_name'];

                        // ----------------------------------
                        $this->mStudentCaExamRecord = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                        $this->mStudentName = $this->mStudentCaExamRecord[0]['firstname'] . ' ' . $this->mStudentCaExamRecord[0]['surname'];
                        $this->mGetStudentCaExamsRecordsCount = count($this->mStudentCaExamRecord);

                        $this->mContentCell = 'student_record_box.tpl';

                    }


                }
            }
        }


















        /*
        THE CODE BELOW GENERATES THE PARTICULAR STUDENT REPORT SHEET
        personalprogress
        */
        if(isset($_POST['studentReportSheetBtn']) && isset($_POST['pdf_generator']) && $_POST['pdf_generator'] === 'generatePDFreport')
        {
            // -------------------STOP STOP HERE-----------------------------
            #Rerieve the class and students IDs
            $this->mClassId = (int)$_SESSION['CaExamsClassId'];
            $this->mStudentIdz = (int)$_SESSION['CaExamsStudentId'];

            #Retrieves a complete list of subjects offered in this class
            $this->mSubjectOfferedBySpecificClass = Teachers::GetAllSubjectsForASpecifiedClass($this->mClassId);

            if($this->mSubjectOfferedBySpecificClass)
            {
                #For each of the subjects id in the above array, we shall start checking if the various 123 and exams records exists for this term
                // -------------------------------------

                $mDepartmentName = Teachers::GetDepartnameUsingClassId($_SESSION['CaExamsClassId']);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                // -----------------------------------------------
                #Retrieve the the student progress matrix, it will also be be used as a check if the teacher had record it fot this student
                

                $this->mStudentProgressMatrix = Teachers::GetStudentProgressMatrix($this->mClassId, $this->mStudentIdz, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds);

                // -----------------------Checkings-------------------------------------
                $result2 = array();
                $result2HasZero = false;
                foreach ($this->mSubjectOfferedBySpecificClass as $key => $value) {
                    
                    $result2[] = Teachers::IsSubject2CaDone((int)$value['subject_id'], $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);

                }
                
                // var_dump($result2);



                for ($i=0; $i < count($result2); $i++) { 
                    if((int)$result2[$i]['alreadytotal'] == 0)
                        $result2HasZero = true;
                }
                
                // -------------------------
                $result3 = array();
                $result3HasZero = false;

                foreach ($this->mSubjectOfferedBySpecificClass as $key => $value) {
                    $result3[] = Teachers::IsSubject3CaDone((int)$value['subject_id'], $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);
                }
                for ($i=0; $i < count($result3); $i++) { 
                    if((int)$result3[$i]['alreadytotal'] == 0)
                        $result3HasZero = true;
                }
                
                // -------------------------
                $resultE = array();
                $resultEHasZero = false;
                foreach ($this->mSubjectOfferedBySpecificClass as $key => $value) {

                    $resultE[] = Teachers::IsSubjectExamDone((int)$value['subject_id'], $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);

                }
                for ($i=0; $i < count($resultE); $i++) { 
                    if((int)$resultE[$i]['alreadytotal'] == 0)
                        $resultEHasZero = true;
                }

            }
            else
            {
                $this->mErrorMessage = 'No subjects found. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
                
            }

            // --------------------Validations--------------------
            if(!hash_equals($this->mCsrffirstca, $_POST['csrffirstca']))
            {
                $this->mErrorMessage = 'The page submitted is unknown to the system hence the error. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!$this->mSubjectOfferedBySpecificClass)
            {
                 $this->mErrorMessage = 'No subjects found. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif(!$this->mStudentProgressMatrix)
            {
                $this->mErrorMessage = 'Enter the teachers remark and select this students progressive scores. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif($result2HasZero == true)
            {
                $this->mErrorMessage = 'Complete the second CA records for all the subjects. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            elseif($result3HasZero == true)
            {
                $this->mErrorMessage = 'Complete the Third CA records for all the subjects. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif($resultEHasZero == true)
            {
                $this->mErrorMessage = 'Complete the Exams records for all the subjects. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                #1. Get the total number of subjects offered in this class GetSubject
                $this->mClassSubjectCount = count($this->mSubjectOfferedBySpecificClass);

                #Retrieve this students Ca and Exams Record for this term
                $this->mConfirmatoryList = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                #Retrieve the grandtotal and average of all the subjects totals for this particular student
                $this->mStudentGrandTotalnAverage = Teachers::GetStudentsGrandTotal($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                #Retrieve the grandtotal and average of all the subjects totals for all students in this class
                $this->mAllGTotalnAverage = array();
                $active_status = 1;

                //1. We need the ids of all student in this class 
                $this->mAllStudentIds = Teachers::GetListOfAllStudentIDsInThisClass($this->mClassId, $this->mCurrentTerm, $active_status);

                #Count the number of student in the particular class
                $this->mNumberOfStudents = count($this->mAllStudentIds);

                //2. Use the retrieved ids ABOVE to get the grandtotal and average of all the subjects totals for each particular student
                foreach ($this->mAllStudentIds as $key => $studentId) {

                    $this->mAllGTotalnAverage[] = Teachers::GetStudentsGrandTotal((int)$studentId['student_id'], (int)$_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                }

                #We need to check the Averages-and-grandTotal table whether the terms grandtotal and average have have been recorded. The number that will be return here will be equall to the number of students in this class, this is because the "Grand-total" and "average" of each student is added only once in this term for a student in the table called "nry_recordsForAverageAndGtotal"
                $this->IsAverageAndGtotalsReady = (int)Teachers::CountRecordsForAverageAndGtotal((int)$_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

              //mReportCardDestination
                ##Check if the students average and grand total for this term has been entered as records
                if($this->IsAverageAndGtotalsReady <= 0)
                {
                    #This means that the nry_recordsForAverageAndGtotal (pry_recordsForAverageAndGtotal, sry_recordsForAverageAndGtotal-- as ther case may be) has no records of students grand-total and avereages for this term.
                    ##This function below will then record it 
                    foreach ($this->mAllGTotalnAverage as $key => $value) 
                    {
                        Teachers::RecordGrandTotalnAverages($value["student_id"], $value["grandtotal"], $value["average"], $this->mCurrentTermId, (int)$_SESSION['CaExamsClassId'], $this->mTodayDate, $this->mDepartmentName);
                    }
                    

                }
                
                #This section means that the count of the table return a number equal to the total number of student in that class for this term.
                #So this is the place to call for the grandtotal, averages and student position from the appropriate records table 
                

                #We need to check if the student class position has been recorded for this term and this class
                // $this->mIsPositionRecorded = (int)Teachers::IsPositionRecorde($this->mCurrentTermId, (int)$_SESSION['CaExamsClassId'], $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                if((int)Teachers::IsPositionRecorde($this->mCurrentTermId, (int)$_SESSION['CaExamsClassId'], $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName) <= 0)
                {
                    #Here means that the class position for each student in this class and term has nor been recorded accordingly
                    ##STep1 we retrieve the student_id and position
                    $this->mTermlyRecordnPosition = Teachers::GetTermlynPosition($this->mCurrentTermId, (int)$_SESSION['CaExamsClassId'], $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                    #step2 we use loop to Recorde it(update the respective columns)
                    foreach ($this->mTermlyRecordnPosition as $key => $value) 
                    {
                        Teachers::AddStudentsClassPosition((int)$value['rid'], (int)$value['student_id'], (int)$value['student_position'], (int)$_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);
                        
                    }
                }

                ##WE are now sure that the students class position has been inserted for every student of this class, this term. Then we can now use simple select statemennt to retrieve the student_id, graand-total, average and possition
                $this->mStudentGTAnPosition = Teachers::GetGTotalAveragePositionById($_SESSION['CaExamsStudentId'], (int)$_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                #We shall retrieve the total number of time school eas opened
                $this->mNumberOfTimeSchoolWasOpen = Teachers::GetNumberOfTimeSchoolWasOpen($this->thisTermStarted, $this->thisTermEnds);

                // -----------------------------------
                
                //Retrieve the number of times that this student attended school for this term
                $this->mTotalNumberOfAttendance = Teachers::GetStudentTotalNumberOfAttendance($this->mClassId, $this->mStudentIdz, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds);


                #PASSPORT tt
                // ------------------------------------------------------
                #Call the function to get all neaccessary details about this particular student.
                $this->mStudentsDetails = Teachers::GetStudentsFullDetailsForTeacher($this->mStudentIdz);

                //Hide the othername if it has no value 
                if($this->mStudentsDetails['othername'] == 'none')
                    $this->mOthername = '';
                else
                    $this->mOthername = $this->mStudentsDetails['othername'];

                if($this->mStudentsDetails['gender'] == 1)
                    $this->mGender = 'Male';
                else
                    $this->mGender = 'Female';

                $this->mStudentReportName = $this->mStudentsDetails['firstname'] .' '.$this->mStudentsDetails['othername'] .' '.$this->mStudentsDetails['surname'];


                #STUDENT CURRENT CLASS
                // -----------------------------------
                $this->mClassName_current = Customer::GetClassNameById($this->mClassId);
                
                #CODE THAT RETRIEVES THE STUDENT PASSPORT mTodayDate4Report
                // -------------------------------------------
                $this->mProfilePassport = $this->mStudentsDetails['image4'];
                $pos = strpos($this->mStudentsDetails['email'], '@');
                $userfolder = substr($this->mStudentsDetails['email'], 0, $pos) . '_folder';

                //Student Passport Location
                $this->mPassportUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$userfolder.DIRECTORY_SEPARATOR. $this->mProfilePassport);
                $this->mSchoolLogo = Link::Build('presentation'.DIRECTORY_SEPARATOR.'logos.png');
                $this->mSchoolStamp = Link::Build('presentation'.DIRECTORY_SEPARATOR.'stamp.png');

                /*
                    The name for which the report-pdf will be stored, this name is a combination of the following 
                    a. the student email
                    b. the class name
                    c. the term
                    $this->mRootClass = (int)Teachers::GetRootClassByClassId($this->mLessonsPlannote[0][0]);
                */
                // Retrieve the root class id 
                $this->mRootClassId = (int)Teachers::GetRootClassByClassId($this->mClassId);
                //Use this root class id to get the root-class name 
                
                $mRootClassName = Teachers::GetRootClassName($this->mRootClassId);
                $this->mRootClassName = str_replace(' ', '-', $mRootClassName['class_name']);

                //The name of the PDF report sheet will be save with
                $pos = strpos($this->mStudentsDetails['email'], '@');
                $userEmail = substr($this->mStudentsDetails['email'], 0, $pos);

                $this->mReportCardName = $userEmail .'_'. $this->mRootClassName .'_'. $this->mCurrentTermId.'_report.pdf';

                //The destination where this reportcard will be store with rhe pdf file name
                // $pos = strpos($this->mStudentsDetails['email'], '@');
                // $userfolder = substr($this->mStudentsDetails['email'], 0, $pos) . '_folder';

                //i will create a folder that is unique to the user if its not in existance
                // mkdir

                if(!is_dir(SITE_ROOT . DIRECTORY_SEPARATOR .'student_report_cards'.DIRECTORY_SEPARATOR . $userfolder))
                    mkdir(SITE_ROOT . DIRECTORY_SEPARATOR .'student_report_cards'.DIRECTORY_SEPARATOR . $userfolder, 0777);

                $this->mReportCardDestination = SITE_ROOT .DIRECTORY_SEPARATOR. 'student_report_cards' .DIRECTORY_SEPARATOR . $userfolder .DIRECTORY_SEPARATOR. $this->mReportCardName;


                #RETRIEVE THE ACADEMIC MARKS
                $this->mRecord = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                #We will comput the GRADE 
                for ($i=0; $i < count($this->mRecord); $i++) { 
                    $this->mRecord[$i]['grade'] = Teachers::ComputeStudentGrade((int)$this->mRecord[$i]['total']);
                }

                #We shall comput the POINTS
                for ($i=0; $i < count($this->mRecord); $i++) { 
                    $this->mRecord[$i]['points'] = (int)Teachers::ComputeStudentPoint((int)$this->mRecord[$i]['total']);
                }

                #We shall comput the REMARKS
                for ($i=0; $i < count($this->mRecord); $i++) { 
                    $this->mRecord[$i]['remark'] = Teachers::ComputeStudentRemark((int)$this->mRecord[$i]['total']);
                }

                #COMPUTE THE GRAND TOTAL OF ALL THE SUBJECTS POINTS
                $this->mTotalPoint = 0;
                for ($i=0; $i < count($this->mRecord); $i++) { 
                    $this->mTotalPoint += (int)$this->mRecord[$i]['points'];
                }

                

                #COMPUTE THE TOTAL NUMBER OF SUBJECTS PASSED BY THIS STUDENT
                $this->mSubjectPassed = array();
                for ($i=0; $i < count($this->mRecord); $i++) 
                { 
                    if ((int)$this->mRecord[$i]['total'] > 40) 
                        $this->mSubjectPassed[] = (int)$this->mRecord[$i]['total'];
                }
                $this->mTotalSubjectsPassed = count($this->mSubjectPassed);

                #COMPUTE THE POINT SCORE BY THIS STUDENT
                $this->mPointScored = number_format($this->mTotalPoint/count($this->mRecord), 2);
                
                #COMPUTE WHAT IS THE HEAD TEACHER OR PRINCIPALS COMMENT mPassportUrl
                $this->mTitleOf2Comment = '';
                if ($this->mDepartmentName == 'Nursery' || $this->mDepartmentName == 'Primary') 
                    $this->mTitleOf2Comment = 'HEAD TEACHER\'S COMMENT';
                else
                    $this->mTitleOf2Comment = 'PRINCIPAL\'S COMMENT';


                #COMPUTE THE PRINCIPALS OR HEAD TEACHER COMMENT, SINCE ITS BASE ON THE STUDENTS ACADEMIC SCORE //mReportCardDestination
                $this->mSecondComment = Teachers::GetSecondComment($this->mStudentGTAnPosition['average']);
                
                $this->mNextTermStartsOn = Teachers::GetNextTermStartsDate();
                $this->mNextTermStartsOn = $this->mNextTermStartsOn['next_term_starts'];
                $this->mNextTermStartsDa = new DateTime($this->mNextTermStartsOn);
                $this->mNextTermStartsDate = $this->mNextTermStartsDa->format('l, F d, Y');

                include('student_report_sheet.php');
                include('student_report_sheet_display.php');


            }

        }//-----end of print report -------------------



















        #THE CODE BLOW WILL SHOW THE STUDENTS ACADEMIC RECORDS AT THE DISCRETION OF THE TEACHER
        if(isset($_POST['viewStudentAcademicBtn']))
        {
            if(!isset($_SESSION['class_listed_id']) || !is_numeric($_SESSION['class_listed_id']))
            {
                $this->mErrorMessage = 'Invalid parameter bro. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!Teachers::GetAllSubjectsForASpecifiedClass((int)$_SESSION['class_listed_id']))
            {
                $this->mErrorMessage = 'No subjects found. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                $this->mClassId = (int)$_SESSION['class_listed_id'];


                # i past 
                #Retrieves a complete list of subjects offered in this class
                $this->mSubjectOfferedBySpecificClass = Teachers::GetAllSubjectsForASpecifiedClass($this->mClassId);

                $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
                $this->mDepartmentName = $mDepartmentName['department_name'];

                // -----------------------Checkings-------------------------------------
                $result2 = array();
                $result2HasZero = false;
                foreach ($this->mSubjectOfferedBySpecificClass as $key => $value) {
                    
                    $result2[] = Teachers::IsSubject2CaDone((int)$value['subject_id'], $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);

                }
            
            
                for ($i=0; $i < count($result2); $i++) { 
                    if((int)$result2[$i]['alreadytotal'] == 0)
                        $result2HasZero = true;
                }
            
            // -------------------------
                $result3 = array();
                $result3HasZero = false;

                foreach ($this->mSubjectOfferedBySpecificClass as $key => $value) {
                    $result3[] = Teachers::IsSubject3CaDone((int)$value['subject_id'], $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);
                }

                for ($i=0; $i < count($result3); $i++) { 
                    if((int)$result3[$i]['alreadytotal'] == 0)
                        $result3HasZero = true;
                }
            
            // -------------------------
                $resultE = array();
                $resultEHasZero = false;
                foreach ($this->mSubjectOfferedBySpecificClass as $key => $value) {

                    $resultE[] = Teachers::IsSubjectExamDone((int)$value['subject_id'], $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $this->thisTermStarted, $this->thisTermEnds);

                }

                for ($i=0; $i < count($resultE); $i++) { 
                    if((int)$resultE[$i]['alreadytotal'] == 0)
                        $resultEHasZero = true;
                }

            // --------------------Validations---------------------------
                if(!hash_equals($this->mCsrffirstca, $_POST['csrffirstca']))
                {
                    $this->mErrorMessage = 'The page submitted is unknown to the system. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    
                    $this->mContentCell = 'warning_box.tpl';
                }
                elseif($result2HasZero == true)
                {
                    $this->mErrorMessage = 'Complete the second CA records for all the subjects to view students academic record for this term. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    
                    $this->mContentCell = 'warning_box.tpl';

                }
                elseif($result3HasZero == true)
                {
                    $this->mErrorMessage = 'Complete the Third CA records for all the subjects to view students academic record for this term. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    
                    $this->mContentCell = 'warning_box.tpl';
                }
                elseif($resultEHasZero == true)
                {
                    $this->mErrorMessage = 'Complete the Exams records for all the subjects to view students academic record for this term. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    
                    $this->mContentCell = 'warning_box.tpl';
                }
                else
                {
                    #1. Get the total number of subjects offered in this class
                    $this->mClassSubjectCount = count($this->mSubjectOfferedBySpecificClass);

                    #Retrieve the grandtotal and average of all the subjects totals for all students in this class
                    $this->mAllGTotalnAverage = array();
                    $active_status = 1;

                    //1. We need the ids of all student in this class 
                    $this->mAllStudentIds = Teachers::GetListOfAllStudentIDsInThisClass($this->mClassId, $this->mCurrentTerm, $active_status);

                    #Count the number of student in the particular class
                    $this->mNumberOfStudents = count($this->mAllStudentIds);

                    //2. Use the retrieved ids ABOVE to get the grandtotal and average of all the subjects totals for each particular student
                    foreach ($this->mAllStudentIds as $key => $studentId) {

                        $this->mAllGTotalnAverage[] = Teachers::GetStudentsGrandTotal((int)$studentId['student_id'], $this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);
                    }
                    
                    #We need to check the Averages-and-grandTotal table whether the terms grandtotal and average have have been recorded. The number that will be return here will be equall to the number of students in this class, this is because the "Grand-total" and "average" of each student is added only once in this term for a student in the table called "nry_recordsForAverageAndGtotal"
                    $this->IsAverageAndGtotalsReady = (int)Teachers::CountRecordsForAverageAndGtotal($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                    // $arrayAGTotal = array();
                    ##Check if the students average and grand total for this term has been entered as records
                    if($this->IsAverageAndGtotalsReady <= 0)
                    {
                        #This means that the nry_recordsForAverageAndGtotal (pry_recordsForAverageAndGtotal, sry_recordsForAverageAndGtotal-- as ther case may be) has no records of students grand-total and avereages for this term.
                        ##This function below will then record it 
                        foreach ($this->mAllGTotalnAverage as $key => $value) 
                        {
                            Teachers::RecordGrandTotalnAverages($value["student_id"], $value["grandtotal"], $value["average"], $this->mCurrentTermId, $this->mClassId, $this->mTodayDate, $this->mDepartmentName);
                        }
                        
                    }
                    
                    #This section means that the count of the table return a number equal to the total number of student in that class for this term.
                    #So this is the place to call for the grandtotal, averages and student position from the appropriate records table 
                    
                    #We need to check if the student class position has been recorded for this term and this class
                    // $this->mIsPositionRecorded = (int)Teachers::IsPositionRecorde($this->mCurrentTermId, (int)$_SESSION['CaExamsClassId'], $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                    if((int)Teachers::IsPositionRecorde($this->mCurrentTermId, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName) <= 0)
                    {
                        #Here means that the class position for each student in this class and term has not been recorded accordingly
                        ##STep1 we retrieve the student_id and position
                        $this->mTermlyRecordnPosition = Teachers::GetTermlynPosition($this->mCurrentTermId, $this->mClassId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                        #step2 we use loop to Recorde it(update the respective columns)
                        foreach ($this->mTermlyRecordnPosition as $key => $value) 
                        {
                            Teachers::AddStudentsClassPosition((int)$value['rid'], (int)$value['student_id'], (int)$value['student_position'], $this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);
                            
                        }
                    }

                    $this->mClassName_current = Customer::GetClassNameById($this->mClassId);

                    #Call the function that will displat a tabulated list of students in this clas with the records of all result and the class-position of each. 
                    $this->mConfirmatoryList = Teachers::GetStudentAcademiRecords($this->mClassId, $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                    $this->mConfirmatoryListCount = count($this->mConfirmatoryList);

                    if($this->mConfirmatoryList)
                        $this->mContentCell = 'student_academic_record.tpl';
                    else
                    {
                        $this->mErrorMessage = 'No academic records found in the system. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    
                        $this->mContentCell = 'warning_box.tpl';
                    }
                    // include('student_report_sheet.php');
                }

            }
                
        }//MI END








        /*
        THIS CODE BELOW IS THE EXECUTION OF THE SUBJECT SELECT MENU FOR LESSON PLAN
        ie
        The subject for which lesson is to be written has been selected and all parrameters has been checked in the above constructor function
        */
        if(isset($_POST['addLessonPlan']) && $this->_mErrors == 0)
        {
            //The interface for prparing lessong plan should be shown
            #1. We need a list of all the subject offered by this class
            $this->mSubjectOfferedBySpecificClass = Teachers::GetAllSubjectsForASpecifiedClass($this->mClassId);
            $this->mConfirmatoryListCount = count($this->mSubjectOfferedBySpecificClass);

            #Name of the class and DEPARTMENT
            $this->mClassName_current = Customer::GetClassNameById($this->mClassId);
            $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mClassId);
            $this->mDepartmentName = $mDepartmentName['department_name'];

            // $Retrieve the name of th subject selected
            $this->mSubjectName = Teachers::GetSubjectNameById($this->mSubjectId);


            $this->mConfirmatoryTopic = $_SESSION['mSubjectTopic'];

            #Just before we shoe the 'lesson_planner_ui.tpl' we need some checking done
            #1. We shall calls a function that will check the table for this particulart subject 
            if(Teachers::GetLessonPlanForSubject($this->mClassId, $this->mCurrentTermId, $this->mSubjectId, $this->mConfirmatoryTopic))
            {
                
                $this->mErrorMessage = 'This topic "'.$_SESSION['mSubjectTopic'].'" already exist in our system, click the VIEW TOPICS button on the menu to view. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';

            }
            else
                $this->mContentCell = 'lesson_planner_ui.tpl';
        }#==========================I WILL COME BACK TO WRITE WHAT HAPPENS WHEN THE LESSONG PLAN IS FOUND  FOR A PARTICULAR SUBJECT, WHICH LEADS TO THE DISPLAY OF view_lesson_plan.tpl 



        #THE STEPS BELOW ARE FOR ADDNING THE FIRST PHASE OF INFORMATION WHEN PREPARING LESSON PLAN
        # 1. LessonPlan_step1
        if(isset($_POST['LessonPlan_step1']))
        {
            $validate = new Validate();
            $fields = $validate->getFields();

            //Add all the field values
            $fields->addField('topic');
            $fields->addField('duration');
            $fields->addField('gender');
            $fields->addField('behaviouralObj');
            $fields->addField('instructionalMtr');
            $fields->addField('methodology');
            $fields->addField('previouseKnowledge');


            // #set up and handling of images (name)
            $images_name = $_FILES['instructionalMaterialImages']['name'];
            for ($i=0; $i < count($images_name); $i++) { 
                if($images_name[$i] == "")
                    $this->mInstructionalImagesError = "NOTE: Fill all fields then Upload three images, to be used as intructional materials";
            }

            // #use jpeg or png images Subject ID not found, please exit and try again. Thanks!
            $images_type = $_FILES['instructionalMaterialImages']['type'];
            for ($i=0; $i < count($images_type); $i++) 
            { 
                if($images_type[$i] == "image/png" || $images_type[$i] == "image/jpg" || $images_type[$i] == "image/jpeg")
                    $this->mInstructionalImagesError = false;
                else
                    $this->mInstructionalImagesError = 'NOTE: Upload png or jpeg images only.';
            }

            #use jpeg or png images subject_name
            $images_size = $_FILES['instructionalMaterialImages']['size'];
            for ($i=0; $i < count($images_size); $i++) { 
                if($images_size[$i] > 88000)
                    $this->mInstructionalImagesError = "NOTE: Upload one big, then two smaller png or jpeg images, each should not be greater 88kb in size";
            }


            if(!hash_equals($this->mCsrffirstca, $_POST['csrffirstca']))
            {
                $this->_mErrors++;
                $this->mErrorMessage = 'The page submitted is unknown to the system. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif($this->mInstructionalImagesError)
            {
                
                $this->_mErrors++;
                
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                // mClassName_current mDepartmentName
                $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                $this->mContentCell = 'lesson_planner_ui.tpl'; 

            }
            else
                $this->InstructionalMaterialImages = $_FILES['instructionalMaterialImages'];

            #Handling errors in topic
            $validate->onyeka_address('topic', filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_STRING));

            if(!isset($_POST['topic']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                // mClassName_current
                $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                $this->mTopicError = "Enter a valid topic format, and try again.";
                $this->mContentCell = 'lesson_planner_ui.tpl';
            }
            else 
                $this->mTopic = ucwords(trim(filter_input(INPUT_POST, 'topic', FILTER_SANITIZE_STRING)));

            #Handling errors in Duration
            $validate->onyeka_address('duration', filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_STRING));

            if(!isset($_POST['duration']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                // mClassName_current
                $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                $this->mDurationError = "Enter a valid duration, and try again.";
                $this->mContentCell = 'lesson_planner_ui.tpl';
            }
            else 
                $this->mDuration = ucwords(trim(filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_STRING)));

            #Handling errors in gander
            $validate->onyekaprice_text('gender', (int)filter_input(INPUT_POST, 'gender', FILTER_VALIDATE_INT));
            
            if(!isset($_POST['gender']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                // mClassName_current
                $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                $this->mGenderError = "Enter a valid gender, and try again.";
                $this->mContentCell = 'lesson_planner_ui.tpl';
            }
            else 
                $this->mGender = (int)(filter_input(INPUT_POST, 'gender', FILTER_VALIDATE_INT));


            $behaviourObj = filter_input(INPUT_POST, 'behaviouralObj', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

            foreach ($behaviourObj as $key => $value) {
                $validate->onyeka_address('behaviouralObj', $value);
            }

            if(!isset($_POST['behaviouralObj']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                // mClassName_current
                $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                $this->mBehaviouralObjError = "Enter a valid behavioural objectives, and try again.";
                $this->mContentCell = 'lesson_planner_ui.tpl';
            }
            else 
                $this->mBehaviouralObj = filter_input(INPUT_POST, 'behaviouralObj', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);



            $instructionalMtr = filter_input(INPUT_POST, 'instructionalMtr', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

            foreach ($instructionalMtr as $key => $value) {
                $validate->onyeka_address('instructionalMtr', $value);
            }

            if(!isset($_POST['instructionalMtr']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                // mClassName_current
                $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                $this->mInstructionalMtrError = "Enter a valid instructional material, and try again.";
                $this->mContentCell = 'lesson_planner_ui.tpl';
            }
            else 
                $this->mInstructionalMtr = filter_input(INPUT_POST, 'instructionalMtr', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);
            

            $validate->onyeka_address('methodology', filter_input(INPUT_POST, 'methodology', FILTER_SANITIZE_STRING));
            
            if(!isset($_POST['methodology']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                // mClassName_current
                $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                $this->mMethodologyError = "Enter a valid methodology, and try again.";
                $this->mContentCell = 'lesson_planner_ui.tpl';
            }
            else 
                $this->mMethodology = trim(filter_input(INPUT_POST, 'methodology', FILTER_SANITIZE_STRING));

                
            $validate->onyeka_address('previouseKnowledge', filter_input(INPUT_POST, 'previouseKnowledge', FILTER_SANITIZE_STRING));
            
            if(!isset($_POST['previouseKnowledge']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                // mClassName_current
                $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                $this->mPreviouseKnowledgeError = "Enter a valid previours Knowledge, and try again.";
                $this->mContentCell = 'lesson_planner_ui.tpl';
            }
            else 
                $this->mPreviouseKnowledge = trim(filter_input(INPUT_POST, 'previouseKnowledge', FILTER_SANITIZE_STRING));




            if($this->_mErrors == 0)
            {
                // $this->mIsFolderDeleted = ($res && RemoveAFolder($folderPath)) ? true : false;
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $m_SubjectName = str_replace(' ', '', $this->mSubjectName['name']);
                $m_SubjectName = $m_SubjectName . $_SESSION['mSubjectId'];
                $t_foldername = $m_SubjectName.'_folder';

                if(is_dir(SITE_ROOT . '/lessonsplannote/' . $t_foldername))
                    Teachers::RemoveAFolder(SITE_ROOT . '/lessonsplannote/' . $t_foldername);

                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);

                #Process, then store this first-part of the lesson plan informations
                // #Organize the name, resizing and storing of the instructional material images
                // ==========================================
                if(!is_dir(SITE_ROOT . '/lessonsplannote/' . $t_foldername))
                    mkdir(SITE_ROOT . '/lessonsplannote/' . $t_foldername, 0777);

                #Remove spaces from the topic (for renaming of the three images)
                $newImageName = str_replace(' ', '', $this->mTopic);
                $_SESSION['origRawTopic'] = $this->mTopic;
                $_SESSION['newImageName'] = $newImageName;
                /**********************
                Create the 750 x 350 passport
                 ****************/
                $filename = array();
                foreach($this->InstructionalMaterialImages['name'] as  $key => $valueImageName)
                    $filename[$key] = $valueImageName;

                #Move the images from temp to permarnent location on the server
                #Rename the images to somrthing easily to construct and store 
                foreach($this->InstructionalMaterialImages['tmp_name'] as $key => $vImage_tmp_name)
                    $Success = move_uploaded_file($vImage_tmp_name, SITE_ROOT.DIRECTORY_SEPARATOR.'lessonsplannote'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$filename[$key]);

                $dir = SITE_ROOT.DIRECTORY_SEPARATOR.'lessonsplannote'.DIRECTORY_SEPARATOR . $t_foldername;
                
                $width = 750; 
                $height = 350;
                ImageUtil::process_image_custom($dir, $filename[0], $width, $height, $newImageName);

                $width_s = 360; 
                $height_s = 350;
                ImageUtil::process_image_custom($dir, $filename[1], $width_s, $height_s, $newImageName);

                $width_ss = 365; 
                ImageUtil::process_image_custom($dir, $filename[2], $width_ss, $height_s, $newImageName);

                
                // Set up the write paths(The new name of the image after its been resized by the ImageUtil Functions)
                $_SESSION['currentImageNames'] = array();
                $i = strrpos($filename[0], '.');
                $image_name = substr($filename[0], 0, $i);
                $ext = substr($filename[0], $i);
                $_SESSION['currentImageNames'][] = $newImageName . '_750' . $ext;

                $i1 = strrpos($filename[1], '.');
                $image_name1 = substr($filename[1], 0, $i1);
                $ext1 = substr($filename[1], $i1);
                $_SESSION['currentImageNames'][] = $newImageName . '_360' . $ext1;
                
                $i2 = strrpos($filename[2], '.');
                $image_name2 = substr($filename[2], 0, $i2);
                $ext2 = substr($filename[2], $i2);
                $_SESSION['currentImageNames'][] = $newImageName . '_365' . $ext2;

                //Delete the original uploaded passport
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'lessonsplannote'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$filename[0]);
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'lessonsplannote'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$filename[1]);
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'lessonsplannote'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$filename[2]);
                // =======================================================


                #HERE WE SHALL SET-UP THE INFOR TO B STORED IN A FILE UNTIL THE LAST ITEM IS COLLECTED FROM THE USER
                $this->mlessonsplannote = array(
                    array($_SESSION['mClassId'], $_SESSION['mSubjectId'], $this->mCurrentTermId, $this->mTopic, $this->mDuration, $this->mGender, $this->mMethodology, $this->mPreviouseKnowledge, $this->mTodayDate),
                    $this->mBehaviouralObj, 
                    $this->mInstructionalMtr, 
                    $_SESSION['currentImageNames']
                );

                $number = '_01';
                
                if(Teachers::SaveAsCsv($this->mlessonsplannote, $t_foldername, $newImageName, $number))
                    $this->mContentCell = 'lesson_planner_ui_2.tpl';
                else
                {

                    // $this->_mErrors++;
                    $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                    $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                    // mClassName_current
                    $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                    $this->mTopicError = "Unexpected error please check your internet and try again.";
                    $this->mContentCell = 'lesson_planner_ui.tpl';

                }

            }
            
            
        }//the stop







        //If the user want to go back to leassin plan tep one
        if(isset($_POST['LessonPlanBack_step1']))
        {
            if(!hash_equals($this->mCsrffirstca, $_POST['csrffirstca']))
            {
                $this->_mErrors++;
                $this->mErrorMessage = 'The page submited is unknown to the system. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                

                //===============================================================
                /*
                A special should be implementated of each condition to check the TEACHER LOGGED-IN-$_SESSION varialble to all ways make sure that the teacher is logged in while using the teacher side of the admin
                
                */
                //===============================================================

                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $m_SubjectName = str_replace(' ', '', $this->mSubjectName['name']);
                $m_SubjectName = $m_SubjectName . $_SESSION['mSubjectId'];
                $t_foldername = $m_SubjectName.'_folder';

                #We need to delete every from the database and unlink all the store file

                foreach ($_SESSION['currentImageNames'] as $key => $valueImage) 
                    unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'lessonsplannote'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$valueImage);
                
                #Delete the CSV FILE  WhatIsAPronoun_01
                $csvfile_name = $_SESSION['newImageName'] . '_01' . '.csv';
                // this function need to be remove fron the list of mysql functin and re-writen
                if(unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'lessonsplannote'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$csvfile_name))
                {
                    $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                    $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                    
                    $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                    $this->mContentCell = 'lesson_planner_ui.tpl';
                }
                else
                {
                    $this->_mErrors++;
                    $this->mErrorMessage = 'The page for step 1 responded with unknown status, please check your internet connecton and try again. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                        
                    $this->mContentCell = 'warning_box.tpl';
                }

                
            }

        }



        /*
            #THE DATA FROM THE SECOND PART OF THE LESSON PLAN FORM
        */
        if(isset($_POST['LessonPlan_step2']))
        {
            //After extracting the files from the POST-array
            extract($_POST);


            //After extracting the files from the POST-array we must ensure that none is empty and trim all end spaces

            // mIntroduction
            if(empty(trim($mIntroduction)))
            {
                $this->_mErrors++;
                $this->mIntroductionError = "The Introduction is required";
            }
            else
                $this->mIntroduction = htmlspecialchars(trim($mIntroduction));

            
            if(empty(trim($mIntroNote)))
            {
                $this->_mErrors++;
                $this->mIntroNoteError = "The Introductory note is required";
            }
            else
                $this->mIntroNote = htmlspecialchars(trim($mIntroNote));

            if(empty(trim($mDefinitionNote)))
            {
                $this->_mErrors++;
                $this->mDefinitionNoteError = "The Definition note is required";
            }
            else 
                $this->mDefinitionNote = htmlspecialchars(trim($mDefinitionNote));


            if(empty(trim($mSubTopic_1)))
            {
                $this->_mErrors++;
                $this->mSubTopic_1Error = "The First sub-topic is required";
            }
            else 
                $this->mSubTopic_1 = htmlspecialchars(trim($mSubTopic_1));

            if(empty(trim($mSubTopic_1_body)))
            {
                $this->_mErrors++;
                $this->mSubTopic_1_bodyError = "The content of the first sub-topic is required";

            }
            else
                $this->mSubTopic_1_body = htmlspecialchars(trim($mSubTopic_1_body));

            
            if(empty(trim($mSubTopic_2)))
            {
                $this->_mErrors++;
                $this->mSubTopic_2Error = "The Second sub-topic is required";
            }
            else 
                $this->mSubTopic_2 = htmlspecialchars(trim($mSubTopic_2));

            
            if(empty(trim($mSubTopic_2_body)))
            {
                $this->_mErrors++;
                $this->mSubTopic_2_bodyError = "The content of the second sub-topic is required";
            }
            else 
                $this->mSubTopic_2_body = htmlspecialchars(trim($mSubTopic_2_body));

            
            if(empty(trim($mSubTopic_3)))
            {
                $this->_mErrors++;
                $this->mSubTopic_3Error = "The Third sub-topic is required";
            }
            else 
                $this->mSubTopic_3 = htmlspecialchars(trim($mSubTopic_3));

                
            if(empty(trim($mSubTopic_3_body)))
            {
                $this->_mErrors++;
                $this->mSubTopic_3_bodyError = "The content of the third sub-topic is required";
            }
            else 
                $this->mSubTopic_3_body = htmlspecialchars(trim($mSubTopic_3_body));


            if(empty(trim($mSummary)))
            {
                $this->_mErrors++;
                $this->mSummaryError = "The Summary sub-topic is required";
            }
            else 
                $this->mSummary = htmlspecialchars(trim($mSummary));

            
            if(empty(trim($mSummary_body)))
            {
                $this->_mErrors++;
                $this->mSummary_bodyError = "The Summary content is required";
            }
            else 
                $this->mSummary_body = htmlspecialchars(trim($mSummary_body));
        

            if($this->_mErrors == 0)
            {
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $m_SubjectName = str_replace(' ', '', $this->mSubjectName['name']);
                $m_SubjectName = $m_SubjectName . $_SESSION['mSubjectId'];
                $t_foldername = $m_SubjectName.'_folder';

                # HERE WE SHALL SET-UP THE INFOR TO B STORED IN A FILE UNTIL THE LAST ITEM IS COLLECTED FROM THE USER
                $this->mlessonsplannote = array(
                    array(
                        htmlspecialchars($this->mIntroduction), 
                        htmlspecialchars($this->mIntroNote), 
                        htmlspecialchars($this->mDefinitionNote),
                        htmlspecialchars($this->mSubTopic_1),
                        htmlspecialchars($this->mSubTopic_1_body),
                        htmlspecialchars($this->mSubTopic_2),
                        htmlspecialchars($this->mSubTopic_2_body),
                        htmlspecialchars($this->mSubTopic_3),
                        htmlspecialchars($this->mSubTopic_3_body),
                        htmlspecialchars($this->mSummary),
                        htmlspecialchars($this->mSummary_body))
                );
                $number = '_02';
                
                if(Teachers::SaveAsCsv($this->mlessonsplannote, $t_foldername, $_SESSION['newImageName'], $number))
                {
                    #mClassName_current
                    $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                    $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                    $this->mContentCell = 'lesson_planner_ui_3.tpl';
                } 
                else
                {
                    $this->mLP2FErrors = "Data not saved, please try again."; 

                    $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                    $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                    // mClassName_current
                    $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                    $this->mTopicError = "Unexpected error please check your internet and try again.";
                    $this->mContentCell = 'lesson_planner_ui_2.tpl';
                }

            } // end of the if to $this->_mErrors
            else 
            {
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                    // mClassName_current
                $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                $this->mTopicError = "Unexpected error please check your internet and try again.";
                $this->mContentCell = 'lesson_planner_ui_2.tpl';
            }

       

        }



        #When the teacher clicks on the "Back To Step 2 Button"
        if(isset($_POST['LessonPlanBack_step2']))
        {
            $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
            $m_SubjectName = str_replace(' ', '', $this->mSubjectName['name']);
            $m_SubjectName = $m_SubjectName . $_SESSION['mSubjectId'];
            $t_foldername = $m_SubjectName.'_folder';

            $csvfile_name = $_SESSION['newImageName'] . '_02' . '.csv';

            #We will delete the information stored in step 2 
           
            if(unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'lessonsplannote'.DIRECTORY_SEPARATOR.$t_foldername.DIRECTORY_SEPARATOR.$csvfile_name))
            {
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                    // mClassName_current
                $this->mConfirmatoryTopic = ($_SESSION['mSubjectTopic']) ? $_SESSION['mSubjectTopic'] : "";
                // $this->mTopicError = "Unexpected error please check your internet and try again.";
                $this->mContentCell = 'lesson_planner_ui_2.tpl';

            }
            else
            {
                $this->mErrorMessage = 'Back action could not be completed, please try again after ensuring your internet connection is ok. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                    
                $this->mContentCell = 'warning_box.tpl';
            }
        }




        #WHEN THE 3 PART OF THE LESSON PLAN IS SUBMITTED 
        if(isset($_POST['completeLessonPlan_step3']))
        {
            //Exrext the posted data to a local variable 
            extract($_POST);
            #Sanitise the raw data 
            $validate = new Validate();
            $fields = $validate->getFields();

            //Add all the field values
            $fields->addField('mStudentsActivities');
            $fields->addField('mEvaluation');
            $fields->addField('mLessonPlanSummary');
            $fields->addField('mConclusion');
            $fields->addField('mReferences');
            $fields->addField('mAssignment');

            #Format references as a single string 
            $mAssignment_f = implode("hereNaJoin", $mAssignment);
            // $validate->onyeka_address('mAssignment', $mAssignment_f);
            if(!isset($_POST['mAssignment']) || empty($mAssignment_f))
            {
                $this->_mErrors++;
                $this->mAssignmentError = "Either one or more of the Assignment(s) contains invalid characters, please change and try again";

                #mClassName_current
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                $this->mContentCell = 'lesson_planner_ui_3.tpl';
            }
            else
                $this->mAssignment = htmlspecialchars(trim($mAssignment_f));
            

            // 24 August 2020 i stopped here
            #Format references as a single string 
            $mReferences_f = implode("hereNaJoin", $mReferences);

            $validate->onyeka_longText('mReferences', $mReferences_f);
            if(!isset($_POST['mReferences']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                $this->mReferencesError = "References contains invalid characters, please change and try again";

                #mClassName_current
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                $this->mContentCell = 'lesson_planner_ui_3.tpl';
            }
            else
                $this->mReferences = htmlspecialchars(trim($mReferences_f));
            

            
            //validations
            $validate->onyeka_longText('mStudentsActivities', $mStudentsActivities);

            if(!isset($_POST['mStudentsActivities']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                $this->mStudentsActivitiesError = "Students Activities contains invalid characters, please change and try again";

                #mClassName_current
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                $this->mContentCell = 'lesson_planner_ui_3.tpl';
            }
            else
                $this->mStudentsActivities = htmlspecialchars(trim(filter_input(INPUT_POST, 'mStudentsActivities', FILTER_SANITIZE_STRING)));

            
            $validate->onyeka_longText('mEvaluation', $mEvaluation);
            if(!isset($_POST['mEvaluation']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                $this->mEvaluationError = "Evaluation contains invalid characters, please change and try again";

                #mClassName_current
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                $this->mContentCell = 'lesson_planner_ui_3.tpl';

            }
            else
                $this->mEvaluation = htmlspecialchars(trim(filter_input(INPUT_POST, 'mEvaluation', FILTER_SANITIZE_STRING)));

            

            $validate->onyeka_longText('mLessonPlanSummary', $mLessonPlanSummary);
            if(!isset($_POST['mLessonPlanSummary']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                $this->mLessonPlanSummaryError = "Lesson Plan Summary contains invalid characters, please change and try again";

                #mClassName_current
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                $this->mContentCell = 'lesson_planner_ui_3.tpl';

            }
            else
                $this->mLessonPlanSummary = htmlspecialchars(trim(filter_input(INPUT_POST, 'mLessonPlanSummary', FILTER_SANITIZE_STRING)));


            // -----------
            $validate->onyeka_longText('mConclusion', $mConclusion);
            if(!isset($_POST['mConclusion']) || $fields->hasErrors())
            {
                $this->_mErrors++;
                $this->mConclusionError = "Conclusion contains invalid characters, please change and try again";

                #mClassName_current
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $this->mClassName_current = Customer::GetClassNameById($_SESSION['mClassId']);
                $this->mContentCell = 'lesson_planner_ui_3.tpl';

            }
            else
                $this->mConclusion = htmlspecialchars(trim(filter_input(INPUT_POST, 'mConclusion', FILTER_SANITIZE_STRING)));

            // -----------

            if($this->_mErrors == 0)
            {
                #We shall retrieve the initially store data from the  ".csv" file 
                #Save all informatioonf for lesson plan to the database 
                #Delete the folder containing the  .csv file 

                // This array contains four arrays
                $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                $m_SubjectName = str_replace(' ', '', $this->mSubjectName['name']);
                $m_SubjectName = $m_SubjectName . $_SESSION['mSubjectId'];
                $t_foldername = $m_SubjectName.'_folder';

                $mTopic = "";
                $number = '_01';
                $this->mLessonsPlannote = Teachers::GetFromCSV($t_foldername, $_SESSION['newImageName'], $number);

                #Retrieve Behavioural object 
                $this->mBehaviouralObj = $this->mLessonsPlannote[1];
                #Convert this above array to a single line string 
                $this->mBehaviouralObj = implode("hereNaJoin", $this->mBehaviouralObj);

                #Retrieve $this->mInstructionalMtr
                $this->mInstructionalMtr = $this->mLessonsPlannote[2];
                #Convert the intruction materials names to single line array
                $this->mInstructionalMtr = implode("hereNaJoin", $this->mInstructionalMtr);

                #Retrieve $this->mInstructional Images Name
                $this->mInstructionalImages = $this->mLessonsPlannote[3];
                #Convert the intruction materials Images names to single line array
                $this->mInstructionalImages = implode("hereNaJoin", $this->mInstructionalImages);

                #We need to get the class root ie what class is this particular class an extension of
                $this->mRootClass = (int)Teachers::GetRootClassByClassId($this->mLessonsPlannote[0][0]);

                #Call the function to add this first part to the database
                $id = Teachers::AddLessonPlanFirstPart(
                    $this->mRootClass, //$this->_SESSION['mClassId']
                    $this->mLessonsPlannote[0][1], //$this->_SESSION['mSubjectId']
                    $this->mLessonsPlannote[0][2], //$this->this->mCurrentTermId
                    $this->mLessonsPlannote[0][3], //$this->this->mTopic,
                    $this->mLessonsPlannote[0][4], //$this->this->mDuration
                    $this->mLessonsPlannote[0][5], // $this->this->mGender
                    $this->mLessonsPlannote[0][6], // $this->this->mMethodology
                    $this->mLessonsPlannote[0][7], //$this->this->mPreviouseKnowledge
                    $this->mLessonsPlannote[0][8],    //$this->mTodayDate
                    $this->mBehaviouralObj,
                    $this->mInstructionalMtr,
                    $this->mInstructionalImages);

                #If the last insert ID is return (Means a succesful insert operation)
                if($id)
                {
                    #Use the ID to serve as the feorign key in the presentation table
                    //1. Retrieve the data for the presentation table 
                    // This array contains four arrays
                    $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                    $m_SubjectName = str_replace(' ', '', $this->mSubjectName['name']);
                    $m_SubjectName = $m_SubjectName . $_SESSION['mSubjectId'];
                    $t_foldername = $m_SubjectName.'_folder';

                    $number = '_02';
                    $this->mPresentationData = Teachers::GetFromCSV($t_foldername, $_SESSION['newImageName'], $number);
                    // var_dump($this->mPresentationData);

                    //Store the presentation data in the presentation table in the database 
                    $res = Teachers::AddPresentationData(
                        $id,
                        $this->mPresentationData[0][0], //mIntroduction
                        $this->mPresentationData[0][1], //mIntroNote
                        $this->mPresentationData[0][2], //mDefinitionNote
                        $this->mPresentationData[0][3], //mSubTopic_1
                        $this->mPresentationData[0][4], //mSubTopic_1_body
                        $this->mPresentationData[0][5], //mSubTopic_2
                        $this->mPresentationData[0][6], //mSubTopic_2_body
                        $this->mPresentationData[0][7], //mSubTopic_3
                        $this->mPresentationData[0][8], //mSubTopic_3_body
                        $this->mPresentationData[0][9], //mSummary
                        $this->mPresentationData[0][10] //mSummary_body
                    );

                    if($id && $res)
                    {
                        #Here we can store the rest of the information (mostly the third part of the leson plan)
                        $res = Teachers::AddLessonPlanSummaryData($id, $this->mStudentsActivities, $this->mEvaluation, $this->mLessonPlanSummary, $this->mConclusion, $this->mAssignment, $this->mReferences, $this->mThisWeeksId);

                        //Then we shall delete the folder 
                        $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['mSubjectId']);
                        $m_SubjectName = str_replace(' ', '', $this->mSubjectName['name']);
                        $m_SubjectName = $m_SubjectName . $_SESSION['mSubjectId'];
                        $t_foldername = $m_SubjectName.'_folder';

                        //Ensure that the pictures are copied into a folder called instInmages
                        if(!is_dir(SITE_ROOT . '/instImages'))
                            mkdir(SITE_ROOT . '/instImages', 0777);

                        //Copy the images into the new directory 
                        //     we $_SESSION['currentImageNames']

                        foreach($_SESSION['currentImageNames'] as $image)
                            copy(SITE_ROOT . '/lessonsplannote/' . $t_foldername.DIRECTORY_SEPARATOR.$image, SITE_ROOT . '/instImages/' . $image);

                        if(is_dir(SITE_ROOT . '/lessonsplannote/' . $t_foldername))
                            Teachers::RemoveAFolder(SITE_ROOT . '/lessonsplannote/' . $t_foldername);

                        // Then we shal show a report to tell that the action has complted
                        $this->mConfirmationHeading = "Lesson plan topic added successfuly";
                        $this->mConfirmationMessage = '<h5> <b>TOPIC: ' . $_SESSION['origRawTopic'] . '<b></h5> <p>  SUBJECT: ' . $this->mSubjectName['name'] . '</p>';

                        $this->mContentCell = 'confirmed_box.tpl';

                    }
                    // STOP TO CREATE THE TABLE ABOVE mAssignedClasses
                }

            }

        }#end is here




        /*
            08 - 09 - 2020
            THIS CODE BELOW EXECUTES WHEN THE BUTTON TO VIEW EXISTING LESSON PLAN IS CLICKED 

        */
        if(isset($_POST['viewLessonNoteTopicTableBtn']))
        {
            // ClassAction
            // csrffirstca
            if(!isset($_POST['ClassAction']))
            {
                $this->mErrorMessage = 'Class action not set. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!isset($_POST['csrffirstca']) || !hash_equals($this->mCsrffirstca, $_POST['csrffirstca']))
            {
                $this->mErrorMessage = 'Unexpected page submission, check internet connections and try again. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!isset($_POST['subject_id']) || empty($_POST['subject_id']))
            {
                $this->mErrorMessage = 'Select a subject and try again. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                $_SESSION['subjectId_lpT'] = filter_input(INPUT_POST, 'subject_id', FILTER_VALIDATE_INT);
                $this->mClassId = filter_input(INPUT_POST, 'ClassActionId', FILTER_VALIDATE_INT);

                #WE SHALL USE THE CLASS ID TO RETRIEVE THE ROOT CLASS
                $this->mRootClass = (int)Teachers::GetRootClassByClassId($this->mClassId);
                $_SESSION['rootClassId'] = $this->mRootClass;


                //CREATE THE FUNCTION TO RETRIEVE THE LESSON PLAN TOPIC IN A TABULATED MANNER
                $this->mLessonPlanTopics = Teachers::GetLessonTopics($_SESSION['subjectId_lpT'], $this->mRootClass, $this->mCurrentTermId);

                $this->mLessonPlanTopicCount = count($this->mLessonPlanTopics);

                $this->mContentCell = 'list_of_lessonplan_topic.tpl';

            }
        }#End here GGH







        //THE CODE BELOW IS EXECUTED WHEN THE "VIEW LESSON NOTE" BUTTON IS CLICKED 
        if(isset($_POST['ViewLessonNote']) && $_POST['viewClassAction'] === 'View_Lesson_Note')
        {
            if(!isset($_POST['ViewLessonNote_csrf']) || !hash_equals($this->mCsrfToken, $_POST['ViewLessonNote_csrf']))
            {
                $this->mErrorMessage = 'Unexpected page submission, check internet connections and try again. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            elseif(!isset($_POST['viewlessonplan_Id']) || !is_numeric($_POST['viewlessonplan_Id']))
            {
                $this->mErrorMessage = 'Click on the "edit lesson note" button and try again. Thanks!' . '<br><br> <a href="' . $this->mLinkToTeacherPage . '" class="btn btn-outline btn-success"> Understood ok </a>';
                
                $this->mContentCell = 'warning_box.tpl';
            }
            else
            {
                //We call the function to retrieve the lesson note from the lesson plan table of the database 
                $_SESSION['mLessonPlanId'] = (int)filter_input(INPUT_POST, 'viewlessonplan_Id', FILTER_VALIDATE_INT);

                $this->mLessonNote = Teachers::GetLessonNoteForSubject($_SESSION['subjectId_lpT'], $_SESSION['rootClassId'], $this->mCurrentTermId, $_SESSION['mLessonPlanId']);

                if($this->mLessonNote)
                {
                    if((int)$this->mLessonNote['publish'] == 0)
                        $this->mIsPublished = false;
                    else 
                        $this->mIsPublished = true;
                }
                    


                // -----------------------------------------------------------
                //We shall extract the names of the images use as instructional material 
                $this->mInstructionalImage = explode("hereNaJoin", $this->mLessonNote['instructionalImages']);
                //WhatIsANoun_750.jpg hereNaJoin WhatIsANoun_360.jpg hereNaJoin WhatIsANoun_365.jpg
                
                $this->mWhatIsANoun_750 = Link::Build('instImages'  .DIRECTORY_SEPARATOR. $this->mInstructionalImage[0]);
                $this->mWhatIsANoun_360 = Link::Build('instImages' .DIRECTORY_SEPARATOR. $this->mInstructionalImage[1]);
                $this->mWhatIsANoun_365 = Link::Build('instImages' .DIRECTORY_SEPARATOR. $this->mInstructionalImage[2]);


                // -----------------------------------------------------------
                //we will extract all the questions for assignment SendToStudent
                $this->mAssignmentQuestions = explode("hereNaJoin", $this->mLessonNote['assignment']);
                $this->mQuestionOne = $this->mAssignmentQuestions[0];
                $this->mQuestionTwo = $this->mAssignmentQuestions[1];
                $this->mQuestionThree = $this->mAssignmentQuestions[2];
                $this->mQuestionFour = $this->mAssignmentQuestions[3];

                $this->mContentCell = 'lesson_note_viewer.tpl';
            }
            
        }//Ende here 






        //THE CODE BELOW EDITS LESSON NOTE RFROM THE VIEWING SECTION 
        if(isset($_POST['EditLessonNoteBtn']))
        {
            $this->mEditingLessonNote = true;
            //We call the function to retrieve the lesson note from the lesson plan table of the database 
                // $this->mLessonPlanId = (int)filter_input(INPUT_POST, 'viewlessonplan_Id', FILTER_VALIDATE_INT);

                $this->mLessonNote = Teachers::GetLessonNoteForSubject($_SESSION['subjectId_lpT'], $_SESSION['rootClassId'], $this->mCurrentTermId, $_SESSION['mLessonPlanId']);

                $_SESSION['topic'] = $this->mLessonNote['topic'];

                // -----------------------------------------------------------
                //we will extract all the questions for assignment 
                $this->mAssignmentQuestions = explode("hereNaJoin", $this->mLessonNote['assignment']);
                $this->mQuestionOne = $this->mAssignmentQuestions[0];
                $this->mQuestionTwo = $this->mAssignmentQuestions[1];
                $this->mQuestionThree = $this->mAssignmentQuestions[2];
                $this->mQuestionFour = $this->mAssignmentQuestions[3];

                $this->mContentCell = 'lesson_note_viewer.tpl';
        }






        //THIS CODE BELOW IS RUN TO SAVE THE EDITED LESSON PLAN AFTER A TEACHER IS DONE EDITING
        if(isset($_POST['submitEditedLessonNote']))
        {
            // #set up and handling of images (name) 
            $images_name = $_FILES["instructionalMaterialImages"]["name"];
            for ($i=0; $i < count($images_name); $i++) { 
                if($images_name[$i] == "")
                    $this->mInstructionalImagesError = "NOTE: Fill all fields then Upload three images, to be used as intructional materials";
            }

            // #use jpeg or png images Subject ID not found, please exit and try again. Thanks!
            $images_type = $_FILES['instructionalMaterialImages']['type'];
            for ($i=0; $i < count($images_type); $i++) 
            { 
                if($images_type[$i] == "image/png" || $images_type[$i] == "image/jpg" || $images_type[$i] == "image/jpeg")
                    $this->mInstructionalImagesError = false;
                else
                    $this->mInstructionalImagesError = 'NOTE: Collins said Select then Upload png or jpeg images only.';
            }

            #use jpeg or png images instructionalMaterialImages
            $images_size = $_FILES['instructionalMaterialImages']['size'];
            for ($i=0; $i < count($images_size); $i++) { 
                if($images_size[$i] > 88000)
                    $this->mInstructionalImagesError = "NOTE: Upload one big, then two smaller png or jpeg images, each should not be greater 88kb in size";
            }
            //We must ensure no field is empty 
            if(
                !isset($_POST['intronote']) || empty($_POST['intronote']) || 
            !isset($_POST['topic_define']) || empty($_POST['topic_define']) ||
            !isset($_POST['subtopic1']) || empty($_POST['subtopic1']) || 
            !isset($_POST['subtopic1body']) || empty($_POST['subtopic1body']) ||  
            !isset($_POST['subtopic2']) || empty($_POST['subtopic2']) || 
            !isset($_POST['subtopic2body']) || empty($_POST['subtopic2body']) || 
            !isset($_POST['subtopic3']) || empty($_POST['subtopic3']) || 
            !isset($_POST['subtopic3body']) || empty($_POST['subtopic3body']) || 
            !isset($_POST['pre_summary']) || empty($_POST['pre_summary']) || 
            !isset($_POST['pre_summarybody']) || empty($_POST['pre_summarybody']) || 
            !isset($_POST['evaluation']) || empty($_POST['evaluation']) || 
            !isset($_POST['mAssignment']) || empty($_POST['mAssignment'])
            )
            {
                // instructionalMaterialImages 

                $this->mEditingLessonNote = true;
            
                $this->mLessonNote = Teachers::GetLessonNoteForSubject($_SESSION['subjectId_lpT'], $_SESSION['rootClassId'], $this->mCurrentTermId, $_SESSION['mLessonPlanId']);
                $this->mAssignmentQuestions = explode("hereNaJoin", $this->mLessonNote['assignment']);
                $this->mQuestionOne = $this->mAssignmentQuestions[0];
                $this->mQuestionTwo = $this->mAssignmentQuestions[1];
                $this->mQuestionThree = $this->mAssignmentQuestions[2];
                $this->mQuestionFour = $this->mAssignmentQuestions[3];

                $this->mLessonNoteEditError = "All fields are required, please fill and try again. Thanks";

                $this->mContentCell = 'lesson_note_viewer.tpl';

            }
            elseif($this->mInstructionalImagesError != false)
            {
                $this->mEditingLessonNote = true;
            
                $this->mLessonNote = Teachers::GetLessonNoteForSubject($_SESSION['subjectId_lpT'], $_SESSION['rootClassId'], $this->mCurrentTermId, $_SESSION['mLessonPlanId']);
                $this->mAssignmentQuestions = explode("hereNaJoin", $this->mLessonNote['assignment']);
                $this->mQuestionOne = $this->mAssignmentQuestions[0];
                $this->mQuestionTwo = $this->mAssignmentQuestions[1];
                $this->mQuestionThree = $this->mAssignmentQuestions[2];
                $this->mQuestionFour = $this->mAssignmentQuestions[3];

                $this->mLessonNoteEditError = $this->mInstructionalImagesError;
                $this->mContentCell = 'lesson_note_viewer.tpl';

            }
            else 
            {
                //Seems everything is ok, then retrieve the value from the $_post and call the function to update the database
                $this->InstructionalMaterialImages = $_FILES['instructionalMaterialImages'];

                //1. we are gonna put the picture image name together as a single string 
                //The name of the pictures is

                #Remove spaces from the topic (for renaming of the three images)
                $newImageName = str_replace(' ', '', $_SESSION['topic']);
                
                /**********************
                Create the 750, 350, 356 size images 
                 ****************/
                $filename = array();
                foreach($this->InstructionalMaterialImages['name'] as  $key => $valueImageName)
                    $filename[$key] = $valueImageName;

                #Move the images from temp to permarnent location on the server
                #Rename the images USING the topic of the lesson note. 
                foreach($this->InstructionalMaterialImages['tmp_name'] as $key => $vImage_tmp_name)
                    $Success = move_uploaded_file($vImage_tmp_name, SITE_ROOT.DIRECTORY_SEPARATOR.'instImages'.DIRECTORY_SEPARATOR.$filename[$key]);
                
                $dir = SITE_ROOT.DIRECTORY_SEPARATOR.'instImages';

                $width = 100; 
                $height = 100;
                ImageUtil::process_image_custom($dir, $filename[0], $width, $height, $newImageName);

                $width = 750; 
                $height = 350;
                ImageUtil::process_image_custom($dir, $filename[0], $width, $height, $newImageName);

                $width_s = 360; 
                $height_s = 350;
                ImageUtil::process_image_custom($dir, $filename[1], $width_s, $height_s, $newImageName);

                $width_ss = 365; 
                ImageUtil::process_image_custom($dir, $filename[2], $width_ss, $height_s, $newImageName);

                //Delete the original uploaded Images
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'instImages'.DIRECTORY_SEPARATOR.$filename[0]);
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'instImages'.DIRECTORY_SEPARATOR.$filename[1]);
                unlink(SITE_ROOT.DIRECTORY_SEPARATOR.'instImages'.DIRECTORY_SEPARATOR.$filename[2]);

                #DEAL WITH THE ASSIGNNMENT QUESTIONS
                // $this->mAssignmentQuestions = array( ); 
                $this->mAssignment = filter_input(INPUT_POST, 'mAssignment', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY);

                $this->mAssignmentQuestions = implode("hereNaJoin", $this->mAssignment);

                //RETRIEVE THE REST OF THE DATA AND PREPARE FOR STORAGE
                $this->intronote = htmlspecialchars(trim(filter_input(INPUT_POST, 'intronote')));
                $this->mTopicDefine = htmlspecialchars(trim(filter_input(INPUT_POST, 'topic_define')));
                $this->mSubTopic1 = htmlspecialchars(trim(filter_input(INPUT_POST, 'subtopic1')));
                $this->mSubTopic1Body = htmlspecialchars(trim(filter_input(INPUT_POST, 'subtopic1body')));
                $this->mSubTopic2 = htmlspecialchars(trim(filter_input(INPUT_POST, 'subtopic2')));
                $this->mSubTopic2Body = htmlspecialchars(trim(filter_input(INPUT_POST, 'subtopic2body')));
                $this->mSubTopic3 = htmlspecialchars(trim(filter_input(INPUT_POST, 'subtopic3')));
                $this->mSubTopic3Body = htmlspecialchars(trim(filter_input(INPUT_POST, 'subtopic3body')));
                $this->mPreSummary = htmlspecialchars(trim(filter_input(INPUT_POST, 'pre_summary')));
                $this->mPreSummarybody = htmlspecialchars(trim(filter_input(INPUT_POST, 'pre_summarybody')));
                $this->mEvaluation = htmlspecialchars(trim(filter_input(INPUT_POST, 'evaluation')));

                $this->mUpdateOk = Teachers::UpdateLessonNoteById($_SESSION['mLessonPlanId'], $this->intronote, $this->mTopicDefine, $this->mSubTopic1, $this->mSubTopic1Body, $this->mSubTopic2, $this->mSubTopic2Body, $this->mSubTopic3, $this->mSubTopic3Body, $this->mPreSummary, $this->mPreSummarybody, $this->mEvaluation);

                // ----------------------------------

                $this->mLessonNote = Teachers::GetLessonNoteForSubject($_SESSION['subjectId_lpT'], $_SESSION['rootClassId'], $this->mCurrentTermId, $_SESSION['mLessonPlanId']);

                // -----------------------------------------------------------
                //We shall extract the names of the images use as instructional material 
                $this->mInstructionalImage = explode("hereNaJoin", $this->mLessonNote['instructionalImages']);
                //WhatIsANoun_750.jpg hereNaJoin WhatIsANoun_360.jpg hereNaJoin WhatIsANoun_365.jpg
                
                $this->mWhatIsANoun_750 = Link::Build('instImages'  .DIRECTORY_SEPARATOR. $this->mInstructionalImage[0]);
                $this->mWhatIsANoun_360 = Link::Build('instImages' .DIRECTORY_SEPARATOR. $this->mInstructionalImage[1]);
                $this->mWhatIsANoun_365 = Link::Build('instImages' .DIRECTORY_SEPARATOR. $this->mInstructionalImage[2]);

                // -----------------------------------------------------------
                //we will extract all the questions for assignment 
                $this->mAssignmentQuestions = explode("hereNaJoin", $this->mLessonNote['assignment']);
                $this->mQuestionOne = $this->mAssignmentQuestions[0];
                $this->mQuestionTwo = $this->mAssignmentQuestions[1];
                $this->mQuestionThree = $this->mAssignmentQuestions[2];
                $this->mQuestionFour = $this->mAssignmentQuestions[3];

                $this->mContentCell = 'lesson_note_viewer.tpl';

            }
        }


        if(isset($_POST['unpublishlessonnote']))
        {
            if(isset($_SESSION['mLessonPlanId']))
            {
                if((int)Teachers::UnPublishLessonPlan($_SESSION['mLessonPlanId'], 0) == 1)
                {
                    $this->mLessonNote = Teachers::GetLessonNoteForSubject($_SESSION['subjectId_lpT'], $_SESSION['rootClassId'], $this->mCurrentTermId, $_SESSION['mLessonPlanId']);

                    if($this->mLessonNote)
                    {
                        if((int)$this->mLessonNote['publish'] == 0)
                            $this->mIsPublished = false;
                        else 
                            $this->mIsPublished = true;
                    }
                        


                    // -----------------------------------------------------------
                    //We shall extract the names of the images use as instructional material 
                    $this->mInstructionalImage = explode("hereNaJoin", $this->mLessonNote['instructionalImages']);
                    //WhatIsANoun_750.jpg hereNaJoin WhatIsANoun_360.jpg hereNaJoin WhatIsANoun_365.jpg
                    
                    $this->mWhatIsANoun_750 = Link::Build('instImages'  .DIRECTORY_SEPARATOR. $this->mInstructionalImage[0]);
                    $this->mWhatIsANoun_360 = Link::Build('instImages' .DIRECTORY_SEPARATOR. $this->mInstructionalImage[1]);
                    $this->mWhatIsANoun_365 = Link::Build('instImages' .DIRECTORY_SEPARATOR. $this->mInstructionalImage[2]);


                    // -----------------------------------------------------------
                    //we will extract all the questions for assignment SendToStudent
                    $this->mAssignmentQuestions = explode("hereNaJoin", $this->mLessonNote['assignment']);
                    $this->mQuestionOne = $this->mAssignmentQuestions[0];
                    $this->mQuestionTwo = $this->mAssignmentQuestions[1];
                    $this->mQuestionThree = $this->mAssignmentQuestions[2];
                    $this->mQuestionFour = $this->mAssignmentQuestions[3];

                    $this->mContentCell = 'lesson_note_viewer.tpl';

                }

            }

        }

        // publishlessonnote
        // The logic below will publish a lesson plan for student to have access to it 
        if(isset($_POST['publishlessonnote']))
        {
            //Call the function that will locate the specific lesson plan and change the publish status 
            if(isset($_SESSION['mLessonPlanId']))
            {
                if((int)Teachers::PublishLessonPlan($_SESSION['mLessonPlanId'], 1) == 1)
                {
                    // $this->mIsPublished = true;
                    // -----------------------------
                    $this->mLessonNote = Teachers::GetLessonNoteForSubject($_SESSION['subjectId_lpT'], $_SESSION['rootClassId'], $this->mCurrentTermId, $_SESSION['mLessonPlanId']);

                    if($this->mLessonNote)
                    {
                        if((int)$this->mLessonNote['publish'] == 0)
                            $this->mIsPublished = false;
                        else 
                            $this->mIsPublished = true;
                    }
                        


                    // -----------------------------------------------------------
                    //We shall extract the names of the images use as instructional material 
                    $this->mInstructionalImage = explode("hereNaJoin", $this->mLessonNote['instructionalImages']);
                    //WhatIsANoun_750.jpg hereNaJoin WhatIsANoun_360.jpg hereNaJoin WhatIsANoun_365.jpg
                    
                    $this->mWhatIsANoun_750 = Link::Build('instImages'  .DIRECTORY_SEPARATOR. $this->mInstructionalImage[0]);
                    $this->mWhatIsANoun_360 = Link::Build('instImages' .DIRECTORY_SEPARATOR. $this->mInstructionalImage[1]);
                    $this->mWhatIsANoun_365 = Link::Build('instImages' .DIRECTORY_SEPARATOR. $this->mInstructionalImage[2]);


                    // -----------------------------------------------------------
                    //we will extract all the questions for assignment SendToStudent
                    $this->mAssignmentQuestions = explode("hereNaJoin", $this->mLessonNote['assignment']);
                    $this->mQuestionOne = $this->mAssignmentQuestions[0];
                    $this->mQuestionTwo = $this->mAssignmentQuestions[1];
                    $this->mQuestionThree = $this->mAssignmentQuestions[2];
                    $this->mQuestionFour = $this->mAssignmentQuestions[3];

                    $this->mContentCell = 'lesson_note_viewer.tpl';

                }

            }
            else
                trigger_error("Lesson plan id not set");

        }


    }

}
?>