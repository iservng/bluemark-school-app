<?php
/* Smarty version 3.1.33, created on 2020-03-10 13:55:16
  from 'C:\xampp\htdocs\bluemark\presentation\templates\admin_carts.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e678e34798d41_79163446',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6357aa2540422ff89974321406e0c0339530a6b2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\admin_carts.tpl',
      1 => 1583844913,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e678e34798d41_79163446 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\presentation\\smarty_plugins\\function.load_presentation_object.php','function'=>'smarty_function_load_presentation_object',),1=>array('file'=>'C:\\xampp\\htdocs\\bluemark\\libs\\smarty\\plugins\\function.html_options.php','function'=>'smarty_function_html_options',),));
echo smarty_function_load_presentation_object(array('filename'=>"admin_carts",'assign'=>"obj"),$_smarty_tpl);?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard <small>shopping carts</small></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
                    <form action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToCartsAdmin;?>
" method="post">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           Admin Users&#039; shopping carts: 
        </div>
                        <!-- /.panel-heading -->
    <div class="panel-body">
     <?php if ($_smarty_tpl->tpl_vars['obj']->value->mMessage) {?>
        <p><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMessage;?>
</p>
    <?php }?>



             
        <div class="well">
           <h4>  Select Cart:</h4>
           <p>

           <?php echo smarty_function_html_options(array('class'=>"form-control",'name'=>"days",'options'=>$_smarty_tpl->tpl_vars['obj']->value->mDaysOptions,'selected'=>$_smarty_tpl->tpl_vars['obj']->value->mSelectedDaysNumber),$_smarty_tpl);?>

<br>

            <input class="btn btn-primary btn-lg btn-block" type="submit" name="submit_count" value="Count Old Shopping Carts">
            
      
           </p>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit_delete" value="Delete Old Shopping Carts">
          </div>              <!-- /.table-responsive -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
</form>

            </div>
            
            </div><?php }
}
