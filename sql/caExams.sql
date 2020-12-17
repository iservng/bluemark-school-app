
DELIMITER $$
CREATE PROCEDURE ca_get_student_caExam_record(IN inStudentIdz INT, IN inClassId INT, IN inCurrentTermId INT, IN inTermStarted DATE, IN inTermEnds DATE, IN inDepartmentName CHAR(32))
BEGIN
    
    IF inCurrentTermId = 1 AND inDepartmentName = 'Nursery' THEN

        SELECT fr.fn_ca_record_id, fr.firstca, fr.secondca, fr.thirdca, (fr.firstca+fr.secondca+fr.thirdca) AS 'catotal', fr.exams, (fr.firstca+fr.secondca+fr.thirdca+fr.exams) AS 'total', fr.student_id, a.firstname, a.surname, fr.subject_id, s.name, fr.supDate
        FROM fn_ca_record fr
            INNER JOIN applicants a
                ON fr.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON fr.subject_id = s.subjects_id
        WHERE fr.student_id = inStudentIdz AND
            fr.class_id = inClassId AND
            fr.term_id = inCurrentTermId AND
            fr.supDate BETWEEN inTermStarted AND inTermEnds;
        
    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Nursery' THEN

        SELECT sn.sn_ca_record_id, sn.firstca, sn.secondca, sn.thirdca, (sn.firstca+sn.secondca+sn.thirdca) AS 'catotal', sn.exams, (sn.firstca+sn.secondca+sn.thirdca+sn.exams) AS 'total', sn.student_id, a.firstname, a.surname, sn.subject_id, s.name, sn.supDate
        FROM sn_ca_record sn
            INNER JOIN applicants a
                ON sn.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON sn.subject_id = s.subjects_id
        WHERE sn.student_id = inStudentIdz AND
            sn.class_id = inClassId AND
            sn.term_id = inCurrentTermId AND
            sn.supDate BETWEEN inTermStarted AND inTermEnds; 

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Nursery' THEN

        SELECT tn.tn_ca_record_id, tn.firstca, tn.secondca, tn.thirdca, (tn.firstca+tn.secondca+tn.thirdca) AS 'catotal', tn.exams, (tn.firstca+tn.secondca+tn.thirdca+tn.exams) AS 'total', tn.student_id, a.firstname, a.surname, tn.subject_id, s.name, tn.supDate
        FROM tn_ca_record tn
            INNER JOIN applicants a
                ON tn.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON tn.subject_id = s.subjects_id
        WHERE tn.student_id = inStudentIdz AND
            tn.class_id = inClassId AND
            tn.term_id = inCurrentTermId AND
            tn.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Primary' THEN

        SELECT fp.fp_ca_record_id, fp.firstca, fp.secondca, fp.thirdca, (fp.firstca+fp.secondca+fp.thirdca) AS 'catotal', fp.exams, (fp.firstca+fp.secondca+fp.thirdca+fp.exams) AS 'total', fp.student_id, a.firstname, a.surname, fp.subject_id, s.name, fp.supDate
        FROM fp_ca_record fp
            INNER JOIN applicants a
                ON fp.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON fp.subject_id = s.subjects_id
        WHERE fp.student_id = inStudentIdz AND
            fp.class_id = inClassId AND
            fp.term_id = inCurrentTermId AND
            fp.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Primary' THEN

        SELECT sp.sp_ca_record_id, sp.firstca, sp.secondca, sp.thirdca, (sp.firstca+sp.secondca+sp.thirdca) AS 'catotal', sp.exams, (sp.firstca+sp.secondca+sp.thirdca+sp.exams) AS 'total', sp.student_id, a.firstname, a.surname, sp.subject_id, s.name, sp.supDate
        FROM sp_ca_record sp
            INNER JOIN applicants a
                ON sp.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON sp.subject_id = s.subjects_id
        WHERE sp.student_id = inStudentIdz AND
            sp.class_id = inClassId AND
            sp.term_id = inCurrentTermId AND
            sp.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Primary' THEN

        SELECT tp.tp_ca_record_id, tp.firstca, tp.secondca, tp.thirdca, (tp.firstca+tp.secondca+tp.thirdca) AS 'catotal', tp.exams, (tp.firstca+tp.secondca+tp.thirdca+tp.exams) AS 'total', tp.student_id, a.firstname, a.surname, tp.subject_id, s.name, tp.supDate
        FROM tp_ca_record tp
            INNER JOIN applicants a
                ON tp.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON tp.subject_id = s.subjects_id
        WHERE tp.student_id = inStudentIdz AND
            tp.class_id = inClassId AND
            tp.term_id = inCurrentTermId AND
            tp.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 1 AND inDepartmentName = 'Secondary' THEN

        SELECT fs.fs_ca_record_id, fs.firstca, fs.secondca, fs.thirdca, (fs.firstca+fs.secondca+fs.thirdca) AS 'catotal', fs.exams, (fs.firstca+fs.secondca+fs.thirdca+fs.exams) AS 'total', fs.student_id, a.firstname, a.surname, fs.subject_id, s.name, fs.supDate
        FROM fs_ca_record fs
            INNER JOIN applicants a
                ON fs.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON fs.subject_id = s.subjects_id
        WHERE fs.student_id = inStudentIdz AND
            fs.class_id = inClassId AND
            fs.term_id = inCurrentTermId AND
            fs.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 2 AND inDepartmentName = 'Secondary' THEN

        SELECT ss.ss_ca_record_id, ss.firstca, ss.secondca, ss.thirdca, (ss.firstca+ss.secondca+ss.thirdca) AS 'catotal', ss.exams, (ss.firstca+ss.secondca+ss.thirdca+ss.exams) AS 'total', ss.student_id, a.firstname, a.surname, ss.subject_id, s.name, ss.supDate
        FROM ss_ca_record ss
            INNER JOIN applicants a
                ON ss.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON ss.subject_id = s.subjects_id
        WHERE ss.student_id = inStudentIdz AND
            ss.class_id = inClassId AND
            ss.term_id = inCurrentTermId AND
            ss.supDate BETWEEN inTermStarted AND inTermEnds;

    ELSEIF inCurrentTermId = 3 AND inDepartmentName = 'Secondary' THEN

        SELECT ts.ts_ca_record_id, ts.firstca, ts.secondca, ts.thirdca, (ts.firstca+ts.secondca+ts.thirdca) AS 'catotal', ts.exams, (ts.firstca+ts.secondca+ts.thirdca+ts.exams) AS 'total', ts.student_id, a.firstname, a.surname, ts.subject_id, s.name, ts.supDate
        FROM ts_ca_record ts
            INNER JOIN applicants a
                ON ts.student_id = a.applicants_id
            INNER JOIN subjects s 
                ON ts.subject_id = s.subjects_id
        WHERE ts.student_id = inStudentIdz AND
            ts.class_id = inClassId AND
            ts.term_id = inCurrentTermId AND
            ts.supDate BETWEEN inTermStarted AND inTermEnds;
        
    END IF;

END $$
DELIMITER ;