DELIMITER $$ 


CREATE FUNCTION Add_behavioural_obj(lessonPlan_Id INT, valuebo VARCHAR(100), instructional_matr VARCHAR(100), instructional_image_name VARCHAR(100))
    RETURNS INT
BEGIN 

    DECLARE last_id_iserted INT;
    
    INSERT INTO lessonplan_fieldchildren (behavioural_obj, instructional_aid, instructional_image, lessonplan_id) VALUES (valuebo, instructional_matr, instructional_image_name, lessonPlan_Id);

    SELECT LAST_INSERT_ID() INTO last_id_iserted;

    RETURN(last_id_iserted);

END $$
DELIMITER ;


-- Delete_uncomplete_lessonPlan_record(:lessonPlan_Id, :mSubjectId)";

