<?php 

//This class logic is for stuent whos ia already a member of a class in a particular school
class ProfileStudent
{
    public $mSiteUrl;
    public $mContentCell = 'blank.tpl';
    public $mStudentFullName;

    public $mRightColumnContent = 'blank.tpl';
    public $mLeftColumnContent = 'blank.tpl';
    public $mMiddleColumnContent = 'blank.tpl';
    public $mBottomColumnContent = 'blank.tpl';
    public $mStudentInfoBreakDown = 'blank.tpl';
    public $mErrorMsg = false;
    public $mIsTopicsPresent = false;
    public $mTakeActionBtn = false;

    public $mPromoteBtnMsg = '';
    public $mShowBtn = false;
    public $mStudentProfileErrMsg = false;


    public $mTerm;
    public $mCurrentTerm;

    public $mTermId;
    public $mCurrentTermId;

    private $_mErrors = 0;



    public function __construct()
    {
        $this->mSiteUrl = Link::Build('');

        //Make sure its loaded through sure channel if neccessary
         //Enforce page to be accesse through HTTPS if USE_SSL is on
        if(USE_SSL == 'yes' && getenv('HTTPS') != 'on')
        {
            header('Location: https://' . getenv('SERVER_NAME') . getenv('REQUEST_URI'));
            exit();
        }

        //Check to ensure that user is authenticated using a valid pin and that user came in through the select-section page
        if((!isset($_SESSION['schoolshop_customer_id'])) || (!isset($_SESSION['schoolshop_student_id']))) 
        {
            //Redirects to the Home page
            $this->mSiteUrl = Link::Build('');
            header('Location: ' . $this->mSiteUrl);
            exit();

        }

        $this->mTerm = Teachers::GetCurrentTerm();
        $this->mCurrentTerm = trim($this->mTerm['current_term']);


        $this->mTermId = Teachers::GetCurrentTermIdByName($this->mCurrentTerm);
        $this->mCurrentTermId = (int)$this->mTermId['term_id'];


        




        

        $this->mLinkToStudentProfile = Link::ToStudentProfile();
        $this->mLinkToStudentCA = Link::ToStudentCA();

         $this->mLinkToRegisterCustomer = Link::ToRegisterCustomer();
        $this->mLinkToAccountDetails = Link::ToAccountDetails();
        $this->mLinkToCreditCardDetails = Link::ToCreditCardDetails();
        $this->mLinkToAddressDetails = Link::ToAddressDetails();


        //The initial content cells//
        // $this->mRootClassCount = (int)Student::CountRootClass();
        // var_dump($this->mRootClassCount);


            $termStartId = 1;
            $termEndId = 15;

            $this->mDateAttendanceTermStarted = Teachers::GetAttendanceStartOrEndDate($termStartId);

            $this->thisTermStarted = $this->mDateAttendanceTermStarted['week_start'];
            

            $this->mDateAttendanceTermEnds = Teachers::GetAttendanceStartOrEndDate($termEndId);
            $this->thisTermEnds = $this->mDateAttendanceTermEnds['week_stop'];


    }





    public function init()
    {

        //Retrieve the specific student profile 
        $this->mStudentsDetails = Student::GetStudentDetails($_SESSION['schoolshop_student_id']);


        $this->mStudentFullName = $this->mStudentsDetails['firstname'] . ' ' . $this->mStudentsDetails['surname']; 

        //Student Passport
        $pos = strpos($this->mStudentsDetails['email'], '@');
        $userfolder = substr($this->mStudentsDetails['email'], 0, $pos) . '_folder';
         
        $this->mPasportUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$userfolder.DIRECTORY_SEPARATOR.$this->mStudentsDetails['image1']);

        //Student Registration Number 
        //Pull out or retrieves the student report cards linkx\

        // --------------------------------------------------
        // $this->mProfilePassport = $this->mStudentsDetails['image4'];
        //         $pos = strpos($this->mStudentsDetails['email'], '@');
        //         $userfolder = substr($this->mStudentsDetails['email'], 0, $pos) . '_folder';

        if(!is_dir(SITE_ROOT . DIRECTORY_SEPARATOR .'student_report_cards'.DIRECTORY_SEPARATOR . $userfolder))
            mkdir(SITE_ROOT . DIRECTORY_SEPARATOR .'student_report_cards'.DIRECTORY_SEPARATOR . $userfolder, 0777);

        // --------------------------------------------------
        //I made a modification here 
        $this->mStudentsReportpath = SITE_ROOT .DIRECTORY_SEPARATOR. 'student_report_cards'.DIRECTORY_SEPARATOR . $userfolder;
        //---------------------------------------------------
        $this->mReportCardLinks = StudentReportCard::GetStudentsReportCards($this->mStudentsReportpath, $this->mStudentsDetails['email']);

        //This check ensures the $this->mReportCardLinks variablee id not empty
        $this->mReportCardLinksCount = count($this->mReportCardLinks);

        //Email//
        $this->mStudentEmail = $this->mStudentsDetails['email'];

        //Date of birth
        $mDateofBirth = new DateTime($this->mStudentsDetails['dob']);
        $this->mDateOfBirth = $mDateofBirth->format('D, M d, Y');

