<?php
/* Smarty version 3.1.33, created on 2020-10-05 10:29:49
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_student_profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f7ae78de63aa9_37504949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '27377b72a4ce71219ade0660a730b11339fb599d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_student_profile.tpl',
      1 => 1601889815,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7ae78de63aa9_37504949 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"student_profile",'assign'=>"obj"),$_smarty_tpl);?>






<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStudentRecordNotFound == false) {?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFullName;?>
 Profile Information
                    </h1>
                    
                </div>
               
            </div>
             <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
"><small>back to admin list</small></a>
             <hr>





















            
            
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFullName;?>
 - <b>Profile Information</b>
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
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPassportUrl;?>
" alt="">
                                                </div>
                                                </td>
                                                <td>
                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsAdmitted == false) {?>
                                                    <b style="color: red;">Process Application</b><br>
                                                    <b style="color: blue;">Section:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSection;?>

                                                    <br>
                                                    <b style="color: blue;">Status:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStatus;?>

                                                    <br>
                                                    <b style="color: blue;">Class Assigned</b>
                                                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassNamee;?>

                                                <?php } else { ?>
                                                <b style="color: green;">Process Completed</b><br>
                                                    <b style="color: blue;">Section:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSection;?>

                                                    <br>
                                                    <b style="color: blue;">Status:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStatus;?>

                                                    <br>
                                                    <b style="color: blue;">Class Assigned</b>
                                                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassNamee;?>


                                                <?php }?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <div style="text-align: center;">
                                                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFullName;?>
 is <br>
                                                    <b><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentAge;?>
 years old</b>
                                                    </div>
                                                </td>
                                                <td>
                                                    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStudentProfileAdmin;?>
">

                                                    <input id="student_id" name="student_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentId;?>
">
                                                    
                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsAdmitted == false) {?>
                                                    <div class="form-group">
                                                    <label for="classAdmit">Enter Class Name</label>
                                        
                                                        <select name="classAdmited" class="form-control">
                                                        <option value=""></option>
                                                        <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mClasses) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?> 
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['school_classes_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_name'];?>
</option>
                                                        <?php
}
}
?>
                                                        </select>

                                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mClassErrMasg) {?>
                                                        <p style="color: red;">
                                                        <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassErrMasg;?>
</p>
                                                        <?php }?>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <input class="btn btn-success btn-sm" type="submit" name="classAdmitedBtn" value="Admit Student">
                                                    </div>
                                                    <?php } else { ?>
                                                     <div class="form-group">
                                                        <input class="btn btn-danger btn-sm" type="submit" name="cancelBtn" value="Cancel Admission">
                                                    </div>

                                                    <?php }?>
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
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mFname;?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Last Name</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSname;?>
 </td>
                                        </tr>
                                        <tr>
                                            <th>Other Name</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOthname;?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Gender</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mGender;?>
 </td>
                                        </tr>
                                        <tr>
                                            <th>Email Address</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mEmailAdd;?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Date of Birth</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mShowDob;?>
 </td>
                                        </tr>
                                        <tr>
                                            <th>State </th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mState;?>
 State </td>
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
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mBloodgroup;?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Genotype</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mGenotype;?>
 </td>
                                        </tr>
                                        <tr>
                                            <th>Allergies</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllergies;?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Defects</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDefect;?>
 </td>
                                        </tr>
                                        <tr>
                                            <th>Immunization</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mImmunize;?>
 </td>
                                        </tr>
                                        <tr>
                                            <th>Other Medical Info</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mOtherMediInfo;?>
</td>
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
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDoctorname;?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Phone Number</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDoctorPhone;?>
 </td>
                                        </tr>
                                        <tr>
                                            <th>Office Address</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDoctorAddress;?>
</td>
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
                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFullName;?>
 - <b>Mom and Dad Information</b>
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
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDadFname;?>
</td>
                                        </tr>
                                        <tr>
                                            <th>Dad Lastname</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDadLastname;?>
 </td>
                                        </tr>
                                        <tr>
                                            <th>Dad Religion</th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDadReligion;?>
 </td>
                                        </tr>
                                        <tr>
                                            <th> <span style="color: #337ab7;">Mom Firstname</span></th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMomFname;?>
</td>
                                        </tr>
                                        <tr>
                                            <th><span style="color: #337ab7;">Mom Lastname</span></th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMomLastname;?>
 </td>
                                        </tr>
                                        <tr>
                                            <th><span style="color: #337ab7;">Mom Religion</span></th>
                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMomReligion;?>
 </td>
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
                                                    <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDadPhone;?>
</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th> <span style="color: #337ab7;">Mom Phone Number</span></th>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMomPhone;?>
</td>
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
                                                    <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDadOccupation;?>
</td>
                                                </tr>
                                                <tr>
                                                    <th>Dad Office Address</th>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDadOfficeAddress;?>
</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th> <span style="color: #337ab7;">Mom Occupation</span></th>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMomOccupation;?>
</td>
                                                </tr>
                                                <tr>
                                                    <th> <span style="color: #337ab7;">Mom Office Address</span></th>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMomOfficeAddress;?>
</td>
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
                                                    <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDadHouseAddress;?>
</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th> <span style="color: #337ab7;">Mom Residential Address</span></th>
                                                    <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMomHouseAddress;?>
</td>
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
            
            












            
             
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentFullName;?>
 - <b>Certificates and Files</b>
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
                                            <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mBirthCertUrl;?>
" alt="">
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
                                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPrimaryCertUrlMsg == '') {?>
                                                                                        <div class="panel-image-holder">
                                                <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryCertUrl;?>
" alt="">
                                            </div>
                                            
                                        <?php } else { ?>
                                                                                        <h3><?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryCertUrlMsg;?>
</h3>
                                        <?php }?>
                                            
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
                                            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mDoctorReportUrlMsg == '') {?>
                                                                                                <div class="panel-image-holder">
                                                    <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mDoctorReportUrl;?>
" alt="">
                                                </div>
                                                
                                            <?php } else { ?>
                                                                                                <h3><?php echo $_smarty_tpl->tpl_vars['obj']->value->mDoctorReportUrlMsg;?>
</h3>
                                            <?php }?> 
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


        <?php } else { ?>

         <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <small style="color: red;"> No record found for the selection made</small> 
                    </h1>
                    
                </div>
               
            </div>
             <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
"><small>back to admin list</small></a>
             <hr>

        <?php }
}
}
