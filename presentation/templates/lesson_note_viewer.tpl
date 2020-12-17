<form method="POST" action="{$obj->mLinkToTeacherPage}" enctype="multipart/form-data">

<div class="col-lg-12">
    <div class="well well-lg">

    {if $obj->mIsPublished === true}
        <input type="submit" name="unpublishlessonnote" value="Unpublish Lesson Note" class="btn btn-outline btn-danger">
        
    {else}
        <input type="submit" name="publishlessonnote" value="Publish Lesson Note" class="btn btn-outline btn-success">
    {/if}

    {* <input type="submit" name="publishlessonnote" value="Publish Lesson Note" class="btn btn-outline btn-primary"> *}

    <span>&nbsp;</span>
    <span>&nbsp;</span>
    {if $obj->mEditingLessonNote === true}
        <input type="submit" name="submitEditedLessonNote" value="Submit Edited Lesson Note" class="btn btn-success">
    {else}
        <input type="submit" name="EditLessonNoteBtn" value="Edit Lesson Note" class="btn btn-outline btn-primary">
    {/if}

     {if $obj->mIsPublished === true}
        <span>&nbsp;</span>
        <span>&nbsp;</span>
        <b style="color: green;"> [Students can view this lesson note.]</b>
    {/if}
    
    </div>
</div>

