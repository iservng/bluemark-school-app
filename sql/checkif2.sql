ca_isSubjectCA_done
DELIMITER $$ 
CREATE PROCEDURE ca_is_subjctCa_started(
    IN inClassId INT, 
    IN inCurrentTermId INT, 
    IN inDepartmentName CHAR(32), 
    IN inTermStarted DATE, 
    IN inTermEnds DATE
    )
    BEGIN 
        
        IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM fn_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;
            
        
        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM sn_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM tn_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM fp_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

         
            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM sp_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM tp_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

            SELECT COUNT(firstca) AS 'alreadytotal' 
            FROM fs_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM ss_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSE
 
            SELECT COUNT(firstca) AS 'alreadytotal'
            FROM ts_ca_record 
            WHERE class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        END IF;
        

    END $$
DELIMITER ;
