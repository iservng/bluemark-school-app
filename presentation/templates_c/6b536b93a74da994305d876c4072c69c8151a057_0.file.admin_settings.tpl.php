<?php
/* Smarty version 3.1.33, created on 2020-12-05 13:00:18
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_settings.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fcb7652941048_88198663',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6b536b93a74da994305d876c4072c69c8151a057' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_settings.tpl',
      1 => 1607156379,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fcb7652941048_88198663 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
?>
 <?php echo smarty_function_load_presentation_object(array('filename'=>"admin_setting",'assign'=>"obj"),$_smarty_tpl);?>

 

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
                <a href="">Current Term Begins</a> - <?php echo $_smarty_tpl->tpl_vars['obj']->value->mTermStarts;?>
 <span>&nbsp;</span>
                 <span>&nbsp;</span>
                 <span>&nbsp;</span>
                  <span>&nbsp;</span>
                  <a href="">Approximate vacation date</a> - <?php echo $_smarty_tpl->tpl_vars['obj']->value->mTermStops;?>
 
                </b>
                <hr>
        </div>
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mNewSubjectError == true) {?>
            <div class="col-lg-12">
                <b style="color: red;"> 
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mNewSubjectErrorMsg;?>
 
                </b>
                <hr>
            </div>
        <?php }?>
    </div>


    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mNewSubjectSuccessMsg != '') {?>
        <div class="col-lg-12">
                <b style="color: green;"> 
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mNewSubjectSuccessMsg;?>
 
                </b>
                <hr>
        </div>
    <?php }?>

    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mDepartmentIdError == 1) {?>
        <div class="col-lg-12">
            <b style="color: red;"> 
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mDepartmentIdErrorMsg;?>
 
            </b>
            <hr>
        </div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mNewClassError == 1) {?>
        <div class="col-lg-12">
            <b style="color: red;"> 
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mNewClassErrorMsg;?>
 
            </b>
            <hr>
        </div>
    <?php }?>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mNewClassSuccessMsg) {?>
<div class="col-lg-12">
            <b style="color: green;"> 
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mNewClassSuccessMsg;?>
 
            </b>
            <hr>
        </div>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['obj']->value->mAdmissionSessionMsg) {?>
<div class="col-lg-12">
            <b style="color: green;"> 
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAdmissionSessionMsg;?>
 
            </b>
            <hr>
        </div>
<?php }?>


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
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAllGood == false) {?>
                                    <hr><h4>Update Date Term Begins</h4>
                                    <hr>
                                    <p>
                                        <div class="col-lg-6">
                                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdminSettings;?>
">
                                                <div class="form-group">
                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCurrentTermStartDateError == 1) {?>
                                                    <p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCurrentTermStartDateErrorMsg;?>
</p>
                                                <?php }?>
                                                    <label>Select date the current term begins</label>
                                                    <input type="date" name="current_term_start_date" class="form-control">
                                                    <p class="help-block">Select using the arrow on the far right side of the field.</p>
                                                </div>

                                                <div class="form-group">
                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCurrentTermNameError == 1) {?>
                                                    <p style="color: red;">Term name should be specified!</p>
                                                <?php }?>
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
                                    <?php } else { ?>
                                                                        <h4 style="color: green;">The Date has been registered succesfuly</h4>
                                    <hr>
                                    <p>
                                        All weekly date have also been computed and added accordingly. Have a wonderfull tern session.
                                        

                                    </p>
                                    <?php }?>
                                </div>
                                <div class="tab-pane fade" id="profile">
                                    <h4>Add or Remove subject from the  School's list of subjects</h4>
                                    <p>
            
                <div class="col-lg-12">
                    <div class="panel panel-default">
                                                <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mListOfSubject != '') {?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Subject Name</th>
                                            <th>Action</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mListOfSubject) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                        <tr>
                                           
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfSubject[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</td>
                                            <td><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfSubject[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_delete_subject'];?>
">Delete</a></td>
                                            
                                        </tr>
                                    <?php
}
}
?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <h4>Add a new subject</h4>
                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdminSettings;?>
">
                                <input type="text" name="newSubject" class="">
                                <input type="submit" name="newSubjectBtn" class="" value="Add Subject">
                            </form>
                            <?php } else { ?>
                            <p>No subjects found in our system</p>
                            <?php }?>
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

                                                                        <div class="col-lg-12">
                    <div class="panel panel-default">
                                                <!-- /.panel-heading -->
                        <div class="panel-body">
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mListOfClasses != '') {?>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Class Name</th>
                                            <th>Action</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mListOfClasses) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                        <tr>
                                           
                                            <td>
                                                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_name'];?>

                                            </td>
                                            <td>
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_delete_class'];?>
">Delete</a>
                                            </td>
                                            
                                        </tr>
                                    <?php
}
}
?>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                            <!-- /.table-responsive -->
                            <h4> <b style="color: #337ab7">Add a new class</b></h4>
                             <hr>
                        
                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdminSettings;?>
">
                                <label>Select the department/section</label><br>
                                <?php
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mListOfDepartment) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total !== 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                    
                                    <input type="radio" name="schoolDepartment" required value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfDepartment[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['department_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfDepartment[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
 <span>&nbsp;</span>  <span>&nbsp;</span>

                                <?php
}
}
?>

                                    <br><br>
                                    <label>Enter the new class name</label><br>
                                    <input type="text" name="newClass" class="form-control" required>

                                    

                                    <br><br>
                                    <label>Select base class</label><br>

                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSourceClassCount > 0) {?>
                                        <select name="classExtension" class="form-control" required>
                                            <option value="">-Select-</option>
                                            <?php
$__section_i_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mSourceClass) ? count($_loop) : max(0, (int) $_loop));
$__section_i_3_total = $__section_i_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_3_total !== 0) {
for ($__section_i_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_3_iteration <= $__section_i_3_total; $__section_i_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                                <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSourceClass[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_source_id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSourceClass[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_name'];?>
 </option>
                                            <?php
}
}
?>
                                        </select>
                                    <?php }?>
                                    
                                    
                                    <br><br><br>
                                    <input type="submit" name="newClassBtn" class="btn btn-primary" value="Add Class">
                            </form>
                            <?php } else { ?>
                            <p>No Class found in our system</p>
                            <?php }?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                                                                        
                                    </p>
                                </div>
                                <div class="tab-pane fade" id="settings">
                                    <h4>What Admision Year is this?</h4>
                                    <p>
                                       <div class="col-lg-6">
                                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdminSettings;?>
">
                                                <div class="form-group">

                                                
                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mCurrentAdmissionErrMsg) {?>
                                                    <b style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mCurrentAdmissionErrMsg;?>
</b>
                                                <?php }?>
                                                
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

                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mNewAdminErrorMsg) {?>
                                        <hr><h4 style="color: red;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mNewAdminErrorMsg;?>
</h4><hr>
                                    <?php }?>



                                    
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mNewAdminSuccessMsg) {?>
                                        <hr><h4 style="color: green;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mNewAdminSuccessMsg;?>
</h4><hr>
                                    <?php }?>
                                    
                                    <p>
                                        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdminSettings;?>
">
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
                                                                                                        <select class="form-control" 
                                                    name="admin_type">
                                                    <option> -Select-</option>
                                                        <?php
$__section_k_4_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->adminLevels) ? count($_loop) : max(0, (int) $_loop));
$__section_k_4_total = $__section_k_4_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_4_total !== 0) {
for ($__section_k_4_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_4_iteration <= $__section_k_4_total; $__section_k_4_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
?>
                                                            <option value="<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)+1;?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->adminLevels[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)];
echo (isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)+1;?>
</option>
                                                        <?php
}
}
?>
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

                                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdminSettings;?>
">
                                        <input type="submit">
                                    </form>


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



































 

            </div><?php }
}
