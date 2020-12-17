<?php 

use Dompdf\Dompdf;
$pdf = new Dompdf();
ob_start();

 ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>

     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="description" content="">
     <meta name="author" content="">

     <title>Employment Letter</title>

     <!-- Bootstrap Core CSS -->
     <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

     <!-- MetisMenu CSS -->
     <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

     <!-- Custom CSS -->
     <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

     <!-- Custom Fonts -->
     <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 </head>

 <body>

     <div class="">
       <div class="">
           <div class="">
               <div class="" style="padding: 20px;">


                   <h1 style="text-align: center; color: #5bc0de;">
                     
                     <?php echo SCHOOL_FULL_NAME; ?>
                   </h1>

                    <h5 style="text-align: center; color: #333; font-family: Tahoma;">
                        <?php echo SCHOOL_ADDRESS; ?>
                    </h5>

                    <h5 style="text-align: center; color: #333; font-family: Tahoma;">
                        <?php echo SCHOOL_PHONE; ?>
                    </h5><br>

                    <p><b><?php echo $today; ?></b></p>
                    <p>Dear <?php echo $this->mName; ?></p>


                   <span>
                    <h3 style="text-align: center;">LETTER OF EMPLOYMENT</h3>
                     Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing, posuere lectus et, fringilla augue. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus adipiscing.
                   </span><br><br>

                   <span>
                     Admission to our program is very competitive and we scrutinize each application carefully. We believe that a stimulating, intellectual discussion between students and faculty is a necessary ingredient of a successful graduate program. We have admitted you because we think that you will be able to make an important contribution to this research dialogue. In turn, we hope that the personal supervision we offer, together with the collegial atmosphere of our graduate students, will combine to make your stay here very rewarding - personally, academically and professionally Bangis combine to make your stay here very rewarding - personally, academically and professionally
                   </span><br><br>

                   <br><br>

                   <br>
                   <span><?php echo HEAD_OF_ADMIN; ?></span><br>
                   <b style="color: #5bc0de;">Head of Admin</b>


               </div>
           </div>
           <!-- /.col-lg-12 -->
       </div>
     </div>


 </body>

 </html>


 <?php


 $html = ob_get_clean();

 if(!is_dir('presentation'.DIRECTORY_SEPARATOR.'employ_letters'. DIRECTORY_SEPARATOR . $t_foldername))
    mkdir('presentation'.DIRECTORY_SEPARATOR.'employ_letters'. DIRECTORY_SEPARATOR . $t_foldername, 0777);

 $_SESSION['file_name'] = 'presentation'.DIRECTORY_SEPARATOR.'employ_letters'. DIRECTORY_SEPARATOR . $t_foldername . DIRECTORY_SEPARATOR . $pdf_file_name;

 $pdf->loadHTML($html);
 $pdf->setPaper("A4", "landscape");

 //Render the HTML oR PDF
 $pdf->render();
 //$output the generated pdf to browser
 // $pdf->stream("result.pdf", Array('Attachment' => 0));
$file = $pdf->output();
file_put_contents($_SESSION['file_name'], $file);

?>