DELIMITER $$ 
CREATE FUNCTION add_lesson_plan_1(mClassId INT, mSubjectId INT, mCurrentTermId INT, mTopic VARCHAR(70), mDuration VARCHAR(70), mGender VARCHAR(70), mMethodology VARCHAR(70), mPreviouseKnowledge VARCHAR(70), mTodayDate DATE, mBehaviouralObj VARCHAR(200), mInstructionalMtr VARCHAR(200), mInstructionalImages VARCHAR(200))
    RETURNS INT
BEGIN 

    DECLARE last_id_iserted INT;
    
    INSERT INTO lesson_plan (topic, time_duration, methodology, previous_knowledge, subject_id, term_id, class_id, date_added, gender, behaviouralObj, instructionalMtr, 	 instructionalImages) VALUES (mTopic, mDuration, mMethodology, mPreviouseKnowledge, mSubjectId, mCurrentTermId, mClassId, mTodayDate, mGender, mBehaviouralObj, mInstructionalMtr, mInstructionalImages);

    SELECT LAST_INSERT_ID() INTO last_id_iserted;


    RETURN(last_id_iserted);

END $$
DELIMITER ;
----------------------------------------------------------------------
