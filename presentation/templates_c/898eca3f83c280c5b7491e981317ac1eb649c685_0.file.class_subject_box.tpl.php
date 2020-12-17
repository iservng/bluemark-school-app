<?php
/* Smarty version 3.1.33, created on 2020-05-16 12:52:41
  from 'C:\xampp\htdocs\bluemark\presentation\templates\class_subject_box.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebfd4097e0496_14789368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '898eca3f83c280c5b7491e981317ac1eb649c685' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\class_subject_box.tpl',
      1 => 1589625410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebfd4097e0496_14789368 (Smarty_Internal_Template $_smarty_tpl) {
?>    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="" style="">
                <h3><b style="color: #337ab7; padding: 20px;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassName;?>
  [<?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassSubjectCount;?>
] subjects </b></h3>
                
            </div>
                        <!-- /.panel-heading -->
            <div class="panel-body">
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mClassSubjectCount > 0) {?>
            
                 <div class="table-responsive"> 

                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        
                                            <th>Subject Name</th>
                                            <th>Action</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mSubjectOfferedBySpecificClass) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>

                                        <tr>
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubjectOfferedBySpecificClass[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>

                                            </td>

                                            <td>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubjectOfferedBySpecificClass[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_delete_subject'];?>
">Delete</a>
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
                         <div class="panel-heading">

                            <small style="color: #1087dd; padding: 20px;"> </small><span>&nbsp;</span><span>&nbsp;</span>
                                                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" class="btn btn-primary btn-sm">Got It</a>

                        </div> 
                    </div>
                    <!-- /.panel -->
                </div>
                <?php }
}
