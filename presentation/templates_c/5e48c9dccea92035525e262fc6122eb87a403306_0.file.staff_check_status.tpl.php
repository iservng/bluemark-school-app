<?php
/* Smarty version 3.1.33, created on 2020-04-20 17:35:11
  from 'C:\xampp\htdocs\bluemark\presentation\templates\staff_check_status.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e9dcf3f046e90_82018940',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e48c9dccea92035525e262fc6122eb87a403306' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\staff_check_status.tpl',
      1 => 1587400506,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9dcf3f046e90_82018940 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"staff_status",'assign'=>"obj"),$_smarty_tpl);?>




<?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowWaitingForActivation == false) {?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff Admin Status</title>

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
                        <h3 class="panel-title"><b> Check Employment Status </b></h3>
                        <hr>
                        <h6>Enter Your Check request using  your email, to confirm if you have been selected. This is for individuals who had previously applied for a teaching position.
                         </h6>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCheckEmploymentStatusForForm;?>
">
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mStatusMessage != '') {?>
                            <p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStatusMessage;?>
</p>
                        <?php }?>
                            <fieldset>
                                
                                <div class="form-group">
                                    <label>User Email</label>
                                    <input class="form-control" placeholder="Enter your E-mail" type="text" autofocus name="userEmail" size="35" value="">
                                </div>

                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Submit" name="StaffCheckedBtn">
                            </fieldset>
                        </form><br>
                            Back to the
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToIndex;?>
">Home Page</a>
                    </div>
                </div>
                <span style="text-align: right;"> <small>Powered by <span style="color: black;"><b>BlueMark</b></span></small> </span>
            </div>
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

<?php } else { ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff Status</title>

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
                        <h3 class="panel-title"><b><?php echo $_smarty_tpl->tpl_vars['obj']->value->mFirstTitle;?>
</b></h3>
                        <hr>
                        <h6>
                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mFirstBody;?>

                            
                        </h6>
                        <hr>   
                    </div>
                    <div class="panel-body">
                                               
                            <fieldset>
                            <div class="panel-heading">
                                <h4 class="panel-title"><b> <span style="color: red;">
                                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSecondTitle;?>

                                
                                </span></b></h4>
                                <hr>


                                <h6>
                                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSecondBody;?>

                                    
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
<?php }
}
}
