<?php
/* Smarty version 3.1.33, created on 2020-11-26 15:56:08
  from 'C:\xampp\htdocs\bluemark\presentation\templates\subjects_list_on_the_right.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fbfc208764465_37437052',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b6042a57412ae1d94bef56e26722ecb16b1a88a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\subjects_list_on_the_right.tpl',
      1 => 1606401968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbfc208764465_37437052 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-lg-4 sidebar-widgets">
	<div class="widget-wrap">
						
		<div class="single-sidebar-widget user-info-widget">
				
					<a href="#">
						<h4><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubjectName;?>
</h4>
					</a>
					
					<p>
                        <div class="table-responsive">
                    	<table class="table tale-hover">
							<thead>
								<tr>
									<th>Subject</th>
									
								</tr>
							</thead>
							<tbody>
								<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mClassSubject) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
									<tr>
										<td><b><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassSubject[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_to_lesson'];?>
"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassSubject[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</a></b></td>
										
									</tr>
								<?php
}
}
?>
							</tbody>
						</table>	
					</div>
						
					</p>
					
		</div>


	</div>
</div><?php }
}
