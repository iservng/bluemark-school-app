<?php
/* Smarty version 3.1.33, created on 2020-10-20 13:00:19
  from 'C:\xampp\htdocs\bluemark\presentation\templates\lesson_note_viewer.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5f8ed153a56f51_03960569',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba4750e64e6cb2507128410cd0fff4dfae3bd4a9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\lesson_note_viewer.tpl',
      1 => 1603195216,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f8ed153a56f51_03960569 (Smarty_Internal_Template $_smarty_tpl) {
?><form method="POST" action="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLinkToTeacherPage;?>
" enctype="multipart/form-data">

<div class="col-lg-12">
    <div class="well well-lg">

    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsPublished === true) {?>
        <input type="submit" name="unpublishlessonnote" value="Unpublish Lesson Note" class="btn btn-outline btn-danger">
        
    <?php } else { ?>
        <input type="submit" name="publishlessonnote" value="Publish Lesson Note" class="btn btn-outline btn-success">
    <?php }?>

    
    <span>&nbsp;</span>
    <span>&nbsp;</span>
    <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
        <input type="submit" name="submitEditedLessonNote" value="Submit Edited Lesson Note" class="btn btn-success">
    <?php } else { ?>
        <input type="submit" name="EditLessonNoteBtn" value="Edit Lesson Note" class="btn btn-outline btn-primary">
    <?php }?>

     <?php if ($_smarty_tpl->tpl_vars['obj']->value->mIsPublished === true) {?>
        <span>&nbsp;</span>
        <span>&nbsp;</span>
        <b style="color: green;"> [Students can view this lesson note.]</b>
    <?php }?>
    
    </div>
</div>

<div class="col-lg-12">
    <div class="well well-lg">



        <h1 style="text-align: center;"> 
            <span style="color: #777;"> TOPIC: </span> 
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['topic'];?>
<hr>
        </h1>
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?> 
            <hr><h5 style="text-align: center;"> <span> The lesson note is currently in Edit mode, use the big green button to submit the edited copy when done. </span></h5><hr>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mLessonNoteEditError) {?>
            <hr><h5 style="text-align: center; color: red;"> <b><?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNoteEditError;?>
. </b></h5><hr>
        <?php }?>
        <p>
            
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
                <textarea name="intronote" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['intronote'];?>

                </textarea> <br><br><br><br>
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['intronote'];?>
<br><br>
            <?php }?>
        </p>
        <hr>



        <h4>DEFINITION:</h4> 
        <p>
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
            <h4> <span style="color: #f0ad4e;">Edit </span>:</h4>
                <textarea name="topic_define" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['topic_define'];?>

                </textarea><br><br><br><br>
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['topic_define'];?>
<br><br>
            <?php }?>
            
        </p>
        <hr>



        <h4>
            
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
            <h4> <span style="color: #f0ad4e;">Edit </span>SUB-TOPIC 1:</h4>
                <input type="text" name="subtopic1" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic1'];?>
" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;">
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic1'];?>

            <?php }?>
        </h4> 
        <p>
            
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
                <textarea name="subtopic1body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic1body'];?>

                </textarea><br><br><br><br>
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic1body'];?>
<br><br>
            <?php }?>
        </p>
        <hr>






        <h4>
            
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
            <h4> <span style="color: #f0ad4e;">Edit </span>SUB-TOPIC 2:</h4>
                <input type="text" name="subtopic2" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic2'];?>
" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;">
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic2'];?>

            <?php }?>
        </h4> 
        <p>
            
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
                <textarea name="subtopic2body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic2body'];?>

                </textarea><br><br><br><br>
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic2body'];?>
<br><br>
            <?php }?>
        </p>
        <hr>






        <h4>
            
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
            <h4> <span style="color: #f0ad4e;">Edit </span>SUB-TOPIC 3:</h4>
                <input type="text" name="subtopic3" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic3'];?>
" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;">
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic3'];?>

            <?php }?>
        </h4> 
        <p> 
             
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
                <textarea name="subtopic3body" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic3body'];?>

                </textarea><br><br><br><br>
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic3body'];?>
<br><br>
            <?php }?>
        </p>
        <hr> 







        <h4>
            
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
            <h4> <span style="color: #f0ad4e;">Edit </span>SUB-TOPIC 4:</h4>
                <input type="text" name="pre_summary" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['pre_summary'];?>
" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;">
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['pre_summary'];?>

            <?php }?>
        </h4> 
        <p> 
            
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
                <textarea name="pre_summarybody" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['pre_summarybody'];?>

                </textarea><br><br><br><br>
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['pre_summarybody'];?>
 <br><br>
            <?php }?>
        </p>
        <hr>






                <h3>Evaluation </h3>
        <p> 
             
            <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
            <h4> <span style="color: #f0ad4e;">Edit </span>Evaluation:</h4>
                <textarea name="evaluation" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" rows="15"> 
                    <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['evaluation'];?>

                </textarea><br><br><br><br>
            <?php } else { ?>
                <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['evaluation'];?>
<br><br>
            <?php }?>
        </p>
        <hr>




        <h3>Instructional Images </h3>
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
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
        <?php } else { ?>
            <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mWhatIsANoun_750;?>
"><br>
            <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mWhatIsANoun_360;?>
">
            <img src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mWhatIsANoun_365;?>
"><br><br>
        <?php }?>




        


        <hr>
        <h3>Assignment/Home work Questiions </h3>

        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
            <h4> <span style="color: #f0ad4e;">Edit </span>Assignment/Home work Questiions :</h4>
            <b>Question 1</b>
            <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mQuestionOne;?>
">
            <br><br>

            <b>Question 2</b>
            <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mQuestionTwo;?>
">
            <br><br>

            <b>Question 3</b>
            <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mQuestionThree;?>
">
            <br><br>

            <b>Question 4</b>
            <input type="text" name="mAssignment[]" style="border-top: none; border-left: none; border-right: none; width: 100%; padding: 1em; font-size: 15px; display: block; margin-top: 8px; outline: none;" value="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mQuestionFour;?>
">
                                    <br><br>
        <?php } else { ?>
            <p> Question 1: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mQuestionOne;?>
 </p>
            <p> Question 2: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mQuestionTwo;?>
 </p>
            <p> Question 3: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mQuestionThree;?>
 </p>
            <p> Question 4: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mQuestionFour;?>
 </p>
        <?php }?>
        
                
        
        <?php if ($_smarty_tpl->tpl_vars['obj']->value->mEditingLessonNote === true) {?>
        <hr><input type="submit" name="submitEditedLessonNote" value="Submit Edited Lesson Note" class="btn btn-success"><hr>
        <?php }?>




    </div>
</div>

</form><?php }
}
