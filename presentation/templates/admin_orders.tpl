{*admin_orders.tpl*}
{load_presentation_object filename="admin_orders" assign="obj"}





<div id="page-wrapper">
    <div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard <small>Orders</small></h1>
    </div>
               
    </div>
            
    <div class="row">
         
        
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    Order Operations: 
                    </div>
                                    <!-- /.panel-heading -->
                <div class="panel-body">


                {if $obj->mErrorMessage}
                <p style="color: red;">{$obj->mErrorMessage}</p>
                {/if}



                        
                    <div class="well">
                    <form method="get" action="{$obj->mLinkToAdmin}">
                        <input name="Page" type="hidden" value="Orders">
                        <p>
                        <b>  Show orders by customer</b>
                         <select name="customer_id">
                            {section name=i loop=$obj->mCustomers}
                            <option value="{$obj->mCustomers[i].customer_id}" {if $obj->mCustomers[i].customer_id == $obj->mCustomerId} selected="selected" {/if}>{$obj->mCustomers[i].name}</option>
                            {/section}
                        </select>
                        {* {html_options class="form-control" name="days" options=$obj->mDaysOptions selected=$obj->mSelectedDaysNumber} *}
                        {* <br> *}

                            <input type="submit" name="submitByCustomer" value="Go!">
                            
                    
                        </p>
                        <p>
                            <b> Get by order ID</b>
                             <input name="orderId" type="text" value="{$obj->mOrderId}">

                            <input type="submit" name="submitByOrderId" value="Go!">
                        </p>

                        <p>
                            <b> Show the most recent</b>
                            <input name="recordCount" type="text" value="{$obj->mRecordCount}">
                            <b class="bold-text">orders</b>
                             <input type="submit" name="submitMostRecent" value="GO!">
                        
                        </p>
                        <p>
                        
                            <b>Show all recorded created between</b>
                            <input name="startDate" type="text" value="{$obj->mStartDate}">
                            <b>and</b>
                            <input name="endDate" type="text" value="{$obj->mEndDate}">
                            <input type="submit" name="submitBetweenDates" value="GO!">

                        </p>
                        <p>
                        
                            <b>Show orders by status </b>
                            {html_options name="status" options=$obj->mOrderStatusOptions selected=$obj->mSelectedStatus}

                            <input type="submit" name="submitOrdersByStatus" value="GO!">
                        </p>

                        </form>
                    </div>              <!-- /.table-responsive -->




                    {if $obj->mOrders}

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date Created</th>
                                    <th>Date Shipped</th>
                                    <th>Status</th>
                                    <th>Customer</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                            {section name=i loop=$obj->mOrders}
                                {assign var=status value=$obj->mOrders[i].status}
                                <tr>
                                    <td>{$obj->mOrders[i].order_id}</td>
                                    <td>{$obj->mOrders[i].created_on|date_format:"%Y-%m-%d %T"}</td>
                                    <td>{$obj->mOrders[i].shipped_on|date_format:"%Y-%m-%d %T"}</td>
                                    <td>{$obj->mOrderStatusOptions[$status]}</td>
                                    <td>{$obj->mOrders[i].name}</td>
                                    <td align="right">
                                        <a href="{$obj->mOrders[i].link_to_order_details_admin}">View Details</a>
                                    </td>
                                </tr>
                            {/section}

                            </tbody>
                        </table>
                    </div>
                    {/if}

                    </div>
                                    <!-- /.panel-body -->
                </div>
                                <!-- /.panel -->
            </div>
     

</div>
            
</div>