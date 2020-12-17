<?php
/* Smarty version 3.1.33, created on 2020-11-30 01:40:29
  from 'C:\xampp\htdocs\bluemark\presentation\templates\site_maintenance_login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fc43f7d479a23_49626069',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec36d7569c622c01c6dc81c1b625e2e114c1a137' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\site_maintenance_login.tpl',
      1 => 1606696821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fc43f7d479a23_49626069 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-md-8 col-md-offset-2">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">SITE ADMIN PAGE (mAINTENANCE)</b></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToAdmin;?>
">
                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLoginMessage != '') {?>
                            <p style="color: red;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLoginMessage;?>
</p>
                        <?php }?>


                        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mMaintenanceMsg4Approval) {?>
                            <p style="color: green;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMaintenanceMsg4Approval;?>
</p><hr>
                        <?php }?>



                                                <?php if ($_smarty_tpl->tpl_vars['obj']->value->mMaintenanceMsg && $_smarty_tpl->tpl_vars['obj']->value->mShowRequestTable) {?>
                            <p style="color: green;"><?php echo $_smarty_tpl->tpl_vars['obj']->value->mMaintenanceMsg;?>
</p>
                                                        <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#PINs</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Approve</th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        
                                            <tr>
                                                                                            <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLatestRequest['numberOfPin'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLatestRequest['price'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLatestRequest['total'];?>
</td>
                                                <td><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLatestRequest['sys_date'];?>
</td>
                                                <td>
<input type="hidden" name="requestedPinId" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLatestRequest['requested_id'];?>
">
<input type="submit" name="ApproveSubmitBtn" value="Approve" class="btn btn-sm btn-success">
                                                </td>
                                            </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        <?php } else { ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" type="text" autofocus name="username_sa" size="35" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mUsername;?>
">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password_sa" type="password" size="35" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" href="index.html" class="btn btn-lg btn-success btn-block" value="Login" name="submitBTNsa">
                            </fieldset>
                            <?php }?>
                        </form><br>
                            Back to
                            <a href="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToIndex;?>
">BlueMark</a>
                    </div>
                </div>
                <span style="text-align: right;"> <small>Powered by <span style="color: blue;"><b>BlueMark</b></span></small> </span>
            </div><?php }
}
