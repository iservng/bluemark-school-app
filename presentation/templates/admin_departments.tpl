{*admin_departments.tpl*}
{load_presentation_object filename="admin_departments" assign="obj"}
<form method="post" action="{$obj->mLinkToDepartmentsAdmin}">
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
           Edit the Section of Schoolshop: 
        </div>
                        <!-- /.panel-heading -->
    <div class="panel-body">
     {if $obj->mErrorMessage} <p style="color: red;">{$obj->mErrorMessage}</p>{/if}

    {if $obj->mDepartmentsCount eq 0}
        <p style="color: blue;"><b>There are no departments in your database!</b></p>
    {else}
        <div class="table-responsive">
            <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Section Name</th>
                                            <th>Section Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     {section name=i loop=$obj->mDepartments}
                                     {if $obj->mEditItem == $obj->mDepartments[i].department_id}
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input type="text" name="name" value="{$obj->mDepartments[i].name}" size="30">
                                            </td>
                                            <td>
                                                {strip}
                                                    <textarea name="description" row="3" cols="60">{$obj->mDepartments[i].description}</textarea>
                                                {/strip}
                                            </td>
                                            <td>
                                                <input type="submit" name="submit_edit_cat_{$obj->mDepartments[i].department_id}" value="Edit Categories">
                                                <input type="submit" name="submit_update_dept_{$obj->mDepartments[i].department_id}" value="Update">
                                                <input type="submit" name="cancel" value="Cancel">
                                                <input type="submit" name="submit_delete_dept_{$obj->mDepartments[i].department_id}" value="Delete">
                                            </td>
                                        </tr>
                                        {else}
                                        <tr>
                                            <td></td>
                                            <td>{$obj->mDepartments[i].name}</td>
                                            <td>{$obj->mDepartments[i].description}</td>
                                            <td>
                                            <input type="submit" name="submit_edit_cat_{$obj->mDepartments[i].department_id}" value="Edit Categories">
                                            <input type="submit" name="submit_edit_dept_{$obj->mDepartments[i].department_id}" value="Edit">
                                            <input type="submit" name="submit_delete_dept_{$obj->mDepartments[i].department_id}" value="Delete">
                                            </td>
                                        </tr>
                                         {/if}
                                    {/section}


                                       
                                    </tbody>
                </table>
            </div>
             {/if}
             
             
        <div class="well">
           <h4>Add new Section:</h4>
           <p>
            <input class="form-control input-sm" type="text" name="department_name" value="[name]" size="30">
            <br>
            <input class="form-control input-sm" type="text" name="department_description" value="[description]" size="60">
      
           </p>
            <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit_add_dept_0" value="Add">
          </div>              <!-- /.table-responsive -->
        </div>
                        <!-- /.panel-body -->
    </div>
                    <!-- /.panel -->
</div>
</form>