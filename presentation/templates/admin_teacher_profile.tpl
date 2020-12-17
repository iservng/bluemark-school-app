{*admin_student_profile.tpl vvv*}
{load_presentation_object filename="teacher_profile" assign="obj"}






        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{$obj->mGender}  {$obj->mName} </h1>
                    <a href="{$obj->mLinkToAdminList}" class="genric-btn primary-border small">Back to admin list</a> | Remember to logout when done! {$obj->mTesting}

                    {if $obj->mProcessSuccessMsg}
                        <b style="color: green;">{$obj->mProcessSuccessMsg}</b>
                    {/if}
                    <hr>

                    {if $obj->mProcessErrorMsg}
                        <b style="color: red;">{$obj->mProcessErrorMsg}</b>
                    {/if}
                    <hr>
                </div>
                <!-- /.col-lg-12 -->
            </div>



            <div class="row">
                <div class="col-lg-8">

                <!-- stop here -->
                {if $obj->mInviteForInterviewBar == true}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i><b style="color: blue;"> Invite {$obj->mName} for Interview action menu</b>  
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    {include file=$obj->mInterviewContentCell}
                                    
                                </div>
                            </div>
                        </div>
                       
                         
                    </div>
                    {/if}
                    <!-- /.panel -->


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o fa-fw"></i>{$obj->mName} <b>Curriculum Vitea</b>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    {include file=$obj->mActionContentCell}
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            
                            <div class="cvDiv" style="overflow: scroll;"> 
                                <img src="{$obj->mCvUrl}" alt=""> 
                            </div>
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->














                    
                </div>
































                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> {$obj->mName} <b>Profile</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">

                            {* Show passport if teacher user is a staff *}
                            {if $obj->mIsUploaded}
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> Passport: 
                                    <hr>
                                    <span><div style="width: 126px; height: 126px; box-shadow: 3px 13px 13px 3px gray; text-align: center;" >
                                    {if $obj->mPassportUrl != ''}
                                    <img src="{$obj->mPassportUrl}">
                                    {else}
                                    <img src="{$obj->mPassportAvater}">
                                    {/if}
                                    </div></span>
                                </a>
                            {/if}

                                <a href="#" class="list-group-item">
                                    <i class="fa fa-phone fa-fw"></i> Phone: 
                                    <span class="pull-right text-muted small"><em>{$obj->mPhone}</em>
                                    </span>
                                </a>
                                
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Email:
                                    <span class="pull-right text-muted small"><em>{$obj->mEmail}</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> Name
                                    <span class="pull-right text-muted small"><em>{$obj->mName}</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-calendar-o fa-fw"></i> Date:
                                    <span class="pull-right text-muted small"><em>{$obj->mAppliedDate}</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Time:
                                    <span class="pull-right text-muted small"><em>{$obj->mAppliedTime}</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-check fa-fw"></i> <b style="color: red">Status</b>:
                                    <span class="pull-right text-muted small"><em>{$obj->mStatus}</em>
                                    </span>
                                </a>
                                
                                
                            </div>
                            <!-- /.list-group -->
                        
                            {* <a href=""  ><b style="color: blue;"> </b></a> *}

                            <form method="post" action="{$obj->mLinkToTeacherProfile}">
                                
                                {if $obj->mStartEmploymentProcess}
                                <input type="submit" name="startBtnAction" value="Start employment process" class="btn btn-default btn-block">
                                {/if}

                                {if $obj->mDenyStaff}
                                <input type="submit" name="denyBtnAction" value="Cancel employment" class="btn btn-default btn-block">
                                {/if}

                                

                                {if $obj->mSuspendStaff}
                                <input type="submit" name="suspendBtnAction" value="Suspend staff" class="btn btn-default btn-block">
                                {/if}
                                
                            </form>
                            {if $obj->mActivateStaff}
                                {* <input type="submit" name="activateBtnAction" value="Activate staff" class="btn btn-default btn-block" style="color: green; font-weight: bold; margin-top: 10px;"> *}
                            <button class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal" style="color: green; font-weight: bold; margin-top: 10px;">
                                Activate staff
                            </button>

                            {/if}
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                       
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->


                {*The below will be th pop up *}
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                <form method="post" action="{$obj->mLinkToTeacherProfile}">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Assign Class to <span style="color: #2e6da4;"><b>{$obj->mName}</b></span></h4>
                                        </div>
                                        <div class="modal-body">

                                        {****************************************
                                            START OF THE THING
                                            *************************************}

                                            <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Table of all available classes
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="#home-pills" data-toggle="tab">
                                        Nursery Classes
                                    </a>
                                </li>
                                <li>
                                    <a href="#profile-pills" data-toggle="tab">
                                        Primary Classes
                                    </a>
                                </li>
                                <li>
                                    <a href="#messages-pills" data-toggle="tab">
                                        Secondary Classes
                                    </a>
                                </li>
                                
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <h4>Select from <b>Nursery</b> classes</h4>
                                    <p>
                                       
                                        <div class="col-lg-12">
                    <div class="panel panel-default">
                        {* <div class="panel-heading">
                            Hover Rows
                        </div> *}
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Select</th>
                                            <th>Class Name</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {section name=i loop=$obj->mOnlyNurseryClasses}
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="classId[]" value="{$obj->mOnlyNurseryClasses[i].school_classes_id}">
                                                    </label>
                                                </div>
                                            </td> 
                                            <td>{$obj->mOnlyNurseryClasses[i].class_name}</td>
                                            
                                        </tr>
                                    {/section}
                                      
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                                    </p>
                                </div>

                                <div class="tab-pane fade" id="profile-pills">
                                    <h4>Select from <b>Primary</b> classes</h4>
                                    <p>
                                            <div class="col-lg-12">
                    <div class="panel panel-default">
                        {* <div class="panel-heading">
                            Hover Rows
                        </div> *}
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Select</th>
                                            <th>Class Name</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {section name=i loop=$obj->mOnlyPrimaryClasses}
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="classId[]" value="{$obj->mOnlyPrimaryClasses[i].school_classes_id}">
                                                    </label>
                                                </div>
                                            </td> 
                                            <td>{$obj->mOnlyPrimaryClasses[i].class_name}</td>
                                            
                                        </tr>
                                    {/section}
                                      
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                                    </p>
                                </div>

                                <div class="tab-pane fade" id="messages-pills">
                                    <h4>Select from <b>Secondary</b> classes</h4>
                                    <p>
                                                <div class="col-lg-12">
                    <div class="panel panel-default">
                        {* <div class="panel-heading">
                            Hover Rows
                        </div> *}
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Select</th>
                                            <th>Class Name</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {section name=i loop=$obj->mOnlySecondaryClasses}
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="classId[]" value="{$obj->mOnlySecondaryClasses[i].school_classes_id}">
                                                    </label>
                                                </div>
                                            </td> 
                                            <td>{$obj->mOnlySecondaryClasses[i].class_name}</td>
                                            
                                        </tr>
                                    {/section}
                                      
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="settings-pills">
                                    <h4>Settings Tab</h4>
                                    <p>
                                        {*The fort unused table of the Available classes list*}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                                            


                                            {****************************************
                                            END OF THE THING
                                            *************************************}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                            {* <button type="button" class="btn btn-primary" style="backgroundcolor: #2e6da4;">Complete Activation</button> *}
                                            <input type="hidden" name="teacher_id" value="{$obj->mTeacher_Id}">
                                            <input type="hidden" name="token_csrf_key" value="{$obj->mCsrf_activate}">

                                            <input type="submit" name="activateBtnAction" value="Complete Activation" class="btn btn-primary" style="backgroundcolor: #2e6da4;">
                                        </div>

                                        <form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

            </div>



























            
            {if $obj->mIsUploaded == true}
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             {$obj->mName} <b>Credentials</b>
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">

                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight"><b>Address</b></a>
                                        </h4>
                                    </div>
                                    <div id="collapseEight" class="panel-collapse collapse">
                                        <div class="panel-body">
                                        
                                            {*display Image file*}
                                            <div class="panel-image-holder">
                                            {if $obj->mAddress}
                                                {* <img src="{$obj->mPrimarycertUrl}" alt="Primary Certificate"> *}
                                                <p> {$obj->mAddress}</p>
                                            {else}
                                                <b style="color: red;">Address not found</b>
                                            {/if}
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>



                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><b>Birth Certificate</b></a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse">
                                        <div class="panel-body">

                                        <div class="panel-image-holder">
                                            {if $obj->mBirthcertUrl != ""}
                                                <img src="{$obj->mBirthcertUrl}" alt="Birth Certificate">
                                                
                                            {else}
                                                <b style="color: red;">No Birth Certificate found</b>
                                            {/if}
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
                                        
                                            {*display Image file*}
                                            <div class="panel-image-holder">
                                            {if $obj->mPrimarycertUrl}
                                                <img src="{$obj->mPrimarycertUrl}" alt="Primary Certificate">
                                            {else}
                                                <b style="color: red;">No Primary Certificate found</b>
                                            {/if}
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                                 <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><b>O-Level Certificate [1]</b></a>
                                        </h4>
                                    </div>
                                    <div id="collapseFour" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            
                                                
                                                <div class="panel-image-holder">
                                                {if $obj->mO_LevelcertUrl}
                                                    <img src="{$obj->mO_LevelcertUrl}" alt="O level certificate">
                                                {else}
                                                <b style="color: red;">O level certificate not found</b>
                                                {/if}
                                                </div>
                                                
                                            
                                                <h3></h3>
                                            
                                        </div>
                                    </div>
                                </div>



                                 <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><b>O-Level Certificate [2]</b></a>
                                        </h4>
                                    </div>
                                    <div id="collapseFive" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            
                                                
                                                <div class="panel-image-holder">
                                                {if $obj->mO_Levelcert2Url}
                                                    <img src="{$obj->mO_Levelcert2Url}" alt="">
                                                {else}
                                                    <b style="color: red;">Second O level certificate not found</b>
                                                {/if}
                                                </div>
                                                
                                            
                                                <h3></h3>
                                            
                                        </div>
                                    </div>
                                </div>
                                 <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><b>A-Level Certificate </b></a>
                                        </h4>
                                    </div>
                                    <div id="collapseSix" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            
                                                
                                                <div class="panel-image-holder">
                                                {if $obj->mA_LevelcertUrl}
                                                    <img src="{$obj->mA_LevelcertUrl}" alt="A level certificate">
                                                {else}
                                                    <b style="color: red;">Degree certificate not found</b>
                                                {/if}
                                                </div>
                                                
                                            
                                                <h3></h3>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"><b>Professional Certificate</b></a>
                                        </h4>
                                    </div>
                                    <div id="collapseSeven" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            
                                                
                                                <div class="panel-image-holder">
                                                {if $obj->mProcertUrl}
                                                    <img src="{$obj->mProcertUrl}" alt="professional certificate">
                                                {else}
                                                    <b style="color: red;">Professional certificate not found</b>
                                                {/if}
                                                </div>
                                                
                                            
                                                <h3></h3>
                                            
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

            {/if}
            
            </div>
