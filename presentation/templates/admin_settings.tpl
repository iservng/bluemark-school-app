 {load_presentation_object filename="admin_setting" assign="obj"}
 

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Admin School Settings</h1>
        </div>
                <!-- /.col-lg-12// -->
        <div class="col-lg-12">
                <b> 
                <a href="">Back</a> | School Settings should be done on or befor School's term start date </b>
                <hr>
        </div>
        <div class="col-lg-12">
                <b> 
                <a href="">Current Term Begins</a> - {$obj->mTermStarts} <span>&nbsp;</span>
                 <span>&nbsp;</span>
                 <span>&nbsp;</span>
                  <span>&nbsp;</span>
                  <a href="">Approximate vacation date</a> - {$obj->mTermStops} 
                </b>
                <hr>
        </div>
        {if $obj->mNewSubjectError eq true}
            <div class="col-lg-12">
                <b style="color: red;"> 
                {$obj->mNewSubjectErrorMsg} 
                </b>
                <hr>
            </div>
        {/if}
    </div>


    {if $obj->mNewSubjectSuccessMsg neq ''}
        <div class="col-lg-12">
                <b style="color: green;"> 
                {$obj->mNewSubjectSuccessMsg} 
                </b>
                <hr>
        </div>
    {/if}

{* The warning that guids to error in not selecting the department *}
    {if $obj->mDepartmentIdError eq 1}
        <div class="col-lg-12">
            <b style="color: red;"> 
                {$obj->mDepartmentIdErrorMsg} 
            </b>
            <hr>
        </div>
    {/if}
{* The warning that guids to error in not entering the correct class name *}
    {if $obj->mNewClassError eq 1}
        <div class="col-lg-12">
            <b style="color: red;"> 
                {$obj->mNewClassErrorMsg} 
            </b>
            <hr>
        </div>
    {/if}

{if $obj->mNewClassSuccessMsg}
<div class="col-lg-12">
            <b style="color: green;"> 
                {$obj->mNewClassSuccessMsg} 
            </b>
            <hr>
        </div>
{/if}


