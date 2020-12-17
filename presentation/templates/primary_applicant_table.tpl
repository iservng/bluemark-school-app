 {load_presentation_object filename="applicants_data" assign="obj"}
  
  {if $obj->mShowSubRecords && $obj->mAllApplicantsRecordNull != false}
 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Primary Applicants</b>
                        </div>
                        <!-- /.panel-heading -->
                        {if $obj->mPrimaryApplicantsRecordsCount != 0}
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Contact</th>
                                            <th>View</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    {section name=i loop=$obj->mPrimaryApplicantsRecords}
                                        <tr>
                                            <td>{$obj->mPrimaryApplicantsRecords[i].firstname}</td>
                                            <td>{$obj->mPrimaryApplicantsRecords[i].surname}</td>
                                            <td>{$obj->mPrimaryApplicantsRecords[i].f_phone}</td>
                                            <td>
                                            <a href="{$obj->mPrimaryApplicantsRecords[i].link_to_student_profile}">View</a>
                                            </td>
                                        </tr>
                                        {/section}
                                        {* <tr>
                                            <td>2</td>
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>@fat</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Larry</td>
                                            <td>the Bird</td>
                                            <td>@twitter</td>
                                        </tr> *}
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