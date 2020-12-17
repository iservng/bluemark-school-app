DELIMITER $$
CREATE PROCEDURE student_get_pin_info(IN inPin VARCHAR(100))
BEGIN 
    SELECT pin_id, pin 
    FROM admissionpin 
    WHERE pin = inPin;

END $$
DELIMITER ;