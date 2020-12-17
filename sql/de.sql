BEGIN 

    SELECT week_what, (SUM(mark_m+mark_a)*100)/(COUNT(student_id)*10) AS 'dailypercent' 
    FROM fn_attendance 
	INNER JOIN weeks_and_dates
    	ON fn_attendance.weekvalue_id = weeks_and_dates.weeks_and_dates_id
    WHERE weekValue_id = mWeekValuesid AND class_id = inClassId AND term_id = inCurrentTermId AND todaysDate = inTodaysdate;

END