<?php
/* Smarty version 3.1.33, created on 2020-08-24 13:41:34
  from 'C:\xampp\htdocs\bluemark\presentation\templates\lesson_planner_ui_2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f43b57e181119_78597607',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '81cdd6a6186daab8c81e6450ace7f5230bcf12d0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\lesson_planner_ui_2.tpl',
      1 => 1597939878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f43b57e181119_78597607 (Smarty_Internal_Template $_smarty_tpl) {
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
 | STEP - 2
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLP2FErrors) {?>
                            <b style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLP2FErrors;?>
</b>
                        <?php }?>
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
                                <td><b>Introduction</b></td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIntroductionError) {?>
                                        <b style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mIntroductionError;?>
</b>
                                    <?php }?>
                                    <input type="text" name="mIntroduction" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value=""> 
                                </td>
                            </tr> 


                            <tr>
                                <td><b>Presentation<br>Step-1<br>Topic Intro Note</b></td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIntroNoteError) {?>
                                        <b style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mIntroNoteError;?>
</b>
                                    <?php }?>
                                    <textarea name="mIntroNote" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="6"> 
                                        
                                    </textarea>
                                </td>
                            </tr> 

                            <tr>
                                <td><b>Presentation<br>Step-2 <br>Topic <br>Definition Note</b></td>
                                <td>
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mDefinitionNoteError) {?>
                                        <b style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDefinitionNoteError;?>
</b>
                                    <?php }?>
                                    <textarea name="mDefinitionNote" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="20"> 
                                        
                                    </textarea>
                                </td>
                            </tr> 

                            <tr>
                                <td><b>Sub-Topic 1</b></td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSubTopic_1Error) {?>
                                        <b style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubTopic_1Error;?>
</b>
                                    <?php }?>
                                    <input type="text" name="mSubTopic_1" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;"> 
                                     
                                </td>
                            </tr> 

                            <tr>
                                <td> <b> Sub-Topic-1 <br>Body </b> </td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSubTopic_1_bodyError) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubTopic_1_bodyError;?>
 </b>
                                    <?php }?>
                                    
                                    <textarea name="mSubTopic_1_body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="20"> 
                                        
                                    </textarea>
                                </td>
                            </tr> 


                            <tr>
                                <td> <b> Sub-Topic 2 </b> </td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSubTopic_2Error) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubTopic_2Error;?>
 </b>              
                                    <?php }?>
                                    <input type="text" name="mSubTopic_2" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;"> 
                                </td>
                            </tr>


                            <tr>
                                <td> <b> Sub-Topic-2 <br>Body </b> </td>
                                <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSubTopic_2_bodyError) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubTopic_2_bodyError;?>
 </b>              
                                    <?php }?>
                                        <textarea name="mSubTopic_2_body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="20"> 
                                        
                                        </textarea>

                                </td>
                            </tr>
                                                        <tr>
                                <td> <b> Sub-Topic 3 </b> </td>
                                <td>
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSubTopic_3Error) {?>
                                    <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubTopic_3Error;?>
 </b>              
                                <?php }?>
                                    <input type="text" name="mSubTopic_3" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;"> 

                                </td>
                            </tr>


                            <tr>
                                <td> <b> Sub-Topic-3 <br>Body </b> </td>
                                <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSubTopic_3_bodyError) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubTopic_3_bodyError;?>
 </b>              
                                    <?php }?>
                                        <textarea name="mSubTopic_3_body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="20"> 
                                        
                                    </textarea> 
                                
                                </td>
                            </tr>

                                                        <tr>
                                <td> <b> Summary<br>
                                Sub-Topic 4 </b> </td>
                                <td>
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSummaryError) {?>
                                    <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSummaryError;?>
 </b>              
                                <?php }?>
                                    <input type="text" name="mSummary" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;"> 

                                
                                </td>
                            </tr>


                            <tr>
                                <td> <b> Summary
                                <br> Sub-Topic-4 
                                <br>Body </b> </td>
                                <td>
                                                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSummary_bodyError) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSummary_bodyError;?>
 </b>              
                                    <?php }?>
                                        <textarea name="mSummary_body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="20"> 
                                        
                                    </textarea> 
                                
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
                    <input type="submit" name="LessonPlanBack_step1" value="Back to STEP-1" class="btn btn-outline btn-primary">

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                                        <input type="submit" name="LessonPlan_step2" value="Continue Lesson Plan (STEP-2)" class="btn btn-outline btn-primary">

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
