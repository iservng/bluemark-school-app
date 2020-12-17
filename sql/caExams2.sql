
DELIMITER $$
CREATE PROCEDURE ca_get_student_caExam_record(IN inStudentIdz INT, IN inClassId INT, IN inCurrentTermId INT, IN inTermStarted DATE, IN inTermEnds DATE, IN inDepartmentName CHAR(32))
BEGIN
    
    IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

        SELECT SUM('total') AS 'grandtotal'
        FROM (
            SELECT (fr.firstca+fr.secondca+fr.thirdca+fr.exams) AS 'total'
            FROM fn_ca_record fr
                INNER JOIN applicants a
                    ON fr.student_id = a.applicants_id
                INNER JOIN subjects s 
                    ON fr.subject_id = s.subjects_id
            WHERE fr.student_id = inStudentIdz AND
            fr.class_id = inClassId AND
            fr.term_id = inCurrentTermId AND
            fr.supDate BETWEEN inTermStarted AND inTermEnds);
        
    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

        SELECT SUM('total') AS 'grandtotal'
        FROM (
            SELECT (sn.firstca+sn.secondca+sn.thirdca+sn.exams) AS 'total'
            FROM sn_ca_record sn
                INNER JOIN applicants a
                    ON sn.student_id = a.applicants_id
                INNER JOIN subjects s 
                    ON sn.subject_id = s.subjects_id
            WHERE sn.student_id = inStudentIdz AND
            sn.class_id = inClassId AND
            sn.term_id = inCurrentTermId AND
            sn.supDate BETWEEN inTermStarted AND inTermEnds
        );

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

        SELECT SUM('total') AS 'grandtotal'
        FROM (
            SELECT (tn.firstca+tn.secondca+tn.thirdca+tn.exams) AS 'total'
            FROM tn_ca_record tn
                INNER JOIN applicants a
                    ON tn.student_id = a.applicants_id
                INNER JOIN subjects s 
                    ON tn.subject_id = s.subjects_id
            WHERE tn.student_id = inStudentIdz AND
            tn.class_id = inClassId AND
            tn.term_id = inCurrentTermId AND
            tn.supDate BETWEEN inTermStarted AND inTermEnds
        );

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

        SELECT SUM('total') AS 'grandtotal'
        FROM (
            SELECT (fp.firstca+fp.secondca+fp.thirdca+fp.exams) AS 'total'
            FROM fp_ca_record fp
                INNER JOIN applicants a
                    ON fp.student_id = a.applicants_id
                INNER JOIN subjects s 
                    ON fp.subject_id = s.subjects_id
            WHERE fp.student_id = inStudentIdz AND
            fp.class_id = inClassId AND
            fp.term_id = inCurrentTermId AND
            fp.supDate BETWEEN inTermStarted AND inTermEnds
        );

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

        SELECT SUM('total') AS 'grandtotal'
        FROM (
            SELECT (sp.firstca+sp.secondca+sp.thirdca+sp.exams) AS 'total'
            FROM sp_ca_record sp
                INNER JOIN applicants a
                    ON sp.student_id = a.applicants_id
                INNER JOIN subjects s 
                    ON sp.subject_id = s.subjects_id
            WHERE sp.student_id = inStudentIdz AND
            sp.class_id = inClassId AND
            sp.term_id = inCurrentTermId AND
            sp.supDate BETWEEN inTermStarted AND inTermEnds
        );

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

        SELECT SUM('total') AS 'grandtotal'
        FROM (
            SELECT (tp.firstca+tp.secondca+tp.thirdca+tp.exams) AS 'total'
            FROM tp_ca_record tp
                INNER JOIN applicants a
                    ON tp.student_id = a.applicants_id
                INNER JOIN subjects s 
                    ON tp.subject_id = s.subjects_id
            WHERE tp.student_id = inStudentIdz AND
            tp.class_id = inClassId AND
            tp.term_id = inCurrentTermId AND
            tp.supDate BETWEEN inTermStarted AND inTermEnds
        );

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

        SELECT SUM('total') AS 'grandtotal'
        FROM (
            SELECT (fs.firstca+fs.secondca+fs.thirdca+fs.exams) AS 'total'
            FROM fs_ca_record fs
                INNER JOIN applicants a
                    ON fs.student_id = a.applicants_id
                INNER JOIN subjects s 
                    ON fs.subject_id = s.subjects_id
            WHERE fs.student_id = inStudentIdz AND
            fs.class_id = inClassId AND
            fs.term_id = inCurrentTermId AND
            fs.supDate BETWEEN inTermStarted AND inTermEnds
        );

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

        SELECT SUM('total') AS 'grandtotal'
        FROM (
            SELECT (ss.firstca+ss.secondca+ss.thirdca+ss.exams) AS 'total'
            FROM ss_ca_record ss
                INNER JOIN applicants a
                    ON ss.student_id = a.applicants_id
                INNER JOIN subjects s 
                    ON ss.subject_id = s.subjects_id
            WHERE ss.student_id = inStudentIdz AND
            ss.class_id = inClassId AND
            ss.term_id = inCurrentTermId AND
            ss.supDate BETWEEN inTermStarted AND inTermEnds
        );

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

        SELECT SUM('total') AS 'grandtotal'
        FROM (
            SELECT (ts.firstca+ts.secondca+ts.thirdca+ts.exams) AS 'total'
        FROM ts_ca_record ts
            INNER JOIN applicants a
                ON ts.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON ts.subject_id = s.subjects_id
        WHERE ts.student_id = inStudentIdz AND
            ts.class_id = inClassId AND
            ts.term_id = inCurrentTermId AND
            ts.supDate BETWEEN inTermStarted AND inTermEnds
        );
        
    END IF;

END $$
DELIMITER ;