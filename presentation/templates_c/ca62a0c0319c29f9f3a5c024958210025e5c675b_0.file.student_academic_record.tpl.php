<?php
/* Smarty version 3.1.33, created on 2020-07-28 10:27:11
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_academic_record.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f1fef6f863e58_34697426',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ca62a0c0319c29f9f3a5c024958210025e5c675b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_academic_record.tpl',
      1 => 1595928351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f1fef6f863e58_34697426 (Smarty_Internal_Template $_smarty_tpl) {
?> <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
">
   <div class="col-lg-12">
        <div class="" style="">
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount > 0) {?>
            <div class="" style="">
                <h3><b style="color: #337ab7;">  <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassName_current['class_name'];?>
 class members [<?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount;?>
]</b></h3>
                
                <p style=""><b>Student's grand total, average and poition table.</b></p>
            </div>

            <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                                                <span>&nbsp;</span>
                                            </b>  
                        <span>&nbsp;</span>
                                                    <small>
                                                        </small>
                            <span>&nbsp;</span>
                                                                            <span>&nbsp;</span>
                        <span>&nbsp;</span>

                </h4>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
                        <input type="hidden" name="csrf" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrfToken;?>
">
        
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                
                                                                <th>Firstname</th>
                                <th>Surname</th>
                                <th>Grand Total</th>
                                <th>Average</th>
                                <th>Position </th>
                                                                
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
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['gtotal'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['average'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryList[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['position'];?>
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

                                    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" class="btn btn-outline btn-primary"> Close </a>
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
