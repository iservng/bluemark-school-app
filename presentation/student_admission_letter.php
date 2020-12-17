<?php 

require('fpdf/fpdf.php');
//A4 width : 219mm
//Default Margin : 100mm each side
//Writable Horizontal : 209 - (10*2) = 189mm bb

#create and fpdf with its parameter do
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();


#set students passport
// $pdf->Image($this->mPassportUrl, 10, 57);
$pdf->Image($this->mSchoolLogo, 80, 10);

// $pdf->Image($this->mSchoolStamp, 158, 256);

$pdf->SetTextColor(30, 105, 222);
//Set font to arial, bold, 14pt
$pdf->SetFont('Helvetica', 'B', 20);
#create cell (width, height, text, border, end line, [align])
$pdf->Cell(189, 54, '', 0, 1, 'C');
$pdf->Cell(189, 10, SCHOOL_FULL_NAME, 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(65, 76, 93);
$pdf->Cell(189, 5, SCHOOL_ADDRESS, 0, 1, 'C');
$pdf->Cell(189, 5, SCHOOL_PHONE, 0, 1, 'C');

//LINE BREAK
$pdf->Cell(189, 20, '', 0, 1);

//Set font to arial, bold, 14pt
$pdf->SetFont('Helvetica', 'B', 20);
$pdf->Cell(189, 10, 'ADMISSION LETTER', 0, 1, 'C');

//LINE BREAK
$pdf->Cell(189, 6, '', 0, 1);


//Set font to arial, NORMAL, 12pt
$pdf->SetFont('Helvetica', 'B', 12);
$pdf->Cell(189, 10, 'Dear, ' .$mStudent_name, 0, 1);


$pdf->SetFont('Helvetica', '', 12);
//Define default font font size 
$fontSize = 12;
$cellWidth = 189;
$cellHeight = 5;

//Check if the text is overflowing 
if($pdf->GetStringWidth($mMsg_body) < $cellWidth)
    //if not do nothing
    $line = 1;
else 
{
    /* If text is overflowing, then calculate the height need for wrapped cell by 
    1. Splitting the text to fit the cell-width
    2. then count how many lines are needed for the test to fit the cell
    */
    $textLenght = strlen($mMsg_body);
    $errMargin = 10;
    $startChar = 0;
    $maxChar = 0;
    $textArray = array();
    $tmpString = "";

    while ($startChar < $textLenght) { //Loop until end of text
        #Loop until maximun characters reached 
        while ($pdf->GetStringWidth($tmpString) < ($cellWidth - $errMargin) && ($startChar + $maxChar) < $textLenght) {
            # code...
            $maxChar++;
            $tmpString = substr($mMsg_body, $startChar, $maxChar);
        }
        //Move $startChar to next line 
        $startChar = $startChar + $maxChar;
        //Then add it into the array so we know how many lines are needed
        array_push($textArray, $tmpString);
        //Reset $maxChar and $tmpString
        $maxChar = 0;
        $tmpString = "";
    }
    //Get number of line 
    $lines = count($textArray);
}

//Write the cells 
 

    // $pdf->Cell(189, 5, $mMsg_body , 1, 1);
    $xPos = $pdf->GetX();
    $yPos = $pdf->GetY();
    $pdf->MultiCell($cellWidth, $cellHeight, $mMsg_body, 0);
    $pdf->SetXY($xPos + $cellWidth, $yPos);


$pdf->Ln(50);


$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(189, 6, 'Blu Origin', 0, 1, 'L');

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(189, 5, 'Head of Administration', 0, 1, 'L');
$pdf->Cell(189, 5, SCHOOL_FULL_NAME, 0, 1, 'L');

$pdf->Ln(70);

$pdf->SetFont('Arial', '', 6);
$pdf->Cell(189, 3, 'BlueMark is a trade mark of iServng Technologies', 0, 1, 'R');

// -------------------
$pdf->Output();
?>