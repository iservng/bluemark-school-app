 {* <div class="col-lg-8 posts-list"> *}
            <div class="single-post row">
              <div class="col-lg-12">
              <h3> Subject: {$obj->mSubjectName}</h3>
              <b>Published: </b><span> {$obj->mLessonNoteDate}</span>

              <hr>
                <div class="feature-img">
                  <img class="img-fluid" src="{$obj->mInstructionalImage_750}" alt=""/>
                </div>
              </div>




              <div class="col-lg-9 col-md-9">
              <hr>
                <h3 class="mt-20 mb-20">
                  Topic: {$obj->mLessonNote['topic']}
                </h3>
                <hr>
                <p class="excert">
                   {$obj->mLessonNote['intronote']}
                </p>
                
              </div>
              <div class="col-lg-12">
                <div class="quotes">
                  <h4>Topic Definition</h4><hr>
                  {$obj->mLessonNote['topic_define']}
                </div>
                <div class="row mt-30 mb-30">
                  <div class="col-6">
                    <img class="img-fluid" src="{$obj->mInstructionalImage_360}" alt=""/>
                  </div>
                  <div class="col-6">
                    <img class="img-fluid" src="{$obj->mInstructionalImage_365}" alt=""/>
                  </div>
                  <div class="col-lg-12 mt-30">

                    <p>
                      <h5 style="color: gray;"> {$obj->mLessonNote['subtopic1']}</h5><hr>
                      {$obj->mLessonNote['subtopic1body']}
                    </p><br><br>


                    
                    <p>
                      <h5 style="color: gray;"> {$obj->mLessonNote['subtopic2']}</h5><hr>
                      {$obj->mLessonNote['subtopic2body']}
                    </p><br><br>

                    <p>
                      <h5 style="color: gray;"> {$obj->mLessonNote['subtopic3']}</h5><hr>
                      {$obj->mLessonNote['subtopic3body']}
                    </p><br><br>

                    <p>
                      <h5 style="color: gray;"> {$obj->mLessonNote['pre_summary']}</h5><hr>
                      {$obj->mLessonNote['pre_summarybody']}
                    </p><br><br>

                    <p>
                      <h5 style="color: gray;"> Student Activities</h5><hr>
                      {$obj->mLessonNote['student_activities']}
                    </p><br><br>


                    <p>
                      <h5 style="color: maroon;"> ASSIGNMENT/HOME WORK</h5><hr>
                      {* {$obj->mLessonNote['assignment']} *}
                      <ol>
                        {section name=i loop=$obj->mAssignment}
                          <li>{$obj->mAssignment[i]}</li>
                        {/section}
                      </ol>
                    </p><br><br>


                  </div>

                </div>
              </div>
            </div>
            
			

      