<?php 

class AdminSetting
{

    //PUBLIC MEMBERS 
    public $mCurrentTermStartDate;
    public $mCurrentTermName;
    public $mCurrentTermStartDateErrorMsg = '';
    public $mCurrentTermStartDateError = 0;
    public $mCurrentTermNameError = 0;
    public $mLinkToAdminSettings;
    public $mSchoolTerms;
    public $mAllGood = false;
    public $mWeeklyDates;
    public $mWeeklyDay;
    public $mGeneralWeeklyDates;
    public $mListOfSubject;

    public $mTermStarts;
    public $mStarts;
    public $mTermStops;
    public $mStops;

    public $mNewSubjectError = false;
    public $mNewSubject;
    public $mNewSubjectSuccessMsg = '';
    public $mNewSubjectErrorMsg;
    public $mSubjectId;
    public $mListOfClasses;
    public $mListOfDepartment;

    public $mDepartmentIdError = 0;
    public $mDepartmentId;
    public $mNewClassSuccessMsg;
    public $mDepartmentIdErrorMsg;

    public $mCurrentAdmissionErr = 0;
            
    public $mCurrentAdmissionErrMsg;
    public $mNewClassError = 0;
    public $mCurrentAdmission;
    public $mNewClassErrorMsg;
    public $mNewAdminErrorMsg = false;
    public $mAdminTypeName;
                
    public $mNewClassName;
    public $mAdmissionSessionMsg;

    //May be deleted
    public $weekone;
    public $mIsItWeekend;
    public $mNaweekendMsg;
    public $mNewAdminSuccessMsg  = false;
    public $adminLevels = array(
        'Admin', //1
        'Non-academic', //2 
        'Accounts',  // 3
        'Academic' //4
    );
            
