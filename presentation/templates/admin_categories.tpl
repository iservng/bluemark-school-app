{*admin_categories.tpl*}
{load_presentation_object filename="admin_categories" assign="obj"}





        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            <div class="row">
            {* {include file="admin_departments.tpl"} *}
           <form method="post" action="{$obj->mLinkToDepartmentCategoriesAdmin}">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           Editing Categories for department:{$obj->mDepartmentName} [<a href="{$obj->mLinkToDepartmentsAdmin}">Back to department...</a>]
        </div>
                        <!-- /.panel-heading -->
    <div class="panel-body">
     {if $obj->mErrorMessage}<p style="color: red;">{$obj->mErrorMessage}</p>{/if}

    {if $obj->mCategoriesCount eq 0}
        <p style="color: blue;"><b>There  are no categories in this department!</b></p>
    {else}
        <div class="table-responsive">
            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {section name=i loop=$obj->mCategories}
                                        {if $obj->mEditItem == $obj->mCategories[i].category_id}
                                        <tr>
                                           
                                            <td>
                                                <input type="text" name="name" value="{$obj->mCategories[i].name}" size="30">
                                            </td>
                                            <td>
                                                {strip}
                                                <textarea name="description" rows="3" cols="60">{$obj->mCategories[i].description}</textarea>
                                                {/strip}
                                            </td>
                                            
                                            <td>
                                               <input type="submit" name="submit_edit_prod_{$obj->mCategories[i].category_id}" value="Edit Products">
                                                <input type="submit" name="submit_update_cat_{$obj->mCategories[i].category_id}" value="Update">
                                                <input type="submit" name="cancel" value="Cancel">
                                                <input type="submit" name="submit_delete_cat_{$obj->mCategories[i].category_id}" value="Delete">
                                            </td>
                                        </tr>
                                        {else}
                                        <tr>
                                            
                                            <td>{$obj->mCategories[i].name}</td>
                                            <td>{$obj->mCategories[i].description}</td>
                                          
                                            <td>
                                                  <input type="submit" name="submit_edit_prod_{$obj->mCategories[i].category_id}" value="Edit Products">
                                                    <input type="submit" name="submit_edit_cat_{$obj->mCategories[i].category_id}" value="Edit">
                                                    <input type="submit" name="submit_delete_cat_{$obj->mCategories[i].category_id}" value="Delete">
                                            </td>
                                        </tr>
                                         {/if}
                                    {/section}


                                       
                                    </tbody>
                </table>
            </div>
             {/if}
             
             
        <div class="well">
           <h4>Add new category:</h4>
           <p>
            <input class="form-control input-sm" type="text" name="category_name" value="[name]" size="30">
            <br>
            <input class="form-control input-sm" type="text" name="category_description" value="[description]" size="60">
           </p>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit_add_cat_0" value="Add">
          </div>              <!-- /.table-responsive -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
</form>

            </div>
            
            </div>
