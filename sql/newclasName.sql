DELIMITER $$
CREATE PROCEDURE school_add_new_class_name(IN inClassName VARCHAR(100), IN inDepartmentId INT, IN inSourceId INT)
BEGIN 

    INSERT INTO school_classes (class_name, department_id, source_id)
    VALUES (inClassName, inDepartmentId, inSourceId);

END $$
DELIMITER ;
---------------------------------

Full texts	
weekly_total_id
weekvalue_id
student_id
class_id
todaydate_id
todaydate
term_id
weektotal
sys_date
------------------------------------------------------

    SELECT wt.class_id, sc.class_name, wt.term_id, t.name, wt.student_id, a.firstname, a.surname, SUM(wt.weektotal) AS 'eachTotal' 
    FROM weekly_total wt 
        INNER JOIN school_classes sc
            ON wt.class_id = sc.school_classes_id
        INNER JOIN term t
            ON wt.term_id = t.term_id 
        INNER JOIN applicants a
            ON wt.student_id = a.applicants_id
    WHERE wt.term_id = inCurrentTermId AND 
        wt.class_id = inClassId AND 
        wt.weekvalue_id BETWEEN 1 AND 15 AND 
        wt.todaydate BETWEEN inWeekStart AND inWeekStop AND 
        YEAR(wt.todaydate) = inCurrentYear 
    GROUP BY wt.student_id;
    ------------------------------------------
    SELECT class_id, term_id, student_id, SUM(weektotal) AS 'attendaceTotal'
    FROM weekly_total
    WHERE student_id = SUP
            class_id = SUP 
            term_id = SUP
            todaydate BETWEEN SUP AND SUP


