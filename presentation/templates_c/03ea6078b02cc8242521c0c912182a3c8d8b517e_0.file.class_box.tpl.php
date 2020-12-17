<?php
/* Smarty version 3.1.33, created on 2020-05-13 00:16:37
  from 'C:\xampp\htdocs\bluemark\presentation\templates\class_box.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebb2e5541e2e0_83403857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03ea6078b02cc8242521c0c912182a3c8d8b517e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\class_box.tpl',
      1 => 1589325391,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebb2e5541e2e0_83403857 (Smarty_Internal_Template $_smarty_tpl) {
?> <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
"> 
   <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="" style="">
                <h3><b style="color: #337ab7; padding: 20px;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mClass_name;?>
  [<?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount;?>
] students </b></h3>
                
            </div>
                        <!-- /.panel-heading -->
            <div class="panel-body">
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount > 0) {?>
            
                 <div class="table-responsive"> 

                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                           
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
                <?php } else { ?>
                <b>No student record found</b>
                <?php }?>
                            <!-- /.table-responsive -->
            </div>
                        <!-- /.panel-body -->
                         <div class="">

                            <small style="color: #1087dd; padding: 20px;"> </small><span>&nbsp;</span><span>&nbsp;</span>
                            
                        </div> 
                    </div>
                    <!-- /.panel -->
                </div>
                </form> <?php }
}
