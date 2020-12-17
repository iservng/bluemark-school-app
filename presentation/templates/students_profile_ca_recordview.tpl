<form method="post" action="{$obj->mLinkToStudentProfile}">
<div class="col-lg-9 col-md-9">
	<h3 class="mt-20 mb-20">My Subjects</h3><hr>
	
		<p class="excert">
			<p>
				<b style="color: #38a4ff;">
					Select any subject below to view its Continuose Assesment scores for this term 
					
				</b>
			</p>
			
			<div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Select</th>
                            <th>Subject</th>
                           
                        </tr>
                    </thead>

                    <tbody>
					{if $obj->mSubjectCount > 0}
						{section name=i loop=$obj->mClassSubject}
							<tr>
								<td><input type="radio" name="subject_ca_id" value="{$obj->mClassSubject[i].subject_id}"></td>
								<td>{$obj->mClassSubject[i].name}</td>
								
							</tr>
						{/section}
					{else}
					<p style="color: red;">No subject found</p>
					{/if}
                    </tbody>
					
                </table>
            </div>

		</p>
		
		<br><br>
		<p>
        {* <input type="submit" name="submitCaSubjectId" value="Click view CA records" class="genric-btn info radius"> *}
        </p>
					
</div>
</form>