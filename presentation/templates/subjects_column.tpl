<div class="col-lg-9 col-md-9">
	<h3 class="mt-20 mb-20">Select Subject</h3>

	{* {if $obj->mStudentProfileErrMsg}
		<h4 style="color: red;"> {$obj->mStudentProfileErrMsg}</h4>
	{/if} *}
	
		<p class="excert">
			<p>
				<b>
					<span style="color: #04091e;">Select a Subject to view topics treated under the selected subject
					
				</b>
			</p>
			
			<div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            
                            <th>Subject</th>
                            {* <th>First CA</th> *}
                            
                            
                        
                        </tr>
                    </thead>

                    <tbody>
                    {if $obj->mSubjectCount > 0}
                      {section name=i loop=$obj->mClassSubject}
                      <tr>
                        
                        <td>
                          <a href="{$obj->mClassSubject[i].link_to_lesson}">
                            {$obj->mClassSubject[i].name}
                          </a>
                        </td>
                        {* <td>firstca</td> *}
                        
                        
                      </tr>
                      {/section}
                    {else}
					            <p style="color: red;">Subjects not found</p>
					          {/if}
                    </tbody>
					
                </table>
            </div>

		</p>
		
		<br><br>

	

							
</div>
{* </form> *}
 {* <div class="col-lg-4 sidebar-widgets">
            <div class="widget-wrap">

             <div class="single-sidebar-widget tag-cloud-widget">
                <h4 class="tagcloud-title">My Subjects</h4>
                <ul>
                {if $obj->mSubjectCount > 0}
                  {section name=i loop=$obj->mClassSubject}
                    <li><a href="{$obj->mClassSubject[i].link_to_lesson}">{$obj->mClassSubject[i].name}</a></li>
                  {/section}
                {else}
                  <li><a href="#">Subjects Unavailable</a></li>
                {/if}

                </ul>
              </div> *}




{* ---------------------------------------------------------------------------- *}
{* ---------------------------------------------------------------------------- *}

            {* {if $obj->mIsTopicsPresent === true}
              <div class="single-sidebar-widget popular-post-widget">
                <h4 class="popular-title">Topics Published</h4>
                <div class="popular-post-list">

                  {section name=i loop=$obj->mLessonTopics}
                  <div class="single-post-list d-flex flex-row align-items-center">
                    <div class="thumb">
                      <img class="img-fluid" src="img/blog/pp1.jpg" alt="" />
                    </div>
                    <div class="details">
                      <a href="{$obj->mLessonTopics[i].link_to_topic_content}"><h6>{$obj->mLessonTopics[i].topic}</h6></a>
                      <p>02 Hours ago</p>
                    </div>
                  {/section}
                </</div>
                  div>
              </div> 
              
            {/if} *}
              
             
            

            {* </div>
		  </div> *}
      {* ----------------------------------------------------------- *}