        //Registration number 
        $mRegNo = Student::GetRegNo($this->mStudentsDetails["applicants_id"]);
        $this->mRegNo = $mRegNo['reg_number'];

        // var_dump($this->mStudentsDetails);
        //Medical Information
        $this->mBloodgroup = $this->mStudentsDetails["bloodgroup"]; 
        $this->mGenotype = $this->mStudentsDetails["genotype"]; 
        $this->mAllergies = $this->mStudentsDetails["allergies"]; 
        $this->mDefects = $this->mStudentsDetails["defects"]; 
        $this->mImmunize = $this->mStudentsDetails["immunize"]; 
        $this->mDocname = $this->mStudentsDetails["docname"]; 
        $this->mDocphone = $this->mStudentsDetails["docphone"]; 
        $this->mDocaddress = $this->mStudentsDetails["docaddress"];  
        $this->mOtherinfo = $this->mStudentsDetails["otherinfo"];
        
        //Father Information
        $this->mFatherFname = $this->mStudentsDetails["f_fname"]; 
        $this->mFatherLname = $this->mStudentsDetails["f_lname"];
        $this->mFatherPhone = $this->mStudentsDetails["f_phone"]; 
        $this->mFatherOfficeAddress = $this->mStudentsDetails["f_office"];
        $this->mFatherOccupation = $this->mStudentsDetails["f_occupation"];
        // $this->mFatherOfficeAddress ["f_religion"]=> string(5) "Islam" 
        $this->mFatherAddress = $this->mStudentsDetails["f_address"];

        //Father Information
        $this->mMotherFname = $this->mStudentsDetails["m_fname"];
        $this->mMotherLname = $this->mStudentsDetails["m_lname"]; 
        $this->mMotherPhone = $this->mStudentsDetails["m_phone"];
        $this->mMotherOfficeAddress = $this->mStudentsDetails["m_office"];
        $this->mMotherOccupation = $this->mStudentsDetails["m_occupation"];
        $this->mMotherReligion = $this->mStudentsDetails["m_religion"];
        $this->mMotherAddress = $this->mStudentsDetails["m_address"];

        //Using this student's ID, retrieve the current classid from the active_class table 
        if(Student::RetrieveCurrentClassId($_SESSION['schoolshop_student_id']))
        {
            $this->mCurrentClassId = (int)Student::RetrieveCurrentClassId($_SESSION['schoolshop_student_id']);
            $_SESSION['profileClassId'] = $this->mCurrentClassId;
            #Use the classid to get the class_name
            $mClassName = Customer::GetClassNameById($this->mCurrentClassId);
            $this->mClassName = $mClassName['class_name'];

        }
        else 
            trigger_error("Class id not found");


            // tttttttttttttttttttttttttt(testing)
            $this->mRootClassId = (int)Teachers::GetRootClassByClassId($_SESSION['profileClassId']);
            $this->mPromotedClassId = (int)$this->mRootClassId + 1;
            // ttttttttttttttttttttttttttt




            //We need to set the funality for a student to be able to activate his or promotion to a new class
        $mDepartmentName = Teachers::GetDepartnameUsingClassId($this->mCurrentClassId);
        $this->mDepartmentName = $mDepartmentName['department_name'];
        //1. confirm the students exixtance in the database ?,
        // $this->mIsInRecord = ;
        
        //Have this students avarage record for 
        //1. this term 
        //2. this class 
        //3. 

        $this->mIsPres = (int)Student::IsStudentInAvarageRecord($_SESSION['schoolshop_student_id'], $this->mDepartmentName, $this->mCurrentClassId, $this->mCurrentTermId);

        // var_dump($this->mIsPres);

        if(((int)Student::IsStudentInAvarageRecord($_SESSION['schoolshop_student_id'], $this->mDepartmentName, $this->mCurrentClassId, $this->mCurrentTermId)) === 0)
        {
            //The avarage record for this student, this term and this class has not been entered into the database
            $this->mPromoteBtnMsg = '';
            $this->mShowBtn = false;
        }
        else 
        {
            //The avarage record for this student, this term and this class HAVE been entered into the database
            //Then we need to retrieve the avarage and compare it with the dafault that specifies what avarage mark each student must get to be declared as "have passed" and therefor promoted
            $this->mAverage = (int)Student::GetAverage($_SESSION['schoolshop_student_id'], $this->mDepartmentName, $this->mCurrentClassId, $this->mCurrentTermId);

            if(($this->mAverage) && ($this->mAverage > FAIL_MARK) && ($this->mCurrentTermId == 3))
            {
                //A value has been return by the query then compare it with the default mark
                //We will use the rootclassID to retrieve the next class for which the
                $this->mRootClassId = (int)Teachers::GetRootClassByClassId($_SESSION['profileClassId']);
                //Then retrive the count of the entire root class
                $this->mRootClassCount = (int)Student::CountRootClass();

                // ===================================================
                //Ensure its not the last id
                if(($this->mRootClassId === $this->mRootClassCount)  && ($this->mCurrentTermId == 3))
                {
                    //This student have graduated
                    $this->mPromoteBtnMsg = 'Graduated';
                    $this->mShowBtn = false;

                }
                elseif(($this->mCurrentTermId == 3))
                {
                    //Means that the id is to be incremented by one so, to make the next root class id to which this sstudent must be promoted to 
                    $this->mPromotedClassId = (int)$this->mRootClassId + 1;
                    //Retrieve the class name to show what class he or she is been promoted to 
                    $mClassName = Customer::GetClassNameById($this->mPromotedClassId);
                    $this->mPromotedClassName = $mClassName['class_name'];

                    $this->mPromoteBtnMsg = 'Promoted to ' . $this->mPromotedClassName . '. Click the register button below to SIGN-IN to the new class.';
                    $this->mShowBtn = true;
                    $this->mTakeActionBtn = true;

                }
                // ===================================================
                
                
                
            }
            elseif(($this->mAverage) && ($this->mAverage > FAIL_MARK))
            {
                //passed in first or second term
                $this->mPromoteBtnMsg = '<span style="color: green;">Excelled</span>';
                $this->mShowBtn = false;
            }
            elseif(($this->mAverage) && ($this->mAverage <= FAIL_MARK) && ($this->mCurrentTermId == 3))
            {
                //Failed in the third-term
                $this->mPromoteBtnMsg = '<span style="color: maroon;">Repeat Class</span>';
                $this->mShowBtn = false;
            }
            elseif(($this->mAverage) && ($this->mAverage < FAIL_MARK))
            {
                ////failed in first or second term
                $this->mPromoteBtnMsg = '<span style="color: maroon;">Failed</span>';
                $this->mShowBtn = false;
            }

        }

        

