<div class="col-lg-9 col-md-9">
	<h3 class="mt-20 mb-20">{$obj->mSubjectName}: Select a topic</h3>

	{* {if $obj->mStudentProfileErrMsg}
		<h4 style="color: red;"> {$obj->mStudentProfileErrMsg}</h4>
	{/if} *}
	
		<p class="excert">
			<p>
				<b>
					Select and open a topic content from the list of topis below
					<hr>
				</b>
			</p>
			
			{* {$obj->mProfileGoal} *}
            {if $obj->mIsTopicsPresent === true}
                
					<div class="table-responsive">
                    	<table class="table tale-hover">
							<thead>
								<tr>
									<th>Topics</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								{section name=i loop=$obj->mLessonTopics}
									<tr>
										<td><a href="{$obj->mLessonTopics[i].link_to_topic_content}"><strong>{$obj->mLessonTopics[i].topic}</strong></a></td>
										<td>
											<a href="{$obj->mLessonTopics[i].link_to_topic_content}">Go to topic content</a>
										</td>
									</tr>
								{/section}
							</tbody>
						</table>	
					</div>
                
            {else}
                <p>
                    <b>
                        No lesson plan topics found.<a href="{$obj->mLinkToStudentProfile}"> Ok</a>
                        <hr>
                    </b>
                </p>
            {/if}

		</p>
		
		<br><br>

	

							
</div>