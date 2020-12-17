<?php
/* Smarty version 3.1.33, created on 2020-07-28 12:15:10
  from 'C:\xampp\htdocs\bluemark\presentation\templates\student_teacher_mini_info.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f2008bea78ab4_71615267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11597a2d568b9abc5beece042f3253014debcbf2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\student_teacher_mini_info.tpl',
      1 => 1595934906,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f2008bea78ab4_71615267 (Smarty_Internal_Template $_smarty_tpl) {
?>
 <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
"> 
   <div class="col-lg-12">
        <div class="" style="">
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mConfirmatoryListCount > 0) {?>
            <div class="" style="">
                <h3><b style="color: #337ab7;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentName;?>
</b></h3>
                
                <p style="">Teacher's student profile information</p>
            </div>

            <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                   
                    </b>  
                </h4>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
        
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                
                                <th><b style="color: #337ab7;">Passport</b></th>
                                <th><b style="color: #337ab7;">Bio-Data</b></th>

                            </tr>
                        </thead>
                        <tbody> 
                            <tr>
                                
                                <td>
                                    <div style="width: 100px; height: 120px; border: 1px solid #ccc; box-shadow: 2px 2px 12px 0px #333;" >
                                        <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mPassportUrl;?>
" style="width: 100%; height: 100%;">
                                    </div>
                                </td>
                                <td>
                                    <b>First Name:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['firstname'];?>
<br>
                                    <b>Date of Birth:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['dob'];?>
<br>
                                    <b>Surname:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['surname'];?>
<br>
                                    <b>Middle Name:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mOthername;?>
<br>
                                    <b>Gender:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mGender;?>
<br>

                                    <b>Email:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['email'];?>
<br>
                                    <b>Reg Number:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['reg_number'];?>
<br>
                                    <b>Address 1:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['f_address'];?>
<br>
                                    <b>Address 2:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['m_address'];?>

                                    <br><br>
                                    <h4>
                                        <b style="color: #337ab7;"> 
                                            Class 
                                        </b>
                                        
                                    </h4>
                                    <hr>
                                    <b>Admitted Class:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassName_admited['class_name'];?>
<br>
                                    <b>Current Class:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassName_admited['class_name'];?>
<br>

                                    <br>
                                    <h4>
                                        <b style="color: #337ab7;"> 
                                            Parent 
                                        </b>

                                    </h4>
                                    <hr>
                                    <b>Father Name:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['f_fname'];?>
     <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['f_lname'];?>
<br>
                                    <b>Mother Name:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['m_fname'];?>
 <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['m_lname'];?>
<br>
                                    
                                    <b>Mother Phone:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['m_phone'];?>
 <br>
                                    <b>Address 1:</b> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentsDetails['f_address'];?>
<br>
                                </td>
                           
                                
                            </tr> 
   
                        </tbody>
                    </table> 
                </div>  
                
            <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body mShowAttendanceReportBtn-->

            <div class="panel-heading" style="padding-bottom: 60px;">
                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" class="btn btn-outline btn-danger">Close</a>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    
                    

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    


                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                   
                    
                    
            </div> 
            <?php } else { ?>

            <div class="panel-heading">
                <div class="panel-heading">
                    <b style="color: red;">No record found for attendance taking!</b>
                </div>
            </div>

            <?php }?>
        </div>
        <!-- /.panel -->
    </div>
</form> <?php }
}
