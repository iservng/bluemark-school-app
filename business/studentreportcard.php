<?php 

class StudentReportCard 
{
    // private $_mFolderPath = 'user'; GetStudentsReportCards.php

    //Class constructor
    private static function GetClassNameFromString($strings)
    {
        $first_pos = strpos($strings, '_');
        $class_str = substr($strings, $first_pos+1);
        $second_pos = strpos($class_str, '_');
        $class_name = substr($class_str, 0, $second_pos);
        return ($class_name);
    }


    private static function GetTermFromString($strings2)
    {
        $term_name = '';
        $firstlast_pos = strrpos($strings2, '_');
        $firts_str = substr($strings2, 0, $firstlast_pos);
        $last_pos = strrpos($firts_str, '_');
        $term = (int)substr($firts_str, $last_pos+1);

        switch ($term) {
            case 1:
                $term_name = 'First Term';
                break;
            case 2:
                $term_name = 'Second Term';
                break;
            case 3:
                $term_name = 'Third Term';
                break;
            default:
                # code...
                break;
        }

        return ($term_name);

    }


    private static function GetReportFiles($path)
    {
        
        $items = scandir($path);
        $files = array();

        foreach ($items as $key => $item) 
        {
            $item_path = $path . DIRECTORY_SEPARATOR . $item;
            if((is_file($item_path)) && (substr_compare($item, 'report.pdf', strrpos($item, '_')+1) === 0))
            {
                $files[] = $item;
            }
        }
        return $files;
    }


    public static function GetStudentsReportCards($path, $email)
    {
        $pos = strpos($email, '@');
        $userfolder = substr($email, 0, $pos) . '_folder';

        $report_files = self::GetReportFiles($path);

        $mReportArr = array();
        $files_Arr = array();
        $i = 0;
        while ($i < count($report_files)) 
        {

            # code... 
            $mReportArr[] = Link::Build('student_report_cards' . DIRECTORY_SEPARATOR .$userfolder.DIRECTORY_SEPARATOR. $report_files[$i]);
            $mReportArr[] = self::GetTermFromString($report_files[$i]);
            $mReportArr[] = self::GetClassNameFromString($report_files[$i]);

            $files_Arr[] = $mReportArr;
            $mReportArr = array();
            $i++;

        }

        return ($files_Arr);

    }


}




?>