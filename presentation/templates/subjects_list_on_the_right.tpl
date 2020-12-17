{* nam  *}
<div class="col-lg-4 sidebar-widgets">
	<div class="widget-wrap">
						
		<div class="single-sidebar-widget user-info-widget">
				
					<a href="#">
						<h4>{$obj->mSubjectName}</h4>
					</a>
					
					<p>
                        <div class="table-responsive">
                    	<table class="table tale-hover">
							<thead>
								<tr>
									<th>Subject</th>
									
								</tr>
							</thead>
							<tbody>
								{section name=i loop=$obj->mClassSubject}
									<tr>
										<td><b><a href="{$obj->mClassSubject[i].link_to_lesson}">{$obj->mClassSubject[i].name}</a></b></td>
										
									</tr>
								{/section}
							</tbody>
						</table>	
					</div>
						
					</p>
					
		</div>


	</div>
</div>