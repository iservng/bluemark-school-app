BEGIN 

    DECLARE last_id_iserted INT;
    
    INSERT INTO lesson_plan (topic, time_duration, methodology, previous_knowledge, subject_id, term_id, class_id, date_added, gender) VALUES (mTopic, mDuration, mMethodology, mPreviouseKnowledge, mSubjectId, mCurrentTermId, mClassId, mTodayDate, mGender);

    SELECT LAST_INSERT_ID() INTO last_id_iserted;


    RETURN(last_id_iserted);

END