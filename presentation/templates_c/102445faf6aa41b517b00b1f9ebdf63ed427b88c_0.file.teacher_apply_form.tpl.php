<?php
/* Smarty version 3.1.33, created on 2020-03-07 01:58:46
  from 'C:\xampp\htdocs\bluemark\presentation\templates\teacher_apply_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e62f1c685d219_82596909',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '102445faf6aa41b517b00b1f9ebdf63ed427b88c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\teacher_apply_form.tpl',
      1 => 1583542537,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e62f1c685d219_82596909 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
" id="teacher-form" class="mfp-hide white-popup-block white-popup" enctype="multipart/form-data">
	<h3><b>Apply Now</b></h3>
    <hr>
	<fieldset style="border:0;" id="checkinglinee">
		
		<ol>
			<li>
				<label for="name">&nbsp;</label>
                
				<input class="single-input-primary" id="fullname" name="fullname" type="text" placeholder="Enter your full Name" required="" style="border: 1px solid #f7631b;">

                
			</li>
			<li>
				<label for="phoneNumber">&nbsp;</label>
                
				<input class="single-input-primary" id="phoneNumber" name="phoneNumber" type="text" placeholder="Enter your phone number" required="" style="border: 1px solid #f7631b;">

                
			</li>
			<li>
				<label for="emailaddress">&nbsp;</label>
                
				<input class="single-input-primary" id="emailaddress" name="emailaddress" type="email" placeholder="Enter your Email" required="" style="border: 1px solid #f7631b;">

                
			</li>
			
			<li>
				<br>
                <label for="cv"> <b>Upload your well documented CV.</b> </label>
				<input class="single-input-primary" id="cv" name="cv" type="file" placeholder="" required="" style="">
				
                
			</li>
			<br>
            
				<label for="name">&nbsp;</label>
				<input class="genric-btn primary" name="become_teacher" type="submit" value="Submit">
			
			
		</ol>
	</fieldset>
</form><?php }
}
