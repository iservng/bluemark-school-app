<?php
/* Smarty version 3.1.33, created on 2020-04-20 03:34:59
  from 'C:\xampp\htdocs\bluemark\presentation\templates\staff_admin_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e9d0a53e3c1b0_20852974',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8ecbcda9d53fb6bae28a6c886b5a98f33673ba1d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\staff_admin_login.tpl',
      1 => 1587330493,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9d0a53e3c1b0_20852974 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"staff_login",'assign'=>"obj"),$_smarty_tpl);?>


<?php if ($_smarty_tpl->tpl_vars['obj']->value->mWaitingForActivation == false) {?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff Admin Login</title>

    <!-- Bootstrap Core CSS -->
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

   

</head>


<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Please Sign In</b></h3>
                        <hr>
                        <h6>
                            Please ensure to use your correct credential, as three attemp only is allowed. If you experience any troubles please cntact admin or call BlueMark directly.
                        </h6>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToLoginLink;?>
">
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mWarnErrorMsg != '') {?>
                            <p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mWarnErrorMsg;?>
</p>
                        <?php }?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" type="text" autofocus name="stfusername" size="35" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="stfpassword" type="password" size="35" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="staff" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" href="index.html" class="btn btn-lg btn-success btn-block" value="Login" name="LoginStaff">
                            </fieldset>
                        </form><br>
                            Back to
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
">Home Page</a>
                    </div>
                </div>
                <span style="text-align: right;"> <small>Powered by <span style="color: black;"><b>BlueMark</b></span></small> </span>
            </div>
        </div>
    </div>

   
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
<?php } else { ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff Admin Login</title>

    <!-- Bootstrap Core CSS -->
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

   

</head>


<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><b>Awaiting Activation</b></h3>
                        <hr>
                        <h6>
                            Please ensure to waiting until school activates your acount, to have access to your staff page. If you experience any troubles please cntact admin or call BlueMark directly.
                        </h6>
                        <hr>   
                    </div>
                    <div class="panel-body">
                                               
                            <fieldset>
                            <div class="panel-heading">
                                <h4 class="panel-title"><b>You are not <span style="color: red;">Activated yet</span></b></h4>
                                <hr>


                                <h6>
                                    Your will be notified via email as soon as you are activated. If you experience any troubles please cntact admin or call BlueMark directly.
                                </h6>
                                <hr>
                            </div>
                                                                                            </fieldset>
                                                <br>
                            Back to
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
">Home Page</a>
                    </div>
                </div>
                <span style="text-align: right;"> <small>Powered by <span style="color: black;"><b>BlueMark</b></span></small> </span>
            </div>
        </div>
    </div>

   
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
<?php }?>

<?php }
}
