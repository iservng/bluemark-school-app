<?php
class StoreFront
{
    public $mSiteUrl;

    //Define the template file for the page contents
    public $mContentsCell = 'first_page_contents.tpl';

    //Define the template file for the categories cell
    public $mCategoriesCell = 'blank.tpl';

    //Define the template file for the cart summary cell
    public $mCartSummaryCell = 'blank.tpl';
    public $mLinkToAboutUs;

    //Define the template file for the login or logged cell
    public $mLoginOrLoggedCell = 'customer_login.tpl';
    public $mStaffLoginLink = 'staff_login_link.tpl';
    public $mClickOrLoggedCell = 'click_to_student_login_and_logged.tpl';

    //Controls the visibility of the shop navigation (departments etc) submitted_pin
    public $mHideBoxes = false;

    public $mIsPageMassage = 'BlueMark';
    public $mSubPageMassage = "We take care of your IT needs, so you can focus on your business";
    public $mPrintAdmissionLetterBtn = false;
    public $mPinError = 0;


    //Admission status cridentials
    public $mEmailAdmissionStatus;
    public $mPasswordAdmissionStatus;
    


    //Teacher fields
    public $mTeacherPhone;
    public $mTeacherFullname;
    public $mTeacherEmail;
    public $mTeacherCv;

    //Student Admision Status 
    public $mShowHideAdmissionStatusBtn = false;
    public $isAdmittedStatusForCurrentYear;

    //Page title
    public $mPageTitle;

    //Paypal continue shopping link
    public $mPayPalContinueShoppingLink;

    //The cv name
    public $mTeacherCvName400;
    public $mTeacherCvName400600;

//Private properties
    private $_mErrors = 0;
    private $_mPinId;
    private $_mIsFromValidUser = false;

