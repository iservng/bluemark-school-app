<?php
class DateWeek
{
    //Stores the visitor's Cart ID UpdateTerm
    private static $_mSchoolStarts;
    public $mGivenDate;

    //Privatr constructor to prevent direct creation of object 
    private function __construct(){}

    public static function CheckMondayDates($mRecievedDate)
    {
        $dateGiven = new DateTime($mRecievedDate);
        $dateGiven_f = $dateGiven->format('l, F d, Y');
        $pos = strpos($dateGiven_f, ',');
        $dayName = substr($dateGiven_f, 0, $pos);
        if($dayName === 'Monday')
            return $dayName;
        else 
            return false;
    }

    public static function IsDateWeekend($dateprovided)
    {

        $dateGiven = new DateTime($dateprovided);
        $dateGiven_f = $dateGiven->format('l, F d, Y');

        $pos = strpos($dateGiven_f, ',');
        $dayName = substr($dateGiven_f, 0, $pos);

        if($dayName === 'Saturday' || $dayName === 'Sunday')
            return true;
        else 
            return false;

    }

    /**
     * This function is used internally here. It add all the 15 week dates for the school period
     */
    public static function AddTermWeeklyAttendanceDates($start, $stop, $weekId)
    {
        //Build the sql query
        $sql = 'CALL school_add_weekly_attendance_date(:start, :stop, :weekId)';
        //Build the paramwter array
        $params = array(
            ':start' => $start,
            ':stop' => $stop,
            ':weekId' => $weekId
        );
        //Execute the query
        DatabaseHandler::Execute($sql, $params);

    }

    public static function AddTermWeeklyGeneralDates($start, $stop, $weekId)
    {
        //Build the sql query
        $sql = 'CALL school_add_weekly_general_date(:start, :stop, :weekId)';
        //Build the paramwter array
        $params = array(
            ':start' => $start,
            ':stop' => $stop,
            ':weekId' => $weekId
        );
        //Execute the query
        DatabaseHandler::Execute($sql, $params);

    }


    public static function UpdateTerm($mCurrentTermName, $Id)
    {
        //Build the sql query 
        $sql = 'CALL school_update_term_name(:term, :id)';
        //Build the parameter array
        $params = array(
            ':term' => $mCurrentTermName,
            ':id' => $Id
        );
        //Execute the query 
        self::UpdateTermInActiveClass($mCurrentTermName);
        DatabaseHandler::Execute($sql, $params);

    }

    private static function UpdateTermInActiveClass($mCurrentTermName)
    {
        $sql = "UPDATE active_class
                SET term_name = :term_name";
        //Build the parameter array
        $params = array(
            ':term_name' => $mCurrentTermName
        );
        //Execute the query 
        DatabaseHandler::Execute($sql, $params);
    }






     public static function IsWeekend($mRecievedDate)
    {
        $dateGiven = new DateTime($mRecievedDate);
        $dateGiven_f = $dateGiven->format('l, F d, Y');
        $pos = strpos($dateGiven_f, ',');
        $dayName = substr($dateGiven_f, 0, $pos);
        if($dayName === 'Sunday' || $dayName === 'Saturday')
            return true;
        else 
            return false;
    }

    //This unction will bring out the date the term starts 
    public static function TermStartStopDate($Id)
    {
        //Build the sql query 
        $sql = 'CALL school_get_term_startstop_date(:id)';
        //Build the parameter array
        $params = array(
            ':id' => $Id
        );
        //execute the query and return the result 
        return DatabaseHandler::GetRow($sql, $params);
    }

    


