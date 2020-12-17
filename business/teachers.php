<?php 

class Teachers
{
    public static function GetCurrentTerm()
    {
        //Build  the sql query 
        $sql = 'CALL school_get_current_term()';
        //execute the qqueery and return the result tttt  UpdateNextTermStartDate
        return DatabaseHandler::GetRow($sql);

    }


    public static function GetTeacherAssignedClasses($teacherId)
    {
        //Build the sql query  
        $sql = 'CALL school_get_teacher_assigned_classes(:teacher_id)';
        //Build the parameter array
        $params = array(
            ':teacher_id' => $teacherId
        );
        //Execute the query and return the results PreviousStudentWeeklyTotals
        return DatabaseHandler::GetAll($sql, $params);

    }

    public static function UpdateToCurrentTerm($mCurrentTermName)
    {
        //Build the sql query 
        $sql = 'CALL school_set_current_term(:term)';
        //Build the parameter array
        $params = array(
            ':term' => $mCurrentTermName
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }


    public static function GetSubjectList()
    {
        //Build the sql query 
        $sql = 'CALL school_get_subjetc_list()';
        //Build the parameter array
        
        //Execute the query 
        return DatabaseHandler::GetAll($sql);

    }

    
    public static function AddNewSubject($subject)
    {
        //Build the sql query 
        $sql = 'CALL school_add_new_subject(:subjectname)';
        //Build the parameter array
        $params = array(
            ':subjectname' => $subject
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }


    public static function DeleteSubject($mSubjectId)
    {
        //Build the sql query
        $sql = 'CALL school_delete_subject(:subject_id)';
        //Build the parameter array
        $params = array(
            ':subject_id' => $mSubjectId
        );
        //Execute the query and return the result AddLessonPlanSummaryData
        DatabaseHandler::Execute($sql, $params);

    }


    public static function GetWeekInfo($mTodayDate)
    {
        //build the sql quey 
        $sql = 'CALL school_get_week_info(:today_date)';
        //Build the parameter array  
        $params = array(
            ':today_date' => $mTodayDate
        );
        return DatabaseHandler::GetRow($sql, $params);
    }


    public static function GetClassList()
    {
        //Build the sql query GetDepartnameUsingClassId
        $sql = 'CALL school_get_classes_list()';
        //Execute the query and return the result
        return DatabaseHandler::GetAll($sql);
    }

    public static function AddTeacherToAdmin($mTeacherId)
    {
        //Build the sql query 
        $sql = "SELECT admin_add_teacher_to_admin(:teacher_id)";
        //Build the parameter array
        $params = array(
            ':teacher_id' => $mTeacherId
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);

    }


    public static function GetTeacherName($mTeacherId)
    {
        //Build the sql query  IsAdminMailDuplicate
        $sql = "SELECT name
                FROM teachers
                WHERE teachers_id = :teacher_id";
        //Build the parameter array 
        $params = array(
            ':teacher_id' => $mTeacherId
        );
        //E xecute the query and return the result IsUserAnAdmin
        return DatabaseHandler::GetRow($sql, $params);

    }


    public static function SetTeacherAdminType($mTeacherId, $mAdminType)
    {
        //Build the sql query 
        $sql = "SELECT admin_set_teacher_admin_type(:teacher_id, :admin_type)";
        //Build the parameter array
        $params = array(
            ':teacher_id' => $mTeacherId,
            ':admin_type' => $mAdminType
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);
    }


    public static function IsAdminMailDuplicate($email)
    {
        //Build the sql query 
        $sql = "SELECT admin_is_admin_email_duplicate(:email)";
        //Build the parameter array
        $params = array(
            ':email' => $email
        );
        //Execute the query and return the result IsAdminMailDuplicate
        return DatabaseHandler::GetOne($sql, $params);

    }

    public static function IsUserAnAdmin($teacherId)
    {
        //Build the sql query 
        $sql = "SELECT teacher_is_user_an_admin(:teacher_id)";
        //Build the parameter array
        $params = array(
            ':teacher_id' => $teacherId
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);

    }

    // Teachers::GetListOfTeachers();
    public static function GetListOfTeachers()
    {
        //Build the sql query 
        $sql = "SELECT teachers_id, name, phone, email
                FROM teachers 
                WHERE status = 6 AND admin_type = 0";
        // Execute the query and return the result 
        return DatabaseHandler::GetAll($sql);
    }
    // $this->mListOfAdminTeacher = Teachers::GetStudentCaExamsRecords();
    public static function GetListOfAdminTeachers()
    {
        //Build the sql query 
        $sql = "SELECT teachers_id, name, phone, email
                FROM teachers 
                WHERE status = 6 AND admin_type BETWEEN 1 AND 6";
                // / Execute the query and return the result 
        return DatabaseHandler::GetAll($sql);
    }

    public static function GetAdminUserInfo($email)
    {
        //Build the sql query 
        $sql = "SELECT teachers_id, email, password, status, admin_type
                FROM teachers 
                WHERE email = :email";
        //Build parameter array
        $params = array(
            ':email' => $email
        );
        //Execute the query and return 
        return DatabaseHandler::GetRow($sql, $params);
    }



    public static function AddNewClassName($mNewClassName, $mDepartmentId, $sourceId)
    {
        //Build the sql query 
        $sql = 'CALL school_add_new_class_name(:class_name, :department_id, :sourceId)';
        //Build the parameter array
        $params = array(
            ':class_name' => $mNewClassName,
            ':department_id' => $mDepartmentId,
            ':sourceId' => $sourceId
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }

    public static function GetAllSourceClass()
    {
        //Build the sql query 
        $sql = "SELECT class_source_id, class_name, department_id 
                FROM class_source";
        //Execute the query and return the result 
        return DatabaseHandler::GetAll($sql);
    }

    public static function DeleteClassTeacher($mClassId)
    {
        //We must check in the teach class table to delete it first 
        //Then delete from the the school_class table 
        //Build the sql query 
        $sql = 'CALL school_delete_class_teacher(:class_id)';
        //Build the parameter array 
        $params = array(
            ':class_id' => $mClassId
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }

    public static function CheckForClassInTeacherClass($mClassId)
    {
        //Build the sql to peruze the teacher_class table and return all records with the specified class ID 
        //Build the sql query
        $sql = 'CALL school_return_records_for_classId(:class_id)';
        //Build the parameter array
        $params = array(
            ':class_id' => $mClassId
        );
        //Execute the query and return the result
        return DatabaseHandler::GetAll($sql, $params);
    }

    public static function DeleteClass($mClassId)
    {
        //Before we go and delete the record from teacher_class, we must first check for any record with that particular class ID 
        $mClassIdRecords = self::CheckForClassInTeacherClass($mClassId);
        if(count($mClassIdRecords > 0))
            self::DeleteClassTeacher($mClassId);
        
        //We must check in the teach class table to delete it first 
        //Then delete from the the school_class table 
        //Build the sql query 
        $sql = 'CALL school_delete_class(:class_id)';
        //Build the parameter array 
        $params = array(
            ':class_id' => $mClassId
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }



    public static function GetStudentInfoByEmail($email)
    {
        //Build the sql query 
        $sql = 'CALL school_get_student_to_add_info(:email)';
        //Build the parameter array
        $params = array(
            ':email' => $email
        );
        //Execute the query and return the results
        return DatabaseHandler::GetRow($sql, $params);
    }




    public static function RegisterStudentsActiveClass($classId, $applicants_id, $admittedOn, $term)
    {

        //Buil the sql query GetListOfAdmittedStudentByClassId
        $sql = 'CALL school_set_student_active_class(:class_id, :student_id, :admitted_on, :term_name)';
        //Build the paramater array
        $params = array(
            ':class_id' => $classId,
            ':student_id' => $applicants_id,
            ':admitted_on' => $admittedOn,
            ':term_name' => $term
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }


    public static function GetCurrentTermIdByName($mCurrentTermName) 
    {
        //Build the sql query 
        $sql = 'CALL school_get_termId_by_term_name(:term_name)';
        //Build the parameter array 
        $params = array(
            ':term_name' => $mCurrentTermName
        );
        //Execute the query and return thr result 
        return DatabaseHandler::GetRow($sql, $params);

    }



    public static function InsertRegistrationNumber($reg_num, $applicants_id)
    {
        //Build the sql queery 
        $sql = 'CALL school_set_registration_number(:reg_num, :student_id)';
        //Build the parameter array 
        $params = array(
            ':reg_num' => $reg_num,
            ':student_id' => $applicants_id
        );
        //Execute the query and GetStudentsFullDetailsForTeacher
        DatabaseHandler::Execute($sql, $params);

    }



    public static function GetListOfAdmittedStudentByClassId($mListClassId, $term, $activeStatus)
    {

        //Build the parameter array
        $sql = 'CALL school_get_specified_class_members_by_classid(:inClassId, :mTerm, :active_status)';
        //Build the parameter array fsfd
        $params = array(
            ':inClassId' => $mListClassId,
            ':mTerm' => $term,
            ':active_status' => $activeStatus
        );
        //Execute the query and reurn the result 
        return DatabaseHandler::GetAll($sql, $params);

    }


    // ---------------------Male count------------------
    // ---------------------Male count------------------
    // ---------------------Male count------------------
    public static function MaleClassCount($ClassId, $term, $activeStatus)
    {
        //Build sql query 
        $sql = 'CALL count_male_for_specified_class(:inClassId, :inTerm, :inActiveStatus )';
        //Build the parameter array 
        $params = array(
            ':inClassId' => $ClassId,
            ':inTerm' => $term,
            ':inActiveStatus' => $activeStatus
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);
    }

    public static function FemaleClassCount($ClassId, $term, $activeStatus)
    {
        
        //Build sql query 
        $sql = 'CALL count_female_for_specified_class(:inClassId, :inTerm, :inActiveStatus)';
        //Build the parameter array 
        $params = array(
            ':inClassId' => $ClassId,
            ':inTerm' => $term,
            ':inActiveStatus' => $activeStatus
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);

    }


    public static function GetDepartmentNameByClassId($mClassId)
    {
        //Build the sql query 
        $sql = 'CALL school_get_department_by_classid(:class_id)';
        //Build the parameter array 
        $params = array(
            ':class_id' => $mClassId
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);
    }





    public static function GetAppropriateYearForListingClassMembers()
    {

        //Build the sql query 
        $sql = 'CALL school_get_the_current_year_for_listing()';
        //Build the parameter array 
        //Execute the query and result 
        return DatabaseHandler::GetRow($sql);

    }


    public static function MarkActiveStatusToZero($active_zero, $studentId)
    {

        //Build the sql query school_mark_student_activeStatus_to_zero
        $sql = 'CALL school_mark_student_activeStatus_to_zero(:active_zero, :student_id)';
        //Build the parameter array 
        $params = array(
            ':active_zero' => $active_zero,
            ':student_id' => $studentId
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }



    public static function GetAllSubjects()
    {
        //Build the sql query 
        $sql = 'CALL school_get_all_subjects()';
        //Build the parameter array 
        //Execute the query and return the result 
        return DatabaseHandler::GetAll($sql);
    }



    public static function CheckForSubjectClassDuplicate($mClassId, $mSubjectId)
    {
        //Build the sql query 
        $sql = 'CALL school_check_class_subject_first(:mClassId, :mSubjectId)';
        //Build the parameter array 
        $params = array(
            ':mClassId' => $mClassId,
            ':mSubjectId' => $mSubjectId
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);
    }


    public static function AddSubjectsToClass($mClassId, $mSubjectId)
    {
        /**
         * Just befor we add to the class these specified subjects we shall first call a function to check to make sure there is no duplicate 
         */
        $result = self::CheckForSubjectClassDuplicate($mClassId, $mSubjectId);

        if($result == 1)
        {
             //Build the sql query 
            $sql = 'CALL school_add_subjects_to_class(:class_id, :subject_id)';
            //Build the parameter array 
            $params = array(
                ':class_id' => $mClassId,
                ':subject_id' => $mSubjectId
            );
            //Execute the query 
            DatabaseHandler::Execute($sql, $params);

        } 
        else 
        {
             //Build the sql query 
            $sql = 'CALL school_update_subjects_class_status(:class_id, :subject_id)';
            //Build the parameter array 
            $params = array(
                ':class_id' => $mClassId,
                ':subject_id' => $mSubjectId
            );
            //Execute the query GetStudentCaExamsRecords 
            DatabaseHandler::Execute($sql, $params);
        }


       

    }


    public static function GetAllSubjectsForASpecifiedClass($mClassId)
    {
        
        //Build the sql query 
        $sql = 'CALL school_get_all_class_subjects(:class_id)';
        //Build the paramter array
        $params = array(
            ':class_id' => $mClassId
        );
        //Execute the query and return the result AddCA_record
        return DatabaseHandler::GetAll($sql, $params);

    }



    public static function DeleteSubjectFromClass($mSubjectsIds, $classId)
    {

        //Build the sql query 
        $sql = 'CALL school_delete_subject_from_class(:subject_id, :class_id)';
        //Build he paramter array
        $params = array(
            ':subject_id' => $mSubjectsIds,
            ':class_id' => $classId
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }

    public static function CheckDateDuplicate($sessiondate, $theyearonly)
    {
        //Build the sql query 
        $sql = 'CALL school_check_session_for_duplicates(:session_date, :year_only)';
        //Build the parameter array 
        $params = array(
            ':session_date' => $sessiondate,
            ':year_only' => $theyearonly
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);
    }


    public static function AddDateForAdmissionSession($sessiondate, $theyearonly)
    {
        //Just befor we add the new date submitted by the admin user 
        //we must first check if the date has been added before to avoid any duplicate
        $result = self::CheckDateDuplicate($sessiondate, $theyearonly);
        if($result['school_session_id'])
        {
            //This means that the date is existing already
            return -1;
        }
        else 
        {
            //Build the sql query 
            $sql = 'CALL school_add_session_date(:session_date, :year_only)';
            //Build the parameter array 
            $params = array(
                ':session_date' => $sessiondate,
                ':year_only' => $theyearonly
            );
            //Execute the query 
            return DatabaseHandler::GetOne($sql, $params);
        }

    }

    public static function GetCurrentAdmissionSession()
    {
        //Build the sql query 
        $sql = 'CALL school_get_current_admission_session()';
        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql);
    }





    public static function AddTodaysDate($mDateForAttendance)
    {
        //Build the sql query 
        $sql = 'CALL school_add_todays_date_for_attendance(:date)';
        //Build the parameter array 
        $params = array(
            ':date' => $mDateForAttendance
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);

    }



    public static function GetAttendanceStartOrEndDate($weekId)
    {
        //Build the sql query 
        $sql = 'CALL school_get_term_start_or_end_date(:week_id)';
        //Build the parameter array 
        $params = array(
            ':week_id' => $weekId 
        );
        //Execute the query and return the result
        return DatabaseHandler::GetRow($sql, $params);

    }






















































    

// ============================================================================================================================================================================================
    public static function RegisterTodaysAttendance($mWeekValuesid, $student_id, $mClassId, $mTodaydateId, $mToday, $mCurrentTermId, $attendanceValueInt, $mAttendanceMark, $mDepartmentName)
    {
        if($mCurrentTermId == 1 && $mDepartmentName == 'Nursery')
        {
            /*
            This means we are in Nursery-section first-term so table-for attendance = fn_attendance UpdateStudentWeeklyTotals
            */
            //Build the sql query 
            $sql = 'CALL school_register_attendace(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId, :attendanceValueInt, :mAttendanceMark)';
            //Parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':attendanceValueInt' => $attendanceValueInt,
                ':mAttendanceMark' => $mAttendanceMark
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);

        }
        elseif($mCurrentTermId == 2 && $mDepartmentName == 'Nursery')
        {
            /*
            This means we are in Nursery-section second-term so table-for attendance = sn_attendance
            ===NOT YET CREATED
            */
            $sql = 'CALL school_register_attendace_sn(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId, :attendanceValueInt, :mAttendanceMark)';
            //Parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':attendanceValueInt' => $attendanceValueInt,
                ':mAttendanceMark' => $mAttendanceMark
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);

        }
        elseif($mCurrentTermId == 3 && $mDepartmentName == 'Nursery')
        {
            /*
            This means we are in Nursery-section third-term so table-for attendance = tn_attendance
            ===NOT YET CREATED
            */
            $sql = 'CALL school_register_attendace_tn(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId, :attendanceValueInt, :mAttendanceMark)';
            //Parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':attendanceValueInt' => $attendanceValueInt,
                ':mAttendanceMark' => $mAttendanceMark
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);
        }
        elseif($mCurrentTermId == 1 && $mDepartmentName == 'Primary')
        {
             /*
            This means we are in Primary-section first-term so table-for attendance = fp_attendance
            ===NOT YET CREATED
            */
            $sql = 'CALL school_register_attendace_fp(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId, :attendanceValueInt, :mAttendanceMark)';
            //Parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':attendanceValueInt' => $attendanceValueInt,
                ':mAttendanceMark' => $mAttendanceMark
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);
        }
        elseif($mCurrentTermId == 2 && $mDepartmentName == 'Primary')
        {
            /*
            This means we are in Primary-section second-term so table-for attendance = sp_attendance RemoveFileInAFolder
            ===NOT YET CREATED
            */
            $sql = 'CALL school_register_attendace_sp(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId, :attendanceValueInt, :mAttendanceMark)';
            //Parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':attendanceValueInt' => $attendanceValueInt,
                ':mAttendanceMark' => $mAttendanceMark
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);


        }
        elseif($mCurrentTermId == 3 && $mDepartmentName == 'Primary')
        {

            /*
            This means we are in Primary-section Third-term so table-for attendance = tp_attendance
            ===NOT YET CREATED
            */
            $sql = 'CALL school_register_attendace_tp(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId, :attendanceValueInt, :mAttendanceMark)';
            //Parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':attendanceValueInt' => $attendanceValueInt,
                ':mAttendanceMark' => $mAttendanceMark
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);

        }
        elseif($mCurrentTermId == 1 && $mDepartmentName == 'Secondary')
        {
            /*
            This means we are in Secondary-section first-term so table-for attendance = fs_attendance
            ===NOT YET CREATED
            */
            $sql = 'CALL school_register_attendace_fs(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId, :attendanceValueInt, :mAttendanceMark)';
            //Parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':attendanceValueInt' => $attendanceValueInt,
                ':mAttendanceMark' => $mAttendanceMark
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);

        }
        elseif($mCurrentTermId == 2 && $mDepartmentName == 'Secondary')
        {

            /*
            This means we are in Secondary-section second-term so table-for attendance = ss_attendance
            ===NOT YET CREATED
            */
            $sql = 'CALL school_register_attendace_ss(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId, :attendanceValueInt, :mAttendanceMark)';
            //Parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':attendanceValueInt' => $attendanceValueInt,
                ':mAttendanceMark' => $mAttendanceMark
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);

        }
        elseif($mCurrentTermId == 3 && $mDepartmentName == 'Secondary')
        {
            /*
            This means we are in Secondary-section third-term so table-for attendance = ts_attendance
            ===NOT YET CREATED
            */
            $sql = 'CALL school_register_attendace_ts(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId, :attendanceValueInt, :mAttendanceMark)';
            //Parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':attendanceValueInt' => $attendanceValueInt,
                ':mAttendanceMark' => $mAttendanceMark
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);

        }
        

    }














































