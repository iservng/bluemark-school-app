<?php
/* Smarty version 3.1.33, created on 2020-04-12 14:26:41
  from 'C:\xampp\htdocs\bluemark\presentation\templates\invit_teacher_actions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e931711839456_17064214',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c819bbb384e7cab46f479c7964a7454eac87d54f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\invit_teacher_actions.tpl',
      1 => 1586697657,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e931711839456_17064214 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class="dropdown-menu pull-right" role="menu" style="padding: 20px;">
    <form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherProfile;?>
" method="post">
    <input type="hidden" name="teacher_id" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mTeacher_Id;?>
">
        <li><b>Set Interview Date</b></li>
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mInterviewDateError == 1) {?>
            <li><small style="color: red;">Select an interview date</small></li>
        <?php }?>
        <li><input type="date" name="inteview_date" required class="form-control"></li><br>



        <li><b>Set Interview Time</b></li>
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mInterviewTimeError == 1) {?>
            <li><small style="color: red;">Set an interview time</small></li>
        <?php }?>
        <li><input type="time" name="inteview_time" required class="form-control"></li>
        
        <li class="divider"></li>
        
        <li><input type="submit" name="inviteTeacher" value="SeT Interview" class="btn btn-success"></li>
    </form>
</ul><?php }
}