    public static function CreateWeeklyDates($mCurrentTermStartDate)
    {
        $mAll15WeekDates = array();

        $mAll15WeekDates['week1_start'] = $mCurrentTermStartDate;
        $dateobj = new DateTime($mCurrentTermStartDate);

        $mPlusFourDays = new DateInterval('P4D');

        
        $mWeek1s = $dateobj->add($mPlusFourDays);
        $mAll15WeekDates['week1_stop'] = $mWeek1s->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week1_start'], $mAll15WeekDates['week1_stop'], 1);


        /**mPlusFourDate
         * Second week start 
         */
        $week2_start = new DateInterval('P3D');
        $week2_start_date = $mWeek1s->add($week2_start);
        $mAll15WeekDates['week2_start'] = $week2_start_date->format('Y-m-d');

        $week2_stop = new DateInterval('P4D');
        $week2_stop_date = $week2_start_date->add($week2_stop);
        $mAll15WeekDates['week2_stop'] = $week2_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week2_start'], $mAll15WeekDates['week2_stop'], 2);

        /**
         * third week start 
         */
        $week3_start = new DateInterval('P3D');
        $week3_start_date = $week2_stop_date->add($week3_start);
        $mAll15WeekDates['week3_start'] = $week3_start_date->format('Y-m-d');

        $week3_stop = new DateInterval('P4D');
        $week3_stop_date = $week3_start_date->add($week3_stop);
        $mAll15WeekDates['week3_stop'] = $week3_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week3_start'], $mAll15WeekDates['week3_stop'], 3);

        /**
         * forth week start 
         */
        $week4_start = new DateInterval('P3D');
        $week4_start_date = $week3_stop_date->add($week4_start);
        $mAll15WeekDates['week4_start'] = $week4_start_date->format('Y-m-d');

        $week4_stop = new DateInterval('P4D');
        $week4_stop_date = $week4_start_date->add($week4_stop);
        $mAll15WeekDates['week4_stop'] = $week4_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week4_start'], $mAll15WeekDates['week4_stop'], 4);

        /**
         * fift week start 
         */

        $week5_start = new DateInterval('P3D');
        $week5_start_date = $week4_stop_date->add($week5_start);
        $mAll15WeekDates['week5_start'] = $week5_start_date->format('Y-m-d');

        $week5_stop = new DateInterval('P4D');
        $week5_stop_date = $week5_start_date->add($week5_stop);
        $mAll15WeekDates['week5_stop'] = $week5_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week5_start'], $mAll15WeekDates['week5_stop'], 5);

        /**
         * sixth week start 
         */
        $week6_start = new DateInterval('P3D');
        $week6_start_date = $week5_stop_date->add($week6_start);
        $mAll15WeekDates['week6_start'] = $week6_start_date->format('Y-m-d');

        $week6_stop = new DateInterval('P4D');
        $week6_stop_date = $week6_start_date->add($week6_stop);
        $mAll15WeekDates['week6_stop'] = $week6_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week6_start'], $mAll15WeekDates['week6_stop'], 6);

        /**
         * seventh week start 
         */
        $week7_start = new DateInterval('P3D');
        $week7_start_date = $week6_stop_date->add($week7_start);
        $mAll15WeekDates['week7_start'] = $week7_start_date->format('Y-m-d');

        $week7_stop = new DateInterval('P4D');
        $week7_stop_date = $week7_start_date->add($week7_stop);
        $mAll15WeekDates['week7_stop'] = $week7_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week7_start'], $mAll15WeekDates['week7_stop'], 7);

        /**
         * eighth week start 
         */
        $week8_start = new DateInterval('P3D');
        $week8_start_date = $week7_stop_date->add($week8_start);
        $mAll15WeekDates['week8_start'] = $week8_start_date->format('Y-m-d');

        $week8_stop = new DateInterval('P4D');
        $week8_stop_date = $week8_start_date->add($week8_stop);
        $mAll15WeekDates['week8_stop'] = $week8_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week8_start'], $mAll15WeekDates['week8_stop'], 8);

        /*
         * nineth week start 
         */
        $week9_start = new DateInterval('P3D');
        $week9_start_date = $week8_stop_date->add($week9_start);
        $mAll15WeekDates['week9_start'] = $week9_start_date->format('Y-m-d');

        $week9_stop = new DateInterval('P4D');
        $week9_stop_date = $week9_start_date->add($week9_stop);
        $mAll15WeekDates['week9_stop'] = $week9_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week9_start'], $mAll15WeekDates['week9_stop'], 9);

         /**
         * tenth week start 
         */
        $week10_start = new DateInterval('P3D');
        $week10_start_date = $week9_stop_date->add($week10_start);
        $mAll15WeekDates['week10_start'] = $week10_start_date->format('Y-m-d');

        $week10_stop = new DateInterval('P4D');
        $week10_stop_date = $week10_start_date->add($week10_stop);
        $mAll15WeekDates['week10_stop'] = $week10_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week10_start'], $mAll15WeekDates['week10_stop'], 10);

        /**
         * eleventh week start 
         */
        $week11_start = new DateInterval('P3D');
        $week11_start_date = $week10_stop_date->add($week11_start);
        $mAll15WeekDates['week11_start'] = $week11_start_date->format('Y-m-d');

        $week11_stop = new DateInterval('P4D');
        $week11_stop_date = $week11_start_date->add($week11_stop);
        $mAll15WeekDates['week11_stop'] = $week11_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week11_start'], $mAll15WeekDates['week11_stop'], 11);

        /**
         * Twelveth week start 
         */
        $week12_start = new DateInterval('P3D');
        $week12_start_date = $week11_stop_date->add($week12_start);
        $mAll15WeekDates['week12_start'] = $week12_start_date->format('Y-m-d');

        $week12_stop = new DateInterval('P4D');
        $week12_stop_date = $week12_start_date->add($week12_stop);
        $mAll15WeekDates['week12_stop'] = $week12_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week12_start'], $mAll15WeekDates['week12_stop'], 12);

        /**
         * Thirteenth week start 
         */
        $week13_start = new DateInterval('P3D');
        $week13_start_date = $week12_stop_date->add($week13_start);
        $mAll15WeekDates['week13_start'] = $week13_start_date->format('Y-m-d');

        $week13_stop = new DateInterval('P4D');
        $week13_stop_date = $week13_start_date->add($week13_stop);
        $mAll15WeekDates['week13_stop'] = $week13_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week13_start'], $mAll15WeekDates['week13_stop'], 13);

        /**
         * fourteenth week start 
         */
        $week14_start = new DateInterval('P3D');
        $week14_start_date = $week13_stop_date->add($week14_start);
        $mAll15WeekDates['week14_start'] = $week14_start_date->format('Y-m-d');

        $week14_stop = new DateInterval('P4D');
        $week14_stop_date = $week14_start_date->add($week14_stop);
        $mAll15WeekDates['week14_stop'] = $week14_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week14_start'], $mAll15WeekDates['week14_stop'], 14);

        /**
         * fifteenth week start 
         */
        $week15_start = new DateInterval('P3D');
        $week15_start_date = $week14_stop_date->add($week15_start);
        $mAll15WeekDates['week15_start'] = $week15_start_date->format('Y-m-d');

        $week15_stop = new DateInterval('P4D');
        $week15_stop_date = $week15_start_date->add($week15_stop);
        $mAll15WeekDates['week15_stop'] = $week15_stop_date->format('Y-m-d');

        self::AddTermWeeklyAttendanceDates($mAll15WeekDates['week15_start'], $mAll15WeekDates['week15_stop'], 15);

        return $mAll15WeekDates;
    }
     


