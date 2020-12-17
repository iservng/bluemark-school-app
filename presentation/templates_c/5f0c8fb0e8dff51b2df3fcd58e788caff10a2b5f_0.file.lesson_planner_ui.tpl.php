<?php
/* Smarty version 3.1.33, created on 2020-10-19 14:23:22
  from 'C:\xampp\htdocs\bluemark\presentation\templates\lesson_planner_ui.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f8d934a40ab66_66375560',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5f0c8fb0e8dff51b2df3fcd58e788caff10a2b5f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\lesson_planner_ui.tpl',
      1 => 1603113760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f8d934a40ab66_66375560 (Smarty_Internal_Template $_smarty_tpl) {
?> <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" enctype="multipart/form-data"> 
   <div class="col-lg-12">
        <div class="" style="">
                    <div class="" style="">
                <h3><b style="color: #337ab7;"> Lesson Plan Template for <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassName_current['class_name'];?>
</b></h3>
                
                <b style="color: #999;"> Use the template format provide, fill in all fields, (the fields are divided into three sections) then click the "Upload Lesson Plan" buttion to complete. </b>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <hr>

                 <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                        SUBJECT :  <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubjectName['name'];?>
 
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
                                <td><b>Topic</b></td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mTopicError) {?>
                                        <b style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mTopicError;?>
</b>
                                    <?php }?>
                                    <input type="text" name="topic" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryTopic;?>
"> 
                                </td>
                            </tr> 
                            <tr>
                                <td><b>Time/Duration</b></td>
                                <td>
                                    <input type="text" name="duration" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;"> 
                                </td>
                            </tr> 

                            <tr>
                                <td><b>Gender</b></td>
                                <td>
                                    
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mGenderError) {?>
                                        <b style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mGenderError;?>
</b>
                                    <?php }?>
                                    <select name="gender" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;"> 
                                        <option value="">- select - </option>
                                        <option value="1">Boys Only </option>
                                        <option value="2">Girls Only  </option>
                                        <option value="3">Mixed </option>
                                    </select>
                                </td>
                            </tr> 

                            <tr>
                                <td><b>Behavioural Objectives</b></td>
                                <td>
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mBehaviouralObjError) {?>
                                    <b style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mBehaviouralObjError;?>
</b>
                                <?php }?>
                                    <input type="text" name="behaviouralObj[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;"> 

                                    <input type="text" name="behaviouralObj[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;"> 

                                    <input type="text" name="behaviouralObj[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;"> 

                                     
                                </td>
                            </tr> 

                            <tr>
                                <td> <b> Instructional Material </b> </td>
                                <td>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mInstructionalImagesError) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mInstructionalImagesError;?>
 </b>
                                    <?php }?>

                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mInstructionalMtrError) {?>
                                        <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mInstructionalMtrError;?>
 </b>
                                    <?php }?>

                                    <input type="text" name="instructionalMtr[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;"> 

                                    <input type="text" name="instructionalMtr[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;"> 

                                    <input type="text" name="instructionalMtr[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;"> 

                                     

                                    <hr>
                                    <p>
                                        <b>Select images to be uploaded </b><span> (You can select up to 3 images only, one big and two small ones.).</span>
                                    </p>

                                    <p>
                                    <b>Instructional Material Image 1 </b><span> </span>
                                    <input type="file" name="instructionalMaterialImages[]" class="btn btn-outline btn-primary">
                                    </p>

                                    <p>
                                    <b>Instructional Material Image 2 </b><span> </span>
                                    <input type="file" name="instructionalMaterialImages[]" class="btn btn-outline btn-primary">
                                    </p>

                                    <p>
                                    <b>Instructional Material Image 3 </b><span> </span>
                                    <input type="file" name="instructionalMaterialImages[]" class="btn btn-outline btn-primary">
                                    </p>

                                    
                                    <hr>
                                    

                                </td>
                            </tr> 


                            <tr>
                                <td> <b> Methodology </b> </td>
                                <td>
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mMethodologyError) {?>
                                    <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mMethodologyError;?>
 </b>              
                                <?php }?>
                                    <input type="text" name="methodology" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;"> 

                                
                                </td>
                            </tr>


                            <tr>
                                <td> <b> Previouse Knowledge </b> </td>
                                <td>
                                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPreviouseKnowledgeError) {?>
                                    <b style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mPreviouseKnowledgeError;?>
 </b>              
                                <?php }?>
                                    <input type="text" name="previouseKnowledge" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;"> 

                                
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
                    <input type="submit" name="LessonPlan_step1" value="Continue Lesson Plan" class="btn btn-outline btn-primary">

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                                        

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
