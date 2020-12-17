<form method="post" action="{$obj->mLinkToStudentProfile}">
<div class="col-lg-12 col-md-9">
	<h3 class="mt-20 mb-20">My Continuose Assesment records</h3><hr>
	
		<p class="excert">
			<p>
				<b style="color: #38a4ff;">
					 Continuose Assesment scores for this term as publish by the school 
					
				</b>
			</p>
			
			<div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            
                            <th>Subject</th>
                            <th>First CA</th>
                            <th>Second CA</th>
                            <th>Third CA</th>
                            <th> CA total</th>
                            <th> Exams</th>
                            <th> Total</th>
                            
                        
                        </tr>
                    </thead>

                    <tbody>
					{if $obj->mStudentCaExamsRecordsCount > 0}
						{section name=i loop=$obj->mStudentCaExamsRecords}
							<tr>
								
								<td>{$obj->mStudentCaExamsRecords[i].name}</td>
								<td>{$obj->mStudentCaExamsRecords[i].firstca}</td>
								<td>{$obj->mStudentCaExamsRecords[i].secondca}</td>
								<td>{$obj->mStudentCaExamsRecords[i].thirdca}</td>
								<td>{$obj->mStudentCaExamsRecords[i].catotal}</td>
								<td>{$obj->mStudentCaExamsRecords[i].exams}</td>
								<td>{$obj->mStudentCaExamsRecords[i].total}</td>
								
							</tr>
						{/section}
					{else}
					<p style="color: red;">No Continuose Assesment records found</p>
					{/if}
                    </tbody>
					
                </table>
            </div>

		</p>
		
		<br><br>
		<p><input type="submit" name="subm" value="Close CA records" class="genric-btn info radius"></p>
					
</div>
</form>