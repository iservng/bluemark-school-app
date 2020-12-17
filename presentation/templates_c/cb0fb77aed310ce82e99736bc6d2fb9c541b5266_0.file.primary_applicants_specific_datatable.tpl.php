<?php
/* Smarty version 3.1.33, created on 2020-04-05 09:21:56
  from 'C:\xampp\htdocs\bluemark\presentation\templates\primary_applicants_specific_datatable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e899524889432_82266325',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cb0fb77aed310ce82e99736bc6d2fb9c541b5266' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\primary_applicants_specific_datatable.tpl',
      1 => 1586074886,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e899524889432_82266325 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
?>
 <?php echo smarty_function_load_presentation_object(array('filename'=>"primary_specific",'assign'=>"obj"),$_smarty_tpl);?>

 




<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                <b> <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkApplicantsData;?>
">Back</a> | Applicants into Primary Section</b>
                <hr>
                </div>
            </div>

 <?php if ($_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecordsCount <= 0) {?>

 <p style="color: red;">There are no admission Records found for the current or specified year! <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkApplicantsData;?>
"><b>Back</b></a> </p><br>

 <?php } else { ?>



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
                                        <th>Phone</th>
                                        <th>Applied On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                    <tr class="odd gradeX">

                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['firstname'];?>

                                            <span>&nbsp;</span>
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['surname'];?>

                                        </td>

                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['email'];?>

                                        </td>

                                        <td>
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['f_phone'];?>

                                        </td>

                                        <td class="center">
                                        
                                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['applied_on'];?>

                                        </td>

                                        <td class="center">
                                                                                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPrimaryApplicantsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_to_student_profile'];?>
">View</a>
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
                                 <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToPrimarySpecificData;?>
">
                                    <input type="date" name="primary_specific_session_date" value="">
                                    <input type="submit" name="any_date" value="Get Record">
                                </form>
                                </p>
                                <p>DataTables is a very flexible, advanced tables. In SB Admin, we are using a specialized version of DataTables built for Bluemark. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://bluemark.com/">https://datatables.net/</a>.</p>

                                
                                                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <?php }?>

            </div><?php }
}
