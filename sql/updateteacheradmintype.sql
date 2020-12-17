DELIMITER $$ 
CREATE FUNCTION admin_set_teacher_admin_type(inTeacherId INT, inAdminType INT)
  RETURNS INT
BEGIN 
    
    UPDATE teachers 
    SET admin_type = inAdminType
    WHERE teachers_id = inTeacherId;
    RETURN 1;

END $$
DELIMITER ;