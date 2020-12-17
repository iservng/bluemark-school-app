 <form method="post" action="{$obj->mLinkToTeacherPage}"> 
   <div class="col-lg-12">
        <div class="" style="">
        {if $obj->mGetStudentCaExamsRecordsCount > 0}
            <div class="" style="">
                <h3><b style="color: #337ab7;"> <a href="{$obj->mTeacherStudentDetail}">{$obj->mStudentName} </a></b></h3>
                
                <b style="color: #333;">Continous Assesment and Exams Records</b>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <hr>
                {* <a href="" class="btn btn-outline btn-success btn-xs">Print Result mConfirmatoryList</a> mGetStudentCaExamsRecordsCount*}

                {* --------------------------------------------- *}
                {if $obj->mProgressComfirm == true}
                    <h6><b style="color: green;">Personal Progress metrix for {$obj->mStudentName} has been added successfully</b></h6>
                {else}
                    <span>&nbsp;</span> <span>&nbsp;</span>
                    <a href="#" data-toggle="modal" data-target="#phycomotiveskill" class="btn btn-outline btn-primary">Personal Progress</a>
                {/if}
                

                {* ---------------------------------------------- *}
                <span>&nbsp;</span> <span>&nbsp;</span>
                
                <a href="#" data-toggle="modal" data-target="#reportsheet" class="btn btn-outline btn-primary">Get Report Sheet</a>
            </div>

            <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 

                    </b>  
                </h4>
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
        
                <div class="table-responsive"> 
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                
                                
                                <th>Subject</th>
                                <th>First CA</th>
                                <th>Second CA</th>
                                <th>Third CA</th>
                                <th>CA Total</th>
                                <th>Exams</th>
                                <th>Total</th>


                            </tr>
                        </thead>
                        {if $obj->mGetStudentCaExamsRecordsCount < 1}
                            <p>
                                {$obj->mConfirmatoryListErrMsg}
                            </p>
                        {else}
                        <tbody> 
                        
                        {section name=i loop=$obj->mStudentCaExamRecord}
                            
                                {* No record found for attendance taking!mStudentCaExamRecord *}
                            
                            <tr>
                            
                                <td>
                                    {$obj->mStudentCaExamRecord[i].name}
                                </td>
                                <td>
                                    {if $obj->mEditFirstCa == true}
                                        <input type="text" name="firstCaScores[]" value="{$obj->mStudentCaExamRecord[i].firstca}" style="width: 60px;">
                                        <input type="hidden" name="subject_id[]" value="{$obj->mStudentCaExamRecord[i].subject_id}">
                                        <input type="hidden" name="student_id" value="{$obj->mStudentCaExamRecord[i].student_id}">
                                    {else}
                                        {$obj->mStudentCaExamRecord[i].firstca}
                                    {/if}
                                </td>
                                <td>
                                    {if $obj->mEditSecondCa == true}
                                        <input type="text" name="secondCaScores[]" value="{$obj->mStudentCaExamRecord[i].secondca}" style="width: 60px;">
                                        <input type="hidden" name="subject_id[]" value="{$obj->mStudentCaExamRecord[i].subject_id}">
                                        <input type="hidden" name="student_id" value="{$obj->mStudentCaExamRecord[i].student_id}">

                                    {else}
                                        {$obj->mStudentCaExamRecord[i].secondca}
                                    {/if}
                                    
                                </td>
                                <td>
                                    {* {$obj->mStudentCaExamRecord[i].thirdca} *}
                                    {if $obj->mEditThirdCa == true}
                                        <input type="text" name="thirdCaScores[]" value="{$obj->mStudentCaExamRecord[i].thirdca}" style="width: 60px;">
                                        <input type="hidden" name="subject_id[]" value="{$obj->mStudentCaExamRecord[i].subject_id}">
                                        <input type="hidden" name="student_id" value="{$obj->mStudentCaExamRecord[i].student_id}">
                                    {else}
                                        {$obj->mStudentCaExamRecord[i].thirdca}
                                    {/if}
                                </td>
                                <td>
                                    {$obj->mStudentCaExamRecord[i].catotal}
                                </td>
                                <td>
                                    {* {$obj->mStudentCaExamRecord[i].exams} *}
                                    {if $obj->mEditExams == true}
                                        <input type="text" name="examScores[]" value="{$obj->mStudentCaExamRecord[i].exams}" style="width: 60px;">
                                        <input type="hidden" name="subject_id[]" value="{$obj->mStudentCaExamRecord[i].subject_id}">
                                        <input type="hidden" name="student_id" value="{$obj->mStudentCaExamRecord[i].student_id}">
                                    {else}
                                        {$obj->mStudentCaExamRecord[i].exams}
                                    {/if}
                                </td>
                                <td>
                                    {$obj->mStudentCaExamRecord[i].total}
                                </td>
                                
                            </tr> 

                        {/section}
                            
                        </tbody>
                        {* ============================== *}
                        {/if}
                    </table> 
                </div>  
                
            <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body mShowAttendanceReportBtn-->

            <div class="panel-heading" style="padding-bottom: 60px;">
                                    <hr>
                <a href="{$obj->mLinkToTeacherPage}" class="btn btn-outline btn-danger btn-xs">Close</a>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    {if $obj->mEditFirstCa == false}
                        <input type="submit" name="EditfirstCa" value="Edit 1 CA" class="btn btn-outline btn-primary btn-xs">
                    {else}
                        <input type="submit" name="FinishEditfirstCa" value="Finish Editing 1 CA" class="btn btn-success">
                    {/if}
                    

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    {if $obj->mEditSecondCa == false}
                        <input type="submit" name="EditsecondCa" value="Edit 2 CA" class="btn btn-outline btn-primary btn-xs">
                    {else}
                        <input type="submit" name="FinishEditsecondCa" value="Finish Editing 2 CA" class="btn btn-success">
                    {/if}
                    

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    {if $obj->mEditThirdCa == false}
                        <input type="submit" name="EditthirdCa" value="Edit 3 CA" class="btn btn-outline btn-primary btn-xs">
                    {else}
                        <input type="submit" name="FinishEditthirdCa" value="Finish Editing 3 CA" class="btn btn-success">
                    {/if}


                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    {if $obj->mEditExams == false}
                        <input type="submit" name="Editexams" value="Edit Exams" class="btn btn-outline btn-primary btn-xs">
                    {else}
                        <input type="submit" name="FinishEditexams" value="Finish Editing Exams" class="btn btn-success">
                    {/if}
                    <hr>
                    
            </div> 
            {else}
{* ==================SECOND PART (WHEN A STUDENTS CA IS NOT FOUND)====================== *}
            <p>
                No record found for the selected student tt
            </p>


