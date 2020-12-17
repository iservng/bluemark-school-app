{* TT admin_student_profile.tpl*}
{load_presentation_object filename="student_profile" assign="obj"}





{if $obj->mStudentRecordNotFound == false}
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        {$obj->mStudentFullName} Profile Information
                    </h1>
                    
                </div>
               
            </div>
             <a href="{$obj->mLinkToAdmin}"><small>back to admin list</small></a>
             <hr>





















            {*The student admin profile is here *}

            
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {$obj->mStudentFullName} - <b>Profile Information</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Home</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Profile</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">Medical</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">Doctor Info</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                    <h4>Passport</h4>
                                    <p>
                                    <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td><div style="text-align: center;">
                                                <img src="{$obj->mPassportUrl}" alt="">
                                                </div>
                                                </td>
                                                <td>
                                                {if $obj->mIsAdmitted == false}
                                                    <b style="color: red;">Process Application</b><br>
                                                    <b style="color: blue;">Section:</b> {$obj->mSection}
                                                    <br>
                                                    <b style="color: blue;">Status:</b> {$obj->mStatus}
                                                    <br>
                                                    <b style="color: blue;">Class Assigned</b>
                                                    {$obj->mClassNamee}
                                                {else}
                                                <b style="color: green;">Process Completed</b><br>
                                                    <b style="color: blue;">Section:</b> {$obj->mSection}
                                                    <br>
                                                    <b style="color: blue;">Status:</b> {$obj->mStatus}
                                                    <br>
                                                    <b style="color: blue;">Class Assigned</b>
                                                    {$obj->mClassNamee}

                                                {/if}

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <div style="text-align: center;">
                                                    {$obj->mStudentFullName} is <br>
                                                    <b>{$obj->mStudentAge} years old</b>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form method="post" action="{$obj->mLinkToStudentProfileAdmin}">

                                                    <input id="student_id" name="student_id" type="hidden" value="{$obj->mStudentId}">
                                                    
                                                {if $obj->mIsAdmitted == false}
                                                    <div class="form-group">
                                                    <label for="classAdmit">Enter Class Name</label>
                                        
                                                        <select name="classAdmited" class="form-control">
                                                        <option value=""></option>
                                                        {section name=i loop=$obj->mClasses} 
                                                            <option value="{$obj->mClasses[i].school_classes_id}">{$obj->mClasses[i].class_name}</option>
                                                        {/section}
                                                        </select>

                                                        {if $obj->mClassErrMasg}
                                                        <p style="color: red;">
                                                        {$obj->mClassErrMasg}</p>
                                                        {/if}
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <input class="btn btn-success btn-sm" type="submit" name="classAdmitedBtn" value="Admit Student">
                                                    </div>
                                                    {else}
                                                     <div class="form-group">
                                                        <input class="btn btn-danger btn-sm" type="submit" name="cancelBtn" value="Cancel Admission">
                                                    </div>

                                                    {/if}
                                                    </form>
                                                </td>
                                            </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    </p>
                                </div>

                                <div class="tab-pane fade" id="profile">
                                    <h4>Profile Tab</h4>
                                    <p>
                                    <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <td>{$obj->mFname}</td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td>{$obj->mSname} </td>
                                        </tr>
                                        <tr>
                                            <th>Other Name</th>
                                            <td>{$obj->mOthname}</td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td>{$obj->mGender} </td>
                                        </tr>
                                        <tr>
                                            <th>Email Address</th>
                                            <td>{$obj->mEmailAdd}</td>
                                        </tr>
                                        <tr>
                                            <th>Date of Birth</th>
                                            <td>{$obj->mShowDob} </td>
                                        </tr>
                                        <tr>
                                            <th>State </th>
                                            <td>{$obj->mState} State </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>Medical information Tab</h4>
                                    <p>
                                    <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Blood Group</th>
                                            <td>{$obj->mBloodgroup}</td>
                                        </tr>
                                        <tr>
                                            <th>Genotype</th>
                                            <td>{$obj->mGenotype} </td>
                                        </tr>
                                        <tr>
                                            <th>Allergies</th>
                                            <td>{$obj->mAllergies}</td>
                                        </tr>
                                        <tr>
                                            <th>Defects</th>
                                            <td>{$obj->mDefect} </td>
                                        </tr>
                                        <tr>
                                            <th>Immunization</th>
                                            <td>{$obj->mImmunize} </td>
                                        </tr>
                                        <tr>
                                            <th>Other Medical Info</th>
                                            <td>{$obj->mOtherMediInfo}</td>
                                        </tr>
                                       
                                    </thead>
                                </table>
                            </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>Doctor's Information Tab</h4>
                                    <p>
                                     <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <td>{$obj->mDoctorname}</td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number</th>
                                            <td>{$obj->mDoctorPhone} </td>
                                        </tr>
                                        <tr>
                                            <th>Office Address</th>
                                            <td>{$obj->mDoctorAddress}</td>
                                        </tr>
                                        
                                    </thead>
                                </table>
                            </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>















                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {$obj->mStudentFullName} - <b>Mom and Dad Information</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">Home</a>
                                </li>
                                <li><a href="#profile-pills" data-toggle="tab">Contact</a>
                                </li>
                                <li><a href="#messages-pills" data-toggle="tab">Occupation</a>
                                </li>
                                <li><a href="#settings-pills" data-toggle="tab">Address</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <h4>Home Tab</h4>
                                    <p>
                                      <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Dad Firstname</th>
                                            <td>{$obj->mDadFname}</td>
                                        </tr>
                                        <tr>
                                            <th>Dad Lastname</th>
                                            <td>{$obj->mDadLastname} </td>
                                        </tr>
                                        <tr>
                                            <th>Dad Religion</th>
                                            <td>{$obj->mDadReligion} </td>
                                        </tr>
                                        <tr>
                                            <th> <span style="color: #337ab7;">Mom Firstname</span></th>
                                            <td>{$obj->mMomFname}</td>
                                        </tr>
                                        <tr>
                                            <th><span style="color: #337ab7;">Mom Lastname</span></th>
                                            <td>{$obj->mMomLastname} </td>
                                        </tr>
                                        <tr>
                                            <th><span style="color: #337ab7;">Mom Religion</span></th>
                                            <td>{$obj->mMomReligion} </td>
                                        </tr>
                                        
                                       
                                    </thead>
                                </table>
                            </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="profile-pills">
                                    <h4>Mom Dad Contact Information Tab</h4>
                                    <p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Dad Phone Number</th>
                                                    <td>{$obj->mDadPhone}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th> <span style="color: #337ab7;">Mom Phone Number</span></th>
                                                    <td>{$obj->mMomPhone}</td>
                                                </tr>
                                            </thead>
                                        </table>
                                        </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="messages-pills">
                                    <h4>Occupation Tab</h4>
                                    <p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Dad Occupation</th>
                                                    <td>{$obj->mDadOccupation}</td>
                                                </tr>
                                                <tr>
                                                    <th>Dad Office Address</th>
                                                    <td>{$obj->mDadOfficeAddress}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th> <span style="color: #337ab7;">Mom Occupation</span></th>
                                                    <td>{$obj->mMomOccupation}</td>
                                                </tr>
                                                <tr>
                                                    <th> <span style="color: #337ab7;">Mom Office Address</span></th>
                                                    <td>{$obj->mMomOfficeAddress}</td>
                                                </tr>
                                            </thead>
                                        </table>
                                        </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="settings-pills">
                                    <h4>Dad Mom Residential Address Tab</h4>
                                    <p>
                                     <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Dad Residential Address</th>
                                                    <td>{$obj->mDadHouseAddress}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th> <span style="color: #337ab7;">Mom Residential Address</span></th>
                                                    <td>{$obj->mMomHouseAddress}</td>
                                                </tr>
                                            </thead>
                                        </table>
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>
            
            {*The student admin profile is here *}













            
             
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {$obj->mStudentFullName} - <b>Certificates and Files</b>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><b>Birth Certificate</b></a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        <div class="panel-image-holder">
                                            <img src="{$obj->mBirthCertUrl}" alt="">
                                        </div>
                                        
                                             
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><b>Primary Certificate</b></a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        {if $obj->mPrimaryCertUrlMsg == ''}
                                            {*display Image file*}
                                            <div class="panel-image-holder">
                                                <img src="{$obj->mPrimaryCertUrl}" alt="">
                                            </div>
                                            
                                        {else}
                                            {*Display Message*}
                                            <h3>{$obj->mPrimaryCertUrlMsg}</h3>
                                        {/if}
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><b>Doctor's Report</b></a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            {if $obj->mDoctorReportUrlMsg == ''}
                                                {*Display Image file*}
                                                <div class="panel-image-holder">
                                                    <img src="{$obj->mDoctorReportUrl}" alt="">
                                                </div>
                                                
                                            {else}
                                                {* Display message *}
                                                <h3>{$obj->mDoctorReportUrlMsg}</h3>
                                            {/if} 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            </div>


        {else}

         <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <small style="color: red;"> No record found for the selection made</small> 
                    </h1>
                    
                </div>
               
            </div>
             <a href="{$obj->mLinkToAdmin}"><small>back to admin list</small></a>
             <hr>

        {/if}
