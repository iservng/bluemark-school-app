<?php
/* Smarty version 3.1.33, created on 2020-05-14 20:09:59
  from 'C:\xampp\htdocs\bluemark\presentation\templates\class_box_delete.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebd97873d1d09_00344364',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb11e13fcd2fb5875ec6c7b6a33336c051788775' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\class_box_delete.tpl',
      1 => 1589483393,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebd97873d1d09_00344364 (Smarty_Internal_Template $_smarty_tpl) {
?> <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
"> 
   <div class="col-lg-12">
        <div class="panel panel-default">
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount > 0) {?>
            <div class="" style="">
                <h3><b style="color: #337ab7; padding: 20px;">Delete from <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClass_name;?>
[<?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount;?>
]</b></h3>
                <p style="padding-left: 20px;">Select student(s) to be deleted and click the delete button at the bottom to effect the change</p>
            </div>
                        <!-- /.panel-heading -->
            <div class="panel-body">
            <input type="hidden" name="classDeleteId" value="">
        
            
                 <div class="table-responsive"> 

                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        
                                            <th>Select</th>
                                            <th>Firstname</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Admission Date</th>
                                            <th>Registration Number</th>
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
                                            <td><input type="checkbox" name="todeleteStudenIds[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['student_id'];?>
"></td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['firstname'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['surname'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['email'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['f_phone'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['admitted_on'];?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['reg_number'];?>
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
                        <div class="panel-heading">

                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" class="btn btn-outline btn-danger">Close</a>

                            <input type="submit" name="todeleteListBtn" value="Delete Selected Student" class="btn btn-primary btn-sm">

                        </div> 
                        <?php } else { ?>
                        <div class="panel-heading">
                         <b style="color: red;">No record found for deletion!</b>
                        </div>
                       
                        <?php }?>
                    </div>
                    <!-- /.panel -->
                </div>
                </form> <?php }
}
