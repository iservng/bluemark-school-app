<?php
/* Smarty version 3.1.33, created on 2020-10-06 18:13:55
  from 'C:\xampp\htdocs\bluemark\presentation\templates\add_student_box.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f7ca5d327da20_33898725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5297e0fdd7cec3ab2bb0c9eff50f030a011a79d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\add_student_box.tpl',
      1 => 1590164809,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7ca5d327da20_33898725 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
">
   <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><b>Student Confirmation</b></h4>
                Registration Number: <b><?php echo $_smarty_tpl->tpl_vars['obj']->value->mRegistrationNumber;?>
</b>
            </div>
                        <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                           
                                            <th>Status</th>
                                            <th>Department</th>
                                            <th>Class Assigned</th>
                                            <th>Admission Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentToAddInfo['status'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentToAddInfo['section'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mClass_name;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentToAddInfo['admitted_on'];?>
</td>
                                            
                                        </tr>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartmentId;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartmentName;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassName;?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassId;?>
</td>
                                        </tr>
                                       
                                    </tbody>
                    </table>
                </div>
                            <!-- /.table-responsive -->
            </div>
                        <!-- /.panel-body -->
                        <div class="panel-heading">
                            <b style="color: #1087dd;">Click to complete the addition </b><span>&nbsp;</span><span>&nbsp;</span>
                            <input type="submit" name="confirmStudentBtn" value="Add Student" class="btn btn-primary btn-sm">
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                </form><?php }
}
