{load_presentation_object filename="teachers_class" assign="obj"}
{include file="teacher_admin_header.tpl"}

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">BlueMark v2.0</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                {include file="envelope_dropdown.tpl"}
                {include file="task_dropdown.tpl"}
                {include file="bell_dropdown.tpl"}
                {include file="user_dropdown.tpl"}
            </ul>



            <div class="navbar-default sidebar" role="navigation">
            {include file="teacher_main_menu.tpl"}
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <h2 class="page-header">
                            {section name=k loop=$obj->mAssignedClasses}
                            <span> <a href="{$obj->mAssignedClasses[k].list_out_members}">{$obj->mAssignedClasses[k].class_name}</a> </span><span>&nbsp;</span>
                            {/section}
                        </h2>
                    

                     <b>Date: {$obj->mTodayDate4Display}</b>
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>|
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>
                        <b>{$obj->mCurrentTerm}</b>
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>|
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>
                        <b>{$obj->mIsWeekName}</b>
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>|
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>
                        {$obj->mThisWeekStart}
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>|
                        <span>&nbsp;</span>
                        <span>&nbsp;</span>
                        {$obj->mThisWeekEnds}
                        
                    <hr>
                    
                    <!-- /.col-lg-12 -->
                    </div>
                </div>
                {if $obj->mStudentEmailErrorMsg}
                <div class="col-lg-12" style="text-align: center;">
                    <b class="page-header" style="color: red;">{$obj->mStudentEmailErrorMsg}</b>
                </div>
                {/if}
                <!-- /.row -->
{* ------------------Table-------------------- *}
{*The content area of the teachers class starts here below*}
{include file=$obj->mContentCell}

{* ------------------Table-------------------- *}

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- ------------------------------Add Student Modal-------------------------------- -->
    {* {include file="add_student_to_class.tpl"}
    {include file="delete_student_to_class.tpl"} *}
    {section name=j loop=$obj->mAssignedClasses}
    <div class="modal fade" id="myAddStudentModal_{$obj->mAssignedClasses[j].class_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
        <form role="form" method="post" action="{$obj->mLinkToTeacherPage}">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Student to {$obj->mAssignedClasses[j].class_name}</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="whatClassId" value="{$obj->mAssignedClasses[j].class_id}">
                <input type="hidden" name="whatClassName" value="{$obj->mAssignedClasses[j].class_name}">
                <input type="hidden" name="departmentName" value="{$obj->mAssignedClasses[j].name}">
                <input type="hidden" name="departmentId" value="{$obj->mAssignedClasses[j].department_id}">

                <h4 style="color: #4cd3e3;">Student's Email Address is required</h4>

                <div class="form-group">
                    <label>Input Email Address below</label>
                    <input class="form-control" name="addStudentToClassEmail">
                    <p class="help-block">Example johndeo@exanple.com.</p>
                </div>
                                        

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" name="requestToAddEmail" class="btn btn-primary" value="Confirm Request">
            </div>
            </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div> <!-- Modal -->





{* Delete student  *}
<div class="modal fade" id="myDeleteStudentModal_{$obj->mAssignedClasses[j].class_name}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Student from {$obj->mAssignedClasses[j].class_name}</h4>
            </div>
            <form method="get" action="{$obj->mToTeachersClassPage}">
            <div class="modal-body">
                Are you sure you want to delete a Student from {$obj->mAssignedClasses[j].class_name}
                <input type="hidden" name="ClassAction" value="DeleteStudent">
                <input type="hidden" name="ClassActionId" value="{$obj->mAssignedClasses[j].class_id}">
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="deleteStudentBtn" value="Yes Continue">
                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div> <!-- Modal -->




