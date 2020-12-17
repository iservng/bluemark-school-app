
DELIMITER $$ 
CREATE PROCEDURE ca_isSubject3CA_done(IN inSubjectId INT, IN inClassId INT, IN inCurrentTermId INT, IN inDepartmentName CHAR(32), IN inTermStarted DATE, IN inTermEnds DATE)
    BEGIN 
        
        IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM fn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;
            
        
        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM sn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM tn_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM fp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

         
            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM sp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM tp_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

            SELECT SUM(thirdca) AS 'alreadytotal' 
            FROM fs_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM ss_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

 
            SELECT SUM(thirdca) AS 'alreadytotal'
            FROM ts_ca_record 
            WHERE subject_id = inSubjectId AND class_id = inClassId AND term_id = inCurrentTermId AND supDate BETWEEN inTermStarted AND inTermEnds;

        END IF;
        

    END $$
DELIMITER ;
