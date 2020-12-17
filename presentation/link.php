<?php
class Link 
{
    public static function Build($link, $type = 'http')
    {
        $base = (($type == 'http' || USE_SSL == 'no') ? 'http://' : 'https://') . getenv('SERVER_NAME');

        //If HTTP_SERVER_PORT is defined and different than the default
        if(defined('HTTP_SERVER_PORT') && HTTP_SERVER_PORT != '80' && strpos($base, 'https') === false)
        {
            //Append server port ToAdminSetting
            $base .= ':' . HTTP_SERVER_PORT;
        }
        $link = $base . VIRTUAL_LOCATION . $link;
        //Escape html ToAccountDetails
        return htmlspecialchars($link, ENT_QUOTES);
    }






    public static function ToDepartment($departmentId, $page = 1)
    {
        $link = self::CleanUrlText(Catalog::GetDepartmentName($departmentId)) . '-d' . $departmentId . '/';
        if($page > 1)
            $link .= 'page-' . $page . '/';
        return self::Build($link);
    }






    public static function ToCategory($departmentId, $categoryId, $page = 1)
    {
        $link = self::CleanUrlText(Catalog::GetDepartmentName($departmentId)) . '-d' . $departmentId . '/' . self::CleanUrlText(Catalog::GetCategoryName($categoryId)) . '-c' . $categoryId . '/';
        if($page > 1)
            $link .= 'page-' . $page . '/';
        return self::Build($link);
    }






    public static function ToProduct($productId)
    {
        $link = self::CleanUrlText(Catalog::GetProductName($productId)) . '-p' . $productId . '/';
        return self::Build($link);
    }






    public static function ToIndex($page = 1)
    {
        $link = '';
        if($page > 1)
            $link .= 'page-' . $page . '/';
        
        return self::Build($link);
    }



    

    public static function QueryStringToArray($queryString)
    {
        $result = array();
        if($queryString != '')
        {
            $elements = explode('&', $queryString);
            foreach($elements as $key => $value)
            {
                $element = explode('=', $value);
                $result[urldecode($element[0])] = isset($element[1]) ? urldecode($element[1]) : '';
            }
        }
        return $result;
    }



    //Prepares a link to be included in the URL
    public static function CleanUrlText($string)
    {
        //Remove all characters are not a-z, 0-9, dash, underscore or space
        $not_accepted_characters_regex = '#[^-a-zA-Z0-9_ ]#';
        $string = preg_replace($not_accepted_characters_regex, '', $string);

        //Remove all leading and trailing spaces
        $string = trim($string);

        //Change all dash, underscore and spaces to dash
        $string = preg_replace('#[-_ ]+#', '-', $string);

        //Return the modified string
        return strtolower($string);
    }



