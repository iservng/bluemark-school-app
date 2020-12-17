<form method="post" action="{$obj->mLinkToStudentProfile}">
<div class="section-top-border">
	<h2 class="mb-30" style="color: green;">PROMOTED</h2>
	<h4 class="mb-30">Select the NEW class, then activate by clicking the activate button</h4>
	<div class="progress-table-wrap">
		<div class="progress-table">
			<div class="table-head">
				<div class="serial">#</div>
				<div class="country">Class </div>
				<div class="visit">Select</div>
				<div class="percentage">Percentages</div>
			</div>
			{section name=i loop=$obj->ExtensionOfPromotedClass}
				<div class="table-row">
					<div class="serial">645032</div>
					<div class="country"> {$obj->ExtensionOfPromotedClass[i].class_name}</div>
					<div class="visit"><input type="radio" name="promotedToClassid" value="{$obj->ExtensionOfPromotedClass[i].school_classes_id}"></div>
					<div class="percentage">
						<div class="progress">
							<div class="progress-bar color-1" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			{/section}

		
		</div>
		
	</div>
	
</div>
<input type="submit" name="choosingNewClassId" value="ACTIVATE NEW CLASS" class="genric-btn info-border radius">
</form>