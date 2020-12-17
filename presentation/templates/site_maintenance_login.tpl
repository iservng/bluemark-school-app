<div class="col-md-8 col-md-offset-2">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">SITE ADMIN PAGE (mAINTENANCE)</b></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="{$obj->mLinkToAdmin}">
                        {if $obj->mLoginMessage neq ""}
                            <p style="color: red;">{$obj->mLoginMessage}</p>
                        {/if}


                        {if $obj->mMaintenanceMsg4Approval}
                            <p style="color: green;">{$obj->mMaintenanceMsg4Approval}</p><hr>
                        {/if}



                        {* mMaintenanceMsg  mMaintenanceMsg4Approval  *}
                        {if $obj->mMaintenanceMsg && $obj->mShowRequestTable}
                            <p style="color: green;">{$obj->mMaintenanceMsg}</p>
                            {* <fieldset>
                                <input type="submit" href="index.html" class="btn btn-lg btn-success btn-block" value="Approve" name="ApproveSubmitBtn">
                            </fieldset> *}
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
                                            {* , numberOfPin, , , approve, sys_date *}
                                                <td>{$obj->mLatestRequest['numberOfPin']}</td>
                                                <td>{$obj->mLatestRequest['price']}</td>
                                                <td>{$obj->mLatestRequest['total']}</td>
                                                <td>{$obj->mLatestRequest['sys_date']}</td>
                                                <td>
<input type="hidden" name="requestedPinId" value="{$obj->mLatestRequest['requested_id']}">
<input type="submit" name="ApproveSubmitBtn" value="Approve" class="btn btn-sm btn-success">
                                                </td>
                                            </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        {else}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" type="text" autofocus name="username_sa" size="35" value="{$obj->mUsername}">
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
                            {/if}
                        </form><br>
                            Back to
                            <a href="{$obj->mLinkToIndex}">BlueMark</a>
                    </div>
                </div>
                <span style="text-align: right;"> <small>Powered by <span style="color: blue;"><b>BlueMark</b></span></small> </span>
            </div>