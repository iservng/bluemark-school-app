<?php
/* Smarty version 3.1.33, created on 2020-02-25 13:07:00
  from 'C:\xampp\htdocs\bluemark\presentation\templates\search_results.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e550de4cc7fe1_76510496',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '889612dcf9977be42be04b072161da74370fd358' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\search_results.tpl',
      1 => 1582632395,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:products_list.tpl' => 1,
  ),
),false)) {
function content_5e550de4cc7fe1_76510496 (Smarty_Internal_Template $_smarty_tpl) {
?>






<section class="banner-area relative about-banner" id="home">	
<div class="overlay overlay-bg"></div>
<div class="container">				
	<div class="row d-flex align-items-center justify-content-center">
		<div class="about-content col-lg-12"> 
			<h1 class="text-white">
							Search Results
			</h1>	
				 </div>	
	</div>
</div>
</section>


<section class="popular-course-area section-gap">
      <div class="container">

        <div class="row d-flex justify-content-center">
          <div class="menu-content pb-70 col-lg-8">
            <div class="title text-center">
              <h1 class="mb-10">Your search results</h1>
              <p></p>
              
            </div>
          </div>
        </div>

        <div class="row">
          <div class="active-popular-carusel">

          <?php $_smarty_tpl->_subTemplateRender("file:products_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          </div>
        </div>
      </div>
    </section><?php }
}
