<?php
/* Smarty version 3.1.33, created on 2020-11-24 16:39:26
  from 'C:\xampp\htdocs\bluemark\presentation\templates\students_profile_ca_view.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fbd292ea44dc4_33962215',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb7e2091091bd25793ffc9400ac48d08203b0e64' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\students_profile_ca_view.tpl',
      1 => 1606232360,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbd292ea44dc4_33962215 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStudentProfile;?>
">
<div class="col-lg-12 col-md-9">
	<h3 class="mt-20 mb-20">My Continuose Assesment records</h3><hr>
	
		<p class="excert">
			<p>
				<b style="color: #38a4ff;">
					 Continuose Assesment scores for this term as publish by the school 
					
				</b>
			</p>
			
			<div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            
                            <th>Subject</th>
                            <th>First CA</th>
                            <th>Second CA</th>
                            <th>Third CA</th>
                            <th> CA total</th>
                            <th> Exams</th>
                            <th> Total</th>
                            
                        
                        </tr>
                    </thead>

                    <tbody>
					<?php if ($_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamsRecordsCount > 0) {?>
						<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamsRecords) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
							<tr>
								
								<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['firstca'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['secondca'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['thirdca'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['catotal'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['exams'];?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mStudentCaExamsRecords[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['total'];?>
</td>
								
							</tr>
						<?php
}
}
?>
					<?php } else { ?>
					<p style="color: red;">No Continuose Assesment records found</p>
					<?php }?>
                    </tbody>
					
                </table>
            </div>

		</p>
		
		<br><br>
		<p><input type="submit" name="subm" value="Close CA records" class="genric-btn info radius"></p>
					
</div>
</form><?php }
}
