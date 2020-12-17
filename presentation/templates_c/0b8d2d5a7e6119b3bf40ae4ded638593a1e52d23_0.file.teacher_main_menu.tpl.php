<?php
/* Smarty version 3.1.33, created on 2020-10-20 13:06:32
  from 'C:\xampp\htdocs\bluemark\presentation\templates\teacher_main_menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f8ed2c8767b17_84639977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b8d2d5a7e6119b3bf40ae4ded638593a1e52d23' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\teacher_main_menu.tpl',
      1 => 1603195587,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f8ed2c8767b17_84639977 (Smarty_Internal_Template $_smarty_tpl) {
?>  <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href=""><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>



                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i>Lesson Plan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">

                                <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                                    <li>
                                        <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_name'];?>
 <span class="fa arrow"></span> </a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#mylessonplan_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_id'];?>
">Write Lesson Plan</a>
                                            </li>

                                            <li>
                                                <a href="#" data-toggle="modal" data-target="#myViewlessonplan_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_id'];?>
"> View Lesson Note</a>
                                            </li>

                                        </ul>
                                    </li>
                                <?php
}
}
?>
                            
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>





                        








                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> My Class<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            
                                <?php
$__section_j_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses) ? count($_loop) : max(0, (int) $_loop));
$__section_j_1_total = $__section_j_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_j'] = new Smarty_Variable(array());
if ($__section_j_1_total !== 0) {
for ($__section_j_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] = 0; $__section_j_1_iteration <= $__section_j_1_total; $__section_j_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']++){
?>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
 <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myAddStudentModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">Add Student</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myDeleteStudentModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_name'];?>
">
                                                Delete Student
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myAddSubjectModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                                                Add Subject
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_out_link'];?>
">
                                                Show Subjects
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['list_out_members'];?>
">Take Attendance</a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#myAddFirstCAModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                                                Record First CA
                                            </a>
                                            
                                        </li>
                                        <li>
                                        
                                            <a href="#" data-toggle="modal" data-target="#myAddSecondCAModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                                                Record Second CA
                                            </a>
                                        </li>
                                        <li>
                                        
                                            <a href="#" data-toggle="modal" data-target="#myAddThirdCAModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                                                Record Third CA
                                            </a>
                                        </li>
                                        <li>
                                                                                        <a href="#" data-toggle="modal" data-target="#myAddExamsCAModal_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignedClasses[(isset($_smarty_tpl->tpl_vars['__smarty_section_j']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_j']->value['index'] : null)]['class_id'];?>
">
                                                Record Exam Score
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                                <?php
}
}
?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>




















                        
                                            </ul>
                </div><?php }
}