//GetEachStudentWeeklyTotal    CheckAttendanceStatus($this->mClassId, $this->mTodayDate, $this->mCurrentTermId, $this->mTodaydateId)

    public static function CheckAttendanceStatus($mClassId, $mTodaysDate, $mTermId, $mTodaydateId)
    {

        //Build the sql query
        $sql = 'CALL school_check_attendance_status(:inClassId, :inTodaysDate, :inTermId, :inTodaydateId)';

        //Build the parameter array 
        $params = array(
            ':inClassId' => $mClassId, 
            ':inTodaysDate' => $mTodaysDate,
            ':inTermId' => $mTermId,
            ':inTodaydateId' => $mTodaydateId
        );

        //Execute the query and rturn the result 
        return DatabaseHandler::GetRow($sql, $params);
    }














// ========================================
    public static function GetWeeklyPercentageForToday($mWeekValuesid, $mClassId, $mCurrentTermId, $week_start, $week_stop, $mDepartmentName)
    {
        if($mDepartmentName == 'Nursery' && $mCurrentTermId == 1)
        {
            /*
            This  function is called from 
            Nursery-section
            first-term
            table = fn_attendance
            */
            //Build the sql query AddThisWeeksAttendancePercentage
            $sql = 'CALL attendance_get_weekly_percentagez(:mWeekValuesid, :mClassId, :mCurrentTermId, :week_start, :week_stop)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':week_start' => $week_start, 
                ':week_stop' => $week_stop
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mDepartmentName == 'Nursery' && $mCurrentTermId == 2)
        {
            /*
            This  function is called from 
            Nursery-section
            second-term
            table = sn_attendance
            */
            //Build the sql query AddThisWeeksAttendancePercentage
            $sql = 'CALL attendance_get_weekly_percentagez_sn(:mWeekValuesid, :mClassId, :mCurrentTermId, :week_start, :week_stop)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':week_start' => $week_start, 
                ':week_stop' => $week_stop
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mDepartmentName == 'Nursery' && $mCurrentTermId == 3)
        {
            /*
            This  function is called from 
            Nursery-section
            third-term
            table = tn_attendance
            */
            //Build the sql query AddThisWeeksAttendancePercentage
            $sql = 'CALL attendance_get_weekly_percentagez_tn(:mWeekValuesid, :mClassId, :mCurrentTermId, :week_start, :week_stop)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':week_start' => $week_start, 
                ':week_stop' => $week_stop
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mDepartmentName == 'Primary' && $mCurrentTermId == 1)
        {
            /*
            This  function is called from 
            Primary-section
            first-term
            table = fp_attendance
            */
            //Build the sql query AddThisWeeksAttendancePercentage
            $sql = 'CALL attendance_get_weekly_percentagez_fp(:mWeekValuesid, :mClassId, :mCurrentTermId, :week_start, :week_stop)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':week_start' => $week_start, 
                ':week_stop' => $week_stop
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mDepartmentName == 'Primary' && $mCurrentTermId == 2)
        {
            /*
            This  function is called from 
            Primary-section
            second-term
            table = sp_attendance
            */
            //Build the sql query AddThisWeeksAttendancePercentage
            $sql = 'CALL attendance_get_weekly_percentagez_sp(:mWeekValuesid, :mClassId, :mCurrentTermId, :week_start, :week_stop)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':week_start' => $week_start, 
                ':week_stop' => $week_stop
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mDepartmentName == 'Primary' && $mCurrentTermId == 3)
        {
            /*
            This  function is called from 
            Primary-section
            third-term
            table = tp_attendance
            */
            //Build the sql query AddThisWeeksAttendancePercentage
            $sql = 'CALL attendance_get_weekly_percentagez_tp(:mWeekValuesid, :mClassId, :mCurrentTermId, :week_start, :week_stop)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':week_start' => $week_start, 
                ':week_stop' => $week_stop
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mDepartmentName == 'Secondary' && $mCurrentTermId == 1)
        {
            /*
            This  function is called from 
            Secondary-section
            first-term
            table = fs_attendance
            */
            //Build the sql query AddThisWeeksAttendancePercentage
            $sql = 'CALL attendance_get_weekly_percentagez_fs(:mWeekValuesid, :mClassId, :mCurrentTermId, :week_start, :week_stop)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':week_start' => $week_start, 
                ':week_stop' => $week_stop
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);
        }
        elseif($mDepartmentName == 'Secondary' && $mCurrentTermId == 2)
        {
            /*
            This  function is called from 
            Secondary-section
            second-term
            table = ss_attendance
            */
            //Build the sql query AddThisWeeksAttendancePercentage
            $sql = 'CALL attendance_get_weekly_percentagez_ss(:mWeekValuesid, :mClassId, :mCurrentTermId, :week_start, :week_stop)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':week_start' => $week_start, 
                ':week_stop' => $week_stop
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mDepartmentName == 'Secondary' && $mCurrentTermId == 3)
        {
            /*
            This  function is called from 
            Secondary-section
            second-term
            table = ts_attendance AddThisWeeksAttendancePercentage
            */
            //Build the sql query AddThisWeeksAttendancePercentage
            $sql = 'CALL attendance_get_weekly_percentagez_ts(:mWeekValuesid, :mClassId, :mCurrentTermId, :week_start, :week_stop)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':week_start' => $week_start, 
                ':week_stop' => $week_stop
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);
        }
        
        
    }
