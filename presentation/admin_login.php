<?php

//Class that deals with authenticating administrators
class AdminLogin
{
    //Public variables available in smarty template
    public $mUsername;
    public $mPassword;
    public $mLoginMessage = '';
    public $mLinkToAdmin;
    public $mLinkToIndex;
    public $mSiteUrl;

    //Class construct
    public function __construct()
    {
        //Verify if the correct username and password have been supplied
        if(isset($_POST['submit']))
        {

            //Modification of Admin login logic 
            if((isset($_POST['username'])) && (isset($_POST['password'])))
            {
                //The password and username(email) is not empty
                //Cross-check with the value in the database Validate
                include_once(BUSINESS_DIR . 'validator.php');
                include_once(BUSINESS_DIR . 'fields.php');
                include_once(BUSINESS_DIR . 'teachers.php');

                $validate = new Validate();
                $fields = $validate->getFields();

                //Add all the field values
                $fields->addField('username');
                $fields->addField('password');
                // $fields->addField('admin_type');

                $validate->email('username', filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL));
                $validate->password('password', filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

                if((empty($_POST['username'])) || (empty($_POST['password'])) || ($fields->hasErrors()))
                    $this->mLoginMessage = 'Login failed. Please try again 1';
                else 
                {
                    //Start comparing with values of the ones in the database 
                    $this->mUsername = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_EMAIL);
                    $this->mPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

                    //Retrieve the values from the databas 
                    $this->mUser = Teachers::GetAdminUserInfo($this->mUsername);

                    if($this->mUser)
                    {
                        // Here means that there is a user with this supplied email vvvv
                        //So set up the password and make the final comparison
                        $arrangedPassword = HASH_PREFIX.HASH_PREFIX.$this->mPassword . $this->mUsername . $this->mPassword;

                        if((password_verify($arrangedPassword, $this->mUser['password'])) && ((int)$this->mUser['status'] === 6))
                        {
                            //This place is sue that this teacher is confirmed staff who is all about to be check if he or she is an admin 
                            //Check the admin table to confirm that 
                            // $this->mIsUserAnAdmin = (int)Teachers::IsUserAnAdmin((int)$this->mUser['teachers_id']); 
                            if((int)Teachers::IsUserAnAdmin((int)$this->mUser['teachers_id']) > 0)
                            {
                                
                                $_SESSION['admin_logged'] = true;
                                $_SESSION['admin_type'] = (int)$this->mUser['admin_type'];
                                header('Location: ' . Link::ToAdmin());
                                exit();
                                
                            }
                            else 
                                $this->mLoginMessage = 'Login failed. Please try again y';
                            
                        }
                        else 
                            $this->mLoginMessage = 'Login failed. Please try again 2';

                    }

                }

            }
            else 
                $this->mLoginMessage = 'Login failed. Please try again 3';
            // -----------------------------------------------------

            // if($_POST['username'] == ADMIN_USERNAME && $_POST['password'] == ADMIN_PASSWORD)
            // {
            //     $_SESSION['admin_logged'] = true;
            //     header('Location: ' . Link::ToAdmin());
            //     exit();
            // }
            // else 
            //     $this->mLoginMessage = 'Login failed. Please try again';


            $this->mLinkToAdmin = Link::ToAdmin();
            $this->mLinkToIndex = Link::ToIndex();
            $this->mSiteUrl = Link::Build('');
        }
    }

}
?>