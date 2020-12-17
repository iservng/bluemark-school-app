<?php

class Student
{
    public static function GetProfileContent($student_id)
    {
        //Build the sql query 
        $sql = "SELECT content_id, title, goal, objectives, describe_self, sysdate
                FROM student_profile_content
                WHERE student_id = :stuentId";

        //Build the parameter array 
        $params = array(
            ':stuentId' => $student_id
        );

        //Execute the query and return the result GetProfileContent
        return DatabaseHandler::GetRow($sql, $params);

    }

    public static function RetrieveCurrentClassId($student_id)
    {
        //Build the sql query 
        $sql = "SELECT student_get_current_classid(:student_id)";
        //Build the parameter query 
        $params = array(
            ':student_id' => $student_id
        );
        //Execute the query and return the result
        return DatabaseHandler::GetOne($sql, $params);


    }

    public static function GetRegNo($applicants_id)
    {
        //Build the sql query 
        $sql = "SELECT reg_number
                FROM applicants
                WHERE applicants_id = :applicants_id";
        //Build the parameter array 
        $params = array(
            ':applicants_id' => $applicants_id
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);

    }

    public static function GetStudentDetails($studentId)
    {
        //Build the sql query
        $sql = "CALL applicant_get_student_profile_info(:student_id)";
        //Build the parameter array
        $params = array(
            ':student_id' => $studentId
        );
        //Execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);

    }


    public static function AddStudentCustomProfileInfo($studentId, $mTile, $mGoals, $mObjectives, $mSelf)
    {
        //Build the sql 
        $sql = "SELECT student_add_profile_custom_info(:studentId, :mTile, :mGoals, :mObjectives, :mSelf)";
        //Build the paramter array
        $params = array(
            ':studentId' => $studentId,
            ':mTile' => $mTile, 
            ':mGoals' => $mGoals, 
            ':mObjectives' => $mObjectives, 
            ':mSelf' => $mSelf
        );
        //Execute th the query and return the rsult
        return DatabaseHandler::GetOne($sql, $params);
        

    }



    /*
        GetLesson($this->mTopicId, $this->mCurrentTermId, $_SESSION['rootClassId']);
    */
    public static function GetLesson($mTopicId, $mCurrentTermId, $mRootClassId)
    {
        //BUILD THE SQL QUERY 
        $sql = "SELECT lesson_plan_id, topic, introduction, student_activities, summary, evaluation, conclusion, assignment, lpreferences, sys_date, date_added, instructionalMtr, instructionalImages, intronote, topic_define, subtopic1, subtopic1body, subtopic2, subtopic2body, subtopic3, subtopic3body, pre_summary, pre_summarybody, week_id FROM lesson_plan WHERE lesson_plan_id = :topic_id AND term_id = :term_id AND class_id = :class_id AND publish = 1";

        //Build the parameter array 
        $params = array(
            ':topic_id' => $mTopicId,
            ':term_id' => $mCurrentTermId,
            ':class_id' => $mRootClassId
        );

        //Execute the query and retur the result 
        return DatabaseHandler::GetRow($sql, $params);
        

    }


/*

IsStudentInAvarageRecord($_SESSION['schoolshop_student_id'], $this->mDepartmentName, $this->mCurrentClassId, $this->mCurrentTermId)
*/ 



    public static function IsStudentInAvarageRecord($student_id, $mDepartmentName, $mCurrentClassId, $mCurrentTermId)
    {
        if($mDepartmentName === 'Nursery')
        {
            //Buil the sql query RetrieveCurrentClassId
            $sql = "SELECT student_is_student_in_average_record_nry(:student_id, :mCurrentClassId, :mCurrentTermId)";
            //Build the parameter array 
            $params = array(
                ':student_id' => $student_id,
                ':mCurrentClassId' => $mCurrentClassId,
                ':mCurrentTermId' => $mCurrentTermId
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);

        }
        elseif($mDepartmentName === 'Primary')
        {
            //Buil the sql query RetrieveCurrentClassId
            $sql = "SELECT student_is_student_in_average_record_pry(:student_id, :mCurrentClassId, :mCurrentTermId)";
            //Build the parameter array 
            $params = array(
                ':student_id' => $student_id,
                ':mCurrentClassId' => $mCurrentClassId,
                ':mCurrentTermId' => $mCurrentTermId
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);
        }
        elseif($mDepartmentName === 'Secondary')
        {
            //Buil the sql query RetrieveCurrentClassId
            $sql = "SELECT student_is_student_in_average_record_sec(:student_id, :mCurrentClassId, :mCurrentTermId)";
            //Build the parameter array 
            $params = array(
                ':student_id' => $student_id,
                ':mCurrentClassId' => $mCurrentClassId,
                ':mCurrentTermId' => $mCurrentTermId
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);
        }
        else
            return false;
        
    }



