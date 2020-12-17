DELIMITER $$
CREATE PROCEDURE attendance_get_each_students_attTotal(IN inClassId INT, IN inCurrentTermId INT, IN inCurrentYear CHAR(4), IN inWeekStart DATE, IN inWeekStop DATE)

BEGIN

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

END $$

DELIMITER ;

