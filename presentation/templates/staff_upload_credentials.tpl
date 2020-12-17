{load_presentation_object filename="staff_credentials" assign="obj"}


{*admin_login.tpl fff*}


{if $obj->mUploadComplete == false}

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

            {*The form panel starts here *}
            {* {if $obj->mUploadFormPartToShow eq 1} *}
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                    
                    {if $obj->mLoginMsg}
                        <p style="color: red">{$obj->mLoginMsg}</p>
                    {/if}

                        <h1 class="panel-title"><b style="color: green"> Congratulation! </b></h1>
                        You have been selected to proceed.
                        <hr>
                        <h3 class="panel-title"><b> Complete Your Profile </b></h3>
                        <h6>Upload Credentials to complete your Profile information,
                        In compliance with our standard you are expected to upload a soft copy of your Credentials with more login details.
                        </h6>
                    </div>
                    <div class="panel-body">
            <form role="form" method="post" action="{$obj->mLinkToUploadCredentials}" enctype="multipart/form-data">

                       
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
                                {if $obj->mUsernameError == 1}
                                <span style="color: red">{$obj->mUploadEmailErrMsg}</span>
                                {/if}
                                    <label>User Email</label>
                                    <input class="form-control" placeholder="Enter your E-mail" type="text" autofocus name="username" size="35" value="{$obj->mUsername}">
                                </div>


                                 <div class="form-group">
                                 {if $obj->mGenderError == 1}
                                 <span style="color: red">Enter Female or Male</span>
                                 {/if}
                                    <label>Gender</label>
                                    <input class="form-control" placeholder="Enter your gender" type="text" name="gender" size="35" value="">
                                </div>


                                {if $obj->mStaffPasportError == 1}
                                <span style="color: red">Use a png or jpg file </span>
                                {/if}
                                <div class="form-group">
                                    <label for="staff_passport">Passport</label>
                                    <input class="form-control" id="staff_passport" type="file" name="staffPassport">
                                </div>


                                {if $obj->mPasswordError == 1}
                                <span style="color: red">Enter alphanumericals, 8 characters minimum, at least one must be Capital Letter</span>
                                {/if}
                                <div class="form-group">
                                    <label for="staff_password">Password</label>
                                    <input class="form-control" id="staff_password" placeholder="Password" name="password" type="password" size="35" value="">
                                </div>

                                <div class="form-group">
                                {if $obj->mComfirmPasswordError == 1}
                                <span style="color: red">{$obj->mSecondPasswordMsg}</span>
                                {/if}
                                    <label for="staff_password">Comfirm Password</label>
                                    <input class="form-control" id="comfirm_staff_password" placeholder="Re-enter your Password" name="comfirmPassword" type="password" size="35" value="">
                                </div>

                                {if $obj->mStaffAddressError == 1}
                                <span style="color: red">Enter a valid detailed address</span>
                                {/if}
                                <div class="form-group">
                                    <label for="staff_address">Residential Address</label>
                                    <input class="form-control" id="staff_address" placeholder="Enter your Residential Address" name="staffAddress" type="text">
                                </div>


                                {if $obj->mStaffStateError == 1}
                                <span style="color: red">Select a valid State</span>
                                {/if}
                                <div class="form-group">
                                    <label for="staff_address">State of Residence </label>
                                    {* <input  id="staff_address" placeholder="E"  type="text"> *}

                                    <select class="form-control" name="staffState">
                                        {* 

                                        The code that get the list of all states will be called and used to populate the dropdown menu 

                                        *}
                                        <option value=""> -Select your state of residence- </option>
                                        {section name=i loop=$obj->mListOfStates}
                                        <option value="{$obj->mListOfStates[i].states_id}">{$obj->mListOfStates[i].name}</option>
                                        {/section}
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
                                {if $obj->mBirthCertError == 1}
                                <span style="color: red">Use either png or jpg format</span>
                                {/if}
                                    <label for="staff_birth_cert">Birth Certificate</label>
                                    <input class="form-control" id="staff_birth_cert" name="birthCert" type="file">
                                </div>

                                <div class="form-group">
                                {if $obj->mPrimaryCertError == 1}
                                <span style="color: red">Use either png or jpg format</span>
                                {/if}
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
                                {if $obj->mOlevelCert1Error == 1}
                                <span style="color: red">Use either png or jpg format</span>
                                {/if}
                                    <label for="staff_olevel_cert1">O-Level Certificate/Result 1</label>
                                    <input class="form-control" id="staff_olevel_cert1" name="olevelCert1" type="file">
                                </div>

                                <div class="form-group">
                                {if $obj->mOlevelCert2Error == 1}
                                <span style="color: red">Use either png or jpg format</span>
                                {/if}
                                    <label for="staff_olevel_cert2">O-Level Certificate/Result 2</label>
                                    <input class="form-control" id="staff_olevel_cert2" name="olevelCert2" type="file">
                                </div>

                                <hr>
                                    <h6>
                                        These are your BSc/MSc/NCE/HND/OND etc result or certificate. Please to include any Professional certificate your might have obtained.
                                    </h6>
                                    <hr>

                                <div class="form-group">
                                {if $obj->mAlevelCertError == 1}
                                <span style="color: red">Use either png or jpg format</span>
                                {/if}
                                    <label for="staff_alevel_cert">Qualification/Degree</label>
                                    <input class="form-control" id="staff_alevel_cert" name="alevelCert" type="file">
                                </div>




                                <div class="form-group">
                                {if $obj->mProCertError == 1}
                                <span style="color: red;">Use either png or jpg format</span>
                                {/if}
                                    <label for="staff_pro_cert">Professional Qualification</label>
                                    <input class="form-control" id="staff_pro_cert" name="proCert" type="file">
                                </div>

                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Submit" name="StaffUploadBtn">
                            </fieldset>
                        </form><br>
                            Back to the
                            <a href="{$obj->mSiteUrl}">Home Page</a>
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

{else}

{*SHOWS THE SUCCESSFUL PART OF THE UPLOAD *}
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

