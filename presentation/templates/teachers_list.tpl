 {load_presentation_object filename="teachers_list" assign="obj"}
 

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Admin School Teacher List</h1>
        </div>
                <!-- /.col-lg-12 -->
        <div class="col-lg-12">
            <b> 
                <a href="">Back</a> | School Settings should be done on or befor School's term start date 
            </b>
            <hr>
        </div>
    </div>


{if $obj->mListWarningMsg}
    <div class="panel-heading">
        <span style="color: red;">{$obj->mListWarningMsg}</span>
    </div>
{else}
    <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            List of teachers

                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">Staff</a>
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
                            
                                    <hr><h4>Updated Staff List</h4>
                                    <hr>
                                    <p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                {if $obj->mListOfTeachersCount > 0}
                                                {section name=i loop=$obj->mListOfTeachers}
                                                    <tr>
                                                        <td><a href="{$obj->mListOfTeachers[i].employed_staff_profile_link}">
                                                            {$obj->mListOfTeachers[i].name}</a>
                                                        </td>
                                                        <td>
                                                            {$obj->mListOfTeachers[i].phone}
                                                        </td>
                                                        <td>
                                                            {$obj->mListOfTeachers[i].email}
                                                            
                                                        </td>
                                                    </tr>
                                                    {/section}
                                                {/if}
                                                </tbody>
                                            </table>
                                        </div>
                                    </p>
                                    
                                    
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>Add or Remove subject from the  School's list of subjects</h4>
                                    <p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Subject Name</th>
                                                        <th>Action</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                        some here
                                                        </td>
                                                        <td>
                                                            <a href="">
                                                            Delete
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="messages">
                                    <h4>Add Class Tab</h4>
                                    <p>

                                    {* --------------------------------------- *}
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>What Admision Year is this?</h4>
                                    <p>
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
                            General list of admin staff
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#home-pills" data-toggle="tab">Admin Staff</a>
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

                                    <hr><h4>List of admin staff</h4><hr>
                                    
                                    <p>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                    
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                {if $obj->mListOfAdminTeachersCount > 0}
                                                {section name=i loop=$obj->mListOfAdminTeachers}
                                                    <tr>
                                                        <td>
                                                            <a href="{$obj->mListOfAdminTeachers[i].employed_staff_profile_link}">{$obj->mListOfAdminTeachers[i].name}</a>
                                                        </td>
                                                        <td>
                                                            {$obj->mListOfAdminTeachers[i].phone}
                                                        </td>
                                                        <td>
                                                            {$obj->mListOfAdminTeachers[i].email}
                                                            
                                                        </td>
                                                    </tr>
                                                    {/section}
                                                {/if}
                                                </tbody>
                                            </table>
                                        </div>

                                    </p>
                                    
                                </div>
                                <div class="tab-pane fade" id="profile-pills">
                                    <h4>Profile Tab</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
{/if}


































 

            </div>