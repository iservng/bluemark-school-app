
DELIMITER $$
CREATE PROCEDURE ca_update_examFor_one_student(IN inSubjectId INT, IN inFirstCaScore INT, IN inStudentId INT, IN inCurrentTermId INT, IN inDepartmentName CHAR(32), IN inClassId INT, IN inTermStarted DATE, IN inTermEnds DATE)
BEGIN
    IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE fn_ca_record 
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            
        
    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE sn_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

        
        UPDATE tn_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

        
        UPDATE fp_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds; 
            

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

        
        UPDATE sp_ca_record 
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

        
        UPDATE tp_ca_record 
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE fs_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE ss_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

        
        UPDATE ts_ca_record
        SET exams = inFirstCaScore
        WHERE student_id = inStudentId AND
                subject_id = inSubjectId AND
                class_id = inClassId AND
                term_id = inCurrentTermId AND
                supDate BETWEEN inTermStarted AND inTermEnds;
            
        
    END IF;
END $$
DELIMITER ;