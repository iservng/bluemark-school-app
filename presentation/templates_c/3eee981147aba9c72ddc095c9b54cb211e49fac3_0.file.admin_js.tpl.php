<?php
/* Smarty version 3.1.33, created on 2020-03-09 16:00:53
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_js.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e665a25c5dea6_81865010',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3eee981147aba9c72ddc095c9b54cb211e49fac3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_js.tpl',
      1 => 1583766038,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e665a25c5dea6_81865010 (Smarty_Internal_Template $_smarty_tpl) {
?>

     <!-- jQuery -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
/vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>

    <!-- Bootstrap Core JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
/vendor/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <!-- Metis Menu Plugin JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
/vendor/metisMenu/metisMenu.min.js"><?php echo '</script'; ?>
>

    <!-- DataTables JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
/vendor/datatables/js/jquery.dataTables.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
/vendor/datatables-plugins/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
/vendor/datatables-responsive/dataTables.responsive.js"><?php echo '</script'; ?>
>

    <!-- Custom Theme JavaScript -->
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
/dist/js/sb-admin-2.js"><?php echo '</script'; ?>
>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <?php echo '<script'; ?>
>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    <?php echo '</script'; ?>
><?php }
}