{* mAdmissionSessionMsg *}
{if $obj->mAdmissionSessionMsg}
<div class="col-lg-12">
            <b style="color: green;"> 
                {$obj->mAdmissionSessionMsg} 
            </b>
            <hr>
        </div>
{/if}


     <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            Basic Termly Settings

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Date</a>
                                </li>
                                <li><a href="#profile" data-toggle="tab">Add Subject</a>
                                </li>
                                <li><a href="#messages" data-toggle="tab">Add Class</a>
                                </li>
                                <li><a href="#settings" data-toggle="tab">Set Admision Date</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home">
                                {if $obj->mAllGood == false}
                                    <hr><h4>Update Date Term Begins</h4>
                                    <hr>
                                    <p>
                                        <div class="col-lg-6">
                                            <form method="post" action="{$obj->mLinkToAdminSettings}">
                                                <div class="form-group">
                                                {if $obj->mCurrentTermStartDateError == 1}
                                                    <p style="color: red;">{$obj->mCurrentTermStartDateErrorMsg}</p>
                                                {/if}
                                                    <label>Select date the current term begins</label>
                                                    <input type="date" name="current_term_start_date" class="form-control">
                                                    <p class="help-block">Select using the arrow on the far right side of the field.</p>
                                                </div>

                                                <div class="form-group">
                                                {if $obj->mCurrentTermNameError == 1}
                                                    <p style="color: red;">Term name should be specified!</p>
                                                {/if}
                                                    <label>Specify what term it is</label>
                                                    <select class="form-control" name="current_term">
                                                        <option value="">&nbsp;</option>
                                                        <option value="First Term">First Term</option>
                                                        <option value="Second Term">Second Term</option>
                                                        <option value="Third Term">Third Term</option>
                                                    </select>
                                                    <p class="help-block">
                                                    Select using the arrow on the far right side of the field.
                                                    </p>
                                                </div>

                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                        <input type="submit" value="Save Changes" name="saveChangesBtn" class="btn btn-primary btn-sm">
                                                    <p class="help-block"></p>
                                                </div>

                                            </form>   
                                        </div>
                                    </p>
                                    {else}
                                    {*The portion that brings feed back to client*}
                                    <h4 style="color: green;">The Date has been registered succesfuly</h4>
                                    <hr>
                                    <p>
                                        All weekly date have also been computed and added accordingly. Have a wonderfull tern session.
                                        

                                    </p>
                                    {/if}
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>Add or Remove subject from the  School's list of subjects</h4>
                                    <p>
            
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        {* <div class="panel-heading">
                            Hover Rows
                        </div> *}
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        {if $obj->mListOfSubject neq ''}
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Subject Name</th>
                                            <th>Action</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {section name=i loop=$obj->mListOfSubject}
                                        <tr>
                                           
                                            <td>{$obj->mListOfSubject[i].name}</td>
                                            <td><a href="{$obj->mListOfSubject[i].link_delete_subject}">Delete</a></td>
                                            
                                        </tr>
                                    {/section}
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <h4>Add a new subject</h4>
                            <form method="post" action="{$obj->mLinkToAdminSettings}">
                                <input type="text" name="newSubject" class="">
                                <input type="submit" name="newSubjectBtn" class="" value="Add Subject">
                            </form>
                            {else}
                            <p>No subjects found in our system</p>
                            {/if}
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>Add Class Tab</h4>
                                    <p>

                                    {* --------------------------------------- *}
                                    <div class="col-lg-12">
                    <div class="panel panel-default">
                        {* <div class="panel-heading">
                            Hover Rows
                        </div> *}
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        {if $obj->mListOfClasses neq ''}
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Class Name</th>
                                            <th>Action</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {section name=i loop=$obj->mListOfClasses}
                                        <tr>
                                           
                                            <td>
                                                {$obj->mListOfClasses[i].class_name}
                                            </td>
                                            <td>
                                                <a href="{$obj->mListOfClasses[i].link_delete_class}">Delete</a>
                                            </td>
                                            
                                        </tr>
                                    {/section}
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <!-- /.table-responsive -->
                            <h4> <b style="color: #337ab7">Add a new class</b></h4>
                             <hr>
                        
                            <form method="post" action="{$obj->mLinkToAdminSettings}">
                                <label>Select the department/section</label><br>
                                {section name=i loop=$obj->mListOfDepartment}
                                    
                                    <input type="radio" name="schoolDepartment" required value="{$obj->mListOfDepartment[i].department_id}">{$obj->mListOfDepartment[i].name} <span>&nbsp;</span>  <span>&nbsp;</span>

                                {/section}

                                    <br><br>
                                    <label>Enter the new class name</label><br>
                                    <input type="text" name="newClass" class="form-control" required>

                                    

                                    <br><br>
                                    <label>Select base class</label><br>

                                    {if $obj->mSourceClassCount > 0}
                                        <select name="classExtension" class="form-control" required>
                                            <option value="">-Select-</option>
                                            {section name=i loop=$obj->mSourceClass}
                                                <option value="{$obj->mSourceClass[i].class_source_id}"> {$obj->mSourceClass[i].class_name} </option>
                                            {/section}
                                        </select>
                                    {/if}
                                    
                                    
                                    <br><br><br>
                                    <input type="submit" name="newClassBtn" class="btn btn-primary" value="Add Class">
                            </form>
                            {else}
                            <p>No Class found in our system</p>
                            {/if}
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                                    {* --------------------------------------- *}
                                    
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>What Admision Year is this?</h4>
                                    <p>
                                       <div class="col-lg-6">
                                            <form method="post" action="{$obj->mLinkToAdminSettings}">
                                                <div class="form-group">

                                                
                                                {if $obj->mCurrentAdmissionErrMsg}
                                                    <b style="color: red;">{$obj->mCurrentAdmissionErrMsg}</b>
                                                {/if}
                                                
                                                    <label>Select date to set the date for the current admission year.</label>
                                                    <input type="date" name="current_admission_start_date" class="form-control">
                                                    <p class="help-block">Select using the arrow on the far right side of the field.</p>

                                                </div>

                                                

                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                        <input type="submit" value="Set Admission Date" name="setSessionBtn" class="btn btn-primary btn-sm">
                                                    <p class="help-block"></p>
                                                </div>

                                            </form>   
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
                            General Termly Settings
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">Add New Admin</a>
                                </li>
                                <li><a href="#profile-pills" data-toggle="tab">Profile</a>
                                </li>
                                <li><a href="#messages-pills" data-toggle="tab">Messages</a>
                                </li>
                                <li><a href="#settings-pills" data-toggle="tab">Settings</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="home-pills">
                                    <hr><h4>Enter new admin email and password</h4><hr>

                                    {if $obj->mNewAdminErrorMsg}
                                        <hr><h4 style="color: red;"> {$obj->mNewAdminErrorMsg}</h4><hr>
                                    {/if}



                                    {* $this->mNewAdminSuccessMsg *}

                                    {if $obj->mNewAdminSuccessMsg}
                                        <hr><h4 style="color: green;"> {$obj->mNewAdminSuccessMsg}</h4><hr>
                                    {/if}
                                    
                                    <p>
                                        <form method="post" action="{$obj->mLinkToAdminSettings}">
                                                <div class="form-group">
                                                <label>Enter Admin Email</label>
                                                    <input type="email" name="admin_email" class="form-control" required>

                                                    
                                                </div>
                                                <div class="form-group">
                                                 <label>Admin User-Password</label>
                                                    <input type="password" name="admin_pass" class="form-control" required>
                                                </div>
                                                 <div class="form-group">
                                                 <label>Select Admin Type</label>
                                                    {* <input type="password" name="admin_pass" class="form-control" required> *}
                                                    <select class="form-control" 
                                                    name="admin_type">
                                                    <option> -Select-</option>
                                                        {section name=k loop=$obj->adminLevels}
                                                            <option value="{$smarty.section.k.index + 1}">{$obj->adminLevels[k]}{$smarty.section.k.index + 1}</option>
                                                        {/section}
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                 <label>&nbsp;</label>
                                                    <input type="submit" name="add_new_admin_now" class="btn btn-primary btn-md" value="Add Admin">
                                                </div>
                                        </form>
                                    </p>
                                    <p><br><i>Note</i><br>Passwords must be alphanumericals with one of the letters in capital and at least 6 characters and above. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="profile-pills">
                                    <h4>Request for PIN Tab</h4><hr>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<hr>

                                    <form method="post" action="{$obj->mLinkToAdminSettings}">
                                        <input type="submit">
                                    </form>

{* vv *}

                                    </p>
                                </div>
                                <div class="tab-pane fade" id="messages-pills">
                                    <h4>Messages Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div class="tab-pane fade" id="settings-pills">
                                    <h4>Settings Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
            </div>



































 

            </div>