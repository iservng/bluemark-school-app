 <form method="post" action="{$obj->mLinkToTeacherPage}">
   <div class="col-lg-12">
        <div class="" style="">
        {if $obj->mConfirmatoryListCount > 0}
            <div class="" style="">
                <h3><b style="color: #337ab7;">  {$obj->mClass_name} class members [{$obj->mConfirmatoryListCount}]</b></h3>
                
                <p style="">Select student(s) to take attendance and click the take attendance button at the bottom to effect the change</p>
            </div>

            <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                        Male [{$obj->mMaleClassCount}] 
                        <span>&nbsp;</span>
                        Female[{$obj->mFemaleClassCount}]
                    </b>  
                        <span>&nbsp;</span>
                        {if $obj->mShowAttendanceReportBtn == false && $obj->mWeekValues}
                            <small>
                            To take attendance input date 
                            </small>
                            <span>&nbsp;</span>
                            <input type="date" name="theDaysDate" style="text-align: center;">
                        {/if}
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>

                        {if $obj->mShowMorningButton && $obj->mWeekValues} 
                <input type="radio" name="maControl" value="Morning" id="morningattendance">
                            <b style="color: red"><label for="morningattendance"> Morning Attendance </label></b>
                        {/if}
                        {if $obj->mShowAfternoonButton && $obj->mWeekValues} 
                            <input type="radio" name="maControl" value="Afternoon" id="afternoonattendance"> <b style="color: red"> <label for="afternoonattendance">Afternoon Attendance </label></b>
                        {/if}
                        {if $obj->mIsAttendanceOk && $obj->mWeekValues} 
                            <b style="color: green"> Attendance Marked </b>
                        {/if}
                        {if !$obj->mWeekValues} 
                            <b style="color: green"> Termly Attendance Completed </b>
                        {/if}
                        

                </h4>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
            <input type="hidden" name="classAttendance_action" value="takeTodaysAttendance">
            <input type="hidden" name="classAttendance_csrf" value="{$obj->mCsrfToken}">
        
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                {if $obj->mShowAttendanceReportBtn == false && $obj->mWeekValues}      
                                <th>Mark Attendance</th>
                                {/if}
                                <th>Firstname</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Registration Number</th>
                                {if $obj->mShowCaLinks == true}
                                    <th>CA/Exams Records</th>
                                {/if}
                            </tr>
                        </thead>
                        <tbody> 
                        {section name=i loop=$obj->mConfirmatoryList}

                            <tr>
                                {if $obj->mShowAttendanceReportBtn == false && $obj->mWeekValues}      
                                    <td>
                                    <input type="checkbox" name="attendanceStudenIds[]" value="{$obj->mConfirmatoryList[i].student_id}" checked>
                                        <select name="attendanceValues[]">
                                            <option value="1">Morning</option>
                                            <option value="1">Afternoon</option>
                                            <option value="0">Absent</option>
                                            <option value="0">Sick</option>
                                            <option value="0">Hollyday</option>
                                        <select>
                                        
                                    </td>
                                {/if}

                                <td>{$obj->mConfirmatoryList[i].firstname}</td>
                                <td>{$obj->mConfirmatoryList[i].surname}</td>
                                <td>{$obj->mConfirmatoryList[i].email}</td>
                                <td>{$obj->mConfirmatoryList[i].f_phone}</td>
                                
                                <td>{$obj->mConfirmatoryList[i].reg_number}</td>
                                {if $obj->mShowCaLinks == true}
                                     <td>
                                        <form method="post" action="{$obj->mLinkToTeacherPage}">
                                            <input type="hidden" name="ClassAction" value="CaExamsRecords">
                                            <input type="hidden" name="StudentId" value="{$obj->mConfirmatoryList[i].student_id}">
                                            <input type="hidden" name="ClassId" value="{$obj->mClassId}">
                                            <input type="submit" name="view_record" value="View Records" class="btn btn-outline btn-primary btn-xs">
                                        </form>
                                    </td>
                                {/if}
                               
                            </tr> 

                        {/section}    
                        </tbody>
                    </table> 
                </div>  
                
            <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body some csrffirstca -->

            <div class="panel-heading" style="margin-bottom: 60px;">

                {if $obj->mShowAttendanceReportBtn || !$obj->mWeekValues}
                    <input type="submit" name="ViewAttendanceReport" value="View Attendance Report" class="btn btn-outline btn-primary">
                
                {else}
                
                    <input type="submit" name="attendanceListBtn" value="Take Attendance" class="btn btn-primary">
                {/if}
                <span>&nbsp;</span>
                <span>&nbsp;</span>

                    <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">

                    <input type="submit" name="viewStudentAcademicBtn" value="Show Class Report Table" class="btn btn-outline btn-primary">
            </div> 
            {else}

            <div class="panel-heading">
                <div class="panel-heading">
                    <b style="color: red;">No record found for attendance taking!</b>
                </div>
            </div>

            {/if}
        </div>
        <!-- /.panel -->
    </div>
    </form> 
