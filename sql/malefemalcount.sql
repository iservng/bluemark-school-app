DELIMITER $$ 
CREATE PROCEDURE count_male_for_specified_class(IN inClassId INT, IN inTerm VARCHAR(100), IN inActiveStatus INT)
BEGIN 
    SELECT count(*)
    FROM active_class ac 
        INNER JOIN applicants a 
            ON ac.student_id = a.applicants_id
    WHERE class_id = inClassId AND term_name = inTerm AND active_status = inActiveStatus AND gender = 1;
END $$
DELIMITER ;



DELIMITER $$ 
CREATE PROCEDURE count_female_for_specified_class(IN inClassId INT, IN inTerm VARCHAR(100), IN inActiveStatus INT)
BEGIN 
    SELECT count(*)
    FROM active_class ac 
        INNER JOIN applicants a 
            ON ac.student_id = a.applicants_id
    WHERE class_id = inClassId AND term_name = inTerm AND active_status = inActiveStatus AND gender = 2;
END $$
DELIMITER ;