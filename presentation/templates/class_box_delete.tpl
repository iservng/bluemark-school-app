 <form method="post" action="{$obj->mLinkToTeacherPage}"> 
   <div class="col-lg-12">
        <div class="panel panel-default">
        {if $obj->mConfirmatoryListCount > 0}
            <div class="" style="">
                <h3><b style="color: #337ab7; padding: 20px;">Delete from {$obj->mClass_name}[{$obj->mConfirmatoryListCount}]</b></h3>
                <p style="padding-left: 20px;">Select student(s) to be deleted and click the delete button at the bottom to effect the change</p>
            </div>
                        <!-- /.panel-heading -->
            <div class="panel-body">
            <input type="hidden" name="classDeleteId" value="">
        
            
                 <div class="table-responsive"> 

                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                        
                                            <th>Select</th>
                                            <th>Firstname</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Admission Date</th>
                                            <th>Registration Number</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    {section name=i loop=$obj->mConfirmatoryList}

                                         <tr>
                                            <td><input type="checkbox" name="todeleteStudenIds[]" value="{$obj->mConfirmatoryList[i].student_id}"></td>
                                            <td>{$obj->mConfirmatoryList[i].firstname}</td>
                                            <td>{$obj->mConfirmatoryList[i].surname}</td>
                                            <td>{$obj->mConfirmatoryList[i].email}</td>
                                            <td>{$obj->mConfirmatoryList[i].f_phone}</td>
                                            <td>{$obj->mConfirmatoryList[i].admitted_on}</td>
                                            <td>{$obj->mConfirmatoryList[i].reg_number}</td>
                                        </tr> 

                                        {/section}
                                        
                                    </tbody>
                    </table> 
                </div>  
                
                            <!-- /.table-responsive -->
            </div>
                        <!-- /.panel-body -->
                        <div class="panel-heading">

                            <a href="{$obj->mLinkToTeacherPage}" class="btn btn-outline btn-danger">Close</a>

                            <input type="submit" name="todeleteListBtn" value="Delete Selected Student" class="btn btn-primary btn-sm">

                        </div> 
                        {else}
                        <div class="panel-heading">
                         <b style="color: red;">No record found for deletion!</b>
                        </div>
                       
                        {/if}
                    </div>
                    <!-- /.panel -->
                </div>
                </form> 