{* ===================================================== *}
            {/if}
        </div>
        <!-- /.panel -->
    </div>
</form> 



























{* The modal box that pops up for adding phycomotive Skill *}

<form method="post" action="{$obj->mLinkToTeacherPage}"> 
<div class="modal fade" id="phycomotiveskill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3><b style="color: #337ab7;">Phycomotive Skills</b></h3>
                This below reflects how the teacher honestly percievss the child, having spent a couple of months with him or her.
            </div>
            <div class="modal-body">
            {* --------------------------------body *}
            <h6>Please ensure that all judgement are made with clear honest mind.</h6>
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        
                            <tr>
                                <th> <b style="color: #337ab7;">Punctuality</b></th>
                                <td><input type="radio" name="punctuality" value="1">&nbsp;One</td>
                                <td><input type="radio" name="punctuality" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="punctuality" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="punctuality" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="punctuality" value="5">&nbsp;Five</td>
                                
                            </tr>
                            <tr>
                                <th> <b style="color: #337ab7;">Respect</b></th>
                                <td><input type="radio" name="respect" value="1">&nbsp;One</td>
                                <td><input type="radio" name="respect" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="respect" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="respect" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="respect" value="5">&nbsp;Five</td>
                            </tr>

                            <tr>
                                <th> <b style="color: #337ab7;">Politeness</b></th>
                                <td><input type="radio" name="politeness" value="1">&nbsp;One</td>
                                <td><input type="radio" name="politeness" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="politeness" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="politeness" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="politeness" value="5">&nbsp;Five</td>
                               
                            </tr>
                             <tr>
                                <th> <b style="color: #337ab7;">Relationship</b></th>
                                <td><input type="radio" name="relationship" value="1">&nbsp;One</td>
                                <td><input type="radio" name="relationship" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="relationship" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="relationship" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="relationship" value="5">&nbsp;Five</td>
                               
                            </tr>
                             <tr>
                                <th> <b style="color: #337ab7;">Attentiveness</b></th>
                                <td><input type="radio" name="attentiveness" value="1">&nbsp;One</td>
                                <td><input type="radio" name="attentiveness" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="attentiveness" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="attentiveness" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="attentiveness" value="5">&nbsp;Five</td>
                               
                            </tr>
                           
                           <tr>
                                <th> <b style="color: #337ab7;">Obedience</b></th>
                                <td><input type="radio" name="obedience" value="1">&nbsp;One</td>
                                <td><input type="radio" name="obedience" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="obedience" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="obedience" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="obedience" value="5">&nbsp;Five</td>
                                
                            </tr>
                            <tr>
                                <th> <b style="color: #337ab7;">Neatness</b></th>
                                <td><input type="radio" name="neatness" value="1">&nbsp;One</td>
                                <td><input type="radio" name="neatness" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="neatness" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="neatness" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="neatness" value="5">&nbsp;Five</td>
                            </tr>

                            <tr>
                                <th> <b style="color: #337ab7;">Handwriting</b></th>
                                <td><input type="radio" name="handwriting" value="1">&nbsp;One</td>
                                <td><input type="radio" name="handwriting" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="handwriting" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="handwriting" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="handwriting" value="5">&nbsp;Five</td>
                               
                            </tr>
                             <tr>
                                <th> <b style="color: #337ab7;">Fluency</b></th>
                                <td><input type="radio" name="fluency" value="1">&nbsp;One</td>
                                <td><input type="radio" name="fluency" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="fluency" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="fluency" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="fluency" value="5">&nbsp;Five</td>
                               
                            </tr>
                             <tr>
                                <th> <b style="color: #337ab7;">Friendliness</b></th>
                                <td><input type="radio" name="friendliness" value="1">&nbsp;One</td>
                                <td><input type="radio" name="friendliness" value="2">&nbsp;Two</td>
                                <td><input type="radio" name="friendliness" value="3">&nbsp;Three</td>
                                <td><input type="radio" name="friendliness" value="4">&nbsp;Four</td>
                                <td><input type="radio" name="friendliness" value="5">&nbsp;Five</td>
                            
                            </tr>
                    
                    </table>
                </div>
            {* ----------------------------------body *}
            <h6>Please select next term start date.</h6>
               <input type="date" name="nextTermStarts" style="width: 100%; border-top: none; border-left: none; border-right: none; outline: none;" required><br>

            <h6>Please Teachers Comment, ensure that all judgement are made with clear and honest .</h6>
               <input type="text" name="teacherComment" style="width: 100%; border-top: none; border-left: none; border-right: none; outline: none;" required>
            </div>

            <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">

            <div class="modal-footer">
            <input type="submit" name="personalprogress" class="btn btn-primary btn-sm" value="Submit Value">
            </div>
        </div>
    </div>
