<?php 

class StringGen 
{

    public static function GenAdmissionNumber($num)
    {
        $result = '';
        $chars = 'AB0CD1EF2GH3IJ4KL5MN6OP7QR8ST9UV1WX2YZ33456789';
        $chars_array = str_split($chars);
        for($i = 0; $i < $num; $i++)
        {
            $randItem = array_rand($chars_array);
            $result .= "".$chars_array[$randItem];
        }
        return $result;
    }

}
?>