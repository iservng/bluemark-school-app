<?php
/* Smarty version 3.1.33, created on 2020-09-17 13:59:27
  from 'C:\xampp\htdocs\bluemark\presentation\templates\list_of_lessonplan_topic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f635dafe0fbd8_75334199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ab92586352677447020ffb452c3e34c3d433c0b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\list_of_lessonplan_topic.tpl',
      1 => 1600347561,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f635dafe0fbd8_75334199 (Smarty_Internal_Template $_smarty_tpl) {
?>    <div class="col-lg-12">
        <div class="" style="">
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLessonPlanTopicCount > 0) {?>
            <div class="" style="">
                <h3><b style="color: #337ab7;"> Diary:  <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonPlanTopicCount;?>
  Lesson Plan Topic(s)</b></h3>
                
                <p style="">Select TOPIC(s) to view lesson note</p>
            </div>

            <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                                            </b>  
                        <span>&nbsp;</span>
                                                <span>&nbsp;</span>
                        <span>&nbsp;</span>

                                                                                                                        

                </h4>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
            <input type="hidden" name="classAttendance_action" value="takeTodaysAttendance">
            
        
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                
                               
                                <th>Topic</th>
                                <th>Duration</th>
                                <th>Date</th>
                                                                <th>Lesson Note</th>

                            </tr>
                        </thead>
                        <tbody> 
                        <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mLessonPlanTopics) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>

                            <tr>
                                
                                
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonPlanTopics[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['topic'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonPlanTopics[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['time_duration'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonPlanTopics[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['sys_date'];?>
</td>
                                

                                    

                                    <td>
                                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
">
                                            <input type="hidden" name="viewClassAction" value="View_Lesson_Note">

                                            <input type="hidden" name="ViewLessonNote_csrf" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrfToken;?>
">

                                            <input type="hidden" name="viewlessonplan_Id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonPlanTopics[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['lesson_plan_id'];?>
">

                                            <input type="submit" name="ViewLessonNote" value="View Lesson Note" class="btn btn-outline btn-primary btn-xs">
                                        </form>
                                    </td>

                            
                            </tr> 

                        <?php
}
}
?>    
                        </tbody>
                    </table> 
                </div>  
                
            <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body some csrffirstca -->

            <div class="panel-heading" style="margin-bottom: 60px;">

                                <span>&nbsp;</span>
                <span>&nbsp;</span>

                                </div> 
            <?php } else { ?>

            <div class="panel-heading">
                <div class="panel-heading">
                    <b style="color: red;">No records found for lesson plan subject selected!</b>
                </div>
            </div>

            <?php }?>
        </div>
        <!-- /.panel -->
    </div>
    <?php }
}
