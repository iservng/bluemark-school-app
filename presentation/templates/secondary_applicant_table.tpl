 {load_presentation_object filename="applicants_data" assign="obj"}
  
  {if $obj->mShowSubRecords && $obj->mAllApplicantsRecordNull != false}
 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Secondary Applicants
                        </div>
                        <!-- /.panel-heading -->
                        {if $obj->mSecondaryApplicantsRecordsCount != 0}
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Contact</th>
                                            <th>View</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    {section name=i loop=$obj->mSecondaryApplicantsRecords}
                                        <tr>
                                            <td>{$obj->mSecondaryApplicantsRecords[i].firstname}</td>
                                            <td>{$obj->mSecondaryApplicantsRecords[i].surname}</td>
                                            <td>{$obj->mSecondaryApplicantsRecords[i].f_phone}</td>
                                            <td>
                                                <a href="{$obj->mSecondaryApplicantsRecords[i].link_to_student_profile}">View</a>
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