    public static function GetAverage($student_id, $mDepartmentName, $mCurrentClassId, $mCurrentTermId)
    {
        if($mDepartmentName === 'Nursery')
        {

            //Build the sql query 
            $sql = "SELECT student_get_average_nry(:student_id, :mCurrentClassId, :mCurrentTermId)";
            //Build the parameter array 
            $params = array(
                ':student_id' => $student_id,
                ':mCurrentClassId' => $mCurrentClassId,
                ':mCurrentTermId' => $mCurrentTermId
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);

        }
        elseif($mDepartmentName === 'Primary')
        {
            //Build the sql query 
            $sql = "SELECT student_get_average_pry(:student_id, :mCurrentClassId, :mCurrentTermId)";
            //Build the parameter array 
            $params = array(
                ':student_id' => $student_id,
                ':mCurrentClassId' => $mCurrentClassId,
                ':mCurrentTermId' => $mCurrentTermId
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);

        }
        elseif($mDepartmentName === 'Secondary')
        {
            //Build the sql query 
            $sql = "SELECT student_get_average_sec(:student_id, :mCurrentClassId, :mCurrentTermId)";
            //Build the parameter array 
            $params = array(
                ':student_id' => $student_id,
                ':mCurrentClassId' => $mCurrentClassId,
                ':mCurrentTermId' => $mCurrentTermId
            );
            //Execute the query and return the result 
            return DatabaseHandler::GetOne($sql, $params);

        }
        else 
            return false;

    }



    public static function CountRootClass()
    {
        //Build the sql query 
        $sql = "SELECT student_count_root_class()";
        return DatabaseHandler::GetOne($sql);
    }



    public static function GetClassBelongingToRoot($mPromotedClassId)
    {
        //Build the sql query 
        $sql = "SELECT school_classes_id, class_name, department_id, source_id
                FROM school_classes
                WHERE source_id = :promotedClassId";
        //Build the parameter array
        $params = array(
            ':promotedClassId' => $mPromotedClassId
        );
        //Execute the queru and return the results
        return DatabaseHandler::GetAll($sql, $params);

    }



    public static function GetTheNumberOfStudentInThisCLass($mPromotedClassId)
    {
        //Build the sql query 
        $sql = "SELECT COUNT(student_id)
                FROM active_class
                WHERE class_id = :mPromotedClassId";
        //Build the parameter array
        $params = array(
            ':mPromotedClassId' => $mPromotedClassId
        );
        //Execute the query and return the result
        return DatabaseHandler::GetOne($sql, $params);

    }


    public static function IsClassAlreadyUpdated($mPromotedClassId, $studentId)
    {
        //Build the sql query 
        $sql = "SELECT student_is_class_already_updated(:mPromotedClassId, :studentId)";
        //Build the parameter array
        $params = array(
            ':mPromotedClassId' => $mPromotedClassId,
            ':studentId' => $studentId
        );
        //Execue the query ans return the result
        return DatabaseHandler::GetOne($sql, $params);

    }





    public static function GetLessonTopics($mSubjectId, $mCurrentTermId, $mRootClassId)
    {
        //BUILD THE SQL QUERY 
        $sql = "SELECT lesson_plan_id, topic, instructionalImages
                FROM lesson_plan
                WHERE subject_id = :subject_id AND 
                term_id = :term_id AND 
                class_id = :class_id AND
                publish = 1";


        //Build the parameter array 
        $params = array(
            ':subject_id' => $mSubjectId,
            ':term_id' => $mCurrentTermId,
            ':class_id' => $mRootClassId
        );

        //Execute the query and retur the result 
        return DatabaseHandler::GetAll($sql, $params);
    }


    

    public static function GetDefaultFromCsv()
    {
        
        $title = 'studentdefault.csv';
        $t_foldername = 'defaultall';
        $path = SITE_ROOT.'/user/'.$t_foldername.DIRECTORY_SEPARATOR.$title;


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
}
?>