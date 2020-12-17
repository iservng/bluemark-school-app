<?php
/* Smarty version 3.1.33, created on 2020-11-22 16:02:16
  from 'C:\xampp\htdocs\bluemark\presentation\templates\teachers_list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fba7d78a69424_47816864',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4da74fa7617cc8bfa4470668d1b96b5f3d88485c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\teachers_list.tpl',
      1 => 1606057331,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fba7d78a69424_47816864 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
?>
 <?php echo smarty_function_load_presentation_object(array('filename'=>"teachers_list",'assign'=>"obj"),$_smarty_tpl);?>

 

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


<?php if ($_smarty_tpl->tpl_vars['obj']->value->mListWarningMsg) {?>
    <div class="panel-heading">
        <span style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mListWarningMsg;?>
</span>
    </div>
<?php } else { ?>
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
                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mListOfTeachersCount > 0) {?>
                                                <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mListOfTeachers) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                                    <tr>
                                                        <td><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfTeachers[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['employed_staff_profile_link'];?>
">
                                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfTeachers[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</a>
                                                        </td>
                                                        <td>
                                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfTeachers[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['phone'];?>

                                                        </td>
                                                        <td>
                                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfTeachers[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['email'];?>

                                                            
                                                        </td>
                                                    </tr>
                                                    <?php
}
}
?>
                                                <?php }?>
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
                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mListOfAdminTeachersCount > 0) {?>
                                                <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mListOfAdminTeachers) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                                    <tr>
                                                        <td>
                                                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfAdminTeachers[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['employed_staff_profile_link'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfAdminTeachers[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</a>
                                                        </td>
                                                        <td>
                                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfAdminTeachers[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['phone'];?>

                                                        </td>
                                                        <td>
                                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mListOfAdminTeachers[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['email'];?>

                                                            
                                                        </td>
                                                    </tr>
                                                    <?php
}
}
?>
                                                <?php }?>
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
<?php }?>


































 

            </div><?php }
}
