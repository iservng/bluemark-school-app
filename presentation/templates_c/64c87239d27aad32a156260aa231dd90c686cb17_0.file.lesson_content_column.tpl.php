<?php
/* Smarty version 3.1.33, created on 2020-11-26 14:24:15
  from 'C:\xampp\htdocs\bluemark\presentation\templates\lesson_content_column.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5fbfac7fc97bf3_70413326',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '64c87239d27aad32a156260aa231dd90c686cb17' => 
    array (
      0 => 'C:\\xampp\\htdocs\\bluemark\\presentation\\templates\\lesson_content_column.tpl',
      1 => 1606397046,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5fbfac7fc97bf3_70413326 (Smarty_Internal_Template $_smarty_tpl) {
?>             <div class="single-post row">
              <div class="col-lg-12">
              <h3> Subject: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mSubjectName;?>
</h3>
              <b>Published: </b><span> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNoteDate;?>
</span>

              <hr>
                <div class="feature-img">
                  <img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mInstructionalImage_750;?>
" alt=""/>
                </div>
              </div>




              <div class="col-lg-9 col-md-9">
              <hr>
                <h3 class="mt-20 mb-20">
                  Topic: <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['topic'];?>

                </h3>
                <hr>
                <p class="excert">
                   <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['intronote'];?>

                </p>
                
              </div>
              <div class="col-lg-12">
                <div class="quotes">
                  <h4>Topic Definition</h4><hr>
                  <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['topic_define'];?>

                </div>
                <div class="row mt-30 mb-30">
                  <div class="col-6">
                    <img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mInstructionalImage_360;?>
" alt=""/>
                  </div>
                  <div class="col-6">
                    <img class="img-fluid" src="<?php echo $_smarty_tpl->tpl_vars['obj']->value->mInstructionalImage_365;?>
" alt=""/>
                  </div>
                  <div class="col-lg-12 mt-30">

                    <p>
                      <h5 style="color: gray;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic1'];?>
</h5><hr>
                      <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic1body'];?>

                    </p><br><br>


                    
                    <p>
                      <h5 style="color: gray;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic2'];?>
</h5><hr>
                      <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic2body'];?>

                    </p><br><br>

                    <p>
                      <h5 style="color: gray;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic3'];?>
</h5><hr>
                      <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['subtopic3body'];?>

                    </p><br><br>

                    <p>
                      <h5 style="color: gray;"> <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['pre_summary'];?>
</h5><hr>
                      <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['pre_summarybody'];?>

                    </p><br><br>

                    <p>
                      <h5 style="color: gray;"> Student Activities</h5><hr>
                      <?php echo $_smarty_tpl->tpl_vars['obj']->value->mLessonNote['student_activities'];?>

                    </p><br><br>


                    <p>
                      <h5 style="color: maroon;"> ASSIGNMENT/HOME WORK</h5><hr>
                                            <ol>
                        <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['obj']->value->mAssignment) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                          <li><?php echo $_smarty_tpl->tpl_vars['obj']->value->mAssignment[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</li>
                        <?php
}
}
?>
                      </ol>
                    </p><br><br>


                  </div>

                </div>
              </div>
            </div>
            
			

      <?php }
}
