<?php
/* Smarty version 3.1.33, created on 2020-08-17 17:11:42
  from 'C:\xampp\htdocs\bluemark\presentation\templates\class_members_box.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f3aac3ea17dc5_36507507',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2545c79def7449574836256f653ee2d95a5e68f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\class_members_box.tpl',
      1 => 1597680694,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f3aac3ea17dc5_36507507 (Smarty_Internal_Template $_smarty_tpl) {
?> <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
">
   <div class="col-lg-12">
        <div class="" style="">
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount > 0) {?>
            <div class="" style="">
                <h3><b style="color: #337ab7;">  <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClass_name;?>
 class members [<?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount;?>
]</b></h3>
                
                <p style="">Select student(s) to take attendance and click the take attendance button at the bottom to effect the change</p>
            </div>

            <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                        Male [<?php echo $_smarty_tpl->tpl_vars['obj']->value->mMaleClassCount;?>
] 
                        <span>&nbsp;</span>
                        Female[<?php echo $_smarty_tpl->tpl_vars['obj']->value->mFemaleClassCount;?>
]
                    </b>  
                        <span>&nbsp;</span>
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowAttendanceReportBtn == false && $_smarty_tpl->tpl_vars['obj']->value->mWeekValues) {?>
                            <small>
                            To take attendance input date 
                            </small>
                            <span>&nbsp;</span>
                            <input type="date" name="theDaysDate" style="text-align: center;">
                        <?php }?>
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>

                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowMorningButton && $_smarty_tpl->tpl_vars['obj']->value->mWeekValues) {?> 
                <input type="radio" name="maControl" value="Morning" id="morningattendance">
                            <b style="color: red"><label for="morningattendance"> Morning Attendance </label></b>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowAfternoonButton && $_smarty_tpl->tpl_vars['obj']->value->mWeekValues) {?> 
                            <input type="radio" name="maControl" value="Afternoon" id="afternoonattendance"> <b style="color: red"> <label for="afternoonattendance">Afternoon Attendance </label></b>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsAttendanceOk && $_smarty_tpl->tpl_vars['obj']->value->mWeekValues) {?> 
                            <b style="color: green"> Attendance Marked </b>
                        <?php }?>
                        <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mWeekValues) {?> 
                            <b style="color: green"> Termly Attendance Completed </b>
                        <?php }?>
                        

                </h4>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
            <input type="hidden" name="classAttendance_action" value="takeTodaysAttendance">
            <input type="hidden" name="classAttendance_csrf" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrfToken;?>
">
        
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowAttendanceReportBtn == false && $_smarty_tpl->tpl_vars['obj']->value->mWeekValues) {?>      
                                <th>Mark Attendance</th>
                                <?php }?>
                                <th>Firstname</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Registration Number</th>
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowCaLinks == true) {?>
                                    <th>CA/Exams Records</th>
                                <?php }?>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>

                            <tr>
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowAttendanceReportBtn == false && $_smarty_tpl->tpl_vars['obj']->value->mWeekValues) {?>      
                                    <td>
                                    <input type="checkbox" name="attendanceStudenIds[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['student_id'];?>
" checked>
                                        <select name="attendanceValues[]">
                                            <option value="1">Morning</option>
                                            <option value="1">Afternoon</option>
                                            <option value="0">Absent</option>
                                            <option value="0">Sick</option>
                                            <option value="0">Hollyday</option>
                                        <select>
                                        
                                    </td>
                                <?php }?>

                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['firstname'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['surname'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['email'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['f_phone'];?>
</td>
                                
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['reg_number'];?>
</td>
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowCaLinks == true) {?>
                                     <td>
                                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
">
                                            <input type="hidden" name="ClassAction" value="CaExamsRecords">
                                            <input type="hidden" name="StudentId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['student_id'];?>
">
                                            <input type="hidden" name="ClassId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassId;?>
">
                                            <input type="submit" name="view_record" value="View Records" class="btn btn-outline btn-primary btn-xs">
                                        </form>
                                    </td>
                                <?php }?>
                               
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

                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowAttendanceReportBtn || !$_smarty_tpl->tpl_vars['obj']->value->mWeekValues) {?>
                    <input type="submit" name="ViewAttendanceReport" value="View Attendance Report" class="btn btn-outline btn-primary">
                
                <?php } else { ?>
                
                    <input type="submit" name="attendanceListBtn" value="Take Attendance" class="btn btn-primary">
                <?php }?>
                <span>&nbsp;</span>
                <span>&nbsp;</span>

                    <input type="hidden" name="csrffirstca" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrffirstca;?>
">

                    <input type="submit" name="viewStudentAcademicBtn" value="Show Class Report Table" class="btn btn-outline btn-primary">
            </div> 
            <?php } else { ?>

            <div class="panel-heading">
                <div class="panel-heading">
                    <b style="color: red;">No record found for attendance taking!</b>
                </div>
            </div>

            <?php }?>
        </div>
        <!-- /.panel -->
    </div>
    </form> 
<?php }
}
