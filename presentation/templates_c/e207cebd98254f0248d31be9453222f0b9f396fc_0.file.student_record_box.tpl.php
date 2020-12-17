<?php
/* Smarty version 3.1.33, created on 2020-12-06 09:28:51
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_record_box.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fcc9643a734b7_58128696',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e207cebd98254f0248d31be9453222f0b9f396fc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_record_box.tpl',
      1 => 1607243323,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcc9643a734b7_58128696 (Smarty_Internal_Template $_smarty_tpl) {
?> <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
"> 
   <div class="col-lg-12">
        <div class="" style="">
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mGetStudentCaExamsRecordsCount > 0) {?>
            <div class="" style="">
                <h3><b style="color: #337ab7;"> <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTeacherStudentDetail;?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentName;?>
 </a></b></h3>
                
                <b style="color: #333;">Continous Assesment and Exams Records</b>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <hr>
                
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProgressComfirm == true) {?>
                    <h6><b style="color: green;">Personal Progress metrix for <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentName;?>
 has been added successfully</b></h6>
                <?php } else { ?>
                    <span>&nbsp;</span> <span>&nbsp;</span>
                    <a href="#" data-toggle="modal" data-target="#phycomotiveskill" class="btn btn-outline btn-primary">Personal Progress</a>
                <?php }?>
                

                                <span>&nbsp;</span> <span>&nbsp;</span>
                
                <a href="#" data-toggle="modal" data-target="#reportsheet" class="btn btn-outline btn-primary">Get Report Sheet</a>
            </div>

            <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 

                    </b>  
                </h4>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
        
                <div class="table-responsive"> 
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                
                                <th>Subject</th>
                                <th>First CA</th>
                                <th>Second CA</th>
                                <th>Third CA</th>
                                <th>CA Total</th>
                                <th>Exams</th>
                                <th>Total</th>


                            </tr>
                        </thead>
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mGetStudentCaExamsRecordsCount < 1) {?>
                            <p>
                                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListErrMsg;?>

                            </p>
                        <?php } else { ?>
                        <tbody> 
                        
                        <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                            
                                                            
                            <tr>
                            
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>

                                </td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditFirstCa == true) {?>
                                        <input type="text" name="firstCaScores[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['firstca'];?>
" style="width: 60px;">
                                        <input type="hidden" name="subject_id[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['subject_id'];?>
">
                                        <input type="hidden" name="student_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['student_id'];?>
">
                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['firstca'];?>

                                    <?php }?>
                                </td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditSecondCa == true) {?>
                                        <input type="text" name="secondCaScores[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['secondca'];?>
" style="width: 60px;">
                                        <input type="hidden" name="subject_id[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['subject_id'];?>
">
                                        <input type="hidden" name="student_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['student_id'];?>
">

                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['secondca'];?>

                                    <?php }?>
                                    
                                </td>
                                <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditThirdCa == true) {?>
                                        <input type="text" name="thirdCaScores[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['thirdca'];?>
" style="width: 60px;">
                                        <input type="hidden" name="subject_id[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['subject_id'];?>
">
                                        <input type="hidden" name="student_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['student_id'];?>
">
                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['thirdca'];?>

                                    <?php }?>
                                </td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['catotal'];?>

                                </td>
                                <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditExams == true) {?>
                                        <input type="text" name="examScores[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['exams'];?>
" style="width: 60px;">
                                        <input type="hidden" name="subject_id[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['subject_id'];?>
">
                                        <input type="hidden" name="student_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['student_id'];?>
">
                                    <?php } else { ?>
                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['exams'];?>

                                    <?php }?>
                                </td>
                                <td>
                                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamRecord[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['total'];?>

                                </td>
                                
                            </tr> 

                        <?php
}
}
?>
                            
                        </tbody>
                                                <?php }?>
                    </table> 
                </div>  
                
            <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body mShowAttendanceReportBtn-->

            <div class="panel-heading" style="padding-bottom: 60px;">
                                    <hr>
                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" class="btn btn-outline btn-danger btn-xs">Close</a>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditFirstCa == false) {?>
                        <input type="submit" name="EditfirstCa" value="Edit 1 CA" class="btn btn-outline btn-primary btn-xs">
                    <?php } else { ?>
                        <input type="submit" name="FinishEditfirstCa" value="Finish Editing 1 CA" class="btn btn-success">
                    <?php }?>
                    

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditSecondCa == false) {?>
                        <input type="submit" name="EditsecondCa" value="Edit 2 CA" class="btn btn-outline btn-primary btn-xs">
                    <?php } else { ?>
                        <input type="submit" name="FinishEditsecondCa" value="Finish Editing 2 CA" class="btn btn-success">
                    <?php }?>
                    

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditThirdCa == false) {?>
                        <input type="submit" name="EditthirdCa" value="Edit 3 CA" class="btn btn-outline btn-primary btn-xs">
                    <?php } else { ?>
                        <input type="submit" name="FinishEditthirdCa" value="Finish Editing 3 CA" class="btn btn-success">
                    <?php }?>


                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditExams == false) {?>
                        <input type="submit" name="Editexams" value="Edit Exams" class="btn btn-outline btn-primary btn-xs">
                    <?php } else { ?>
                        <input type="submit" name="FinishEditexams" value="Finish Editing Exams" class="btn btn-success">
                    <?php }?>
                    <hr>
                    
            </div> 
            <?php } else { ?>
            <p>
                No record found for the selected student tt
            </p>


            <?php }?>
        </div>
        <!-- /.panel -->
    </div>
</form> 




























<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
"> 
<div class="modal fade" id="phycomotiveskill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3><b style="color: #337ab7;">Phycomotive Skills</b></h3>
                This below reflects how the teacher honestly percievss the child, having spent a couple of months with him or her.
            </div>
            <div class="modal-body">
                        <h6>Please ensure that all judgement are made with clear honest mind.</h6>
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        
                            <tr>
                                <th> <b style="color: #337ab7;">Punctuality</b></th>
                                <td><input type="radio" name="punctuality" value="1">&nbsp;One</td>
                                <td><input type="radio" name="punctuality" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="punctuality" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="punctuality" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="punctuality" value="5">&nbsp;Five</td>
                                
                            </tr>
                            <tr>
                                <th> <b style="color: #337ab7;">Respect</b></th>
                                <td><input type="radio" name="respect" value="1">&nbsp;One</td>
                                <td><input type="radio" name="respect" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="respect" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="respect" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="respect" value="5">&nbsp;Five</td>
                            </tr>

                            <tr>
                                <th> <b style="color: #337ab7;">Politeness</b></th>
                                <td><input type="radio" name="politeness" value="1">&nbsp;One</td>
                                <td><input type="radio" name="politeness" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="politeness" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="politeness" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="politeness" value="5">&nbsp;Five</td>
                               
                            </tr>
                             <tr>
                                <th> <b style="color: #337ab7;">Relationship</b></th>
                                <td><input type="radio" name="relationship" value="1">&nbsp;One</td>
                                <td><input type="radio" name="relationship" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="relationship" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="relationship" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="relationship" value="5">&nbsp;Five</td>
                               
                            </tr>
                             <tr>
                                <th> <b style="color: #337ab7;">Attentiveness</b></th>
                                <td><input type="radio" name="attentiveness" value="1">&nbsp;One</td>
                                <td><input type="radio" name="attentiveness" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="attentiveness" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="attentiveness" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="attentiveness" value="5">&nbsp;Five</td>
                               
                            </tr>
                           
                           <tr>
                                <th> <b style="color: #337ab7;">Obedience</b></th>
                                <td><input type="radio" name="obedience" value="1">&nbsp;One</td>
                                <td><input type="radio" name="obedience" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="obedience" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="obedience" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="obedience" value="5">&nbsp;Five</td>
                                
                            </tr>
                            <tr>
                                <th> <b style="color: #337ab7;">Neatness</b></th>
                                <td><input type="radio" name="neatness" value="1">&nbsp;One</td>
                                <td><input type="radio" name="neatness" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="neatness" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="neatness" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="neatness" value="5">&nbsp;Five</td>
                            </tr>

                            <tr>
                                <th> <b style="color: #337ab7;">Handwriting</b></th>
                                <td><input type="radio" name="handwriting" value="1">&nbsp;One</td>
                                <td><input type="radio" name="handwriting" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="handwriting" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="handwriting" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="handwriting" value="5">&nbsp;Five</td>
                               
                            </tr>
                             <tr>
                                <th> <b style="color: #337ab7;">Fluency</b></th>
                                <td><input type="radio" name="fluency" value="1">&nbsp;One</td>
                                <td><input type="radio" name="fluency" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="fluency" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="fluency" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="fluency" value="5">&nbsp;Five</td>
                               
                            </tr>
                             <tr>
                                <th> <b style="color: #337ab7;">Friendliness</b></th>
                                <td><input type="radio" name="friendliness" value="1">&nbsp;One</td>
                                <td><input type="radio" name="friendliness" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="friendliness" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="friendliness" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="friendliness" value="5">&nbsp;Five</td>
                            
                            </tr>
                    
                    </table>
                </div>
                        <h6>Please select next term start date.</h6>
               <input type="date" name="nextTermStarts" style="width: 100%; border-top: none; border-left: none; border-right: none; outline: none;" required><br>

            <h6>Please Teachers Comment, ensure that all judgement are made with clear and honest .</h6>
               <input type="text" name="teacherComment" style="width: 100%; border-top: none; border-left: none; border-right: none; outline: none;" required>
            </div>

            <input type="hidden" name="csrffirstca" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrffirstca;?>
">

            <div class="modal-footer">
            <input type="submit" name="personalprogress" class="btn btn-primary btn-sm" value="Submit Value">
            </div>
        </div>
    </div>
</div>
</form>































<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" target="_blank"> 
<div class="modal fade" id="reportsheet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2><b style="color: #337ab7;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentName;?>
</b></h2>
                <h5><b style="color: #337ab7;">Student Report Sheet Generator</b></h5>
                            </div>
            <div class="modal-body">
                        
            <h5><b style="color: red;">Do you mean to generate, then print <b style="text-decoration: underline;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentName;?>
's</b> Report Sheet?.</b></h5>
               
                           <input type="hidden" name="csrffirstca" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrffirstca;?>
">
               <input type="hidden" name="pdf_generator" value="generatePDFreport">
                        </div>
            <div class="modal-footer">
                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" class="btn btn-danger btn-sm">Close</a>
                <input type="submit" name="studentReportSheetBtn" class="btn btn-primary btn-sm" value="Yes Continue">
            </div>
        </div>
    </div>
</div>
</form><?php }
}
