{*admin_attributes.tpl*}
{load_presentation_object filename="admin_attributes" assign="obj"}

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
            {* {include file="admin_departments.tpl"} *}
           <form method="post" action="{$obj->mLinkToAttributesAdmin}">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           Edit the Schoolshop product Attributes: 
        </div>
                        <!-- /.panel-heading -->
    <div class="panel-body">
     {if $obj->mErrorMessage} <p style="color: red;">{$obj->mErrorMessage}</p>{/if}

    {if $obj->mAttributesCount eq 0}
        <p style="color: blue;"><b>There are no products Attributes found in database</b></p>
    {else}
        <div class="table-responsive">
            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Attributes Name</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     {section name=i loop=$obj->mAttributes}
                                        {if $obj->mEditItem == $obj->mAttributes[i].attribute_id}
                                        <tr>
                                           
                                            <td>
                                                <input type="text" name="name" value="{$obj->mAttributes[i].name}" size="30">
                                            </td>
                                            
                                            <td>
                                                <input type="submit" name="submit_edit_attr_val_{$obj->mAttributes[i].attribute_id}" value="Edit Attribute Values">
                                                <input type="submit" name="submit_update_attr_{$obj->mAttributes[i].attribute_id}" value="Update">
                                                <input type="submit" name="cancel" value="Cancel">
                                                <input type="submit" name="submit_delete_attr_{$obj->mAttributes[i].attribute_id}" value="Delete">
                                            </td>
                                        </tr>
                                        {else}
                                        <tr>
                                            
                                            <td>{$obj->mAttributes[i].name}</td>
                                          
                                            <td>
                                                <input type="submit" name="submit_edit_val_{$obj->mAttributes[i].attribute_id}" value="Edit Attribute Values">
                                                <input type="submit" name="submit_edit_attr_{$obj->mAttributes[i].attribute_id}" value="Edit">
                                                <input type="submit" name="submit_delete_attr_{$obj->mAttributes[i].attribute_id}" value="Delete">
                                            </td>
                                        </tr>
                                         {/if}
                                    {/section}


                                       
                                    </tbody>
                </table>
            </div>
             {/if}
             
             
        <div class="well">
           <h4>Add new Attributes:</h4>
           <p>
            <input class="form-control input-sm" type="text" name="attribute_name" value="[name]" size="30">
            
      
           </p>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit_add_attr_0" value="Add">
          </div>              <!-- /.table-responsive -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
</form>

            </div>
            
            </div>