        // IF the student has a custome profile information, then retrieve it from the database 
        if(Student::GetProfileContent($_SESSION['schoolshop_student_id']))
        {
            $this->mProfileTileWithInfo = Student::GetProfileContent($_SESSION['schoolshop_student_id']);
            $this->mProfileTitle = $this->mProfileTileWithInfo['title'];
            $this->mProfileGoal = $this->mProfileTileWithInfo['goal'];
            $this->mProfileObjectives = $this->mProfileTileWithInfo['objectives'];
            $this->mProfileDescribeSelf = $this->mProfileTileWithInfo['describe_self'];

        }  
        else
        {
            // Else retrieve the default profile information
            $this->mProfileTileWithInfo = Student::GetDefaultFromCsv();
            $this->mProfileTitle = $this->mProfileTileWithInfo[0][0];
            $this->mProfileGoal = $this->mProfileTileWithInfo[0][1];
            $this->mProfileObjectives = $this->mProfileTileWithInfo[0][2];
            $this->mProfileDescribeSelf = $this->mProfileTileWithInfo[0][3];

        }

        // mReportCardLinks

        $this->mBottomColumnContent = 'view_class_lessons.tpl';
        $this->mRightColumnContent = 'passport_column.tpl';
        $this->mMiddleColumnContent = 'student_personal_title_and_content.tpl';
        $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
        $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';


        if(isset($_POST['edit_profile_info']))
        {
            $validate = new Validate();
            $fields = $validate->getFields();

            $fields->addField('title');
            $fields->addField('goals');
            $fields->addField('objectives');
            $fields->addField('about_yourself');

            // $fields->addField('addStudentToClassEmail');
            // $validate->email('addStudentToClassEmail', filter_input(INPUT_POST, 'addStudentToClassEmail'));
            $validate->onyeka_address('title', filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING));

            if($fields->hasErrors())
            {
                $this->_mErrors++;
                $this->mErrorMsg = "Title should contain not more than 250 valid characters, please check and try again";
            }
            else    
                $this->mTile = htmlentities(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));


            $validate->onyeka_address('goals', filter_input(INPUT_POST, 'goals', FILTER_SANITIZE_STRING));
            if($fields->hasErrors())
            {
                $this->_mErrors++;
                $this->mErrorMsg = "The Goals field should contain not more than 250 valid characters, please check and try again";
            }
            else 
                $this->mGoals = htmlentities(trim(filter_input(INPUT_POST, 'goals', FILTER_SANITIZE_STRING)));