// ========================================

































































// THIS IS WHERE AM DOING RegisterTodaysAttendance
// =================================================

    public static function GetEachStudentWeeklyTotal($mWeekValuesid, $student_id, $mClassId, $mTodaydateId, $mToday, $mCurrentTermId, $mDepartmentName)
    {
        if($mDepartmentName == 'Nursery' && $mCurrentTermId == 1)
        {
            /*
            This means this function is called from 
            Nursery-section
            first-term 
            table = fn_attendance
            */
            //Build the sql query 
            $sql = 'CALL attendance_each_student_weekly_total(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId 
            );
            //Return row after query PreviousStudentWeeklyTotals
            return DatabaseHandler::GetRow($sql, $params);
        }
        elseif($mDepartmentName == 'Nursery' && $mCurrentTermId == 2)
        {
            
            /*
            This means this function is called from 
            Nursery-section
            second-term 
            table = sn_attendance
            procedure = attendance_each_student_weekly_total_sn
            */
            $sql = 'CALL attendance_each_student_weekly_total_sn(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId 
            );
            //Return row after query 
            return DatabaseHandler::GetRow($sql, $params);


        }
        elseif($mDepartmentName == 'Nursery' && $mCurrentTermId == 3)
        {
            /*
            This means this function is called from 
            Nursery-section
            third-term 
            table = tn_attendance
            procedure = attendance_each_student_weekly_total_tn
            */
            $sql = 'CALL attendance_each_student_weekly_total_tn(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId 
            );
            //Return row after query PreviousStudentWeeklyTotals
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mDepartmentName == 'Primary' && $mCurrentTermId == 1)
        {
            /*
            This means this function is called from 
            Primary-section
            first-term 
            table = fp_attendance
            procedure = attendance_each_student_weekly_total_fp
            */
            $sql = 'CALL attendance_each_student_weekly_total_fp(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId 
            );
            //Return row after query PreviousStudentWeeklyTotals
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif(($mDepartmentName == 'Primary') && ($mCurrentTermId == 2))
        {
            /*
            This means this function is called from 
            Primary-section
            second-term 
            table = sp_attendance
            procedure = attendance_each_student_weekly_total_sp
            */
            $sql = 'CALL attendance_each_student_weekly_total_sp(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId 
            );
            //Return row after query PreviousStudentWeeklyTotals
            return DatabaseHandler::GetRow($sql, $params);


        }
        elseif($mDepartmentName == 'Primary' && $mCurrentTermId == 3)
        {
            /*
            This means this function is called from 
            Primary-section
            third-term 
            table = tp_attendance
            procedure = attendance_each_student_weekly_total_tp
            */
            $sql = 'CALL attendance_each_student_weekly_total_tp(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId 
            );
            //Return row after query PreviousStudentWeeklyTotals
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mDepartmentName == 'Secondary' && $mCurrentTermId == 1)
        {
            /*
            This means this function is called from 
            Secondary-section
            first-term 
            table = fs_attendance
            procedure = attendance_each_student_weekly_total_fs
            */
            $sql = 'CALL attendance_each_student_weekly_total_fs(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId 
            );
            //Return row after query PreviousStudentWeeklyTotals
            return DatabaseHandler::GetRow($sql, $params);
        }
        elseif($mDepartmentName == 'Secondary' && $mCurrentTermId == 2)
        {
            
            /*
            This means this function is called from 
            Secondary-section
            second-term 
            table = ss_attendance
            procedure = attendance_each_student_weekly_total_ss
            */
            $sql = 'CALL attendance_each_student_weekly_total_ss(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId 
            );
            //Return row after query PreviousStudentWeeklyTotals
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mDepartmentName == 'Secondary' && $mCurrentTermId == 3)
        {
            /*
            This means this function is called from 
            Secondary-section
            third-term 
            table = ts_attendance
            procedure = attendance_each_student_weekly_total_ts
            */
            $sql = 'CALL attendance_each_student_weekly_total_ts(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId)';
            //Build the parameter array 
            $params = array(
                ':mWeekValuesid' => $mWeekValuesid, 
                ':student_id' => $student_id, 
                ':mClassId' => $mClassId, 
                ':mTodaydateId' => $mTodaydateId, 
                ':mToday' => $mToday, 
                ':mCurrentTermId' => $mCurrentTermId 
            );
            //Return row after query PreviousStudentWeeklyTotals
            return DatabaseHandler::GetRow($sql, $params);
        }
        

    }


    // ============================================




































































    public static function PreviousStudentWeeklyTotals($mWeekValuesid, $student_id, $mClassId, $mCurrentTermId)
    {
        //Build the sql query 
        $sql = 'CALL attendance_get_privious_wklytotal(:mWeekValuesid, :student_id, :mClassId, :mCurrentTermId)';
        //Build the parameter array 
        $params = array(
            ':mWeekValuesid' => $mWeekValuesid, 
            ':student_id' => $student_id, 
            ':mClassId' => $mClassId,  
            ':mCurrentTermId' => $mCurrentTermId
        );
        //eXECUTE THE QUERY AND RETURN THE RESULT GetEachStudentWeeklyTotal
        return DatabaseHandler::GetRow($sql, $params);

    }




    public static function UpdateStudentWeeklyTotals($mWeekValuesid, $student_id, $mClassId, $mTodaydateId, $mToday, $mCurrentTermId, $currentTotal)
    {
        //Build the sql query 
        $sql = 'CALL attendance_update_student_wklyTotal(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId, :currentTotal)';
        //Build the parameter array 
        $params = array(
            ':mWeekValuesid' => $mWeekValuesid, 
            ':student_id' => $student_id, 
            ':mClassId' => $mClassId, 
            ':mTodaydateId' => $mTodaydateId, 
            ':mToday' => $mToday, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':currentTotal' => $currentTotal
        );
        //Execute the query GetEachStudentsWeeklyAttendanceTotal
        DatabaseHandler::Execute($sql, $params);

    }



    public static function AddStudentWeeklyTotals($mWeekValuesid, $student_id, $mClassId, $mTodaydateId, $mToday, $mCurrentTermId, $mWeeklyTotals)
    {

        //Build the sql query 
        $sql = 'CALL attendance_add_weekly_totals(:mWeekValuesid, :student_id, :mClassId, :mTodaydateId, :mToday, :mCurrentTermId, :mWeeklyTotals)';

        //Build the parameter array 
        $params = array(
            ':mWeekValuesid' => $mWeekValuesid, 
            ':student_id' => $student_id, 
            ':mClassId' => $mClassId, 
            ':mTodaydateId' => $mTodaydateId, 
            ':mToday' => $mToday, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mWeeklyTotals' => $mWeeklyTotals
        );
        
        //Execute the query and GetWeeklyPercentageForToday
        DatabaseHandler::Execute($sql, $params);

    }



    public static function GetEachStudentsWeeklyAttendanceTotal($mClassId, $mCurrentTermId, $current_year, $week_start, $week_stop)
    {
        //Build the sql query 
        $sql = 'CALL attendance_get_each_students_attTotal(:mClassId, :mCurrentTermId, :current_year, :week_start, :week_stop)';
        //Build the parameter array
        $params = array(
            ':mClassId' => $mClassId, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':current_year' => $current_year, 
            ':week_start' => $week_start, 
            ':week_stop' => $week_stop
        );
        //Execute the query and return the result GetWeeklyPercentageForToday
        return DatabaseHandler::GetAll($sql, $params);
    }

    // ======================================

    
    public static function GetEachStudentsWeeklyAttendanceTotal_tEnd($mClassId, $mCurrentTermId, $current_year)
    {
        $sql = "SELECT wt.class_id, sc.class_name, wt.term_id, t.name, wt.student_id, a.firstname, a.surname, SUM(wt.weektotal) AS 'eachTotal' 
        FROM weekly_total wt 
        INNER JOIN school_classes sc
            ON wt.class_id = sc.school_classes_id
        INNER JOIN term t
            ON wt.term_id = t.term_id 
        INNER JOIN applicants a
            ON wt.student_id = a.applicants_id 
        WHERE wt.term_id = :inCurrentTermId AND 
        wt.class_id = :inClassId AND 
        wt.weekvalue_id BETWEEN 1 AND 15 AND 
        YEAR(wt.todaydate) = :inCurrentYear 
        GROUP BY wt.student_id";

        //Build the parameter array  SaveAsCsv
        $params = array(
            ':inCurrentTermId' => $mCurrentTermId,
            ':inClassId' => $mClassId,
            ':inCurrentYear' => $current_year
            
        );

        //Execute the query and return the result
        return DatabaseHandler::GetAll($sql, $params);

    }
    // ============================


    public static function GetDepartnameUsingClassId($mClassId)
    {
        //Build the sql query GetTeacherAssignedClasses
        $sql = 'CALL school_get_department_by_classid(:class_id)';
        //Build the parameter array
        $params = array(
            ':class_id' => $mClassId
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);
    }


    public static function AddThisWeeksAttendancePercentage($mWeekValuesid, $mClassId, $mCurrentTermId, $dateFriday, $week_what, $dailypercent)
    {
        //Build the sql query GetListOfAdmittedStudentByClassId
        $sql = 'CALL add_this_weeks_attendance_percentage(:mWeekValuesid, :mClassId, :mCurrentTermId, :dateFriday, :week_what, :dailypercent)';
        //Build the parameter array
        $params = array(
            ':mWeekValuesid' => $mWeekValuesid, 
            ':mClassId' => $mClassId, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':dateFriday' => $dateFriday, 
            ':week_what' => $week_what, 
            ':dailypercent' => $dailypercent
        );
        //Execute the query GetAllWeeksPercenatage
        DatabaseHandler::Execute($sql, $params);
    }































// kkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk

    public static function GetAllWeeksPercenatage($mClassId, $mCurrentTermId, $thisTermStarted, $thisTermEnds, $mDepartmentName)
    {
        if($mDepartmentName == 'Nursery' && $mCurrentTermId == 1)
        {
             //Build the sql query 
            $sql = 'CALL attendance_get_all_weeks_percentage(:mClassId, :mCurrentTermId, :thisTermStarted, :thisTermEnds)';
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':thisTermStarted' => $thisTermStarted, 
                ':thisTermEnds' => $thisTermEnds
            );
            //Execute the query and return the result GetAllWeeksPercenatage
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Nursery' && $mCurrentTermId == 2)
        {
            
            $sql = 'CALL attendance_get_all_weeks_percentage_sn(:mClassId, :mCurrentTermId, :thisTermStarted, :thisTermEnds)';
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':thisTermStarted' => $thisTermStarted, 
                ':thisTermEnds' => $thisTermEnds
            );
            //Execute the query and return the result GetAllWeeksPercenatage
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Nursery' && $mCurrentTermId == 3)
        {
            /*
            The means
            Nursery-section
            third-term
            table- tn_attendance
            */
            $sql = 'CALL attendance_get_all_weeks_percentage_tn(:mClassId, :mCurrentTermId, :thisTermStarted, :thisTermEnds)';
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':thisTermStarted' => $thisTermStarted, 
                ':thisTermEnds' => $thisTermEnds
            );
            //Execute the query and return the result GetAllWeeksPercenatage
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Primary' && $mCurrentTermId == 1)
        {
            /*
            The means
            Primary-section
            first-term
            table- fp_attendance
            */
            $sql = 'CALL attendance_get_all_weeks_percentage_fp(:mClassId, :mCurrentTermId, :thisTermStarted, :thisTermEnds)';
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':thisTermStarted' => $thisTermStarted, 
                ':thisTermEnds' => $thisTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Primary' && $mCurrentTermId == 2)
        {
            /*
            The means
            Primary-section
            second-term
            table- sp_attendance
            */
            $sql = 'CALL attendance_get_all_weeks_percentage_sp(:mClassId, :mCurrentTermId, :thisTermStarted, :thisTermEnds)';
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':thisTermStarted' => $thisTermStarted, 
                ':thisTermEnds' => $thisTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetAll($sql, $params);

        }
        elseif ($mDepartmentName == 'Primary' && $mCurrentTermId == 3)
        {
            
            /*
            The means
            Primary-section
            third-term
            table- tp_attendance
            */
            $sql = 'CALL attendance_get_all_weeks_percentage_tp(:mClassId, :mCurrentTermId, :thisTermStarted, :thisTermEnds)';
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':thisTermStarted' => $thisTermStarted, 
                ':thisTermEnds' => $thisTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Secondary' && $mCurrentTermId == 1)
        {
            /*
            The means
            Secondary-section
            first-term
            table- fs_attendance attendance_each_student_weekly_total_fp
            */
            $sql = 'CALL attendance_get_all_weeks_percentage_fs(:mClassId, :mCurrentTermId, :thisTermStarted, :thisTermEnds)';
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':thisTermStarted' => $thisTermStarted, 
                ':thisTermEnds' => $thisTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Secondary' && $mCurrentTermId == 2)
        {
            /*
            The means
            Secondary-section
            ssecond-term
            table- ss_attendance
            */
            $sql = 'CALL attendance_get_all_weeks_percentage_ss(:mClassId, :mCurrentTermId, :thisTermStarted, :thisTermEnds)';
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':thisTermStarted' => $thisTermStarted, 
                ':thisTermEnds' => $thisTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Secondary' && $mCurrentTermId == 3)
        {
            /*
            The means
            Secondary-section
            third-term
            table- ts_attendance
            */
            $sql = 'CALL attendance_get_all_weeks_percentage_ts(:mClassId, :mCurrentTermId, :thisTermStarted, :thisTermEnds)';
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':thisTermStarted' => $thisTermStarted, 
                ':thisTermEnds' => $thisTermEnds
            );
            //Execute the query and return the result GetAllSubjectsForASpecifiedClass
            return DatabaseHandler::GetAll($sql, $params);
        }
       
    }

    public static function GetAllWeeksPercenatage_tEnd($mClassId, $mCurrentTermId, $current_year, $mDepartmentName)
    {
        if($mDepartmentName == 'Nursery' && $mCurrentTermId == 1)
        {
             //Build the sql query GetEachStudentsWeeklyAttendanceTotal_tEnd
            $sql = "SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent' 
            FROM fn_attendance 
                INNER JOIN weeks_and_dates 
                    ON fn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
            WHERE class_id = :mClassId AND 
            term_id = :mCurrentTermId AND 
            YEAR(todaysDate) = :inCurrentYear 
            GROUP BY weekValue_id";

            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':inCurrentYear' => $current_year
            );
            //Execute the query and return the result GetAllWeeksPercenatage
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Nursery' && $mCurrentTermId == 2)
        {
            
            $sql = "SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent' 
            FROM sn_attendance 
                INNER JOIN weeks_and_dates 
                    ON sn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
            WHERE class_id = :mClassId AND 
            term_id = :mCurrentTermId AND 
            YEAR(todaysDate) = :inCurrentYear 
            GROUP BY weekValue_id";
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':inCurrentYear' => $current_year
            );
            //Execute the query and return the result GetAllWeeksPercenatage
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Nursery' && $mCurrentTermId == 3)
        {
            /*
            The means
            Nursery-section
            third-term
            table- tn_attendance
            */
            $sql = "SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent' 
            FROM tn_attendance 
                INNER JOIN weeks_and_dates 
                    ON tn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
            WHERE class_id = :mClassId AND 
            term_id = :mCurrentTermId AND 
            YEAR(todaysDate) = :inCurrentYear 
            GROUP BY weekValue_id";
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':inCurrentYear' => $current_year
            );
            //Execute the query and return the result GetAllWeeksPercenatage
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Primary' && $mCurrentTermId == 1)
        {
            /*
            The means
            Primary-section
            first-term
            table- fp_attendance
            */
            $sql = "SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent' 
            FROM fp_attendance 
                INNER JOIN weeks_and_dates 
                    ON fp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
            WHERE class_id = :mClassId AND 
            term_id = :mCurrentTermId AND 
            YEAR(todaysDate) = :inCurrentYear 
            GROUP BY weekValue_id";
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':inCurrentYear' => $current_year
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Primary' && $mCurrentTermId == 2)
        {
            /*
            The means
            Primary-section
            second-term
            table- sp_attendance
            */
            $sql = "SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent' 
            FROM sp_attendance 
                INNER JOIN weeks_and_dates 
                    ON sp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
            WHERE class_id = :mClassId AND 
            term_id = :mCurrentTermId AND 
            YEAR(todaysDate) = :inCurrentYear 
            GROUP BY weekValue_id";
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':inCurrentYear' => $current_year
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetAll($sql, $params);

        }
        elseif ($mDepartmentName == 'Primary' && $mCurrentTermId == 3)
        {
            
            /*
            The means
            Primary-section
            third-term
            table- tp_attendance
            */
            $sql = "SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent' 
            FROM tp_attendance 
                INNER JOIN weeks_and_dates 
                    ON tp_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
            WHERE class_id = :mClassId AND 
            term_id = :mCurrentTermId AND 
            YEAR(todaysDate) = :inCurrentYear 
            GROUP BY weekValue_id";
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':inCurrentYear' => $current_year
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Secondary' && $mCurrentTermId == 1)
        {
            /*
            The means
            Secondary-section
            first-term
            table- fs_attendance attendance_each_student_weekly_total_fp
            */
            $sql = "SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent' 
            FROM fs_attendance 
                INNER JOIN weeks_and_dates 
                    ON fs_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
            WHERE class_id = :mClassId AND 
            term_id = :mCurrentTermId AND 
            YEAR(todaysDate) = :inCurrentYear 
            GROUP BY weekValue_id";
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':inCurrentYear' => $current_year
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Secondary' && $mCurrentTermId == 2)
        {
            /*
            The means
            Secondary-section
            ssecond-term
            table- ss_attendance
            */
            $sql = "SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent' 
            FROM ss_attendance 
                INNER JOIN weeks_and_dates 
                    ON ss_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
            WHERE class_id = :mClassId AND 
            term_id = :mCurrentTermId AND 
            YEAR(todaysDate) = :inCurrentYear 
            GROUP BY weekValue_id";
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':inCurrentYear' => $current_year
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetAll($sql, $params);
        }
        elseif ($mDepartmentName == 'Secondary' && $mCurrentTermId == 3)
        {
            /*
            The means
            Secondary-section
            third-term
            table- ts_attendance
            */
            $sql = "SELECT week_what, week_stop, (SUM(mark_m+mark_a)*100)/(COUNT(DISTINCT(student_id))*10) AS 'allpercent' 
            FROM ts_attendance 
                INNER JOIN weeks_and_dates 
                    ON ts_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id 
            WHERE class_id = :mClassId AND 
            term_id = :mCurrentTermId AND 
            YEAR(todaysDate) = :inCurrentYear 
            GROUP BY weekValue_id";
            //Build the parameter array()
            $params = array(
                ':mClassId' => $mClassId, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':inCurrentYear' => $current_year
            );
            //Execute the query and return the result GetAllSubjectsForASpecifiedClass
            return DatabaseHandler::GetAll($sql, $params);
        }

    }






    /*************************************** 
    THIS IS THE START OF CA RECORD METHODS GetListOfAdmittedStudentByClassId
    *************************************************/
    public static function GetSubjectNameById($mSubjectId)
    {
        //Build the sql query 
        $sql = 'CALL ca_get_subjectname_use_id(:subject_id)';
        //Build the parameter array 
        $params = array(
            ':subject_id' => $mSubjectId
        );
        //Execute the query and return the results
        return DatabaseHandler::GetRow($sql, $params);

    }
// AddCA_record($stScores, $mStudentIdz[$key], $this->mSubjectId, $this->mClassId, $this->mCurrentTermId, $this->mDepartmentName, $_SESSION['ca_type'], $this->mTodayDate) UpdateSecondCazForOneStudent
// IsSubject2CaDone
    public static function AddCA_record($stScores, $mStudentId, $mSubjectId, $mClassId, $mCurrentTermId, $mDepartmentName, $ca_type, $mDate)
    {
        

        //Build the sql query 
        $sql = 'CALL ca_add_studentFirst_ca(:stScores, :mStudentIdz, :mSubjectId, :mClassId, :mCurrentTermId, :mDepartmentName, :ca_type, :mDate)';
        //Build the parameter array
        $params = array(
            ':stScores' => $stScores, 
            ':mStudentIdz' => $mStudentId, 
            ':mSubjectId' => $mSubjectId, 
            ':mClassId' => $mClassId, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mDepartmentName' => $mDepartmentName, 
            ':ca_type' => $ca_type, 
            ':mDate' => $mDate
        );
        //Execute the query and return the result
        return DatabaseHandler::GetOne($sql, $params);
    }


 public static function IsSubjectExamDone($mSubjectId, $mClassId, $mCurrentTermId, $mDepartmentName, $mTermStarted, $mTermEnds)
    {
        //Build the sql query
        $sql = 'CALL ca_isSubjectExam_done(:mSubjectId, :mClassId, :mCurrentTermId, :mDepartmentName, :mTermStarted, :mTermEnds)';
        //Build the parameter array
        $params = array(
            ':mSubjectId' => $mSubjectId, 
            ':mClassId' => $mClassId, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mDepartmentName' => $mDepartmentName,  
            ':mTermStarted' => $mTermStarted,
            ':mTermEnds' => $mTermEnds
        );
        //Execute the query and return the result
        return DatabaseHandler::GetRow($sql, $params);

    }




    public static function IsSubject3CaDone($mSubjectId, $mClassId, $mCurrentTermId, $mDepartmentName, $mTermStarted, $mTermEnds)
    {
        //Build the sql query ca_isSubject3CA_done
        $sql = 'CALL ca_isSubject3CA_done(:mSubjectId, :mClassId, :mCurrentTermId, :mDepartmentName, :mTermStarted, :mTermEnds)';
        //Build the parameter array
        $params = array(
            ':mSubjectId' => $mSubjectId, 
            ':mClassId' => $mClassId, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mDepartmentName' => $mDepartmentName,  
            ':mTermStarted' => $mTermStarted,
            ':mTermEnds' => $mTermEnds
        );
        //Execute the query and return the result
        return DatabaseHandler::GetRow($sql, $params);

    }



    public static function IsSubject2CaDone($mSubjectId, $mClassId, $mCurrentTermId, $mDepartmentName, $mTermStarted, $mTermEnds)
    {
        //Build the sql query
        $sql = 'CALL ca_isSubject2CA_done(:mSubjectId, :mClassId, :mCurrentTermId, :mDepartmentName, :mTermStarted, :mTermEnds)';
        //Build the parameter array
        $params = array(
            ':mSubjectId' => $mSubjectId, 
            ':mClassId' => $mClassId, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mDepartmentName' => $mDepartmentName,  
            ':mTermStarted' => $mTermStarted,
            ':mTermEnds' => $mTermEnds
        );
        //Execute the query and return the result
        return DatabaseHandler::GetRow($sql, $params);

    }
    public static function IsSubjectCaDone($mSubjectId, $mClassId, $mCurrentTermId, $mDepartmentName, $ca_type, $mTodayDate, $mTermStarted, $mTermEnds)
    {
        //Build the sql query
        $sql = 'CALL ca_isSubjectCA_done(:mSubjectId, :mClassId, :mCurrentTermId, :mDepartmentName, :ca_type, :mTodayDate, :mTermStarted, :mTermEnds)';
        //Build the parameter array
        $params = array(
            ':mSubjectId' => $mSubjectId, 
            ':mClassId' => $mClassId, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mDepartmentName' => $mDepartmentName, 
            ':ca_type' => $ca_type, 
            ':mTodayDate' => $mTodayDate,
            ':mTermStarted' => $mTermStarted,
            ':mTermEnds' => $mTermEnds
        );
        //Execute the query and return the result
        return DatabaseHandler::GetRow($sql, $params);

    }


    public static function IsSubjectCaStarted($mClassId, $mCurrentTermId, $mDepartmentName, $mTermStarted, $mTermEnds)
    {
        //Build the sql query 
        $sql = 'CALL ca_is_subjctCa_started(:mClassId, :mCurrentTermId, :mDepartmentName, :mTermStarted, :mTermEnds)';
        //Build parameter array 
        $params = array(
            ':mClassId' => $mClassId, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mDepartmentName' => $mDepartmentName, 
            ':mTermStarted' => $mTermStarted, 
            ':mTermEnds' => $mTermEnds
        );
        //Execute the query and return the results
        return DatabaseHandler::GetRow($sql, $params);
    }

    public static function GetStudentFullname($mStudentId)
    {
        //Build the sql query
        $sql = "SELECT firstname, surname
                FROM applicants
                WHERE applicants_id = :mStudentId" ;
        //Build the parameter array
        $params = array(
            ':mStudentId' => $mStudentId
        );
        //Execute the querya nd return the result 
        return DatabaseHandler::GetRow($sql, $params);

    }



    public static function GetStudentCaExamsRecords($mStudentIdz, $mClassId, $mCurrentTermId, $mTermStarted, $mTermEnds, $mDepartmentName)
    {
        //Build sql query GetAllSubjectsForASpecifiedClass
        $sql = 'CALL ca_get_student_caExam_record(:mStudentIdz, :mClassId, :mCurrentTermId, :mTermStarted, :mTermEnds, :mDepartmentName)';
        //Build parametre array
        $params = array(
            ':mStudentIdz' => $mStudentIdz, 
            ':mClassId' => $mClassId, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mTermStarted' => $mTermStarted, 
            ':mTermEnds' => $mTermEnds,
            ':mDepartmentName' => $mDepartmentName
        );
        //Execute the query and return the result IsSubjectCaDone
        return DatabaseHandler::GetAll($sql, $params);

    }



    public static function UpdateExamzForOneStudent($subjectId, $firstCaScores, $student_id, $mCurrentTermId, $mDepartmentName, $ClassId, $mTermStarted, $mTermEnds)
    {
        //Build the sql query IsSubjectCaDone ca_update_first_CazFor_one_student
        $sql = 'CALL ca_update_examFor_one_student(:subjectId, :firstCaScores, :student_id, :mCurrentTermId, :mDepartmentName, :ClassId, :mTermStarted, :mTermEnds)';
        //Build the parameter array
        $params = array(
            ':subjectId' => $subjectId, 
            ':firstCaScores' => $firstCaScores, 
            ':student_id' => $student_id, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mDepartmentName' => $mDepartmentName, 
            ':ClassId' => $ClassId,
            ':mTermStarted' => $mTermStarted,
            ':mTermEnds' => $mTermEnds
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }

    public static function UpdateThirdCazForOneStudent($subjectId, $firstCaScores, $student_id, $mCurrentTermId, $mDepartmentName, $ClassId, $mTermStarted, $mTermEnds)
    {
        //Build the sql query IsSubjectCaDone ca_update_first_CazFor_one_student
        $sql = 'CALL ca_update_third_CazFor_one_student(:subjectId, :firstCaScores, :student_id, :mCurrentTermId, :mDepartmentName, :ClassId, :mTermStarted, :mTermEnds)';
        //Build the parameter array
        $params = array(
            ':subjectId' => $subjectId, 
            ':firstCaScores' => $firstCaScores, 
            ':student_id' => $student_id, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mDepartmentName' => $mDepartmentName, 
            ':ClassId' => $ClassId,
            ':mTermStarted' => $mTermStarted,
            ':mTermEnds' => $mTermEnds
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }

    public static function UpdateSecondCazForOneStudent($subjectId, $firstCaScores, $student_id, $mCurrentTermId, $mDepartmentName, $ClassId, $mTermStarted, $mTermEnds)
    {
        //Build the sql query IsSubjectCaDone AddCA_record
        $sql = 'CALL ca_update_second_CazFor_one_student(:subjectId, :firstCaScores, :student_id, :mCurrentTermId, :mDepartmentName, :ClassId, :mTermStarted, :mTermEnds)';
        //Build the parameter array
        $params = array(
            ':subjectId' => $subjectId, 
            ':firstCaScores' => $firstCaScores, 
            ':student_id' => $student_id, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mDepartmentName' => $mDepartmentName, 
            ':ClassId' => $ClassId,
            ':mTermStarted' => $mTermStarted,
            ':mTermEnds' => $mTermEnds
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }

    public static function UpdateFirstCazForOneStudent($subjectId, $firstCaScores, $student_id, $mCurrentTermId, $mDepartmentName, $ClassId, $mTermStarted, $mTermEnds)
    {
        //Build the sql query IsSubjectCaDone
        $sql = 'CALL ca_update_first_CazFor_one_student(:subjectId, :firstCaScores, :student_id, :mCurrentTermId, :mDepartmentName, :ClassId, :mTermStarted, :mTermEnds)';
        //Build the parameter array
        $params = array(
            ':subjectId' => $subjectId, 
            ':firstCaScores' => $firstCaScores, 
            ':student_id' => $student_id, 
            ':mCurrentTermId' => $mCurrentTermId, 
            ':mDepartmentName' => $mDepartmentName, 
            ':ClassId' => $ClassId,
            ':mTermStarted' => $mTermStarted,
            ':mTermEnds' => $mTermEnds
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);

    }



    public static function GetStudentsFullDetailsForTeacher($mStudentIdz)
    {
        //Build the sql query AddTodaysDate SaveAsCsv
        // $sql = 'CALL get_student_infor_for_teacher(:student_id)';

        $sql = "SELECT applicants_id, image1, image4, firstname, email, surname, othername, dob, gender, state, f_fname, f_lname, f_address, m_fname, m_lname, m_phone, m_address, class_assigned, reg_number FROM applicants WHERE applicants_id = :student_id";

        //Build the parameter array()
        $params = array(
            ':student_id' => $mStudentIdz
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);

    }



    //The add student progress metrix function 
    public static function AddStudentsPersonalProgress($mClassId, $mStudentIdz, $mCurrentTermId, $mPunctuality, $mRespect, $mPoliteness, $mRelationship, $mAttentiveness, $mObedience, $mNeatness, $mHandwriting, $mFluency, $mFriendliness, $mTeachersComment)
    {
        #First check if the entry already exists
        $sql = 'SELECT progress_matix_id 
                FROM progress_matix
                WHERE class_id = :classId AND 
                    student_id = :studentId AND 
                    term_id = :termId';
        //Build the parameter array
        $params = array(
            ':classId' => $mClassId,
            ':studentId' => $mStudentIdz,
            ':termId' => $mCurrentTermId
        );
        //Execute the query and return the result GetStudentsGrandTotal
        $result = DatabaseHandler::GetRow($sql, $params);

        if(isset($result['progress_matix_id']))
        {
            return $result['progress_matix_id'];
        }
        else
        {
             //Build the sql query 
            $sql = 'INSERT INTO progress_matix (class_id, student_id, term_id, punctuality, respect, politeness, relationship, attentiveness, obedience, neatness, handwriting, fluency, friendliness, teachersComment) VALUES (:mClassId, :mStudentIdz, :mCurrentTermId, :mPunctuality, :mRespect, :mPoliteness, :mRelationship, :mAttentiveness, :mObedience, :mNeatness, :mHandwriting, :mFluency, :mFriendliness, :mTeachersComment)';

            //Build the parameter array 
            $params = array(
                ':mClassId' => $mClassId, 
                ':mStudentIdz' => $mStudentIdz, 
                ':mCurrentTermId' => $mCurrentTermId, 
                ':mPunctuality' => $mPunctuality, 
                ':mRespect' => $mRespect, 
                ':mPoliteness' => $mPoliteness, 
                ':mRelationship' => $mRelationship, 
                ':mAttentiveness' => $mAttentiveness, 
                ':mObedience' => $mObedience,
                ':mNeatness' => $mNeatness, 
                ':mHandwriting' => $mHandwriting, 
                ':mFluency' => $mFluency,
                ':mFriendliness' => $mFriendliness, 
                ':mTeachersComment' => $mTeachersComment
            );

            //Execute the query and return the result
            DatabaseHandler::Execute($sql, $params);
            return true;

        }

    }


    public static function UpdateNextTermStartDate($mNextTermStartsDate, $id)
    {
        //Build the sql query Full texts 	

        $sql = 'UPDATE admin_settings 
                SET next_term_starts = :mDate
                WHERE admin_settings_id = :id';
        //Build the parameter array
        $params = array(
            ':mDate' => $mNextTermStartsDate,
            ':id' => $id
        );
        //Execute the qquery 
        DatabaseHandler::Execute($sql, $params);

    }






















    public static function GetStudentsGrandTotal($mStudentId, $mClassId, $mCurrentTermId, $mTermStarted, $mTermEnds, $mDepartmentName)
    {
        
        if($mCurrentTermId == 1 && $mDepartmentName == 'Nursery')
        {
            //Build the sql query (Nursery first term)IsSubject2CaDone
            $sql = "SELECT student_id, SUM(firstca+secondca+thirdca+exams) AS 'grandtotal', AVG(firstca+secondca+thirdca+exams) AS 'average' 
            FROM fn_ca_record 
            WHERE student_id = :inStudentIdz AND class_id = :inClassId AND term_id = :inCurrentTermId AND supDate BETWEEN :inTermStarted AND :inTermEnds";
            //Build the parameter array
            $params = array(
                ':inStudentIdz' => $mStudentId,
                ':inClassId' => $mClassId,
                ':inCurrentTermId' => $mCurrentTermId,
                ':inTermStarted' => $mTermStarted,
                ':inTermEnds' => $mTermEnds
            );
            //Execute the query and return the result
            return DatabaseHandler::GetRow($sql, $params);
        }
        elseif($mCurrentTermId == 2 && $mDepartmentName == 'Nursery')
        {
            //Build the sql query (Nursery second term)
            $sql = "SELECT student_id, SUM(firstca+secondca+thirdca+exams) AS 'grandtotal', AVG(firstca+secondca+thirdca+exams) AS 'average' 
            FROM sn_ca_record 
            WHERE student_id = :inStudentIdz AND class_id = :inClassId AND term_id = :inCurrentTermId AND supDate BETWEEN :inTermStarted AND :inTermEnds";
            //Build the parameter array
            $params = array(
                ':inStudentIdz' => $mStudentId,
                ':inClassId' => $mClassId,
                ':inCurrentTermId' => $mCurrentTermId,
                ':inTermStarted' => $mTermStarted,
                ':inTermEnds' => $mTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);
        }
        elseif($mCurrentTermId == 3 && $mDepartmentName == 'Nursery')
        {
            //Build the sql query (Nursery third term)
            $sql = "SELECT student_id, SUM(firstca+secondca+thirdca+exams) AS 'grandtotal', AVG(firstca+secondca+thirdca+exams) AS 'average' 
            FROM tn_ca_record 
            WHERE student_id = :inStudentIdz AND class_id = :inClassId AND term_id = :inCurrentTermId AND supDate BETWEEN :inTermStarted AND :inTermEnds";
            //Build the parameter array
            $params = array(
                ':inStudentIdz' => $mStudentId,
                ':inClassId' => $mClassId,
                ':inCurrentTermId' => $mCurrentTermId,
                ':inTermStarted' => $mTermStarted,
                ':inTermEnds' => $mTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mCurrentTermId == 1 && $mDepartmentName == 'Primary')
        {
            //Build the sql query (Primary first term)
            $sql = "SELECT student_id, SUM(firstca+secondca+thirdca+exams) AS 'grandtotal', AVG(firstca+secondca+thirdca+exams) AS 'average' 
            FROM fp_ca_record
            WHERE student_id = :inStudentIdz AND class_id = :inClassId AND term_id = :inCurrentTermId AND supDate BETWEEN :inTermStarted AND :inTermEnds";
            //Build the parameter array
            $params = array(
                ':inStudentIdz' => $mStudentId,
                ':inClassId' => $mClassId,
                ':inCurrentTermId' => $mCurrentTermId,
                ':inTermStarted' => $mTermStarted,
                ':inTermEnds' => $mTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mCurrentTermId == 2 && $mDepartmentName == 'Primary')
        {
            //Build the sql query (Primary second term)
            $sql = "SELECT student_id, SUM(firstca+secondca+thirdca+exams) AS 'grandtotal', AVG(firstca+secondca+thirdca+exams) AS 'average' 
            FROM sp_ca_record
            WHERE student_id = :inStudentIdz AND class_id = :inClassId AND term_id = :inCurrentTermId AND supDate BETWEEN :inTermStarted AND :inTermEnds";
            //Build the parameter array
            $params = array(
                ':inStudentIdz' => $mStudentId,
                ':inClassId' => $mClassId,
                ':inCurrentTermId' => $mCurrentTermId,
                ':inTermStarted' => $mTermStarted,
                ':inTermEnds' => $mTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mCurrentTermId == 3 && $mDepartmentName == 'Primary')
        {
            //Build the sql query (Primary third term)
            $sql = "SELECT student_id, SUM(firstca+secondca+thirdca+exams) AS 'grandtotal', AVG(firstca+secondca+thirdca+exams) AS 'average' 
            FROM tp_ca_record
            WHERE student_id = :inStudentIdz AND class_id = :inClassId AND term_id = :inCurrentTermId AND supDate BETWEEN :inTermStarted AND :inTermEnds";
            //Build the parameter array
            $params = array(
                ':inStudentIdz' => $mStudentId,
                ':inClassId' => $mClassId,
                ':inCurrentTermId' => $mCurrentTermId,
                ':inTermStarted' => $mTermStarted,
                ':inTermEnds' => $mTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);
        }
        elseif($mCurrentTermId == 1 && $mDepartmentName == 'Secondary')
        {
            //Build the sql query (Secondary first term)
            $sql = "SELECT student_id SUM(firstca+secondca+thirdca+exams) AS 'grandtotal', AVG(firstca+secondca+thirdca+exams) AS 'average' 
            FROM fs_ca_record 
            WHERE student_id = :inStudentIdz AND class_id = :inClassId AND term_id = :inCurrentTermId AND supDate BETWEEN :inTermStarted AND :inTermEnds";
            //Build the parameter array
            $params = array(
                ':inStudentIdz' => $mStudentId,
                ':inClassId' => $mClassId,
                ':inCurrentTermId' => $mCurrentTermId,
                ':inTermStarted' => $mTermStarted,
                ':inTermEnds' => $mTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);

        }
        elseif($mCurrentTermId == 2 && $mDepartmentName == 'Secondary')
        {
             //Build the sql query (Secondary second term)GetListOfAdmittedStudentByClassId
            $sql = "SELECT student_id, SUM(firstca+secondca+thirdca+exams) AS 'grandtotal', AVG(firstca+secondca+thirdca+exams) AS 'average' 
            FROM ss_ca_record
            WHERE student_id = :inStudentIdz AND class_id = :inClassId AND term_id = :inCurrentTermId AND supDate BETWEEN :inTermStarted AND :inTermEnds";
             //Build the parameter array
            $params = array(
                ':inStudentIdz' => $mStudentId,
                ':inClassId' => $mClassId,
                ':inCurrentTermId' => $mCurrentTermId,
                ':inTermStarted' => $mTermStarted,
                ':inTermEnds' => $mTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);
        }
        elseif($mCurrentTermId == 3 && $mDepartmentName == 'Secondary')
        {
            //Build the sql query (Secondary thirrd term)
            $sql = "SELECT student_id, SUM(firstca+secondca+thirdca+exams) AS 'grandtotal', AVG(firstca+secondca+thirdca+exams) AS 'average' 
            FROM ts_ca_record 
            WHERE student_id = :inStudentIdz AND class_id = :inClassId AND term_id = :inCurrentTermId AND supDate BETWEEN :inTermStarted AND :inTermEnds";
            //Build the parameter array
            $params = array(
                ':inStudentIdz' => $mStudentId,
                ':inClassId' => $mClassId,
                ':inCurrentTermId' => $mCurrentTermId,
                ':inTermStarted' => $mTermStarted,
                ':inTermEnds' => $mTermEnds
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetRow($sql, $params);
        }
    }


    //THIS FUNCTION GETS THE GRAND TOTAL OF ALL THE STUDENTS AT ONCE 
    // 



    public static function GetListOfAllStudentIDsInThisClass($mClassId, $mCurrentTerm, $active_status)
    {
        //Build the sql query 
        $sql = "SELECT student_id 
        FROM active_class 
        WHERE class_id = :inClassId AND 
            term_name = :inTerm AND 
            active_status = :inActiveStatus";
        //Build the parameter array 
        $params = array(
            ':inClassId' => $mClassId,
            ':inTerm' => $mCurrentTerm,
            ':inActiveStatus' => $active_status
        );
        //Execute the query and return the result GetStudentsGrandTotal
        return DatabaseHandler::GetAll($sql, $params);
    }



    public static function Rankthis()
    {
        //Build the sql query 
        $sql = "SELECT sales_employee, fiscal_year, sale, RANK() 
                OVER (PARTITION BY fiscal_year ORDER BY sale DESC) AS 'sales_rank' 
                FROM sales";
        
        //Execute the query and return the result GetStudentsGrandTotal
        return DatabaseHandler::GetAll($sql);
    }

    //THE POSITION QUERY 
    public static function GetTermlynPosition($mTermId, $mClassId, $thisTermStarted, $thisTermEnds, $mDepartmentName)
    {

        switch ($mDepartmentName) {
            case 'Nursery':
                # code...
                //Build the sql query 
                $sql = "SELECT rid, student_id, RANK() 
                        OVER (PARTITION BY class_id ORDER BY average DESC) AS 'student_position' 
                        FROM nry_recordsForAverageAndGtotal
                        WHERE class_id = :inClassId AND
                            term_id = :inTermId AND 
                            record_date BETWEEN :inTermStartDate AND :inTermEndData";
                //Build the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndData' => $thisTermEnds
                );
                //Execute the query and return the results
                return DatabaseHandler::GetAll($sql, $params);
                break;
            case 'Primary':
                # code...
                //Build the sql query 
                $sql = "SELECT rid, student_id, RANK() 
                        OVER (PARTITION BY class_id ORDER BY average DESC) AS 'student_position' 
                        FROM pry_recordsForAverageAndGtotal
                        WHERE class_id = :inClassId AND
                            term_id = :inTermId AND 
                            record_date BETWEEN :inTermStartDate AND :inTermEndData";
                //Build the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndData' => $thisTermEnds
                );
                //Execute the query and return the results
                return DatabaseHandler::GetAll($sql, $params);
                break;
            case 'Secondary':
                # code...
                //Build the sql query 
                $sql = "SELECT rid, student_id, RANK() 
                        OVER (PARTITION BY class_id ORDER BY average DESC) AS 'student_position' 
                        FROM sry_recordsForAverageAndGtotal
                        WHERE class_id = :inClassId AND
                            term_id = :inTermId AND 
                            record_date BETWEEN :inTermStartDate AND :inTermEndData";
                //Build the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndData' => $thisTermEnds
                );
                //Execute the query and return the results
                return DatabaseHandler::GetAll($sql, $params);
                break;
            default:
                # code...
                break;
        }

    }



    //THIS FUNCTION COUNT THE POSITION COLUMN TO CHECK IF RECORDS HAS BEEN INSERTED INTO IT
    public static function IsPositionRecorde($mTermId, $mClassId, $thisTermStarted, $thisTermEnds, $mDepartmentName)
    {
    
        switch ($mDepartmentName) {
            case 'Nursery':
                # code...GetTermlynPosition
                //Build the sql query
                $sql = "SELECT COUNT(position)
                        FROM nry_recordsForAverageAndGtotal
                        WHERE class_id = :inClassId AND
                            term_id = :inTerm_id AND 
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";
                //Build the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTerm_id' => $mTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );
                //Execute the query and return the result
                return DatabaseHandler::GetOne($sql, $params);
                break;
            case 'Primary':
                # code...
                //Build the sql query
                $sql = "SELECT COUNT(position)
                        FROM pry_recordsForAverageAndGtotal
                        WHERE class_id = :inClassId AND
                            term_id = :inTerm_id AND 
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";
                //Build the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTerm_id' => $mTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );
                //Execute the query and return the result
                return DatabaseHandler::GetOne($sql, $params);
                break;
            case 'Secondary':
                # code...
                //Build the sql query
                $sql = "SELECT COUNT(position)
                        FROM sry_recordsForAverageAndGtotal
                        WHERE class_id = :inClassId AND
                            term_id = :inTerm_id AND 
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";
                //Build the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTerm_id' => $mTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );
                //Execute the query and return the result GetTermlynPosition
                return DatabaseHandler::GetOne($sql, $params);
                break;
            default:
                # code...
                break;
        }

    }


    // (int)$value['rid'], (int)$value['student_id'], (int)$value['position'], (int)$_SESSION['CaExamsClassId'], $this->mCurrentTermId, $this->thisTermStarted, $this->thisTermEnds, $this->mDepartmentName);

    public static function AddStudentsClassPosition($rid, $student_id, $position, $mClassId, $mCurrentTermId, $thisTermStarted, $thisTermEnds, $mDepartmentName)
    {
        
        switch ($mDepartmentName) {
            case 'Nursery':
                # code...
                //Build the sql query 
                $sql = "UPDATE nry_recordsForAverageAndGtotal
                        SET position = :inPosition
                        WHERE rid = :mRid AND
                            student_id = :inStudentId AND
                            class_id = :inClassId AND
                            term_id = :inTermId AND
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";
                //Build the parameter array 
                $params = array(
                    ':inPosition' => $position,
                    ':mRid' => $rid,
                    ':inStudentId' => $student_id,
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );
                //Execute the query 
                DatabaseHandler::Execute($sql, $params);
                break;
            case 'Primary':
                # code...
                //Build the sql query 
                $sql = "UPDATE pry_recordsForAverageAndGtotal
                        SET position = :inPosition
                        WHERE rid = :mRid AND
                            student_id = :inStudentId AND
                            class_id = :inClassId AND
                            term_id = :inTermId AND
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";
                //Build the parameter array 
                $params = array(
                    ':inPosition' => $position,
                    ':mRid' => $rid,
                    ':inStudentId' => $student_id,
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );
                //Execute the query 
                DatabaseHandler::Execute($sql, $params);
                break;
            case 'Secondary':
                # code...
                //Build the sql query 
                $sql = "UPDATE sry_recordsForAverageAndGtotal
                        SET position = :inPosition
                        WHERE rid = :mRid AND
                            student_id = :inStudentId AND
                            class_id = :inClassId AND
                            term_id = :inTermId AND
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";
                //Build the parameter array 
                $params = array(
                    ':inPosition' => $position,
                    ':mRid' => $rid,
                    ':inStudentId' => $student_id,
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );
                //Execute the query 
                DatabaseHandler::Execute($sql, $params);
                break;
            default:
                # code...
                break;
        }

    }



    public static function GetGTotalAveragePositionById($StudentId,  $mClassId, $mCurrentTermId, $thisTermStarted, $thisTermEnds, $mDepartmentName)
    {
        
        switch ($mDepartmentName) {
            case 'Nursery':
                # code...CountRecordsForAverageAndGtotal
                //Build the sql query 
                $sql = "SELECT student_id, gtotal, average, position
                        FROM nry_recordsForAverageAndGtotal
                        WHERE student_id = :inStudentId AND
                            class_id = :inClassId AND
                            term_id = :inTermId AND
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";

                //Build the parameter array 
                $params = array(
                    ':inStudentId' => $StudentId, 
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );

                //Execute the query and return the result 
                return DatabaseHandler::GetRow($sql, $params);
                break;

            case 'Primary':
                # code...
                //Build the sql query 
                $sql = "SELECT student_id, gtotal, average, position
                        FROM pry_recordsForAverageAndGtotal
                        WHERE student_id = :inStudentId AND
                            class_id = :inClassId AND
                            term_id = :inTermId AND
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";

                //Build the parameter array 
                $params = array(
                    ':inStudentId' => $StudentId, 
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );

                //Execute the query and return the result 
                return DatabaseHandler::GetRow($sql, $params);
                break;
            case 'Secondary':
                # code...
                //Build the sql query 
                $sql = "SELECT student_id, gtotal, average, position
                        FROM sry_recordsForAverageAndGtotal
                        WHERE student_id = :inStudentId AND
                            class_id = :inClassId AND
                            term_id = :inTermId AND
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";

                //Build the parameter array 
                $params = array(
                    ':inStudentId' => $StudentId, 
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );

                //Execute the query and return the result 
                return DatabaseHandler::GetRow($sql, $params);
                break;
            default:
                # code...
                break;
        }

    }


    //Total number of time school was open in a term 
    public static function GetNumberOfTimeSchoolWasOpen($thisTermStarted, $thisTermEnds)
    {
        //Build the sql query 
        $sql = "SELECT COUNT(todays_date_id)
                FROM todays_date
                WHERE date_value BETWEEN :inTremStartDate AND :inTermEndDate";
        //Build the parameter array 
        $params = array(
            ':inTremStartDate' => $thisTermStarted,
            ':inTermEndDate' => $thisTermEnds
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);


    }



    public static function GetStudentProgressMatrix($mClassId, $mStudentIdz, $mCurrentTermId, $thisTermStarted, $thisTermEnds)
    {
        //Build the sql query 
        $sql = "SELECT progress_matix_id, class_id, student_id, term_id, punctuality, respect, politeness, relationship, attentiveness, obedience, neatness, handwriting, fluency, friendliness, teachersComment
        FROM progress_matix
        WHERE class_id = :inClassId AND
            student_id = :inStudentId AND
            term_id = :inTermId AND
            DATE_FORMAT(sys_date, '%Y-%m-%d') BETWEEN :inTermStartDate AND :inTermEndDate";
        //Build the parameter array
        $params = array(
            ':inClassId' => $mClassId,
            ':inStudentId' => $mStudentIdz,
            ':inTermId' => $mCurrentTermId,
            ':inTermStartDate' => $thisTermStarted,
            ':inTermEndDate' => $thisTermEnds
        );
        //Execute the query and return the result GetEachStudentsWeeklyAttendanceTotal
        return DatabaseHandler::GetRow($sql, $params);

    }


    public static function CountRecordsForAverageAndGtotal($mClassId, $mCurrentTermId, $thisTermStarted, $thisTermEnds, $mDepartmentName)
    {
        #We must determine from what section of the school the function is being called so that we can retrieve values from the corresponding table, since there are three of such tables RecordGrandTotalnAverages
        
        switch ($mDepartmentName) {
            case 'Nursery':
                # code..GetStudentsGrandTotal.
                //Build the sql query 
                $sql = "SELECT COUNT(rid) 
                        FROM nry_recordsForAverageAndGtotal 
                        WHERE class_id = :inClassId AND
                            term_id = :inCurrentTermId AND
                            record_date BETWEEN :thisTermStarted AND :thisTermEnds
                            ";

                //Build the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inCurrentTermId' => $mCurrentTermId,
                    ':thisTermStarted' => $thisTermStarted,
                    ':thisTermEnds' => $thisTermEnds
                );
                
                //Execute the query and return the results
                return DatabaseHandler::GetOne($sql, $params);
                break;
                
            case 'Primary':
                # code...
                //Build the sql query 
                $sql = "SELECT COUNT(rid) 
                        FROM pry_recordsForAverageAndGtotal 
                        WHERE class_id = :inClassId AND
                            term_id = :inCurrentTermId AND
                            record_date BETWEEN :thisTermStarted AND :thisTermEnds
                            ";

                //Build the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inCurrentTermId' => $mCurrentTermId,
                    ':thisTermStarted' => $thisTermStarted,
                    ':thisTermEnds' => $thisTermEnds
                );
                
                //Execute the query and return the results
                return DatabaseHandler::GetOne($sql, $params);
                break;
            case 'Secondary':
                # code...
                //Build the sql query 
                $sql = "SELECT COUNT(rid) 
                        FROM sry_recordsForAverageAndGtotal 
                        WHERE class_id = :inClassId AND
                            term_id = :inCurrentTermId AND
                            record_date BETWEEN :thisTermStarted AND :thisTermEnds
                            ";

                //Build the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inCurrentTermId' => $mCurrentTermId,
                    ':thisTermStarted' => $thisTermStarted,
                    ':thisTermEnds' => $thisTermEnds
                );
                
                //Execute the query and return the results
                return DatabaseHandler::GetOne($sql, $params);
                break;
            default:
                # code...
                break;
        }
        
    }




    #This function adds the students grand totals and average into the appropriate table according to the department that the clas belongs to IsPositionRecorde
    public static function RecordGrandTotalnAverages($student_id, $grandtotal, $average, $mCurrentTermId, $mClassId, $mTodayDate, $mDepartmentName)
    {
        switch ($mDepartmentName) {
            case 'Nursery':
                # code...
                //Build the sql query
                $sql = 'INSERT INTO nry_recordsForAverageAndGtotal (class_id, term_id, record_date, student_id, gtotal, average) VALUES (:inClassId, :inTermId, :inRecordDate, :inStudentId, :inGrandTotal, :inAverage)';
                //Builde the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inRecordDate' => $mTodayDate,
                    ':inStudentId' => $student_id,
                    ':inGrandTotal' => $grandtotal,
                    ':inAverage' => $average
                );
                //Execute the query 
                DatabaseHandler::Execute($sql, $params);
                break;
            case 'Primary':
                # code...
                //Build the sql query
                $sql = 'INSERT INTO pry_recordsForAverageAndGtotal (class_id, term_id, record_date, student_id, gtotal, average) VALUES (:inClassId, :inTermId, :inRecordDate, :inStudentId, :inGrandTotal, :inAverage)';
                //Builde the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inRecordDate' => $mTodayDate,
                    ':inStudentId' => $student_id,
                    ':inGrandTotal' => $grandtotal,
                    ':inAverage' => $average
                );
                //Execute the query 
                DatabaseHandler::Execute($sql, $params);
                break;
            case 'Secondary':
                # code...
                //Build the sql query
                $sql = 'INSERT INTO sry_recordsForAverageAndGtotal (class_id, term_id, record_date, student_id, gtotal, average) VALUES (:inClassId, :inTermId, :inRecordDate, :inStudentId, :inGrandTotal, :inAverage)';
                //Builde the parameter array
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inRecordDate' => $mTodayDate,
                    ':inStudentId' => $student_id,
                    ':inGrandTotal' => $grandtotal,
                    ':inAverage' => $average
                );
                //Execute the query 
                DatabaseHandler::Execute($sql, $params);
                break;
            default:
                # code...
                break;
        }


    }



    public static function GetStudentAcademiRecords($mClassId, $mCurrentTermId, $thisTermStarted, $thisTermEnds, $mDepartmentName)
    {
        //Build the sql query 
        switch ($mDepartmentName) {
            case 'Nursery':
                # code...
                //Build the sql query 
                $sql = "SELECT student_id, gtotal, average, position, firstname, surname
                        FROM nry_recordsforaverageandgtotal
                            INNER JOIN applicants
                                ON nry_recordsforaverageandgtotal.student_id = applicants.applicants_id
                        WHERE class_id = :inClassId AND
                            term_id = :inTermId AND
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";
                //Build the parater array 
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );
                //Execute the query and return the result
                return DatabaseHandler::GetAll($sql, $params);
                break;
            case 'Primary':
                # code...
                //Build the sql query 
                $sql = "SELECT student_id, gtotal, average, position, firstname, surname
                        FROM nry_recordsforaverageandgtotal
                            INNER JOIN applicants
                                ON pry_recordsforaverageandgtotal.student_id = applicants.applicants_id
                        WHERE class_id = :inClassId AND
                            term_id = :inTermId AND
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";
                //Build the parater array 
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );
                //Execute the query and return the result
                return DatabaseHandler::GetAll($sql, $params);
                break;
            case 'Secondary':
                # code...
                //Build the sql query 
                $sql = "SELECT student_id, gtotal, average, position, firstname, surname
                        FROM sry_recordsforaverageandgtotal
                            INNER JOIN applicants
                                ON nry_recordsforaverageandgtotal.student_id = applicants.applicants_id
                        WHERE class_id = :inClassId AND
                            term_id = :inTermId AND
                            record_date BETWEEN :inTermStartDate AND :inTermEndDate";
                //Build the parater array 
                $params = array(
                    ':inClassId' => $mClassId,
                    ':inTermId' => $mCurrentTermId,
                    ':inTermStartDate' => $thisTermStarted,
                    ':inTermEndDate' => $thisTermEnds
                );
                //Execute the query and return the result
                return DatabaseHandler::GetAll($sql, $params);
                break;
            default:
                # code...
                break;
        }

    }




    public static function GetStudentTotalNumberOfAttendance($mClassId, $mStudentIdz, $mCurrentTermId, $thisTermStarted, $thisTermEnds)
    {
        //Build the sql query 
        $sql = "SELECT SUM(weektotal)
                FROM weekly_total
                WHERE student_id = :inStudentId AND
                        class_id = :inClassId AND
                        term_id = :inTermId AND
                        todaydate BETWEEN :inTermStartDate AND :inTermEndDate";
        //Build the parameter array
        $params = array(
            ':inStudentId' => $mStudentIdz,
            ':inClassId' => $mClassId,
            ':inTermId' => $mCurrentTermId,
            ':inTermStartDate' => $thisTermStarted,
            ':inTermEndDate' => $thisTermEnds
        );
        //Execute the query and return the results
        return DatabaseHandler::GetOne($sql, $params);

    }


    public static function ComputeStudentGrade($total)
    {
        $grade = '';
        if($total >= 80)
        {
            return $grade = 'A';
        }
        elseif($total >= 65)
        {
            return $grade = 'B';
        }
        elseif($total >= 55)
        {
            return $grade = 'C';
        }
        elseif($total >= 44)
        {
            return $grade = 'D';
        }
        elseif($total >= 40)
        {
            return $grade = 'E';
        }
        else
        {
            return $grade = 'F';
        }

    }


    public static function ComputeStudentPoint($total)
    {
        $grade = 0;
        if($total >= 80)
        {
            return $grade = 5;
        }
        elseif($total >= 65)
        {
            return $grade = 4;
        }
        elseif($total >= 55)
        {
            return $grade = 3;
        }
        elseif($total >= 44)
        {
            return $grade = 2;
        }
        elseif($total >= 40)
        {
            return $grade = 1;
        }
        else
        {
            return $grade = 0;
        }

    }

    public static function ComputeStudentRemark($total)
    {
        $grade = '';
        if($total >= 80)
        {
            return $grade = 'Excellent';
        }
        elseif($total >= 65)
        {
            return $grade = "Very Good";
        }
        elseif($total >= 55)
        {
            return $grade = "Good";
        }
        elseif($total >= 44)
        {
            return $grade = "Fair";
        }
        elseif($total >= 40)
        {
            return $grade = "Poor";
        }
        else
        {
            return $grade = "Failed";
        }
    }



    public static function GetSecondComment($taverage)
    {
        //GetAllSubjectsForASpecifiedClass
        $grade = '';
        if($taverage >= 80)
        {
            return $grade = 'Excellent performance, please keep it up';
        }
        elseif($taverage >= 65)
        {
            return $grade = "Very Good performance, there is room for more";
        }
        elseif($taverage >= 55)
        {
            return $grade = "Good result, please try harder next time";
        }
        elseif($taverage >= 44)
        {
            return $grade = "A Fair start, work herder next time";
        }
        elseif($taverage >= 40)
        {
            return $grade = "Dont be discouraged, work herder";
        }
        else
        {
            return $grade = "Failed, Dont be discouraged, work herder";
        }

    }





    public static function GetNextTermStartsDate()
    {
        //Build the sql query 
        
        $sql = "SELECT next_term_starts
                FROM admin_settings
                WHERE admin_settings_id = 1";
        //Build the parameter array
        return DatabaseHandler::GetRow($sql);
    }




    public static function GetLessonPlanForSubject($mClassId, $mCurrentTermId, $mSubjectId, $topic)
    {

        //Build the sql query AddBehaviouralObj
        /*
        lesson_plan_id	topic	time_duration	methodology	previous_knowledge	subject_id	term_id	class_id	introduction	student_activities	summary	conclusion	GetLessonPlanForSubject
        */
        $sql = "SELECT COUNT(lesson_plan_id)
                FROM lesson_plan
                WHERE subject_id = :inSubjectId AND
                        term_id = :inTermId AND
                        class_id = :inClassId AND
                        topic = :inTopic";
        //Build the parameter array
        $params = array(
            ':inSubjectId' => $mSubjectId,
            ':inTermId' => $mCurrentTermId,
            ':inClassId' => $mClassId,
            ':inTopic' => $topic
        );
        //eXECUTE THE QUERY AND RETURN THE RESULT
        return DatabaseHandler::GetOne($sql, $params);
        

    }



    //AddLessonPlanFirstPart($_SESSION['mClassId'], $_SESSION['mSubjectId'], $this->mCurrentTermId, $this->mTopic, $this->mDuration, $this->mGender, $this->mMethodology, $this->mPreviouseKnowledge, $this->mTodayDate); GetFromCSV

    public static function AddLessonPlanFirstPart($mClassId, $mSubjectId, $mTermId, $mTopic, $mDuration, $mGender, $mMethodology, $mPreviouseKnowledge, $mTodayDate, $mBehaviouralObj, $mInstructionalMtr, $mInstructionalImages)
    {
        //Build the sql query

        $sql = "SELECT add_lesson_plan_1(:mClassId, :mSubjectId, :mTermId, :mTopic, :mDuration, :mGender, :mMethodology, :mPreviouseKnowledge, :mTodayDate, :mBehaviouralObj, :mInstructionalMtr, :mInstructionalImages)";

        //Build the parameter array 
        $params = array(
            ':mClassId' => $mClassId, 
            ':mSubjectId' => $mSubjectId, 
            ':mTermId' => $mTermId, 
            ':mTopic' => $mTopic, 
            ':mDuration' => $mDuration, 
            ':mGender' => $mGender, 
            ':mMethodology' => $mMethodology, 
            ':mPreviouseKnowledge' => $mPreviouseKnowledge, 
            ':mTodayDate' => $mTodayDate, 
            ':mBehaviouralObj' => $mBehaviouralObj, 
            ':mInstructionalMtr' => $mInstructionalMtr, 
            ':mInstructionalImages' => $mInstructionalImages
        );

        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);

        
    }


    public static function AddPresentationData($lessonplanId, $mIntroduction, $mIntroNote, $mDefinitionNote, $mSubTopic_1, $mSubTopic_1_body, $mSubTopic_2, $mSubTopic_2_body, $mSubTopic_3, $mSubTopic_3_body, $mSummary, $mSummary_body)
    {
        //Builde the sql query
        $sql = "SELECT add_lesson_plan_presentation_data(:lessonplanId, :mIntroduction, :mIntroNote, :mDefinitionNote, :mSubTopic_1, :mSubTopic_1_body, :mSubTopic_2, :mSubTopic_2_body, :mSubTopic_3, :mSubTopic_3_body, :mSummary, :mSummary_body)";
        //Build the parameter array
        $params = array(
            ':lessonplanId' => $lessonplanId,
            ':mIntroduction' => $mIntroduction, 
            ':mIntroNote' => $mIntroNote, 
            ':mDefinitionNote' => $mDefinitionNote, 
            ':mSubTopic_1' => $mSubTopic_1, 
            ':mSubTopic_1_body' => $mSubTopic_1_body, 
            ':mSubTopic_2' => $mSubTopic_2, 
            ':mSubTopic_2_body' => $mSubTopic_2_body, 
            ':mSubTopic_3' => $mSubTopic_3, 
            ':mSubTopic_3_body' => $mSubTopic_3_body, 
            ':mSummary' => $mSummary, 
            ':mSummary_body' => $mSummary_body
        );

        //Execute the query and return the result
        return DatabaseHandler::GetOne($sql, $params);

    }



    /*
        AddLessonPlanSummaryData($id, $this->mStudentsActivities, $this->mEvaluation, $this->mLessonPlanSummary, $this->mConclusion, $this->mAssignment, $this->mReferences, $this->mThisWeeksId); GetLessonNoteForSubject
    */
    public static function AddLessonPlanSummaryData($id, $mStudentsActivities, $mEvaluation, $mLessonPlanSummary, $mConclusion, $mAssignment, $mReferences, $weekId)
    {
        //Build the sql query GetRootClassByClassId
        $sql = "SELECT add_lesson_plan_summary(:id, :mStudentsActivities, :mEvaluation, :mLessonPlanSummary, :mConclusion, :mAssignment, :mReferences, :week_id)";
        //Build the paramater array 
        $params = array(
            ':id' => $id,
            ':mStudentsActivities' => $mStudentsActivities, 
            ':mEvaluation' => $mEvaluation, 
            ':mLessonPlanSummary' => $mLessonPlanSummary, 
            ':mConclusion' => $mConclusion, 
            ':mAssignment' => $mAssignment, 
            ':mReferences' => $mReferences,
            ':week_id' => $weekId
        );
        //Execute the query and return the result
        return DatabaseHandler::GetOne($sql, $params);

    }

// =============================================================
   

    // ===================================================

    public static function SaveAsCsv($arrayItems, $t_foldername, $mTopic, $number)
    {
        $title = $mTopic . $number . '.csv';
        $file = fopen(SITE_ROOT.'/lessonsplannote/'.$t_foldername.DIRECTORY_SEPARATOR.$title, 'wb');

        foreach($arrayItems as $valuesArr)
        {
            fputcsv($file, $valuesArr);
        }
        return fclose($file);
        
    }

    public static function SaveStudentProfileInfoAsCsv($arrayItems)
    {
        $title = 'studentdefault.csv';
        $t_foldername = 'defaultall';
        $file = fopen(SITE_ROOT.'/user/'.$t_foldername.DIRECTORY_SEPARATOR.$title, 'wb');

        foreach($arrayItems as $valuesArr)
        {
            fputcsv($file, $valuesArr);
        }
        return fclose($file);
        
    }

// GetRootClassByClassId

    public static function GetFromCSV($t_foldername, $mTopic, $number)
    {
        $title = $mTopic . $number . '.csv';
        $path = SITE_ROOT.'/lessonsplannote/'.$t_foldername.DIRECTORY_SEPARATOR.$title;


        $file = fopen($path, 'rb');
        $allItems = array();

        while (!feof($file)) 
        {
            $eachItem = fgetcsv($file);
            if ($eachItem === false) continue;
            $allItems[] = $eachItem;
        }
        return $allItems;

    }

    /*
    applicant_get_student_profile_info
        Teachers::RegisterStudentsActiveClass($_SESSION['classId'], $_SESSION['toAddstudentInfo']['applicants_id'], $this->mSchoolSession['session_date'], $this->mCurre
    */
    


    public static function RemoveAFolder($folderPath)
    {
        

        if(is_dir($folderPath))
        {
            $allfiles = scandir($folderPath);
            $threalfiles = array_diff($allfiles, ['.', '..']);
            foreach($threalfiles as $sfiles)
                unlink($folderPath . DIRECTORY_SEPARATOR . $sfiles);

            rmdir($folderPath);
            return true;
        }
        else 
            return false;

    }


    
    public static function RemoveFileInAFolder($folderPath, $arrOfFileNames)
    {
        

        if(is_dir($folderPath))
        {
            
            foreach ($arrOfFileNames as $key => $fileName) {
                if(is_file($folderPath . DIRECTORY_SEPARATOR . $fileName['name']))
                    unlink($folderPath . DIRECTORY_SEPARATOR . $fileName['name']);
                
            }
            return true;
        }
        else 
            return false;

    }

// GetDepartnameUsingClassId
    public static function GetRootClassName($mClassId)
    {
        //Build the sql query 
        $sql = "SELECT class_name
                FROM class_source
                WHERE class_source_id = :class_id";
        //Build the parameter array 
        $params = array(
            ':class_id' => $mClassId
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);

    }


    public static function GetRootClassByClassId($mClassId)
    {
        
        //Build the sql query 
        $sql = "SELECT get_root_class_id(:mClass_id)";
        //Build the parameter array 
        $params = array(
            ':mClass_id' => $mClassId
        );
        //Execute the query and erturn the result 
        return DatabaseHandler::GetOne($sql, $params);

    }


    public static function GetLessonTopics($mSubjectId, $mClassId, $mTermId)
    {
        //Build the sql query 
        $sql = "SELECT lesson_plan_id, topic, time_duration, subject_id, term_id, class_id, sys_date
                FROM    lesson_plan
                WHERE subject_id = :mSubjectId AND 
                term_id = :mTermId AND
                class_id = :mClassId";
        //Build the parameter array 
        $params = array(
            ':mSubjectId' => $mSubjectId,
            ':mClassId' => $mClassId,
            ':mTermId' => $mTermId
        );
        //Execute the query and return the results 
        return DatabaseHandler::GetAll($sql, $params);

    }


    public static function PublishLessonPlan($mLessonPlanId, $statusCode)
    {
        //Build the sql query array
        $sql = "SELECT publish_lesson_plan(:mLessonPlan_id, :statusCode)";
        //Build the parameter array
        $params = array(
            ':mLessonPlan_id' => $mLessonPlanId,
            ':statusCode' => $statusCode
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);


    }

    public static function UnPublishLessonPlan($mLessonPlanId, $statusCode)
    {
        //Build the sql query array SaveStudentProfileInfoAsCsv
        $sql = "SELECT un_publish_lesson_plan(:mLessonPlan_id, :statusCode)";
        //Build the parameter array
        $params = array(
            ':mLessonPlan_id' => $mLessonPlanId,
            ':statusCode' => $statusCode
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetOne($sql, $params);


    }


    public static function GetLessonNoteForSubject($mSubjectId, $mClassId, $mTermId, $mLessonPlanId)
    {
        //Build the sql query RemoveAFolder GetLessonNoteForSubject

        /*
        
        */
        
        $sql = "SELECT lesson_plan_id, topic, time_duration, methodology, previous_knowledge, subject_id, term_id, class_id, introduction, student_activities, summary, evaluation, conclusion, assignment, lpreferences, sys_date, instructionalImages, intronote, topic_define, subtopic1, subtopic1body, subtopic2, subtopic2body, subtopic3, subtopic3body, pre_summary, pre_summarybody, publish
        FROM lesson_plan
        WHERE lesson_plan_id = :mlessonplanId AND
        subject_id = :mSubjectId AND 
        term_id = :mTermId AND 
        class_id = :mClassId";

        //Build the parameter array
        $params = array(
            ':mlessonplanId' => $mLessonPlanId,
            ':mSubjectId' => $mSubjectId,
            ':mTermId' => $mTermId,
            ':mClassId' => $mClassId
        );

        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);

    }



    //THIS CODE UDATS THE LESSON PLAN AFTER TACHER IS DONE EDITING
    public static function UpdateLessonNoteById($mLessonPlanId, $intronote, $mTopicDefine, $mSubTopic1, $mSubTopic1Body, $mSubTopic2, $mSubTopic2Body, $mSubTopic3, $mSubTopic3Body, $mPreSummary, $mPreSummarybody, $mEvaluation)
    {
        //BUILD The sql query 
        $sql = "SELECT Update_Lesson_Note_By_Id(:mLessonPlanId, :intronote, :mTopicDefine, :mSubTopic1, :mSubTopic1Body, :mSubTopic2, :mSubTopic2Body, :mSubTopic3, :mSubTopic3Body, :mPreSummary, :mPreSummarybody, :mEvaluation)";

        //Build the parameter array 
        $params = array(
            ':mLessonPlanId' => $mLessonPlanId, 
            ':intronote' => $intronote, 
            ':mTopicDefine' => $mTopicDefine,
            ':mSubTopic1' => $mSubTopic1,
            ':mSubTopic1Body' => $mSubTopic1Body, 
            ':mSubTopic2' => $mSubTopic2, 
            ':mSubTopic2Body' => $mSubTopic2Body, 
            ':mSubTopic3' => $mSubTopic3, 
            ':mSubTopic3Body' => $mSubTopic3Body, 
            ':mPreSummary' => $mPreSummary, 
            ':mPreSummarybody' => $mPreSummarybody, 
            ':mEvaluation' => $mEvaluation
        );

        //Execute the querry and return the result 
        return DatabaseHandler::GetOne($sql, $params);

    }


    // -------------------TRAINING------------------------GetStudentCaExamsRecords GetEachStudentsWeeklyAttendanceTotal
    // -------------------July 17, 2020------------------------G
    public static function GetServerVersion()
    {
        $sql = "SELECT SQL_CALC_FOUND_ROWS *, FROM applicants ORDER BY firstname LIMIT 4";
        return DatabaseHandler::GetAll($sql);

    }




 
 
 
 
 
    


}

?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               