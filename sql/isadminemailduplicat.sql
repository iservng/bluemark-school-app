DELIMITER $$ 
CREATE FUNCTION admin_is_admin_email_duplicate(inEmail VARCHAR(255))
  RETURNS INT
BEGIN 
    DECLARE return_value INT;
      SELECT teachers_id
      FROM teachers
      WHERE email = inEmail AND status = 6 AND admin_type = 0 INTO return_value;
    IF return_value IS NULL THEN
        RETURN 0;
    ELSE
        RETURN(return_value);
    END IF;
END $$
DELIMITER ;
