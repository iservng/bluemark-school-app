{*admin_product_details.tpl*}
{load_presentation_object filename="admin_product_details" assign="obj"}





        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
            {* {include file="admin_departments.tpl"} *}
<form enctype="multipart/form-data" method="post" action="{$obj->mLinkToProductDetailsAdmin}">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           Editing product: ID # {$obj->mProduct.product_id} &mdash;
        {$obj->mProduct.name} [<a href="{$obj->mLinkToCategoryProductsAdmin}">Back to products...</a>]
        </div>
                        <!-- /.panel-heading -->
    <div class="panel-body">
     {if $obj->mErrorMessage}<p style="color: red;">{$obj->mErrorMessage}</p>{/if}

        <div class="table-responsive">
            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <p class="">
                                                    Product Name:
                                                </p>
                                                <p class="">
                                                    <input type="text" name="name" value="{$obj->mProduct.name}" size="30">
                                                </p>
                                                <p class="">
                                                    Product Description:
                                                </p>
                                                <p class="">
                                                    {strip}
                                                    <textarea name="description" rows="3" cols="60">
                                                        {$obj->mProduct.description}
                                                    </textarea>
                                                    {/strip}
                                                </p>
                                                <p class="bold-text">
                                                    Product Price 
                                                </p>
                                                <p>
                                                    <input type="text" name="price" value="{$obj->mProduct.price}" size="5">
                                                </p>
                                                <p class="bold-text">
                                                    Product Discounted Price 
                                                </p>
                                                <p>
                                                    <input type="text" name="discounted_price" value="{$obj->mProduct.discounted_price}" size="5">
                                                </p>
                                                <p>
                                                    <input type="submit" name="UpdateProductInfo" value="Update Info">
                                                </p>
                                            </th>

                                            <th>
                                                <p>
                                                    <span class="bold-text"Product belong to these categories></span>
                                                    {$obj->mProductCategoriesString}
                                                </p>
                                                <p class="bold-text">
                                                    Remove this product from:
                                                </p>
                                                <p>
                                                    {html_options name="TargetCategoryIdRemove" options=$obj->mRemoveFromCategories}
                                                    <input type="submit" name="RemoveFromCategory" value="Remove" {if $obj->mRemoveFromCategoryButtonDisabled} disabled="disabled" {/if}>
                                                </p>
                                                <p class="">
                                                    Assign product to this category:
                                                </p>
                                                <p>
                                                    {html_options name="TargetCategoryIdAssign" options=$obj->mAssignOrMoveTo}
                                                    <input type="submit" name="Assign" value="Assign">
                                                </p>
                                                <p class="">
                                                    Move product to this category:
                                                </p>
                                                <p>
                                                    {html_options name="TargetCategoryIdMove" options=$obj->mAssignOrMoveTo}
                                                    <input type="submit" name="Move" value="Move">
                                                    <input type="submit" name="RemoveFromCatalog" value="Remove product from catalog" {if !$obj->mRemoveFromCategoryButtonDisabled} disabled="disabled" {/if}>
                                                    
                                                </p>
                                                {if $obj->mProductAttributes}
                                                    <p class="">
                                                        Product attributes:
                                                    </p>
                                                    <p>
                                                        {html_options name="TargetAttributeValueIdRemove" options=$obj->mProductAttributes}
                                                        <input type="submit" name="RemoveAttributeValue" value="Remove">
                                                    </p>
                                                {/if}
                                                 {if $obj->mCatalogAttributes}
                                                    <p class="bold-text">
                                                        Assign attribute to product:
                                                    </p>
                                                    <p>
                                                        {html_options name="TargetAttributeValueIdAssign" options=$obj->mCatalogAttributes}
                                                        <input type="submit" name="AssignAttributeValue" value="Assign">
                                                    </p>
                                                {/if}
                                                <p class="">
                                                    Set display option for this product:
                                                </p>
                                                <p>
                                                    {html_options name="ProductDisplay" options=$obj->mProductDisplayOptions selected=$obj->mProduct.display}
                                                    <input type="submit" name="SetProductDisplayOption" value="Set">
                                                </p>

                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
        
                                    </tbody>
                </table>
            </div>
           
             
             
        <div class="well">
           <h4></h4>
           <p>
            <span class="">Image name:</span> {$obj->mProduct.image}
            <input name="ImageUpload" type="file" value="Upload">
            <input type="submit" name="Upload" value="Upload">
           </p>
           {if $obj->mProduct.image}
                <p>
                    <img src="product_images/{$obj->mProduct.image}" border="0" alt="{$obj->mProduct.name} image">
                </p>
            {/if}

            <p>
                <span class="">Image 2 name:</span>{$obj->mProduct.image_2}
                <input name="Image2Upload" type="file" value="Upload">
                <input type="submit" name="Upload" value='Upload'>
            </p>

            {if $obj->mProduct.image_2}
                <p>
                    <img src="product_images/{$obj->mProduct.image_2}" border="0" alt="{$obj->mProduct.name} image 2">
                </p>
            {/if}

            <p>
                <span class="bold-text">Thumbnail name:</span> {$obj->mProduct.thumbnail}
                <input name="ThumbnailUpload" type="file" value="Upload">
                <input type="submit" name="Upload" value="Upload">
            </p>

            {if $obj->mProduct.thumbnail}
                <p>
                    <img src="product_images/{$obj->mProduct.thumbnail}" border="0" alt="{$obj->mProduct.name} thumbnail">
                </p>
            {/if}



          </div>              <!-- /.table-responsive -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
</form>

            </div>
            
            </div>
