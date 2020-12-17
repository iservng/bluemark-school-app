<?php 

// require('fpdf/fpdf.php');
//A4 width : 219mm
//Default Margin : 100mm each side
//Writable Horizontal : 209 - (10*2) = 189mm bb

#create and fpdf with its parameter do
$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();


#set students passport
$pdf->Image($this->mPassportUrl, 10, 57);
$pdf->Image($this->mSchoolLogo, 80, 10);

$pdf->Image($this->mSchoolStamp, 158, 256);

$pdf->SetTextColor(30, 105, 222);
//Set font to arial, bold, 14pt
$pdf->SetFont('Helvetica', 'B', 20);
#create cell (width, height, text, border, end line, [align])
$pdf->Cell(189, 52, '', 0, 1, 'C');
$pdf->Cell(189, 10, SCHOOL_FULL_NAME, 0, 1, 'C');

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetTextColor(65, 76, 93);
$pdf->Cell(189, 5, SCHOOL_ADDRESS, 0, 1, 'C');
$pdf->Cell(189, 5, SCHOOL_PHONE, 0, 1, 'C');

//LINE BREAK
$pdf->Cell(189, 3, '', 0, 1);

#THE CONTENT STARTING FROM ===>> NAME, gender and date
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(86, 5, 'NAME:  '.$this->mStudentReportName, 0, 0);
$pdf->Cell(34, 5, 'SEX:  ' . $this->mGender, 0, 0, 'R');
$pdf->Cell(69, 5, 'DATE:  ' . $this->mTodayDate4Report, 0, 1, 'R');

$pdf->SetDrawColor(97, 104, 114);
// $pdf->Line(10, 91, 199, 91);

#THE CONTENT STARTING FROM ===>> class, year term and number in class/.$this->mClassName_current['class_name']
$pdf->Cell(47, 6, 'CLASS: '. $this->mClassName_current['class_name'], 0, 0);
$pdf->Cell(47, 6, 'YEAR:  ' . $this->current_year, 0, 0, 'C');
$pdf->Cell(47, 6, 'TERM:  ' . $this->mCurrentTerm, 0, 0, 'C');
$pdf->Cell(47, 6, 'No. IN CLASS: ' . $this->mNumberOfStudents, 0, 1, 'C');


#THE CONTENT STARTING FROM ===>> class, year term and number in class/
$pdf->Cell(58, 6, 'CLASS POSITION: ' . $this->mStudentGTAnPosition['position'], 0, 0);
$pdf->Cell(68, 6, 'No OF TIMES SCHOOL OPENED: ' . $this->mNumberOfTimeSchoolWasOpen, 0, 0);
$pdf->Cell(63, 6, 'No OF TIMES PRESENT:  ' . $this->mTotalNumberOfAttendance, 0, 1, 'C');
$pdf->Cell(126, 6, 'NEXT TERM BEGINS:  ' . $this->mNextTermStartsDate, 0, 0);
$pdf->Cell(63, 6, 'POINTS SCORED:  ' . $this->mPointScored , 0, 1,);


#LINE SPACING
$pdf->Cell(189, 4, '', 0, 1);


$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(210, 210, 210);
#THE CONTENT STARTING FROM ===>> Subject/
$pdf->Cell(50, 7, 'SUBJECTS ', 1, 0, '', true);
$pdf->Cell(13, 7, '1CA ', 1, 0, 'C', true);
$pdf->Cell(13, 7, '2CA ', 1, 0, 'C', true);
$pdf->Cell(13, 7, '3CA ', 1, 0, 'C', true);
$pdf->Cell(13, 7, 'CA.T ', 1, 0, 'C', true);
$pdf->Cell(16, 7, 'EXAMS ', 1, 0, 'C', true);
$pdf->Cell(15, 7, 'TOTAL ', 1, 0, 'C', true);
$pdf->Cell(17, 7, 'GRADE ', 1, 0, 'C', true);
$pdf->Cell(15, 7, 'POINT ', 1, 0, 'C', true);
$pdf->Cell(24, 7, 'REMARK ', 1, 1, 'C', true);




#MAIN SUBEJECT AND RECORDS 
$pdf->SetDrawColor(182, 183, 184);
$pdf->SetFont('Arial', '', 10);
$pdf->SetFillColor(255, 255, 255);
foreach ($this->mRecord as $key => $value) {
    # code...
    $pdf->Cell(50, 6, $value['name'], 1, 0);
    $pdf->Cell(13, 6, $value['firstca'], 1, 0, 'C');
    $pdf->Cell(13, 6, $value['secondca'], 1, 0, 'C');
    $pdf->Cell(13, 6, $value['thirdca'], 1, 0, 'C');
    $pdf->Cell(13, 6, $value['catotal'], 1, 0, 'C');
    $pdf->Cell(16, 6, $value['exams'], 1, 0, 'C');
    $pdf->Cell(15, 6, $value['total'], 1, 0, 'C');
    $pdf->Cell(17, 6, $value['grade'], 1, 0, 'C');
    $pdf->Cell(15, 6, $value['points'], 1, 0, 'C');
    $pdf->Cell(24, 6, $value['remark'], 1, 1);
}