    public static function CreateGeneralWeeklyDates($mCurrentTermStartDate)
    {
        /*
        The first step is to collect this Monday based date, then create a sunday off of it 
        */
        $mGeneralweeklyDates = array();
        $monday = new DateTime($mCurrentTermStartDate);
        $period = new DateInterval('P1D');
        $subtract = $monday->sub($period);

        /*It assumed that the below date is or was initialy recieved by the function so
        1. Store it as Start of general week one 
        2. Make an object of it 
        3. add the 7 days period to get the end of general week one
        */
        $mSunday = $subtract->format('Y-m-d');
        $mGeneralweeklyDates['gw1_start'] = $mSunday;
        $mSundayObj = new DateTime($mSunday);
        $period_w1s = new DateInterval('P6D');
        $w1end = $mSundayObj->add($period_w1s);
        $mGeneralweeklyDates['gw1_stop'] = $w1end->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw1_start'], $mGeneralweeklyDates['gw1_stop'], 1);

        /**Week 2 */
        $w2p_start = new DateInterval('P1D');
        $w2p_start_date = $w1end->add($w2p_start);
        $mGeneralweeklyDates['gw2_start'] = $w2p_start_date->format('Y-m-d');

        $w2p_stop = new DateInterval('P6D');
        $w2p_stop_date = $w2p_start_date->add($w2p_stop);
        $mGeneralweeklyDates['gw2_stop'] = $w2p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw2_start'], $mGeneralweeklyDates['gw2_stop'], 2);

        /**Week 3*/
        $w3p_start = new DateInterval('P1D');
        $w3p_start_date = $w2p_stop_date->add($w3p_start);
        $mGeneralweeklyDates['gw3_start'] = $w3p_start_date->format('Y-m-d');

        $w3p_stop = new DateInterval('P6D');
        $w3p_stop_date = $w3p_start_date->add($w3p_stop);
        $mGeneralweeklyDates['gw3_stop'] = $w3p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw3_start'], $mGeneralweeklyDates['gw3_stop'], 3);

        /**Week 4*/
        $w4p_start = new DateInterval('P1D');
        $w4p_start_date = $w3p_stop_date->add($w4p_start);
        $mGeneralweeklyDates['gw4_start'] = $w4p_start_date->format('Y-m-d');

        $w4p_stop = new DateInterval('P6D');
        $w4p_stop_date = $w4p_start_date->add($w4p_stop);
        $mGeneralweeklyDates['gw4_stop'] = $w4p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw4_start'], $mGeneralweeklyDates['gw4_stop'], 4);

        /**Week 5*/
        $w5p_start = new DateInterval('P1D');
        $w5p_start_date = $w4p_stop_date->add($w5p_start);
        $mGeneralweeklyDates['gw5_start'] = $w5p_start_date->format('Y-m-d');

        $w5p_stop = new DateInterval('P6D');
        $w5p_stop_date = $w5p_start_date->add($w5p_stop);
        $mGeneralweeklyDates['gw5_stop'] = $w5p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw5_start'], $mGeneralweeklyDates['gw5_stop'], 5);

        /**Week 6*/
        $w6p_start = new DateInterval('P1D');
        $w6p_start_date = $w5p_stop_date->add($w6p_start);
        $mGeneralweeklyDates['gw6_start'] = $w6p_start_date->format('Y-m-d');

        $w6p_stop = new DateInterval('P6D');
        $w6p_stop_date = $w6p_start_date->add($w6p_stop);
        $mGeneralweeklyDates['gw6_stop'] = $w6p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw6_start'], $mGeneralweeklyDates['gw6_stop'], 6);

         /**Week 7*/
        $w7p_start = new DateInterval('P1D');
        $w7p_start_date = $w6p_stop_date->add($w7p_start);
        $mGeneralweeklyDates['gw7_start'] = $w7p_start_date->format('Y-m-d');

        $w7p_stop = new DateInterval('P6D');
        $w7p_stop_date = $w7p_start_date->add($w7p_stop);
        $mGeneralweeklyDates['gw7_stop'] = $w7p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw7_start'], $mGeneralweeklyDates['gw7_stop'], 7);

         /**Week 8*/
        $w8p_start = new DateInterval('P1D');
        $w8p_start_date = $w7p_stop_date->add($w8p_start);
        $mGeneralweeklyDates['gw8_start'] = $w8p_start_date->format('Y-m-d');

        $w8p_stop = new DateInterval('P6D');
        $w8p_stop_date = $w8p_start_date->add($w8p_stop);
        $mGeneralweeklyDates['gw8_stop'] = $w8p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw8_start'], $mGeneralweeklyDates['gw8_stop'], 8);

         /**Week 9*/
        $w9p_start = new DateInterval('P1D');
        $w9p_start_date = $w8p_stop_date->add($w9p_start);
        $mGeneralweeklyDates['gw9_start'] = $w9p_start_date->format('Y-m-d');

        $w9p_stop = new DateInterval('P6D');
        $w9p_stop_date = $w9p_start_date->add($w9p_stop);
        $mGeneralweeklyDates['gw9_stop'] = $w9p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw9_start'], $mGeneralweeklyDates['gw9_stop'], 9);

        /**Week 10*/
        $w10p_start = new DateInterval('P1D');
        $w10p_start_date = $w9p_stop_date->add($w10p_start);
        $mGeneralweeklyDates['gw10_start'] = $w10p_start_date->format('Y-m-d');

        $w10p_stop = new DateInterval('P6D');
        $w10p_stop_date = $w10p_start_date->add($w10p_stop);
        $mGeneralweeklyDates['gw10_stop'] = $w10p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw10_start'], $mGeneralweeklyDates['gw10_stop'], 10);

        /**Week 11*/
        $w11p_start = new DateInterval('P1D');
        $w11p_start_date = $w10p_stop_date->add($w11p_start);
        $mGeneralweeklyDates['gw11_start'] = $w11p_start_date->format('Y-m-d');

        $w11p_stop = new DateInterval('P6D');
        $w11p_stop_date = $w11p_start_date->add($w11p_stop);
        $mGeneralweeklyDates['gw11_stop'] = $w11p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw11_start'], $mGeneralweeklyDates['gw11_stop'], 11);

        /**Week 12*/
        $w12p_start = new DateInterval('P1D');
        $w12p_start_date = $w11p_stop_date->add($w12p_start);
        $mGeneralweeklyDates['gw12_start'] = $w12p_start_date->format('Y-m-d');

        $w12p_stop = new DateInterval('P6D');
        $w12p_stop_date = $w12p_start_date->add($w12p_stop);
        $mGeneralweeklyDates['gw12_stop'] = $w12p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw12_start'], $mGeneralweeklyDates['gw12_stop'], 12);

        /**Week 13*/
        $w13p_start = new DateInterval('P1D');
        $w13p_start_date = $w12p_stop_date->add($w13p_start);
        $mGeneralweeklyDates['gw13_start'] = $w13p_start_date->format('Y-m-d');

        $w13p_stop = new DateInterval('P6D');
        $w13p_stop_date = $w13p_start_date->add($w13p_stop);
        $mGeneralweeklyDates['gw13_stop'] = $w13p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw13_start'], $mGeneralweeklyDates['gw13_stop'], 13);

        /**Week 14*/
        $w14p_start = new DateInterval('P1D');
        $w14p_start_date = $w13p_stop_date->add($w14p_start);
        $mGeneralweeklyDates['gw14_start'] = $w14p_start_date->format('Y-m-d');

        $w14p_stop = new DateInterval('P6D');
        $w14p_stop_date = $w14p_start_date->add($w14p_stop);
        $mGeneralweeklyDates['gw14_stop'] = $w14p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw14_start'], $mGeneralweeklyDates['gw14_stop'], 14);

        /**Week 15*/
        $w15p_start = new DateInterval('P1D');
        $w15p_start_date = $w14p_stop_date->add($w15p_start);
        $mGeneralweeklyDates['gw15_start'] = $w15p_start_date->format('Y-m-d');

        $w15p_stop = new DateInterval('P6D');
        $w15p_stop_date = $w15p_start_date->add($w15p_stop);
        $mGeneralweeklyDates['gw15_stop'] = $w15p_stop_date->format('Y-m-d');

        self::AddTermWeeklyGeneralDates($mGeneralweeklyDates['gw15_start'], $mGeneralweeklyDates['gw15_stop'], 15);

        return $mGeneralweeklyDates;

    }

}
?>