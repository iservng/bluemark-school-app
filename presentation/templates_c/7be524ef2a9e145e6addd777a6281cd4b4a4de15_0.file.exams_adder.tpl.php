<?php
/* Smarty version 3.1.33, created on 2020-07-01 15:55:34
  from 'C:\xampp\htdocs\bluemark\presentation\templates\exams_adder.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5efca3e69afba7_60893123',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7be524ef2a9e145e6addd777a6281cd4b4a4de15' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\exams_adder.tpl',
      1 => 1593615291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5efca3e69afba7_60893123 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mToTeachersClassPage;?>
">
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b style="color: #337ab7">Enter the Exams scores for <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubjectName;?>
</b>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount > 0) {?>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                            <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Phone(s)</th>
                                        <th>Reg Number</th>
                                        <th>CA Score</th>
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
                                    <tr class="odd gradeX">
                                        <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['firstname'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['surname'];?>
</td>
                                        <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['f_phone'];?>
</td>
                                        <td class="center"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['reg_number'];?>
</td>
                                        <td class="center">
                                            <input type="text" name="exams_score[]" required style="width: 60px"> 
                                            <input type="hidden" name="student_id[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['student_id'];?>
">
                                        </td>
                                    </tr>
                                    <?php
}
}
?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Ensure all enterd data are correct</h4>
                                <p></p>
<input type="submit" class="btn btn-success btn-lg btn-block" value="Submit Exams scores for <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubjectName;?>
" style="font-weight: bold;" name="examsForStorage">
                            </div>
                        </div>
                        <?php } else { ?>
                            <b style="color: red;">No record found</b>
                            <span>&nbsp;</span>
                            <span>&nbsp;</span>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mToTeachersClassPage;?>
"> ok</a>
                        <?php }?>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
</form><?php }
}
