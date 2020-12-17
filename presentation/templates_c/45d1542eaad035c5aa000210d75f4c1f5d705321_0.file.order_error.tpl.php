<?php
/* Smarty version 3.1.33, created on 2020-02-13 16:04:38
  from 'C:\xampp\htdocs\schoolshop\presentation\templates\order_error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e4565866b7566_16192509',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '45d1542eaad035c5aa000210d75f4c1f5d705321' => 
    array (
      0 => 'C:\\xampp\\htdocs\\schoolshop\\presentation\\templates\\order_error.tpl',
      1 => 1581601812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e4565866b7566_16192509 (Smarty_Internal_Template $_smarty_tpl) {
?><h3> An error has occurred during the processing of your order.</h3>
<p class="description">

    If you have an enquiry regarding this message please email 
    <a href="mailto:<?php echo @constant('CUSTOMER_SERVICE_EMAIL');?>
">
        <?php echo @constant('CUSTOMER_SERVICE_EMAIL');?>

    </a>
</p><?php }
}
