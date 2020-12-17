<?php
/* Smarty version 3.1.33, created on 2020-11-11 14:35:17
  from 'C:\xampp\htdocs\bluemark\presentation\templates\promote_class_lister.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fabe895904477_26690056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b18a8fdea9480d49f73f8e518003e48fcf5506b0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\promote_class_lister.tpl',
      1 => 1605095912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fabe895904477_26690056 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStudentProfile;?>
">
<div class="section-top-border">
	<h2 class="mb-30" style="color: green;">PROMOTED</h2>
	<h4 class="mb-30">Select the NEW class, then activate by clicking the activate button</h4>
	<div class="progress-table-wrap">
		<div class="progress-table">
			<div class="table-head">
				<div class="serial">#</div>
				<div class="country">Class </div>
				<div class="visit">Select</div>
				<div class="percentage">Percentages</div>
			</div>
			<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->ExtensionOfPromotedClass) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
				<div class="table-row">
					<div class="serial">645032</div>
					<div class="country"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->ExtensionOfPromotedClass[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['class_name'];?>
</div>
					<div class="visit"><input type="radio" name="promotedToClassid" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->ExtensionOfPromotedClass[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['school_classes_id'];?>
"></div>
					<div class="percentage">
						<div class="progress">
							<div class="progress-bar color-1" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			<?php
}
}
?>

		
		</div>
		
	</div>
	
</div>
<input type="submit" name="choosingNewClassId" value="ACTIVATE NEW CLASS" class="genric-btn info-border radius">
</form><?php }
}
