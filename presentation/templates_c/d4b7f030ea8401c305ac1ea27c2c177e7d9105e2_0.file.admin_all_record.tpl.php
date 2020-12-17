<?php
/* Smarty version 3.1.33, created on 2020-11-16 17:02:27
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_all_record.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fb2a293bf4476_76212967',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4b7f030ea8401c305ac1ea27c2c177e7d9105e2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_all_record.tpl',
      1 => 1605542544,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fb2a293bf4476_76212967 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"applicants_data",'assign'=>"obj"),$_smarty_tpl);?>





    <?php if (!$_smarty_tpl->tpl_vars['obj']->value->mAllApplicantsRecordNull) {?>
    <p style="color: red;">There are no admission Records found for the specified year! <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkApplicantsData;?>
"><b>Back</b></a> </p><br>
    <?php } else { ?>

            <!-- stop  -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-folder-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mNurseryApplicantsRecordsCount;?>
</div>
                                    <div>Nursery Applicants</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mNurserySpecific;?>
">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-folder-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecordsCount;?>
</div>
                                    <div>Primary Applicants</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimarySpecific;?>
">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-folder-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSecondaryApplicantsRecordsCount;?>
</div>
                                    <div>Secondary Applicants</div>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSecondarySpecific;?>
">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mTeacherApplicantsRecordsCount;?>
</div>
                                    <div>Teaching Applicants</div>
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mNumberWaitingForActivation != 0) {?>
                                    <div><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mActivationSpecific;?>
" style="color: white;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mNumberWaitingForActivation;?>
 staff for ACTIVATION</a></div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTeacherSpecific;?>
">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


    


            <div class="row">
                       
                <div class="col-lg-12">
                
                    <div class="panel panel-default">
                    
                        <div class="panel-heading">
                            DataTables showing application records
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Fathers Phone</th>
                                        <th>Applied On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAllApplicantsRecords) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                    <tr class="odd gradeX">
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['firstname'];?>

                                            <span>&nbsp;</span>
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['surname'];?>

                                        </td>
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['email'];?>

                                        </td>
                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['f_phone'];?>

                                        </td>
                                        <td class="center">
                                        
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['applied_on'];?>

                                        </td>
                                        <td class="center">
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['status'];?>
 | 
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_to_student_profile'];?>
">View Details</a>
                                        </td>
                                    </tr>
                                <?php
}
}
?>
                                  
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Search Applications by Date</h4>
                                <p>
                                 <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkApplicantsData;?>
">
                                    <input type="date" name="session_date" value="">
                                    <input type="submit" name="any_date" value="Get Record">
                                </form>
                                </p>
                                

                                
                                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkApplicantsData;?>
">
                                    <input type="hidden" name="showSubRecords">

                                    <input type="submit" name="showSubRecordsBtn" value="Show Sub-Records" class="btn btn-default btn-lg">

                                    <input type="submit" name="hideSubRecordsBtn" value="Hide Sub-Records" class="btn btn-default btn-lg">

                                </form>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php }
}
}
