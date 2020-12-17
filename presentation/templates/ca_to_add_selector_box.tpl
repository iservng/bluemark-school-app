<form method="post" action="{$obj->mToTeachersClassPage}">
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b style="color: #337ab7">
                                Enter CA score for {$obj->mStudentFullName}
                                
                            </b>
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            
                            <!-- /.table-responsive -->
                            <div class="well">
                                <h4>Ensure all enterd data are correct</h4>
                                <p>CA record for {$obj->mStudentFullName} was not found or had not been entered</p><hr>
                                <h5>&nbsp;</h5>
                                <p>
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            
                                <thead>
                                    <tr>
                                        <th>Student Name</th>
                                        <th>Select Subject</th>
                                        <th>Select CA type</th>
                                        <th>Enter Score Below</th>
                                        
                                
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr class="odd gradeX">
                                        <td>{$obj->mStudentFullName}</td>
                                        <td>
                                        <div class="form-group">
                                            <select name="subject_id" class="form-control">
                                            {if $obj->mConfirmatoryListCount > 0}
                                                {section name=i loop=$obj->mSubjectOfferedBySpecificClass}
                                                    <option value="{$obj->mSubjectOfferedBySpecificClass[i].subject_id}">
                                                        {$obj->mSubjectOfferedBySpecificClass[i].name} 
                                                        
                                                    </option>
                                                {/section}
                                            {else}
                                            Add subjects to this class
                                            {/if}
                                                
                                            </select>
                                            </div>
                                        </td>
                                        <td>
                                        <div class="form-group">
                                            <select name="ca_type" class="form-control">
                                                {section name=j loop=$obj->mCaTypes}
                                                    <option value="{$smarty.section.j.index+1}">
                                                        {$obj->mCaTypes[j]}
                                                        {$smarty.section.j.index+1}
                                                    </option>
                                                {/section}
                                            </select>
                                            </div>
                                        </td>
                                        <td class="center">
                                            <div class="form-group">

                                                <input type="text" name="score_mark" class="form-control">
                                            </div>
                                        </td>
                                        
                                    </tr>
                                
                                </tbody>
                            </table>
                                
                                </p>
                                <input type="submit" class="btn btn-success btn-lg" value="Submit CA scores for {$obj->mStudentFullName}" style="font-weight: bold;" name="submitBtnSingleCA">
                            </div>
                        </div>
                        
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
</form>