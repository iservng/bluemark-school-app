<?php
/* Smarty version 3.1.33, created on 2020-12-01 04:37:41
  from 'C:\xampp\htdocs\bluemark\presentation\templates\check_admission_status_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc5ba851ce839_60186267',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e5cae336e0386bff80b16d95f7b8f5b1ba7d034' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\check_admission_status_form.tpl',
      1 => 1606793851,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc5ba851ce839_60186267 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
" id="check-admission-form" class="mfp-hide white-popup-block white-popup">
	<h3><b>Check Admission Status</b></h3>
    <hr>
	<fieldset style="border:0;" id="checkingline">
		
		<ol>
			<li>
				<label for="chech_status_email">Enter your Email Address</label>
                
				<input class="single-input-primary" id="chech_status_email" name="chech_status_email" type="email" required style="border: 1px solid #f7631b;"><br>

				<label for="chech_status_paswd">Enter your Password</label>
                
				<input class="single-input-primary" id="chech_status_paswd" name="chech_status_paswd" type="password" required="" style="border: 1px solid #f7631b;">
			</li><br>
            
				<label for="">&nbsp;</label>
				<input class="genric-btn primary" id="" name="admissionStatusCheckBtn" type="submit" value="Submit">
			
			
		</ol>
	</fieldset>
</form><?php }
}
