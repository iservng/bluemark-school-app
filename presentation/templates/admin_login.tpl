{*admin_login.tpl*}
{load_presentation_object filename="admin_login" assign="obj"}

{* {include file="admin_head_tag.tpl"} *}
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
    <link href="{$obj->mSiteUrl}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{$obj->mSiteUrl}vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{$obj->mSiteUrl}dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{$obj->mSiteUrl}vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- : Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In  - <b>(Admin Only)</b></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="{$obj->mLinkToAdmin}">
                        {if $obj->mLoginMessage neq ""}
                            <p style="color: red;">{$obj->mLoginMessage}</p>
                        {/if}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" type="text" autofocus name="username" size="35" value="{$obj->mUsername}">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" size="35" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" href="index.html" class="btn btn-lg btn-success btn-block" value="Login" name="submit">
                            </fieldset>
                        </form><br>
                            Back to
                            <a href="{$obj->mLinkToIndex}">BlueMark</a>
                    </div>
                </div>
                <span style="text-align: right;"> <small>Powered by <span style="color: blue;"><b>BlueMark</b></span></small> </span>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    {* {include file="admin_js.tpl"} *}
    
{*admin javascript files links*}
<script src="{$obj->mSiteUrl}vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{$obj->mSiteUrl}vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{$obj->mSiteUrl}vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{$obj->mSiteUrl}dist/js/sb-admin-2.js"></script>


    

</body>

</html>