//THE GRAND TOTAL AND AVERAGE 
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(165, 6, 'Grand Total', 0, 0, 'R');

$pdf->SetFillColor(205, 205, 205);
$pdf->Cell(24, 6, $this->mStudentGTAnPosition['gtotal'], 1, 1, 'C', true);

$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(165, 6, 'Average', 0, 0, 'R');

$pdf->SetFillColor(205, 205, 205);
$pdf->Cell(24, 6, $this->mStudentGTAnPosition['average'], 1, 1, 'C', true);


//PERSONAL PROGRESS ASSESSMENT
//LINE BREAK
$pdf->SetFont('Arial', 'B', 11);
// $pdf->Cell(189, 2, '', 0, 1);
$pdf->SetTextColor(100, 100, 100);
$pdf->Cell(189, 6, 'PERSONAL PROGRESS ASSESSMENT', 0, 1);

$pdf->SetFont('Courier', 'B', 11);
// $pdf->SetTextColor(65, 76, 93);

// teachersComment
// sys_date

//CONTENT OF PERSONAL PROGRESS ASSESSMENT = LINE 1
$pdf->Cell(80, 5, 'Punctuality', 1, 0);
$pdf->Cell(14, 5, $this->mStudentProgressMatrix['punctuality'], 1, 0, 'C');

$pdf->Cell(81, 5, 'Respect ', 1, 0);
$pdf->Cell(14, 5, $this->mStudentProgressMatrix['respect'], 1, 1, 'C');

//CONTENT OF PERSONAL PROGRESS ASSESSMENT = LINE 2
$pdf->Cell(80, 5, 'Politeness', 1, 0);
$pdf->Cell(14, 5, $this->mStudentProgressMatrix['politeness'], 1, 0, 'C');

$pdf->Cell(81, 5, 'Relationship ', 1, 0);
$pdf->Cell(14, 5, $this->mStudentProgressMatrix['relationship'], 1, 1, 'C');

//CONTENT OF PERSONAL PROGRESS ASSESSMENT = LINE 3
$pdf->Cell(80, 5, 'Attentiveness', 1, 0);
$pdf->Cell(14, 5, $this->mStudentProgressMatrix['attentiveness'], 1, 0, 'C');

$pdf->Cell(81, 5, 'Obedience ', 1, 0);
$pdf->Cell(14, 5, $this->mStudentProgressMatrix['obedience'], 1, 1, 'C');

//CONTENT OF PERSONAL PROGRESS ASSESSMENT = LINE 4
$pdf->Cell(80, 5, 'Neatness', 1, 0);
$pdf->Cell(14, 5, $this->mStudentProgressMatrix['neatness'], 1, 0, 'C');

$pdf->Cell(81, 5, 'Handwriting ', 1, 0);
$pdf->Cell(14, 5, $this->mStudentProgressMatrix['handwriting'], 1, 1, 'C');

//CONTENT OF PERSONAL PROGRESS ASSESSMENT = LINE 5
$pdf->Cell(80, 5, 'Fluency', 1, 0);
$pdf->Cell(14, 5, $this->mStudentProgressMatrix['fluency'], 1, 0, 'C');

$pdf->Cell(81, 5, 'Friendliness ', 1, 0);
$pdf->Cell(14, 5, $this->mStudentProgressMatrix['friendliness'], 1, 1, 'C');
// ---------------------------------------------

// line space
$pdf->Cell(189, 4, '', 0, 1);
//total number of subjects passed
$pdf->SetFont('Courier', 'B', 11);
$pdf->Cell(165, 6, 'Total Number of Subjects Passed', 0, 0, 'R');

$pdf->SetFillColor(205, 205, 205);
$pdf->Cell(24, 6, $this->mTotalSubjectsPassed, 1, 1, 'C', true);
// ------------------------------------------------------------------

// TEACHERS COMMENT
$pdf->Cell(189, 4, '', 0, 1);

$pdf->SetFont('Arial', 'B', 11);
// $pdf->Cell(189, 2, '', 0, 1);
$pdf->SetTextColor(100, 100, 100);
$pdf->Cell(50, 6, 'TEACHER\'S COMMENT: ', 0, 0);

$pdf->Cell(139, 6, $this->mStudentProgressMatrix['teachersComment'], 0, 1);


$pdf->Cell(60, 6, $this->mTitleOf2Comment.':', 0, 0);
$pdf->Cell(129, 6, $this->mSecondComment, 0, 1);

$pdf->SetFont('Arial', '', 6);
$pdf->Cell(189, 3, 'BlueMark is a trade mark of iServng Technologies', 0, 1, 'R');

// -------------------
$pdf->Output();
?>