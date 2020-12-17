<?php
/* Smarty version 3.1.33, created on 2020-02-25 09:19:02
  from 'C:\xampp\htdocs\bluemark\presentation\templates\first_page_contents.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e54d876490db4_42641743',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c6fb517b6f785240dab77059455d3a95db37193' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\first_page_contents.tpl',
      1 => 1582618419,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:products_list.tpl' => 1,
  ),
),false)) {
function content_5e54d876490db4_42641743 (Smarty_Internal_Template $_smarty_tpl) {
?>
<section class="popular-course-area section-gap">
      <div class="container">

        <div class="row d-flex justify-content-center">
          <div class="menu-content pb-70 col-lg-8">
            <div class="title text-center">
              <h1 class="mb-10">Welcome to our school shop</h1>
              <p>There is a moment in the life of any aspiring.</p>
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
    </section>
<?php }
}
