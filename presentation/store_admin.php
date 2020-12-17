<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

class StoreAdmin
{
    public $mSiteUrl;
    //Define the template file for the page menu
    public $mMenuCell = 'blank.tpl';
    //Define the template file for the page content
    public $mContentCell = 'blank.tpl';

    //Class constructor
    public function __construct()
    {
        $this->mSiteUrl = Link::Build('', 'https');

        //Enforce page to be accesse through HTTPS if USE_SSL is on
        if(USE_SSL == 'yes' && getenv('HTTPS') != 'on')
        {
            header('Location: https://' . getenv('SERVER_NAME') . getenv('REQUEST_URI'));
            exit();
        }
        $this->mLinkToLogout = Link::ToLogout();

    }


    public function init()
    {
        //If admin is not logged in, load the admin_login template
        if(!(isset($_SESSION['admin_logged'])) || $_SESSION['admin_logged'] != true)
            $this->mContentCell = 'admin_login.tpl';
        else 
        {
            //If admin is logged in, load the admin menu page ff
            $this->mMenuCell = 'admin_menu_container.tpl';

            //If logged out 
            if(isset($_GET['Page']) && ($_GET['Page'] == 'Logout'))
            {
                unset($_SESSION['admin_logged']);
                header('Location: ' . Link::ToAdmin());
                exit();
            }

            //if page is not explicitly set assume the Departments page
            $admin_page = isset($_GET['Page']) ? $_GET['Page'] : 'Departments';

            //Choose what admin page to load... tt
            if($admin_page == 'Departments')
                $this->mContentCell = 'admin_department_container.tpl';
            elseif($admin_page == 'Categories')
                $this->mContentCell = 'admin_categories.tpl';
            elseif($admin_page == 'Attributes')
                $this->mContentCell = 'admin_attributes.tpl';
            elseif($admin_page == 'AttributeValues')
                $this->mContentCell = 'admin_attribute_values.tpl';
            elseif($admin_page == 'Products')
                $this->mContentCell = 'admin_products.tpl';
            elseif($admin_page == 'ProductDetails')
                $this->mContentCell = 'admin_product_details.tpl';
            elseif($admin_page == 'Carts')
                $this->mContentCell = 'admin_carts.tpl';
            elseif($admin_page == 'Orders')
                $this->mContentCell = 'admin_orders.tpl';
            elseif($admin_page == 'OrderDetails')
                $this->mContentCell = 'admin_order_details.tpl';
            elseif($admin_page == 'StudentProfile')
                $this->mContentCell = 'admin_student_profile.tpl';
            elseif($admin_page == 'TeacherProfile')
                $this->mContentCell = 'admin_teacher_profile.tpl';
            elseif($admin_page == 'TeachingSpecificApplications')
                $this->mContentCell = 'teacher_applicants_specific_datatable.tpl';
            elseif($admin_page == 'NurserySpecificApplicants')
                $this->mContentCell = 'nursery_applicants_specific_datatable.tpl';
            elseif($admin_page == 'PrimarySpecificApplicants')
                $this->mContentCell = 'primary_applicants_specific_datatable.tpl';
            elseif($admin_page == 'SecondarySpecificApplicants')
                $this->mContentCell = 'secondary_applicants_specific_datatable.tpl';
            elseif($admin_page == 'StaffActivation')
                $this->mContentCell = 'staff_activation.tpl';
            elseif($admin_page == 'Settings')
                $this->mContentCell = 'admin_settings.tpl';
            elseif($admin_page == 'Teachers')
                $this->mContentCell = 'teachers_list.tpl';
            
        }
    }
}
?>