{* Add subject  *}
<div class="modal fade" id="myAddSubjectModal_{$obj->mAssignedClasses[j].class_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Subjects to {$obj->mAssignedClasses[j].class_name}</h4>
            </div>
            <form method="post" action="{$obj->mToTeachersClassPage}">
            <div class="modal-body">
                Please select the subjects to be added to {$obj->mAssignedClasses[j].class_name}
                <input type="hidden" name="ClassAction" value="AddSubject">
                <input type="hidden" name="Class_name" value="{$obj->mAssignedClasses[j].class_name}">
                <input type="hidden" name="ClassToAddSubjectId" value="{$obj->mAssignedClasses[j].class_id}">
            </div>
            <div class="modal-body">
            {* The content below *}
            {if $obj->mAllSubjectsCount > 0}
               <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            List of all subjects approved by school authority
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Subjects Name</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    {section name=i loop=$obj->mAllSubjects}
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="subjectId[]" value="{$obj->mAllSubjects[i].subjects_id}">
                                            </td>
                                            <td>
                                                {$obj->mAllSubjects[i].name}
                                            </td>
                                            
                                        </tr>
                                    {/section}
                                        
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            {* The content up *}
            {else}
                <b style="color: red;">No subjects record found in our system! <a href="{$obj->mLinkToTeacherPage}"> Got It </a></b>
            {/if}
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="addSubjectBtn" value="Add Subject">
                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div> <!-- Modal -->



{* ADD FIRST CA MARKS *}

<div class="modal fade" id="myAddFirstCAModal_{$obj->mAssignedClasses[j].class_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b style="color: #337ab7;">Record first CA in {$obj->mAssignedClasses[j].class_name} </b></h4>
            </div>
            <form method="post" action="{$obj->mToTeachersClassPage}">
            <div class="modal-body">
                Please select subject for which first CA is to be recorded in {$obj->mAssignedClasses[j].class_name}
                <input type="hidden" name="ClassAction" value="recordFirstCA">
                <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">
                <input type="hidden" name="ClassActionId" value="{$obj->mAssignedClasses[j].class_id}">
                <input type="hidden" name="CaType" value="first_ca">
            </div>
            <div class="modal-body">
                
{* ====================================================================================== *}
            {if $obj->mAssignedClasses[j].list_of_subjects}
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            {section name=m loop=$obj->mAssignedClasses[j].list_of_subjects}
                                <tr>
                                    <td>
                                        <input type="radio" name="subject_id" value="{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}">
                                    </td>
                                    <td>
                                        {$obj->mAssignedClasses[j].list_of_subjects[m].name}
                                    </td>
                                </tr>
                            {/section}
                        </tbody>
                    </table>
                </div>
            {else}
                <b style="color: red;">No subjects found for class. </b>
            {/if}
{* ====================================================================================== *}
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    {if $obj->mShowYesSubmitBtn == true}
                        <input type="submit" class="btn btn-primary" name="addFirstCABtn" value="Yes Submit">
                    {/if}
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>



















{* ---------------------------------------- *}

{* ADD SECOND CA MARKS *}
{* ---------------------------------------- *}
<div class="modal fade" id="myAddSecondCAModal_{$obj->mAssignedClasses[j].class_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b style="color: #337ab7;">Record Second CA in {$obj->mAssignedClasses[j].class_name} </b></h4>
            </div>
            <form method="post" action="{$obj->mToTeachersClassPage}">
            <div class="modal-body">
                Please select subject for which second CA is to be recorded in {$obj->mAssignedClasses[j].class_name}
                <input type="hidden" name="ClassAction" value="recordSecondCA">
                <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">
                <input type="hidden" name="ClassActionId" value="{$obj->mAssignedClasses[j].class_id}">
                <input type="hidden" name="CaType" value="second_ca">
            </div>
            <div class="modal-body">
                
{* ====================================================================================== *}
            {if $obj->mAssignedClasses[j].list_of_subjects}
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            {section name=m loop=$obj->mAssignedClasses[j].list_of_subjects}
                                <tr>
                                    <td>
                                        <input type="radio" name="subject_id" value="{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}">
                                    </td>
                                    <td>
                                        {$obj->mAssignedClasses[j].list_of_subjects[m].name}
                                    </td>
                                </tr>
                            {/section}
                        </tbody>
                    </table>
                </div>
            {else}
                <b style="color: red;">No subjects found for class. </b>
            {/if}
{* ====================================================================================== *}
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    {if $obj->mShowYesSubmitBtn == true}
                        <input type="submit" class="btn btn-primary" name="addSecondCABtn" value="Yes Submit">
                    {/if}
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>
















{* ---------------------------------------- *}

