<?php
/* Smarty version 3.1.33, created on 2020-06-22 11:46:21
  from 'C:\xampp\htdocs\bluemark\presentation\templates\attendance_success.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef08bfd62aca0_07437750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4459899c82075747a3d84863ed5fbaa110ae0cc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\attendance_success.tpl',
      1 => 1592489895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef08bfd62aca0_07437750 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount > 0 && $_smarty_tpl->tpl_vars['obj']->value->mWeeklyPercentagezCount > 0 && $_smarty_tpl->tpl_vars['obj']->value->mEachStudentAttTotalCount > 0) {?>
    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
"> 
   <div class="col-lg-12">
        <div class="" style="">
        
        
            <div class="" style="">
                <h3><b style="color: green; padding: 20px;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClass_name;?>
 Attendance-Report </b></h3>

                <h4><b style="color: #337ab7; padding: 20px;">
                    Male [<?php echo $_smarty_tpl->tpl_vars['obj']->value->mMaleClassCount;?>
] 
                        <span>&nbsp;</span>
                    Female[<?php echo $_smarty_tpl->tpl_vars['obj']->value->mFemaleClassCount;?>
]
                    <span>&nbsp;</span>
                    Total[<?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount;?>
]
                </b></h4>
                
                <p style="padding-left: 20px;">
                    Please not that the report below reflects weekly percentages, attendance totals for each student current member of this class and computations based on previously entered data.
                </p>
            </div>

            <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                        Weekly Percentages for <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClass_name;?>

                    </b>  
                </h4>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
            
        
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Week</th>
                                <th>Date</th>
                                <th>Percentage (%)</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
$__section_k_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAllWeeksPercentage) ? count($_loop) : max(0, (int) $_loop));
$__section_k_0_total = $__section_k_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_0_total !== 0) {
for ($__section_k_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_0_iteration <= $__section_k_0_total; $__section_k_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
?>

                            <tr>

                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllWeeksPercentage[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['week_what'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllWeeksPercentage[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['week_stop'];?>
</td>
                                <td> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAllWeeksPercentage[(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['allpercent'];?>
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

        
            <div class="panel-body">
                <h4> <b style="color: #337ab7;">Student's Attendance Totals for <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClass_name;?>
</b></h4>
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Attendance Totals</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mEachStudentAttTotal) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>

                            <tr>
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mEachStudentAttTotal[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['firstname'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mEachStudentAttTotal[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['surname'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mEachStudentAttTotal[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['eachTotal'];?>
</td>
                            </tr> 

                        <?php
}
}
?>    
                        </tbody>
                    </table> 
                </div> 
            </div>
        
        


            <div class="panel-heading" style="padding-bottom: 45px;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" class="btn btn-outline btn-danger">Close   </a>
            </div> 
            </div>
        
        <!-- /.panel -->
    </div>
</form>
<?php } else { ?>
    <div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-heading">
                <b style="color: red;">No record found for attendance percentage!</b>
                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" class="btn btn-outline btn-primary">Got It</a>
            </div>
        </div>
    </div>
</div>
<?php }
}
}
