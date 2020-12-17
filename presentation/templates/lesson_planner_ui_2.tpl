 <form method="post" action="{$obj->mLinkToTeacherPage}" enctype="multipart/form-data"> 
   <div class="col-lg-12">
        <div class="" style="">
        {* {if $obj->mConfirmatoryListCount > 0} *}
            <div class="" style="">
                <h3><b style="color: #337ab7;"> <a href=""> Lesson Plan Template for {$obj->mClassName_current['class_name']}</a></b></h3>
                
                <b style="color: #999;"> Use the template format provide, fill in all fields, (the fields are divided into three sections) then click the "Upload Lesson Plan" buttion to complete. </b>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <hr>

                 <div class="panel-heading">
                <h4>
                    <b style="color: #337ab7;"> 
                        SUBJECT :  {$obj->mSubjectName['name']} | STEP - 2
                        {if $obj->mLP2FErrors}
                            <b style="color: red;">{$obj->mLP2FErrors}</b>
                        {/if}
                    </b>  
                </h4>
            </div>
                {* ---------------------------------------------- *}
                <span>&nbsp;</span> <span>&nbsp;</span>
                
                {* <a href="#" data-toggle="modal" data-target="#" class="btn btn-outline btn-primary">Preview Presentation</a> *}
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                <span>&nbsp;</span>
                {* <a href="#" data-toggle="modal" data-target="#" class="btn btn-outline btn-primary">Preview class Note</a> *}
                {* <hr> *}
            </div>

            <!-- /.panel-heading -->
            <div class="panel-body">
        
                <div class="table-responsive"> 
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                
                                <th><b style="color: #337ab7;">Title</b></th>
                                <th><b style="color: #337ab7;">Enter Appropriate Data</b></th>

                            </tr>
                        </thead>
                        <tbody> 
                        

                            <tr>
                                <td><b>Introduction</b></td>
                                <td>
                                    {if $obj->mIntroductionError}
                                        <b style="color: red;">{$obj->mIntroductionError}</b>
                                    {/if}
                                    <input type="text" name="mIntroduction" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value=""> 
                                </td>
                            </tr> 


                            <tr>
                                <td><b>Presentation<br>Step-1<br>Topic Intro Note</b></td>
                                <td>
                                    {if $obj->mIntroNoteError}
                                        <b style="color: red;">{$obj->mIntroNoteError}</b>
                                    {/if}
                                    <textarea name="mIntroNote" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="6"> 
                                        
                                    </textarea>
                                </td>
                            </tr> 

                            <tr>
                                <td><b>Presentation<br>Step-2 <br>Topic <br>Definition Note</b></td>
                                <td>
                                    
                                    {if $obj->mDefinitionNoteError}
                                        <b style="color: red;">{$obj->mDefinitionNoteError}</b>
                                    {/if}
                                    <textarea name="mDefinitionNote" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="20"> 
                                        
                                    </textarea>
                                </td>
                            </tr> 

                            <tr>
                                <td><b>Sub-Topic 1</b></td>
                                <td>
                                    {if $obj->mSubTopic_1Error}
                                        <b style="color: red;">{$obj->mSubTopic_1Error}</b>
                                    {/if}
                                    <input type="text" name="mSubTopic_1" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;"> 
                                     
                                </td>
                            </tr> 

                            <tr>
                                <td> <b> Sub-Topic-1 <br>Body </b> </td>
                                <td>
                                    {if $obj->mSubTopic_1_bodyError}
                                        <b style="color: red;"> {$obj->mSubTopic_1_bodyError} </b>
                                    {/if}
                                    
                                    <textarea name="mSubTopic_1_body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="20"> 
                                        
                                    </textarea>
                                </td>
                            </tr> 


                            <tr>
                                <td> <b> Sub-Topic 2 </b> </td>
                                <td>
                                    {if $obj->mSubTopic_2Error}
                                        <b style="color: red;"> {$obj->mSubTopic_2Error} </b>              
                                    {/if}
                                    <input type="text" name="mSubTopic_2" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;"> 
                                </td>
                            </tr>


                            <tr>
                                <td> <b> Sub-Topic-2 <br>Body </b> </td>
                                <td>
                                    {* mPreviouseKnowledgeError *}
                                    {if $obj->mSubTopic_2_bodyError}
                                        <b style="color: red;"> {$obj->mSubTopic_2_bodyError} </b>              
                                    {/if}
                                        <textarea name="mSubTopic_2_body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="20"> 
                                        
                                        </textarea>

                                </td>
                            </tr>
                            {* .............. *}
                            <tr>
                                <td> <b> Sub-Topic 3 </b> </td>
                                <td>
                                {if $obj->mSubTopic_3Error}
                                    <b style="color: red;"> {$obj->mSubTopic_3Error} </b>              
                                {/if}
                                    <input type="text" name="mSubTopic_3" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;"> 

                                </td>
                            </tr>


                            <tr>
                                <td> <b> Sub-Topic-3 <br>Body </b> </td>
                                <td>
                                    {* mPreviouseKnowledgeError *}
                                    {if $obj->mSubTopic_3_bodyError}
                                        <b style="color: red;"> {$obj->mSubTopic_3_bodyError} </b>              
                                    {/if}
                                        <textarea name="mSubTopic_3_body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="20"> 
                                        
                                    </textarea> 
                                
                                </td>
                            </tr>

                            {* ................ *}
                            <tr>
                                <td> <b> Summary<br>
                                Sub-Topic 4 </b> </td>
                                <td>
                                {if $obj->mSummaryError}
                                    <b style="color: red;"> {$obj->mSummaryError} </b>              
                                {/if}
                                    <input type="text" name="mSummary" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 14px; display: block; margin-top: 8px; outline: none;"> 

                                
                                </td>
                            </tr>


                            <tr>
                                <td> <b> Summary
                                <br> Sub-Topic-4 
                                <br>Body </b> </td>
                                <td>
                                    {* mPreviouseKnowledgeError *}
                                    {if $obj->mSummary_bodyError}
                                        <b style="color: red;"> {$obj->mSummary_bodyError} </b>              
                                    {/if}
                                        <textarea name="mSummary_body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="20"> 
                                        
                                    </textarea> 
                                
                                </td>
                            </tr>

                        </tbody>
                    </table> 
                </div>  
                
            <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body mShowAttendanceReportBtn-->

            <div class="panel-heading" style="padding-bottom: 60px;">
                                    <hr>
                <a href="{$obj->mLinkToTeacherPage}" class="btn btn-outline btn-danger">Close</a>
                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    {* {if $obj->mEditFirstCa == false}
                        <input type="submit" name="EditfirstCa" value="Edit 1 CA" class="btn btn-outline btn-primary btn-xs">
                    {else}
                        <input type="submit" name="FinishEditfirstCa" value="Finish Editing 1 CA" class="btn btn-success">csrffirstca
                    {/if} *}
                    
                    <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">
                    <input type="submit" name="LessonPlanBack_step1" value="Back to STEP-1" class="btn btn-outline btn-primary">

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    {* {if $obj->mEditSecondCa == false}
                        <input type="submit" name="EditsecondCa" value="Edit 2 CA" class="btn btn-outline btn-primary btn-xs">
                    {else}
                        <input type="submit" name="FinishEditsecondCa" value="Finish Editing 2 CA" class="btn btn-success">
                    {/if} *}
                    <input type="submit" name="LessonPlan_step2" value="Continue Lesson Plan (STEP-2)" class="btn btn-outline btn-primary">

                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    {* {if $obj->mEditThirdCa == false}
                        <input type="submit" name="EditthirdCa" value="Edit 3 CA" class="btn btn-outline btn-primary btn-xs">
                    {else}
                        <input type="submit" name="FinishEditthirdCa" value="Finish Editing 3 CA" class="btn btn-success">
                    {/if} *}


                    <span>&nbsp;</span>
                    <span>&nbsp;</span>

                    {* {if $obj->mEditExams == false}
                        <input type="submit" name="Editexams" value="Edit Exams" class="btn btn-outline btn-primary btn-xs">
                    {else}
                        <input type="submit" name="FinishEditexams" value="Finish Editing Exams" class="btn btn-success">
                    {/if} *}
                    <hr>
                    
            </div> 
            {* {else}

            <div class="panel-heading">
                <div class="panel-heading">
                    <b style="color: red;">No record found for attendance taking!</b>
                </div>
            </div>

            {/if} *}
        </div>
        <!-- /.panel -->
    </div>
