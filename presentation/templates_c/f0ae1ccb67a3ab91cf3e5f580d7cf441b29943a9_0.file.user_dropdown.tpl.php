<?php
/* Smarty version 3.1.33, created on 2020-04-26 01:56:21
  from 'C:\xampp\htdocs\bluemark\presentation\templates\user_dropdown.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ea4dc3559af15_16762844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0ae1ccb67a3ab91cf3e5f580d7cf441b29943a9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\user_dropdown.tpl',
      1 => 1587862576,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ea4dc3559af15_16762844 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href=""><i class="fa fa-user fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStaffName;?>
</a>
                        </li>
                        <li><a href=""><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mlinkToLogout;?>
"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                    <?php }
}