    //Redirect to the proper URL if not already there
    public static function CheckRequest()
    {
        $proper_url = '';

        if(isset($_GET['Search'])  || isset($_GET['SearchResults']) || isset($_GET['AddProduct']) || isset($_GET['CartAction']) || isset($_GET['AjaxRequest']) || isset($_GET['Login']) || isset($_GET['Logout']) || isset($_GET['RegisterCustomer']) || isset($_GET['AddressDetails']) || isset($_GET['CreditCardDetails']) || isset($_GET['AccountDetails']) || isset($_GET['Checkout']) || isset($_GET['OrderDone']) || isset($_GET['OrderError']) || isset($_GET['AboutUs']) || isset($_GET['SelectSection']) || isset($_GET['PrimaryApplicationForm']) || isset($_GET['SecondaryApplicationForm']) || isset($_GET['NurseryApplicationForm']) || isset($_GET['ApplicationDone']) || isset($_GET['StudentProfile']) || isset($_GET['SelectedSection']) || isset($_GET['TeacherProfile']) || isset($_GET['TeachingSpecificApplications']) || isset($_GET['SecondarySpecificApplications']) || isset($_GET['PrimarySpecificApplications']) || isset($_GET['NurserySpecificApplications']) || isset($_GET['MyProfile']))
        {
            return;
        }
        //Obtain proper url for category pages
        elseif(isset($_GET['DepartmentId']) && isset($_GET['CategoryId']))
        {
            if(isset($_GET['Page']))
                $proper_url = self::ToCategory($_GET['DepartmentId'], $_GET['CategoryId'], $_GET['Page']);
            else 
                $proper_url = self::ToCategory($_GET['DepartmentId'], $_GET['CategoryId']);
        }
        //Obtain proper URL for department
        elseif(isset($_GET['DepartmentId']))
        {
            if(isset($_GET['Page']))
                $proper_url = self::ToDepartment($_GET['DepartmentId'], $_GET['Page']);
            else 
                $proper_url = self::ToDepartment($_GET['DepartmentId']);
        }
        //Obtain proper URL for product pages
        elseif(isset($_GET['ProductId']))
        {
            $proper_url = self::ToProduct($_GET['ProductId']);
        }
        //Obtainproper URL for the home page 
        else 
        {
            if(isset($_GET['Page']))
                $proper_url = self::ToIndex($_GET['Page']);
            else 
                $proper_url = self::ToIndex();
        }


        /*Remove the VIRTUAL_LOCATION from the requested url so we can compare paths*/
        $requested_url = self::Build(str_replace(VIRTUAL_LOCATION, '', $_SERVER['REQUEST_URI']));


        //404 redirect if the requested product, category or department
        //doesnt exist
        if(strstr($proper_url, '/-'))
        {
            //Clean output buffer
            ob_clean();

            //Laod the 404 page 
            include '404.php';

            //Clear the output buffer and stop execution
            flush();
            ob_flush();
            ob_end_clean();
            exit();
        }


        //301 REDIRECT to the proper URL if necessary
        if($requested_url != $proper_url)
        {
            //Clean output buffer
            ob_clean();
            
            //Redirect 301
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $proper_url);

            //Clear the output buffer and stop execution
            flush();
            ob_flush();
            ob_end_clean();
            exit();
        }
    }


    //Create link to the search page 
    public static function ToSearch()
    {
        return self::Build('index.php?Search');
    }


    //Create link to a search results page
    public static function ToSearchResults($searchString, $allWords, $page = 1)
    {
        $link = 'search-results/find';
        
        if(empty($searchString))
            $link .= '/';
        else 
            $link .= '-' . self::CleanUrlText($searchString) . '/';

        $link .= 'all-words-' . $allWords . '/';

        if($page > 1) 
            $link .= 'page-' . $page . '/';

        return self::Build($link);
    }


    // //Create an Add to Cart link ToAccountDetails
    // public static function ToAddProduct($productId)
    // {
    //     return self::Build('index.php?AddProduct=' . $productId);
    // }


    public static function ToCart($action = 0, $target = null)
    {
        $link = '';

        switch ($action) {
            case ADD_PRODUCT:
                $link = 'index.php?CartAction=' . ADD_PRODUCT . '&ItemId=' . $target;
                break;
            case REMOVE_PRODUCT:
                $link = 'index.php?CartAction=' . REMOVE_PRODUCT . '&ItemId=' . $target;
                break;
            case UPDATE_PRODUCTS_QUANTITIES:
                $link = 'index.php?CartAction=' . UPDATE_PRODUCTS_QUANTITIES;
                break;
            case SAVE_PRODUCT_FOR_LATER:
                $link = 'index.php?CartAction=' . SAVE_PRODUCT_FOR_LATER . '&ItemId=' . $target;
                break;
            case MOVE_PRODUCT_TO_CART:
                $link = 'index.php?CartAction=' . MOVE_PRODUCT_TO_CART . '&ItemId=' . $target;
                break;
            
            default:
                $link = 'cart-details/';
                break;
        }

    return self::Build($link);
    }


    //Create link to admin page 
    public static function ToAdmin($params = '')
    {
        $link = 'admin.php';
        if($params != '')
            $link .= '?' . $params;

        return self::Build($link, 'https');
    }


    public static function ToMaintenanceAdmin($params = '')
    {
        $link = 'admin'.DIRECTORY_SEPARATOR.'or_index.php';
        if($params != '')
            $link .= '?' . $params;

        return self::Build($link, 'https');
    }

     //Create link to STAFF admin page 
    public static function ToStaffAdmin($params = '')
    {
        $link = 'staff.php';
        if($params != '')
            $link .= '?' . $params;

        return self::Build($link, 'https');
    }

    


    //Create logout Link
    public static function ToLogout()
    {
        return self::ToAdmin('Page=Logout');
    }

    //Create logout Link
    public static function ToLogoutStaff()
    {
        return self::ToStaffAdmin('Page=Logout');
    }


    //Create the link to departments administration page
    public static function ToDepartmentsAdmin()
    {
        return self::ToAdmin('Page=Departments');
        
    }

    // Create link to the categories administration page
    public static function ToDepartmentCategoriesAdmin($departmentId)
    {
        $link = 'Page=Categories&DepartmentId=' . $departmentId;

        return self::ToAdmin($link);
    }

    //Create the link to attributes administration page
    public static function ToAttributesAdmin()
    {
        return self::ToAdmin('Page=Attributes');
    }



    //Create the link to attribute values administration page 
    public static function ToAttributeValuesAdmin($attributeId)
    {
        $link = 'Page=AttributeValues&AttributeId=' . $attributeId;
        return self::ToAdmin($link);
    }



    //Create a link to products administration page
    public static function ToCategoryProductsAdmin($departmentId, $categoryId)
    {
        $link = 'Page=Products&DepartmentId=' . $departmentId . '&CategoryId=' . $categoryId;
        return self::ToAdmin($link);
    }



    // Create link to product details administration page
  public static function ToProductAdmin($departmentId, $categoryId, $productId)
  {
    $link = 'Page=ProductDetails&DepartmentId=' . $departmentId .
            '&CategoryId=' . $categoryId . '&ProductId=' . $productId;

    return self::ToAdmin($link);
  }


    public static function ToDeleteSubject($subjectId)
    {
        $link = 'Page=Settings&SubjectAction=Delete&SubjectId='.$subjectId;
        return self::ToAdmin($link);
    }

    public static function ToDeleteClass($classId)
    {
        $link = 'Page=Settings&ClassAction=Delete&ClassId='.$classId;
        return self::ToAdmin($link);
    }


    // Create link to shopping carts administration page
    public static function ToCartsAdmin()
    {
        return self::ToAdmin('Page=Carts');
    }



    //Create link to orders administration page
    public static function ToOrdersAdmin()
    {
        return self::ToAdmin('Page=Orders');
    }

    
    public static function ToAdminSetting()
    {
        return self::ToAdmin('Page=Settings');
    }

    public static function ToListStaffAndSetting()
    {
        return self::ToAdmin("Page=Teachers");
    }

    public static function ToSchoolStaffProfile($staffId)
    {
        return self::ToAdmin("Page=Staff&StaffId=" . $staffId);
    }


    //Create link to the order details administration page 
    public static function ToOrderDetailsAdmin($orderId)
    {
        $link = 'Page=OrderDetails&OrderId=' . $orderId;
        return self::ToAdmin($link);
    }

    //Create the link to student prifile administration page
    public static function ToStudentProfileAdmin($studentId)
    {
        $link = 'Page=StudentProfile&StudentId=' . $studentId;
        return self::ToAdmin($link);
    }


    public static function ToTeacherProfileAdmin($teacherId)
    {
        $link = 'Page=TeacherProfile&TeacherId=' . $teacherId;
        return self::ToAdmin($link);
    }


    //The link to specific pages ToStudentProfile
    
    public static function ToTeacherSpecificApplicants()
    {
        $link = 'Page=TeachingSpecificApplications';
        return self::ToAdmin($link);
    }


    public static function ToNurserySpecificApplicants()
    {
        $link = 'Page=NurserySpecificApplicants';
        return self::ToAdmin($link);
    }

    public static function ToPrimarySpecificApplicants()
    {
        $link = 'Page=PrimarySpecificApplicants';
        return self::ToAdmin($link);
    }

    public static function ToSecondarySpecificApplicants()
    {
        $link = 'Page=SecondarySpecificApplicants';
        return self::ToAdmin($link);
    }
    public static function ToActivationSpecific()
    {
        $link = 'Page=StaffActivation';
        return self::ToAdmin($link);
    }

    /***************************
    Links for the Staff Admins

    **************************************************/

    

    public static function ToStaffLoginPage()
    {
        $link = 'Page=StaffLoginPage';
        return self::ToStaffAdmin($link);
    
    }

    public static function ToCheckEmploymentStatus()
    {
        $link = 'Page=CheckStatusPage';
        return self::ToStaffAdmin($link);
    }


    //This will be used in the email 
    public static function ToUploadCredentials()
    {
        $link = 'Page=UploadCredentialsPage';
        return self::ToStaffAdmin($link);
    }


    public static function ToTeachersClassPage()
    {
        $link = 'Page=TeachersClass';
        return self::ToStaffAdmin($link);
    }
    
    public static function ToTeachersClassList($classId)
    {
        $link = 'Page=TeachersClass&ClassList&ClassAction=List&classListId=' . $classId;
        return self::ToStaffAdmin($link);
    }

    public static function ToTeacherDeleteStudent($classId)
    {
        $link = 'Page=TeachersClass&ClassList&ClassAction=DeleteStudent&classListId=' . $classId;
        return self::ToStaffAdmin($link);
    }

    public static function ToTeacherDeleteSubject($subjectId, $classId)
    {
        $link = 'Page=TeachersClass&ClassAction=DeleteSubject&SubjectId=' . $subjectId . '&ClassId=' . $classId;
        return self::ToStaffAdmin($link);
    }


    public static function ToListOutSubject($classId)
    {
        $link = 'Page=TeachersClass&ClassAction=ListOutSubject&ClassId=' . $classId;
        return self::ToStaffAdmin($link);
    }

    public static function ToListOutClassMembers($classId)
    {
        $link = 'Page=TeachersClass&ClassAction=StudentList&ClassId=' . $classId;
        return self::ToStaffAdmin($link);
    }

    public static function ToStudentCaExamsRecords($studentId, $classId)
    {
        $link = 'Page=TeachersClass&ClassAction=CaExamsRecords&StudentId=' . $studentId . '&ClassId=' . $classId;
        return self::ToStaffAdmin($link);
    }

    public static function ToTeacherStudentDetail($mStudentId, $mClassId)
    {
        $link = 'Page=TeachersClass&ClassAction=ShowStudentDetails&StudentId=' . $mStudentId . '&ClassId=' . $mClassId;
        return self::ToStaffAdmin($link);
    }







    

    //Create a link to the register  customer page 
    public static function ToRegisterCustomer()
    {
        return self::Build('register-customer/', 'https');
    }

    public static function ToSelectSection()
    {
        return self::Build('select-section/', 'https');
    }


    //Create a link to the update customer account details page 
    public static function ToAccountDetails()
    {
        return self::Build('account-details/', 'https');
    }