<div class="col-lg-12">
    <div class="well well-lg">



        <h1 style="text-align: center;"> 
            <span style="color: #777;"> TOPIC: </span> 
                {$obj->mLessonNote['topic']}<hr>
        </h1>
        {if $obj->mEditingLessonNote === true} 
            <hr><h5 style="text-align: center;"> <span> The lesson note is currently in Edit mode, use the big green button to submit the edited copy when done. </span></h5><hr>
        {/if}
        {if $obj->mLessonNoteEditError}
            <hr><h5 style="text-align: center; color: red;"> <b>{$obj->mLessonNoteEditError}. </b></h5><hr>
        {/if}
        <p>
            
            {if $obj->mEditingLessonNote === true}
                <textarea name="intronote" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    {$obj->mLessonNote['intronote']}
                </textarea> <br><br><br><br>
            {else}
                {$obj->mLessonNote['intronote']}<br><br>
            {/if}
        </p>
        <hr>



        <h4>DEFINITION:</h4> 
        <p>
            {if $obj->mEditingLessonNote === true}
            <h4> <span style="color: #f0ad4e;">Edit </span>:</h4>
                <textarea name="topic_define" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    {$obj->mLessonNote['topic_define']}
                </textarea><br><br><br><br>
            {else}
                {$obj->mLessonNote['topic_define']}<br><br>
            {/if}
            
        </p>
        <hr>



        <h4>
            
            {if $obj->mEditingLessonNote === true}
            <h4> <span style="color: #f0ad4e;">Edit </span>SUB-TOPIC 1:</h4>
                <input type="text" name="subtopic1" value="{$obj->mLessonNote['subtopic1']}" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;">
            {else}
                {$obj->mLessonNote['subtopic1']}
            {/if}
        </h4> 
        <p>
            
            {if $obj->mEditingLessonNote === true}
                <textarea name="subtopic1body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    {$obj->mLessonNote['subtopic1body']}
                </textarea><br><br><br><br>
            {else}
                {$obj->mLessonNote['subtopic1body']}<br><br>
            {/if}
        </p>
        <hr>






        <h4>
            
            {if $obj->mEditingLessonNote === true}
            <h4> <span style="color: #f0ad4e;">Edit </span>SUB-TOPIC 2:</h4>
                <input type="text" name="subtopic2" value="{$obj->mLessonNote['subtopic2']}" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;">
            {else}
                {$obj->mLessonNote['subtopic2']}
            {/if}
        </h4> 
        <p>
            
            {if $obj->mEditingLessonNote === true}
                <textarea name="subtopic2body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    {$obj->mLessonNote['subtopic2body']}
                </textarea><br><br><br><br>
            {else}
                {$obj->mLessonNote['subtopic2body']}<br><br>
            {/if}
        </p>
        <hr>






        <h4>
            
            {if $obj->mEditingLessonNote === true}
            <h4> <span style="color: #f0ad4e;">Edit </span>SUB-TOPIC 3:</h4>
                <input type="text" name="subtopic3" value="{$obj->mLessonNote['subtopic3']}" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;">
            {else}
                {$obj->mLessonNote['subtopic3']}
            {/if}
        </h4> 
        <p> 
             
            {if $obj->mEditingLessonNote === true}
                <textarea name="subtopic3body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    {$obj->mLessonNote['subtopic3body']}
                </textarea><br><br><br><br>
            {else}
                {$obj->mLessonNote['subtopic3body']}<br><br>
            {/if}
        </p>
        <hr> 







        <h4>
            
            {if $obj->mEditingLessonNote === true}
            <h4> <span style="color: #f0ad4e;">Edit </span>SUB-TOPIC 4:</h4>
                <input type="text" name="pre_summary" value="{$obj->mLessonNote['pre_summary']}" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;">
            {else}
                {$obj->mLessonNote['pre_summary']}
            {/if}
        </h4> 
        <p> 
            
            {if $obj->mEditingLessonNote === true}
                <textarea name="pre_summarybody" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    {$obj->mLessonNote['pre_summarybody']}
                </textarea><br><br><br><br>
            {else}
                {$obj->mLessonNote['pre_summarybody']} <br><br>
            {/if}
        </p>
        <hr>






        {* evaluation *}
        <h3>Evaluation </h3>
        <p> 
             
            {if $obj->mEditingLessonNote === true}
            <h4> <span style="color: #f0ad4e;">Edit </span>Evaluation:</h4>
                <textarea name="evaluation" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    {$obj->mLessonNote['evaluation']}
                </textarea><br><br><br><br>
            {else}
                {$obj->mLessonNote['evaluation']}<br><br>
            {/if}
        </p>
        <hr>




        <h3>Instructional Images </h3>
        {if $obj->mEditingLessonNote === true}
        <h4> <span style="color: #f0ad4e;">Edit </span>Instructional Images:</h4>
            <p>
                <b>Instructional Material Image 1 </b><span> </span>
                <input type="file" name="instructionalMaterialImages[]" class="btn btn-outline btn-primary">
            </p>

            <p>
                <b>Instructional Material Image 2 </b><span> </span>
                <input type="file" name="instructionalMaterialImages[]" class="btn btn-outline btn-primary">
            </p>

            <p>
                <b>Instructional Material Image 3 </b><span> </span>
                <input type="file" name="instructionalMaterialImages[]" class="btn btn-outline btn-primary">
            </p>
            <br><br><br><br>
        {else}
            <img src="{$obj->mWhatIsANoun_750}"><br>
            <img src="{$obj->mWhatIsANoun_360}">
            <img src="{$obj->mWhatIsANoun_365}"><br><br>
        {/if}




        


        <hr>
        <h3>Assignment/Home work Questiions </h3>

        {if $obj->mEditingLessonNote === true}
            <h4> <span style="color: #f0ad4e;">Edit </span>Assignment/Home work Questiions :</h4>
            <b>Question 1</b>
            <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="{$obj->mQuestionOne}">
            <br><br>

            <b>Question 2</b>
            <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="{$obj->mQuestionTwo}">
            <br><br>

            <b>Question 3</b>
            <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="{$obj->mQuestionThree}">
            <br><br>

            <b>Question 4</b>
            <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="{$obj->mQuestionFour}">
                                    <br><br>
        {else}
            <p> Question 1: {$obj->mQuestionOne} </p>
            <p> Question 2: {$obj->mQuestionTwo} </p>
            <p> Question 3: {$obj->mQuestionThree} </p>
            <p> Question 4: {$obj->mQuestionFour} </p>
        {/if}
        
                
        
        {if $obj->mEditingLessonNote === true}
        <hr><input type="submit" name="submitEditedLessonNote" value="Submit Edited Lesson Note" class="btn btn-success"><hr>
        {/if}




    </div>
</div>

</form>