<?php 

//The class that is for the student personal profile page 
class StudentuserProfile
{
    //Public memebers
    public $mStudentId;
    public $mStudentEmail;
    public $mProfilePageTitle;
    public $mProfilePageSubTitle;
    public $mClassAssigned;

    public $mAllStudentInfo;
    public $mBigPassportName;
    public $mBigPassportUrl;

    public $mLinkToRegisterCustomer;

    public $mLinkToAccountDetails;
    public $mLinkToCreditCardDetails;
    public $mLinkToAddressDetails;

    public $mNormalParagraph1;
    public $mNormalParagraph2;
    public $mCongratMsg;

    public $mLinkToLogout;
    //Private members 
    private $_mErrors;
    private $_mStudentPaswd;


    //class constructor
    public function __construct()
    {
        //Make sure this page is securely view 
        if(!isset($_SESSION['student_bangis_user']) || !isset($_SESSION['student_bangis_id']) || empty($_SESSION['student_bangis_id']) || empty($_SESSION['student_bangis_user']))
        {
            //Redirect to the front page 
            $redirect_to = Link::ToIndex();
            header('Location: ' . $redirect_to);
            exit();
        }


        //Start other processing 
        if(isset($_SESSION['student_bangis_id']))
            $this->mStudentId = (int)$_SESSION['student_bangis_id'];

        //Call for this student users information 
        $this->mAllStudentInfo = Customer::GetStudentProfileInfo($this->mStudentId);
        $this->mLinkToRegisterCustomer = Link::ToRegisterCustomer();
        $this->mLinkToAccountDetails = Link::ToAccountDetails();
        $this->mLinkToCreditCardDetails = Link::ToCreditCardDetails();
        $this->mLinkToAddressDetails = Link::ToAddressDetails();

        $this->mLinkToLogout = Link::Build('index.php?Logout');

    }


    //The init method
    public function init()
    {
        //The student fullname / details
        $this->mProfilePageTitle = $this->mAllStudentInfo['surname'] .' '.$this->mAllStudentInfo['firstname'];
        $this->mClassAssigned = $this->mAllStudentInfo['class_assigned'];
        $this->mBigPassportName = $this->mAllStudentInfo['image4'];


        //
        $pos = strpos($this->mAllStudentInfo['email'], '@');
        $userfolder = substr($this->mAllStudentInfo['email'], 0, $pos) . '_folder';

        //Student Passport Location
        $this->mBigPassportUrl = Link::Build('user'.DIRECTORY_SEPARATOR.$userfolder.DIRECTORY_SEPARATOR. $this->mBigPassportName);

        //Extract the details that will be used to check against the customer table (this table save as the authntic student registration table )
        $this->mStudentEmail = $_SESSION['student_bangis_user'];
        $this->_mStudentPaswd = $_SESSION['student_bangis_pwd'];

        //Use it to properly check if this student is aithenticated based on customer table record
        $this->mIsCustomerStudentValid = Customer::IsValid($this->mStudentEmail, $this->_mStudentPaswd);
        //2 means studentcustomer has not registered
        //1 means the customer password is faulty
        //0 means every is correct
        if($this->mIsCustomerStudentValid == 2)
        {
            $this->mCongratMsg = 'Congratulations you have been offered admission into ' . $this->mAllStudentInfo['class_assigned'] . '!';

            $this->mNormalParagraph1 = 'Welcome msg as a new student is about to register... MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.';

            $this->mNormalParagraph2 = 'You are to clicl on the [I ACCEPT ADMISSION BUTTON] to continue your registration Boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed';

            
        } 
        elseif($this->mIsCustomerStudentValid == 0)
        {
            $this->mCongratMsg = 'Our Ambassador from  ' . $this->mAllStudentInfo['class_assigned'] . '!';
            
            $this->mNormalParagraph1 = 'Some coool information from school database or some thing.. register MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.';
        }
            
            


    }




}
?>