<?php
/* Smarty version 3.1.33, created on 2020-02-17 10:10:42
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\reviews.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e4a5892106ce5_73157698',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af672baf4e1a59be08fb15a8bad216ca7e46c9bc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\reviews.tpl',
      1 => 1581928596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4a5892106ce5_73157698 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),1=>array('file'=>'C:\\xampp\\htdocs\\schoolshop\\libs\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
echo smarty_function_load_presentation_object(array('filename'=>"reviews",'assign'=>"obj"),$_smarty_tpl);?>

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mTotalReviews != 0) {?>
    <h2>Customer Reviews</h2>
    <ul class="review-list">
        <?php
$__section_i_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mReviews) ? count($_loop) : max(0, (int) $_loop));
$__section_i_3_total = $__section_i_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_3_total !== 0) {
for ($__section_i_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_3_iteration <= $__section_i_3_total; $__section_i_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
        <li>
            <p>
                Review by: <strong><?php echo $_smarty_tpl->tpl_vars['obj']->value->mReviews[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</strong> on 
                <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['obj']->value->mReviews[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['created_on'],"%A, %B %e, %Y");?>

            </p>
            <p><?php echo $_smarty_tpl->tpl_vars['obj']->value->mReviews[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['review'];?>
</p>
            <p> Rating: [<?php echo $_smarty_tpl->tpl_vars['obj']->value->mReviews[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['rating'];?>
 of 5]</p>
        </li>
        <?php
}
}
?>
    </ul>
<?php } else { ?>
    <h2>Be the first person to voice your opinion!</h2>
    
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['obj']->value->mEnableAddProductReviewForm) {?>
    
    <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToProduct;?>
">
        <table class="review-table">
            <tr>
                <td class="add-review">From: <strong><?php echo $_smarty_tpl->tpl_vars['obj']->value->mReviewerName;?>
</strong></td>
            </tr>
            <tr>
                <td>
                    <textarea name="review" rows="3" cols="65">[Add your review here]</textarea>
                </td>
            </tr>
            <tr>
                <td class="add-review">
                    <table class="review-table">
                        <tr>
                            <td>
                                Your Rating: 
                                <input type="radio" name="rating" value="1">1
                                <input type="radio" name="rating" value="2">2
                                <input type="radio" name="rating" value="3" checked="checked">3
                                <input type="radio" name="rating" value="4">4
                                <input type="radio" name="rating" value="5">5
                            </td>
                            <td align="right">
                                <input type="submit" name="AddProductReview" value="Add review">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
<?php } else { ?>
    <p>You must be log in to add a review.</p>
<?php }
}
}
