 <form method="post" action="{$obj->mLinkToTeacherPage}"> 
   <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="" style="">
                <h3><b style="color: #337ab7; padding: 20px;">{$obj->mClass_name}  [{$obj->mConfirmatoryListCount}] students </b></h3>
                
            </div>
                        <!-- /.panel-heading -->
            <div class="panel-body">
            {if $obj->mConfirmatoryListCount > 0}
            
                 <div class="table-responsive"> 

                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                           
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
                {else}
                <b>No student record found</b>
                {/if}
                            <!-- /.table-responsive -->
            </div>
                        <!-- /.panel-body -->
                         <div class="">

                            <small style="color: #1087dd; padding: 20px;"> </small><span>&nbsp;</span><span>&nbsp;</span>
                            {* <input type="submit" name="confirmStudentBtn" value="Add Student" class="btn btn-primary btn-sm"> *}

                        </div> 
                    </div>
                    <!-- /.panel -->
                </div>
                </form> 