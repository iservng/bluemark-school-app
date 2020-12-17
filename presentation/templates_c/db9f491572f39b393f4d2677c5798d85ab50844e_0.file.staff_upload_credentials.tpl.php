<?php
/* Smarty version 3.1.33, created on 2020-12-05 03:54:22
  from 'C:\xampp\htdocs\bluemark\presentation\templates\staff_upload_credentials.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fcaf65e62d209_99968255',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db9f491572f39b393f4d2677c5798d85ab50844e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\staff_upload_credentials.tpl',
      1 => 1607135315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcaf65e62d209_99968255 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"staff_credentials",'assign'=>"obj"),$_smarty_tpl);?>





<?php if ($_smarty_tpl->tpl_vars['obj']->value->mUploadComplete == false) {?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staff Upload Credentials</title>

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
                    
                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLoginMsg) {?>
                        <p style="color: red"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLoginMsg;?>
</p>
                    <?php }?>

                        <h1 class="panel-title"><b style="color: green"> Congratulation! </b></h1>
                        You have been selected to proceed.
                        <hr>
                        <h3 class="panel-title"><b> Complete Your Profile </b></h3>
                        <h6>Upload Credentials to complete your Profile information,
                        In compliance with our standard you are expected to upload a soft copy of your Credentials with more login details.
                        </h6>
                    </div>
                    <div class="panel-body">
            <form role="form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToUploadCredentials;?>
" enctype="multipart/form-data">

                       
                            <fieldset>

                             <div class="panel-heading">
                                    <h4 style="color: gray;"> Personal Information</h4>
                                    <hr>
                                    <h6>
                                        All your is required to activate to account and create a profile, please do ensure to enter only correct info. Any ambigious or confusing information will lead to disqualification
                                    <h6>
                                    <hr>
                                </div>
                                
                                <div class="form-group">
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mUsernameError == 1) {?>
                                <span style="color: red"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mUploadEmailErrMsg;?>
</span>
                                <?php }?>
                                    <label>User Email</label>
                                    <input class="form-control" placeholder="Enter your E-mail" type="text" autofocus name="username" size="35" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mUsername;?>
">
                                </div>


                                 <div class="form-group">
                                 <?php if ($_smarty_tpl->tpl_vars['obj']->value->mGenderError == 1) {?>
                                 <span style="color: red">Enter Female or Male</span>
                                 <?php }?>
                                    <label>Gender</label>
                                    <input class="form-control" placeholder="Enter your gender" type="text" name="gender" size="35" value="">
                                </div>


                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mStaffPasportError == 1) {?>
                                <span style="color: red">Use a png or jpg file </span>
                                <?php }?>
                                <div class="form-group">
                                    <label for="staff_passport">Passport</label>
                                    <input class="form-control" id="staff_passport" type="file" name="staffPassport">
                                </div>


                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPasswordError == 1) {?>
                                <span style="color: red">Enter alphanumericals, 8 characters minimum, at least one must be Capital Letter</span>
                                <?php }?>
                                <div class="form-group">
                                    <label for="staff_password">Password</label>
                                    <input class="form-control" id="staff_password" placeholder="Password" name="password" type="password" size="35" value="">
                                </div>

                                <div class="form-group">
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mComfirmPasswordError == 1) {?>
                                <span style="color: red"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSecondPasswordMsg;?>
</span>
                                <?php }?>
                                    <label for="staff_password">Comfirm Password</label>
                                    <input class="form-control" id="comfirm_staff_password" placeholder="Re-enter your Password" name="comfirmPassword" type="password" size="35" value="">
                                </div>

                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mStaffAddressError == 1) {?>
                                <span style="color: red">Enter a valid detailed address</span>
                                <?php }?>
                                <div class="form-group">
                                    <label for="staff_address">Residential Address</label>
                                    <input class="form-control" id="staff_address" placeholder="Enter your Residential Address" name="staffAddress" type="text">
                                </div>


                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mStaffStateError == 1) {?>
                                <span style="color: red">Select a valid State</span>
                                <?php }?>
                                <div class="form-group">
                                    <label for="staff_address">State of Residence </label>
                                    
                                    <select class="form-control" name="staffState">
                                                                                <option value=""> -Select your state of residence- </option>
                                        <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mListOfStates) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                        <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfStates[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['states_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfStates[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</option>
                                        <?php
}
}
?>
                                    </select>

                                </div>




                                <div class="panel-heading">
                                    <h4 style="color: gray;"> Files Information</h4>
                                    <hr>
                                    <h6>
                                        All your Credentials are to be scanned in a .jpg or png format, it is expected that all files that you be upload have a clear print and new. Any ambigious or confusing information will lead to disqualification
                                    <h6>
                                    <hr>
                                </div>

                                <div class="form-group">
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mBirthCertError == 1) {?>
                                <span style="color: red">Use either png or jpg format</span>
                                <?php }?>
                                    <label for="staff_birth_cert">Birth Certificate</label>
                                    <input class="form-control" id="staff_birth_cert" name="birthCert" type="file">
                                </div>

                                <div class="form-group">
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPrimaryCertError == 1) {?>
                                <span style="color: red">Use either png or jpg format</span>
                                <?php }?>
                                <div class="form-group">
                                    <label for="staff_primary_cert">Primary Certificate</label>
                                    <input class="form-control" id="staff_primary_cert" name="primaryCert" type="file">
                                </div>

                                <div class="panel-heading">
                                    
                                    <hr>
                                    <h6>
                                        These are your WASSCE/SSCE/NECO etc result or certificate. When combining two result, then the the second O-LEVEL button must be used to complete the two upload.
                                    <h6>
                                    <hr>
                                </div>

                                <div class="form-group">
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mOlevelCert1Error == 1) {?>
                                <span style="color: red">Use either png or jpg format</span>
                                <?php }?>
                                    <label for="staff_olevel_cert1">O-Level Certificate/Result 1</label>
                                    <input class="form-control" id="staff_olevel_cert1" name="olevelCert1" type="file">
                                </div>

                                <div class="form-group">
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mOlevelCert2Error == 1) {?>
                                <span style="color: red">Use either png or jpg format</span>
                                <?php }?>
                                    <label for="staff_olevel_cert2">O-Level Certificate/Result 2</label>
                                    <input class="form-control" id="staff_olevel_cert2" name="olevelCert2" type="file">
                                </div>

                                <hr>
                                    <h6>
                                        These are your BSc/MSc/NCE/HND/OND etc result or certificate. Please to include any Professional certificate your might have obtained.
                                    </h6>
                                    <hr>

                                <div class="form-group">
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAlevelCertError == 1) {?>
                                <span style="color: red">Use either png or jpg format</span>
                                <?php }?>
                                    <label for="staff_alevel_cert">Qualification/Degree</label>
                                    <input class="form-control" id="staff_alevel_cert" name="alevelCert" type="file">
                                </div>




                                <div class="form-group">
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProCertError == 1) {?>
                                <span style="color: red;">Use either png or jpg format</span>
                                <?php }?>
                                    <label for="staff_pro_cert">Professional Qualification</label>
                                    <input class="form-control" id="staff_pro_cert" name="proCert" type="file">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Submit" name="StaffUploadBtn">
                            </fieldset>
                        </form><br>
                            Back to the
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
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

    <title>Staff Upload Credentials</title>

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

<?php }?>

<?php }
}