    //Class constructor
    public function __construct()
    {
        $is_https = false;

        //Is the page being accessed through an HTTPS connection?
        if(getenv('HTTPS') == 'on')
            $is_https = true;

        //Use HTTPS when accessing sensitive pages yy
        if($this->_IsSensitivePage() && $is_https == false && USE_SSL != 'no')
        {
            $redirect_to = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')), 'https');
            header('Location: ' . $redirect_to);
            exit();
        }

        //Dont use HTTPS for non-sensitive pages 
        if(!$this->_IsSensitivePage() && $is_https == true)
        {
            $redirect_to = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));
            header('Location: ' . $redirect_to);
            exit();
        }




        if(isset($_POST['submitted_pin']))
        {
            if(empty($_POST['pin_number']))
            {
                $this->mIsPageMassage = 'Invalid PIN';
                $this->mPinError = 1;
                $this->_mErrors++;
            }
            else
                $this->_mPinId = $_POST['pin_number'];
            
        }

        //The apply as a teacher submit button check here
        if(isset($_POST['become_teacher']))
        {
            $namepattern = '/^[a-zA-Z]{3,32}[\s][a-zA-Z]{3,32}$/';
            $nameresult =  preg_match($namepattern, filter_input(INPUT_POST, 'fullname'));
            
           
            if(!isset($_POST['fullname']) || !($nameresult === 1))
            {
                $this->mIsPageMassage = 'Invalid Name';
                $this->_mErrors++;
            }
            else 
                $this->mTeacherFullname = filter_input(INPUT_POST, 'fullname');


            $phonepattern = '/^[0][7-9][0-1][[:digit:]]{8}$/';
            $phoneresult = preg_match($phonepattern, filter_input(INPUT_POST, 'phoneNumber'));
            if(!isset($_POST['phoneNumber']) || !($phoneresult === 1))
            {
                $this->mIsPageMassage = 'Invalid Phone Number';
                $this->_mErrors++;
            }
            else 
                $this->mTeacherPhone = filter_input(INPUT_POST, 'phoneNumber');



            $emailpattern = '/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,5})(\.[a-z]{2,5})?$/';
            $emailresult = preg_match($emailpattern, filter_input(INPUT_POST, 'emailaddress'));
            if(!isset($_POST['emailaddress']) || !($emailresult === 1))
            {
                $this->mIsPageMassage = 'Invalid Email';
                $this->_mErrors++;
            }
            else 
            {
                $applicant_read = Applicant::GetTeacherEmailInfor(filter_input(INPUT_POST, 'emailaddress'));
                if($applicant_read['teachers_id'])
                {
                    $this->mIsPageMassage = 'You have already applied using ' . htmlspecialchars($_POST['emailaddress']);
                    $this->_mErrors++;
                }
                else 
                    $this->mTeacherEmail = filter_input(INPUT_POST, 'emailaddress', FILTER_SANITIZE_EMAIL);
            }


            
            if(!isset($_FILES['cv']))
            {
                $this->mIsPageMassage = 'Your CV must be uploaded';
                $this->_mErrors++;
            }
            else 
            {
                if($_FILES['cv']['type'] == 'image/jpeg')
                {
                    $this->mTeacherCv = $_FILES['cv'];
                }
                elseif($_FILES['cv']['type'] == 'image/jpg')
                {
                    $this->mTeacherCv = $_FILES['cv'];
                }
                elseif($_FILES['cv']['type'] == 'image/png')
                {
                    $this->mTeacherCv = $_FILES['cv'];
                }
                elseif($_FILES['cv']['type'] == 'application/pdf')
                {
                    $this->mTeacherCv = $_FILES['cv'];
                }
                else
                {
                    $this->mIsPageMassage = 'Your CV must be an image or pdf file type';
                    $this->_mErrors++;
                }
            }
                

        }


        //The code for checking admission status 
        if(isset($_POST['admissionStatusCheckBtn']))
        {
            //collect the credentials 
             $emailpattern = '/^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,5})(\.[a-z]{2,5})?$/';

              $emailresult = preg_match($emailpattern, filter_input(INPUT_POST, 'chech_status_email'));
            if(!isset($_POST['chech_status_email']) || !($emailresult === 1))
            {
                $this->mIsPageMassage = 'Invalid Email';
                $this->_mErrors++;
            }
            else 
                $this->mEmailAdmissionStatus = filter_input(INPUT_POST, 'chech_status_email', FILTER_SANITIZE_EMAIL);



            //the password 
            $passwordpattern = '/^[a-zA-Z0-9]{3,32}$/';
            $passwordresult = preg_match($passwordpattern, filter_input(INPUT_POST, 'chech_status_paswd'));
            if(!isset($_POST['chech_status_paswd']) || !($passwordresult === 1))
            {
                $this->mIsPageMassage = 'Invalid Password';
                $this->_mErrors++;
            }
            else 
                $this->mPasswordAdmissionStatus = filter_input(INPUT_POST, 'chech_status_paswd');

        }


        //The logic for showing the admission status button 
        //  public $mShowHideAdmissionStatusBtn = false;
        $this->isAdmittedStatusForCurrentYear = Customer::GetAdmittedCurrentYearCount('Admitted');
        if($this->isAdmittedStatusForCurrentYear > 0)
            $this->mShowHideAdmissionStatusBtn = true;
            


        $this->mSiteUrl = Link::Build('');
        $this->mLinkToAboutUs = Link::ToAboutUs();



       
    }


    //Initialise presentation opbject
    public function init()
    {
        $_SESSION['link_to_store_front'] = Link::Build(str_replace(VIRTUAL_LOCATION, '', getenv('REQUEST_URI')));

        //Build the "continue shopping" link
        if(!isset($_GET['CartAction']) && !isset($_GET['Logout']) && !isset($_GET['RegisterCustomer']) && !isset($_GET['AddressDetails']) && !isset($_GET['CreditCardDetails']) && !isset($_GET['AccountDetails']) && !isset($_GET['Checkout']))
            $_SESSION['link_to_last_page_loaded'] = $_SESSION['link_to_store_front'];

        
        //Build the "cancel" link for the customer details page
        if(!isset($_GET['Logout']) && !isset($_GET['RegisterCustomer']) && !isset($_GET['AddressDetails']) && !isset($_GET['CreditCardDetails']) && !isset($_GET['AccountDetails']))
            $_SESSION['customer_cancel_link'] = $_SESSION['link_to_store_front'];

        if(isset($_GET['AboutUs']))
        {
            $this->mHideBoxes = true;
            $this->mContentsCell = 'about_us.tpl';
        }

        if(isset($_GET['SelectSection']))
        {
            $this->mHideBoxes = true;
            $this->mContentsCell = 'select_section_for_registration.tpl';
        }

        //Load department details if visiting a department
        if(isset($_GET['DepartmentId']))
        {
            $this->mHideBoxes = true;
            $this->mContentsCell = 'department.tpl';
            $this->mCategoriesCell = 'categories_list.tpl';
        }
        elseif(isset($_GET['ProductId']) && isset($_SESSION['link_to_continue_shopping']) && strpos($_SESSION['link_to_continue_shopping'], 'DepartmentId', 0) !== false)
        {
            $this->mCategoriesCell = 'categories_list.tpl';
        }

        //Load product details page if visiting a product
        if(isset($_GET['ProductId']))
        {
            $this->mHideBoxes = true;
            $this->mContentsCell = 'product.tpl';
        }
        elseif(isset($_GET['SearchResults']))
        {
            $this->mContentsCell = 'search_results.tpl';
            $this->mHideBoxes = true;
        }
            


        //Load shopping cart or cart summary template 
        if(isset($_GET['CartAction']))
        {
            $this->mHideBoxes = true;
            $this->mContentsCell = 'cart_details.tpl';
        }
        else 
            $this->mCartSummaryCell = 'cart_summary.tpl';


        if(Customer::IsAuthenticated())
        {
            $this->mLoginOrLoggedCell = 'blank.tpl';
            $this->mClickOrLoggedCell = 'customer_logged.tpl';
            $this->mStaffLoginLink = 'blank.tpl';
        }
            

        if(isset($_GET['RegisterCustomer']) || isset($_GET['AccountDetails']))
        {
            $this->mContentsCell = 'customer_details.tpl';
            $this->mHideBoxes = true;
        }
        elseif(isset($_GET['AddressDetails']))
        {
            $this->mContentsCell = 'customer_address.tpl';
            $this->mHideBoxes = true;
        }
        elseif(isset($_GET['CreditCardDetails']))
        {
            $this->mContentsCell = 'customer_credit_card.tpl';
            $this->mHideBoxes = true;
        }
        elseif(isset($_GET['MyProfile']))
        {
            $this->mContentsCell = 'my_profile_as_student.tpl';
            $this->mHideBoxes = true;
        }


        if(isset($_GET['ApplicationDone']))
        {
            $this->mHideBoxes = true;
            $this->mContentsCell = 'application_done.tpl';
        }

        if(isset($_GET['StudentProfile']))
        {
            $this->mHideBoxes = true;
            $this->mContentsCell = 'student_personal_profile_page.tpl';
        }
            


        if(isset($_GET['Checkout']))
        {
            if(Customer::IsAuthenticated())
            {
                $this->mHideBoxes = true;
                $this->mContentsCell = 'checkout_info.tpl';
            }
            else
            {
                $this->mHideBoxes = true;
                $this->mContentsCell = 'checkout_not_logged.tpl';
            } 
                
            $this->mHideBoxes = true;
        }


        if(isset($_GET['OrderDone']))
        {
            $this->mHideBoxes = true;
            $this->mContentsCell = 'order_done.tpl';
        }
        elseif(isset($_GET['OrderError']))
        {
            $this->mHideBoxes = true;
            $this->mContentsCell = 'order_error.tpl';
        } 

        //Load the applications form
        if(isset($_GET['NurseryApplicationForm']))
        {
            $_SESSION['section_selected'] = 'Nursery';
            $this->mHideBoxes = true;
            $this->mContentsCell = 'nursery_application_form.tpl';
        }
        elseif(isset($_GET['PrimaryApplicationForm']))
        {
            $_SESSION['section_selected'] = 'Primary';
            $this->mHideBoxes = true;
            $this->mContentsCell = 'primary_application_form.tpl';
        }
        elseif(isset($_GET['SecondaryApplicationForm']))
        {
            $_SESSION['section_selected'] = 'Secondary';
            $this->mHideBoxes = true;
            $this->mContentsCell = 'secondary_application_form.tpl';
        }
            



        //Load the page title
        $this->mPageTitle = $this->_mGetPageTitle();



        //If we have submitted data and no errors in the submitted data//
        if(isset($_POST['submitted_pin']) && ($this->_mErrors == 0))
        {
            //Check if we have this as a valid PIN
            $_SESSION['pin_onyeka_valid'] = StudentPin::IsPinValid($this->_mPinId);

            // if pin is = 1 header to where to select  the section 
            if($_SESSION['pin_onyeka_valid'] == 1)
            {
                $_SESSION['pin_on_valid'] = true;
                $this->_mIsFromValidUser = $_SESSION['pin_on_valid'];
            }
            else 
            {
                $this->mIsPageMassage = 'Invalid PIN';
                $_SESSION['pin_on_valid'] = false;
            } 
                


            if($this->_mIsFromValidUser)
            {
                //Redirect to application pages
                $redirect_to = Link::ToSelectSection();
                header('Location: ' . $redirect_to);
                exit();
            }
            else
                $this->mIsPageMassage = 'Unauthorised Access';
        }






        //Processing of the teacher fields 
        if(isset($_POST['become_teacher']) && $this->_mErrors == 0)
        {
            //Remove the space from fulname 
            $t_fullname = str_replace(' ', '', $this->mTeacherFullname);

            //Concatenate the number to the fulname 
            $t_fulname = $t_fullname . $this->mTeacherPhone;

            $t_foldername = $t_fulname.'_folder';

            //Reaname the file for the cv
            $i = strrpos($this->mTeacherCv['name'], '.');
            $image_name = substr($this->mTeacherCv['name'], 0, $i);
            $ext = substr($this->mTeacherCv['name'], $i);

            //Rename the cv file sent by teacher applicant
            $this->mTeacherCvName400 = $t_fulname . $ext;
            

            //Make a folder for the applying teacher 
            if(!is_dir(SITE_ROOT . '/user/' . $t_foldername))
            {
                mkdir(SITE_ROOT.'/user/' . $t_foldername, 0777);
                //Use the move upload function to send it to its permanent location
                $success = move_uploaded_file($this->mTeacherCv['tmp_name'], SITE_ROOT.'/user/'.$t_foldername.'/'.$this->mTeacherCvName400);

            
                if($success)
                {
                    
                    ImageUtil::process_image_anysize(SITE_ROOT.'/user/' . $t_foldername, $this->mTeacherCvName400, 600, 800);

                    $i = strrpos($this->mTeacherCvName400, '.');
                    $image_name = substr($this->mTeacherCvName400, 0, $i);
                    $ext = substr($this->mTeacherCvName400, $i);

                    // Set up the write paths
                    $this->mTeacherCvName400600 = $image_name . '_600' . $ext;
                    
                    //Delete the original uploaded passport
                    unlink(SITE_ROOT.'/user/'.$t_foldername.DIRECTORY_SEPARATOR.$this->mTeacherCvName400);
                    //Process the 400x600 copy of cv

                    
                    //Assemble all teacher info and store it in the database
                    Applicant::add_teacher_info(strtoupper($this->mTeacherFullname), $this->mTeacherPhone, $this->mTeacherEmail, $this->mTeacherCvName400600);

                    //This session tells whether a student is applying or teacher
                    //student = true
                    //teacher = false
                    $_SESSION['application_for'] = 'Employment';
                    $_SESSION['applicant_name'] = $this->mTeacherFullname;

                    //Redirect to the application complete page 
                    $redirect_to = Link::ToApplicationDone();
                    header('Location: ' . $redirect_to);
                    exit();
                }
                else
                    $this->mIsPageMassage = 'File upload failure, try again';
                    
            }
            else
            {
                $this->mIsPageMassage = 'Your have already applied';
                
            }
        
        }

        




        //The logic for the checking of admission status 
        if(isset($_POST['admissionStatusCheckBtn']) && $this->_mErrors == 0)
        {
            //Call the database to get the stored values for comparisons tt
            $applicant_read = Applicant::GetCheckUserAdmissionStatus($this->mEmailAdmissionStatus);
            if(!$applicant_read)
                $this->mIsPageMassage = 'Invalid credentials';
            else 
            {
                $pass_construct = $this->mPasswordAdmissionStatus.$this->mEmailAdmissionStatus.$this->mPasswordAdmissionStatus;

                // Verify password
                $mPasswordOk = password_verify($pass_construct, $applicant_read['password']);

                if(($mPasswordOk) && ($applicant_read['applicants_id']) && ($applicant_read['status'] === 'Admitted') && ($applicant_read['class_assigned'] != null))
                {
                    // //Redirect to the users personal profile 
                    // $_SESSION['student_bangis_user'] = $applicant_read['email'];
                    // $_SESSION['student_bangis_pwd'] = $this->mPasswordAdmissionStatus;
                    // $_SESSION['student_bangis_id'] = $applicant_read['applicants_id'];
                    // $redirect_to = Link::ToStudentProfilePage();
                    // header('Location: ' . $redirect_to);
                    // exit();

                    // mStudentAL_id => students admission letter ID
                    $_SESSION['mStudentAL_id'] = $applicant_read['applicants_id'];
                    $this->mIsPageMassage = 'Congratulations!';

                    $this->mSubPageMassage = "You've been admitted, Print your Admission Letter, and proceed with registration";
                    $this->mPrintAdmissionLetterBtn = true;
                    $this->mShowHideAdmissionStatusBtn = false;


                }
                else 
                    $this->mIsPageMassage = 'Your application is being processed';

                
                // echo '<h1> Applicant = ' . $applicant_read  print_admission_letter ['applicants_id'] . '<h1><br>';
                // echo '<h1> Applicant status = ' . $applicant_read['status'] . '<h1><br>';
                // echo '<h1> classs assigned = ' . $applicant_read['class_assigned'] . '<h1><br>';
                // echo '<h1> Password ok = ' . password_verify($pass_construct, $applicant_read['password']) . '<h1><br>';

            }
            
                
        }



         //The logic below print the admission letter do not
        if(isset($_POST['print_admission_letter']))
        {

            // Check id the session variable is set
            if(isset($_SESSION['mStudentAL_id']))
            {
                
                // Call for the students information 
                $applicant_read = Customer::GetStudentProfileInfo($_SESSION['mStudentAL_id']);
                //Call the pdf library to produce the admission letter 
                // include('student_admission_letter.php');
                $mStudent_name = $applicant_read['firstname'] . ' ' . $applicant_read['surname'];

                $mMsg_body = "You have been accepted into our prestigious program as an attachment student. In ISERV TECH we write code. However, unlike most software companies, we realize that's only part of the job. We don't just write code… We develop professional software. This is why our clients choose ISERV. Many companies can find programmers to generate code. However, few have the experience to produce professional quality software";

                $this->mSchoolLogo = Link::Build("presentation/" . 'logos.png');

                $today = new DateTime();
                $today = $today->format('l, F d, Y');
                //Include the library 
                // var_dump($applicant_read);
                // exit;iiii
                include(PRESENTATION_DIR . 'student_admission_letter.php');
                
                

            }
        
        }


    }



    //Return the page title
    private function _mGetPageTitle()
    {
        $page_title = 'BlueMark: ' . 'Product Catalog from Beautiful school E-commerce';
        if(isset($_GET['DepartmentId']) && isset($_GET['CategoryId']))
        {
            $page_title = 'BlueMark: ' . Catalog::GetDepartmentName($_GET['DepartmentId']) . '-' . Catalog::GetCategoryName($_GET['CategoryId']);

            if(isset($_GET['Page']) && ((int)$_GET['Page']) > 1)
                $page_title .= '- Page ' . ((int)$_GET['Page']);
        }
        elseif(isset($_GET['DepartmentId']))
        {
            $page_title = 'BlueMark: ' . Catalog::GetDepartmentName($_GET['DepartmentId']);
            if(isset($_GET['Page']) && ((int)$_GET['Page']) > 1)
                $page_title .= ' - Page ' . ((int)$_GET['Page']);
        }
        elseif(isset($_GET['ProductId']))
        {
            $page_title = 'BlueMark: ' . Catalog::GetProductName($_GET['ProductId']);
        }
        elseif(isset($_GET['SearchResults']))
        {
            $page_title = 'BlueMark: "';
            //Display the sarch string
            $page_title .= trim(str_replace('-', ' ', $_GET['SearchString'])) . '" (';
            //Display "all-words search" or "any-words search"
            $all_words = isset($_GET['AllWords']) ? $_GET['AllWords'] : 'off';
            $page_title .= (($all_words == 'on') ? 'all' : 'any') . '-words search';

            //Display page number 
            if(isset($_GET['Page']) && ((int)$_GET['Page']) > 1)
                $page_title .= ', Page ' . ((int)$_GET['Page']);

            $page_title .= ')';

        }
        else 
        {
            if(isset($_GET['Page']) && ((int)$_GET['Page']) > 1)
                $page_title .= ' - Page ' . ((int)$_GET['Page']);
        }
        return $page_title;
    }



    private function _IsSensitivePage()
    {
        if(isset($_GET['RegisterCustomer']) || isset($_GET['AccountDetails']) || isset($_GET['CreditCardDetails']) || isset($_GET['AddressDetails']) || isset($_GET['Checkout']) || isset($_GET['Login']))
            return true;

        return false;
    }


}
 ?>
