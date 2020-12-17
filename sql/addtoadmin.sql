
DELIMITER $$ 
CREATE FUNCTION admin_add_teacher_to_admin(inTeacherId INT)
  RETURNS INT
BEGIN 
    
    INSERT INTO ndioga (teacher_id) VALUES (inTeacherId);
    RETURN  LAST_INSERT_ID();
    

END $$
DELIMITER ;

-- admin_set_teacher_admin_type(:teacher_id, :admin_type)";

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