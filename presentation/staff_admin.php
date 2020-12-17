<?php

class StaffAdmin
{
    public $mSiteUrl;
    //Define the template file for the page menu
    public $mMenuCell = 'blank.tpl';
    //Define the template file for the page content
    public $mContentCell = 'blank.tpl';

    //Class constructor
    public function __construct()
    {
        
        // ---------
        $this->mSiteUrl = Link::Build('', 'https');
        //Enforce page to be accesse through HTTPS if USE_SSL is on
        if(USE_SSL == 'yes' && getenv('HTTPS') != 'on')
        {
            header('Location: https://' . getenv('SERVER_NAME') . getenv('REQUEST_URI'));
            exit();
        }

         //If admin is not logged in, load the admin_login template
         //!(isset($_SESSION['admin_logged'])) ||
        if(!isset($_SESSION['staff_admin_logged']))
        {
            // ff
            // $this->mContentCell = 'admin_login.tpl';
            $admin_page = isset($_GET['Page']) ? $_GET['Page'] : 'StaffLoginPage';
            switch ($admin_page) {
                case 'StaffLoginPage':
                    
                    $this->mContentCell = 'staff_admin_login.tpl';
                    
                    break;
                case 'CheckStatusPage':
                    
                    $this->mContentCell = 'staff_check_status.tpl';
                    break;
                case 'UploadCredentialsPage':
                    
                    $this->mContentCell = 'staff_upload_credentials.tpl';
                    break;
                
                default:
                    # code...
                    $this->mContentCell = 'staff_admin_login.tpl';
                    break;
            }
        }
        

    }


    public function init()
    {
        
        if(isset($_SESSION['staff_admin_logged']))
        {

            //If logged out
            if(isset($_GET['Page']) && ($_GET['Page'] == 'Logout'))
            {
                unset($_SESSION['admin_logged']);
                unset($_SESSION['staff_admin_logged']);
                header('Location: ' . $this->mSiteUrl);
                exit();
            }

            //if page is not explicitly set assume the Departments page
            $admin_page = isset($_GET['Page']) ? $_GET['Page'] : 'TeachersClass';

            //Choose what admin page to load... 
            if($admin_page == 'TeachersClass')
                $this->mContentCell = 'teachers_class.tpl';
            elseif($admin_page == 'StaffLoginPage')
                $this->mContentCell = 'teachers_class.tpl';
            elseif($admin_page == 'CheckStatusPage')
                $this->mContentCell = 'teachers_class.tpl';
            
        }//end of isset($_SESSION['staff_admin_logged'])
    }
}                                                                               