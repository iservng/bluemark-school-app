{load_presentation_object filename="staff_status" assign="obj"}

{*admin_login.tpl8888*}


{* {include file="admin_head_tag.tpl"} *}
{if $obj->mShowWaitingForActivation == false}
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
                        <h3 class="panel-title"><b> Check Employment Status </b></h3>
                        <hr>
                        <h6>Enter Your Check request using  your email, to confirm if you have been selected. This is for individuals who had previously applied for a teaching position.
                         </h6>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="{$obj->mLinkToCheckEmploymentStatusForForm}">
                        {if $obj->mStatusMessage neq ""}
                            <p style="color: red;">{$obj->mStatusMessage}</p>
                        {/if}
                            <fieldset>
                                
                                <div class="form-group">
                                    <label>User Email</label>
                                    <input class="form-control" placeholder="Enter your E-mail" type="text" autofocus name="userEmail" size="35" value="">
                                </div>

                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Submit" name="StaffCheckedBtn">
                            </fieldset>
                        </form><br>
                            Back to the
                            <a href="{$obj->mLinkToIndex}">Home Page</a>
                    </div>
                </div>
                <span style="text-align: right;"> <small>Powered by <span style="color: black;"><b>BlueMark</b></span></small> </span>
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

{* //////////////////////////////////////////////////////////////// *}
{* SECOND PART BELOW *}
{else}
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
                        <h3 class="panel-title"><b>{$obj->mFirstTitle}</b></h3>
                        <hr>
                        <h6>
                            {$obj->mFirstBody}
                            
                        </h6>
                        <hr>   
                    </div>
                    <div class="panel-body">
                        {* <form role="form" method="post" action="{$obj->mLinkToAdmin}"> *}
                       
                            <fieldset>
                            <div class="panel-heading">
                                <h4 class="panel-title"><b> <span style="color: red;">
                                {$obj->mSecondTitle}
                                
                                </span></b></h4>
                                <hr>


                                <h6>
                                {$obj->mSecondBody}
                                    
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