    //pRIVATE MEMBERS 
    private $_mErrors = 0;
    //CLASS CONSTRUCTOR
    public function __construct()
    {
        if(!isset($_SESSION['admin_logged']) || $_SESSION['admin_logged'] != true)
        {
            $redirect_to = Link::ToIndex();
            header('Location: ' . $redirect_to);
            exit();
        }




        
            //Get the list of subjects 
            $this->mListOfSubject = Teachers::GetSubjectList();

            //Get the list of classes in the school
            $this->mListOfClasses = Teachers::GetClassList();
            //Get the department list from the catalog
            $this->mListOfDepartment = Catalog::GetDepartments();

            $this->mLinkToAdminSettings = Link::ToAdminSetting();
            // $this->mLinkToDeleteSubject = Link::ToDeleteSubject($subjectId);

            $this->mStarts = DateWeek::TermStartStopDate(1);
            $this->mTermStarts = $this->mStarts['term_start'];

            $this->mStops = DateWeek::TermStartStopDate(15);
            $this->mTermStops = $this->mStops['term_stop'];


            #Source classes classExtension
            $this->mSourceClass = Teachers::GetAllSourceClass();
            $this->mSourceClassCount = count($this->mSourceClass);




        //Validations for adding new admin staff
        if(isset($_POST['add_new_admin_now']))
        {
            $validate = new Validate();
            $fields = $validate->getFields();

            //Add all the field values
            $fields->addField('admin_email');
            $fields->addField('admin_pass');
            $fields->addField('admin_type');
           
            //Start validating
            $validate->email('admin_email', filter_input(INPUT_POST, 'admin_email', FILTER_SANITIZE_EMAIL));
            //Check if this email is duplicate gg
            $this->mTeacher_confirmedId = (int)Teachers::IsAdminMailDuplicate(filter_input(INPUT_POST, 'admin_email', FILTER_SANITIZE_EMAIL));

            

            if((empty($_POST['admin_email'])) || ($this->mTeacher_confirmedId <= 0) || ($fields->hasErrors()))
            {
                $this->_mErrors++;
                $this->mNewAdminErrorMsg = 'Enter a valid and unique email tt';
            }
            else
                $this->mNewAdminEmail = filter_input(INPUT_POST, 'admin_email', FILTER_SANITIZE_EMAIL);


            

            $validate->password('admin_pass', filter_input(INPUT_POST, 'admin_pass'));
            
            if((empty($_POST['admin_pass'])) || ($fields->hasErrors()))
            {
                $this->_mErrors++;
                $this->mNewAdminErrorMsg = 'Use a minimum of 6 alphanumerical password with one charecter capitalized';
            }
            else 
                $this->mNewAdminPassword = filter_input(INPUT_POST, 'admin_pass');


            $validate->onyeka_address('admin_type', filter_input(INPUT_POST, 'admin_type', FILTER_VALIDATE_INT));
            if((empty($_POST['admin_type'])) || (!is_numeric($_POST['admin_type'])) || ($fields->hasErrors()))
            {
                $this->_mErrors++;
                $this->mNewAdminErrorMsg = 'please select a valid admin type from the drop-down list';
            }
            else 
                $this->mAdminType = filter_input(INPUT_POST, 'admin_type', FILTER_VALIDATE_INT);

        }




















        //Starts validation saveChangesBtn
        if(isset($_POST['saveChangesBtn']))
        {
            if(empty($_POST['current_term_start_date']))
            {
                $this->mCurrentTermStartDateError = 1;
                $this->_mErrors++;
                $this->mCurrentTermStartDateErrorMsg = 'Enter what date the current term starts';
            }
            else
            {

                $this->mWeeklyDay = DateWeek::CheckMondayDates($_POST['current_term_start_date']);
                if(!($this->mWeeklyDay))
                {
                    $this->mCurrentTermStartDateError = 1;
                    $this->_mErrors++;
                    $this->mCurrentTermStartDateErrorMsg = 'Enter Date that correspond to a Monday! ';

                }
                else 
                    $this->mCurrentTermStartDate = filter_input(INPUT_POST, 'current_term_start_date');


            }
                



            if(empty($_POST['current_term']))
            {
                $this->mCurrentTermNameError = 1;
                $this->_mErrors++;
            }
            else 
                $this->mCurrentTermName = filter_input(INPUT_POST, 'current_term');

        }

        if(isset($_POST['newSubjectBtn']))
        {
            $namepattern = '/^[a-zA-Z\s]{3,32}$/';
            $nameresult =  preg_match($namepattern, filter_input(INPUT_POST, 'newSubject'));
            
           
            if(!isset($_POST['newSubject']) || !($nameresult === 1))
            {
                $this->mNewSubjectError = true;
                $this->_mErrors++;
                $this->mNewSubjectErrorMsg = 'ERROR: Invalid subject name format! ' . '<a href="">OK</a>';
                // $this->mNewSubjectSuccessMsg = 'Invalid subject name format';
            }
            else 
                $this->mNewSubject = strtoupper(filter_input(INPUT_POST, 'newSubject', FILTER_SANITIZE_STRING));
        }


        if(isset($_GET['SubjectAction']))
        {
            if(isset($_GET['SubjectId']))
                $this->mSubjectId = (int)filter_input(INPUT_GET, 'SubjectId', FILTER_VALIDATE_INT);
            else 
                trigger_error('Subject_id not set');
        }

        if(isset($_GET['ClassAction']) && ($_GET['ClassAction'] === 'Delete'))
        {
            if(isset($_GET['ClassId']))
                $this->mClassId = (int)filter_input(INPUT_GET, 'ClassId', FILTER_VALIDATE_INT);
            else 
                trigger_error('Class_id not set');
        }
        


        //The logic that handles the adding of classes to the system
        if(isset($_POST['newClassBtn']))
        {
            //Then we will grab the values of the department that the new class to be added belongs to 
            if(!isset($_POST['schoolDepartment']))
            {
                $this->mDepartmentIdError = 1;
                $this->_mErrors++;
                $this->mDepartmentIdErrorMsg = 'Please select the department for the new class';

            }
            else 
                $this->mDepartmentId = (int)filter_input(INPUT_POST, 'schoolDepartment');
                 


            if(!isset($_POST['newClass']))
            {
                $this->mNewClassError = 1;
                $this->_mErrors++;
                $this->mNewClassErrorMsg = 'ERROR: The new class name is required';

            }
            else 
            {
                
                $classpattern = '/^[a-zA-Z0-9\s-]{3,32}$/';
                if(preg_match($classpattern, $_POST['newClass']) !== 1)
                {
                    $this->mNewClassError = 1;
                    $this->_mErrors++;
                    $this->mNewClassErrorMsg = 'ERROR: Enter a VALID class name';
                }
                else 
                    $this->mNewClassName = filter_input(INPUT_POST, 'newClass', FILTER_SANITIZE_STRING);
            }

            if(!isset($_POST['classExtension']) || $_POST['classExtension'] == NULL)
            {
                $this->mNewClassExtensionError = 1;
                $this->_mErrors++;
                $this->mNewClassErrorMsg = 'ERROR: Select the class from which the entered class was extended!';
            }

        }




        //The varification logic for the session date setting 
        if(isset($_POST['setSessionBtn']))
        {
            //Grabe and verifi what the date is saveChangesBtn 
            if(!isset($_POST['current_admission_start_date']) || empty($_POST['current_admission_start_date']))
            {
                $this->mCurrentAdmissionErr = 1;
                $this->_mErrors++;
                $this->mCurrentAdmissionErrMsg = 'ERROR: Enter a VALID date';
            }
            else 
                $this->mCurrentAdmission = filter_input(INPUT_POST, 'current_admission_start_date');
        }

    }






