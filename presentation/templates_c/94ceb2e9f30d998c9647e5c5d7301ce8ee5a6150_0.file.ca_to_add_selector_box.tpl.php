<?php
/* Smarty version 3.1.33, created on 2020-12-03 06:41:25
  from 'C:\xampp\htdocs\bluemark\presentation\templates\ca_to_add_selector_box.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc87a853eba54_08320947',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94ceb2e9f30d998c9647e5c5d7301ce8ee5a6150' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\ca_to_add_selector_box.tpl',
      1 => 1606974079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc87a853eba54_08320947 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mToTeachersClassPage;?>
">
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b style="color: #337ab7">
                                Enter CA score for <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFullName;?>

                                
                            </b>
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Ensure all enterd data are correct</h4>
                                <p>CA record for <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFullName;?>
 was not found or had not been entered</p><hr>
                                <h5>&nbsp;</h5>
                                <p>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Select Subject</th>
                                        <th>Select CA type</th>
                                        <th>Enter Score Below</th>
                                        
                                
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr class="odd gradeX">
                                        <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFullName;?>
</td>
                                        <td>
                                        <div class="form-group">
                                            <select name="subject_id" class="form-control">
                                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount > 0) {?>
                                                <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mSubjectOfferedBySpecificClass) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                                    <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubjectOfferedBySpecificClass[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['subject_id'];?>
">
                                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubjectOfferedBySpecificClass[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
 
                                                        
                                                    </option>
                                                <?php
}
}
?>
                                            <?php } else { ?>
                                            Add subjects to this class
                                            <?php }?>
                                                
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-group">
                                            <select name="ca_type" class="form-control">
                                                <?php
$__section_j_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mCaTypes) ? count($_loop) : max(0, (int) $_loop));
$__section_j_1_total = $__section_j_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_1_total !== 0) {
for ($__section_j_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_1_iteration <= $__section_j_1_total; $__section_j_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
                                                    <option value="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)+1;?>
">
                                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mCaTypes[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)];?>

                                                        <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)+1;?>

                                                    </option>
                                                <?php
}
}
?>
                                            </select>
                                            </div>
                                        </td>
                                        <td class="center">
                                            <div class="form-group">

                                                <input type="text" name="score_mark" class="form-control">
                                            </div>
                                        </td>
                                        
                                    </tr>
                                
                                </tbody>
                            </table>
                                
                                </p>
                                <input type="submit" class="btn btn-success btn-lg" value="Submit CA scores for <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFullName;?>
" style="font-weight: bold;" name="submitBtnSingleCA">
                            </div>
                        </div>
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
</form><?php }
}
