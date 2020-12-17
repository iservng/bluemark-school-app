
DELIMITER $$ 
CREATE FUNCTION add_lesson_plan_summary(inLessonPlanId INT, inStudentsActivities VARCHAR(255), inEvaluation VARCHAR(255), inLessonPlanSummary VARCHAR(255), inConclusion VARCHAR(255), inAssignment TEXT, inReferences VARCHAR(255), inWeekId INT)
  RETURNS INT
BEGIN 

    DECLARE last_id_iserted INT;
    
    UPDATE lesson_plan
    SET student_activities = inStudentsActivities, 
        evaluation = inEvaluation, 
        summary = inLessonPlanSummary, 
        conclusion = inConclusion, 
        assignment = inAssignment, 
        lpreferences = inReferences,
        week_id = inWeekId
    WHERE lesson_plan_id = inLessonplanId;


    SELECT 1 INTO last_id_iserted;

    RETURN(last_id_iserted);

END $$
DELIMITER ;










