 {load_presentation_object filename="applicants_data" assign="obj"}


  
  {if $obj->mShowSubRecords && $obj->mAllApplicantsRecordNull != false}



  
<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Teaching Applications
                        </div>
                        <!-- /.panel-heading -->
                        {if $obj->mTeacherApplicantsRecordsCount != 0}
                        <div class="panel-body">
                            <div class="table-responsive table-bordered">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>Full Name</th>
                                            <th>Email Address</th>
                                            <th>Contact</th>
                                            <th>View</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    {section name=i loop=$obj->mTeacherApplicantsRecords}
                                        <tr>
                                            <td>{$obj->mTeacherApplicantsRecords[i].name}</td>
                                            <td>{$obj->mTeacherApplicantsRecords[i].email}</td>
                                            <td>{$obj->mTeacherApplicantsRecords[i].phone}</td>
                                            <td>
                                                <a href="{$obj->mTeacherApplicantsRecords[i].link_to_teacher_profile}">View</a>
                                            </td>
                                        </tr>
                                        {/section}
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        {/if}
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                {/if}