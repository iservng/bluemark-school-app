DELIMITER $$
CREATE TRIGGER createmyClassArchive
    BEFORE UPDATE ON active_class
    FOR EACH ROW 
    BEGIN

        IF NEW.class_id IS NOT NULL AND OLD.class_id != NEW.class_id THEN

            INSERT INTO myclasses_archive (active_class_id, class_id, student_id, admitted_date, term_name, active_status) VALUES (OLD.active_class_id, OLD.class_id, OLD.student_id, OLD.admitted_date, OLD.term_name, OLD.active_status);

        END IF;

    END $$
DELIMITER ;


	
 




