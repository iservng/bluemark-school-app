 {* <form method="post" action="{$obj->mLinkToTeacherPage}">  *}
   <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="" style="">
                <h3><b style="color: #337ab7; padding: 20px;">{$obj->mClassName}  [{$obj->mClassSubjectCount}] subjects </b></h3>
                
            </div>
                        <!-- /.panel-heading -->
            <div class="panel-body">
            {if $obj->mClassSubjectCount > 0}
            
                 <div class="table-responsive"> 

                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        
                                            <th>Subject Name</th>
                                            <th>Action</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    {section name=i loop=$obj->mSubjectOfferedBySpecificClass}

                                        <tr>
                                            <td>
                                                {$obj->mSubjectOfferedBySpecificClass[i].name}
                                            </td>

                                            <td>
                                                <a href="{$obj->mSubjectOfferedBySpecificClass[i].link_delete_subject}">Delete</a>
                                            </td>
                                        </tr> 

                                    {/section}
                                        
                                    </tbody>
                    </table> 
                </div> 
                {else}
                <b>No student record found</b>
                {/if}
                            <!-- /.table-responsive -->
            </div>
                        <!-- /.panel-body -->
                         <div class="panel-heading">

                            <small style="color: #1087dd; padding: 20px;"> </small><span>&nbsp;</span><span>&nbsp;</span>
                            {* <input type="submit" name="confirmStudentBtn" value="Add Student" class="btn btn-primary btn-sm"> *}
                            <a href="{$obj->mLinkToTeacherPage}" class="btn btn-primary btn-sm">Got It</a>

                        </div> 
                    </div>
                    <!-- /.panel -->
                </div>
                {* </form>  *}