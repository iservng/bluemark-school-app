


SELECT firstname, surname, SUM(firstca+secondca+thirdca+exams) AS 'grandtotal', AVG(firstca+secondca+thirdca+exams) AS 'average', RANK() OVER (PARTITION BY class_id ORDER BY 'average' DESC) AS 'class_position'  
FROM fn_ca_record
    INNER JOIN applicants
        ON fn_ca_record.student_id = applicants.applicants_id
WHERE class_id = :inClassId AND term_id = :inCurrentTermId AND supDate BETWEEN :inTermStarted AND :inTermEnds
GROUP BY student_id
---------------------------------------------------
SELECT sales_employee, fiscal_year, sale, RANK() 
OVER (PARTITION BY fiscal_year ORDER BY sale DESC) AS 'sales_rank' 
FROM sales
---------------------------------------------------

SELECT firstname, surname grandtotal, average, RANK() 
OVER (PARTITION BY class_id ORDER BY average DESC) AS 'position_rank' 
FROM (
    SELECT firstname, surname, class_id, SUM(firstca+secondca+thirdca+exams) AS 'grandtotal', AVG(firstca+secondca+thirdca+exams) AS 'average'  
                FROM fn_ca_record
                    INNER JOIN applicants
                        ON fn_ca_record.student_id = applicants.applicants_id
                WHERE class_id = :inClassId AND term_id = :inCurrentTermId AND supDate BETWEEN :inTermStarted AND :inTermEnds
                GROUP BY student_id
)
WHERE student_id = :inStudentId;
