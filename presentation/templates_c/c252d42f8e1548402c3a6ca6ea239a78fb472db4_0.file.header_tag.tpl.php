<?php
/* Smarty version 3.1.33, created on 2020-05-12 16:29:53
  from 'C:\xampp\htdocs\bluemark\presentation\templates\header_tag.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ebac0f1a54c00_20555318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c252d42f8e1548402c3a6ca6ea239a78fb472db4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\header_tag.tpl',
      1 => 1589296908,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:departments_list.tpl' => 1,
    'file:cart_summary.tpl' => 1,
  ),
),false)) {
function content_5ebac0f1a54c00_20555318 (Smarty_Internal_Template $_smarty_tpl) {
?> <header id="header" id="home">

      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
              <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
              <a href="tel:+953 012 3654 896"><span class="lnr lnr-phone-handset"></span> <span class="text">+234 813 489 9043</span></a>
              <a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span> <span class="text">BlueMark</span></a>
            </div>
          </div>
        </div>
    </div>
      <div class="container main-menu">
        <div class="row align-items-center justify-content-between d-flex">
          <div id="logo">
            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
img/logo.png" alt="" title="BlueMark" /></a>
          </div>
          <nav id="nav-menu-container">
            <ul class="nav-menu">
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mSiteUrl;?>
">Home</a></li>
              <li><a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAboutUs;?>
">About</a></li>
           
             
           

              <li class="menu-has-children"><a href="">Section</a>
                <ul>
                  <?php $_smarty_tpl->_subTemplateRender("file:departments_list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </ul>
              </li>

                          <?php $_smarty_tpl->_subTemplateRender("file:cart_summary.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

                          <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mClickOrLoggedCell, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

                            <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['obj']->value->mStaffLoginLink, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            
              <li><a href="#search_in_the_footer">Search</a></li>
            </ul>
          </nav><!-- #nav-menu-container -->
        </div>
      </div>
    </header><!-- #header --><?php }
}
