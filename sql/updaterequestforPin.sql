
DELIMITER $$
CREATE FUNCTION roadstar_approve_request_to_print(inRequestId INT)
  RETURNS INT
BEGIN 

    DECLARE return_value INT;
    
    UPDATE requested
    SET approve = 1
    WHERE requested_id = inRequestId;

    SELECT 1 INTO return_value;

    RETURN(return_value);

END $$
DELIMITER ;