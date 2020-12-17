DELIMITER $$
CREATE PROCEDURE school_get_applicants_waiting_activation(IN inCurDate DATE, IN inActNumber INT)
BEGIN
    SELECT status 
    FROM teachers 
    WHERE YEAR(created_on) = inCurDate AND status = inActNumber;
END $$

DELIMITER ;