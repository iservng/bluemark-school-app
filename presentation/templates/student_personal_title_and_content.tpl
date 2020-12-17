<div class="col-lg-9 col-md-9">
	<h3 class="mt-20 mb-20">{$obj->mProfileTitle}</h3>

	{if $obj->mStudentProfileErrMsg}
		<h4 style="color: red;"> {$obj->mStudentProfileErrMsg}</h4>
	{/if}
	
		<p class="excert">
			<p>
				<b>
					My Goals
					<hr>
				</b>
			</p>
			
			{$obj->mProfileGoal}

		</p>
		
		<br><br>

		<p>
			<p>
				<b>
					My Objectives
					<hr>
				</b>
			</p>
		
			{$obj->mProfileObjectives}
		</p>

							
</div>