// ToStudentProfilePage ToAdmin
    public static function ToStudentProfile()
    {
        return self::Build('my-profile/', 'https');
    }

    public static function ToStudentCA()
    {
        return self::Build('my-continuous-assesment/', 'https');
    }



    // ToStudent lesson Profile Page 
    public static function ToStudentLessonProfile($subjectId)
    {
        return self::Build('my-subjects-id'.$subjectId.'/', 'https');
    }

    public static function ToTopicContent($lessonId)
    {
        return self::Build('my-topic-id'.$lessonId.'/', 'https');

    }



    //Create a link to the update customer credit card details page
    public static function ToCreditCardDetails()
    {
        return self::Build('credit-card-details/', 'https');
    }

    //Create the link to about us 
    public static function ToAboutUs()
    {
        return self::Build('about-us/', 'https');
    }


    //Create a link to the update customer address details page
    public static function ToAddressDetails()
    {
        return self::Build('address-details/', 'https');
    }


    //Creates a link to the checkout page 
    public static function ToCheckout()
    {
        return self::Build('checkout/', 'https');
    }



    //Creates a link to the order done done page
    public static function ToOrderDone()
    {
        return self::Build('order-done/');
    }


    //Creates a liknk to the order error page 
    public static function ToOrderError()
    {
        return self::Build('order-error/');
    }


    //Link to the secondary application form
    public static function ToSecondaryForm()
    {
        return self::Build('secondary-application-form/', 'https');
    }

    //Link to the primary application form
    public static function ToPrimaryForm()
    {
        return self::Build('primary-application-form/', 'https');
    }

    //Link to the nursery application form my-profile
    public static function ToNurseryForm()
    {
        return self::Build('nursery-application-form/', 'https');
    }


    //Link to the ToRegisterDone 
    public static function ToApplicationDone()
    {
        return self::Build('application-done', 'https');
    }

    //Exit application page after completed 
    public static function ToExitApplicationsPage()
    {
        return self::Build('exit-application');
    }


    public static function ToStudentProfilePage()
    {
        return self::Build('student-profile', 'https');
    }




    //The link to teacher admin profile link
    

    




}



 ?>
