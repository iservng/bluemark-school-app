 {load_presentation_object filename="applicants_data" assign="obj"}
  
  {if $obj->mShowSubRecords && $obj->mAllApplicantsRecordNull != false}
  <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>Nursery Applicants</b>
                        </div>
                        <!-- /.panel-heading -->
                    {if $obj->mNurseryApplicantsRecordsCount != 0}
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Contact</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {section name=i loop=$obj->mNurseryApplicantsRecords}
                                        <tr>
                                            <td>{$obj->mNurseryApplicantsRecords[i].firstname}</td>
                                            <td>{$obj->mNurseryApplicantsRecords[i].surname}</td>
                                            <td>{$obj->mNurseryApplicantsRecords[i].f_phone}</td>
                                            <td>
                                                <a href="{$obj->mNurseryApplicantsRecords[i].link_to_student_profile}">View</a>
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