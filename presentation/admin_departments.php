<?php

//Class that support departments admin functionality
class AdminDepartments
{
    //Public variable available in smarty template
    public $mDepartmentsCount;
    public $mDepartments;
    public $mErrorMessage;
    public $mEditItem;
    public $mLinkToDepartmentsAdmin;
    public $mSiteUrl;

    //Private members
    private $_mAction;
    private $_mActionedDepartmentId;

    //class constructor
    public function __construct()
    {
        //Parse the list with posted variables
        foreach($_POST as $key => $value)
            //If a submit button was clicked
            if(substr($key, 0, 6) == 'submit')
            {
                /*Get the position of the last '_' underscore from submit
                button name. eg strpos('submit_edit_dept_1', '_') is 17*/
                $last_underscore = strrpos($key, '_');

                /*Get the scope of submit button
                eg 'edit_dept' from 'submit_edit_dept_1'*/
                $this->_mAction = substr($key, strlen('submit_'), $last_underscore - strlen('submit_'));

                /*Get the the department id targeted by submit button
                (the number at the end of the submit button name)*/
                $this->_mActionedDepartmentId = substr($key, $last_underscore + 1);
            break;
            }
        $this->mLinkToDepartmentsAdmin = Link::ToDepartmentsAdmin();
        $this->mSiteUrl = Link::Build('');
    }


    public function init()
    {
        //If adding a new department
        if($this->_mAction == 'add_dept')
        {
            $departmant_name = $_POST['department_name'];
            $department_description = $_POST['department_description'];

            if($departmant_name == null)
                $this->mErrorMessage = 'Department name required';
            
            if($this->mErrorMessage == null)
            {
                Catalog::AddDepartment($departmant_name, $department_description);
                header('Location: ' . $this->mLinkToDepartmentsAdmin);
            }
        }


        //If editing an existing department ... 
        if($this->_mAction == 'edit_dept')
            $this->mEditItem = $this->_mActionedDepartmentId;

        //If Updating a department... 
        if($this->_mAction == 'update_dept')
        {
            $departmant_name = $_POST['name'];
            $department_description = $_POST['description'];
            if($departmant_name == null)
                $this->mErrorMessage = 'Department name requird';
            if($this->mErrorMessage == null)
            {
                Catalog::UpdateDepartment($this->_mActionedDepartmentId, $departmant_name, $department_description);
                header('Location: ' . $this->mLinkToDepartmentsAdmin);
            }
        }



        //If deleting a department... 
        if($this->_mAction == 'delete_dept')
        {
            $status = Catalog::DeleteDepartment($this->_mActionedDepartmentId);
            if($status < 0)
                $this->mErrorMessage = 'Department not empty';
            else 
                header('Location: ' . $this->mLinkToDepartmentsAdmin);
        }


        //If editing department's category 
        if($this->_mAction == 'edit_cat')
        {
            header('Location: ' . htmlspecialchars_decode(Link::ToDepartmentCategoriesAdmin($this->_mActionedDepartmentId)));
            exit();
        }


        //Load the list of departments
        $this->mDepartments = Catalog::GetDepartmentsWithDescription();
        $this->mDepartmentsCount = count($this->mDepartments);
    }
}
?>