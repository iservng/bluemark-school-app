 {* <form method="post" action="{$obj->mLinkToTeacherPage}"> *}
   <div class="col-lg-12">
        <div class="" style="">
        {if $obj->mLessonPlanTopicCount > 0}
            <div class="" style="">
                <h3><b style="color: #337ab7;"> Diary:  {$obj->mLessonPlanTopicCount}  Lesson Plan Topic(s)</b></h3>
                
                <p style="">Select TOPIC(s) to view lesson note</p>
            </div>

            <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                        {* Male [{$obj->mMaleClassCount}] 
                        <span>&nbsp;</span>
                        Female[{$obj->mFemaleClassCount}] *}
                    </b>  
                        <span>&nbsp;</span>
                        {* {if $obj->mShowAttendanceReportBtn == false && $obj->mWeekValues}
                            <small>
                            To take attendance input date 
                            </small>
                            <span>&nbsp;</span>
                            <input type="date" name="theDaysDate" style="text-align: center;">
                        {/if} *}
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>

                        {* {if $obj->mShowMorningButton && $obj->mWeekValues} 
                <input type="radio" name="maControl" value="Morning" id="morningattendance">
                            <b style="color: red"><label for="morningattendance"> Morning Attendance </label></b>
                        {/if} *}
                        {* {if $obj->mShowAfternoonButton && $obj->mWeekValues} 
                            <input type="radio" name="maControl" value="Afternoon" id="afternoonattendance"> <b style="color: red"> <label for="afternoonattendance">Afternoon Attendance </label></b>
                        {/if} *}
                        {* {if $obj->mIsAttendanceOk && $obj->mWeekValues} 
                            <b style="color: green"> Attendance Marked </b>
                        {/if} *}
                        {* {if !$obj->mWeekValues} 
                            <b style="color: green"> Termly Attendance Completed </b>
                        {/if} *}
                        

                </h4>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
            <input type="hidden" name="classAttendance_action" value="takeTodaysAttendance">
            
        
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                
                               
                                <th>Topic</th>
                                <th>Duration</th>
                                <th>Date</th>
                                {* <th>Edit</th> *}
                                <th>Lesson Note</th>

                            </tr>
                        </thead>
                        <tbody> 
                        {section name=i loop=$obj->mLessonPlanTopics}

                            <tr>
                                {* lesson_plan_id, topic, time_duration *}

                                
                                <td>{$obj->mLessonPlanTopics[i].topic}</td>
                                <td>{$obj->mLessonPlanTopics[i].time_duration}</td>
                                <td>{$obj->mLessonPlanTopics[i].sys_date}</td>
                                

                                    {* <td>
                                        <form method="post" action="{$obj->mLinkToTeacherPage}">
                                            <input type="hidden" name="ClassAction" value="Edit_lessonplan_Records">

                                            <input type="hidden" name="EditLessonNote_csrf" value="{$obj->mCsrfToken}">

                                            <input type="hidden" name="lessonplan_Id" value="{$obj->mLessonPlanTopics[i].lesson_plan_id}">

                                            <input type="submit" name="EditLessonNoteBtn" value="Edit Lesson Note" class="btn btn-outline btn-primary btn-xs">
                                        </form>
                                    </td> *}


                                    <td>
                                        <form method="post" action="{$obj->mLinkToTeacherPage}">
                                            <input type="hidden" name="viewClassAction" value="View_Lesson_Note">

                                            <input type="hidden" name="ViewLessonNote_csrf" value="{$obj->mCsrfToken}">

                                            <input type="hidden" name="viewlessonplan_Id" value="{$obj->mLessonPlanTopics[i].lesson_plan_id}">

                                            <input type="submit" name="ViewLessonNote" value="View Lesson Note" class="btn btn-outline btn-primary btn-xs">
                                        </form>
                                    </td>

                            
                            </tr> 

                        {/section}    
                        </tbody>
                    </table> 
                </div>  
                
            <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body some csrffirstca -->

            <div class="panel-heading" style="margin-bottom: 60px;">

                {* {if $obj->mShowAttendanceReportBtn || !$obj->mWeekValues}
                    <input type="submit" name="ViewAttendanceReport" value="View Attendance Report" class="btn btn-outline btn-primary">
                
                {else}
                
                    <input type="submit" name="attendanceListBtn" value="Take Attendance" class="btn btn-primary">
                {/if} *}
                <span>&nbsp;</span>
                <span>&nbsp;</span>

                    {* <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">

                    <input type="submit" name="viewStudentAcademicBtn" value="Show Class Report Table" class="btn btn-outline btn-primary"> *}
            </div> 
            {else}

            <div class="panel-heading">
                <div class="panel-heading">
                    <b style="color: red;">No records found for lesson plan subject selected!</b>
                </div>
            </div>

            {/if}
        </div>
        <!-- /.panel -->
    </div>
    {* </form>  *}