</form> 



























{* The modal box that pops up for adding phycomotive Skill *}

{* <form method="post" action="{$obj->mLinkToTeacherPage}"> 
<div class="modal fade" id="phycomotiveskill" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3><b style="color: #337ab7;">Phycomotive Skills</b></h3>
                This below reflects how the teacher honestly percievss the child, having spent a couple of months with him or her.
            </div>
            <div class="modal-body">
           
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
 *}





























{* The modal below is for the teachers remark  *}
{* 
<form method="post" action="{$obj->mLinkToTeacherPage}" target="_blank"> 
<div class="modal fade" id="reportsheet" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2><b style="color: #337ab7;">{$obj->mStudentName}</b></h2>
                <h5><b style="color: #337ab7;">Student Report Sheet Generator</b></h5>
                This below reflects how {$obj->mStudentName} had performed academically, having spent a couple of months with the school. 
            </div>
            <div class="modal-body">
            
            
            <h5><b style="color: red;">Do you mean to generate, then print <b style="text-decoration: underline;">{$obj->mStudentName}'s</b> Report Sheet?.</b></h5>
                <input type="date" style="width: 100%; border-top: none; border-left: none; border-right: none; outline: none;" required><br> 

            <h6>Please ensure that all judgement are made with clear honest mind.</h6> 
               <input type="hidden" name="csrffirstca" value="{$obj->mCsrffirstca}">
               <input type="hidden" name="pdf_generator" value="generatePDFreport">
            
            </div>
            <div class="modal-footer">
                <a href="{$obj->mLinkToTeacherPage}" class="btn btn-danger btn-sm">Close</a>
                <input type="submit" name="studentReportSheetBtn" class="btn btn-primary btn-sm" value="Yes Continue">
            </div>
        </div>
    </div>
</div>
</form> *}