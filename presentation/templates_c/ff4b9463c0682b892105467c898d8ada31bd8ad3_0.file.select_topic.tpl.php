<?php
/* Smarty version 3.1.33, created on 2020-11-26 14:13:28
  from 'C:\xampp\htdocs\bluemark\presentation\templates\select_topic.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fbfa9f8c072f2_51903591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ff4b9463c0682b892105467c898d8ada31bd8ad3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\select_topic.tpl',
      1 => 1606396401,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbfa9f8c072f2_51903591 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-lg-9 col-md-9">
	<h3 class="mt-20 mb-20"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubjectName;?>
: Select a topic</h3>

		
		<p class="excert">
			<p>
				<b>
					Select and open a topic content from the list of topis below
					<hr>
				</b>
			</p>
			
			            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsTopicsPresent === true) {?>
                
					<div class="table-responsive">
                    	<table class="table tale-hover">
							<thead>
								<tr>
									<th>Topics</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mLessonTopics) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
									<tr>
										<td><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonTopics[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_to_topic_content'];?>
"><strong><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonTopics[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['topic'];?>
</strong></a></td>
										<td>
											<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonTopics[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_to_topic_content'];?>
">Go to topic content</a>
										</td>
									</tr>
								<?php
}
}
?>
							</tbody>
						</table>	
					</div>
                
            <?php } else { ?>
                <p>
                    <b>
                        No lesson plan topics found.<a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToStudentProfile;?>
"> Ok</a>
                        <hr>
                    </b>
                </p>
            <?php }?>

		</p>
		
		<br><br>

	

							
</div><?php }
}