//
            $validate->onyeka_address('objectives', filter_input(INPUT_POST, 'objectives', FILTER_SANITIZE_STRING));
            if($fields->hasErrors())
            {
                $this->_mErrors++;
                $this->mErrorMsg = "The Objectives field should contain not more than 250 valid characters, please check and try again";
            }
            else 
                $this->mObjectives = htmlentities(trim(filter_input(INPUT_POST, 'objectives', FILTER_SANITIZE_STRING)));


            $validate->onyeka_address('about_yourself', filter_input(INPUT_POST, 'about_yourself', FILTER_SANITIZE_STRING));

            if($fields->hasErrors())
            {
                $this->_mErrors++;
                $this->mErrorMsg = "The about yourself field should contain not more than 250 valid characters, please check and try again";
            }else 
                $this->mSelf = htmlentities(trim(filter_input(INPUT_POST, 'about_yourself', FILTER_SANITIZE_STRING)));


            #Below means everything looks great
            if(($this->_mErrors == 0) && ($this->mErrorMsg == false))
            {
                 //Call the function to add the profile information to the databas e
                $id = Student::AddStudentCustomProfileInfo($_SESSION['schoolshop_student_id'], $this->mTile, $this->mGoals, $this->mObjectives, $this->mSelf);
                //Retrieve the specific student profile 
                $this->mStudentsDetails = Student::GetStudentDetails($_SESSION['schoolshop_student_id']);


                $this->mStudentFullName = $this->mStudentsDetails['firstname'] . ' ' . $this->mStudentsDetails['surname']; 

                //Student Passport
                $pos = strpos($this->mStudentsDetails['email'], '@');
                $userfolder = substr($this->mStudentsDetails['email'], 0, $pos) . '_folder';
                $this->mPasportUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$userfolder.DIRECTORY_SEPARATOR.$this->mStudentsDetails['image1']);

                //Student Registration Number SITE_ROOT . 'student_report_cards'
                //Pull out oy retrieves the student report cards linkx
                $this->mStudentsReportpath = SITE_ROOT .DIRECTORY_SEPARATOR. 'student_report_cards'.DIRECTORY_SEPARATOR.$userfolder;

                $this->mReportCardLinks = StudentReportCard::GetStudentsReportCards($this->mStudentsReportpath, $this->mStudentsDetails['email']);

                //This check ensures the $this->mReportCardLinks variablee id not empty
                $this->mReportCardLinksCount = count($this->mReportCardLinks);

                //Email edit_profile_info
                $this->mStudentEmail = $this->mStudentsDetails['email'];

                //Date of birth
                $mDateofBirth = new DateTime($this->mStudentsDetails['dob']);
                $this->mDateOfBirth = $mDateofBirth->format('D, M d, Y');

                //Registration number 
                $mRegNo = Student::GetRegNo($this->mStudentsDetails["applicants_id"]);
                $this->mRegNo = $mRegNo['reg_number'];

                // var_dump($this->mStudentsDetails);
                //Medical Information
                $this->mBloodgroup = $this->mStudentsDetails["bloodgroup"]; 
                $this->mGenotype = $this->mStudentsDetails["genotype"]; 
                $this->mAllergies = $this->mStudentsDetails["allergies"]; 
                $this->mDefects = $this->mStudentsDetails["defects"]; 
                $this->mImmunize = $this->mStudentsDetails["immunize"]; 
                $this->mDocname = $this->mStudentsDetails["docname"]; 
                $this->mDocphone = $this->mStudentsDetails["docphone"]; 
                $this->mDocaddress = $this->mStudentsDetails["docaddress"];  
                $this->mOtherinfo = $this->mStudentsDetails["otherinfo"];
                
                //Father Information
                $this->mFatherFname = $this->mStudentsDetails["f_fname"]; 
                $this->mFatherLname = $this->mStudentsDetails["f_lname"];
                $this->mFatherPhone = $this->mStudentsDetails["f_phone"]; 
                $this->mFatherOfficeAddress = $this->mStudentsDetails["f_office"];
                $this->mFatherOccupation = $this->mStudentsDetails["f_occupation"];
                // $this->mFatherOfficeAddress ["f_religion"]=> string(5) "Islam" 
                $this->mFatherAddress = $this->mStudentsDetails["f_address"];

                //Father Information
                $this->mMotherFname = $this->mStudentsDetails["m_fname"];
                $this->mMotherLname = $this->mStudentsDetails["m_lname"]; 
                $this->mMotherPhone = $this->mStudentsDetails["m_phone"];
                $this->mMotherOfficeAddress = $this->mStudentsDetails["m_office"];
                $this->mMotherOccupation = $this->mStudentsDetails["m_occupation"];
                $this->mMotherReligion = $this->mStudentsDetails["m_religion"];
                $this->mMotherAddress = $this->mStudentsDetails["m_address"];

                //Using this dtudent's ID, retrieve the current classid from the active_class table 
                if(Student::RetrieveCurrentClassId($_SESSION['schoolshop_student_id']))
                {
                    $this->mCurrentClassId = Student::RetrieveCurrentClassId($_SESSION['schoolshop_student_id']);
                    #Use the classid to get the class_name
                    $mClassName = Customer::GetClassNameById($this->mCurrentClassId);
                    $this->mClassName = $mClassName['class_name'];

                }
                else 
                    trigger_error("Class id not found");


                // IF the student has a custome profile information, then retrieve it from the database 
                if(Student::GetProfileContent($_SESSION['schoolshop_student_id']))
                {
                    $this->mProfileTileWithInfo = Student::GetProfileContent($_SESSION['schoolshop_student_id']);
                    $this->mProfileTitle = $this->mProfileTileWithInfo['title'];
                    $this->mProfileGoal = $this->mProfileTileWithInfo['goal'];
                    $this->mProfileObjectives = $this->mProfileTileWithInfo['objectives'];
                    $this->mProfileDescribeSelf = $this->mProfileTileWithInfo['describe_self'];

                }  
                else
                {
                    // Else retrieve the default profile information
                    $this->mProfileTileWithInfo = Student::GetDefaultFromCsv();
                    $this->mProfileTitle = $this->mProfileTileWithInfo[0][0];
                    $this->mProfileGoal = $this->mProfileTileWithInfo[0][1];
                    $this->mProfileObjectives = $this->mProfileTileWithInfo[0][2];
                    $this->mProfileDescribeSelf = $this->mProfileTileWithInfo[0][3];

                }

                $this->mBottomColumnContent = 'view_class_lessons.tpl';
                $this->mRightColumnContent = 'passport_column.tpl';
                $this->mMiddleColumnContent = 'student_personal_title_and_content.tpl';
                $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
                $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';

            }
               

            


        }



        //THE LOGIC BELOW WILL SHOW THE STUDENTS SUBJECTS LESSONS, SO IF THE STUDENT CLICKS ON THE SUBJECT THE LESSON NOT OF THAT SUBJECT WILL SHOW UP. BUT THE PAGE WILL BY DEFAULT SAY "SELECTS A SUBJECT TO VIEW THE LESSON NOT //"

        if((isset($_POST['ViewClassLessonsBtn'])) && (isset($_POST['action'])) && ($_POST['action'] === 'ListClassLessons'))
        {
            //We must retrieve a list of all the subject offered by this student according to his class
            $this->mClassSubject = Teachers::GetAllSubjectsForASpecifiedClass($_SESSION['profileClassId']);
            // var_dump($this->mClassSubject);
            // Count the retrieved subjects
            $this->mSubjectCount = count($this->mClassSubject);
            if($this->mSubjectCount > 0)
            {
                // $this->mSubjectLessonLink = ;
                for ($i=0; $i < count($this->mClassSubject); $i++) 
                { 
                    # code...
                    $this->mClassSubject[$i]['link_to_lesson'] = Link::ToStudentLessonProfile($this->mClassSubject[$i]['subject_id']);
                    
                }
            }
            //Begin to display the interfaces below //mIsTopicsPresent
            // $this->mBottomColumnContent = 'view_class_lessons.tpl';
            
            // $this->mStudentFeedbackMsgTitle = "SELECT SUBJECT";
            // $this->mStudentFeedbackMsg = "Select a subject from the \"My Subjects\" Menu to view it content";
            // $this->mBottomColumnContent = 'student_feeback.tpl';


            // $this->mRightColumnContent = 'subjects_column.tpl';


            // $this->mMiddleColumnContent = 'student_personal_title_and_content.tpl';
            // $this->mMiddleColumnContent = 'blank.tpl';


            // $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
            // $this->mLeftColumnContent = 'blank.tpl';

            // $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';
            // $this->mStudentInfoBreakDown = 'blank.tpl';
            //-----------------------------------------mIsTopicsPresent
            //---------------------------------------------------------
                    // $this->mBottomColumnContent = 'view_class_lessons.tpl';
                    $this->mBottomColumnContent = 'blank.tpl';
                    $this->mRightColumnContent = 'passport_column.tpl';
                    $this->mMiddleColumnContent = 'subjects_column.tpl';
                    $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
                    $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';


        }




        //Clicking on specific subject on the students lesson page should take you to the selected subjects lessons page 
        if((isset($_GET['SubjectId'])) && (is_numeric($_GET['SubjectId'])))
        {
            $this->mSubjectId = (int)$_GET['SubjectId'];
            //Use the subject id to retrieve the lesson note for this class and this term
            if($this->mSubjectId)
            {
                //$_SESSION['profileClassId']
                $this->mRootClassId = (int)Teachers::GetRootClassByClassId($_SESSION['profileClassId']);
                $_SESSION['rootClassId'] = $this->mRootClassId;
                $_SESSION['rootSubjectId'] = $this->mSubjectId;

                //First what should be retrived it the topics that belongs to the term, class, and class specified
                $this->mLessonTopics = Student::GetLessonTopics($this->mSubjectId, $this->mCurrentTermId, $this->mRootClassId);
                $this->mLessonTopicsCount = count($this->mLessonTopics);
                
                if($this->mLessonTopicsCount > 0)
                {
                    //Since the lesson plan topics is available we need to create the link on the topics so they can be clicked to retrieve the content afterwrds 
                    for ($i = 0; $i < count($this->mLessonTopics); $i++) 
                    { 
                        $this->mLessonTopics[$i]['link_to_topic_content'] = Link::ToTopicContent($this->mLessonTopics[$i]['lesson_plan_id']);
                    } 
                    
                    //The the links will be created for topics that will be displayed by the side, so that if a student clicks on the sub-topic then the content of that lesson will be.

                    $this->mClassSubject = Teachers::GetAllSubjectsForASpecifiedClass($_SESSION['profileClassId']);
                    
                    // Count the retrieved subjects
                    $this->mSubjectCount = count($this->mClassSubject);
                    if($this->mSubjectCount > 0)
                    {
                        // $this->mSubjectLessonLink = ;
                        for ($i=0; $i < count($this->mClassSubject); $i++) 
                        { 
                            # code...
                            $this->mClassSubject[$i]['link_to_lesson'] = Link::ToStudentLessonProfile($this->mClassSubject[$i]['subject_id']);
                            
                        }
                    }

                    // -----------------------------------------
                    $this->mIsTopicsPresent = true;
                    //START SETTING UP THE PAGE BELOW TO DISPLAY THE LESSON SPECIFIED BY THE SUBJECT ID
                    // $this->mBottomColumnContent = 'blank.tpl';
                    // $this->mRightColumnContent = 'subjects_column.tpl';

                    // $this->mStudentFeedbackMsgTitle = "Select Topic";
                    // $this->mStudentFeedbackMsg = "Select a topic from the list of topics to view or reads its content.";
                    // $this->mMiddleColumnContent = 'student_feeback.tpl';
                    // $this->mLeftColumnContent = 'blank.tpl';
                    // $this->mStudentInfoBreakDown = 'blank.tpl';
                    // -------------------------------------------------------
                    // i stopped here select_topic.tpl
                     $mSubjectName = Teachers::GetSubjectNameById($_SESSION['rootSubjectId']);
                     $this->mSubjectName = $mSubjectName['name'];
                    //  -----------------------------------------------------------
                     $this->mBottomColumnContent = 'blank.tpl';
                    $this->mRightColumnContent = 'subjects_list_on_the_right.tpl';
                    // $this->mRightColumnContent = 'passport_column.tpl';
                    $this->mMiddleColumnContent = 'select_topic.tpl';
                    $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
                    $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';
                    

                }
                else
                {
                     //We must retrieve a list of all the subject offered by this student according to his class
                    $this->mClassSubject = Teachers::GetAllSubjectsForASpecifiedClass($_SESSION['profileClassId']);
                    // var_dump($this->mClassSubject);
                    // Count the retrieved subjects
                    $this->mSubjectCount = count($this->mClassSubject);
                    if($this->mSubjectCount > 0)
                    {
                        // $this->mSubjectLessonLink = ;
                        for ($i=0; $i < count($this->mClassSubject); $i++) 
                        { 
                            # code...
                            $this->mClassSubject[$i]['link_to_lesson'] = Link::ToStudentLessonProfile($this->mClassSubject[$i]['subject_id']);
                            
                        }
                    }
                    // ----------------------------------------------
                    // $this->mStudentFeedbackMsgTitle = "LESSONS UNAVAILABLE";
                    // $this->mStudentFeedbackMsg = "Lessons for the selected subject has not been published yet, please try again later, thanks.";
                    // $this->mBottomColumnContent = 'student_feeback.tpl';

                    // $this->mRightColumnContent = 'subjects_column.tpl';

                    // // $this->mMiddleColumnContent = 'student_personal_title_and_content.tpl';
                    // $this->mMiddleColumnContent = 'blank.tpl';
                    // // $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
                    // $this->mLeftColumnContent = 'blank.tpl';
                    // // $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';
                    // $this->mStudentInfoBreakDown = 'blank.tpl';
                    // ------------------------------------------------------
                    $mSubjectName = Teachers::GetSubjectNameById($_SESSION['rootSubjectId']);
                     $this->mSubjectName = $mSubjectName['name'];
                    //  --------------------------------------------
                    // ------------------------------------------------------
                    $this->mBottomColumnContent = 'blank.tpl';
                    $this->mRightColumnContent = 'passport_column.tpl';
                    $this->mMiddleColumnContent = 'select_topic.tpl';
                    $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
                    $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';

                }
                
            }
            else
                trigger_error("SubjectId not set");

        }




        //The logic below actually displays the content of a selected topic for student viewing by retrieving the lesson plan id (topicId) from the URL 
        if((isset($_GET['TopicId'])) && (is_numeric($_GET['TopicId'])))
        {
            $this->mTopicId = (int)$_GET['TopicId'];
            // var_dump();
            // $_SESSION['rootClassId']
            $this->mSubjectName = Teachers::GetSubjectNameById($_SESSION['rootSubjectId']);;
            


            // --------------------------For the subject column--------
             //We must retrieve a list of all the subject offered by this student according to his class
                    $this->mClassSubject = Teachers::GetAllSubjectsForASpecifiedClass($_SESSION['profileClassId']);
                    // var_dump($this->mClassSubject);
                    // Count the retrieved subjects
                    $this->mSubjectCount = count($this->mClassSubject);
                    if($this->mSubjectCount > 0)
                    {
                        // $this->mSubjectLessonLink = ;
                        for ($i=0; $i < count($this->mClassSubject); $i++) 
                        { 
                            # code...
                            $this->mClassSubject[$i]['link_to_lesson'] = Link::ToStudentLessonProfile($this->mClassSubject[$i]['subject_id']);
                            
                        }
                    }
            // --------------------------------------------------------


            // -----------------------for the topic sub-column---------
                

                $this->mLessonTopics = Student::GetLessonTopics($_SESSION['rootSubjectId'], $this->mCurrentTermId, $_SESSION['rootClassId']);
                $this->mLessonTopicsCount = count($this->mLessonTopics);
                for ($i=0; $i < count($this->mLessonTopics); $i++) 
                { 
                    $this->mLessonTopics[$i]['link_to_topic_content'] = Link::ToTopicContent($this->mLessonTopics[$i]['lesson_plan_id']);
                        
                } 
                    
            // --------------------------------------------------------


            // -------------------------------------------------------------

            /*
            "SELECT lesson_plan_id, topic, introduction, student_activities, summary, evaluation, conclusion, assignment, lpreferences, sys_date, date_added, instructionalMtr, instructionalImages, intronote, topic_define, subtopic1, subtopic1body, subtopic2, subtopic2body, subtopic3, subtopic3body, pre_summary, pre_summarybody, week_id FROM lesson_plan WHERE lesson_plan_id = :topic_id AND term_id = :term_id AND class_id = :class_id AND publish = 1";
            */
                $this->mLessonNote = Student::GetLesson($this->mTopicId, $this->mCurrentTermId, $_SESSION['rootClassId']);

                //Date lesson was published 
                $mLessonNoteDate = new DateTime($this->mLessonNote['date_added']);
                $this->mLessonNoteDate = $mLessonNoteDate->format('l, F d, Y');

                //Assignment/home work 
                $this->mAssignment = explode('hereNaJoin', $this->mLessonNote['assignment']);

                $this->mLessonNoteCount = count($this->mLessonNote);
                // Extract the image used for the instructional material image
                $this->mInstructionalImage = explode('hereNaJoin', $this->mLessonNote['instructionalImages']);
                // var_dump($this->mInstructionalImage); instImages
                $this->mInstructionalImage_750 = Link::Build('instImages' . DIRECTORY_SEPARATOR . $this->mInstructionalImage[0]);
                $this->mInstructionalImage_360 = Link::Build('instImages' . DIRECTORY_SEPARATOR . $this->mInstructionalImage[1]);
                $this->mInstructionalImage_365 = Link::Build('instImages' . DIRECTORY_SEPARATOR . $this->mInstructionalImage[2]);

                // var_dump($this->mInstructionalImage_750);
                

                //The machanics that will check and set up the "promote to the next class" functionality 
                
            // --------------------------------------------------------
                $mSubjectName = Teachers::GetSubjectNameById($_SESSION['rootSubjectId']);
                $this->mSubjectName = $mSubjectName['name'];
                    //  -----------------------------------------------------------
                    //  $this->mBottomColumnContent = 'blank.tpl';
                    // $this->mRightColumnContent = 'subjects_list_on_the_right.tpl';


            // -------------------------------------------------------------
                $this->mIsTopicsPresent = true;
                    //START SETTING UP THE PAGE BELOW TO DISPLAY THE LESSON SPECIFIED BY THE SUBJECT ID
                $this->mBottomColumnContent = 'blank.tpl';
                $this->mRightColumnContent = 'subjects_list_on_the_right.tpl';
                    
                $this->mMiddleColumnContent = 'lesson_content_column.tpl';
                $this->mLeftColumnContent = 'blank.tpl';
                $this->mStudentInfoBreakDown = 'blank.tpl';
                
            // -------------------------------------------------------------


        }





        //This logic below will promote a student to the new class by changing the class id in the activeclass table to an extension class of the rootID provided when the button is clicked 
        if(isset($_POST['actionBtn']) && $_POST['actionBtn'] === 'Register')
        {
            if((isset($_POST['action'])) && ($_POST['action'] === "Activate_new_class") && (isset($_POST['PromotedClassId'])) && (is_numeric($_POST['PromotedClassId'])))
            {
                $this->mPromotedClassId = (int)$_POST['PromotedClassId'];
                //Retrive a list of all the class extensions that are under this class
                $this->ExtensionOfPromotedClass = Student::GetClassBelongingToRoot($this->mPromotedClassId);
                // var_dump($this->ExtensionOfPromotedClass);
                $this->mBottomColumnContent = 'blank.tpl';
                $this->mRightColumnContent = 'passport_column.tpl';

                $this->mMiddleColumnContent = 'promote_class_lister.tpl';
                $this->mLeftColumnContent = 'blank.tpl';
                $this->mStudentInfoBreakDown = 'blank.tpl';
                
            }

        }




        //This logic below will come to execution if the student selects the class he or she is promoted to and clicks on the activate new class buttn
        if((isset($_POST['choosingNewClassId'])) && ($_POST['choosingNewClassId'] === 'ACTIVATE NEW CLASS'))
        {
            //Retrieve the the id of the selected new class from the post-array
            $this->mPromotedClassId = (int)filter_input(INPUT_POST, 'promotedToClassid', FILTER_VALIDATE_INT);
            if(is_numeric($this->mPromotedClassId))
            {
                //We must ensure that the number of student in this class whos id we have is less than official class limit for a standard class
                //By counting the number of students in this class
                $this->mNumberOfStudent = (int)Student::GetTheNumberOfStudentInThisCLass($this->mPromotedClassId);
                if($this->mNumberOfStudent > MAX_NUMBER_OF_STUDENT_IN_A_CLASS)
                {
                    // ----------------------------------------------
                    $this->mStudentFeedbackMsgTitle = "Maximum Exceed";
                    $this->mStudentFeedbackMsg = "The maximum number of student required for this class has been reached, please select a new class and try again, thanks.";
                    $this->mBottomColumnContent = 'student_feeback.tpl';

                    $this->mRightColumnContent = 'passport_column.tpl';

                    // $this->mMiddleColumnContent = 'student_personal_title_and_content.tpl';
                    $this->mMiddleColumnContent = 'blank.tpl';
                    // $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
                    $this->mLeftColumnContent = 'blank.tpl';
                    // $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';
                    $this->mStudentInfoBreakDown = 'blank.tpl';

                }
                else
                {
                    //This class is ok to be assigned to this student, as the new class he has been promoted to 
                    //We need to ensure that this update is not already done 
                    //so as to avoid un-neccessary operations $_SESSION['schoolshop_student_id']
                    if(Student::IsClassAlreadyUpdated($this->mPromotedClassId, $_SESSION['schoolshop_student_id']) == 0)
                    {
                        //You have already activated to the new class
                        // ----------------------------------------------
                        $this->mStudentFeedbackMsgTitle = "Activation Done";
                        $this->mStudentFeedbackMsg = "You have been promoted and activated for your new class academic activities thanks.";
                        $this->mBottomColumnContent = 'student_feeback.tpl';

                        $this->mRightColumnContent = 'passport_column.tpl';

                        // $this->mMiddleColumnContent = 'student_personal_title_and_content.tpl';
                        $this->mMiddleColumnContent = 'blank.tpl';
                        // $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
                        $this->mLeftColumnContent = 'blank.tpl';
                        // $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';
                        $this->mStudentInfoBreakDown = 'blank.tpl';
                    }
                    else
                    {
                        //You just finished activating the new class and the old record has been tranfered into the "myclass_archive" table
                        //You have already activated to the new class
                        // ----------------------------------------------
                        $mClassName = Customer::GetClassNameById($this->mCurrentClassId);
                        $this->mClassName = $mClassName['class_name'];

                        $this->mStudentFeedbackMsgTitle = "Congratulations!";
                        $this->mStudentFeedbackMsg = 'Your registration into ' .$this->mClassName . ' successfull';
                        $this->mBottomColumnContent = 'student_feeback.tpl';

                        $this->mRightColumnContent = 'blank.tpl';

                        // $this->mMiddleColumnContent = 'student_personal_title_and_content.tpl';
                        $this->mMiddleColumnContent = 'blank.tpl';
                        // $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
                        $this->mLeftColumnContent = 'blank.tpl';
                        // $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';
                        $this->mStudentInfoBreakDown = 'blank.tpl';
                    }

                }

            }

        }








        //The code below is for when a student clicks on the view CA link//
        if((isset($_GET['CA'])))
        {
            if((!$this->thisTermStarted) || (!$this->thisTermEnds))
            {
                $this->mStudentProfileErrMsg = "The term has ended, and CAs currently unavailable, thanks";
                //Give warning that either the ter has ended so new term-start-date has not been reached or inserted by the application admin
                $this->mBottomColumnContent = 'view_class_lessons.tpl';
                $this->mRightColumnContent = 'passport_column.tpl';
                $this->mMiddleColumnContent = 'student_personal_title_and_content.tpl';
                $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
                $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';

            }
            else
            {
                
                $this->mStudentCaExamsRecords = Teachers::GetStudentCaExamsRecords($_SESSION['schoolshop_student_id'], $_SESSION['profileClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                // $this->mStudentCaExamsRecordsCount = count
                // ---------------------------------------------------
                if(!$this->mStudentCaExamsRecords)
                {
                    $this->mStudentCaExamsRecordsCount = count($this->mStudentCaExamsRecords);
                    $this->mStudentProfileErrMsg = "Continuous Assesment records has not been published yet, thanks";
                    //Give warning that either the ter has ended so new term-start-date has not been reached or inserted by the application admin
                    $this->mBottomColumnContent = 'view_class_lessons.tpl';
                    $this->mRightColumnContent = 'passport_column.tpl';
                    $this->mMiddleColumnContent = 'student_personal_title_and_content.tpl';
                    $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
                    $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';

                }
                else
                {
                    $this->mStudentCaExamsRecordsCount = count($this->mStudentCaExamsRecords);
                    // ---------------------------------------------------
                    $this->mBottomColumnContent = 'view_class_lessons.tpl';
                    $this->mRightColumnContent = 'passport_column.tpl';
                    $this->mMiddleColumnContent = 'students_profile_ca_view.tpl';
                    $this->mLeftColumnContent = 'blank.tpl';
                    $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';

                }
                
                
            }

            // ------------------------------------------------
            // $this->mClassSubject = Teachers::GetAllSubjectsForASpecifiedClass($_SESSION['profileClassId']);
            // // var_dump($this->mClassSubject);
            // // Count the retrieved subjects
            // $this->mSubjectCount = count($this->mClassSubject);
            // ---------------------------------------------------
            
          

        }



        //This logic below will show the records if the continuose assesment
        if(isset($_POST['submitCaSubjectId']))
        {
            $this->mSubjectId = (int)filter_input(INPUT_POST, 'subject_ca_id', FILTER_VALIDATE_INT);

            //Then we need to call the function to retrieve the CAs of the selected subjectId, current-term, current-student-id, current-department, etc
            if($this->mSubjectId)
            {
                $this->mConfirmatoryList = Teachers::GetStudentCaExamsRecords($_SESSION['CaExamsStudentId'], $_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

                // ---------------------------------------------------
                $this->mBottomColumnContent = 'view_class_lessons.tpl';
                $this->mRightColumnContent = 'passport_column.tpl';
                $this->mMiddleColumnContent = 'students_profile_ca_recordview.tpl';
                $this->mLeftColumnContent = 'student_profile_quick_menu.tpl';
                $this->mStudentInfoBreakDown = 'student_info_breakdown.tpl';
                // ---------------------------------------------------

            }

            
                
        }







        


    }


    
}

?>