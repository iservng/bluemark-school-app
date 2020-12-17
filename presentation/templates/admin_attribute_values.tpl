{*admin_attribute_values.tpl*}
{load_presentation_object filename="admin_attribute_values" assign="obj"}





        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
            {* {include file="admin_departments.tpl"} *}
           <form method="post" action="{$obj->mLinkToAttributeValuesAdmin}">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           Editing values for attribute:{$obj->mAttributeName} [<a href="{$obj->mLinkToAttributesAdmin}">back to attributes ...</a>] 
        </div>
                        <!-- /.panel-heading -->
    <div class="panel-body">
     {if $obj->mErrorMessage}<p style="color: red;">{$obj->mErrorMessage}</p>{/if}

    {if $obj->mAttributeValuesCount eq 0}
        <p style="color: blue;"><b>There are no values for this attribute</b></p>
    {else}
        <div class="table-responsive">
            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Attributes Value</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     {section name=i loop=$obj->mAttributeValues}
                                        {if $obj->mEditItem == $obj->mAttributeValues[i].attribute_value_id}
                                        <tr>
                                           
                                            <td>
                                                <input type="text" name="value" value="{$obj->mAttributeValues[i].value}" size="30">
                                            </td>
                                            
                                            <td>
                                                <input type="submit" name="submit_update_val_{$obj->mAttributeValues[i].attribute_value_id}" value="Update">
                                                <input type="submit" name="cancel" value="Cancel">
                                                <input type="submit" name="submit_delete_val_{$obj->mAttributeValues[i].attribute_value_id}" value="Delete">
                                            </td>
                                        </tr>
                                        {else}
                                        <tr>
                                            
                                            <td> {$obj->mAttributeValues[i].value}</td>
                                          
                                            <td>
                                                <input type="submit" name="submit_edit_val_{$obj->mAttributeValues[i].attribute_value_id}" value="Edit">
                                                <input type="submit" name="submit_delete_val_{$obj->mAttributeValues[i].attribute_value_id}" value="Delete">
                                            </td>
                                        </tr>
                                         {/if}
                                    {/section}


                                       
                                    </tbody>
                </table>
            </div>
             {/if}
             
             
        <div class="well">
           <h4>Add new attribute value:</h4>
           <p>
            <input class="form-control input-sm" type="text" name="attribute_value" value="[name]" size="30">
            
      
           </p>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit_add_val_0" value="Add">
          </div>              <!-- /.table-responsive -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
</form>

            </div>
            
            </div>
