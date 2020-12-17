<?php
/* Smarty version 3.1.33, created on 2020-11-30 01:34:17
  from 'C:\xampp\htdocs\bluemark\presentation\templates\site_admin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc43e09024a15_52452765',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8da63c27954c4ed62b7324348afa70d6b0e845f8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\site_admin.tpl',
      1 => 1606690736,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc43e09024a15_52452765 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"site_admin",'assign'=>"obj"),$_smarty_tpl);?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB </title>

    <!-- Bootstrap Core CSS ggt -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- : Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->

</head>


<body>

    <div class="container">
        <div class="row">
        <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mInnerContent, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
            

        </div>
    </div>

    <!-- jQuery -->
        
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


    

</body>

</html>
<?php }
}
