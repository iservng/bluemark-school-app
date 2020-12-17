<?php
/* Smarty version 3.1.33, created on 2020-02-25 12:03:58
  from 'C:\xampp\htdocs\bluemark\presentation\templates\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e54ff1e152036_76863347',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b7eb7334cac40ee33fec9665b450b14b0a9a35e7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\product.tpl',
      1 => 1582628632,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e54ff1e152036_76863347 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),));
echo smarty_function_load_presentation_object(array('filename'=>"product",'assign'=>"obj"),$_smarty_tpl);?>


<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			 <h1 class="text-white">
				<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['name'];?>
		
			</h1>	
					 </div>	
	</div>
</div>
</section>

<section class="post-content-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 posts-list">
							<div class="single-post row">
								<div class="col-lg-3  col-md-3 meta-details">
									<ul class="tags">
										<li><a href="">&nbsp;</a></li>
										<li><a href="">&nbsp;</a></li>
										<li><a href="">&nbsp;</a></li>
										<li><a href="">&nbsp;</a></li>
									</ul>

	<div class="user-details row">
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProduct['discounted_price'] != 0) {?>
        <p class="view col-lg-12 col-md-12 col-6">Unbatable Price:
            <a href="">N<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['discounted_price'];?>
</a> 
        </p>
    <?php } else { ?>
        <p class="view col-lg-12 col-md-12 col-6">Price:
            <a href="">N<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['price'];?>
</a> 
        </p>
    <?php }?>
	

                    <form class="" target="_self" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['link_to_add_product'];?>
" onclick="return addProductToCart(this);">

<p class="">
      <?php
$__section_k_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes']) ? count($_loop) : max(0, (int) $_loop));
$__section_k_0_total = $__section_k_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_k'] = new Smarty_Variable(array());
if ($__section_k_0_total !== 0) {
for ($__section_k_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] = 0; $__section_k_0_iteration <= $__section_k_0_total; $__section_k_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_k']->value['index_prev'] = $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] - 1;
$_smarty_tpl->tpl_vars['__smarty_section_k']->value['index_next'] = $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] + 1;
$_smarty_tpl->tpl_vars['__smarty_section_k']->value['first'] = ($__section_k_0_iteration === 1);
$_smarty_tpl->tpl_vars['__smarty_section_k']->value['last'] = ($__section_k_0_iteration === $__section_k_0_total);
?>
            <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['first'] : null) || $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attribute_name'] !== $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index_prev']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index_prev'] : null)]['attribute_name']) {?>
      <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attribute_name'];?>
:
      <select name="attr_<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attribute_name'];?>
">
      <?php }?>

                <option value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attribute_value'];?>
">
          <?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attribute_value'];?>

        </option>

            <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['last'] : null) || $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index'] : null)]['attribute_name'] !== $_smarty_tpl->tpl_vars['obj']->value->mProduct['attributes'][(isset($_smarty_tpl->tpl_vars['__smarty_section_k']->value['index_next']) ? $_smarty_tpl->tpl_vars['__smarty_section_k']->value['index_next'] : null)]['attribute_name']) {?>
      </select>
      <?php }?>
    <?php
}
}
?>

</p>

<p>
    <input class="genric-btn primary small" type="submit" name="add_to_cart" value="Add to Cart">
</p>
</form> 

<?php if ($_smarty_tpl->tpl_vars['obj']->value->mShowEditButton) {?>
    <form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mEditActionTarget;?>
" target="_self" method="post" class="edit-form">
        <p>
            <input class="genric-btn primary small" type="submit" name="submit_edit" value="Edit Product Details">
        </p>
    </form>
<?php }?>
        
			</div>










								</div>
								<div class="col-lg-9 col-md-9 ">

                                    <br>
									<div class="feature-img">
                                    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mProduct['image']) {?>
										<img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['name'];?>
 image">
                                        <?php }?>
									</div>
                                    

									<a class="posts-title" href="blog-single.html"><h3><?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['name'];?>
</h3></a>
									<p class="excert">
										<?php echo $_smarty_tpl->tpl_vars['obj']->value->mProduct['description'];?>

									</p>

									

        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping) {?>
            <a class="primary-btn" href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToContinueShopping;?>
">Continue Shopping
            </a>
        <?php }?>


								</div>
							</div>
						</div>


						<div class="col-lg-4 sidebar-widgets">
							<div class="widget-wrap">



                           



                                <div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">View similar products</h4>
									<div class="popular-post-list">

                                    <?php
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mLocations) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total !== 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
										<div class="single-post-list d-flex flex-row align-items-center">
											
											<div class="details">
                                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_to_department'];?>
"><h6><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['department_name'];?>
</h6></a>

                                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['link_to_category'];?>
"><h6><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLocations[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['category_name'];?>
</h6></a>
												
											</div>
										</div>
                                    <?php
}
}
?>


										
										
																									
									</div>
								</div>
<?php if ($_smarty_tpl->tpl_vars['obj']->value->mRecommendations) {?>
<div class="single-sidebar-widget popular-post-widget">
									<h4 class="popular-title">Customers also bought:</h4>
									<div class="popular-post-list">
<?php
$__section_m_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mRecommendations) ? count($_loop) : max(0, (int) $_loop));
$__section_m_2_total = $__section_m_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_m'] = new Smarty_Variable(array());
if ($__section_m_2_total !== 0) {
for ($__section_m_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] = 0; $__section_m_2_iteration <= $__section_m_2_total; $__section_m_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']++){
?>
										<div class="single-post-list d-flex flex-row align-items-center">
																						<div class="details">
                                                <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mRecommendations[(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['link_to_product'];?>
"><h6><?php echo $_smarty_tpl->tpl_vars['obj']->value->mRecommendations[(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['product_name'];?>
</h6></a>
												<p><?php echo $_smarty_tpl->tpl_vars['obj']->value->mRecommendations[(isset($_smarty_tpl->tpl_vars['__smarty_section_m']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_m']->value['index'] : null)]['description'];?>
</p>
											</div>
										</div>
                                        <?php
}
}
?>
														
									</div>
								</div>
<?php }?>




								
							</div>
						</div>
					</div>
				</div>	
			</section><?php }
}
