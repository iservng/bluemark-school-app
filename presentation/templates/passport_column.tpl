{* nam  *}
<div class="col-lg-4 sidebar-widgets">
	<div class="widget-wrap">
						
		<div class="single-sidebar-widget user-info-widget">
				<img src="{$obj->mPasportUrl}" alt="">
					<a href="#">
						<h4>{$obj->mStudentFullName}</h4>
					</a>
					<p>
						Class: {$obj->mClassName}
					</p>
					<p>
						<hr>{$obj->mCurrentTerm}<hr>
					</p>
					<ul class="social-links">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-github"></i></a></li>
						<li><a href="#"><i class="fa fa-behance"></i></a></li>
					</ul>
					<p>
						{$obj->mProfileDescribeSelf}
					</p><hr>

					
					<p>
						
						{if $obj->mTakeActionBtn == true && $obj->mShowBtn == true}
							<h6>{$obj->mPromoteBtnMsg}</h6>
							<form method="post" action="{$obj->mLinkToStudentProfile}">
								<input type="hidden" name="action" value="Activate_new_class">
								<input type="hidden" name="PromotedClassId" value="{$obj->mPromotedClassId}">
								<input type="submit" name="actionBtn" value="Register">
							</form>
						{else}
							<h6>{$obj->mPromoteBtnMsg}</h6>
						{/if}
					</p>
					{* <p>
						<form method="post" action="{$obj->mLinkToStudentProfile}">
								<input type="hidden" name="action" value="Activate_new_class">
								<input type="hidden" name="PromotedClassId" value="{$obj->mPromotedClassId}">
								<input type="submit" name="actionBtn" value="Register">
							</form>
					</p> *}
		</div>


	</div>
</div>