{* ADD THIRD CA MARKS *}
{* ---------------------------------------- *}
<div class="modal fade" id="myAddThirdCAModal_{$obj->mAssignedClasses[j].class_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b style="color: #337ab7;">Record Third CA in {$obj->mAssignedClasses[j].class_name} </b></h4>
            </div>
            <form method="post" action="{$obj->mToTeachersClassPage}">
            <div class="modal-body">
                Please select subject for which third CA is to be recorded in {$obj->mAssignedClasses[j].class_name}
                <input type="hidden" name="ClassAction" value="recordThirdCA">
                <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">
                <input type="hidden" name="ClassActionId" value="{$obj->mAssignedClasses[j].class_id}">
                <input type="hidden" name="CaType" value="third_ca">
            </div>
            <div class="modal-body">
                
{* ====================================================================================== *}
            {if $obj->mAssignedClasses[j].list_of_subjects}
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            {section name=m loop=$obj->mAssignedClasses[j].list_of_subjects}
                                <tr>
                                    <td>
                                        <input type="radio" name="subject_id" value="{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}">
                                    </td>
                                    <td>
                                        {$obj->mAssignedClasses[j].list_of_subjects[m].name}
                                    </td>
                                </tr>
                            {/section}
                        </tbody>
                    </table>
                </div>
            {else}
                <b style="color: red;">No subjects found for class. </b>
            {/if}
{* ====================================================================================== *}
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    {if $obj->mShowYesSubmitBtn == true}
                        <input type="submit" class="btn btn-primary" name="addThirdCABtn" value="Yes Submit">
                    {/if}
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>


























{* ---------------------------------------- *}

{* ADD EXAMS MARKS *}
{* ---------------------------------------- *}
<div class="modal fade" id="myAddExamsCAModal_{$obj->mAssignedClasses[j].class_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"><b style="color: #337ab7;">Record Exams Scores in {$obj->mAssignedClasses[j].class_name} </b></h4>
            </div>
            <form method="post" action="{$obj->mToTeachersClassPage}">
            <div class="modal-body">
                Please select subject for which exams scores is to be recorded in {$obj->mAssignedClasses[j].class_name}
                <input type="hidden" name="ClassAction" value="recordExams">
                <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">
                <input type="hidden" name="ClassActionId" value="{$obj->mAssignedClasses[j].class_id}">
                <input type="hidden" name="CaType" value="exams">
            </div>
            <div class="modal-body">
                
{* ====================================================================================== *}
            {if $obj->mAssignedClasses[j].list_of_subjects}
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            {section name=m loop=$obj->mAssignedClasses[j].list_of_subjects}
                                <tr>
                                    <td>
                                        <input type="radio" name="subject_id" value="{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}">
                                    </td>
                                    <td>
                                        {$obj->mAssignedClasses[j].list_of_subjects[m].name}
                                    </td>
                                </tr>
                            {/section}
                        </tbody>
                    </table>
                </div>
            {else}
                <b style="color: red;">No subjects found for class. </b>
            {/if}
{* ====================================================================================== *}
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    {if $obj->mShowYesSubmitBtn == true}
                        <input type="submit" class="btn btn-primary" name="addExamsBtn" value="Yes Submit">
                    {/if}
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>






















{* ADD LESSON PLAN *}
{* ---------------------------------------- *}
<div class="modal fade" id="mylessonplan_{$obj->mAssignedClasses[j].class_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="myModalLabel"><b style="color: #337ab7;"> {$obj->mAssignedClasses[j].class_name}  Lesson Plan</b></h2>
            </div>
            <form method="post" action="{$obj->mToTeachersClassPage}">
            <div class="modal-body">
                <b>Please select subject for which lesson plan is to be written in {$obj->mAssignedClasses[j].class_name}</b>
                <hr>
                <input type="hidden" name="ClassAction" value="writelessonplan">
                <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">
                <input type="hidden" name="ClassActionId" value="{$obj->mAssignedClasses[j].class_id}">
                {* <input type="hidden" name="CaType" value="exams">   *}
            </div>
            <div class="modal-body"> 
                
