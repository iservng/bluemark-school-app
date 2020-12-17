<?php
/* Smarty version 3.1.33, created on 2020-06-17 11:43:00
  from 'C:\xampp\htdocs\bluemark\presentation\templates\teacher_admin_jsfiles.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ee9f3b40260d2_64725731',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b1d6d692cf8e66a1460704355cb867468ddbf2a7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\teacher_admin_jsfiles.tpl',
      1 => 1592390571,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ee9f3b40260d2_64725731 (Smarty_Internal_Template $_smarty_tpl) {
?> <!-- jQuery -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap Core JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
vendor/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <!-- Metis Menu Plugin JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
vendor/metisMenu/metisMenu.min.js"><?php echo '</script'; ?>
>

    <!-- Custom Theme JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
dist/js/sb-admin-2.js"><?php echo '</script'; ?>
>

    <!-- DataTables JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
vendor/datatables/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
vendor/datatables-plugins/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
vendor/datatables-responsive/dataTables.responsive.js"><?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    <?php echo '</script'; ?>
>



</body>

</html><?php }
}
