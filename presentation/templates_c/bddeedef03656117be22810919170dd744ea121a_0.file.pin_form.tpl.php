<?php
/* Smarty version 3.1.33, created on 2020-12-01 04:37:41
  from 'C:\xampp\htdocs\bluemark\presentation\templates\pin_form.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc5ba850081d4_03828247',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bddeedef03656117be22810919170dd744ea121a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\pin_form.tpl',
      1 => 1606793816,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc5ba850081d4_03828247 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
" id="test-form" class="mfp-hide white-popup-block white-popup">
	<h3><b>Admission PIN</b></h3>
    <hr>
	<fieldset style="border:0;">
		
		<ol>
			<li>
				<label for="name">Scratch and carefully enter your PIN</label>
                
				<input class="single-input-primary" id="name" name="pin_number" type="text" placeholder="Enter PIN here" required="" style="border: 1px solid #f7631b;">
			</li><br>
            
				<label for="name">&nbsp;</label>
				<input class="genric-btn primary" name="submitted_pin" type="submit" value="Submit">
			
			
		</ol>
	</fieldset>
</form><?php }
}
