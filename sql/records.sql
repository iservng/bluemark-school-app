

DELIMITER $$
CREATE PROCEDURE ca_add_studentFirst_ca(IN inStScores INT, IN inStudentIdz INT, IN inSubjectId INT, IN inClassId INT, IN inCurrentTermId INT, IN inDepartmentName CHAR(32), IN inCaType CHAR(32), IN inDate DATE)
BEGIN
    DECLARE justInsertedId INT;
    

    IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' AND inCaType = 'first_ca' THEN

            INSERT INTO fn_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
            SELECT LAST_INSERT_ID() INTO justInsertedId;
            SELECT justInsertedId;
        

    
    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' AND inCaType = 'first_ca' THEN

        INSERT INTO sn_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

    
    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' AND inCaType = 'first_ca' THEN

        INSERT INTO tn_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

  ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' AND inCaType = 'first_ca' THEN

        INSERT INTO fp_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' AND inCaType = 'first_ca' THEN

        INSERT INTO sp_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' AND inCaType = 'first_ca' THEN

        INSERT INTO tp_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' AND inCaType = 'first_ca' THEN

        INSERT INTO fs_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' AND inCaType = 'first_ca' THEN

        INSERT INTO ss_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

ELSE

        INSERT INTO ts_ca_record (firstca, student_id, subject_id, class_id, term_id, supDate) VALUES (inStScores, inStudentIdz, inSubjectId, inClassId, inCurrentTermId, inDate);
        SELECT LAST_INSERT_ID() INTO justInsertedId;
        SELECT justInsertedId;

END IF;

END $$
DELIMITER ;