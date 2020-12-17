DELIMITER $$ 
CREATE FUNCTION add_lesson_plan_presentation_data(inLessonplanId INT, inIntroduction VARCHAR(255), inIntroNote TEXT, inDefinitionNote TEXT, inSubTopic_1 VARCHAR(255), inSubTopic_1_body TEXT, inSubTopic_2 VARCHAR(255), inSubTopic_2_body TEXT, inSubTopic_3 VARCHAR(255), inSubTopic_3_body TEXT, inSummary VARCHAR(255), inSummary_body TEXT)
    RETURNS INT
BEGIN 

    DECLARE last_id_iserted INT;

    UPDATE lesson_plan
    SET introduction = inIntroduction, 
        intronote = inIntroNote, 
        topic_define = inDefinitionNote, 
        subtopic1 = inSubTopic_1, 
        subtopic1body = inSubTopic_1_body, 
        subtopic2 = inSubTopic_2, 
        subtopic2body = inSubTopic_2_body, 
        subtopic3 = inSubTopic_3, 
        subtopic3body = inSubTopic_3_body, 
        pre_summary = inSummary, 
        pre_summarybody = inSummary_body
    WHERE lesson_plan_id = inLessonplanId;


    SELECT 1 INTO last_id_iserted;


    RETURN(last_id_iserted);

END $$
DELIMITER ;



