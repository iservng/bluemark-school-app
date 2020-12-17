<?php
/* Smarty version 3.1.33, created on 2020-11-25 05:47:09
  from 'C:\xampp\htdocs\bluemark\presentation\templates\subjects_column.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fbde1cd1b6e22_38640366',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7850ad23a26475d0c085706aad0f56ee5d508c2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\subjects_column.tpl',
      1 => 1606279623,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbde1cd1b6e22_38640366 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-lg-9 col-md-9">
	<h3 class="mt-20 mb-20">Select Subject</h3>

		
		<p class="excert">
			<p>
				<b>
					<span style="color: #04091e;">Select a Subject to view topics treated under the selected subject
					
				</b>
			</p>
			
			<div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            
                            <th>Subject</th>
                                                        
                            
                        
                        </tr>
                    </thead>

                    <tbody>
                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mSubjectCount > 0) {?>
                      <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mClassSubject) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                      <tr>
                        
                        <td>
                          <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassSubject[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_to_lesson'];?>
">
                            <?php echo $_smarty_tpl->tpl_vars['obj']->value->mClassSubject[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>

                          </a>
                        </td>
                                                
                        
                      </tr>
                      <?php
}
}
?>
                    <?php } else { ?>
					            <p style="color: red;">Subjects not found</p>
					          <?php }?>
                    </tbody>
					
                </table>
            </div>

		</p>
		
		<br><br>

	

							
</div>
 




                          
             
            

                  <?php }
}