</div>
</form>






























{* The modal below is for the teachers remark  *}

<form method="post" action="{$obj->mLinkToTeacherPage}" target="_blank"> 
<div class="modal fade" id="reportsheet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2><b style="color: #337ab7;">{$obj->mStudentName}</b></h2>
                <h5><b style="color: #337ab7;">Student Report Sheet Generator</b></h5>
                {* This below reflects how {$obj->mStudentName} had performed academically, having spent a couple of months with the school. *}
            </div>
            <div class="modal-body">
            {* --------------------------------body *}
            
            <h5><b style="color: red;">Do you mean to generate, then print <b style="text-decoration: underline;">{$obj->mStudentName}'s</b> Report Sheet?.</b></h5>
               {* <input type="date" style="width: 100%; border-top: none; border-left: none; border-right: none; outline: none;" required><br> *}

            {* <h6>Please ensure that all judgement are made with clear honest mind.</h6> *}
               <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">
               <input type="hidden" name="pdf_generator" value="generatePDFreport">
            {* ----------------------------------body *}
            </div>
            <div class="modal-footer">
                <a href="{$obj->mLinkToTeacherPage}" class="btn btn-danger btn-sm">Close</a>
                <input type="submit" name="studentReportSheetBtn" class="btn btn-primary btn-sm" value="Yes Continue">
            </div>
        </div>
    </div>
</div>
</form>