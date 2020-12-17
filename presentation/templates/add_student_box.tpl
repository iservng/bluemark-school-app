<form method="post" action="{$obj->mLinkToTeacherPage}">
   <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><b>Student Confirmation</b></h4>
                Registration Number: <b>{$obj->mRegistrationNumber}</b>
            </div>
                        <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                                    <thead>
                                        <tr>
                                           
                                            <th>Status</th>
                                            <th>Department</th>
                                            <th>Class Assigned</th>
                                            <th>Admission Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{$obj->mStudentToAddInfo['status']}</td>
                                            <td>{$obj->mStudentToAddInfo['section']}</td>
                                            <td>{$obj->mClass_name}</td>
                                            <td>{$obj->mStudentToAddInfo['admitted_on']}</td>
                                            
                                        </tr>
                                        <tr>
                                            <td>{$obj->mDepartmentId}</td>
                                            <td>{$obj->mDepartmentName}</td>
                                            <td>{$obj->mClassName}</td>
                                            <td>{$obj->mClassId}</td>
                                        </tr>
                                       
                                    </tbody>
                    </table>
                </div>
                            <!-- /.table-responsive -->
            </div>
                        <!-- /.panel-body -->
                        <div class="panel-heading">
                            <b style="color: #1087dd;">Click to complete the addition </b><span>&nbsp;</span><span>&nbsp;</span>
                            <input type="submit" name="confirmStudentBtn" value="Add Student" class="btn btn-primary btn-sm">
                        </div>
                    </div>
                    <!-- /.panel -->
                </div>
                </form>