<?php
/* Smarty version 3.1.33, created on 2020-10-13 16:43:44
  from 'C:\xampp\htdocs\bluemark\presentation\templates\teachers_class.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f85cb30574c46_08559597',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a119f99d1b9979479898510d739f1051d3067b4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\teachers_class.tpl',
      1 => 1602603821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:teacher_admin_header.tpl' => 1,
    'file:envelope_dropdown.tpl' => 1,
    'file:task_dropdown.tpl' => 1,
    'file:bell_dropdown.tpl' => 1,
    'file:user_dropdown.tpl' => 1,
    'file:teacher_main_menu.tpl' => 1,
    'file:teacher_admin_jsfiles.tpl' => 1,
  ),
),false)) {
function content_5f85cb30574c46_08559597 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"teachers_class",'assign'=>"obj"),$_smarty_tpl);?>

<?php $_smarty_tpl->_subTemplateRender("file:teacher_admin_header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">BlueMark v2.0</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <?php $_smarty_tpl->_subTemplateRender("file:envelope_dropdown.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php $_smarty_tpl->_subTemplateRender("file:task_dropdown.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php $_smarty_tpl->_subTemplateRender("file:bell_dropdown.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                <?php $_smarty_tpl->_subTemplateRender("file:user_dropdown.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </ul>



            <div class="navbar-default sidebar" role="navigation">
            <?php $_smarty_tpl->_subTemplateRender("file:teacher_main_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <h2 class="page-header">
                            <?php
$__section_k_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses) ? count($_loop) : max(0, (int) $_loop));
$__section_k_0_total = $__section_k_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_0_total !== 0) {
for ($__section_k_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_0_iteration <= $__section_k_0_total; $__section_k_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
?>
                            <span> <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['list_out_members'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['class_name'];?>
</a> </span><span>&nbsp;</span>
                            <?php
}
}
?>
                        </h2>
                    

                     <b>Date: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mTodayDate4Display;?>
</b>
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>|
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>
                        <b><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCurrentTerm;?>
</b>
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>|
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>
                        <b><?php echo $_smarty_tpl->tpl_vars['obj']->value->mIsWeekName;?>
</b>
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>|
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>
                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mThisWeekStart;?>

                        <span>&nbsp;</span>
                        <span>&nbsp;</span>|
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>
                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mThisWeekEnds;?>

                        
                    <hr>
                    
                    <!-- /.col-lg-12 -->
                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mStudentEmailErrorMsg) {?>
                <div class="col-lg-12" style="text-align: center;">
                    <b class="page-header" style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentEmailErrorMsg;?>
</b>
                </div>
                <?php }?>
                <!-- /.row -->
<?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mContentCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>


            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- ------------------------------Add Student Modal-------------------------------- -->
        <?php
$__section_j_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses) ? count($_loop) : max(0, (int) $_loop));
$__section_j_1_total = $__section_j_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_1_total !== 0) {
for ($__section_j_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_1_iteration <= $__section_j_1_total; $__section_j_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
    <div class="modal fade" id="myAddStudentModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
        <form role="form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Student to <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="whatClassId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                <input type="hidden" name="whatClassName" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
">
                <input type="hidden" name="departmentName" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['name'];?>
">
                <input type="hidden" name="departmentId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['department_id'];?>
">

                <h4 style="color: #4cd3e3;">Student's Email Address is required</h4>

                <div class="form-group">
                    <label>Input Email Address below</label>
                    <input class="form-control" name="addStudentToClassEmail">
                    <p class="help-block">Example johndeo@exanple.com.</p>
                </div>
                                        

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="requestToAddEmail" class="btn btn-primary" value="Confirm Request">
            </div>
            </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div> <!-- Modal -->





<div class="modal fade" id="myDeleteStudentModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Student from <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
</h4>
            </div>
            <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mToTeachersClassPage;?>
">
            <div class="modal-body">
                Are you sure you want to delete a Student from <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>

                <input type="hidden" name="ClassAction" value="DeleteStudent">
                <input type="hidden" name="ClassActionId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="deleteStudentBtn" value="Yes Continue">
                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div> <!-- Modal -->




<div class="modal fade" id="myAddSubjectModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Subjects to <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
</h4>
            </div>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mToTeachersClassPage;?>
">
            <div class="modal-body">
                Please select the subjects to be added to <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>

                <input type="hidden" name="ClassAction" value="AddSubject">
                <input type="hidden" name="Class_name" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
">
                <input type="hidden" name="ClassToAddSubjectId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
            </div>
            <div class="modal-body">
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAllSubjectsCount > 0) {?>
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of all subjects approved by school authority
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Subjects Name</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAllSubjects) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total !== 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="subjectId[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllSubjects[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['subjects_id'];?>
">
                                            </td>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllSubjects[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>

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
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                        <?php } else { ?>
                <b style="color: red;">No subjects record found in our system! <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
"> Got It </a></b>
            <?php }?>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="addSubjectBtn" value="Add Subject">
                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div> <!-- Modal -->




<div class="modal fade" id="myAddFirstCAModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b style="color: #337ab7;">Record first CA in <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
 </b></h4>
            </div>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mToTeachersClassPage;?>
">
            <div class="modal-body">
                Please select subject for which first CA is to be recorded in <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>

                <input type="hidden" name="ClassAction" value="recordFirstCA">
                <input type="hidden" name="csrffirstca" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrffirstca;?>
">
                <input type="hidden" name="ClassActionId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                <input type="hidden" name="CaType" value="first_ca">
            </div>
            <div class="modal-body">
                
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) {?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$__section_m_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) ? count($_loop) : max(0, (int) $_loop));
$__section_m_3_total = $__section_m_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_m'] = new Smarty_Variable(array());
if ($__section_m_3_total !== 0) {
for ($__section_m_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] = 0; $__section_m_3_iteration <= $__section_m_3_total; $__section_m_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']++){
?>
                                <tr>
                                    <td>
                                        <input type="radio" name="subject_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
">
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['name'];?>

                                    </td>
                                </tr>
                            <?php
}
}
?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <b style="color: red;">No subjects found for class. </b>
            <?php }?>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowYesSubmitBtn == true) {?>
                        <input type="submit" class="btn btn-primary" name="addFirstCABtn" value="Yes Submit">
                    <?php }?>
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>




















<div class="modal fade" id="myAddSecondCAModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b style="color: #337ab7;">Record Second CA in <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
 </b></h4>
            </div>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mToTeachersClassPage;?>
">
            <div class="modal-body">
                Please select subject for which second CA is to be recorded in <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>

                <input type="hidden" name="ClassAction" value="recordSecondCA">
                <input type="hidden" name="csrffirstca" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrffirstca;?>
">
                <input type="hidden" name="ClassActionId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                <input type="hidden" name="CaType" value="second_ca">
            </div>
            <div class="modal-body">
                
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) {?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$__section_m_4_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) ? count($_loop) : max(0, (int) $_loop));
$__section_m_4_total = $__section_m_4_loop;
$_smarty_tpl->tpl_vars['__smarty_section_m'] = new Smarty_Variable(array());
if ($__section_m_4_total !== 0) {
for ($__section_m_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] = 0; $__section_m_4_iteration <= $__section_m_4_total; $__section_m_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']++){
?>
                                <tr>
                                    <td>
                                        <input type="radio" name="subject_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
">
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['name'];?>

                                    </td>
                                </tr>
                            <?php
}
}
?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <b style="color: red;">No subjects found for class. </b>
            <?php }?>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowYesSubmitBtn == true) {?>
                        <input type="submit" class="btn btn-primary" name="addSecondCABtn" value="Yes Submit">
                    <?php }?>
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>

















<div class="modal fade" id="myAddThirdCAModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b style="color: #337ab7;">Record Third CA in <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
 </b></h4>
            </div>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mToTeachersClassPage;?>
">
            <div class="modal-body">
                Please select subject for which third CA is to be recorded in <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>

                <input type="hidden" name="ClassAction" value="recordThirdCA">
                <input type="hidden" name="csrffirstca" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrffirstca;?>
">
                <input type="hidden" name="ClassActionId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                <input type="hidden" name="CaType" value="third_ca">
            </div>
            <div class="modal-body">
                
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) {?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$__section_m_5_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) ? count($_loop) : max(0, (int) $_loop));
$__section_m_5_total = $__section_m_5_loop;
$_smarty_tpl->tpl_vars['__smarty_section_m'] = new Smarty_Variable(array());
if ($__section_m_5_total !== 0) {
for ($__section_m_5_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] = 0; $__section_m_5_iteration <= $__section_m_5_total; $__section_m_5_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']++){
?>
                                <tr>
                                    <td>
                                        <input type="radio" name="subject_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
">
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['name'];?>

                                    </td>
                                </tr>
                            <?php
}
}
?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <b style="color: red;">No subjects found for class. </b>
            <?php }?>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowYesSubmitBtn == true) {?>
                        <input type="submit" class="btn btn-primary" name="addThirdCABtn" value="Yes Submit">
                    <?php }?>
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>



























<div class="modal fade" id="myAddExamsCAModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b style="color: #337ab7;">Record Exams Scores in <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
 </b></h4>
            </div>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mToTeachersClassPage;?>
">
            <div class="modal-body">
                Please select subject for which exams scores is to be recorded in <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>

                <input type="hidden" name="ClassAction" value="recordExams">
                <input type="hidden" name="csrffirstca" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrffirstca;?>
">
                <input type="hidden" name="ClassActionId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                <input type="hidden" name="CaType" value="exams">
            </div>
            <div class="modal-body">
                
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) {?>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$__section_m_6_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) ? count($_loop) : max(0, (int) $_loop));
$__section_m_6_total = $__section_m_6_loop;
$_smarty_tpl->tpl_vars['__smarty_section_m'] = new Smarty_Variable(array());
if ($__section_m_6_total !== 0) {
for ($__section_m_6_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] = 0; $__section_m_6_iteration <= $__section_m_6_total; $__section_m_6_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']++){
?>
                                <tr>
                                    <td>
                                        <input type="radio" name="subject_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
">
                                    </td>
                                    <td>
                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['name'];?>

                                    </td>
                                </tr>
                            <?php
}
}
?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <b style="color: red;">No subjects found for class. </b>
            <?php }?>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowYesSubmitBtn == true) {?>
                        <input type="submit" class="btn btn-primary" name="addExamsBtn" value="Yes Submit">
                    <?php }?>
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>






















<div class="modal fade" id="mylessonplan_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="myModalLabel"><b style="color: #337ab7;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
  Lesson Plan</b></h2>
            </div>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mToTeachersClassPage;?>
">
            <div class="modal-body">
                <b>Please select subject for which lesson plan is to be written in <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
</b>
                <hr>
                <input type="hidden" name="ClassAction" value="writelessonplan">
                <input type="hidden" name="csrffirstca" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrffirstca;?>
">
                <input type="hidden" name="ClassActionId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                            </div>
            <div class="modal-body"> 
                
            
 <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) {?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Collapsible Accordion Panel Group
                        </div>

                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">

                                <?php
$__section_m_7_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) ? count($_loop) : max(0, (int) $_loop));
$__section_m_7_total = $__section_m_7_loop;
$_smarty_tpl->tpl_vars['__smarty_section_m'] = new Smarty_Variable(array());
if ($__section_m_7_total !== 0) {
for ($__section_m_7_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] = 0; $__section_m_7_iteration <= $__section_m_7_total; $__section_m_7_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']++){
?>                                                       
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b class="panel-title" style="color: #337ab7;">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['name'];?>
</a>
                                        </b>
                                    </div>
                                    <div id="collapseOne_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Confirm</th>
                                                        <th>Enter the topic below</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" name="subject_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
">
                                                        </td>
                                                        <td>
                                                                                                                        <input type="text" name="confirmatory_topic_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;" placeholder="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['name'];?>
">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php
}
}
?>

                            
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php } else { ?>
                <b style="color: red;">No subjects found for this class. </b>
            <?php }?>


            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowYesSubmitBtn == true) {?>
                        <input type="submit" class="btn btn-primary" name="addLessonPlan" value="Submit to continue with lesson plan">
                    <?php }?>
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>
















<div class="modal fade" id="myViewlessonplan_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="myModalLabel"><b style="color: #337ab7;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
  Lesson Plan Diary</b></h2>
            </div>
            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mToTeachersClassPage;?>
">
            <div class="modal-body">
                <b>Please select subject for which lesson plan is to be viewed in <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
</b>
                <hr>
                <input type="hidden" name="ClassAction" value="viewlessonplan">
                <input type="hidden" name="csrffirstca" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrffirstca;?>
">
                <input type="hidden" name="ClassActionId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                            </div>
            <div class="modal-body"> 
                
            

 <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) {?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Click on the subject to select it, check the button to confirm your selection
                        </div>

                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">

                                <?php
$__section_m_8_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects']) ? count($_loop) : max(0, (int) $_loop));
$__section_m_8_total = $__section_m_8_loop;
$_smarty_tpl->tpl_vars['__smarty_section_m'] = new Smarty_Variable(array());
if ($__section_m_8_total !== 0) {
for ($__section_m_8_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] = 0; $__section_m_8_iteration <= $__section_m_8_total; $__section_m_8_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']++){
?>                                                       
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b class="panel-title" style="color: #337ab7;">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['name'];?>
</a>
                                        </b>
                                    </div>
                                    <div id="collapseTwo_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Confirm Selection</th>
                                                        <th>Subject</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" name="subject_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
">
                                                        </td>
                                                        <td>

                                                                                                                        <input type="text" name="confirmatory_topic_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['subject_id'];?>
" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;" placeholder="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_of_subjects'][(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['name'];?>
" disabled>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <?php
}
}
?>

                            
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php } else { ?>
                <b style="color: red;">No subjects found for this class. </b>
            <?php }?>


            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowYesSubmitBtn == true) {?>
                        <input type="submit" class="btn btn-primary" name="viewLessonNoteTopicTableBtn" value="Submit to view lesson plan">
                    <?php }?>
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>
<?php
}
}
?>
                            

    <?php $_smarty_tpl->_subTemplateRender("file:teacher_admin_jsfiles.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
