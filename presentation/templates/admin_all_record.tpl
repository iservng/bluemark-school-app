{load_presentation_object filename="applicants_data" assign="obj"}




    {if !$obj->mAllApplicantsRecordNull}
    <p style="color: red;">There are no admission Records found for the specified year! <a href="{$obj->mLinkApplicantsData}"><b>Back</b></a> </p><br>
    {else}

    {*card for application counting start  bbb*}
        <!-- stop  -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-folder-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{$obj->mNurseryApplicantsRecordsCount}</div>
                                    <div>Nursery Applicants</div>
                                </div>
                            </div>
                        </div>
                        <a href="{$obj->mNurserySpecific}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-folder-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{$obj->mPrimaryApplicantsRecordsCount}</div>
                                    <div>Primary Applicants</div>
                                </div>
                            </div>
                        </div>
                        <a href="{$obj->mPrimarySpecific}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-folder-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{$obj->mSecondaryApplicantsRecordsCount}</div>
                                    <div>Secondary Applicants</div>
                                </div>
                            </div>
                        </div>
                        <a href="{$obj->mSecondarySpecific}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{$obj->mTeacherApplicantsRecordsCount}</div>
                                    <div>Teaching Applicants</div>
                                    {if $obj->mNumberWaitingForActivation neq 0}
                                    <div><a href="{$obj->mActivationSpecific}" style="color: white;">{$obj->mNumberWaitingForActivation} staff for ACTIVATION</a></div>
                                    {/if}
                                </div>
                            </div>
                        </div>
                        <a href="{$obj->mTeacherSpecific}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


    {*card for application counting end*}



            <div class="row">
                       
                <div class="col-lg-12">
                
                    <div class="panel panel-default">
                    
                        <div class="panel-heading">
                            DataTables showing application records
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Fathers Phone</th>
                                        <th>Applied On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {section name=i loop=$obj->mAllApplicantsRecords}
                                    <tr class="odd gradeX">
                                        <td>
                                            {$obj->mAllApplicantsRecords[i].firstname}
                                            <span>&nbsp;</span>
                                            {$obj->mAllApplicantsRecords[i].surname}
                                        </td>
                                        <td>
                                            {$obj->mAllApplicantsRecords[i].email}
                                        </td>
                                        <td>
                                            {$obj->mAllApplicantsRecords[i].f_phone}
                                        </td>
                                        <td class="center">
                                        
                                            {$obj->mAllApplicantsRecords[i].applied_on}
                                        </td>
                                        <td class="center">
                                            {$obj->mAllApplicantsRecords[i].status} | 
                                            <a href="{$obj->mAllApplicantsRecords[i].link_to_student_profile}">View Details</a>
                                        </td>
                                    </tr>
                                {/section}
                                  
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Search Applications by Date</h4>
                                <p>
                                 <form method="post" action="{$obj->mLinkApplicantsData}">
                                    <input type="date" name="session_date" value="">
                                    <input type="submit" name="any_date" value="Get Record">
                                </form>
                                </p>
                                

                                {* <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">Admit All</a> *}

                                <form method="post" action="{$obj->mLinkApplicantsData}">
                                    <input type="hidden" name="showSubRecords">

                                    <input type="submit" name="showSubRecordsBtn" value="Show Sub-Records" class="btn btn-default btn-lg">

                                    <input type="submit" name="hideSubRecordsBtn" value="Hide Sub-Records" class="btn btn-default btn-lg">

                                </form>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            {/if}