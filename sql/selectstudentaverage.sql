

DELIMITER $$
CREATE FUNCTION student_get_average_nry(inStudentId INT, inClassId INT, inTermId INT)
  RETURNS INT
  BEGIN 

    DECLARE return_value INT;
    
    SELECT average
    FROM nry_recordsforaverageandgtotal
    WHERE student_id = inStudentId AND class_id = inClassId AND term_id = inTermId
    INTO return_value;

    IF return_value IS NULL THEN 

        RETURN 0;
    ELSE
        RETURN(return_value);

    END IF;

END $$

DELIMITER ;



DELIMITER $$
CREATE FUNCTION student_get_average_pry(inStudentId INT, inClassId INT, inTermId INT)
  RETURNS INT
  BEGIN 

    DECLARE return_value INT;
    
    SELECT average
    FROM pry_recordsforaverageandgtotal
    WHERE student_id = inStudentId AND class_id = inClassId AND term_id = inTermId
    INTO return_value;

    IF return_value IS NULL THEN 

        RETURN 0;
    ELSE
        RETURN(return_value);

    END IF;

END $$

DELIMITER ;







DELIMITER $$
CREATE FUNCTION student_get_average_sec(inStudentId INT, inClassId INT, inTermId INT)
  RETURNS INT
  BEGIN 

    DECLARE return_value INT;
    
    SELECT average
    FROM sry_recordsforaverageandgtotal
    WHERE student_id = inStudentId AND class_id = inClassId AND term_id = inTermId 
    INTO return_value;

    IF return_value IS NULL THEN 

        RETURN 0;
    ELSE
        RETURN(return_value);

    END IF;

END $$

DELIMITER ;