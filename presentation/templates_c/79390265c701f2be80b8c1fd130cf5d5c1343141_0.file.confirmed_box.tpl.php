<?php
/* Smarty version 3.1.33, created on 2020-06-22 15:47:00
  from 'C:\xampp\htdocs\bluemark\presentation\templates\confirmed_box.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5ef0c464e04175_83881976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79390265c701f2be80b8c1fd130cf5d5c1343141' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\confirmed_box.tpl',
      1 => 1590169839,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ef0c464e04175_83881976 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>
                <b style="color: green;">
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmationHeading;?>

                </b>
            </h4>
        </div>

        <div class="panel-body">
            <b style="color: #337ab7;">
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mConfirmationMessage;?>

            </b>
        </div>
                        
    </div>
</div>
<?php }
}
