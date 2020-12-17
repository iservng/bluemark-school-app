<?php
/* Smarty version 3.1.33, created on 2020-11-22 16:09:45
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_teacher_profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fba7f3957e704_01553617',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9dc69624b4ceaa4288b7a7be604a905af7232e4e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_teacher_profile.tpl',
      1 => 1606057781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fba7f3957e704_01553617 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"teacher_profile",'assign'=>"obj"),$_smarty_tpl);?>







        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mGender;?>
  <?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
 </h1>
                    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdminList;?>
" class="genric-btn primary-border small">Back to admin list</a> | Remember to logout when done! <?php echo $_smarty_tpl->tpl_vars['obj']->value->mTesting;?>


                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProcessSuccessMsg) {?>
                        <b style="color: green;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProcessSuccessMsg;?>
</b>
                    <?php }?>
                    <hr>

                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProcessErrorMsg) {?>
                        <b style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProcessErrorMsg;?>
</b>
                    <?php }?>
                    <hr>
                </div>
                <!-- /.col-lg-12 -->
            </div>



            <div class="row">
                <div class="col-lg-8">

                <!-- stop here -->
                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mInviteForInterviewBar == true) {?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i><b style="color: blue;"> Invite <?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
 for Interview action menu</b>  
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mInterviewContentCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                    
                                </div>
                            </div>
                        </div>
                       
                         
                    </div>
                    <?php }?>
                    <!-- /.panel -->


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-file-o fa-fw"></i><?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
 <b>Curriculum Vitea</b>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mActionContentCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            
                            <div class="cvDiv" style="overflow: scroll;"> 
                                <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCvUrl;?>
" alt=""> 
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
                            <i class="fa fa-bell fa-fw"></i> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
 <b>Profile</b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">

                                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsUploaded) {?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-user fa-fw"></i> Passport: 
                                    <hr>
                                    <span><div style="width: 126px; height: 126px; box-shadow: 3px 13px 13px 3px gray; text-align: center;" >
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPassportUrl != '') {?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPassportUrl;?>
">
                                    <?php } else { ?>
                                    <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPassportAvater;?>
">
                                    <?php }?>
                                    </div></span>
                                </a>
                            <?php }?>

                                <a href="#" class="list-group-item">
                                    <i class="fa fa-phone fa-fw"></i> Phone: 
                                    <span class="pull-right text-muted small"><em><?php echo $_smarty_tpl->tpl_vars['obj']->value->mPhone;?>
</em>
                                    </span>
                                </a>
                                
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Email:
                                    <span class="pull-right text-muted small"><em><?php echo $_smarty_tpl->tpl_vars['obj']->value->mEmail;?>
</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> Name
                                    <span class="pull-right text-muted small"><em><?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-calendar-o fa-fw"></i> Date:
                                    <span class="pull-right text-muted small"><em><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAppliedDate;?>
</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Time:
                                    <span class="pull-right text-muted small"><em><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAppliedTime;?>
</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-check fa-fw"></i> <b style="color: red">Status</b>:
                                    <span class="pull-right text-muted small"><em><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStatus;?>
</em>
                                    </span>
                                </a>
                                
                                
                            </div>
                            <!-- /.list-group -->
                        
                            
                            <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherProfile;?>
">
                                
                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mStartEmploymentProcess) {?>
                                <input type="submit" name="startBtnAction" value="Start employment process" class="btn btn-default btn-block">
                                <?php }?>

                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mDenyStaff) {?>
                                <input type="submit" name="denyBtnAction" value="Cancel employment" class="btn btn-default btn-block">
                                <?php }?>

                                

                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSuspendStaff) {?>
                                <input type="submit" name="suspendBtnAction" value="Suspend staff" class="btn btn-default btn-block">
                                <?php }?>
                                
                            </form>
                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mActivateStaff) {?>
                                                            <button class="btn btn-default btn-block" data-toggle="modal" data-target="#myModal" style="color: green; font-weight: bold; margin-top: 10px;">
                                Activate staff
                            </button>

                            <?php }?>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                       
                    <!-- /.panel .chat-panel -->
                </div>
                <!-- /.col-lg-4 -->


                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherProfile;?>
">

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Assign Class to <span style="color: #2e6da4;"><b><?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
</b></span></h4>
                                        </div>
                                        <div class="modal-body">

                                        
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
                                    <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mOnlyNurseryClasses) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="classId[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOnlyNurseryClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['school_classes_id'];?>
">
                                                    </label>
                                                </div>
                                            </td> 
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOnlyNurseryClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_name'];?>
</td>
                                            
                                        </tr>
                                    <?php
}
}
?>
                                      
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
                                    <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mOnlyPrimaryClasses) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="classId[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOnlyPrimaryClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['school_classes_id'];?>
">
                                                    </label>
                                                </div>
                                            </td> 
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOnlyPrimaryClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_name'];?>
</td>
                                            
                                        </tr>
                                    <?php
}
}
?>
                                      
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
                                    <?php
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mOnlySecondaryClasses) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total !== 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                        <tr>
                                            <td>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="classId[]" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mOnlySecondaryClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['school_classes_id'];?>
">
                                                    </label>
                                                </div>
                                            </td> 
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOnlySecondaryClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_name'];?>
</td>
                                            
                                        </tr>
                                    <?php
}
}
?>
                                      
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
                                                                            </p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                                            


                                                                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                                                        <input type="hidden" name="teacher_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTeacher_Id;?>
">
                                            <input type="hidden" name="token_csrf_key" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mCsrf_activate;?>
">

                                            <input type="submit" name="activateBtnAction" value="Complete Activation" class="btn btn-primary" style="backgroundcolor: #2e6da4;">
                                        </div>

                                        <form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

            </div>



























            
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsUploaded == true) {?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <?php echo $_smarty_tpl->tpl_vars['obj']->value->mName;?>
 <b>Credentials</b>
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
                                        
                                                                                        <div class="panel-image-holder">
                                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mAddress) {?>
                                                                                                <p> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAddress;?>
</p>
                                            <?php } else { ?>
                                                <b style="color: red;">Address not found</b>
                                            <?php }?>
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
                                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mBirthcertUrl != '') {?>
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mBirthcertUrl;?>
" alt="Birth Certificate">
                                                
                                            <?php } else { ?>
                                                <b style="color: red;">No Birth Certificate found</b>
                                            <?php }?>
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
                                        
                                                                                        <div class="panel-image-holder">
                                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPrimarycertUrl) {?>
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimarycertUrl;?>
" alt="Primary Certificate">
                                            <?php } else { ?>
                                                <b style="color: red;">No Primary Certificate found</b>
                                            <?php }?>
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
                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mO_LevelcertUrl) {?>
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mO_LevelcertUrl;?>
" alt="O level certificate">
                                                <?php } else { ?>
                                                <b style="color: red;">O level certificate not found</b>
                                                <?php }?>
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
                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mO_Levelcert2Url) {?>
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mO_Levelcert2Url;?>
" alt="">
                                                <?php } else { ?>
                                                    <b style="color: red;">Second O level certificate not found</b>
                                                <?php }?>
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
                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mA_LevelcertUrl) {?>
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mA_LevelcertUrl;?>
" alt="A level certificate">
                                                <?php } else { ?>
                                                    <b style="color: red;">Degree certificate not found</b>
                                                <?php }?>
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
                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProcertUrl) {?>
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProcertUrl;?>
" alt="professional certificate">
                                                <?php } else { ?>
                                                    <b style="color: red;">Professional certificate not found</b>
                                                <?php }?>
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

            <?php }?>
            
            </div>
<?php }
}
