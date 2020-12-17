<?php
/* Smarty version 3.1.33, created on 2020-02-24 09:07:13
  from 'C:\xampp\htdocs\bluemark\presentation\templates\footer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e5384314a6ba6_74786327',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '63be8b5dd92db9672595cd1d3e79dc83beb8a511' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\footer.tpl',
      1 => 1582531085,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:search_box.tpl' => 1,
  ),
),false)) {
function content_5e5384314a6ba6_74786327 (Smarty_Internal_Template $_smarty_tpl) {
?> <footer class="footer-area section-gap" id="search_in_the_footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Top Products</h4>
              <ul>
                <li><a href="#">Managed Website</a></li>
                <li><a href="#">Manage Reputation</a></li>
                <li><a href="#">Power Tools</a></li>
                <li><a href="#">Marketing Service</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Quick links</h4>
              <ul>
                <li><a href="#">Jobs</a></li>
                <li><a href="#">Brand Assets</a></li>
                <li><a href="#">Investor Relations</a></li>
                <li><a href="#">Terms of Service</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Features</h4>
              <ul>
                <li><a href="#">Jobs</a></li>
                <li><a href="#">Brand Assets</a></li>
                <li><a href="#">Investor Relations</a></li>
                <li><a href="#">Terms of Service</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Resources</h4>
              <ul>
                <li><a href="#">Guides</a></li>
                <li><a href="#">Research</a></li>
                <li><a href="#">Experts</a></li>
                <li><a href="#">Agencies</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4  col-md-6 col-sm-6">
            <div class="single-footer-widget">
              <h4>Search our products</h4>
              <p>Stay update with our latest</p>

             <?php $_smarty_tpl->_subTemplateRender("file:search_box.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
          </div>
        </div>
        <div class="footer-bottom row align-items-center justify-content-between">
          <p class="footer-text m-0 col-lg-6 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<?php echo '<script'; ?>
>document.write(new Date().getFullYear());<?php echo '</script'; ?>
> All rights reserved |BlueMark is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://bluemark.com" target="_blank">iSERVng </a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          <div class="col-lg-6 col-sm-12 footer-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
            <a href="#"><i class="fa fa-behance"></i></a>
          </div>
        </div>
      </div>
    </footer><?php }
}