    public function init()
    {
        //Ceate the links to delete subject 
        for($i = 0; $i < count($this->mListOfSubject); $i++)
        {
            $this->mListOfSubject[$i]['link_delete_subject'] = Link::ToDeleteSubject($this->mListOfSubject[$i]['subjects_id']);
        }

        //Ceate the links to delete classes 
        for($i = 0; $i < count($this->mListOfClasses); $i++)
        {
            $this->mListOfClasses[$i]['link_delete_class'] = Link::ToDeleteClass($this->mListOfClasses[$i]['school_classes_id']);
        }

        //Delete one of the subject 
        if(isset($_GET['SubjectAction']))
        {
            //Call the function to delet one of the subjects 
            Teachers::DeleteSubject($this->mSubjectId);
            $this->mNewSubjectSuccessMsg =  'Subject deleted successfully ' . '<a href="' . $this->mLinkToAdminSettings . '">OK</a>';

        }

        if(isset($_GET['ClassAction']) && ($_GET['ClassAction'] === 'Delete'))
        {
            Teachers::DeleteClass($this->mClassId);
            $this->mNewClassSuccessMsg =  'Class deleted successfully ' . '<a href="' . $this->mLinkToAdminSettings . '">OK</a>';
        }




        if(isset($_POST['newSubjectBtn']) && $this->_mErrors == 0)
        {
            //Call the function to add the subject to the database
            Teachers::AddNewSubject($this->mNewSubject);
            $this->mNewSubjectSuccessMsg = $this->mNewSubject . ' added successfully ' . '<a href="">OK</a>';
        }


        //The logic that adds a new class name to the database
        //Get the jek 
        if(isset($_POST['newClassBtn']) && $this->_mErrors == 0)
        {
            //Call the function to add the class name to the database
            #Retrieve what class the extension belong to
            $this->mClassSourceId = (int)filter_input(INPUT_POST, 'classExtension', FILTER_VALIDATE_INT);

            Teachers::AddNewClassName($this->mNewClassName, $this->mDepartmentId, $this->mClassSourceId);

            $this->mNewClassSuccessMsg = $this->mNewClassName . ' is been added successfully ' . ' <a href="">OK</a>';

        }


        if(isset($_POST['current_admission_start_date']) && $this->_mErrors == 0)
        {
            //Call the function that sets the date for the current admission session 
            $theyearonly = substr($this->mCurrentAdmission, 0, 4);
            
            $result = Teachers::AddDateForAdmissionSession($this->mCurrentAdmission, $theyearonly);

            if($result > 0)
            {
                $this->mAdmissionSessionMsg = 'The session date has been set successfully ' . '<a href="">OK, Got It!</a>';
            }
            else 
            {
                $this->mCurrentAdmissionErr = 1;
                $this->_mErrors++;
                $this->mCurrentAdmissionErrMsg = 'ERROR: The date you entered already exists!';
            }
            

        }


        if(isset($_POST['saveChangesBtn']) && $this->_mErrors == 0)
        {
            /*
                The means everything is fine and both the date and ther term fields have values
                We supplied the date given to DateWeek classand supplie the term value to the function that will This function below creates all the date 15 weeks school opening period, it based on th date the user supplied initially. It dates are primarily used by the application in making all attendance calculations
            */
            $this->mWeeklyDates = DateWeek::CreateWeeklyDates($this->mCurrentTermStartDate);
            /*
             This function below creates all the date 15 weeks school opening period, it starts with a Sunday but based on th date the user supplied initially. It dates are primarily used by the application in making all other calculations that might not neccessarily be attendance
             */
            $this->mGeneralWeeklyDates = DateWeek::CreateGeneralWeeklyDates($this->mCurrentTermStartDate);
            
            if(($this->mWeeklyDates) && ($this->mGeneralWeeklyDates))
            {
                DateWeek::UpdateTerm($this->mCurrentTermName, 1);
                $this->mAllGood = true;
            }
                
        }




        /**
         * The logic below will handle the adding of a new admin staff to the database 
         */
        if((isset($_POST['add_new_admin_now'])) && ($this->_mErrors == 0))
        {
            // We shall ensure that only teachers who are the hihest admin or the owner of the school is allowed to perform this action of adding a new admin to the databas e
            if((int)$_SESSION['admin_type'] === 7)
            {
                /*
                    Since its been confirmed that this staff is an authentic teacher in this school by ensuring that his status = 6 and that the admin_type = 0(This confirms that he has not been made admin befor)
                    1. We shall take the extracted teacher ID($this->mTeacher_confirmedId) and put it in the admin table 
                    2. Then we shall set the admin_type in the teachers table of the database 
                */
                
                $this->mTeacherAddedToAdmin = Teachers::AddTeacherToAdmin($this->mTeacher_confirmedId);
                if($this->mTeacherAddedToAdmin)
                    Teachers::SetTeacherAdminType($this->mTeacher_confirmedId, $this->mAdminType);


                $this->mTeacherfullname = Teachers::GetTeacherName($this->mTeacher_confirmedId);


                /*
                    $adminLevels = array(
                    'Admin', //1
                    'Non-academic', //2 
                    'Accounts',  // 3
                    'Academic' //4
                */
                //Swith the admin type 
                switch ($this->mAdminType) {
                    case 1:
                        # code...
                        $this->mAdminTypeName = "Admissions";
                        break;
                    case 2:
                        $this->mAdminTypeName = "Non-academic";
                        break;
                    case 3:
                        $this->mAdminTypeName = "Accounts";
                        break;
                    case 4:
                        $this->mAdminTypeName = "Academic";
                        break;
                    
                    default:
                        # code...
                        break;
                }


                $this->mNewAdminSuccessMsg = $this->mTeacherfullname['name']." recognised as " . $this->mNewAdminEmail . " has been added as an " . $this->mAdminTypeName . " admin.";

            }
            else
            {
                //Here means that this admin is not authorized o add another as an admin
                // $this->mLinkToAdminSettings
                $this->mNewAdminErrorMsg = 'You are not authorized to add an admin';
            }
            


        }




       




    }


}
?>