{* ====================================================================================== *}
            {* {if $obj->mAssignedClasses[j].list_of_subjects}
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>Subject</th>
                            </tr>
                        </thead>
                        <tbody>
                            {section name=m loop=$obj->mAssignedClasses[j].list_of_subjects}
                                <tr>
                                    <td>
                                        <input type="radio" name="subject_id" value="{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}">
                                    </td>
                                    <td>
                                        {$obj->mAssignedClasses[j].list_of_subjects[m].name}
                                    </td>
                                </tr>
                            {/section}
                        </tbody>
                    </table>
                </div>
            {else}
                <b style="color: red;">No subjects found for this class. </b>
            {/if} *}
{* ====================================================================================== *}

 {if $obj->mAssignedClasses[j].list_of_subjects}
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Collapsible Accordion Panel Group
                        </div>

                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">

                                {section name=m loop=$obj->mAssignedClasses[j].list_of_subjects}                                                       
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b class="panel-title" style="color: #337ab7;">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne_{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}">{$obj->mAssignedClasses[j].list_of_subjects[m].name}</a>
                                        </b>
                                    </div>
                                    <div id="collapseOne_{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Confirm</th>
                                                        <th>Enter the topic below</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" name="subject_id" value="{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}">
                                                        </td>
                                                        <td>
                                                            {* {$obj->mAssignedClasses[j].list_of_subjects[m].name} *}
                                                            <input type="text" name="confirmatory_topic_{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;" placeholder="{$obj->mAssignedClasses[j].list_of_subjects[m].name}">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {/section}

                            
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            {else}
                <b style="color: red;">No subjects found for this class. </b>
            {/if}
{* ====================================================================================== *}


            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    {if $obj->mShowYesSubmitBtn == true}
                        <input type="submit" class="btn btn-primary" name="addLessonPlan" value="Submit to continue with lesson plan">
                    {/if}
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>















{*THE MODAL FOR SHOWING THE SUBJECT, SO IF CLICKED WILL SHOW THE LESSON NOTE AND PROBABLY BUTTON FOR EDITTING IT *}

{* ADD LESSON PLAN *}
{* ---------------------------------------- *}
<div class="modal fade" id="myViewlessonplan_{$obj->mAssignedClasses[j].class_id}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="myModalLabel"><b style="color: #337ab7;"> {$obj->mAssignedClasses[j].class_name}  Lesson Plan Diary</b></h2>
            </div>
            <form method="post" action="{$obj->mToTeachersClassPage}">
            <div class="modal-body">
                <b>Please select subject for which lesson plan is to be viewed in {$obj->mAssignedClasses[j].class_name}</b>
                <hr>
                <input type="hidden" name="ClassAction" value="viewlessonplan">
                <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">
                <input type="hidden" name="ClassActionId" value="{$obj->mAssignedClasses[j].class_id}">
                {* <input type="hidden" name="CaType" value="exams">   *}
            </div>
            <div class="modal-body"> 
                
{* ====================================================================================== *}
            
{* ====================================================================================== *}

 {if $obj->mAssignedClasses[j].list_of_subjects}
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Click on the subject to select it, check the button to confirm your selection
                        </div>

                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">

                                {section name=m loop=$obj->mAssignedClasses[j].list_of_subjects}                                                       
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <b class="panel-title" style="color: #337ab7;">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo_{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}">{$obj->mAssignedClasses[j].list_of_subjects[m].name}</a>
                                        </b>
                                    </div>
                                    <div id="collapseTwo_{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Confirm Selection</th>
                                                        <th>Subject</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <input type="radio" name="subject_id" value="{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}">
                                                        </td>
                                                        <td>

                                                            {* {$obj->mAssignedClasses[j].list_of_subjects[m].name} *}
                                                            <input type="text" name="confirmatory_topic_{$obj->mAssignedClasses[j].list_of_subjects[m].subject_id}" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;" placeholder="{$obj->mAssignedClasses[j].list_of_subjects[m].name}" value="{$obj->mAssignedClasses[j].list_of_subjects[m].name}" disabled>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                {/section}

                            
                            </div>
                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            {else}
                <b style="color: red;">No subjects found for this class. </b>
            {/if}
{* ====================================================================================== *}


            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                    {if $obj->mShowYesSubmitBtn == true}
                        <input type="submit" class="btn btn-primary" name="viewLessonNoteTopicTableBtn" value="Submit to view lesson plan">
                    {/if}
                    

                </div>
                </form>
        </div>
                                    <!-- /.modal-content -->
    </div>
                                <!-- /.modal-dialog -->
</div>
{/section}
                            

    {include file="teacher_admin_jsfiles.tpl"}