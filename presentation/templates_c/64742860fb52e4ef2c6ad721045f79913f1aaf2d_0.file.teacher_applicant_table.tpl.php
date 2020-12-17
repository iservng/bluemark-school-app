<?php
/* Smarty version 3.1.33, created on 2020-03-30 17:42:54
  from 'C:\xampp\htdocs\bluemark\presentation\templates\teacher_applicant_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e82218e920573_48292947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64742860fb52e4ef2c6ad721045f79913f1aaf2d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\teacher_applicant_table.tpl',
      1 => 1585586547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e82218e920573_48292947 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
?>
 <?php echo smarty_function_load_presentation_object(array('filename'=>"applicants_data",'assign'=>"obj"),$_smarty_tpl);?>



  
  <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowSubRecords && $_smarty_tpl->tpl_vars['obj']->value->mAllApplicantsRecordNull != false) {?>



  
<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Teaching Applications
                        </div>
                        <!-- /.panel-heading -->
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mTeacherApplicantsRecordsCount != 0) {?>
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Full Name</th>
                                            <th>Email Address</th>
                                            <th>Contact</th>
                                            <th>View</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mTeacherApplicantsRecords) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mTeacherApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mTeacherApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['email'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mTeacherApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['phone'];?>
</td>
                                            <td>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTeacherApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_to_teacher_profile'];?>
">View</a>
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
                        <?php }?>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <?php }
}
}
