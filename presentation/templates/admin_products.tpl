{*admin_products.tpl*}
{load_presentation_object filename="admin_products" assign="obj"}





        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
            {* {include file="admin_departments.tpl"} *}
           <form method="post" action="{$obj->mLinkToCategoryProductsAdmin}">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           Editing product for category:{$obj->mCategoryName} [<a href="{$obj->mLinkToDepartmentCategoriesAdmin}">Back to categories...</a>]
        </div>
                        <!-- /.panel-heading -->
    <div class="panel-body">
     {if $obj->mErrorMessage}<p style="color: red;">{$obj->mErrorMessage}</p>{/if}

    {if $obj->mProductsCount eq 0}
        <p style="color: blue;"><b>There are no products in this category</b></p>
    {else}
        <div class="table-responsive">
            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Discounted Price</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                  {section name=i loop=$obj->mProducts}
                                        <tr>
                                           <td>{$obj->mProducts[i].name}</td>
                                            <td>{$obj->mProducts[i].description}</td>
                                            <td>{$obj->mProducts[i].price}</td>
                                            <td>{$obj->mProducts[i].discounted_price}</td>
                                            <td>
                                                <input type="submit" name="submit_edit_prod_{$obj->mProducts[i].product_id}" value="Edit">
                                            </td>
                                        </tr>
                                        
                                    {/section}


                                       
                                    </tbody>
                </table>
            </div>
             {/if}
             
             
        <div class="well">
           <h4>Add new product:</h4>
           <p>
            <input class="form-control input-sm" type="text" name="product_name" value="[name]" size="30">
            <br>
            <input class="form-control input-sm" type="text" name="product_description" value="[description]" size="60">
            <br>
            <input class="form-control input-sm" type="text" name="product_price" value="price" size="10">
           </p>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit_add_prod_0" value="Add">
          </div>              <!-- /.table-responsive -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
</form>

            </div>
            
            </div>
