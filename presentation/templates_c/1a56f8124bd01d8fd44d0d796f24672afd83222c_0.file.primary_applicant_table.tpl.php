<?php
/* Smarty version 3.1.33, created on 2020-03-30 08:55:50
  from 'C:\xampp\htdocs\bluemark\presentation\templates\primary_applicant_table.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e81a6064aa7f9_50880134',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a56f8124bd01d8fd44d0d796f24672afd83222c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\primary_applicant_table.tpl',
      1 => 1585554937,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e81a6064aa7f9_50880134 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
?>
 <?php echo smarty_function_load_presentation_object(array('filename'=>"applicants_data",'assign'=>"obj"),$_smarty_tpl);?>

  
  <?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowSubRecords && $_smarty_tpl->tpl_vars['obj']->value->mAllApplicantsRecordNull != false) {?>
 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Primary Applicants</b>
                        </div>
                        <!-- /.panel-heading -->
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecordsCount != 0) {?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Contact</th>
                                            <th>View</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['firstname'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['surname'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['f_phone'];?>
</td>
                                            <td>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_to_student_profile'];?>
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
