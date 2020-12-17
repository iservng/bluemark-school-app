 {load_presentation_object filename="nursery_specific" assign="obj"}
 




<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-12">
                <b> <a href="{$obj->mLinkApplicantsData}">Back</a> | Applicants into Nursery Section</b>
                <hr>
                </div>
            </div>

 {if $obj->mNurseryApplicantsRecordsCount <= 0 }

 <p style="color: red;">There are no admission Records found for the current or specified year! <a href="{$obj->mLinkApplicantsData}"><b>Back</b></a> </p><br>

 {else}



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
                                        <th>Phone</th>
                                        <th>Applied On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {section name=i loop=$obj->mNurseryApplicantsRecords}
                                    <tr class="odd gradeX">

                                        <td>
                                            {$obj->mNurseryApplicantsRecords[i].firstname}
                                            <span>&nbsp;</span>
                                            {$obj->mNurseryApplicantsRecords[i].surname}
                                        </td>

                                        <td>
                                            {$obj->mNurseryApplicantsRecords[i].email}
                                        </td>

                                        <td>
                                            {$obj->mNurseryApplicantsRecords[i].f_phone}
                                        </td>

                                        <td class="center">
                                        
                                            {$obj->mNurseryApplicantsRecords[i].applied_on}
                                        </td>

                                        <td class="center">
                                            {* {$obj->mTeacherApplicantsRecords[i].status} |  *}
                                            <a href="{$obj->mNurseryApplicantsRecords[i].link_to_student_profile}">View</a>
                                        </td>

                                    </tr>
                                {/section}
                                  
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Search Applications by Date</h4>
                                <p>
                                 <form method="post" action="{$obj->mLinkToNurserySpecificData}">
                                    <input type="date" name="nursery_specific_session_date" value="">
                                    <input type="submit" name="any_date" value="Get Record">
                                </form>
                                </p>
                                <p>DataTables is a very flexible, advanced tables. In SB Admin, we are using a specialized version of DataTables built for Bluemark. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://bluemark.com/">https://datatables.net/</a>.</p>

                                {* <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">Admit All</a> *}

                                {* <form method="post" action="{$obj->mLinkApplicantsData}">
                                <input type="hidden" name="showSubRecords">

                                <input type="submit" name="showSubRecordsBtn" value="Show Sub-Records" class="btn btn-default btn-lg">

                                <input type="submit" name="hideSubRecordsBtn" value="Hide Sub-Records" class="btn btn-default btn-lg">

                                </form> *}
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            {/if}

            </div>