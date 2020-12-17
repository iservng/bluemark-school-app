<?php
/* Smarty version 3.1.33, created on 2020-08-30 15:35:53
  from 'C:\xampp\htdocs\bluemark\presentation\templates\lesson_planner_ui_3.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f4bb9491948c5_45647898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c47c7040908411e7d2e55aa2c39f442d4cb71334' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\lesson_planner_ui_3.tpl',
      1 => 1598284370,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f4bb9491948c5_45647898 (Smarty_Internal_Template $_smarty_tpl) {
?> <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" enctype="multipart/form-data"> 
   <div class="col-lg-12">
        <div class="" style="">
                    <div class="" style="">
                <h3><b style="color: #337ab7;"> <a href=""> Lesson Plan Template for <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassName_current['class_name'];?>
</a></b></h3>
                
                <b style="color: #999;"> Use the template format provide, fill in all fields, (the fields are divided into three sections) then click the "Upload Lesson Plan" buttion to complete. </b>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <hr>

                 <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                        SUBJECT :  <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubjectName['name'];?>
 | STEP - 3
                    </b>  
                </h4>
            </div>
                
                                                

              

                                <span>&nbsp;</span> <span>&nbsp;</span>
                
                                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                                            </div>

           

            <!-- /.panel-heading -->
            <div class="panel-body">
        
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                
                                <th><b style="color: #337ab7;">Title</b></th>
                                <th><b style="color: #337ab7;">Enter Appropriate Data</b></th>

                            </tr>
                        </thead>
                        <tbody> 
                        
                            <tr>
                                <td><b>Students<br>Activities</b></td>
                                <td>
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mStudentsActivitiesError) {?>
                                    <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsActivitiesError;?>
 </b>              
                                <?php }?>
                                    <textarea name="mStudentsActivities" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="4"> 
                                        
                                    </textarea>
                                </td>
                            </tr> 

                            <tr>
                                <td><b>Evaluation</b></td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEvaluationError) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mEvaluationError;?>
 </b>              
                                    <?php }?>
                                    <textarea name="mEvaluation" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="4"> 
                                        
                                    </textarea>
                                </td>
                            </tr> 

                            <tr>
                                <td><b>Lesson Plan Summary</b></td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLessonPlanSummaryError) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonPlanSummaryError;?>
 </b>              
                                    <?php }?>
                                    <textarea name="mLessonPlanSummary" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="4"> 
                                        
                                    </textarea>
                                </td>
                            </tr> 


                            <tr>
                                <td><b>Conclusion</b></td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mConclusionError) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mConclusionError;?>
 </b>              
                                    <?php }?>
                                    <textarea name="mConclusion" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="4"> 
                                        
                                    </textarea>
                                </td>
                            </tr> 


                            <tr>
                                <td><b>Assignment</b></td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAssignmentError) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignmentError;?>
 </b>              
                                    <?php }?>
                                    <b>Question 1</b>
                                    <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="">
                                    <br><br>

                                    <b>Question 2</b>
                                    <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="">
                                    <br><br>

                                    <b>Question 3</b>
                                    <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="">
                                    <br><br>

                                    <b>Question 4</b>
                                    <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="">
                                    <br><br>
                                </td>
                            </tr> 


                            <tr>
                                <td><b>References</b></td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mReferencesError) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mReferencesError;?>
 </b>              
                                    <?php }?>
                                    <b>References 1</b>
                                    <input type="text" name="mReferences[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="">
                                    <br><br>

                                    <b>References 2</b>
                                    <input type="text" name="mReferences[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="">
                                    <br><br>

                                    <b>References 3</b>
                                    <input type="text" name="mReferences[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="">
                                    <br><br>
                                </td>
                            </tr> 


                        </tbody>
                    </table> 
                </div>  
                
            <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body mShowAttendanceReportBtn-->

            <div class="panel-heading" style="padding-bottom: 60px;">
                                    <hr>
                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" class="btn btn-outline btn-danger">Close</a>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                                        
                    <input type="hidden" name="csrffirstca" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrffirstca;?>
">
                    <input type="submit" name="LessonPlanBack_step2" value="Back to STEP-2" class="btn btn-outline btn-primary">

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                                        <input type="submit" name="completeLessonPlan_step3" value="Complete Lesson Plan (STEP-3)" class="btn btn-outline btn-primary">

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                                        <hr>
                    
            </div> 
                    </div>
        <!-- /.panel -->
    </div>
</form> 

























































<?php }
}
