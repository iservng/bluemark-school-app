<form method="post" action="{$obj->mToTeachersClassPage}">
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b style="color: #337ab7">Enter the first CA score for {$obj->mSubjectName}</b>
                        </div>
                        {if $obj->mConfirmatoryListCount > 0}
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            {* class_id, student_id, firstname, surname, email, f_phone, admitted_on, reg_number *}
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Phone(s)</th>
                                        <th>Reg Number</th>
                                        <th>CA Score</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {section name=i loop=$obj->mConfirmatoryList}
                                    <tr class="odd gradeX">
                                        <td>{$obj->mConfirmatoryList[i].firstname}</td>
                                        <td>{$obj->mConfirmatoryList[i].surname}</td>
                                        <td>{$obj->mConfirmatoryList[i].f_phone}</td>
                                        <td class="center">{$obj->mConfirmatoryList[i].reg_number}</td>
                                        <td class="center">
                                            <input type="text" name="first_ca_score[]" required style="width: 60px;"> 
                                            <input type="hidden" name="student_id[]" value="{$obj->mConfirmatoryList[i].student_id}">
                                        </td>
                                    </tr>
                                    {/section}
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Ensure all enterd data are correct</h4>
                                <p></p>
<input type="submit" class="btn btn-success btn-lg btn-block" value="Submit first CA scores for {$obj->mSubjectName}" style="font-weight: bold;" name="firstCaForStorage">
                            </div>
                        </div>
                        {else}
                            <b style="color: red;">No record found</b>
                            <span>&nbsp;</span>
                            <span>&nbsp;</span>
                            <a href="{$obj->mToTeachersClassPage}"> ok</a>
                        {/if}
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
</form>