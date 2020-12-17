{*admin_order_details.tpl*}
{load_presentation_object filename="admin_order_details" assign="obj"}





        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
            {* {include file="admin_departments.tpl"} *}
<form method="get" action="{$obj->mLinkToAdmin}">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           Editing details for order ID:{$obj->mOrderInfo.order_id}
        [<a href="{$obj->mLinkToOrdersAdmin}">Back to admin orders...</a>]
        </div>
                        <!-- /.panel-heading -->
    <div class="panel-body">

    <input type="hidden" name="Page" value="OrderDetails">
    <input type="hidden" name="OrderId" value="{$obj->mOrderInfo.order_id}">

    
        <div class="table-responsive">
            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                           <td class="">Total Amount:</td>
                                            <td class="">
                                                N{$obj->mOrderInfo.total_amount}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="">Tax:</td>
                                            <td class="">{$obj->mOrderInfo.tax_type} {$obj->mTax}</td>
                                        </tr>
                                         <tr>
            <td class="">Tax:</td>
            <td class="">{$obj->mOrderInfo.tax_type} N{$obj->mTax}</td>
        </tr>
        <tr>
            <td class="">Shipping:</td>
            <td class="">{$obj->mOrderInfo.shipping_type}</td>
        </tr>
        <tr>
            <td class=""> Date Created: </td>
            <td>{$obj->mOrderInfo.created_on|date_format:"%Y-%m-%d %T"}</td>
        </tr>
        <tr>
            <td class=""> Date Shipped: </td>
            <td>{$obj->mOrderInfo.shipped_on|date_format:"%Y-%m-%d %T"}</td>
        </tr>
        <tr>
            <td class=""> Status: </td>
            <td>
                <select name="status" {if ! $obj->mEditEnabled} disabled="disabled" {/if}>
                    {html_options options=$obj->mOrderStatusOptions selected=$obj->mOrderInfo.status}
                </select>
            </td>
        </tr>
        <tr>
            <td class="">Authorization Code:</td>
            <td>
                <input type="text" name="authCode" value="{$obj->mOrderInfo.auth_code}" size="50" {if ! $obj->mEditEnabled} disabled="disabled" {/if}>

            </td>
        </tr>
        <tr>
            <td class="">Reference Number:</td>
            <td>
                <input name="reference" type="text" size="50" value="{$obj->mOrderInfo.reference}" {if ! $obj->mEditEnabled} disabled="disabled" {/if}>
            </td>
        </tr>
        <tr>
            <td class=""> Comments: </td>
            <td>
                <input name="comments" type="text" size="50" value="{$obj->mOrderInfo.comments}" {if ! $obj->mEditEnabled}
                    disabled="disabled"
                {/if} />

            </td>
        </tr>
         <tr>
            <td class=""> Custome Name: </td>
            <td>
                <input name="customerName" type="text" size="50" value="{$obj->mCustomerInfo.name}" {if ! $obj->mEditEnabled}
                    disabled="disabled"
                {/if} />

            </td>
        </tr>

        <tr>
            <td class="" > Shipping Address: </td>
            <td>
                {$obj->mCustomerInfo.address_1} <br>
                {if $obj->mCustomerInfo.address_2}
                    {$obj->mCustomerInfo.address_2} <br>
                {/if}
                {$obj->mCustomerInfo.city} <br>
                {$obj->mCustomerInfo.region} <br>
                {$obj->mCustomerInfo.postal_code} <br>
                {$obj->mCustomerInfo.country} <br>

            </td>
        </tr>
        <tr>
            <td class=""> Customer Email: </td>
            <td>
                {$obj->mCustomerInfo.email}
            </td>
        </tr>

        </thead>
                                    <tbody>
                    
                                    </tbody>
                </table>
            </div>

            <p>
            
             <input type="submit" name="submitEdit" value="Edit" {if $obj->mEditEnabled}
            disabled="disabled"{/if}>

            <input type="submit" name="submitUpdate" value="Update" {if ! $obj->mEditEnabled}
                disabled="disabled"{/if}>

            <input type="submit" name="submitCancel" value="Cancel" {if ! $obj->mEditEnabled}
                disabled="disabled"{/if}>

            {if $obj->mProcessButtonText}
                <input type="submit" name="submitProcessOrder" value="{$obj->mProcessButtonText}">
            {/if}
           </p>
            
             
             
        <div class="well">
           <h4></h4>
           

           <h3> Order contains these products : </h3>

            <div class="table-responsive">
            <table class="table table-hover">
            <thead>
            <tr>
                <th>Product ID </th>
                <th>Product Name </th>
                <th>Quantity </th>
                <th>Unit Cost </th>
                <th>Subtotal</th>
            </tr>

            </thead>
            <tbody>
             {section name=i loop=$obj->mOrderDetails}
                <tr>
                    <td>{$obj->mOrderDetails[i].product_id}</td>
                    <td>
                        {$obj->mOrderDetails[i].product_name} 
                        ({$obj->mOrderDetails[i].attributes})
                    </td>
                    <td> {$obj->mOrderDetails[i].quantity}</td>
                    <td> {$obj->mOrderDetails[i].unit_cost}</td>
                    <td> {$obj->mOrderDetails[i].subtotal}</td>
                </tr>
            {/section}
                    
            </tbody>
            
            </table>
            </div>


             <h3>Order audit trail:</h3>
            <div class="table-responsive">
            <table class="table table-hover">
             <thead>
             <tr>
                <th>Audit ID</th>
                <th>Created On</th>
                <th>Code</th>
                <th>Message</th>
            </tr>

             </thead>
             <tbody>
              {section name=j loop=$obj->mAuditTrail}
                    <tr>
                        <td>{$obj->mAuditTrail[j].audit_id}</td>
                        <td>{$obj->mAuditTrail[j].created_on}</td>
                        <td>{$obj->mAuditTrail[j].code}</td>
                        <td>{$obj->mAuditTrail[j].message}</td>
                    </tr>
                {/section}

             </tbody>
            </table>
            </div>
           


           
          </div>              <!-- /.table-responsive -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
</form>

            </div>
            
            </div>
