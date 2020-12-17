{load_presentation_object filename="staff_login" assign="obj"}

{if $obj->mWaitingForActivation == false}
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
    <link href="{$obj->mSiteUrl}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{$obj->mSiteUrl}vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{$obj->mSiteUrl}dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{$obj->mSiteUrl}vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   

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
                        <form role="form" method="post" action="{$obj->mLinkToLoginLink}">
                        {if $obj->mWarnErrorMsg neq ""}
                            <p style="color: red;">{$obj->mWarnErrorMsg}</p>
                        {/if}
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
                            <a href="{$obj->mSiteUrl}">Home Page</a>
                    </div>
                </div>
                <span style="text-align: right;"> <small>Powered by <span style="color: black;"><b>BlueMark</b></span></small> </span>
            </div>
        </div>
    </div>

   
    <script src="{$obj->mSiteUrl}vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{$obj->mSiteUrl}vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{$obj->mSiteUrl}vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{$obj->mSiteUrl}dist/js/sb-admin-2.js"></script>


    

</body>

</html>
{else}
{*THIS IS THE WAITING FOR ACTIVATION SODE OF THIS FORM *}
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
    <link href="{$obj->mSiteUrl}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{$obj->mSiteUrl}vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{$obj->mSiteUrl}dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{$obj->mSiteUrl}vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   

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
                        {* <form role="form" method="post" action="{$obj->mLinkToAdmin}"> *}
                       
                            <fieldset>
                            <div class="panel-heading">
                                <h4 class="panel-title"><b>You are not <span style="color: red;">Activated yet</span></b></h4>
                                <hr>


                                <h6>
                                    Your will be notified via email as soon as you are activated. If you experience any troubles please cntact admin or call BlueMark directly.
                                </h6>
                                <hr>
                            </div>
                                {* <input type="submit" href="index.html" class="btn btn-lg btn-success btn-block" value="Print Employment Letter" name="LoginStaff"> *}
                                {* <a href="" class="btn btn-lg btn-success btn-block"></a> *}
                            </fieldset>
                        {* </form> *}
                        <br>
                            Back to
                            <a href="{$obj->mSiteUrl}">Home Page</a>
                    </div>
                </div>
                <span style="text-align: right;"> <small>Powered by <span style="color: black;"><b>BlueMark</b></span></small> </span>
            </div>
        </div>
    </div>

   
<script src="{$obj->mSiteUrl}vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{$obj->mSiteUrl}vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{$obj->mSiteUrl}vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{$obj->mSiteUrl}dist/js/sb-admin-2.js"></script>


    

</body>

</html>
{/if}

