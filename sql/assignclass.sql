DELIMITER $$ 
CREATE PROCEDURE school_get_teacher_assigned_classes(IN inTeacherId INT)
BEGIN 
    SELECT tc.class_id, sc.class_name, dt.department_id, dt.name
    FROM teacher_class tc
        INNER JOIN school_classes sc 
            ON tc.class_id = sc.school_classes_id
	    INNER JOIN department dt
	        ON sc.department_id = dt.department_id
    WHERE teacher_id = inTeacherId;
END $$
DELIMITER ;